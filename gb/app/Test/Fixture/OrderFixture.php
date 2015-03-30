<?php
/**
 * OrderFixture
 *
 */
class OrderFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 10, 'key' => 'primary'),
		'order_status_id' => array('type' => 'integer', 'null' => false, 'default' => null),
		'name' => array('type' => 'string', 'null' => false, 'default' => null, 'collate' => 'utf8_unicode_ci', 'charset' => 'utf8'),
		'email' => array('type' => 'string', 'null' => false, 'default' => null, 'collate' => 'utf8_unicode_ci', 'charset' => 'utf8'),
		'phone' => array('type' => 'string', 'null' => false, 'default' => null, 'collate' => 'utf8_unicode_ci', 'charset' => 'utf8'),
		'billing_address' => array('type' => 'string', 'null' => false, 'default' => null, 'collate' => 'utf8_unicode_ci', 'charset' => 'utf8'),
		'billing_address2' => array('type' => 'string', 'null' => false, 'default' => null, 'collate' => 'utf8_unicode_ci', 'charset' => 'utf8'),
		'billing_city' => array('type' => 'string', 'null' => false, 'default' => null, 'collate' => 'utf8_unicode_ci', 'charset' => 'utf8'),
		'billing_state' => array('type' => 'string', 'null' => false, 'default' => null, 'collate' => 'utf8_unicode_ci', 'charset' => 'utf8'),
		'billing_zip' => array('type' => 'string', 'null' => false, 'default' => null, 'collate' => 'utf8_unicode_ci', 'charset' => 'utf8'),
		'billing_country' => array('type' => 'string', 'null' => false, 'default' => null, 'collate' => 'utf8_unicode_ci', 'charset' => 'utf8'),
		'shipping_address' => array('type' => 'string', 'null' => false, 'default' => null, 'collate' => 'utf8_unicode_ci', 'charset' => 'utf8'),
		'shipping_address2' => array('type' => 'string', 'null' => false, 'default' => null, 'collate' => 'utf8_unicode_ci', 'charset' => 'utf8'),
		'shipping_city' => array('type' => 'string', 'null' => false, 'default' => null, 'collate' => 'utf8_unicode_ci', 'charset' => 'utf8'),
		'shipping_state' => array('type' => 'string', 'null' => false, 'default' => null, 'collate' => 'utf8_unicode_ci', 'charset' => 'utf8'),
		'shipping_zip' => array('type' => 'string', 'null' => false, 'default' => null, 'collate' => 'utf8_unicode_ci', 'charset' => 'utf8'),
		'shipping_country' => array('type' => 'string', 'null' => false, 'default' => null, 'collate' => 'utf8_unicode_ci', 'charset' => 'utf8'),
		'weight' => array('type' => 'float', 'null' => false, 'default' => '0.00', 'length' => '10,2'),
		'subtotal' => array('type' => 'float', 'null' => false, 'default' => null, 'length' => '10,2'),
		'tax' => array('type' => 'float', 'null' => false, 'default' => null, 'length' => '10,2'),
		'shipping' => array('type' => 'float', 'null' => false, 'default' => null, 'length' => '10,2'),
		'total' => array('type' => 'float', 'null' => false, 'default' => null, 'length' => '10,2'),
		'ip_address' => array('type' => 'string', 'null' => false, 'default' => null, 'collate' => 'utf8_unicode_ci', 'charset' => 'utf8'),
		'remotehost' => array('type' => 'string', 'null' => false, 'default' => null, 'collate' => 'utf8_unicode_ci', 'charset' => 'utf8'),
		'useragent' => array('type' => 'string', 'null' => false, 'default' => null, 'collate' => 'utf8_unicode_ci', 'charset' => 'utf8'),
		'referer' => array('type' => 'string', 'null' => false, 'default' => null, 'collate' => 'utf8_unicode_ci', 'charset' => 'utf8'),
		'created' => array('type' => 'datetime', 'null' => false, 'default' => null),
		'modified' => array('type' => 'datetime', 'null' => false, 'default' => null),
		'indexes' => array(
			'PRIMARY' => array('column' => 'id', 'unique' => 1)
		),
		'tableParameters' => array('charset' => 'utf8', 'collate' => 'utf8_unicode_ci', 'engine' => 'InnoDB')
	);;

/**
 * Records
 *
 * @var array
 */
	public $records = array(
		array(
			'id' => 1,
			'order_status_id' => 1,
			'name' => 'Lorem ipsum dolor sit amet',
			'email' => 'Lorem ipsum dolor sit amet',
			'phone' => 'Lorem ipsum dolor sit amet',
			'billing_address' => 'Lorem ipsum dolor sit amet',
			'billing_address2' => 'Lorem ipsum dolor sit amet',
			'billing_city' => 'Lorem ipsum dolor sit amet',
			'billing_state' => 'Lorem ipsum dolor sit amet',
			'billing_zip' => 'Lorem ipsum dolor sit amet',
			'billing_country' => 'Lorem ipsum dolor sit amet',
			'shipping_address' => 'Lorem ipsum dolor sit amet',
			'shipping_address2' => 'Lorem ipsum dolor sit amet',
			'shipping_city' => 'Lorem ipsum dolor sit amet',
			'shipping_state' => 'Lorem ipsum dolor sit amet',
			'shipping_zip' => 'Lorem ipsum dolor sit amet',
			'shipping_country' => 'Lorem ipsum dolor sit amet',
			'weight' => 1,
			'subtotal' => 1,
			'tax' => 1,
			'shipping' => 1,
			'total' => 1,
			'ip_address' => 'Lorem ipsum dolor sit amet',
			'remotehost' => 'Lorem ipsum dolor sit amet',
			'useragent' => 'Lorem ipsum dolor sit amet',
			'referer' => 'Lorem ipsum dolor sit amet',
			'created' => '2012-11-05 04:55:54',
			'modified' => '2012-11-05 04:55:54'
		),
	);

}
