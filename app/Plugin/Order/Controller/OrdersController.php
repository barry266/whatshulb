<?php
App::uses('OrderAppController', 'Order.Controller');
/**
 * Orders Controller
 *
 * @property Order $Order
*/
class OrdersController extends OrderAppController {

	/**
	 * index method
	 *
	 * @return void
	 */
	public function index() {
		if ($this->request->isAjax()){
			$this->layout = null;
		}
		$this->Order->recursive = 0;

		if ($this->request->isGet()){
			if (!empty($this->request->named['filter'])){
				$filter = array();
				$filter['Order']['filter'] = $this->request->named['filter'];
				if (!empty($this->request->params['named']['page'])){
					$filter['Order']['page'] = $this->request->named['page'];
				}else{
					$filter['Order']['page'] = 1;
				}
				$this->request->data = am($this->request->data,$filter);
			}else{
				$filter = array();
				$filter['Order'] = $this->Cookie->read('srcPassArg');
				if (!empty($filter['Order'])){
					$this->request->data = am($this->request->data,$filter);
				}
			}
		}


		$passArg = array();
		$conditions = array();
		if (!empty($this->data['Order']) && !empty($this->data['Order']['filter'])){
			$condition = array(' name LIKE '  => '%'.trim($this->data['Order']['filter']).'%');
			$passArg = $this->data['Order'];
			array_push($conditions,$condition);
		}
		if (!empty($this->request->params['named']['page'])){
			$passArg['page'] = 1;
		}else{
			if (!empty($this->request->data['Order']['page'])){
				$this->request->params['named']['page'] = $this->request->data['Order']['page'];
			}
		}

		//$paginate = array('limit' => 2);
		$paginate = array();
		if ($this->Session->read('auth_user')['Group'][0]['id']!=1){
			$condition = array('owner_id'=>$this->Session->read('auth_user')['User']['id']);
			$condition2 = array('buyer_id'=>$this->Session->read('auth_user')['User']['id']);
			$condition3 = array_merge($condition,$condition2);
			//array_push($conditions,$condition3);
			array_merge($conditions,$condition3);
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

		$this->loadModel('Product');
		$products = $this->Product->find('list', array('fields' => array('Product.name')));
		$this->set(compact('products'));
		$this->set('orders', $this->paginate());
		$this->set('role',$this->Session->read('auth_user')['User']['id']);


	}

	/**
	 * view method
	 *
	 * @throws NotFoundException
	 * @param string $id
	 * @return void
	 */
	public function view($id = null) {
		$this->Order->id = $id;
		$order = $this->Order->read(null, $id);
		if (!$this->Order->exists()) {
			throw new NotFoundException(__('Invalid order'));
		}
		$this->loadModel('User');
		$buyer = $this->User->read(null, $order['Order']['buyer_id']);
		$owner = $this->User->read(null, $order['Order']['owner_id']);

		$this->loadModel('Product');
		$products = $this->Product->find('all',array('conditions' => array('Product.id' => explode(',',$order['Order']['product_id'],-1))));

		$this->set(compact('order'));
		$this->set(compact('buyer'));
		$this->set(compact('owner'));
		$this->set(compact('products'));
	}

	/**
	 * add method
	 *
	 * @return void
	 */
	// Don't allow to create order
	/*
	public function add() {
		$errors = array();
		if ($this->request->is('post')) {
			$this->Order->create();

			$user = $this->Session->read('Auth');
			$this->request->data['Order']['user_id']=$user['User']['id'];

			if ($this->Order->save($this->request->data)) {
				$this->Cookie->delete('srcPassArg');
				$this->redirect(array('action' => 'index'));
			} else {
				$errors = $this->Order->validationErrors;
			}
		}

		$this->set('errors',$errors);
		$this->set(compact('categories'));
	}
	*/

	/**
	 * edit method
	 *
	 * @throws NotFoundException
	 * @param string $id
	 * @return void
	 */
	public function edit($id = null) {
		$errors = array();
		$this->Order->id = $id;
		if (!$this->Order->exists()) {
			throw new NotFoundException(__('Invalid order'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Order->save($this->request->data)) {
				$this->redirect(array('action' => 'index'));
			} else {
				$errors = $this->Order->validationErrors;
			}
		} else {
			$order = $this->Order->read(null, $id);
			if (($order['Order']['owner_id']!=$this->Session->read('auth_user')['User']['id']) && $this->Session->read('auth_user')['Group'][0]['id']!=1)
				$this->redirect(array('action'=>'index'));
			$this->request->data = am($this->request->data,$order);
		}
		$this->Session->write("CurrentPID",$id);
		$this->set('errors',$errors);

		$order = $this->Order->read(null, $id);

		$this->loadModel('User');
		$buyer = $this->User->read(null, $order['Order']['buyer_id']);
		$owner = $this->User->read(null, $order['Order']['owner_id']);

		$this->loadModel('Product');
		$products = $this->Product->find('all',array('conditions' => array('Product.id' => explode(',',$order['Order']['product_id'],-1))));

		$this->set(compact('order'));
		$this->set(compact('buyer'));
		$this->set(compact('owner'));
		$this->set(compact('products'));
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
		$this->Order->id = $id;
		if (!$this->Order->exists()) {
			throw new NotFoundException(__('Invalid order'));
		}
		if ($this->Order->delete()) {
			//$this->Session->setFlash(__('Order deleted'));
			//$this->redirect(array('action' => 'index'));
		}
		//$this->Session->setFlash(__('Order was not deleted'));
		//$this->redirect(array('action' => 'index'));
	}
}
