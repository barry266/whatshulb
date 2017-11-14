<?php
App::uses('ArticleAppController', 'Article.Controller');
/**
 * Articles Controller
 *
 * @property Article $Article
*/
class ArticlesController extends ArticleAppController {

	/**
	 * index method
	 *
	 * @return void
	 */
	public function index() {
		if ($this->request->isAjax()){
			$this->layout = null;
		}
		$this->Article->recursive = 0;
		
		if ($this->request->isGet()){
			if (!empty($this->request->named['filter'])){
				$filter = array();
				$filter['Article']['filter'] = $this->request->named['filter'];
				if (!empty($this->request->params['named']['page'])){
					$filter['Article']['page'] = $this->request->named['page'];
				}else{
					$filter['Article']['page'] = 1;
				}
				$this->request->data = am($this->request->data,$filter);
			}else{
				$filter = array();
				$filter['Article'] = $this->Cookie->read('srcPassArg');
				if (!empty($filter['Article'])){
					$this->request->data = am($this->request->data,$filter);
				}
			}
		}
		
		
		$passArg = array();
		$conditions = array();
		if (!empty($this->data['Article']) && !empty($this->data['Article']['filter'])){
			$conditions = array(' article_title LIKE '  => '%'.trim($this->data['Article']['filter']).'%');
			$passArg = $this->data['Article'];
		}
		if (!empty($this->request->params['named']['page'])){
			$passArg['page'] = $this->request->params['named']['page'];
		}else{
			if (!empty($this->request->data['Article']['page'])){
				$this->request->params['named']['page'] = $this->request->data['Article']['page'];
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
		
		$this->set('articles', $this->paginate());
	}

	/**
	 * view method
	 *
	 * @throws NotFoundException
	 * @param string $id
	 * @return void
	 */
	public function view($id = null) {
		$this->Article->id = $id;
		if (!$this->Article->exists()) {
			throw new NotFoundException(__('Invalid article'));
		}
		$this->set('article', $this->Article->read(null, $id));
	}

	/**
	 * add method
	 *
	 * @return void
	 */
	public function add() {
		$errors = array();
		if ($this->request->is('post')) {
			$this->Article->create();
			if ($this->Article->save($this->request->data)) {
				$this->Cookie->delete('srcPassArg');
				$this->redirect(array('action' => 'index'));
			} else {
				$errors = $this->Article->validationErrors;
			}
		}
		$categories = $this->Article->Category->find('list',array(
				'fields' => array('Category.id', 'Category.category_name'),
		));
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
		$this->Article->id = $id;
		if (!$this->Article->exists()) {
			throw new NotFoundException(__('Invalid article'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Article->save($this->request->data)) {
				$this->redirect(array('action' => 'index'));
			} else {
				$errors = $this->Article->validationErrors;
			}
		} else {
			$this->request->data = am($this->request->data,$this->Article->read(null, $id));
		}
		$categories = $this->Article->Category->find('list',array(
				'fields' => array('Category.id', 'Category.category_name'),
		));
		$this->set('errors',$errors);
		$this->set(compact('categories'));
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
		$this->Article->id = $id;
		if (!$this->Article->exists()) {
			throw new NotFoundException(__('Invalid article'));
		}
		if ($this->Article->delete()) {
			//$this->Session->setFlash(__('Article deleted'));
			//$this->redirect(array('action' => 'index'));
		}
		//$this->Session->setFlash(__('Article was not deleted'));
		//$this->redirect(array('action' => 'index'));
	}
}
