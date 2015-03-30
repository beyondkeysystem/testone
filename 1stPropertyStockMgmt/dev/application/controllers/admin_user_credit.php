<?php
class Admin_user_credit extends CI_Controller {
 
    /**
    * Responsable for auto load the model
    * @return void
    */
    public function __construct()
    {
        parent::__construct();
        $this->load->model('user_credit_model');
        $this->load->model('user_fund_log_model');
        $this->load->model('roles_model');
        $this->load->model('credit_price_model');
         $this->load->model('users_model');
        

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
    public function index()
    {
        
          $config['per_page'] = 20;
        $config['base_url'] = base_url().'admin/user_credit';
        $config['use_page_numbers'] = TRUE;
        $config['num_links'] = 5;
        $config['full_tag_open'] = '<ul>';
        $config['full_tag_close'] = '</ul>';
        $config['num_tag_open'] = '<li>';
        $config['num_tag_close'] = '</li>';
        $config['cur_tag_open'] = '<li class="active"><a>';
        $config['cur_tag_close'] = '</a></li>';
        
        $page = $this->uri->segment(3);
        
           //math to get the initial record to be select in the database
        $limit_end = ($page * $config['per_page']) - $config['per_page'];
        if ($limit_end < 0){
            $limit_end = 0;
        }
	
        $data['user_credit'] = $this->user_fund_log_model->get_all_profit_loss1($config['per_page'], $limit_end);
        $data['count_user_credit']= $this->user_fund_log_model->count_user_credit();
        $config['total_rows'] = $data['count_user_credit'];
         
         $this->pagination->initialize($config);  
        $data['main_content'] = 'admin/user_credit/list';
        $this->load->view('includes/template', $data);  

    }//index

   
    public function update()
    {
       
        $id = $this->uri->segment(4);
  
        //if save button was clicked, get the data sent via post
        if ($this->input->server('REQUEST_METHOD') === 'POST')
        {
            //form validation
             //form validation
             
            $this->form_validation->set_rules('credit', 'Credit', 'required');

            $this->form_validation->set_error_delimiters('<div class="alert alert-error"><a class="close" data-dismiss="alert">×</a><strong>', '</strong></div>');
            if ($this->form_validation->run())
            {
    
                $credit = str_replace('"', '', $this->input->post('credit'));
                $user_id = str_replace('"', '', $this->input->post('user_id'));
                $username = str_replace('"', '', $this->input->post('username'));
                $credit_old =$this->user_credit_model->get_credit__by_userid($user_id);
                $credit_old = $credit_old[0]['credit']; 
                $data_to_store = array(
                    'credit' => $credit,
                );
                //if the insert has returned true then we show the flash message
                if($this->user_credit_model->update_user_credit($id, $data_to_store) == TRUE){
                    $credit_new =   $credit-$credit_old ;
                     $data_into_store = array(
                    'credit' => $credit_new,
                    'username'=> $username,
                    'user_id' => $user_id,
                    'edit_by_admin' => 'yes'
                    );
                    $this->user_credit_model->store_user_credit_payment($data_into_store);
                    
                    $creditData =  $this->credit_price_model->get_credit_price();
                    $creditVal = $credit * $creditData[0]['price'];
                    $data_log = array(
                        'user_id' => $user_id,
                        'detail' => 'Deposit via administartor',
                        'fund_type' => 'Deposit',
                        'debit' => $creditVal,
                        'credit' => 0,     
                    );
                    
                    // Maintain Log
                    $this->user_fund_log_model->store_user_credit_payment($data_log1);
                    $this->session->set_flashdata('flash_message', 'updated');
                }else{
                    $this->session->set_flashdata('flash_message', 'not_updated');
                }
                redirect('admin/user_credit/update/'.$id.'');

            }//validation run

        }

        //if we are updating, and the data did not pass trough the validation
        //the code below wel reload the current data

        //product data 
        $data['user_credit'] = $this->user_credit_model->get_user_credit_by_id($id);

        //load the view
        $data['main_content'] = 'admin/user_credit/edit';
        $this->load->view('includes/template', $data);            

    }//update

    
      public function add()
    {
        //if save button was clicked, get the data sent via post
        if ($this->input->server('REQUEST_METHOD') === 'POST')
        {

            //form validation
              $this->form_validation->set_rules('credit', 'Credit', 'numeric');
              $this->form_validation->set_rules('debit', 'Debit', 'numeric');
             $this->form_validation->set_rules('user_id', 'User Id', 'required');
            $this->form_validation->set_error_delimiters('<div class="alert alert-error"><a class="close" data-dismiss="alert">×</a><strong>', '</strong></div>');
            if ($this->form_validation->run())
            {
    
                $credit = str_replace('"', '', $this->input->post('credit'));
                 $debit = str_replace('"', '', $this->input->post('debit'));
                $user_id = str_replace('"', '', $this->input->post('user_id'));
                
                    $creditData =  $this->credit_price_model->get_credit_price();
                    //echo $creditData[0]['price']; 
                     $creditVal = $credit * $creditData[0]['price'];
                    $debitVal = $debit * $creditData[0]['price'];
                  
                $data_to_store11 = array(
                        'user_id' => $user_id,
                        'fund_type' => 'Deposit',
                        'detail' =>'Deposited By Admin',
                        'debit' => $debit,
                        'credit' => $credit
                    );
                  $this->user_fund_log_model->store_user_credit($data_to_store11);
           
                if($this->user_credit_model->check_user($user_id)){
                    //echo $user_id; die;
                        $username=$this->users_model->get_user_by_id($user_id);
                      $username=$username[0]['user_name'];
                      $user_credit=$this->user_credit_model->get_user__by_userid($user_id);
                       
                      $user_credit=$user_credit[0]['credit'];
                      if($credit != 0){
                      $credit=$user_credit-($credit / $creditData[0]['price']);
                      }
                       if($debit != 0){
                         $credit=$user_credit+($debit / $creditData[0]['price']);
                       }
                       //if the insert has returned true then we show the flash message
                      if($this->user_credit_model->update_by_user_id($user_id, $credit)){
                          $data['flash_message'] = TRUE; 
                      }else{
                          $data['flash_message'] = FALSE; 
                      }
                }else{
                    if($debit==0){
                        redirect('admin/user_credit');
                    }
			$debit = $debit / $creditData[0]['price'];
                    $username=$this->users_model->get_user_by_id($user_id);
                    $username=$username[0]['user_name'];
                    $data_to_store = array(
                        'credit' => $debit,
                        'user_id' => $user_id,
                        'username' => $username
                    );
                    //if the insert has returned true then we show the flash message
                    if($this->user_credit_model->store_user_credit($data_to_store)){
                        $data['flash_message'] = TRUE; 
                    }else{
                        $data['flash_message'] = FALSE; 
                    }
                }
                  
            }

        }
        //load the view
        $data['userData'] = $this->users_model->get_user();
        $data['main_content'] = 'admin/user_credit/add';
        $this->load->view('includes/template', $data);  
    }       
    /**
    * Delete product by his id
    * @return void
    */
    public function delete()
    {
        //product id 
        $id = $this->uri->segment(4);
        $this->user_credit_model->delete_user_credit($id);
        redirect('admin/user_credit');
    }//edit
    
    
     public function detail()
    {
        //product id
         $id = $this->uri->segment(4);
         $config['per_page'] = 20;
        $config['base_url'] = base_url().'admin/user_credit/detail/'.$id;
        $config['use_page_numbers'] = TRUE;
        $config['num_links'] = 5;
        $config['full_tag_open'] = '<ul>';
        $config['full_tag_close'] = '</ul>';
        $config['num_tag_open'] = '<li>';
        $config['num_tag_close'] = '</li>';
        $config['cur_tag_open'] = '<li class="active"><a>';
        $config['cur_tag_close'] = '</a></li>';

        $data['per_page'] = $config['per_page'];
     
        
        $page = $this->uri->segment(5);
           $config['uri_segment'] = 5;
           //math to get the initial record to be select in the database
        $limit_end = ($page * $config['per_page']) - $config['per_page'];
        if ($limit_end < 0){
            $limit_end = 0;
        }
	
       
        $data['user_credit'] = $this->user_fund_log_model->get_user_log_by_userid1($id, $config['per_page'], $limit_end);
        $data['count_user_credit']= $this->user_fund_log_model->count_user_log_by_userid($id);
        $config['total_rows'] = $data['count_user_credit'];
         
         $this->pagination->initialize($config);  
        $data['main_content'] = 'admin/user_credit/detail';
        $this->load->view('includes/template', $data);  
    }//edit

}
