<?php
App::uses('OrderHistory', 'Model');

/**
 * OrderHistory Test Case
 *
 */
class OrderHistoryTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.order_history',
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
		$this->OrderHistory = ClassRegistry::init('OrderHistory');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->OrderHistory);

		parent::tearDown();
	}

}
