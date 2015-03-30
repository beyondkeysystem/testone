<?php
class User_fund_log_model extends CI_Model {
 
    /**
    * Responsable for auto load the database
    * @return void
    */
    public function __construct()
    {
        $this->load->database();		
    }

    /**
    * Get product by his is
    * @param int $product_id 
    * @return array
    */
    public function get_user_credit_by_id($id)
    {
		$this->db->select('*');
		$this->db->from('user_fund_log');
		$this->db->where('id', $id);
		$query = $this->db->get();
		return $query->result_array(); 
    }
    
     public function get_user__by_userid($id)
    {
		$this->db->select('*');
		$this->db->from('user_fund_log');
		$this->db->where('user_id', $id);
		$query = $this->db->get();
		return $query->result_array(); 
    }
    
     public function get_credit__by_userid($id)
    {
		$this->db->select('*');
		$this->db->from('user_fund_log');
		$this->db->where('user_id', $id);
		$query = $this->db->get();
		return $query->result_array(); 
    }
    
    public function get_user_credit_by_userid($id)
    {
		$this->db->select('*');
		$this->db->from('user_fund_log');
		$this->db->where('user_id', $id);
		$query = $this->db->get();
		return $query->result_array(); 
    }
     
    /**
    * Fetch user_credit data from the database
    * possibility to mix search, filter and order
    * @param int $manufacuture_id 
    * @param string $search_string 
    * @param strong $order
    * @param string $order_type 
    * @param int $limit_start
    * @param int $limit_end
    * @return array
    */
    public function get_user_fund_log()
    {
	    
		$this->db->select('*');
		$this->db->from('user_fund_log');

	    $this->db->group_by('id');
		$query = $this->db->get();
		
		return $query->result_array(); 	
    }

    
     public function get_user_credit_payment()
    {
	    
		$this->db->select('*');
		$this->db->from('user_fund_log');
		$query = $this->db->get();
		
		return $query->result_array(); 	
    }
    
    
   
    function update_user_credit($id, $data)
    {
		$this->db->where('id', $id);
		$this->db->update('user_fund_log', $data);
		$report = array();
		$report['error'] = $this->db->_error_number();
		$report['message'] = $this->db->_error_message();
		if($report !== 0){
			return true;
		}else{
			return false;
		}
	}

    function store_user_credit($data)
    {
		$insert = $this->db->insert('user_fund_log', $data);
	    return $insert;
	}
	
      function store_user_credit_payment($data)
    {
		$insert = $this->db->insert('user_fund_log', $data);
	    return $this->db->insert_id();
    }

    
    function add_user_id_from_payment($user_id, $credit, $debit, $detail, $fund_type)
	{
		$insert_data = array(
				'user_id' => $user_id_from_payment,
				'credit' => $credit,
				'debit' => $debit,
				'detail' => $detail				
			);
			$insert = $this->db->insert('user_fund_log', $insert_data);
			return $insert;
	}
    
    function update_user_id_from_payment($user_id, $credit, $debit, $detail, $fund_type)
	{
		$data = array(
			'user_id' => $user_id,
			'credit' => $credit,
			'debit' => $debit,
			'detail' => $detail
		);

	    $this->db->where('user_id', $user_id);
	    $this->db->update('user_credit', $data); 		
	}
	
	function update_by_user_id($user_id, $credit, $debit, $detail, $fund_type)
	{
		$data = array(
		    'user_id' => $user_id,
			'credit' => $credit,
			'debit' => $debit,
			'detail' => $detail
        );

	    $this->db->where('user_id', $user_id);
	    $this->db->update('user_credit', $data); 		
	}
	//Code By Me Start
     public function get_profit_loss_logs_by_property_id($search_string=null,$property_id=null)
    {
		$this->db->select('user_fund_log.id');
		$this->db->select('fund_type');
		$this->db->select('detail');
		$this->db->select('date');
		$this->db->select('debit');
		$this->db->select('credit');
		// $this->db->select('membership.user_name');
		$this->db->from('user_fund_log');
		// $this->db->join('membership', 'membership.id = user_fund_log.user_id');
		$this->db->where('fund_type','ProfitandLoss');   //Mayank Pawar Date 26.11.14
		if($property_id){
		$this->db->where('property_id', $property_id);
		}
		// if($search_string){
		// 	$this->db->like('membership.user_name', $search_string);
		// }
		$query = $this->db->get();
		return $query->result_array(); 
    }
	
	  public function get_user_profit_loss_log()
    {
	    
		$this->db->select('user_fund_log.id');
		$this->db->select('fund_type');
		$this->db->select('detail');
		$this->db->select('date');
		$this->db->select('debit');
		$this->db->select('credit');
		$this->db->select('property_id');
		$this->db->select('p.property_name');
		// $this->db->select('membership.user_name');
		$this->db->from('user_fund_log');
		// $this->db->join('membership', 'membership.id = user_fund_log.user_id');
		$this->db->join('property AS p','p.id = property_id');
	    // $this->db->group_by('id');
	    $this->db->where('fund_type', 'ProfitandLoss');
		$query = $this->db->get();
		
		return $query->result_array(); 	
    }
    
     public function get_user_profit_loss_log1($limit_start, $limit_end)
    {
	    
		$this->db->select('user_fund_log.id');
		$this->db->select('fund_type');
		$this->db->select('detail');
		$this->db->select('date');
		$this->db->select('debit');
		$this->db->select('credit');
		$this->db->select('property_id');
		$this->db->select('p.property_name');
		// $this->db->select('membership.user_name');
		$this->db->from('user_fund_log');
		// $this->db->join('membership', 'membership.id = user_fund_log.user_id');
		$this->db->join('property AS p','p.id = property_id');
	    // $this->db->group_by('id');
	    $this->db->where('fund_type', 'ProfitandLoss');
	    $this->db->limit($limit_start, $limit_end);
		$query = $this->db->get();
		
		return $query->result_array(); 	
    }
    
     function count_user_profit_loss_log()
    {
		//$this->db->select('*');
		//$this->db->from('property');
		//$this->db->where('property_status !=', 'blocked');
		$this->db->select('user_fund_log.id');
		$this->db->select('fund_type');
		$this->db->select('detail');
		$this->db->select('date');
		$this->db->select('debit');
		$this->db->select('credit');
		$this->db->select('property_id');
		$this->db->select('p.property_name');
		// $this->db->select('membership.user_name');
		$this->db->from('user_fund_log');
		$this->db->join('property AS p','p.id = property_id');
	    // $this->db->group_by('id');
	       $this->db->where('fund_type', 'ProfitandLoss');
		$query = $this->db->get();
		return $query->num_rows();
    }
    /*
	** by Mayank Pawar
	** Date: 21.11.14
	** Modified Date: 24.11.14
	*/
	public function sales_phase_two_log_entry_buy($user_id,$total_credit_amt,$property_id,$total_share,$property_name){ //UPdate mayank pawar 25.11.14
		$this->db->set('user_id',$user_id);
		$this->db->set('fund_type','Buy');
		$this->db->set('detail',"Buy $total_share% Shares for Property $property_name");
		$this->db->set('credit', $total_credit_amt);
		$this->db->set('property_id', $property_id);
		$this->db->insert('user_fund_log');
		return $this->db->insert_id();

	}

	public function sales_phase_two_log_entry_sell($user_id,$total_debit_amt,$property_id,$total_share, $property_name){ //Update mayank pawar 25.11.14
		$this->db->set('user_id',$user_id);
		$this->db->set('fund_type','Sell');
		$this->db->set('detail',"Sold $total_share Shares of Property $property_name");
		$this->db->set('debit', $total_debit_amt);
		$this->db->set('property_id', $property_id);
		$this->db->insert('user_fund_log');
		return "true";

	}
	/*End*/
 

 	/*
	** by Mayank Pawar
	** Date: 25.11.14
	** Modified Date: 25.11.14
	*/
	public function get_profit_loss($property_id){
        $this->db->select('sum(credit) totalcredit, sum(debit) totaldebit, sum(debit-credit) diff');
        $this->db->from('user_fund_log');
        $this->db->where('fund_type','ProfitandLoss');
       	$this->db->where('property_id',$property_id);
        $query = $this->db->get();
        return $query->result_array();
    }

    public function set_profit_loss($data){
    	// print_r($data);die;
    	$insert = $this->db->insert('user_fund_log',$data);
        return $this->db->insert_id();
    }

    public function delete_user_profit_loss_log($id){			//Mayank Pawar 27.11.14
    	$this->db->where('id',$id);
    	$this->db->delete('user_fund_log');
    }

    public function update_user_profit_loss_log($id,$data){		//Mayank Pawar 27.11.14
    	$this->db->where('id',$id);
    	$this->db->update('user_fund_log',$data);
    	return true;
    }
    public function get_user_log_by_userid($id)
    {
		$this->db->select('user_fund_log.*');
		$this->db->select('membership.user_name');
		$this->db->select('property.property_name');
		$this->db->from('user_fund_log');
		$this->db->join('membership', 'membership.id = user_fund_log.user_id');
		$this->db->join('property', 'property.id = user_fund_log.property_id');
		$this->db->where('user_id', $id);
		$query = $this->db->get();
		return $query->result_array(); 
    }
    
     public function get_user_log_by_userid1($id, $limit_start, $limit_end)
    {
		$this->db->select('user_fund_log.*');
		$this->db->select('membership.user_name');
		$this->db->select('property.property_name');
		$this->db->from('user_fund_log');
		$this->db->join('membership', 'membership.id = user_fund_log.user_id');
		$this->db->join('property', 'property.id = user_fund_log.property_id');
		$this->db->where('user_id', $id);
		$this->db->limit($limit_start, $limit_end);
		$query = $this->db->get();
		return $query->result_array(); 
    }
    
     function store_user_chart($data)
    {
		$insert = $this->db->insert('chart_property_price_time', $data);
	    return $insert;
	}

	/* Mayank Pawar
	** Date : 24/12/2014
	*/
	public function get_user_profit_loss_log_by_property($property_id)
    {
	    $property_id = intval($property_id);
		$this->db->select('user_fund_log.id');
		$this->db->select('fund_type');
		$this->db->select('detail');
		$this->db->select('date');
		$this->db->select('debit');
		$this->db->select('credit');
		$this->db->select('property_id');
		$this->db->select('p.property_name');
		// $this->db->select('membership.user_name');
		$this->db->from('user_fund_log');
		// $this->db->join('membership', 'membership.id = user_fund_log.user_id');
		$this->db->join('property AS p','p.id = property_id');
	    // $this->db->group_by('id');
	    $this->db->where('fund_type', 'ProfitandLoss');
		$this->db->where('property_id',$property_id);
		$query = $this->db->get();
		
		return $query->result_array(); 	
    }
 
 	 public function get_profit_loss_logs_by_property_id1($search_string=null,$property_id=null)
    {
		$this->db->select('user_fund_log.id');
		$this->db->select('fund_type');
		$this->db->select('detail');
		$this->db->select('date');
		$this->db->select('debit');
		$this->db->select('credit');
		$this->db->select('sum(debit-credit) profit_loss');
		// $this->db->select('membership.user_name');
		$this->db->from('user_fund_log');
		// $this->db->join('membership', 'membership.id = user_fund_log.user_id');
		$this->db->where('fund_type','ProfitandLoss');   //Mayank Pawar Date 26.11.14
		if($property_id){
		$this->db->where('property_id', $property_id);
		}
		// if($search_string){
		// 	$this->db->like('membership.user_name', $search_string);
		// }
		$query = $this->db->get();
		return $query->result_array(); 
    }

	public function get_all_profit_loss(){
        $this->db->select('sum(credit) totalcredit, sum(debit) totaldebit, sum(debit-credit) diff, user_id');
        $this->db->select('membership.user_name');
        $this->db->from('user_fund_log');
        $this->db->join('membership','membership.id = user_id', 'left');
        $this->db->group_by('user_id');
        $this->db->where('user_id !=', '1');
        $query = $this->db->get();
        return $query->result_array();
    }
    public function get_all_profit_loss1($limit_start, $limit_end){
        $this->db->select('sum(credit) totalcredit, sum(debit) totaldebit, sum(debit-credit) diff, user_id');
        $this->db->select('membership.user_name');
        $this->db->from('user_fund_log');
        $this->db->join('membership','membership.id = user_id', 'left');
        $this->db->group_by('user_id');
        $this->db->where('user_id !=', '1');
	$this->db->limit($limit_start, $limit_end);
        $query = $this->db->get();
        return $query->result_array();
    }
    
     function count_user_credit()
    {
		//$this->db->select('*');
		//$this->db->from('property');
		//$this->db->where('property_status !=', 'blocked');
		 $this->db->select('sum(credit) totalcredit, sum(debit) totaldebit, sum(debit-credit) diff, user_id');
        $this->db->select('membership.user_name');
        $this->db->from('user_fund_log');
        $this->db->join('membership','membership.id = user_id', 'left');
        $this->db->group_by('user_id');
        $this->db->where('user_id !=', '1');
		$query = $this->db->get();
		return $query->num_rows();
    }
    
      public function count_user_log_by_userid($id)
    {
		$this->db->select('user_fund_log.*');
		$this->db->select('membership.user_name');
		$this->db->select('property.property_name');
		$this->db->from('user_fund_log');
		$this->db->join('membership', 'membership.id = user_fund_log.user_id');
		$this->db->join('property', 'property.id = user_fund_log.property_id');
		$this->db->where('user_id', $id);
		$query = $this->db->get();
		return $query->num_rows();
    }
    
   

}	
