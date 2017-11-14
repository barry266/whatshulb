<?php
App::uses('ArticleAppController', 'Article.Controller');
/**
 * Categories Controller
 *
 * @property Category $Category
*/
class CategoriesController extends ArticleAppController {

	/**
	 * index method
	 *
	 * @return void
	 */
	public function index() {
		if ($this->request->isAjax()){
			$this->layout = null;
		}
		$this->Category->recursive = 0;
		
		if ($this->request->isGet()){
			if (!empty($this->request->named['filter'])){
				$filter = array();
				$filter['Category']['filter'] = $this->request->named['filter'];
				if (!empty($this->request->params['named']['page'])){
					$filter['Category']['page'] = $this->request->named['page'];
				}else{
					$filter['Category']['page'] = 1;
				}
				$this->request->data = am($this->request->data,$filter);
			}else{
				$filter = array();
				$filter['Category'] = $this->Cookie->read('srcPassArg');
				if (!empty($filter['Category'])){
					$this->request->data = am($this->request->data,$filter);
				}
			}
		}
		
		
		$passArg = array();
		$conditions = array();
		if (!empty($this->data['Category']) && !empty($this->data['Category']['filter'])){
			$conditions = array(' category_name LIKE '  => '%'.trim($this->data['Category']['filter']).'%');
			$passArg = $this->data['Category'];
		}
		if (!empty($this->request->params['named']['page'])){
			$passArg['page'] = $this->request->params['named']['page'];
		}else{
			if (!empty($this->request->data['Category']['page'])){
				$this->request->params['named']['page'] = $this->request->data['Category']['page'];
			}
		}
		
		//$paginate = array('limit' => 2);
		$paginate = array();
		
		if (!empty($conditions)){
			$paginate['conditions'] = $conditions;
		}
		
		//print_r($this->data);
		
		$this->paginate = $paginate;
		
		$this->set('passArg',$passArg);
		
		if (!empty($passArg)){
			$this->Cookie->write('srcPassArg',$passArg);
		}
		
		$this->set('categories', $this->paginate());
	}

	/**
	 * view method
	 *
	 * @throws NotFoundException
	 * @param string $id
	 * @return void
	 */
	public function view($id = null) {
		$this->Category->id = $id;
		if (!$this->Category->exists()) {
			throw new NotFoundException(__('Invalid category'));
		}
		$this->set('category', $this->Category->read(null, $id));
	}

	/**
	 * add method
	 *
	 * @return void
	 */
	public function add() {
		$errors = array();
		if ($this->request->is('post')) {
			$this->Category->create();
			if ($this->Category->save($this->request->data)) {
				$this->Cookie->delete('srcPassArg');
				$this->redirect(array('action' => 'index'));
			} else {
				$errors = $this->Category->validationErrors;
			}
		}
		$this->set('errors',$errors);
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
		$this->Category->id = $id;
		if (!$this->Category->exists()) {
			throw new NotFoundException(__('Invalid category'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Category->save($this->request->data)) {
				$this->redirect(array('action' => 'index'));
			} else {
				$errors = $this->Category->validationErrors;
			}
		} else {
			$this->request->data = am($this->request->data,$this->Category->read(null, $id));
		}
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
		$this->Category->id = $id;
		if (!$this->Category->exists()) {
			throw new NotFoundException(__('Invalid category'));
		}
		if ($this->Category->delete()) {
			//$this->Session->setFlash(__('Category deleted'));
			//$this->redirect(array('action' => 'index'));
		}
		//$this->Session->setFlash(__('Category was not deleted'));
		//$this->redirect(array('action' => 'index'));
	}
}
