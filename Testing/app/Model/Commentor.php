<?php
class Commentor extends AppModel{

        public $name = 'Commentor';
	public $belongsTo = array(
		'New' =>array(
		    'className'=>'New',
		    'foreignKey' => 'news_id',
		    'dependent' => true
		)
   	);

    public $validate = array(
		'name' => array(
		    'require' => array(
			'rule' => array('notEmpty'),
			'message' => 'Please enter name'
		    )
		),
		'message' => array(
		    'require' => array(
			'rule' => array('notEmpty'),
			'message' => 'Please enter message'
		    )
		),
		/*'unitnum'=>array(
        'rule'=>array('custom', '/^[a-z0-9 -\'.\/&]*$/i'),
        'message'=>'Must be the name or number of your unit.'
    ),*/
		'website' => array(
		    'require' => array(
			'rule' => array('url'),
			'message' => 'Please enter message'
		    )
		),
		'email' => array(
			'require' => array(
			    'rule' => '/.+/',
			    'message' => 'Please enter email address'
			),
			'between' => array(
			    'rule'    => array('lengthBetween', 3, 380),
			    'message' => 'Please enter vaild email address'
			)
		    ),
		'phone' => array(
		    'require' => array(
			'rule' => '/.+/',
			'message' => 'Please enter phone number'
		    ),
		    'between' => array(
			'rule'    => array('lengthBetween', 6, 15),
			'message' => 'Phone number must be between 6 and 15 characters!'
		    )
		),
		
        );
}