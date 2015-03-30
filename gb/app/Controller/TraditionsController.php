<?php
App::uses('AppController', 'Controller');

class TraditionsController extends AppController {

////////////////////////////////////////////////////////////

	public function index() {
				
	}


////////////////////////////////////////////////////////////

	public function view($slug = null) {

		$tradition = $this->Tradition->find('first', array(
			'recursive' => -1,
			'conditions' => array(
				'Tradition.slug' => $slug
			)
		));
		
		$countries_list1 = explode(',', $tradition['Tradition']['countries_list']);
		$countries_list = array_map('trim', $countries_list1);
		$this->set(compact('countries_list'));
		
				
		if(empty($tradition)) {
			die('invalid tradition');
		}
		$this->set(compact('tradition'));

		$traditionid = $tradition['Tradition']['id'];

		$traditions = $this->Tradition->find('all', array(
			'recursive' => -1,
			'conditions' => array(),
			'order' => array(
				'Tradition.name' => 'ASC'
			)
		));
		
		$this->set(compact('traditions'));

		$this->loadModel('Product');

		$this->paginate = array(
			'joins' => array(
				array(
					'table' => 'users',
					'type' => 'RIGHT',
					'alias' => 'User',
					'conditions' => array('User.id = Product.user_id AND User.level = "vendor"')
				),
				array(
					'table' => 'categories',
					'type' => 'RIGHT',
					'alias' => 'categories',
					'conditions' => array('categories.id = Product.category_id')
				),
				array(
					'table' => 'subcategories',
					'type' => 'RIGHT',
					'alias' => 'subcategories',
					'conditions' => array('subcategories.id = Product.subcategory_id')
				)
			),
			'fields' => array(
				'Product.id',
				'Product.category_id',
				'Product.name',
				'Product.slug',
				'Product.description',
				'Product.price',
				'Product.image',
				//'Product.image_1',
//				'Product.image_2',
//				'Product.image_3',
//				'Product.image_4',
//				'Product.image_5',
				'User.id',
				'User.slug',
				'User.name',
				'User.active',
			),
			'conditions' => array(
				'Product.active' => 1,
				'User.active',
				"FIND_IN_SET('$traditionid', traditions)"
			),
			'limit' => 30,
			'order' => array('Product.id' => 'DESC')
		);


		$products = $this->paginate('Product');
		$this->set(compact('products'));

	}

////////////////////////////////////////////////////////////

	public function admin_index() {
		$this->Tradition->recursive = 0;
		$this->set('traditions', $this->paginate());
	}

////////////////////////////////////////////////////////////

	public function admin_view($id = null) {
		
		if (isset($this->request->data['Tradition']['image_type'])) {

			$slug = $this->request->data['Tradition']['slug'];
			$image = $this->request->data['Tradition']['slug'] . '.jpg';
			$awning_image = $this->request->data['Tradition']['slug'] . '.png';

			$type = $this->request->data['Tradition']['image_type'];

			$targetdir = IMAGES . 'Traditions/' . $type . '/';

			$this->Image = $this->Components->load('Image');

			$upload = $this->Image->upload($this->request->data['Tradition']['image']['tmp_name'], $targetdir, $image);
			$upload_awning = $this->Image->upload($this->request->data['Tradition']['image']['tmp_name'], $targetdir, $awning_image);

			if($upload == 'Success') {
					$this->Tradition->id = $this->request->data['Tradition']['id'];
					$this->Tradition->saveField($type, $image);
					$uploadedfile = $targetdir . '/' . $image;
					//$this->Image->resample($uploadedfile, IMAGES . '/Tradition_image/' . $slug . '/', $image, 900, 600, 1, 0);
					//$this->Image->resample($uploadedfile, IMAGES . '/Tradition_image/', $image, 200, 200, 1, 0);
			}

			$this->Session->setFlash($upload);
			$this->redirect($this->referer());
		}
		
		
		if (!$this->Tradition->exists($id)) {
			throw new NotFoundException(__('Invalid tradition'));
		}
		$options = array('conditions' => array('Tradition.' . $this->Tradition->primaryKey => $id));
		$this->set('tradition', $this->Tradition->find('first', $options));
	}

////////////////////////////////////////////////////////////

	public function admin_add() {
		if ($this->request->is('post')) {
			$this->Tradition->create();
			if ($this->Tradition->save($this->request->data)) {
				$this->Session->setFlash(__('The tradition has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The tradition could not be saved. Please, try again.'));
			}
		}
	}

////////////////////////////////////////////////////////////

	public function admin_edit($id = null) {
		if (!$this->Tradition->exists($id)) {
			throw new NotFoundException(__('Invalid tradition'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Tradition->save($this->request->data)) {
				$this->Session->setFlash(__('The tradition has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The tradition could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Tradition.' . $this->Tradition->primaryKey => $id));
			$this->request->data = $this->Tradition->find('first', $options);
		}
	}

////////////////////////////////////////////////////////////

	public function admin_delete($id = null) {
		$this->Tradition->id = $id;
		if (!$this->Tradition->exists()) {
			throw new NotFoundException(__('Invalid tradition'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Tradition->delete()) {
			$this->Session->setFlash(__('Tradition deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Tradition was not deleted'));
		$this->redirect(array('action' => 'index'));
	}

////////////////////////////////////////////////////////////

	public function admin_awnings() {
		$users = $this->Tradition->find('all', array(
			'recursive' => -1,
			'fields' => array(
				'Tradition.id',
				'Tradition.slug',
				'Tradition.name',
				'Tradition.image_1',
				'Tradition.image_2',
				'Tradition.image_3',
				'Tradition.image_4',
				'Tradition.image_5',
				'Tradition.image_6',
				'Tradition.awning_image',
			),
			'order' => array(
				'Tradition.name' => 'ASC'
			),
		));

		$this->set(compact('traditions'));

	}

////////////////////////////////////////////////////////////

	public function admin_awning($id = null) {

		$this->Tradition->id = $id;
		if (!$this->Tradition->exists()) {
			throw new NotFoundException(__('Invalid tradition'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {

			if ($this->Tradition->save($this->request->data)) {
				$this->Session->setFlash('The tradition has been saved');
				$this->redirect(array('action' => 'view', $id));
			} else {
				$this->Session->setFlash('The tradition could not be saved. Please, try again.');
			}
		} else {
			$this->request->data = $this->Tradition->read(null, $id);
			$this->set('tradition', $this->Tradition->read(null, $id));
		}
	}

////////////////////////////////////////////////////////////

}
