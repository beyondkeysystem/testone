<?php
class User_credit_model extends CI_Model {
 
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
		$this->db->from('user_credit');
		$this->db->where('id', $id);
		$query = $this->db->get();
		return $query->result_array(); 
    }
    
     public function get_user__by_userid($id)
    {
		$this->db->select('*');
		$this->db->from('user_credit');
		$this->db->where('user_id', $id);
		$query = $this->db->get();
		return $query->result_array(); 
    }
    
     public function get_credit__by_userid($id)
    {
		$this->db->select('credit');
		$this->db->from('user_credit');
		$this->db->where('user_id', $id);
		$query = $this->db->get();
		return $query->result_array(); 
    }
    
    public function get_user_credit_by_userid($id)
    {
		$this->db->select('*');
		$this->db->from('user_payment_credit');
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
    public function get_user_credit()
    {
	    
		$this->db->select('id');
		$this->db->select('credit');
		$this->db->select('user_id');
		$this->db->select('username');
		$this->db->from('user_credit');

	       $this->db->group_by('id');
		$query = $this->db->get();
		
		return $query->result_array(); 	
    }

    
     public function get_user_credit_payment()
    {
	    
		$this->db->select('*');
		$this->db->from('user_payment_credit');
		$query = $this->db->get();
		
		return $query->result_array(); 	
    }
    
    
   
    function update_user_credit($id, $data)
    {
		$this->db->where('id', $id);
		$this->db->update('user_credit', $data);
		$report = array();
		$report['error'] = $this->db->_error_number();
		$report['message'] = $this->db->_error_message();
		if($report !== 0){
			return true;
		}else{
			return false;
		}
	}

    function delete_user_credit($id){
		$this->db->where('id', $id);
		$this->db->delete('user_credit'); 
	}
        
        
     function store_user_credit($data)
    {
		$insert = $this->db->insert('user_credit', $data);
	    return $insert;
	}
	
      function store_user_credit_payment($data)
    {
		$insert = $this->db->insert('user_payment_credit', $data);
	    return $insert;
    }

      function get_user_credit_from_payment()
    {
		$this->db->select('user_id');
		$this->db->select_sum('credit');
		$this->db->from('user_payment_credit');
		
		$query = $this->db->get();
	     return $query->result_array();
    }
    
    function check_user_id_from_payment($id)
	{
		$this->db->where('user_id', $id);
		$query = $this->db->get('user_credit');
		
		if($query->num_rows == 1)
		{
			return true;
		}		
	}
	
    
     function add_user_id_from_payment($user_id_from_payment, $credit_from_payment, $username_payment)
	{
		$new_member_insert_data = array(
				'user_id' => $user_id_from_payment,
				'username' => $username_payment,
				'credit' => $credit_from_payment,			
				
			);
			$insert = $this->db->insert('user_credit', $new_member_insert_data);
			return $insert;
	}
    
     function update_user_id_from_payment($user_id_from_payment, $credit_from_payment, $username_payment)
	{
		$data = array(
		 'username' => $username_payment,
		 'credit' => $credit_from_payment,
            );

	    $this->db->where('user_id', $user_id_from_payment);
	    $this->db->update('user_credit', $data); 		
	}
	
	function update_by_user_id($user_id_from_payment, $credit_from_payment)
	{
		$data = array(
		 'credit' => $credit_from_payment,
            );

	    $this->db->where('user_id', $user_id_from_payment);
	    $this->db->update('user_credit', $data);
	    return true;
	}
	//Code By Me Start
	 function update_user_credit_by_user_id($id, $data)
    {
		$this->db->where('user_id', $id);
		$this->db->update('user_credit', $data);
		$report = array();
		$report['error'] = $this->db->_error_number();
		$report['message'] = $this->db->_error_message();
		if($report !== 0){
			return true;
		}else{
			return false;
		}
	}
	
	 public function get_user_credit_by_user_id($id)
    {
		$this->db->select('*');
		$this->db->from('user_credit');
		$this->db->where('user_id', $id);
		$query = $this->db->get();
		return $query->result_array(); 
    }
    //Code By Me End
 
    /*
    ** Mayank Pawar
	** Date 25.11.14
    */
    public function update_user_credit_credit($user_id,$amt){
    	$this->db->set('credit',"credit-$amt",FALSE);
		$this->db->where('user_id', $user_id);
		$this->db->update('user_credit');
		$report = array();
		$report['error'] = $this->db->_error_number();
		$report['message'] = $this->db->_error_message();
		if($report !== 0){
			return true;
		}else{
			return false;
		}
	}    	
    public function update_user_credit_debit($user_id,$amt){
    	$this->db->set('credit',"credit+$amt",FALSE);
		$this->db->where('user_id', $user_id);
		$this->db->update('user_credit');
		$report = array();
		$report['error'] = $this->db->_error_number();
		$report['message'] = $this->db->_error_message();
		if($report !== 0){
			return true;
		}else{
			return false;
		}
	}    	

	public function update_user_credit_debit_by_id($user_id,$amt){
    	$this->db->set('credit',"credit+$amt",FALSE);
		$this->db->where('user_id', $user_id);
		$this->db->update('user_credit');
		$report = array();
		$report['error'] = $this->db->_error_number();
		$report['message'] = $this->db->_error_message();
		if($report !== 0){
			return true;
		}else{
			return false;
		}
	}
	function check_user($user_id)
       {
	       $this->db->where('user_id', $user_id);
		$query = $this->db->get('user_credit');
		
		if($query->num_rows == 1)
		{
			return true;
		}
		
		return false;
       }

}	
