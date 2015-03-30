<?php
App::uses('AppController', 'Controller');
class SubcategoriesController extends AppController {

////////////////////////////////////////////////////////////

	public function index() {
		$this->Subcategory->recursive = 0;
		$this->set('subcategories', $this->paginate());
	}

////////////////////////////////////////////////////////////

	public function view($id = null) {
		if (!$this->Subcategory->exists($id)) {
			throw new NotFoundException(__('Invalid subcategory'));
		}
		$options = array('conditions' => array('Subcategory.' . $this->Subcategory->primaryKey => $id));
		$this->set('subcategory', $this->Subcategory->find('first', $options));
	}

////////////////////////////////////////////////////////////

	public function admin_index() {

		$this->paginate = array(
			'recursive' => -1,
			'contain' => array(
				'Category',
			),
			'fields' => array(
				'Subcategory.*',
				'Category.id',
				'Category.name',
			),
			'order' => array(
				'Subcategory.name' => 'ASC'
			),
			'limit' => 100,
			'paramType' => 'querystring',
		);
		$subcategories = $this->paginate('Subcategory');
		$this->set(compact('subcategories'));

		$categories1 = $this->Subcategory->Category->find('list', array(
			'recursive' => -1,
			'order' => array(
				'Category.name' => 'ASC'
			)
		));
		$categories = array();
		foreach ($categories1 as $key => $value) {
			$categories[] = array(
				'value' => $key,
				'text' => $value,
			);
		}
		$this->set(compact('categories'));

	}

////////////////////////////////////////////////////////////

	public function admin_view($id = null) {
		if (!$this->Subcategory->exists($id)) {
			throw new NotFoundException(__('Invalid subcategory'));
		}
		$subcategory = $this->Subcategory->find('first', array(
			'contain' => array('Category'),
			'conditions' => array(
				'Subcategory.id' => $id
			)
		));
		$this->set(compact('subcategory'));

		$subsubcategories = $this->Subcategory->Subsubcategory->find('all', array(
			'conditions' => array(
				'Subsubcategory.subcategory_id' => $id
			)
		));
		$this->set(compact('subsubcategories'));

		$products = $this->Subcategory->Product->find('all', array(
			'contain' => array(
				'User',
				'Category',
				'Subcategory',
				'Subsubcategory',
			),
			'conditions' => array(
				'Product.subcategory_id' => $id
			)
		));
		$this->set(compact('products'));

	}

////////////////////////////////////////////////////////////

	public function admin_add() {
		if ($this->request->is('post')) {
			$this->Subcategory->create();
			if ($this->Subcategory->save($this->request->data)) {
				$this->Session->setFlash(__('The subcategory has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The subcategory could not be saved. Please, try again.'));
			}
		}
		$categories = $this->Subcategory->Category->find('list');
		$this->set(compact('categories'));
	}

////////////////////////////////////////////////////////////

	public function admin_edit($id = null) {
		if (!$this->Subcategory->exists($id)) {
			throw new NotFoundException(__('Invalid subcategory'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Subcategory->save($this->request->data)) {
				$this->Session->setFlash(__('The subcategory has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The subcategory could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Subcategory.' . $this->Subcategory->primaryKey => $id));
			$this->request->data = $this->Subcategory->find('first', $options);
		}
		$categories = $this->Subcategory->Category->find('list');
		$this->set(compact('categories'));
	}

////////////////////////////////////////////////////////////

	public function admin_delete($id = null) {
		$this->Subcategory->id = $id;
		if (!$this->Subcategory->exists()) {
			throw new NotFoundException(__('Invalid subcategory'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Subcategory->delete()) {
			$this->Session->setFlash(__('Subcategory deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Subcategory was not deleted'));
		$this->redirect(array('action' => 'index'));
	}

////////////////////////////////////////////////////////////

}
