<?php

// app/Controller/UsersController.php
class UsersController extends AppController {
    public $uses = array('Country','User','Customer','Emailmodel','Ticket');
    public function beforeFilter() {
        parent::beforeFilter();
        //$this->layout="default";        
        $this->Auth->allow('login','step2login','logout','captcha','signup','verifycode','setpassword','phone_verifylink','forgotpass','edit');
    }
    public function captcha()	{
        $this->autoRender = false;
        $this->layout='ajax';
        if(!isset($this->Captcha))	{ //if Component was not loaded throug $components array()
                $this->Captcha = $this->Components->load('Captcha', array(
                        'width' => 150,
                        'height' => 50,
                        'theme' => 'default', //possible values : default, random ; No value means 'default'
                )); //load it
                }
        $this->Captcha->create();
    }
    public function admin_login() {
        $this->layout="admin";
        $user_id = $this->Session->read('Auth.User.id');
        if(isset($user_id) and $user_id !=''){
            $this->redirect('/admin/users');
        }
        if($this->request->data){
            if ($this->Auth->login()) {
                if($this->Auth->user('role') == 'admin'){
                    $this->redirect($this->Auth->redirect());
                }else{
                    $this->redirect("/home/index");
                }                
            } else {             
                $this->Session->setFlash('<div class="alert alert-danger"><i class="fa fa-exclamation-circle"></i> Invalid username or password, try again<button data-dismiss="alert" class="close" type="button">×</button> </div>');
            }
        }else
        $this->title= "HariMau";
    }

    public function admin_logout() {
        $this->Auth->logout();
        $this->redirect("/admin");
    }
    
    public function logout() {
        $this->Auth->logout();
        $this->redirect("/home/");
    }
    
    function step2login(){
        $this->layout = 'login';
        //pr($this->Session->read());exit;
        $user_id = $this->Session->read('second_login.User.id');
        $code = $this->Session->read('second_login.User.second_login');
        if($code ==''){
           $this->redirect('/users/login');
        }
        if(!empty($this->data)){
            $this->request->data['User']['second_login'] = $this->Session->read('second_login.User.second_login');
            $this->User->set($this->request->data);
            if($this->User->validates($this->request->data)){
                $userdata = $this->User->findById($user_id);
                $this->Auth->login($userdata['User']);
                $this->redirect($this->Auth->redirect());
            }
        }
    }
    
    public function signup() {
        
        $this->layout = 'login';
        if(!isset($this->Captcha)){ //if Component was not loaded throug $components array()
                $this->Captcha = $this->Components->load('Captcha'); //load it
        }
        $this->User->setCaptcha($this->Captcha->getVerCode());
        if(isset($this->data['User']['login']) and $this->data['User']['login'] =='login'){
            //pr($this->data);exit;
            $userdata = $this->User->find('first',array('conditions'=>array('role != "admin" and password = "'.addslashes(trim($this->Auth->password($this->data['User']['password']))).'" and (harimau = "'.addslashes(trim($this->data['User']['username'])).'" or phone = "'.addslashes(trim($this->data['User']['username'])).'" or username = "'.addslashes(trim($this->data['User']['username'])).'")')));
            if(empty($userdata)){
                $this->Session->setFlash('<div class="alert alert-danger"><i class="fa fa-exclamation-circle"></i> Username or password does not match.<button data-dismiss="alert" class="close" type="button">×</button> </div>');
            }
            /*if(!empty($userdata)){
                $this->Auth->login($userdata['User']);
                $this->redirect($this->Auth->redirect());
            }else{
                
            }*/
            
            if(isset($userdata['User']['enable_token']) and $userdata['User']['enable_token'] =='1'){
               
                $verification = rand(4, 10000);
                $userdata['User']['second_login'] = $verification;
                $message = 'your Harimau account verification code is '.$verification;
                if(isset($userdata['User']['phone']) and $userdata['User']['phone'] !=''){
                    $smsd['body'] = $message;
                    $smsd['to'] = $userdata['User']['phone'];
                    //$data = $this->sendsms($smsd);
                }else{
                    $message = 'Your Harimau account verification code is '.$varification;
                    $Email = new CakeEmail('default');
                    $Email->template('welcome','fancy')
                        ->emailFormat('html')
                        ->from(array('harimau@test.com' => 'Harimau'))
                        //->to($this->Session->read('Auth.User.email'))
                        ->to($userdata['User']['username'])
                        ->subject('Verification');
                    $Email->send($message); 
                }
                //echo 'sdfsdfg';exit;
                $this->Session->write('second_login',$userdata); 
                $this->redirect('/users/step2login');
            }else{
                if(!empty($userdata)){
                    $this->Auth->login($userdata['User']);
                    $this->redirect($this->Auth->redirect());
                }else{

                }
            }
        }
        if(isset($this->data['User']['login']) and $this->data['User']['login'] =='signup'){
            
            $this->User->set($this->request->data);
            if($this->User->validates($this->request->data)){
                //pr($this->request->data);exit;
                $varification = rand(5, 1000000);
                $this->request->data['User']['varification'] = $varification;
                $this->Session->write('step_first',$this->request->data); 
                //$smstopassenger['body'] = $message2;
                $message = 'your Harimau account verification code is '.$varification;
                $smsd['body'] = $message;
                $smsd['to'] = $this->data['User']['phone'];
                $data = $this->sendsms($smsd);    
                $this->redirect('/users/verifycode');
            }
        }
        $country = $this->Country->find('list',array('fields'=>array('id','name_code'),'conditions'=>array('status'=>'1')));
        $this->set('country',$country);
    }
    
    public function login() {
        //echo rand(, 6);
        
        //$this->sendsms();exit;
        //pr($this->Session->read());
        $this->layout = 'login';
        if(!isset($this->Captcha)){ //if Component was not loaded throug $components array()
                $this->Captcha = $this->Components->load('Captcha'); //load it
        }
        $this->User->setCaptcha($this->Captcha->getVerCode());
        if(isset($this->data['User']['login']) and $this->data['User']['login'] =='login'){
            $userdata = $this->User->find('first',array('conditions'=>array('role != "admin" and password = "'.addslashes(trim($this->Auth->password($this->data['User']['password']))).'" and (harimau = "'.addslashes(trim($this->data['User']['username'])).'" or phone = "'.addslashes(trim($this->data['User']['username'])).'" or username = "'.addslashes(trim($this->data['User']['username'])).'")')));
            if(empty($userdata)){
                $this->Session->setFlash('<div class="alert alert-danger"><i class="fa fa-exclamation-circle"></i> Username or password does not match.<button data-dismiss="alert" class="close" type="button">×</button> </div>');
            }
            if(isset($userdata['User']['enable_token']) and $userdata['User']['enable_token'] =='1'){
               
                $verification = rand(4, 10000);
                $userdata['User']['second_login'] = $verification;
                $message = 'your Harimau account verification code is '.$verification;
                if(isset($userdata['User']['phone']) and $userdata['User']['phone'] !=''){
                    $smsd['body'] = $message;
                    $smsd['to'] = $userdata['User']['phone'];
                    $data = $this->sendsms($smsd);
                }else{
                    $message = 'Your Harimau account verification code is '.$varification;
                    $Email = new CakeEmail('default');
                    $Email->template('welcome','fancy')
                        ->emailFormat('html')
                        ->from(array('harimau@test.com' => 'Harimau'))
                        //->to($this->Session->read('Auth.User.email'))
                        ->to($userdata['User']['username'])
                        ->subject('Verification');
                    $Email->send($message); 
                }
                //echo 'sdfsdfg';exit;
                $this->Session->write('second_login',$userdata); 
                $this->redirect('/users/step2login');
            }else{
                if(!empty($userdata)){
                    $this->Auth->login($userdata['User']);
                    $this->redirect($this->Auth->redirect());
                }else{

                }
            }
        }
        if(isset($this->data['User']['login']) and $this->data['User']['login'] =='signup'){
            
            $this->User->set($this->request->data);
            if($this->User->validates($this->request->data)){
                $varification = rand(5, 1000000);
                $this->request->data['User']['varification'] = $varification;
                $this->Session->write('step_first',$this->request->data); 
                //$smstopassenger['body'] = $message2;
                $message = 'Your Harimau account verification code is '.$varification;
                $Email = new CakeEmail('default');
                $Email->template('welcome','fancy')
                    ->emailFormat('html')
                    ->from(array('harimau@test.com' => 'Harimau'))
                    //->to($this->Session->read('Auth.User.email'))
                    ->to($this->data['User']['username'])
                    ->subject('Verification');
                $Email->send($message);   
                $this->Session->setFlash('<div class="alert alert-success"><i class="fa fa-exclamation-circle"></i> Verification code send on your email address.<button data-dismiss="alert" class="close" type="button">×</button> </div>');
                $this->redirect('/users/verifycode');
            }
        }
        $country = $this->Country->find('list',array('fields'=>array('id','name'),'conditions'=>array('status'=>'1'),'limit'=>'2'));
        $this->set('country',$country);
    }
    
    public function verifycode(){
        $this->layout = 'login';
        $step_first = $this->Session->read('step_first');
        //pr($step_first);
        $this->User->set($this->request->data);
        if($this->User->validates($this->request->data)){
            if(!empty($this->data)){
                //echo $step_first['User']['varification'] .' == '. $this->data['User']['code'];exit;
                if(isset($this->data['User']['code']) && md5($step_first['User']['varification']) == md5($this->data['User']['code'])){
                    //echo $step_first['User']['varification'] .' == '. $this->data['User']['code'];exit;
                    $this->Session->write('flag','1');
                    $this->Session->setFlash('<div class="alert alert-success"><i class="fa fa-exclamation-circle"></i> Verification successfully.<button data-dismiss="alert" class="close" type="button">×</button> </div>');
                    $this->redirect('/users/setpassword');
                }
            }
        }
    }
    
    public function setpassword(){
        $flag = $this->Session->read('flag');
        if(isset($flag) and $flag =='1'){
            $this->layout = 'login';
            $this->User->set($this->request->data);
            if($this->User->validates($this->request->data)){
               if(!empty($this->data)){
                $step_first = $this->Session->read('step_first');
                //pr($step_first);exit;
                if(isset($step_first['User']['phone']) and $step_first['User']['phone'] !=''){
                    $dataarr['User']['phone'] = $step_first['User']['phone'];
                }else{
                    $dataarr['User']['username'] = $step_first['User']['username'];
                }
                
                //$dataarr['User']['country_id'] = $step_first['User']['country_id'];
                //$dataarr['User']['password'] = $this->Auth->password($this->request->data['User']['npassword']);
                $dataarr['User']['password'] = $this->request->data['User']['npassword'];
                $unique_id = time().rand(1,10);
                $dataarr['User']['harimau'] = $unique_id;
                $dataarr['User']['role'] = 'customer';
                if($this->User->save($dataarr)){
                    $user_id = $this->User->id;
                    $customer['Customer']['user_id'] = $user_id;
                    if(isset($step_first['User']['phone']) and $step_first['User']['phone'] !=''){
                        $customer['Customer']['telephone'] = $step_first['User']['phone'];
                    }else{
                        $customer['Customer']['email'] = $step_first['User']['username'];
                    }
                    $customer['Customer']['fullname'] = $unique_id;
                    $this->Customer->save($customer);
                }
                $this->Session->setFlash('<div class="alert alert-success"><i class="fa fa-exclamation-circle"></i> Account has been created successfully.<button data-dismiss="alert" class="close" type="button">×</button> </div>');
                $this->redirect('/users/login');
               }
            }
        }else{
            $this->redirect('/users/login');
        }
        
    }
    
    public function admin_index() {
        $this->layout="admin"; 
        $condition['OrderDetail.created like'] = "%".date('Y-m-d')."%";
        $this->Paginator->settings = array(
            //'conditions' => array('Recipe.title LIKE' => 'a%'),
            'limit' => PAGE_LIMIT,
            'order'=>'OrderDetail.id desc',
            'group'=>'OrderDetail.order_no',
            'fields'=>array('*,sum(OrderDetail.total_amount) as total_amount'),
            'conditions'=>array($condition)
            
        );
        $orders = $this->Paginator->paginate('OrderDetail');
        $customer = $this->User->find('count',array('conditions'=>array('role !='=>'admin')));
        $this->set('customer',$customer);
        $pading_order = $this->OrderDetail->find('count',array('conditions'=>array('OrderDetail.status'=>'Paid')));
        $this->set('pading_order',$pading_order);
        
        $tickets = $this->Ticket->find('count',array('conditions'=>array('Ticket.ticket_status_id'=>'3')));
        $this->set('tickets',$tickets);
        $this->set('orders',$orders);
    }
    
    public function forgotpass(){
        $this->layout="login";    
        if(!empty($this->data)){
            $this->User->set($this->request->data);
            if($this->User->validates($this->request->data)){
                $userdata = $this->User->find('first',array('conditions'=>array('role != "admin" and (harimau = "'.addslashes(trim($this->data['User']['resetpass'])).'" or phone = "'.addslashes(trim($this->data['User']['resetpass'])).'" or username = "'.addslashes(trim($this->data['User']['resetpass'])).'")')));
                if(isset($userdata['User']['phone']) and $userdata['User']['phone'] !=''){
                    $this->User->id = $userdata['User']['id'];
                    $password = time();
                    $this->User->saveField('password',$password);
                    $message = 'your new password is '.$password;
                    $smsd['body'] = $message;
                    $smsd['to'] = $userdata['User']['phone'];
                    $data = $this->sendsms($smsd);
                    $this->Session->setFlash('<div class="alert alert-success"><i class="fa fa-exclamation-circle"></i> New password send on your register mobile No. .<button data-dismiss="alert" class="close" type="button">×</button> </div>');
                   $this->redirect('/users/forgotpass/');
                }else if(isset($userdata['User']['username']) and $userdata['User']['username'] !=''){
                    
                    $this->User->id = $userdata['User']['id'];
                    $password = time();
                    $this->User->saveField('password',$password);
                    
                    $Email = new CakeEmail('default');
                    $Email->template('forgotpass','fancy')
                        ->emailFormat('html')
                        ->from(array('harimau@test.com' => 'Harimau'))
                        //->to($this->Session->read('Auth.User.email'))
                        ->to($userdata['User']['username'])
                        ->subject('New password');
                    $Email->viewVars(array('user' => $password));

                    $Email->send();
                    $this->Session->setFlash('<div class="alert alert-success"><i class="fa fa-exclamation-circle"></i> New password send on your register email address. .<button data-dismiss="alert" class="close" type="button">×</button> </div>');
                    $this->redirect('/users/forgotpass/');
                }
            }
        }
    }
    
    function phone_verifylink($value){
        $this->layout="login";
        if(isset($value) and $value !=''){
            $userdata = $this->getval($value);
            if(!empty($userdata)){
                if(isset($userdata['User']['phone']) and $userdata['User']['phone'] !=''){
                   //$this->redirect('/users/phone_verifylink/'.$this->request->data['User']['resetpass']);
                }else if(isset($userdata['User']['username']) and $userdata['User']['username'] !=''){
                    //$this->redirect('/users/phone_verifylink/'.$this->request->data['User']['resetpass']);
                }
            }
            $this->set('userdata',$userdata);
        }else{
            $this->redirect('/');
        }
    }
    
    
    
    function getval($value){
        return $this->User->find('first',array('conditions'=>array('role != "admin" and (harimau = "'.addslashes(trim($value)).'" or phone = "'.addslashes(trim($value)).'" or username = "'.addslashes(trim($value)).'")')));
    }

    
    /*function order(){
        $user_id = $this->Session->read('Auth.User.id');
        $orders = $this->OrderDetail->find('all',array('order'=>'OrderDetail.id desc','conditions'=>array('OrderDetail.user_id'=>$user_id,'OrderDetail.is_paid !='=>'2')));
        foreach($orders as $order){
            $ordera[$order['OrderDetail']['order_no']][] = $order;
            
        }
        $this->set('ordera',$ordera);
        //pr($ordera);
    }*/
    
    function order(){
        $user_id = $this->Session->read('Auth.User.id');
        $this->paginate = array(
                'group'=>'OrderDetail.order_no',
                'limit' => PAGE_LIMIT,
                'conditions' => array('OrderDetail.user_id'=>$user_id,'OrderDetail.is_paid !='=>'2','OrderDetail.is_return'=>'0'),
                'order'=>'OrderDetail.id DESC'
        );
        $orderdetails = $this->Paginator->paginate('OrderDetail');
        //pr($orderdetails);
        $this->set('orderdetails',$orderdetails);
    }
    
    function refund(){
        $user_id = $this->Session->read('Auth.User.id');
        $this->paginate = array(
                'group'=>'OrderDetail.order_no',
                'limit' => PAGE_LIMIT,
                'conditions' => array('OrderDetail.user_id'=>$user_id,'OrderDetail.is_return'=>'1'),
                'order'=>'OrderDetail.id DESC'
        );
        $orderdetails = $this->Paginator->paginate('OrderDetail');
        //pr($orderdetails);
        $this->set('orderdetails',$orderdetails);
    }
    
    function account(){
        $this->layout = 'account';
        //pr($this->data);
        //pr($this->request->data);exit;
        if(isset($this->request->data['email']) and $this->request->data['email'] =='Submit'){
            unset($this->request->data['User']);
        }else if(isset($this->request->data['password']) and $this->request->data['password'] =='Submit'){
            
        }else if(isset($this->request->data['email']) and $this->request->data['email'] =='Submit'){
            
        }else if(isset($this->request->data['email']) and $this->request->data['email'] =='Submit'){
            
        }
        if(isset($this->data['User']['password_field']) and $this->data['User']['password_field'] =='pass'){
            $this->request->data['User']['id'] = $this->Session->read('Auth.User.id');
            $this->request->data['User']['oldpassword'] = $this->Auth->password($this->data['User']['oldpassword']);
            $this->User->set($this->request->data);
            if($this->User->validates($this->request->data)){ 
                $this->User->saveField('password',$this->request->data['User']['newpassword']);
                $this->Session->setFlash('<div class="alert alert-success"><i class="fa fa-exclamation-circle"></i> Password has been changed successfully<button data-dismiss="alert" class="close" type="button">×</button> </div>');
                $this->redirect('/users/account');
            }
        }
        if(isset($this->data['Emailmodel']['email_code']) and $this->data['Emailmodel']['email_code'] =='email'){
            //pr($this->request->data);exit;
            //pr($this->Session->read('code'));
            $this->request->data['Emailmodel']['code'] = $this->Session->read('code');
            $this->Emailmodel->set($this->request->data);
            if($this->Emailmodel->validates($this->request->data)){ 
                
            }
        }
    }
    
    function personal(){
        $this->layout = 'account';
        $user_id = $this->Session->read('Auth.User.id');
        $custdata= $this->Customer->find('first',array('conditions'=>array('user_id'=>$user_id)));
        $this->set('custdata',$custdata);
        //pr($custdata);
        if(!empty($this->data)){
            //pr($this->request->data);
            
            $fileattr = $this->request->data['Customer']['profile_pic'];
            $destination = WWW_ROOT . 'profile_pic/';
            $image_name = time().'_'.$this->request->data['Customer']['profile_pic']['name'];
            if(isset($this->request->data['Customer']['profile_pic']['name']) and $this->request->data['Customer']['profile_pic']['name'] !='')
                $this->uploadfile($fileattr,$destination,$image_name,$is_orib='1');
            
            unset($this->request->data['Customer']['profile_pic']);
            $this->Customer->set($this->request->data);
            if($this->Customer->validates($this->request->data)){                
                if(!empty($custdata)){
                    $this->request->data['Customer'] = Sanitize::clean($this->request->data['Customer'], array("remove_html" => TRUE));
                    $this->Customer->id =$custdata['Customer']['id']; 
                    $this->request->data['Customer']['user_id'] =$user_id; 
                    if(isset($fileattr['name']) and $fileattr['name'] !='')
                        $this->request->data['Customer']['profile_pic'] = $image_name; 
                    
                    //pr($this->request->data);exit;
                    $this->Customer->save($this->request->data);
                }else{
                    $this->request->data['Customer'] = Sanitize::clean($this->request->data['Customer'], array("remove_html" => TRUE));
                    $this->request->data['Customer']['user_id'] =$user_id;
                    if(isset($fileattr['name']) and $fileattr['name'] !='')
                        $this->request->data['Customer']['profile_pic'] = $image_name; 
                    
                    //unset($this->request->data['Customer']['profile_pic']);
                    //pr($this->request->data);exit;
                    $this->Customer->save($this->request->data);
                }
                $this->redirect('/users/personal');
            }
        }
    }
    
    function services(){
        $this->layout = 'account';
    }
    
    public function add2steplogin(){
        //pr($this->data);
        $code = $this->Session->read('code');
        if(md5($this->data['code']) == md5($code)){
            $user_id = $this->Session->read('Auth.User.id');
            $userdata = $this->User->findById($user_id);
            //echo '<pre>';print_r($userdata);
            $this->User->id = $user_id;
            if(isset($userdata['User']['enable_token']) and $userdata['User']['enable_token'] =='1'){
                $this->User->saveField('enable_token','0');
                $this->Session->setFlash('<div class="alert alert-success"><i class="fa fa-exclamation-circle"></i> 2 Step login deactivated has been successfully<button data-dismiss="alert" class="close" type="button">×</button> </div>');
            }else{
                //echo '212';exit;
                $this->User->saveField('enable_token','1');
                $this->Session->setFlash('<div class="alert alert-success"><i class="fa fa-exclamation-circle"></i> 2 Step login activate has been successfully<button data-dismiss="alert" class="close" type="button">×</button> </div>');
            }
            
            echo '2';
        }else if($this->data['code'] == ''){
            echo '0';
        }else{
            echo '1';
        }
        exit;
    }
    
    public function sendverifycode(){
         $this->layout = false;
        $user_id = $this->Session->read('Auth.User.id');
        $userdata = $this->User->findById($user_id);
        if(isset($userdata['User']['phone']) and $userdata['User']['phone']){
            //pr($userdata);
            $code = rand(5,1000000);
            $this->Session->write('code',$code);
            $message = 'your Harimau account verification code is '.$code;
            $smsd['body'] = $message;
            $smsd['to'] = $userdata['User']['phone'];
            $data = $this->sendsms($smsd); 
        }else{
                echo  $code = rand(5,1000000);
                $this->Session->write('code',$code);
                $message = 'Your Harimau account verification code is '.$code;
                $Email = new CakeEmail('default');
                $Email->template('welcome','fancy')
                    ->emailFormat('html')
                    ->from(array('harimau@test.com' => 'Harimau'))
                    //->to($this->Session->read('Auth.User.email'))
                    ->to($userdata['User']['username'])
                    ->subject('Verification');
                $Email->send($message); 
        }
        
        $this->render('addactivepage');
        //exit;
    }
    
    public function sendmessage(){
         $this->layout = false;
        $user_id = $this->Session->read('Auth.User.id');
        $userdata = $this->User->findById($user_id);
        if(isset($userdata['User']['phone']) and $userdata['User']['phone']){
            //pr($userdata);
           echo  $code = rand(5,1000000);
            $this->Session->write('code',$code);
            $message = 'your Harimau account verification code is '.$code;
            $smsd['body'] = $message;
            $smsd['to'] = $userdata['User']['phone'];
            $data = $this->sendsms($smsd); 
        }else{
                echo  $code = rand(5,1000000);
                $this->Session->write('code',$code);
                $message = 'Your Harimau account verification code is '.$code;
                $Email = new CakeEmail('default');
                $Email->template('welcome','fancy')
                    ->emailFormat('html')
                    ->from(array('harimau@test.com' => 'Harimau'))
                    //->to($this->Session->read('Auth.User.email'))
                    ->to($userdata['User']['username'])
                    ->subject('Verification');
                $Email->send($message); 
        }
        
        exit;
    }
    
    public function emailverification(){
        //pr($this->data);
        $this->layout = false;
        $code = $this->Session->read('code');
        //pr($code);
        if(isset($this->data['code']) and $this->data['code'] !=''){
            if(md5($this->data['code']) == md5($code)){
                $this->render('addnewemail');
            }else{
                echo '1';exit;
            }
        }else{
            echo '0';exit;
        }
    }
    
    public function phoneverification(){
        //pr($this->data);
        $this->layout = false;
        $code = $this->Session->read('code');
        if(isset($this->data['code']) and $this->data['code'] !=''){
            if(md5($this->data['code']) == md5($code)){
                $this->render('addnewphone');
            }else{
                echo '1';exit;
            }
        }else{
            echo '0';exit;
        }
    }
    
    public function change_email(){
        $this->layout = false;
        $user_id = $this->Session->read('Auth.User.id');
        //$this->render('addnewemail');
        $error = array();
        $flag = '0';
        $email = $this->data['Emailmodel']['email_val']; // Invalid email address 
        $regex = "/[a-zA-Z0-9_.+-]+@[a-zA-Z0-9-]+\.[a-zA-Z0-9-.]+$/"; 
        if(preg_match( $regex, $email)){ 
            $useremaildata = $this->User->findByUsername($email);
            $useriddata = $this->User->findById($user_id);
            if(!empty($useremaildata)){
                if($useremaildata['User']['username'] == $useriddata['User']['username']){
                    $this->Session->setFlash('<div class="alert alert-success"><i class="fa fa-exclamation-circle"></i> Email has been changed successfully<button data-dismiss="alert" class="close" type="button">×</button> </div>');
                    //echo '1';exit;
                    $flag = '1';
                }else{
                    $error['email'] = "<div class='errorcls'>This email has been taken by other.</div>";
                }
            }else{
                $this->User->id = $user_id;
                $this->User->saveField('username',$email);
                $this->Session->setFlash('<div class="alert alert-success"><i class="fa fa-exclamation-circle"></i> Email has been changed successfully<button data-dismiss="alert" class="close" type="button">×</button> </div>');
                $flag = '1';
            }
        }else{ 
            $error['email'] = "<div class='errorcls'>This is an invalid email. Please try again.</div>";    
        }
        if(isset($this->data['User']['captcha']) and $this->data['User']['captcha'] !=''){
            if(md5($this->data['User']['captcha']) ==md5($this->Session->read('security_code'))){
               // $flag = '1';
            }else{
                $error['captcha'] = "<div class='errorcls'>Please enter valid captcha.</div>";
            }
        }else{
            $error['captcha'] = "<div class='errorcls'>Please enter captcha.</div>";
        }
        if(!empty($error)){
            echo json_encode($error);exit;
        }
        echo $flag;
        //pr($this->Session->read());
        //pr($this->data);
        exit;
    }
    
    public function change_phone(){
        $this->layout = false;
        $user_id = $this->Session->read('Auth.User.id');
        //$this->render('addnewemail');
        $error = array();
        $flag = '0';
        $phone = $this->data['Emailmodel']['phone_val']; // Invalid email address 
        $regex = "/(\+){1}[0-9]{1,3}[0-9]{7,12}+$/"; 
        if(preg_match( $regex, $phone)){ 
            $useremaildata = $this->User->findByPhone($phone);
            $useriddata = $this->User->findById($user_id);
            if(!empty($useremaildata)){
                if($useremaildata['User']['phone'] == $useriddata['User']['phone']){
                    $this->Session->setFlash('<div class="alert alert-success"><i class="fa fa-exclamation-circle"></i> Phone has been changed successfully<button data-dismiss="alert" class="close" type="button">×</button> </div>');
                    //echo '1';exit;
                    $flag = '1';
                }else{
                    $error['phone'] = "<div class='errorcls'>This phone has been taken by other.</div>";
                }
            }else{
                $this->User->id = $user_id;
                $this->User->saveField('phone',$phone);
                $this->Session->setFlash('<div class="alert alert-success"><i class="fa fa-exclamation-circle"></i> Phone has been changed successfully<button data-dismiss="alert" class="close" type="button">×</button> </div>');
                $flag = '1';
            }
        }else{ 
            $error['phone'] = "<div class='errorcls'>This is an invalid phone. Please try again.</div>";    
        }
        if(isset($this->data['User']['captcha']) and $this->data['User']['captcha'] !=''){
            if(md5($this->data['User']['captcha']) ==md5($this->Session->read('security_code'))){
               // $flag = '1';
            }else{
                $error['captcha'] = "<div class='errorcls'>Please enter valid captcha.</div>";
            }
        }else{
            $error['captcha'] = "<div class='errorcls'>Please enter captcha.</div>";
        }
        if(!empty($error)){
            echo json_encode($error);exit;
        }
        echo $flag;
        //pr($this->Session->read());
        //pr($this->data);
        exit;
    }
    
     public function questionverification(){
        //pr($this->data);
        $this->layout = false;
        $code = $this->Session->read('code');
        if(isset($this->data['code']) and $this->data['code'] !=''){
            if(md5($this->data['code']) == md5($code)){
                $this->render('addnewquestion');
            }else{
                echo '1';exit;
            }
        }else{
            echo '0';exit;
        }
    }
    
    public function change_question(){
        $this->layout = false;
        $user_id = $this->Session->read('Auth.User.id');
        $flag = '0';
        if($this->data['Emailmodel']['question'] == ''){
            $error['question'] = "<div class='errorcls'>Please select question.</div>";
            $flag ='1';
        }else{
            $error['question'] ='';
        }
        if($this->data['Emailmodel']['answer'] ==''){
            $error['answer'] = "<div class='errorcls'>Pleae enter answer.</div>";
            $flag = '1';
        }else{
            $error['answer'] ='';
        }
        if($flag == '1'){
            echo json_encode($error);exit;
        }else{
            $this->request->data['User']['id'] = $this->Session->read('Auth.User.id');
            $this->request->data['User']['question'] = $this->data['Emailmodel']['question'];
            $this->request->data['User']['answer'] = $this->data['Emailmodel']['answer'];
            $this->User->save($this->request->data);
            $this->Session->setFlash('<div class="alert alert-success"><i class="fa fa-exclamation-circle"></i> Security question has been changed successfully<button data-dismiss="alert" class="close" type="button">×</button> </div>');
            echo '1';exit;
        }
        
        exit;
    }
    
    public function address_manager(){
        //$this->layout = 'account';
        $user_id = $this->Session->read('Auth.User.id');
        $this->Address->set($this->request->data);
        if($this->Address->validates($this->request->data)){
            if($this->request->is('post')){
                $this->request->data['Address']['user_id'] = $user_id;
                $this->request->data['Address'] = Sanitize::clean($this->request->data['Address'], array("remove_html" => TRUE));
                if($this->Address->save($this->request->data)){
                    $this->Session->setFlash('<div class="alert alert-success"><i class="fa fa-exclamation-circle"></i> Address has been added successfully<button data-dismiss="alert" class="close" type="button">×</button> </div>');
                    $this->redirect('/users/address_manager');
                }
            }
        }
        
        $addresses = $this->Address->find('all',array('conditions'=>array('Address.user_id'=>$user_id)));
        //pr($addresses);
        $this->set('addresses',$addresses);
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
    
    
    
   /* public function viewcloseorder($order_no=''){
        $user_id = $this->Session->read('Auth.User.id');
        $ordera = array();
        $orders = $this->OrderDetail->find('all',array('order'=>'OrderDetail.id desc','conditions'=>array('OrderDetail.user_id'=>$user_id,'OrderDetail.is_paid !='=>'0')));
        if(!empty($orders)){
            foreach($orders as $order){
                $ordera[$order['OrderDetail']['order_no']][] = $order;

            }
        }
        $this->set('ordera',$ordera); 
    }*/
     public function viewcloseorder($order_no=''){
        $user_id = $this->Session->read('Auth.User.id');
        $this->paginate = array(
                'group'=>'OrderDetail.order_no',
                'limit' => PAGE_LIMIT,
                'conditions' => array('OrderDetail.user_id'=>$user_id,'OrderDetail.is_paid'=>'2'),
                'order'=>'OrderDetail.order_no'
        );
        $orderdetails = $this->Paginator->paginate('OrderDetail');
        $this->set('orderdetails',$orderdetails);
    }
    
    function getorders($order = ''){
        return $this->OrderDetail->find('all',array('conditions'=>array('order_no'=>$order)));
    }
    
    public function autocloseorder(){
        $orders = $this->OrderDetail->find('all',array('conditions'=>array('OrderDetail.is_paid !='=>'1')));
        //pr($orders);
    }

    public function promotional_codes(){

    }

}