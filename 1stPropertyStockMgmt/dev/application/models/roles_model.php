<?php

class Roles_model extends CI_Model {

    /**
    * Validate the login's data with the database
    * @param string $user_name
    * @param string $password
    * @return void
    */
    

	
	function get_roles(){
		$this->db->select('*');
		$this->db->from('roles');
		$query = $this->db->get();
		
		return $query->result_array(); 	
	}
	
	function update_roles($id, $data)
        {
		$this->db->where('id', $id);
		$this->db->update('roles', $data);
		
		return true;

	}
	
	function get_roles_by_id($id)
        {
				$this->db->select('*');
		$this->db->from('roles');
		$this->db->where('id', $id);
		$query = $this->db->get();
		
		return $query->result_array(); 	
		
	}
	
}