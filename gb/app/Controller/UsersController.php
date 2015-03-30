<?php
App::uses('AppController', 'Controller');
class UsersController extends AppController {

////////////////////////////////////////////////////////////

	public function beforeFilter() {
		parent::beforeFilter();
		$this->Auth->allow('login');
	}

////////////////////////////////////////////////////////////

	public function vendors() {
		$users = $this->User->find('all', array(
			'recursive' => -1,
			'fields' => array(
				'User.id',
				'User.name',
				'User.slug',
				'User.image',
			),
			'conditions' => array(
				'User.active' => 1,
				'User.level' => 'vendor'
			),
			'order' => array(
				'User.name' => 'ASC'
			),
		));

//		foreach($users as $user) {
//			if(strstr($user['User']['image'], '.jpg')) {
//				rename(IMAGES . 'logos/' . $user['User']['logo'], IMAGES . 'logo/' . $user['User']['short_name'] . '.jpg');
//				$data['User']['id'] = $user['User']['id'];
//				$data['User']['image'] = $user['User']['slug'] . '.jpg';
//				print_r($data);
//				$this->User->save($data, false);
//			}
//		}

		$this->set(compact('users'));
	}

////////////////////////////////////////////////////////////

	public function login() {
		if ($this->request->is('post')) {
			if($this->Auth->login()) {

				$this->User->id = $this->Auth->user('id');
				$this->User->saveField('last_login', date('Y-m-d H:i:s'));

				if ($this->Auth->user('level') == 'vendor') {
					return $this->redirect(array(
						'controller' => 'users',
						'action' => 'dashboard',
						'vendor' => true
					));
				} elseif ($this->Auth->user('level') == 'admin') {
					return $this->redirect(array(
						'controller' => 'users',
						'action' => 'dashboard',
						'admin' => true
					));
				} else {
					$this->Session->setFlash('Login is incorrect');
				}
			} else {
				$this->Session->setFlash('Login is incorrect');
			}
		}
	}

////////////////////////////////////////////////////////////

	public function logout() {
		$this->Session->setFlash('Good-Bye');
		$this->redirect($this->Auth->logout());
	}

////////////////////////////////////////////////////////////

	public function admin_dashboard() {
	}

////////////////////////////////////////////////////////////

	public function vendor_dashboard() {
	}

////////////////////////////////////////////////////////////

	public function vendor_profile() {
		$this->set('user', $this->User->read(null, $this->Auth->user('id')));
	}

////////////////////////////////////////////////////////////

	public function vendor_edit() {

		$id = $this->Auth->user('id');

		$this->User->id = $id;
		if (!$this->User->exists()) {
			throw new NotFoundException(__('Invalid user'));
		}

		$states = $this->User->states();

		$this->set(compact('users','taxes','states'));

		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->User->save($this->request->data)) {
				$this->Session->setFlash('The user has been saved');
				$this->redirect(array('action' => 'profile'));
			} else {
				$this->Session->setFlash('The user could not be saved. Please, try again.');
			}
		} else {
			$this->request->data = $this->User->read(null, $id);
			$this->set('user', $this->User->read(null, $id));
		}
	}

////////////////////////////////////////////////////////////

	public function admin_reset() {
		$this->Session->delete('User');

		$this->redirect(array('action' => 'index'));
	}

////////////////////////////////////////////////////////////

	public function admin_index() {

		if ($this->request->is('post')) {

			if($this->request->data['User']['active'] == '1' || $this->request->data['User']['active'] == '0') {
				$conditions[] = array(
					'User.active' => $this->request->data['User']['active']
				);
				$this->Session->write('User.active', $this->request->data['User']['active']);
			} else {
				$this->Session->write('User.active', '');
			}


			if(!empty($this->request->data['User']['name'])) {
				$filter = $this->request->data['User']['filter'];
				$this->Session->write('User.filter', $filter);
				$name = $this->request->data['User']['name'];
				$this->Session->write('User.name', $name);
				$conditions[] = array(
					'User.' . $filter . ' LIKE' => '%' . $name . '%'
				);
			} else {
				$this->Session->write('User.filter', '');
				$this->Session->write('User.name', '');
			}

			$this->Session->write('User.conditions', $conditions);
			$this->redirect(array('action' => 'index'));

		}

		$all = array(
			'active' => '',
			'name' => '',
			'filter' => '',
			'conditions' => ''
		);

		if($this->Session->check('User')) {
			$all = $this->Session->read('User');
		}

		$this->set(compact('all'));


		$this->paginate = array(
			'recursive' => -1,
			'order' => array(
				'User.active' => 'DESC',
				'User.username' => 'ASC',
			),
			'conditions' => $all['conditions'],
			'limit' => 100,
		);
		$users = $this->paginate('User');
		$this->set(compact('users'));
	}

////////////////////////////////////////////////////////////

	public function admin_images() {
		$users = $this->User->find('all', array(
			'recursive' => -1,
			'fields' => array(
				'User.id',
				'User.username',
				'User.name',
				'User.image',
				'User.image_1',
				'User.image_2',
				'User.image_3',
				'User.image_4',
				'User.image_5',
				'User.image_6',
			),
			'conditions' => array(
				'User.active' => 1,
				'User.level' => 'vendor'
			),
			'order' => array(
				'User.name' => 'ASC'
			),
		));

		$this->set(compact('users'));

		$this->layout = 'admin_simple';
	}

////////////////////////////////////////////////////////////

	public function admin_view($id = null) {

		if (isset($this->request->data['User']['image_type'])) {

			$slug = $this->request->data['User']['slug'];
			$image = $this->request->data['User']['slug'] . '.jpg';

			$type = $this->request->data['User']['image_type'];

			$targetdir = IMAGES . 'users/' . $type . '/';

			$this->Image = $this->Components->load('Image');

			$upload = $this->Image->upload($this->request->data['User']['image']['tmp_name'], $targetdir, $image);

			if($upload == 'Success') {
				$this->User->id = $this->request->data['User']['id'];
				$this->User->saveField($type, $image);
				$uploadedfile = $targetdir . '/' . $image;
				//$this->Image->resample($uploadedfile, IMAGES . '/user_image/' . $slug . '/', $image, 900, 600, 1, 0);
				//$this->Image->resample($uploadedfile, IMAGES . '/user_image/', $image, 200, 200, 1, 0);
			}

			$this->Session->setFlash($upload);
			$this->redirect($this->referer());
		}

		$this->User->id = $id;
		if (!$this->User->exists()) {
			throw new NotFoundException('Invalid user');
		}
		$this->set('user', $this->User->read(null, $id));
	}

////////////////////////////////////////////////////////////

	public function admin_add() {
		if ($this->request->is('post')) {
			$this->User->create();
			$user = $this->User->save($this->request->data);
			if ($user) {

				$this->request->data['Tax']['user_id'] = $this->User->id;
				$this->User->Tax->save($this->request->data);

				$this->Session->setFlash('The user has been saved');
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash('The user could not be saved. Please, try again.');
			}
		}

		$states = $this->User->states();

		$taxes = $this->User->Tax->find('all', array(
		'recursive' => -1,
			'fields' => array(
				'Tax.id',
				'Tax.user_id',
				'Tax.check',
				'Tax.total_food_tax_in_state',
				'Tax.total_food_tax_out_state',
				'Tax.local_sales_tax_in_state',
				'Tax.local_sales_tax_out_state',
				'Tax.total_non_food_tax_in_state',
				'Tax.total_non_food_tax_out_state',
				'Tax.local_use_tax_in_state',
				'Tax.local_use_tax_out_state',
			),
		));
		$this->set(compact('users','taxes','states'));
	}
////////////////////////////////////////////////////////////

	public function admin_edit($id = null) {

		$this->User->id = $id;
		if (!$this->User->exists()) {
			throw new NotFoundException('Invalid user');
		}
		if ($this->request->is('post') || $this->request->is('put')) {

			if ($this->User->saveAll($this->request->data)) {
				$this->Session->setFlash('The user has been saved');
				$this->redirect(array('action' => 'edit', $id));
			} else {
				$this->Session->setFlash('The user could not be saved. Please, try again.');
			}
		} else {
			$user = $this->User->find('first', array(
				'contain' => array(
					'Tax',
					'Approval'
				),
				'conditions' => array(
					'User.id' => $id
				),
			));
			$this->request->data = $user;
			$this->set('user', $this->User->read(null, $id));
		}

		$states = $this->User->states();

		$taxes = $this->User->Tax->find('all', array(
			'recursive' => -1,
			'fields' => array(
				'Tax.id',
				'Tax.user_id',
				'Tax.check',
				'Tax.total_food_tax_in_state',
				'Tax.total_food_tax_out_state',
				'Tax.local_sales_tax_in_state',
				'Tax.local_sales_tax_out_state',
				'Tax.total_non_food_tax_in_state',
				'Tax.total_non_food_tax_out_state',
				'Tax.local_use_tax_in_state',
				'Tax.local_use_tax_out_state',
			),
		));

		$approvals = $this->User->Approval->find('all', array(
			'recursive' => -1,
			'fields' => array(
				'Approval.id',
				'Approval.user_id',
				'Approval.comments',
				'Approval.status',
			),
		));

		$this->set(compact('users','taxes','states','approvals'));
	}

////////////////////////////////////////////////////////////

	public function admin_awnings() {
		$users = $this->User->find('all', array(
			'recursive' => -1,
			'fields' => array(
				'User.id',
				'User.username',
				'User.name',
				'User.awning_image',
				'User.awning_css',
			),
			'conditions' => array(
				'User.active' => 1,
				'User.level' => 'vendor'
			),
			'order' => array(
				'User.name' => 'ASC'
			),
		));

		$this->set(compact('users'));

	}


////////////////////////////////////////////////////////////

	public function admin_password($id = null) {
		$this->User->id = $id;
		if (!$this->User->exists()) {
			throw new NotFoundException('Invalid user');
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->User->save($this->request->data)) {
				$this->Session->setFlash('The user has been saved');
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash('The user could not be saved. Please, try again.');
			}
		} else {
			$this->request->data = $this->User->read(null, $id);
		}
	}

////////////////////////////////////////////////////////////

	public function admin_awning($id = null) {

		$this->User->id = $id;
		if (!$this->User->exists()) {
			throw new NotFoundException(__('Invalid user'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {

			if ($this->User->save($this->request->data)) {
				$this->Session->setFlash('The user has been saved');
				$this->redirect(array('action' => 'view', $id));
			} else {
				$this->Session->setFlash('The user could not be saved. Please, try again.');
			}
		} else {
			$this->request->data = $this->User->read(null, $id);
			$this->set('user', $this->User->read(null, $id));
		}
	}

////////////////////////////////////////////////////////////

	public function admin_delete($id = null) {
		if (!$this->request->is('post')) {
			throw new MethodNotAllowedException();
		}
		$this->User->id = $id;
		if (!$this->User->exists()) {
			throw new NotFoundException('Invalid user');
		}
		if ($this->User->delete()) {
			$this->Session->setFlash('User deleted');
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash('User was not deleted');
		$this->redirect(array('action' => 'index'));
	}


////////////////////////////////////////////////////////////

	public function search() {

		$search = null;
		if(!empty($this->request->query['search']) || !empty($this->request->data['name'])) {
			$search = empty($this->request->query['search']) ? $this->request->data['name'] : $this->request->query['search'] ;
			//$search = preg_replace('/[^a-zA-Z0-9 ]/', '', $search);
			$terms = explode(' ', trim($search));
			$terms = array_diff($terms, array(''));
			//$conditions = array(
//				'User.active' => 1,
//				'User.level' => 'vendor',
//				'Product.active' => 1,
//			);
			foreach($terms as $term) {
				//$terms1[] = preg_replace('/[^a-zA-Z0-9]/', '', $term);
				$conditions[] = array(
					'OR' => array(
						'User.name LIKE' => '%' . $term . '%',
						//'Brand.name LIKE' => '%' . $term . '%',
					)
				);
			}
			$products = $this->Product->find('all', array(
				'recursive' => -1,
				//'contain' => array(
//					'User',
//					'Brand'
//				),
				'fields' => array(
					'Product.id',
					'Product.name',
					'Product.slug',
					'Product.image',
					'Product.price',
					'Brand.name',
					'User.slug'
				),
				'conditions' => $conditions,
				'limit' => 200,
			));
			if(count($products) == 1) {
				$this->redirect(array('subdomain' => $products[0]['User']['slug'], 'controller' => 'products', 'action' => 'view', 'id' => $products[0]['Product']['id'], 'slug' => $products[0]['Product']['slug']));
			}
			$terms1 = array_diff($terms, array(''));
			$this->set(compact('products', 'terms1'));
		}
		$this->set(compact('search'));

		if ($this->request->is('ajax')) {
			$this->layout = false;
			$this->set('ajax', 1);
		} else {
			$this->set('ajax', 0);
		}

		$this->set('title_for_layout', 'Search');

		$description = 'Search';
		$this->set(compact('description'));

		$keywords = 'search';
		$this->set(compact('keywords'));
	}



}
