<?php
class User_transacton_log_model extends CI_Model {
 
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
    public function set_transaction_log($data)
    {
		$this->db->insert('user_transaction_log',$data);
		return true 
    }

    public function get_transaction_log(){
    	$this->db->select('user_autotracking_log.*');
    	$this->db->select('membership.first_name');
    	$this->db->select('membership.last_name');
    	$this->db->select('membership.email_addres');
    	$this->db->select('property.property_name');
    	$this->db->from('user_autotracking_log');
    	$this->db->join('membership','membership.id = user_autotracking_log.user_id');
    	$this->db->join('property','property.id = user_autotracking_log.property_id');
    	$query = $this->db->get();
		return $query->result_array(); 	
    }
    
}	
