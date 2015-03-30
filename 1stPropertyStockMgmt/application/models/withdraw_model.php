<?php

class Withdraw_model extends CI_Model {

    /**
    * Validate the login's data with the database
    * @param string $user_name
    * @param string $password
    * @return void
    */
        //Code By Me Start
	
	function get_withdraw(){
		$this->db->select('user_withdraw_fund.id');
		$this->db->select('fund_amt');
		$this->db->select('number_of_token');
		$this->db->select('date');
		$this->db->select('status');
		$this->db->select('membership.user_name');
		$this->db->from('user_withdraw_fund');
		$this->db->join('membership', 'membership.id = user_withdraw_fund.user_id');
		$this->db->where('user_withdraw_fund.status !=', 'Withdrawadmin');
		$query = $this->db->get();
		
		return $query->result_array(); 	
	}
	
	//Code By Me End
	
	function store_withdraw($data_to_store){
		$insert = $this->db->insert('user_withdraw_fund', $data_to_store);
		    return $insert;
	}
	
	function update_withdraw($id, $data_to_store){
		$this->db->where('id', $id);
		$this->db->update('user_withdraw_fund', $data_to_store);
		return true;
	}
	
	function get_withdraw_by_id($id){
		$this->db->select('*');
		$this->db->from('user_withdraw_fund');
		$this->db->where('id', $id);
		$query = $this->db->get();
		return $query->result_array(); 	
		
	}
	
	//Code By Me Start
	
	function get_withdrawadmin(){
		$this->db->select('user_withdraw_fund.id');
		$this->db->select('fund_amt');
		$this->db->select('number_of_token');
		$this->db->select('date');
		$this->db->select('status');
		$this->db->select('property_id');
		$this->db->select('membership.user_name');
		$this->db->from('user_withdraw_fund');
		$this->db->join('membership', 'membership.id = user_withdraw_fund.user_id');
		$this->db->where('user_withdraw_fund.status', 'Withdrawadmin');
		$query = $this->db->get();
		
		return $query->result_array(); 	
	}
	
	//Code By Me End
	
}