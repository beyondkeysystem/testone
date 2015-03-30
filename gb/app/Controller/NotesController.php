<?php
App::uses('AppController', 'Controller');
class NotesController extends AppController {

////////////////////////////////////////////////////////////

	public function admin_index() {
		$this->paginate = array(
			'recursive' => 0,
			'order' => array(
				'Note.active' => 'DESC',
				'Note.priority' => 'ASC',
				'Note.id' => 'DESC',
				
			),
			'conditions' => array(
				'NOT' => array(
					'Note.priority' => array('A','D'))
			),
			
		);
		$notes = $this->paginate('Note');
		$this->set(compact('notes'));
	}
	
////////////////////////////////////////////////////////////

	public function admin_discuss() {
		$this->paginate = array(
			'recursive' => 0,
			'order' => array(
				'Note.id' => 'DESC',
			),
			'conditions' => array(
				'Note.priority' => array('D')
			),
			
		);
		$notes = $this->paginate('Note');
		$this->set(compact('notes'));
	}
////////////////////////////////////////////////////////////

	public function admin_addressed() {
		$this->paginate = array(
			'recursive' => 0,
			'order' => array(
				'Note.id' => 'DESC',
			),
			'conditions' => array(
				'Note.priority' => array('A')
			),
			
		);
		$notes = $this->paginate('Note');
		$this->set(compact('notes'));
	}


	public function admin_view($id = null) {
		$this->Note->id = $id;
		if (!$this->Note->exists()) {
			throw new NotFoundException('Invalid note');
		}
		$this->set('note', $this->Note->read(null, $id));
	}

////////////////////////////////////////////////////////////

	public function admin_add() {
		if ($this->request->is('post')) {
			$this->Note->create();
			if ($this->Note->save($this->request->data)) {
				$this->Session->setFlash('The note has been saved');
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash('The note could not be saved. Please, try again.');
			}
		}
		
		$priorities = $this->Note->priorities();
		$authors = $this->Note->authors();
		$this->set(compact('priorities','authors'));
		
	}
	
	
	

////////////////////////////////////////////////////////////

	public function admin_edit($id = null) {
		$this->Note->id = $id;
		if (!$this->Note->exists()) {
			throw new NotFoundException('Invalid note');
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Note->save($this->request->data)) {
				$this->Session->setFlash('The note has been saved');
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash('The note could not be saved. Please, try again.');
			}
		} else {
			$this->request->data = $this->Note->read(null, $id);
		}
		
		$priorities = $this->Note->priorities();
		$authors = $this->Note->authors();
		$this->set(compact('priorities','authors'));
	}

////////////////////////////////////////////////////////////

	public function admin_delete($id = null) {
		if (!$this->request->is('post')) {
			throw new MethodNotAllowedException();
		}
		$this->Note->id = $id;
		if (!$this->Note->exists()) {
			throw new NotFoundException('Invalid note');
		}
		if ($this->Note->delete()) {
			$this->Session->setFlash('Note deleted');
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash('Note was not deleted');
		$this->redirect(array('action' => 'index'));
	}

////////////////////////////////////////////////////////////

}
