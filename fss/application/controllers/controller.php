<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class controller extends CI_Controller {
    public function __construct(){
            parent::__construct();
            $this->load->model('model');
            $this->load->model('common');
            $this->load->model('user');
            $this->load->model('magazine');
            $action = $this->uri->segment(1);
            $actionname = $this->uri->segment(2);
            //pr($_SERVER);exit;
            $controllerarr = array('users','magazines');
            //$actionarr = array('thankyou','create');
            $actionarr = array('thankyou','create','favorites','mymaganize','mydraft','editprofile');
            $user_id = $this->session->userdata('id');
            if($user_id==''){
                if(in_array($action,$controllerarr) and in_array($actionname,$actionarr)){
                    redirect('/users/signin');
                }
            }else{
                $controllerarr = array('users','magazines');
                $actionarr = array('signin','register');
                if(isset($user_id) and $user_id!=''){
                    if(in_array($action,$controllerarr) and in_array($actionname,$actionarr)){
                        redirect('/');
                    }
                    
                }
            }
            
            if(isset($action) and $action =='admin'){
                redirect('admin/users/login');
            }
       }
}