<?php
	class ProductSpecial extends AppModel{
		public $name = 'ProductSpecial';
		public $belongsTo = array(
	        'Product' =>array(
	            'className'=>'Product'
	        )
	    );
	}
?>