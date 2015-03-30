<?php
class Admin_user_property extends CI_Controller {
 
    /**
    * Responsable for auto load the model
    * @return void
    */
    public function __construct()
    {
        parent::__construct();
        $this->load->model('user_property_model');
        $this->load->model('property_model');
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
         $data['user_property'] = $this->user_property_model->get_user_property();        
              
   
        $data['main_content'] = 'admin/user_property/list';
        $this->load->view('includes/template', $data);  

    }//index

   
    public function update()
    {
       
        $user_id = $this->uri->segment(4);
        $property_id = $this->uri->segment(5);
  
        //if save button was clicked, get the data sent via post
        if ($this->input->server('REQUEST_METHOD') === 'POST')
        {
            //form validation
             //form validation
             
            // $this->form_validation->set_rules('property_id', 'Property Id', 'required');
            $this->form_validation->set_rules('property_share_in_per', 'Property share in per', 'required|numeric');

            $this->form_validation->set_error_delimiters('<div class="alert alert-error"><a class="close" data-dismiss="alert">×</a><strong>', '</strong></div>');
            if ($this->form_validation->run())
            {
    
                $property_id = str_replace('"', '', $this->input->post('property_id'));
                $user_id = str_replace('"', '', $this->input->post('user_id'));
                $property_share_in_per = str_replace('"', '', $this->input->post('property_share_in_per'));
                $data_to_store = array(
                    'property_share_in_per' => $property_share_in_per,
                );
                //if the insert has returned true then we show the flash message
                if($this->user_property_model->update_user_property($user_id, $property_id, $data_to_store) == TRUE){
                    $this->session->set_flashdata('flash_message', 'updated');
                }else{
                    $this->session->set_flashdata('flash_message', 'not_updated');
                }
                redirect('admin/user_property/update/'.$user_id.'/'.$property_id.'');

            }//validation run

        }

        //if we are updating, and the data did not pass trough the validation
        //the code below wel reload the current data

        //product data 
        $data['update_user_property'] = $this->user_property_model->get_property_id1($property_id, $user_id);

       // echo '<pre>';
        //print_r($data['update_user_property']); die;
        //load the view
        $data['main_content'] = 'admin/user_property/edit';
        $this->load->view('includes/template', $data);            

    }//update

    
      public function add()
    {
        //if save button was clicked, get the data sent via post
        if ($this->input->server('REQUEST_METHOD') === 'POST')
        {
            //form validation
            $this->form_validation->set_rules('property_id', 'Property Id', 'required');
            $this->form_validation->set_rules('property_share_in_per', 'Property share in per', 'required|numeric');
            $this->form_validation->set_error_delimiters('<div class="alert alert-error"><a class="close" data-dismiss="alert">×</a><strong>', '</strong></div>');
         
            //if the form has passed through the validation
            if ($this->form_validation->run())
            {
                
                $user_id = str_replace('"', '', $this->input->post('user_id'));
                $property_id = str_replace('"', '', $this->input->post('property_id'));
                $property_share_in_per = str_replace('"', '', $this->input->post('property_share_in_per'));
                
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
                
                //$this->user_property_model->check_user_property($property_id, $user_id);
                //if the insert has returned true then we show the flash message
         
                if($this->user_property_model->chk_user_property($user_id, $property_id, $property_share_in_per)){
                    $data['flash_message'] = TRUE;
                    redirect('admin/user_property');
                }else{
                    $data['flash_message'] = FALSE; 
                }
            }
        }
        
       //$data['property'] = $this->user_property_model->get_user_id($data['row']['user_id']);
        $data['propertyData'] = $this->property_model->get_all_property_name();
        
        //load the view
        $data['userData'] = $this->users_model->get_user();
        $data['main_content'] = 'admin/user_property/add';
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
        $property_id = $this->uri->segment(5);
        $this->user_property_model->delete_user_property($id, $property_id);
        redirect('admin/user_property');
    }//edit
    
    
    // public function detail()
    //{
    //    //product id 
    //    $id = $this->uri->segment(4);
    //    $data['user_credit'] = $this->user_fund_log_model->get_user_log_by_userid($id);
    //    $data['main_content'] = 'admin/user_credit/detail';
    //    $this->load->view('includes/template', $data);  
    //}//edit
    //
  

}
