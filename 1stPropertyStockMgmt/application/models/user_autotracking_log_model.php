<?php
class User_autotracking_log_model extends CI_Model {
 
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
    public function set_autotracking_log($data)
    {
		$this->db->insert('user_autotracking_log',$data);
		return true;
    }
    
    public function get_autotracking_log($datetime=null, $username=null, $email=null, $property_name=null, $limit_start, $limit_end){
        $this->db->select('user_autotracking_log.*');
        $this->db->select('membership.user_name');
        $this->db->select('membership.first_name');
        $this->db->select('membership.last_name');
        $this->db->select('membership.email_addres');
        $this->db->select('property.property_name');
        $this->db->from('user_autotracking_log');
        $this->db->join('membership','membership.id = user_autotracking_log.user_id');
        $this->db->join('property','property.id = user_autotracking_log.property_id');
	if($datetime){
			$this->db->like('user_autotracking_log.modified_date', $datetime);
		}
		if($username){
			$this->db->like('membership.user_name', $username);
		}
		if($email){
			$this->db->like('membership.email_addres', $email);
		}
		if($property_name){
			$this->db->like('property.property_name', $property_name);
		}
	$this->db->limit($limit_start, $limit_end);
		//$this->db->limit('4', '4');
        $query = $this->db->get();
        return $query->result_array();  
    }
    
       function count_transaction_autotrack_log($datetime = null, $username = null, $email = null, $property_name = null)
    {
		//$this->db->select('*');
		//$this->db->from('property');
		//$this->db->where('property_status !=', 'blocked');
		$this->db->select('user_autotracking_log.*');
		$this->db->select('membership.user_name');
		$this->db->select('membership.first_name');
		$this->db->select('membership.last_name');
		$this->db->select('membership.email_addres');
		$this->db->select('property.property_name');
		$this->db->from('user_autotracking_log');
		$this->db->join('membership','membership.id = user_autotracking_log.user_id','left');
		$this->db->join('property','property.id = user_autotracking_log.property_id','left');
		
		if($datetime){
			$this->db->like('user_autotracking_log.modified_date', $datetime);
		}
		if($username){
			$this->db->like('membership.user_name', $username);
		}
		if($email){
			$this->db->like('membership.email_addres', $email);
		}
		if($property_name){
			$this->db->like('property.property_name', $property_name);
		}
		$query = $this->db->get();
		return $query->num_rows();            }
}	
