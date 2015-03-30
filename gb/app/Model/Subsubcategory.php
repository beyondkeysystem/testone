<?php
App::uses('AppModel', 'Model');
class Subsubcategory extends AppModel {

////////////////////////////////////////////////////////////

	public $validate = array(
		'name' => array(
			'rule1' => array(
				'rule' => array('between', 3, 100),
				'message' => 'invalid name',
				'allowEmpty' => false,
				'required' => true,
			),
			'rule2' => array(
				'rule' => array('isUnique'),
				'message' => 'name already exists',
				'allowEmpty' => false,
				'required' => true,
			),
		),
		'slug' => array(
			'rule1' => array(
				'rule' => array('between', 3, 100),
				'message' => 'invalid slug',
				'allowEmpty' => false,
				'required' => true,
			),
			'rule2' => array(
				'rule' => array('isUnique'),
				'message' => 'slug already exists',
				'allowEmpty' => false,
				'required' => true,
			),
			'rule3' => array(
				'rule' => '/^[a-z0-9-]{3,}$/',
				'message' => 'Only letters and integers, min 3 characters'
			)
		),
	);

////////////////////////////////////////////////////////////

	public $belongsTo = array(
		'Subcategory' => array(
			'className' => 'Subcategory',
			'foreignKey' => 'subcategory_id',
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'counterCache' => true,
		)
	);

////////////////////////////////////////////////////////////

	public $hasMany = array(
		'Product' => array(
			'className' => 'Product',
			'foreignKey' => 'subsubcategory_id',
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

////////////////////////////////////////////////////////////

	public function findChain() {
		$subsubcategories1 = $this->find('all', array(
			'recursive' => -1,
			'fields'=> array(
				'Subsubcategory.id',
				'Subsubcategory.subcategory_id',
				'Subsubcategory.name',
			),
			'order' => array(
				'Subsubcategory.name' => 'ASC'
			)
		));
		foreach($subsubcategories1 as $subsubcategory) {
			$subsubcategories[$subsubcategory['Subsubcategory']['id']] = array('name' => $subsubcategory['Subsubcategory']['name'], 'value' => $subsubcategory['Subsubcategory']['id'], 'class' => $subsubcategory['Subsubcategory']['subcategory_id']);
		}
		return $subsubcategories;
	}

////////////////////////////////////////////////////////////

}
