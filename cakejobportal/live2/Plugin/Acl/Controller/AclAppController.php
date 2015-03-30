<?php

class AclAppController extends AppController {

/**
 * beforeFilter
 *
 * @return void
 */
	public function beforeFilter() {
		parent::beforeFilter();
	}

	  var $components = array('RequestHandler');

}
