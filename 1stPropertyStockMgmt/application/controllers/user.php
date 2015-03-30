<?php

class User extends CI_Controller {

    /**
    * Responsable for auto load the model
    * @return void
    */
    public function __construct()
    {
        parent::__construct();
        $this->load->model('common');
        $this->load->model('manufacturers_model');
        $this->load->model('property_type_model');
	  	$this->load->model('roles_model');
	  	$this->load->model('Users_model');
	    $this->load->model('property_model');
		$this->load->library('form_validation');
        $this -> load -> model("Emails");
        
        if($this->session->userdata('language')==''){
			$this->lang->load('en', 'polish');
		}
		else{
            $this->lang->load($this->session->userdata('language'), 'polish');
		}
    }
	
    /**
    * Check if the user is logged in, if he's not, 
    * send him to the login page
    * @return void
    */	
	function index()
	{
		if($this->session->userdata('is_logged_in') && $this->session->userdata('type') == 'admin'){
			redirect('admin/property');
        }
		elseif($this->session->userdata('is_logged_in') && $this->session->userdata('type') == 'user'){
			redirect('dashboard');
		}
		else{
        	redirect('home');
        }
	}
	
	function admin()
	{
		if($this->session->userdata('is_logged_in') && $this->session->userdata('type') == 'admin'){
			redirect('admin/property');
        }
		else{
        	$this->load->view('admin/login');
        }
	}

    /**
    * encript the password 
    * @return mixed
    */	
    function __encrip_password($password) {
        return md5($password);
    }



    /**
    * check the username and the password with the database
    * @return void
    */
	function validate_credentials_admin()
	{	
		$this -> form_validation -> set_rules('password', 'Password', 'trim|required|alpha_numeric');
		$this -> form_validation -> set_rules('user_name', 'Username', 'trim|required|max_length[30]|alpha_numeric');

		if ($this -> form_validation -> run() == FALSE)
		{
			$this->load->view('admin/login', $data);	
		}
else{
		$user_name = $this->input->post('user_name');
		$password = $this->__encrip_password($this->input->post('password'));
		$is_valid = $this->Users_model->validate($user_name, $password);

		if(is_array($is_valid))
		{
			$data = array(
				'user_name' => $user_name,
				'is_logged_in' => true,
				'type' => $is_valid['type'],
				'user_image' => $is_valid['user_image'],
				'user_id' => $is_valid['id']
			);
			
			$this->session->set_userdata($data);
			
			if($this->session->userdata('is_logged_in') && $this->session->userdata('type') == 'admin'){
				redirect('admin/property');
			}
			elseif($this->session->userdata('is_logged_in') && $this->session->userdata('type') == 'user'){
				redirect('dashboard/');
			}			
		}
		else // incorrect username or password
		{
			$data['message_error'] = TRUE;
			$this->load->view('admin/login', $data);	
		}
	}
}

 /**
    * check the username and the password with the database
    * @return void
    */
	function validate_credentials()
	{	
		$user_name = $this->input->post('user_name');
		$password = $this->__encrip_password($this->input->post('password'));

		$is_valid = $this->Users_model->validate($user_name, $password);
                //echo '1';
		//echo '<pre>';print_r($is_valid);exit;
	    if(isset($is_valid['is_active']) and $is_valid['is_active'] == '0'){
	        echo "3";exit;
	    }
	    
	    if(isset($is_valid['is_login']) and $is_valid['is_login'] == '0'){
	        echo "4";exit;
	    }
		
		if(is_array($is_valid))
		{
            $save_data = array(
                'last_login'=>date('Y-m-d H:i:s')
            );
            $this->load->model('common');
            $this->common->edit('membership',$save_data,$is_valid['id']);
			$data = array(
				'user_name' => $user_name,
				'is_logged_in' => true,
				'type' => $is_valid['type'],
				'role' => $is_valid['role'],
				'user_id' => $is_valid['id'],
				'email' => $is_valid['email'],
				'user_image' => $is_valid['user_image']				
			);
			
			$this->session->set_userdata($data);
			
			if($this->session->userdata('is_logged_in') && $this->session->userdata('type') == 'admin'){
				echo "2";
			}
			/*elseif($this->session->userdata('is_logged_in') && $this->session->userdata('type') == 'user'){
				redirect('dashboard/');
			}*/			
		}
		else // incorrect username or password
		{
			echo "1";
			/*$data['message_error'] = TRUE;
			$this->load->view('admin/login', $data);	*/
		}
	}
	
	
	
	
	function validate_credentials_user()
	{	

		$this->load->model('Users_model');

		$user_name = $this->input->post('user_name');
                
		$password = $this->__encrip_password($this->input->post('password'));

		$is_valid = $this->Users_model->validate($user_name, $password);
		
		if(is_array($is_valid))
		{
			$data = array(
				'user_name' => $user_name,
				'is_logged_in' => true,
				'type' => $is_valid['type'],
				'role' => $is_valid['role'],
				'user_id' => $is_valid['id'],
				'email' => $is_valid['email'],
				'user_image' => $is_valid['user_image']
			);
			
			$this->session->set_userdata($data);
			
			if($this->session->userdata('is_logged_in') && $this->session->userdata('type') == 'admin'){
				redirect('admin/property');
			}
			elseif($this->session->userdata('is_logged_in') && $this->session->userdata('type') == 'user'){
				redirect('dashboard/');
			}			
		}
		else // incorrect username or password
		{
			$data['roles'] = $this->roles_model->get_roles();  
			$data['message'] = 'Login Detail are Incorrect';
			$data['main_content'] = 'admin/user/register';
			$this->load->view('includes/front/template', $data);	
		}
	}	

    /**
    * The method just loads the signup view for admin
    * @return void
    */
	function signup()
	{
		$this->load->view('admin/signup_form');	
	}
	
    /**
    * The method just loads the register view for frontend
    * @return void
    */
	function register()
	{
	 	// field name, error message, validation rules
		$this->form_validation->set_rules('first_name', 'Name', 'trim|required|alpha');
		$this->form_validation->set_rules('last_name', 'Last Name', 'trim|required|alpha');
		$this->form_validation->set_rules('email_address', 'Email Address', 'trim|required|valid_email');
		$this->form_validation->set_rules('username', 'Username', 'trim|required|min_length[4]|alpha_numeric');
		$this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[4]|max_length[32]|alpha_numeric');
		$this->form_validation->set_rules('password2', 'Password Confirmation', 'trim|required|matches[password]|alpha_numeric');
		$this->form_validation->set_error_delimiters('<div class="alert alert-error"><a class="close" data-dismiss="alert">×</a><strong>', '</strong></div>');
		$data['main_content'] = 'admin/user/register';
		$data['roles'] = $this->roles_model->get_roles();       
		$this->load->view('includes/front/template', $data);
	}
	
	
	
	function my_profile()
	{
		
	    $user_id = $this->session->userdata('user_id');
		
        //if save button was clicked, get the data sent via post
        if ($this->input->server('REQUEST_METHOD') === 'POST')
        {
			$user_detail = $this->Users_model->get_user_by_id($user_id);
			$old_password =  $user_detail[0]['pass_word'];
			// pr($user_detail);die;

			$password = str_replace('"', '', $this->input->post('password'));
			// echo md5($this->input->post('old_user_password'));die;


            $this->form_validation->set_rules('fname', 'First Name', 'trim|required|alpha|xss_clean');
	      	$this->form_validation->set_rules('lname', 'Last Name', 'trim|required|alpha|xss_clean');
            $this->form_validation->set_rules('phone', 'Phone', 'xss_clean');
            $this->form_validation->set_rules('address', 'Address', 'xss_clean');
            $this->form_validation->set_rules('postalcode', 'Postal/Zip Code', 'xss_clean');
            $this->form_validation->set_rules('country', 'Country', 'xss_clean');
            $this->form_validation->set_rules('occupation', 'Occupation', 'xss_clean');
            $this->form_validation->set_rules('city', 'City', 'xss_clean');
            $this->form_validation->set_rules('state', 'State', 'xss_clean');
            $this->form_validation->set_rules('old_user_password', 'Old Password', 'alpha_numeric|callback_check_reset_password');
            $this->form_validation->set_rules('password', 'New Password', 'trim|alpha_numeric|xss_clean');
            $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
            

            $this->form_validation->set_error_delimiters('<div class="alert alert-error"><a class="close" data-dismiss="alert">×</a><strong>', '</strong></div>');

            if ($this->form_validation->run())
            {
                $config5['upload_path'] = './uploads/';
				$config5['allowed_types'] = 'gif|jpg|png';
				$config5['max_size']	= '1000';
				$config5['max_width']  = '500';
				$config5['max_height']  = '500';
                
                $this->load->library('upload', $config5);
               	if ( !$this->upload->do_upload())
				{
		    
					$error = array('error' => $this->upload->display_errors());       
               		$files_url =  str_replace('"', '', $this->input->post('old_image'));
               		$add = str_replace('"', '', $this->input->post('address'));
               		$postalcode = str_replace('"', '', $this->input->post('postalcode'));
               		$country = str_replace('"', '', $this->input->post('country'));
                	$fname = str_replace('"', '', $this->input->post('fname'));
					$lname = str_replace('"', '', $this->input->post('lname'));
                	$phone = str_replace('"', '', $this->input->post('phone'));
	                $state = str_replace('"', '', $this->input->post('state'));
	                $city = str_replace('"', '', $this->input->post('city'));
	                $email = str_replace('"', '', $this->input->post('email'));
	                $occupation = str_replace('"', '', $this->input->post('occupation'));
	        		$password = str_replace('"', '', $this->input->post('password'));

					if(empty($password)){
		    			$password = $old_password;
		    			$data_to_store = array(
						    'first_name' => $fname,
						    'last_name' => $lname,
						    'email_addres' => $email,
						    'pass_word' => $password,
						    'telephone' => $phone,
						    'city_suburb' =>  $city,
						    'postal_code' => $postalcode,
						    'occupational_status' => $occupation,
						    'address' => $add,
						    'state' => $state,
						    'country' => $country,
						    'img_path' => $files_url
						);
					}else{
					    $data_to_store = array(
						    'first_name' => $fname,
						    'last_name' => $lname,
						    'email_addres' => $email,
						    'pass_word' => md5($password),
						    'telephone' => $phone,
						    'city_suburb' =>  $city,
						    'postal_code' => $postalcode,
						    'occupational_status' => $occupation,
						    'address' => $add,
						    'state' => $state,
						    'country' => $country,
						    'img_path' => $files_url
						);
					}

	                //if the insert has returned true then we show the flash message
	                if($this->Users_model->update_user($user_id, $data_to_store) == TRUE){
	                    $this->session->set_flashdata('flash_message', 'updated');
	                
	                }else{
	                    $this->session->set_flashdata('flash_message', 'not_updated');
	                
	                }
					
                	$data['user_information'] = $this->Users_model->get_user_by_id($user_id);
					$data['main_content'] = 'home/my_profile';
					$this->load->view('includes/front/template', $data);
				}
				else
				{
		    
					$upload_data =  $this->upload->data();
		
					if(isset($upload_data['full_path'])){
                       	$files_url = explode("uploads", $upload_data['full_path']); 
                   	 	$files_url = explode("/", $files_url[1]);
			 			$this->session->set_userdata('user_image', $files_url[1]);
                		$add = str_replace('"', '', $this->input->post('address'));
               			$postalcode = str_replace('"', '', $this->input->post('postalcode'));
               			$country = str_replace('"', '', $this->input->post('country'));
                		$fname = str_replace('"', '', $this->input->post('fname'));
						$lname = str_replace('"', '', $this->input->post('lname'));
		                $phone = str_replace('"', '', $this->input->post('phone'));
		                $state = str_replace('"', '', $this->input->post('state'));
		                $city = str_replace('"', '', $this->input->post('city'));
                 		$email = str_replace('"', '', $this->input->post('email'));
                 		$occupation = str_replace('"', '', $this->input->post('occupation'));
	        			$password = str_replace('"', '', $this->input->post('password'));
						if(empty($password)){
		    				$password = str_replace('"', '', $this->input->post('old_password'));
		    				$data_to_store = array(
							    'first_name' => $fname,
							    'last_name' => $lname,
							    'email_addres' => $email,
							    'pass_word' => $password,
							    'telephone' => $phone,
							    'city_suburb' =>  $city,
							    'postal_code' => $postalcode,
							    'occupational_status' => $occupation,
							    'address' => $add,
							    'state' => $state,
							    'country' => $country,
							    'img_path' => $files_url[1]
							);
						}else{
						    $data_to_store = array(
							    'first_name' => $fname,
							    'last_name' => $lname,
							    'email_addres' => $email,
							    'pass_word' => md5($password),
							    'telephone' => $phone,
							    'city_suburb' =>  $city,
							    'postal_code' => $postalcode,
								'occupational_status' => $occupation,
								'address' => $add,
								'state' => $state,
								'country' => $country,
								'img_path' => $files_url[1]
							);
						}

		                //if the insert has returned true then we show the flash message
		                if($this->Users_model->update_user($id, $data_to_store) == TRUE){
		                    $this->session->set_flashdata('flash_message', 'updated');
		                }else{
		                    $this->session->set_flashdata('flash_message', 'not_updated');
		                }
		                // redirect('my_profile/'.$id.'');
		               
		            	$data['user_information'] = $this->Users_model->get_user_by_id($user_id);
						$data['main_content'] = 'home/my_profile';   
						$this->load->view('includes/front/template', $data);
		            }
		        }

            }//validation run
	    	else{
						$data['user_information'] = $this->Users_model->get_user_by_id($user_id);
						$data['main_content'] = 'home/my_profile';   
						$this->load->view('includes/front/template', $data);
		 		// redirect('my_profile/'.$id.'');
	    	}
	    }

		// print_r($this->session->all_userdata());die;
		if($user_id){
			$data['user_information'] = $this->Users_model->get_user_by_id($user_id);
			$data['main_content'] = 'home/my_profile';   
			$this->load->view('includes/front/template', $data);			
		}else{
			redirect("home");
		}

        //if we are updating, and the data did not pass trough the validation
        //the code below wel reload the current data

        //product data 
       
        // $data['main_content'] = 'admin/company_information/edit';
        // $this->load->view('includes/template', $data);

	}
	
	public function _check_phone($phone)
    {
           if(preg_match('/^([0-9]( |-)?)?(\(?[0-9]{3}\)?|[0-9]{3})( |-)?([0-9]{3}( |-)?[0-9]{4}|[a-zA-Z0-9]{7})$/',$phone))
            {
                return true;
            } else {
                    $this->form_validation->set_message('_check_phone', '%s '.$phone.' is invalid format');
                    return false;
            }
    }
	
	function account()
	{
	  
		$this->load->library('form_validation');
		
		// field name, error message, validation rules
		
		// field name, error message, validation rules
		$this->form_validation->set_rules('fname', 'First Name', 'trim|required|alpha');
		$this->form_validation->set_rules('lname', 'Last Name', 'trim|required|alpha');
		$this->form_validation->set_rules('ic_number', 'Ic Number', 'trim|required|numeric');
		$this->form_validation->set_rules('phone', 'Phone number', 'trim|xss_clean|required|callback__check_phone|xss_clean');
		$this->form_validation->set_rules('address', 'Address', 'required|xss_clean');
		$this->form_validation->set_rules('postalcode', 'Postalcode', 'trim|required|numeric');
		$this->form_validation->set_rules('city', 'City', 'trim|required|xss_clean');
		$this->form_validation->set_rules('state', 'State', 'trim|required|xss_clean');
		$this->form_validation->set_rules('country', 'Country', 'trim|required|xss_clean');
		$this->form_validation->set_rules('occupation', 'Occupation', 'trim|required|xss_clean');
		$this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email|is_unique[membership.email_addres]');
		$this->form_validation->set_rules('username', 'Username', 'trim|required|alpha_dash');
		$this->form_validation->set_rules('roles', 'Roles', 'trim|required|xss_clean');
		$this->form_validation->set_rules('password', 'Password', 'trim|required|xss_clean');
		$this->form_validation->set_rules('terms', 'Terms', 'required');
		$this->form_validation->set_error_delimiters('<div class="alert alert-error"><a class="close" data-dismiss="alert">×</a><strong>', '</strong></div>');
		
		if($this->input->post('roles') > 0){
			$this->form_validation->set_rules('payment_method', 'Payment Method', 'trim|required');
		}
		
		if($this->input->post('payment_type') == 'bank'){
			$this->form_validation->set_rules('datetime', 'Payment Time', 'required');
			$this->form_validation->set_rules('bank_name', 'Bank Name', 'required|xss_clean');
			$this->form_validation->set_rules('account_no', 'Account Number', 'required|alpha_numeric');
			$this->form_validation->set_rules('location', 'Payment Location', 'required|xss_clean');
		}

		if($this->form_validation->run() == FALSE)
		{
			$data['message'] = 'Validation Error';
			$data['roles'] = $this->roles_model->get_roles();  
			$data['main_content'] = 'admin/user/register';
		        $this->load->view('includes/front/template', $data);
		}
		
		else
		{			
		    $this->load->model('Users_model');
			$fname = str_replace('"', '', $this->input->post('fname'));
			$lname = str_replace('"', '', $this->input->post('lname'));
			$ic_number = str_replace('"', '', $this->input->post('ic_number'));
			$phone = str_replace('"', '', $this->input->post('phone'));
			$address = str_replace('"', '', $this->input->post('address'));
			$postalcode = str_replace('"', '', $this->input->post('postalcode'));
			$city = str_replace('"', '', $this->input->post('city'));
			$state = str_replace('"', '', $this->input->post('state'));
			$country = str_replace('"', '', $this->input->post('country'));
			$occupation = str_replace('"', '', $this->input->post('occupation'));
			$email = str_replace('"', '', $this->input->post('email'));
			$username = str_replace('"', '', $this->input->post('username'));
			$password = str_replace('"', '', $this->input->post('password'));
			$pay = str_replace('"', '', $this->input->post('pay'));
			$income = str_replace('"', '', $this->input->post('income'));
			$range = str_replace('"', '', $this->input->post('range'));
			$terms = str_replace('"', '', $this->input->post('terms'));
			$item_name_1 = str_replace('"', '', $this->input->post('item_name_1'));
			$payment_method = str_replace('"', '', $this->input->post('payment_method'));
			$payment_type = str_replace('"', '', $this->input->post('payment_type'));
			

			if($payment_type == 'bank'){
				$datetime = str_replace('"', '', $this->input->post('datetime'));
				$bank_name = str_replace('"', '', $this->input->post('bank_name'));
				$account_no = str_replace('"', '', $this->input->post('account_no'));
				$location = str_replace('"', '', $this->input->post('location'));
			}

			if($this->Users_model->check_user($username) == false)
			{
				$data['message'] = 'Username is already exist';
				$data['main_content'] = 'admin/user/register';
				$data['roles'] = $this->roles_model->get_roles();       
				$this->load->view('includes/front/template', $data);
				redirect('register?m=1');
			}
			$amount_1 = str_replace('"', '', $this->input->post('amount_1'));
		  	// $amount=explode('$', $this->input->post('amount_1'));
		   
		   	$amount=$amount_1; 
			   
			if($amount==0 || $payment_type == 'bank')
			{
				$data_to_store = array(
				    'first_name' => $fname,
				    'last_name' => $lname,
				    'email_addres' => $email,
				    'user_name' => $username,
				    'pass_word' => md5($password),
				    'telephone' => $phone,
				    'city_suburb' =>  $city,
				    'postal_code' => $postalcode,
				    'occupational_status' => $occupation,
				    'address' => $address,
				    'state' => $state,
				    'country' => $country,
				    'ic_number' => $ic_number,
				    'pay' => $pay,
				    'total_income' => $income,
				    'range' => $range,
				    'terms' => $terms,
				    'role' => $item_name_1,
				);

				if($query = $this->Users_model->register_member($data_to_store))
				{

			 				if($payment_type == 'bank'){
								$data_to_store1 = array(
									'transaction_id' => '',
									'transaction_status' => 'Pending',
									'amount' => $this->input->post('payment_gross'),
									'txn_type' => $item_name_1.'_'.$payment_type,
									'user_id' => $this->db->insert_id(),
									'created' => date('Y-m-d H:i:s'),
									'payee_name' => $fname,
									'address' => $address,
									'location' => $location,
									'bank_name' => $bank_name,
									'datetime' => $datetime,
									'account_no' => $account_no,
								);
							}else{
								$data_to_store1 = array(
									'transaction_id' => '',
									'transaction_status' => 'Pending',
									'amount' => $this->input->post('payment_gross'),
									'txn_type' => $item_name_1,
									'user_id' => $this->db->insert_id(),
									'created' => date('Y-m-d H:i:s'),
									'payee_name' => $fname,
									'address' => $address,
								);
							}

				        $this->Users_model->payment($data_to_store1);

				        /* Mail to Admin Starts*/
		                    $companyname = $this -> Emails -> GetSetting('companyname');
		                    $email_to = $this -> Emails -> GetSetting('email');
		                    // $email_to = "mike@mailinator.com";
		                    $payment = $this->input->post('mc_gross');
		                    $username = $username;
		                    $subject = "Notification: User Registered";
		                    $body = "
		                        $fname $lname has Registered as $item_name_1 via Bank.<br/>
		                        Username: $username <br/>   
		                        Email: $email <br/>
		                        Role: $item_name_1 <br/> 
		                        Payment Type: Bank <br/> <br/> 
		                        Please visit Admin Panel and check Pending User Page. <br/> <br/> <br/> 
		                           
		                        Regards<br>
		                        $companyname
		                        ";
		                    $this -> Emails -> SendMail($email_to, $subject, $body);
		                /* Mail to Admin Ends*/

						$data['message'] = 'You are successfullly registered <br/> Your deposit will be process by admin as soon as possible upon we received your payment, Thank You';
						$data['main_content'] = 'admin/user/payment_success';
						$this->load->view('includes/front/template', $data);	
                        redirect('/registration_success?n=1');
				}
				else
				{
					$data['message'] = 'There is problem please try again';
					$data['main_content'] = 'admin/user/payment_unsuccess';
					$this->load->view('includes/front/template', $data);		
				}
        	} else{
				
				$newdata = array(
					'pay_first_name'  => $fname,
					'pay_last_name'  => $lname,
					'pay_email' => $email,
					'pay_username' => $username,
					'pay_password' => $password,
					'pay_telephone' => $phone,
					'pay_city_suburb' =>  $city,
					'pay_postal_code' => $postalcode,
					 'pay_occupational' => $occupation,
					 'pay_address' => $address,
					 'pay_city' => $city,
					 'pay_state' => $state,
					 'pay_country' => $country,
					 'pay_ic_number' => $ic_number,
					 'pay_pay' => $pay,
					 'pay_income' => $income,
					'pay_range' => $range,
					'pay_terms' => $terms,
				    );
					$this->session->set_userdata($newdata);
					// echo 'http://myviko.pd.cisinlive.com/paid?fname='.$fname.'&lname='.$lname.'&ic_number='.$ic_number.'&phone='.$phone.'&address='.$address.'&postalcode='.$postalcode.'&city='.$city.'&state='.$state.'&country='.$country.'&email='.$email.'&occupation='.$occupation.'&username='.$username.'&password='.$password.'&income='.$income.'&range='.$range.'&item_name_1='.$item_name_1.'&amount_1='.$amount_1.'';die;
					redirect('http://myviko.pd.cisinlive.com/paid?fname='.$fname.'&lname='.$lname.'&ic_number='.$ic_number.'&phone='.$phone.'&address='.$address.'&postalcode='.$postalcode.'&city='.$city.'&state='.$state.'&country='.$country.'&email='.$email.'&occupation='.$occupation.'&username='.$username.'&password='.$password.'&income='.$income.'&range='.$range.'&item_name_1='.$item_name_1.'&amount_1='.$amount_1.'');   
					exit();
				}
			}
		}
	
	function paid()
	{
	    $data['main_content'] = 'admin/user/account';
		$this->load->view('includes/front/template', $data);
		
	}
	
	function success()
	{
	
		
		if (isset($_REQUEST["txn_id"])){
		if($_REQUEST["payment_status"]=='Completed'){
			
		$this->load->model('Users_model');
		$item_name_1 = str_replace('"', '', $this->input->post('item_name'));
		$fname = str_replace('"', '', $this->session->userdata('pay_first_name'));
        $lname = str_replace('"', '', $this->session->userdata('pay_last_name'));
        $ic_number = str_replace('"', '', $this->session->userdata('pay_ic_number'));
        $phone = str_replace('"', '', $this->session->userdata('pay_telephone'));
        $address = str_replace('"', '', $this->session->userdata('pay_address'));
        $postalcode = str_replace('"', '', $this->session->userdata('pay_postal_code'));
        $city = str_replace('"', '', $this->session->userdata('pay_city'));
        $state = str_replace('"', '', $this->session->userdata('pay_state'));
        $country = str_replace('"', '', $this->session->userdata('pay_country'));
        $occupation = str_replace('"', '', $this->session->userdata('pay_occupational'));
        $email = str_replace('"', '', $this->session->userdata('pay_email'));
        $username = str_replace('"', '', $this->session->userdata('pay_username'));
        $password = str_replace('"', '', $this->session->userdata('pay_password'));
		$pay = str_replace('"', '', $this->session->userdata('pay_pay'));
		$income = str_replace('"', '', $this->session->userdata('pay_income'));
		$range = str_replace('"', '', $this->session->userdata('pay_range'));
		$terms = str_replace('"', '', $this->session->userdata('pay_terms'));
		$data_to_store = array(
				'first_name' => $fname,
				'last_name' => $lname,
				'email_addres' => $email,
				'user_name' => $username,
				'pass_word' => md5($password),
				'telephone' => $phone,
				'city_suburb' =>  $city,
				'postal_code' => $postalcode,
				'occupational_status' => $occupation,
				'address' => $address,
				'state' => $state,
				'country' => $country,
				'ic_number' => $ic_number,
				'pay' => $pay,
				'total_income' => $income,
			    'range' => $range,
			    'terms' => $terms,
			    'role' => $item_name_1, 
            );

			
			if($query = $this->Users_model->register_member($data_to_store))
			{
				       
					
					 $data_to_store1 = array(
							'transaction_id' => $this->input->post('txn_id'),
							'transaction_status' => $this->input->post('payment_status'),
							'amount' => $this->input->post('payment_gross'),
							'txn_type' => $item_name_1,
							'user_id' => $this->db->insert_id(),
							'created' => $this->input->post('payment_date'),
							 
						    );

					        $this->Users_model->payment($data_to_store1);
			               
					        /* Mail to Admin Starts*/
		                    $companyname = $this -> Emails -> GetSetting('companyname');
		                    $email_to = $this -> Emails -> GetSetting('email');
		                    // $email_to = "mike@mailinator.com";
		                    $payment = $this->input->post('mc_gross');
		                    // $username = $username;
		                    $subject = "Notification: User Registered";
		                    $body = "
		                        $fname $lname has Registered as $item_name_1 via Paypal.<br/>
		                        Username: $username <br/>   
		                        Email: $email <br/>
		                        Role: $item_name_1 <br/> 
		                        Payment Type: Paypal <br/> <br/> 
		                        Please visit Admin Panel and check Pending User Page. <br/> <br/> <br/> 
		                           
		                        Regards<br>
		                        $companyname
		                        ";
		                    $this -> Emails -> SendMail($email_to, $subject, $body);
		                /* Mail to Admin Ends*/

			                $data['message'] = 'You are successfullly registered';
							$data['main_content'] = 'admin/user/payment_success';
		                        

	                        $this->load->view('includes/front/template', $data);
                            redirect('/registration_success?n=1');
			}
			else
			{
			        $data['message'] = 'There is problem please try again';
				$data['main_content'] = 'admin/user/payment_unsuccess';
		                 $this->load->view('includes/front/template', $data);		
			}
		    
		}if($_REQUEST["payment_status"]=='Pending'){
			
			      $data['message'] = 'Your Transaction is pending';
				$data['main_content'] = 'admin/user/payment_unsuccess';
		                 $this->load->view('includes/front/template', $data);
			
		}if($_REQUEST["payment_status"]=='Cancel'){
			
			      $data['message'] = 'Your Transaction is cancel';
				$data['main_content'] = 'admin/user/payment_unsuccess';
		                 $this->load->view('includes/front/template', $data);
			
		}
		}
	}
	
	
	
	function normal()
	{	
		$this->load->library('form_validation');
		
		// field name, error message, validation rules
		$this->form_validation->set_rules('fname', 'First Name', 'trim|required|alpha');
		$this->form_validation->set_rules('lname', 'Last Name', 'trim|required|alpha');
		$this->form_validation->set_rules('ic_number', 'Ic Number', 'trim|required|alpha_numeric');
		$this->form_validation->set_rules('phone', 'Phone', 'trim|required|min_length[4]|alpha_numeric');
		$this->form_validation->set_rules('address', 'Address', 'trim|required||xss_clean');
		$this->form_validation->set_rules('postalcode', 'Postalcode', 'trim|required|alpha_numeric');
		$this->form_validation->set_rules('city', 'City', 'trim|required|xss_clean');
		$this->form_validation->set_rules('state', 'State', 'trim|required|xss_clean');
		$this->form_validation->set_rules('country', 'Country', 'trim|required|xss_clean');
		$this->form_validation->set_rules('occupation', 'Occupation', 'trim|required|xss_clean');
		$this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
		$this->form_validation->set_rules('username', 'Username', 'trim|required|alpha_numeric');
		$this->form_validation->set_rules('password', 'Password', 'trim|required|alpha_numeric');
		$this->form_validation->set_error_delimiters('<div class="alert alert-error"><a class="close" data-dismiss="alert">×</a><strong>', '</strong></div>');
		
		if($this->form_validation->run() == FALSE)
		{
			$data['message'] = 'Validation Error';
			 $data['roles'] = $this->roles_model->get_roles();  
			$data['main_content'] = 'admin/user/register';
		        $this->load->view('includes/front/template', $data);
		}
		
		else
		{			
		
		
		
			
			$this->load->model('Users_model');
			 $fname = str_replace('"', '', $this->input->get('fname'));
			$lname = str_replace('"', '', $this->input->get('lname'));
			$ic_number = str_replace('"', '', $this->input->get('ic_number'));
			$phone = str_replace('"', '', $this->input->get('phone'));
			$address = str_replace('"', '', $this->input->get('address'));
			$postalcode = str_replace('"', '', $this->input->get('postalcode'));
			$city = str_replace('"', '', $this->input->get('city'));
			$state = str_replace('"', '', $this->input->get('state'));
			$country = str_replace('"', '', $this->input->get('country'));
			$occupation = str_replace('"', '', $this->input->get('occupation'));
			$email = str_replace('"', '', $this->input->get('email'));
			$username = str_replace('"', '', $this->input->get('username'));
			$password = str_replace('"', '', $this->input->get('password'));
			$pay = str_replace('"', '', $this->input->get('pay'));
			$income = str_replace('"', '', $this->input->get('income'));
			$range = str_replace('"', '', $this->input->get('range'));
			$terms = str_replace('"', '', $this->input->get('terms'));
			$item_name_1 = str_replace('"', '', $this->input->get('item_name_1'));
			if($this->Users_model->check_user($username) == false)
				{
					$data['message'] = 'Username is already exist';
					$data['main_content'] = 'admin/user/register';
					$data['roles'] = $this->roles_model->get_roles();       
					$this->load->view('includes/front/template', $data);
					redirect('register?m=1');
					
				}	
			$data_to_store = array(
			    'first_name' => $fname,
			    'last_name' => $lname,
			    'email_addres' => $email,
			    'user_name' => $username,
			    'pass_word' => md5($password),
			    'telephone' => $phone,
			    'city_suburb' =>  $city,
			    'postal_code' => $postalcode,
			     'occupational_status' => $occupation,
			     'address' => $address,
			     'state' => $state,
			     'country' => $country,
			     'ic_number' => $ic_number,
			     'pay' => $pay,
			     'total_income' => $income,
			    'range' => $range,
			    'terms' => $terms,
			     'role' => $item_name_1,
			     
			);
	
				
				if($query = $this->Users_model->register_member($data_to_store))
				{
						$data['message'] = 'You are successfullly registered';
						$data['main_content'] = 'admin/user/payment_success';
						$this->load->view('includes/front/template', $data);		
				}
				else
				{
					$data['message'] = 'There is problem please try again';
					$data['main_content'] = 'admin/user/payment_unsuccess';
					 $this->load->view('includes/front/template', $data);		
				}
		}	    
		
	}
	
	function register_member()
	{
	    
	    $this->load->library('form_validation');
		
		// field name, error message, validation rules
		$this->form_validation->set_rules('fname', 'First Name', 'trim|required|alpha_numeric');
		$this->form_validation->set_rules('lname', 'Last Name', 'trim|required|alpha_numeric');
		$this->form_validation->set_rules('ic_number', 'Ic Number', 'trim|required|alpha_numeric');
		$this->form_validation->set_rules('phone', 'Phone', 'trim|required|min_length[4]|alpha_numeric');
		$this->form_validation->set_rules('address', 'Address', 'trim|required|xss_clean');
		$this->form_validation->set_rules('postalcode', 'Postalcode', 'trim|required|alpha_numeric');
		$this->form_validation->set_rules('city', 'City', 'trim|required|xss_clean');
		$this->form_validation->set_rules('state', 'State', 'trim|required|xss_clean');
		$this->form_validation->set_rules('country', 'Country', 'trim|required|xss_clean');
		$this->form_validation->set_rules('occupation', 'Occupation', 'trim|required|xss_clean');
		$this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
		$this->form_validation->set_rules('username', 'Username', 'trim|required|alpha_numeric');
		$this->form_validation->set_rules('password', 'Password', 'trim|required|alpha_numeric');
		$this->form_validation->set_error_delimiters('<div class="alert alert-error"><a class="close" data-dismiss="alert">×</a><strong>', '</strong></div>');
		
		if($this->form_validation->run() == FALSE)
		{
			$data['main_content'] = 'admin/user/register';
		$this->load->view('includes/front/template', $data);
		}
		
		else
		{			
			$this->load->model('Users_model');
			  $fname = str_replace('"', '', $this->input->post('fname'));
                $lname = str_replace('"', '', $this->input->post('lname'));
                $ic_number = str_replace('"', '', $this->input->post('ic_number'));
                $phone = str_replace('"', '', $this->input->post('phone'));
                $address = str_replace('"', '', $this->input->post('address'));
                $postalcode = str_replace('"', '', $this->input->post('postalcode'));
                $city = str_replace('"', '', $this->input->post('city'));
                $state = str_replace('"', '', $this->input->post('state'));
                $country = str_replace('"', '', $this->input->post('country'));
                $occupation = str_replace('"', '', $this->input->post('occupation'));
                $email = str_replace('"', '', $this->input->post('email'));
                $username = str_replace('"', '', $this->input->post('username'));
                $password = str_replace('"', '', $this->input->post('password'));
		$pay = str_replace('"', '', $this->input->post('pay'));
		$income = str_replace('"', '', $this->input->post('income'));
		$range = str_replace('"', '', $this->input->post('range'));
		$terms = str_replace('"', '', $this->input->post('terms'));
                $data_to_store = array(
                    'first_name' => $fname,
                    'last_name' => $lname,
                    'email_addres' => $email,
                    'user_name' => $username,
                    'pass_word' => md5($password),
                    'telephone' => $phone,
                    'city_suburb' =>  $city,
                    'postal_code' => $postalcode,
                     'occupational_status' => $occupation,
                     'address' => $address,
                     'state' => $state,
                     'country' => $country,
                     'ic_number' => $ic_number,
                     'pay' => $pay,
                     'total_income' => $income,
		    'range' => $range,
		    'terms' => $terms,
		     
                );

			
			if($query = $this->Users_model->register_member($data_to_store))
			{
			                $data['message'] = 'You are successfullly registered';
					$data['main_content'] = 'admin/user/register';
		                        $this->load->view('includes/front/template', $data);		
			}
			else
			{
			        $data['message'] = 'There is problem please try again';
				$data['main_content'] = 'admin/user/register';
		                 $this->load->view('includes/front/template', $data);		
			}
		}
	    
	}
    /**
    * Create new user and store it in the database
    * @return void
    */	
	function create_member()
	{
		$this->load->library('form_validation');
		
		// field name, error message, validation rules
		$this->form_validation->set_rules('first_name', 'Name', 'trim|required|alpha');
		$this->form_validation->set_rules('last_name', 'Last Name', 'trim|required|alpha');
		$this->form_validation->set_rules('email_address', 'Email Address', 'trim|required|valid_email');
		$this->form_validation->set_rules('username', 'Username', 'trim|required|min_length[4]|alpha_numeric');
		$this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[4]|max_length[32]|alpha_numeric');
		$this->form_validation->set_rules('password2', 'Password Confirmation', 'trim|required|matches[password]|alpha_numeric');
		$this->form_validation->set_error_delimiters('<div class="alert alert-error"><a class="close" data-dismiss="alert">×</a><strong>', '</strong></div>');
		
		if($this->form_validation->run() == FALSE)
		{
			$this->load->view('admin/signup_form');
		}
		
		else
		{			
			$this->load->model('Users_model');
			
			if($query = $this->Users_model->create_member())
			{
				$this->load->view('admin/signup_successful');			
			}
			else
			{
				$this->load->view('admin/signup_form');			
			}
		}
		
	}
	
	/**
    * Destroy the session, and logout the user.
    * @return void
    */		
	function logout()
	{
		$this->session->sess_destroy();
		redirect('home');
	}
	
	function home()
	{
		/*if($this->session->userdata('is_logged_in') && $this->session->userdata('type') == 'admin'){
			redirect('admin/property');
        }
		elseif($this->session->userdata('is_logged_in') && $this->session->userdata('type') == 'user'){
			redirect('dashboard');
		}
		else{
        	$this->load->view('admin/login');	
        }*/
		exit("i am in homepage :)");
	}
	
	
	
	public function forget()
	{
		if(!$this->session->userdata('user_id')){

			if (isset($_GET['info'])) {
	           $data['info'] = $_GET['info'];
			}
			if (isset($_GET['error'])) {
				$data['error'] = $_GET['error'];
			}
			
			$data['main_content'] = 'login-forget';
			$this->load->view('includes/front/template', $data);

		}else{
			redirect('home');
		}
		
	}
	
	public function doforget()
	{
		$this->load->helper('url');
		$email= $_POST['email'];
		$q = $this->db->query("select * from membership where email_addres='" . $email . "' and type='user'");
        if ($q->num_rows > 0) {
            $r = $q->result();
            $user=$r[0];
			$this->resetpassword($user);
			$info= "Password has been reset and has been sent to email id: ". $email;
			redirect('forget?error=' . $info, 'refresh');
        }
		$error= "The email id you entered not found on our database ";
		 redirect('forget?error=' . $error, 'refresh');
		
	}
	
	private function resetpassword($user)
	{

		date_default_timezone_set('GMT');
		$this->load->helper('string');
		$password= random_string('alnum', 16);
		$this->db->where('id', $user->id);
		$this->db->update('membership',array('pass_word'=>MD5($password)));
		$this->load->library('email');
		  $headers = "From:  info@myvikohome.com";
		  
		$to=$user->email_addres; 	
		$subject='Password reset';
		$txt='You have requested the new password, Here is you new password:'.$password;	
		 mail($to,$subject,$txt,$headers);
		 
	} 
	public function registration_success(){
            if(!empty($_GET)){
                if(isset($_GET['n']) and $_GET['n'] == '1'){
                    $data['message'] = 'You are successfullly registered';
                    $data['main_content'] = 'admin/user/registration_success';
                }
            }else{
                redirect('/');
            }
            $this->load->view('includes/front/template', $data);
    }
	
	public function admin_counter_notification(){
		$conditions = " where transaction_status = 'pending'";
        $pending_deposit_count = $this->common->get_deposit_cnt($conditions);
   
        $conditions = "user_withdraw_fund.status !='Withdrawadmin' and user_withdraw_fund.status ='pending'";
        $pending_withdraw_count = $this->common->get_withdraw_cnt_s('pending',$conditions);

        $this -> load -> model('admin');
        $ticketcount = $this -> admin -> GetTicketsCount();

        // echo "<pre>";
        // print_r($ticketcount);
        // die;

        $sess_array = array(
                    'notification_pending_deposit' => $pending_deposit_count,
                    'notification_pending_withraw' => $pending_withdraw_count,
                    'notification_open_ticket' => $ticketcount["open"]
                );
        $this->session->set_userdata($sess_array);
        

	}

	public function check_reset_password($str){
		$user_id = $this->session->userdata('user_id');
		$user_detail = $this->Users_model->get_user_by_id($user_id);
		$old_password = $user_detail[0]['pass_word'];
		
		if(!empty($str)){
			if($old_password == md5($str)){
				return true;
			}else{
				$this->form_validation->set_message('check_reset_password', '%s is invalid');
				return false;
			}
		}else{
			return true;
		}
	}

	// public function new_password($str){
	// 	if(!empty($str)){
	// 		return true;
	// 	}else{
	// 		$this->form_validation->set_message('new_password', '%s is Required');
	// 		return false;
	// 	}
	// }

}
