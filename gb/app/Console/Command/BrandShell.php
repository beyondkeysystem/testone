<?php
class BrandShell extends Shell {

	public $uses = array('Product', 'Brand');

	public function main() {

		$brands = $this->Product->find('all', array(
			'recursive' => -1,
			'fields' => array(
				'Product.id',
				'Product.brand_name'
			),
			'conditions' => array(
				'Product.brand_name >' => ''
			),
			'group' => array(
				'Product.brand_name'
			),
			'order' => array(
				'Product.brand_name' => 'ASC'
			),
		));

		foreach($brands as $brand) {

			$count = $this->Brand->find('count', array(
				'recursive' => -1,
				'conditions' => array(
					'Brand.name' => $brand['Product']['brand_name']
				)
			));

			if($count == 0) {
				$this->Brand->create();
				$data['Brand']['name'] = $brand['Product']['brand_name'];

				$data['Brand']['slug'] = Inflector::slug(strtolower($brand['Product']['brand_name']), '-');

				$this->Brand->save($data, false);
			}

		}


	}

}
