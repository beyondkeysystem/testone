<?php
App::uses('Controller', 'Controller');

class CandidateController extends AppController {
    
    public $components = array('Paginator','RequestHandler', 'JobportalImage');
    var $uses = array('JobJobseeker','EmployerProfile','PhotoGallery','TransFilmmakersChat', 'JobComment','VideoGallery','TransMemberMembershipScheme', 'TransMemberVideo', 'TransVideoCc', 'User','TransMember','Follow','FavoriteCandidate','JobRecruiterfollowcv','JobJobseeker','JobShortlistedJobseeker','JobAppliedjobs','CandidateProfile','UpgradeCategory','TrackJobAdvert', 'JobAd','JobOptions','EmployerProfile', 'JobCountry', 'JobCity', 'JobRecInvoices', 'JobRecPaymentPlans','Notification' , 'JobAdTemp', 'PaymentsTable' , 'Plantable');

    public function beforeFilter() {
        parent::beforeFilter();
        //loadModel
        $this->Auth->allow('candidate_profile','video_gallery');
        
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
            //if ($auth_data['type'] == 'employer') {
            //    
            //    $this->redirect(array('controller' => 'employer', 'action' => 'index'));
            //}
            if ($auth_data['type'] == 'admin') {
                $this->redirect(array('controller' => 'admin', 'action' => 'index'));
            }
        }
        
        $this->loadModel('DmeAssignPatient');
        $this->loadModel('Report');
        // set loggeg in user in @user variable
        if ($this->Auth->user()) {
                $this->set('user', $this->Auth->user());
        }
        // manage user authentication
        $auth_data = $this->Auth->user();
        if (isset($auth_data) && ! empty($auth_data)) {
            //if ($auth_data ['type'] == 'candidate') {
           /* if ($auth_data ['type'] == 'candidate') {
                    
                $id = $auth_data['id'];
                $userdata = $this->TransMember->getUserInfoById($id);
                $member_id = $userdata[0]['trans_member']['unique_id'];
                $member_data = $this->TransMemberMembershipScheme->getTransMemberMembershipSchemeByID($member_id);

                //pr($userdata);
                //die;
                //$_SESSION['member_id'] = '00f3c678348edf110ea6f0745bb3bd39d15be974';
                $_SESSION['member_id'] = $userdata[0]['trans_member']['unique_id'];
                $_SESSION['film_maker'] = 1;
                $_SESSION['viewer_logged_in'] = 1;
                $_SESSION['m_id'] = $userdata[0]['trans_member']['id'];
                $_SESSION['user_type'] = 'M';
                $_SESSION['username'] = $userdata[0]['trans_member']['user_name'];
                $_SESSION['user_role'] = $userdata[0]['trans_member']['user_role'];
                $_SESSION['member_last_login'] = $userdata[0]['trans_member']['last_login'];
                $_SESSION['member_membership_id'] = $member_data[0]['trans_member_membership_scheme']['membership_scheme_id'];
            }*/
            if ($auth_data ['type'] == 'employer' || $auth_data ['type'] == 'candidate')
            {
                //pr($auth_data);
                //die; 88 John
                $id = $auth_data['id'] ;
                $userdata = $this->TransMember->getUserInfoById($id);

                //pr($userdata);
                //die;
                $_SESSION['m_id'] = $userdata[0]['trans_member']['id'];
                $_SESSION['user_type'] = 'M';
                $_SESSION['username'] = $auth_data['name'];
                $_SESSION['user_role'] = $userdata[0]['trans_member']['user_role'];
                $_SESSION['member_last_login'] = $userdata[0]['trans_member']['last_login'];
                $_SESSION['member_id'] = $userdata[0]['trans_member']['unique_id'];
                $_SESSION['film_maker'] = 1;
                $_SESSION['viewer_logged_in'] = 1;
            }
        }
        // end of authentication
        
    }

////////////////////////////////////////////////////////////////////////////////

    /**
     * index method
     * @throws NotFoundException
     * @return void
     */
    public function index() {
      $auth_data = $this->Auth->user();
        if (isset($auth_data) && !empty($auth_data)) {
            if ($auth_data['type'] == 'employer') {
                
                $this->redirect(array('controller' => 'employer', 'action' => 'index'));
            }
        }
        //set login user type for default view
        $userType = $this->Auth->user('type');
        $this->set('userType', $userType);

        //set dynamically dme name for view
        $pat_id = $this->Auth->user('id');
        $pat_data = $this->User->find('first', array('conditions' => array('User.id' => $pat_id), 'fields' => array('User.name')));
        if (!empty($pat_data)) {
            $this->set('PatientName', $pat_data['User']['name']);
        }

        //set selected action detail
        $this->set('action_detail', 'MY PROFILE');

        //find id of logged in user
        $login_user = $this->Auth->user();
        if (isset($login_user) && !empty($login_user)) {
            $login_id = $login_user['id'];
            //fetch patient and dme record according clinician id
            $complete_data = $this->DmeAssignPatient->query('SELECT dap.id,u1.id,u1.name,u1.email,u1.mobile,u1.type,u1.address as patient,u.name as dme , u2.id,u2.name,u2.email,u2.mobile,u2.type,u2.address as clinician FROM `dme_assign_patients` dap Left join users u on (dap.dme_id=u.id) Left join users u1 on(dap.`patient_id`=u1.id) Left Join users u2 on (dap.`clinician_id`=u2.id) WHERE dap.`patient_id`=' . $login_id);
            $this->set('complete_data', $complete_data);
        }
        //Dynamically manage title 
        $this->set("title_for_layout", "Candidate");
    }

////////////////////////////////////////////////////////////////////////////////
    
////////////////////////////////////////////////////////////////////////////////

    /**
     * myreport method
     *
     * @throws NotFoundException
     * @return void
     */
    public function myreport() {
        //find id of logged in user
        $auth_data = $this->Auth->user();
        if (isset($auth_data) && !empty($auth_data)) {
            if ($auth_data['type'] == 'employer') {
                
                $this->redirect(array('controller' => 'employer', 'action' => 'index'));
            }
        }
        $login_user = $this->Auth->user();
        if (isset($login_user) && !empty($login_user)) {
            $login_id = $login_user['id'];

            //fetch data from reports table for patient report
            $this->paginate = array(
                'conditions' => array('Report.patient_id' => $login_id, 'Report.status' => 'P'),
                'limit' => 10,
                'order' => 'Report.created_date DESC',
            );
            $report = $this->paginate('Report');
            if (isset($report) && !empty($report)) {
                $this->set('report_data', $report);
            }
        }
        //Dynamically manage title 
        $this->set("title_for_layout", "Candidate");

        //set login user type for default view
        $userType = $this->Auth->user('type');
        $this->set('userType', $userType);

        //set dynamically dme name for view
        $pat_id = $this->Auth->user('id');
        $pat_data = $this->User->find('first', array('conditions' => array('User.id' => $pat_id), 'fields' => array('User.name')));
        if (!empty($pat_data)) {
            $this->set('PatientName', $pat_data['User']['name']);
        }

        //set selected action detail
        $this->set('action_detail', 'MY REPORTS');
    }

////////////////////////////////////////////////////////////////////////////////    
    

    /**
     * edit method
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function edit($id = null) {
    $auth_data = $this->Auth->user();
        if (isset($auth_data) && !empty($auth_data)) {
            if ($auth_data['type'] == 'employer') {
                
                $this->redirect(array('controller' => 'employer', 'action' => 'index'));
            }
        }
    
        //check authenticated user
        $login_userID = $this->Auth->user('id');
        $login_user_data = $this->User->findById($login_userID);
        if (!empty($login_user_data)) {
            $login_user_email = $login_user_data['User']['email'];
        }
        $return_value = $this->User->ValidPatient($id, $login_user_email);
        if ($return_value == '1') {
            if (!$this->User->exists($id)) {
                throw new NotFoundException(__('Invalid user'));
            }
            if ($this->request->is('post') || $this->request->is('put')) {
                if ($this->User->save($this->request->data)) {
                    $this->Session->write('edit_data', $this->request->data);
                    $this->redirect(array('action' => 'index'));
                } else {
                    // $this->Session->setFlash(__('The user could not be saved. Please, try again.'));
                }
            } else {
                $options = array('conditions' => array('User.' . $this->User->primaryKey => $id));
                $this->request->data = $this->User->find('first', $options);
                $this->set('request_data', $this->request->data);
            }
        } else {
            $this->redirect(array('controller' => 'candidate', 'action' => 'index'));
        }

        //set login user type for default view
        $userType = $this->Auth->user('type');
        $this->set('userType', $userType);

        //set dynamically dme name for view
        $pat_id = $this->Auth->user('id');
        $pat_data = $this->User->find('first', array('conditions' => array('User.id' => $pat_id), 'fields' => array('User.name')));
        if (!empty($pat_data)) {
            $this->set('PatientName', $pat_data['User']['name']);
        }

        //set selected action detail
        $this->set('action_detail', 'EDIT MY PROFILE');
    }

////////////////////////////////////////////////////////////////////////////////

    /**
     * delete method
     * @throws NotFoundException
     * @throws MethodNotAllowedException
     * @param string $id
     * @return void
     */
    public function delete($id = null) {
    $auth_data = $this->Auth->user();
        if (isset($auth_data) && !empty($auth_data)) {
            if ($auth_data['type'] == 'employer') {
                
                $this->redirect(array('controller' => 'employer', 'action' => 'index'));
            }
        }
        //find ids from reports and dme_assign_patient table for delete
        $this->loadModel('Report');

        $this->Report->id = $id;
        if (!$this->Report->exists()) {
            throw new NotFoundException(__('Invalid user'));
        }
        //delete record from user,dme_assign_patient and report table
        $this->request->onlyAllow('post', 'delete');
        if ($this->Report->delete()) {
            //$this->Session->setFlash(__('User deleted'));
            $this->redirect(array('action' => 'myreport'));
        }
        //$this->Session->setFlash(__('User was not deleted'));
        $this->redirect(array('action' => 'index'));
    }

////////////////////////////////////////////////////////////////////////////////
    
    //icode validation and return related value
    function icodeValidate() {
    $auth_data = $this->Auth->user();
        if (isset($auth_data) && !empty($auth_data)) {
            if ($auth_data['type'] == 'employer') {
                
                $this->redirect(array('controller' => 'employer', 'action' => 'index'));
            }
        }
        $this->autoRender = false;

        if ($this->request->is('ajax')) {
            $serial_data = $this->Report->findByIcode($this->data['icode']);
            if (!empty($serial_data)) {
                echo json_encode($serial_data['Report']);
            }
        }
    }

////////////////////////////////////////////////////////////////////////////////

    public function chart($id=null) {
    $auth_data = $this->Auth->user();
        if (isset($auth_data) && !empty($auth_data)) {
            if ($auth_data['type'] == 'employer') {
                
                $this->redirect(array('controller' => 'employer', 'action' => 'index'));
            }
        }
        //check  $id with logged in user id
        $logged_userId = $this->Auth->user('id');

        //fetch patient_id from reports table
        $logged_reportId = $this->Report->findById($id);
        if (!empty($logged_reportId)) {
            if ($logged_reportId['Report']['patient_id'] == $logged_userId) {
                //end checking          
                //fetch data from reports table for patient report
                $this->paginate = array(
                    'conditions' => array('Report.id' => $id, 'Report.status' => 'P'),
                    'limit' => 10,
                    'order' => 'Report.created_date DESC',
                );
                $patient_reports = $this->paginate('Report');
                if (isset($patient_reports) && !empty($patient_reports)) {
                    $this->set('report_data', $patient_reports);
                }
                //set patient name for chart view
                $patient_id = $this->Auth->user('id');
                if (!empty($patient_id)) {
                    $patient_data = $this->User->find('first', array('conditions' => array('User.id' => $patient_id)));
                    if (!empty($patient_data)) {
                        $this->set('patient_name', $patient_data['User']['name']);
                    }
                }
            }
        }

        //set login user type for default view
        $userType = $this->Auth->user('type');
        $this->set('userType', $userType);

        //set dynamically dme name for view
        $pat_id = $this->Auth->user('id');
        $pat_data = $this->User->find('first', array('conditions' => array('User.id' => $pat_id), 'fields' => array('User.name')));
        if (!empty($pat_data)) {
            $this->set('PatientName', $pat_data['User']['name']);
        }

        //set selected action detail
        $this->set('action_detail', 'REPORT AND GRAPH');
    }

////////////////////////////////////////////////////////////////////////////////

    /**
     * report method
     * @throws NotFoundException
     * @return void
     */
    public function report() {
    
    
    $auth_data = $this->Auth->user();
        if (isset($auth_data) && !empty($auth_data)) {
            if ($auth_data['type'] == 'employer') {
                
                $this->redirect(array('controller' => 'employer', 'action' => 'index'));
            }
        }
         //set login user type for default view
        $userType = $this->Auth->user('type');
        $this->set('userType', $userType);

        //set dynamically dme name for view
        $pat_id = $this->Auth->user('id');
        $pat_data = $this->User->find('first', array('conditions' => array('User.id' => $pat_id), 'fields' => array('User.name')));
        if (!empty($pat_data)) {
            $this->set('PatientName', $pat_data['User']['name']);
        }

        //set selected action detail
        $this->set('action_detail', 'ADD NEW REPORT');
        
    }

////////////////////////////////////////////////////////////////////////////////     
    
    function candidate_profile()
    {
       
        $this->set('page' , 'candidate_profile');
         $login_user = $this->Auth->user();
         $this->set('login_user',$login_user);
        if(isset($this->params['pass'][0]))
           $username = trim($this->params['pass'][0]);


       // error_reporting(0);
        if(isset($this->params['pass'][0]) AND ($this->params['pass'][0] == $login_user['name']) )
        {
            
            $login_user = $this->Auth->user();
            $login_userID = $login_user['id'];
            $this->set('current_page_id',$login_userID);
            $this->set('checklogin',$login_userID);
            $this->set('user_data',$login_user);
            $login_userID = $login_user['id'];
            $business_follow = $this->Follow->getFollowByCanId($login_userID);
            $this->set('business_network',$business_follow);
            $check_data = $this->CandidateProfile->getCandidateProfileById($login_userID);
            
            $fav_data = $this->FavoriteCandidate->getFavoriteCandidateByEmpID($login_userID);
	    $this->set('fav_data', $fav_data );
                                
            if(isset($check_data[0]))
            $this->set('pro_data', $check_data[0]['candidate_profile']);
                        
            $jobdata = $this->JobAd->getJobsByUserId($login_user['id']);
            $this->set('job_info', $jobdata);
            $this->set('emp_user',$login_user['name']);
            $emp_data = $this->User->getUsername($login_user['name']);
            $this->set('emp_data',$emp_data[0]['users']);
        
            $seeker_data_value = $this->JobJobseeker->getJobJobseekerById($login_user['id']);//pr($seeker_data_value);
            $this->set('seeker_data_set',$seeker_data_value);
        }
        else
        { 
                if(isset($this->params['pass'][0]))
                { 
                        $username = trim($this->params['pass'][0]);
                        $user_data = $this->User->getUsername($username);
                         $this->set('checklogin','');
                        //pr($user_data);
                        //die;
                        if(isset($user_data) AND count($user_data) > 0 )
                        {
                        $user_id = $user_data[0]['users']['id'];
                        $this->set('user_data',$user_data[0]['users']);
                        $this->set('current_page_id',$user_id);
                        $login_user = $this->Auth->user();
                        $business_follow = $this->Follow->getFollowByCanId($user_id);
                        $this->set('business_network',$business_follow);
                        //echo $login_user['id'].','. $user_id;
                        //die;
                        $check_fav =  $this->FavoriteCandidate->getFavoriteCandidateByID($login_user['id'], $user_id);
                        //pr($check_fav);
                        //die;
                        if(count($check_fav) > 0)
                        {
                            $this->set('favorite','favorite');
                            
                        }
                        else
                        {
                            $this->set('favorite','');
                        }
                        $this->set('user_data',$user_data[0]['users']);
                        $jobdata = $this->JobAd->getJobsByUserId($user_id);
                        $this->set('job_info', $jobdata);
                        $this->set('emp_user',$username);
                        
                        $login_userID = $login_user['id'];
                        $check_data = $this->CandidateProfile->getCandidateProfileById($user_id);
                        
                        $fav_data = $this->FavoriteCandidate->getFavoriteCandidateByEmpID($user_id);
                        //pr($fav_data);
                        //die;
                        $this->set('fav_data', $fav_data );
                        //pr($check_data);
                        //die;
                        if(isset($check_data[0]))
                        $this->set('pro_data', $check_data[0]['candidate_profile']);
                        
                        $emp_data = $this->User->getUsername($username);
                        $this->set('emp_data',$emp_data[0]['users']);
                        
                        $seeker_data_value = $this->JobJobseeker->getJobJobseekerById($user_id);//pr($seeker_data_value);
                        $this->set('seeker_data_set',$seeker_data_value);
                        
                        }
                        else
                        {
                            $this->redirect(array('controller' => 'home', 'action' => 'index'));
                        }
                        
                        
                }
                elseif(isset($login_user) AND $login_user['id'] !='')
                {
                    $login_user = $this->Auth->user();
                    $login_userID = $login_user['id'];
                    $this->set('checklogin',$login_userID);
                    if($login_user['type'] == 'candidate'){

                    $this->set('user_data',$login_user);
                        $login_userID = $login_user['id'];
                        $this->set('current_page_id',$login_userID);
                        $business_follow = $this->Follow->getFollowByCanId($login_userID);
                        $this->set('business_network',$business_follow);
                        $check_data = $this->CandidateProfile->getCandidateProfileById($login_userID);
                        
                        $fav_data = $this->FavoriteCandidate->getFavoriteCandidateByEmpID($login_userID);
                        //pr($fav_data);
                        //die;
                        $this->set('fav_data', $fav_data );
                        if(isset($check_data[0]))
                        $this->set('pro_data', $check_data[0]['candidate_profile']);
                        
                        $jobdata = $this->JobAd->getJobsByUserId($login_user['id']);
                        $this->set('job_info', $jobdata);
                        $this->set('emp_user',$login_user['name']);
                        
                        $emp_data = $this->User->getUsername($login_user['name']);
                        $this->set('emp_data',$emp_data[0]['users']);
                        
                        $seeker_data_value = $this->JobJobseeker->getJobJobseekerById($login_userID);//pr($seeker_data_value);
                        $this->set('seeker_data_set',$seeker_data_value);
                        $candidate_summary = $this->CandidateProfile->getCandidateProfileById($login_userID);      
                        $this->set('candidate_summary',$candidate_summary);
                } else{
						$this->redirect(array('controller' => 'home', 'action' => 'index'));
					}
                }
                else
                {
                    $this->redirect(array('controller' => 'home', 'action' => 'index'));
                }
        }
    
       require_once(dirname(dirname(__file__)) . '/Vendor/im/global.php');
        require_once(dirname(dirname(__file__)) . '/Vendor/im/SimpleImage.php');
        require_once(dirname(dirname(__file__)) . '/Vendor/im/main.php');
        require_once(dirname(dirname(__file__)) . '/Vendor/im/member.php');
        require_once(dirname(dirname(__file__)) . '/Vendor/im/membership_manage.php');
        require_once(dirname(dirname(__file__)) . '/Vendor/im/member_scheme.php');


        $simpleImg = new SimpleImage();
        $main = new main();
        $member = new member();
        $membership = new membership_manage();
        $memberScheme = new member_scheme();


        //for admin
     
        //For user
        //$_SESSION['member_id'] = '00f3c678348edf110ea6f0745bb3bd39d15be974';
        //$_SESSION['film_maker'] = 1;
        //$_SESSION['viewer_logged_in'] = 1;
        //$_SESSION['m_id'] = 681;
        //$_SESSION['user_type'] = 'M';
        //$_SESSION['username'] = 'Makmohan';
        //$_SESSION['user_role'] = 'user';
        //$_SESSION['member_last_login'] = '1393850245';
        //$_SESSION['member_membership_id'] = 1;

       
         /* -----------------------------------------------Movie And Movie Maker Information And film type -------------------------------------------------- */
        $movie_id = '';
        if (isset($_REQUEST['id']) AND $_REQUEST['id'] != '') {
            //$movie_id = base64_decode($_REQUEST['id']);
        }
        if (isset($_REQUEST['show']) AND $_REQUEST['show'] == 'trailer') {
            //$movie_id = base64_decode($_REQUEST['id']);
            $trailer_id = base64_decode($_REQUEST['trailer_id']);
        }
	//echo $login_user['id'];
	$movie_idArr = $this->TransMemberVideo->getMember($login_user['id']);
	$movie_id=$movie_idArr[0]['trans_member_video']['id'];
	//pr($movie_id);exit;
        if ($movie_id != '') {
		
	    $this->set('movie_id',$movie_id);
            //$this->loadModel('TransMember');
            $data = $this->TransMember->getMember($movie_id);//echo $movie_id;
	  //  pr($data); exit;
            //$this->loadModel('TransMemberVideo');
            $videos = $this->TransMemberVideo->getTransMemberVideo($movie_id);

            $result = $this->TransMember->arraytoobject($data[0]);

            $f_property = $result->mv->video_property;
            $f_m_id = $result->tm->id;
            $video_title = $result->mv->title;
            $description = $result->mv->description;

            $this->set('f_m_id', $f_m_id);
            if (strlen($result->mv->video_output_file_2) > 0 && strlen($result->mv->video_output_file_3) > 0) {
                $video_output_file = $result->mv->video_output_file;
                $video_output_file_2 = $result->mv->video_output_file_2;
                $video_output_file_3 = $result->mv->video_output_file_3;
            } elseif (strlen($result->video_output_file_2) > 0 && strlen($result->mv->video_output_file_3) == 0) {
                $video_output_file = $result->mv->video_output_file;
                $video_output_file_2 = $result->mv->video_output_file_2;
                $video_output_file_3 = $result->mv->video_output_file_2;
            } elseif (strlen($result->video_output_file_2) == 0 && strlen($result->mv->video_output_file_3) == 0) {
                $video_output_file = $result->mv->video_output_file;
                $video_output_file_2 = $result->mv->video_output_file;
                $video_output_file_3 = $result->mv->video_output_file;
            }

            $file_size = number_format(($result->mv->video_output_file_size / (1024 * 1024)), 2, '.', '') . ' MB';
            $video_thumbnail_file = $result->mv->video_thumbnail_file;
            $video_length = $result->mv->video_length;
            $like_count = $result->mv->like_count;
            $rating_caution = $result->mv->rating_caution;
            $rating_image = $result->vcr->image;
            $maker_id = $result->mv->member_id;
            $f_name = $result->tm->first_name;
            $l_name = $result->tm->last_name;
            $about_me = $result->tm->about_me;
            $profile_image_file = $result->tm->profile_image_file;
            $status = $result->mv->status;
            $screening_status = $result->mv->video_status;
            $maker_paypalid = $result->tm->paypalId;



            $videos = $this->TransMemberVideo->getVideos($maker_id);
            $this->set('frs', $videos);

            //pr($_SESSION);
            $member_marker = $this->TransMember->getMemberByMarker($maker_id);
            $mem_result = $this->TransMember->arraytoobject($member_marker[0]['trans_member']);
            $user_id = $_SESSION['m_id'];
            $this->set('user_id', $user_id);
            $fm_id = $mem_result->id;
            $this->set('fm_id', $fm_id);
            $fm_record = $this->TransMember->get_user_info($fm_id);
            $user_record = $this->TransMember->get_user_info($user_id);
            $fm_record_obj = $this->TransMember->arraytoobject($fm_record[0]['trans_member']);
            $this->set('fm_record', $fm_record_obj);
            

            $this->set('r', $mem_result);
            $user_record = $this->TransMember->arraytoobject($user_record[0]['trans_member']);
            $this->set('user_record', $user_record);
            //pr($user_record);
            //die;
            $fm_record = $mem_result;

            if ($fm_record) {
                $fmimage = $fm_record->profile_image_file;
                $this->set('fmimage', $fmimage);
                $fm_fname = $fm_record->first_name;
                $this->set('fm_fname', $fm_fname);
                $fm_lname = $fm_record->last_name;
                $this->set('fm_lname', $fm_lname);
                $fm_image = 'uploads/main/' . $fmimage;
                $this->set('fm_image', $fm_image);
                if (!strlen($fmimage) || !file_exists($fm_image)) {
                    $fm_image = 'uploads/main/nopicture.png';
                }
            } else {
                $fm_image = 'uploads/main/nopicture.png';
                $fm_fname = '';
                $fm_lname = '';
            }
            if ($user_record) {
                $uimage = $user_record->profile_image_file;
                $this->set('uimage', $uimage);
                $u_fname = $user_record->first_name;
                $this->set('u_fname', $u_fname);
                $u_lname = $user_record->last_name;
                $this->set('u_lname', $u_lname);
                $u_image = 'uploads/main/' . $uimage;
                $this->set('u_image', $u_image);
                if (!strlen($uimage) || !file_exists($u_image)) {
                    $u_image = 'uploads/main/nopicture.png';
                }
            } else {
                $u_image = 'uploads/main/nopicture.png';
                $u_fname = '';
                $u_lname = '';
            }
        }
    }
    
    function candidate_profile_edit()
    {
    
    $auth_data = $this->Auth->user();
        if (isset($auth_data) && !empty($auth_data)) {
            if ($auth_data['type'] == 'employer') {
                
                $this->redirect(array('controller' => 'employer', 'action' => 'index'));
            }
        }
        $this->set('page','jobadd');
        $login_userID = $this->Auth->user('id');
        $login_user_data = $this->User->findById($login_userID);
        if (! empty($login_user_data))
        {
            $login_user_email = $login_user_data ['User'] ['email'];
            if($login_user_data ['User']['first_login'] == 0)
            {
                if(isset($this->request->params['pass'][0])){
                    $data['User'] = array( 'id' => $this->request->params['pass'][0] , 'first_login' => 1 );
                    $this->User->save($data['User']);
                }
            }
        }
        $this->set('login_user',$login_user_data['User']);

        $check_data = $this->CandidateProfile->getCandidateProfileById($login_userID);
                //pr($check_data);
                //die;
                $this->set('can_data', $check_data);
        if ($this->request->is('post')) {
                $prefix = time() . '_';
                

                //if(isset($_FILES['can_banner']['name']) AND $_FILES['can_banner']['name'] != '')
                //{
                //        $filename1 = $prefix.basename($_FILES['can_banner']['name']);
                //        $file_ext1 = strtolower(substr($filename1, strrpos($filename1, ".") + 1));
                //        $can_banner = String::uuid().".".$file_ext1;
                //        $height ='70';
                //        $width = '720';
                //        $comp_banner = $this->JobportalImage->uploadImage($_FILES['can_banner'], $_SERVER['DOCUMENT_ROOT'].$this->webroot.'app/webroot/uploads/', $can_banner, $height , $width);
                //}
                //else
                //{
                //        $can_banner = $check_data[0]['candidate_profile']['can_banner'];
                //}
                if(isset($_FILES['can_video_thumb']['name']) AND $_FILES['can_video_thumb']['name'] != '')
                {
                        $filename1 = $prefix.basename($_FILES['can_video_thumb']['name']);
                        $file_ext1 = strtolower(substr($filename1, strrpos($filename1, ".") + 1));
                        $video_thumb = String::uuid().".".$file_ext1;
                        $height ='370';
                        $width = '705';
                        $can_video_thumb = $this->JobportalImage->uploadImage($_FILES['can_video_thumb'], $_SERVER['DOCUMENT_ROOT'].$this->webroot.'app/webroot/uploads/', $video_thumb, $height , $width);
                }
                else
                {
                        $video_thumb = $check_data[0]['candidate_profile']['can_video_thumb'];
                }
                
                
                            $arr['CandidateProfile'] = array(
                            'can_id' => $login_userID,
                            //'can_company_name' => trim($_POST['can_company_name']),
                            'can_contact' => trim($_POST['can_contact']),
                            //'can_position' => trim($_POST['can_position']),
                            'can_video_url' => trim($_POST['can_video_url']),
                            'career_summary' => trim($_POST['career_summary']),
                            'video_summary' => trim($_POST['video_summary']),
                            'photo_summary' => trim($_POST['photo_summary']),
                            'forum_summary' => trim($_POST['forum_summary']),
                            'link_summary' => trim($_POST['link_summary']),
                            'message_summary' => trim($_POST['message_summary']),
                            //'can_logo' => trim($logo_filename),
                            'can_banner' => trim($can_banner),
                            'can_video_thumb' => trim($video_thumb)
                        );
                
                //pr($arr['CandidateProfile']);
                //die;
             
                if(count($check_data) == '')
			{
                           
				$this->CandidateProfile->create();
				$query = $this->CandidateProfile->save($arr['CandidateProfile']);
				$this->Session->setFlash(__('Candated data added.'));
				$this->redirect(array('action' => 'candidate_profile/'.$login_user_data ['User'] ['name']));
				
			}
			else
			{
                                $arr['CandidateProfile']['id'] = $_POST['id'];
                                $query = $this->CandidateProfile->save($arr['CandidateProfile']);
                                $this->Session->setFlash(__('Candidate Profile data updated.'));
                                $this->redirect(array('action' => 'candidate_profile/'.$login_user_data ['User'] ['name']));
			}
        }
    }
    
    function candidate_edit()
    {
    
        $auth_data = $this->Auth->user();
        if (isset($auth_data) && !empty($auth_data)) {
            if ($auth_data['type'] == 'employer') {
                
                $this->redirect(array('controller' => 'employer', 'action' => 'index'));
            }
        }
        error_reporting(0);
        $login_user = $this->Auth->user();
        $login_userID = $this->Auth->user('id');
        $login_user_data = $this->User->findById($login_userID);
        $login_user_email = $login_user_data ['User'] ['email'];
            if($login_user_data ['User']['first_login'] == 0)
            {
                if(isset($this->request->params['pass'][0])){
                    $data['User'] = array( 'id' => $this->request->params['pass'][0] , 'first_login' => 1 );
                    $this->User->save($data['User']);
                }
            }
        $id = $login_user['id'];
        $this->set('page', 'jobadd');
        
        $profile_data = $this->CandidateProfile->getCandidateProfileById($id);
        $result = $this->TransMember->arraytoobject($profile_data[0]['candidate_profile']);

        $this->set('profile', $result);
        
        $seeker_data = $this->JobJobseeker->getJobJobseekerById($id);
        $seeker_result = $this->TransMember->arraytoobject($seeker_data[0]['job_jobseeker']);
        $this->set('rsseeker', $seeker_result);
        
        $industry = ''; 
        $industry_dropbox = $this->JobOptions->fill_dropdown("industry",'job_options','option_name', "option_name",$industry,"Select","where category_id=6");
        $this->set('industry_dropbox' , $industry_dropbox);
        
        $future_industry = ''; 
        $future_industry_dropbox = $this->JobOptions->fill_dropdown("future_industry",'job_options','option_name', "option_name",$future_industry,"Select","where category_id=6");
        $this->set('future_industry_dropbox' , $future_industry_dropbox);
        
        $Occupation = ''; 
        $occupation_dropbox = $this->JobOptions->fill_dropdown("occupation",'job_options','option_name', "option_name",$Occupation,"Select","where category_id=6");
        $this->set('occupation_dropbox' , $occupation_dropbox);
        
        $future_occupation = ''; 
        $future_occupation_dropbox = $this->JobOptions->fill_dropdown("future_occupation",'job_options','option_name', "option_name",$future_occupation,"Select","where category_id=6");
        $this->set('future_occupation_dropbox' , $future_occupation_dropbox);
        $ter_qualification_drop ='';
        $ter_qualification_drop =  $this->JobOptions->fill_dropdown("seeker_highest_education_level","job_options","option_name","option_name",$result->seeker_highest_education_level,'Select',"",'style="width:185px;"',"","seeker_highest_education_level");
        $this->set('ter_qualification_drop' , $ter_qualification_drop);
        
        //
        $totalcount = $this->JobRecruiterfollowcv->getJobRecruiterfollowcvById($id);
        $this->set('totalcount',$totalcount);
        $in30days = $this->JobRecruiterfollowcv->getJobRecruiterfollowcvBy30day($id);
        $this->set('$in30days',$in30days);
        $in60days = $this->JobRecruiterfollowcv->getJobRecruiterfollowcvBy60day($id);
        $this->set('in60days',$in60days);
        $in90days = $this->JobRecruiterfollowcv->getJobRecruiterfollowcvBy90day($id);
        $this->set('in90days',$in90days);
        $seeker_title='';
        
        if(isset($_POST['seeker_title'])) { $seeker_title = $_POST['seeker_title']; } else { $seeker_title = $seeker_result->seeker_title;}
        $seeker_title_dropbox = $this->JobOptions->fill_dropdown("seeker_title",'job_options','option_name', "option_name",$seeker_title,"Select","where category_id=22");
        $this->set('seeker_title_drop', $seeker_title_dropbox);
        
        $business_city = '';
        if(isset($_POST['business_city'])) { $business_city = $_POST['business_city']; } else {$business_city = $seeker_result->seeker_business_city; }
        $business_city_dropbox = $this->JobCity->fill_dropdown_city('business_city','job_city', 'city_name', "city_name", $business_city,"Select","","onchange='other_city();'");
        $this->set('city_dropbox', $business_city_dropbox);
        
        $seeker_postal_city='';
        if(isset($_POST['postal_city'])) { $seeker_postal_city = $_POST['postal_city']; } else {$seeker_postal_city = $seeker_result->seeker_postal_city; }
        $postal_city_dropbox = $this->JobCity->fill_dropdown_city('postal_city','job_city', 'city_name', "city_name", $seeker_postal_city,"Select","","onchange='other_city();'");
        $this->set('postal_city_dropbox', $postal_city_dropbox);
        
        $business_country = '';
        if(isset($_POST['business_city'])) { $business_country = $_POST['business_country']; } else {$business_country = $seeker_result->seeker_business_country; }
        $country_drop = $this->JobCountry->fill_dropdown_country('business_country','job_country', 'country_name', "country_name", $business_country, "Country");
        $this->set('country_drop' , $country_drop);
        
        $seeker_country = '';
        if(isset($_POST['postal_country'])) { $seeker_country = $_POST['postal_country']; } else {$seeker_country = $seeker_result->seeker_postal_country; }
        $postal_country_drop = $this->JobCountry->fill_dropdown_country('postal_country','job_country', 'country_name', "country_name", $seeker_country, "Country","","onchange=funSubmit('".$seeker_state."');");
        $this->set('postal_country_drop',$postal_country_drop);
        
        //$seeker_license_code = '';
        //if(isset($_POST['seeker_license_code'])) { $seeker_license_code = $_POST['seeker_license_code']; } else {$seeker_license_code = $seeker_result->seeker_license_code; }
        //$seeker_license_dropbox = $this->JobOptions->fill_dropdown('seeker_license_code','job_options', 'option_name',"option_name",$seeker_license_code,"None","where category_id=11");
        //$this->set('seeker_license_dropbox',$seeker_license_dropbox);
        //
        //$seeker_professional_endorsements = '';
        //if(isset($_POST['seeker_professional_endorsements'])) { $seeker_professional_endorsements = $_POST['seeker_professional_endorsements']; } else {$seeker_professional_endorsements = $seeker_result->seeker_professional_endorsements; }
        //$seeker_professional_dropbox = $this->JobOptions->fill_dropdown('seeker_professional_endorsements','job_options', 'option_name',"option_name",$seeker_professional_endorsements,"None","where category_id=19");
        //$this->set('seeker_professional_dropbox',$seeker_professional_dropbox);
        //
        //$seeker_license_endorsements = '';
        //if(isset($_POST['seeker_professional_endorsements'])) { $seeker_license_endorsements = $_POST['seeker_professional_endorsements']; } else {$seeker_license_endorsements = $seeker_result->seeker_professional_endorsements; }
        //$seeker_license_endorsements_dropbox = $this->JobOptions->fill_dropdown('seeker_license_endorsements','job_options', 'option_name',"option_name",$seeker_license_endorsements,"None","where category_id=18");
        //$this->set('seeker_license_endorsements_dropbox',$seeker_license_endorsements_dropbox);
        //
        //$seeker_license_restriction = '';
        //if(isset($_POST['seeker_license_restriction'])) { $seeker_license_restriction = $_POST['seeker_license_restriction']; } else {$seeker_license_restriction = $seeker_result->seeker_license_restriction; }
        //$seeker_license_restriction_dropbox = $this->JobOptions->fill_dropdown('seeker_license_restriction','job_options', 'option_name',"option_name",$seeker_license_restriction,"None","where category_id=17 or category_id=20");
        //$this->set('seeker_license_restriction_dropbox',$seeker_license_restriction_dropbox);
        //
        //        $seeker_license_restriction = '';
        //if(isset($_POST['seeker_license_restriction'])) { $seeker_license_restriction = $_POST['seeker_license_restriction']; } else {$seeker_license_restriction = $seeker_result->seeker_license_restriction; }
        //$seeker_license_restriction_dropbox = $this->JobOptions->fill_dropdown('seeker_license_restriction','job_options', 'option_name',"option_name",$seeker_license_restriction,"None","where category_id=17 or category_id=20");
        //$this->set('seeker_license_restriction_dropbox',$seeker_license_restriction_dropbox);
        //('seeker_license_code','job_options', 'option_name',"option_name",$seeker_license_code,"None","where category_id=11")
        
        
        
        if(isset($_POST['submit']))
        {
           $array = array();
           if(isset($_POST["seeker_work_history_title"]))
            {
   		$array["seeker_work_history_title"] =$_POST["seeker_work_history_title"];
            }
          if(isset($_POST["seeker_work_history_company"]))
            {
   		$array["seeker_work_history_company"] =$_POST["seeker_work_history_company"];
            }
          if(isset($_POST["seeker_current_level"]))
            {
   		$array["seeker_current_level"] =$_POST["seeker_current_level"];
            }
          if(isset($_POST["seeker_salary"]))
            {
   		$array["seeker_salary"] =$_POST["seeker_salary"];
            }
            if(isset($_POST["seeker_gender"]))
            {
                $array["seeker_gender"] =$_POST["seeker_gender"];
            }
            if((isset($_POST["seeker_month"]) AND $_POST["seeker_month"] !='') AND (isset($_POST["seeker_date"]) AND $_POST["seeker_date"] !='') AND (isset($_POST["seeker_year"]) AND $_POST["seeker_year"] !=''))
            {
                $date=$_POST["seeker_year"]."-".$_POST["seeker_month"]."-".$_POST["seeker_date"];
                $array["seeker_dob"] =$date;
                //$array["seeker_dob"] =$_POST["seeker_dob"];
            }
            if(isset($_POST["seeker_summary"]))
            {
                $array["seeker_summary"] =$_POST["seeker_summary"];
            }
            if(isset($_POST["seeker_highest_education_level"]))
            {
                $array["seeker_highest_education_level"] =$_POST["seeker_highest_education_level"];
            }
            if(isset($_POST['seeker_work_history_duration_from_month']))
            {
              $array["seeker_work_history_duration_from"]=$_POST["seeker_work_history_duration_from_year"] ."-". $_POST["seeker_work_history_duration_from_month"]."-01";
            }
            if(isset($_POST['seeker_work_history_duration_to_month']))
            {
              $array["seeker_work_history_duration_to"]=$_POST["seeker_work_history_duration_to_year"] ."-". $_POST["seeker_work_history_duration_to_month"]."-01"; 
            }
            if(isset($_POST["occupation"]))
            {
                $array["occupation"] =$_POST["occupation"];
            }
            if(isset($_POST["industry"]))
            {
                $array["industry"] =$_POST["industry"];
            }
            if(isset($_POST["seeker_future_emp_keyword"]))
            {
                $array["seeker_future_emp_keyword"] =$_POST["seeker_future_emp_keyword"];
            }
            if(isset($_POST["seeker_future_emp_level"]))
            {
                $array["seeker_future_emp_level"] =$_POST["seeker_future_emp_level"];
            }
            if(isset($_POST["future_occupation"]))
            {
                $array["future_occupation"] =$_POST["future_occupation"];
            }
            if(isset($_POST["future_industry"]))
            {
                $array["future_industry"] =$_POST["future_industry"];
            }
            if(isset($_POST["seeker_future_emp_type"]))
            {
                $array["seeker_future_emp_type"] =$_POST["seeker_future_emp_type"];
            }
            
            if(isset($_POST["seeker_required_salary"]))
            {
                $array["seeker_required_salary"] =$_POST["seeker_required_salary"];
            }
            if(isset($_POST["seeker_email"]))
            {
                $array["seeker_email"] =$_POST["seeker_email"];
            }
            if(isset($_POST["seeker_license_code"]))
            {
                $array["seeker_license_code"] =$_POST["seeker_license_code"];
            }
            
            if(isset($_POST["seeker_mobile"]))
            {
                $array["seeker_mobile"] = $_POST['seeker_mobile'];
            }
            if(isset($_POST["name"]))
            {
                $array["seeker_name"] = $_POST['name'];
            }
            if(isset($_POST["seeker_surname"]))
            {
            $array["seeker_surname"] =$_POST["seeker_surname"];
            }
            if(isset($_POST["seeker_maiden"]))
            {
            $array["seeker_maiden"] =$_POST["seeker_maiden"];
            }
            if(isset($_POST["seeker_title"]))
            {
            $array["seeker_title"] =$_POST["seeker_title"];
            }
            
         /* business address detail info */        
            if(isset($_POST["business_street"])) // New added
            {
                $array["seeker_business_street"] =$_POST["business_street"];
            }
            if(isset($_POST["business_street_num"])) // New added
            {
                $array["seeker_business_street_num"] =$_POST["business_street_num"];
            }
            if(isset($_POST["business_suburb"])) // New added
            {
                $array["seeker_business_suburb"] =$_POST["business_suburb"];
            }
            if(isset($_POST["business_city"])) // New added
            {
                $array["seeker_business_city"] =$_POST["business_city"];
            }
            if(isset($_POST["business_country"])) // New added
            {
                $array["seeker_business_country"] =$_POST["business_country"];
            }
     
    /* Postal address detail info */       
            if(isset($_POST["postal_po_box"])) // New added
            {
                $array["seeker_postal_po_box"] =$_POST["postal_po_box"];
            }
            //if(isset($_POST["postal_private_bag"])) // New added
            //{
            //    $array["seeker_postal_private_bag"] =$_POST["postal_private_bag"];
            //}
            if(isset($_POST["postal_post_code"])) // New added
            {
                $array["seeker_postal_post_code"] =$_POST["postal_post_code"];
            }
            if(isset($_POST["postal_city"])) // New added
            {
                $array["seeker_postal_city"] =$_POST["postal_city"];
            }
            if(isset($_POST["postal_country"])) // New added
            {
                $array["seeker_postal_country"] =$_POST["postal_country"];
            }
            if(isset($_POST["seeker_city"]))
            {
                    $array["seeker_city"] =$_POST["seeker_city"];
            }
    /* end postal address*/
    
    /*Contact Information*/
        if(isset($_POST["seeker_phone"]))
        {
                $array["seeker_phone"] =$_POST["seeker_phone"];
        }
        if(isset($_POST["seeker_mobile"]))
        {
                $array["seeker_mobile"] =$_POST["seeker_mobile"];
        }
        if(isset($_POST["seeker_email"]))
        {
                $array["seeker_email"] =$_POST["seeker_email"];
        }
        if(isset($_POST["seeker_web"]))
        {
                $array["seeker_web"] =$_POST["seeker_web"];
        }
    /*End Contact Information*/
    
    /*Login Information*/
    
    /*End Login Information*/
            
            //error_reporting(2);

            if(isset($_FILES["seeker_family_video"]))
            {
                $target_path_video = $_SERVER['DOCUMENT_ROOT'].$this->webroot.'app/webroot/uploads/videos/';
                
                if(is_file($target_path6.$_POST['up_video']))
                    {
                        chmod($target_path_video.$_POST['up_video'], 0777);
                        unlink($target_path_video.$_POST['up_video']);
                    } 
                    
                    $base_name6 =basename( $_FILES['seeker_family_video']['name'] );
                    $ext = strtolower( end( explode(".",$base_name6) ) );
                    if( $ext=="flv" || $ext=="mp4" || $ext=="m4a" || $ext=="mp4v" || $ext=="mov" || $ext=="3gp" || $ext=="3g2"){
                                    $random6 = (rand(9999,999999));
                                    
                                    $target_path = $target_path_video .$random6.$base_name6; 
                                    if( move_uploaded_file($_FILES['seeker_family_video']['tmp_name'], $target_path) )
                                    {
                                            $array['seeker_family_video'] = $random6.$base_name6;

                                    }
                    }           
                
            }
            
            if(isset($_FILES["seeker_picture_upload"]['name']))
            {
                 $_SERVER['DOCUMENT_ROOT'].$this->webroot.'app/webroot/uploads/photos/';
                $filename1 = $prefix.basename($_FILES["seeker_picture_upload"]['name']);
                
                
                $file_ext1 = strtolower(substr($filename1, strrpos($filename1, ".") + 1));
                $filename1 = String::uuid().".".$file_ext1;
                //pr($filename1);
                //die;
                $array["seeker_photo"] = $filename1;
                $height ='189';
                $width = '205';
                $can_video_thumb = $this->JobportalImage->uploadImage($_FILES['seeker_picture_upload'], $_SERVER['DOCUMENT_ROOT'].$this->webroot.'app/webroot/uploads/photos/', $filename1, $height , $width);
            }
            
            if(isset($_FILES["seeker_cv"]))
            {
                $target_path_cv = $_SERVER['DOCUMENT_ROOT'].$this->webroot.'app/webroot/uploads/cvs/';
                
                
                if(!dir($target_path_cv)){
                    mkdir ( $target_path_cv, 0777);
                }
       
                  $target_path = $target_path_cv;
           
               
                $base_name = "";
                // echo $target_path4.$_POST['up_cv'];
                if( $_FILES['seeker_cv']['name']!="" )
                {
                    if(is_file($target_path.$_POST['up_cv']))
                    {
                        chmod($target_path.$_POST['up_cv'], 0777);
                        unlink($target_path.$_POST['up_cv']);
                    } 
                   
                   
                    $base_name = basename( $_FILES['seeker_cv']['name'] );
                    $ext = strtolower( end(explode(".",$base_name)) ) ;
                    if( $ext=="doc" || $ext=="docx")
                    {
                            $random = (rand(9999,999999));
                            
                            $target_path = $target_path .$random. basename( $_FILES['seeker_cv']['name']); 
                            
                            if( move_uploaded_file($_FILES['seeker_cv']['tmp_name'], $target_path) )
                            {
                                
                                    $array['seeker_cv'] = $random.$base_name;
                                   
                            }
                    }
                   
                }
                 
            }
            
                
            if(isset($_FILES["seeker_qualification_doc"]))
            {
                $target_path = $_SERVER['DOCUMENT_ROOT'].$this->webroot.'app/webroot/uploads/qualifications/';
                if(is_file($target_path.$_POST['up_qualification']))
                    {
                        chmod($target_path.$_POST['up_qualification'], 0777);
                        unlink($target_path.$_POST['up_qualification']);
                    } 
                   
                   
                    $base_name = basename( $_FILES['seeker_qualification_doc']['name'] );
                    $ext = strtolower( end(explode(".",$base_name)) ) ;
                    if( $ext=="doc" || $ext=="docx" || $ext=="jpg" || $ext=="jpeg" || $ext=="gif" || $ext=="pdf" )
                    {
                            $random = (rand(9999,999999));
                            $target_path = $target_path .$random. basename( $_FILES['seeker_qualification_doc']['name']); 
                            if( move_uploaded_file($_FILES['seeker_qualification_doc']['tmp_name'], $target_path) )
                            {
                                    $array['seeker_qualification_doc'] = $random.$base_name;                                 
                            }
                    }
                
                //$array["seeker_qualification_doc"] =$_FILES["seeker_qualification_doc"]['name'];
            }
            
            if(isset($_FILES["seeker_service_doc"]))
            {
                 $target_path = $_SERVER['DOCUMENT_ROOT'].$this->webroot.'app/webroot/uploads/docs/';
                if(is_file($target_path.$_POST['up_service']))
                    {
                        chmod($target_path.$_POST['up_service'], 0777);
                        unlink($target_path.$_POST['up_service']);
                    } 
                   
                   
                    $base_name = basename( $_FILES['seeker_service_doc']['name'] );
                    $ext = strtolower( end(explode(".",$base_name)) ) ;
                    if( $ext=="doc" || $ext=="docx" || $ext=="jpg" || $ext=="jpeg" || $ext=="gif" || $ext=="pdf" )
                    {
                            $random = (rand(9999,999999));
                            $target_path = $target_path .$random. basename( $_FILES['seeker_service_doc']['name']); 
                            if( move_uploaded_file($_FILES['seeker_service_doc']['tmp_name'], $target_path) )
                            {
                                    $array['seeker_service_doc'] = $random.$base_name;
                            }
                    }
                
                
            }
            if(isset($_FILES["seeker_other_doc1"]))
            {
                $target_path = $_SERVER['DOCUMENT_ROOT'].$this->webroot.'app/webroot/uploads/others/';
                if(is_file($target_path.$_POST['up_other1']))
                    {
                        chmod($target_path.$_POST['up_other1'], 0777);
                        unlink($target_path.$_POST['up_other1']);
                    } 
                   
                   
                    $base_name = basename( $_FILES['seeker_other_doc1']['name'] );
                    $ext = strtolower( end(explode(".",$base_name)) ) ;
                    if( $ext=="doc" || $ext=="docx" || $ext=="jpg" || $ext=="jpeg" || $ext=="gif" || $ext=="pdf" )
                    {
                        
                            $random = (rand(9999,999999));
                            $target_path = $target_path .$random. basename( $_FILES['seeker_other_doc1']['name']); 
                            if( move_uploaded_file($_FILES['seeker_other_doc1']['tmp_name'], $target_path) )
                            {
                                    $array['seeker_other_doc'] = $random.$base_name;
                            }
                    }
            }
            if(isset($_FILES['can_video_thumb']['name']) AND $_FILES['can_video_thumb']['name'] != '')
                {
                        $filename1 = $prefix.basename($_FILES['can_video_thumb']['name']);
                        $file_ext1 = strtolower(substr($filename1, strrpos($filename1, ".") + 1));
                        $video_thumb = String::uuid().".".$file_ext1;
                        $height ='370';
                        $width = '705';
                        $can_video_thumb = $this->JobportalImage->uploadImage($_FILES['can_video_thumb'], $_SERVER['DOCUMENT_ROOT'].$this->webroot.'app/webroot/uploads/', $video_thumb, $height , $width);
                }
                else
                {
                        $video_thumb = $profile_data[0]['candidate_profile']['can_video_thumb'];
                }
                
               $array_pro =array( 'can_video_url' => trim($_POST['can_video_url']),
                            'career_summary' => trim($_POST['career_summary']),
                            'video_summary' => trim($_POST['video_summary']),
                            'photo_summary' => trim($_POST['photo_summary']),
                            'forum_summary' => trim($_POST['forum_summary']),
                            'link_summary' => trim($_POST['link_summary']),
                            'message_summary' => trim($_POST['message_summary']),
                            'can_video_thumb' => trim($video_thumb)
                            );
           
           
           

                    $array_pro['can_id'] = $login_user['id'];
                    $data['CandidateProfile'] = $array_pro;
                    if(count($profile_data) == '')
			{
				
				$this->CandidateProfile->create();
				$query = $this->CandidateProfile->save($data['CandidateProfile']);				
			}
			else
			{
                                $data['CandidateProfile']['id'] = $_POST['pro_id'];
                                //pr($data['CandidateProfile']);
                                //die;
                                $query = $this->CandidateProfile->save($data['CandidateProfile']);
                                $this->Session->setFlash(__('Profile data updated.'));
			}
                        $array['seeker_id'] = $login_user['id'];
                    $data['JobJobseeker'] = $array;
                        
                        if(count($seeker_data) == '')
                        {
                            $this->JobJobseeker->create();
				$query = $this->JobJobseeker->save($data['JobJobseeker']);
                        }
                        else
                        {
                            
                            $data['JobJobseeker']['id'] = $_POST['id'];
                            //pr($data['JobJobseeker']);
                            //die;
                                $query = $this->JobJobseeker->save($data['JobJobseeker']);
                                $this->Session->setFlash(__('Profile data updated.'));
                        }
                        $this->redirect(array('controller' => 'candidate', 'action' => 'candidate_profile'));
        }
    }
    
    function edit_action()
    {
         if($_POST["FieldName"]=="seeker_gender")
            {
   		echo $value =$_POST["FieldValue"];
                 $login_user = $this->Auth->user();
              echo   $id = $login_user['id'];
              
               if(isset($_POST['seeker_work_history_duration_from_month']))
          {
            $array["seeker_work_history_duration_from"]=$_POST["seeker_work_history_duration_from_year"] ."-". $_POST["seeker_work_history_duration_from_month"]."-00";
          }
          if(isset($_POST['seeker_work_history_duration_to_month']))
          {
            $array["seeker_work_history_duration_to"]=$_POST["seeker_work_history_duration_to_year"] ."-". $_POST["seeker_work_history_duration_to_month"]."-00"; 
          }
                $this->JobJobseeker->seeker_id = $id;
                $this->JobJobseeker->saveField('seeker_gender' , $value);
            }
    }
    
    function update_skill()
    {
        error_reporting(0);
    $auth_data = $this->Auth->user();
        if (isset($auth_data) && !empty($auth_data)) {
            if ($auth_data['type'] == 'employer') {
                
                $this->redirect(array('controller' => 'employer', 'action' => 'index'));
            }
        }
    
        $login_user = $this->Auth->user();
        $id = $login_user['id'];
        $this->set('page', 'jobadd');
        $seeker_data = $this->JobJobseeker->getJobJobseekerById($id);
        $seeker_result = $this->TransMember->arraytoobject($seeker_data[0]['job_jobseeker']);
        $this->set('rsseeker', $seeker_result);
        
       
        
        $seeker_category ='';
        if(isset($_POST['seeker_category'])) { $seeker_category = $_POST['seeker_category']; } else { $seeker_category = $seeker_result->seeker_category; }
        $seeker_category_drop =  $this->JobOptions->fill_dropdown("seeker_category",'job_options','option_name', "option_name",$seeker_category,"Select","where category_id=14");
        $this->set('seeker_category_drop',$seeker_category_drop);
        
        $seeker_language_home ='';
        if(isset($_POST['seeker_language_home'])) { $seeker_language_home = $_POST['seeker_language_home']; } else { $seeker_language_home = $seeker_result->seeker_language_home; }
        $seeker_language_home_drop =  $this->JobOptions->fill_dropdown("seeker_language_home",'job_options','option_name', "option_name",$seeker_language_home,"Language","where category_id=15");
        $this->set('seeker_language_home_drop',$seeker_language_home_drop);
        
        $seeker_language_second ='';
        if(isset($_POST['seeker_language_second'])) { $seeker_language_second = $_POST['seeker_language_second']; } else { $seeker_language_second = $seeker_result->seeker_language_second; }
        $seeker_language_second_drop =  $this->JobOptions->fill_dropdown("seeker_language_second",'job_options','option_name', "option_name",$seeker_language_second,"Language","where category_id=15");
        $this->set('seeker_language_second_drop',$seeker_language_second_drop);
        
        $seeker_language_third ='';
        if(isset($_POST['seeker_language_third'])) { $seeker_language_third = $_POST['seeker_language_third']; } else { $seeker_language_third = $seeker_result->seeker_language_third; }
        $seeker_language_third_drop =  $this->JobOptions->fill_dropdown("seeker_language_third",'job_options','option_name', "option_name",$seeker_language_third,"Language","where category_id=15");
        $this->set('seeker_language_third_drop',$seeker_language_third_drop);
        
        
        $seeker_highestdegree ='';
        if(isset($_POST['seeker_highestdegree'])) { $seeker_highestdegree = $_POST['seeker_highestdegree']; } else { $seeker_highestdegree = $seeker_result->seeker_tertiary_higherdegree; }
        $seeker_highestdegree_drop =  $this->JobOptions->fill_dropdown('seeker_highestdegree','job_options', 'option_name',"option_name",$seeker_highestdegree,"Select","where category_id=2");
        $this->set('seeker_highestdegree_drop',$seeker_highestdegree_drop);
        
        $seeker_seconddegree ='';
        if(isset($_POST['seeker_seconddegree'])) { $seeker_seconddegree = $_POST['seeker_seconddegree']; } else { $seeker_seconddegree = $seeker_result->seeker_tertiary_secounddegree; }
        $seeker_seconddegree_drop =  $this->JobOptions->fill_dropdown('seeker_seconddegree','job_options', 'option_name',"option_name",$seeker_seconddegree,"Select","where category_id=2");
        $this->set('seeker_seconddegree_drop',$seeker_seconddegree_drop);
        
        $seeker_thirddegree ='';
        if(isset($_POST['seeker_thirddegree'])) { $seeker_thirddegree = $_POST['seeker_thirddegree']; } else { $seeker_thirddegree = $seeker_result->seeker_tertiary_thirddegree; }
        $seeker_thirddegree_drop =  $this->JobOptions->fill_dropdown('seeker_thirddegree','job_options', 'option_name',"option_name",$seeker_thirddegree,"Select","where category_id=2");
        $this->set('seeker_thirddegree_drop',$seeker_thirddegree_drop);
        $seeker_secondarydegree ='';
       if(isset($_POST["seeker_secondarydegree"]))
	{
		$seeker_secondarydegree=$_POST["seeker_secondarydegree"];
	}
	else
	{
		$seeker_secondarydegree=$seeker_result->seeker_secoundary_degree;
	}
        $seeker_secondarydegree_drop =  $this->JobOptions->fill_dropdown('seeker_secondarydegree','job_options', 'option_name',"option_name",$seeker_secondarydegree,"Select","where category_id=3");
        $this->set('seeker_secondarydegree_drop',$seeker_secondarydegree_drop);
        
        if(isset($_POST["seeker_secondaryleadership"]))
	{
		$seeker_leadership=$_POST["seeker_secondaryleadership"];
	}
	else
	{
		$seeker_leadership=$seeker_result->seeker_secoundary_leadership;
	}
        $seeker_secondaryleadership_drop =  $this->JobOptions->fill_dropdown('seeker_secondaryleadership','job_options', 'option_name',"option_name",$seeker_leadership,"Select","where category_id=10","  onChange='leadershipOther()'");
        $this->set('seeker_secondaryleadership_drop',$seeker_secondaryleadership_drop);
        $seeker_employer_type[1] = '';
        $seeker_employer_type_drop =  $this->JobOptions->fill_dropdown('seeker_employer_type[]','job_options', 'option_name',"option_name",$seeker_employer_type[1],"Select","where category_id=8");
        $this->set('seeker_employer_type_drop',$seeker_employer_type_drop);
        $seeker_employer_industry[1] = '';
        $seeker_employer_industry_type_drop =  $this->JobOptions->fill_dropdown("seeker_employer_industry[]",'job_options', 'option_name', "option_name",$seeker_employer_industry[1],"Select","where category_id=6");
        $this->set('seeker_employer_industry_type_drop',$seeker_employer_industry_type_drop);
        $seeker_employer_position[1] ='';
        $seeker_employer_position_drop =  $this->JobOptions->fill_dropdown("seeker_employer_position[]",'job_options', 'option_name', "option_name",$seeker_employer_position[1],"Select","where category_id=7");
        $this->set('seeker_employer_position_drop',$seeker_employer_position_drop);

        
        if(isset($_POST['submit']))
        {
            
            
            //pr($_POST);

            $array =  array();
                    if(isset($_POST["seeker_summary"]))
                    {
                    $array["seeker_summary"] =$_POST["seeker_summary"];
                    }
                    if(isset($_POST["seeker_category"]))
                    {
                    $array["seeker_category"] =$_POST["seeker_category"];
                    }
                    if(isset($_POST["seeker_company_name"]))
                    {
                    $array["seeker_company_name"] =$_POST["seeker_company_name"];
                    }
                    if(isset($_POST["seeker_skills"]))
                    {
                    $array["seeker_skills"] =$_POST["seeker_skills"];
                    }
                    if(isset($_POST["seeker_education"]))
                    {
                    $array["seeker_education"] =trim($_POST["seeker_education"]);
                    }
                    if(isset($_POST["seeker_fulltime"]))
                    {
                    $array["seeker_fulltime"] =$_POST["seeker_fulltime"];
                    }
                    else
                    {
                    $array["seeker_fulltime"]=0;
                    }
                    if(isset($_POST["seeker_parttime"]))
                    {
                    $array["seeker_parttime"] =$_POST["seeker_parttime"];
                    }
                    else
                    {
                    $array["seeker_parttime"]=0;
                    }
                    if(isset($_POST["seeker_contract"]))
                    {
                    $array["seeker_contract"] =$_POST["seeker_contract"];
                    }
                    else
                    {
                    $array["seeker_contract"]=0;
                    }
                    if(isset($_POST["seeker_temp"]))
                    {
                    $array["seeker_temp"] =$_POST["seeker_temp"];
                    }
                    else
                    {
                    $array["seeker_temp"]=0;
                    }
                    if(isset($_POST["seeker_experience"]))
                    {
                    $array["seeker_experience"] =$_POST["seeker_experience"];
                    }
                    if(isset($_POST["seeker_education"]))
                    {
                    $array["seeker_education"] =$_POST["seeker_education"];
                    }
                    if(isset($_POST["seeker_highereducation"]))
                    {
                    $array["seeker_highereducation"] =$_POST["seeker_highereducation"];
                    }
                    if(isset($_POST["seeker_jobstate"]))
                    {
                    $array["seeker_jobstate"] =$_POST["seeker_jobstate"];
                    }
                    if(isset($_POST["seeker_benifits"]))
                    {
                    $array["seeker_benifits"] =$_POST["seeker_benifits"];
                    }
                    if(isset($_POST["seeker_duration"]))
                    {
                    $array["seeker_duration"] =$_POST["seeker_duration"];
                    }
                    if(isset($_POST["seeker_jobcity"]))
                    {
                    $array["seeker_jobcity"] =$_POST["seeker_jobcity"];
                    }
                    if(isset($_POST["seeker_terms"]))
                    {
                    $array["seeker_terms"] =$_POST["seeker_terms"];
                    }
                    
                    // For Tertiary higher Qualifications 
        
        if(isset($_POST["seeker_highestdegree"]))
        {
        $array["seeker_tertiary_higherdegree"] =$_POST["seeker_highestdegree"];
        }
        
        if(isset($_POST["seeker_higheststudy"]))
        {
        $array["seeker_tertiary_higherfield"] =$_POST["seeker_higheststudy"];
        }
        
        if(isset($_POST["seeker_highestinstitution"]))
        {
        $array["seeker_tertiary_higherinstitution"] =$_POST["seeker_highestinstitution"];
        }
        $higherfromdate=$_POST["seeker_highest_from_year"] ."-". $_POST["seeker_highest_from_month"]."-".$_POST["seeker_highest_from_date"];
        //echo($higherfromdate);
        $array["seeker_tertiary_higherfromdate"]=$higherfromdate;
        $array["seeker_tertiary_highertodate"]=$_POST["seeker_highest_to_year"] ."-". $_POST["seeker_highest_to_month"]."-".$_POST["seeker_highest_to_date"];
        
        // For Tertiary secound Qualifications 
        
        if(isset($_POST["seeker_seconddegree"]))
        {
        $array["seeker_tertiary_secounddegree"] =$_POST["seeker_seconddegree"];
        }
        
        if(isset($_POST["seeker_secondstudy"]))
        {
        $array["seeker_tertiary_secoundfield"] =$_POST["seeker_secondstudy"];
        }
        
        if(isset($_POST["seeker_secondinstitution"]))
        {
        $array["seeker_tertiary_secoundinstitution"] =$_POST["seeker_secondinstitution"];
        }
        
        
        $array["seeker_tertiary_secoundfromdate"]=$_POST["seeker_second_from_year"] ."-". $_POST["seeker_second_from_month"]."-".$_POST["seeker_second_from_date"];
        //print_r($array["seeker_tertiary_secoundfromdate"]);
        $array["seeker_tertiary_secoundtodate"]=$_POST["seeker_second_to_year"] ."-". $_POST["seeker_second_to_month"]."-".$_POST["seeker_second_to_date"];
        
        
        // For Tertiary third Qualifications 
        
        if(isset($_POST["seeker_thirddegree"]))
        {
        $array["seeker_tertiary_thirddegree"] =$_POST["seeker_thirddegree"];
        }
        
        if(isset($_POST["seeker_thirdstudy"]))
        {
        $array["seeker_tertiary_thirdfield"] =$_POST["seeker_thirdstudy"];
        }
        
        if(isset($_POST["seeker_thirdinstitution"]))
        {
        $array["seeker_tertiary_thirdinstitution"] =$_POST["seeker_thirdinstitution"];
        }
        
        $array["seeker_tertiary_thirdfromdate"]=$_POST["seeker_third_from_year"] ."-". $_POST["seeker_third_from_month"]."-".$_POST["seeker_third_from_date"];
        $array["seeker_tertiary_thirdtodate"]=$_POST["seeker_third_to_year"] ."-". $_POST["seeker_third_to_month"]."-".$_POST["seeker_third_to_date"];
        
        
        // end of Tertiary  Qualification
        
        //  secondary   Qualification
        
        if(isset($_POST["seeker_secondarydegree"]))
        {
        $array["seeker_secoundary_degree"] =$_POST["seeker_secondarydegree"];
        }
        
        
        
        if(isset($_POST["seeker_secoundaryinstitution"]))
        {
        $array["seeker_secoundary_institution"] =$_POST["seeker_secoundaryinstitution"];
        }
        $array["seeker_secoundary_fromdate"]=$_POST["seeker_secondary_from_year"] ."-". $_POST["seeker_secondary_from_month"]."-".$_POST["seeker_secondary_from_date"];
        $array["seeker_secoundary_todate"]=$_POST["seeker_secondary_to_year"] ."-". $_POST["seeker_secondary_to_month"]."-".$_POST["seeker_secondary_to_date"];
        
        
        if(isset($_POST["seeker_secondaryleadership"]))
        {
        if($_POST["seeker_secondaryleadership"]=="---- Other ----" && isset($_POST["seeker_leadership"]))
        {
        $array["seeker_secoundary_leadership"] =$_POST["seeker_leadership"];
        }
        else
        {
        $array["seeker_secoundary_leadership"] =$_POST["seeker_secondaryleadership"];
        }
        }
        
        if(isset($_POST['employer']))
        {
            $array["seeker_emp1_employer"] = mysql_real_escape_string(serialize($_POST['employer']));
        }
        if(isset($_POST['seeker_employer_type']))
        {
            $array["seeker_emp1_employement"] = mysql_real_escape_string(serialize($_POST['seeker_employer_type']));
        }
        if(isset($_POST['seeker_employer_industry']))
        {
            $array["seeker_emp1_industry"] = mysql_real_escape_string(serialize($_POST['seeker_employer_industry']));
        }
        if(isset($_POST['employer']))
        {
        $array["seeker_employer_position"] = mysql_real_escape_string(serialize($_POST['seeker_employer_position']));
        }
        if((isset($_POST['seeker_employer_from_month']) AND $_POST['seeker_employer_from_month'] !='') AND (isset($_POST['seeker_employer_from_year']) AND $_POST['seeker_employer_from_year'] !='') AND (isset($_POST['seeker_employer_from_date']) AND $_POST['seeker_employer_from_date'] !='') )
        {
            for($i=0;$i<count($_POST['seeker_employer_from_month']);$i++)
            {
            $seeker_emp_fromdate[] = $_POST["seeker_employer_from_year"][$i]."-".$_POST["seeker_employer_from_month"][$i]."-".$_POST["seeker_employer_from_date"][$i];
            }	
            $array["seeker_emp1_fromdate"] = mysql_real_escape_string(serialize($seeker_emp_fromdate));
        }
        if((isset($_POST['seeker_employer_to_year']) AND $_POST['seeker_employer_to_year'] !='') AND (isset($_POST['seeker_employer_to_month']) AND $_POST['seeker_employer_to_month'] !='') AND (isset($_POST['seeker_employer_to_date']) AND $_POST['seeker_employer_to_date'] !='') )
        {
            for($i=1;$i<count($_POST['seeker_employer_to_month']);$i++)
            {
            $seeker_emp_todate[] =$_POST['seeker_employer_to_year'][$i]."-".$_POST["seeker_employer_to_month"][$i]."-".$_POST["seeker_employer_to_date"][$i];
            }
            if(isset($seeker_emp_todate)) { 
            $array["seeker_emp1_todate"] = mysql_real_escape_string(serialize($seeker_emp_todate));
            }
        }
        //end of secondary qualification
//pr($_POST);


            
            $array['seeker_id'] = $login_user['id'];
            $data['JobJobseeker'] = $array;
            
            if(count($seeker_data) == '')
            {
               // echo '1...........'; print_r($data['JobJobseeker']);die('1');
                $this->JobJobseeker->create();
                $query = $this->JobJobseeker->save($data['JobJobseeker']);
            }
            else
            {
                 //echo '2.........'; print_r($data['JobJobseeker']);die('2');
                $data['JobJobseeker']['id'] = $_POST['id'];
               // pr($data['JobJobseeker']);
                //die;
                $query = $this->JobJobseeker->save($data['JobJobseeker']);
                $this->Session->setFlash(__('Profile data updated.'));
            }
        }
    }
    
    function follow_action()
    {
        $uniq = $_GET['sender_id'].$_GET['emp_id'].strtotime(date("Y-m-d H:i:s"));
        $sender_data = $this->TransMember->getUserInfoById($_GET['sender_id']);
        $sender_data_id = $sender_data[0]['trans_member']['id'];
        
        $reciver_data = $this->TransMember->getUserInfoById($_GET['emp_id']);
        $reciver_data_id = $reciver_data[0]['trans_member']['id'];
        
        $arr = array( 'follower' => $_GET['sender_id'], 'following' => $_GET['emp_id'], 'status' => '1', 'follow_date' => '' );
        $data['Follow'] =  $arr;
        $this->Follow->create();
        $query = $this->Follow->save($data['Follow']);    
        
       
        $arr = array( 'from_id' => $sender_data_id, 'to_id' => $reciver_data_id,'message' => '','video_id' => $uniq,'message_time' => date("Y-m-d H:i:s"));
        $data['TransFilmmakersChat'] =  $arr;
        $this->TransFilmmakersChat->create();
        $query = $this->TransFilmmakersChat->save($data['TransFilmmakersChat']);
        
        $arr = array( 'from_id' => $reciver_data_id, 'to_id' => $sender_data_id,'message' => '','video_id' => $uniq,'message_time' => date("Y-m-d H:i:s"));
        $data['TransFilmmakersChat'] =  $arr;
        $this->TransFilmmakersChat->create();
        $query = $this->TransFilmmakersChat->save($data['TransFilmmakersChat']);
		
        echo 'done';
    }
    
    
    function thankyou_plan()
		{
			error_reporting(1);
			if(isset($_REQUEST['payment_status']) AND $_REQUEST['payment_status'] == 'Completed')
			{
				$auth_data = $this->Auth->user();
				$status = $_REQUEST['payment_status'];
				$amount = $_REQUEST['mc_gross'];
				$employer_id = $auth_data['id'];
				$user_type = $auth_data['type'];
				$plan_name = $_REQUEST['item_name'];
				$pay_date = $_REQUEST['payment_date'];
				
				
				$plan_data = $this->Plantable->getPlanByType($user_type,$amount);
				$track_payment = $this->PaymentsTable->getTrackPaymentsByUser($employer_id);
				



				if(count($track_payment) == 0)
				{
					$start_date = date('Y-m-d');
				}
				else
				{
					foreach($track_payment as $val_data)
					{
						$set_date = $val_data['payments_table']['end_date'];
					}
					//die;
					$start_date = $set_date;
				 	$start_date = strtotime(date("Y-m-d", strtotime($start_date)) . " +1 days");
					$start_date = date('Y-m-d', $start_date);
				//die;
				}
				$this->set('start_date',$start_date);
				$this->set('plan_data' , $plan_data);
				//$plan_id = $plan_data[0]['plan']['id'];
				$status = $_REQUEST['payment_status'];
				$time_duration = $plan_data[0]['plantable']['time_duration'];
				if($plan_data[0]['plantable']['time_duration'] == '12 month' )
				{
					$date1 = $start_date;
					$date1 = strtotime(date("Y-m-d", strtotime($date1)) . " +12 month");
					$end_date = date('Y-m-d', $date1);
					//die;
				}
				elseif($plan_data[0]['plantable']['time_duration'] == '6 month')
				{
					$date2 = $start_date;
					$date2 = strtotime(date("Y-m-d", strtotime($date2)) . " +6 month");
					$end_date = date('Y-m-d', $date2);
					//die;
				}
				elseif($plan_data[0]['plantable']['time_duration'] == '3 month')
				{
					$date3 = $start_date;
					$date3 = strtotime(date("Y-m-d", strtotime($date3)) . " +3 month");
					$end_date = date('Y-m-d', $date3);
					//die;
				}
				$duration = $plan_data[0]['plantable']['time_duration'];
				 $this->set('end_date' , $end_date);
				
							
				$data['PaymentsTable'] = array ( 'plan_id' =>  $plan_data[0]['plantable']['id'] ,'employer_id' => $employer_id , 'pay_amount' => $amount ,
				'pay_by' => 'paypal', 'type' => $user_type, 'start_date' => $start_date , 'end_date' => $end_date ,'duration' => $duration ,'pay_date' => '', 'status' => $status );
				//pr($data['PaymentsTable']);
				//die;
				
				$this->PaymentsTable->create();
				$query = $this->PaymentsTable->save($data['PaymentsTable']);
				
				$lid = $this->PaymentsTable->getLastInsertID();
				
				
				if($plan_data[0]['plantable']['time_duration'] == '12 month' )
				{
					for($i=0;$i<=11;$i++)
					{
						if($i==0)
						{
							$start = $start_date;
							$end = strtotime(date("Y-m-d", strtotime($start)) . " +7 days");
							$end = date('Y-m-d' , $end);
						}
						elseif($i >= 1)
						{
							$date3 = $start_date;
							$start = strtotime(date("Y-m-d", strtotime($date3)) . " +$i month");
							$start = date('Y-m-d' , $start);
							$end = strtotime(date("Y-m-d", strtotime($start)) . " +7 days");
							$end = date('Y-m-d' , $end);
						}
					
					$data['TrackJobAdvert'] = array(
						'job_plan_id' =>$lid ,
						'user_id' => $employer_id,
						'start_date' => $start,
						'end_date' => $end,
					);
					$this->TrackJobAdvert->create();
					$query = $this->TrackJobAdvert->save($data['TrackJobAdvert']);
					}
					//die;
				}
				elseif($plan_data[0]['plantable']['time_duration'] == '6 month')
				{
					
					for($i=0;$i<=5;$i++)
					{
						if($i==0)
						{
							$start = $start_date;
							$end = strtotime(date("Y-m-d", strtotime($start)) . " +7 days");
							$end = date('Y-m-d' , $end);
						}
						elseif($i >= 1)
						{
							$date3 = $start_date;
							$start = strtotime(date("Y-m-d", strtotime($date3)) . " +$i month");
							$start = date('Y-m-d' , $start);
							$end = strtotime(date("Y-m-d", strtotime($start)) . " +7 days");
							$end = date('Y-m-d' , $end);
						}
					$data['TrackJobAdvert'] = array(
						'job_plan_id' =>$lid ,
						'user_id' => $employer_id,
						'start_date' => $start,
						'end_date' => $end,
					);
					$this->TrackJobAdvert->create();
					$query = $this->TrackJobAdvert->save($data['TrackJobAdvert']);
					}
					//die;
				}
				elseif($plan_data[0]['plantable']['time_duration'] == '3 month')
				{
					for($i=0;$i<=2;$i++)
					{
						if($i==0)
						{
							$start = $start_date;
							$end = strtotime(date("Y-m-d", strtotime($start)) . " +7 days");
							$end = date('Y-m-d' , $end);
						}
						elseif($i >= 1)
						{
							$date3 = $start_date;
							$start = strtotime(date("Y-m-d", strtotime($date3)) . " +$i month");
							$start = date('Y-m-d' , $start);
							$end = strtotime(date("Y-m-d", strtotime($start)) . " +7 days");
							$end = date('Y-m-d' , $end);
						}
					
					$data['TrackJobAdvert'] = array(
						'job_plan_id' =>$lid ,
						'user_id' => $employer_id,
						'start_date' => $start,
						'end_date' => $end,
					);
					$this->TrackJobAdvert->create();
					$query = $this->TrackJobAdvert->save($data['TrackJobAdvert']);
					}
				}
				$message = ucfirst($auth_data['name']) ."have paid amount &pound; $amount for a $time_duration";
				$url = '#';
				
				$arr['Notification'] = array('user_id' =>$employer_id, 'notication_id' => $lid , 'status' =>1 , 'type' => 'payment' , 'table_name' => 'payments_table', 'message' => $message, 'url' => $url );
				$this->Notification->create();
				$query = $this->Notification->save($arr['Notification']);
				
				if(isset($query))
				$this->Session->setFlash(__("You have got $plan_name Membership plan successfully for a $time_duration"));
				$this->redirect(array('action' => 'candidate_profile/'.$auth_data['name']));
			}
			
			
		}
                
    function video_gallery()
    {
        error_reporting(1);
        $this->set('comment', '1');
        $this->set('JobSeeker', $this->JobJobseeker);
        $this->set('EmployerProfile', $this->EmployerProfile);
        $this->set('User', $this->User);
        $this->set('page' , 'candidate_profile');
        $login_user = $this->Auth->user();
        $this->set('login_user',$login_user);
        if(isset($this->params['pass'][0]))
            $username = trim($this->params['pass'][0]);
        
        // error_reporting(0);
        if(isset($this->params['pass'][0]) AND ($this->params['pass'][0] == $login_user['name']) )
        {        
            $login_user = $this->Auth->user();
            $login_userID = $login_user['id'];
            if($login_user['type'] == 'candidate')
            {
                
                        $video_record = $this->VideoGallery->find('first', array('conditions' => array(
                            'user_id' => $login_userID
                            )
                            ));
                            $this->set('video_gallery' , $video_record);
                        $comment_record = $this->JobComment->find('all', array('conditions' => array(
                            'user_id' => $login_userID, 'comment_type' => 'video comment'
                            )
                            ));
                            $this->set('comment_record' , $comment_record);
                            
        $this->set('current_page_id',$login_userID);
        $this->set('checklogin',$login_userID);
        $this->set('user_data',$login_user);
        $login_userID = $login_user['id'];
        $business_follow = $this->Follow->getFollowByCanId($login_userID);
        $this->set('business_network',$business_follow);
        $check_data = $this->CandidateProfile->getCandidateProfileById($login_userID);
        
        $fav_data = $this->FavoriteCandidate->getFavoriteCandidateByEmpID($login_userID);
        $this->set('fav_data', $fav_data );
        
        if(isset($check_data[0]))
        $this->set('pro_data', $check_data[0]['candidate_profile']);
        
        $jobdata = $this->JobAd->getJobsByUserId($login_user['id']);
        $this->set('job_info', $jobdata);
        $this->set('emp_user',$login_user['name']);
        $emp_data = $this->User->getUsername($login_user['name']);
        $this->set('emp_data',$emp_data[0]['users']);
        
        $seeker_data_value = $this->JobJobseeker->getJobJobseekerById($login_user['id']);//pr($seeker_data_value);
        $this->set('seeker_data_set',$seeker_data_value);
            }
            else
            {
                    $this->redirect(array('controller' => 'Home', 'action' => 'index'));
            }
            
            
        }
        else
        { 
        if(isset($this->params['pass'][0]))
        { 
        $username = trim($this->params['pass'][0]);
        $user_data = $this->User->getUsername($username);
        $this->set('checklogin','');
        //pr($user_data);
        //die;
        if(isset($user_data) AND count($user_data) > 0 )
        {
        $user_id = $user_data[0]['users']['id'];
        $this->set('current_page_id',$user_id);
        if($user_data[0]['users']['type'] == 'candidate')
        {
            
            $video_record = $this->VideoGallery->find('first', array('conditions' => array(
                            'user_id' => $user_id
                            )
                            ));
                            $this->set('video_gallery' , $video_record);
                            
            $comment_record = $this->JobComment->find('all', array('conditions' => array(
                            'user_id' => $user_id, 'comment_type' => 'video comment'
                            )
                            ));
                            $this->set('comment_record' , $comment_record);
            
        $login_user = $this->Auth->user();
        $business_follow = $this->Follow->getFollowByCanId($user_id);
        $this->set('business_network',$business_follow);
        //echo $login_user['id'].','. $user_id;
        //die;
        $check_fav =  $this->FavoriteCandidate->getFavoriteCandidateByID($login_user['id'], $user_id);
        //pr($check_fav);
        //die;
        if(count($check_fav) > 0)
        {
        $this->set('favorite','favorite');
        
        }
        else
        {
        $this->set('favorite','');
        }
        $this->set('user_data',$user_data[0]['users']);
        $jobdata = $this->JobAd->getJobsByUserId($user_id);
        $this->set('job_info', $jobdata);
        $this->set('emp_user',$username);
        
        $login_userID = $login_user['id'];
        $check_data = $this->CandidateProfile->getCandidateProfileById($user_id);
        
        $fav_data = $this->FavoriteCandidate->getFavoriteCandidateByEmpID($user_id);
        //pr($fav_data);
        //die;
        $this->set('fav_data', $fav_data );
        //pr($check_data);
        //die;
        if(isset($check_data[0]))
        $this->set('pro_data', $check_data[0]['candidate_profile']);
        
        $emp_data = $this->User->getUsername($username);
        $this->set('emp_data',$emp_data[0]['users']);
        
        $seeker_data_value = $this->JobJobseeker->getJobJobseekerById($user_id);//pr($seeker_data_value);
        $this->set('seeker_data_set',$seeker_data_value);
        }
                            else
                            {
                                    $this->redirect(array('controller' => 'Home', 'action' => 'index'));
                            }
        }
        else
        {
        $this->redirect(array('controller' => 'home', 'action' => 'index'));
        }
        
        
        }
        elseif(isset($login_user) AND $login_user['id'] !='')
        {
        $login_user = $this->Auth->user();
        $login_userID = $login_user['id'];
        $this->set('checklogin',$login_userID);
        if($login_user['type'] == 'candidate'){
            
            $video_record = $this->VideoGallery->find('first', array('conditions' => array(
                            'user_id' => $login_user['id']
                            )
                            ));
                            $this->set('video_gallery' , $video_record);
                            
            $comment_record = $this->JobComment->find('all', array('conditions' => array(
                            'user_id' => $login_user['id'], 'comment_type' => 'video comment'
                            )
                            ));
                            $this->set('comment_record' , $comment_record);
        
        $this->set('user_data',$login_user);
        $login_userID = $login_user['id'];
        $this->set('current_page_id',$login_userID);
        $business_follow = $this->Follow->getFollowByCanId($login_userID);
        $this->set('business_network',$business_follow);
        $check_data = $this->CandidateProfile->getCandidateProfileById($login_userID);
        
        $fav_data = $this->FavoriteCandidate->getFavoriteCandidateByEmpID($login_userID);
        //pr($fav_data);
        //die;
        $this->set('fav_data', $fav_data );
        if(isset($check_data[0]))
        $this->set('pro_data', $check_data[0]['candidate_profile']);
        
        $jobdata = $this->JobAd->getJobsByUserId($login_user['id']);
        $this->set('job_info', $jobdata);
        $this->set('emp_user',$login_user['name']);
        
        $emp_data = $this->User->getUsername($login_user['name']);
        $this->set('emp_data',$emp_data[0]['users']);
        
        $seeker_data_value = $this->JobJobseeker->getJobJobseekerById($login_userID);//pr($seeker_data_value);
        $this->set('seeker_data_set',$seeker_data_value);
        $candidate_summary = $this->CandidateProfile->getCandidateProfileById($login_userID);      
        $this->set('candidate_summary',$candidate_summary);
        } else{
        $this->redirect(array('controller' => 'home', 'action' => 'index'));
        }
        }
        else
        {
        $this->redirect(array('controller' => 'home', 'action' => 'index'));
        }
        }
                    
    }
    
    function photo_gallery()
    {
        error_reporting(1);
        $this->set('comment', '2');
        $this->set('JobSeeker', $this->JobJobseeker);
        $this->set('EmployerProfile', $this->EmployerProfile);
        $this->set('User', $this->User);
        $this->set('page' , 'candidate_profile');
        $login_user = $this->Auth->user();
        $this->set('login_user',$login_user);
        if(isset($this->params['pass'][0]))
            $username = trim($this->params['pass'][0]);
        
        // error_reporting(0);
        if(isset($this->params['pass'][0]) AND ($this->params['pass'][0] == $login_user['name']) )
        {        
            $login_user = $this->Auth->user();
            $login_userID = $login_user['id'];
            if($login_user['type'] == 'candidate')
            {
                
                        $video_record = $this->PhotoGallery->find('first', array('conditions' => array(
                            'user_id' => $login_userID
                            )
                            ));
                            $this->set('photo_gallery' , $video_record);
                        $comment_record = $this->JobComment->find('all', array('conditions' => array(
                            'user_id' => $login_userID, 'comment_type' => 'photo comment'
                            )
                            ));
                            $this->set('comment_record' , $comment_record);
                            
        $this->set('current_page_id',$login_userID);
        $this->set('checklogin',$login_userID);
        $this->set('user_data',$login_user);
        $login_userID = $login_user['id'];
        $business_follow = $this->Follow->getFollowByCanId($login_userID);
        $this->set('business_network',$business_follow);
        $check_data = $this->CandidateProfile->getCandidateProfileById($login_userID);
        
        $fav_data = $this->FavoriteCandidate->getFavoriteCandidateByEmpID($login_userID);
        $this->set('fav_data', $fav_data );
        
        if(isset($check_data[0]))
        $this->set('pro_data', $check_data[0]['candidate_profile']);
        
        $jobdata = $this->JobAd->getJobsByUserId($login_user['id']);
        $this->set('job_info', $jobdata);
        $this->set('emp_user',$login_user['name']);
        $emp_data = $this->User->getUsername($login_user['name']);
        $this->set('emp_data',$emp_data[0]['users']);
        
        $seeker_data_value = $this->JobJobseeker->getJobJobseekerById($login_user['id']);//pr($seeker_data_value);
        $this->set('seeker_data_set',$seeker_data_value);
            }
            else
            {
                    $this->redirect(array('controller' => 'Home', 'action' => 'index'));
            }
            
            
        }
        else
        { 
        if(isset($this->params['pass'][0]))
        { 
        $username = trim($this->params['pass'][0]);
        $user_data = $this->User->getUsername($username);
        $this->set('checklogin','');
        //pr($user_data);
        //die;
        if(isset($user_data) AND count($user_data) > 0 )
        {
        $user_id = $user_data[0]['users']['id'];
        $this->set('current_page_id',$user_id);
        if($user_data[0]['users']['type'] == 'candidate')
        {
            
            $video_record = $this->PhotoGallery->find('first', array('conditions' => array(
                            'user_id' => $user_id
                            )
                            ));
                            $this->set('photo_gallery' , $video_record);
                            
            $comment_record = $this->JobComment->find('all', array('conditions' => array(
                            'user_id' => $user_id, 'comment_type' => 'photo comment'
                            )
                            ));
                            $this->set('comment_record' , $comment_record);
            
        $login_user = $this->Auth->user();
        $business_follow = $this->Follow->getFollowByCanId($user_id);
        $this->set('business_network',$business_follow);
        //echo $login_user['id'].','. $user_id;
        //die;
        $check_fav =  $this->FavoriteCandidate->getFavoriteCandidateByID($login_user['id'], $user_id);
        //pr($check_fav);
        //die;
        if(count($check_fav) > 0)
        {
        $this->set('favorite','favorite');
        
        }
        else
        {
        $this->set('favorite','');
        }
        $this->set('user_data',$user_data[0]['users']);
        $jobdata = $this->JobAd->getJobsByUserId($user_id);
        $this->set('job_info', $jobdata);
        $this->set('emp_user',$username);
        
        $login_userID = $login_user['id'];
        $check_data = $this->CandidateProfile->getCandidateProfileById($user_id);
        
        $fav_data = $this->FavoriteCandidate->getFavoriteCandidateByEmpID($user_id);
        //pr($fav_data);
        //die;
        $this->set('fav_data', $fav_data );
        //pr($check_data);
        //die;
        if(isset($check_data[0]))
        $this->set('pro_data', $check_data[0]['candidate_profile']);
        
        $emp_data = $this->User->getUsername($username);
        $this->set('emp_data',$emp_data[0]['users']);
        
        $seeker_data_value = $this->JobJobseeker->getJobJobseekerById($user_id);//pr($seeker_data_value);
        $this->set('seeker_data_set',$seeker_data_value);
        }
        else
        {
            $this->redirect(array('controller' => 'Home', 'action' => 'index'));
        }
        }
        else
        {
            $this->redirect(array('controller' => 'home', 'action' => 'index'));
        }
        
        
        }
        elseif(isset($login_user) AND $login_user['id'] !='')
        {
        $login_user = $this->Auth->user();
        $login_userID = $login_user['id'];
        $this->set('checklogin',$login_userID);
        if($login_user['type'] == 'candidate'){
            
            $video_record = $this->PhotoGallery->find('first', array('conditions' => array(
                            'user_id' => $login_user['id']
                            )
                            ));
                            $this->set('photo_gallery' , $video_record);
                            
            $comment_record = $this->JobComment->find('all', array('conditions' => array(
                            'user_id' => $login_user['id'], 'comment_type' => 'photo comment'
                            )
                            ));
                            $this->set('comment_record' , $comment_record);
        
        $this->set('user_data',$login_user);
        $login_userID = $login_user['id'];
        $this->set('current_page_id',$login_userID);
        $business_follow = $this->Follow->getFollowByCanId($login_userID);
        $this->set('business_network',$business_follow);
        $check_data = $this->CandidateProfile->getCandidateProfileById($login_userID);
        
        $fav_data = $this->FavoriteCandidate->getFavoriteCandidateByEmpID($login_userID);
        //pr($fav_data);
        //die;
        $this->set('fav_data', $fav_data );
        if(isset($check_data[0]))
        $this->set('pro_data', $check_data[0]['candidate_profile']);
        
        $jobdata = $this->JobAd->getJobsByUserId($login_user['id']);
        $this->set('job_info', $jobdata);
        $this->set('emp_user',$login_user['name']);
        
        $emp_data = $this->User->getUsername($login_user['name']);
        $this->set('emp_data',$emp_data[0]['users']);
        
        $seeker_data_value = $this->JobJobseeker->getJobJobseekerById($login_userID);//pr($seeker_data_value);
        $this->set('seeker_data_set',$seeker_data_value);
        $candidate_summary = $this->CandidateProfile->getCandidateProfileById($login_userID);      
        $this->set('candidate_summary',$candidate_summary);
        } else{
        $this->redirect(array('controller' => 'home', 'action' => 'index'));
        }
        }
        else
        {
        $this->redirect(array('controller' => 'home', 'action' => 'index'));
        }
        }
                    
    }
    
        function quick_edit()
        {
            $this->layout = "ajax";
            $this->autoRender = false;
            if ($this->request->is('ajax'))
            {
                if(isset($_REQUEST['type']) AND $_REQUEST['type'] == 'phone')
                {
                        $getdata = $this->CandidateProfile->find('first', array(
                        'conditions' => array('CandidateProfile.can_id' => $_REQUEST['id'] )));
                        $data['CandidateProfile']['id'] = $getdata['CandidateProfile']['id'];
                         $data['CandidateProfile']['seeker_mobile'] = $_REQUEST['pval'];
                        $query = $this->CandidateProfile->save($data['CandidateProfile']);
                        $this->Session->setFlash(__('Profile data updated.'));
                }
                if(isset($_REQUEST['type']) AND $_REQUEST['type'] == 'summary')
                {
                        $getdata = $this->CandidateProfile->find('first', array(
                        'conditions' => array('CandidateProfile.can_id' => $_REQUEST['id'] )));
                        $data['CandidateProfile']['id'] = $getdata['CandidateProfile']['id'];
                        $data['CandidateProfile']['career_summary'] = $_REQUEST['sval'];
                        $query = $this->CandidateProfile->save($data['CandidateProfile']);
                        $this->Session->setFlash(__('Profile data updated.'));
                }
                if(isset($_REQUEST['type']) AND $_REQUEST['type'] == 'proimage')
                {
                    
                if(isset($_FILES["0"]['name']))
                {
                    $_SERVER['DOCUMENT_ROOT'].$this->webroot.'app/webroot/uploads/photos/';
                    $filename1 = $prefix.basename($_FILES["0"]['name']);
                    
                    
                    $file_ext1 = strtolower(substr($filename1, strrpos($filename1, ".") + 1));
                    $filename1 = String::uuid().".".$file_ext1;
                    //pr($filename1);
                    //die;
                    $array["seeker_photo"] = $filename1;
                    $height ='189';
                    $width = '205';
                    $can_video_thumb = $this->JobportalImage->uploadImage($_FILES['0'], $_SERVER['DOCUMENT_ROOT'].$this->webroot.'app/webroot/uploads/photos/', $filename1, $height , $width);
                }
                    
                    
                        $getdata = $this->JobJobseeker->find('first', array(
                        'conditions' => array('JobJobseeker.seeker_id' => $_REQUEST['id'] )));
                        $data['JobJobseeker']['id'] = $getdata['JobJobseeker']['id'];
                        $data['JobJobseeker']['seeker_photo'] = $filename1;
                        $query = $this->JobJobseeker->save($data['JobJobseeker']);
                        $this->Session->setFlash(__('Profile data updated.'));
                        
                        echo '<img src="'.$this->webroot.'uploads/photos/'.$filename1.'" alt="'.$filename1.'" />';
                }
                
            }
        }
                
    

}
