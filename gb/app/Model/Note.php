<?php
App::uses('AppModel', 'Model');
class Note extends AppModel {

////////////////////////////////////////////////////////////

	public $validate = array(
		'name' => array(
			'between' => array(
				'rule' => array('between', 3, 50),
				'message' => 'Invalid Name',
				'allowEmpty' => false,
				'required' => true,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'note' => array(
			'between' => array(
				'rule' => array('between', 3, 1500),
				'message' => 'Invalid Note',
				'allowEmpty' => false,
				'required' => true,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
	);

////////////////////////////////////////////////////////////


	public function getNotes() {

		$notes = $this->find('all', array(
			'fields' => array(
				'Note.id',
				'Note.name',
				'Note.priority',
				'Note.author',
			),
			'order' => array(
				//'Note.priority' => 'DESC',
				'Note.id' => 'ASC'
			),
		));

		return $notes;
	}


////////////////////////////////////////////////////////////

	public function priorities() {
		$priorities = array(
			'-' => '-',
			'H' => 'H',
			'N' => 'N',
			'L' => 'L',
			'D' => 'Discuss',
			'A' => 'Addressed',
		);
		return $priorities;
	}

////////////////////////////////////////////////////////////

	public function authors() {
		$authors = array(
			'-' => '-',
			'Jon' => 'Jon',
			'Cari' => 'Cari',
			'Sharon' => 'Sharon',
			'JC' => 'JC',
			'Eddie' => 'Eddie',
		);
		return $authors;
	}



}
