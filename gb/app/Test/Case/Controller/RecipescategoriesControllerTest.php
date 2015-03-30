<?php
App::uses('RecipescategoriesController', 'Controller');

/**
 * RecipescategoriesController Test Case
 *
 */
class RecipescategoriesControllerTest extends ControllerTestCase {

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

}
