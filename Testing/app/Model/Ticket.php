<?php
class Ticket extends AppModel{

    public $hasMany = array(
        'TicketReply' =>array(
            'className'=>'TicketReply',
            'foreignKey' => 'ticket_id',
            'dependent' => true
        )
    );

    public $belongsTo = array(
        'TicketClient' =>array(
            'className'=>'TicketClient',
            'foreignKey' => 'clientid'
        ),
        'TicketStaff' =>array(
            'className'=>'TicketStaff'            
        ),
        'TicketDepartment' =>array(
            'className'=>'TicketDepartment',
            'foreignKey' => 'department_id',
        ),
        'TicketStatus' =>array(
            'className'=>'TicketStatus'
        ),
        'User' =>array(
            'className'=>'User',
            'foreignKey' => 'user_id',
        ),
        'Customer' =>array(
            'className'=>'Customer',
            'foreignKey' => 'customer_id',
        )
    );
    
    public $validate = array(
        'email' => array(
            'require' => array(
                'rule' => array('notEmpty'),
                'message' => 'Email must be required!'
            )
        ),

        'subject' => array(
            'require' => array(
                'rule' => array('notEmpty'),
                'message' => 'Subject must be required!'
            )
        ),

        'body' => array(
            'require' => array(
                'rule' => array('notEmpty'),
                'message' => 'Your Query must be required!'
            )
        ),
        
        'Priority' => array(
            'require' => array(
                'rule' => array('notEmpty'),
                'message' => 'Priority must be required!'
            )
        )
    );


}