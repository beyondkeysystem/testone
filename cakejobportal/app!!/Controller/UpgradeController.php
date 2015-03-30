<?php
App::uses('Controller', 'Controller');
class UpgradeController extends AppController {
	
	public $components = array('Paginator','RequestHandler', 'JobportalImage');
	var $uses = array('User','TransMember', 'JobAd','JobOptions','EmployerProfile', 'JobCountry', 'JobCity', 'JobRecInvoices', 'JobRecPaymentPlans','Notification' , 'JobAdTemp', 'PaymentsTable' , 'Plantable');
	
	
	public function beforeFilter() {
		parent::beforeFilter();
		// load Models
		//$this->Auth->allow();
$this->Auth->allow('index');
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
		error_reporting(2);
            $this->set('page','jobadd');
            $this->set('check_page','upgrade');
	    $auth_data = $this->Auth->user();
            if($auth_data ['type'] == 'candidate')
            {
                $this->set('user_type','Candidate');
		$plan_data = $this->Plantable->getPlanByUserType($auth_data ['type']);
		$this->set('plan_data',$plan_data);
            }
            elseif($auth_data ['type'] == 'employer')
            {
                
		$check_job = $this->PaymentsTable->getTrackPaymentsByUserCurrentStatus($auth_data['id']);
		if(isset($check_job) AND count($check_job) > 0)
		{
			$this->set('user_type','Job_Adverting');
			$type = 'job_advertising';
			$plan_data = $this->Plantable->getPlanByUserType($type);
			$this->set('plan_data',$plan_data);
			//pr($plan_data);
			//die;
		}
		else
		{
			$plan_data = $this->Plantable->getPlanByUserType($auth_data ['type']);
			$this->set('plan_data',$plan_data);
			//pr($plan_data);
			//die;
			$this->set('user_type','Employer');
		}
            }
	    else
	    {
		//$plan_data = $this->Plantable->getPlantable();
		$plan_data_emp = $this->Plantable->getPlanByUserType('employer');
		$plan_data_job = $this->Plantable->getPlanByUserType('job_advertising');
		$plan_data_can = $this->Plantable->getPlanByUserType('candidate');
		$this->set('plan_data_emp',$plan_data_emp);
		$this->set('plan_data_can',$plan_data_can);
		$this->set('plan_data_job',$plan_data_job);
		
		$this->set('user_type','All');

		
	    }
	    
        }
}
        
        