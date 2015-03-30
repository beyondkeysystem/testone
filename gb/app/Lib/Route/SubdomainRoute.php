<?php
class SubdomainRoute extends CakeRoute {

////////////////////////////////////////////////////////////

	private $Request;

////////////////////////////////////////////////////////////

	public function __construct($template, $defaults = array(), $options = array()) {
		parent::__construct($template, $defaults, $options);
		$this->Request = new CakeRequest();
	}

////////////////////////////////////////////////////////////

	public function match($params) {

		$subdomain = isset($params['subdomain']) ? $params['subdomain'] : '';
		unset($params['subdomain']);

		$path = parent::match($params);

		$domain = $this->_getDomain();

		if ($subdomain) {
			$path = 'http://' . $subdomain . '.' . $domain . $path;
		}

		return $path;
	}

////////////////////////////////////////////////////////////

	protected function _getDomain() {
		$d = $this->Request->domain();
		return $d;
	}

////////////////////////////////////////////////////////////

}
