<?php
class ProductDiscount extends AppModel{
	public $belongsTo = array(
        'Product' =>array(
            'className'=>'Product'
        )
    );
}