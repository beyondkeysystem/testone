<?php
/*
 * Fuse
 *
 * A simple open source ticket management system. 
 *
 * @package		Fuse
 * @author		Vivek. V
 * @link		http://getvivekv.bitbucket.org/Fuse
 * @link		http://www.vivekv.com
 */

class Transaction extends CI_Controller
{
    function __construct(){
        parent::__construct();
        $this->load->model('common');
        $this->load->model('withdraw_model');
        $this->load->model('user_fund_log_model');
        $this->load->model('user_credit_model');
        $this->load->model('user_autotracking_log_model'); 
	 
	 	 
	  if(( $this->session->userdata('is_logged_in') && ($this->session->userdata('type') != 'admin')) ){
            redirect('admin/login');
           
        }
        
          if(( !$this->session->userdata('is_logged_in')) ){
            redirect('admin/login');
           
        }

    }
    public function pending_deposit(){
        $page = $this->uri->segment(3);
        if(!$page){
                $this->session->unset_userdata('conditions');
                
                $array_items = array('search_datetime' => '', 'search_username' => '', 'search_transaction_id' => '');
                $this->session->unset_userdata($array_items);
            }
        if($this->input->server('REQUEST_METHOD') === 'POST') {
           //echo '<pre>';print_r($this->input->post());echo '</pre>';
           // exit;
            $datetime = $this->input->post('datetime');
            $username = $this->input->post('username');
            $transaction_id = $this->input->post('transaction_id');

            $session_data_set['search_datetime'] = $datetime;
            $session_data_set['search_username'] = $username;
            $session_data_set['search_transaction_id'] = $transaction_id;
            $this->session->set_userdata($session_data_set);

            $condition =  '';
            if(isset($datetime) and $datetime !=''){
                $data['datetime'] = $datetime;
                $condition .= " and o_payments.datetime like '%$datetime%'";
            }
            if(isset($username) and $username !=''){
                $data['username'] = $username;
                $condition .= " and membership.user_name like '%$username%'";
            }
            if(isset($transaction_id) and $transaction_id !=''){
                $data['transaction_id'] = $transaction_id;
                $condition .= " and o_payments.ref_no like '%$transaction_id%'";
            }
        }
        $select = "o_payments.*,membership.email_addres as email_addres, membership.user_name as user_name";
        $join = "o_payments left join membership on o_payments.user_id = membership.id";
        $conditions = " where transaction_status = 'pending' $condition";
        if(isset($condition) and $condition !=''){
            $session_data = array('conditions'=>$conditions);
            $this->session->set_userdata($session_data);
            $s_data = $this->session->userdata('conditions');//exit;
        }
         $s_data = $this->session->userdata('conditions');
        if($s_data){
            $conditions = $s_data;
        }
        $count = $this->common->get_deposit_cnt($conditions);
         $config['base_url'] = base_url().'/transaction/pending_deposit';
            $config['total_rows'] = $count;
            $config['per_page'] = PAGE_LIMIT; 
            $config['uri_segment']=3;
            $config['full_tag_open'] = '<ul>';
            $config['full_tag_close'] = '</ul>';
            $config['num_tag_open'] = '<li>';
            $config['num_tag_close'] = '</li>';
            $config['cur_tag_open'] = '<li class="active"><a>';
            $config['cur_tag_close'] = '</a></li>';
            if($this->uri->segment(3)==''){
                $offset =0;
            }else{
                $offset = $this->uri->segment(3);
            }
            $this->pagination->initialize($config);
            
        $payments = $this->common->find_deposit($select,$join,$conditions,$offset);
        $data['payments'] = $payments;
        $data['main_content'] = 'admin/transaction/list';
        $this->load->view('includes/template', $data);  
    }
    
    public function pending_withdraw(){
        $page = $this->uri->segment(3);
        if(!$page){
                $this->session->unset_userdata('conditions');
                $array_items = array('search_datetime' => '', 'search_username' => '');
                $this->session->unset_userdata($array_items);
            }
        if($this->input->server('REQUEST_METHOD') === 'POST') {
           //echo '<pre>';print_r($this->input->post());echo '</pre>';
           // exit;
            $search_data = $this->input->post();
            $datetime = $this->input->post('datetime');
            $username = $this->input->post('username');

            $session_data_set['search_datetime'] = $datetime;
            $session_data_set['search_username'] = $username;
            
            $this->session->set_userdata($session_data_set);
            if(isset($datetime) and $datetime !=''){
                $data['datetime'] = $datetime;
                $condition .= " and user_withdraw_fund.date like '%$datetime%'";
            }
            if(isset($username) and $username !=''){
                $data['username'] = $username;
                $condition .= " and membership.user_name like '%$username%'";
            }
        }
        $conditions = "user_withdraw_fund.status !='Withdrawadmin' and user_withdraw_fund.status ='pending' $condition";
        if(isset($condition) and $condition !=''){
            $session_data = array('conditions'=>$conditions);
            $this->session->set_userdata($session_data);
            $s_data = $this->session->userdata('conditions');//exit;
        }
         $s_data = $this->session->userdata('conditions');
        if($s_data){
            $conditions = $s_data;
        }
        $count = $this->common->get_withdraw_cnt_s('pending',$conditions);
         $config['base_url'] = base_url().'/transaction/pending_withdraw';
            $config['total_rows'] = $count;
            $config['per_page'] = PAGE_LIMIT; 
            $config['uri_segment']=3;
            $config['full_tag_open'] = '<ul>';
            $config['full_tag_close'] = '</ul>';
            $config['num_tag_open'] = '<li>';
            $config['num_tag_close'] = '</li>';
            $config['cur_tag_open'] = '<li class="active"><a>';
            $config['cur_tag_close'] = '</a></li>';
            if($this->uri->segment(3)==''){
                $offset =0;
            }else{
                $offset = $this->uri->segment(3);
            }
            $this->pagination->initialize($config);
        $data['withdraw'] = $this->common->get_withdraw_s('pending',$conditions,$offset);

        /*Check User Balance Starts*/
            foreach ($data['withdraw'] as $key => $withdraw) {
                $user_id = $withdraw['user_id'];
                $upd_user_funds_log = $this->user_fund_log_model->get_user__by_userid($user_id);
                $upd_credit = 0;
                $upd_debit = 0;
                foreach($upd_user_funds_log as $upd_user_fund_log){
                    $upd_credit += $upd_user_fund_log['credit'];
                    $upd_debit += $upd_user_fund_log['debit'];
                }
                $data['withdraw'][$key]['balance'] = $upd_debit - $upd_credit;
            }
            // pr($data['withdraw']);die;
        /*Check User Balance Ends*/
        
        //load the view
        $data['main_content'] = 'admin/transaction/withdraw_list';
        $this->load->view('includes/template', $data);  
    }
    
    public function success_deposit(){
        $page = $this->uri->segment(3);
        if(!$page){
                $this->session->unset_userdata('conditions');
                $array_items = array('search_datetime' => '', 'search_username' => '', 'search_transaction_id' => '');
                $this->session->unset_userdata($array_items);
            }
        if($this->input->server('REQUEST_METHOD') === 'POST') {
           //echo '<pre>';print_r($this->input->post());echo '</pre>';
           // exit;
            $datetime = $this->input->post('datetime');
            $username = $this->input->post('username');
            $transaction_id = $this->input->post('transaction_id');

            $datetime = $this->input->post('datetime');
            $username = $this->input->post('username');
            $transaction_id = $this->input->post('transaction_id');

            $session_data_set['search_datetime'] = $datetime;
            $session_data_set['search_username'] = $username;
            $session_data_set['search_transaction_id'] = $transaction_id;
            $this->session->set_userdata($session_data_set);

            $condition =  '';
            if(isset($datetime) and $datetime !=''){
                $data['datetime'] = $datetime;
                $condition .= " and o_payments.datetime like '%$datetime%'";
            }
            if(isset($username) and $username !=''){
                $data['username'] = $username;
                $condition .= " and membership.user_name like '%$username%'";
            }
            if(isset($transaction_id) and $transaction_id !=''){
                $data['transaction_id'] = $transaction_id;
                $condition .= " and o_payments.ref_no like '%$transaction_id%'";
            }
        }
        $select = "o_payments.*,membership.email_addres as email_addres, membership.user_name as user_name";
        $join = "o_payments left join membership on o_payments.user_id = membership.id";
        $conditions = " where o_payments.transaction_status = 'completed' $condition";
        
        if(isset($condition) and $condition !=''){
            $session_data = array('conditions'=>$conditions);
            $this->session->set_userdata($session_data);
            $s_data = $this->session->userdata('conditions');//exit;
        }
         $s_data = $this->session->userdata('conditions');
        if($s_data){
            $conditions = $s_data;
        }
         $count = $this->common->get_deposit_cnt($conditions);
         $config['base_url'] = base_url().'/transaction/success_deposit';
            $config['total_rows'] = $count;
            $config['per_page'] = PAGE_LIMIT; 
            $config['uri_segment']=3;
            $config['full_tag_open'] = '<ul>';
            $config['full_tag_close'] = '</ul>';
            $config['num_tag_open'] = '<li>';
            $config['num_tag_close'] = '</li>';
            $config['cur_tag_open'] = '<li class="active"><a>';
            $config['cur_tag_close'] = '</a></li>';
            if($this->uri->segment(3)==''){
                $offset =0;
            }else{
                $offset = $this->uri->segment(3);
            }
            $this->pagination->initialize($config);
        
        
        $payments = $this->common->find_deposit($select,$join,$conditions,$offset);
        $data['payments'] = $payments;
        $data['main_content'] = 'admin/transaction/list';
        $this->load->view('includes/template', $data);
    }
    
    public function success_withdraw(){
        $page = $this->uri->segment(3);
        if(!$page){
                $this->session->unset_userdata('conditions');
                $array_items = array('search_datetime' => '', 'search_username' => '');
                $this->session->unset_userdata($array_items);
            
            }
        if($this->input->server('REQUEST_METHOD') === 'POST') {
           //echo '<pre>';print_r($this->input->post());echo '</pre>';
           // exit;
            $search_data = $this->input->post();
            $datetime = $this->input->post('datetime');
            $username = $this->input->post('username');
            
            $session_data_set['search_datetime'] = $datetime;
            $session_data_set['search_username'] = $username;
            $this->session->set_userdata($session_data_set);

            if(isset($datetime) and $datetime !=''){
                $data['datetime'] = $datetime;
                $condition .= " and user_withdraw_fund.withdraw_date like '%$datetime%'";
            }
            if(isset($username) and $username !=''){
                $data['username'] = $username;
                $condition .= " and membership.user_name like '%$username%'";
            }
        }
        
        $conditions = "user_withdraw_fund.status !='Withdrawadmin' and user_withdraw_fund.status !='pending' $condition";
        if(isset($condition) and $condition !=''){
            $session_data = array('conditions'=>$conditions);
            $this->session->set_userdata($session_data);
            $s_data = $this->session->userdata('conditions');//exit;
        }
         $s_data = $this->session->userdata('conditions');
        if($s_data){
            $conditions = $s_data;
        }
        
         $count = $this->common->get_withdraw_cnt_s(null,$conditions);
         $config['base_url'] = base_url().'/transaction/success_withdraw';
            $config['total_rows'] = $count;
            $config['per_page'] = PAGE_LIMIT; 
            $config['uri_segment']=3;
            $config['full_tag_open'] = '<ul>';
            $config['full_tag_close'] = '</ul>';
            $config['num_tag_open'] = '<li>';
            $config['num_tag_close'] = '</li>';
            $config['cur_tag_open'] = '<li class="active"><a>';
            $config['cur_tag_close'] = '</a></li>';
            if($this->uri->segment(3)==''){
                $offset =0;
            }else{
                $offset = $this->uri->segment(3);
            }
            $this->pagination->initialize($config);
            
         $data['withdraw'] = $this->common->get_withdraw_s(null,$conditions,$offset);
        //load the view
        $data['main_content'] = 'admin/transaction/withdraw_list';
        $this->load->view('includes/template', $data);  
    }
    public function fundlog(){
        $page = $this->uri->segment(3);
        if(!$page){
                $this->session->unset_userdata('conditions');
            }
            
        if($this->input->server('REQUEST_METHOD') === 'POST') {
            $datetime = $this->input->post('datetime');
            $username = $this->input->post('username');
            $email = $this->input->post('email');
            $fund_type = $this->input->post('fund_type');
            
            $session_data_set['search_datetime'] = $datetime;
            $session_data_set['search_username'] = $username;
            $session_data_set['search_email'] = $email;
            $session_data_set['search_fund_type'] = $fund_type;
            $this->session->set_userdata($session_data_set);
            //echo $this->session->userdata('search_username');exit;            
            
            $con = array();
            if(isset($datetime) and $datetime !=''){
                $data['datetime'] = $datetime;
                $con['datetime'] = 'user_fund_log.date like "%'.addslashes(trim($datetime)).'%"';
                //$condition .= " and user_fund_log.date = '$datetime'";
            }
            if(isset($username) and $username !=''){
                $data['username'] = $username;
                $con['username'] = 'membership.user_name like "%'.addslashes(trim($username)).'%"';
            }
            if(isset($email) and $email !=''){
                $data['email'] = $email;
                $con['email'] = 'membership.email_addres like "%'.addslashes(trim($email)).'%"';
            }
            if(isset($fund_type) and $fund_type !=''){
                $data['fund_type'] = $fund_type;
                $con['fund_type'] = 'user_fund_log.fund_type like "%'.addslashes(trim($fund_type)).'%"';
            }
            if(!empty($data)){
                $this->session->set_userdata($data);
            }
            $impl = implode(' and ',$con);
            if(isset($impl) and $impl !=''){
                $impl = ' where '.$impl;
            }
            //echo '<pre>';print_r($con);echo '</pre>';exit;
        }
        
        $condition =  $impl;
        $select = "user_fund_log.*,membership.email_addres as email_addres, membership.user_name as user_name";
        $join = "user_fund_log left join membership on user_fund_log.user_id = membership.id";
        $conditions = $impl;
        if(isset($conditions) and $conditions !=''){
            $session_data = array('conditions'=>$conditions);
            $this->session->set_userdata($session_data);
            $s_data = $this->session->userdata('conditions');
        }
        $s_data = $this->session->userdata('conditions');
        if($s_data){
            $conditions = $s_data;
        }
        ///echo '<pre>'; print_r($conditions);exit;
            
            //echo $this->uri->segment(4);exit;
            $count = $this->common->logCount($conditions);
            $config['base_url'] = base_url().'/transaction/fundlog';
            $config['total_rows'] = $count;
            $config['per_page'] = PAGE_LIMIT; 
            $config['uri_segment']=3;
            $config['full_tag_open'] = '<ul>';
            $config['full_tag_close'] = '</ul>';
            $config['num_tag_open'] = '<li>';
            $config['num_tag_close'] = '</li>';
            $config['cur_tag_open'] = '<li class="active"><a>';
            $config['cur_tag_close'] = '</a></li>';
            	if($this->uri->segment(3)==''){
                    $offset =0;
                }else{
                    $offset = $this->uri->segment(3);
                }
            $this->pagination->initialize($config);
            
        $payments = $this->common->findlog($select,$join,$conditions,$offset);
        //echo '<pre>';print_r($payments);exit;
        $data['payments'] = $payments;
        $data['main_content'] = 'admin/transaction/logs';
        $this->load->view('includes/template', $data);
    }
    
    public function update() {
        //if save button was clicked, get the data sent via post
        if ($this->input->server('REQUEST_METHOD') === 'POST') {
            //form validation
            $this->form_validation->set_rules('ids', 'Checkbox Fields', 'required');
            $this->form_validation->set_error_delimiters('<div class="alert alert-error"><a class="close" data-dismiss="alert">�</a><strong>', '</strong></div>');

            if ($this->form_validation->run()) {
                //echo "<pre>";print_r($this->input->post());die;
                $approved_by_check = $this->input->post('approved_by_check');
                $approved_by_cash = $this->input->post('approved_by_cash');
                $cancelled = $this->input->post('cancelled');
                $ids = $this->input->post('ids');

                if ($approved_by_check == "Approved By Check") {
                    foreach ($ids as $id) {
                        $data_to_store = array(
                            'status' => 'Approved By cheque',
                        );
                        if ($this->withdraw_model->update_withdraw($id, $data_to_store)) {
                            $withdraw = $this->withdraw_model->get_withdraw_by_id($id);

                            $data_log = array(
                                'user_id' => $withdraw[0]['user_id'],
                                'detail' => 'Approved by admin with cheque',
                                'fund_type' => 'Withdraw',
                                'debit' => 0.00,
                                'credit' => $withdraw[0]['fund_amt'],
                                'property_id' => $withdraw[0]['property_id']
                            );
                            // Maintain Log
                            if ($this->user_fund_log_model->store_user_credit_payment($data_log)) {
                                $user_credit = $this->user_credit_model->get_user_credit_by_user_id($withdraw[0]['user_id']);
                                $user_credit['credit'] = $user_credit[0]['credit'] + $withdraw[0]['number_of_token'];
                                $data_credit = array(
                                    'credit' => $user_credit['credit']
                                );
                                $user_credit = $this->user_credit_model->update_user_credit_by_user_id($withdraw[0]['user_id'], $data_credit);
                            }
                        }
                    }
                }
                if ($approved_by_cash == "Approved By Cash") {
                    foreach ($ids as $id) {

                        $data_to_store = array(
                            'status' => 'Approved By Cash',
                        );
                        if ($this->withdraw_model->update_withdraw($id, $data_to_store)) {
                            $withdraw = $this->withdraw_model->get_withdraw_by_id($id);

                            $data_log = array(
                                'user_id' => $withdraw[0]['user_id'],
                                'detail' => 'Withdraw approved by admin with cash',
                                'fund_type' => 'Withdraw',
                                'debit' => 0.00,
                                'credit' => $withdraw[0]['fund_amt'],
                                'property_id' => $withdraw[0]['property_id']
                            );
                            // Maintain Log
                            if ($this->user_fund_log_model->store_user_credit_payment($data_log)) {
                                $user_credit = $this->user_credit_model->get_user_credit_by_id($withdraw[0]['user_id']);
                                $user_credit['credit'] = $user_credit['credit'] - $withdraw[0]['number_of_token'];
                                $data_credit = array(
                                    'credit' => $user_credit['credit']
                                );
                                $user_credit = $this->user_credit_model->update_user_credit_by_user_id($withdraw[0]['user_id'], $data_credit);
                            }
                        }
                    }
                }
                if ($cancelled == "Cancelled") {

                    foreach ($ids as $id) {

                        $data_to_store = array(
                            'status' => 'Cancelled',
                        );
                        if ($this->withdraw_model->update_withdraw($id, $data_to_store)) {
                            $withdraw = $this->withdraw_model->get_withdraw_by_id($id);

                            $data_log = array(
                                'user_id' => $withdraw[0]['user_id'],
                                'detail' => 'Withdraw ' . $withdraw[0]['fund_amt'] . ' cancelled by admin',
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
                redirect('transaction/pending_withdraw');
            }//validation run
            else {
                redirect('transaction/pending_withdraw?m="e"');
            }
        }
    }

//update

    public function pending_deposit_update(){
        if ($this->input->server('REQUEST_METHOD') === 'POST'){
            //echo '<pre>';print_r($this->input->post());exit;
              $approved=$this->input->post('approved');
              $cancelled = $this->input->post('cancelled');
              $ids= $this->input->post('ids');
              if($approved == 'Approved'){
                  if(empty($ids)){
                      redirect('transaction/pending_deposit?n=1');
                  }
                  foreach($ids as $id){
                     $paymentdata =  $this->common->findById('o_payments',$id);
                     $membership =  $this->common->findById('membership',$paymentdata->user_id);
                     //print_r($membership);exit;
                     $o_payment_update = array(
                         'transaction_status'=>'Completed'
                     );
                     $cheque_no = $paymentdata->cheque_no;
                     $this->common->edit('o_payments',$o_payment_update,$id);
                     $data_log = array(
                                        'user_id' => $membership->id,
                                        //'detail' => 'Cheque',
                                        'detail' => 'Transaction Approved by the admin with '.$paymentdata->txn_type.' '.$cheque_no,
                                        'fund_type' => 'Deposit',
                                        'debit' => $paymentdata->amount,
                                        'credit' => 0,     
                           );
                            // Maintain Log
                     
                            $this->user_fund_log_model->store_user_credit_payment($data_log);
                            $data_to_store = array(
                                    'user_id' => $membership->id,
                                    'username' => $membership->user_name,
                                    'credit' => $paymentdata->amount,
                                    'transaction_id' => '',
                                    'transaction_status' => 'Completed',
                                    'amount' => $paymentdata->amount,		     
                            );
                            //print_r($data_to_store);exit;
                        if($query = $this->user_credit_model->store_user_credit_payment($data_to_store)){
                            $user_credit_from_payment = $this->user_credit_model->get_user_credit_from_payment();     
                            //print_r($user_credit_from_payment);exit;
                            $user_id_from_payment = $paymentdata->user_id;//$this->session->userdata('user_id');
                             $credit_from_payment = $paymentdata->amount;
                             $credit_from_payment = $credit_from_payment / 10;
                            $this->load->model('common');
                            $user_data = $this->common->findById('membership',$paymentdata->user_id);
                            $username_payment=$user_data->user_name;//$this->session->userdata('user_name');
                            $check=$this->user_credit_model->check_user_id_from_payment($paymentdata->user_id);
                            
                            
                            //echo '<pre>';print_r($check);exit;
                            if($check==""){
                                    $this->user_credit_model->add_user_id_from_payment($user_id_from_payment, $credit_from_payment, $username_payment); 
                            }else{
                                    $user_credit_user_id=$this->user_credit_model->get_user_credit_by_user_id($user_id_from_payment);  
                                    $credit_payment= $user_credit_user_id[0]['credit'];
                                    $credit_from_payment= $credit_from_payment+$credit_payment;
                                    $this->user_credit_model->update_user_id_from_payment($user_id_from_payment, $credit_from_payment, $username_payment); 
                            }
                        }
                  }
                  redirect('transaction/success_deposit');
                  //echo '<pre>';print_r($this->input->post());exit;
              }else if($cancelled == 'Cancelled'){
                  if(!empty($ids)){
                    foreach($ids as $id){
                       $paymentdata =  $this->common->findById('o_payments',$id);
                       $o_payment_update = array(
                           'transaction_status'=>'Cancelled'
                       );
                       $this->common->edit('o_payments',$o_payment_update,$id);
                    }
                  }else{
                      redirect('transaction/pending_deposit?n=1');
                  }
                  redirect('transaction/pending_deposit');
              }
              
        }
    }
    
    public function payment_approve($id,$user_id=null){
        $data['id'] = $id;
        if($user_id == null){
            $user_id = $id;
        }
        $upd_user_funds_log = $this->user_fund_log_model->get_user__by_userid($user_id);
        $upd_credit = 0;
        $upd_debit = 0;
        // pr($upd_user_funds_log);
        foreach($upd_user_funds_log as $upd_user_fund_log){
            $upd_credit += $upd_user_fund_log['credit'];
            $upd_debit += $upd_user_fund_log['debit'];
        }
        // echo $upd_debit."<br/>";
        // echo $upd_credit."<br/><br/>";
        $balance = $upd_debit - $upd_credit;



        if($this->input->server('REQUEST_METHOD') === 'POST'){
          //echo '<pre>';print_r($this->input->post());echo '</pre>';
          $payment_method = $this->input->post('withdraw_method');
          $bank_name = $this->input->post('bank_name');
          $cheque_no = $this->input->post('cheque_no');
          $cancelled = $this->input->post('cancelled');
            if(isset($cancelled) and $cancelled =='Cancelled'){
                $data_to_store = array(
                    'status' => 'Cancelled',
                    'withdraw_date'=>date('Y-m-d H:i:s')
                );
                if ($this->withdraw_model->update_withdraw($id, $data_to_store)) {
                    $withdraw = $this->withdraw_model->get_withdraw_by_id($id);

                    $data_log = array(
                        'user_id' => $withdraw[0]['user_id'],
                        'detail' => 'Withdraw ' . $withdraw[0]['fund_amt'] . ' cancelled by admin',
                        'fund_type' => 'withdraw',
                        'debit' => 0.00,
                        'credit' => 0.00,
                        'property_id' => $withdraw[0]['property_id']
                    );
                    // Maintain Log
                    $this->user_fund_log_model->store_user_credit_payment($data_log);
                }
                echo '<script> 
                            
                            parent.$.fancybox.close();
                             window.parent.location.href = "/transaction/pending_withdraw";
                            
                         </script>';
            }else if(isset($payment_method) and $payment_method == 'Cash'){
                    
                    $withdraw = $this->withdraw_model->get_withdraw_by_id($id);
                    
                    // echo $balance."<br/>";
                    // echo $withdraw[0]['fund_amt']."<br/><br/>";die;
                    if($balance >= $withdraw[0]['fund_amt']){
                        $data_to_store = array(
                                'status' => 'Approved By Cash',
                                'withdraw_date'=>date('Y-m-d H:i:s')
                            );
                        if($this->withdraw_model->update_withdraw($id, $data_to_store)) {
                            $data_log = array(
                                'user_id' => $withdraw[0]['user_id'],
                                'detail' => 'Withdraw approved by admin with cash',
                                'fund_type' => 'Withdraw',
                                'debit' => 0.00,
                                'credit' => $withdraw[0]['fund_amt'],
                                'property_id' => $withdraw[0]['property_id']
                            );
                            // Maintain Log
                            if ($this->user_fund_log_model->store_user_credit_payment($data_log)) {
                                $user_credit = $this->user_credit_model->get_user__by_userid($withdraw[0]['user_id']);
                                $user_credit['credit'] = $user_credit[0]['credit'] - $withdraw[0]['number_of_token'];
                                $data_credit = array(
                                    'credit' => $user_credit['credit']
                                );
                                $user_credit = $this->user_credit_model->update_user_credit_by_user_id($withdraw[0]['user_id'], $data_credit);
                            }

                        }
                        echo '<script> 
                                
                                parent.$.fancybox.close();
                                window.parent.location.href = "/transaction/success_withdraw";
                                
                             </script>';
                    }else{
                        echo '<script> 

                            alert("User Dont have sufficient fund. Please Reload Page");
                            parent.$.fancybox.close();


                        </script>';
                    }
            }else if(isset($payment_method) and $payment_method == 'Cheque'){
                $withdraw = $this->withdraw_model->get_withdraw_by_id($id);
                    
                    // echo $balance."<br/>";
                    // echo $withdraw[0]['fund_amt']."<br/><br/>";die;
                    if($balance >= $withdraw[0]['fund_amt']){
                        $data_to_store = array(
                                    'status' => 'Approved By cheque',
                                    'bank_name'=>$bank_name,
                                    'cheque_no'=>$cheque_no,
                                    'withdraw_date'=>date('Y-m-d H:i:s')
                                );
                                if ($this->withdraw_model->update_withdraw($id, $data_to_store)) {
                                    $withdraw = $this->withdraw_model->get_withdraw_by_id($id);

                                    $data_log = array(
                                        'user_id' => $withdraw[0]['user_id'],
                                        'detail' => 'Approved by admin with cheque '.$cheque_no,
                                        'fund_type' => 'Withdraw',
                                        'debit' => 0.00,
                                        'credit' => $withdraw[0]['fund_amt'],
                                        'property_id' => $withdraw[0]['property_id']
                                    );
                                    // Maintain Log
                                    if ($this->user_fund_log_model->store_user_credit_payment($data_log)) {
                                        $user_credit = $this->user_credit_model->get_user__by_userid($withdraw[0]['user_id']);
                                        $user_credit['credit'] = $user_credit[0]['credit'] - $withdraw[0]['number_of_token'];
                                        $data_credit = array(
                                            'credit' => $user_credit['credit']
                                        );
                                        $user_credit = $this->user_credit_model->update_user_credit_by_user_id($withdraw[0]['user_id'], $data_credit);
                                    }
                                }
                                echo '<script> 
                                    
                                    parent.$.fancybox.close();
                                     window.parent.location.href = "/transaction/success_withdraw";
                                    
                                 </script>';
                    }else{
                        echo '<script> 

                            alert("User Dont have sufficient fund. Please Reload Page");
                            parent.$.fancybox.close();


                        </script>';
                    }
                }
        }
        $this->load->view('admin/transaction/payment_approve',$data);
    }
    
    public function transaction_autotrack_log(){
	/* Searching Function */

	$filter_session_data = array();

	if($this->input->server('REQUEST_METHOD') === 'POST'){
          $datetime = $this->input->post('datetime');
          $username = $this->input->post('username');
          $email = $this->input->post('email');
          $property_name = $this->input->post('property_name');
	}
	  
	//pagination settings
        $config['per_page'] = 20;
        $config['base_url'] = base_url().'transaction/transaction_autotrack_log';
        $config['use_page_numbers'] = TRUE;
        $config['num_links'] = 20;
        $config['full_tag_open'] = '<ul>';
        $config['full_tag_close'] = '</ul>';
        $config['num_tag_open'] = '<li>';
        $config['num_tag_close'] = '</li>';
        $config['cur_tag_open'] = '<li class="active"><a>';
        $config['cur_tag_close'] = '</a></li>';
	
	$page = $this->uri->segment(3);
    
        //math to get the initial record to be select in the database
        $limit_end = ($page * $config['per_page']) - $config['per_page'];
        if ($limit_end < 0){
            $limit_end = 0;
        }
	
	 if($datetime or $username  or $email or  $property_name  or $this->uri->segment(3) == true){ 
           
            /*
            The comments here are the same for line 79 until 99

            if post is not null, we store it in session data array
            if is null, we use the session data already stored
            we save order into the the var to load the view with the param already selected       
            */

            if( $datetime){
                $filter_session_data['filter_datetime'] = $datetime;
                $data['datetime'] =  $datetime;
            }
            if($username){
                $filter_session_data['filter_username'] = $username;
                $data['username'] = $username;
            }

            if($email){
                $filter_session_data['filter_email'] = $email;
                $data['email'] = $email;
            }

            if( $property_name){
                $filter_session_data['filter_property_name'] =  $property_name;
                $data['property_name'] =  $property_name;
            }            

            //save session data into the session
            $this->session->set_userdata($filter_session_data);

            if($page && ($this->session->userdata("filter_datetime") || $this->session->userdata("filter_username") || $this->session->userdata("filter_email") || $this->session->userdata("filter_property_name"))){
		$var = $this->session->userdata;
                $datetime = $var['filter_datetime'];
                $username = $var['filter_username'];
                $email = $var['filter_email'];
                $property_name = $var['filter_property_name'];
            }
//	    else{
//		//die;
//		$data['datetime'] = '';
//		$data['username'] = '';
//		$data['email'] = '';
//		$data['property_name'] = '';
//                $filter_session_data['filter_datetime'] = '';
//                $filter_session_data['filter_username'] = '';
//                $filter_session_data['filter_email'] = '';
//                $filter_session_data['filter_property_name'] = '';
//                $this->session->set_userdata($filter_session_data);
//	    }
	    $data['datetime'] = $datetime;
	    $data['username'] = $username;
	    $data['email'] = $email;
	    $data['property_name'] = $property_name;

            $data['count_transaction_autotrack_log']= $this->user_autotracking_log_model->count_transaction_autotrack_log($datetime, $username, $email, $property_name);
            $config['total_rows'] = $data['count_transaction_autotrack_log'];
	 
            //fetch sql data into arrays	       
	    $data['log_details'] = $this->user_autotracking_log_model->get_autotracking_log($datetime, $username, $email, $property_name, $config['per_page'], $limit_end);
            
        }else{
	    if(isset($page)){
                //$datetime = $filter_session_data['filter_datetime'];
                //$username = $filter_session_data['filter_username'];
                //$email = $filter_session_data['filter_email'];
                //$property_name = $filter_session_data['filter_property_name'];
		$datetime = $this->input->post('datetime');
		$username = $this->input->post('username');
		$email = $this->input->post('email');
		$property_name = $this->input->post('property_name');
	    }

	    //make the data type var avaible to our view
        
                  $filter_session_data['filter_datetime'] = $datetime;
                  $filter_session_data['filter_username'] = $username;
                  $filter_session_data['filter_email'] = $email;
                  $filter_session_data['filter_property_name'] = $property_name;
                  //save session data into the session
                  $this->session->set_userdata($filter_session_data);

                  $data['datetime'] = $datetime;
                  $data['username'] = $username;
                  $data['email'] = $email;
                  $data['property_name'] = $property_name;

            
            
            //fetch sql data into arrays
          
            $data['count_transaction_autotrack_log']= $this->user_autotracking_log_model->count_transaction_autotrack_log($datetime, $username, $email, $property_name);
            $config['total_rows'] = $data['count_transaction_autotrack_log'];
	    $data['log_details'] = $this->user_autotracking_log_model->get_autotracking_log('','','','', $config['per_page'], $limit_end);
         

        }//!isset($manufacture_id) && !isset($search_string) && !isset($order)

	//initializate the panination helper 
        $this->pagination->initialize($config);   
	
	$data['main_content'] = 'admin/transaction/transaction_autotrack_logs';
        $this->load->view('includes/template', $data);  
    }
}
