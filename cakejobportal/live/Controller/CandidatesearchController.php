<?php

App::uses('Controller', 'Controller');

class CandidatesearchController extends AppController {
    
    public $components = array('Paginator','RequestHandler', 'JobportalImage');
    var $uses = array('JobJobseeker','JobAppliedjobs','JobRecruiter','User','TransMember','FavoriteCandidate','Follow','UpgradeCategory','TrackJobAdvert', 'JobAd','JobOptions','EmployerProfile', 'JobCountry', 'JobCity', 'JobRecInvoices', 'JobRecPaymentPlans','Notification' , 'JobAdTemp', 'PaymentsTable' , 'Plantable');
    public function beforeFilter() {
        parent::beforeFilter();
        //loadModel
        $this->Auth->allow('index','jobSearchAction');
        
        $this->loadModel('Report');
        $this->loadModel('DmeAssignPatient');
        $this->loadModel('User');

        //set loggeg in user in @user variable
        if ($this->Auth->user()) {
            $this->set('user', $this->Auth->user());
        }
        //manage user authentication
        $auth_data = $this->Auth->user();
        if (isset($auth_data) && !empty($auth_data)) {
            if ($auth_data['type'] == 'admin') {
                $this->redirect(array('controller' => 'admin', 'action' => 'index'));
            }
	    elseif ($auth_data['type'] == 'candidate') {
                $this->redirect(array('controller' => 'candidate', 'action' => 'candidate_profile'));
            }
        }
    }
    
    public function index() {
	$this->set('page','jobadd');
	$seeker_category ='';
	$seeker_category_drop =  $this->JobOptions->fill_dropdown("seeker_category",'job_options','option_name', "option_name",$seeker_category,Configure::read('ALL'),"where category_id=14");
	$this->set('seeker_category_drop', $seeker_category_drop);
	$seeker_jobcity = '';
	$seeker_jobcity_drop = $this->JobCity->fill_dropdown_city("seeker_jobcity","job_city","city_name","city_name",$seeker_jobcity,Configure::read('SELECT'));
	$this->set('seeker_jobcity_drop', $seeker_jobcity_drop);
    }
    
    public function candidateSearchAction() {
	$this->set('page','jobadd');
	$resultSeeker = $this->JobJobseeker->getSearchResult();
	if($resultSeeker)
	    $this->set('resultSeeker', $resultSeeker);
	else
	    $this->set('resultSeeker', "");
	//pr($resultSeeker); exit;
    }	
}