<?php
App::uses('Cart', 'Model');

/**
 * Cart Test Case
 *
 */
class CartTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.cart',
		'app.product',
		'app.user',
		'app.category',
		'app.subcategory',
		'app.recipe',
		'app.recipescategory',
		'app.subsubcategory',
		'app.ustradition',
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
		$this->Cart = ClassRegistry::init('Cart');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Cart);

		parent::tearDown();
	}

}
