<?php
App::uses('Tradition', 'Model');

/**
 * Tradition Test Case
 *
 */
class TraditionTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.tradition'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Tradition = ClassRegistry::init('Tradition');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Tradition);

		parent::tearDown();
	}

}
