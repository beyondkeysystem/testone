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

	var $data = array();

	function __construct()
	{
		parent::__construct();
		$this -> load -> model('admin');
		$this -> _LoadData();
	
		$this -> load -> model('Client_model', 'Clients');
		$this -> data['title'] = "Support Desk";

	 if($this->session->userdata('language')==''){
			$this->lang->load('en', 'polish');
		}
		else{
            $this->lang->load($this->session->userdata('language'), 'polish');
		}		
         }
	
		function langswitch()
	    {
		$this->session->set_userdata('language',$this->uri->segment(3));
		redirect($_SERVER['HTTP_REFERER']);
	    }

	function index()
	{
		$this -> load -> template("index", $this -> data);
	}

	function _LoadData()
	{
		$departments = $this -> admin -> ListDepartments();
		$this -> data['departments'] = $departments;
		
		$this->data['message'] = $this -> admin -> GetNotificationMessage();
		

		$priorities = $this -> admin -> ListPriorities();
		$this -> data['priorities'] = $priorities;
		if ($this -> input -> post('department'))
		{
			$departmentid = $this -> input -> post('department');
			$this -> data['departmentid'] = $departmentid;
		}
		else
		{
			$this -> data['departmentid'] = $this -> uri -> segment(3);
		}

		// Now we load all the additional fields in this department

		$additional_fields = $this -> admin -> GetAdditionalFields($this -> data['departmentid']);
		$this -> data['additional'] = $additional_fields;

	}

	function openticket()
	{
		if (!$this -> uri -> segment(3))
		{
			$this -> data['error'] = 'Please select a department to proceed';
			$this -> index();
		}
		else
		{
			$this -> data['departmentid'] = $this -> uri -> segment(3);
			$this -> load -> template("openticket", $this -> data);
		}

	}

	function create()
	{
		$additional_fields = array();

		$body = $this -> input -> post('body');
		$department = $this -> input -> post('department');
		$email = $this -> input -> post('email');
		$priority = $this -> input -> post('priority');
		$subject = $this -> input -> post('subject');

		$this -> form_validation -> set_rules('email', 'Email', 'trim|required|valid_email');
		$this -> form_validation -> set_rules('subject', 'Subject', 'trim|required|max_length[30]');
		$this -> form_validation -> set_rules('body', 'Query', 'trim|required');
		$this -> form_validation -> set_rules('department', 'Department', 'required');

		// We fetch additional fields
		if (is_array($this -> data['additional']))
			foreach ($this->data['additional'] as $additional)
			{
				// We create these vales as an array
				$name = $additional['uniqid'];
				$additional_fields[$name] = $this -> input -> post($name);
			}

		if ($this -> form_validation -> run() == FALSE)
		{
			$this -> load -> template('openticket', $this -> data);
		}
		else
		{
			// Validation is success. So create ticket

			// Upload the file.
			if (isset($_FILES['userfile']))
				if (($_FILES['userfile']['name']) != '')
				{

					$config['upload_path'] = './attachments/';
					$config['allowed_types'] = 'gif|jpg|jpeg|pdf|png';
					$config['max_size'] = '5120';
					$config['max_width'] = '0';
					$config['max_height'] = '0';
					$config['encrypt_name'] = TRUE;
					$config['remove_spaces'] = TRUE;
					$this -> load -> library('upload', $config);

					if (!$this -> upload -> do_upload())
					{
						$this -> data['error'] = $this -> upload -> display_errors();
						$this -> load -> template('openticket', $this -> data);
						die();
					}

					$data = $this -> upload -> data();

					if (is_array($data))

						$attachment = $data['file_name'];
				}

			// Add user to the user table
			$add['email'] = $email;
			$user_id =  $this->session->userdata('user_id');
			$clientid = $this -> Clients -> AddClient($add);

			$insert = array(
				'subject' => $subject,
				'department' => $department,
				'clientid' => $clientid,
				'priority' => $priority,
				'body' => $body,
				'user_id' => $user_id,
				'status' => 'open'
			);

			if (isset($attachment))
				$insert['attachment'] = $attachment;

			// If additonal fields are posted, we json_encode it and save the values in a
			// column called 'additional'
			if (is_array($additional_fields))
				$insert['additional'] = json_encode($additional_fields);

			$this -> db -> insert('tbltickets', $insert);
			$ticketid = $this -> db -> insert_id();

			if ($this -> db -> affected_rows())
			{
				// 1. Send notification to admin
				// 2. Redirect the user to the ticket list page

				$clientdetails = $this -> Clients -> GetClientData($clientid);
				$clienthash = $clientdetails['hash'];

				// Send mail to the ticket submitter

				$ticket_link = site_url() . 'tickets/viewticket/' . $clienthash . '/' . $ticketid .'/' .$user_id;
				$this -> load -> model("Emails");
				$companyname = $this -> Emails -> GetSetting('companyname');

				$body = "
				
				Hello $email,<br><br>
				
				Your ticket has been opened with us.<br><br> 
				
				Ticket #$ticketid<br>
				Status : Open<br><br>
				
				Click on the below link to see the ticket details and post additional comments.<br><br>
				
				<a href=\"$ticket_link\">$ticket_link</a><br><br>
				
				Regards<br>
				$companyname
				
				";

				$this -> Emails -> SendMail($email, "Ticket #$ticketid Created", $body);

				// Now we send emails to staff

				$staffs = $this -> admin -> ListStaffs();
				$link = site_url() . '/admin/tickets/view/' . $ticketid;
				$subject = "Ticket #$ticketid Opened";
				$companyname = $this -> Emails -> GetSetting('companyname');
				$body = "
		
		Ticket #$ticketid has been created by the client. You may view the ticket by clicking on the following link <br><br>
		
		Client Email : $email<br><br>
		
		<a href=\"$link\">$link</a> <br><br>
		
		Regards<br>
		$companyname
		";

				foreach ($staffs as $staff)
				{
					$this -> Emails -> SendMail($staff['email'], $subject, $body);
				}

				$this -> data['success'] = 'Ticket Created Successfully. You will receive an automatic reply from us that contains the link to view your ticket';
				$this -> index();
			}

		}

	}

	function mytickets()
	{
		$clienthash = $this -> session -> userdata('clienthash');
		if (!isset($clienthash))
			die('You are not logged in. Click on the ticket view link to login automatically');

		$clientid = $this -> Clients -> GetClientIDFromHash($clienthash);

		if ($clientid == FALSE)
			die("Invalid client id provided");

		$this -> data['tickets'] = $this -> Clients -> GetTicketsOfClient($clientid);
		$this -> data['title'] = 'My Tickets';
		$this -> data['clienthash'] = $clienthash;
		$this -> load -> template('mytickets', $this -> data);

	}

}
