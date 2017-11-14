<?php
App::uses('ArticleAppModel', 'Article.Model');
/**
 * Article Model
 *
 * @property Category $Category
 */
class Article extends ArticleAppModel {

/**
 * Validation rules
 *
 * @var array
 */
	public $validate = array(
		'article_title' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				'message' => 'Please enter the value for Article Title.',
			),
		),
		'article_date' => array(
			'date' => array(
				'rule' => array('date'),
				'message' => 'Please provide a valid date for Article Date.',
			),
		)
	);


/**
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
		'Category' => array(
			'className' => 'Category',
			'foreignKey' => 'category_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);
}
