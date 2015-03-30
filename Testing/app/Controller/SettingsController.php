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
class SettingsController extends AppController {

	public $uses = array('MailSetting');
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


	public function admin_edit(){
		$setting = $this->MailSetting->findById(1);

		if($this->request->is(array('post','put'))){
			// pr($this->data);die;
			$this->MailSetting->id = 1;
			if($this->MailSetting->save($this->request->data)){
				$this->Session->setFlash(__('<div class="alert alert-success"><i class="fa fa-check-circle"></i> MailSetting Details has been Updated <button type="button" class="close" data-dismiss="alert">×</button> </div>'));
				return $this->redirect(array('action'=>'edit'));		
			}else{
				$this->Session->setFlash(__('<div class="alert alert-warning"><i class="fa fa-exclamation-circle"></i> MailSetting Details is not Updated !!! Please Try again. <button type="button" class="close" data-dismiss="alert">×</button> </div>'));
			}
		}

		if (!$this->request->data) {
			$this->request->data = $setting;
		}
		
	}

	

}
