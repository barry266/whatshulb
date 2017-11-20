<?php
App::uses('ProductAppController', 'Product.Controller');
/**
 * Products Controller
 *
 * @property Product $Product
*/
class ProductsController extends ProductAppController {

	/**
	 * index method
	 *
	 * @return void
	 */
	public function index() {
		if ($this->request->isAjax()){
			$this->layout = null;
		}
		$this->Product->recursive = 0;

		if ($this->request->isGet()){
			if (!empty($this->request->named['filter'])){
				$filter = array();
				$filter['Product']['filter'] = $this->request->named['filter'];
				if (!empty($this->request->params['named']['page'])){
					$filter['Product']['page'] = $this->request->named['page'];
				}else{
					$filter['Product']['page'] = 1;
				}
				$this->request->data = am($this->request->data,$filter);
			}else{
				$filter = array();
				$filter['Product'] = $this->Cookie->read('srcPassArg');
				if (!empty($filter['Product'])){
					$this->request->data = am($this->request->data,$filter);
				}
			}
		}


		$passArg = array();
		$conditions = array();
		if (!empty($this->data['Product']) && !empty($this->data['Product']['filter'])){
			$condition = array(' name LIKE '  => '%'.trim($this->data['Product']['filter']).'%');
			$passArg = $this->data['Product'];
			array_push($conditions,$condition);
		}
		if (!empty($this->request->params['named']['page'])){
			$passArg['page'] = 1;
		}else{
			if (!empty($this->request->data['Product']['page'])){
				$this->request->params['named']['page'] = $this->request->data['Product']['page'];
			}
		}

		//$paginate = array('limit' => 2);
		$paginate = array();
		if ($this->Session->read('auth_user')['Group'][0]['id']!=1){
			$condition = array('user_id'=>$this->Session->read('auth_user')['User']['id']);
			array_push($conditions,$condition);
		}
		if (!empty($conditions)){
			$paginate['conditions'] = $conditions;
		}

		//print_r($this->data);

		$this->paginate = $paginate;

		$this->set('passArg',$passArg);

		if (!empty($passArg)){
			$this->Cookie->write('srcPassArg',$passArg);
		}

		$this->set('products', $this->paginate());

	}

	/**
	 * view method
	 *
	 * @throws NotFoundException
	 * @param string $id
	 * @return void
	 */
	public function view($id = null) {
		$this->Product->id = $id;
		if (!$this->Product->exists()) {
			throw new NotFoundException(__('Invalid product'));
		}
		$this->set('product', $this->Product->read(null, $id));
	}

	/**
	 * add method
	 *
	 * @return void
	 */
	public function add() {
		$errors = array();
		if ($this->request->is('post')) {
			$this->Product->create();

			$user = $this->Session->read('Auth');
			$this->request->data['Product']['user_id']=$user['User']['id'];

			if ($this->Product->save($this->request->data)) {
				$this->Cookie->delete('srcPassArg');
				$this->redirect(array('action' => 'index'));
			} else {
				$errors = $this->Product->validationErrors;
			}
		}

		$this->set('errors',$errors);
		$this->set(compact('categories'));
	}

	/**
	 * edit method
	 *
	 * @throws NotFoundException
	 * @param string $id
	 * @return void
	 */
	public function edit($id = null) {
		$errors = array();
		$this->Product->id = $id;
		if (!$this->Product->exists()) {
			throw new NotFoundException(__('Invalid product'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Product->save($this->request->data)) {
				$this->redirect(array('action' => 'index'));
			} else {
				$errors = $this->Product->validationErrors;
			}
		} else {
			$product = $this->Product->read(null, $id);
			if ($product['Product']['user_id']!=$this->Session->read('auth_user')['User']['id'] && $this->Session->read('auth_user')['Group'][0]['id']!=1)
				$this->redirect(array('action'=>'index'));
			$this->request->data = am($this->request->data,$product);
		}
		$this->Session->write("CurrentPID",$id);
		$this->set('errors',$errors);
	}

	/**
	 * delete method
	 *
	 * @throws MethodNotAllowedException
	 * @throws NotFoundException
	 * @param string $id
	 * @return void
	 */
	public function delete($id = null) {
		$this->autoRender = false;
		if (!$this->request->is('post')) {
			throw new MethodNotAllowedException();
		}
		$this->Product->id = $id;
		if (!$this->Product->exists()) {
			throw new NotFoundException(__('Invalid product'));
		}
		if ($this->Product->delete()) {
			//$this->Session->setFlash(__('Product deleted'));
			//$this->redirect(array('action' => 'index'));
		}
		//$this->Session->setFlash(__('Product was not deleted'));
		//$this->redirect(array('action' => 'index'));
	}
}
