<?php
class Transactionfees_model extends CI_Model {
 
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
    public function get_transactionfees_by_id($id)
    {
		$this->db->select('*');
		$this->db->from('transactionfees');
		$this->db->where('id', $id);
		$query = $this->db->get();
		return $query->result_array(); 
    }
	
	public function get_transactionfees_by_type($type)
    {
		$this->db->select('*');
		$this->db->from('transactionfees');
		$this->db->where('member_type', $type);
		$query = $this->db->get();
		return $query->row_array(); 
    }
    
     
    /**
    * Fetch transactionfees data from the database
    * possibility to mix search, filter and order
    * @param int $manufacuture_id 
    * @param string $search_string 
    * @param strong $order
    * @param string $order_type 
    * @param int $limit_start
    * @param int $limit_end
    * @return array
    */
    public function get_transactionfees()
    {
	    
		$this->db->select('id');
		$this->db->select('amount');
		$this->db->select('percentage');
		$this->db->select('member_type');
		$this->db->from('transactionfees');

	    $this->db->group_by('id');
		$query = $this->db->get();
		
		return $query->result_array(); 	
    }

	
    
    
   
    function update_transactionfees($id, $data)
    {
		$this->db->where('id', $id);
		$this->db->update('transactionfees', $data);
		$report = array();
		$report['error'] = $this->db->_error_number();
		$report['message'] = $this->db->_error_message();
		if($report !== 0){
			return true;
		}else{
			return false;
		}
	}


 
}	
