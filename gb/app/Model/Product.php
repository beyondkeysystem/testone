<?php
App::uses('AppModel', 'Model');
class Product extends AppModel {

////////////////////////////////////////////////////////////

	public $validate = array(
		'name' => array(
			'rule1' => array(
				'rule' => array('between', 3, 100),
				'message' => 'invalid name',
				'allowEmpty' => false,
				'required' => true,
			),
//			'rule2' => array(
//				'rule' => array('isUnique'),
//				'message' => 'name already exists',
//				'allowEmpty' => false,
//				'required' => true,
//			),
		),
		'slug' => array(
			'rule1' => array(
				'rule' => array('between', 3, 100),
				'message' => 'invalid slug',
				'allowEmpty' => false,
				'required' => true,
			),
//			'rule2' => array(
//				'rule' => array('isUnique'),
//				'message' => 'slug already exists',
//				'allowEmpty' => false,
//				'required' => true,
//			),
			'rule3' => array(
				'rule' => '/^[a-z0-9-]{3,}$/',
				'message' => 'Only letters and integers, min 3 characters'
			)
		),
		'price_wholesale' => array(
			'rule1' => array(
				'rule' => array('decimal', 2),
				'message' => 'invalid price wholesale',
				'allowEmpty' => false,
				'required' => true,
			),
			'rule2' => array(
				'rule' => array('comparison', '>', 0),
				'message' => 'invalid price wholesale',
				'allowEmpty' => false,
				'required' => true,
			),
		),
		'price' => array(
			'rule1' => array(
				'rule' => array('decimal', 2),
				'message' => 'invalid price',
				'allowEmpty' => false,
				'required' => true,
			),
		),
	);

////////////////////////////////////////////////////////////

	public $belongsTo = array(
		'User' => array(
			'className' => 'User',
			'foreignKey' => 'user_id',
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'counterCache' => true,
			'counterScope' => array('Product.active' => 1)
		),
		'Category' => array(
			'className' => 'Category',
			'foreignKey' => 'category_id',
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'counterCache' => true,
			'counterScope' => array('Product.active' => 1)
		),
		'Subcategory' => array(
			'className' => 'Subcategory',
			'foreignKey' => 'subcategory_id',
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'counterCache' => true,
			'counterScope' => array('Product.active' => 1)
		),
		'Subsubcategory' => array(
			'className' => 'Subsubcategory',
			'foreignKey' => 'subsubcategory_id',
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'counterCache' => true,
			'counterScope' => array('Product.active' => 1)
		),
		'Ustradition' => array(
			'className' => 'Ustradition',
			'foreignKey' => 'ustradition_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Brand' => array(
			'className' => 'Brand',
			'foreignKey' => 'brand_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),

	);

////////////////////////////////////////////////////////////

	public $hasAndBelongsToMany = array(
		'Tag' => array(
			'className' => 'Tag',
			'joinTable' => 'products_tags',
			'foreignKey' => 'product_id',
			'associationForeignKey' => 'tag_id',
			'unique' => 'keepExisting',
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'finderQuery' => '',
			'deleteQuery' => '',
			'insertQuery' => ''
		),
		
	);

///////////////////////////////////////////////////////////////////

	public function displaygroups() {
		
		$displaygroups = array(
			'1' => '1',
			'2' => '2',
			'3' => '3',
			'4' => '4',
			'5' => '5',
			'6' => '6',
			'7' => '7',
			'8' => '8',
			'9' => '9',
			'10' => '10',
			'11' => '11',
			'12' => '12',
			'13' => '13',
			'14' => '14',
			'14' => '15',
			'15' => '16',
			'16' => '17',
			'17' => '17',
			'18' => '18',
			'19' => '19',
			'20' => 'Featured',
		);
		return $displaygroups;
	}
	
/////////////////////////////////////////////////////

}
