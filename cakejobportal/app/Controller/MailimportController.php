<?php
App::uses('Controller', 'Controller');
class MailimportController extends AppController {
	
	public $components = array('Paginator','RequestHandler', 'JobportalImage');
	var $uses = array('User','TransMember','UpgradeCategory','TrackJobAdvert', 'JobAd','JobOptions','EmployerProfile', 'JobCountry', 'JobCity', 'JobRecInvoices', 'JobRecPaymentPlans','Notification' , 'JobAdTemp', 'PaymentsTable' , 'Plantable');
        
        public function beforeFilter() {
		parent::beforeFilter();
		// load Models
		$this->Auth->allow('index','oauth');
		$this->loadModel('User');
		$this->loadModel('DmeAssignPatient');
		$this->loadModel('Report');
		// set loggeg in user in @user variable
		if ($this->Auth->user()) {
			$this->set('user', $this->Auth->user());
		}
		// manage user authentication
		$auth_data = $this->Auth->user();
		if (isset($auth_data) && ! empty($auth_data)) {
			if ($auth_data ['type'] == 'candidate') {
				$this->redirect(array(
					'controller' => 'candidate',
					'action' => 'index'
				));
			}
			if ($auth_data ['type'] == 'admin') {
				$this->redirect(array(
					'controller' => 'admin',
					'action' => 'index'
				));
			}
		}
		// end of authentication
	}
        
        
        function index()
        {
            
        }
        function oauth()
        {
            error_reporting(2);
        }
        
}
