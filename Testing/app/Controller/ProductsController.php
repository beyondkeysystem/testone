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
class ProductsController extends AppController {

/**
 * This controller does not use a model
 *
 * @var array
 */

	public $uses = array('Product',
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
 *	or MissingViewException in debug mode.
 */
	function beforeFilter() {
		parent::beforeFilter();
		 
		$this->Paginator->settings = array(
		    //'conditions' => array('Recipe.title LIKE' => 'a%'),
		    'limit' => 12
		);
	    }
	public function admin_index() { 
		
		// $products = $this->Product->find('all');
		
		$this->Product->unbindModel(
	        array('hasMany' => array('ProductDiscount',
	        						'ProductCategory', 
	        						'ProductRelate', 
	        						'ProductAttribute', 
	        						'ProductImages'
	        						)
	        	)
	    );

		if($this->request->is('post') && isset($this->request->data['filter'])){
			
			$str = '';
			
			if(!empty($this->data)){
				foreach($this->data['Product'] as $k=>$v){
					if(isset($v) and $v !=''){
						if($k == 'price' or $k == 'quantity' or $k == 'status'){
							$str .= ' Product.'.$k.' = "'.addslashes(trim($v)).'" and ';
						}else{
							$str .= ' Product.'.$k.' LIKE "%'.addslashes(trim($v)).'%" and ';
						}
					}
				}
			}
			$condition = substr($str,0,-4);
			
			$this->Paginator->settings = array(
			    'conditions' => array($condition),
		    );

		}
		
		$products = $this->Paginator->paginate('Product');
		$this->set('products',$products);
	}


	public function admin_add(){

		if($this->request->is('post')){
		
			$unique = time();

                        $product_info = $this->request->data['Product']['product_info'];
                        $how_to_buy = $this->request->data['Product']['how_to_buy'];
                        $service = $this->request->data['Product']['service'];
                        
			$this->request->data['Product'] = Sanitize::clean($this->request->data['Product'], array("remove_html" => TRUE));
			$this->request->data['ProductAttribute'] = Sanitize::clean($this->request->data['ProductAttribute'], array("remove_html" => TRUE));
			$this->request->data['ProductDiscount'] = Sanitize::clean($this->request->data['ProductDiscount'], array("remove_html" => TRUE));
			$this->request->data['ProductSpecial'] = Sanitize::clean($this->request->data['ProductSpecial'], array("remove_html" => TRUE));
			$this->request->data['ProductImage'] = Sanitize::clean($this->request->data['ProductImage'], array("remove_html" => TRUE));
			$this->request->data['ProductCategory'] = Sanitize::clean($this->request->data['ProductCategory'], array("remove_html" => TRUE));
			$this->request->data['ProductRelate'] = Sanitize::clean($this->request->data['ProductRelate'], array("remove_html" => TRUE));
			
                        $this->request->data['Product']['product_info'] = $product_info;
                        $this->request->data['Product']['how_to_buy'] = $how_to_buy;
                        $this->request->data['Product']['service'] = $service;
			
			$ext = substr(strtolower(strrchr($this->request->data['Product']['image']['name'], '.')), 1); //get the extension
                
    	    $arr_ext = array('jpg', 'jpeg', 'gif', 'png'); //set allowed extensions
			
			$fileattr = $this->request->data['Product']['image'];

			if(in_array($ext, $arr_ext)){			
		
				if(isset($this->request->data['Product']['image']['name']) and $this->request->data['Product']['image']['name'] != '' and $this->request->data['Product']['image']['error'] == 0) {
	                

	                $fileattr = $this->request->data['Product']['image'];
	                $image_name = 'products/'.$unique.'_'.$this->request->data['Product']['image']['name'];
	                
	                if (isset($fileattr['name']) and $fileattr['name'] != '' and $fileattr['error'] == 0) {
	                    $destination = WWW_ROOT . 'uploads/';
	                 
	                    if (!file_exists($destination.'/products/')) {		
	                    	$dir = new Folder($destination.'/products/', true, 0755);
	                   	}
	                    if (!file_exists($destination.'thumbs/products/')) {		
	                    	$thumb_dir = new Folder($destination.'thumbs/products/', true, 0755);
						}
	                
	                    $this->uploadfile($fileattr,$destination,$image_name,$is_orib='1');
	                }
	                $this->request->data['Product']['image'] = "products/".$unique.'_'.$this->request->data['Product']['image']['name'];
	            }else{
					$this->request->data['Product']['image'] = null;
	            }

			}else{
				$this->request->data['Product']['image'] = null;
	        }

			$this->Product->set($this->request->data);
			
			$this->Product->save($this->request->data);
			$product_id = $this->Product->id;

			if(!empty($this->request->data['ProductCategory']['category_id'])){
				foreach($this->request->data['ProductCategory']['category_id'] as $ci => $c_id){
					$this->request->data['ProductCategory'][$ci]['product_id'] = $product_id;
					$this->request->data['ProductCategory'][$ci]['category_id'] = $c_id;
				}
				unset($this->request->data['ProductCategory']['category_id']);
				$this->ProductCategory->saveAll($this->request->data['ProductCategory']);				
			}		


			if(!empty($this->request->data['ProductRelate']['related_id'])){
				foreach($this->request->data['ProductRelate']['related_id'] as $ri => $r_id){
					$this->request->data['ProductRelate'][$ri]['product_id'] = $product_id;
					$this->request->data['ProductRelate'][$ri]['related_id'] = $r_id;
				}
				unset($this->request->data['ProductRelate']['related_id']);
				$this->ProductRelate->saveAll($this->request->data['ProductRelate']);
			}
				
				
			if(!empty($this->request->data['ProductAttribute'][0])){
				
				foreach($this->request->data['ProductAttribute'] as $key=>$value){
					$this->request->data['ProductAttribute'][$key]['product_id'] = $product_id;
				}

				$this->ProductAttribute->saveAll($this->request->data['ProductAttribute']);
			}

			if(!empty($this->request->data['ProductDiscount'][0])){
				foreach($this->request->data['ProductDiscount'] as $di => $dis_id){
					$this->request->data['ProductDiscount'][$di]['product_id'] = $product_id;
				}
				$this->ProductDiscount->saveAll($this->request->data['ProductDiscount']);
			}

			if(!empty($this->request->data['ProductSpecial'][0])){
				foreach($this->request->data['ProductSpecial'] as $si => $spec_id){
					$this->request->data['ProductSpecial'][$si]['product_id'] = $product_id;
				}
				$this->ProductSpecial->saveAll($this->request->data['ProductSpecial']);
			}

			/*Image Upload Code Area*/
			if(!empty($this->request->data['ProductImage'][0])){
				foreach ($this->request->data['file'] as $key => $img_det) {
					if(isset($this->request->data['file'][$key]['name']) and $this->request->data['file'][$key]['name'] != '' and $this->request->data['file'][$key]['error'] == 0) {
		                $fileattr = $this->request->data['file'][$key];
		                $image_name = $unique.'_'.$this->request->data['file'][$key]['name'];
		                
		                if (isset($fileattr['name']) and $fileattr['name'] != '' and $fileattr['error'] == 0) {
		                    $destination = WWW_ROOT . 'uploads/';
		                 
		     //                if (!file_exists($destination.$product_id.'/')) {		
		     //                	$dir = new Folder($destination.$product_id.'/', true, 0755);
		     //               	}
		     //                if (!file_exists($destination.'thumbs/'.$product_id.'/')) {		
		     //                	$thumb_dir = new Folder($destination.'thumbs/'.$product_id.'/', true, 0755);
							// }
		                
		                    $this->uploadfile($fileattr,$destination,$image_name,$is_orib='1');
		                }

						$this->request->data['ProductImage'][$key]['product_id'] = $product_id;
		                $this->request->data['ProductImage'][$key]['image'] = $image_name;
		            }	
				}
				unset($this->request->data['file']);		                
				$this->ProductImage->saveAll($this->request->data['ProductImage']);

				$this->Session->setFlash('<div class="alert alert-success"><i class="fa fa-check-circle"></i> Products Details Added Successfully...<button data-dismiss="alert" class="close" type="button">×</button> </div>');

				return $this->redirect(array('action' => 'index'));	
			}else{
                            if(isset($product_id) and $product_id !=''){
                                $this->Session->setFlash('<div class="alert alert-success"><i class="fa fa-check-circle"></i> Products Details Added Successfully...<button data-dismiss="alert" class="close" type="button">×</button> </div>');
                                return $this->redirect(array('action' => 'index'));
                            }else{
                                $this->Session->setFlash('<div class="alert alert-danger"><i class="fa fa-exclamation-circle"></i> Product Details not Saved. Please try again...<button data-dismiss="alert" class="close" type="button">×</button> </div>');
                            }
				
			}
		}

		$tax = $this->TaxClass->find('list',array('fields' => array('id','title')));
		$this->set('tax',$tax);

		$stockstatus = $this->StockStatus->find('list',array('fields' => array('id','name')));
		$this->set('stockstatus',$stockstatus);


		$length_class = $this->LengthClass->find('list',array('fields' => array('id','title')));
		$this->set('length_class_id',$length_class);

		$weight_class = $this->WeightClass->find('list',array('fields' => array('id','title')));
		$this->set('weight_class_id',$weight_class);

		$category = $this->Category->find('list',array('fields' => array('id','name')));
		$this->set('category',$category);

		$products = $this->Product->find('list',array('fields' => array('id','name')));
		$this->set('products',$products);

		$customer_group_dd = $this->CustomerGroup->find('list',array('fields' => array('id','name')));
		$this->set('customer_group',$customer_group_dd);

	}

	public function admin_copy(){
		if($this->request->is('post')){
			// pr($this->request->data);die;
			foreach($this->request->data('selected') as $product_id){
				$this->Product->copy($product_id);
				$product_id = $this->Product->id;
				
				$copy_product = $this->Product->findById($product_id);
				// pr($copy_product);die;
				$copy_product['Product']['status'] = 0;
				$copy_product['Product']['sku'] = null;
				$copy_product['Product']['isbn'] = null;
				$copy_product['Product']['mpn'] = null;
				$copy_product['Product']['id'] = $product_id;
				// pr($copy_product);die;
				$this->Product->save($copy_product['Product']);
				$this->Session->setFlash('<div class="alert alert-success"><i class="fa fa-check-circle"></i> Products Details Copied Successfully...<button data-dismiss="alert" class="close" type="button">×</button> </div>');
			}

		}
		return $this->redirect(array('action' => 'index'));		
	}

	public function admin_delete(){
		if($this->request->is('post')){
			// pr($this->request->data);die;
			foreach($this->request->data('selected') as $product_id){
				$this->Product->delete($product_id);
			}
			return $this->redirect(array('action' => 'index'));
		}
	}

	public function admin_edit($id = null){
		
		$product = $this->Product->findById($id);
		
		$tax = $this->TaxClass->find('list',array('fields' => array('id','title')));
		$this->set('tax',$tax);

		$stockstatus = $this->StockStatus->find('list',array('fields' => array('id','name')));
		$this->set('stockstatus',$stockstatus);


		$length_class = $this->LengthClass->find('list',array('fields' => array('id','title')));
		$this->set('length_class_id',$length_class);

		$weight_class = $this->WeightClass->find('list',array('fields' => array('id','title')));
		$this->set('weight_class_id',$weight_class);

		$category = $this->Category->find('list',array('fields' => array('id','name')));
		$this->set('category',$category);

		$products = $this->Product->find('list',array('fields' => array('id','name')));
		$this->set('products',$products);

		$customer_group_dd = $this->CustomerGroup->find('list',array('fields' => array('id','name')));
		$this->set('customer_group',$customer_group_dd);

		if ($this->request->is(array('post', 'put'))) {
                        $product_info = $this->request->data['Product']['product_info'];
                        $how_to_buy = $this->request->data['Product']['how_to_buy'];
                        $service = $this->request->data['Product']['service'];
                        
			$this->request->data['Product'] = Sanitize::clean($this->request->data['Product'], array("remove_html" => TRUE));
			$this->request->data['Product']['product_info'] = $product_info;
                        $this->request->data['Product']['how_to_buy'] = $how_to_buy;
                        $this->request->data['Product']['service'] = $service;
			if(isset($this->request->data['ProductAttribute'][0])){
				$this->request->data['ProductAttribute'] = Sanitize::clean($this->request->data['ProductAttribute'], array("remove_html" => TRUE));
			}
			if(isset($this->request->data['ProductDiscount'][0])){
				$this->request->data['ProductDiscount'] = Sanitize::clean($this->request->data['ProductDiscount'], array("remove_html" => TRUE));
			}
			
			if(isset($this->request->data['ProductSpecial'][0])){
				$this->request->data['ProductSpecial'] = Sanitize::clean($this->request->data['ProductSpecial'], array("remove_html" => TRUE));
			}
			if(isset($this->request->data['ProductImage'][0])){
					$this->request->data['ProductImage'] = Sanitize::clean($this->request->data['ProductImage'], array("remove_html" => TRUE));
			}	
			
			if(isset($this->request->data['ProductCategory'][0])){
				$product_category_act = $this->request->data['ProductCategory'];
				// unset($this->request->data['ProductCategory']);			
			}

			if(isset($this->request->data['ProductRelate'][0])){			
				$product_relate_act = $this->request->data['ProductRelate'];
				// unset($this->request->data['ProductRelate']);
			}


			
			

			// pr($this->request->data);die;

			$unique = time();
			
			$this->Product->id = $id;

			if(isset($this->request->data['Product']['image']['name'])){
				
				$ext = substr(strtolower(strrchr($this->request->data['Product']['image']['name'], '.')), 1); //get the extension
                
        	    $arr_ext = array('jpg', 'jpeg', 'gif', 'png'); //set allowed extensions
				
				$fileattr = $this->request->data['Product']['image'];

				if(in_array($ext, $arr_ext)){

					// pr($fileattr);die;

	                $image_name = 'products/'.$unique.'_'.$this->request->data['Product']['image']['name'];
	                
	                if (isset($fileattr['name']) and $fileattr['name'] != '' and $fileattr['error'] == 0) {
	                
	                    $destination = WWW_ROOT . 'uploads/';
	                 
	                    if (!file_exists($destination.'/products/')) {		
	                
	                    	$dir = new Folder($destination.'/products/', true, 0755);
	                
	                   	}
	                
	                    if (!file_exists($destination.'thumbs/products/')) {		
	                
	                    	$thumb_dir = new Folder($destination.'thumbs/products/', true, 0755);
					
						}
	                
	                    $this->uploadfile($fileattr,$destination,$image_name,$is_orib='1');
	                
	                } 

					$this->request->data['Product']['image'] = $image_name;

				}else{
	
					$this->request->data['Product']['image'] = '';

				}

			}

			if(isset($this->request->data['file']['0']['name']) && $this->request->data['file']['0']['name'] != ''){
				pr($this->request->data['file']);die;
				foreach ($this->request->data['file'] as $key => $img_det) {
				
				// $ext = substr(strtolower(strrchr($img_det[$key]['name'], '.')), 1); //get the extension
                
        	    $arr_ext = array('jpg', 'jpeg', 'gif', 'png'); //set allowed extensions
				
				if(in_array($ext, $arr_ext)){


					if(isset($this->request->data['file'][$key]['name']) and $this->request->data['file'][$key]['name'] != '' and $this->request->data['file'][$key]['error'] == 0) {
		                $fileattr = $this->request->data['file'][$key];
		                $image_name = $unique.'_'.$this->request->data['file'][$key]['name'];
		                
		                if (isset($fileattr['name']) and $fileattr['name'] != '' and $fileattr['error'] == 0) {
		                    $destination = WWW_ROOT . 'uploads/';
		                 
		                    if (!file_exists($destination)) {		
		                    	$dir = new Folder($destination, true, 0755);
		                   	}
		                    if (!file_exists($destination.'thumbs/')) {		
		                    	$thumb_dir = new Folder($destination.'thumbs/', true, 0755);
							}
		                
		                    $this->uploadfile($fileattr,$destination,$image_name,$is_orib='1');
		                }

						// $this->request->data['ProductImage'][$key]['product_id'] = $product_id;
		                $this->request->data['ProductImage'][$key+1]['image'] = $image_name;
		            }
		        }	
				}
				unset($this->request->data['file']);
			}


			// foreach($product_relate_act as $key => $product_rel){
			// 	$product_relate_act[$key]['product_id'] = $this->request->data['Product']['id'];
			// }
			// foreach($product_category_act as $key => $product_cat){
			// 		$product_category_act[$key]['product_id'] = $this->request->data['Product']['id'];
			// 	}
			// pr($product_category_act);
			// pr($product_relate_act);
			// pr($this->request->data); die;


			if($this->Product->saveAll($this->request->data)){
				
				$this->ProductCategory->deleteAll(array('product_id'=>$this->request->data['Product']['id']),false);
				foreach($product_category_act as $key => $product_cat){
					$product_category_act[$key]['product_id'] = $this->request->data['Product']['id'];
				}
				$this->ProductCategory->saveAll($product_category_act);

				$this->ProductRelate->deleteAll(array('product_id'=>$this->request->data['Product']['id']),false);
				foreach($product_relate_act as $key => $product_rel){
					$product_relate_act[$key]['product_id'] = $this->request->data['Product']['id'];
				}

				$this->ProductRelate->saveAll($product_relate_act);


				$this->Session->setFlash('<div class="alert alert-success"><i class="fa fa-check-circle"></i> Your Product has been Updated<button data-dismiss="alert" class="close" type="button">×</button> </div>');
				return $this->redirect(array('action'=>'index'));
			}
			$this->Session->setFlash('<div class="alert alert-danger"><i class="fa fa-exclamation-circle"></i> Unable to Update your Product.<button data-dismiss="alert" class="close" type="button">×</button> </div>');

		}
		if (!$this->request->data) {
			$this->request->data = $product;
		}
	}


	public function admin_delete_image(){
		$this->Product->id = $this->request->data('product_id');
		
		$product = $this->Product->findById($this->request->data('product_id'));
		
		$product_save = $this->Product->SaveField('image',NULL);		
		
		$count = $this->Product->find('count',array('conditions'=>array('image'=>$product['Product']['image'])));
		
		if($count == 0){
			$image = new File(WWW_ROOT . 'uploads/'.$product['Product']['image'], false, 0777);
			$image_thumb = new File(WWW_ROOT . 'uploads/thumbs/'.$product['Product']['image'], false, 0777);
			if($image->delete() && $image_thumb->delete()) {
			   echo 'image deleted.....';
			}
		}
		
		echo true;
		exit;
	}

	// public function admin_delete_productimage(){
	// 	$this->ProductImage->id = $this->request->data('id');

	// 	$product_image = $this->ProductImage->findById($this->request->data('id'));
		
	// 	// $product = $this->ProductImage->SaveField('image',NULL);

	// 	// $count = $this->ProductImage->find('count',array('conditions'=>array('image'=>$product_image['ProductImage']['image'])));

	// 	// if($count == 0){

	// 	// 	$image = new File(WWW_ROOT . 'uploads/'.$product['ProductImage']['image'], false, 0777);
	// 	// 	$image_thumb = new File(WWW_ROOT . 'uploads/thumbs/'.$product['ProductImage']['image'], false, 0777);
	// 	// 	if($image->delete() && $image_thumb->delete()) {
	// 	// 	   echo 'image deleted.....';
	// 	// 	}
		
	// 	// }
		
	// 	$product = $this->ProductImage->delete($this->ProductImage->id);

	// 	echo true;
	// 	exit;
	// }


	// public function admin_delete_attribute(){
	
	// 	$attribute_id = $this->request->data('id');

	// 	$this->ProductAttribute->delete($attribute_id);

	// 	echo true;
	// 	exit;
	// }

	// public function admin_delete_discount(){
	
	// 	$discount_id = $this->request->data('id');

	// 	$this->ProductDiscount->delete($discount_id);

	// 	echo true;
	// 	exit;
	// }


	public function admin_delete_row(){
	
		$id = $this->request->data('id');
		
		$table_name = $this->request->data('table');

		$this->$table_name->delete($id);

		echo true;
		exit;
	}


}