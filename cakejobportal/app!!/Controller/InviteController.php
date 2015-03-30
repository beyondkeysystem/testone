<?php
App::uses('Controller', 'Controller');
class InviteController extends AppController {
	
	public $components = array('Paginator','RequestHandler', 'JobportalImage');
	var $uses = array('User','TransMember','InviteFriends','UpgradeCategory','TrackJobAdvert', 'JobAd','JobOptions','EmployerProfile', 'JobCountry', 'JobCity', 'JobRecInvoices', 'JobRecPaymentPlans','Notification' , 'JobAdTemp', 'PaymentsTable' , 'Plantable');

	
	
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
		$login_user = $this->Auth->user();
		$this->set('login_user',$login_user);
		$user_id = $login_user['id'];
		//$this->set('page','profile');
		$login_userID = $login_user['id'];
		//$check_data = $this->EmployerProfile->getEmployerProfileById($login_userID);
		//pr($check_data);
		//$this->set('pro_data', $check_data[0]['employer_profile']);
		
		$jobdata = $this->JobAd->getJobsByUserId($login_user['id']);
		$this->set('job_info', $jobdata);
		$this->set('emp_user',$login_user['name']);
		
		$emp_data = $this->User->getUsername($login_user['name']);
		$this->set('emp_data',$emp_data[0]['users']);
		$indata = $this->InviteFriends->getInviteFriends();
                if(!empty($indata))
		{
		//$userdata = $this->User->getNonFriendlist($user_id);
		//pr($userdata);
		$this->Paginator->settings = array(
			'User' => array( 
				 'table' => 'users',
				 'alias' => 'user',
				// 'join' => array(
				//		   array('table' => 'invite_friends',
				//			 'fields' => 'sender_id',
				//		   
				//			'conditions' => array(
				//				'sender_id' =>  $login_userID,
				//				'receiver_id' => $login_userID,
				//			)
				//			)
				//		),
				// 'NOT IN' => array(
				//		   array('table' => 'invite_friends',
				//			 'fields' => 'sender_id',
				//		   
				//			'conditions' => array(
				//				'sender_id' =>  $login_userID,
				//				'receiver_id' => $login_userID,
				//			)
				//			)
				//		),
				
				'joins' => array(
								 array('table' => 'invite_friends',
									'alias' => 'Infr',
									'type' => 'left',
									'conditions' => array(
										'Infr.sender_id' =>  'user.id',
										'Infr.receiver_id' => '',
									)
								)
							),
			'limit' => 8,
			'order' =>'created_date DESC'
			)
			);
		//pr($this->Paginator->settings);
			$user_info = $this->Paginator->paginate('User');
			$this->set('user_info', $user_info);
		}
		else
		{
			$this->Paginator->settings = array(
			'User' => array( 
				 'table' => 'users',
			'limit' => 5,
			'order' =>'created_date DESC'
			)
			);	
			$user_info = $this->Paginator->paginate('User');
			$this->set('user_info', $user_info);
		}
        }
	
	function Invite_action()
	{
		$arr = array( 'sender_id' => $_GET['sender_id'], 'receiver_id' => $_GET['rec_id'], 'friend_status' => '1', 'send_date' => '' );
		$data['InviteFriends'] =  $arr;
		$this->InviteFriends->create();
		$query = $this->InviteFriends->save($data['InviteFriends']);
		echo 'done';
	}
}
