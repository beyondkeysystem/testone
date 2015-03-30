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
class CustomergroupsController extends AppController {
    
    public $name =  'Customergroups';
    public $components = array('Paginator');
    public $uses = array('Product','TaxClass','StockStatus','LengthClass','WeightClass', 'Category','CustomerGroup');

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
    public function admin_index() { 
	if(!empty($this->data)){
	    //pr($this->data);exit;
	   if(!empty($this->data['selected'])){
	       foreach($this->data['selected'] as $id){
		   $this->CustomerGroup->delete($id);
	       }
	   }
	   $this->redirect('/admin/customergroups');
	}
	$this->Paginator->settings = array(
	    //'conditions' => array('Recipe.title LIKE' => 'a%'),
	    'limit' => 12
	);
	$results = $this->Paginator->paginate('CustomerGroup');
	$this->set('results',$results);
    }


    public function admin_add(){
	if($this->request->is('post')){
	    //pr($this->data);
	    if($this->CustomerGroup->save($this->data)){
		$this->redirect('/admin/customergroups');
	    }
	}
    }
    
    public function admin_edit($id){
	if(!empty($this->data)){
	    if($this->CustomerGroup->save($this->data)){
		$this->redirect('/admin/customergroups');
	    }
	}else{
	    $this->request->data = $this->CustomerGroup->findById($id);
	}
    }
}