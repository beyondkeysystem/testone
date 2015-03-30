<?php
class Property_listing extends CI_Controller {

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
		$this->load->model('user_property_model');
	    $this->load->model('user_credit_model');
        $this->load->model('credit_price_model');
        $this->load->model('roles_model');
		$this->load->model('transactionfees_model');
		$this->load->model('user_share_limits_model');
		$this->load->model('user_fund_log_model');
		$this->load->model('profit_loss_fund_log_model'); 
		$this->load->model('user_autotracking_log_model'); 

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
		$id = $this->uri->segment(2);
            if(is_numeric($id) or $id ==''){	
        //pagination settings
	
	$data['sold']=array();
	$data['available']=array();
	
        $config3['per_page'] = 5;
        $config3['base_url'] = base_url().'property_listing';
        $config3['use_page_numbers'] = TRUE;
        $config3['num_links'] = 8;
        $config3['full_tag_open'] = ' <ul class="pagi-nation">';
        $config3['full_tag_close'] = '</ul>';
        $config3['num_tag_open'] = '<li>';
        $config3['num_tag_close'] = '</li>';
        $config3['cur_tag_open'] = '<li class="active"><a>';
        $config3['cur_tag_close'] = '</a></li>';

        $config3['uri_segment'] = 2;
        //limit end
        $page3 = $this->uri->segment(2);
        

        //math to get the initial record to be select in the database
        $limit_end3 = ($page3 * $config3['per_page']) - $config3['per_page'];
        if ($limit_end3 < 0){
            $limit_end3 = 0;
        }
		//echo "<pre>";print_r($_POST); exit;
		// Form Post
		
		if ($this->input->server('REQUEST_METHOD') === 'POST' )
               {
			//echo "<pre>";print_r($_POST); exit;
			$property_name = $filter_session_data['property_name'] = $this->input->post('property_name'); 
			$property_location = $filter_session_data['property_location'] = $this->input->post('property_location');  
			$property_ref = $filter_session_data['property_ref'] = $this->input->post('property_ref');
			$property_type = $filter_session_data['property_type'] = $this->input->post('property_type');
			$property_status = $filter_session_data['property_status'] = $this->input->post('property_status');
			$property_bedrooms = $filter_session_data['property_bedrooms'] = $this->input->post('property_bedrooms');
			$property_bathrooms = $filter_session_data['property_bathrooms'] = $this->input->post('property_bathrooms');
			$minprice = $filter_session_data['minprice'] = $this->input->post('minprice');
			$maxprice = $filter_session_data['maxprice'] = $this->input->post('maxprice');
			$price = $filter_session_data['price'] = $this->input->post('price');
		  
		    
			$get_property_information = $this->property_model->get_property_information( $minprice, $maxprice, $price, $property_bedrooms, $property_location, $property_ref, $property_type, $property_status, $property_bathrooms, $config3['per_page'],$limit_end3, $property_name);
			$data['property_information'] = $get_property_information['result_array'];
			 foreach( $data['property_information']  as $property){
			    $rowAllProperty =$this->property_model->count_available_share($property['id']);
			    //$data['owned'][] = 100-$rowAllProperty['sell'];
			    $data['available'][] = 100-$rowAllProperty[0]['total_property_share_in_per'];
			    
			    // $rowAllProperty = $this->user_property_model->get_property_cal($property['id']);
			    // $data['owned'][] = 100-$rowAllProperty['sell'];
			    $data['sold'][] = $rowAllProperty[0]['user_property_share_sell'];
		        }
			$data['count_property_information']= $get_property_information['num_rows'];
                        $config3['total_rows'] = $data['count_property_information'];
			
			$this->session->set_userdata($filter_session_data);
		}
		else{
			$filter_session_data = $this->session->userdata('filter_session_data');
			unset($filter_session_data[0]);
			$this->session->set_userdata('filter_session_data',$filter_session_data);
			$filter_session_data=0;
			
			$get_property_information = $this->property_model->get_all_property_information( $config3['per_page'],$limit_end3);
			$data['property_information'] = $get_property_information['result_array'];
			$data['count_property_information']= $get_property_information['num_rows'];
            $config3['total_rows'] = $data['count_property_information'];

			// echo "<pre>";print_r($data['property_information']);die;
			 foreach( $data['property_information']  as $property){
			    $rowAllProperty =$this->property_model->count_available_share($property['id']);
			    //$data['owned'][] = 100-$rowAllProperty['sell'];
			    $data['available'][] = 100-$rowAllProperty[0]['total_property_share_in_per'];
			    
			    // $rowAllProperty = $this->user_property_model->get_property_cal($property['id']);
			    //$data['owned'][] = 100-$rowAllProperty['sell'];
			    $data['sold'][] = $rowAllProperty[0]['user_property_share_sell'];
		        }
			$filter_session_data=0;
		}
		
		if($this->session->userdata('property_name')!='' || $this->session->userdata('property_location')!='' || $this->session->userdata('property_ref')!='' || $this->session->userdata('property_type')!='' || $this->session->userdata('property_status')!='' || $this->session->userdata('property_bedrooms')!='' || $this->session->userdata('property_bathrooms')!='' || $this->session->userdata('price')!=''){
		  
		  $property_name = $this->session->userdata('property_name'); 
			$property_location = $this->session->userdata('property_location');  
			$property_ref = $this->session->userdata('property_ref');
			$property_type = $this->session->userdata('property_type');
			$property_status = $this->session->userdata('property_status');
			$property_bedrooms = $this->session->userdata('property_bedrooms');
			$property_bathrooms = $this->session->userdata('property_bathrooms');
			$minprice = $this->session->userdata('minprice');
			$maxprice = $this->session->userdata('maxprice');
			$price = $this->session->userdata('price');
			$get_property_information = $this->property_model->get_property_information( $minprice, $maxprice, $price, $property_bedrooms, $property_location, $property_ref, $property_type, $property_status, $property_bathrooms, $config3['per_page'],$limit_end3, $property_name);
			$data['property_information'] = $get_property_information['result_array'];
			$data['count_property_information']= $get_property_information['num_rows'];
            $config3['total_rows'] = $data['count_property_information'];
			
			//$this->session->set_userdata($filter_session_data);
		}//
		//$config3['total_rows'] = 8;
		//initializate the panination helper 
               $this->pagination->initialize($config3);
		
		//Search Directory Data
            $data['property'] = $this->property_model->get_property();          
            $data['property_status'] = $this->property_model->get_property_status();
	    $data['property_baths'] = $this->property_model->get_property_baths();
	    $data['property_beds'] = $this->property_model->get_property_beds();  
            $data['property_type'] = $this->property_type_model->get_property_type();
	    
		$data['sess'] = $this->session->userdata;
		$data['filter_session_data']=$filter_session_data;
	    $data['property_max_price'] = intval($this->property_model->get_max_property_price());
	
		$data['main_content'] = 'property_listing/index';
		if(!empty($data['property_information'])){
                    $this->load->view('includes/front/template', $data);
                }else{
                    $this->load->view('includes/front/template', $data);
                }
            }else{
                $this->load->view('error_500');
            }
                
	}
	
	
	function property_details()
	{
		/* to Check the property is exceeds 30 days of Sell pending phase status */
			$sell_phase_properties = $this->property_model->get_properties_sell_phase_date();
			foreach($sell_phase_properties as $sell_phase_property){
				$n_property_id = $sell_phase_property['id'];
				$this->property_model->update_property_enable_disable_status($n_property_id);
			}
		/* Sell Pending phase Ends */


	    $id = $this->uri->segment(2);
        if(is_numeric($id)){
	    //$this->property_model->get_property_baths();
		// Get all users records for property itself sell and owned things
		$search_string = $this->input->post('search_string');
		
		/* Mayank Pawar 22/12/2014 */
		$property_table_details = $this->property_model->get_product_by_id($id);
		$data['min_property_share_limit'] = $property_table_details[0]['min_property_share_limit'];
		$data['min_owned_limit'] = $property_table_details[0]['min_owned_limit'];

		// echo "<pre>";print_r($property_table_details);die;

		$rowAllProperty = $this->user_property_model->get_property_cal($id);
		$data['available'] = 100-$rowAllProperty['property_share_in_per'];
		$data['owned'] = $rowAllProperty['property_share_in_per'];
			
		if($this->session->userdata('is_logged_in')){
		    
			$user_id = $this->session->userdata('user_id');
			$role = $this->session->userdata('role'); 
			
			$property_id = $id;
			$data['share_limits'] = 0;
			
			//Array(    [id] => 1    [user_id] => 66    [share_limits] => 5    [property_id] => 9	)
			$rowUserPropertyShareLimit = $this->user_share_limits_model->getsharepropertylimits($user_id, $property_id);
			if($rowUserPropertyShareLimit){
				$data['share_limits'] = $rowUserPropertyShareLimit['share_limits'];
			}
		    
		    $data['total_share_available'] = $this->property_model->get_total_share_available($property_id); //Mayank Pawar 22/12/2014

			//get data from user_property and property tables
			$data['property_information'] = $this->property_model->get_property_information_of_users_of_property($user_id, $id);
			
			
			if(count($data['property_information']) == 0){
				$new_user_property_data = array(
					'property_share_in_per' => 0,
					'user_id' => $user_id,
					'property_id' => $property_id,			
					'profit' => 0,
					'loss' => 0 						
				);
				$insert = $this->db->insert('user_property', $new_user_property_data);
				$data['property_information'] = $this->property_model->get_property_information_of_users_of_property($user_id, $id);
				
			}

			//Array ( [id] => 2 [user_id] => 66 [username] => sam [credit] => 100 )			
			$data['user_credit'] =  $this->user_credit_model->get_user__by_userid($user_id);
			// print_r($data['user_credit']); exit;
			//$data['user_credit_payment'] =  $this->user_credit_model->get_user_credit_by_userid($user_id);
			
			//Array ( [0] => Array ( [id] => 3 [credit] => [price] => $10 ) )
			$data['credit_price'] =  $this->credit_price_model->get_credit_price();
			
			//Array ( [id] => 3 [amount] => $50 [member_type] => Platinum [modified_date] => 2014-11-10 13:50:31 ) 
			$data['role'] =  $this->transactionfees_model->get_transactionfees_by_type($role);
			

			
			if ($this->input->server('REQUEST_METHOD') === 'POST')
			{
				//echo "<pre>"; print_r($_POST); //exit;
				//[share_percentage] => 1     [share_price] => 4000    [transactionfees] => 50    [credit_price] => 10    [user_credit] => 91
				
				$property_status = $this->input->post('property_status');
				$propertySaleForPhaseTwo = "";
				if($this->input->post('propertySaleForPhaseTwo')){
				 	$propertySaleForPhaseTwo = $this->input->post('propertySaleForPhaseTwo');
				}
				if($this->input->post('property_click')){
					$property_click = $this->input->post('property_click');
				}

				
				// Manage Buy user_property_data
				if($property_status == "pending" || $property_status == "selling"){
					$buy_percent = $this->input->post('share_percentage');
					$user_credit = $this->input->post('user_credit_agree');
					$share_price = $this->input->post('share_price');
					$transaction_percent = $this->input->post('transactionfees');	//Transaction in percentage
					
					$per_share_rate = $share_price/100; 
					$purchased_share_rate = $per_share_rate * $buy_percent;
					$total_share_price = $purchased_share_rate + ($purchased_share_rate * ($transaction_percent/100));
					//echo $total_share_price; die;
					// $buy_share_price = $share_price + $transactionfees * $buy_percent;
				        $total = $total_share_price / $data['credit_price'][0]['price'];
					//echo $total; die;
					$user_credit_check=$this->user_credit_model->get_user__by_userid($user_id);
					if($total > $user_credit_check[0]['credit'] ){
					    redirect('property_details/'.$id.'');
					}
					$property_info= $this->property_model->get_product_by_id($id);
					$data_log = array(
						    'user_id' => $this->session->userdata('user_id'),
						    'detail' => 'Buy '. $buy_percent .'% Shares for  '.$property_info[0]['property_name'],
						    'fund_type' => 'Buy',
						    'debit' => 0,
						    'credit' => $total_share_price,
						    'property_id' => $property_id
						);
						// Maintain Log	
					$user_log_id = $this->user_fund_log_model->store_user_credit_payment($data_log);
					$rowProperty = $this->user_property_model->get_property_id1($property_id,$user_id);
					
					if($rowProperty){
						$actualShare = $rowProperty['property_share_in_per'] + $buy_percent;
						//echo $actualShare; die;
						
							$this->db->set('property_share_in_per',$actualShare);
						    $this->db->where('property_id', $property_id);
						    $this->db->where('user_id', $user_id);					
						    $this->db->update('user_property');



					}
					$transaction_charge = $purchased_share_rate * ($transaction_percent/100);
					$set_log = array('user_id'=>$user_id,
										'fund_type'=>'Buy',
										'user_fund_log_id'=>$user_log_id,
										'detail'=> 'Transaction Charge of '.$transaction_charge.' MYR for purchase '.$buy_percent.' Shares of Property '.$property_info[0]['property_name'],
										'debit'=>$transaction_charge,
										'share'=>$buy_percent,
										'property_id'=>$property_id
									);
					$this->user_autotracking_log_model->set_autotracking_log($set_log);
					// else{
					// 	$actualShare = $buy_percent;
					// 	$new_user_property_data = array(
					// 		'property_share_in_per' => $actualShare,
					// 		'user_id' => $user_id,
					// 		'property_id' => $property_id,			
					// 		'profit' => 0,
					// 		'loss' => 0 						
					// 	);
					// 	$insert = $this->db->insert('user_property1', $new_user_property_data);
					// }
					// die("this");
					//get data from user_property and property tables
			        // $data['property_information'] = $this->property_model->get_property_information_of_users_of_property($user_id, $id);
					
					// Manage user credit
					if($this->input->post('user_credit_agree')){
						$this->user_credit_model->update_by_user_id($user_id, $user_credit);
					}
					redirect(current_url());
				}
				/**
				** By Mayank Pawar
				** Date 26.11.14
				**/
				else if($property_status == "owned" && $propertySaleForPhaseTwo == "propertySaleForPhaseTwo"){
					//echo $user_id;
					// echo "<pre>";print_r($this->input->post());die;
					$share_req = $this->input->post('share_req');
					// echo "<pre>";print_r($share_req); die;
					$total_share = 0;
					foreach($share_req as $user_property_id=>$share_buy){
						$this->user_property_model->upd_user_property_sold_share($user_property_id,$share_buy);
						$total_share += $share_buy;
					}
					$property_owned_info_buy = $this->property_model->get_product_owned_info_buy($property_id);
					if($property_owned_info_buy){
						$property_share_own_sell = $property_owned_info_buy[0]['property_share_own_sell'];
						$min_owned_limit = $property_owned_info_buy[0]['min_owned_limit'];
						$sell_property_share = $property_owned_info_buy[0]['property_share_own_sell']-$total_share;
						
						if($property_share_own_sell >= $min_owned_limit && $sell_property_share < $min_owned_limit ){
							$min_owned_limit_datetime = '0000-00-00 00:00:00';
							$owned_limit = array(
								'min_owned_limit_datetime' => $min_owned_limit_datetime
							);
					
							$this->db->where('id', $property_id);
							$this->db->update('property', $owned_limit);		
						}
					}

					$share_price = $this->input->post('share_price')/100; //Share Price
					$credit_price = $this->input->post('credit_price');
					$transactionfees = $this->input->post('transactionfees');
					$transactionfees_amt = ($share_price * $total_share)*($transactionfees/100);
					
					$total_credit_amt = ($share_price * $total_share)+$transactionfees_amt;
					$total_token = $total_credit_amt;
					
					$creditData =  $this->credit_price_model->get_credit_price();
                    $creditVal = $total_token / $creditData[0]['price'];
					
					$this->user_property_model->chk_user_property($user_id,$property_id,$total_share);

					//Mayank Pawar Date 25.11.14
					$property_det = $this->property_model->get_property_name_by_id($property_id);
					$property_name = $property_det['property_name'];
					$user_log_id = $this->user_fund_log_model->sales_phase_two_log_entry_buy($user_id, $total_credit_amt, $property_id, $total_share,$property_name); //Credit Amount user log table. 
					
					$set_log = array('user_id'=>$user_id,
										'fund_type'=>'Buy',
										'user_fund_log_id'=>$user_log_id,
										'detail'=> 'Transaction Charge of '.$transactionfees_amt.' MYR for purchase '.$total_share.' Shares of Property '.$property_name,
										'debit'=>$transactionfees_amt,
										'share'=>$total_share,
										'property_id'=>$property_id
									);
					$this->user_autotracking_log_model->set_autotracking_log($set_log);
					
					$this->user_credit_model->update_user_credit_credit($user_id,$creditVal); //Credit Token from user credit on buy share phase two.
					//End

					foreach($share_req as $user_property_id=>$share_buy){
					 	// echo $user_property_id." ".$share_buy;
					 	$total_debit_amt = ($share_price * $share_buy);
					 	$total_debit_token = $total_debit_amt/$credit_price;
						$result = $this->user_property_model->get_user_property_id($user_property_id);
						$seller_user_id = $result['user_id'];
						// Mayank Pawar Date 25.11.14
						$admin_user_id = 1;
						$this->user_fund_log_model->sales_phase_two_log_entry_sell($seller_user_id, $total_debit_amt, $property_id, $share_buy, $property_name);
						$this->user_credit_model->update_user_credit_debit($seller_user_id,$total_debit_token); //Debit Token for selling share property phase two
						
						$res = $this->user_fund_log_model->get_profit_loss($property_id); //Calculate Profit or loss on property
						$diff = $res[0]['diff'];
						$now = date('Y-m-d H:i:s'); 
						// echo $seller_user_id." ".$total_debit_token." ".$total_debit_amt;die;
						if($seller_user_id != 1){
							if($diff < 0){
								$abs_diff = abs($diff)/100 * $share_buy; //share buy multiple by loss/100
								$token_diff = $abs_diff/$credit_price;
								

								$data1 = array(
				                    'user_id'=>$seller_user_id,
				                    'fund_type'=>'Loss',
				                    'property_id'=>$property_id,
	                                'detail'=>'Transfered Loss amount on the Property '.$property_name.' to Admin',
			                        'credit'=>$abs_diff
	        	                );
				        		$user_log_id = $this->user_fund_log_model->set_profit_loss($data1);

				        		$data = array(
				                    'user_id'=>$seller_user_id,
				                    'fund_type'=>'Loss',
				                    'detail'=>'System Auto Generated',
				                    'credit'=>$abs_diff,
			                        'user_fund_log_id'=>$user_log_id,
			                        'date'=>$now
	        	                );
				        		$this->profit_loss_fund_log_model->set_profit_loss($data);
								$this->user_credit_model->update_user_credit_credit($seller_user_id,$token_diff);	//Credit in User Account for Loss
								// $this->user_credit_model->update_user_credit_debit($admin_user_id,$token_diff);	//Debit in Admin Account for Loss
								// echo "<pre>";print_r($token_diff." ".$abs_diff);die("this loss");
							}else if($diff >= 0){
								$diff = $diff/100 * $share_buy; //share buy multiplied by Profit/100
								$token_diff = $diff/$credit_price;

								$data1 = array(
				                    'user_id'=>$seller_user_id,
				                    'fund_type'=>'Profit',
				                    'property_id'=>$property_id,
	                                'detail'=>'Property profit on '.$property_name.' of amount '.$diff.' MYR for selling '.$share_buy.' shares',
					                'debit'=>$diff
				                );
				        		$user_log_id = $this->user_fund_log_model->set_profit_loss($data1);

								$data = array(
				                    'user_id'=>$seller_user_id,
				                    'fund_type'=>'Profit',
				                    'detail'=>'System Auto Generated',
				                    'debit'=>$diff,
					                'user_fund_log_id'=>$user_log_id,
					                'date'=>$now
				                );
				        		$this->profit_loss_fund_log_model->set_profit_loss($data);
								$this->user_credit_model->update_user_credit_debit($seller_user_id,$token_diff);	//Credit in User Account for Profit
				        	}		        		
			        		//End
			        	}
					}
					redirect(current_url());
				}
				
				elseif($property_status == "owned"){
			
					$sell_percent = $this->input->post('sell_share_percentage');				    
					$rowProperty = $this->user_property_model->get_prop_user_id($property_id,$user_id);
					if($rowProperty){
						$actualShare = $rowProperty['property_share_in_per'] + $buy_percent;
						$update_user_property_data = array(
							'property_share_in_per' => $actualShare,
							'profit' => 0,
							'loss' => 0						
						);
						$this->db->where('property_id', $property_id);
						$this->db->where('user_id', $user_id);					
						$this->db->update('user_property', $update_user_property_data);
					}
					else{
						$actualShare = $buy_percent;
						$new_user_property_data = array(
							'property_share_in_per' => $actualShare,
							'user_id' => $user_id,
							'property_id' => $property_id,			
							'profit' => 0,
							'loss' => 0 						
						);
						$insert = $this->db->insert('user_property', $new_user_property_data);
					}
					
					// Manage user credit
					if($this->input->post('user_credit')){
						$this->user_credit_model->update_by_user_id($user_id, $user_credit);
					}
				}// end property status owned

/* End */
				//echo print_r($rowProperty); exit;				
			}			
        } //endif	
		

           //Code By Me Start
	   $all_month= array();
	    $all_price= array();
	    $before_price=0;
		$data['search_string_selected'] = $search_string;
	    $data['profit_and_loss_logs']=$this->user_fund_log_model->get_profit_loss_logs_by_property_id($search_string, $id);
	     $data['check_user_property']=$this->user_property_model->check_user_property($user_id, $id);
	    $data['property_detail'] = $this->property_model->get_property_by_id($id);
	    $data['property_max_and_min_date'] = $this->property_model->get_property_max_and_min_date($id);
	    
	  
	    $datetime1 = date_create($data['property_max_and_min_date'][0]['min_date']);
	    $datetime2 = date_create($data['property_max_and_min_date'][0]['max_date']);
	  
	    $interval = DateInterval::createFromDateString('1 month');
	    $period   = new DatePeriod($datetime1, $interval, $datetime2);
	      //print_r($period); die;
	    foreach ($period as $dt) {
		$all_month[]=$dt->format("Y-m");
	    }
	     foreach ($all_month as $month) {
		$avg_prices=$this->property_model->get_avg_price_month_property($month, $id);
		foreach($avg_prices as $avg_price){
		if(!empty($avg_price['price'])){
		    $before_price=$avg_price['price'];
		}else{
		    $before_price=$before_price;
		}
		$all_price[]=$before_price;
		}
	    } 

           
	    foreach($data['property_detail'] as $property_detail){
		if($property_detail['property_status']=='blocked'){
		    redirect('home/');
		}
	    }
	    
	    $data['chart_date']=$all_month;
	    $data['chart_price']=$all_price;
	    //Code By Me End



		/*By Mayank Pawar*/
		//Get property detail data
	    // $data['profit_and_loss_logs']=$this->user_fund_log_model->get_profit_loss_logs_by_property_id($search_string, $id);
	    $data['user_property']=$this->user_property_model->get_property_id_shares($id);
	    // $data['property_detail'] = $this->property_model->get_property_by_id($id);
	 
	    
	    $data['user_property_share_detail'] = $this->property_model->get_user_property_share($id);
	   // echo '<pre>'; print_r($data['user_property_share_detail']); die;
	    foreach ($data['user_property_share_detail'] as $row) {
	    	$u_id = $row['user_id'];
	    	$data['credit_debit'][] = $this->property_model->get_user_credit_debit_detail_prop($u_id,$id);
	    }
	    // echo "<pre>";print_r($data['credit_debit']);die;
	    /*End*/
	    $data['all_property_information'] = $this->property_model->get_all_property();
        $data['credit_price']=  $this->credit_price_model->get_credit_price();

		$data['main_content'] = 'property_listing/property_details';
		if(!empty($data['property_detail'])){
            $this->load->view('includes/front/template', $data);
        }else{
            $this->load->view('error_500');
        }
		
            }else{
               // $data['main_content'] = 'request_not_found';
				$this->load->view('error_500');
            }
		}
	
	function sell_property(){
		$user_id = $this->session->userdata('user_id');
		
		$property_id = $_POST['property_id'];
		$sell_share = $_POST['sell_share'];
		$share_avail = $_POST['share_avail'];
		
		$rowProperty = $this->user_property_model->get_prop_user_id($property_id,$user_id);
			
		if($rowProperty){
			
			$rowProperty['property_share_in_per'] = $rowProperty['property_share_in_per'] - $sell_share;
			$sell_property_share = $rowProperty['sell_property_share'] + $sell_share;
			
			$property_owned_info = $this->property_model->get_product_owned_info($property_id,$user_id);
			if($property_owned_info){
				$property_share_own_sell = $property_owned_info['property_share_own_sell'];
				$min_owned_limit = $property_owned_info['min_owned_limit'];

				if($property_share_own_sell <= $min_owned_limit && $sell_property_share >= $min_owned_limit ){
					$min_owned_limit_datetime = date('Y-m-d h:i:s');
					$owned_limit = array(
						'min_owned_limit_datetime' => $min_owned_limit_datetime
					);
			
					$this->db->where('id', $property_id);
					$this->db->update('property', $owned_limit);		
				}
			}

			$update_user_property_data = array(
				'sell_property_share' => $sell_property_share,
				'property_share_in_per' => $rowProperty['property_share_in_per']
			);
			
			$this->db->where('property_id', $property_id);
			$this->db->where('user_id', $user_id);					
			$this->db->update('user_property', $update_user_property_data);
		}
		
	}

	function get_sell_share_holders(){
		echo "this is is ".$this->input->post('property_id');die;		
	}	
}