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

class Tickets_model extends CI_Model
{

	function __construct()
	{
		parent::__construct();
		$this -> load -> model('client_model', 'Clients');
		 $this -> load -> model('admin');
	}

	function ListTickets($status = '')
	{
		if ($status)
		{
			$this -> db -> where("status", $status);
		}

		$select = array(
			'tbltickets.id',
			'LEFT(subject,30) AS subject',
			'status',
			'department',
			'clientid',
			'priority',
			'created',
			'deptname',
			'email'
		);
		$this -> db -> select($select);

		$this -> db -> order_by('tbltickets.id', 'desc');
		$this -> db -> join('tbldepartments', 'tbldepartments.deptid = tbltickets.department');
		$this -> db -> join('tblclients', 'tbltickets.clientid = tblclients.id');
		$result = $this -> db -> get('tbltickets');
		return $result -> result_array();

	}

	function GetTicketDetails($ticketid)
	{
	
		$this -> db -> join('tbldepartments', 'tbldepartments.deptid = tbltickets.department');
		$this -> db -> join('tblclients', 'tbltickets.clientid = tblclients.id');
		$result = $this -> db -> where('tbltickets.id', $ticketid) -> get("tbltickets");
		$array = $result -> row_array();

		$array['body'] = $this -> MakeClickableURL($array['body']);
		return $array;
	}
	
	function get_user_id($ticketid)
	{
	
		$this -> db -> select('user_id');
		$this -> db -> from('tbltickets');
		$this->db->where('id', $ticketid);
		$query = $this->db->get();
		
		return $query->result_array(); 	
	}

	function GetTicketReplies($ticketid)
	{
	
		$result = $this -> db -> order_by('id', 'asc') -> where('ticketid', $ticketid) -> get('tblticketreplies');
		$rows = $result -> result_array();

		for ($i = 0; $i < sizeof($rows); $i++)
		{
			$body = $rows[$i]['body'] ;
			
			
			$body = $this->MakeClickableURL($body) ;
			$rows[$i]['body'] = $body ;
				
			$replierid = $rows[$i]['replierid'];

			if ($rows[$i]['replier'] == 'client')
			{
				$row = $this -> Clients -> GetClientData($replierid);
				$rows[$i]['email'] = $row['email'];
			}
			else
			{
				$row = $this -> admin -> GetStaffDetails($replierid);
				$rows[$i]['firstname'] = $row['firstname'];
				$rows[$i]['lastname'] = $row['lastname'];
			}
		}

		return $rows;
	}

	function GetStatuses()
	{
		$result = $this -> db -> get('tblstatus');
		return $result -> result_array();
	}

	function AddReply($data, $status)
	{
		$this -> db -> where('ticketid', $data['ticketid']);
		$this -> db -> insert('tblticketreplies', $data);
		$this -> db -> where('id', $data['ticketid']) -> update('tbltickets', array('status' => $status));
	}

	function GetAdditionaFields($ticketid)
	{
		$result = $this -> db -> where('id', $ticketid) -> get('tbltickets');
		$row = $result -> row_array();

		$additional = json_decode($row['additional'], true);

		if (is_array($additional))
			foreach ($additional as $key => $value)
			{
				$result = $this -> db -> where('uniqid', $key) -> get('tblfields');
				$row = $result -> row_array();

				$array[] = array(
					'name' => $row['name'],
					'value' => $this -> encrypt -> decode($value)
				);

			}
		if (is_array($additional))
			return @$array;

	}

	function GetAllAdditionalFieldsofTicket($ticketid)
	{
		$result = $this -> db -> where('id', $ticketid) -> get('tbltickets');
		$row = $result -> row_array();
		$department = $row['department'];

		$fields = $this -> admin -> ListAllFields($department);

		return $fields;

	}

	function CloseTicket($ticketid)
	{
		$data = array(
			'status' => 'closed',
			'additional' => ''
		);
		$this -> db -> where('id', $ticketid) -> update('tbltickets', $data);
	}

	function DeleteTicket($ticketid)
	{
		$this -> db -> where('id', $ticketid) -> delete('tbltickets');
		$this -> db -> where('ticketid', $ticketid) -> delete('tblticketreplies');
	}

	function MakeClickableURL($text)
	{
		$text = preg_replace('/(((f|ht){1}tp(s?):\/\/)[-a-zA-Z0-9@:%_\+.~#?&;\/\/=]+)/', '<a href="\\1" target="_blank">\\1</a>', $text);
		$text = preg_replace("/(^|[ \\n\\r\\t])(www\.([a-zA-Z0-9_-]+(\.[a-zA-Z0-9_-]+)+)(\/[^\/ \\n\\r]*)*)/", '\\1<a href="http://\\2" target="_blank">\\2</a>', $text);
		$text = preg_replace("/(^|[ \\n\\r\\t])([_\.0-9a-z-]+@([0-9a-z][0-9a-z-]+\.)+[a-z]{2,4})/", '\\1<a href="mailto:\\2" target="_blank">\\2</a>', $text);
		return $text;
	}

}
