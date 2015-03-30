<?php
/**
 * Static content controller.
 *
 * This file will render views from views/pages/
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.Controller
 * @since         CakePHP(tm) v 0.2.9
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */

App::uses('AppController', 'Controller');
//App::import('Vendor', 'websocket/PHPWebSocket');
/**
 * Static content controller
 *
 * Override this controller by placing a copy in controllers directory of an application
 *
 * @package       app.Controller
 * @link http://book.cakephp.org/2.0/en/controllers/pages-controller.html
 */
class PagesController extends AppController {

/**
 * This controller does not use a model
 *
 * @var array
 */
	public $uses = array('Notification','Ticket');

/**
 * Displays a view
 *
 * @return void
 * @throws NotFoundException When the view file could not be found
 *	or MissingViewException in debug mode.
 */
	public function display() {
		$path = func_get_args();

		$count = count($path);
		if (!$count) {
			return $this->redirect('/');
		}
		$page = $subpage = $title_for_layout = null;

		if (!empty($path[0])) {
			$page = $path[0];
		}
		if (!empty($path[1])) {
			$subpage = $path[1];
		}
		if (!empty($path[$count - 1])) {
			$title_for_layout = Inflector::humanize($path[$count - 1]);
		}
		$this->set(compact('page', 'subpage', 'title_for_layout'));

		try {
			$this->render(implode('/', $path));
		} catch (MissingViewException $e) {
			if (Configure::read('debug')) {
				throw $e;
			}
			throw new NotFoundException();
		}
	}
	
	public function admin_display() {
		//$this->layout = false;
		//$this->websocket();
	}
	
	public function bellnotified(){
		$this->layout = false;
		//pr($this->data);
		
		
		//$noti_data_ticket = $this->Notification->find('all',array('conditions' => array('markas' => 'Unread','type' => 'Ticket'),'order' => array(
			//'Notification.created DESC'
		    //)));
		//$cnt_ticket = count($noti_data_ticket);
		
		
		
		
		//$noti_data = $this->Notification->find('all',array('conditions' => array('markas' => 'Unread')));
		//
		//$cnt = count($noti_data);
		//if($cnt > 0){
		//	$arr["countAdmin"]=$cnt;			
		//}else{
		//	$arr["countAdmin"]=0;
		//}
		
		$noti_data_bell = $this->Notification->find('count',array('conditions' => array('bell' => 'On')));
		if($noti_data_bell > 0){
			$cnt = 1;
			$arr["noti_data_bell"]=$noti_data_bell;
		}
		else{
			$cnt = 0;
			$arr["noti_data_bell"]=0;
		}
		
		
		$openCnt = $this->Ticket->find('count',array('conditions'=>array('ticket_status_id'=>3)));
		//$cnt_ticket_create = count($noti_data_ticket_create);
		$arr["noti_data_ticket_create"]=$openCnt;		
		
		//$noti_data_ticket_reply = $this->Notification->find('all',array('conditions' => array('Status'=>'Reply','markas' => 'Unread','type' => 'Ticket'),'order' => array('Notification.created DESC')));
		$cnt_ticket_reply = $this->Ticket->find('count',array('conditions'=>array('ticket_status_id'=>4)));
		//$cnt_ticket_reply = count($noti_data_ticket_reply);
		$arr["noti_data_ticket_reply"]=$cnt_ticket_reply;
		
		//pr($noti_data_ticket);
		$noti_data_contact = $this->Notification->find('all',array('conditions' => array('markas' => 'Unread','type' => 'Contact'),'order' => array(
			'Notification.created DESC'
		)));
		
		$cnt_contact = count($noti_data_contact);
		
		if($cnt_contact > 0){
			$arr["cnt_contact"]=$cnt_contact;
		}
		else{
			$arr["cnt_contact"]=0;
		}
                
                $products = $this->Product->find('count',array('conditions'=>array('quantity'=>'0')));
                //pr($products);exit;
                $arr["outofstock"]=$products;
                /********************* Order count **********************/
                
                $result = $this->OrderDetail->find('all',array('group'=>'OrderDetail.status','fields'=>array('OrderDetail.status,count(OrderDetail.status) as status_cnt')));
                $status = array();
                foreach($result as $res){
                    if(isset($res['OrderDetail']['status']) and $res['OrderDetail']['status'] !=''){
                        $status[$res['OrderDetail']['status']] = $res['0']['status_cnt'];
                    }
                }
                //pr($status);
                $statusarr = array('Complete','Paid','Pending','Processed','Refund','Shipped');
                //$arr = array();
                $add = 0;
                foreach($statusarr as $statusa){
                    if(isset($status[$statusa]) and $status[$statusa] !=''){
                        $arr[$statusa] = $status[$statusa];
                        $add = $add+$status[$statusa];
                    }else{
                        $arr[$statusa] = 0;
                    }
                }
                
                /********************************************************************/
		
		// Total Notification 
		$cnt = $cnt_contact + $cnt_ticket_reply + $openCnt+$add+$products;
		if($cnt > 0){
			$arr["countAdmin"]=$cnt;
		}
		else{
			$arr["countAdmin"]=0;
		}
		
		$read = "Read";
                
		$this->Notification->updateAll(
			//array('Notification.markas1' => '"Unread"'),
			array('Notification.bell' => '"Off"'),
			array('Notification.created <= NOW()')
		);
                
                
                
                
                
		
		$json = json_encode($arr);
		echo $json;
		exit;
		
	}
	
	public function odisplay(){
		$this->layout = false;
		pr($this->request->data);
		exit;
	}
	
	/*Sameer Add bell start 7-3-2015 */
        public function bell(){
		$this->layout = false;
		//$noti_data = $this->Notification->find('all',array('conditions' => array('markas' => 'Unread')));
		
		//$cnt = count($noti_data);
		
		//Found Bell On
		$noti_data_bell = $this->Notification->find('count',array('conditions' => array('bell' => 'On')));
		if($noti_data_bell > 0){
			$cnt = 1;
		}
		else{
			$cnt = 0;
		}
		if($cnt > 0){
			echo $cnt;
		}else{
			echo 0;
		}
		exit;
	/*	$noti_data_ticket = $this->Notification->find('all',array('conditions' => array('markas' => 'Unread','type' => 'Ticket'),'order' => array(
            'Notification.created DESC'
        )));
		$cnt_ticket = count($noti_data_ticket);
		if($cnt_ticket > 0){
			$this->set("noti_data_ticket",$cnt_ticket);
		}
		else{
			$this->set("noti_data_ticket",0);
		}
		
		$noti_data_ticket_create = $this->Notification->find('all',array('conditions' => array('Status'=>'Create','markas' => 'Unread','type' => 'Ticket'),'order' => array('Notification.created DESC')));
		$cnt_ticket_create = count($noti_data_ticket_create);
		$this->set("noti_data_ticket_create",$cnt_ticket_create);
		
		
		$noti_data_ticket_reply = $this->Notification->find('all',array('conditions' => array('Status'=>'Reply','markas' => 'Unread','type' => 'Ticket'),'order' => array('Notification.created DESC')));
		$cnt_ticket_reply = count($noti_data_ticket_reply);
		$this->set("noti_data_ticket_reply",$cnt_ticket_reply);
		
		//pr($noti_data_ticket);
		$noti_data_contact = $this->Notification->find('all',array('conditions' => array('markas' => 'Unread','type' => 'Contact'),'order' => array(
            'Notification.created DESC'
        )));
		$cnt_contact = count($noti_data_contact);
		
		if($cnt_contact > 0){
			$this->set("cnt_contact",$cnt_contact);
		}
		else{
			$this->set("cnt_contact",0);
		}*/
	}
}