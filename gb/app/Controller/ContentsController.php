<?php
App::uses('AppController', 'Controller');
class ContentsController extends AppController {

////////////////////////////////////////////////////////////

	public $scaffold = 'admin';

////////////////////////////////////////////////////////////

	public function homepage() {

		$contents = $this->Content->find('all');
		$this->set(compact('contents'));

		$blocks = ClassRegistry::init('Block')->find('all');
		$this->set(compact('blocks'));

		$this->layout = 'homepage';

	}

////////////////////////////////////////////////////////////

}

