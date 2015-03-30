<?php
App::uses('AppController', 'Controller');

class OrderpricesController extends AppController {
    public $name = 'Orderprices';
   function beforeFilter() {
        parent::beforeFilter();
    }
    
    public function admin_index(){
        $Orderprices = $this->Orderprices->find('all');
       // pr($ShippingPrice);
        $this->set('Orderprices',$Orderprices);
    }
    
    public function admin_edit($id){
        if(!empty($this->data)){
            if($this->Orderprices->save($this->data)){
                $this->redirect('/admin/orderprices');
            }
        }else{
            $this->request->data = $this->Orderprices->find('first');
        }
    }
}


?>