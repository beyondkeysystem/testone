<?php
App::uses('Recipescategory', 'Model');

/**
 * Recipescategory Test Case
 *
 */
class RecipescategoryTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.recipescategory',
		'app.recipe',
		'app.user',
		'app.product',
		'app.category',
		'app.subcategory',
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
		$this->Recipescategory = ClassRegistry::init('Recipescategory');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Recipescategory);

		parent::tearDown();
	}

}
