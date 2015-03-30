<?php
App::uses('AuthComponent', 'Controller/Component');
class UserSubdomainRoute extends CakeRoute {

/**
* @var CakeRequest
*/
	private $Request;

/**
* Length of domain's TLD
*
* @var int
*/
	public static $_tldLength = 1;

	public function __construct($template, $defaults = array(), $options = array()) {
		parent::__construct($template, $defaults, $options);

		$this->Request = new CakeRequest();
		$this->options = array_merge(array('protocol' => 'http'), $options);
	}

/**
* Sets tld length
*
* @param $length
* @return mixed void|int
*/
	public static function tldLength($length = null) {
		if (is_null($length)) {
			return self::$_tldLength;
		}

		self::$_tldLength = $length;
	}

/**
* Writes out full url with protocol and subdomain
*
* @param $params
* @return string
*/
	protected function _writeUrl($params) {

//		print_r($params);
		//die;


		$protocol = $this->options['protocol'];
//		$subdomain = AuthComponent::user('subdomain');

		$subdomain = isset($params['subdomain']) ? $params['subdomain'] : null;
		unset($params['subdomain']);
		unset($params['named']['subdomain']);

		if (empty($subdomain)) {
			$subdomain = 'www';
		}
		$domain = $this->_getDomain();
		$url = parent::_writeUrl($params);

//		$url = '/' . $params['named']['id'] . '-' . $params['named']['slug'];

		return "{$protocol}://{$subdomain}.{$domain}{$url}";
	}

/**
* Get domain name
*
* @return string
*/
	protected function _getDomain() {
		return $this->Request->domain(self::$_tldLength);
	}

}
