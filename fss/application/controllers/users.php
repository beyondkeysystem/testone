<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

include dirname(__FILE__).'/controller.php';
class Users extends Controller {
        public function __construct(){
            parent::__construct();
            
        }
	
        public function login(){
            if($this->input->server('REQUEST_METHOD') === 'POST') {
                $username = $this->input->post('username');
                $password = $this->input->post('password');
                $captcha_d = $this->input->post('captcha');
                $captcha = $this->session->userdata('captcha');
                //pr($captcha);
                $captcha_code = $this->input->post('captcha_code');
                if($captcha_code !==$captcha_d){
                    echo '4';exit;
                }
                $data =  $this->user->userlogin($username,$password);
                if(isset($data['user_type_id']) and $data['user_type_id'] == '1'){
                    echo '2';
                }
                else if(isset($data['is_active']) and $data['is_active'] == '1'){
                   echo '1';
               }else if($data == '0'){
                   echo '0';
               }else{
                   echo '3';
               }
            }
        }
        public function logout(){
            $this->session->sess_destroy();
            include dirname(dirname(dirname(__FILE__))).'/fb/src/facebook.php';
            $facebook = new Facebook(array(
                'appId'  => appId,
                'secret' => secret,
              ));
            $fb_users = $facebook->getUser();
            $facebook->destroySession();
            redirect('/');
        }
        
        public function register(){
            $data['data'] = '';
            include dirname(dirname(dirname(__FILE__))).'/fb/src/facebook.php';
            $facebook = new Facebook(array(
                'appId'  => appId,
                'secret' => secret,
              ));
           $fb_users = $facebook->getUser();
           if(isset($fb_users) and $fb_users !=''){
               $logoutUrl = $facebook->getLogoutUrl();
               $data['loginUrl'] = $logoutUrl;
               $user_profile = $facebook->api('/me');
               //pr($user_profile);
               $userdata = $this->common->findByAttr('users','fb_id',$fb_users);
               //pr($userdata);
               if(empty($userdata)){
                   $save_data = array(
                       'fb_id'=>$fb_users,
                       'firstname'=>$user_profile['first_name'],
                       'lastname'=>$user_profile['last_name'],
                       'gender'=>$user_profile['gender'],
                       'created'=>date('Y-m-d H:i:s')
                   );
                   $this->common->add('users',$save_data);
                   $userdata = $this->common->findByAttr('users','fb_id',$fb_users);
                   $session_data = array(
                       'id'=>$userdata->id,
                       'username'=>$userdata->firstname,
                       'gender'=>$userdata->gender,
                       'firstname'=>$userdata->firstname,
                       'lastname'=>$userdata->lastname
                   );
                   $this->session->set_userdata($session_data);
                   redirect('/');  
               }else{
                   $userdata = $this->common->findByAttr('users','fb_id',$fb_users);
                   $session_data = array(
                       'id'=>$userdata->id,
                       'username'=>$userdata->firstname,
                       'gender'=>$userdata->gender,
                       'firstname'=>$userdata->firstname,
                       'lastname'=>$userdata->lastname
                   );
                   $this->session->set_userdata($session_data);
                   redirect('/');  
               }
           }else{
               $loginUrl   = $facebook->getLoginUrl(
                    array(
                        'scope' => 'publish_actions'
                    )
                );
               $data['loginUrl'] = $loginUrl;
           }
            if($this->input->server('REQUEST_METHOD') === 'POST') {
             //$userdata = $this->input->post();
                $this->form_validation->set_rules('users[firstname]', 'First name', 'required|xss_clean');
                $this->form_validation->set_rules('users[lastname]', 'Last name', 'required|xss_clean');
                $this->form_validation->set_rules('users[username]', 'Username', 'required|xss_clean|is_unique[users.username]');
                $this->form_validation->set_rules('users[password]', 'Password', 'required|matches[cpassword]');
                $this->form_validation->set_rules('cpassword', 'Confirm Password', 'required');

                $this->form_validation->set_rules('users[email]', 'Email', 'required|xss_clean|valid_email|is_unique[users.email]');
                $this->form_validation->set_rules('users[gender]', 'Gender', 'required');
                $this->form_validation->set_rules('users[dob]', 'dob', 'required');
                $this->form_validation->set_rules('users[mobile]', 'mobile', 'required|integer');
                $this->form_validation->set_rules('captcha', 'captcha', 'required|check_captcha[captcha]');
                $this->form_validation->set_message('alpha_numeric','%s fields is alpha numeric value only');
            if ($this->form_validation->run() == FALSE){
            }else{
               $data = $this->input->post();
               $data['users']['password'] = md5($data['users']['password']);
                $id = $this->common->save($data);
                if($id !=''){
                    $data =  $this->common->findByAttr('users','id',$id);
                    $this->session->set_userdata((array)$data);
                    redirect('/users/thankyou');  
                }
                //pr($data);exit;
            }
            }
            $data['page'] = 'users/register';
            $data['title']= 'create user';
            $this->load->view('layout/default',$data);
        }
        
        public function thankyou(){
            $data['data'] = '';
            $data['page'] = 'users/thankyou';
            $data['title']= 'create user';
            $this->load->view('layout/default',$data);
        }
        
        public function getTwitterData(){
            include dirname(dirname(dirname(__FILE__))).'/twitter/twitter/twitteroauth.php';
            include dirname(dirname(dirname(__FILE__))).'/twitter/twitter/twconfig.php';
            $twitteroauth = new TwitterOAuth(CONSUMER_KEY, CONSUMER_SECRET, '', '');
            $access_token = $twitteroauth->getAccessToken($_GET['oauth_verifier']);
            $_SESSION['access_token'] = $access_token;
            $user_info = $twitteroauth->get('account/verify_credentials');
            $userdata = $this->common->findByAttr('users','tw_id',$user_info->id);
               //pr($userdata);
            $name = explode(' ',$user_info->name);
               if(empty($userdata)){
                   $save_data = array(
                       'tw_id'=>$user_info->id,
                       'firstname'=>$name[0],
                       'lastname'=>$name[1],
                       //'gender'=>$user_profile['gender'],
                       'created'=>date('Y-m-d H:i:s')
                   );
                   $this->common->add('users',$save_data);
                   $userdata = $this->common->findByAttr('users','tw_id',$user_info->id);
                   $session_data = array(
                       'id'=>$userdata->id,
                       'username'=>$userdata->firstname,
                       //'gender'=>$userdata->gender,
                       'firstname'=>$userdata->firstname,
                       'lastname'=>$userdata->lastname
                   );
                   $this->session->set_userdata($session_data);
                   redirect('/');  
               }else{
                   $userdata = $this->common->findByAttr('users','tw_id',$user_info->id);
                   $session_data = array(
                       'id'=>$userdata->id,
                       'username'=>$userdata->firstname,
                       //'gender'=>$userdata->gender,
                       'firstname'=>$userdata->firstname,
                       'lastname'=>$userdata->lastname
                   );
                   $this->session->set_userdata($session_data);
                   redirect('/');  
               }
            //echo '<pre>';print_r($user_info);exit;
        }
        
        public function signin($login=''){
            //pr($this->session->userdata);
            $user_id = $this->session->userdata('id');
            if(isset($user_id) and $user_id !=''){
                redirect('/');  
            }
            $data['data'] = '';
            //Twitter Login
            if(isset($login) and $login =='t'){
                include dirname(dirname(dirname(__FILE__))).'/twitter/twitter/twitteroauth.php';
                include dirname(dirname(dirname(__FILE__))).'/twitter/twitter/twconfig.php';
                $twitteroauth = new TwitterOAuth(CONSUMER_KEY, CONSUMER_SECRET); // No need to change anything in this line.
                $request_token = $twitteroauth->getRequestToken(WEBURL.'/users/getTwitterData');
                $_SESSION['oauth_token'] = '2754904789-wwGuK7VyYyncvV1x7iMv1c4B8ajwwby6tE4CXhe';//$request_token['oauth_token'] // Save value in session variable
                $_SESSION['oauth_token_secret'] = "v73hU8iRv2YLTko0EOkWRpR85eSQTPX9QvlRue39IvO6B";//$request_token['oauth_token_secret'];

                if ($twitteroauth->http_code == 200) {
                    $url = $twitteroauth->getAuthorizeURL($request_token['oauth_token']);
                    header('Location: ' . $url);
                } else {
                    die('ERROR: Some thing goes wrong.');
                }
            }
            
            
            //FB Login
            include dirname(dirname(dirname(__FILE__))).'/fb/src/facebook.php';
            $facebook = new Facebook(array(
                'appId'  => appId,
                'secret' => secret,
              ));
           $fb_users = $facebook->getUser();
           if(isset($fb_users) and $fb_users !=''){
               $logoutUrl = $facebook->getLogoutUrl();
               $data['loginUrl'] = $logoutUrl;
               $user_profile = $facebook->api('/me');
               //pr($user_profile);
               $userdata = $this->common->findByAttr('users','fb_id',$fb_users);
               //pr($userdata);
               if(empty($userdata)){
                   $save_data = array(
                       'fb_id'=>$fb_users,
                       'firstname'=>$user_profile['first_name'],
                       'lastname'=>$user_profile['last_name'],
                       'gender'=>$user_profile['gender'],
                       'created'=>date('Y-m-d H:i:s')
                   );
                   $this->common->add('users',$save_data);
                   $userdata = $this->common->findByAttr('users','fb_id',$fb_users);
                   $session_data = array(
                       'id'=>$userdata->id,
                       'username'=>$userdata->firstname,
                       'gender'=>$userdata->gender,
                       'firstname'=>$userdata->firstname,
                       'lastname'=>$userdata->lastname
                   );
                   $this->session->set_userdata($session_data);
                   redirect('/');  
               }else{
                   $userdata = $this->common->findByAttr('users','fb_id',$fb_users);
                   $session_data = array(
                       'id'=>$userdata->id,
                       'username'=>$userdata->firstname,
                       'gender'=>$userdata->gender,
                       'firstname'=>$userdata->firstname,
                       'lastname'=>$userdata->lastname
                   );
                   $this->session->set_userdata($session_data);
                   //redirect('/');  
               }
           }else{
               $loginUrl   = $facebook->getLoginUrl(
                    array(
                        'scope' => 'publish_actions'
                    )
                );
               $data['loginUrl'] = $loginUrl;
           }
            if($this->input->server('REQUEST_METHOD') === 'POST') {
                $this->form_validation->set_rules('username', 'Username', 'required');
                $this->form_validation->set_rules('password', 'Password', 'required');
                $this->form_validation->set_rules('captcha', 'captcha', 'required|login_captcha[captcha]');
                if ($this->form_validation->run() == FALSE){
                }else{
                   $username = $this->input->post('username');
                   $password = $this->input->post('password');
                   $userdata =  $this->user->userlogin($username,$password);
                   
                   if(isset($userdata['user_type_id']) and $userdata['user_type_id'] == '1'){
                        redirect('/admin');
                   }else if(isset($userdata['is_active']) and $userdata['is_active'] == '1'){
                       redirect('/');  
                   }else if($userdata == '0'){
                       $this->session->set_flashdata('msg', 'Incorrect username or password');
                   }else{
                       $this->session->set_flashdata('msg', 'Incorrect username or password');
                   }
                }
            }
            $user_id = $this->session->userdata('id');
            if(isset($user_id) and $user_id !=''){
                redirect('/');  
            }
            $data['page'] = 'users/signin';
            $data['title']= 'User Sign in';
            $this->load->view('layout/default',$data);
        }
        
        public function forgotpassword(){
            $data['data'] ='';
            if($this->input->server('REQUEST_METHOD') === 'POST') {
                $this->form_validation->set_rules('email', 'email', 'required|valid_email');
                if ($this->form_validation->run() == FALSE){
                }else{
                    $email = $this->input->post('email');
                    $userdata = $this->common->findByAttr('users','email',$email);
                    if(!empty($userdata)){
                        $password= random_string('alnum', 8);
                        $updatedata = array(
                            'password'=>MD5($password)
                        );
                        $this->common->updatebyattr('users','id',$userdata->id,$updatedata);
                        $this->load->library('email');
                        $headers = "From:  info@magazine.com";
                       // pr($userdata->email);exit;
                        $to=$userdata->email; 	
                        $subject='Password reset';
                        $txt='You have requested the new password, Here is you new password:'.$password;	
                        mail($to,$subject,$txt,$headers);

                        redirect('/users/forgotpassword?e=s&email='.$to);
                    }else{
                        redirect('/users/forgotpassword?e=m&email='.$to);
                    }
                }
            }
            $data['page'] = 'users/forgotpass';
            $data['title']= 'forgot password';
            $this->load->view('layout/default',$data);
        }
        
        public function changepassword(){
            $data['data'] ='';
            $user_id = $this->session->userdata('id');
            if($this->input->server('REQUEST_METHOD') === 'POST') {
                $this->form_validation->set_rules('opassword', 'Old Password', 'required|check_old_password[password]');
                $this->form_validation->set_rules('password', 'Password', 'required|matches[cpassword]');
                $this->form_validation->set_rules('cpassword', 'Confirm Password', 'required');
                if ($this->form_validation->run() == FALSE){
                }else{
                    //pr($this->input->post());
                    //$savedata = $this->input->post();
                    $savedata = array(
                        'password'=>md5($this->input->post('password'))
                    );
                    $this->common->updatebyattr('users','id',$user_id,$savedata);
                    redirect('/users/changepassword?e=s');
                    //$this->session->set_flashdata('msg', 'Pasword has been changed successfully');
                    
                }
            }
            $data['page'] = 'users/changepass';
            $data['title']= 'Change Password';
            $this->load->view('layout/default',$data);
        }
        
        public function editprofile(){
            $data['data'] ='';
            $user_id = $this->session->userdata('id');
            if($this->input->server('REQUEST_METHOD') === 'POST') {
                $this->form_validation->set_rules('firstname', 'First name', 'required|xss_clean');
                $this->form_validation->set_rules('lastname', 'Last name', 'required|xss_clean');
                $this->form_validation->set_rules('username', 'Username', 'required|xss_clean|edit_unique[users.username]');

                $this->form_validation->set_rules('email', 'Email', 'required|xss_clean|valid_email|edit_unique[users.email]');
                $this->form_validation->set_rules('gender', 'Gender', 'required');
                $this->form_validation->set_rules('dob', 'dob', 'required');
                $this->form_validation->set_rules('mobile', 'mobile', 'required|integer');
                $this->form_validation->set_message('alpha_numeric','%s fields is alpha numeric value only');
                if ($this->form_validation->run() == FALSE){
                }else{
                    //pr($this->input->post());
                    $savedata = $this->input->post();
                    $this->common->updatebyattr('users','id',$user_id,$savedata);
                }
            }
            $user_id = $this->session->userdata('id');
            $userdata = $this->common->findByAttr('users','id',$user_id);
            $data['data'] = $userdata;
            $data['page'] = 'users/editprofile';
            $data['title']= 'Edit profile';
            $this->load->view('layout/default',$data);
        }
        
        public function edit_image(){
            //pr($_FILES);
             define ("MAX_SIZE","9000");
             $uploaddir = dirname(dirname(dirname(__FILE__)))."/uploads/profile/";
            $valid_formats = array("jpg", "jpeg",'png');
            $filename = stripslashes($_FILES['image']['name']);
            $ext = $this->getExtension($filename);
            $size = filesize($_FILES['image']['tmp_name']);
                $ext = strtolower($ext);
                if (in_array($ext, $valid_formats)) {
                    if ($size < (MAX_SIZE * 1024)) {
                        $image_name = time() . $filename;
                        $newname = $uploaddir . $image_name;
                        if (move_uploaded_file($_FILES['image']['tmp_name'], $newname)) {
                            $time = time();
                            $save_data = array(
                                'profile_pic'=>$image_name
                            );
                            $user_id = $this->session->userdata('id');
                            $id = $this->common->updatebyattr('users','id',$user_id,$save_data);
                            $this->session->set_userdata('profile_pic',$image_name);
                            redirect('/users/editprofile');
                        }
                    }else{
                        redirect('/users/editprofile?e=s');
                    }
                }else{
                    //echo 'sfsdf';
                    redirect('/users/editprofile?e=f');
                }
            
        }
        
        function getExtension($str){
            $i = strrpos($str,".");
            if (!$i) { return ""; }
            $l = strlen($str) - $i;
            $ext = substr($str,$i+1,$l);
            return $ext;
    }
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */