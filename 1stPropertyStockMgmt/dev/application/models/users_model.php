<?php

class Users_model extends CI_Model {

    /**
    * Validate the login's data with the database
    * @param string $user_name
    * @param string $password
    * @return void
    */
	function validate($user_name, $password)
	{
		$this->db->where('user_name', $user_name);
		$this->db->where('pass_word', $password);
		$query = $this->db->get('membership');
		foreach ($query->result() as $row)
		{
		    /* put data in array using username as key */
		    $user['user_name'] = $row->user_name;
		    $user['id'] = $row->id;
		    $user['email'] = $row->email_addres; 
		    $user['is_logged_in'] = true;
			$user['type'] = $row->type;
			$user['role'] = $row->role;
			$user['user_image'] = $row->img_path;
            $user['is_active'] = $row->is_active;
            $user['is_login'] = $row->is_login;
		}
		if($query->num_rows == 1)
		{
			return $user;
		}		
	}
	
	function validate_register($user_name, $password)
	{
		$this->db->where('user_name', $user_name);
		$this->db->where('pass_word', $password);
		$query = $this->db->get('membership');
		
		if($query->num_rows == 1)
		{
			echo "reg";
		}		
	}

    /**
    * Serialize the session data stored in the database, 
    * store it in a new array and return it to the controller 
    * @return array
    */
	function get_db_session_data()
	{
		$query = $this->db->select('user_data')->get('ci_sessions');
		$user = array(); /* array to store the user data we fetch */
		foreach ($query->result() as $row)
		{
		    $udata = unserialize($row->user_data);
		    /* put data in array using username as key */
		    $user['user_name'] = $udata['user_name']; 
		    $user['is_logged_in'] = $udata['is_logged_in'];
			$user['type'] = $udata['type'];
		}
		return $user;
	}
	
    /**
    * Store the new user's data into the database
    * @return boolean - check the insert
    */	
	function create_member()
	{

		$this->db->where('user_name', $this->input->post('username'));
		$query = $this->db->get('membership');

        if($query->num_rows > 0){
        	echo '<div class="alert alert-error"><a class="close" data-dismiss="alert">×</a><strong>';
			  echo "Username already taken";	
			echo '</strong></div>';
		}else{
			$new_member_insert_data = array(
				'first_name' => $this->input->post('first_name'),
				'last_name' => $this->input->post('last_name'),
				'email_addres' => $this->input->post('email_address'),			
				'user_name' => $this->input->post('username'),
				'pass_word' => md5($this->input->post('password')),
				'type' => 'user'
			);
			$insert = $this->db->insert('membership', $new_member_insert_data);
		    return $insert;
		}
	      
	}//create_member
	
	
	


		   function register_member($data)
       {
		$insert = $this->db->insert('membership', $data);
	    return $insert;
	}
	      

	
	/*function get_user(){
		$this->db->select('*');
		$this->db->from('membership');
		$this->db->where('type !=', 'admin');
		$query = $this->db->get();
		
		return $query->result_array(); 	
	}*/
	function get_user($search_data = '',$offset){
		$this->db->select('*');
		$this->db->from('membership');
		$this->db->where('type !=', 'admin');
		$this->db->where('is_login !=', '0');
                if(!empty($search_data)){
                    if(isset($search_data['email']) and $search_data['email'] !=''){
                        $this->db->like('membership.email_addres ', $search_data['email']);
                    }
                    if(isset($search_data['tel_no']) and $search_data['tel_no'] !=''){
                       $this->db->like('membership.telephone ', $search_data['tel_no']);
                    }
                    if(isset($search_data['name']) and $search_data['name'] !=''){
                        $name = "first_name like '%".$search_data['name']."%' and last_name like '%".$search_data['name']."%'";
                        $this->db->where($name);
                    }
                    if(isset($search_data['username']) and $search_data['username'] !=''){
                        $this->db->like('membership.user_name ', $search_data['username']);
                    }
                    
                }
                $this->db->limit(20,$offset);
                $this->db->order_by('id','Desc');
		$query = $this->db->get();
		
		return $query->result_array(); 	
	}
        function get_user_count($search_data = ''){
		$this->db->select('count(*) as cnt');
		$this->db->from('membership');
		$this->db->where('type !=', 'admin');
		$this->db->where('is_login !=', '0');
                if(!empty($search_data)){
                    if(isset($search_data['email']) and $search_data['email'] !=''){
                        $this->db->like('membership.email_addres ', $search_data['email']);
                    }
                    if(isset($search_data['tel_no']) and $search_data['tel_no'] !=''){
                       $this->db->like('membership.telephone ', $search_data['tel_no']);
                    }
                    if(isset($search_data['name']) and $search_data['name'] !=''){
                        $name = "first_name like '%".$search_data['name']."%' and last_name like '%".$search_data['name']."%'";
                        $this->db->where($name);
                    }
                    if(isset($search_data['username']) and $search_data['username'] !=''){
                        $this->db->like('membership.user_name ', $search_data['username']);
                    }
                    
                }
        $this->db->order_by('id','Desc');
		$query = $this->db->get();
		
		return $query->result_array(); 	
	}
	
	      
	   function payment($data)
       {
		$insert = $this->db->insert('o_payments', $data);
	    return $insert;
	}
	
	
	function get_user_id($username){
		$this->db->select('id');
		$this->db->from('membership');
		$this->db->where('user_name', $username);
		$query = $this->db->get();
		
		return $query->result_array(); 	
	}
	function get_user_by_id($user_id){
		$this->db->select('*');
		$this->db->from('membership');
		$this->db->where('id', $user_id);
		$query = $this->db->get();
		return $query->result_array(); 	
	}
	
	function update_user($id, $data)
       {
	        $this->db->where('id', $id);
		$this->db->update('membership', $data);
		
		$report = array();
		$report['error'] = $this->db->_error_number();
		$report['message'] = $this->db->_error_message();
		if($report !== 0){
			return true;
		}else{
			return false;
		}
	}
	function check_user($username)
       {
	       $this->db->where('user_name', $username);
		$query = $this->db->get('membership');
		
		if($query->num_rows == 1)
		{
			return false;
		}
		
		return true;
       }
          function delete_user($id)
       {
	       $this->db->where('id', $id);
		$this->db->delete('membership'); 
		
    }

    function update_user_login($id, $data)
    {
	    $this->db->where('id', $id);
		$this->db->update('membership', $data);
		
		$report = array();
		$report['error'] = $this->db->_error_number();
		$report['message'] = $this->db->_error_message();
		if($report !== 0){
			return true;
		}else{
			return false;
		}
	}
	
	function get_user_property_by_userid($userid){
		$where = "(property_share_in_per <> 0 OR sell_property_share <> 0 OR sold_property_share <> 0) and user_id = ".$userid."";
		$query = $this->db->select('up.* , m.user_name, p.property_name')
		->from('user_property AS up')
		->join('membership AS m', 'up.user_id = m.id', 'LEFT INNER')
		->join('property AS p', 'up.property_id = p.id', 'LEFT INNER')
		->where($where)
		->get();
		return $query->result_array(); 	
	}
	
	    public function count_user_property_by_userid1($userid)
       {
		$where = "(property_share_in_per <> 0 OR sell_property_share <> 0 OR sold_property_share <> 0) and user_id = ".$userid."";
		$query = $this->db->select('up.* , m.user_name, p.property_name')
		->from('user_property AS up')
		->join('membership AS m', 'up.user_id = m.id', 'LEFT INNER')
		->join('property AS p', 'up.property_id = p.id', 'LEFT INNER')
		->where($where)
		->get();
		return $query->num_rows();
       }
    
	
	function get_user_property_by_userid1($userid, $limit_start, $limit_end){
		$where = "(property_share_in_per <> 0 OR sell_property_share <> 0 OR sold_property_share <> 0) and user_id = ".$userid."";
		$query = $this->db->select('up.* , m.user_name, p.property_name')
		->from('user_property AS up')
		->join('membership AS m', 'up.user_id = m.id', 'LEFT INNER')
		->join('property AS p', 'up.property_id = p.id', 'LEFT INNER')
		->limit($limit_start, $limit_end)
		->where($where)
		
		->get();
		return $query->result_array(); 	
	}
	
	function get_user_by_id1($user_id){
		$this->db->select('*');
		$this->db->from('membership');
		$this->db->where('id', $user_id);
		$query = $this->db->get();
		
		return $query->result_array(); 	
	}

	function get_pendingreg_user_count($search_data = ''){
		$this->db->select('count(*) as cnt');
		$this->db->from('membership');
		$this->db->where('type !=', 'admin');
		$this->db->where('is_login', 0);
                if(!empty($search_data)){
                    if(isset($search_data['email']) and $search_data['email'] !=''){
                        $this->db->like('membership.email_addres ', $search_data['email']);
                    }
                    if(isset($search_data['tel_no']) and $search_data['tel_no'] !=''){
                       $this->db->like('membership.telephone ', $search_data['tel_no']);
                    }
                    if(isset($search_data['name']) and $search_data['name'] !=''){
                        $name = "first_name like '%".$search_data['name']."%' and last_name like '%".$search_data['name']."%'";
                        $this->db->where($name);
                    }
                    if(isset($search_data['username']) and $search_data['username'] !=''){
                        $this->db->like('membership.user_name ', $search_data['username']);
                    }
                    
                }
		$query = $this->db->get();
		
		return $query->result_array(); 	
	}

	function get_pendingreg_user($search_data = '',$offset){
		$this->db->select('*');
		$this->db->from('membership');
		$this->db->where('type !=', 'admin');
		$this->db->where('is_login', 0);
                if(!empty($search_data)){
                    if(isset($search_data['email']) and $search_data['email'] !=''){
                        $this->db->like('membership.email_addres ', $search_data['email']);
                    }
                    if(isset($search_data['tel_no']) and $search_data['tel_no'] !=''){
                       $this->db->like('membership.telephone ', $search_data['tel_no']);
                    }
                    if(isset($search_data['name']) and $search_data['name'] !=''){
                        $name = "first_name like '%".$search_data['name']."%' and last_name like '%".$search_data['name']."%'";
                        $this->db->where($name);
                    }
                    if(isset($search_data['username']) and $search_data['username'] !=''){
                        $this->db->like('membership.user_name ', $search_data['username']);
                    }
                    
                }
                $this->db->limit(20,$offset);
		$query = $this->db->get();
		
		return $query->result_array(); 	
	}

	function get_user_reg_trans_det($user_id){
		$where = "(txn_type='Normal' || txn_type='Gold_bank' || txn_type='Platinum_bank' || txn_type='Gold' || txn_type='Platinum')";
		$this->db->where('user_id',$user_id);
		$this->db->where($where);
		$this->db->from('o_payments');
		$query = $this->db->get();		
		return $query->result_array(); 	

	}
	function update_o_payment_det($id, $data){
		$this->db->where(id,$id);
		$this->db->update('o_payments',$data);
		$report['error'] = $this->db->_error_number();
		$report['message'] = $this->db->_error_message();
		if($report !== 0){
			return true;
		}else{
			return false;
		}
	}

}