<?php
class ImagerenameShell extends Shell {

	public $uses = array('Product');

	public function main() {

		$products = $this->Product->find('all', array(
			'recursive' => -1,
			'fields' => array(
				'Product.id',
				'Product.name',
				'Product.image',
				'Product.image_1',
				'Product.image_2',
				'Product.image_3',
				'Product.image_4',
				'Product.image_5',
			),
			'limit' => 10000
		));

		foreach($products as $product) {

			$newname = $product['Product']['id'] . '.jpg';

			copy(IMAGES . 'products/' . $product['Product']['image'], IMAGES . '/productsnew/' . $newname);

			copy(IMAGES . 'products/' . $product['Product']['image_1'], IMAGES . '/productsnew1/' . $newname);
			copy(IMAGES . 'products/' . $product['Product']['image_2'], IMAGES . '/productsnew2/' . $newname);
			copy(IMAGES . 'products/' . $product['Product']['image_3'], IMAGES . '/productsnew3/' . $newname);
			copy(IMAGES . 'products/' . $product['Product']['image_4'], IMAGES . '/productsnew4/' . $newname);
			copy(IMAGES . 'products/' . $product['Product']['image_5'], IMAGES . '/productsnew5/' . $newname);


			$data['Product']['id'] = $product['Product']['id'];
			$data['Product']['image'] = $newname;
//			$this->Product->save($data, false);

			print_r($product);

			print_r($data);
		}

	}

}
