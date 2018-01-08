<?php
App::uses('AppController', 'Controller');
/**
 * Reviews Controller
 *
 * @property Review $Review
 */
class ReviewsController extends AppController {

/**
 * add method
 *
 * @param string $id
 */
 public function add($id = null) {
	$this->autoRender = false;
 	$this->loadModel('Comment');
	$this->loadModel('User');
 	if ($this->request->is('post')) {
 		$this->Comment->create();
		$this->request->data['Comment']['product_id']=$id;
 		$this->Comment->save($this->request->data);
		return $this->redirect(array('controller' => 'items', 'action' => 'view',$id));
 	}
 }

}
