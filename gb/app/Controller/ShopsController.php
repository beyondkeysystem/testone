<?php
App::uses('AppController', 'Controller');
class ShopsController extends AppController {

//////////////////////////////////////////////////

	public $components = array(
		'Cart',
		'Ups',
		'Fedex',
		'AuthorizeNet'
	);

//////////////////////////////////////////////////

	public function beforeFilter() {
		parent::beforeFilter();
		$this->disableCache();
	}

//////////////////////////////////////////////////

	public function clear() {
		$clear = $this->Cart->clear();
		$this->Session->setFlash('All item(s) removed from your shopping cart', 'flash_error');
		$this->redirect('/');
	}

//////////////////////////////////////////////////

	public function add() {
		if ($this->request->is('post')) {
			$id = $this->request->data['Product']['id'];
			$product = $this->Cart->add($id, 1);
		}
		if(!empty($product)) {
			$this->Session->setFlash($product['Product']['name'] . ' was added to your shopping cart.', 'flash_success');
		}
		$this->redirect($this->referer());
	}

//////////////////////////////////////////////////

	public function update() {
		$this->Cart->update($this->request->data['Product']['id'], 1);
	}

//////////////////////////////////////////////////

	public function remove($id = null) {
		$product = $this->Cart->remove($id);
		if(!empty($product)) {
			$this->Session->setFlash($product['Product']['name'] . ' was removed from your shopping cart', 'flash_error');
		}
		$this->redirect(array('action' => 'cart'));
	}


//////////////////////////////////////////////////

	public function cartupdate() {
		if ($this->request->is('post')) {
			foreach($this->request->data['Shop'] as $key => $value) {
				$p = explode('-', $key);
				$this->Cart->add($p[1], $value);
			}
			$this->Session->setFlash('Shooping Cart is updated.', 'flash_success');
		}
		$this->redirect(array('action' => 'cart'));
	}

//////////////////////////////////////////////////

	public function cart() {
		$shop = $this->Session->read('Shop');
		$this->set(compact('shop'));
	}

//////////////////////////////////////////////////


	public function address() {

		$shop = $this->Session->read('Shop');
		if(!$shop['Order']['total']) {
			$this->redirect('/');
		}

		if ($this->request->is('post')) {
			$this->loadModel('Order');
			$this->Order->set($this->request->data);
			if($this->Order->validates()) {
				$order = $this->request->data['Order'];
				$order['order_type'] = 'creditcard';

				$i = 0;
				foreach($shop['Users'] as $d) {
					$data['ShipFromZip'] = $d['zip'];
					$data['ShipToZip'] = $order['shipping_zip'];
					$data['Weight'] = $d['totalweight'];

					if($d['ship_determinant'] != 1) {
						$shipping[$d['id']] = $this->_ups($data);
					} else {
						$shipping[$d['id']][0] = array(
							'ServiceCode' => '1',
							'ServiceName' => 'Flat',
							'TotalCharges' => $d['totalshipping']
						);
					}

					$shippingchecks['User'][$d['id']]['id'] = $d['id'];
					$shippingchecks['User'][$d['id']]['name'] = $d['name'];
					$shippingchecks['User'][$d['id']]['totalprice'] = $d['totalprice'];
					$shippingchecks['User'][$d['id']]['totalquantity'] = $d['totalquantity'];
					$shippingchecks['User'][$d['id']]['totalweight'] = $d['totalweight'];
					$shippingchecks['User'][$d['id']]['ShipFromZip'] = $d['zip'];
					$shippingchecks['User'][$d['id']]['ShipToZip'] = $order['shipping_zip'];
					$shippingchecks['User'][$d['id']]['Weight'] = $d['totalweight'];
					$i++;
				}

				$i = 0;
				foreach ($shipping as $ship) {
					foreach ($ship as $k) {
						$total[$k['ServiceCode']]['ServiceCode'] = $k['ServiceCode'];
						$total[$k['ServiceCode']]['ServiceName'] = $k['ServiceName'];
						$total[$k['ServiceCode']]['TotalCharges'] = 0;
						$i++;
					}
				}

				$i = 0;
				foreach ($shipping as $ship) {
					foreach ($ship as $k) {
						$total[$k['ServiceCode']]['TotalCharges'] = $k['TotalCharges'] + $total[$k['ServiceCode']]['TotalCharges'];
						$i++;
					}
				}

				$this->Session->write('Shop.Shipping', $shipping);
				$this->Session->write('Shop.Shippingtotal', $total);
				$this->Session->write('Shop.Shippingchecks', $shippingchecks);
				$this->Session->write('Shop.Order', $order + $shop['Order']);

				$this->Session->write('Shop.Totalship', 0);

				$this->redirect(array('action' => 'review'));
			} else {
				$this->Session->setFlash('The form could not be saved. Please, try again.', 'flash_error');
			}
		}
		if(!empty($shop['Order'])) {
			$this->request->data['Order'] = $shop['Order'];
		}

		$states = $this->Shop->states();
		$this->set(compact('states'));

	}

//////////////////////////////////////////////////

	protected function _ups($data) {
		$ups = $this->Ups->getRate(array(
			'ShipFromZip' => $data['ShipFromZip'],
			'ShipFromCountry' => 'US',
			'ShipToZip' => $data['ShipToZip'],
			'ShipToCountry' => 'US',
			'Weight' => $data['Weight'],
		));
		return $ups;
	}

//////////////////////////////////////////////////

	protected function _fedex() {

		$fedex = $this->Fedex->getRate(array(
			'ShipFromZip' => 91367,
			'ShipFromCountry' => 'US',
			'ShipToZip' => 91367,
			'ShipToCountry' => 'US',
			'Weight' => 1,
		));
		return $fedex;
	}

//////////////////////////////////////////////////

	public function charge() {

		$shop = $this->Session->read('Shop');
		//debug($shop);

		$payment = array(
			'creditcard_number' => '4111111111111111',
			'creditcard_month' => '12',
			'creditcard_year' => '12',
			'creditcard_code' => '123',
		);

		try {
			$authorizeNet = $this->AuthorizeNet->charge($shop['Order'], $payment);
			debug($authorizeNet);
		} catch(Exception $e) {
			debug($e->getMessage());
		}

		die('charge end.');

	}

//////////////////////////////////////////////////

	public function review() {

		$shop = $this->Session->read('Shop');
		$total = array();
		$i = 0;

		if(empty($shop)) {
			$this->redirect('/');
		}

		if ($this->request->is('post') && isset($this->request->data['Ship'])) {

			$totalShip = 0;
			foreach($this->request->data['Ship'] as $key => $value) {
				$userId = str_replace('rating_', '', $key);
				foreach($shop['Shipping'][$userId] as $k => $v) {
					if($v['ServiceCode'] == $value) {
						$totalShip += $v['TotalCharges'];
					}
				}
			}

			$this->Session->write('Shop.Totalship', $totalShip);
			$shop = $this->Session->read('Shop');

		}

		if ($this->request->is('post') && isset($this->request->data['Order'])) {
			$this->loadModel('Order');
			$this->Order->set($this->request->data);
			if($this->Order->validates()) {

				$payment = array(
					'creditcard_number' => $this->request->data['Order']['creditcard_number'],
					'creditcard_month' => $this->request->data['Order']['creditcard_month'],
					'creditcard_year' => $this->request->data['Order']['creditcard_year'],
					'creditcard_code' => $this->request->data['Order']['creditcard_code'],
				);

				try {
					$authorizeNet = $this->AuthorizeNet->charge($shop['Order'], $payment);
				} catch(Exception $e) {
					$this->Session->setFlash($e->getMessage());
					$this->redirect(array('action' => 'review'));
				}

				$o['OrderItem'] = $shop['OrderItem'];

				$i = 0;

				foreach($shop['Users'] as $u) {
					$o['OrderUser'][$i]['user_id'] = $u['id'];
					$o['OrderUser'][$i]['name'] = $u['name'];
					$o['OrderUser'][$i]['quantity'] = $u['totalquantity'];
					$o['OrderUser'][$i]['subtotal'] = $u['totalprice'];
					$o['OrderUser'][$i]['weight'] = $u['totalweight'];
					$o['OrderUser'][$i]['tax'] = 0;
					$o['OrderUser'][$i]['shipping'] = 10;
					$o['OrderUser'][$i]['status'] = 'new order';
					$i++;
				}

				$o['Order'] = $shop['Order'];
				$o['Order']['subtotal'] = $shop['Order']['subtotal'];

				$o['Order']['shipping'] = $shop['Shippingtotal']['03']['TotalCharges'];

				$o['Order']['total'] = $shop['Order']['total'] + $shop['Shippingtotal']['03']['TotalCharges'];
				$o['Order']['weight'] = $shop['Order']['weight'];

				$o['Order']['order_status_id'] = 1;

				$o['Order']['ip_address'] = $_SERVER['REMOTE_ADDR'];
				$o['Order']['remotehost'] = gethostbyaddr($_SERVER['REMOTE_ADDR']);
				$o['Order']['useragent'] = $_SERVER['HTTP_USER_AGENT'];

				$save = $this->Order->saveAll($o, array('validate' => 'first'));
				if($save) {

					$orderId = $this->Order->id;

					$this->sendemails($orderId);

					$this->redirect(array('action' => 'success'));
				}

			} else {
				$this->Session->setFlash('The form could not be saved. Please, try again.', 'flash_error');
			}
		}

		$this->set(compact('shop'));

	}

//////////////////////////////////////////////////

	public function sendemails($id) {

		$this->loadModel('Order');

		$order = $this->Order->find('first', array(
			'contain' => array(
				'OrderUser' => array('User' => array(
					'fields' => array(
						'User.id',
						'User.name',
						'User.email',
					)
				)),
				'OrderItem' => array('User' => array(
					'fields' => array(
						'User.id',
						'User.name',
						'User.email',
					)
				)),
			),
			'conditions' => array(
				'Order.id' => $id
			),
		));

//		debug($order);

		App::uses('CakeEmail', 'Network/Email');
		$email = new CakeEmail();

		$email->from(Configure::read('Settings.ADMIN_EMAIL'))
			->cc(Configure::read('Settings.ADMIN_EMAIL'))
			->to(Configure::read('Settings.ADMIN_EMAIL'))
			->subject('Shop Order - Admin Copy')
			->template('order-admin')
			->emailFormat('html')
			->viewVars(array('order' => $order))
			->send()
		;

		$email->from(Configure::read('Settings.ADMIN_EMAIL'))
			->cc(Configure::read('Settings.ADMIN_EMAIL'))
			->to($order['Order']['email'])
			->subject('Shop Order - Customer Copy')
			->template('order-customer')
			->emailFormat('html')
			->viewVars(array('order' => $order))
			->send()
		;

		foreach($order['OrderUser'] as $vendor) {

			$vendoritems = array();

			foreach($order['OrderItem'] as $items) {
				if($items['user_id'] == $vendor['user_id']) {

					$vendoritems[] = $items;

				}
			}

			$email->from(Configure::read('Settings.ADMIN_EMAIL'))
				->cc(Configure::read('Settings.ADMIN_EMAIL'))
				->to('er777@reyesworld.com')
				->subject('Gourmet Basket Shop Order - Vendor Copy')
				->template('order-vendor')
				->emailFormat('html')
				->viewVars(array('order' => $order, 'vendor' => $vendor, 'vendoritems' => $vendoritems))
				->send();
		}

		//die('end');

	}

//////////////////////////////////////////////////

	public function success() {
		$shop = $this->Session->read('Shop');
		$clear = $this->Cart->clear();

		if(empty($shop)) {
			$this->redirect('/');
		}
		$this->set(compact('shop'));
	}

//////////////////////////////////////////////////

}
