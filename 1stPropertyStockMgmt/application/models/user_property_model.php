<?php
class User_property_model extends CI_Model {

	function get_property_id($id){
		$this->db->select('*');
		$this->db->from('user_property');
		$this->db->where('property_id', $id);
		$query = $this->db->get();
		
		return $query->row_array(); 	
	}
	
	//Code By Me Start
	function get_user_property_by_property_id($id){
		$this->db->select('*');
		$this->db->from('user_property');
		$this->db->where('property_id', $id); 
		$query = $this->db->get();
		
		return $query->result_array(); 	
	}
	
	function get_property_by_user_id($userid){
		$this->db->select('property.id');
		$this->db->select('property_name');
		$this->db->from('property');
               $this->db->join('user_property', 'user_property.property_id = property.id');		
		$this->db->where('user_id', $userid);
		$query = $this->db->get();
		
		return $query->result_array(); 	
	}
	//Code By Me End
	//Mayank Pawar Update Date: 22/12/2014
	function get_property_cal($id){
		$this->db->select('SUM(sell_property_share + property_share_in_per) as sell,SUM(property_share_in_per) as property_share_in_per, SUM(sell_property_share) as sell_property_share, SUM(sold_property_share) as sold, property_share_in_per as buy');
		$this->db->from('user_property');
		$this->db->where('property_id', $id);
		$query = $this->db->get();
		
		return $query->row_array(); 	
	}
	
	function get_user_id($userid){
		$this->db->select('*');
		$this->db->from('user_property');
		$this->db->where('user_id', $userid);
		$query = $this->db->get();
		
		return $query->result_array(); 	
	}
	
	function get_prop_user_id($propid,$userid){
		$this->db->select('*');
		$this->db->from('user_property');
		$this->db->where('user_id', $userid);
		$this->db->where('property_id', $propid);
		$query = $this->db->get();
		
		return $query->row_array(); 	
	}
	
		/*
	** by Mayank Pawar
	** Date: 21.11.14
	*/
	function upd_user_property_sold_share($id, $sold_property_share){
		$this->db->where('id',$id);
		$this->db->set('sell_property_share', "sell_property_share-$sold_property_share", FALSE);
		$this->db->set('sold_property_share', "sold_property_share+$sold_property_share", FALSE);
		$this->db->update('user_property');
	}

	function chk_user_property($user_id,$property_id,$share_buy){
		$this->db->select('*');
		$this->db->from('user_property');
		$this->db->where('user_id',$user_id);
		$this->db->where('property_id',$property_id);
		$query = $this->db->get();
		if($query->row_array()){
			$this->db->where('user_id',$user_id);
			$this->db->where('property_id',$property_id);
			$this->db->set('property_share_in_per', "property_share_in_per+$share_buy", FALSE);
			$this->db->update('user_property');
		}else{
			$this->db->set('user_id',$user_id);
			$this->db->set('property_id',$property_id);
			$this->db->set('property_share_in_per',$share_buy);
			$this->db->insert('user_property');
		}
		return true;
	}

	function get_user_property_id($id){
		$this->db->select('*');
		$this->db->from('user_property');
		$this->db->where('id', $id);
		$query = $this->db->get();
		
		return $query->row_array(); 	
	}

	function get_property_id_shares($property_id){
		$where = "property_share_in_per <> 0 OR sell_property_share <> 0 OR sold_property_share <> 0";
		$query = $this->db
 					->select('up.* , m.user_name,  m.first_name,  m.last_name')
			 		->from('user_property AS up')
			 		->join('membership AS m', 'up.user_id = m.id AND up.property_id = '.$property_id, 'LEFT INNER')
			 		->where($where)
			 		->get();
	
		if ($query->num_rows() > 0) 
	    {	
	        return $query->result_array(); 
	    }
	    return array();
	}
	/*End*/
	
	function get_property_id1($id,$user_id){
		$this->db->select('*');
		$this->db->from('user_property');
		$this->db->where('property_id', $id);
		$this->db->where('user_id', $user_id);
		$query = $this->db->get();
		
		return $query->row_array(); 	
	}
	
	function get_user_property(){
		$query = $this->db->select('up.* , m.user_name, p.property_name')
		->from('user_property AS up')
		->join('membership AS m', 'up.user_id = m.id', 'LEFT INNER')
		->join('property AS p', 'up.property_id = p.id', 'LEFT INNER')
		->get();
		
		return $query->result_array(); 	
	}
	    function store_user_property($data)
        {
		$insert = $this->db->insert('user_property', $data);
	    return $insert;
	}
	
	 function delete_user_property($id, $property_id)
        {
		$this->db->where('user_id', $id);
		$this->db->where('property_id', $property_id);
		$this->db->delete('user_property'); 
	}
	
	 function update_user_property($id, $property_id, $data)
        {
		$this->db->where('user_id', $id);
		$this->db->where('property_id', $property_id);
                $this->db->update('user_property', $data);
		return true;
	}

	function search_by_username($property_id,$search_name_string){
		$where = "(property_share_in_per <> 0 OR sell_property_share <> 0 OR sold_property_share <> 0) AND (first_name LIKE '%".$search_name_string."%' OR last_name LIKE '%".$search_name_string."%')";
		$query = $this->db
 					->select('up.* , m.user_name,  m.first_name,  m.last_name')
			 		->from('user_property AS up')
			 		->join('membership AS m', 'up.user_id = m.id AND up.property_id = '.$property_id, 'LEFT INNER')
			 		->where($where)
			 		->get();
	
		if ($query->num_rows() > 0) 
	    {	
	        return $query->result_array(); 
	    }
	    return array();		
	}

	function get_final_property_price($property_id){
		$this->db->select('user_property.user_id,(membership.first_name), (membership.last_name)');
		$this->db->select('sum(user_property.property_share_in_per + user_property.sell_property_share) total_share');
		$this->db->from('user_property');
		$this->db->join('membership','membership.id = user_property.user_id','left');
		$this->db->where('user_property.property_id',$property_id);
		$this->db->having('total_share >',0);
		$this->db->group_by('user_property.user_id');
		$query = $this->db->get();
		return $query->result_array(); 
	    
	}
	 function check_user_property($user_id, $id)
    {
		//$this->db->select('*');
		//$this->db->from('property');
		//$this->db->where('property_status !=', 'blocked');
		$this->db->select('*');
		// $this->db->select('membership.user_name');
		$this->db->from('user_property');
	    // $this->db->group_by('id');
	       $this->db->where('property_id', $id);
	       $this->db->where('user_id', $user_id);
	        $this->db->where('property_share_in_per !=', 0);
		 $this->db->where('sell_property_share !=', 0);
		  $this->db->where('sold_property_share !=', 0);
		$query = $this->db->get();
		return $query->num_rows();
    }

    function get_final_property_price_tran($property_id){
		$this->db->select('user_property.user_id,(membership.first_name), (membership.last_name), membership.role, transactionfees.percentage');
		$this->db->select('sum(user_property.property_share_in_per + user_property.sell_property_share) total_share');
		$this->db->from('user_property');
		$this->db->join('membership','membership.id = user_property.user_id','left');
		$this->db->join('transactionfees','transactionfees.member_type  = membership.role','left');
		$this->db->where('user_property.property_id',$property_id);
		$this->db->having('total_share >',0);
		$this->db->group_by('user_property.user_id');
		$query = $this->db->get();
		return $query->result_array(); 
	    
	}
}