<?php
class Customer extends AppModel{

	public $name = 'Customer';

	public $virtualFields = array(
	    'name' => 'CONCAT(Customer.firstname, " ", Customer.lastname)'
	);


	public $belongsTo = array(
		'CustomerGroup' => array(
			'className' => 'CustomerGroup',
			'foreignKey' => 'customer_group_id',
			'conditions' => '',
			'fields' => '',
			'order' => '',
		),
            'User' => array(
			'className' => 'User'
		)
	);
	
	public $hasMany = array(
		'Address' => array(
			'className' => 'Address',
			'foreignKey' => 'customer_id',
			'conditions' => '',
			'fields' => '',
			'order' => '',
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
		'email' => array(
		    'require' => array(
			'rule' => '/.+/',
			'message' => 'Please enter email address'
		    ),
		    'between' => array(
			'rule'    => array('lengthBetween', 3, 32),
			'message' => 'Please enter vaild email address'
		    ),
		    'isUnique' => array(
			'rule'    => 'isUnique',
			'message' => 'This email has already been taken!'
		    )
		),
		'telephone' => array(
		    'require' => array(
			'rule' => '/.+/',
			'message' => 'Telephone nubmer must be between 6 and 15 characters!'
		    ),
		    'between' => array(
			'rule'    => array('lengthBetween', 6, 15),
			'message' => 'Telephone nubmer must be between 6 and 15 characters!'
		    )
		),
		'password' => array(
		    'required'=>array(
			'rule'=>'/.+/',
			'message'=>'Please enter password.'
		    ),
		    'passlength'=>array(
			'rule'    => array('passlength'),
			'message' => 'Password must be minimum 8 characters.'
		    ),
		),
		'cpassword'=>array(
		    'required'=>array(
			'rule'=>'/.+/',
			'message'=>'Please re-enter Password.'
		    ),
		    'match'=>array(
			'rule'=>array('matchpass','UserPassword'),
			'message'=>'Password and confirmation password do not match.'
		    ),
		),
                'fullname'=>array(
		    'required'=>array(
			'rule'=>'/.+/',
			'message'=>'Please enter name.'
		    ),
		    'between' => array(
			'rule'    => array('lengthBetween', 3, 32),
			'message' => 'Name must be between 3 and 32 characters!'
		    )
		),
                'dob'=>array(
		    'required'=>array(
			'rule'=>'/.+/',
			'message'=>'Please enter date of birth.'
		    ),
		),
            'gender'=>array(
		    'required'=>array(
			'rule'=>'/.+/',
			'message'=>'Please select gender.'
		    ),
		),
	);
	    
	public function passlength($data){
	    $strlen = strlen($data['password']); 
	    if(isset($strlen) and $strlen >=8){
		return true;
	    }
	    return false;
	}
	
	public function matchpass(){
	    if($this->data['Customer']['password'] == $this->data['Customer']['cpassword']){
		return true;
	    }
	    return false;
	}
}
?>