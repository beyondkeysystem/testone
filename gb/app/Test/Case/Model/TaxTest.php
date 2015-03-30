<?php
App::uses('Tax', 'Model');

/**
 * Tax Test Case
 *
 */
class TaxTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.tax',
		'app.user',
		'app.product',
		'app.category',
		'app.subcategory',
		'app.recipe',
		'app.recipescategory',
		'app.tradition',
		'app.ustradition',
		'app.subsubcategory',
		'app.brand',
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
		$this->Tax = ClassRegistry::init('Tax');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Tax);

		parent::tearDown();
	}

}
