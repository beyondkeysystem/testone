<?php
App::uses('AppController', 'Controller');

class ShippingsController extends AppController {
    public $name = 'Shippings';
   function beforeFilter() {
        parent::beforeFilter();
    }
    
    public function admin_index(){
        $ShippingPrice = $this->ShippingPrice->find('all');
       // pr($ShippingPrice);
        $this->set('ShippingPrice',$ShippingPrice);
    }
    
    public function admin_edit($id){
        if(!empty($this->data)){
            if($this->ShippingPrice->save($this->data)){
                $this->redirect('/admin/shippings');
            }
        }else{
            $this->request->data = $this->ShippingPrice->find('first');
        }
    }
}


?>