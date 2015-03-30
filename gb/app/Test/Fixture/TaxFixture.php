<?php
/**
 * TaxFixture
 *
 */
class TaxFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'key' => 'primary'),
		'user_id' => array('type' => 'integer', 'null' => true, 'default' => null),
		'check' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 4),
		'total_food_tax_in_state' => array('type' => 'integer', 'null' => true, 'default' => null),
		'total_food_tax_out_state' => array('type' => 'integer', 'null' => true, 'default' => null),
		'local_sales_tax_in_state' => array('type' => 'integer', 'null' => true, 'default' => null),
		'local_sales_tax_out_state' => array('type' => 'integer', 'null' => true, 'default' => null),
		'total_non_food_tax_in_state' => array('type' => 'integer', 'null' => true, 'default' => null),
		'total_non_food_tax_out_state' => array('type' => 'integer', 'null' => true, 'default' => null),
		'local_use_tax_in_state' => array('type' => 'integer', 'null' => true, 'default' => null),
		'local_use_tax_out_state' => array('type' => 'integer', 'null' => true, 'default' => null),
		'created' => array('type' => 'datetime', 'null' => true, 'default' => null),
		'modified' => array('type' => 'datetime', 'null' => true, 'default' => null),
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
			'user_id' => 1,
			'check' => 1,
			'total_food_tax_in_state' => 1,
			'total_food_tax_out_state' => 1,
			'local_sales_tax_in_state' => 1,
			'local_sales_tax_out_state' => 1,
			'total_non_food_tax_in_state' => 1,
			'total_non_food_tax_out_state' => 1,
			'local_use_tax_in_state' => 1,
			'local_use_tax_out_state' => 1,
			'created' => '2013-02-07 12:27:52',
			'modified' => '2013-02-07 12:27:52'
		),
	);

}
