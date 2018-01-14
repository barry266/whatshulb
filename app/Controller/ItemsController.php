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
		$this->set('notactives', $this->Product->find('all', array(
		    'conditions' => array('Product.active' => 0))));
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
	 $this->loadModel('User');
	 $this->loadModel('Comment');
	 $product = $this->Product->read(null, $id);

	 $comments = $this->Comment->find('all', array(
				'conditions' => array('Comment.product_id' => $product['Product']['id'], 'Comment.active' => '1'),
				'recursive' => 0,
				'order' => array('Comment.created' => 'desc')
		));

		$alluser = array();
		foreach($comments as $comment){
			array_push($alluser,$comment['Comment']['user_id']);
		};
		$alluser = array_unique($alluser);

		if (empty($alluser)){
			$user = array();
		}	elseif(sizeof($alluser) > 1) {
			$user = $this->User->find('list', array(
	         'fields' => array('User.user_name'),
	         'conditions' => array('User.id IN' => $alluser),
	         'recursive' => 0
	     ));
		} else {
			$user = $this->User->find('list', array(
	         'fields' => array('User.user_name'),
	         'conditions' => array('User.id' => array_shift($alluser)),
	         'recursive' => 0
	     ));
		}


	 if (!$this->Product->exists($id)) {
		 throw new NotFoundException(__('Invalid Item'));
	 }

	 $this->set(compact('user'));
	 $this->set(compact('product'));
	 $this->set(compact('comments'));
 }

}
