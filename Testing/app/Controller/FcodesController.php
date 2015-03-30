<?php

/**
 * Static content controller.
 *
 * This file will render views from views/pages/
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
App::uses('Folder', 'Utility');

/**
 * Static content controller
 *
 * Override this controller by placing a copy in controllers directory of an application
 *
 * @package       app.Controller
 * @link http://book.cakephp.org/2.0/en/controllers/pages-controller.html
 */
class FcodesController extends AppController {

    /**
     * This controller does not use a model
     *
     * @var array
     */
    public $uses = array('Fcode', 'FcodeProduct', 'FcodeHistory', 'Product',
        'TaxClass',
        'StockStatus',
        'LengthClass',
        'WeightClass',
        'Category',
        'CustomerGroup',
        'ProductCategory',
        'ProductRelate',
        'ProductAttribute',
        'ProductDiscount',
        'ProductSpecial',
        'ProductImage'
    );

    /**
     * Displays a view
     *
     * @return void
     * @throws NotFoundException When the view file could not be found
     * 	or MissingViewException in debug mode.
     */
    function beforeFilter() {
        parent::beforeFilter();

        $this->Paginator->settings = array(
            //'conditions' => array('Recipe.title LIKE' => 'a%'),
            'limit' => PAGE_LIMIT
        );
    }

    public function admin_index() {
        $this->Paginator->settings = array(
            'order' => array('Fcode.id DESC'),
        );
     
        $fcodes = $this->Paginator->paginate('Fcode');
        $this->set('results', $fcodes);
    }

    public function admin_add() {
        $customerdata = $this->User->find("all");
        $this->set('customer_data', $customerdata);
	//pr($customerdata); exit;
        if ($this->request->is('post')) {
            //pr($this->request->data['Fcode']);

            $unique = time();
            $this->request->data['Fcode'] = Sanitize::clean($this->request->data['Fcode'], array("remove_html" => TRUE));
            $productIds = $this->request->data['Fcode']['fcode_product'];
            $productnames = $this->request->data['Fcode']['fcode_product_names'];
            if ($this->Fcode->save($this->request->data['Fcode'])) {
                $arr['FcodeProduct']['fcode_id'] = $fcode_id = $this->Fcode->id;
                $arr['FcodeProduct']['quantity'] = 1;
                for ($i = 0; $i < count($productIds); $i++) {
                    //$this->Product->id = $productIds[$i];
                    $product_q = $this->Product->findById($productIds[$i]);
                    //pr($product_q);exit;
                    $this->Product->id = $productIds[$i];
                    $this->Product->saveField('quantity',$product_q['Product']['quantity']-1);
                    $arr['FcodeProduct']['product_id'] = $productIds[$i];
                    $arr['FcodeProduct']['product_name'] = $productnames[$i];
                    $this->FcodeProduct->create();
                    $this->FcodeProduct->save($arr);
                }
                $this->Session->setFlash('<div class="alert alert-success"><i class="fa fa-check-circle"></i> Fcode Details Added Successfully...<button data-dismiss="alert" class="close" type="button">×</button> </div>');
            } else {
                $this->Session->setFlash('<div class="alert alert-fail"><i class="fa fa-check-circle"></i> Fcode Details Not Added Successfully...<button data-dismiss="alert" class="close" type="button">×</button> </div>');
            }
            return $this->redirect(array('action' => 'index'));
        }
    }

    public function admin_delete() {
	if ($this->request->is('post')) {
            foreach ($this->request->data('selected') as $fcode_id) {
                $arr['Fcode']['id'] = $fcode_id;
		$arr['Fcode']['status'] = 5;
		$this->Fcode->set($arr);
		if($this->Fcode->save($arr)){
			echo true;
		}
		else{
			exit("Failed");
		}
            }
            return $this->redirect(array('action' => 'index'));
        }
    }
    
    public function admin_enable() {
	if ($this->request->is('post')) {
            //pr($this->request->data);die;
            foreach ($this->request->data('selected') as $fcode_id) {
                $arr['Fcode']['id'] = $fcode_id;
		$arr['Fcode']['status'] = 4;
		$this->Fcode->set($arr);
		$this->Fcode->save($arr);
            }
            return $this->redirect(array('action' => 'index'));
        }
    }
    public function admin_getproduct($v) {
        //pr($v); exit;
        $condition = ' Product.name LIKE "%' . addslashes(trim($v)) . '%" and Product.stock_status_id != "3" and Product.status = "1" and Product.quantity > 0';
        $this->Product->recursive = 0;
        $product = $this->Product->find('all', array('conditions' => array($condition), 'fields' => array('Product.name,Product.id,Product.price')));
        echo json_encode($product);
        exit;
    }
    
    public function admin_getcustomer($v) {
        //pr($v); exit;
        $condition = ' Customer.fullname LIKE "%' . addslashes(trim($v)) . '%"';
        $this->Customer->recursive = 0;
        $customer = $this->Customer->find('all', array('conditions' => array($condition), 'fields' => array('Customer.fullname,Customer.user_id')));
        echo json_encode($customer);
        exit;
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
    
    public function promotionalcode(){
        $user_id = $this->Session->read('Auth.User.id');
        $results = $this->FcodeProduct->find('all',array('conditions'=>array('Fcode.user_id'=>$user_id)));
        //pr($results);
        $this->set('results',$results);
    }
    
    public function checkfcode(){
        $fcode = $this->Session->read('fcode');
        $cart_data = $this->Session->read('cart_data');
        if(empty($cart_data)){
            $this->Session->write('fcode','');
        }
        if(!empty($this->data)){
            $user_id = $this->Session->read('Auth.User.id');
            if(!isset($this->Captcha)){ //if Component was not loaded throug $components array()
                    $this->Captcha = $this->Components->load('Captcha'); //load it
            }
            $this->Fcode->setCaptcha($this->Captcha->getVerCode());
            $this->request->data['Fcode']['user_id'] = $user_id;
            $this->Fcode->set($this->request->data);
            if($this->Fcode->validates($this->request->data)){
                $result = $this->FcodeProduct->find('all',array('conditions'=>array('Fcode.status'=>'0','Fcode.user_id'=>$user_id,'code'=>$this->request->data['Fcode']['promotionalcode'])));
                //pr($result['0']['']);exit;
                if($result['0']['Fcode']['date_end']>=date('Y-m-d')){
                    //echo 'pass';
                }else{
                    $this->Session->setFlash('<div class="alert alert-danger"><i class="fa fa-exclamation-circle"></i> F-code is expired.<button data-dismiss="alert" class="close" type="button">×</button> </div>');
                    $this->redirect('/fcodes/checkfcode');
                    //echo 'fail';
                }
                //pr($result);exit;
                if(empty($result)){
                    $this->Session->setFlash('<div class="alert alert-danger"><i class="fa fa-exclamation-circle"></i> F-code is not valid.<button data-dismiss="alert" class="close" type="button">×</button> </div>');
                    $this->redirect('/fcodes/checkfcode');
                }else{
                    $valarr = array();
                    $valarr2 = array();
                    foreach($result as $res){
                        $valarr[$res['Product']['id']] = '1';
                        $valarr2[$res['Product']['id']] = $res['Product']['id'];
                    }
                    $cart_data = $this->Session->read('cart_data');
                    
                    if(isset($fcode) and $fcode ==''){
                        if(!empty($cart_data)){
                            $sums = array();
                            foreach (array_keys($cart_data + $valarr) as $key) {
                                $sums[$key] = @($cart_data[$key] + $valarr[$key]);
                            }     
                            $arr3 = $cart_data+$valarr;
                        }else{
                            $sums = $valarr;
                        }
                    }else{
                        $this->redirect('/store/checkout');
                    }
                    

                    //print_r($sums);
                    //pr($valarr);
                    //pr($cart_data);exit;
                    $this->Session->write('cart_data',$sums);
                    $this->Session->write('cart_data2',$valarr2);
                    $this->Session->write('fcode',$this->request->data['Fcode']['promotionalcode']);
                    $this->redirect('/store/checkout');
                    //pr($this->Session->read());
                }
            }
        }
    }
}
