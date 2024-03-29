<?php
App::uses('AppController', 'Controller');
App::uses('CakeEmail', 'Network/Email');

class TicketsController extends AppController {

	public $uses = array('Ticket','TicketStatus','TicketDepartment','TicketReply','TicketClients','Notification');

	function beforeFilter() {
		parent::beforeFilter();
		 
		$this->Paginator->settings = array(
		    'limit' => 12
		);
	}
	public function admin_index() {

		$tickets = $this->Ticket->find('all');
		
		$this->set('tickets',$tickets);
		

		$ticketstatus = $this->TicketStatus->find('list',array('fields' => array('id','status')));
		
		$this->set('ticketstatus',$ticketstatus);

	}


	public function admin_list($value = null) {
			// pr($this->data);die;

	 	if(!empty($this->data['selected'])){

	 		foreach($this->request->data('selected') as $id){
				$this->Ticket->delete($id);
				
			}

	 	}

		$str = "";

		if($value != ""){

			$ticket_status_id = $value;

			$str .= ' TicketStatus.id = "'.addslashes(trim($ticket_status_id)).'" and ';

			$this->set('list','');

		}else{
			$this->set('list','all');
		}
				//pr($this->data);exit;
		if(!empty($this->data) && isset($this->request->data['filter'])){
			//pr($this->data);exit;
			if(!empty($this->data)){
				//pr($this->data);exit;
				if(isset($this->data['Ticket']['id']) && $this->data['Ticket']['id'] != ''){
					$str .= ' Ticket.id = "'.addslashes(trim($this->data['Ticket']['id'])).'" and ';
				}
				if(isset($this->data['Customer']['name']) && $this->data['Customer']['name'] != ''){
					$str .= '(Customer.firstname LIKE "%'.addslashes(trim($this->data['Customer']['name'])).'%" or Customer.lastname LIKE "%'.addslashes(trim($this->data['Customer']['name'])).'%") and ';
				}
				if(isset($this->data['TicketStatus']['status']) && $this->data['TicketStatus']['status'] != ''){
					$str .= ' TicketStatus.id = "'.addslashes(trim($this->data['TicketStatus']['status'])).'" and ';
				}
			}

		}

		if(!empty($str) && $str != ""){
			
			$condition = substr($str,0,-4);
			//echo $condition;die;
			$this->Paginator->settings = array(
			    'conditions' => array($condition),
	   		);

		}
		
		$tickets = $this->Paginator->paginate('Ticket');
			
		$this->set('tickets',$tickets);

		$ticketstatus = $this->TicketStatus->find('list',array('fields' => array('id','status')));
		
		$this->set('ticketstatus',$ticketstatus);

	}

	public function admin_delete(){
		// pr($this->request->data);die;
		if($this->request->is('post')){
			foreach($this->request->data('selected') as $id){
				echo  $id;die;
				$this->Ticket->delete($id);
			}
			return $this->redirect(array('action' => 'index'));
		}
	}

	public function admin_reply($id=null){
		
		$ticket = $this->Ticket->findById($id);
		if ($this->request->is(array('post', 'put'))) {
			
			$body = $this->request->data['TicketReply']['body'];

			$this->request->data['TicketReply'] = Sanitize::clean($this->request->data, array("remove_html" => TRUE));

			$this->request->data['TicketReply']['replier'] = 'staff';
			
			$this->request->data['TicketReply']['ticket_id'] = $this->request->data['Ticket']['id'];

			$this->request->data['TicketReply']['body'] = $body;
			
			$this->request->data['Ticket']['user_id'] = $this->Session->read('Auth.User.id');
			
			// pr($this->request->data);

			$clienthash = $ticket['TicketClient']['hash'];

			$createticket['ticket_id'] = $ticketid = $ticket['Ticket']['id'];

			$user_id = $ticket['User']['id'];
			
			$clienthash = $ticket['TicketClient']['hash'];

			$email_to = $createticket['email'] = $ticket['TicketClient']['email'];
			
			// pr($ticket);

			// die;

			//SERVER_NAME/tickets/viewticket/c23b558e49a70a2e8ad8657b0727a537/60/3 
			
			$createticket['ticket_link'] = $ticket_link = $_SERVER['SERVER_NAME'].'/tickets/viewticket/' . $clienthash . '/' . $ticketid .'/' .$user_id;
			
			$cakeEmail = new CakeEmail('default');
			
			$cakeEmail->template('createticket', 'default')->emailFormat('html')->to($email_to)->subject("HaRiMau - Ticket #$ticketid Reply");                
			
			$cakeEmail->viewVars(array('createticket' => $createticket));
			
			$cakeEmail->send();
			
			$this->TicketReply->saveAll($this->request->data);
			
			return $this->redirect(array('action' => 'index'));

		}

		$ticketstatus = $this->TicketStatus->find('list',array('fields' => array('id', 'status')));
		
		$this->set('ticketstatus',$ticketstatus);
		
		$ticketdepartment = $this->TicketDepartment->find('list',array('fields' => array('id','dept_name')));
		
		$this->set('ticketdepartment',$ticketdepartment);

		// pr($ticket);die;

		if (!$this->request->data) {
			$this->request->data = $ticket;
		}
	}

public function openticket($id=null)
	{
		if (!$id) {
			$error = 'Please select a department to proceed';
			$this->set('error',$error);			
		}
		else {
			$departmentid = $id;
			$this->set('departmentid', $departmentid);
			$this->set('error','');
		}
		
		if ($this->request->is(array('post', 'put'))) {			
			$email_to = $createticket['email'] = $add['TicketClients']['email'] = $this->request->data['email'];
			$add['TicketClients']['hash'] = md5(uniqid());
			$this -> TicketClients -> save($add);
			
			$clientid = $this->request->data['clientid'] = $this->TicketClients->getLastInsertId();
			$user_id = $this->request->data['user_id'] = $this->Auth->user('id');
			$this->request->data['ticket_status_id'] = 3;		

			// 1. Send notification to admin
			// 2. Redirect the user to the ticket list page
			$customer_data = $this->TicketClients->findById($clientid);
			$clienthash = $customer_data['TicketClients']['hash'];

			$this->request->data['Ticket'] = Sanitize::clean($this->request->data, array("remove_html" => TRUE));
			$this->Ticket->save($this->request->data);
			$createticket['ticket_id'] = $ticketid = $this->Ticket->getLastInsertId();
			//SERVER_NAME/tickets/viewticket/c23b558e49a70a2e8ad8657b0727a537/60/3 
			$createticket['ticket_link'] = $ticket_link = $_SERVER['SERVER_NAME'].'/tickets/viewticket/' . $clienthash . '/' . $ticketid .'/' .$user_id;
			
			$cakeEmail = new CakeEmail('default');
			$cakeEmail->template('createticket', 'default')->emailFormat('html')->to($email_to)->subject("HaRiMau - Ticket #$ticketid Created");                
			$cakeEmail->viewVars(array('createticket' => $createticket));
			
			$openCnt = $this->Ticket->find('count',array('conditions'=>array('ticket_status_id'=>3)));
			$openCnt = $openCnt+1;
			if($cakeEmail->send()) {
				$arr['Notification']['type'] = 'Ticket';
				$arr['Notification']['status'] = 'Create';
				$arr['Notification']['count'] = $openCnt;
				$arr['Notification']['markas'] = 'Unread';
				$arr['Notification']['bell'] = 'On';
				$noti = $this->Notification->save($arr);
				$noti_data = $this->Notification->find('all',array('conditions' => array('markas'=>'Unread')));
				
				$numNoti = count($noti_data);
				$this->set('count',$numNoti);
				$this->Session->setFlash(__('Ticket Created Successfully. You will receive an automatic reply from us that contains the link to view your ticket'));
			} else {
				$this->Session->setFlash(__('Problem on sending email to department. Please contact to administrator'));
			}				
		}
		else{
			$this->set('count',0);
		    }
	}
	
	function viewticket($clienthash = '',$ticketid = NULL,$userid = NULL)
	{
		if ($this->request->is(array('post', 'put'))) {
			$this->request->data = Sanitize::clean($this->request->data, array("remove_html" => TRUE));
			$ticketid = $this->request->data['ticketid'];
			$clientId = $this->request->data['clientId'];
			$reply = $this->request->data['reply'];
			$this->request->data['TicketReply']['ticket_id'] = $ticketid;
			$this->request->data['TicketReply']['replier'] = "client";
			$this->request->data['TicketReply']['body'] = $reply;
			$openCnt = $this->Ticket->find('count',array('conditions'=>array('ticket_status_id'=>4)));
			$openCnt = $openCnt+1;
			if($this->TicketReply->save($this->request->data)){
				$arr['Notification']['type'] = 'Ticket';
				$arr['Notification']['status'] = 'Reply';
				$arr['Notification']['count'] = $openCnt;
				$arr['Notification']['markas'] = 'Unread';
				$arr['Notification']['bell'] = 'On';
				$noti = $this->Notification->save($arr);
				$noti_data = $this->Notification->find('all',array('conditions' => array('markas'=>'Unread')));
				
				$numNoti = count($noti_data);
				$this->set('count',$numNoti);
				
				$this->Session->setFlash(__('Ticket Reply go to administrator successfully. Admin will be replied you as earliest as possible'));				
			}
		}
		else{
			$this->set('count',0);
		    }
		
		if($this->Auth->user('id') == $userid){
			$ticketdata=$this->Ticket->findById($ticketid);
			//pr($ticketdata); exit;
	                $ticket_user=$ticketdata['Ticket']['user_id'];
			if ($clienthash != $ticketdata['TicketClient']['hash'])
			{
				$this->Session->setFlash(__('You are not authorised user to view this tickets'));
			}
			if($ticket_user!=$userid){
				$this->Session->setFlash(__('You are not authorised user to view this tickets'));				
			}
			else{
				$this->set('clienthash',$clienthash);
				$this->set('ticketid',$ticketid);
				$this->set('title','View Ticket');
				$this->set('ticket',$ticketdata);
			        $this->set('replies',$ticketdata['TicketReply']);
			}
		}
		else{
			$this->Session->setFlash(__('You are not authorised user to view this tickets'));
		}		
	}

}
?>
