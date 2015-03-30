<?php

App::uses('Controller', 'Controller');

class JobsearchController extends AppController {
    
    public $components = array('Paginator','RequestHandler', 'JobportalImage');
    var $uses = array('JobAppliedjobs','JobRecruiter','User','TransMember','FavoriteCandidate','Follow','UpgradeCategory','TrackJobAdvert', 'JobAd','JobOptions','EmployerProfile', 'JobCountry', 'JobCity', 'JobRecInvoices', 'JobRecPaymentPlans','Notification' , 'JobAdTemp', 'PaymentsTable' , 'Plantable');
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

	public function apply() {
            $this->layout = "ajax";
	    $this->autoRender = false;
	    $login_user = $this->Auth->user();
	    if ($this->request->is('ajax')) {
		if (isset($_POST['rec_id'])){
		    $data['recruiter_id']=$_POST['rec_id'];
		    $data['applied_date']=date("Y-m-d h:i:s");
		    $data['seeker_id']=$login_user['id'];
		    $data['applied_status']=1;
		    $data['ad_id']=$_POST['ad_id'];
		    
		    $this->JobAppliedjobs->create();
		    if($this->JobAppliedjobs->save($data)){
			
			$applied_id = $this->JobAppliedjobs->getLastInsertID();
			$this->Notification->create();
			//pr($applied_id); exit;
			$dataN['user_id']=$_POST['rec_id'];
			$dataN['user_name']=$login_user['name'];
			$dataN['notication_id']=$applied_id;
			$dataN['noti_time']=date("Y-m-d h:i:s");
			$dataN['status']=1;
			$dataN['message']="One recruiter apply for job.";
			$dataN['type']='applied';
			$dataN['table_name']='job_appliedjobs';
			$dataN['url']=trim("/candidate/candidate_profile/".$login_user['name']);
			
			$this->Notification->save($dataN);
			echo "1";
		    }
		}
	    }
	}

        public function jobSearchAction()
        {
            $resultSeeker = $this->JobAd->getSearchResult();
	    //pr($resultSeeker); exit;
            if(isset($resultSeeker) AND count($resultSeeker) > 0)
            {
                $resultSeeker_obj = $this->TransMember->arraytoobject($resultSeeker);
                $this->set('resultSeeker' , $resultSeeker_obj);
                if(isset($_SESSION["ses_seeker_id"]))
                {
                    $ses_seeker_id = $_SESSION["ses_seeker_id"];
                    $bookmark = $this->JobBookmarkJobseeker->getJobBookmarkJobseeker($resultSeeker_obj[0],$ses_seeker_id);
                    $bookmark_obj = $this->TransMember->arraytoobject($resultSeeker);
                }
		
                $jobrec = $this->JobRecruiter->getJobRecruiter($resultSeeker[0]['job_ad']['rec_id']);
                //echo $jobrec[0]['job_recruiter']; pr($jobrec); exit("Success");
		$jobrec_obj = $this->TransMember->arraytoobject($jobrec[0]['job_recruiter']);
		
                $this->set('rsComp',$jobrec_obj);
		$this->set('page','jobadd');
            }
            else
            {
                $this->set('not_found','Result Not Found');
                $this->redirect(array(
					'controller' => 'Jobsearch',
					'action' => 'index?msg=not_found'
				));
            }
	    
	    /**/
	    
	    if(isset($resultSeeker[0]['job_ad']['rec_id']))
			{
				$login_userID = $resultSeeker[0]['job_ad']['rec_id'];
				$check_data = $this->EmployerProfile->getEmployerProfileById($resultSeeker[0]['job_ad']['rec_id']);
				if(isset($check_data))
				$this->set('pro_data', $check_data[0]['employer_profile']);
					
				$this->Paginator->settings = array(
						'JobAd' => array(
							 'table' => 'job_ad',
								'conditions' => array(
									'rec_id' =>  $resultSeeker[0]['job_ad']['rec_id'],
								),
						'limit' => 5,
						'order' =>'ad_date DESC'
						)
						);	
						$job_info = $this->Paginator->paginate('JobAd');
						$this->set('job_info', $job_info);
						
				//$this->set('emp_user',$login_user['name']);
				//$emp_data = $this->User->getUsername($login_user['name']);
				//$this->set('emp_data',$emp_data[0]['users']);
				
			
			}
			else
			{
					$login_userID = $login_user['id'];
					$check_data = $this->EmployerProfile->getEmployerProfileById($resultSeeker[0]['job_ad']['rec_id']);
					$this->set('pro_data', $check_data[0]['employer_profile']);
					
					$this->Paginator->settings = array(
					'JobAd' => array(
						 'table' => 'job_ad',
							'conditions' => array(
								'rec_id' =>  $resultSeeker[0]['job_ad']['rec_id'],
							),
					'limit' => 5,
					'order' =>'ad_date DESC'
					)
					);	
					$job_info = $this->Paginator->paginate('JobAd');
					$this->set('job_info', $job_info);
					
					//$jobdata = $this->JobAd->getJobsByUserId($resultSeeker[0]['job_ad']['rec_id']);
					//$this->set('job_info', $jobdata);
					//$this->set('emp_user',$login_user['name']);
					
					//$emp_data = $this->User->getUsername($login_user['name']);
					//$this->set('emp_data',$emp_data[0]['users']);				
			}
			$login_user = $this->Auth->user();
			$this->set('login_user',$login_user);
			//pr($login_user); exit;
			$this->set('job_info', $resultSeeker);
			
			$appliedData = $this->JobAppliedjobs->find('all',array('conditions'=>array('seeker_id'=>$login_user['id'],'applied_status'=>1)));
			foreach($appliedData as $key => $val){
			    $arr[]=$val['JobAppliedjobs']['ad_id'];
			}
			if(isset($arr))
			    $this->set('arr', $arr);
			else{
			    $arr[0]=0;
			    $this->set('arr', $arr[0]);
			}
			//pr($arr); exit;	
        }

	
}