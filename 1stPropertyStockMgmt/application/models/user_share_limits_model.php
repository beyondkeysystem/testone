<?php
class User_share_limits_model extends CI_Model
{
	function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	function getsharepropertylimits($userid, $propertyid)
	{
		$this -> db -> select('*');
		$this -> db -> from('user_share_limits');
		$this->db->where('user_id', $userid);
		$this->db->where('property_id', $propertyid);
		$query = $this->db->get();		
		return $query->row_array(); 	
	}
	
	public function get_share_limit_by_id($id)
    {
		$this->db->select('user_share_limits.user_id, user_share_limits.share_limits, membership.user_name, user_share_limits.id, user_share_limits.property_id, property.property_name');
		//$this->db->from('user_share_limits');
	//	$this->db->where('id', $id);
		
		$this -> db -> join('membership', 'membership.id = user_share_limits.user_id');
		$this -> db -> join('property', 'property.id = user_share_limits.property_id');
		$result = $this -> db -> where('user_share_limits.id', $id) -> get("user_share_limits");
		//$query = $this->db->get();
		return $result->row_array(); 
    }
	
	public function store_user_share_limit($data)
    {
		$insert = $this->db->insert('user_share_limits', $data);
	    return $insert;
	}
	
	public function get_share_limit()
    {	    
        $this->db->select('membership.user_name, property.property_name, user_share_limits.share_limits, user_share_limits.id');
		$this -> db -> join('membership', 'membership.id = user_share_limits.user_id');
		$this -> db -> join('property', 'property.id = user_share_limits.property_id');
		$result = $this -> db -> get("user_share_limits");	       
		//$query = $this->db->get();
		
		return $result->result_array(); 	
    }
	
	// Code By Me Start
	function update_share_limit($user_id, $property_id, $data)
    {
		 $this->db->where('property_id', $property_id);
	       $this->db->where('user_id', $user_id);
		$this->db->update('user_share_limits', $data);
		$report = array();
		$report['error'] = $this->db->_error_number();
		$report['message'] = $this->db->_error_message();
		if($report !== 0){
			return true;
		}else{
			return false;
		}
	}
	
	   function check_user_property_share($user_id, $property_id)
       {
	        $this->db->select('share_limits');
	       $this->db->where('property_id', $property_id);
	       $this->db->where('user_id', $user_id);
		$query = $this->db->get('user_share_limits');
		
		if($query->num_rows == 1)
		{
			return $query->result_array();
		}
		
		return false;
       }
       
        function count_property_share($propertyid)
    {
		$this->db->select('SUM(property_share_in_per+sell_property_share) total_property_share_in_per');
		$this->db->from('user_property');
		$this->db->where('property_id', $propertyid);
		$query = $this->db->get();
		return $query->result_array();         
    }
    
// Code By Me End

    function delete_share_limit($id){
		$this->db->where('id', $id);
		$this->db->delete('user_share_limits'); 
	}
}