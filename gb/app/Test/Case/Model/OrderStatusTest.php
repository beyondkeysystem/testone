<?php
App::uses('OrderStatus', 'Model');

/**
 * OrderStatus Test Case
 *
 */
class OrderStatusTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.order_status',
		'app.order',
		'app.order_user',
		'app.user',
		'app.product',
		'app.category',
		'app.subcategory',
		'app.recipe',
		'app.subsubcategory',
		'app.ustradition',
		'app.nutrition',
		'app.tag',
		'app.products_tag',
		'app.order_item'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->OrderStatus = ClassRegistry::init('OrderStatus');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->OrderStatus);

		parent::tearDown();
	}

}
