<?php
App::uses('Controller', 'Controller');
App::uses('CakeEmail', 'Network/Email');
class ContactController extends AppController {
	
	var $name = 'Contact';
	public $components = array('Session','Paginator','RequestHandler', 'JobportalImage');
	var $uses = array('Contact','User','TransMember', 'JobAd','JobOptions','EmployerProfile', 'JobCountry', 'JobCity', 'JobRecInvoices', 'JobRecPaymentPlans','Notification' , 'JobAdTemp', 'PaymentsTable' , 'Plantable');
	
	
	public function beforeFilter() {
		parent::beforeFilter();
		// load Models
		$this->Auth->allow('index','captcha');

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
		
		if (isset($this->request->data['Contact']['email'])) {
			if(!isset($this->Captcha))	{ //if Component was not loaded throug $components array()
				$this->Captcha = $this->Components->load('Captcha'); //load it
			}
			$this->Captcha = $this->Components->load('Captcha'); //load it
			$this->Contact->setCaptcha($this->Captcha->getVerCode()); //getting from component and passing to model to make proper validation check
			$this->Contact->set($this->request->data);
			if($this->Contact->validates())	{
				//exit("Yes");
				$ContactEmail = new CakeEmail();
				$ContactEmail->from(array($this->request->data['Contact']['email']));
				$ContactEmail->to('info@recruityoung.com');
				$ContactEmail->subject('Contact Information from Recruit Young.');
				$ContactEmail->emailFormat('html');
				$body = "Hello ".$this->request->data['con_fname'].",";
				$body .=" <br/><br/><p>".$this->request->data['con_msg']."</p>";
				$ContactEmail->send($body);
				$this->Session->setFlash(__("Email send successfully."));
			}
			else
			{
				$this->Session->setFlash(__("Invalid email"));
			}
        }
		else{
			$this->Session->setFlash(__("Invalid email"));
		}
	}
	
	function captcha()	{
		$this->autoRender = false;
		$this->layout='ajax';
		if(!isset($this->Captcha))	{ //if Component was not loaded throug $components array()
			$this->Captcha = $this->Components->load('Captcha', array(
				'width' => 150,
				'height' => 50,
				'theme' => 'default', //possible values : default, random ; No value means 'default'
			)); //load it
			}
		$this->Captcha->create();
	}
}
        
        
