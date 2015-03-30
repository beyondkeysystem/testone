<?php

class AclGroupsController extends AclAppController {

/**
 * name
 *
 * @var string
 */
	public $name = 'AclGroups';

/**
 * uses
 *
 * @var array
 */
	public $uses = array('Acl.AclAro','Role');

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
		if ($this->action == 'admin_generate') {
			//$this->Security->csrfCheck = false;
		}
	}

/**
 * admin_index
 */
	public function admin_index() {
		$this->pageTitle = 'Systeminställningar';
            $this->set('blViewCaption','System');
            $aro = new Aro();

	    $ugrps = $this->Role->find('all');
            $this->set('usergroups',$ugrps);
            $this->render();
	}

/**
 * admin_add
 */
	public function admin_add() {
		 $this->set('blViewCaption','Ange namn på ny grupp!');
		$this->set('title_for_layout', __('Add Action'));

		 if (isset($this->params['data']['blForm']['cancel_create'])) {
                  $this->redirect('/admin/acl/acl_groups');
                  exit;
            }

		if (!empty($this->request->data)) {
			$this->Acl->Aco->create();

			// if parent_id is null, assign 'controllers' as parent
			 if (isset($this->params['data']['blForm']['create_usergroup'])) {
				$this->request->data['Role']['title'] = $this->request->data['Role']['alias'];
				$this->Role->save($this->request->data['Role']);
				
				$foreign_key = $this->Role->getLastInsertId();
				
				$this->request->data['Aro']['model'] = 'Role';
				$this->request->data['Aro']['foreign_key'] = $foreign_key;
				$this->request->data['Aro']['alias'] = $this->request->data['Role']['alias'];
				$this->request->data['Aro']['rght'] = $this->request->data['Aro']['lft']+1;
				$this->Acl->Aro->save($this->request->data['Aro']);
				 $this->redirect('/admin/acl/acl_groups');	
			}
		}


		$controllersAco = $this->Acl->Aro->find('first', array(
			'order' => array('id DESC'),
			'limit' =>1
		));
		$this->set('lft',$controllersAco['Aro']['rght']+1);
		
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
		if ($this->Role->delete($id)) {
			$this->Acl->Aro->query("delete from aros where foreign_key='".$id."'")	;
			$this->redirect('/admin/acl/acl_groups');
		}
	}


}
