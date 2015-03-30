<?php
class Address extends AppModel{

	public $name = 'Address';
	public $belongsTo = array(
		'Customer' => array(
			'className' => 'Customer',
			'foreignKey' => 'customer_id',
			'conditions' => '',
			'fields' => '',
			'order' => '',
		),
            'User' => array(
			'className' => 'User',
			'foreignKey' => 'user_id'
		)
	);
        
        public $validate = array(
		'firstname' => array(
		    'require' => array(
			'rule' => '/.+/',
			'message' => 'First name must be between 3 and 32 characters!'
		    ),
		    'between' => array(
			'rule'    => array('lengthBetween', 3, 32),
			'message' => 'First name must be between 3 and 32 characters!'
		    )
		),
		'lastname' => array(
		    'require' => array(
			'rule' => '/.+/',
			'message' => 'Last name must be between 3 and 32 characters!'
		    ),
		    'between' => array(
			'rule'    => array('lengthBetween', 3, 32),
			'message' => 'Last name must be between 3 and 32 characters!'
		    )
		),
                'state' => array(
                    'require' => array(
                        'rule' => '/.+/',
                        'message'=>'Please enter state name'
                    ),
		),
                'city' => array(
                    'require' => array(
                            'rule' => '/.+/',
                            'message'=>'Please enter city name'
                        ),
                    ),
		
		'postcode' => array(
		    'require' => array(
			'rule' => '/.+/',
			'message' => 'Postal code must be between 6 and 15 characters!'
		    ),
		    'between' => array(
			'rule'    => array('lengthBetween', 4, 15),
			'message' => 'Postal code must be between 4 and 15 characters!'
		    )
		),
		'address_1' => array(
                    'required' => array(
                        'rule' => '/.+/',
                        'message'=>'Please enter address'
                    ),
		),
                'phone'=>array(
                    'required'=>array(
                        'rule'=>'/.+/',
                        'message'=>'Please enter mobile no.'
                    ),
                    'check'=>array(
                        'rule'=>'/(\+)[0-9]{1,4}[0-9]{6,15}/',
                        'message'=>'Mobile number should be +914578521452 format'
                    ),
                ),
	);	    	
}
?>