<?php

class PaymentsController extends AppController {
    public $name = 'Payments';
function beforeFilter() {
        parent::beforeFilter();
        //$this->Auth->allow('molpay_return');
    }
    public function admin_index(){
        
        $data = $this->request->query;
        //pr($data);
        //$category_id = $this->request->query('category');
        $condition = '';
        if(isset($data['orderid']) and $data['orderid'] !=''){
            $condition['Payment.transaction_id'] = $data['orderid'];
        }
        if(isset($data['status']) and $data['status'] !=''){
            $condition['Payment.status'] = $data['status'];
        }
        if(isset($data['method']) and $data['method'] !=''){
            $condition['Payment.method'] = $data['method'];
        }
        $condition['Payment.transaction_id !='] = '';
        
        $this->Paginator->settings = array(
            //'conditions' => array('Recipe.title LIKE' => 'a%'),
            'limit' => PAGE_LIMIT,
            //'order'=>'OrderDetail.id desc',
            //'group'=>'OrderDetail.order_no',
            //'fields'=>array('*,sum(OrderDetail.total_amount) as total_amount'),
            'conditions'=>array($condition)
            
        );
        $payments = $this->Paginator->paginate('Payment');
        //pr($payments);
        $this->set('payments',$payments);
    }
    
    public function admin_vieworder($order = ''){
        if($order == ''){
            $this->redirect('/admin/orders');
        }
        $orderdetails = $this->P->find('first',
                array(
                    'conditions'=>array('order_no'=>$order),
                    'group'=>'OrderDetail.order_no',
                    'fields'=>array('*,sum(OrderDetail.total_amount) as total_amount')
                    )
                
                );
                $orders = $this->OrderDetail->find('all',
                array(
                    'conditions'=>array('order_no'=>$order),
                    )
                
                );
           $payments = $this->Payment->findByOrderNo($order);
           //pr($orders);
          if(!empty($this->data)){
              //pr($this->data);
              if($this->data['OrderDetail']['status'] =='Processed'){
                  $this->OrderDetail->updateAll(
                    array('OrderDetail.is_process' => "1",'OrderDetail.status' => "'Processed'",'OrderDetail.process_date' => "'".date('Y-m-d')."'"),
                    array('OrderDetail.order_no' => "$order")
                );
                $arr['Notification']['type'] = 'Order';
                $arr['Notification']['status'] = 'Order Processed';
                $arr['Notification']['order_no'] = $order;
                $arr['Notification']['markas'] = 'Unread';
                $noti = $this->Notification->save($arr);
              }else if($this->data['OrderDetail']['status'] =='Shipped'){
                  $this->OrderDetail->updateAll(
                    array('OrderDetail.is_shipped' => "1",'OrderDetail.docket_no' => "'".$this->data['OrderDetail']['docket_no']."'",'OrderDetail.status' => "'Shipped'",'OrderDetail.shipped_date' => "'".date('Y-m-d')."'"),
                    array('OrderDetail.order_no' => "$order")
                );
                $arr['Notification']['type'] = 'Order';
                $arr['Notification']['status'] = 'Order Shipped';
                $arr['Notification']['order_no'] = $order;
                $arr['Notification']['markas'] = 'Unread';
                $noti = $this->Notification->save($arr);
                  if(isset($orders[0]['User']['phone']) and $orders[0]['User']['phone']){
                    $message = 'your Delivery Tracking Number is '.$this->data['OrderDetail']['docket_no'];
                    $smsd['body'] = $message;
                    $smsd['to'] = $orders[0]['User']['phone'];
                    $data = $this->sendsms($smsd);
                  }else{
                        $message = 'your Delivery Tracking Number is '.$this->data['OrderDetail']['docket_no'];
                        $Email = new CakeEmail('default');
                        $Email->template('welcome','fancy')
                            ->emailFormat('html')
                            ->from(array('harimau@test.com' => 'Harimau'))
                            //->to($this->Session->read('Auth.User.email'))
                            ->to($orders[0]['User']['username'])
                            ->subject('Delivery Tracking Number');
                        $Email->send($message); 
                  }
                    
              }
              else if($this->data['OrderDetail']['status'] =='Complete'){
                  $this->OrderDetail->updateAll(
                    array('OrderDetail.is_delivered' => "1",'OrderDetail.status' => "'Complete'",'OrderDetail.delivery_date' => "'".$this->data['OrderDetail']['delevery_date']."'"),
                    array('OrderDetail.order_no' => "$order")
                );
                $arr['Notification']['type'] = 'Order';
                $arr['Notification']['status'] = 'Order Complete';
                $arr['Notification']['order_no'] = $order;
                $arr['Notification']['markas'] = 'Unread';
                $noti = $this->Notification->save($arr);
              }else if($this->data['OrderDetail']['status'] =='Refund'){
                  $this->OrderDetail->updateAll(
                    array('OrderDetail.is_return' => "1",'OrderDetail.status' => "'Refund'",'OrderDetail.return_date' => "'".date('Y-m-d')."'"),
                    array('OrderDetail.order_no' => "$order")
                );
                $arr['Notification']['type'] = 'Order';
                $arr['Notification']['status'] = 'Order Refund';
                $arr['Notification']['order_no'] = $order;
                $arr['Notification']['markas'] = 'Unread';
                $noti = $this->Notification->save($arr);
              }
              $this->redirect('/admin/orders/vieworder/'.$order);
          }
         
        $min_order_price = $this->Orderprices->find('first');
        $this->set('min_order_price',$min_order_price);
        $ShippingPrice = $this->ShippingPrice->find('first');
        $this->set('ShippingPrice',$ShippingPrice);
        
        $this->set('payments',$payments);
        $this->set('orders',$orders);
        $this->set('orderdetails',$orderdetails);
    }

	public function molpay_return($order_id = NULL){
		$merchant = merchant;
		$auth_key = auth_key;
		$str = $merchant.''.$auth_key.''.$order_id;
		$matchauth = md5($str);
		$matchauth = strtoupper ($matchauth);
		$url = "http://payment.theviko.com/api/requestResult/$merchant/$matchauth/$order_id";
                //  Initiate curl
                $ch = curl_init();
                // Disable SSL verification
                curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
                // Will return the response, if false it print the response
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                curl_setopt($ch, CURLOPT_HEADER, 0);
                // Set the url
                curl_setopt($ch, CURLOPT_URL,$url);
                // Execute
                $result=curl_exec($ch);
                // Closing
                curl_close($ch);
                //pr($result);exit;
                $rt = json_decode($result, true);
                //echo WWW_ROOT.'files/test.php';
                //$rt = file_get_contents(WWW_ROOT.'files/test.php');
                //$rt = json_decode($rt, true);
                //pr($rt);exit;
                //exit;
                $successflag = 0;
                $failflag = 0;
                $pendingflag = 0;
                $successarr = array();
                $failarr = array();
                $pandingarr = array();
                foreach($rt as $key=>$val){
                    if($val['status'] == '00'){
                        $successarr[0] = $val;
                        $successflag = 1;
                        break;
                    }
                    if($val['status'] == '11'){
                        $failflag = 1;
                        $failarr[0] = $val;
                    }
                    if($val['status'] == '22'){
                        $pendingflag = 1;
                        $pandingarr[0] = $val;
                    }
                }
                $rt = array();
                if($successflag==1){
                    $rt = $successarr;
                }else if($pendingflag==1){
                    $rt = $pandingarr;
                }else if($failflag ==1){
                    $rt = $failarr;
                    $this->Session->setFlash('<div class="alert alert-danger"><i class="fa fa-exclamation-circle"></i>Your payment has been failed please do payment again<button data-dismiss="alert" class="close" type="button">×</button> </div>');
                    $this->redirect('/store/makepayment/'.$order_id);
                }
               // pr($rt);
                $rt = array_pop($rt);
                //pr($rt);
                //exit;
                if(!empty($rt)){
                    
                    $user_id = $this->Session->read('Auth.User.id');
                    $order_details = $this->OrderDetail->find('all',array('conditions'=>array('order_no'=>$order_id,'is_paid'=>'0','user_id'=>$user_id)));
                    if(!empty($order_details)){
                        
                        $total = 0;
                        foreach($order_details as $order_detail){
                            $total = $total+$order_detail['OrderDetail']['total_amount'];
                        }
                        $payment_details = $this->Payment->findByOrderNo($order_id);
                        if($rt['status'] =='00'){
                            $status = 'Completed';
                            $status_flag = '1';
                        }else if($rt['status'] =='11'){
                            $status = 'Canceled';
                            $this->Session->setFlash('<div class="alert alert-danger"><i class="fa fa-exclamation-circle"></i>Your payment has been failed please try again<button data-dismiss="alert" class="close" type="button">×</button> </div>');
                            $this->redirect('/store/makepayment/'.$order_id);
                            $status_flag = '2';
                        }else if($rt['status'] =='22'){
                            $status = 'Pending';
                            $status_flag = '3';
                        }
                        if(empty($payment_details)){
                            $save_order['Payment']['user_id'] = $order_details['0']['User']['id'];;
                            $save_order['Payment']['order_no'] = $order_id;
                            $save_order['Payment']['amount'] = number_format($total,2,'.','');
                            $save_order['Payment']['method'] = '1';
                            $save_order['Payment']['paypal_date'] = $rt['pdate'];
                            $save_order['Payment']['transaction_id'] = $rt['tid'];
                            $save_order['Payment']['status'] = $status;
                            if($this->Payment->save($save_order)){
                                if($rt['status'] =='00'){
                                     $this->OrderDetail->updateAll(
                                            array('OrderDetail.status' => '"'.$status.'"','OrderDetail.is_paid' => '1','OrderDetail.payment_date' => "'".date('Y-m-d H:i:s')."'"), 
                                            array('OrderDetail.order_no' => $order_id)
                                    );
                                }else if($rt['status'] =='11'){
                                    $this->OrderDetail->updateAll(
                                            array('OrderDetail.status' => '"'.$status.'"','OrderDetail.is_paid' => '2','OrderDetail.payment_date' => "'".date('Y-m-d H:i:s')."'"), 
                                            array('OrderDetail.order_no' => $order_id)
                                    );
                                }else if($rt['status'] =='22'){
                                    $this->OrderDetail->updateAll(
                                            array('OrderDetail.status' => '"'.$status.'"'), 
                                            array('OrderDetail.order_no' => $order_id)
                                    );
                                }
                                $arr['Notification']['type'] = 'Order';
                                $arr['Notification']['status'] = $status;
                                $arr['Notification']['order_no'] = $order_id;
                                $arr['Notification']['markas'] = 'Unread';
                                $arr['Notification']['bell'] = 'On';
                                $noti = $this->Notification->save($arr);
                                $this->redirect('/purchases/success/'.$status);
                            }
                        }else{
                            if($rt['status'] =='00'){
                                $this->Payment->id = $payment_details['Payment']['id'];
                                $this->Payment->saveField('status',$status);
                                $this->OrderDetail->updateAll(
                                            array('OrderDetail.status' => '"'.$status.'"','OrderDetail.is_paid' => '1','OrderDetail.payment_date' => "'".date('Y-m-d H:i:s')."'"), 
                                            array('OrderDetail.order_no' => $order_id)
                                    );
                                $this->Session->setFlash('<div class="alert alert-success"><i class="fa fa-exclamation-circle"></i> Payment has been done successfully<button data-dismiss="alert" class="close" type="button">×</button> </div>');
                                $this->redirect('/users/order');
                            }
                        }
                    }else{
                        $this->Session->setFlash('<div class="alert alert-danger"><i class="fa fa-exclamation-circle"></i> Invalid order details<button data-dismiss="alert" class="close" type="button">×</button> </div>');
                        $this->redirect('/');
                    }
                }else{
                    $this->Session->setFlash('<div class="alert alert-danger"><i class="fa fa-exclamation-circle"></i> Invalid order details<button data-dismiss="alert" class="close" type="button">×</button> </div>');
                    $this->redirect('/');
                }
		
exit("Success");

/* For testing hit this http://harimau.pd.cisinlive.com/payments/molpay_return/QU39999393939
Format:
amount;
status;
transactionID (Ref);
orderID;
paymentTime;
submitTime;


Status
00 success
11 fail
22 suspense
*/
	}
}
