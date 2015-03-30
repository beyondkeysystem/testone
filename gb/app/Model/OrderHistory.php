<?php
App::uses('AppModel', 'Model');
class OrderHistory extends AppModel {

////////////////////////////////////////////////////////////

	public $belongsTo = array(
		'Order' => array(
			'className' => 'Order',
			'foreignKey' => 'order_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'OrderStatus' => array(
			'className' => 'OrderStatus',
			'foreignKey' => 'order_status_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);

////////////////////////////////////////////////////////////

}
