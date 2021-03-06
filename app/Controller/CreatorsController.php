<?php
App::uses('AppController', 'Controller');
/**
 * Creators Controller
 *
 * @property Creator $Creator
 */
class CreatorsController extends AppController {

 /* index method
 *
 * @return void
 */
	public function index() {
		$this->loadModel('User');
		$this->set('users', $this->User->find(('all'),array('conditions' => array('User.user_status' => array(0,1), 'User.role' => array(1,2), ))));

  }

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
 public function view($id = null) {
	 $this->loadModel('User');
	 $this->loadModel('Product');
	 if (!$this->User->exists($id)) {
		 throw new NotFoundException(__('Invalid Creator'));
	 }
	 $this->set('user', $this->User->read(null, $id));
	 $this->set('products', $this->Product->find(('all'),array('conditions' => array('Product.user_id' => $id, 'Product.active' => 1))));

 }

}
