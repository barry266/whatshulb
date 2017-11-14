<?php
App::uses('ArticleAppModel', 'Article.Model');
/**
 * Category Model
 *
 * @property Article $Article
*/
class Category extends ArticleAppModel {


	/**
	 * Validation rules
	 *
	 * @var array
	 */
	public $validate = array(
			'category_name' => array(
					'notempty' => array(
							'rule' => array('notempty'),
							'message' => 'Please enter the value for Category Name.',
					),
			)
	);
	/**
	 * hasMany associations
	 *
	 * @var array
	*/
	public $hasMany = array(
			'Article' => array(
					'className' => 'Article',
					'foreignKey' => 'category_id',
					'dependent' => false,
					'conditions' => '',
					'fields' => '',
					'order' => '',
					'limit' => '',
					'offset' => '',
					'exclusive' => '',
					'finderQuery' => '',
					'counterQuery' => ''
			)
	);

}
