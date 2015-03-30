<?php
class Admin_transactionfees extends CI_Controller {
 
    /**
    * Responsable for auto load the model
    * @return void
    */
    public function __construct()
    {
        parent::__construct();
        $this->load->model('transactionfees_model');
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
         $data['transactionfees'] = $this->transactionfees_model->get_transactionfees();        
              
   
        $data['main_content'] = 'admin/transactionfees/list';
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
            $this->form_validation->set_rules('amount', 'Amount', 'required|numeric');
            $this->form_validation->set_rules('percentage', 'Percentage', 'required|numeric');
            $this->form_validation->set_error_delimiters('<div class="alert alert-error"><a class="close" data-dismiss="alert">×</a><strong>', '</strong></div>');
            if ($this->form_validation->run())
            {
    
                $amount = str_replace('"', '', $this->input->post('amount'));
                $percentage = str_replace('"', '', $this->input->post('percentage'));
                $data_to_store = array(
                    'amount' => $amount,
                    'percentage' => $percentage
                );
                //if the insert has returned true then we show the flash message
                if($this->transactionfees_model->update_transactionfees($id, $data_to_store) == TRUE){
                    $this->session->set_flashdata('flash_message', 'updated');
                }else{
                    $this->session->set_flashdata('flash_message', 'not_updated');
                }
                redirect('admin/transaction_fees/update/'.$id.'');

            }//validation run

        }

        //if we are updating, and the data did not pass trough the validation
        //the code below wel reload the current data

        //product data 
        $data['transactionfees'] = $this->transactionfees_model->get_transactionfees_by_id($id);

        //load the view
        $data['main_content'] = 'admin/transactionfees/edit';
        $this->load->view('includes/template', $data);            

    }//update

    /**
    * Delete product by his id
    * @return void
    */
    public function delete()
    {
        //product id 
        $id = $this->uri->segment(4);
        $this->transactionfees_model->delete_product($id);
        redirect('admin/transactionfees');
    }//edit

}