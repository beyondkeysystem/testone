<?php
/*
 * Fuse
 *
 * A simple open source ticket management system. 
 *
 * @package		Fuse
 * @author		Vivek. V
 * @link		http://getvivekv.bitbucket.org/Fuse
 * @link		http://www.vivekv.com
 */

class Index extends CI_Controller
{

	function __construct()
	{
		parent::__construct();
		// Validate login
		$this -> data['title'] = 'Dashboard';
		 $this -> load -> model('admin');
		$this -> data['isadmin'] = $this -> admin -> IsAdmin();
		$this -> data['staff'] = $this -> admin -> GetStaffDetails($this -> session -> userdata('staffid'));
		$this -> data['ticketcount'] = $this -> admin -> GetTicketsCount();
		
		 if(( $this->session->userdata('is_logged_in') && ($this->session->userdata('type') != 'admin')) ){
            redirect('admin/login');
           
		}
		
		  if(( !$this->session->userdata('is_logged_in')) ){
		    redirect('admin/login');
		   
		}
	}

	function index()
	{

		$this -> load -> admin_template('index', $this -> data);

	}
	
	function logout()
	{
		$this->admin->Logout();
	}
	

	/**
	 * This will reset the hash from the client table for all clients. For resting
	 * purpose only. Not for implementation
	 */
	function resetclienthash()
	{
		$query = $this -> db -> get('tblclients');
		$rows = $query -> result_array();
		foreach ($rows as $row)
		{
			$id = $row['id'];
			$hash = md5(uniqid());
			$data['hash'] = $hash;
			$this -> db -> where('id', $id);
			$this -> db -> update('tblclients', $data);

		}
	}

	function updateprofile()
	{
		$this -> form_validation -> set_rules('firstname', 'First Name', 'required|trim|xss_clean');
		$this -> form_validation -> set_rules('lastname', 'Last Name', 'required|trim|xss_clean');
		$this -> form_validation -> set_rules('email', 'Email', 'valid_email|required|trim|xss_clean');
		$this -> form_validation -> set_rules('password', 'Pasword', 'trim|xss_clean');

		if ($this -> form_validation -> run() == FALSE)
		{
			$status['status'] = 0;
			$status['statusmsg'] = validation_errors();
			echo json_encode($status);

		}
		else
		{
			$data = array(
				'firstname' => $this -> input -> post('firstname'),
				'lastname' => $this -> input -> post('lastname'),
				'email' => $this -> input -> post('email'),
				'id' => $this -> session -> userdata('staffid')
			);


			if ($this -> input -> post('password'))
				$data['password'] = md5($this -> input -> post('password'));
			
			$result = $this -> admin -> EditStaff($data);

			if ($result == TRUE)
			{
				$status['status'] = 1;
				echo json_encode($status);
			}
			else
			{
				$status['status'] = 0;
				$status['statusmsg'] = $result;
				echo json_encode($status);
			}
		}
	}

}
