<?php
App::uses('AppController', 'Controller');
class RecipesController extends AppController {

///////////////////////////////////////////////////////////

	public function index() {

		$subDomain = $this->_getSubDomain();
		if($subDomain != 'www') {
			$conditions = array(
				'User.slug' => $subDomain
			);
		}

		$this->loadModel('User');
		$user = $this->User->find('first', array(
			'recursive' => -1,
			'conditions' => array(
				'User.slug' => $subDomain,
			)
		));
		if(empty($user)) {
			$this->redirect(array('action' => 'all'));
		}
		$this->set(compact('user'));

		$this->paginate = array(
			'recursive' => 0,
			'fields' => array(
				'Recipe.name',
				'Recipe.slug',
				'Recipe.image_1',
				'Recipe.image_caption_1',
				'Recipe.created',
				'User.name',
				'User.slug',
				'Recipescategory.name',
				'Tradition.name',
				'Ustradition.name',
			),
			'conditions' => array(
				$conditions
			),
			'order' => array(
				'Recipescategory.name' => 'ASC',
			),
			'limit' => 20
		);
		$recipes = $this->paginate();
		$this->set(compact('recipes'));
	}

////////////////////////////////////////////////////////////

	public function all() {

		$recipescategories = $this->Recipe->find('list', array(
			'recursive' => -1,
			'contain' => array(
				'Recipescategory',
			),
			'fields' => array(
				'Recipescategory.slug',
				'Recipescategory.name'
			),
			'conditions' => array(
				'Recipe.active' => 1
			),
			'group' => array(
				'Recipe.recipescategory_id',
				//'Tradition.tradition_id',
				//'Ustradition.ustradition_id',
			),
			'order' => array(
				'Recipescategory.name'
			)
		));
		$this->set(compact('recipescategories','traditions','ustraditions'));


		$vendors = $this->Recipe->find('list', array(
			'recursive' => 1,
			'fields' => array(
				'User.slug',
				'User.name'
			),
			'conditions' => array(
				'Recipe.active' => 1,
				'User.slug >' => ''
			),
			'group' => array(
				'User.id'
			),
			'order' => array(
				'User.slug' => 'ASC'
			)
		));

		$this->set(compact('vendors'));

		$conditions[] = array(
			'Recipe.active' => 1,
		);

		if(isset($this->params['named']['category']) ) {

			if (!array_key_exists($this->params['named']['category'], $recipescategories)) {
				$this->redirect(array('action' => 'index'));
			}

			$conditions[] = array('Recipescategory.slug' => $this->params['named']['category']);

			$recipescategory_selected = $this->params['named']['category'];
		} else {
			$recipescategory_selected = '';
		}
		$this->set(compact('recipescategory_selected'));


		if(isset($this->params['named']['vendor']) ) {

			if (!array_key_exists($this->params['named']['vendor'], $vendors)) {
				$this->redirect(array('action' => 'index'));
			}

			$conditions[] = array('User.slug' => $this->params['named']['vendor']);

			$vendor_selected = $this->params['named']['vendor'];
		} else {
			$vendor_selected = '';
		}
		$this->set(compact('vendor_selected'));

		$this->paginate = array(
			'recursive' => 0,
			'fields' => array(
				'Recipe.name',
				'Recipe.slug',
				'Recipe.image_1',
				'Recipe.image_caption_1',
				'Recipe.created',
				'User.name',
				'User.slug',
				'Recipescategory.name',
			),
			'conditions' => array(
				$conditions
			),
			'order' => array(
				'Recipescategory.name' => 'ASC',
				'Recipe.name' => 'ASC'
			),
			'limit' => 20
		);
		$recipes = $this->paginate();
		$this->set(compact('recipes'));

	}

////////////////////////////////////////////////////////////

	public function view($slug) {
		$recipe = $this->Recipe->find('first', array(
			'recursive' => -1,
			'conditions' => array(
				'Recipe.slug' => $slug
			)
		));
		if (empty($recipe)) {
			$this->Session->setFlash('Invalid recipe');
			$this->redirect(array('action' => 'index'));
		}
		$this->set(compact('recipe'));

		$subDomain = $this->_getSubDomain();
		if($subDomain != 'www') {
			$conditions = array(
				'User.slug' => $subDomain
			);
		}

		$this->loadModel('User');
		$user = $this->User->find('first', array(
			'recursive' => -1,
			'conditions' => array(
				'User.slug' => $subDomain,
			)
		));
		if(empty($user)) {
			$this->redirect(array('action' => 'all'));
		}
		$this->set(compact('user'));

		// Get recipe list find by vendors
		$recipelist = $this->Recipe->find('all', array(
			'recursive' => 0,
			'fields' => array(
				'Recipe.name',
				'Recipe.slug',
				'Recipescategory.name',
				'User.slug'
			),
			'conditions' => array(
				'User.slug' => $subDomain
			)
		));
		if(empty($recipelist)) {
			$this->redirect(array('action' => 'all'));
		}
		$this->set(compact('recipelist'));
	}

////////////////////////////////////////////////////////////

	public function admin_reset() {
		$this->Session->delete('Recipe');
		$this->redirect(array('action' => 'index'));
	}

////////////////////////////////////////////////////////////

	public function admin_index() {

		if ($this->request->is('post')) {

			if(!empty($this->request->data['Recipe']['name'])) {
				$filter = $this->request->data['Recipe']['filter'];
				$this->Session->write('Recipe.filter', $filter);
				$name = $this->request->data['Recipe']['name'];
				$this->Session->write('Recipe.name', $name);
				$conditions[] = array(
					'Recipe.' . $filter . ' LIKE' => '%' . $name . '%'
				);
			} else {
				$this->Session->write('Recipe.filter', '');
				$this->Session->write('Recipe.name', '');
			}

			$this->Session->write('Recipe.conditions', $conditions);
			$this->redirect(array('action' => 'index'));

		}

		$all = array(
			'user_id' => '',
			'name' => '',
			'filter' => '',
			'conditions' => ''
		);


		if($this->Session->check('Recipe')) {
			$all = $this->Session->read('Recipe');
		}

		$this->set(compact('all'));


		$this->paginate = array(
			'recursive' => -1,
			'contain' => array(
				'User',
				'Recipescategory',
				'Tradition',
				'Ustradition',
			),
			'conditions' => $all['conditions'],
			'limit' => 50,

			'fields' => array(
				'Recipe.*',
				'User.id',
				'User.name',
				'Recipescategory.id',
				'Recipescategory.name',
				'Tradition.id',
				'Tradition.name',
				'Ustradition.id',
				'Ustradition.name',
			),
			'order' => array(
				'Recipe.modified' => 'DESC',
			),
			'paramType' => 'querystring',
		);
		$recipes = $this->paginate('Recipe');

		$this->set(compact('recipes'));
	}
////////////////////////////////////////////////////////////

	public function admin_view($id = null) {


		if (isset($this->request->data['Recipe']['image_type'])) {

			$slug = $this->request->data['Recipe']['slug'];
			$image = $this->request->data['Recipe']['slug'] . '.jpg';

			$type = $this->request->data['Recipe']['image_type'];

			$targetdir = IMAGES . 'recipes/' . $type;

			$this->Image = $this->Components->load('Image');

			$upload = $this->Image->upload($this->request->data['Recipe']['image']['tmp_name'], $targetdir, $image);

			if($upload == 'Success') {
				$this->Recipe->id = $this->request->data['Recipe']['id'];
				$this->Recipe->saveField($type, $image);
				$uploadedfile = $targetdir . '/' . $image;
				$this->Image->resample($uploadedfile, IMAGES . '/recipes/' . $type . '/', $image, 400, 400, 1, 0);
				//$this->Image->resample($uploadedfile, IMAGES . '/user_image/', $image, 200, 200, 1, 0);
			}

			$this->Session->setFlash($upload);
			$this->redirect($this->referer());
		}

		$this->Recipe->id = $id;
		if (!$this->Recipe->exists()) {
			throw new NotFoundException(__('Invalid recipe'));
		}

		$recipe = $this->Recipe->find('first', array(
			'contain' => array(
				'User',
				'Recipescategory',
				'Tradition',
				'Ustradition',
			),
			'conditions' => array(
				'Recipe.id' => $id
			)
		));
		$this->set(compact('recipe'));
	}

////////////////////////////////////////////////////////////

	public function admin_add() {
		if ($this->request->is('post')) {
			$this->Recipe->create();
			if ($this->Recipe->save($this->request->data)) {
				$this->Session->setFlash(__('The recipe has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The recipe could not be saved. Please, try again.'));
			}
		}
		$users = $this->Recipe->User->find('list', array(
			'conditions' => array(
				'User.active' => 1,
				'User.level' => 'vendor',
			),
			'order' => array(
				'User.name' => 'ASC'
			)
		));
		$recipescategories = $this->Recipe->Recipescategory->find('list', array(
			'order' => array(
				'Recipescategory.name' => 'ASC'
			)
		));

		$traditions = $this->Recipe->Tradition->find('list', array(
			'order' => array(
				'Tradition.name' => 'ASC'
			)
		));
		$ustraditions = $this->Recipe->Ustradition->find('list', array(
			'order' => array(
				'Ustradition.name' => 'ASC'
			)
		));

		$this->set(compact('users', 'recipescategories','traditions','ustraditions'));
	}

////////////////////////////////////////////////////////////

	public function admin_edit($id = null) {
		$this->Recipe->id = $id;
		if (!$this->Recipe->exists()) {
			throw new NotFoundException('Invalid recipe');
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Recipe->save($this->request->data)) {
				$this->Session->setFlash('The recipe has been saved');
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash('The recipe could not be saved. Please, try again.');
			}
		} else {
			$this->request->data = $this->Recipe->read(null, $id);
		}
		$users = $this->Recipe->User->find('list', array(
			'conditions' => array(
				'User.active' => 1,
				'User.level' => 'vendor',
			),
			'order' => array(
				'User.name' => 'ASC'
			)
		));
		$recipescategories = $this->Recipe->Recipescategory->find('list', array(
			'order' => array(
				'Recipescategory.name' => 'ASC'
			)
		));

		$traditions = $this->Recipe->Tradition->find('list', array(
			'order' => array(
				'Tradition.name' => 'ASC'
			)
		));

		$ustraditions = $this->Recipe->Ustradition->find('list', array(
			'order' => array(
				'Ustradition.name' => 'ASC'
			)
		));


		$this->set(compact('users', 'recipescategories','traditions','ustraditions'));
	}

////////////////////////////////////////////////////////////

	public function admin_delete($id = null) {
		$this->Recipe->id = $id;
		if (!$this->Recipe->exists()) {
			throw new NotFoundException(__('Invalid recipe'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Recipe->delete()) {
			$this->Session->setFlash('Recipe deleted');
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash('Recipe was not deleted');
		$this->redirect(array('action' => 'index'));
	}

////////////////////////////////////////////////////////////

}