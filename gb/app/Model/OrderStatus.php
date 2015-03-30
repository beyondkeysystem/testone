<?php
App::uses('AppModel', 'Model');
class OrderStatus extends AppModel {

////////////////////////////////////////////////////////////

	public $hasMany = array(
		'Order' => array(
			'className' => 'Order',
			'foreignKey' => 'order_status_id',
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

}
