<?php
class ShippingPrice extends AppModel{
	public $name = 'ShippingPrice';
        
        public $validate = array(
		'price' => array(
		    'require' => array(
			'rule' => '/.+/',
			'message' => 'Please enter shipping price'
		    ),
		    'decimal' => array(
			'rule' => array('decimal', 2),
			'message' => 'Please enter valid price (e.i.0.00)'
		    )
		),
            );
}
?>