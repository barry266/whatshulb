<?php
App::uses('OrderAppModel', 'Order.Model');
/**
 * Article Model
 *
 * @property Category $Category
 */
class Order extends OrderAppModel {

/**
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
		'Owner' => array(
			'className' => 'User',
			'foreignKey' => 'owner_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Buyer' => array(
			'className' => 'User',
			'foreignKey' => 'buyer_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Product' => array(
			'className' => 'Product',
			'foreignKey' => 'product_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);

	/*public function beforeSave($options = array()) {
		if (!empty($this->data['Order']['title']))
			$this->data['Order']['slug'] = Inflector::slug($this->data['Order']['title']);
		return true;
	}*/
}
