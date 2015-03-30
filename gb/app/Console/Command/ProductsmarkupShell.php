<?php
class ProductsmarkupShell extends Shell {

	public $uses = array('Product');

	public function main() {

		$this->Product->query('update products set markup = 0');

		$this->Product->query('update products set markup = ((price - price_wholesale) / price_wholesale) * 100');

	}

}
