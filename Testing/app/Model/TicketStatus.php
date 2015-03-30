<?php
class TicketStatus extends AppModel{
    public $name = 'TicketStatus';

    public $hasMany = array(
        'Customer' =>array(
            'className'=>'Ticket',
            'foreignKey' => 'status_id'
        )
    );

}