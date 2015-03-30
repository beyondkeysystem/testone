<?php
class ProductBrandShell extends Shell {

	public $uses = array('Product', 'Brand');

	public function main() {

		$brands = $this->Brand->find('all', array(
			'recursive' => -1,
			'fields' => array(
				'Brand.id',
				'Brand.name'
			),
			'conditions' => array(
				'Brand.name >' => ''
			),
			'order' => array(
				'Brand.name' => 'ASC'
			),
		));

		foreach($brands as $brand) {
			$this->Product->updateAll(array('Product.brand_id' => $brand['Brand']['id']), array('Product.brand_name' => $brand['Brand']['name']));
		}

		$branddescriptions = $this->Product->find('all', array(
			'recursive' => -1,
			'fields' => array(
				'Product.brand_id',
				'Product.brand_name',
				'Product.brand_description',
			),
			'conditions' => array(
				'Product.brand_description >' => ''
			),
			'group' => array(
				'Product.brand_id'
			),
			'order' => array(
				'Product.brand_name' => 'ASC'
			),
		));

		foreach($branddescriptions as $branddescription) {
			$data1['Brand']['id'] = $branddescription['Product']['brand_id'];
			$data1['Brand']['description'] = $branddescription['Product']['brand_description'];
			$this->Brand->save($data1, false);
		}

	}

}
