<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class controller extends CI_Controller {
    public function __construct(){
            parent::__construct();
            $this->load->model(array('common','user','magazine','ads'));
            $action = $this->uri->segment(3);
            $actionarr = array('login');
            $user_id = $this->session->userdata('id');
            if(isset($user_id) and $user_id!=''){
                if(isset($action) and $action =='login'){
                    redirect('admin/users/dashboard');
                }
            }else{
                if(isset($action) and !in_array($action,$actionarr)){
                    redirect('admin/users/login');
                }
                
            }
       }
}