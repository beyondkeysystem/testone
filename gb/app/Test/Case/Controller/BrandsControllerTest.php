<?php
App::uses('BrandsController', 'Controller');

/**
 * BrandsController Test Case
 *
 */
class BrandsControllerTest extends ControllerTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.brand',
		'app.product',
		'app.user',
		'app.category',
		'app.subcategory',
		'app.recipe',
		'app.recipescategory',
		'app.subsubcategory',
		'app.ustradition',
		'app.tag',
		'app.products_tag'
	);

}
