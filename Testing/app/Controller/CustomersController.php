<?php

/**
* Dynamic content controller.
*
* This file will render views from views/customers/
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
App::uses('Sanitize', 'Utility');
/**
* Daynamic content controller
*
* Override this controller by placing a copy in controllers directory of an application
*
* @package app.Controller
* @link http://book.cakephp.org/2.0/en/controllers/pages-controller.html
*/
class CustomersController extends AppController {

    public $name =  'Customers';
    public $components = array('Paginator');

    /**
     * This controller does not use a model
     *
     * @var array
     */

    public $uses = array('User','Product','TaxClass','StockStatus','LengthClass','WeightClass', 'Category','CustomerGroup','Customer','Address','Country','Zone');

    function beforeFilter() {
        parent::beforeFilter();
         
        $this->Paginator->settings = array(
            //'conditions' => array('Recipe.title LIKE' => 'a%'),
            'limit' => 12
        );
    }
    
    //coming soon page
    public function index() {
    
    }
/**
* Displays a view
*
* @return void
* @throws NotFoundException When the view file could not be found
*	or MissingViewException in debug mode.
*/
    public function admin_index($value = null) {
        if(!empty($this->data)){
            if(!empty($this->data['selected'])){
               foreach($this->data['selected'] as $id){
                   $this->Customer->delete($id);
                   //$this->Address->delete(array('customer_id' => $id));
               }
            }
            $this->redirect('/admin/customers');
        }
        
        $Country = $this->Country->find('list');
        $this->set('Country',$Country);
        
        $CustomerGroup = $this->CustomerGroup->find('list');
        $this->set('CustomerGroup',$CustomerGroup);
        //pr($this->request->data);pr($_POST); exit();
        if($this->request->is('post') && isset($this->request->data['filter'])){
               /* pr($this->request->data);
                
                exit("Success");*/
                $str = '';
                
                if(!empty($this->data)){
                    foreach($this->data['Customer'] as $k=>$v){
                        if(isset($v) and $v !=''){
                            if($k == 'status' or $k == 'email' or $k == 'telephone' or $k == 'firstname' or $k == 'lastname' or $k == 'customer_group_id' or $k == 'approved' or $k == 'status'){
                                $str .= ' Customer.'.$k.' = "'.addslashes(trim($v)).'" and ';
                            }else{
                                $str .= ' Customer.'.$k.' LIKE "%'.addslashes(trim($v)).'%" and ';
                            }
                        }
                    }
                }
                $condition = substr($str,0,-4);
                
                $this->Paginator->settings = array(
                    'conditions' => array($condition),
            );
        }
        
        $results = $this->Paginator->paginate('Customer');
        $this->set('results',$results);
    }

    public function admin_add(){
            if($this->request->is('post')){
                
                $this->request->data['Customer']['ip'] = $_SERVER['REMOTE_ADDR'];
                $this->request->data['Address'] = Sanitize::clean($this->request->data['Address'], array("remove_html" => TRUE));
                $this->request->data['Customer'] = Sanitize::clean($this->request->data['Customer'], array("remove_html" => TRUE));
                
                $this->request->data['User']['password'] = $this->request->data['Customer']['password'];
                $this->request->data['User']['username'] = $this->request->data['Customer']['email'];
                $this->request->data['User']['role'] = 'customer';
                $this->request->data['User']['enable_token'] = 0;
                $harimau = time();
                $this->request->data['User']['harimau'] = $harimau;
                unset($this->User->validate);
                
                $this->Customer->create();
                if(isset($this->request->data['Customer']['password']) and $this->request->data['Customer']['password'] !='')
                    $this->request->data['Customer']['password'] = $this->Auth->password($this->request->data['Customer']['password']);
                if(isset($this->request->data['Customer']['cpassword']) and $this->request->data['Customer']['cpassword'] !='')
                    $this->request->data['Customer']['cpassword'] = $this->Auth->password($this->request->data['Customer']['cpassword']);
                
                
                if($this->Customer->validates($this->request->data['Customer'])){
                    $this->User->create();
                    $this->User->save($this->request->data['User']);
                    $lastUserId = $this->User->id;
                    $this->request->data['Customer']['user_id'] = $lastUserId;
                }                
                
                unset($this->Customer->validate);          
if($this->request->data['Customer']['firstname'] != '') 
                $this->request->data['Customer']['fullname'] = $this->request->data['Customer']['firstname']." ".$this->request->data['Customer']['lastname'];
else
	$this->request->data['Customer']['fullname'] = $harimau;
                if($this->Customer->save($this->request->data['Customer'])){
                    $lastCustId = $this->Customer->getLastInsertId();
                    $customer_data = $this->Customer->findById($lastCustId);
                    /*Address section start*/
                    if(!empty($this->data['Address'])){
                        $address = $this->data['Address'];
                        $j=0;
                        $set = $address;
                        unset($set['country_id']);
                        $addressCnt = $set;
                        $additional['Address'] = $this->data['Address'];
                        for($i=1;$i<=count($addressCnt);$i++){
                            $additional['Address'][$i]['country_id'] = 0;
                            $additional['Address'][$i]['customer_id'] = $lastCustId;
                            $additional['Address'][$i]['user_id'] = $customer_data['User']['id'];
                            $additional['Address'][$i]['zone_id'] = 0;
                            $additional['Address'][$i]['is_default'] = ($this->data['Address'][$i]['default'])?$this->data['Address'][$i]['default']:0;
                            $j++;
                        }                        
                        $iZero = array_values($additional['Address']);
                        
                        $this->Address->create();
                        $this->Address->saveAll($iZero);
                    } //end if
                    /*Address section end*/
                   //pr($this->request->data); exit;
                    $this->Session->setFlash('<div class="alert alert-success"><i class="fa fa-exclamation-circle"></i> Customer Details Added Successfully...<button data-dismiss="alert" class="close" type="button">�</button> </div>');
                    return $this->redirect(array('action'=>'index'));
                }
                
                $this->Session->setFlash('<div class="alert alert-danger"><i class="fa fa-exclamation-circle"></i> Customer Details not Saved. Please try again...<button data-dismiss="alert" class="close" type="button">�</button> </div>');
            }
            $Country = $this->Country->find('list');
            $this->set('Country',$Country);
            $CustomerGroup = $this->CustomerGroup->find('list');
            //pr($CustomerGroup);exit;
            $this->set('CustomerGroup',$CustomerGroup);
            //$customer_dd = $this->Customer->find('list',array('conditions'=>array('is_parent' => '1'),'fields'=>array('customer_id','name')));
            //$this->set('customer_dd',$customer_dd);
    }

    
    public function admin_edit($id = null){
        if(!$id){
            throw new NotFoundException(__('Invalid Customer Details'));
        }
        $Country = $this->Country->find('list');
        //pr($Country); exit;
        $this->set('Country',$Country);
        $CustomerGroup = $this->CustomerGroup->find('list');
        $this->set('CustomerGroup',$CustomerGroup);
        
        $customer = $this->Customer->findById($id);
        //pr($customer['User']['id']);exit;
        $this->set('customer',$customer); 
        if(!$this->request->data){
            $customer_data = $this->Customer->findById($id);
            $this->request->data = $customer;
        }
        
        //pr($this->data); exit;
        if(!$customer){
            throw new NotFoundException(__('Invalid Customer Details'));
        }
        if($this->request->is(array('post','put'))){
                $this->Customer->id = $id;                
                unset($this->Customer->validate); 
                if($this->Customer->save($this->request->data)){
                    
                    /*Address section start*/
                    if(!empty($this->data['Address'])){
                        $this->Address->delete(array('customer_id' => $id));
                        $address = $this->data['Address'];
                        $j=0;
                        $set = $address;
                        unset($set['country_id']);
                        $addressCnt = $set;
                        $additional['Address'] = $this->data['Address'];
                        for($i=0;$i<count($addressCnt);$i++){
                           // $additional['Address'][$i]['country_id'] = $address['country_id'][$j];
                            $additional['Address'][$i]['customer_id'] = $id;
                            $additional['Address'][$i]['user_id'] = $customer['User']['id'];
                            $additional['Address'][$i]['zone_id'] = 0;
                            $additional['Address'][$i]['is_default'] = (!empty($this->data['Address'][$i]['default']))?$this->data['Address'][$i]['default']:0;
                            $this->Address->save($additional['Address'][$i]);
                            $j++;
                        }                        
                       // unset($additional['Address']['country_id']);                        
                        $iZero = array_values($additional['Address']);
                        //$iZero['Customer']['user_id'] = $customer['User']['id'];
                       // $this->Address->create();
                       // $this->Address->saveAll($iZero);
                    } //end if
                    /*Address section end*/
                    /*pr($additional);
                    pr($this->data);exit;*/
                    $this->Session->setFlash('<div class="alert alert-success"><i class="fa fa-exclamation-circle"></i> Customer Details has been Updated <button data-dismiss="alert" class="close" type="button">�</button> </div>');
                    return $this->redirect(array('action'=>'admin_index'));		
                }
                $this->Session->setFlash('<div class="alert alert-danger"><i class="fa fa-exclamation-circle"></i> Unable to Updated Customer Details <button data-dismiss="alert" class="close" type="button">�</button> </div>');
        }
    }

    public function admin_delete(){
        $this->autoRender = false;
        if($this->request->is('post')){
                if(isset($this->request->data['selected'])){
                        $selected = $this->request->data['selected'];
                        $result = false;
                        foreach ($selected as $key => $id) {
                                if($this->Customer->delete($id)){
                                        $result = true;
                                }
                        }
                        if($result){
                                $this->Session->setFlash('<div class="alert alert-success"><i class="fa fa-exclamation-circle"></i> The Customer Details has been deleted Successfully <button data-dismiss="alert" class="close" type="button">�</button> </div>');
                                
                                return $this->redirect(array('action'=>'index'));
                        }else
                        {
                                $this->Session->setFlash('<div class="alert alert-danger"><i class="fa fa-exclamation-circle"></i> The Customer is not deleted <button data-dismiss="alert" class="close" type="button">�</button> </div>');
                                
                                return $this->redirect(array('action'=>'index','admin' => true));
                        }
                }else{
                        
                        $this->Session->setFlash('<div class="alert alert-danger"><i class="fa fa-exclamation-circle"></i> The Customer is not deleted <button data-dismiss="alert" class="close" type="button">�</button> </div>');

                        return $this->redirect(array('action'=>'admin_index'));		
                }
        }	
    }

    public function admin_country($country_id){
        $zones = $this->Zone->find('list',array('conditions'=>array('country_id'=>$country_id, 'status'=>'1')));
        echo html_entity_decode(json_encode($zones));
        exit;
    }
    
    public function ajaxvalidation(){
        //pr($this->data);
        if(!empty($this->data)){
            $this->request->data['User']['username'] = $this->data['Customer']['email'];
            
            $this->request->data['User']['phone'] = $this->data['Customer']['telephone'];
            $this->request->data['User']['cspassword'] = $this->data['Customer']['password'];
            $this->request->data['User']['csrepassword'] = $this->data['Customer']['cpassword'];
            $this->User->set($this->request->data);
            if($this->User->validates()){
                echo '1';exit;
            }else{
               $errors = $this->User->validationErrors;
               $arr = array();
               //foreach($errors as $key=>$error){
                  if(!empty($errors['username'])){
                      $arr['username'] = $errors['username'][0];
                  }else{
                      $arr['username'] = '1';
                  }
                  if(!empty($errors['phone'])){
                      $arr['phone'] = $errors['phone'][0];
                  }else{
                      $arr['phone'] = '1';
                  }
                  if(!empty($errors['cspassword'])){
                      $arr['cspassword'] = $errors['cspassword'][0];
                  }else{
                      $arr['cspassword'] = '1';
                  }
                  if(!empty($errors['csrepassword'])){
                      $arr['csrepassword'] = $errors['csrepassword'][0];
                  }else{
                      $arr['csrepassword'] = '1';
                  }
                  //$arr[$key] = $error[0];
               //}
               echo json_encode($arr);
            }
        }
        exit;
    }
}
?>
