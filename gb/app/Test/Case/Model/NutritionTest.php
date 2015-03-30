<?php
App::uses('Nutrition', 'Model');

/**
 * Nutrition Test Case
 *
 */
class NutritionTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.nutrition',
		'app.product'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Nutrition = ClassRegistry::init('Nutrition');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Nutrition);

		parent::tearDown();
	}

}
