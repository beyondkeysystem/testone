<?php
App::uses('AppController', 'Controller');
App::uses('CakeEmail', 'Network/Email');

/**
 * Home Controller
 *
 * @property User $User
 * @property AuthComponent $Auth
 */
class HomeController extends AppController {

  public $components = array('Auth' , 'Session');
  var $uses = array('User', 'ResetPassword');

  
  public function beforeFilter() {
		parent::beforeFilter();
		$this->Auth->allow('index');
		if ($this->Auth->user()) {
			$this->set('user', $this->Auth->user());
		}
	}
    /**
     * index method
     * @return void
     */
    public function index() {
	
    if ($this->request->is('post')) {
            $this->Auth->authenticate['Form'] = array('fields' => array('username' => 'email'));
            if ($this->Auth->login()) {
                $auth_data = $this->Auth->user();
                if (isset($auth_data) && !empty($auth_data)) {
		    if($auth_data['first_login'] == 0)
		    {
			if ($auth_data['type'] == 'candidate') {
			    $this->redirect(array('controller' => 'candidate', 'action' => 'candidate_edit/'.$auth_data['id']));
			}
			if ($auth_data['type'] == 'employer') {
			    $this->redirect(array('controller' => 'employer', 'action' => 'profile_edit/'.$auth_data['id']));
			}
		    }
		    else
		    {
			if ($auth_data['type'] == 'candidate') {
			    $this->redirect(array('controller' => 'candidate', 'action' => 'candidate_profile/'.$auth_data['name']));
			}
			if ($auth_data['type'] == 'employer') {
			    $this->redirect(array('controller' => 'employer', 'action' => 'profile/'.$auth_data['name']));
			}
			if ($auth_data['type'] == 'admin') {
			    $this->redirect(array('controller' => 'admin', 'action' => 'index'));
			}
		    }
                }
            } else {
		       // die('test');
                $this->Session->setFlash(__('Invalid email or password, try again'));
            }
            $this->set("email", $this->data['User']['email']);
        }
    }

}