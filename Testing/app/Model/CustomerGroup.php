<?php
class CustomerGroup extends AppModel{

	 public $name = 'CustomerGroup';
         public $validate = array(
	 'name' => array(
		   'require' => array(
		       'rule' => '/.+/',
		       'message' => 'Customer Group Name must be between 3 and 32 characters!'
		   ),
		   'between' => array(
		       'rule'    => array('lengthBetween', 3, 32),
		       'message' => 'Customer Group Name must be between 3 and 32 characters!'
		   ),
		   'isUnique' => array(
		       'rule'    => 'isUnique',
		       'message' => 'This name has already been taken!'
		   )
	       ),
	 );
	 
	 public $hasMany = array(
		'Customer' => array(
			'className' => 'Customer',
			'foreignKey' => 'customer_group_id',
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
?>