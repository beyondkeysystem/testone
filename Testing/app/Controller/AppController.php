<?php
/**
 * Application level Controller
 *
 * This file is application-wide controller file. You can put all
 * application-wide controller-related methods here.
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

App::uses('Controller', 'Controller');
App::uses('Sanitize', 'Utility');

/**
 * Application Controller
 *
 * Add your application-wide methods in the class below, your controllers
 * will inherit them.
 *
 * @package		app.Controller
 * @link		http://book.cakephp.org/2.0/en/controllers.html#the-app-controller
 */
App::import('Vendor', 'twiliosms/Services/Twilio');
App::uses('CakeEmail', 'Network/Email');
class AppController extends Controller {
    public $uses = array('Ticket','Country','User','Customer','Notification','Address','OrderDetail','ShippingPrice','Product','Payment','Orderprices','FcodeProduct','Fcode');
    public $components = array('Session','Auth','Paginator','Upload','Paypal');
    /*public $components = array(
        'Session',
        'Auth' => array(
            "loginAction"=>"/users/login",
            'loginRedirect' => array('controller' => 'users', 'action' => 'index'),
            'logoutRedirect' => array('controller' => 'users', 'action' => 'login','loggedout')
        ),
        'Upload',
        'Paginator'
    );*/

        
   // public $helpers = array('Auth');
    function beforeFilter() {
        
        $controller = array('store', 'users');
        $method = array('admin_logout', 'admin_login','index','details','fillimage','getcolor','cart','addtocart','updatecartsesssion','emptycartsession','deletecartsession','cartview');
        
        if (isset($this->params->controller) and isset($this->params->action) and in_array($this->params->controller, $controller) and in_array($this->params->action, $method)) {
            $this->Auth->allow($method);
        }

    	$prefix = ($this->params['prefix']?$this->params['prefix']:"default");
    	if($prefix == 'admin'){
            if(isset($user_role) and $user_role !='admin')
                $this->redirect('/');
            $this->Auth->loginAction = array('controller' => 'users','action' => 'login');
            $this->Auth->loginRedirect = array('controller' => 'users','action' => 'index');
            $this->Auth->logoutRedirect = array('controller' => 'users','action' => 'login','loggedout');
            $this->layout="admin";
            /*$result = $this->OrderDetail->find('all',array('group'=>'OrderDetail.status','fields'=>array('OrderDetail.status,count(OrderDetail.status) as status_cnt')));
            $status = array();
            foreach($result as $res){
                if(isset($res['OrderDetail']['status']) and $res['OrderDetail']['status'] !=''){
                    $status[$res['OrderDetail']['status']] = $res['0']['status_cnt'];
                }
            }
            pr($status);
            $statusarr = array('Complete','Paid','Pending','Processed','Refund','Shipped');
            $arr = array();
            foreach($statusarr as $statusa){
                if(isset($status[$statusa]) and $status[$statusa] !=''){
                    $arr[$statusa] = $status[$statusa];
                }else{
                    $arr[$statusa] = 0;
                }
            }
            pr($arr);
            pr($result);exit;*/
            //$noti_data = $this->Notification->find('all',array('conditions' => array('markas' => 'Unread')));
		
		/*$cnt = count($noti_data);
		if($cnt > 0){
			$this->set("countAdmin",$cnt);
		}else{
			$this->set("countAdmin",0);
		}*/
		
		/*$noti_data_ticket = $this->Notification->find('all',array('conditions' => array('markas' => 'Unread','type' => 'Ticket'),'order' => array(
            'Notification.created DESC'
        )));
		$cnt_ticket = count($noti_data_ticket);
		if($cnt_ticket > 0){
			$this->set("noti_data_ticket",$cnt_ticket);
		}
		else{
			$this->set("noti_data_ticket",0);
		}
		
		//$noti_data_ticket_create = $this->Notification->find('count',array('conditions' => array('Status'=>'Create','markas' => 'Unread','type' => 'Ticket'),'order' => array('Notification.created DESC')));
		//$cnt_ticket_create = count($noti_data_ticket_create);
		$cnt_ticket_create = $this->Ticket->find('count',array('conditions'=>array('ticket_status_id'=>3)));
		$this->set("noti_data_ticket_create",$cnt_ticket_create);
		
		
		//$noti_data_ticket_reply = $this->Notification->find('all',array('conditions' => array('Status'=>'Reply','markas' => 'Unread','type' => 'Ticket'),'order' => array('Notification.created DESC')));
		$cnt_ticket_reply = $this->Ticket->find('count',array('conditions'=>array('ticket_status_id'=>4)));
		//$cnt_ticket_reply = count($noti_data_ticket_reply);
		$this->set("noti_data_ticket_reply",$cnt_ticket_reply);
		
		//pr($noti_data_ticket);
		$noti_data_contact = $this->Notification->find('all',array('conditions' => array('markas' => 'Unread','type' => 'Contact'),'order' => array(
            'Notification.created DESC'
        )));
		$cnt_contact = count($noti_data_contact);
		$cnt = $total = $cnt_contact + $cnt_ticket_reply + $cnt_ticket_create;
		if($cnt_contact > 0){
			$this->set("cnt_contact",$cnt_contact);
		}
		else{
			$this->set("cnt_contact",0);
		}
		if($cnt > 0){
			$this->set("countAdmin",$cnt);
		}else{
			$this->set("countAdmin",0);
		}*/
    	}
    	else{
            $user_id = $this->Session->read('Auth.User.id');
                if(isset($user_id) and $user_id !=''){
                    $customerdata = $this->User->findById($user_id);
                    $this->set('customerdata',$customerdata);
                    //pr($customerdata);
                }
            $this->Auth->loginAction = array('controller' => 'users','action' => 'login');
            $this->Auth->loginRedirect = array('controller' => 'users','action' => 'order');
            $this->Auth->logoutRedirect = array('controller' => 'users','action' => 'login');
    	    $this->layout="default";
    	}

        $this->set_language();
        $this->close12hrsorder();
        $this->close30daysorder();
    }
    
    public function beforeRender() {
    	$this->response->disableCache();       
    }

    /*Upload File Code from Component*/
    public function uploadfile($fileattr,$destination,$image_name,$is_orib='',$file_size=array()){
        $attr = getimagesize($fileattr['tmp_name']);
        if(isset($is_orib) and $is_orib !=''){
            $file_size = array(394,248);
        }else if(empty($file_size)){
            $file_size = array($attr[0],$attr[1]);
        }
        $result = $this->Upload->upload($fileattr, $destination, null, array('type' => 'resizecrop', 'size' => $file_size, 'output' => 'jpg'),'','',$image_name);
    }

    public function set_language(){
        /* Language code */
        // pr($this->params);
        if($this->params->language == 'may'){
            Configure::write('Config.language', 'msa');
            CakeSession::write('Config.language', 'msa');
        }else if($this->params->language == 'chi'){
            Configure::write('Config.language', 'zho');
            CakeSession::write('Config.language', 'zho');
        }else{
            Configure::write('Config.language', 'eng');
            CakeSession::write('Config.language', 'eng');
        }

    }
    
    public function sendsms($sendsms=''){
        //$to = $sendsms['to'];
        $body = $sendsms['body'];
        $AccountSid = AccountSid;
        $AuthToken = AuthToken;
        $client = new Services_Twilio($AccountSid, $AuthToken);
        $message = $client->account->messages->create(array(
        "From" => From_no,
        "To" => "+918602968202",
        //"To" => "+919424008055",
        //"To"=>$to,
        "Body" => $body,
        ));
        return true;
   }
   
   public function close12hrsorder(){
        $orders = $this->OrderDetail->find('all',array('conditions'=>array('is_paid'=>'0','is_return'=>'0')));        
        $t1 = StrToTime (date('Y-m-d H:i:s'));        
        foreach($orders as $order){
            $t2 = StrToTime($order['OrderDetail']['created']);
            $diff = $t1 - $t2;
            $hours = $diff / ( 60 * 60 );
            if($hours>=12){
                
                $this->OrderDetail->id = $order['OrderDetail']['id'];
                $this->OrderDetail->saveField('is_paid','2');
                
                $this->Product->id = $order['Product']['id'];
                $this->Product->saveField('quantity',$order['Product']['quantity']+$order['OrderDetail']['quantity']);
            }
        }
    }
    
    public function close30daysorder(){
        $this->User->query("DELETE FROM `order_details` WHERE DATEDIFF(NOW(), created) >= 30 and is_return = '0'");
    }
}
