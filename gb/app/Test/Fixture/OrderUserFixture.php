<?php
/**
 * OrderUserFixture
 *
 */
class OrderUserFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 10, 'key' => 'primary'),
		'order_id' => array('type' => 'integer', 'null' => false, 'default' => null),
		'user_id' => array('type' => 'integer', 'null' => false, 'default' => null),
		'shipping_method' => array('type' => 'string', 'null' => false, 'default' => null, 'collate' => 'utf8_unicode_ci', 'charset' => 'utf8'),
		'weight' => array('type' => 'float', 'null' => false, 'default' => '0.00', 'length' => '10,2'),
		'subtotal' => array('type' => 'float', 'null' => false, 'default' => null, 'length' => '10,2'),
		'tax' => array('type' => 'float', 'null' => false, 'default' => null, 'length' => '10,2'),
		'shipping' => array('type' => 'float', 'null' => false, 'default' => null, 'length' => '10,2'),
		'total' => array('type' => 'float', 'null' => false, 'default' => null, 'length' => '10,2'),
		'status' => array('type' => 'string', 'null' => false, 'default' => null, 'collate' => 'utf8_unicode_ci', 'charset' => 'utf8'),
		'created' => array('type' => 'datetime', 'null' => false, 'default' => null),
		'modified' => array('type' => 'datetime', 'null' => false, 'default' => null),
		'indexes' => array(
			'PRIMARY' => array('column' => 'id', 'unique' => 1)
		),
		'tableParameters' => array('charset' => 'utf8', 'collate' => 'utf8_unicode_ci', 'engine' => 'InnoDB')
	);

/**
 * Records
 *
 * @var array
 */
	public $records = array(
		array(
			'id' => 1,
			'order_id' => 1,
			'user_id' => 1,
			'shipping_method' => 'Lorem ipsum dolor sit amet',
			'weight' => 1,
			'subtotal' => 1,
			'tax' => 1,
			'shipping' => 1,
			'total' => 1,
			'status' => 'Lorem ipsum dolor sit amet',
			'created' => '2012-10-27 00:43:30',
			'modified' => '2012-10-27 00:43:30'
		),
	);

}
