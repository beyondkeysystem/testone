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


class Staffs extends CI_Controller
{

	function __construct()
	{
		parent::__construct();
		 $this -> load -> model('admin');
		$this -> data['title'] = 'Staffs';
		$this -> data['staffs'] = $this -> admin -> ListStaffs();
		$this -> data['isadmin'] = $this -> admin -> IsAdmin();
		$this->data['staff'] = $this->admin->GetStaffDetails($this->session->userdata('staffid'));
		 if(( $this->session->userdata('is_logged_in') && ($this->session->userdata('type') != 'admin')) ){
            redirect('admin/login');
           
		}
		
		  if(( !$this->session->userdata('is_logged_in')) ){
		    redirect('admin/login');
		   
		}
	}

	function index()
	{
		$this -> data['action'] = 'add';
		$this -> load -> admin_template('staffs', $this -> data);
	}

	function add()
	{

		$this -> form_validation -> set_rules('firstname', 'Staff First Name', 'required|trim|xss_clean');
		$this -> form_validation -> set_rules('lastname', 'Staff Last Name', 'required|trim|xss_clean');
		$this -> form_validation -> set_rules('email', 'Staff Email', 'required|valid_email|trim|xss_clean');
		$this -> form_validation -> set_rules('password', 'Password', 'required|trim|xss_clean');

		if ($this -> form_validation -> run() == FALSE)
		{

			$status['status'] = 0;
			$status['statusmsg'] = validation_errors();
			echo json_encode($status);
		}
		else
		{
			$data['firstname'] = $this -> input -> post('firstname');
			$data['lastname'] = $this -> input -> post('lastname');
			$data['email'] = $this -> input -> post('email');
			$data['password'] = $this->encrypt->encode($this -> input -> post('password'));

			$result = $this -> admin -> AddStaff($data);
			if ($result == FALSE)
			{
				$status['statusmsg'] = "A user with the email already exists";
				$status['status'] = 0;
				echo json_encode($status);
			}
			else
			{
				$status['status'] = 1;
				echo json_encode($status);
			}

		}

	}

	function update()
	{

		$this -> form_validation -> set_rules('firstname', 'Staff First Name', 'required|trim|xss_clean');
		$this -> form_validation -> set_rules('lastname', 'Staff Last Name', 'required|trim|xss_clean');
		$this -> form_validation -> set_rules('email', 'Staff Email', 'required|valid_email|trim|xss_clean');
		$this -> form_validation -> set_rules('password', 'Password', 'trim|xss_clean');

		if ($this -> form_validation -> run() == FALSE)
		{
			$status['status'] = 0;
			$status['statusmsg'] = validation_errors();
			echo json_encode($status);
		}
		else
		{
			// Form validation success.

			$data['firstname'] = $this -> input -> post('firstname');
			$data['lastname'] = $this -> input -> post('lastname');
			$data['email'] = $this -> input -> post('email');
			$data['id'] = $this -> input -> post('id');
			
			if($this->input->post('password'))
				$data['password'] = $this->encrypt->encode($this -> input -> post('password'));

			$result = $this -> admin -> EditStaff($data);

			if ($result == FALSE)
			{
				$status['statusmsg'] = "A user with the email already exists";
				$status['status'] = 0;
				echo json_encode($status);
			}
			else
			{
				$status['status'] = 1;
				echo json_encode($status);

			}

		}

	}

	function delete()
	{
		$staffid = $this -> uri -> segment(4);
		if ($this -> session -> userdata('staffid') == $staffid)
		{
			$this -> data['error'] = 'You can not delete your own account!';
		}
		else
		{
			$this -> admin -> DeleteStaff($staffid);
			$this -> data['staffs'] = $this -> admin -> ListStaffs();
		}
		$this -> load -> admin_template('staffs', $this -> data);

	}

}
