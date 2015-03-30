<?php
App::uses('AppController', 'Controller');
class VisitorsController extends AppController {

////////////////////////////////////////////////////////////

	public function __index() {
		include(WWW_ROOT . '/t/geoip.inc');
		include(WWW_ROOT . '/t/geoipcity.inc');
		include(WWW_ROOT . '/t/geoipregionvars.php');
		$geodb = geoip_open(WWW_ROOT . 't/GeoLiteCity.dat', GEOIP_STANDARD);
		$visitors = $this->Visitor->find('all', array(
			'conditions' => array(
				'Visitor.country_code' => ''
			),
			'limit' => 1000
		));
		foreach($visitors as $visitor) {
			$geo = geoip_record_by_addr($geodb, $visitor['Visitor']['ip']);
			$data['Visitor']['id'] = $visitor['Visitor']['id'];
			$data['Visitor']['country_code'] = $geo->country_code;
			$data['Visitor']['region'] = $geo->region;
			$data['Visitor']['city'] = $geo->city;
			$this->Visitor->save($data, false);
//			print_r($data);
		}
		die('vege');
	}

////////////////////////////////////////////////////////////

	public function admin_index() {
		$this->paginate = array(
			'recursive' => -1,
			'order' => array(
				'Visitor.created' => 'DESC'
			),
			'limit' => 100
		);
		$visitors = $this->paginate('Visitor');
		$this->set(compact('visitors'));
	}

////////////////////////////////////////////////////////////

	public function admin_keywordsall() {
		$this->paginate = array(
			'recursive' => -1,
			'conditions' => array(
				'Visitor.keyword >' => ''
			),
			'order' => array(
				'Visitor.created' => 'DESC'
			),
			'limit' => 100
		);
		$visitors = $this->paginate('Visitor');
		$this->set(compact('visitors'));
		$this->render('admin_index');
	}

////////////////////////////////////////////////////////////

	public function admin_keywords() {
		$this->paginate = array(
			'recursive' => -1,
			'conditions' => array(
				'Visitor.keyword >' => '',
				'Visitor.referrer NOT LIKE ' => '%aclk%'
			),
			'order' => array(
				'Visitor.created' => 'DESC'
			),
			'limit' => 100
		);
		$visitors = $this->paginate('Visitor');
		$this->set(compact('visitors'));
		$this->render('admin_index');
	}

////////////////////////////////////////////////////////////

	public function admin_adwords() {
		$this->paginate = array(
			'recursive' => -1,
			'conditions' => array(
				'Visitor.referrer LIKE ' => '%aclk%'
			),
			'order' => array(
				'Visitor.created' => 'DESC'
			),
			'limit' => 100
		);
		$visitors = $this->paginate('Visitor');
		$this->set(compact('visitors'));
		$this->render('admin_index');
	}

////////////////////////////////////////////////////////////

	public function admin_daily() {
		$visitors = $this->Visitor->find('all', array(
			'recursive' => -1,
			'fields' => array(
				'COUNT(id) as count',
				'Visitor.created_date'
			),
			'order' => array(
				'Visitor.created_date' => 'DESC'
			),
			'group' => array(
				'Visitor.created_date'
			),
			'limit' => 100
		));
		$this->set(compact('visitors'));
	}

////////////////////////////////////////////////////////////

	public function admin_view($id = null) {
		$this->Visitor->id = $id;
		if (!$this->Visitor->exists()) {
			throw new NotFoundException(__('Invalid visitor'));
		}
		$this->set('visitor', $this->Visitor->read(null, $id));
	}

////////////////////////////////////////////////////////////

}
