<?php
App::uses('AppController', 'Controller');
class SubsubcategoriesController extends AppController {

////////////////////////////////////////////////////////////

	public function index() {
		$this->Subsubcategory->recursive = 0;
		$this->set('subsubcategories', $this->paginate());
	}

////////////////////////////////////////////////////////////

	public function view($id = null) {
		if (!$this->Subsubcategory->exists($id)) {
			throw new NotFoundException(__('Invalid subsubcategory'));
		}
		$options = array('conditions' => array('Subsubcategory.' . $this->Subsubcategory->primaryKey => $id));
		$this->set('subsubcategory', $this->Subsubcategory->find('first', $options));
	}

////////////////////////////////////////////////////////////

	public function admin_index() {

		$this->paginate = array(
			'recursive' => -1,
			'contain' => array(
				'Subcategory',
			),
			'fields' => array(
				'Subsubcategory.*',
				'Subcategory.id',
				'Subcategory.name',
			),
			'order' => array(
				'Subsubcategory.name' => 'ASC'
			),
			'limit' => 100,
			'paramType' => 'querystring',
		);
		$subsubcategories = $this->paginate('Subsubcategory');
		$this->set(compact('subsubcategories'));

		$subcategories1 = $this->Subsubcategory->Subcategory->find('list', array(
			'recursive' => -1,
			'order' => array(
				'Subcategory.name' => 'ASC'
			)
		));
		$subcategories = array();
		foreach ($subcategories1 as $key => $value) {
			$subcategories[] = array(
				'value' => $key,
				'text' => $value,
			);
		}
		$this->set(compact('subcategories'));

	}

////////////////////////////////////////////////////////////

	public function admin_view($id = null) {
		if (!$this->Subsubcategory->exists($id)) {
			throw new NotFoundException(__('Invalid subsubcategory'));
		}

		$subsubcategory = $this->Subsubcategory->find('first', array(
			'contain' => array('Subcategory'),
			'conditions' => array(
				'Subsubcategory.id' => $id
			)
		));

		$this->set(compact('subsubcategory'));

		$products = $this->Subsubcategory->Product->find('all', array(
			'contain' => array(
				'User',
				'Category',
				'Subcategory',
				'Subsubcategory',
			),
			'conditions' => array(
				'Product.subsubcategory_id' => $id
			)
		));
		$this->set(compact('products'));

	}

////////////////////////////////////////////////////////////

	public function admin_add() {
		if ($this->request->is('post')) {
			$this->Subsubcategory->create();
			if ($this->Subsubcategory->save($this->request->data)) {
				$this->Session->setFlash(__('The subsubcategory has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The subsubcategory could not be saved. Please, try again.'));
			}
		}
		$subcategories = $this->Subsubcategory->Subcategory->find('list');
		$this->set(compact('subcategories'));
	}

////////////////////////////////////////////////////////////

	public function admin_edit($id = null) {
		if (!$this->Subsubcategory->exists($id)) {
			throw new NotFoundException(__('Invalid subsubcategory'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Subsubcategory->save($this->request->data)) {
				$this->Session->setFlash(__('The subsubcategory has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The subsubcategory could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Subsubcategory.id' => $id));
			$this->request->data = $this->Subsubcategory->find('first', $options);
		}
		$subcategories = $this->Subsubcategory->Subcategory->find('list');
		$this->set(compact('subcategories'));
	}

////////////////////////////////////////////////////////////

	public function admin_delete($id = null) {
		$this->Subsubcategory->id = $id;
		if (!$this->Subsubcategory->exists()) {
			throw new NotFoundException(__('Invalid subsubcategory'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Subsubcategory->delete()) {
			$this->Session->setFlash(__('Subsubcategory deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Subsubcategory was not deleted'));
		$this->redirect(array('action' => 'index'));
	}

////////////////////////////////////////////////////////////

}
