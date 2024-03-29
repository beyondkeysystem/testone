<?php

class AclActionsController extends AclAppController {

/**
 * name
 *
 * @var string
 */
	public $name = 'AclActions';

/**
 * uses
 *
 * @var array
 */
	public $uses = array('Acl.AclAco');

/**
 * components
 *
 * @var array
 */
	public $components = array('Acl.AclGenerate');

/**
 * beforeFilter
 *
 * @return void
 */
	public function beforeFilter() {
		parent::beforeFilter();
		
	}

/**
 * admin_index
 */
	public function admin_index() {
		$this->set('title_for_layout', __('Actions'));

		$conditions = array(
			'parent_id !=' => null,
			//'model' => null,
			'foreign_key' => null,
			'alias !=' => null,
		);
		$this->set('acos', $this->Acl->Aco->generateTreeList($conditions, '{n}.Aco.id', '{n}.Aco.alias'));
	}

/**
 * admin_add
 */
	public function admin_add() {
		$this->set('title_for_layout', __('Add Action'));

		if (!empty($this->request->data)) {
			$this->Acl->Aco->create();

			// if parent_id is null, assign 'controllers' as parent
			if ($this->request->data['Aco']['parent_id'] == null) {
				$this->request->data['Aco']['parent_id'] = 1;
				$acoType = 'Controller';
			} else {
				$acoType = 'Action';
			}

			if ($this->Acl->Aco->save($this->request->data['Aco'])) {
				$this->Session->setFlash(sprintf(__('The %s has been saved'), $acoType), 'default', array('class' => 'success'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(sprintf(__('The %s could not be saved. Please, try again.'), $acoType), 'default', array('class' => 'error'));
			}
		}

		$conditions = array(
			//'model' => null,
		);
		$controllersAco = $this->Acl->Aco->find('first', array(
			'conditions' => array(
				'alias' => 'controllers',
				'parent_id' => null,
				//'model' => null,
				'foreign_key' => null,
			),
		));
		if (isset($controllersAco['Aco']['id'])) {
			$conditions['parent_id'] = $controllersAco['Aco']['id'];
		}
		$acos = $this->Acl->Aco->generateTreeList($conditions, '{n}.Aco.id', '{n}.Aco.alias');
		$this->set(compact('acos'));
	}

/**
 * admin_edit
 *
 * @param integer $id
 */
	public function admin_edit($id = null) {
		$this->set('title_for_layout', __('Edit Action'));

		if (!$id && empty($this->request->data)) {
			$this->Session->setFlash(__('Invalid Action'), 'default', array('class' => 'error'));
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->request->data)) {
			if ($this->Acl->Aco->save($this->request->data['Aco'])) {
				$this->Session->setFlash(__('The Action has been saved'), 'default', array('class' => 'success'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The Action could not be saved. Please, try again.'), 'default', array('class' => 'error'));
			}
		}
		if (empty($this->request->data)) {
			$this->request->data = $this->Acl->Aco->read(null, $id);
		}

		$conditions = array(
			//'model' => null,
		);
		$controllersAco = $this->Acl->Aco->find('first', array(
			'conditions' => array(
				'alias' => 'controllers',
				'parent_id' => null,
				//'model' => null,
				'foreign_key' => null,
			),
		));
		if (isset($controllersAco['Aco']['id'])) {
			$conditions['parent_id'] = $controllersAco['Aco']['id'];
		}
		$acos = $this->Acl->Aco->generateTreeList($conditions, '{n}.Aco.id', '{n}.Aco.alias');
		$this->set(compact('acos'));
	}

/**
 * admin_delete
 *
 * @param integer $id
 */
	public function admin_delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for Action'), 'default', array('class' => 'error'));
			$this->redirect(array('action' => 'index'));
		}
		if ($this->Acl->Aco->delete($id)) {
			$this->Session->setFlash(__('Action deleted'), 'default', array('class' => 'success'));
			$this->redirect(array('action' => 'index'));
		}
	}

/**
 * admin_move
 *
 * @param integer $id
 * @param string $direction
 * @param string $step
 */
	public function admin_move($id, $direction = 'up', $step = '1') {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for Action'), 'default', array('class' => 'error'));
			$this->redirect('admin/acl/acl_actions');
		}
		if ($direction == 'up') {
			if ($this->Acl->Aco->moveUp($id)) {
				$this->Session->setFlash(__('Action moved up'), 'default', array('class' => 'success'));
				$this->redirect('admin/acl/acl_actions');
			}
		} else {
			if ($this->Acl->Aco->moveDown($id)) {
				$this->Session->setFlash(__('Action moved down'), 'default', array('class' => 'success'));
				$this->redirect('/admin/acl/acl_actions');
			}
		}
	}

/**
 * admin_generate
 */
	public function admin_generate() {
		$aco =& $this->Acl->Aco;
		$root = $aco->node('controllers');
		if (!$root) {
			$aco->create(array(
				'parent_id' => null,
				'model' => null,
				'alias' => 'controllers',
			));
			$root = $aco->save();
			$root['Aco']['id'] = $aco->id;
		} else {
			$root = $root[0];
		}

		$created = array();
		$controllerPaths = $this->AclGenerate->listControllers();
		foreach ($controllerPaths as $controllerName => $controllerPath) {
			$controllerNode = $aco->node('controllers/' . $controllerName);
			if (!$controllerNode) {
				$aco->create(array(
					'parent_id' => $root['Aco']['id'],
					'model' => null,
					'alias' => $controllerName,
				));
				if ($controllerNode = $aco->save()) {
					$controllerNode['Aco']['id'] = $aco->id;
					$created[] = $controllerName;
				}
			} else {
				$controllerNode = $controllerNode[0];
			}

			$methods = $this->AclGenerate->listActions($controllerName, $controllerPath);
			foreach ($methods as $method) {
				$methodNode = $aco->node('controllers/' . $controllerName . '/' . $method);
				if (!$methodNode) {
					$aco->create(array(
						'parent_id' => $controllerNode['Aco']['id'],
						'model' => null,
						'alias' => $method,
					));
					if ($methodNode = $aco->save()) {
						$created[] = $controllerName . ' . ' . $method;
					}
				}
			}
		}
		$this->Session->setFlash(__('Created %d new permissions', count($created)), 'default', array('acosCreated' => $created));
		print_r($this->params['named']);die;
		if (isset($this->params['named']['permissions'])) {
			$this->redirect(array('plugin' => 'acl', 'controller' => 'acl_permissions', 'action' => 'index'));
		} else {
			$this->redirect(array('action' => 'index'));
		}
	}


	public function admin_generate1() {
		$aco =& $this->Acl->Aco;
		$root = $aco->node('controllers');
		if (!$root) {
			$aco->create(array(
				'parent_id' => null,
				'model' => null,
				'alias' => 'controllers',
			));
			$root = $aco->save();
			$root['Aco']['id'] = $aco->id;
		} else {
			$root = $root[0];
		}

		$created = array();
		$controllerPaths = $this->AclGenerate->listControllers();
		foreach ($controllerPaths as $controllerName => $controllerPath) {
			$controllerNode = $aco->node('controllers/' . $controllerName);
		
			if (!$controllerNode) {
				$controllerNode['Aco']['id'] = $aco->id;
				$created[$controllerName]['controller'] = $controllerName;
			} else {
				$controllerNode = $controllerNode[0];
			}
			
			$methods = $this->AclGenerate->listActions($controllerName, $controllerPath);
			foreach ($methods as $method) {
				$methodNode = $aco->node('controllers/' . $controllerName . '/' . $method);
				if (!$methodNode) {
					$created[$controllerName]['action'][]= $method;
				}
			}
		}
		echo "<pre>";print_r($created);die;
	}


}
