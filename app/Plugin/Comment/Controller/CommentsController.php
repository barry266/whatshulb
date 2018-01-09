<?php
App::uses('CommentAppController', 'Comment.Controller');
/**
 * Comments Controller
 *
 * @property Comment $Comment
*/
class CommentsController extends CommentAppController {

	/**
	 * index method
	 *
	 * @return void
	 */
	public function index() {
		if ($this->request->isAjax()){
			$this->layout = null;
		}
		$this->Comment->recursive = 0;

		if ($this->request->isGet()){
			if (!empty($this->request->named['filter'])){
				$filter = array();
				$filter['Comment']['filter'] = $this->request->named['filter'];
				if (!empty($this->request->params['named']['page'])){
					$filter['Comment']['page'] = $this->request->named['page'];
				}else{
					$filter['Comment']['page'] = 1;
				}
				$this->request->data = am($this->request->data,$filter);
			}else{
				$filter = array();
				$filter['Comment'] = $this->Cookie->read('srcPassArg');
				if (!empty($filter['Comment'])){
					$this->request->data = am($this->request->data,$filter);
				}
			}
		}


		$passArg = array();
		$conditions = array();
		if (!empty($this->data['Comment']) && !empty($this->data['Comment']['filter'])){
			$conditions = array(' comment_title LIKE '  => '%'.trim($this->data['Comment']['filter']).'%');
			$passArg = $this->data['Comment'];
		}
		if (!empty($this->request->params['named']['page'])){
			$passArg['page'] = $this->request->params['named']['page'];
		}else{
			if (!empty($this->request->data['Comment']['page'])){
				$this->request->params['named']['page'] = $this->request->data['Comment']['page'];
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

		$this->set('comments', $this->paginate());

		$this->loadModel('Product');
 	 	$this->loadModel('User');

		$this->set('users', $this->User->find('list', array('fields' => array('User.user_name'))));
		$this->set('products', $this->Product->find('list', array('fields' => array('Product.name'))));
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
		$this->Comment->id = $id;
		if (!$this->Comment->exists()) {
			throw new NotFoundException(__('Invalid comment'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Comment->save($this->request->data)) {
				$this->redirect(array('action' => 'index'));
			} else {
				$errors = $this->Comment->validationErrors;
			}
		} else {
			$this->request->data = am($this->request->data,$this->Comment->read(null, $id));
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
		$this->Comment->id = $id;
		if (!$this->Comment->exists()) {
			throw new NotFoundException(__('Invalid comment'));
		}
		if ($this->Comment->delete()) {
			//$this->Session->setFlash(__('Comment deleted'));
			//$this->redirect(array('action' => 'index'));
		}
		//$this->Session->setFlash(__('Comment was not deleted'));
		//$this->redirect(array('action' => 'index'));
	}
}
