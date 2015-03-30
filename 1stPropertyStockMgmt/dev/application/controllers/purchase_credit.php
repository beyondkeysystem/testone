<?php
class Purchase_credit extends CI_Controller {
 
    /**
    * Responsable for auto load the model
    * @return void
    */
    public function __construct()
    {
        parent::__construct();
        $this->load->model('user_fund_log_model');
		$this->load->model('user_credit_model');
		$this->load->model('withdraw_model');
		$this->load->model('manufacturers_model');
        $this->load->model('property_type_model');
	  	$this->load->model('roles_model');
		$this->load->model('users_model');
                $this->load->model('common');
		
        $this->load->model('credit_price_model');
        $this->load->model('roles_model');
        $this -> load -> model("Emails");

         if($this->session->userdata('language')==''){
			$this->lang->load('en', 'polish');
		}
		else{
            $this->lang->load($this->session->userdata('language'), 'polish');
		}		
    }
	
	function langswitch()
    {
        $this->session->set_userdata('language',$this->uri->segment(3));
        redirect($_SERVER['HTTP_REFERER']);
    }
	
 
    /**
    * Load the main view with all the current model model's data.
    * @return void
    */
    public function index()
    {
        //load the view
        $data['credit_price'] =  $this->credit_price_model->get_credit_price();
        $data['main_content'] = 'purchase_credit';
      //  $this->load->view('includes/front/template', $data);   
    }//index
    
    public function pay_credit(){
        // echo "<pre>";print_r($this->session->all_userdata());die;
        //$instdata = array('created'=>date('Y-m-d H:i:s'));
        //$this->common->add('ref_no',$instdata);exit;
        if ($this->input->server('REQUEST_METHOD') === 'POST') {
            //echo '<pre>';print_r($_POST);exit;
           // exit;
            $credit = $this->input->post('credit');
            $payment_type = $this->input->post('payment_type');
            $datetime = $this->input->post('datetime');
            $ref_no = $this->input->post('ref_no');
            $location = $this->input->post('location');
            if((isset($payment_type) and $payment_type =='Bank') or (isset($payment_type) and $payment_type =='Cheque')){
                $instdata = array('created'=>date('Y-m-d H:i:s'));
               $ref_no_id = $this->common->add('ref_no',$instdata);
               $ref_no_val = $this->common->get_ref_no($ref_no_id);
               //print_r($ref_no_val);exit;
                $this->load->model('Users_model');
                $o_payment = array(
                    'amount'=>$credit,
                    'datetime'=>$datetime,
                    'ref_no'=>"PM".$ref_no_val->ref_no,
                    'location'=>$location,
                    'transaction_status'=>'Pending',
                    'user_id'=>$this->session->userdata('user_id'),
                    'txn_type'=>$payment_type,
                    'account_no'=>$this->input->post('account_no'),
                    'cheque_no'=>$this->input->post('cheque_no'),
                    'bank_name'=>$this->input->post('bank_name'),
                    'payee_name'=>$this->input->post('payee_name'),
                    'address'=>$this->input->post('address'),
                    'credit'=>'0',
                    'created'=>date('Y-m-d H:i:s')
                );
                $this->Users_model->payment($o_payment);
                $payment_log = array(
                        'user_id' => $this->session->userdata('user_id'),
                        'detail' => 'Transaction Pending via '.$payment_type,
                        'fund_type' => 'Deposit',
                        'debit' => 0,
                        'credit' => 0,     
                );
                $this->user_fund_log_model->store_user_credit_payment($payment_log);
                /*$data['message'] = 'Your Payment Deposit is pending of Amount '.$credit. 'MYR';
                $data['main_content'] = 'admin/user/payment_success';
                // $data['main_content'] = 'home/dashboard';
                $this->load->view('includes/front/template', $data);*/
                $success_data = array(
                    'success_amount'=>$credit
                );
                $this->session->set_userdata($success_data);
                // redirect('/purchase_credit/success_payment');
                // redirect('/dashboard#tabs-3');

                /* Mail to Admin Starts*/
                    $companyname = $this -> Emails -> GetSetting('companyname');
                    $email_to = $this -> Emails -> GetSetting('email');
                    // $email_to = "mike@mailinator.com";
                    $email = $this->session->userdata('email');
                    $username = $this->session->userdata('user_name');
                    $subject = "Notification: Amt Deposit by Client";
                    $body = "
                        $username has deposit RM $credit via $payment_type.<br/>
                        Username: $username <br/>   
                        Email: $email <br/>
                        Deposit Amt: RM $credit <br/> 
                        Payment Type: $payment_type <br/> <br/> 
                        Please visit Admin Panel for fund process. <br/> <br/> <br/> 
                           
                        Regards<br>
                        $companyname
                        ";
                    $this -> Emails -> SendMail($email_to, $subject, $body);
                /* Mail to Admin Ends*/

                redirect('dashboard#tabs-3');
            }else{
                $this->form_validation->set_rules('credit', 'Credit', 'trim|required|numeric');
                $this->form_validation->set_error_delimiters('<div class="alert alert-error"><strong>', '</strong></div>');
                $credit = str_replace('"', '', $this->input->post('credit'));
                if ($credit == 0) {
                    $data['credit_price'] = $this->credit_price_model->get_credit_price();
                    // after storing i redirect it to the controller
                    $this->session->set_userdata('message', 'Not set 0 value');
                    redirect('http://' . $_SERVER['SERVER_NAME'] . '/dashboard');
                }
                if ($this->form_validation->run() == FALSE) {
                    $data['main_content'] = 'purchase_credit';
                    $this->load->view('includes/front/template', $data);
                } else {
                    $credit_price = $this->credit_price_model->get_credit_price();
                    $credit_price = $credit_price[0]['price'];
                    // $amount_1= "".$credit_price*$credit;
                    $amount_1 = $credit;
                    $item_name_1 = "Credit";
                    $newdata = array(
                        'credit' => $credit,
                        
                        'amount'=>$credit,
                        'datetime'=>$datetime,
                        'ref_no'=>"PM".$ref_no_val->ref_no,
                        'location'=>$location,
                        'transaction_status'=>'Pending',
                        'user_id'=>$this->session->userdata('user_id'),
                        'txn_type'=>$payment_type,
                        'account_no'=>$this->input->post('account_no'),
                        'cheque_no'=>$this->input->post('cheque_no'),
                        'bank_name'=>$this->input->post('bank_name'),
                        'payee_name'=>$this->input->post('payee_name'),
                        'address'=>$this->input->post('address'),
                        'credit'=>'0',
                        'created'=>date('Y-m-d H:i:s')
                    );
                    $this->session->set_userdata($newdata);
                    redirect('http://' . $_SERVER['SERVER_NAME'] . '/dev/paid_credit?item_name_1=' . $item_name_1 . '&amount_1=' . $amount_1 . '');
                }
            }
            
        }
    }    

    
    public function paid_credit()
	{
		$data['main_content'] = 'account_credit';
		$this->load->view('includes/front/template', $data);		
	}
	
	  public function withdraw()
	{
	    
	    if ($this->input->server('REQUEST_METHOD') === 'POST')
        {
      
			$this->form_validation->set_rules('amount', 'Amount', 'trim|required|numeric');
			$this->form_validation->set_error_delimiters('<div class="alert alert-error"><strong>', '</strong></div>');
			$amount = str_replace('"', '', $this->input->post('amount'));
			$credit_price =  $this->credit_price_model->get_credit_price();
			
			//$number_of_token= number_format($amount/$credit_price[0]['price']);
                        $number_of_token= number_format($amount/$credit_price[0]['price'],2,".",".");
			$data_to_store = array(
				'user_id' => $this->session->userdata('user_id'),
				'fund_amt' => $amount,
				'number_of_token' => $number_of_token,
				'status' => 'Pending'	     
			);
			$this->withdraw_model->store_withdraw($data_to_store);
			
			$data_to_store_in_fund= array(
						      
				'user_id' => $this->session->userdata('user_id'),
				'fund_type' =>'withdraw',
                'detail'=>'Pending, Waiting for Admin Approval for Amt. '.$amount.' MYR',
				// 'detail' =>'pending',
				'debit' =>0.00,
				'credit' =>0.00,
				'property_id' =>0
						      
						      
			);
			$this->user_fund_log_model->store_user_credit($data_to_store_in_fund);
			
            $withdraw_data = array(
                'withdraw_amount'=>$amount
            );
            $this->session->set_userdata($withdraw_data);
        
			
			redirect('dashboard#tabs-3');
		
	}
	
	        
	}
	
    public function detail()
	{
		
		$user_id = $this->session->userdata('user_id');
		$data['user_credit'] =  $this->user_credit_model->get_user__by_userid($user_id);
		$data['user_credit_payment'] =  $this->user_credit_model->get_user_credit_by_userid($user_id);
		$data['main_content'] = 'credit_detail';
		$this->load->view('includes/front/template', $data);
		
	}
        
    public  function success_credit()
	{	
		if (isset($_REQUEST["txn_id"])){
		if($_REQUEST["payment_status"]=='Completed'){
                  /*  echo '<pre>';print_r($this->session->userdata);echo '</pre>';exit;
                    
		echo '<pre>';print_r($_REQUEST);echo '</pre>';
                echo '<pre>';print_r($this->input->post());echo '</pre>';*/
		$item_name_1 = str_replace('"', '', $this->input->post('item_name'));
		$this->load->model('Users_model');
                
		$txn_id = $this->input->post('txn_id');
		$transaction_status = $this->input->post('payment_status');
		$amount = $this->input->post('mc_gross');
		$txn_type = $this->input->post('payment_type');
		$payment_date = $this->input->post('payment_date');
		$user_id = $this->session->userdata('user_id');
                $datetime = $this->session->userdata('datetime');
                $ref_no = $this->session->userdata('ref_no');
                $location = $this->session->userdata('location');
                $payee_name = $this->session->userdata('payee_name');
                $address = $this->session->userdata('address');
                
                $instdata = array('created'=>date('Y-m-d H:i:s'));
                $ref_no_id = $this->common->add('ref_no',$instdata);
                $ref_no_val = $this->common->get_ref_no($ref_no_id);
                $data_to_store = array(
                        'amount' => $amount,
                        'datetime'=>$datetime,
                        'ref_no'=>"PM".$ref_no_val->ref_no,
                        'location'=>$location,
                        'transaction_status' => $transaction_status,
                        'user_id' =>$user_id,
                        'txn_type' => $txn_type,
                        'payee_name'=>$payee_name,
                        'address'=>$address,
                        'created'=>date('Y-m-d H:i:s'),
                        'transaction_id' => $txn_id,
                        //'created' => $payment_date
                        );
							
	        $this->Users_model->payment($data_to_store);

			$data_log = array(
				'user_id' => $this->session->userdata('user_id'),
				'detail' => 'Deposit via Paypal',
				'fund_type' => 'Deposit',
				'debit' => $this->input->post('mc_gross'),
				'credit' => 0,     
			);
			// Maintain Log
			$this->user_fund_log_model->store_user_credit_payment($data_log);
			
			$data_to_store = array(
				'user_id' => $this->session->userdata('user_id'),
				'username' => $this->session->userdata('user_name'),
				'credit' => $this->session->userdata('credit'),
				'transaction_id' => $this->input->post('txn_id'),
				'transaction_status' => $this->input->post('payment_status'),
				'amount' => $this->input->post('mc_gross'),		     
			);
			
			if($query = $this->user_credit_model->store_user_credit_payment($data_to_store))
			{
				
				$user_credit_from_payment = $this->user_credit_model->get_user_credit_from_payment();     
				
				$user_id_from_payment = $this->session->userdata('user_id');
				$credit_from_payment = $this->input->post('mc_gross');
				$credit_from_payment = $credit_from_payment / 10;

				$username_payment=$this->session->userdata('user_name');
				$check=$this->user_credit_model->check_user_id_from_payment($user_id_from_payment);
				if($check==""){
					$this->user_credit_model->add_user_id_from_payment($user_id_from_payment, $credit_from_payment, $username_payment); 
				}else{
				        $user_credit_user_id=$this->user_credit_model->get_user_credit_by_user_id($user_id_from_payment);
					$credit_payment= $user_credit_user_id[0]['credit'];
					$credit_from_payment= $credit_from_payment+$credit_payment;
					$this->user_credit_model->update_user_id_from_payment($user_id_from_payment, $credit_from_payment, $username_payment); 
				}
				


                /* Mail to Admin Starts*/
                    $companyname = $this -> Emails -> GetSetting('companyname');
                    $email_to = $this -> Emails -> GetSetting('email');
                    // $email_to = "mike@mailinator.com";
                    $email = $this->session->userdata('email');
                    $payment = $this->input->post('mc_gross');
                    $username = $this->session->userdata('user_name');
                    $subject = "Notification: Amt Deposit by Client";
                    $body = "
                        $username has deposit RM $payment via Paypal.<br/>
                        Username: $username <br/>   
                        Email: $email <br/>
                        Deposit Amt: RM $payment <br/> 
                        Payment Type: Paypal <br/> <br/> 
                        Please visit Admin Panel and check Success Deposit Page for details. <br/> <br/> <br/> 
                           
                        Regards<br>
                        $companyname
                        ";
                    $this -> Emails -> SendMail($email_to, $subject, $body);
                /* Mail to Admin Ends*/

                $data['message'] = 'Your Payment Successfully Deposit of Amount '.$this->input->post('mc_gross'). 'MYR. <br/> Your deposit will be process by admin as soon as possible upon we received your payment, Thank You.';
				// $data['main_content'] = 'admin/user/payment_success';
				// $data['main_content'] = 'home/dashboard';
                redirect('/purchase_credit/success_payment');
			}
			else
			{
			    $data['message'] = 'There is problem please try again';
                            $data['main_content'] = 'admin/user/payment_unsuccess';
		        $this->load->view('includes/front/template', $data);
			}
		    
		}if($_REQUEST["payment_status"]=='Pending'){
			
			$data_log = array(
				'user_id' => $this->session->userdata('user_id'),
				'detail' => 'Transaction Pending via Paypal',
				'fund_type' => 'Pending',
				'debit' => 0,
				'credit' => 0,     
			);
			// Maintain Log
			$this->user_fund_log_model->store_user_credit_payment($data_log);
			
			$data['message'] = 'Your Transaction is pending';
			$data['main_content'] = 'admin/user/payment_unsuccess';
			$this->load->view('includes/front/template', $data);
			
		}if($_REQUEST["payment_status"]=='Cancel'){
			$data_log = array(
				'user_id' => $this->session->userdata('user_id'),
				'detail' => 'Transaction Cancel via Paypal',
				'fund_type' => 'Cancel',
				'debit' => 0,
				'credit' => 0,     
			);
			// Maintain Log
			$this->user_fund_log_model->store_user_credit_payment($data_log);
			    $data['message'] = 'Your Transaction is cancel';
				$data['main_content'] = 'admin/user/payment_unsuccess';
		        $this->load->view('includes/front/template', $data);
			
		}
		}
	}
        
        public function success_payment($payment){
                $data['message'] = 'Your Payment Deposit is pending of Amount '.$payment. 'MYR';
                $data['main_content'] = 'admin/user/payment_success';
                // $data['main_content'] = 'home/dashboard';
                
                $this->load->view('includes/front/template', $data);	
        }
}
