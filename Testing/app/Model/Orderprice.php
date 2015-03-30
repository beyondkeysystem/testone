<?php
class Orderprice extends AppModel{
	public $name = 'Orderprice';
        
        public $validate = array(
		'price' => array(
		    'require' => array(
			'rule' => '/.+/',
			'message' => 'Please enter Order price'
		    ),
		    'decimal' => array(
			'rule' => array('decimal', 2),
			'message' => 'Please enter valid price (e.i.0.00)'
		    )
		),
            );
}
?>