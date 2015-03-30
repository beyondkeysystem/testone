<?php

class OrdersController extends AppController {
    public $name = 'Orders';
    public function admin_index(){
        
        $data = $this->request->query;
        //pr($data);
        //$category_id = $this->request->query('category');
        $condition = '';
        if(isset($data['orderid']) and $data['orderid'] !=''){
            $condition['OrderDetail.order_no'] = $data['orderid'];
        }
        if(isset($data['customer']) and $data['customer'] !=''){
            $condition['User.username LIKE'] = "%".$data['customer']."%";
        }
        if(isset($data['status']) and $data['status'] !=''){
            $condition['OrderDetail.status'] = $data['status'];
        }
        if(isset($data['total']) and $data['total'] !=''){
            $condition['OrderDetail.total_amount'] = $data['total'];
        }
        if(isset($data['adddate']) and $data['adddate'] !=''){
            $condition['OrderDetail.created like'] = "%".$data['adddate']."%";
        }
        if(isset($data['modifieddate']) and $data['modifieddate'] !=''){
            $condition['OrderDetail.modified like'] = "%".$data['modifieddate']."%";
        }
        
        $this->Paginator->settings = array(
            //'conditions' => array('Recipe.title LIKE' => 'a%'),
            'limit' => PAGE_LIMIT,
            'order'=>'OrderDetail.id desc',
            'group'=>'OrderDetail.order_no',
            'fields'=>array('*,sum(OrderDetail.total_amount) as total_amount'),
            'conditions'=>array($condition)
            
        );
        $orders = $this->Paginator->paginate('OrderDetail');
        //pr($orders);
        $this->set('orders',$orders);
    }
    
    public function admin_vieworder($order = ''){
        if($order == ''){
            $this->redirect('/admin/orders');
        }
        $orderdetails = $this->OrderDetail->find('first',
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
                $arr['Notification']['bell'] = 'On';
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
                $arr['Notification']['bell'] = 'On';
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
                $arr['Notification']['bell'] = 'On';
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
                $arr['Notification']['bell'] = 'On';
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
    
    public function admin_paymentstatus($order_no){
        $paymentdetails = $this->Payment->findByOrderNo($order_no);
        return $paymentdetails;
    }
    
    public function admin_refreshorder($order_id){
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
        $successflag = 0;
        $failflag = 0;
        $pendingflag = 0;
        $successarr = array();
        $failarr = array();
        $pandingarr = array();
        foreach($rt as $key=>$val){
            if($val['status'] == '00'){
                $status = 'Completed';
                $successarr[0] = $val;
                $successflag = 1;
                break;
            }
            if($val['status'] == '11'){
                $status = 'Canceled';
                $failflag = 1;
                $failarr[0] = $val;
            }
            if($val['status'] == '22'){
                $status = 'Pending';
                $pendingflag = 1;
                $pandingarr[0] = $val;
            }
        }
        
        $payment_details = $this->Payment->findByOrderNo($order_id);
        if($successflag==1){
            $rt = $successarr;
            $this->Payment->id = $payment_details['Payment']['id'];
            $this->Payment->saveField('status','Completed');
            $this->OrderDetail->updateAll(
                                        array('OrderDetail.status' => '"'.$status.'"','OrderDetail.is_paid' => '1','OrderDetail.payment_date' => "'".date('Y-m-d H:i:s')."'"), 
                                        array('OrderDetail.order_no' => $order_id)
                                    );
            $this->Session->setFlash('<div class="alert alert-success"><i class="fa fa-exclamation-circle"></i>Your payment has been successfully done<button data-dismiss="alert" class="close" type="button">×</button> </div>');
            $this->redirect($this->referer());
        }else if($pendingflag==1){
            $rt = $pandingarr;
            $this->Session->setFlash('<div class="alert alert-success"><i class="fa fa-exclamation-circle"></i>Your payment has been pending status<button data-dismiss="alert" class="close" type="button">×</button> </div>');
            $this->redirect($this->referer());
            
        }else if($failflag ==1){
            $rt = $failarr;
            $this->Payment->id = $payment_details['Payment']['id'];
            $this->Payment->saveField('status','Canceled');
            $this->OrderDetail->updateAll(
                                        array('OrderDetail.status' => '"'.$status.'"','OrderDetail.is_paid' => '2','OrderDetail.payment_date' => "'".date('Y-m-d H:i:s')."'"), 
                                        array('OrderDetail.order_no' => $order_id)
                                    );
            $this->Session->setFlash('<div class="alert alert-danger"><i class="fa fa-exclamation-circle"></i>This payment has been failed.<button data-dismiss="alert" class="close" type="button">×</button> </div>');
            $this->redirect($this->referer());
        }
    }
}