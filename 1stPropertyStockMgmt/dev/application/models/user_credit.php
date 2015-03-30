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
		$this->db->select('price');
		$this->db->from('user_credit');

	       $this->db->group_by('id');
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

 
}	
