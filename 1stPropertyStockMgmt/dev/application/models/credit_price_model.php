<?php
class Credit_price_model extends CI_Model {
 
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
    public function get_credit_price_by_id($id)
    {
		$this->db->select('*');
		$this->db->from('credit_price');
		$this->db->where('id', $id);
		$query = $this->db->get();
		return $query->result_array(); 
    }
    
     
    /**
    * Fetch credit_price data from the database
    * possibility to mix search, filter and order
    * @param int $manufacuture_id 
    * @param string $search_string 
    * @param strong $order
    * @param string $order_type 
    * @param int $limit_start
    * @param int $limit_end
    * @return array
    */
    public function get_credit_price()
    {
	    
		$this->db->select('id');
		$this->db->select('credit');
		$this->db->select('price');
		$this->db->from('credit_price');

	       $this->db->group_by('id');
		$query = $this->db->get();
		
		return $query->result_array(); 	
    }

	
    
    
   
    function update_credit_price($id, $data)
    {
		$this->db->where('id', $id);
		$this->db->update('credit_price', $data);
		$report = array();
		$report['error'] = $this->db->_error_number();
		$report['message'] = $this->db->_error_message();
		if($report !== 0){
			return true;
		}else{
			return false;
		}
	}

    function delete_credit_price($id){
		$this->db->where('id', $id);
		$this->db->delete('credit_price'); 
	}
        
        
     function store_credit_price($data)
    {
		$insert = $this->db->insert('credit_price', $data);
	    return $insert;
	}
	


 
}	
