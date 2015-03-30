<?php
class CountShell extends Shell {

////////////////////////////////////////////////////////////

	public $uses = array('User', 'Product', 'Category', 'Subcategory', 'Subsubcategory');

////////////////////////////////////////////////////////////

	public function main() {

		$this->out('Start');

		$this->CountReset('User', 'product_count');
		$this->CountReset('Category', 'product_count');
		$this->CountReset('Category', 'subcategory_count');
		$this->CountReset('Subcategory', 'product_count');
		$this->CountReset('Subcategory', 'subsubcategory_count');
		$this->CountReset('Subsubcategory', 'product_count');

		$this->usersProductCount();

		$this->categoryProductCount();

		$this->categorySubcategoryCount();

		$this->subcategoryProductCount();

		$this->subcategorySubsubcategoryCount();

		$this->subsubcategoryProductCount();

		$this->out('End');

	}

////////////////////////////////////////////////////////////

	public function CountReset($model, $field, $value = 0) {
		$this->$model->updateAll(
			array($model . '.' . $field => $value),
			array($model . '.' . $field . ' !=' => $value)
		);
	}

////////////////////////////////////////////////////////////

	public function usersProductCount() {
		$users = $this->User->find('all');
		foreach($users as $user) {
			$product_count = $this->Product->find('count', array(
				'conditions' => array(
					//'Product.active' => 1,
					'Product.user_id' => $user['User']['id'],
				)
			));
			$this->out($user['User']['id']);
			$this->out($user['User']['name']);
			$this->out($product_count);
			$this->out('==========');
			$u['User']['id'] = $user['User']['id'];
			$u['User']['product_count'] = $product_count;
			$this->User->save($u, false);
		}
	}

////////////////////////////////////////////////////////////

	public function categoryProductCount() {
		$categories = $this->Category->find('all');
		foreach($categories as $category) {
			$product_count = $this->Product->find('count', array(
				'conditions' => array(
					//'Product.active' => 1,
					'Product.category_id' => $category['Category']['id'],
				)
			));
			$this->out($category['Category']['id']);
			$this->out($category['Category']['name']);
			$this->out($product_count);
			$this->out('==========');
			$c['Category']['id'] = $category['Category']['id'];
			$c['Category']['product_count'] = $product_count;
			$this->Category->save($c, false);
		}
	}

////////////////////////////////////////////////////////////

	public function subcategoryProductCount() {
		$subcategories = $this->Subcategory->find('all');
		foreach($subcategories as $subcategory) {
			$product_count = $this->Product->find('count', array(
				'conditions' => array(
					//'Product.active' => 1,
					'Product.subcategory_id' => $subcategory['Subcategory']['id'],
				)
			));
			$this->out($subcategory['Subcategory']['id']);
			$this->out($subcategory['Subcategory']['name']);
			$this->out($product_count);
			$this->out('==========');
			$s['Subcategory']['id'] = $subcategory['Subcategory']['id'];
			$s['Subcategory']['product_count'] = $product_count;
			$this->Subcategory->save($s, false);
		}
	}

////////////////////////////////////////////////////////////

	public function subsubcategoryProductCount() {
		$subsubcategories = $this->Subsubcategory->find('all');
		foreach($subsubcategories as $subsubcategory) {
			$product_count = $this->Product->find('count', array(
				'conditions' => array(
					//'Product.active' => 1,
					'Product.subsubcategory_id' => $subsubcategory['Subsubcategory']['id'],
				)
			));
			$this->out($subsubcategory['Subsubcategory']['id']);
			$this->out($subsubcategory['Subsubcategory']['name']);
			$this->out($product_count);
			$this->out('==========');
			$ss['Subsubcategory']['id'] = $subsubcategory['Subsubcategory']['id'];
			$ss['Subsubcategory']['product_count'] = $product_count;
			$this->Subsubcategory->save($ss, false);
		}
	}

////////////////////////////////////////////////////////////

	public function categorySubcategoryCount() {
		$categories = $this->Category->find('all');
		foreach($categories as $category) {
			$subcategory_count = $this->Subcategory->find('count', array(
				'conditions' => array(
					'Subcategory.category_id' => $category['Category']['id'],
				)
			));
			$this->out($category['Category']['id']);
			$this->out($category['Category']['name']);
			$this->out($subcategory_count);
			$this->out('==========');
			$cs['Category']['id'] = $category['Category']['id'];
			$cs['Category']['subcategory_count'] = $subcategory_count;
			$this->Category->save($cs, false);
		}
	}

////////////////////////////////////////////////////////////

	public function subcategorySubsubcategoryCount() {
		$subcategories = $this->Subcategory->find('all');
		foreach($subcategories as $subcategory) {
			$subsubcategory_count = $this->Subsubcategory->find('count', array(
				'conditions' => array(
					'Subsubcategory.subcategory_id' => $subcategory['Subcategory']['id'],
				)
			));
			$this->out($subcategory['Subcategory']['id']);
			$this->out($subcategory['Subcategory']['name']);
			$this->out($subsubcategory_count);
			$this->out('==========');
			$css['Subcategory']['id'] = $subcategory['Subcategory']['id'];
			$css['Subcategory']['subsubcategory_count'] = $subsubcategory_count;
			$this->Subcategory->save($css, false);
		}
	}

////////////////////////////////////////////////////////////

}
