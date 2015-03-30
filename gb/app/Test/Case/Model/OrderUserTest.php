<?php
App::uses('OrderUser', 'Model');

/**
 * OrderUser Test Case
 *
 */
class OrderUserTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.order_user',
		'app.order',
		'app.order_item',
		'app.user',
		'app.product',
		'app.category',
		'app.subcategory',
		'app.recipe',
		'app.subsubcategory',
		'app.ustradition',
		'app.nutrition',
		'app.tag',
		'app.products_tag'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->OrderUser = ClassRegistry::init('OrderUser');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->OrderUser);

		parent::tearDown();
	}

}
