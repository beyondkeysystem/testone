<?php
class ProductimageactiveShell extends Shell {

	public $uses = array('Product');

	public function main() {

		$products = $this->Product->find('all', array(
			'recursive' => -1,
			'fields' => array(
				'Product.id',
				'Product.name',
				'Product.image',
			),
		));

		$activepic = 0;
		$inactivepic = 0;

		foreach($products as $product) {

			if(file_exists(IMAGES . '/products/image/' . $product['Product']['image'])) {
				$active = 1;
				$activepic++;

			} else {
				$active = 0;
				$inactivepic++;
			}

			$d['Product']['id'] = $product['Product']['id'];
			$d['Product']['active'] = $active;

			$this->Product->save($d, false);

			//print_r($product);

			print_r($d);

		}

		$this->out(' - activepic Records: ' . $activepic . ' - ');
		$this->out(' - inactivepic Records: ' . $inactivepic . ' - ');

	}

}

