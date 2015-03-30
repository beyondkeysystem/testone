<?php
class Admin_profit_and_loss_logs extends CI_Controller {
 
    /**
    * Responsable for auto load the model
    * @return void
    */
    public function __construct()
    {
        parent::__construct();
        $this->load->model('user_share_limits_model');
        $this->load->model('roles_model');
        $this->load->model('user_property_model');
        $this->load->model('property_model');
        $this->load->model('users_model');
        $this->load->model('user_fund_log_model');
        

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
        $config['base_url'] = base_url().'admin/profit_and_loss_logs';
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
	
        
        $data['user_fund_log'] = $this->user_fund_log_model->get_user_profit_loss_log1($config['per_page'], $limit_end);
        $data['count_user_fund_log']= $this->user_fund_log_model->count_user_profit_loss_log();
         $config['total_rows'] = $data['count_user_fund_log'];
         
         $this->pagination->initialize($config);  
        //echo "<pre>";print_r($data['share_limit']); exit;
        // Need loop for added property name and userid
        $data['main_content'] = 'admin/profit_and_loss/list';
        $this->load->view('includes/template', $data);  

    }//index
    
    public function property()
    {
        $user_id = str_replace('"', '', $this->input->post('user_id'));
        
        
        $data['property']=$this->user_property_model->get_property_by_user_id($user_id);
        
       // $this->load->view('admin/share_limit/property', $data);
        echo json_encode($data['property']);
        //print_r($data['property']);

    }//index


   
    public function update()
    {
        $id = $this->uri->segment(4);
        //if save button was clicked, get the data sent via post
        if ($this->input->server('REQUEST_METHOD') === 'POST')
        {
            //form validation
             //form validation
           //form validation
            // $this->form_validation->set_rules('user_id', 'User Id', 'required');
            $this->form_validation->set_rules('property_id', 'Property Id', 'required');
            $this->form_validation->set_rules('profit_loss', 'Profit/Loss', 'required');
            $this->form_validation->set_rules('detail', 'Details', 'required');
            $this->form_validation->set_error_delimiters('<div class="alert alert-error"><a class="close" data-dismiss="alert">×</a><strong>', '</strong></div>');
            if ($this->form_validation->run())
            {    
                $property_id = str_replace('"', '', $this->input->post('property_id'));
                // $user_id = str_replace('"', '', $this->input->post('user_id'));
                $profit_loss = str_replace('"', '', $this->input->post('profit_loss'));
                $detail = str_replace('"', '', $this->input->post('detail'));
                $amount = str_replace('"', '', $this->input->post('amount'));
                
                if($profit_loss == 'Profit'){
                    $debit = $amount;
                    $credit = 0;
                }else{
                    $debit = 0;
                    $credit = $amount;
                }

               $data_to_store = array(
                    'property_id' => $property_id,
                    'debit' => $debit,
                    'credit' => $credit,
                    'detail' => $detail
                );            
                
                //$data_log = array(
                //        'user_id' => $user_id,
                //        'detail' => $details,
                //        'fund_type' => 'ProfitandLoss',
                //        'debit' => $profit,
                //        'credit' => $loss,
                //        'property_id' => $property_id
                //    );
                //// Maintain Log
                //$this->user_fund_log_model->store_user_credit_payment($data_log);
                //if the insert has returned true then we show the flash message
                if($this->user_fund_log_model->update_user_profit_loss_log($id, $data_to_store) == TRUE){
                    $this->session->set_flashdata('flash_message', 'updated');
                }else{
                    $this->session->set_flashdata('flash_message', 'not_updated');
                }
                redirect('admin/profit_and_loss_logs/update/'.$id.'');
            }//validation run
        }

        //if we are updating, and the data did not pass trough the validation
        //the code below wel reload the current data

        //product data 
        $data['row'] = $this->user_fund_log_model->get_user_credit_by_id($id);
        
        foreach($data['row'] as $row){
            //$data['property'] = $this->user_property_model->get_user_id($data['row']['user_id']);
            $data['property'] = $this-> property_model->get_property_name_by_id($row['property_id']);
        }
        //load the view
        $data['main_content'] = 'admin/profit_and_loss/edit';
        $this->load->view('includes/template', $data);            

    }//update

public function propertyajax(){
    
    $data['property'] = $this->user_property_model->get_user_id($user_id);
    
}

    public function add()
    {
        //if save button was clicked, get the data sent via post
        if ($this->input->server('REQUEST_METHOD') === 'POST')
        {
            //form validation
            // $this->form_validation->set_rules('user_id', 'User Id', 'required');
            $this->form_validation->set_rules('property_id', 'Property Id', 'required');
            $this->form_validation->set_rules('profit_loss', 'Profit or Loss', 'required');
            $this->form_validation->set_rules('detail', 'Details', 'required');
            $this->form_validation->set_rules('amount', 'Amount', 'required|numeric');
            // $this->form_validation->set_rules('credit', 'Credit', 'required|numeric');
            $this->form_validation->set_error_delimiters('<div class="alert alert-error"><a class="close" data-dismiss="alert">×</a><strong>', '</strong></div>');
         
            //if the form has passed through the validation
            if ($this->form_validation->run())
            {
                $property_id = str_replace('"', '', $this->input->post('property_id'));
                // $user_id = str_replace('"', '', $this->input->post('user_id'));
                $profit_loss = str_replace('"', '', $this->input->post('profit_loss'));
                $detail = str_replace('"', '', $this->input->post('detail'));
                $amount = str_replace('"', '', $this->input->post('amount'));
                // $debit = str_replace('"', '', $this->input->post('debit'));
                // $credit = str_replace('"', '', $this->input->post('credit'));
                
                //$data_log = array(
                //    'user_id' => $user_id,
                //    'detail' => $details,
                //    'fund_type' => 'ProfitandLoss',
                //    'debit' => $profit,
                //    'credit' => $loss,
                //    'property_id' => $property_id
                //);                
                //// Maintain Log
                //$this->user_fund_log_model->store_user_credit_payment($data_log);
                
                if($profit_loss == 'Profit'){
                    $debit = $amount;
                    $credit = 0;
                }else{
                    $debit = 0;
                    $credit = $amount;
                }

                $data_to_store = array(
                    'property_id' => $property_id,
                    'debit' => $debit,
                    'credit' => $credit,
                    'detail' => $detail,
                    'user_id' => 1,
                    'fund_type' => 'ProfitandLoss'
                );

                //if the insert has returned true then we show the flash message
                if($this->user_fund_log_model->store_user_credit($data_to_store)){
                    $data['flash_message'] = TRUE;
                    redirect('admin/profit_and_loss_logs');
                }else{
                    $data['flash_message'] = FALSE; 
                }
            }
        }
        
        $data['userData'] = $this->users_model->get_user();
        //print_r($data['userData']); die;
       //$data['property'] = $this->user_property_model->get_user_id($data['row']['user_id']);
        $data['propertyData'] = $this-> property_model->get_all_property_name();
        
        //load the view
        $data['main_content'] = 'admin/profit_and_loss/add';
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
        $this->user_fund_log_model->delete_user_profit_loss_log($id); //Mayank Pawar date 27.11.14
        redirect('admin/profit_and_loss_logs');
    }//edit

    public function list_by_property(){
        $property_id = $this->input->get('pid');
        $data['user_fund_log'] = $this->user_fund_log_model->get_user_profit_loss_log_by_property($property_id);
        $data['property_id'] = $property_id;
    //    $property = $this->property_model->get_product_by_id($property_id);
    //    $data['property_name']=$property[0]['property_name'];

        //load the view
        $data['main_content'] = 'admin/profit_and_loss/list_by_property';
        $this->load->view('includes/template', $data);  

    }
}