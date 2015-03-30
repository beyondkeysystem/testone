<?php
/**
 * NutritionFixture
 *
 */
class NutritionFixture extends CakeTestFixture {

/**
 * Table name
 *
 * @var string
 */
	public $table = 'nutrition';

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'nutrition_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'key' => 'primary'),
		'product_id' => array('type' => 'integer', 'null' => true, 'default' => null),
		'serv_size' => array('type' => 'string', 'null' => true, 'default' => null, 'length' => 100, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'serv_per_cont' => array('type' => 'integer', 'null' => true, 'default' => null),
		'cal' => array('type' => 'integer', 'null' => true, 'default' => null),
		'cal_fat' => array('type' => 'integer', 'null' => true, 'default' => null),
		'total_fat' => array('type' => 'integer', 'null' => true, 'default' => null),
		'sat_fat' => array('type' => 'integer', 'null' => true, 'default' => null),
		'trans_fat' => array('type' => 'integer', 'null' => true, 'default' => null),
		'chol' => array('type' => 'integer', 'null' => true, 'default' => null),
		'sodium' => array('type' => 'integer', 'null' => true, 'default' => null),
		'carbo' => array('type' => 'integer', 'null' => true, 'default' => null),
		'fiber' => array('type' => 'integer', 'null' => true, 'default' => null),
		'sugar' => array('type' => 'integer', 'null' => true, 'default' => null),
		'protein' => array('type' => 'integer', 'null' => true, 'default' => null),
		'vit_A' => array('type' => 'integer', 'null' => true, 'default' => null),
		'vit_C' => array('type' => 'integer', 'null' => true, 'default' => null),
		'calcium' => array('type' => 'integer', 'null' => true, 'default' => null),
		'iron' => array('type' => 'integer', 'null' => true, 'default' => null),
		'daily_value' => array('type' => 'integer', 'null' => true, 'default' => null),
		'indexes' => array(
			'PRIMARY' => array('column' => 'nutrition_id', 'unique' => 1)
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
			'nutrition_id' => 1,
			'product_id' => 1,
			'serv_size' => 'Lorem ipsum dolor sit amet',
			'serv_per_cont' => 1,
			'cal' => 1,
			'cal_fat' => 1,
			'total_fat' => 1,
			'sat_fat' => 1,
			'trans_fat' => 1,
			'chol' => 1,
			'sodium' => 1,
			'carbo' => 1,
			'fiber' => 1,
			'sugar' => 1,
			'protein' => 1,
			'vit_A' => 1,
			'vit_C' => 1,
			'calcium' => 1,
			'iron' => 1,
			'daily_value' => 1
		),
	);

}
