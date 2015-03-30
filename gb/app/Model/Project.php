<?php
App::uses('AppModel', 'Model');
class Project extends AppModel {

////////////////////////////////////////////////////////////

	public $belongsTo = array(
		'Projectcategory' => array(
			'className' => 'Projectcategory',
			'foreignKey' => 'projectcategory_id',
			'conditions' => '',
			'fields' => '',
			'order' => '',
		)
	);
	
////////////////////////////////////////////////////////////

	public function sources() {
		$sources = array(
			'-' => '-',
			'SF Fancy FD 2013' => 'SF Fancy FD 2013',
			'SF Fancy FD 2012' => 'SF Fancy FD 2012',
			'Nat Prod Expo W 2013' => 'Nat Prod Expo W 2013',
			'Nat Prod Expo W 2012' => 'Nat Prod Expo W 2012',
			'SM Choc Show 2013' => 'SM Choc Show 2013',
			'LA Show Mart 2013' => 'LA Show Mart 2013',
			'LA Show Mart 2012' => 'LA Show Mart 2012',
			'Internet' => 'Internet',
			'Farmers Market' => 'Farmers Market',
			'Advertisement' => 'Advertisement',
			'Referral' => 'Referral',
			
		);
		return $sources;
	}


////////////////////////////////////////////////////////////

	public function persons() {
		$persons  = array(
			'-' => '-',
			'Jon' => 'Jon',
			'Cari' => 'Cari',
			'Sharon' => 'Sharon',
			'JC' => 'JC',
		);
		return $persons;
	}

////////////////////////////////////////////////////////////	
	
}
