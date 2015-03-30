<?php
App::uses('Projectcategory', 'Model');

/**
 * Projectcategory Test Case
 *
 */
class ProjectcategoryTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.projectcategory',
		'app.project'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Projectcategory = ClassRegistry::init('Projectcategory');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Projectcategory);

		parent::tearDown();
	}

}
