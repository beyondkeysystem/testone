<?php
App::uses('Subsubcategory', 'Model');

/**
 * Subsubcategory Test Case
 *
 */
class SubsubcategoryTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.subsubcategory',
		'app.subcategory',
		'app.category',
		'app.user',
		'app.product',
		'app.ustradition',
		'app.nutrition',
		'app.tag',
		'app.products_tag',
		'app.recipe'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Subsubcategory = ClassRegistry::init('Subsubcategory');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Subsubcategory);

		parent::tearDown();
	}

}
