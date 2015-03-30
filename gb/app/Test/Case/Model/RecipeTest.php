<?php
App::uses('Recipe', 'Model');

/**
 * Recipe Test Case
 *
 */
class RecipeTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.recipe',
		'app.user',
		'app.product',
		'app.category',
		'app.subcategory',
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
		$this->Recipe = ClassRegistry::init('Recipe');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Recipe);

		parent::tearDown();
	}

}
