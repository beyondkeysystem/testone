<?php
class Admin_user extends CI_Controller {
 
    /**
    * Responsable for auto load the model
    * @return void
    */
    public function __construct()
    {
        parent::__construct();
        $this->load->model('users_model');
         $this->load->model('common');
           $this->load->model('user_property_model');

       if(( $this->session->userdata('is_logged_in') && ($this->session->userdata('type') != 'admin')) ){
            redirect('admin/login');
           
        }
        
          if(( !$this->session->userdata('is_logged_in')) ){
            redirect('admin/login');
           
        }
         
    }
 
    /**
    * Load the main view with all the current model model's data.
    * @return void
    */
    /*public function index()
    {
        $data['user'] = $this->users_model->get_user();        
        //load the view
        $data['main_content'] = 'admin/user/list';
        $this->load->view('includes/template', $data);  

    }//index*/
    
    public function index()
    {
        $search_data = '';
        if($this->input->server('REQUEST_METHOD') === 'POST'){
            $search_data = $this->input->post();
            $email = $this->input->post('email');
            $tel_no = $this->input->post('tel_no');
            $name = $this->input->post('name');
            $username = $this->input->post('username');
            if(isset($email) and $email !=''){
                $data['email'] = $email;
            }
            if(isset($tel_no) and $tel_no !=''){
                $data['tel_no'] = $tel_no;
            }
            if(isset($name) and $name !=''){
                $data['name'] = $name;
            }
            if(isset($username) and $username !=''){
                $data['username'] = $username;
            }
        }
        $count_data = $this->users_model->get_user_count($search_data);
        $config['base_url'] = base_url().'/admin/user';
            $config['total_rows'] = $count_data[0]['cnt'];
            $config['per_page'] = 20; 
            $config['uri_segment']=3;
            $config['full_tag_open'] = '<ul>';
            $config['full_tag_close'] = '</ul>';
            $config['num_tag_open'] = '<li>';
            $config['num_tag_close'] = '</li>';
            $config['cur_tag_open'] = '<li class="active"><a>';
            $config['cur_tag_close'] = '</a></li>';
            if($this->uri->segment(3)==''){
                $offset =0;
            }else{
                $offset = $this->uri->segment(3);
            }
            $this->pagination->initialize($config);
        $data['user'] = $this->users_model->get_user($search_data,$offset);        
        //load the view
        $data['main_content'] = 'admin/user/list';
        $this->load->view('includes/template', $data);  

    }//index

  
    public function update()
    {
    $id = $this->uri->segment(4);
  
        //if save button was clicked, get the data sent via post
        if ($this->input->server('REQUEST_METHOD') === 'POST')
        {
          //form validation
            $this->form_validation->set_rules('first_name', 'FirstName', 'required');
            $this->form_validation->set_rules('last_name', 'LastName', 'required');
            $this->form_validation->set_rules('email_addres', 'EmailAddress', 'required|valid_email');
            $this->form_validation->set_rules('user_name', 'UserName', 'required');
            $this->form_validation->set_error_delimiters('<div class="alert alert-error"><a class="close" data-dismiss="alert">�</a><strong>', '</strong></div>');

            if ($this->form_validation->run())
            {
                if($this->input->post('pass_word')!=""){
    
               $data_to_store = array(
                    'id' => $this->input->post('id'),
                    'first_name' => $this->input->post('first_name'),
                    'last_name' => $this->input->post('last_name'),
                    'email_addres' => $this->input->post('email_addres'),
                    'user_name' => $this->input->post('user_name'),
                    'pass_word' => md5($this->input->post('pass_word'))
                );
                }else{
                    $data_to_store = array(
                    'id' => $this->input->post('id'),
                    'first_name' => $this->input->post('first_name'),
                    'last_name' => $this->input->post('last_name'),
                    'email_addres' => $this->input->post('email_addres'),
                    'user_name' => $this->input->post('user_name')
                );
                }
                //if the insert has returned true then we show the flash message
                if($this->users_model->update_user($id, $data_to_store) == TRUE){
                    $this->session->set_flashdata('flash_message', 'updated');
                }else{
                    $this->session->set_flashdata('flash_message', 'not_updated');
                }
                redirect('admin/user/update/'.$id.'');

            }//validation run

        }

        //if we are updating, and the data did not pass trough the validation
        //the code below wel reload the current data
        $data['user']=$this->users_model->get_user_by_id($id);
        //product data 
        $data['user'] =  $this->users_model->get_user_by_id($id);
        $data['main_content'] = 'admin/user/edit';
        $this->load->view('includes/template', $data);            

    }//update

    /**
    * Delete product by his id
    * @return void
    */
    
     public function add()
    {
        //if save button was clicked, get the data sent via post
        if ($this->input->server('REQUEST_METHOD') === 'POST')
        {
            //form validation
            $this->form_validation->set_rules('first_name', 'First Name', 'required');
            $this->form_validation->set_rules('last_name', 'Last Name', 'required');
            $this->form_validation->set_rules('email_addres', 'Email Addres', 'required|valid_email');
            $this->form_validation->set_rules('user_name', 'User Name', 'required');
            $this->form_validation->set_rules('pass_word', 'Password', 'required');
            //$this->form_validation->set_rules('type', 'Type', 'required');
            $this->form_validation->set_error_delimiters('<div class="alert alert-error"><a class="close" data-dismiss="alert">�</a><strong>', '</strong></div>');
            //if the form has passed through the validation
            if ($this->form_validation->run())
            {

                $first_name = str_replace('"', '', $this->input->post('first_name'));
                $last_name= str_replace('"', '', $this->input->post('last_name'));
                $email_addres = str_replace('$', '', $this->input->post('email_addres'));
                $user_name = str_replace('"', '', $this->input->post('user_name'));
                $pass_word = str_replace('"', '', $this->input->post('pass_word'));
                //$type = str_replace('"', '', $this->input->post('type'));
              
                if($this->users_model->check_user($user_name)){

                    $data_to_store = array(
                       'first_name' => $first_name,
                       'last_name' => $last_name,
                       'email_addres' => $email_addres,
                       'user_name' => $user_name,          
                       'pass_word' => md5($pass_word),
                       'type' => 'user',
                       'role' => 'Normal'
                      
                   );
                   //if the insert has returned true then we show the flash message
                   if($this->users_model->register_member($data_to_store)){
                       $data['flash_message'] = TRUE; 
                   }else{
                       $data['flash_message'] = FALSE; 
                   }
                }else{
                    $data['error_message'] = "user already exist";
                }
            }
        }
        //load the view
        $data['main_content'] = 'admin/user/add';
        $this->load->view('includes/template', $data);  
    }       

    
    
    
    
      public function delete()
    {
        //product id 
        $id = $this->uri->segment(4);
        $this->users_model->delete_user($id);
        redirect('admin/user');
    }//edit
    
    public function freeze($id){
        $data = $this->users_model->get_user_by_id($id);
        //echo '<pre>';print_r($data);exit;
        if(isset($data[0]['is_active']) and $data[0]['is_active'] == '1'){
            $save_data = array('is_active'=>'0');
        }else{
            $save_data = array('is_active'=>'1');
        }
        $this->common->edit('membership',$save_data,$id);
        redirect('admin/user/view/'.$id);
    }
    
    
     public function view(){
        $user_id = $this->uri->segment(4);

//load the view
        //$data['user']=$this->users_model->get_user_by_id($user_id);
        $data['main_content'] = 'admin/user/view';
        $data['user']=$this->users_model->get_user_by_id($user_id);
        $data['credit']=$this->common->get_remaining_fund($user_id);
        $owned_current_share = $this->common->get_owned_val($user_id);
        $data['owned_current_share'] = $owned_current_share;
        /*
         SELECT 
	user_property.id AS user_property_id,
	user_property.property_id AS user_property_property_id,
	user_property.property_share_in_per,
	user_property.sell_property_share,
	user_property.sold_property_share,
	user_property.profit,
	user_property.loss,
	property.* FROM user_property
        INNER JOIN property 
        ON user_property.property_id = property.id
        WHERE property.property_status = 'owned'
         */
        //$this->common->findById('membership',$user_id);
        $this->load->view('includes/template', $data);  

    }
    
     public function success_deposit(){
        $user_id = $this->uri->segment(4);
        
        $page = $this->uri->segment(5);
        if(!$page){
            $this->session->unset_userdata('conditions');
            $array_items = array('search_datetime' => '', 'search_transaction_id' => '', 'search_transaction_status' => '');
            $this->session->unset_userdata($array_items);
        }
 
        if($this->input->server('REQUEST_METHOD') === 'POST') {
           //echo '<pre>';print_r($this->input->post());echo '</pre>';
           // exit;

            $datetime = $this->input->post('datetime');
            $transaction_id = $this->input->post('transaction_id');
            $transaction_status = $this->input->post('transaction_status');
            
            $session_data_set['search_datetime'] = $datetime;
            $session_data_set['search_transaction_id'] = $transaction_id;
            $session_data_set['search_transaction_status'] = $transaction_status;
            $this->session->set_userdata($session_data_set);

            $condition =  '';
            if(isset($datetime) and $datetime !=''){
                $data['datetime'] = $datetime;
                $condition .= " and o_payments.datetime like '%$datetime%'";
            }
            if(isset($transaction_id) and $transaction_id !=''){
                $data['transaction_id'] = $transaction_id;
                $condition .= " and o_payments.ref_no like '%$transaction_id%'";
            }
            if(isset($transaction_status) and $transaction_status !=''){
                $data['transaction_status'] = $transaction_status;
                $condition .= " and o_payments.transaction_status like '%$transaction_status%'";
            }
        }
        
        $select = "o_payments.*,membership.email_addres as email_addres, membership.user_name as user_name";
        $join = "o_payments left join membership on o_payments.user_id = membership.id";
        $conditions = " where ref_no !='' and membership.id = ".$user_id."  $condition";
        if(isset($condition) and $condition !=''){
            $session_data = array('conditions'=>$conditions);
            $this->session->set_userdata($session_data);
            $s_data = $this->session->userdata('conditions');//exit;
        }
        
        $s_data = $this->session->userdata('conditions');

        if($s_data){
            $conditions = $s_data;
        }

         $count = $this->common->get_deposit_cnt($conditions);
         $config['base_url'] = base_url().'/admin/user/deposit/'.$user_id.'';
            $config['total_rows'] = $count;
            $config['per_page'] = PAGE_LIMIT; 
            $config['uri_segment']=3;
            $config['full_tag_open'] = '<ul>';
            $config['full_tag_close'] = '</ul>';
            $config['num_tag_open'] = '<li>';
            $config['num_tag_close'] = '</li>';
            $config['cur_tag_open'] = '<li class="active"><a>';
            $config['cur_tag_close'] = '</a></li>';
            $config['uri_segment'] = 5;
            
            if($this->uri->segment(5)==''){
                $offset =0;
            }else{
                $offset = $this->uri->segment(5);
            }
            $this->pagination->initialize($config);
        
        $data['user']=$this->users_model->get_user_by_id($user_id);
        $payments = $this->common->find_deposit($select,$join,$conditions,$offset);
        $data['payments'] = $payments;
        $data['main_content'] = 'admin/user/success_deposit';
        $this->load->view('includes/template', $data);
    }
    
    public function success_withdraw(){
        $user_id = $this->uri->segment(4);

        $page = $this->uri->segment(5);
        if(!$page){
            $this->session->unset_userdata('conditions');
            $array_items = array('search_datetime' => '', 'search_transaction_status' => '');
            $this->session->unset_userdata($array_items);
        }
        if($this->input->server('REQUEST_METHOD') === 'POST') {

            $search_data = $this->input->post();
            $datetime = $this->input->post('datetime');
            $transaction_status = $this->input->post('transaction_status');
            
            $session_data_set['search_datetime'] = $datetime;
            $session_data_set['search_transaction_status'] = $transaction_status;
            $this->session->set_userdata($session_data_set);

            if(isset($datetime) and $datetime !=''){
                $data['datetime'] = $datetime;
                $condition .= " and o_payments.datetime '%$datetime%'";
            }
            
            if(isset($transaction_status) and $transaction_status !=''){
                $data['transaction_status'] = $transaction_status;
                $condition .= " and o_payments.datetime '%$datetime%'";
            }
        }
        
        if(isset($condition) and $condition !=''){
            $session_data = array('conditions'=>$search_data);
            $this->session->set_userdata($session_data);
            $s_data = $this->session->userdata('conditions');//exit;
        }
        
        $s_data = $this->session->userdata('conditions');

        if($s_data){
            $search_data = $s_data;
        }
    
         $count = $this->common->get_withdraw_cnt_by_id(null, $search_data, $user_id);
         $config['base_url'] = base_url().'/admin/user/withdraw/'.$user_id.'';
            $config['total_rows'] = $count;
            $config['per_page'] = PAGE_LIMIT; 
            $config['uri_segment']=3;
            $config['full_tag_open'] = '<ul>';
            $config['full_tag_close'] = '</ul>';
            $config['num_tag_open'] = '<li>';
            $config['num_tag_close'] = '</li>';
            $config['cur_tag_open'] = '<li class="active"><a>';
            $config['cur_tag_close'] = '</a></li>';
            $config['uri_segment'] = 5;
            if($this->uri->segment(5)==''){
                $offset =0;
            }else{
                $offset = $this->uri->segment(5);
            }
            $this->pagination->initialize($config);
            $data['user']=$this->users_model->get_user_by_id($user_id);
         $data['withdraw'] = $this->common->get_withdraw_by_id(null, $search_data, $offset, $user_id);
        //load the view
        $data['main_content'] = 'admin/user/withdraw_list';
        $this->load->view('includes/template', $data);  
    }
    
    
     public function fundlog(){
        
        $user_id = $this->uri->segment(4);
        if($this->input->server('REQUEST_METHOD') === 'POST') {
           //echo '<pre>';print_r($this->input->post());echo '</pre>';
            $datetime = $this->input->post('datetime');
            $email = $this->input->post('email');
            $fund_type = $this->input->post('fund_type');
            
            $con = array();
            if(isset($datetime) and $datetime !=''){
                $data['datetime'] = $datetime;
                $con['datetime'] = 'user_fund_log.date like "%'.addslashes(trim($datetime)).'%"';
                //$condition .= " and user_fund_log.date = '$datetime'";
            }
            if(isset($email) and $email !=''){
                $data['email'] = $email;
                $con['email'] = 'membership.email_addres like "%'.addslashes(trim($email)).'%"';
            }
            if(isset($fund_type) and $fund_type !=''){
                $data['fund_type'] = $fund_type;
                $con['fund_type'] = 'user_fund_log.fund_type like "%'.addslashes(trim($fund_type)).'%"';
            }
            $impl = implode(' and ',$con);
             if(isset($impl) and $impl !=''){
                $impl = ' and '.$impl;
            }
            //echo '<pre>';print_r($con);echo '</pre>';exit;
                    $condition =  $impl;
              $select = "user_fund_log.*,membership.email_addres as email_addres, membership.user_name as user_name";
              $join = "user_fund_log left join membership on user_fund_log.user_id = membership.id";
              $conditions = ' where  membership.id = '.$user_id. $condition;
              
                  $session_data = array('conditions'=>$conditions);
                  $this->session->set_userdata($session_data);
                  $s_data = $this->session->userdata('conditions');
              
              
        }
                $condition =  $impl;
        $select = "user_fund_log.*,membership.email_addres as email_addres, membership.user_name as user_name";
        $join = "user_fund_log left join membership on user_fund_log.user_id = membership.id";
        $conditions = ' where  membership.id = '.$user_id. $condition;
      
        $s_data = $this->session->userdata('conditions');
        if($s_data){
            $conditions = $s_data;
        }
        
            $count = $this->common->logCount($conditions, $user_id);
            $config['base_url'] = base_url().'/admin/user/transaction_log/'.$user_id.'';
            $config['total_rows'] = $count;
            $config['per_page'] = 20; 
            $config['uri_segment']=3;
            $config['full_tag_open'] = '<ul>';
            $config['full_tag_close'] = '</ul>';
            $config['num_tag_open'] = '<li>';
            $config['num_tag_close'] = '</li>';
            $config['cur_tag_open'] = '<li class="active"><a>';
            $config['cur_tag_close'] = '</a></li>';
            $config['uri_segment'] = 5;
            	if($this->uri->segment(5)==''){
                    $offset =0;
                }else{
                    $offset = $this->uri->segment(5);
                }
            $this->pagination->initialize($config);
            
        $payments = $this->common->findlog($select,$join,$conditions,$offset);
        //echo '<pre>';print_r($payments);exit;
        $data['user']=$this->users_model->get_user_by_id($user_id);
        $data['payments'] = $payments;
        $data['main_content'] = 'admin/user/logs';
        $this->load->view('includes/template', $data);
    }
    
     public function shares()
    {
         $user_id = $this->uri->segment(4);
         
          //product id
         $config['per_page'] = 10;
        $config['base_url'] = base_url().'admin/user/shares/'.$user_id;
        $config['use_page_numbers'] = TRUE;
        $config['num_links'] = 20;
        $config['full_tag_open'] = '<ul>';
        $config['full_tag_close'] = '</ul>';
        $config['num_tag_open'] = '<li>';
        $config['num_tag_close'] = '</li>';
        $config['cur_tag_open'] = '<li class="active"><a>';
        $config['cur_tag_close'] = '</a></li>';
     
        
        $page = $this->uri->segment(5);
           $config['uri_segment'] = 5;
           //math to get the initial record to be select in the database
        $limit_end = ($page * $config['per_page']) - $config['per_page'];
        if ($limit_end < 0){
            $limit_end = 0;
        }
	
         $data['user_property'] = $this->users_model->get_user_property_by_userid1($user_id, $config['per_page'], $limit_end);        
              
         $data['count_user_credit']= $this->users_model->count_user_property_by_userid1($user_id);
        $config['total_rows'] = $data['count_user_credit'];
        // 
         $this->pagination->initialize($config); 
   
   
        $data['main_content'] = 'admin/user/shares';
         $data['user']=$this->users_model->get_user_by_id1($user_id);
        $this->load->view('includes/template', $data);  

    }//index

    public function pending_user()
    {
        $search_data = '';
        if($this->input->server('REQUEST_METHOD') === 'POST'){
            $search_data = $this->input->post();
            $email = $this->input->post('email');
            $tel_no = $this->input->post('tel_no');
            $name = $this->input->post('name');
            $username = $this->input->post('username');
            if(isset($email) and $email !=''){
                $data['email'] = $email;
            }
            if(isset($tel_no) and $tel_no !=''){
                $data['tel_no'] = $tel_no;
            }
            if(isset($name) and $name !=''){
                $data['name'] = $name;
            }
            if(isset($username) and $username !=''){
                $data['username'] = $username;
            }
        }
        $count_data = $this->users_model->get_pendingreg_user_count($search_data);
        $config['base_url'] = base_url().'/admin/user';
            $config['total_rows'] = $count_data[0]['cnt'];
            $config['per_page'] = 20; 
            $config['uri_segment']=3;
            $config['full_tag_open'] = '<ul>';
            $config['full_tag_close'] = '</ul>';
            $config['num_tag_open'] = '<li>';
            $config['num_tag_close'] = '</li>';
            $config['cur_tag_open'] = '<li class="active"><a>';
            $config['cur_tag_close'] = '</a></li>';
            if($this->uri->segment(3)==''){
                $offset =0;
            }else{
                $offset = $this->uri->segment(3);
            }
            $this->pagination->initialize($config);
        $data['user'] = $this->users_model->get_pendingreg_user($search_data,$offset);
        //load the view
        $data['main_content'] = 'admin/user/pending_user_list';
        $this->load->view('includes/template', $data);  
    }

    public function trans_log($id){
        if($this->input->post('approved')){
            $o_payment_id = $this->input->post('o_payments_id');
            $user_id = $this->input->post('user_id');
            $data = array('transaction_status'=>'Completed');
            $return = $this->users_model->update_o_payment_det($o_payment_id, $data);
            if($return){
                $data = array('is_login'=>'1');
                $return1 = $this->users_model->update_user($user_id, $data);
                if(return1){
                    // redirect('admin/user');
                    echo '<script type="text/javascript">
                      // $(function() { parent.$.fancybox.close(); });
                      window.parent.location.href = "http://myviko.pd.cisinlive.com/admin/user";
                    </script>';
                }
            }              
        }
        $data['user_details'] = $this->users_model->get_user_by_id($id);
        $data['user_o_payment'] = $this->users_model->get_user_reg_trans_det($id);
        // echo "<pre>";print_r($data['user_o_payment']);die;
        $this->load->view('admin/user/user_reg_trans_log',$data);
    }

}