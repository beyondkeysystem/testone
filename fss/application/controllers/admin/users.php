<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

include dirname(__FILE__).'/controller.php';
class Users extends Controller {
        public function __construct(){
            parent::__construct();
       }
	public function login(){
            $data['data'] = '';
            $data['page'] = 'admin/users/admin_login';
            $data['title']= 'Login';
            $data['data'] = $this->input->post();
            //pr($data);exit;
            $this->form_validation->set_rules('users[username]', 'Username', 'required');
            $this->form_validation->set_rules('users[password]', 'Password', 'required');
            if ($this->form_validation->run() == FALSE){
            }else{
                $userdata = $this->input->post();
                $username = $userdata['users']['username'];
                $password = $userdata['users']['password'];
                //pr($username);
                //$password = $this->input->post('users[password]');
                //pr($data);exit;
                $result = $this->user->login($username,$password);
                if(!empty($result)){
                    $this->session->set_userdata((array)$result);
                  redirect('/admin/users/dashboard/');  
                }else{
                    $this->session->set_flashdata('msg', '<div class="login_fail">Incorrect username or password</div>');
                }
            }
            $this->load->view('layout/admin_login',$data);
	}
        
        public function dashboard(){
            $data['data'] = '';
            $data['page'] = 'admin/users/dashboard';
            $search = $this->input->get('search');
            $results = $this->magazine->get_deshbord_magazines();
            $data['results'] = $results;
            $this->load->view('layout/admin_default',$data);
        }
        
        public function manage(){
            $data['data'] = '';
            $data['page'] = 'admin/users/manage_users';
            $page = $this->uri->segment(4);
            if(!$page){
                $this->session->unset_userdata('condition');
            }
            $search = $this->input->get('search');
            /*if(isset($search) and $search !=''){
                $condition = '(user_type_id !=1) and (firstname like "%'.addslashes(trim($search)).'%" or lastname like "%'.addslashes(trim($search)).'%" or username like "%'.addslashes(trim($search)).'%" or email like "%'.addslashes(trim($search)).'%" or gender like "%'.addslashes(trim($search)).'%")';
                $session_data = array('condition'=>$condition);
                $this->session->set_userdata($session_data);
                $s_data = $this->session->userdata('condition');
            }else{
                $condition = 'user_type_id !=1';
            }*/
            $condition = 'user_type_id !=1';
            $s_data = $this->session->userdata('condition');
            if(isset($s_data) and $s_data !=''){
                $condition = $s_data;
            }
           
            
            
            /*$count = $this->common->findCount('users',$condition);
            
            $config['base_url'] = PAGE_URL.'/admin/users/manage/';
            $config['total_rows'] = $count;
            $config['per_page'] = PAGE_LIMIT; 
            $config['uri_segment']=4;
            $config['full_tag_open'] = '<ul>';
            $config['full_tag_close'] = '</ul>';
            $config['num_tag_open'] = '<li>';
            $config['num_tag_close'] = '</li>';
            $config['cur_tag_open'] = '<li class="active"><a>';
            $config['cur_tag_close'] = '</a></li>';
            	if($this->uri->segment(4)==''){
                    $offset =0;
                }else{
                    $offset = $this->uri->segment(4);
                }
            $this->pagination->initialize($config);*/
            //$results = $this->common->findAll('users',$condition,$offset);
            $results = $this->common->findAll('users',$condition);
            
            
            $data['results'] = $results;
            $this->load->view('layout/admin_default',$data);
        }
        
        public function create(){
            $data['data'] = '';
            $data['title'] = 'Admin create user';
            $data['page'] = 'admin/users/create';
            $data['data'] = $this->input->post();
            $this->form_validation->set_rules('users[firstname]', 'First name', 'required|xss_clean');
            $this->form_validation->set_rules('users[lastname]', 'Last names', 'required|xss_clean');
            $this->form_validation->set_rules('users[username]', 'Username', 'required|xss_clean|is_unique[users.username]');
            $this->form_validation->set_rules('users[password]', 'Password', 'required');
            
            $this->form_validation->set_rules('users[email]', 'Email', 'required|xss_clean|valid_email|is_unique[users.email]');
            $this->form_validation->set_rules('users[gender]', 'Gender', 'required');
            if ($this->form_validation->run() == FALSE){
            }else{
               $data = $this->input->post();
               $data['users']['password'] = md5($data['users']['password']);
                $id = $this->common->save($data);
                if($id !=''){
                    redirect('/admin/users/manage/');  
                }
                //pr($data);exit;
            }
            $this->load->view('layout/admin_default',$data);
        }
        public function update($id){
            $data['data'] = '';
            $data['title'] = 'Admin create user';
            $data['page'] = 'admin/users/update';
            $data['data'] = $this->input->post();
            $this->form_validation->set_rules('users[firstname]', 'First name', 'required|xss_clean');
            $this->form_validation->set_rules('users[lastname]', 'Last names', 'required|xss_clean');
            //$this->form_validation->set_rules('users[username]', 'Username', 'required|is_unique[users.username]');
            $this->form_validation->set_rules('users[username]', 'Username', 'required|xss_clean|edit_unique[users.username]');
            //$this->form_validation->set_rules('users[password]', 'Password', 'required');
            
            $this->form_validation->set_rules('users[email]', 'Email', 'required|xss_clean|valid_email|edit_unique[users.email]');
            $this->form_validation->set_rules('users[gender]', 'Gender', 'required');
            if ($this->form_validation->run() == FALSE){
            }else{
               // $data = $this->input->post();
                $id = $this->common->update($this->input->post(),$id);
                //if($id !=''){
                    $this->session->set_flashdata('msg', '<div class="successmsg">Profile has been updated successfully</div>');
                    redirect('/admin/users/manage/');  
                //}
                //pr($data);exit;
            }
            $data['users'] = (array)$this->common->findByAttr('users','id',$id);
            $this->load->view('layout/admin_default',$data);
        }
        
        public function is_archive($id,$flag){
            $data['users']['is_active'] = $flag;
           // pr($data);exit;
            if($flag=='0'){
                $this->session->set_flashdata('msg', '<div class="successmsg">The record has been archived</div>');
            }else{
                $this->session->set_flashdata('msg', '<div class="successmsg">The record has been unarchived</div>');
            }
            $id = $this->common->update($data,$id);
            redirect('/admin/users/manage/');
        }
        
        public function delete($id){
            
            $id = $this->common->delete('users','id',$id);
            $this->session->set_flashdata('msg', '<div class="successmsg">Record has been deleted successfully</div>');
            redirect('/admin/users/manage/');
        }
        
        public function resetpass($id){
            $data['data'] = '';
            $data['title'] = 'Reset Password';
            $data['page'] = 'admin/users/resetpass';
            $data['data'] = $this->input->post();
            $this->form_validation->set_rules('users[password]', 'password', 'required');
            if ($this->form_validation->run() == FALSE){
            }else{
                $data = $this->input->post();
                $data['users']['password'] = md5($data['users']['password']);
                $this->common->update($data,$id);
                $this->session->set_flashdata('msg', '<div class="successmsg">Password has been reset successully</div>');
                //if($id !=''){
                    redirect("/admin/users/resetpass/$id");  
                //}
            }
            $this->load->view('layout/admin_default',$data);
        }
        
        public function changepassword(){
            $data['data'] = '';
            $data['title'] = 'Reset Password';
            $data['page'] = 'admin/users/changepassword';
            $data['data'] = $this->input->post();
            $this->form_validation->set_rules('opassword', 'old password', 'required|check_old_password[password]');
            //$this->form_validation->set_rules('users[password]', 'new password', 'required');
            $this->form_validation->set_rules('password', 'new password', 'required|matches[cpassword]');
            $this->form_validation->set_rules('cpassword', 'Confirm password', 'required');
            if ($this->form_validation->run() == FALSE){
            }else{
                $id = $this->session->userdata('id');
                $data = $this->input->post();
                $data['users']['password'] = md5($data['password']);
                unset($data['opassword']);
                unset($data['password']);
                unset($data['cpassword']);
                //pr($data);exit;
                $id = $this->common->update($data,$id);
                //if($id !=''){
                    redirect('/admin/users/manage/');  
                //}
            }
            $this->load->view('layout/admin_default',$data);
        }
        
        public function editprofile(){
            $id = $this->session->userdata('id');
            $data['data'] = '';
            $data['title'] = 'Admin Edit Profile';
            $data['page'] = 'admin/users/editprofile';
            $data['data'] = $this->input->post();
            $this->form_validation->set_rules('users[firstname]', 'First name', 'required|xss_clean');
            $this->form_validation->set_rules('users[lastname]', 'Last names', 'required|xss_clean');
            $this->form_validation->set_rules('users[username]', 'Username', 'required|xss_clean|edit_unique[users.username]');
            //$this->form_validation->set_rules('users[username]', 'Username', 'required|edit_unique[username]');
            //$this->form_validation->set_rules('users[password]', 'Password', 'required');
            
            $this->form_validation->set_rules('users[email]', 'Email', 'required|xss_clean|valid_email|edit_unique[users.email]');
            $this->form_validation->set_rules('users[gender]', 'Gender', 'required');
            if ($this->form_validation->run() == FALSE){
            }else{
               // $data = $this->input->post();
                $id = $this->common->update($this->input->post(),$id);
                //if($id !=''){
                    redirect('/admin/users/manage/');  
                //}
                //pr($data);exit;
            }
            $data['users'] = (array)$this->common->findByAttr('users','id',$id);
            $this->load->view('layout/admin_default',$data);
        }
        
        public function logout(){
            $this->session->sess_destroy();
            redirect('/');
        }
        
        
        public function permission($id){
           $data['data'] = '';
           $search = $this->input->get('search');
            //$condition = "user_type_id !='1'";
            $user = $this->common->findList('blogs');
            foreach($user as $val){
                $users[$val->id] = $val->blog_name;
            }
            //pr($users);
            $data = $this->input->post();
            if(!empty($data)){
                $this->common->delete('permissions','user_id',$id);
                foreach($data['blog_id'] as $k=>$v){
                    $save_data['permissions']['blog_id'] = $v;
                    $save_data['permissions']['user_id'] = $id;
                    $this->common->save($save_data);
                }
                echo '<script>parent.jQuery.fancybox.close();</script>';
            }
           $permissionar = '';
           $conditions = 'user_id = "'.$id.'"';
           $permission_data = $this->common->findList('permissions',$conditions);
           if(!empty($permission_data)){
               foreach($permission_data as $permission_d)
               $permissionar[] = $permission_d->blog_id;
           }
           //pr($permission_data);
           $data['users'] = $users;
           $data['permission_data'] = $permissionar;
           $this->load->view('admin/users/permission',$data);
       }
       
        public function info(){
		 $data['data'] = '';
         
             $user_id = $this->uri->segment(4);
            $condition = 'id ='.$user_id;
            $results = $this->common->findAll('users',$condition);
            
             $data['page'] = 'admin/users/view_users';
            $data['results'] = $results;
	      foreach($results as $result){
            $data['is_active'] = $result->is_active;
	    }
            $this->load->view('layout/admin_default',$data);

        }
	
	public function freeze(){
            error_reporting(E_ALL);
		$user_id = $this->uri->segment(4);
		 $condition = 'id ='.$user_id;
                 $results = $this->common->findAll('users',$condition);
		 
		 foreach($results as $result){
		//echo '<pre>';print_r($data);exit;
		if(isset($result->is_active) and $result->is_active == '1'){
		    $save_data = array('is_active'=>'0');
                    $this->session->set_flashdata('msg', '<div class="successmsg">User has been freezed</div>');
		}else{
		    $save_data = array('is_active'=>'1');
                    $this->session->set_flashdata('msg', '<div class="successmsg">User has been Unfreezed</div>');
		}
		$this->common->updatebyattr('users','id',$user_id,$save_data);
                    
                    redirect('admin/users/info/'.$user_id);
		 }
         }
	
	
	 public function approved(){
            $data['data'] = '';
            $data['page'] = 'admin/users/approved';
	    $user_id = $this->uri->segment(4);
            $search = $this->input->get('search');
            $condition = 'is_published = "1" and articles.is_active="1" and is_delete = "0" and users.id = '.$user_id;
            $results = $this->magazine->approved($condition);
            //pr($results);exit;
            $data['results'] = $results;
	     foreach($results as $result){
            $data['is_active'] = $result->is_active;
	    }
            $this->load->view('layout/admin_default',$data);
       }   
       
       public function unapprove(){
            $data['data'] = '';
	        $user_id = $this->uri->segment(4);
            $data['page'] = 'admin/users/approved';
            $search = $this->input->get('search');
            $condition = 'is_published = "0" and articles.is_active="0" and is_delete = "0" and users.id = '.$user_id;
            $results = $this->magazine->approved($condition);
            //pr($results);exit;
            $data['results'] = $results;
	      foreach($results as $result){
            $data['is_active'] = $result->is_active;
	    }
            $this->load->view('layout/admin_default',$data);
       } 

}