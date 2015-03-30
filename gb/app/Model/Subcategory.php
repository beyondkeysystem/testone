<?php
App::uses('AppModel', 'Model');
class Subcategory extends AppModel {

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
		'Category' => array(
			'className' => 'Category',
			'foreignKey' => 'category_id',
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
			'foreignKey' => 'subcategory_id',
			'dependent' => false,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		),
		'Recipe' => array(
			'className' => 'Recipe',
			'foreignKey' => 'subcategory_id',
			'dependent' => false,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		),
		'Subsubcategory' => array(
			'className' => 'Subsubcategory',
			'foreignKey' => 'subcategory_id',
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
		$subcategories1 = $this->find('all', array(
			'recursive' => -1,
			'fields'=> array(
				'Subcategory.id',
				'Subcategory.category_id',
				'Subcategory.name',
			),
			'order' => array(
				'Subcategory.name' => 'ASC'
			)
		));
		foreach($subcategories1 as $subcategory) {
			$subcategories[$subcategory['Subcategory']['id']] = array('name' => $subcategory['Subcategory']['name'], 'value' => $subcategory['Subcategory']['id'], 'class' => $subcategory['Subcategory']['category_id']);
		}
		return $subcategories;
	}

////////////////////////////////////////////////////////////

}
