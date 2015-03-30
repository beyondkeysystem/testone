<?php
App::import('Core','Router');
class PurchasesController extends AppController {
    
    function payment() {
         
    }
     
    function paypal_set_ec($order_no ='') {
        //pr($this->data);
        if (!empty($this->data)) { 
            $user_id = $this->Session->read('Auth.User.id');
            if($this->data['payment_option']=='paypal'){
                $order_details = $this->OrderDetail->find('all',array('conditions'=>array('order_no'=>$order_no,'is_paid'=>'0')));
                if(empty($order_details)){
                    $this->redirect('/');
                }else{
                    $total = 0;
                    foreach($order_details as $order_detail){
                        $total = $total+$order_detail['OrderDetail']['total_amount'];
                    }
                    //pr($order_details);exit;
                }
                /*$save_order = array();
                $save_order['Payment']['user_id'] = $user_id;
                $save_order['Payment']['order_no'] = $order_no;
                $save_order['Payment']['amount'] = $total;
                $save_order['Payment']['method'] = '0';
                $save_order['Payment']['shipping_amount'] = '0';
                $save_order['Payment']['token'] = '0';
                pr($this->data);exit;*/
                
                $min_order_price = $this->Orderprices->find('first');
                $ShippingPrice = $this->ShippingPrice->find('first');
                if($min_order_price['Orderprices']['price']>=$total){
                    $total1 = $total+$ShippingPrice['ShippingPrice']['price'];
                    $shipping = 'ship';
                    $shipping_amount = $ShippingPrice['ShippingPrice']['price'];
                }else{
                    $total1 = $total;
                    $shipping_amount = 0;
                }
                //build nvp string
                //use your own logic to get and set each variable
                $returnURL = Router::url(array('controller'=>'purchases','action'=>'paypal_return'),true);
                $cancelURL = Router::url(array('controller'=>'purchases','action'=>'paypal_cancel'),true);
                $nvpStr = "RETURNURL=$returnURL&CANCELURL=$cancelURL";
                $nvpStr .= "&PAYMENTREQUEST_0_CURRENCYCODE=MYR";
                $nvpStr .= "&PAYMENTREQUEST_0_AMT=".number_format($total1,2,'.','');
                $nvpStr .= "&PAYMENTREQUEST_0_ITEMAMT=".number_format($total,2,'.','');
                $nvpStr .= "&AYMENTREQUEST_0_PAYMENTACTION=sale";
                $nvpStr .= "&L_PAYMENTREQUEST_0_ITEMCATEGORY0=Digital";
                $nvpStr .= "&L_PAYMENTREQUEST_0_NAME0=Harimau LTD \n Order#".$order_no;
                $nvpStr .= "&L_PAYMENTREQUEST_0_QTY0=1";
                $nvpStr .= "&L_PAYMENTREQUEST_0_AMT0=".number_format($total,2,'.','');
                if(isset($shipping) and $shipping =='ship'){
                    $nvpStr .= "&PAYMENTREQUEST_0_SHIPPINGAMT=".number_format($ShippingPrice['ShippingPrice']['price'],2,'.','');
                }
                
                /*$nvpStr=
                 "RETURNURL=$returnURL&CANCELURL=$cancelURL"
                ."&PAYMENTREQUEST_0_CURRENCYCODE=MYR"           
                ."&PAYMENTREQUEST_0_AMT=15"
                ."&PAYMENTREQUEST_0_ITEMAMT=10"
                ."&AYMENTREQUEST_0_PAYMENTACTION=Sale"
                ."&L_PAYMENTREQUEST_0_ITEMCATEGORY0=Digital"
                ."&L_PAYMENTREQUEST_0_NAME0=test"
                ."&L_PAYMENTREQUEST_0_QTY0=1"
                ."&L_PAYMENTREQUEST_0_AMT0=10"          
                ."&PAYMENTREQUEST_0_SHIPPINGAMT=5.00"
                ;     */ 
                //do paypal setECCheckout
                App::import('Model','Paypal');
                $paypal = new Paypal();
                if($paypal->setExpressCheckout($nvpStr)) {
                    $save_order = array();
                    $payment_order = $this->Payment->findByOrderNo($order_no);
                    if(empty($payment_order)){
                        $save_order['Payment']['user_id'] = $user_id;
                        $save_order['Payment']['order_no'] = $order_no;
                        $save_order['Payment']['amount'] = number_format($total,2,'.','');
                        $save_order['Payment']['method'] = '0';
                        $save_order['Payment']['shipping_amount'] = $shipping_amount;
                        $save_order['Payment']['token'] = $paypal->token;
                        $this->Payment->save($save_order);
                    }
                    $result = $paypal->getPaypalUrl($paypal->token);
                    
                }else {
                    $this->log($paypal->errors);
                    $result=false;
                }
                 pr($paypal->errors); 

                if(false!==$result) {
                    $this->redirect($result);
                }else {
                    $this->Session->setFlash(__('Error while connecting to PayPal, Please try again', true));
                }
                exit;
            }else if($this->data['payment_option']=='molpay'){
                $order_details = $this->OrderDetail->find('all',array('conditions'=>array('order_no'=>$order_no,'is_paid'=>'0')));
                $merchant = 2;
                $auth_key = 'QZRSggdz';
                $total = 0;
                foreach($order_details as $order_detail){
                    $total = $total+$order_detail['OrderDetail']['total_amount'];
                }
                $name = $order_details['0']['OrderDetail']['name'];
                $email = $order_details['0']['User']['username'];
                $mobile = '';//substr($order_details['0']['OrderDetail']['phone'],1,20);
                $str = strtoupper(md5( $merchant.''.$auth_key.''.$order_no.''.$total.''.$name.''.$email.''.$mobile ));
                $url = "http://payment.theviko.com/api/merchant/$merchant/$str/$total/$order_no/$name/$email/$mobile";
                $this->redirect($url);
            }else{
                $this->Session->setFlash('<div class="alert alert-danger"><i class="fa fa-exclamation-circle"></i> Invalid order details<button data-dismiss="alert" class="close" type="button">×</button> </div>');
                $this->redirect('/store/makepayment/'.$order_no);
            }
        }
    }
     
     /*
     * page when user clicks on Cancel on Paypal page
     */
    function paypal_cancel($id=null) {
        $this->layout = 'clean';    
        $this->render('paypal_back');   
    }
 
    /*
     *redirects buyer after the buyer approves the payment
     */
    function paypal_return($id=null) {
        //pr($this->params->query); //exit;
        $payerId    = $this->params->query['PayerID'];
        $token      = $this->params->query['token'];  
        //get nvp string
        //use your own logic to get and set each variable
        $Payments = $this->Payment->findByToken($token);
        
        /*$nvpStr = "TOKEN=$token&PAYERID=$payerId";
        $nvpStr .="&PAYMENTREQUEST_0_CURRENCYCODE=MYR";
        $nvpStr .="&PAYMENTREQUEST_0_AMT=".number_format($Payments['Payment']['amount'],2,'.','');
        $nvpStr .="&PAYMENTREQUEST_0_AMT=".number_format($Payments['Payment']['amount'],2,'.','');
        $nvpStr .="&AYMENTREQUEST_0_PAYMENTACTION=Sale";
        $nvpStr .="&L_PAYMENTREQUEST_0_ITEMCATEGORY0=Digital";
        $nvpStr .= "&L_PAYMENTREQUEST_0_NAME0=Harimau LTD \n Order#".$Payments['Payment']['order_no'];
        $nvpStr .= "&L_PAYMENTREQUEST_0_QTY0=1";
        $nvpStr .="&PAYMENTREQUEST_0_AMT=".number_format($Payments['Payment']['amount'],2,'.','');
        if(isset($shipping) and $shipping !=''){
            $nvpStr .= "&L_PAYMENTREQUEST_0_AMT0=5.00";
        }*/
        //echo $nvpStr;exit;
        $min_order_price = $this->Orderprices->find('first');
        $ShippingPrice = $this->ShippingPrice->find('first');
        if($min_order_price['Orderprices']['price']>=$Payments['Payment']['amount']){
            $total = $Payments['Payment']['amount']+$ShippingPrice['ShippingPrice']['price'];
            $shipping = 'ship';
        }else{
            $total = $Payments['Payment']['amount'];
        }
        $nvpStr=
             "TOKEN=$token&PAYERID=$payerId"
            ."&PAYMENTREQUEST_0_CURRENCYCODE=MYR"
            ."&PAYMENTREQUEST_0_AMT=".number_format($total,2,'.','')
            ."&PAYMENTREQUEST_0_ITEMAMT=".number_format($Payments['Payment']['amount'],2,'.','')
            ."&AYMENTREQUEST_0_PAYMENTACTION=Sale"
            ."&L_PAYMENTREQUEST_0_ITEMCATEGORY0=Digital"  
            ."&L_PAYMENTREQUEST_0_NAME0=Harimau LTD \n Order#".$Payments['Payment']['order_no']
            ."&L_PAYMENTREQUEST_0_QTY0=1"
            ."&L_PAYMENTREQUEST_0_AMT0=".number_format($Payments['Payment']['amount'],2,'.','')
            //."&PAYMENTREQUEST_0_SHIPPINGAMT=5.00"
            ;
        if(isset($shipping) and $shipping =='ship'){
            $nvpStr .= "&PAYMENTREQUEST_0_SHIPPINGAMT=".number_format($ShippingPrice['ShippingPrice']['price'],2,'.','');
        }
        //do paypal setECCheckout
        App::import('Model','Paypal');
        $paypal = new Paypal();
        if($paypal->doExpressCheckoutPayment($nvpStr) != false) {
            $result = $paypal->doExpressCheckoutPayment($nvpStr);
            $updatepaymetn = array();
            $updatepaymetn['Payment']['id'] = $Payments['Payment']['id'];
            $updatepaymetn['Payment']['transaction_id'] = $result['PAYMENTINFO_0_TRANSACTIONID'];
            $updatepaymetn['Payment']['status'] = $result['PAYMENTINFO_0_PAYMENTSTATUS'];
            $updatepaymetn['Payment']['amount'] = urldecode($result['PAYMENTINFO_0_AMT']);
            $updatepaymetn['Payment']['token'] = $token;
            $updatepaymetn['Payment']['payer_id'] = $payerId;
            $updatepaymetn['Payment']['paypal_date'] = urldecode($result['PAYMENTINFO_0_ORDERTIME']);;
            if($this->Payment->save($updatepaymetn)){
                if(strtoupper($result['PAYMENTINFO_0_PAYMENTSTATUS']) == strtoupper('Completed')){
                    $status = 'Paid';
                    $is_paid = '1';
                }else if(strtoupper($result['PAYMENTINFO_0_PAYMENTSTATUS']) == strtoupper('fail') or strtoupper($result['PAYMENTINFO_0_PAYMENTSTATUS']) == strtoupper('failed')){
                    $status = 'Canceled';
                    $is_paid = '2';
                }else{
                    $status = 'Pending';
                    $is_paid = '0';
                }
                //$this->PaymentConfig->updateAll(array('Image.type' => 'gallery'), array('Image.user_id' => $this->Auth->user('id')));
                $this->OrderDetail->updateAll(
                        array('OrderDetail.status' => '"'.$status.'"','OrderDetail.is_paid' => '"'.$is_paid.'"','OrderDetail.payment_date' => "'".date('Y-m-d H:i:s')."'"), 
                        array('OrderDetail.order_no' => $Payments['Payment']['order_no'])
                );
                
                $arr['Notification']['type'] = 'Order';
                $arr['Notification']['status'] = $status;
                $arr['Notification']['order_no'] = $Payments['Payment']['order_no'];
                $arr['Notification']['markas'] = 'Unread';
                $arr['Notification']['bell'] = 'On';
                $noti = $this->Notification->save($arr);
                $username = $this->Session->read('Auth.User.username');
                if(isset($username) and $username !=''){
                    $min_order_price = $this->Orderprices->find('first');
                    $ShippingPrice = $this->ShippingPrice->find('first');
                    $order_products = $this->OrderDetail->find('all',array('conditions'=>array('order_no'=>$Payments['Payment']['order_no'])));        
                    $emaildata =$this->Product->paymentemail($order_products,$min_order_price,$ShippingPrice);
                    
                    $Email = new CakeEmail('default');
                    $Email->template('welcome','fancy')
                        ->emailFormat('html')
                        ->from(array('harimau@test.com' => 'Harimau'))
                        ->to($username)
                        ->subject('Order details');
                    $Email->send($emaildata);
                }
                
            }
            
            //echo 'sfsdfsg';exit;
        }else {
            $this->log($paypal->errors);
            $result = false;
        }
        if($result['PAYMENTINFO_0_ACK']=='Success'){
            $this->redirect('/purchases/success');
        }
        //pr($result);exit;
        //pr(urldecode($result['PAYMENTINFO_0_ORDERTIME']));
        // pr($paypal->errors); exit;
        if (false==$result) {
            //$this->Session->setFlash(__('Error while making payment, Please try again', true),'message_fail');
        } else {
           // $this->Session->setFlash(__('Thank you for purchasing our deal.', true),'message_ok');
        }
        //echo 'sdfsdf';exit;
        //$this->render('paypal_back');   
    } 
    
    public function success(){
        
    }
}