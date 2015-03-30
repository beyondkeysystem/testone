<?php
class FcodeProduct extends AppModel{
        
	public $name = "FcodeProduct";

	public $belongsTo = array(
		'Product' =>array(
		    'className'=>'Product'
		),
                'Fcode' =>array(
		    'className'=>'Fcode'
		)
	);	

}