<?php
App::uses('NutritionsController', 'Controller');

/**
 * NutritionsController Test Case
 *
 */
class NutritionsControllerTest extends ControllerTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.nutrition',
		'app.product',
		'app.user',
		'app.category',
		'app.subcategory',
		'app.recipe',
		'app.subsubcategory',
		'app.ustradition',
		'app.tag',
		'app.products_tag'
	);

}
