<?php
class Home extends CI_Controller {

  /**
    * Responsable for auto load the model
    * @return void
    */
    public function __construct()
    {
        parent::__construct();
                $this->load->model('manufacturers_model');
		$this->load->model('property_type_model');
		$this->load->model('property_model');
		$this->load->model('user_credit_model');
		$this->load->model('credit_price_model'); 
		$this->load->model('user_property_model'); 
		
		$this->load->model('user_fund_log_model');
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
    * Check if the user is logged in, if he's not, 
    * send him to the login page
    * @return void
    */	
	function index()
	{
		
		if($this->session->userdata('is_logged_in') && $this->session->userdata('type') == 'admin'){
			//redirect('admin/property');
                }
		elseif($this->session->userdata('is_logged_in') && $this->session->userdata('type') == 'user'){
			//redirect('dashboard');
		}
            $data['property'] = $this->property_model->get_property();          
            $data['property_status'] = $this->property_model->get_property_status();
	    	$data['property_baths'] = $this->property_model->get_property_baths();
	    	$data['property_beds'] = $this->property_model->get_property_beds();  
            $data['property_type'] = $this->property_type_model->get_property_type(); 
            $data['property_chart'] = $this->property_model->get_property_for_chart();
	 
	   
			$data['property_max_and_min_date'] = $this->property_model->get_property_max_and_min_date($data['property_chart'][0]['id']);
		    
		    
		      $datetime1 = date_create($data['property_max_and_min_date'][0]['min_date']);
		      $datetime2 = date_create($data['property_max_and_min_date'][0]['max_date']);
		      
		      $interval = DateInterval::createFromDateString('1 month');
		      $period   = new DatePeriod($datetime1, $interval, $datetime2);
		      
		      foreach ($period as $dt) {
			  	$all_month[]=$dt->format("Y-m");
		      }
		      foreach ($all_month as $month) {
			  	$avg_prices=$this->property_model->get_avg_price_month($month);
			  	foreach($avg_prices as $avg_price){
			  		if(!empty($avg_price['price'])){
			      		$before_price=$avg_price['price'];
			  		}else{
			      		$before_price=$before_price;
			  		}
			  		$all_price[]=$before_price;
			  	}
		      } 
	  
		      
			$data['chart_date']=$all_month;
			$data['chart_price']=$all_price;
	  
	        $data['id_chart']=$data['property_chart'][0]['id'];
			$data['next_id_chart']=$data['property_chart'][1]['id'];

			$data['sess'] = $this->session->userdata;
			$data['count_invester'] = $this->property_model->get_property_invester();
			$data['total_property'] = $this->property_model->count_property();
			$data['count_owned_property'] = $this->property_model->count_owned_property();
			$data['owned_property'] = $this->property_model->get_owned_property();
			$data['total_earning']=array();
			foreach($data['owned_property'] as $owned_property){
		    	$data['total_earning'][] = $this->property_model->get_total_earning($owned_property['id']);
		    }
			$balance=0;
			foreach($data['total_earning'] as $total_earning){
		    	$balance += $total_earning[0]['balance'];
			}
		
			$data['total_earning'] = $balance;
			$data['user_property'] = $this->property_model->get_user_property();
		
			$data['property_image']= array();
			foreach($data['user_property'] as $user_property){
				$data['property_image'][]=$this->property_model->get_property_by_id($user_property['property_id']);
	    		$rowAllProperty = $this->property_model->count_available_share($user_property['property_id']);
		    	$data['available'][$user_property['property_id']] = 100-$rowAllProperty[0]['total_property_share_in_per'];
		    	$data['sell_sold'][$user_property['property_id']] = $rowAllProperty[0]['property_share'];
		    	$data['sold'][$user_property['property_id']] = $rowAllProperty[0]['user_property_share_sell'];
		    	$data['property_id'][$user_property['property_id']] = $user_property['property_id'];			
			}
		//echo '<pre>';
		//print_r($data['user_property']); 
			// die;
		$data['property_max_price'] = intval($this->property_model->get_max_property_price());
		$data['user_property_image'] = $this->property_model->get_user_property_image();
		//echo '<pre>';
		//print_r($data['user_property_image']); die;
		$data['main_content'] = 'home/index';
		$this->load->view('includes/front/template', $data);
		
	}
        
        function about()
	{
		if($this->session->userdata('is_logged_in') && $this->session->userdata('type') == 'admin'){
			//redirect('admin/property');
                }
		elseif($this->session->userdata('is_logged_in') && $this->session->userdata('type') == 'user'){
			//redirect('dashboard');
		}
		
		
		$data = array('sess'=>$this->session->userdata);
		$data['main_content'] = 'home/about';
		$this->load->view('includes/front/template', $data);
	}
	function dashboard($tab='',$subtab='')
	{
	    
	   // echo $this->session->userdata('user_id');	 die;
		if($this->session->userdata('is_logged_in') && $this->session->userdata('type') == 'admin'){
			//redirect('admin/property');
		}
		elseif($this->session->userdata('is_logged_in') && $this->session->userdata('type') == 'user'){
			//redirect('dashboard');
		}
                if ($this->input->server('REQUEST_METHOD') === 'POST'){
                    $payment_type = $this->input->post('cash_Cheque');
                    
                    if($payment_type =='cash'){
                        $this->form_validation->set_rules('datetime', 'First name', 'required');
                        $this->form_validation->set_rules('credit', 'Credit', 'trim|required|numeric');
                        $this->form_validation->set_rules('ref_no', 'Ref No.', 'required|xss_clean');
                        $this->form_validation->set_rules('location', 'location', 'required|xss_clean');
                        //$this->form_validation->set_rules('term', 'Term & Conditions', 'required');
                        if ($this->form_validation->run() == FALSE){
                        }else{
                            $this->load->model('Users_model');
                            $user_id = $this->session->userdata('user_id');
                            $data_to_store = array(
                            //'transaction_id' => $txn_id,
                            'transaction_status' => 'Completed',
                            'amount' => $this->input->post('credit'),
                            'txn_type' => $payment_type,
                            'user_id' =>$user_id,
                            'created' => $this->input->post('datetime'));		
                            $this->Users_model->payment($data_to_store);
                            $data_log = array(
                                        'user_id' => $this->session->userdata('user_id'),
                                        'detail' => $payment_type,
                                        'fund_type' => 'Deposit',
                                        'debit' => 0,
                                        'credit' => $this->input->post('credit'),     
                           );
                            // Maintain Log
                            $this->user_fund_log_model->store_user_credit_payment($data_log);
                            $data_to_store = array(
                                    'user_id' => $this->session->userdata('user_id'),
                                    'username' => $this->session->userdata('user_name'),
                                    'credit' => $this->session->userdata('credit'),
                                    'transaction_id' => '',
                                    'transaction_status' => 'Completed',
                                    'amount' => $this->input->post('credit'),		     
                            );

                            if($query = $this->user_credit_model->store_user_credit_payment($data_to_store)){
                                $user_credit_from_payment = $this->user_credit_model->get_user_credit_from_payment();     
                                $user_id_from_payment = $this->session->userdata('user_id');
                                $credit_from_payment = $this->input->post('credit');
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
                                $data['message'] = 'Your Payment Successfully Deposit of Amount '.$this->input->post('credit'). 'MYR';
                                $data['main_content'] = 'admin/user/payment_success';
                                // $data['main_content'] = 'home/dashboard';
                                $this->load->view('includes/front/template', $data);
                            }
                        }
                        

                    }else if($data =='cheque'){
                        $this->form_validation->set_rules('datetime', 'First name', 'required|xss_clean');
                        $this->form_validation->set_rules('credit', 'Credit', 'trim|required|numeric');
                        $this->form_validation->set_rules('ref_no', 'Ref No.', 'required|xss_clean');
                        $this->form_validation->set_rules('location', 'location', 'required|xss_clean');
                        //$this->form_validation->set_rules('term', 'Term & Conditions', 'required');
                        if ($this->form_validation->run() == FALSE){
                        }else{
                            $this->load->model('Users_model');
                            $user_id = $this->session->userdata('user_id');
                            $data_to_store = array(
                            //'transaction_id' => $txn_id,
                            'transaction_status' => 'Completed',
                            'amount' => $this->input->post('credit'),
                            'txn_type' => $payment_type,
                            'user_id' =>$user_id,
                            'created' => $this->input->post('datetime'));		
                            $this->Users_model->payment($data_to_store);
                            $data_log = array(
                                        'user_id' => $this->session->userdata('user_id'),
                                        'detail' => $payment_type,
                                        'fund_type' => 'Deposit',
                                        'debit' => 0,
                                        'credit' => $this->input->post('credit'),     
                           );
                            // Maintain Log
                            $this->user_fund_log_model->store_user_credit_payment($data_log);
                            $data_to_store = array(
                                    'user_id' => $this->session->userdata('user_id'),
                                    'username' => $this->session->userdata('user_name'),
                                    'credit' => $this->session->userdata('credit'),
                                    'transaction_id' => '',
                                    'transaction_status' => 'Completed',
                                    'amount' => $this->input->post('credit'),		     
                            );

                            if($query = $this->user_credit_model->store_user_credit_payment($data_to_store)){
                                $user_credit_from_payment = $this->user_credit_model->get_user_credit_from_payment();     
                                $user_id_from_payment = $this->session->userdata('user_id');
                                $credit_from_payment = $this->input->post('credit');
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
                                $data['message'] = 'Your Payment Successfully Deposit of Amount '.$this->input->post('credit'). 'MYR';
                                $data['main_content'] = 'admin/user/payment_success';
                                // $data['main_content'] = 'home/dashboard';
                                $this->load->view('includes/front/template', $data);
                            }
                        }
                    }            
                }
		$user_id = $this->session->userdata('user_id');		
		
		$data = array('sess'=>$this->session->userdata);
		
		$data['credit_price'] =  $this->credit_price_model->get_credit_price();
//		$data['profit_and_loss_logs']=$this->user_fund_log_model->get_profit_loss_logs_by_property_id(null, $user_id);
//               echo '<pre>';
//	       print_r($data['profit_and_loss_logs']);
//	       die;
	       
		//Code by Sameer Start
	  
		$user_id = $this->session->userdata('user_id');
		
		//echo $user_id;  exit;
		$data['user_credit'] =  $this->user_credit_model->get_user__by_userid($user_id);
		$data['user_credit_payment'] =  $this->user_credit_model->get_user_credit_by_userid($user_id);
		$data['user_fund_log'] =  $this->user_fund_log_model->get_user_credit_by_userid($user_id,'desc');
		
		//Code by Sameer End
		
		$data['main_content'] = 'home/dashbord';
		  //print_r($this->session->userdata);
		//echo $user_id; die;
		$data['property_information'] = $this->property_model->get_property_information_of_users($user_id);
		//echo "<pre>"; print_r($data['property_information']); exit;
		$owned=array();
		$available=array();
		 $data['profit_and_loss_logs']=array();
		foreach($data['property_information'] as $property_information){
		    $rowAllProperty = $this->user_property_model->get_property_cal($property_information['id']);
		 $available[] = 100-$rowAllProperty['property_share_in_per'];
		 $owned[] = $rowAllProperty['property_share_in_per'];
		 $data['profit_and_loss_logs'][]=$this->user_fund_log_model->get_profit_loss_logs_by_property_id1(null, $property_information['id']);       
		}
		
		//echo '<pre>';
		//print_r($owned);
		//print_r($available);
		//die();
		$data['owned']= $owned;
		$data['available'] = $available;
        $this->load->model("news_model");
        $news = $this->news_model->find('news');
        //echo '<pre>';print_r($news);exit;
        $data['news'] = $news;
        
        $data['tab'] = $tab; // Main tab
        $data['subtab'] = $subtab;	// Sub-tab of main tab
		$this->load->view('home/dashbord', $data);
	}
	/*function dashboard()
	{
	    
	   // echo $this->session->userdata('user_id');	 die;
		if($this->session->userdata('is_logged_in') && $this->session->userdata('type') == 'admin'){
			//redirect('admin/property');
		}
		elseif($this->session->userdata('is_logged_in') && $this->session->userdata('type') == 'user'){
			//redirect('dashboard');
		}
		$user_id = $this->session->userdata('user_id');		
		
		$data = array('sess'=>$this->session->userdata);
		
		$data['credit_price'] =  $this->credit_price_model->get_credit_price();
        
		//Code by Sameer Start
	  
		$user_id = $this->session->userdata('user_id');
		
		//echo $user_id;  exit;
		$data['user_credit'] =  $this->user_credit_model->get_user__by_userid($user_id);
		$data['user_credit_payment'] =  $this->user_credit_model->get_user_credit_by_userid($user_id);
		$data['user_fund_log'] =  $this->user_fund_log_model->get_user_credit_by_userid($user_id);
		
		//Code by Sameer End
		
		$data['main_content'] = 'home/dashbord';
		  //print_r($this->session->userdata);
		//echo $user_id; die;
		$data['property_information'] = $this->property_model->get_property_information_of_users($user_id);
		//echo "<pre>"; print_r($data['property_information']); exit;
		$owned=array();
		$available=array();
		foreach($data['property_information'] as $property_information){
		    $rowAllProperty = $this->user_property_model->get_property_cal($property_information['id']);
		 $owned[] = 100-$rowAllProperty['sell'];
		 $available[] = $rowAllProperty['sell'];
		}
		//echo '<pre>';
		//print_r($owned);
		//print_r($available);
		//die();
		$data['owned']= $owned;
		$data['available'] = $available;
                $this->load->model("news_model");
                $news = $this->news_model->find('news');
                $data['news'] = $news;
		$this->load->view('home/dashbord', $data);
	}*/
        
        
    function contact()
	{
		if($this->session->userdata('is_logged_in') && $this->session->userdata('type') == 'admin'){
			//redirect('admin/property');
                }
		elseif($this->session->userdata('is_logged_in') && $this->session->userdata('type') == 'user'){
			//redirect('dashboard');
		}
		if ($this->input->server('REQUEST_METHOD') === 'POST')
          {      
            $this->form_validation->set_rules('full_name', 'Full Name', 'trim|required|xss_clean');
            $this->form_validation->set_rules('phone', 'Phone', 'required|numeric');
            $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
            $this->form_validation->set_rules('company', 'Company', 'required|xss_clean');
            $this->form_validation->set_rules('country', 'Country', 'required|xss_clean');
            $this->form_validation->set_rules('address', 'Address', 'required|xss_clean');
            $this->form_validation->set_rules('message', 'Message', 'required|xss_clean');
            $this->form_validation->set_error_delimiters('<div class="alert alert-error"><strong>', '</strong></div>');

            if ($this->form_validation->run())
            {
                
                $full_name = str_replace('"', '', $this->input->post('full_name'));
                $phone = str_replace('"', '', $this->input->post('phone'));
                $email = str_replace('"', '', $this->input->post('email'));
                $company = str_replace('"', '', $this->input->post('company'));
                $country = str_replace('"', '', $this->input->post('country'));
                $add = str_replace('"', '', $this->input->post('address'));
                $message = str_replace('"', '', $this->input->post('message'));
                
               /* $config = Array(
                     'protocol' => 'smtp',
                     'smtp_host' => 'smtp.yourdomainname.com.',
                     'smtp_port' => 465,
                     'smtp_user' => 'admin@yourdomainname.com', // change it to yours
                     'smtp_pass' => '******', // change it to yours
                     'mailtype' => 'html',
                     'charset' => 'iso-8859-1',
                     'wordwrap' => TRUE
                  ); 
                 
                  $this->load->library('email', $config);
                  $this->email->from('admin@yourdomainname.com', "Admin Team");
                  $this->email->to("test@domainname.com");
                  $this->email->cc("testcc@domainname.com");
                  $this->email->subject("This is test subject line");
                  $this->email->message("Mail sent test message...");
                   
                  $data['email_message'] = "Sorry Unable to send email..."; 
                  if($this->email->send()){     
                   $data['email_message'] = "Mail sent...";   
                  } */
                               
				$to = $email;
				$subject = "My Viko Home";
				$txt = $message;
				$headers = "From:  info@myvikohome.com" . "\r\n" .
				"CC: info@myvikohome.com";
				
				mail($to,$subject,$txt,$headers);
				$data['email_message'] = "Mail sent...";
				redirect('contact1');
			    
            }
          }
            $data = array('sess'=>$this->session->userdata);
		$data['main_content'] = 'home/contact';
		$this->load->view('includes/front/template', $data);
        }
		
	function property_investment()
	{
		if($this->session->userdata('is_logged_in') && $this->session->userdata('type') == 'admin'){
			//redirect('admin/property');
                }
		elseif($this->session->userdata('is_logged_in') && $this->session->userdata('type') == 'user'){
			//redirect('dashboard');
		}	
		$data = array('sess'=>$this->session->userdata);
		
		$data['property_topsales'] = $this->property_model->get_property_topsales();
		$data['property_toplist'] = $this->property_model->get_property_toplist();

		$data['main_content'] = 'home/property_investment';
		$this->load->view('includes/front/template', $data);
	}
	
	function property_payment()
	{
		if($this->session->userdata('is_logged_in') && $this->session->userdata('type') == 'admin'){
			//redirect('admin/property');
                }
		elseif($this->session->userdata('is_logged_in') && $this->session->userdata('type') == 'user'){
			//redirect('dashboard');
		}
		
		
		$data = array('sess'=>$this->session->userdata);
		$data['main_content'] = 'home/property_payment';
		$this->load->view('includes/front/template', $data);
	}
	
	 public function chart()
	{
	    
	            $property_id_chart= $this->input->post('propid');
	       
	            //echo $property_id_chart; 
			$data['property_max_and_min_date'] = $this->property_model->get_property_max_and_min_date($property_id_chart);
		    //print_r($data['property_max_and_min_date']); die;
		      
		      $datetime1 = date_create($data['property_max_and_min_date'][0]['min_date']);
		      $datetime2 = date_create($data['property_max_and_min_date'][0]['max_date']);
		      
		      $interval = DateInterval::createFromDateString('1 month');
		      $period   = new DatePeriod($datetime1, $interval, $datetime2);
		      
		      foreach ($period as $dt) {
			  $all_month[]=$dt->format("Y-m");
		      }
		       foreach ($all_month as $month) {
			  $avg_prices=$this->property_model->get_avg_price_month($month);
			  foreach($avg_prices as $avg_price){
			  if(!empty($avg_price['price'])){
			      $before_price=$avg_price['price'];
			  }else{
			      $before_price=$before_price;
			  }
			  $all_price[]=$before_price;
			  }
		      } 
	  
		      
			  $data['chart_date']=$all_month;
			   $data['chart_price']=$all_price;
	        $data['property_chart']=$this->property_model->get_property_by_id($property_id_chart);
		$property_next_id = $this->property_model->get_property_next_id($property_id_chart);
		$property_previous_id = $this->property_model->get_property_previous_id($property_id_chart);
		
		 	  $data['check_next_price'] = $this->property_model->get_property_max_and_min_date($property_next_id[0]['id']);
			  $data['check_previous_price'] = $this->property_model->get_property_max_and_min_date($property_previous_id[0]['id']);
	   if($data['check_next_price'][0]['max_date']==''){
	    $data['next_id_chart']=0;
	    }else{
		$data['next_id_chart']=$property_next_id[0]['id'];
	    }
	    
	      if($data['check_previous_price'][0]['max_date']==''){
	    $data['id_chart']=0;
	    }else{
		$data['id_chart']=$property_previous_id[0]['id'];
	    }
		 
	        
		//$data['next_id_chart']=$property_next_id[0]['id'];
		$this->load->view('home/chart', $data);
	}
	
	function redirect()
	{
		redirect('dashboard');
	}
}
