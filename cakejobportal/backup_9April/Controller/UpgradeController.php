<?php
App::uses('Controller', 'Controller');
class UpgradeController extends AppController {
	
	public $components = array('Paginator','RequestHandler', 'JobportalImage');
	var $uses = array('User','TransMember', 'JobAd','JobOptions','EmployerProfile', 'JobCountry', 'JobCity', 'JobRecInvoices', 'JobRecPaymentPlans','Notification' , 'JobAdTemp', 'PaymentsTable' , 'Plantable');
	
	
	public function beforeFilter() {
		parent::beforeFilter();
		// load Models
		//$this->Auth->allow();

		// set loggeg in user in @user variable
		if ($this->Auth->user()) {
			$this->set('user', $this->Auth->user());
		}
		// manage user authentication
		$auth_data = $this->Auth->user();
		if (isset($auth_data) && ! empty($auth_data)) {
			//if ($auth_data ['type'] == 'candidate') {
			//	$this->redirect(array(
			//		'controller' => 'candidate',
			//		'action' => 'index'
			//	));
			//}
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
            $this->set('page','jobadd');
            $auth_data = $this->Auth->user();
            if($auth_data ['type'] == 'candidate')
            {
                $this->set('user_name','Candidate');    
            }
            elseif($auth_data ['type'] == 'employer')
            {
                $this->set('user_name','Employer');   
            }
        }
}
        
        