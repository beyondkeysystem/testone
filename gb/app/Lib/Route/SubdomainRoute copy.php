<?php
class SubdomainRoute extends CakeRoute {

	public function match($params) {

		print_r($params);

		$subdomain = isset($params['subdomain']) ? $params['subdomain'] : 'w3';
		unset($params['subdomain']);
		$path = parent::match($params);
		if ($subdomain) {
			$path = 'http://' . $subdomain . '.localhost' . $path;
		}
		return $path;
	}

	public function parse($url) {
		if(defined('MYDOMAIN')){
			$subdomain = substr( env("HTTP_HOST"), 0, strpos(env("HTTP_HOST"), ".".MYDOMAIN) );
			$url='/'.$subdomain.$url;
		}
		return ($subdomain == 'www') ? false : parent::parse($url);
	}

	public function _writeUrl($params) {

		print_r($params);

		$params['subdomain'] = isset($params['subdomain']) ? strtolower($params['subdomain']):'www';
		$out = parent::_writeUrl($params);
		if(!defined('MYDOMAIN')) return $out;
		$out=substr($out,strpos($out, '/')+1);
		$out=substr($out,strpos($out, '/'));
		return ($params['subdomain'] == 'www') ? false : 'http://'.$params['subdomain'].'.'.MYDOMAIN.$out;
	}

}
