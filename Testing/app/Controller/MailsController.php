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
class MailsController extends AppController {

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
							'ProductImage',
							'Customer'
						);

/**
 * Displays a view
 *
 * @return void
 * @throws NotFoundException When the view file could not be found
 *	or MissingViewException in debug mode.
 */
	
	public function admin_index() { 
		
		if($this->request->is('post')){
			$store_id =  $this->request->data('store_id');
			$to = $this->request->data('to');
			$customer_group_id = $this->request->data('customer_group_id');
			$email = $this->request->data('email');
			$subject = $this->request->data('subject');
			$message = $this->request->data('message');

			/* Cake Email Code Via Template */
			$Email = new CakeEmail('default');
            $Email->template('mail_all','fancy')
                ->emailFormat('html')
                ->from(array('harimau@test.com' => 'Harimau'))
                ->to($email)
                ->subject($subject);
            $Email->viewVars(array('content' => $message));
       
            if($Email->send()) {
			    $this->Session->setFlash(__('<div class="alert alert-success"><i class="fa fa-check-circle"></i> Mail Send Successfully. <button data-dismiss="alert" class="close" type="button">×</button> </div>'));					
			} else {
			    $this->Session->setFlash(__('<div class="alert alert-danger"><i class="fa fa-exclamation-circle"></i> Problem on sending email to Users. <button data-dismiss="alert" class="close" type="button">×</button> </div>'));
			}
            $this->redirect('/admin/users');
		}

		$customer_dd = $this->Customer->find('list',array('conditions'=>array('email != "" || email != NULL'),'group' => 'Customer.email','fields'=>array('email','name')));
		$this->set('customer',$customer_dd);
	}


}