<?php
App::uses('AppController', 'Controller');
/**
 * Items Controller
 *
 * @property Item $Item
 */
class ItemsController extends AppController {

 /* index method
 *
 * @return void
 */
	public function index() {
		$this->loadModel('Product');
		$this->set('products', $this->Product->find('all', array(
        'conditions' => array('Product.active' => 1))));
  }

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
 public function view($id = null) {
	 $this->loadModel('Product');
	 if (!$this->Product->exists($id)) {
		 throw new NotFoundException(__('Invalid Item'));
	 }
	 $this->set('product', $this->Product->read(null, $id));
 }

}
