<?php
App::uses('AppController', 'Controller');
class UstraditionsController extends AppController {

////////////////////////////////////////////////////////////

	public function index() {
		$this->Ustradition->recursive = 0;
		$this->set('ustraditions', $this->paginate());
	}

////////////////////////////////////////////////////////////

	public function view($slug = null) {

		$ustradition = $this->Ustradition->find('first', array(
			'recursive' => -1,
			'conditions' => array(
				'Ustradition.slug' => $slug
			)
		));
		if(empty($ustradition)) {
			die('invalid region');
		}
		$this->set(compact('ustradition'));

		$ustraditions = $this->Ustradition->find('all', array(
			'recursive' => -1,
			'conditions' => array(),
			'order' => array(
				'Ustradition.name' => 'ASC'
			)
		));
		
		$this->set(compact('ustraditions'));

		$ustradition_id = $ustradition['Ustradition']['id'];

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
				'Product.name',
				'Product.slug',
				'Product.description',
				'Product.price',
				'Product.image',
				'Product.category_id',
				'User.id',
				'User.slug',
				'User.username',
			),
			'conditions' => array(
				'Product.active' => 1,
				'Product.ustradition_id' => $ustradition_id,
			),
			'limit' => 30,
			'order' => array('
				Product.id' => 'DESC'
			)
		);
		$products = $this->paginate('Product');
		$this->set(compact('products'));
		

	}

////////////////////////////////////////////////////////////

	public function admin_index() {
		$this->Ustradition->recursive = 0;
		$this->set('ustraditions', $this->paginate());
	}

////////////////////////////////////////////////////////////

//	public function admin_view($id = null) {
//		if (!$this->Ustradition->exists($id)) {
//			throw new NotFoundException(__('Invalid ustradition'));
//		}
//		$ustradition = $this->Ustradition->find('first', array(
//			'conditions' => array(
//				'Ustradition.id' => $id
//			)
//		));
//		$this->set(compact('ustradition'));
//	}
//

////////////////////////////////////////////////////////////

	public function admin_view($id = null) {
		if (!$this->Ustradition->exists($id)) {
			throw new NotFoundException(__('Invalid ustradition'));
		}
				
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Ustradition->save($this->request->data)) {
				$this->Session->setFlash(__('The ustradition has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The ustradition could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Ustradition.' . $this->Ustradition->primaryKey => $id));
			$this->request->data = $this->Ustradition->find('first', $options);
		}
		
		$ustradition = $this->Ustradition->find('first', array(
			'conditions' => array(
				'Ustradition.id' => $id
			)
		));
		
		$this->set(compact('ustradition'));
	}



////////////////////////////////////////////////////////////

	public function admin_add() {
		if ($this->request->is('post')) {
			$this->Ustradition->create();
			if ($this->Ustradition->save($this->request->data)) {
				$this->Session->setFlash(__('The ustradition has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The ustradition could not be saved. Please, try again.'));
			}
		}
	}

////////////////////////////////////////////////////////////

	public function admin_edit($id = null) {
		if (!$this->Ustradition->exists($id)) {
			throw new NotFoundException(__('Invalid ustradition'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Ustradition->save($this->request->data)) {
				$this->Session->setFlash(__('The ustradition has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The ustradition could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Ustradition.' . $this->Ustradition->primaryKey => $id));
			$this->request->data = $this->Ustradition->find('first', $options);
		}
	}

////////////////////////////////////////////////////////////

	public function admin_delete($id = null) {
		$this->Ustradition->id = $id;
		if (!$this->Ustradition->exists()) {
			throw new NotFoundException(__('Invalid ustradition'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Ustradition->delete()) {
			$this->Session->setFlash(__('Ustradition deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Ustradition was not deleted'));
		$this->redirect(array('action' => 'index'));
	}

////////////////////////////////////////////////////////////

}
