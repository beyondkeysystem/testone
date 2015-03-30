<?php
class CartComponent extends Component {

//////////////////////////////////////////////////

	public $components = array('Session');

//////////////////////////////////////////////////

	public $controller = null;

//////////////////////////////////////////////////

	public function startup(Controller $controller) {
		$this->controller = $controller;
	}

//////////////////////////////////////////////////

	public $maxQuantity = 100;

//////////////////////////////////////////////////

	public function add($id, $quantity = 1) {

		if(!is_numeric($quantity)) {
			$quantity = 1;
		}
		$quantity = abs($quantity);
		if($quantity > $this->maxQuantity) {
			$quantity = $this->maxQuantity;
		}
		if($quantity == 0) {
			$this->remove($id);
			return;
		}

		$product = ClassRegistry::init('Product')->find('first', array(
			'recursive' => -1,
			'contain' => array('User'),
			'fields' => array(
				'Product.id',
				'Product.name',
				'Product.slug',
				'Product.image',
				'Product.price',
				'Product.weight_unit',
				'Product.weight',
				'Product.height',
				'Product.length',
				'Product.width',
				'User.id',
				'User.name',
				'User.email',
				'User.zip',
				'User.state',
				'User.flat_ship_level_1_low',
				'User.flat_ship_level_1_high',
				'User.flat_ship_level_2_low',
				'User.flat_ship_level_2_high',
				'User.flat_ship_level_3_low',
				'User.flat_ship_level_3_high',
				'User.flat_ship_level_4_low',
				'User.flat_ship_level_4_high',
				'User.ship_determinant',
				'User.shipping_method',
			),
			'conditions' => array(
				'Product.id' => $id
			)
		));
		if(empty($product)) {
			return false;
		}
		$data['quantity'] = $quantity;
		$data['user_id'] = $product['User']['id'];
		$data['product_id'] = $product['Product']['id'];
		$data['name'] = $product['Product']['name'];
		$data['weight'] = $product['Product']['weight'];
		$data['weight_total'] = sprintf('%01.2f', $product['Product']['weight'] * $quantity);
		$data['price'] = $product['Product']['price'];
		$data['subtotal'] = sprintf('%01.2f', $product['Product']['price'] * $quantity);
		$data['Product'] = $product['Product'];
		$data['User'] = $product['User'];
		$this->Session->write('Shop.OrderItem.' . $id, $data);

		$this->Cart = ClassRegistry::init('Cart');

		$cartdata['Cart']['sessionid'] = $this->Session->id();
		$cartdata['Cart']['quantity'] = $quantity;
		$cartdata['Cart']['user_id'] = $product['User']['id'];
		$cartdata['Cart']['product_id'] = $product['Product']['id'];
		$cartdata['Cart']['name'] = $product['Product']['name'];
		$cartdata['Cart']['weight'] = $product['Product']['weight'];
		$cartdata['Cart']['weight_total'] = sprintf('%01.2f', $product['Product']['weight'] * $quantity);
		$cartdata['Cart']['price'] = $product['Product']['price'];
		$cartdata['Cart']['subtotal'] = sprintf('%01.2f', $product['Product']['price'] * $quantity);

		$existing = $this->Cart->find('first', array(
			'recursive' => -1,
			'conditions' => array(
				'Cart.sessionid' => $this->Session->id(),
				'Cart.product_id' => $product['Product']['id'],
			)
		));
		if($existing) {
			$cartdata['Cart']['id'] = $existing['Cart']['id'];
		} else {
			$this->Cart->create();
		}
		$this->Cart->save($cartdata, false);

		$this->cart();

		return $product;
	}

//////////////////////////////////////////////////

	public function remove($id) {
		if($this->Session->check('Shop.OrderItem.' . $id)) {
			$product = $this->Session->read('Shop.OrderItem.' . $id);
			$this->Session->delete('Shop.OrderItem.' . $id);

			$this->Cart = ClassRegistry::init('Cart');
			$existing = $this->Cart->find('first', array(
				'recursive' => -1,
				'conditions' => array(
					'Cart.sessionid' => $this->Session->id(),
					'Cart.product_id' => $id,
				)
			));
			if($existing) {
				$this->Cart->delete($existing['Cart']['id'], false);
			}

			$this->cart();
			return $product;
		}
		return false;
	}

//////////////////////////////////////////////////

	public function cart() {
		$shop = $this->Session->read('Shop');
		$cartTotal = 0;
		$cartQuantity = 0;
		$cartWeight = 0;
		$order_item_count = 0;

		$this->Session->delete('Shop.Order');
		$this->Session->delete('Shop.Shipping');

		$property = array();
		$users = array();

		if (count($shop['OrderItem']) > 0) {
			foreach ($shop['OrderItem'] as $item) {
				$cartTotal += $item['subtotal'];
				$cartQuantity += $item['quantity'];
				$cartWeight += $item['weight_total'];
				$order_item_count++;

				$users[$item['User']['id']]['id'] = $item['User']['id'];
				$users[$item['User']['id']]['name'] = $item['User']['name'];
				$users[$item['User']['id']]['email'] = $item['User']['email'];
				$users[$item['User']['id']]['zip'] = $item['User']['zip'];
				$users[$item['User']['id']]['state'] = $item['User']['state'];

				// $users[$item['User']['id']]['flat_shipping'] = $item['User']['flat_shipping'];
				// $users[$item['User']['id']]['free_shipping_price_threshold'] = $item['User']['free_shipping_price_threshold'];
				$users[$item['User']['id']]['ship_determinant'] = $item['User']['ship_determinant'];

				$users[$item['User']['id']]['shipping_method'] = $item['User']['shipping_method'];

				$users[$item['User']['id']]['totalprice'] = 0;
				$users[$item['User']['id']]['totalquantity'] = 0;
				$users[$item['User']['id']]['totalweight'] = 0;
			}
			foreach ($shop['OrderItem'] as $item) {
				$users[$item['User']['id']]['totalprice'] += $item['subtotal'];
				$users[$item['User']['id']]['totalquantity'] += $item['quantity'];
				$users[$item['User']['id']]['totalweight'] += $item['weight_total'];
			}
			foreach ($users as & $ship) {
				$ship['totalprice'] = sprintf('%.2f', $ship['totalprice']);
			}

			foreach ($users as & $user) {
				if($user['ship_determinant'] == 1) {
					if($user['totalprice'] < 50) {
						$user['totalshipping'] = 21;
					} else {
						$user['totalshipping'] = 51;
					}
				} else {
					$user['totalshipping'] = 0;
				}
			}

			$order['order_item_count'] = $order_item_count;
			$order['total'] = sprintf('%.2f', $cartTotal);
			$order['subtotal'] = sprintf('%.2f', $cartTotal);
			$order['quantity'] = $cartQuantity;
			$order['weight'] = $cartWeight;
			$order['sessionid'] = $this->Session->id();

			$this->Session->write('Shop.Order', $order);

			// debug($users);
			// die;

			$this->Session->write('Shop.Users', $users);

			return true;
		}
		else {
			$this->Session->delete('Shop');
			return false;
		}
	}

//////////////////////////////////////////////////

	public function clear() {
		$this->Cart = ClassRegistry::init('Cart');
		$this->Cart->deleteAll(array('Cart.sessionid' => $this->Session->id()), false);
		$this->Session->delete('Shop');
	}

//////////////////////////////////////////////////

}