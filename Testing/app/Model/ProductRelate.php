<?php
class ProductRelate extends AppModel{
	public $belongsTo = array(
        'Product' =>array(
            'className'=>'Product'
        )
    );
}