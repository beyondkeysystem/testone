<?php
App::uses('OrderUsersController', 'Controller');

/**
 * OrderUsersController Test Case
 *
 */
class OrderUsersControllerTest extends ControllerTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.order_user',
		'app.order',
		'app.order_item',
		'app.user',
		'app.product',
		'app.category',
		'app.subcategory',
		'app.recipe',
		'app.subsubcategory',
		'app.ustradition',
		'app.nutrition',
		'app.tag',
		'app.products_tag'
	);

}
