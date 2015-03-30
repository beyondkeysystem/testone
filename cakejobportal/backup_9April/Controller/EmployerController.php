<?php
App::uses('Controller', 'Controller');
class EmployerController extends AppController {
	
	public $components = array('Paginator','RequestHandler', 'JobportalImage');
	var $uses = array('TransFilmmakersChat', 'TransMemberMembershipScheme', 'TransMemberVideo', 'TransVideoCc', 'User','TransMember','FavoriteCandidate','Follow','UpgradeCategory','TrackJobAdvert', 'JobAd','JobOptions','EmployerProfile', 'JobCountry', 'JobCity', 'JobRecInvoices', 'JobRecPaymentPlans','Notification' , 'JobAdTemp', 'PaymentsTable' , 'Plantable');
	 
	public $helpers = array('EmployerMembership');
	
	public function beforeFilter() {
		parent::beforeFilter();
		// load Models
		$this->Auth->allow('profile','alljobs');
		$this->loadModel('User');
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
			if ($auth_data ['type'] == 'candidate') {
                                
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
			}
			if ($auth_data ['type'] == 'employer')
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
	
	// //////////////////////////////////////////////////////////////////////////////
	
	/**
	 * index method
	 *
	 * @throws NotFoundException
	 * @return void
	 */
	 function index() {
		if (isset($auth_data) && ! empty($auth_data)) {
			if ($auth_data ['type'] == 'candidate') {
				$this->redirect(array(
					'controller' => 'candidate',
					'action' => 'index'
				));
			}
		}
		// fetch and set value of logged in DME
		$login_user = $this->Auth->user('id');
		$employer_record = $this->User->find('first', array(
			'conditions' => array(
				'User.id' => $login_user
			)
		));
		if (! empty($employer_record)) {
			$this->set('emp_record', $employer_record);
		}
		// set login user type for default view
		$userType = $this->Auth->user('type');
		//pr($userType);
		$this->set('userType', $userType);
		
		// set dynamically dme name for view
		$cln_id = $this->Auth->user('id');
		$cln_data = $this->User->find('first', array(
			'conditions' => array(
				'User.id' => $cln_id
			),
			'fields' => array(
				'User.name'
			)
		));
		
		if (! empty($cln_data)) {
			$this->set('EmployerName', $cln_data['User']['name']);
		}
		
		// set selected action detail
		$this->set('action_detail', 'MY PROFILE');
	}
	
	// //////////////////////////////////////////////////////////////////////////////
	
	/**
	 * edit method
	 *
	 * @throws NotFoundException
	 * @param string $id        	
	 * @return void
	 */
	function edit($id = null) {
		if (isset($auth_data) && ! empty($auth_data)) {
			if ($auth_data ['type'] == 'candidate') {
				$this->redirect(array(
					'controller' => 'candidate',
					'action' => 'index'
				));
			}
		}
		// check authenticated user
		$login_userID = $this->Auth->user('id');
		$login_user_data = $this->User->findById($login_userID);
		if (! empty($login_user_data)) {
			$login_user_email = $login_user_data ['User'] ['email'];
		}
		$return_value = $this->User->ValidClinician($id, $login_user_email);
		if ($return_value == '1') {
			if (! $this->User->exists($id)) {
				throw new NotFoundException(__('Invalid user'));
			}
			// save data into user table
			if ($this->request->is('post') || $this->request->is('put')) {
				if ($this->User->save($this->request->data)) {
					$this->Session->write('edit_data', $this->request->data);
					// $this->Session->setFlash(__('The user has been saved'));
					$this->redirect(array(
						'action' => 'index'
					));
				} else {
					$this->Session->setFlash(__('The user could not be saved. Please, try again.'));
				}
			} 			// fetch logged in user data for edit
			else {
				$options = array(
					'conditions' => array(
						'User.' . $this->User->primaryKey => $id
					)
				);
				$this->request->data = $this->User->find('first', $options);
				$this->set('request_data', $this->request->data);
			}
		} else {
			$this->redirect(array(
				'controller' => 'employer',
				'action' => 'index'
			));
		}
		
		// set dynamicaly clinician name for view
		$login_id = $this->Auth->user('id');
		$employer_data = $this->User->find('first', array(
			'conditions' => array(
				'User.id' => $login_id
			),
			'fields' => array(
				'User.name'
			)
		));
		if (! empty($employer_data)) {
			$this->set('emp_name', $employer_data ['User'] ['name']);
		}
		// set login user type for default view
		$userType = $this->Auth->user('type');
		$this->set('userType', $userType);
		
		// set dynamically dme name for view
		$cln_id = $this->Auth->user('id');
		$cln_data = $this->User->find('first', array(
			'conditions' => array(
				'User.id' => $cln_id
			),
			'fields' => array(
				'User.name'
			)
		));
		if (! empty($cln_data)) {
			$this->set('EmployerName', $cln_data ['User'] ['name']);
		}
		
		// set selected action detail
		$this->set('action_detail', 'EDIT MY PROFILE');
	}
	
	// //////////////////////////////////////////////////////////////////////////////
	
	/**
	 * view method
	 *
	 * @throws NotFoundException
	 * @param string $id        	
	 * @return void
	 */
	function view($id = null) {
		if (isset($auth_data) && ! empty($auth_data)) {
			if ($auth_data ['type'] == 'candidate') {
				$this->redirect(array(
					'controller' => 'candidate',
					'action' => 'index'
				));
			}
		}
		// check authenticated user
		$login_user_id = $this->Auth->user('id');
		$return_value = $this->DmeAssignPatient->ClinicianValidate($login_user_id, $id);
		if ($return_value == '1') {
			if (! empty($id)) {
				$this->User->recursive = - 1;
				// fetch selected patient detail from User table
				$patient_data = $this->User->find('first', array(
					'conditions' => array(
						'User.id' => $id
					)
				));
				$this->set('patient_data', $patient_data);
				
				// fetch data from reports table for patient report
				$limit = 10;
				$this->paginate = array(
					'conditions' => array(
						'Report.patient_id' => $id,
						'Report.status' => 'P'
					),
					'order' => array(
						'Report.created_date DESC'
					),
					'limit' => $limit
				);
				$report_data = $this->paginate('Report');
				if (isset($report_data) && ! empty($report_data)) {
					$this->set('report_data', $report_data);
				}
				$this->set('limit', $limit);
			}
		} else {
			$this->redirect(array(
				'controller' => 'employer',
				'action' => 'index'
			));
		}
		
		// set dynamically clinician name for view
		$cln_data = $this->User->find('first', array(
			'conditions' => array(
				'User.id' => $login_user_id
			),
			'fields' => array(
				'User.name'
			)
		));
		if (! empty($cln_data)) {
			$this->set('emp_name', $cln_data ['User'] ['name']);
		}
		
		// set login user type for default view
		$userType = $this->Auth->user('type');
		$this->set('userType', $userType);
		
		// set dynamically dme name for view
		$cln_id = $this->Auth->user('id');
		$cln_data = $this->User->find('first', array(
			'conditions' => array(
				'User.id' => $cln_id
			),
			'fields' => array(
				'User.name'
			)
		));
		if (! empty($cln_data)) {
			$this->set('EmployerName', $cln_data ['User'] ['name']);
		}
		
		// set selected action detail
		$this->set('action_detail', 'PATIENTS REPORT');
	}
	
	// //////////////////////////////////////////////////////////////////////////////
	
	/**
	 * chart method
	 *
	 * @throws NotFoundException
	 * @param string $id        	
	 * @return void
	 */
	function chart($id = null) {
		if (isset($auth_data) && ! empty($auth_data)) {
			if ($auth_data ['type'] == 'candidate') {
				$this->redirect(array(
					'controller' => 'candidate',
					'action' => 'index'
				));
			}
		}
		$login_Clinicianid = $this->Auth->user('id');
		// use ValidReportC function for valid report
		$return_value = $this->Report->ValidReportC($id, $login_Clinicianid);
		if ($return_value == '1') {
			
			// fetch data from reports table for patient report
			$this->paginate = array(
				'conditions' => array(
					'Report.id' => $id,
					'Report.status' => 'P'
				),
				'limit' => 10,
				'order' => 'Report.created_date DESC'
			);
			$patient_reports = $this->paginate('Report');
			if (isset($patient_reports) && ! empty($patient_reports)) {
				$this->set('chart_data', $patient_reports);
			}
			// set patient name for chart view
			$employer_id = $this->Auth->user('id');
			if (! empty($employer_id)) {
				$employer_data = $this->User->find('first', array(
					'conditions' => array(
						'User.id' => $employer_id
					)
				));
				if (! empty($employer_data)) {
					$this->set('emp_name', $employer_data ['User'] ['name']);
				}
			}
		}
		// set login user type for default view
		$userType = $this->Auth->user('type');
		$this->set('userType', $userType);
		
		// set dynamically dme name for view
		$cln_id = $this->Auth->user('id');
		$cln_data = $this->User->find('first', array(
			'conditions' => array(
				'User.id' => $cln_id
			),
			'fields' => array(
				'User.name'
			)
		));
		if (! empty($cln_data)) {
			$this->set('EmployerName', $cln_data ['User'] ['name']);
		}
		
		// set selected action detail
		$this->set('action_detail', 'GRAPH AND REPORT');
	}
	
	// //////////////////////////////////////////////////////////////////////////////
	
	/**
	 * patients method
	 *
	 * @throws NotFoundException
	 * @return void
	 */
	function candidate() {
		if (isset($auth_data) && ! empty($auth_data)) {
			if ($auth_data ['type'] == 'candidate') {
				$this->redirect(array(
					'controller' => 'candidate',
					'action' => 'index'
				));
			}
		}
		// fetch and set clinician record
		$login_user = $this->Auth->user();
		$login_cid = $login_user ['id'];
		
		if (isset($login_user) && ! empty($login_user)) {
			// find id of logged in user
			$login_id = $login_user ['id'];
			$employer_name [] = $login_user ['name'];
			// fetch the clinician and patient data
			$this->DmeAssignPatient->recursive = - 1;
			$limit = 10;
			$this->User->virtualFields = array(
				'admin' => 'admin',
				'employer' => 'employer',
				'candidate' => 'candidate'
			);
			$this->paginate = array(
				'joins' => array(
					array(
						'table' => 'users',
						'alias' => 'u',
						'type' => 'LEFT',
						'conditions' => array(
							'DmeAssignPatient.dme_id=u.id'
						)
					),
					array(
						'table' => 'users',
						'alias' => 'u1',
						'type' => 'LEFT',
						'conditions' => array(
							'DmeAssignPatient.patient_id=u1.id'
						)
					),
					array(
						'table' => 'users',
						'alias' => 'u2',
						'type' => 'LEFT',
						'conditions' => array(
							'DmeAssignPatient.clinician_id=u2.id'
						)
					)
				),
				'fields' => array(
					'DmeAssignPatient.id',
					'u1.id',
					'u1.name as patient',
					'u1.email',
					"u1.mobile",
					"u1.type",
					"u1.address",
					"u.name as dme",
					"u2.id",
					"u2.name as clinician",
					"u2.email",
					"u2.mobile",
					"u2.type",
					"u2.address"
				),
				'conditions' => array(
					'DmeAssignPatient.clinician_id' => $login_id
				),
				'limit' => $limit
			);
			$complete_data = $this->paginate('DmeAssignPatient');
			$this->set('complete_data', $complete_data);
			$this->set('limit', $limit);
		}
		// end
		// Dynamically manage title
		$this->set("title_for_layout", "Employer");
		$this->loadModel('User');
		// set dynamically clinician name for view
		$this->User->recursive = - 1;
		$employer_data = $this->User->find('first', array(
			'conditions' => array(
				'User.id' => $login_cid
			),
			'fields' => array(
				'User.id',
				'User.name'
			)
		));
		if (! empty($employer_data)) {
			$employer_name = $employer_data ['User'] ['name'];
			$this->set('emp_name', $employer_name);
		}
		// set login user type for default view
		$userType = $this->Auth->user('type');
		$this->set('userType', $userType);
		
		// set dynamically dme name for view
		$cln_id = $this->Auth->user('id');
		$cln_data = $this->User->find('first', array(
			'conditions' => array(
				'User.id' => $cln_id
			),
			'fields' => array(
				'User.name'
			)
		));
		if (! empty($cln_data)) {
			$this->set('EmployerName', $cln_data ['User'] ['name']);
		}
		
		// set selected action detail
		$this->set('action_detail', 'MY PATIENTS');
	}
	
	// //////////////////////////////////////////////////////////////////////////////
	
	function postadd(){
		if (isset($auth_data) && ! empty($auth_data)) {
			if ($auth_data ['type'] == 'candidate') {
				$this->redirect(array(
					'controller' => 'candidate',
					'action' => 'index'
				));
			}
		}
	
		$this->set('page', 'jobadd');
		$_SESSION["ses_rec_id"] = 1;
		$rec_id = $_SESSION["ses_rec_id"];
		$getPlanName = $this->JobRecInvoices->getPlanName($rec_id);
		$plan_name =  $getPlanName[0]['i']['plan_name'];
		$in_id =  $getPlanName[0]['i']['invoice_id'];

		$this->set('department','');
		$this->set('grade','');
		$this->set('application_form','');
		$this->set('otherp_city','');			
		
		$planId = $this->JobRecPaymentPlans->getPlan($plan_name);
		$this->set('current_plan_id',$planId[0]['job_rec_payment_plans']['plan_id']);
		$this->set('in_id',$in_id);			
			
		$totalJobs = $this->JobAd->find('count');
		$this->set('rsRec', $totalJobs);
		$level = '';
		$level_dropbox = $this->JobOptions->fill_dropdown("level","job_options","option_name","option_name",$level,"Select","where category_id=14");
		$this->set('level_dropbox' , $level_dropbox);
		$industry = ''; 
		$industry_dropbox = $this->JobOptions->fill_dropdown("industry",'job_options','option_name', "option_name",$industry,"Select","where category_id=6");
		$this->set('industry_dropbox' , $industry_dropbox);
		
		$industry_fil_dropbox = $this->JobOptions->fill_dropdown("industry_fil",'job_options','option_name', "option_name",$industry,"Select","where category_id=6");
		$this->set('industry_dropbox_fil' , $industry_fil_dropbox);
		
		$other_postal_city= '';
		$postal_city1 = $this->JobCity->fill_dropdown_city('postal_city','job_city', 'city_name', "city_name", $other_postal_city,"Select",""," onchange='othercity();'");
		$this->set('postal_city1' , $postal_city1);
		$postal_city2 = $this->JobCity->fill_dropdown_city('postal_city','job_city', 'city_name', "city_name", "--- Other ---","Select",""," onchange='othercity();'");
		$this->set('postal_city2' , $postal_city2);
		$ad_country = '';
		$postal_country = $this->JobCountry->fill_dropdown_country('ad_country','job_country', 'country_name', "country_id", $ad_country, "Country","","onchange=regionText(); ","order_id, country_id");
		$this->set('postal_country' , $postal_country);
		$citizenship = "";
		$citizenship = $this->JobCountry->fill_dropdown_country('citizenship','job_country', 'country_name', "country_name", $citizenship,"Select");
		$this->set('citizenship' , $citizenship);
		$equity_status = '';
		$equity_status_drop = $this->JobOptions->fill_dropdown('equity_status','job_options', 'option_name', "option_name",$equity_status,"All","where category_id=9");
		$this->set('equity_status_drop' , $equity_status_drop);
		$min_sec_qualification = '';
		$min_sec_qualification_drop = $this->JobOptions->fill_dropdown('min_sec_qualification','job_options', 'option_name', "option_name",$min_sec_qualification,"N/A","where category_id=3");
		$this->set('min_sec_qualification_drop' , $min_sec_qualification_drop);
		$exp_required = '';
		$exp_required_drop = $this->JobOptions->fill_dropdown('exp_required','job_options', 'option_name', "option_name",$exp_required,"N/A","where category_id=21"); 
		$this->set('exp_required_drop' , $exp_required_drop);
		$off_package4 = '';
		$off_package4_drop = $this->JobOptions->fill_dropdown("off_package4","job_options","option_name","option_name",trim($off_package4),"no_value","where category_id=360","","option_id");
		$this->set('off_package4_drop' , $off_package4_drop);
		$off_package5 = '';
		$off_package5_drop = $this->JobOptions->fill_dropdown("off_package5","job_options","option_name","option_name",trim($off_package5),"no_value","where category_id=361","","option_id");
		$this->set('off_package5_drop' , $off_package5_drop);
		$off_package6 = '';
		$off_package6_drop = $this->JobOptions->fill_dropdown("off_package6","job_options","option_name","option_name",trim($off_package6),"no_value","where category_id=362","","option_id");
		$this->set('off_package6_drop' , $off_package6_drop);
		
		$citizenship_drop = $this->JobCountry->fill_dropdown_country('citizenship','job_country', 'country_name', "country_name", $citizenship,"All");
		$this->set('citizenship_drop' , $citizenship_drop);
		$language_filter = '';
		$language_filter_drop = $this->JobOptions->fill_dropdown('language_filter','job_options', 'option_name', "option_name",$language_filter,"All","where category_id=15");
		$this->set('language_filter_drop' , $language_filter_drop);
		$ter_qualification = '';
		$ter_qualification_drop =  $this->JobOptions->fill_dropdown('ter_qualification','job_options', 'option_name', "option_name",$ter_qualification,"All","where category_id=2");
		$this->set('ter_qualification_drop' , $ter_qualification_drop);
		$level_filter = ''; 
		$level_filter =  $this->JobOptions->fill_dropdown("level_filter","job_options","option_name","option_name",$level_filter,"All","where category_id=14");
		$this->set('level_filter' , $level_filter);
		$profession_filter = ''; 
		$profession_filter_drop =  $this->JobOptions->fill_dropdown("occupation_filter",'job_options','option_name', "option_name",$profession_filter,"All","where category_id=408");
		$this->set('profession_filter_drop' , $profession_filter_drop);
		$industry_filter = '';
		$industry_filter_drop =  $this->JobOptions->fill_dropdown("industry_filter",'job_options','option_name', "option_name",$industry_filter,"All","where category_id=6");
		$this->set('industry_filter' , $industry_filter);
		$this->set('gender' , '');
		$this->set('date_of_taking' , '');
		$this->set('confirm', '');
		
	}
		
		function postAddAction()
	{
		if (isset($auth_data) && ! empty($auth_data)) {
			if ($auth_data ['type'] == 'candidate') {
				$this->redirect(array(
					'controller' => 'candidate',
					'action' => 'index'
				));
			}
		}
			//pr($_POST);
			//die;
			error_reporting(0);
			//echo "<pre>"; print_r($_POST);
			
		if(isset($_POST["position_name"]))
		    {
		   $date_info =  explode('-' , $_POST['hidden_from_to']);
		  // pr($date_info);
		   $date_res = str_replace('/' ,'-' ,$date_info);
		   $start = explode( '-',$date_res[0]);
		   $end =  explode( '-',$date_res[1]);
		   $adFrom = trim(trim($start[2]).'-'.trim($start[1]).'-'.trim($start[0]));
		   $adTo = trim(trim($end[2]).'-'.trim($end[1]).'-'.trim($end[0]));
		   
		   //pr($adFrom);
		   //pr($adTo); 
		   //die;
		   
			$login_user = $this->Auth->user();
			$array2 = array();
			$array2['ad_date'] = '';
			$array2['adFrom'] = $adFrom;
			$array2['adTo'] = $adTo;
			
			$array2['rec_id'] = $login_user['id'];
			$array2["job_desc"] = $_POST["job_desc"];
		//if(isset($_POST["job_benefits"]))
		//	$array2["job_benefits"] = $_POST["job_benefits"];
		//else
		//	$array["job_benefits"] = 'test job benefits';
		if(isset($_POST["job_benefits"]))	
			$array2["job_skills"] = $_POST["job_skills"];
		else
			$array["job_skills"] = 'test job job_skills';
			
		if(isset($_POST["experience"]))
			$array2["experience"] = $_POST["experience"];		
		else
			$array2["experience"] = 2;
		if(isset($_POST["experience"]))
			$array2["salary_type"] = $_POST["salary_type"];						
		else
			$array2["salary_type"] = 'daily';
		if(isset($_POST["company_name"]))
			$array2["company_name"] = $_POST["company_name"];
		else
			$array2["company_name"] = 'test cis';
		if(isset($_POST["company_desc"]))
			$array2["company_desc"] = $_POST["company_desc"];
		else
			$array2["company_desc"] =  'etsst ';
		if(isset($_POST["vacancy"]))	
			$array2["vacansy"] = $_POST["vacancy"];		
		else
			$array2["vacansy"] = 'ets';
		if(isset($_POST["department"]))
			$array2["department"] = serialize($_POST["department"]);
		else
			$array2["department"] = 'test';
			$array2["grade"] = $_POST["grade"];
		if(isset($_POST["application_form"]))
			$array2["application_form"] = $_POST["application_form"] ;
		else
		$array2["application_form"] = "test form" ;
		
		$array2["date_of_taking"] = $_POST["date_of_taking_year"] . "-" . $_POST["date_of_taking_month"] . "-" . $_POST["date_of_taking_date"];		
		
		//$array2["offered_package"] = $_POST["offered_package"];
		//$array2["off_package1"] = $_POST["off_package1"];
		//$array2["off_package2"] = $_POST["off_package2"];
		$array2["off_package7"] = $_POST["off_package7"];
		$array2['duty1'] = $_POST['duty1'];
		$array2['computer1'] = $_POST['computer1'];
		$array2["off_package4"] = $_POST["off_package4"];
		$array2["off_package5"] = $_POST["off_package5"];
		$array2["off_package6"] = $_POST["currency"];
		$offerInc = 0 ;
		if(isset($_POST["off_package_benefits"])){
			foreach($_POST["off_package_benefits"] as $key => $value) {
				 $off_package_benefits1[$offerInc] = $key ."-".$value ;
				 $offerInc++;
			}
			$array2["off_package_benefits"] =  implode($off_package_benefits1,",");
		}
		$array2["off_package_b1"] = $_POST["off_package_b1"];			
		
   		$array2["position_name"] = $_POST["position_name"];
		
		
	
   		$array2["level"] = $_POST["level"];	
   		$array2["position_name"] = $_POST["position_name"];			
   		//$array2["salary_from"] = $_POST["salary_from"];			
   		//$array2["salary_to"] = $_POST["salary_to"];

		
		$array2["qks_1"] = $_POST["qks_1_1"] ."-/!-". $_POST["qks_1_2"]. "-/!-".$_POST["qks_1_3"]. "-/!-".
							$_POST["qks_1_4"]. "-/!-". $_POST["qks_1_5"]. "-/!-". $_POST["qks_1_6"] ;  

		$array2["qks_2"] = $_POST["qks_2_1"] ."-/!-". $_POST["qks_2_2"]. "-/!-".$_POST["qks_2_3"]. "-/!-".
							$_POST["qks_2_4"] ;  

		$array2["qks_3"] = $_POST["qks_3_1"] ."-/!-". $_POST["qks_3_2"]. "-/!-".$_POST["qks_3_3"] ;  

		$array2["qks_4"] = $_POST["qks_4_1"] ."-/!-". $_POST["qks_4_2"]. "-/!-".$_POST["qks_4_3"]. "-/!-".
							$_POST["qks_4_4"] . "-/!-". $_POST["qks_4_5"] ;  
	
		$array2["qks_5"] = $_POST["qks_5_1"] ."-/!-". $_POST["qks_5_2"]. "-/!-".$_POST["qks_5_3"]. "-/!-".
						$_POST["qks_5_4"]  ;  

		$array2["qks_6"] = $_POST["qks_6_1"] ."-/!-". $_POST["qks_6_2"]. "-/!-".$_POST["qks_6_3"]. "-/!-".
						$_POST["qks_6_4"]  ;  

		$array2["qks_7"] = $_POST["qks_7_1"] ."-/!-". $_POST["qks_7_2"] ;  
		$array2["qks_8"] = $_POST["qks_8_1"] ."-/!-". $_POST["qks_8_2"] ;  
		$array2["qks_9"] = $_POST["qks_9_1"] ."-/!-". $_POST["qks_9_2"] ;  
		$array2["qks_10"] = $_POST["qks_10_1"] ."-/!-". $_POST["qks_10_2"] ."-/!-". $_POST["qks_10_3"] ;  
		$array2["qks_11"] = $_POST["qks_11_1"] ."-/!-". $_POST["qks_11_2"] ;  

		$array2["preference_emp_1"] = $_POST["preference_emp_1_1"] . "-/!-". $_POST["preference_emp_1_3"] ;
		//$array2["preference_emp_2"] = $_POST["preference_emp_2"];
		//$array2["preference_emp_3"] = $_POST["preference_emp_3"];
					
   		if(isset($_POST["type"]))
		{							
			$array2["type"] = $_POST["type"];			 
		}
		
		if(isset($_POST["responsiblities"]))
		{
			for($i=0; $i<count($_POST["responsiblities"]); $i++)
			{
				$array2["responsiblities" . intval($i+1)] = $_POST["responsiblities"][$i];		
			}
		}
					
		$array2["min_sec_qualification"] = $_POST["higher_qualification"];			
		$array2["min_ter_qualification"] = $_POST["ter_qualification"];		
		//$array2["exp_required"] = $_POST["exp_required"];		
		//$array2["preference"] = $_POST["preference"];		
		//$array2["min_comp_literacy"] = $_POST["min_comp_literacy"];		
		//$array2["special_comp_skill"] = $_POST["special_comp_skill"];
		//$array2["drivers_license"] = $_POST["drivers_license"];	
		//$array2["behaviour"] = $_POST["behaviour"];	
		//$array2["registered_associations"] = $_POST["registered_associations"];	
		
		if(isset($_POST["chkDisplay"]))
		{
			$chkDisplay = "";		
			for($i=0; $i<count($_POST["chkDisplay"]); $i++) 
				$chkDisplay .= $_POST["chkDisplay"][$i];		
			$array2["display_info"] = $chkDisplay;	
		}
		
		if(isset($_POST["ques"]))
		{		
			for($i=0; $i<count($_POST["ques"]); $i++)
				$array2["ques" . intval($i+1)] = $_POST["ques"][$i];				
		}
		
		if(isset($_POST["chkFilter"]))
		{			
			for($i=0; $i<count($_POST["chkFilter"]); $i++)		
			{
				$field = $_POST["chkFilter"][$i];
				$array2["filter_" . $field] = $_POST[$field];	
			}														
		}
		
		
		
		if(isset($_POST["available_days"])){
			$offerInc=0;
			foreach($_POST["available_days"] as $key => $value) {
				$k = $key+1 ;
				$av1 = "av_" .$k."_1"; 		
				$av2 = "av_".$k."_2"; 		
				$available_days1[$offerInc] =  $key."/-/".$_POST[$av1] ."/#/".$_POST[$av2] ;
				$offerInc++;
			}
			 $array2["available_days"] = implode($available_days1,"-/!-");
		}

				
		
		if(isset($_POST["chkConfirm"]))
		{			
			$array2["confirm"] = $_POST["chkConfirm"];			
		}
		
		if(isset($_POST["salary_from"]))
		{			
			$array2["salary_from"] = $_POST["salary_from"];			
		}
		if(isset($_POST["salary_to"]))
		{			
			$array2["salary_to"] = $_POST["salary_to"];			
		}
		if(isset($_POST['jobAddRefNo']))
		{
			$array2['preference'] = $_POST['jobAddRefNo'];
		}
	
			
			//pr($_POST);
			//die;
			$data['JobAd'] = $array2; 
			  $this->JobAd->create();
			  $query = $this->JobAd->save($data['JobAd']);
			/*$objDb->InsertData("job_ad",$array);
			$ad_id = mysql_insert_id();*/


		}
	}
		
	function upgrade_category()
	{
	if (isset($auth_data) && ! empty($auth_data)) {
			if ($auth_data ['type'] == 'candidate') {
				$this->redirect(array(
					'controller' => 'candidate',
					'action' => 'index'
				));
			}
		}
		$plan_data = $this->Plantable->getPlantableBytype(2);
		$this->set('plan_data' , $plan_data);
		//pr($plan_data);
		//die;
		
	}
		
		function findexts ($filename) 
		{ 
		    $filename = strtolower($filename) ; 
		    $exts = split("[/\\.]", $filename) ; 
		    $n = count($exts)-1; 
		    $exts = $exts[$n]; 
		    return $exts; 
		}
		
		function upgrade()
		{
			if (isset($auth_data) && ! empty($auth_data)) {
			if ($auth_data ['type'] == 'candidate') {
				$this->redirect(array(
					'controller' => 'candidate',
					'action' => 'index'
				));
			}
		}
		}
		
		function thankyou()
		{
			if (isset($auth_data) && ! empty($auth_data)) {
			if ($auth_data ['type'] == 'candidate') {
				$this->redirect(array(
					'controller' => 'candidate',
					'action' => 'index'
				));
			}
		}
			if(isset($_REQUEST['payment_status']) AND $_REQUEST['payment_status'] == 'Completed')
			{
				$auth_data = $this->Auth->user();
				$status = $_REQUEST['payment_status'];
				$amount = $_REQUEST['mc_gross'];
				$employer_id = $auth_data['id'];
				$user_type = $auth_data['type'];
				$plan_name = $_REQUEST['item_name'];
				$pay_date = $_REQUEST['payment_date'];
				$start_date = date('Y-m-d');
				$this->set('start_date',$start_date);
				$plan_data = $this->Plantable->getPlanWithcatByPrice($amount);
				$this->set('plan_data' , $plan_data);
				$plan_id = $plan_data[0]['plan']['id'];
				$status = $_REQUEST['payment_status'];
				$time_duration = $plan_data[0]['plan']['time_duration'];
				if($plan_data[0]['plan']['time_duration'] == 'year' )
				{
					$date1 = strtotime("+365 day");
					$end_date = date('Y-m-d', $date1);
					
				}
				elseif($plan_data[0]['plan']['time_duration'] == 'month')
				{
					$date2 = strtotime("+30 day");
					$end_date = date('Y-m-d', $date2);
					//die;
				}
				else
				{
					$date3 = strtotime("+7 day");
					$end_date = date('Y-m-d', $date3);
					
				}
				 $this->set('end_date' , $end_date);
							
				$data['PaymentsTable'] = array ('plan_id' => $plan_id , 'employer_id' => $employer_id , 'pay_amount' => $amount ,
				'pay_by' => 'paypal', 'type' => $user_type, 'start_date' => $start_date , 'end_date' => $end_date , 'pay_date' => '', 'status' => $status );
				$this->PaymentsTable->create();
				$query = $this->PaymentsTable->save($data['PaymentsTable']);
				
				$lid = $this->PaymentsTable->getLastInsertID();
				
				$message = ucfirst($auth_data['name']) ."have paid amount &pound; $amount for $plan_name for a $time_duration";
				$url = '#';
				
				$arr['Notification'] = array('user_id' =>$employer_id, 'notication_id' => $lid , 'status' =>1 , 'type' => 'payment' , 'table_name' => 'payments_table', 'message' => $message, 'url' => $url );
				$this->Notification->create();
				$query = $this->Notification->save($arr['Notification']);
				
				if(isset($query))
				$this->Session->setFlash(__("You have get $plan_name plan successfully for a $time_duration"));
			}
			
			
		}
		
		function profile()
		{
			$login_user = $this->Auth->user();
			$this->set('login_user',$login_user);
			if(isset($this->params['pass'][0]))
			   $username = trim($this->params['pass'][0]);
			$this->set('page','profile');

			error_reporting(1);
			if(isset($this->params['pass'][0]) AND ($this->params['pass'][0] == $login_user['name']) )
			{
				$login_user = $this->Auth->user();
				$login_userID = $login_user['id'];
				$this->set('current_page_id',$login_userID);
				$this->set('checklogin',$login_userID);
				$check_data = $this->EmployerProfile->getEmployerProfileById($login_userID);
				$fav_data = $this->FavoriteCandidate->getFavoriteCandidateByEmpID($login_userID);
				
				$this->set('fav_data', $fav_data );
				$business_follow = $this->Follow->getFollowByCanId($login_userID);
				
				$this->set('business_network',$business_follow);
				//pr($fav_data);
				if(isset($check_data[0]))
				$this->set('pro_data', $check_data[0]['employer_profile']);
					
				$jobdata = $this->JobAd->getJobsByUserId($login_user['id']);
				$this->set('job_info', $jobdata);
				$this->set('emp_user',$login_user['name']);
				$emp_data = $this->User->getUsername($login_user['name']);
				$this->set('emp_data',$emp_data[0]['users']);
			}
			else
			{
				if(isset($this->params['pass'][0]))
				{
					$username = trim($this->params['pass'][0]);
					$user_data = $this->User->getUsername($username);
					$this->set('checklogin','');
					if(isset($user_data) AND count($user_data) > 0)
					{
					$user_id = $user_data[0]['users']['id'];
					$this->set('current_page_id',$user_id);
					$fav_data = $this->FavoriteCandidate->getFavoriteCandidateByEmpID($user_id);
					$this->set('fav_data', $fav_data );
					$business_follow = $this->Follow->getFollowByCanId($user_id);
					$this->set('business_network',$business_follow);
					//pr($fav_data);
					//die;
					$this->set('user_data',$user_data[0]['users']);
					$login_user = $this->Auth->user();
					$check_follow = $this->Follow->getFollowById($login_user['id'] , $user_id);
					if(count($check_follow) > 0)
					{
					    $this->set('follow','follow');
					    
					}
					else
					{
					    $this->set('follow','');
					}
					$jobdata = $this->JobAd->getJobsByUserId($user_id);
					$this->set('job_info', $jobdata);
					$this->set('emp_user',$username);
					
					$login_userID = $login_user['id'];
					$check_data = $this->EmployerProfile->getEmployerProfileById($user_id);
					$this->set('pro_data', $check_data[0]['employer_profile']);
					
					$emp_data = $this->User->getUsername($username);
					$this->set('emp_data',$emp_data[0]['users']);
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
					$this->set('current_page_id',$login_userID);
					$this->set('checklogin',$login_userID);
					$login_userID = $login_user['id'];
					if($login_user['type'] == 'employer')
					{
					$check_data = $this->EmployerProfile->getEmployerProfileById($login_userID);
					$this->set('pro_data', $check_data[0]['employer_profile']);
					
					$fav_data = $this->FavoriteCandidate->getFavoriteCandidateByEmpID($login_userID);
					$this->set('fav_data', $fav_data );
					
					$business_follow = $this->Follow->getFollowByCanId($login_userID);
					$this->set('business_network',$business_follow);
					
					$jobdata = $this->JobAd->getJobsByUserId($login_user['id']);
					$this->set('job_info', $jobdata);
					$this->set('emp_user',$login_user['name']);
					
					$emp_data = $this->User->getUsername($login_user['name']);
					$this->set('emp_data',$emp_data[0]['users']);
					}
					else{
						$this->redirect(array('controller' => 'home', 'action' => 'index'));
					}
				}
				else
					{
					    $this->redirect(array('controller' => 'home', 'action' => 'index'));
					}
			}
			
			
			//$this->profile(true); //calls the index function to do all that stuff
			//$this->render('profile');
			//$this->render('/Im/index');
			
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
		
		
		 function public_chatting() {
        $this->layout = "ajax";
        $this->autoRender = false;
        if ($this->request->is('ajax')) {

            if (isset($_POST['insert_chat']) && !empty($_POST['insert_chat'])) {
                $message = $_POST['insert_chat'];
                $to_id = $_POST['to'];
                $from_id = $_POST['from'];
                $video_id = base64_decode($_POST['video_id']);
                if (!empty($to_id) && !empty($from_id) && !empty($video_id)) {
                    if (!empty($message)) {
                        $f = $this->insert_chat($to_id, $from_id, $video_id, $message);
                    }
                    $chat_type = $_POST['chat_type'];
                    if ($chat_type == 'current') {
                        $chat = $this->get_current_chat($to_id, $from_id, base64_encode($video_id));
                    } else {
                        $chat = $this->get_all_chat($to_id, $from_id, $video_id);
                    }

                    echo $this->chat_content($chat, 1);
                } else {
                    echo '';
                }
            }
            if (isset($_POST['show_chat']) && !empty($_POST['show_chat'])) {
                $chat_type = $_POST['show_chat'];
                $to_id = $_POST['to'];
                $from_id = $_POST['from'];
                $video_id = $_POST['video_id'];
                if (!empty($to_id) && !empty($from_id)) {
                    if ($chat_type == 'all') {
                        $chat = $this->get_all_chat($to_id, $from_id, $video_id);
                    } else {
                        $chat = $this->get_current_chat($to_id, $from_id, $video_id);
                    }
                    echo $this->chat_content($chat, 2);
                } else {
                    echo '';
                }
            }
            if (isset($_POST['show_users']) && $_POST['show_users'] == 'show_users') {
                $video_id = base64_decode($_POST['video_id']);

                if (!empty($video_id)) {
                    $chatting_users = $this->chatting_users($video_id);
                    //pr($chatting_users); die;
                    echo $this->show_chatting_users($chatting_users);
                } else {
                    echo '';
                }
            }
        }
    }

    function insert_chat($to_id, $from_id, $video_id, $message) {
        $this->TransFilmmakersChat->create();

        $data['TransFilmmakersChat']['from_id'] = $from_id;
        $data['TransFilmmakersChat']['to_id'] = $to_id;
        $data['TransFilmmakersChat']['video_id'] = $video_id;
        $data['TransFilmmakersChat']['message'] = $message;
        $data['TransFilmmakersChat']['message_time'] = date("Y-m-d H:i:s");

        $query = $this->TransFilmmakersChat->save($data['TransFilmmakersChat']);

        if ($query) {
            return 1;
        } else {
            return '';
        }
    }

    function get_all_chat($to_id, $from_id, $video_id) {
        $query = $this->TransFilmmakersChat->getChatData($to_id, $from_id);
        if (isset($query)) {
            $maxVal = count($query);
            for ($i = 0; $i <= $maxVal; $i++) {
                if ($query[$i]) {
                    $chat_records[] = $query;
                    $chat_records = array_reverse($query);
                    // pr($row);
                    $chat_records = $this->TransMember->arraytoobject($chat_records);
                    return $chat_records;
                }
            }
        } else {
            return '';
        }
    }

    function get_current_chat($to_id, $from_id, $video_id) {

        $query = $this->TransFilmmakersChat->getCurrentChat($to_id, $from_id, $video_id);
        if (isset($query)) {
            //$chat_records[] = $query;
            $chat_records = array_reverse($query);
            $chat_records = $this->TransMember->arraytoobject($chat_records);
            return $chat_records;
        } else {
            return '';
        }
    }

    function chat_content($chat, $flag = 0) {

        $str = '';
        foreach ($chat as $r) {
            $str .= $this->get_chat_div($r, $flag);
        }
        return $str;
    }

    function chatting_users($video_id) {
        //$sql = "select distinct(from_id) from trans_filmmakers_chat where video_id='".$video_id."' and to_id='".$_SESSION['m_id']."' and from_id<>'".$_SESSION['m_id']."' order by id desc"; // and ( message_time LIKE('%".date('Y-m-d')."%'))  
        $m_id = $_SESSION['m_id'] = 461;
        $query = $this->TransFilmmakersChat->getChattingUserlist($video_id, $m_id);
        $row = $this->TransMember->arraytoobject($query);
        if (isset($row)) {
            //$user_records[]=$row;
            return $row;
        } else {
            return '';
        }
    }

    function get_user_info($id) {
        if ($id) {
            $sql = "select * from trans_member where id='" . $id . "'";
            $query = mysql_query($sql) or die(mysql_error());
            if ($query && mysql_num_rows($query) > 0) {
                $user_record = mysql_fetch_object($query);
                return $user_record;
            } else {
                return '';
            }
        } else {
            return '';
        }
    }

    function show_chatting_users($users) {
        $str = '';
        foreach ($users as $r) {
            if (is_object($r)) {
                //pr($r);

                $user_info = $this->TransMember->get_user_info($r->trans_filmmakers_chat->from_id);
                for ($i = 0; $i <= count($user_info); $i++) {
                    if (isset($user_info[$i])) {
                        $user_info_obj = $this->TransMember->arraytoobject($user_info[$i]['trans_member']);
                        $img = $user_info_obj->profile_image_file;
                        $profile_image = 'uploads/main/' . $img;
                        if (strlen($img) <= 0 || !file_exists($profile_image)) {
                            $profile_image = 'uploads/main/nopicture.png';
                        }
                        $str .= '<table><tr><td><img width="30" height="30" alt="' . $r->trans_filmmakers_chat->from_id . '" src="' . $profile_image . '"/></td>';
 //$uri = explode('?id' ,$_SERVER['REQUEST_URI'] );
                        $str .= '<td class="user_span"><a title="profile url" href="/cakejobportal/im/my_chat_room?chat_with=' . base64_encode($r->trans_filmmakers_chat->from_id) . '&id=' . $_REQUEST['video_id'] . '" target="_blank">' . $user_info_obj->first_name . ' ' . $user_info_obj->last_name . '</a></td></tr></table>';
                        //  $i++;
                    }
                }
            }
            unset($user_info);
        }
        return $str;
    }

    function get_chat_div($r, $flag) {
        error_reporting(0);
        if (is_object($r->trans_filmmakers_chat)) {
            $convertingtime = strtotime($r->trans_filmmakers_chat->message_time);
            // Convert it to the format you desire
            
            $message_time = date("g:i:s A", $convertingtime);

            $sender_info = $this->TransMember->get_user_info($r->trans_filmmakers_chat->from_id);
            $sender_info = $this->TransMember->arraytoobject($sender_info[0]['trans_member']);
            //pr($sender_info);
            //die;

            $from_img = $sender_info->profile_image_file;
            $sender_image = 'uploads/main/' . $from_img;
            if (strlen($from_img) <= 0 || !file_exists($sender_image)) {
                $sender_image = 'uploads/main/nopicture.png';
            }
            $str = '<table class="chat_table">
                        <tr>
                            <td style="padding:5px;" class="first_td">
                                <img width="30" height="30" src="' . $sender_image . '"/>
                            </td>
                            <td colspan="2" style="font-weight:bold;">
                                ' . $sender_info->first_name . ' ' . $sender_info->last_name . '
                            </td>

                        </tr>
                        <tr>
                            <td class="first_td"></td>
                            <td colspan="2" style="color:#013b51;font-weight:bold">' . $r->trans_filmmakers_chat->message . '</td>

                        </tr>
                        <tr>
                            <td colspan="3" style="text-align:right">' . $message_time . '</td>
                        </tr>

                    </table>';
        } else {
            foreach ($r as $val) {
                $convertingtime = strtotime($val->trans_filmmakers_chat->message_time);
                // Convert it to the format you desire
                $message_time = date("g:i:s A", $convertingtime);

                $sender_info = $this->TransMember->get_user_info($val->trans_filmmakers_chat->from_id);
                $sender_info = $this->TransMember->arraytoobject($sender_info[0]['trans_member']);
                //pr($sender_info);
                //die;

                $from_img = $sender_info->profile_image_file;
                $sender_image = 'uploads/main/' . $from_img;
                if (strlen($from_img) <= 0 || !file_exists($sender_image)) {
                    $sender_image = 'uploads/main/nopicture.png';
                }
                $str .= '<table class="chat_table">
                        <tr>
                            <td style="padding:5px;" class="first_td">
                                <img width="30" height="30" src="' . $sender_image . '"/>
                            </td>
                            <td colspan="2" style="font-weight:bold;">
                                ' . $sender_info->first_name . ' ' . $sender_info->last_name . '
                            </td>

                        </tr>
                        <tr>
                            <td class="first_td"></td>
                            <td colspan="2" style="color:#013b51;font-weight:bold">' . $val->trans_filmmakers_chat->message . '</td>

                        </tr>
                        <tr>
                            <td colspan="3" style="text-align:right">' . $message_time . '</td>
                        </tr>

                    </table>';
            }
        }
        // pr($str);
        //die;
        return $str;
    }

    function my_chat_room() {

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

        $user_id = base64_decode($_REQUEST['chat_with']);
        $this->set('user_id', $user_id);
        $user_record = $this->TransMember->get_user_info($user_id);
        $user_record = $this->TransMember->arraytoobject($user_record[0]['trans_member']);


        if ($user_record) {

            $uimage = $user_record->profile_image_file;
            //$this->set('uimage', $uimage );
            $u_fname = $user_record->first_name;
            $this->set('u_fname', $u_fname);
            $u_lname = $user_record->last_name;
            $this->set('u_lname', $u_lname);
            $u_unique_id = $user_record->unique_id;
            $this->set('u_unique_id', $u_unique_id);
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
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		    function alljobs()
			{
		
			$login_user = $this->Auth->user();
			$this->set('login_user',$login_user);
			
			if(isset($this->params['pass'][0]))
			   $username = trim($this->params['pass'][0]);
			$this->set('page','profile');

			error_reporting(0);
			if(isset($this->params['pass'][0]) AND ($this->params['pass'][0] == $login_user['name']) )
			{
				$login_userID = $login_user['id'];
				$check_data = $this->EmployerProfile->getEmployerProfileById($login_userID);
				if(isset($check_data))
				$this->set('pro_data', $check_data[0]['employer_profile']);
					
			$jobdata = $this->JobAd->getJobsByUserId($login_user['id']);
			$this->set('job_info', $jobdata);
			$this->set('emp_user',$login_user['name']);
			$emp_data = $this->User->getUsername($login_user['name']);
			$this->set('emp_data',$emp_data[0]['users']);
			$this->set('login_user',$login_user);
			
			
			}
			else
			{
				if(isset($this->params['pass'][0]))
				{
					$username = trim($this->params['pass'][0]);
					$user_data = $this->User->getUsername($username);
					$user_id = $user_data[0]['users']['id'];
					$jobdata = $this->JobAd->getJobsByUserId($user_id);
					$this->set('job_info', $jobdata);
					$this->set('emp_user',$username);
					
					$login_userID = $login_user['id'];
					$check_data = $this->EmployerProfile->getEmployerProfileById($user_id);
					$this->set('pro_data', $check_data[0]['employer_profile']);
					
					$emp_data = $this->User->getUsername($username);
					$this->set('emp_data',$emp_data[0]['users']);
					
				}
				elseif(isset($login_user) AND $login_user['id'] !='')
				{
					$login_userID = $login_user['id'];
					$check_data = $this->EmployerProfile->getEmployerProfileById($login_userID);
					$this->set('pro_data', $check_data[0]['employer_profile']);
					
					$jobdata = $this->JobAd->getJobsByUserId($login_user['id']);
					$this->set('job_info', $jobdata);
					$this->set('emp_user',$login_user['name']);
					
					$emp_data = $this->User->getUsername($login_user['name']);
					$this->set('emp_data',$emp_data[0]['users']);
				}
			}
				$login_user = $this->Auth->user();
			$username = trim($this->params['pass'][0]);
			if($this->params['pass'][0] == $login_user['name'] )
			{
				
				$this->set('login_user',$login_user);
					$this->Paginator->settings = array(
					'JobAd' => array(
						 'table' => 'job_ad',
							'conditions' => array(
								'rec_id' =>  $login_user['id'],
							),
					'limit' => 5,
					'order' =>'ad_date DESC'
					)
					);	
					$job_info = $this->Paginator->paginate('JobAd');
					$this->set('job_info', $job_info);
				}
				else
				{
					
					$username = trim($this->params['pass'][0]);
					$user_data = $this->User->getUsername($username);
					$user_id = $user_data[0]['users']['id'];
					
					$this->Paginator->settings = array(
					'JobAd' => array(
						 'table' => 'job_ad',
							'conditions' => array(
								'rec_id' =>  $user_id,
							),
					'limit' => 5,
					'order' =>'ad_date DESC'
					)
					);	
					$job_info = $this->Paginator->paginate('JobAd');
					$this->set('job_info', $job_info);
				}
				
			}
			
	function profile_edit()
	{
		if (isset($auth_data) && ! empty($auth_data)) {
			if ($auth_data ['type'] == 'candidate') {
				$this->redirect(array(
					'controller' => 'candidate',
					'action' => 'index'
				));
			}
		}
		$login_userID = $this->Auth->user('id');
		$login_user_data = $this->User->findById($login_userID);
		if (! empty($login_user_data))
		{
			$login_user_email = $login_user_data ['User'] ['email'];
			
			if($login_user_data ['User']['first_login'] == 0)
			{

				$data['User'] = array( 'id' => $this->request->params['pass'][0] , 'first_login' => 1 );
				$this->User->save($data['User']);
			}
		}
		$this->set('login_user',$login_user_data['User']);
		$this->set('page','jobadd');
		$check_data = $this->EmployerProfile->getEmployerProfileById($login_userID);
			$this->set('emp_data', $check_data);
		if ($this->request->is('post')) {
			$prefix = time() . '_';
			if(isset($_FILES['company_logo']['name']) AND $_FILES['company_logo']['name'] != '')
			{
				
				$filename = $prefix.basename($_FILES['company_logo']['name']);
				$file_ext = strtolower(substr($filename, strrpos($filename, ".") + 1));
				$logo_filename = String::uuid().".".$file_ext;
				$height ='202';
				$width = '189';
				$comp_logo = $this->JobportalImage->uploadImage($_FILES['company_logo'], $_SERVER['DOCUMENT_ROOT'].$this->webroot.'/app/webroot/uploads/', $logo_filename, $height , $width);
			}
			else
			{
				$logo_filename = $check_data[0]['employer_profile']['company_logo'];
			}
			if(isset($_FILES['company_banner']['name']) AND $_FILES['company_banner']['name'] != '')
			{
				$filename1 = $prefix.basename($_FILES['company_banner']['name']);
				$file_ext1 = strtolower(substr($filename1, strrpos($filename1, ".") + 1));
				$company_banner = String::uuid().".".$file_ext1;
				$height ='70';
				$width = '720';
				$comp_banner = $this->JobportalImage->uploadImage($_FILES['company_banner'], $_SERVER['DOCUMENT_ROOT'].$this->webroot.'/app/webroot/uploads/', $company_banner, $height , $width);
			}
			else
			{
				$company_banner = $check_data[0]['employer_profile']['company_banner'];
			}
			if(isset($_FILES['video_thumb_one']['name']) AND $_FILES['video_thumb_one']['name'] != '')
			{
				$filename1 = $prefix.basename($_FILES['video_thumb_one']['name']);
				$file_ext1 = strtolower(substr($filename1, strrpos($filename1, ".") + 1));
				$video_thumb = String::uuid().".".$file_ext1;
				$height ='370';
				$width = '705';
				$video_thumb_one = $this->JobportalImage->uploadImage($_FILES['video_thumb_one'], $_SERVER['DOCUMENT_ROOT'].$this->webroot.'/app/webroot/uploads/', $video_thumb, $height , $width);
			}
			else
			{
				$video_thumb = $check_data[0]['employer_profile']['video_thumb'];
			}
				
				
				$arr['EmployerProfile'] = array(
						'emp_id' => $login_userID,
						'emp_company_name' => trim($_POST['emp_company_name']),
						'company_contact' => trim($_POST['company_contact']),
						'video_url' => trim($_POST['video_url']),
						'business_summary' => trim($_POST['business_summary']),
						'portfolio_summary' => trim($_POST['portfolio_summary']),
						'fourm_summary' => trim($_POST['forum_summary']),
						'chat_summary' => trim($_POST['chat_summary']),
						'message_summary' => trim($_POST['message_summary']),
						'company_logo' => trim($logo_filename),
						'company_banner' => trim($company_banner),
						'video_thumb' => trim($video_thumb),
							);
				
			if(!isset($check_data))
			{
				
				$this->EmployerProfile->create();
				$query = $this->EmployerProfile->save($arr['EmployerProfile']);
				$this->Session->setFlash(__('Profile data added.'));
				$this->redirect(array('action' => 'profile/'.$login_user_data ['User'] ['name']));
				
			}
			else
			{
				$arr['EmployerProfile']['id'] = $_POST['id'];
				$query = $this->EmployerProfile->save($arr['EmployerProfile']);
				$this->Session->setFlash(__('Profile data updated.'));
				$this->redirect(array('action' => 'profile/'.$login_user_data ['User'] ['name']));
			}
		
		}
	}
		
		function cancelPaypal()
		{
			if (isset($auth_data) && ! empty($auth_data)) {
			if ($auth_data ['type'] == 'candidate') {
				$this->redirect(array(
					'controller' => 'candidate',
					'action' => 'index'
				));
			}
		}
			
		}
		
		function eRecurs()
		{
			if (isset($auth_data) && ! empty($auth_data)) {
			if ($auth_data ['type'] == 'candidate') {
				$this->redirect(array(
					'controller' => 'candidate',
					'action' => 'index'
				));
			}
		}
		}
		
		function thankyou_plan()
		{
			if (isset($auth_data) && ! empty($auth_data)) {
			if ($auth_data ['type'] == 'candidate') {
				$this->redirect(array(
					'controller' => 'candidate',
					'action' => 'index'
				));
			}
		}
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
				$this->redirect(array('action' => 'profile/'.$auth_data['name']));
			}
			
			
		}
		
		
		
		function thankyou_upgrade()
		{

			if (isset($auth_data) && ! empty($auth_data)) {
			if ($auth_data ['type'] == 'candidate') {
				$this->redirect(array(
					'controller' => 'candidate',
					'action' => 'index'
				));
			}
		}
				
			if(isset($_REQUEST['payment_status']) AND $_REQUEST['payment_status'] == 'Completed')
			{
				$auth_data = $this->Auth->user();
				$status = $_REQUEST['payment_status'];
				$amount = $_REQUEST['mc_gross'];
				$employer_id = $auth_data['id'];
				$user_type = $auth_data['type'];
				$plan_name = $_REQUEST['item_name'];
				$pay_date = $_REQUEST['payment_date'];
				
				
				$plan_data = $this->Plantable->getPlanByType($user_type ,$amount);
				//pr($plan_data);
				//die;

				$this->set('plan_data' , $plan_data);
				//$plan_id = $plan_data[0]['plan']['id'];
				
				$track = $this->TrackJobAdvert->getTrackjobByUser($auth_data['id']);
				pr($track);
				//die;
				if(count($track) == 0)
				{
					$start_date = date('Y-m-d');
				//die;
				}
				else
				{
					$start_date = $track[0]['track_job_advert']['end_date'];
				//die;
				}
				$status = $_REQUEST['payment_status'];
				$time_duration = $plan_data[0]['plantable']['time_duration'];
				if($time_duration == 'week' )
				{
					//$date1 = date('Y-m-d');
					$date1 = strtotime(date("Y-m-d", strtotime($start_date)) . " +7 days");
					$end_date = date('Y-m-d', $date1);
					//die;
				}
				elseif($time_duration == 'month')
				{
					//$date1 = date('Y-m-d');
					$date1 = strtotime(date("Y-m-d", strtotime($start_date)) . " +1 month");
					$end_date = date('Y-m-d', $date1);
					//die;
				}
				
				$duration = $time_duration;
				 $this->set('end_date' , $end_date);
							
				$data['PaymentsTable'] = array ('employer_id' => $employer_id ,'upgrade_category_id' => $plan_data[0]['plantable']['upgrade_category_id'], 'pay_amount' => $amount ,
				'pay_by' => 'paypal', 'type' => $user_type, 'start_date' => $start_date , 'end_date' => $end_date ,'duration' => $duration ,
				'pay_date' => '', 'status' => $status, 'plan_id' =>  $plan_data[0]['plantable']['id']);
				$this->PaymentsTable->create();
				$query = $this->PaymentsTable->save($data['PaymentsTable']);
				
				$lid = $this->PaymentsTable->getLastInsertID();
				
				
				if($plan_data[0]['plantable']['time_duration'] == 'week' )
				{
					
							$start = date('Y-m-d');
							$end = strtotime(date("Y-m-d", strtotime($start_date)) . " +7 days");
							$end = date('Y-m-d' , $end);
						
					
					$data['TrackJobAdvert'] = array(
						'job_plan_id' =>$lid ,
						'user_id' => $employer_id,
						'start_date' => $start_date,
						'end_date' => $end,
					);
					$this->TrackJobAdvert->create();
					$query = $this->TrackJobAdvert->save($data['TrackJobAdvert']);
					
					//die;
				}
				elseif($plan_data[0]['plantable']['time_duration'] == 'month')
				{
					
							$start = date('Y-m-d');
							$end = strtotime(date("Y-m-d", strtotime($start_date)) . " +1 month");
							$end = date('Y-m-d' , $end);
						
					$data['TrackJobAdvert'] = array(
						'job_plan_id' =>$lid ,
						'user_id' => $employer_id,
						'start_date' => $start_date,
						'end_date' => $end,
					);
					$this->TrackJobAdvert->create();
					$query = $this->TrackJobAdvert->save($data['TrackJobAdvert']);
					
					//die;
				}
				
				$message = ucfirst($auth_data['name']) ."have paid amount &pound; $amount for a $time_duration";
				$url = '#';
				
				$arr['Notification'] = array('user_id' =>$employer_id, 'notication_id' => $lid , 'status' =>1 , 'type' => 'payment' , 'table_name' => 'payments_table', 'message' => $message, 'url' => $url );
				$this->Notification->create();
				$query = $this->Notification->save($arr['Notification']);
				
				if(isset($query))
				$this->Session->setFlash(__("You have upgraded your Membership plan successfully for a $time_duration"));
				$this->set('start_date',$start_date);
				$this->redirect(array('action' => 'profile/'.$auth_data['name']));
			}
			
			
		}
		
		function favorite_action()
		{
			$arr = array( 'employer_id' => $_GET['sender_id'], 'candidate_id' => $_GET['fav_id'], 'status' => '1', 'favorite_date' => '' );
			$data['FavoriteCandidate'] =  $arr;
			$this->FavoriteCandidate->create();
			$query = $this->FavoriteCandidate->save($data['FavoriteCandidate']);
			echo 'done';
		}
		
		
	
	}

