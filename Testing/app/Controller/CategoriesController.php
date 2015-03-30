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

/**
 * Static content controller
 *
 * Override this controller by placing a copy in controllers directory of an application
 *
 * @package       app.Controller
 * @link http://book.cakephp.org/2.0/en/controllers/pages-controller.html
 */
class CategoriesController extends AppController {

/**
 * This controller does not use a model
 *
 * @var array
 */

	public $uses = array('Category');

	function beforeFilter() {
		parent::beforeFilter();
	}

/**
 * Displays a view
 *
 * @return void
 * @throws NotFoundException When the view file could not be found
 *	or MissingViewException in debug mode.
 */
	public function admin_index($value = null) {
		
        $categories = $this->Paginator->paginate('Category');
		
		$this->set('categories',$categories);
	}

	public function admin_add(){
		if($this->request->is('post')){
			
			if($this->request->data['Category']['sort_order'] == null){
				$this->request->data['Category']['sort_order'] = 0;
			}
			
			$this->Category->create();

			$this->request->data['Category'] = Sanitize::clean($this->request->data['Category'], array("remove_html" => TRUE));	
			
			
			if($this->Category->save($this->request->data)){
				$this->Session->setFlash('<div class="alert alert-success"><i class="fa fa-check-circle"></i> Category Details Added Successfully...<button data-dismiss="alert" class="close" type="button">×</button> </div>');
				return $this->redirect(array('action'=>'index'));
			}
			$this->Session->setFlash('<div class="alert alert-danger"><i class="fa fa-exclamation-circle"></i> Category Details not Saved. Please try again...<button data-dismiss="alert" class="close" type="button">×</button> </div>');
		}
		$category_dd = $this->Category->find('list',array('fields'=>array('id','name')));
		$this->set('category_dd',$category_dd);
	}

	public function admin_edit($id = null){
		if(!$id){
			throw new NotFoundException(__('Invalid Category Details'));
		}
		$category = $this->Category->findById($id);
		
		if(!$this->request->data){

			$category_data = $this->Category->findById($id);

            $this->request->data = $category;
            
			$category_dd = $this->Category->find('list',array('fields'=>array('id','name')));
			$this->set('category_dd',$category_dd);
		}
		if(!$category){
			throw new NotFoundException(__('Invalid Category Details'));
		}
		if($this->request->is(array('post','put'))){
			$this->Category->id = $id;
			
			$this->request->data['Category'] = Sanitize::clean($this->request->data['Category'], array("remove_html" => TRUE));	
			

			
			if($this->Category->save($this->request->data)){

				$this->Session->setFlash('<div class="alert alert-success"><i class="fa fa-check-circle"></i> Category Details has been Updated <button data-dismiss="alert" class="close" type="button">×</button> </div>');

				return $this->redirect(array('action'=>'admin_index'));		
			}
			$this->Session->setFlash('<div class="alert alert-danger"><i class="fa fa-exclamation-circle"></i> Unable to Updated Category Details <button data-dismiss="alert" class="close" type="button">×</button> </div>');

		}
	}

	public function admin_delete(){
		$this->autoRender = false;
		if($this->request->is('post')){
			if(isset($this->request->data['selected'])){
				$selected = $this->request->data['selected'];
				$result = false;
				foreach ($selected as $key => $id) {
					if($this->Category->delete($id)){
						$result = true;
					}
				}
				if($result){
					$this->Session->setFlash('<div class="alert alert-success"><i class="fa fa-check-circle"></i> The Category Details has been deleted Successfully <button data-dismiss="alert" class="close" type="button">×</button> </div>');
					
					return $this->redirect(array('action'=>'index'));
				}else
				{
					$this->Session->setFlash('<div class="alert alert-danger"><i class="fa fa-exclamation-circle"></i> The Category is not deleted <button data-dismiss="alert" class="close" type="button">×</button> </div>');
					
					return $this->redirect(array('action'=>'index','admin' => true));
				}
			}else{
				
				$this->Session->setFlash('<div class="alert alert-danger"><i class="fa fa-exclamation-circle"></i> The Category is not deleted <button data-dismiss="alert" class="close" type="button">×</button> </div>');

				return $this->redirect(array('action'=>'admin_index'));		
			}
		}
	
	}

}
