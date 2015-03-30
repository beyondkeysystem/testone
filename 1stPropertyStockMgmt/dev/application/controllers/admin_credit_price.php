<?php
class Admin_credit_price extends CI_Controller {
 
    /**
    * Responsable for auto load the model
    * @return void
    */
    public function __construct()
    {
        parent::__construct();
        $this->load->model('credit_price_model');
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
         $data['credit_price'] = $this->credit_price_model->get_credit_price();        
              
   
        $data['main_content'] = 'admin/credit_price/list';
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
             $this->form_validation->set_rules('price', 'Price', 'required');
            $this->form_validation->set_error_delimiters('<div class="alert alert-error"><a class="close" data-dismiss="alert">×</a><strong>', '</strong></div>');
            if ($this->form_validation->run())
            {
    
                $credit = str_replace('"', '', $this->input->post('credit'));
                $price = str_replace('"', '', $this->input->post('price'));
                $data_to_store = array(
                    'credit' => $credit,
                    'price' => $price
                );
                //if the insert has returned true then we show the flash message
                if($this->credit_price_model->update_credit_price($id, $data_to_store) == TRUE){
                    $this->session->set_flashdata('flash_message', 'updated');
                }else{
                    $this->session->set_flashdata('flash_message', 'not_updated');
                }
                redirect('admin/credit_price/update/'.$id.'');

            }//validation run

        }

        //if we are updating, and the data did not pass trough the validation
        //the code below wel reload the current data

        //product data 
        $data['credit_price'] = $this->credit_price_model->get_credit_price_by_id($id);

        //load the view
        $data['main_content'] = 'admin/credit_price/edit';
        $this->load->view('includes/template', $data);            

    }//update


      public function add()
    {
        //if save button was clicked, get the data sent via post
        if ($this->input->server('REQUEST_METHOD') === 'POST')
        {

            //form validation
             $this->form_validation->set_rules('price', 'Price', 'required');
            $this->form_validation->set_error_delimiters('<div class="alert alert-error"><a class="close" data-dismiss="alert">×</a><strong>', '</strong></div>');
            

            //if the form has passed through the validation
            if ($this->form_validation->run())
            {
                $price = str_replace('"', '', $this->input->post('price'));
                $data_to_store = array(
                    'credit' => $credit,
                    'price' => $price
                );
                //if the insert has returned true then we show the flash message
                if($this->credit_price_model->store_credit_price($data_to_store)){
                    $data['flash_message'] = TRUE; 
                }else{
                    $data['flash_message'] = FALSE; 
                }

            }

        }
        //load the view
        $data['main_content'] = 'admin/credit_price/add';
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
        $this->credit_price_model->delete_credit_price($id);
        redirect('admin/credit_price');
    }//edit

}