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
		'title' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				'message' => 'Please enter the value for Product Title.',
			),
		),
		'slug' => array(
			'unique' => array(
				'rule' => array('isUnique'),
				'message' => 'Duplicated slug.',
			),
		)		
	);


/**
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
		'User' => array(
			'className' => 'User',
			'foreignKey' => 'owner_id',
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
