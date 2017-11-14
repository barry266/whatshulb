<?php
App::uses('AppModel', 'Model');
/**
 * Post Model
 *
 */
class Post extends AppModel {

/**
 * Display field
 *
 * @var string
 */
	public $displayField = 'title';
	
	public $actsAs = array(
  	  'Tags.Taggable',
  	  'Search.Searchable'
	);
	
	
	
	 public $filterArgs = array(
        'title' => array(
            'type' => 'like'
        ),
        'tags' => array(
            'type' => 'subquery',
            'method' => 'findByTags',
            'field' => 'Post.id'
        ));
		
	public function findByTags($data = array()) {
        $this->Tagged->Behaviors->attach('Containable', array(
                'autoFields' => false
            )
        );

		
        $this->Tagged->Behaviors->attach('Search.Searchable');
        $query = $this->Tagged->getQuery('all', array(
            'conditions' => array(
                'Tag.name' => explode(",",$data['tags'])
            ),
            'fields' => array(
                'foreign_key'
            ),
            'contain' => array(
                'Tag'
            )
        ));
        return $query;
    }
}
