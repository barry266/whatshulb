<?php
App::uses('ProductAppModel', 'Product.Model');
/**
 * Article Model
 *
 * @property Category $Category
 */
class Product extends ProductAppModel {

/**
 * Validation rules
 *
 * @var array
 */
	public $validate = array(
		'name' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				'message' => 'Please enter the value for Product Name.',
			),
		),
		'price' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				'message' => 'Please enter the value for Product price.',
			),
		),
		/*
		'description' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				'message' => 'Please enter the value for Product description.',
			),
		),
		*/
	);


/**
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
		'User' => array(
			'className' => 'User',
			'foreignKey' => 'user_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);

	/*public function beforeSave($options = array()) {
		if (!empty($this->data['Product']['title']))
			$this->data['Product']['slug'] = Inflector::slug($this->data['Product']['title']);
		return true;
	}*/
}
