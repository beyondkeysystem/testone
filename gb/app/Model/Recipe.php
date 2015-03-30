<?php
App::uses('AppModel', 'Model');
class Recipe extends AppModel {

////////////////////////////////////////////////////////////

	public $validate = array(
		'name' => array(
			'rule1' => array(
				'rule' => array('between', 3, 50),
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
				'rule' => array('between', 3, 50),
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
				'rule' => '/^[-a-z0-9-]{3,}$/',
				'message' => 'Only letters and integers and hyphens, min 3 characters'
			)
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
			'counterScope' => array('Recipe.active' => 1)

		),
		'Recipescategory' => array(
			'className' => 'Recipescategory',
			'foreignKey' => 'recipescategory_id',
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'counterCache' => true,
			'counterScope' => array(),
		),
		'Tradition' => array(
			'className' => 'Tradition',
			'foreignKey' => 'tradition_id',
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'counterCache' => true,
			'counterScope' => array(),
		),
		'Ustradition' => array(
			'className' => 'Ustradition',
			'foreignKey' => 'ustradition_id',
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'counterCache' => true,
			'counterScope' => array(),
		),

	);
	
////////////////////////////////////////////////////////////

	public function findList() {
		return $this->find('list', array(
			'order' => array(
				'Recipe.name' => 'ASC'
			)
		));
	}

////////////////////////////////////////////////////////////

}
