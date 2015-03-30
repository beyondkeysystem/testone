<?php
class Admin_userinvestment extends CI_Controller {
 
    /**
    * Responsable for auto load the model
    * @return void
    */
    public function __construct()
    {
        parent::__construct();
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
        $data['user'] = $this->users_model->get_user();
        //load the view
        $data['main_content'] = 'admin/userinvestment/list';
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
            $this->form_validation->set_rules('email_addres', 'EmailAddress', 'required');
            $this->form_validation->set_rules('user_name', 'UserName', 'required');
            $this->form_validation->set_error_delimiters('<div class="alert alert-error"><a class="close" data-dismiss="alert">×</a><strong>', '</strong></div>');

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
                redirect('admin/userinvestment/update/'.$id.'');

            }//validation run

        }

        //if we are updating, and the data did not pass trough the validation
        //the code below wel reload the current data

        //product data 
        $data['user'] =  $this->users_model->get_user();
        $data['main_content'] = 'admin/userinvestment/edit';
        $this->load->view('includes/template', $data);            

    }//update

    /**
    * Delete product by his id
    * @return void
    */
    
}