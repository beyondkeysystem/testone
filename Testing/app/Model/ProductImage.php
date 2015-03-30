<?php
class ProductImage extends AppModel{
	public $belongsTo = array(
        'Product' =>array(
            'className'=>'Product'
        )
    );
}
?>