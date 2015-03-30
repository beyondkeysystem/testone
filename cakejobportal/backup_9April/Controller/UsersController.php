<?php

App::uses('AppController', 'Controller');
App::uses('CakeEmail', 'Network/Email');

/**
 * Users Controller
 *
 * @property User $User
 * @property AuthComponent $Auth
 */
class UsersController extends AppController {

    /**
     * Components
     *
     * @var array
     */
    public $components = array('Auth');
    var $uses = array('User', 'ResetPassword', 'EmployerDetail', 'JobCountry','JobJobseeker', 'JobCity','JobState');
    
    public function beforeFilter() {
		parent::beforeFilter();
		// load Models
		$this->Auth->allow('loadata');
		}
		// end of authentication
	
    /**
     * index method
     * @return void
     */
    public function index() {
        $this->User->recursive = 0;
        $this->set('users', $this->paginate());
    }

////////////////////////////////////////////////////////////////////////////////

    /**
     * login method
     * @return void
     */
    public function login() {
        // set redirect to home page according logged in user
        $login_user = $this->Auth->user();
        if (!empty($login_user)) {
	    $login_user = $this->Auth->user();
		$arr['User']['id']=$login_user['id'];
		$arr['User']['status']="active";
		$query = $this->User->save($arr['User']);
            if ($login_user['type'] == 'admin') {
                $this->redirect(array('controller' => 'admin', 'action' => 'index'));
            }
            if ($login_user['type'] == 'candidate') {
                $this->redirect(array('controller' => 'candidate', 'action' => 'candidate_profile'));
            }
            if ($login_user['type'] == 'employer') {
                $this->redirect(array('controller' => 'employer', 'action' => 'profile'));
            }
        }
        // end of redirect
        if ($this->request->is('post')) {
            $this->Auth->authenticate['Form'] = array('fields' => array('username' => 'email'));
            if ($this->Auth->login()) {
                $auth_data = $this->Auth->user();
		$arr['User']['id']=$auth_data['id'];
		$arr['User']['status']="active";
		    
		$query = $this->User->save($arr['User']);
                if (isset($auth_data) && !empty($auth_data)) {
		    
		    
                    if($auth_data['first_login'] == 0)
		    {
			if ($auth_data['type'] == 'candidate') {
			    $this->redirect(array('controller' => 'candidate', 'action' => 'candidate_edit'));
			}
			if ($auth_data['type'] == 'employer') {
			    $this->redirect(array('controller' => 'employer', 'action' => 'profile_edit/'.$auth_data['id']));
			}
		    }
		    else
		    {
                        if ($auth_data['type'] == 'candidate') {
                            $this->redirect(array('controller' => 'candidate', 'action' => 'candidate_profile'));
                        }
                        if ($auth_data['type'] == 'employer') {
                            $this->redirect(array('controller' => 'employer', 'action' => 'profile/'.$auth_data['name']));
                        }
                        if ($auth_data['type'] == 'admin') {
                            $this->redirect(array('controller' => 'admin', 'action' => 'index'));
                        }
                    }
                }
            } else {
                $this->Session->setFlash(__('Invalid email or password, try again'));
            }
            $this->set("email", $this->data['User']['email']);
        }
    }

////////////////////////////////////////////////////////////////////////////////

    /**
     * logout method
     * @return void
     */
    public function logout() {
	$auth_data = $this->Auth->user();
	$arr['User']['id']=$auth_data['id'];
	$arr['User']['status']="inactive";	
	$query = $this->User->save($arr['User']);
	
        $this->Auth->logout();
        $this->redirect(array('controller' => 'home', 'action' => 'index'));
    }

    /**
     * view method
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
////////////////////////////////////////////////////////////////////////////////

    public function view($id = null) {
        if (!$this->User->exists($id)) {
            throw new NotFoundException(__('Invalid user'));
        }
        $options = array('conditions' => array('User.' . $this->User->primaryKey => $id));
        $this->set('user', $this->User->find('first', $options));
    }

    

    
////////////////////////////////////////////////////////////////////////////////

    /**
     * signup method
     * @return void
     */
    public function signup() {
           //set user type for default view
            $this->set('page','signup');
        
           //set selected action detail
            $this->set('action_detail', 'USER REGISTRATION');
            
	    if(isset($_POST['can_country']))
	    { 
		$can_country = $_POST['can_country'];
	    }
	    else{
		$can_country = '';
	    }
	    $country = $this->JobCountry->fill_dropdown_country('can_country','job_country', 'country_name', "country_id", $can_country, "Country","","onchange=regionText(); ","order_id, country_id");
		$this->set('country' , $country);
		
		$empcountry = $this->JobCountry->fill_dropdown_country('emp_country','job_country', 'country_name', "country_id", $can_country, "Country","","onchange=regionText(); ","order_id, country_id");
		$this->set('emp_country' , $empcountry);
		
		
	    
	    
        if ($this->request->is('post')) {
	     $dob = '';
             $can_fname =   $_POST['can_fname']; 
             $can_lname =   $_POST['can_lname'];
             
             $can_bod_date =   $_POST['can_bod_date']; 
             $can_bod_month =    $_POST['can_bod_month']; 
             $can_bod_year =   $_POST['can_bod_year']; 
             $dob = trim($can_bod_year.'-'.$can_bod_month.'-'.$can_bod_date);
             $can_email =   trim($_POST['can_email']); 
             $can_city =   $_POST['can_city'];
	     $can_state =   $_POST['can_state'];
             $can_country =   $_POST['can_country']; 
             $can_uname =    trim($_POST['can_uname']); 
             $can_password =  $_POST['can_password'];
             //$can_password = AuthComponent::password($can_password);
             
             
             $created_date =    $_POST['created_date'];
             
             
             $emp_company_name =   $_POST['emp_company_name']; 
             $emp_email =   trim($_POST['emp_email']); 
             $emp_address =   $_POST['emp_address']; 
             $emp_city =   $_POST['emp_city'];
	     $emp_state =   $_POST['emp_state'];
             $emp_country =   $_POST['emp_country']; 
             $emp_name =   trim($_POST['emp_name']);
             $emp_password =   $_POST['emp_password'];
             //$emp_password = AuthComponent::password($emp_password);
             $emp_confirm =   $_POST['emp_confirm']; 
        if(isset($emp_company_name) AND $emp_company_name !='' )
        {


            $arr['User'] = array('name' => $emp_name , 'email' => $emp_email , 'type' => 'employer' , 'address' =>  $emp_address,
            'password' => $emp_password,'company_name'=> $emp_company_name,'office_address'=> $emp_address,'city'=> $emp_city, 'state' => $emp_state, 'country' => $emp_country);
            //pr($arr);
            //die;
        $this->User->create();
        $query = $this->User->save($arr['User']);
        if ($query) {
            //die('pASS');
                 $this->Session->setFlash(__('The user has been saved'));

                $this->redirect(array('action' => 'index'));
            } else {
                //die('fail');
                 $this->Session->setFlash(__('The user could not be saved. Please, try again.'));
            }
        }
        else
        {
              $arr1['User'] = array('name' => $can_uname , 'email' => $can_email , 'type' => 'candidate' ,
            'password' => $can_password,'city'=> $can_city, 'state'=> $can_state, 'country' => $can_country, 'first_name' => $can_fname , 'last_name'=> $can_lname, 'dob' => $dob);
             $this->User->create();
        $query = $this->User->save($arr1['User']);
	
	$lid = $this->User->getLastInsertID();
	$arr_job['JobJobseeker'] = array('seeker_id'=> $lid,'seeker_name'=>$can_uname,'seeker_email'=>$can_email,'seeker_city'=>$can_city,'seeker_state'=>$can_state,'seeker_country'=>$can_country);
	$this->JobJobseeker->create();
	$query = $this->JobJobseeker->save($arr_job['JobJobseeker']);
	
        if ($query) {
                 $this->Session->setFlash(__('The user has been saved'));
                              $this->redirect(array('action' => 'index'));
        }else {
                 $this->Session->setFlash(__('The user could not be saved. Please, try again.'));
            }
        }
        }
    }

////////////////////////////////////////////////////////////////////////////////

    /**
     * add method
     * @return void
     */
    public function add() {
        if ($this->request->is('post')) {
            $this->User->create();
            if ($this->User->save($this->request->data)) {
                //$this->Session->setFlash(__('The user has been saved'));
                $this->redirect(array('action' => 'index'));
            } else {
                // $this->Session->setFlash(__('The user could not be saved. Please, try again.'));
            }
        }
    }

////////////////////////////////////////////////////////////////////////////////

    /**
     * edit method
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function edit($id = null) {
        if (!$this->User->exists($id)) {
            throw new NotFoundException(__('Invalid user'));
        }
        if ($this->request->is('post') || $this->request->is('put')) {
            if ($this->User->save($this->request->data)) {
                // $this->Session->setFlash(__('The user has been saved'));
                $this->redirect(array('action' => 'index'));
            } else {
                // $this->Session->setFlash(__('The user could not be saved. Please, try again.'));
            }
        } else {
            $options = array('conditions' => array('User.' . $this->User->primaryKey => $id));
            $this->request->data = $this->User->find('first', $options);
        }
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
        $this->User->id = $id;
        if (!$this->User->exists()) {
            throw new NotFoundException(__('Invalid user'));
        }
        $this->request->onlyAllow('post', 'delete');
        if ($this->User->delete()) {
            //$this->Session->setFlash(__('User deleted'));
            $this->redirect(array('action' => 'index'));
        }
        //$this->Session->setFlash(__('User was not deleted'));
        $this->redirect(array('action' => 'index'));
    }

////////////////////////////////////////////////////////////////////////////////

    /**
     * admin_index method
     * @return void
     */
    public function admin_index() {
        $this->User->recursive = 0;
        $this->set('users', $this->paginate());
    }

////////////////////////////////////////////////////////////////////////////////

    /**
     * admin_view method
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function admin_view($id = null) {
        if (!$this->User->exists($id)) {
            throw new NotFoundException(__('Invalid user'));
        }
        $options = array('conditions' => array('User.' . $this->User->primaryKey => $id));
        $this->set('user', $this->User->find('first', $options));
    }

////////////////////////////////////////////////////////////////////////////////

    /**
     * admin_add method
     * @return void
     */
    public function admin_add() {
        if ($this->request->is('post')) {
            $this->User->create();
            if ($this->User->save($this->request->data)) {
                // $this->Session->setFlash(__('The user has been saved'));
                $this->redirect(array('action' => 'index'));
            } else {
                // $this->Session->setFlash(__('The user could not be saved. Please, try again.'));
            }
        }
    }

////////////////////////////////////////////////////////////////////////////////

    /**
     * admin_edit method
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function admin_edit($id = null) {
        if (!$this->User->exists($id)) {
            throw new NotFoundException(__('Invalid user'));
        }
        if ($this->request->is('post') || $this->request->is('put')) {
            if ($this->User->save($this->request->data)) {
                // $this->Session->setFlash(__('The user has been saved'));
                $this->redirect(array('action' => 'index'));
            } else {
                // $this->Session->setFlash(__('The user could not be saved. Please, try again.'));
            }
        } else {
            $options = array('conditions' => array('User.' . $this->User->primaryKey => $id));
            $this->request->data = $this->User->find('first', $options);
        }
    }

////////////////////////////////////////////////////////////////////////////////

    /**
     * admin_delete method
     * @throws NotFoundException
     * @throws MethodNotAllowedException
     * @param string $id
     * @return void
     */
    public function admin_delete($id = null) {
        $this->User->id = $id;
        if (!$this->User->exists()) {
            throw new NotFoundException(__('Invalid user'));
        }
        $this->request->onlyAllow('post', 'delete');
        if ($this->User->delete()) {
            // $this->Session->setFlash(__('User deleted'));
            $this->redirect(array('action' => 'index'));
        }
        //$this->Session->setFlash(__('User was not deleted'));
        $this->redirect(array('action' => 'index'));
    }

    ////////////////////////////////////////////////////////////////////////////////

    /**
     * reset method
     * @throws NotFoundException
     * @throws MethodNotAllowedException
     * @param string $id
     * @return void
     */
    public function reset($url_random = null) {
         //set user type for default view
	$this->set('userType','reset');
    
       //set selected action detail
	$this->set('action_detail', 'FORGOT PASSWORD');

        if (!empty($url_random)) {
            $random_data = $this->ResetPassword->findByRandomNo($url_random);
            if (!empty($random_data)) {
                $RandomUser_id = $random_data['ResetPassword']['user_id'];
                $Random_id = $random_data['ResetPassword']['id'];
                $this->set('Random', $Random_id);
                $this->set('random_data', $random_data);
            }
        }

        //get user email address 
        if (!empty($this->data)) {
            $user_email = $this->data['User']['email'];

            //find email address into users table
            $this->User->recursive = -1;
            $user_data = $this->User->findByEmail($user_email);
            if (!empty($user_data)) {
                $user_id = $user_data['User']['id'];
                $user_Demail = $user_data['User']['email'];
                //generate random number
                $user_random = rand(10000, 999999);

                //saving user id and its random number into reset_password table
                $data = array('ResetPassword' => array(
                        'user_id' => $user_id,
                        'random_no' => $user_random,
                        'created_date' => date("Y-m-d H:i:s")
                        ));
                $save_result = $this->ResetPassword->save($data);

                //send mail to user with encoded number
                if (!empty($save_result)) {
                    $ResetEmail = new CakeEmail();
                    $ResetEmail->from(array('sameer@mailinator.com'));
                    $ResetEmail->to($user_Demail);
                    $ResetEmail->subject('Reset password link from Recruit Young.');
                    $ResetEmail->emailFormat('html');
                    $body = "Hello ,";
                    $body .=" <br/><br/>Click on below link for reset your password";
                    $body .="<br/><a href='http://".$_SERVER['SERVER_NAME']."/users/reset/$user_random'>http://".$_SERVER['SERVER_NAME']."/users/reset/$user_random</a>";
                    $email = $user_Demail;
                    $ResetEmail->send($body);
                    $this->redirect(array('action' => 'login'));
                }
		$this->redirect(array('action' => 'login'));
            } else {
                $this->Session->setFlash(__("Email address not found"));
                $this->redirect(array('action' => 'reset'));
            }
        }
    }

////////////////////////////////////////////////////////////////////////////////

    /**
     * resetpassword method
     * @throws NotFoundException
     * @throws MethodNotAllowedException
     * @param string $id
     * @return void
     */
    public function resetpassword() {
        $this->render(false);
        //change password in users table 
        if (!empty($this->data)) {
            $this->User->id = $this->data['User']['user_id'];
            $this->User->saveField("password", $this->data['User']['password']);

            //delete random number record from reset_passwords table
            $this->ResetPassword->id = $this->data['User']['reset_id'];
            $this->ResetPassword->delete();
            $this->Session->setFlash("Your password successfully reset ");
            $this->redirect(array('action' => 'index'));
        }
    }

////////////////////////////////////////////////////////////////////////////////

function validateUsername()
{
    $un = $_REQUEST['un'];
    $data =  $this->User->getUsername($un);
    //pr($data);
    if(isset($data[0]['users']['id']) AND $data[0]['users']['id'] != '')
    {
        echo "User name already taken please try another user name";
    }
    else
    {
        echo '';
    }
    
}

function validateUseremail()
{
    $email = $_REQUEST['email'];
    $data = $this->User->getUseremail($email);
    if(isset($data[0]['users']['id']) AND $data[0]['users']['id'] != '')
    {
        echo "Email already taken please try another Email";
    }
    else
    {
        echo '';
    }
}

    public function loadata() {
	        $this->layout = "ajax";
        $this->autoRender = false;
        if ($this->request->is('ajax')) {
	if(isset($_POST['loadType']))
	{
	$loadType=$_POST['loadType'];
	}
	if($_POST['loadId'])
	{
	$loadId=$_POST['loadId'];
	}
	if($loadType=="state"){
	$sdata = $this->JobState->getStateByCountry($loadId);
	foreach($sdata as $val_data)
	{
	     $HTML.="<option value='".$val_data['job_state']['id']."'>".$val_data['job_state']['state_name']."</option>";
	}
	}else{
	    $cdata = $this->JobCity->getCityByState($loadId);
	    //pr($cdata);
	    foreach($cdata as $val_cdata)
	{
	   $HTML.="<option value='".$val_cdata['job_city']['city_id']."'>".$val_cdata['job_city']['city_name']."</option>";
	}
	}
	echo $HTML;
	}
	
    }

}
