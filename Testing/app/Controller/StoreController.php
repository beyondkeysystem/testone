<?php
App::uses('AppController', 'Controller');

class StoreController extends AppController {

    public $components = array('Paginator');
    public $uses = array('testCreate','setExpCheckout','getExpressCheckout','getcolor','ProductImage','Product','TaxClass','StockStatus','LengthClass','WeightClass', 'Category','CustomerGroup','Customer','Address','Country','Zone');
    
    // Set layout and auth allowance beforefilter
    function beforeFilter() {
        parent::beforeFilter();
        $this->Auth->allow('bundles','empty_cart','emptycartsession','emptycart');
    }
    
    //coming soon page
    public function index() {
        
        $categories = $this->Category->get_categories_sortorderby_asc();        
        $this->set('categories',$categories);
        
        /******************* Product searching *********************/
        $category_id = $this->request->query('category');
        $condition = '';
        if(isset($category_id) and $category_id !=''){
            $condition['ProductCategory.category_id'] = $category_id;
        }
        $stock = $this->request->query('stock');
        if(isset($stock) and $stock !=''){
            $condition['Product.stock_status_id !='] = $stock;
        }
        $rev = $this->request->query('rev');
        if(isset($rev) and $rev !=''){
            $condition['Product.tag like'] = "%$rev%";
        }
        /****************** Product sorting *************************/
        $sort_id = $this->request->query('sort');
        if(isset($sort_id) and $sort_id =='3'){
            $order = 'Product.date_available asc';
        }else if(isset($sort_id) and $sort_id =='4'){
            $order = 'Product.price asc';
        }else if(isset($sort_id) and $sort_id =='5'){
            $order = 'Product.price desc';
        }else{
            $order = 'Product.id desc';
        }
        
        $condition['Product.stock_status_id !='] = '3';
        $condition['Product.status ='] = '1';
        $condition['Product.quantity !='] = '0';
        $this->paginate = array(
                'joins' => array(
                        array(
                                'table' => 'product_categories',
                                'type' => 'LEFT',
                                'alias' => 'ProductCategory',
                                'conditions' => array('ProductCategory.product_id = Product.id'),
                                //'group'=>
                        ),
                ),
                'group'=>'Product.id',
                'limit' => PAGE_LIMIT,
                'conditions' => array($condition),
                'order'=>$order


        );
        $products = $this->Paginator->paginate('Product');
        $this->set('products',$products);
    }


    public function details($id=''){
        
        if($id ==''){
            $this->redirect('/');
        }
        
        $product = $this->Product->findById($id);
        if(empty($product)){
            $this->redirect('/');
        }
        //$this->set('product',$product);
        $this->Product->id = $id;
        $viewed = $product['Product']['viewed']+1;
        $this->Product->saveField('viewed',$viewed);
        $populars = $this->Product->find('all',array('order'=>'viewed desc','limit'=>5));
        $this->set('populars',$populars);
        $this->set('product',$product);
        //pr($populars);exit;
    }
    
    function fillimage(){
        $type = $this->data['type'];
        $image_id = $this->data['image_id'];
        if($type=='p'){
            $this->Product->recursive = 0;
            $product = $this->Product->findById($image_id);
            if(isset($product['Product']['image']) and $product['Product']['image'] !=''){
                //echo $this->Html->image('../uploads/'.$product['Product']['image']);
               echo '<img alt="" style="width:350px;height:350px;" src="/img/../uploads/'.$product['Product']['image'].'">';
            }else{
                //echo $this->Html->image('../uploads/thumbs/no_product_image2.png');
            }
        }else if($type=='i'){
            //  $this->ProductImage->recursive = 0;
            $ProductImage = $this->ProductImage->findById($image_id);
            if(isset($ProductImage['ProductImage']['image']) and $ProductImage['ProductImage']['image'] !=''){
                //echo $this->Html->image('../uploads/'.$ProductImage['ProductImage']['image']);
                echo '<img style="width:350px;height:350px;" alt="" src="/img/../uploads/'.$ProductImage['ProductImage']['image'].'">';
            }else{
                //echo $this->Html->image('../uploads/thumbs/no_product_image2.png');
            }
        }
        exit;
    }
    
    function getcolor($model_name=''){
        //echo $model_name;
        return $product = $this->Product->find('all',array('conditions'=>array('model'=>$model_name)));
        //pr($product);exit;
    }
    
    public function cart(){
        $min_order_price = $this->Orderprices->find('first');
        $this->set('min_order_price',$min_order_price);
        $cart_data = $this->Session->read('cart_data');
        if(!empty($cart_data)){
            // pr($cart_data);
            $product_ids = array();
            foreach($cart_data as $key=>$val){
                $product_ids[] = $key;
            }
            $cart_products = $this->Product->find('all',array('conditions'=>array('Product.id'=>$product_ids)));
            $this->set('cart_products',$cart_products);
            // pr($cart_products);//exit;
        }
        if(empty($cart_products)){
                $this->redirect('/store/emptycart');
            }
    }
    function emptycart(){
        
    }
    
    public function addtocart(){
        error_reporting(0);
       // $this->Session->write('cart_data','');exit;
        $product_id = $this->data['product_id'];
        //$cart_data = $this->Session->read('cart_data');
        $product = $this->Product->findById($product_id);
        
        $cart_data = $this->Session->read('cart_data');
        $flag = '1';
        
        if(($cart_data[$product_id] >= ($product['Product']['quantity']))){
            $product = $this->Product->findById($product_id);
            echo $msg =  'You have reached '.$product['Product']['name'].'\'s maximum purchase quota. '
            . 'It can no longer be added to cart. Please proceed to shopping cart to complete the purchase.';exit;
            $flag = '0';
        }
        if($cart_data[$product_id] >= 2){
            $product = $this->Product->findById($product_id);
           echo $msg =  'You have reached '.$product['Product']['name'].'\'s maximum purchase quota. '
            . 'It can no longer be added to cart. Please proceed to shopping cart to complete the purchase.';exit;
            $flag = '0';
        }
        /*if($cart_data[$product_id] >= 2){
            $product = $this->Product->findById($product_id);
            $msg =  'You have reached '.$product['Product']['name'].'\'s maximum purchase quota. '
            . 'It can no longer be added to cart. Please proceed to shopping cart to complete the purchase.';//exit;
            $flag = '0';
        }*/
        if($flag == '1'){
            if(empty($cart_data)){
                $cartarr[$product_id] = 1;
                $this->Session->write('cart_data',$cartarr);
            }else{
                if(isset($cart_data[$product_id]) and $cart_data[$product_id] !=''){
                    $cart_data[$product_id] += 1;
                    $this->Session->write('cart_data',$cart_data);
                }else{
                    $cart_data[$product_id] += 1;
                    $this->Session->write('cart_data',$cart_data);
                }
            }
        }
        $cart_data = $this->Session->read('cart_data');
        $total = 0;
        foreach($cart_data as $key => $val){
            $total = $total+$val;
        }
        if($flag == '0'){
            echo $msg;
        }else if($flag=='1'){
            echo "$total";
        }
        
        exit;
    }
    
    public function cartview(){
            $this->layout = false;
            $cart_data = $this->Session->read('cart_data');
            if(isset($cart_data)){
                            foreach ($cart_data as $product_id => $quantity) {
                    $product_det = $this->Product->findById($product_id);
                    

                    /*Product Price Code Starts*/
                    $current_date = strtotime(date('Y-M-d'));

                    $discount_price = false;

                    if (isset($product_det['ProductDiscount'][0])) {

                        foreach ($product_det['ProductDiscount'] as $product_discount) {
                            $start_date = strtotime($product_discount['date_start']);
                            $end_date = strtotime($product_discount['date_end']);
                            if ($current_date >= $start_date && $current_date <= $end_date) {
                                $discount_price = $product_discount['price'];
                                break;
                            } else {
                                $discount_price = $product_det['Product']['price'];
                            }
                        }
                    } else {
                        $discount_price = $product_det['Product']['price'];
                    }
                    /*Product Price Code Ends*/

                    $cart[$product_id]['item_no'] = $product_id;
                    $cart[$product_id]['name'] = $product_det['Product']['name'];
                    $cart[$product_id]['image'] = $product_det['Product']['image'];
                    $cart[$product_id]['price'] = $discount_price;
                    $cart[$product_id]['quantity'] = $quantity;


                    $this->set('cart',$cart);
                }            
            }
            // print_r($cart);
            // echo json_encode($cart);
            $this->render('top_cart');
            //exit();
        }

        public function deletecartsession(){
            // pr($this->data);
            $product_id = $this->data['product_id'];
            $cart_data = $this->Session->read('cart_data');
            // echo $product_id;
            // pr($cart_data);
            $delete_quantity = $cart_data[$product_id];
            if(array_key_exists($product_id, $cart_data)){
                unset($cart_data[$product_id]);
            }
            $this->Session->write('cart_data',$cart_data);
            echo $delete_quantity;
            exit;
        }

        public function emptycartsession(){
            $cart_data = $this->Session->read('cart_data');
            unset($cart_data);
            $this->Session->write('cart_data',$cart_data);
            echo true;
            exit;
        }

        public function updatecartsesssion(){
            $product_id = $this->data['product_id'];
            $quantity = $this->data['quantity'];
            $cart_data = $this->Session->read('cart_data');
            $cart_data[$product_id] = $quantity;
            $this->Session->write('cart_data',$cart_data);
            echo true;
            exit;
        }
        
        function checkout(){
            $min_order_price = $this->Orderprices->find('first');
            $this->set('min_order_price',$min_order_price);
            $ShippingPrice = $this->ShippingPrice->find('first');
            $this->set('ShippingPrice',$ShippingPrice);
            $user_id = $this->Session->read('Auth.User.id');
            $this->Address->set($this->request->data);
            if($this->Address->validates($this->request->data)){
                if($this->request->is('post')){
                    $this->request->data['Address']['user_id'] = $user_id;
                    $this->request->data['Address'] = Sanitize::clean($this->request->data['Address'], array("remove_html" => TRUE));
                    if($this->Address->save($this->request->data)){
                        $this->Session->setFlash('<div class="alert alert-success"><i class="fa fa-exclamation-circle"></i> Address has been added successfully<button data-dismiss="alert" class="close" type="button">×</button> </div>');
                        $this->redirect('/store/checkout');
                    }
                }
            }
            // Product details
            $cart_data = $this->Session->read('cart_data');
            if(!empty($cart_data)){
                // pr($cart_data);
                $product_ids = array();
                foreach($cart_data as $key=>$val){
                    $product_ids[] = $key;
                }
                $cart_products = $this->Product->find('all',array('conditions'=>array('Product.id'=>$product_ids)));
                $this->set('cart_products',$cart_products);
            }else{
                $this->redirect('/store/emptycart');
            }
            
            
            $addresses = $this->Address->find('all',array('conditions'=>array('Address.user_id'=>$user_id)));
            $this->set('addresses',$addresses);
            /*$emaildata =$this->Product->setemaildata($cart_products,$min_order_price,$ShippingPrice,$cart_data);
            $Email = new CakeEmail('default');
            $Email->template('welcome','fancy')
                ->emailFormat('html')
                ->from(array('harimau@test.com' => 'Harimau'))
                ->to('vovel@mailinator.com')
                ->subject('Order details');
            $Email->send($emaildata);*/
        }
        
        public function edit(){
        $this->layout = false;
        $user_id = $this->Session->read('Auth.User.id');
        
        if(isset($this->data['code']) and $this->data['code'] !=''){
            $id = $this->data['code'];
            $this->request->data = $this->Address->findById($id);
        }else{
            $this->Address->set($this->request->data);
            if($this->Address->validates($this->request->data)){
                if(!empty($this->data['Address'])){
                    $this->request->data['Address'] = Sanitize::clean($this->request->data['Address'], array("remove_html" => TRUE));
                    if($this->Address->save($this->request->data)){
                        $this->Session->setFlash('<div class="alert alert-success"><i class="fa fa-exclamation-circle"></i> Address has been added successfully<button data-dismiss="alert" class="close" type="button">×</button> </div>');
                        //$this->redirect('/users/address_manager');
                        echo '1';exit;
                    }
                }
            }
        }
        $this->render('editaddress');
    }
    
    public function delete($id=''){
        if($id ==''){
            $this->redirect('/users/address_manager');
        }
        $this->Address->delete($id);
        $this->redirect('/users/address_manager');
    }
    
    public function placeorder(){
        $cart_data = $this->Session->read('cart_data');
        $cart_data2 = $this->Session->read('cart_data2');
        $fcode = $this->Session->read('fcode');
        $min_order_price = $this->Orderprices->find('first');
        $ShippingPrice = $this->ShippingPrice->find('first');
        if(!empty($cart_data)){
            // pr($cart_data);
            $product_ids = array();
            foreach($cart_data as $key=>$val){
                $product_ids[] = $key;
            }
            $cart_products = $this->Product->find('all',array('conditions'=>array('Product.id'=>$product_ids)));
            $total_price = 0;
            foreach($cart_products as $cart_product){
                $current_date = strtotime(date('Y-M-d'));
                $discount_price = false;
                if (isset($cart_product['ProductDiscount'][0])) {
                    foreach ($cart_product['ProductDiscount'] as $product_discount) {
                        $start_date = strtotime($product_discount['date_start']);
                        $end_date = strtotime($product_discount['date_end']);
                        if ($current_date >= $start_date && $current_date <= $end_date) {
                            $discount_price = $product_discount['price'];
                            $discount_percentage = number_format((($cart_product['Product']['price'] - $product_discount['price']) * 100) / $cart_product['Product']['price']);
                            break;
                        } else {
                            $discount_price = $cart_product['Product']['price'];
                        }
                    }
                } else {
                    $discount_price = $cart_product['Product']['price'];
                }
                $total_price = $total_price+ $discount_price*$cart_data[$cart_product['Product']['id']];
            }
            if(!empty($this->data)){
                if(md5($this->data['amount']) == md5($total_price)){
                    $orderarr = array();
                    $orderno = time().rand(5,1000000);
                    $address_id = $this->data['address_id'];
                    $address = $this->Address->findById($address_id);
                    $total_price = 0;
                    $i=0;
                    foreach($cart_products as $cart_product){
                        $current_date = strtotime(date('Y-M-d'));
                        $discount_price = false;
                        if (isset($cart_product['ProductDiscount'][0])) {
                            foreach ($cart_product['ProductDiscount'] as $product_discount) {
                                $start_date = strtotime($product_discount['date_start']);
                                $end_date = strtotime($product_discount['date_end']);
                                if ($current_date >= $start_date && $current_date <= $end_date) {
                                    $discount_price = $product_discount['price'];
                                    $discount_percentage = number_format((($cart_product['Product']['price'] - $product_discount['price']) * 100) / $cart_product['Product']['price']);
                                    break;
                                } else {
                                    $discount_price = $cart_product['Product']['price'];
                                }
                            }
                        } else {
                            $discount_price = $cart_product['Product']['price'];
                        }
                        $total_price = $total_price+ $discount_price*$cart_data[$cart_product['Product']['id']];
                        
                        
                        $orderarr[$i]['OrderDetail']['user_id'] = $this->Session->read('Auth.User.id');
                        $orderarr[$i]['OrderDetail']['product_id'] = $cart_product['Product']['id'];
                        $orderarr[$i]['OrderDetail']['order_no'] = $orderno;
                        $orderarr[$i]['OrderDetail']['name'] = $address['Address']['firstname'].' '.$address['Address']['lastname'];
                        $orderarr[$i]['OrderDetail']['address'] = $address['Address']['address_1'].' '.$address['Address']['address_2'].'<br />'.$address['Address']['city'].', '.$address['Address']['state'].', '.$address['Address']['postcode'];
                        $orderarr[$i]['OrderDetail']['phone'] = $address['Address']['phone'];
                        $orderarr[$i]['OrderDetail']['product_amount'] = $discount_price;
                        $orderarr[$i]['OrderDetail']['order_date'] = date('Y-m-d H:i:s');
                        $orderarr[$i]['OrderDetail']['quantity'] = $cart_data[$cart_product['Product']['id']];
                        $orderarr[$i]['OrderDetail']['product_name'] = $cart_product['Product']['name'];
                        $orderarr[$i]['OrderDetail']['total'] = $discount_price*$cart_data[$cart_product['Product']['id']];
                        $orderarr[$i]['OrderDetail']['total_amount'] = $discount_price*$cart_data[$cart_product['Product']['id']];
                        if($discount_price<=$min_order_price['Orderprices']['price']){
                            $orderarr[$i]['OrderDetail']['shipping_amount'] = $min_order_price['Orderprices']['price'];
                        }
                        
                      $i++;  
                    }
                    //pr($cart_data);
                    foreach($cart_data as $key=>$val){
                        if(!empty($cart_data2)){
                            if(isset($fcode) and $fcode !=''){
                                 $code = $this->Fcode->findByCode($fcode);
                                 $this->Fcode->id = $code['Fcode']['id'];
                                 $this->Fcode->saveField('status','1');
                                 $this->Session->write('fcode','');
                            }
                            if(in_array($key,$cart_data2) and $val>1){
                                $productval = $this->Product->findById($key);
                                $quantity = $productval['Product']['quantity']-($val-1);
                                $this->Product->id = $key;
                                $this->Product->saveField('quantity',$quantity);
                            }else{
                                
                            }
                        }else{
                            $productval = $this->Product->findById($key);
                            $quantity = $productval['Product']['quantity']-$val;
                            $this->Product->id = $key;
                            $this->Product->saveField('quantity',$quantity);
                        }      
                    }
                    /*$arr['Notification']['type'] = 'Order';
                    $arr['Notification']['status'] = 'Pending';
                    $arr['Notification']['order_no'] = $orderno;
                    $arr['Notification']['markas'] = 'Unread';
                    $arr['Notification']['bell'] = 'On';
                    $noti = $this->Notification->save($arr);*/
                    
                    
                    /*$emaildata =$this->Product->setemaildata($cart_products,$min_order_price,$ShippingPrice,$cart_data);
                    $Email = new CakeEmail('default');
                    $Email->template('welcome','fancy')
                        ->emailFormat('html')
                        ->from(array('harimau@test.com' => 'Harimau'))
                        ->to('vovel@mailinator.com')
                        ->subject('Order details');
                    $Email->send($emaildata);*/
                    
                    $cart_products = $this->Product->find('all',array('conditions'=>array('Product.id'=>$product_ids,'quantity'=>'0')));
                    if(!empty($cart_products)){
                        $arr['Notification']['type'] = 'Stock';
                        $arr['Notification']['status'] = 'Out of stock';
                        $arr['Notification']['bell'] = 'on';
                        $arr['Notification']['markas'] = 'Unread';
                        $noti = $this->Notification->save($arr);
                    }
                    
                    $this->OrderDetail->saveall($orderarr);
                    $this->Session->write('cart_data','');
                    $this->Session->write('cart_data2','');
                    $this->Session->write('fcode','');
                     //pr($orderarr);exit;
                    $arr['Notification']['type'] = 'Order';
                    $arr['Notification']['status'] = 'Order Placed';
                    $arr['Notification']['order_no'] = $orderno;
                    $arr['Notification']['markas'] = 'Unread';
                    $arr['Notification']['bell'] = 'on';
                    $noti = $this->Notification->save($arr);
                    echo $orderno;exit;
                }else{
                    echo 1;exit;
                }
            }
        }
    }
    
    public function makepayment($order_no=''){
        //echo $order_no;exit;
        if(isset($order_no) and $order_no !=''){
            $orderdetails = $this->OrderDetail->find('all',array('conditions'=>array('order_no'=>$order_no,'is_paid !='=>'')));
            if(empty($orderdetails))
                $this->redirect('/');
            //pr($products);exit;
            $this->set('orderdetails',$orderdetails);
        }else{
            $this->redirect('/');
        }
        if(!empty($this->data)){
            if(isset($this->data['payment_option']) and $this->data['payment_option']=='paypal'){
                $this->Paypal->API_UserName = PAYPAL_USERNAME; //'prime2_1359382701_biz_api1.cisinlabs.com';
                $this->Paypal->API_Password = PAYPAL_PASSWORD; //'1359382722';
                $this->Paypal->API_Signature = PAYPAL_SIGNATURE; //'AxVHV5sG-WxUA.zltwMpL--8SZ7IA51Q8L2WnQ7PROFHNtVkLHB9wI1Y';
                $this->Paypal->Env = PAYPAL_ENV;
                $amount =0;
                foreach($orderdetails as $orderdetail){
                    $amount = $amount+($orderdetail['OrderDetail']['product_amount']*$orderdetail['OrderDetail']['quantity']);
                }
                $total_amount = $amount;
                //$total_amount = $paymenttype['PaymentType']['amount'];
                $currencyCode = 'MYR';
                $receiverAmountArray = array(
                    $total_amount
                );
                $trackingId = $this->Paypal->generateTrackingID(); // generateTrackingID function is found in paypalplatform.php
                $this->OrderDetail->updateAll(
                    array('OrderDetail.tracking_id' => "'".$trackingId."'"),
                    array('OrderDetail.order_no' => "$order_no")
                );

                $actionType = "PAY";
                $receiverPrimaryArray = array();
                $receiverEmailArray = array(BusinessEmail);

                $receiverInvoiceIdArray = array();
                $senderEmail = "";
                $feesPayer = "";
                $ipnNotificationUrl = "";
                $memo = "Subscription payment";
                $pin = "";  // TODO - If you are executing the Pay call against an existing preapproval
                //        the requires a pin, then you must set this
                $preapprovalKey = "";  // TODO - If you are executing the Pay call against an existing preapproval, set the preapprovalKey here
                $reverseAllParallelPaymentsOnError = "";
                $returnUrl = Router::url('/bookcars/paymentdone/' . $trackingId, true);
                $cancelUrl = Router::url('/bookcars/paymentcancel/' . $trackingId, true);
                $resArray = $this->Paypal->CallPay($actionType, $cancelUrl, $returnUrl, $currencyCode, $receiverEmailArray, $receiverAmountArray, $receiverPrimaryArray, $receiverInvoiceIdArray, $feesPayer, $ipnNotificationUrl, $memo, $pin, $preapprovalKey, $reverseAllParallelPaymentsOnError, $senderEmail, $trackingId);
                //pr($resArray);exit;
                $ack = strtoupper($resArray["responseEnvelope.ack"]);
                //pr($ack);exit;
                if ($ack == "SUCCESS") {
                    //$additionalBannerArray = array('paypal_tracking_id' => $trackingId, 'paypal_payment_date' => date('Y-m-d H:i:s'), 'paypal_currency_type' => $currencyCode, 'banner_user_id' => $uid, 'paypal_amount' => $total_amount, 'paypal_currency' => $currencyCode, 'paypal_payment_status' => 1);
                    if ("" == $preapprovalKey) {
                        // redirect for web approval flow
                        $cmd = "cmd=_ap-payment&paykey=" . urldecode($resArray["payKey"]);
                        $this->Paypal->RedirectToPayPal($cmd);
                    } else {
                        // payKey is the key that you can use to identify the payment resulting from the Pay call
                        $payKey = urldecode($resArray["payKey"]);
                        // paymentExecStatus is the status of the payment
                        $paymentExecStatus = urldecode($resArray["paymentExecStatus"]);
                    }
                }
            }else if(isset($this->data['payment_option']) and $this->data['payment_option']=='molpay'){
                
            }
        }
    }
    
    public function paymentdone($trackingId){
        //$trans_history = $this->BookCar->find('first',array('conditions'=>array('BookCar.paypal_tracking_id'=>'pBGHGXCeJ')));
        $this->Paypal->API_UserName = PAYPAL_USERNAME; //'prime2_1359382701_biz_api1.cisinlabs.com';
        $this->Paypal->API_Password = PAYPAL_PASSWORD; //'1359382722';
        $this->Paypal->API_Signature = PAYPAL_SIGNATURE; //'AxVHV5sG-WxUA.zltwMpL--8SZ7IA51Q8L2WnQ7PROFHNtVkLHB9wI1Y';
        $this->Paypal->Env = PAYPAL_ENV;
        $paydetailsresult = $this->Paypal->CallPaymentDetails($payKey = null, $transactionId = null, $trackingId);
        pr($paydetailsresult);
        
    }
    
    public function orderview($order_no = ''){
        $min_order_price = $this->Orderprices->find('first');
        $ShippingPrice = $this->ShippingPrice->find('first');
        $user_id = $this->Session->read('Auth.User.id');
        $orders = $this->OrderDetail->find('all',array('order'=>'OrderDetail.id desc','conditions'=>array('OrderDetail.user_id'=>$user_id,'OrderDetail.order_no'=>$order_no)));
        if(empty($orders)){
            $this->redirect('/');
        }
        $this->set('ShippingPrice',$ShippingPrice);
        $this->set('min_order_price',$min_order_price);
        $this->set('orders',$orders);
    }
    
    public function cancelorder($order_no=''){
        $user_id = $this->Session->read('Auth.User.id');
        if($order_no==''){
            $this->redirect('/users/order');
        }
        $orders = $this->OrderDetail->find('all',array('conditions'=>array('OrderDetail.order_no'=>$order_no,'OrderDetail.user_id'=>$user_id)));
        if(!empty($orders)){
            $i=0;
            foreach($orders as $order){
                $closearr[$i]['OrderDetail']['id'] = $order['OrderDetail']['id'];
                $closearr[$i]['OrderDetail']['is_paid'] = 2;
                $closearr[$i]['OrderDetail']['is_cancel'] = 1;
                
                $addproduct[$i]['Product']['id'] = $order['Product']['id'];
                $addproduct[$i]['Product']['quantity'] = $order['Product']['quantity']+$order['OrderDetail']['quantity'];
                $i++;
            }
            $arr['Notification']['type'] = 'Order';
            $arr['Notification']['status'] = 'Order cancelled';
            $arr['Notification']['order_no'] = $orders[0]['OrderDetail']['order_no'];
            $arr['Notification']['markas'] = 'Unread';
            $noti = $this->Notification->save($arr);
            
            $this->OrderDetail->saveall($closearr);
            $this->Product->saveall($addproduct);
            $this->redirect('/users/viewcloseorder');
        }
    }
    
    public function bundles(){
            
    }

    public function empty_cart(){

    }

    //Usage :
    //public function timeDiff("2002-04-16 10:00:00","2002-03-16 18:56:32");
}


?>