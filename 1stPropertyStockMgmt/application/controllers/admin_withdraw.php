<?php
class Admin_withdraw extends CI_Controller {
 
    /**
    * Responsable for auto load the model
    * @return void
    */
    public function __construct()
    {
        parent::__construct();
        $this->load->model('withdraw_model');
         $this->load->model('user_fund_log_model');
         $this->load->model('user_credit_model');

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
        $data['withdraw'] = $this->withdraw_model->get_withdraw();
        //load the view
        $data['main_content'] = 'admin/withdraw/list';
        $this->load->view('includes/template', $data);  

    }//index

  
    public function update()
    {

  
        //if save button was clicked, get the data sent via post
        if ($this->input->server('REQUEST_METHOD') === 'POST')
        {
          //form validation
            $this->form_validation->set_rules('ids', 'Checkbox Fields', 'required');
            $this->form_validation->set_error_delimiters('<div class="alert alert-error"><a class="close" data-dismiss="alert">×</a><strong>', '</strong></div>');

            if ($this->form_validation->run())
            {
                //echo "<pre>";print_r($this->input->post());die;
                $approved_by_check=$this->input->post('approved_by_check');
                $approved_by_cash=$this->input->post('approved_by_cash');
                $cancelled=$this->input->post('cancelled');
                    $ids= $this->input->post('ids');
                   
                if($approved_by_check=="Approved By Check"){
                 
                  foreach($ids as $id){
                    $data_to_store = array(
			'status' => 'Approved By Check',    
		    );
                      
		    if($this->withdraw_model->update_withdraw($id, $data_to_store)){
                       $withdraw=$this->withdraw_model->get_withdraw_by_id($id);
                      
                     $data_log = array(
                        'user_id' => $withdraw[0]['user_id'],
                        'detail' => 'Approved by admin with cheque',
                        'fund_type' => 'Withdraw',
                        'debit' => 0.00,
                        'credit' => $withdraw[0]['fund_amt'],
                        'property_id' => $withdraw[0]['property_id']
                    );
               // Maintain Log
                if($this->user_fund_log_model->store_user_credit_payment($data_log)){
                    $user_credit=$this->user_credit_model->get_user__by_userid($withdraw[0]['user_id']);
                    $user_credit['credit']=$user_credit[0]['credit']+$withdraw[0]['number_of_token'];
                     $data_credit = array(
                        'credit' => $user_credit['credit']
          
                    );
                     $user_credit=$this->user_credit_model->update_user_credit_by_user_id( $withdraw[0]['user_id'], $data_credit);
                   }
                  }
                  }
                }
                 if($approved_by_cash=="Approved By Cash"){
                     foreach($ids as $id){
                        
                   $data_to_store = array(
				'status' => 'Approved By Cash',    
			);
			  if($this->withdraw_model->update_withdraw($id, $data_to_store)){
                       $withdraw=$this->withdraw_model->get_withdraw_by_id($id);
                      //echo "<pre>";print_r($withdraw);die;
                     $data_log = array(
                        'user_id' => $withdraw[0]['user_id'],
                        'detail' => 'Withdraw approved by admin with cash',
                        'fund_type' => 'Withdraw',
                        'debit' => 0.00,
                        'credit' => $withdraw[0]['fund_amt'],
                        'property_id' => $withdraw[0]['property_id']                
                    );
                // Maintain Log
                if($this->user_fund_log_model->store_user_credit_payment($data_log)){
                    $user_credit=$this->user_credit_model->get_user__by_userid($withdraw[0]['user_id']);
		   
                    $user_credit['credit']=$user_credit[0]['credit']-$withdraw[0]['number_of_token'];
		    
                     $data_credit = array(
                        'credit' => $user_credit['credit']
          
                    );
                     $user_credit=$this->user_credit_model->update_user_credit_by_user_id( $withdraw[0]['user_id'], $data_credit);
                   }
                  }
                  }
                }
                if($cancelled=="Cancelled"){
    
                   foreach($ids as $id){
                   
                   $data_to_store = array(
				'status' => 'Cancelled',    
			);
			  if($this->withdraw_model->update_withdraw($id, $data_to_store)){
                       $withdraw=$this->withdraw_model->get_withdraw_by_id($id);
                      
                     $data_log = array(
                        'user_id' => $withdraw[0]['user_id'],
                        'detail' => 'Withdraw '.$withdraw[0]['fund_amt'].' cancelled by admin',
                        'fund_type' => 'withdraw',
                        'debit' => 0.00,
                        'credit' => 0.00,
                        'property_id' => $withdraw[0]['property_id']                
                    );
                // Maintain Log
                $this->user_fund_log_model->store_user_credit_payment($data_log);
                    }
                  }
                }
                redirect('admin/withdraw');

            }//validation run
	    else{
		redirect('admin/withdraw?m="e"');

	    }

        }
       

    }//update
    
   //Code By Me Start
      public function withdrawadmin()
    {      
        $data['withdrawadmin'] = $this->withdraw_model->get_withdrawadmin();
        //load the view
        $data['main_content'] = 'admin/withdrawadmin/list';
        $this->load->view('includes/template', $data);  

    }//index

       //Code By Me End
    /**
    * Delete product by his id
    * @return void
    */
    
}
