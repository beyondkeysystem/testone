
<?php
class Admin_profit_and_loss_fund_management extends CI_Controller {
 
    /**
    * Responsable for auto load the model
    * @return void
    */
    public function __construct()
    {
       
        parent::__construct();
      
        $this->load->model('user_share_limits_model');
        $this->load->model('roles_model');
        $this->load->model('user_property_model');
        $this->load->model('profit_loss_fund_log_model');
        $this->load->model('property_model');
        $this->load->model('users_model');
        $this->load->model('user_fund_log_model');
        $this->load->model('user_credit_model');
        $this->load->model('profit_loss_fund_log_model');
        $this->load->model('credit_price_model');
        $this->load->library('pagination');
        
        if(( $this->session->userdata('is_logged_in') && ($this->session->userdata('type') != 'admin')) ){
            redirect('admin/login');
           
        }
        
          if(( !$this->session->userdata('is_logged_in')) ){
           
            ?>
           <script>
            window.location = "login";
           </script>
           
           <?php
        }
        

       
            
    }

    /**
    * Load the main view with all the current model model's data.
    * @return void
    */
    public function index()
    {   
        //pagination settings
        $config['per_page'] = 20;

        $config['base_url'] = base_url().'admin/profit_and_loss_fund_manage';
        $config['use_page_numbers'] = TRUE;
        $config['num_links'] = 5;
        $config['full_tag_open'] = '<ul>';
        $config['full_tag_close'] = '</ul>';
        $config['num_tag_open'] = '<li>';
        $config['num_tag_close'] = '</li>';
        $config['cur_tag_open'] = '<li class="active"><a>';
        $config['cur_tag_close'] = '</a></li>';

        $data['per_page'] = $config['per_page'];
        //limit end
        $page = $this->uri->segment(3);

        //math to get the initial record to be select in the database
        $limit_end = ($page * $config['per_page']) - $config['per_page'];
        if ($limit_end < 0){
            $limit_end = 0;
        }

        $data['profit_loss_fund_log'] = $this->profit_loss_fund_log_model->get_profit_loss_log_limit($config['per_page'],$limit_end);        
        $data['count_profit_loss_fund_log'] = $this->profit_loss_fund_log_model->count_get_profit_loss_log_limit();
        $config['total_rows'] = $data['count_profit_loss_fund_log'];
        
        
        //initializate the panination helper 
        $this->pagination->initialize($config);   
        
        // echo "<pre>";print_r($_SERVER);die;
        // echo "<pre>";print_r($data);die;
        $data['main_content'] = 'admin/profit_loss_fund_manage/list';
        $this->load->view('includes/template', $data);  

    }//index

    public function action(){

        if ($this->input->server('REQUEST_METHOD') === 'POST'){
            $profit_loss_id = $this->input->post('profit_loss_id');
            $credit_det = $this->credit_price_model->get_credit_price();
            $credit_price = $credit_det[0]['price'];
            
            if($this->input->post('cancelled')){
                $status = $this->input->post('cancelled');
                foreach($profit_loss_id as $profit_loss_id){
                    $result = $this->profit_loss_fund_log_model->get_profit_loss_by_id($profit_loss_id);
                    $user_id = $result[0]['user_id'];
                    $this->profit_loss_fund_log_model->update_profit_loss_by_id($profit_loss_id,$status);
                    $data1 = array(
                                    'user_id'=>$user_id,
                                    'fund_type'=>'Cancelled',
                                    'property_id'=>$property_id,
                                    'detail'=>$status.' by Admin'
                                );
                    $this->user_fund_log_model->set_profit_loss($data1);
                }
            }
            else {
                if($this->input->post('approved_by_check')){
                    $status = $this->input->post('approved_by_check');
                }else if($this->input->post('approved_by_cash')){
                    $status = $this->input->post('approved_by_cash');
                }
                foreach($profit_loss_id as $profit_loss_id){
                    $result = $this->profit_loss_fund_log_model->get_profit_loss_by_id($profit_loss_id);
                    $user_fund_log_id = $result[0]['user_fund_log_id'];
                    $debit_amt = $result[0]['debit'];
                    $user_id = $result[0]['user_id'];
                    $debit_token = $debit_amt/$credit_price;
                    $res = $this->user_credit_model->update_user_credit_debit_by_id($user_id,$debit_token);
                    if($res){
                        $this->profit_loss_fund_log_model->update_profit_loss_by_id($profit_loss_id,$status);    
                    }
                    $user_fund_log_det = $this->user_fund_log_model->get_user_credit_by_id($user_fund_log_id);
                    $property_id = $user_fund_log_det[0]['property_id'];
                    $data1 = array(
                                    'user_id'=>$user_id,
                                    'fund_type'=>'Deposit',
                                    'property_id'=>$property_id,
                                    'detail'=>'Approved Profit amount of '.$debit_amt.' MYR by Admin '.$status,
                                    'debit'=>$debit_amt
                                );
                    $this->user_fund_log_model->set_profit_loss($data1);
                }
            }
            
        }

        $this->index();
            
    }
}
?> 