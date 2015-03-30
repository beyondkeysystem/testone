<?php
App::uses('Controller', 'Controller');
App::uses('CakeEmail', 'Network/Email');
class ContactController extends AppController {
	
	public $components = array('Paginator','RequestHandler', 'JobportalImage');
	var $uses = array('User','TransMember', 'JobAd','JobOptions','EmployerProfile', 'JobCountry', 'JobCity', 'JobRecInvoices', 'JobRecPaymentPlans','Notification' , 'JobAdTemp', 'PaymentsTable' , 'Plantable');
	
	
	public function beforeFilter() {
		parent::beforeFilter();
		// load Models
		$this->Auth->allow('index');

		// set loggeg in user in @user variable
		if ($this->Auth->user()) {
			$this->set('user', $this->Auth->user());
		}
		// manage user authentication
		$auth_data = $this->Auth->user();
		if (isset($auth_data) && ! empty($auth_data)) {

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
		if (isset($auth_data) && ! empty($auth_data)) {
			$auth_data = $this->Auth->user();
			$this->set('auth_data',$auth_data);
		}
		else{
			$auth_data=0;
		}
		if (isset($this->request->data['con_email'])) {
                    $ContactEmail = new CakeEmail();
                    $ContactEmail->from(array($this->request->data['con_email']));
                    $ContactEmail->to('sameer@mailinator.com');
                    $ContactEmail->subject('Contact Information from Recruit Young.');
                    $ContactEmail->emailFormat('html');
                    $body = "Hello ".$this->request->data['con_fname'].",";
                    $body .=" <br/><br/><p>".$this->request->data['con_msg']."</p>";
                    $ContactEmail->send($body);
		    $this->Session->setFlash(__("Email send successfully."));
                }
	}
}
        
        