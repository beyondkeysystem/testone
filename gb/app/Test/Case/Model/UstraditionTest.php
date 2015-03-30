<?php
App::uses('Ustradition', 'Model');

/**
 * Ustradition Test Case
 *
 */
class UstraditionTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.ustradition',
		'app.product',
		'app.user',
		'app.category',
		'app.subcategory',
		'app.subsubcategory',
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
		$this->Ustradition = ClassRegistry::init('Ustradition');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Ustradition);

		parent::tearDown();
	}

}
