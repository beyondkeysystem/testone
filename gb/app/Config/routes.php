<?php

	App::uses('SubdomainRoute', 'Route');

	function getSubDomain() {
		$url = explode('.', env('HTTP_HOST'));
		return $url;
	}
	$subDomain = getSubDomain();

	if($subDomain[0] != 'www' && isset($subDomain[2])) {
		Router::connect('/', array('controller' => 'products', 'action' => 'index'));
	} else {
		Router::connect('/', array('controller' => 'contents', 'action' => 'homepage'));
	}

	Router::connect('/product/:id-:slug', array('controller' => 'products', 'action' => 'view'), array('pass' => array('id', 'slug'), 'id' => '[0-9]+', 'routeClass' => 'SubdomainRoute'));

	Router::connect('/category/:slug', array('controller' => 'products', 'action' => 'category'), array('pass' => array('slug'), 'routeClass' => 'SubdomainRoute'));

	Router::connect('/subcategory/:slug', array('controller' => 'products', 'action' => 'subcategory'), array('pass' => array('slug'), 'routeClass' => 'SubdomainRoute'));

	Router::connect('/subsubcategory/:slug', array('controller' => 'products', 'action' => 'subsubcategory'), array('pass' => array('slug'), 'routeClass' => 'SubdomainRoute'));

	Router::connect('/cat/*', array('controller' => 'categories', 'action' => 'view'));

	Router::connect('/us/:slug', array('controller' => 'ustraditions', 'action' => 'view'), array('pass' => array('slug')));

	Router::connect('/international/:slug', array('controller' => 'traditions', 'action' => 'view'), array('pass' => array('slug')));

	Router::connect('/mailchimp.rss', array('controller' => 'products', 'action' => 'mailchimp'));

	Router::connect('/sitemap.xml', array('controller' => 'products', 'action' => 'sitemap'));

	Router::connect('/recipe/:slug', array('controller' => 'recipes', 'action' => 'view'), array('pass' => array('slug'), 'routeClass' => 'SubdomainRoute'));

	// Router::connect(
	// 	'/recipe/:short_name/:slug',
	// 	array(
	// 		'controller' => 'recipes',
	// 		'action' => 'view'
	// 	),
	// 	array(
	// 		'pass' => array('slug')
	// 	)
	// );

	Router::connect(
		'/article/:year/:month/:day/:slug',
		array(
			'controller' => 'articles',
			'action' => 'view'
		),
		array(
			'pass' => array(
				'slug',
			)
		)
	);

	Router::connect('/pages/*', array('controller' => 'pages', 'action' => 'display'));

	Router::connect('/admin', array('controller' => 'users', 'action' => 'dashboard', 'admin' => true));

	Router::connect('/vendor', array('controller' => 'users', 'action' => 'dashboard', 'vendor' => true));

	CakePlugin::routes();

	require CAKE . 'Config' . DS . 'routes.php';
