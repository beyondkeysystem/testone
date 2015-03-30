<?php
class OrderDetail extends AppModel{
	public $name = 'OrderDetail';
        
        public $belongsTo = array(
            'Product' =>array(
                'className'=>'Product'
            ),
            'User' =>array(
                'className'=>'User'
            )
        );
}
?>