<?php
class ProductCategory extends AppModel{

	public $belongsTo = array(
        'Product' =>array(
            'className'=>'Product'
        )
    );

}