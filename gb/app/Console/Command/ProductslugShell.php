<?php
class ProductslugShell extends Shell {

	public $uses = array('Product');

	public function main() {

		$products = $this->Product->find('all', array(
			'recursive' => -1,
			'fields' => array(
				'Product.id',
				'Product.name',
			),
			'conditions' => array(
				'Product.slug' => ''
			),
			'limit' => 10000
		));

		foreach($products as $product) {
			$data['Product']['id'] = $product['Product']['id'];
			$data['Product']['slug'] = strtolower(Inflector::slug($product['Product']['name'], '-'));
			$this->Product->save($data, false);

			print_r($product);

			print_r($data);
		}

	}

}
