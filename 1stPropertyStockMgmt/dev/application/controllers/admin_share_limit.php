<?php
class Admin_share_limit extends CI_Controller {
 
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
        $data['share_limit'] = $this->user_share_limits_model->get_share_limit();        
        //echo "<pre>";print_r($data['share_limit']); exit;
   // Need loop for added property name and userid
        $data['main_content'] = 'admin/share_limit/list';
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
            $this->form_validation->set_rules('share_limits', 'Share Limits', 'required');
            $this->form_validation->set_error_delimiters('<div class="alert alert-error"><a class="close" data-dismiss="alert">×</a><strong>', '</strong></div>');
            if ($this->form_validation->run())
            {    
                $share_limits = str_replace('"', '', $this->input->post('share_limits'));
                $property_id = str_replace('"', '', $this->input->post('property_id'));
                $user_id = str_replace('"', '', $this->input->post('user_id'));
                if($count_property_share[0]['total_property_share_in_per']==100){
                    redirect('admin/share_limit/update/'.$id.'?m=1');
                }
                $data_to_store = array(
                    'property_id' => $property_id,
                    'share_limits' => $share_limits,
                    'user_id' => $user_id
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
                if($this->user_share_limits_model->update_share_limit($user_id, $property_id, $data_to_store) == TRUE){
                    $this->session->set_flashdata('flash_message', 'updated');
                }else{
                    $this->session->set_flashdata('flash_message', 'not_updated');
                }
                redirect('admin/share_limit/update/'.$id.'');
            }//validation run
        }

        //if we are updating, and the data did not pass trough the validation
        //the code below wel reload the current data

        //product data 
        $data['row'] = $this->user_share_limits_model->get_share_limit_by_id($id);
       //$data['property'] = $this->user_property_model->get_user_id($data['row']['user_id']);
        $data['property'] = $this-> property_model->get_property_name_by_id($data['row']['property_id']);
        
//echo "<pre>";print_r($data['property']); exit;
        //load the view
        $data['main_content'] = 'admin/share_limit/edit';
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
            $this->form_validation->set_rules('share_limit', 'Share Limit', 'required');
            $this->form_validation->set_error_delimiters('<div class="alert alert-error"><a class="close" data-dismiss="alert">×</a><strong>', '</strong></div>');
         
            //if the form has passed through the validation
            if ($this->form_validation->run())
            {
                $share_limit = str_replace('"', '', $this->input->post('share_limit'));
                $property_id = str_replace('"', '', $this->input->post('property_id'));
                $user_id = str_replace('"', '', $this->input->post('user_id'));
                
                // Code By Me Start
                
                $count_property_share = $this->user_share_limits_model->count_property_share($property_id);
                
                if($count_property_share[0]['total_property_share_in_per']==100){
                    redirect('admin/share_limit/add?m=1');
                }
                
                if($user_check=$this->user_share_limits_model->check_user_property_share($user_id, $property_id)){
                    
                    //print_r($user_check); die;
                    $data_to_store = array(
                    'property_id' => $property_id,
                    'share_limits' => $user_check[0]['share_limits']+$share_limit,
                    'user_id' => $user_id
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
                    if($this->user_share_limits_model->update_share_limit($user_id, $property_id, $data_to_store) == TRUE){
                        $this->session->set_flashdata('flash_message', 'updated');
                         redirect('admin/share_limit/');
                    }else{
                        $this->session->set_flashdata('flash_message', 'not_updated');
                    }
                    
                } else{
                
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
                
                    $data_to_store = array(
                        'property_id' => $property_id,
                        'share_limits' => $share_limit,
                        //'profit' => $profit,
                        //'loss' => $loss,
                        //'details' => $details,
                        'user_id' => $user_id
                    );
                    //if the insert has returned true then we show the flash message
                    if($this->user_share_limits_model->store_user_share_limit($data_to_store)){
                        $data['flash_message'] = TRUE;
                        redirect('admin/share_limit');
                    }else{
                        $data['flash_message'] = FALSE; 
                    }
                }
                //Code By Me End
            }
        }
        
        $data['userData'] = $this->users_model->get_user();
       //$data['property'] = $this->user_property_model->get_user_id($data['row']['user_id']);
        $data['propertyData'] = $this-> property_model->get_all_property_name();
        
        //load the view
        $data['main_content'] = 'admin/share_limit/add';
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
        $this->user_share_limits_model->delete_share_limit($id);
        redirect('admin/share_limit');
    }//edit

}