<?php
class ProductAttribute extends AppModel{
	public $belongsTo = array(
        'Product' =>array(
            'className'=>'Product'
        )
    );
}
?>