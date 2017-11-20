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
		$this->set('users', $this->User->find('all'));
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
	 if (!$this->User->exists($id)) {
		 throw new NotFoundException(__('Invalid Creator'));
	 }
	 $this->set('user', $this->User->read(null, $id));
 }

}
