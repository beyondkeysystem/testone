<?php
App::uses('ProductsTag', 'Model');

/**
 * ProductsTag Test Case
 *
 */
class ProductsTagTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.products_tag',
		'app.product',
		'app.category',
		'app.user',
		'app.subcategory',
		'app.brand',
		'app.nutrition',
		'app.tag'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->ProductsTag = ClassRegistry::init('ProductsTag');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->ProductsTag);

		parent::tearDown();
	}

}
