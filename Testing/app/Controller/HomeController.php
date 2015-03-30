<?php
App::uses('AppController', 'Controller');
App::uses('CakeEmail', 'Network/Email');

class HomeController extends AppController {

    public $name =  'Home';
    public $components = array('Paginator');
    public $uses = array('Product','TaxClass','StockStatus','LengthClass','WeightClass', 'Category','CustomerGroup','Customer','Address','Country','Zone','Notification');
    
    //Set layout and auth allowance beforefilter
    function beforeFilter() {
        parent::beforeFilter();
        $this->Auth->allow('index','aboutus','contactus','careers','services','fcode','payment_facility','privacy_policy','shipping_faq','specification','warranty');
    }
    
    //coming soon page
    public function index() {
        $product = $this->Product->findById(70);
        
        $this->set('product',$product);
        //pr($this->Auth); exit;
        //function body
    }
    
    //Aboutus page
    public function aboutus() {
        //pr($this->Auth); exit;
        //function body
    }
    
    public function contactus() {
        if($this->request->data){
            $this->request->data['Contact'] = Sanitize::clean($this->request->data, array("remove_html" => TRUE));            
	    $cakeEmail = new CakeEmail('default');
            if($this->request->data['Contact']['emailbool']=="2"){
                $email_to = Configure::read('Config.general');
                $cakeEmail->template('enquiry', 'default')->emailFormat('html')->to($email_to)->subject('HaRiMau - General Enquiry');                
            }else{
                $email_to = Configure::read('Config.business');
                $cakeEmail->template('enquiry', 'default')->emailFormat('html')->to($email_to)->subject('HaRiMau - Business Enquiry');                
            }
            $cakeEmail->viewVars(array('user' => $this->request->data));
            if($cakeEmail->send()) {
                $cnt_data = $this->Notification->find('count',array('conditions' => array('markas'=>'Unread','type'=>'Contact')));
                $arr['Notification']['type'] = 'Contact';
                $arr['Notification']['status'] = 'Approve';
                $arr['Notification']['count'] = $cnt_data + 1;
                $arr['Notification']['markas'] = 'Unread';
                $arr['Notification']['bell'] = 'On';
                $noti = $this->Notification->save($arr);
                $noti_data = $this->Notification->find('all',array('conditions' => array('markas'=>'Unread')));
                
                $numNoti = count($noti_data);
                $this->set('count',$numNoti);
                $this->Session->setFlash('<div class="alert alert-success"><i class="fa fa-check-circle"></i> An email with details is sent to system admin as earliest as will replied you. <button data-dismiss="alert" class="close" type="button">×</button> </div>');
                //$this->Session->setFlash(__('An email with details is sent to system admin as earliest as will replied you. '));					
            } else {
                $this->Session->setFlash('<div class="alert alert-danger"><i class="fa fa-exclamation-circle"></i> Problem on sending email to enquiry department. Please contact to administrator.<button data-dismiss="alert" class="close" type="button">×</button> </div>');
                //$this->Session->setFlash(__('Problem on sending email to enquiry department. Please contact to administrator'));
            }
        }
        else{
            $this->set('count',0);
        }
    }
    
    // public function news() {
    //     //pr($this->Auth); exit;
    //     //function body
    // }

    public function careers(){
        
    }

    public function services(){
        
    }

    public function fcode(){
        
    }

    public function payment_facility(){

    }

    public function privacy_policy(){

    }

    public function shipping_faq(){

    }
    public function specification(){

    }
    public function warranty(){
        
    }
}
?>
