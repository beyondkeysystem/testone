<?php
class Admin_roles extends CI_Controller {
 
    /**
    * Responsable for auto load the model
    * @return void
    */
    public function __construct()
    {
        parent::__construct();
        $this->load->model('roles_model');

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
        $data['roles'] = $this->roles_model->get_roles();        
        //load the view
        $data['main_content'] = 'admin/roles/list';
        $this->load->view('includes/template', $data);  

    }//index

  
    public function update()
    {
    $id = $this->uri->segment(4);
  
        //if save button was clicked, get the data sent via post
        if ($this->input->server('REQUEST_METHOD') === 'POST')
        {
          //form validation
            $this->form_validation->set_rules('charges', 'Charges', 'required|numeric');
            $this->form_validation->set_error_delimiters('<div class="alert alert-error"><a class="close" data-dismiss="alert">x</a><strong>', '</strong></div>');
            if ($this->form_validation->run())
            {
           
    
              
                    $data_to_store = array(
                    'charges' => $this->input->post('charges')
                );
                //if the insert has returned true then we show the flash message
                if($this->roles_model->update_roles($id, $data_to_store) == TRUE){
                    $this->session->set_flashdata('flash_message', 'updated');
                }else{
                    $this->session->set_flashdata('flash_message', 'not_updated');
                }
           
                redirect('admin/roles/update/'.$id.'');
             }

        }

        //if we are updating, and the data did not pass trough the validation
        //the code below wel reload the current data

        //product data 
        $data['roles'] = $this->roles_model->get_roles_by_id($id);
        //load the view
        $data['main_content'] = 'admin/roles/edit';
        $this->load->view('includes/template', $data);           

    }//update

    /**
    * Delete product by his id
    * @return void
    */
    
}