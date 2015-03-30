<?php
class WeightShell extends Shell {

////////////////////////////////////////////////////////////

	public $uses = array('Product');

////////////////////////////////////////////////////////////

	public function main() {

		$this->out('Start');

		$productsweights = $this->Product->find('all', array(
			'fields' => array(
				'Product.weight_unit',
			),
			'group' => array(
				'Product.weight_unit',
			),
			'order' => array(
				'Product.weight_unit' => 'ASC'
			),

		));

//		$this->out(print_r($productsweights));

//		foreach ($productsweights as $product) {
//			$this->out($product['Product']['weight_unit']);
//		}

		$products = $this->Product->find('all', array(
			'fields' => array(
				'Product.id',
				'Product.name',
				'Product.weight_unit',
				'Product.weight',
				'Product.shipping_weight',
			),
			'conditions' => array(
				'Product.weight_unit' => 'oz',
				'Product.weight >' => '',
			)
		));

		foreach ($products as $product) {
			$this->out(print_r($product));

			$shipping_weight = number_format($product['Product']['weight'] / 16, 2);

			$this->out('new weight (lbs) = ' . $shipping_weight);

			$this->out("\n\n=================\n\n");

			$d['Product']['id'] = $product['Product']['id'];
			$d['Product']['shipping_weight'] = $shipping_weight;
			$this->Product->save($d, false);

		}

		$this->out('End');

	}

////////////////////////////////////////////////////////////

}
