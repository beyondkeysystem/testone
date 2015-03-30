<?php
App::uses('AppModel', 'Model');
class Tag extends AppModel {

////////////////////////////////////////////////////////////

	public $hasAndBelongsToMany = array(
		'Product' => array(
			'className' => 'Product',
			'joinTable' => 'products_tags',
			'foreignKey' => 'tag_id',
			'associationForeignKey' => 'product_id',
			'unique' => 'keepExisting',
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'finderQuery' => '',
			'deleteQuery' => '',
			'insertQuery' => ''
		)
	);

////////////////////////////////////////////////////////////

}
