<?php
App::uses('AppController', 'Controller');
class ProjectsController extends AppController {

////////////////////////////////////////////////////////////

	public function admin_index() {
		$this->Project->recursive = 0;
		$this->set('Projects', $this->paginate());
		
		$projectcategories = $this->Project->Projectcategory->find('list', array(
			'order' => array(
				'Projectcategory.name' => 'ASC'
			)
		));
		
		$project = $this->Project->find('list', array(
			'order' => array(
				'Project.modified' => 'DESC'
			)
		));

		$this->set(compact('projects', 'projectcategories'));
		
		
	}

////////////////////////////////////////////////////////////

	public function admin_view($id = null) {
		$this->Project->id = $id;
		if (!$this->Project->exists()) {
			throw new NotFoundException(__('Invalid Project'));
		}
		$this->set('Project', $this->Project->read(null, $id));
	}

////////////////////////////////////////////////////////////

	public function admin_add() {
		if ($this->request->is('post')) {
			$this->Project->create();
			if ($this->Project->save($this->request->data)) {
				$this->Session->setFlash(__('The Project has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The Project could not be saved. Please, try again.'));
			}
		}
		
		$projectcategories = $this->Project->Projectcategory->find('list', array(
			'projectcategory' => array(
				'Projectcategory.id' => 'ASC'
			)
		));
		
		$states = $this->Project->states();
		$sources = $this->Project->sources();
		$persons = $this->Project->persons();
		$this->set(compact('projectcategories','sources', 'states','persons'));
				
	}

////////////////////////////////////////////////////////////

	public function admin_edit($id = null) {		
		$this->Project->id = $id;
		
		if ($this->request->is('post') || $this->request->is('put')) {
			
			if ($this->Project->save($this->request->data)) {
				$this->Session->setFlash(__('The Project has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The Project could not be saved. Please, try again.'));
			}
		} else {
			$this->request->data = $this->Project->read(null, $id);
		}
		
		$projectcategories = $this->Project->Projectcategory->find('list', array(
			'projectcategory' => array(
				'Projectcategory.id' => 'ASC'
			)
		));
		
		$states = $this->Project->states();
		$sources = $this->Project->sources();
		$persons = $this->Project->persons();
		$this->set(compact('projectcategories','sources', 'states','persons'));
	}
		
////////////////////////////////////////////////////////////

	public function admin_delete($id = null) {
		if (!$this->request->is('post')) {
			throw new MethodNotAllowedException();
		}
		$this->Project->id = $id;
		if (!$this->Project->exists()) {
			throw new NotFoundException(__('Invalid Project'));
		}
		if ($this->Project->delete()) {
			$this->Session->setFlash(__('Project deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Project was not deleted'));
		$this->redirect(array('action' => 'index'));
	}

////////////////////////////////////////////////////////////

}