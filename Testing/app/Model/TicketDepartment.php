<?php
class TicketDepartment extends AppModel{

    public $hasMany = array(
        'Ticket' =>array(
            'className'=>'Ticket',
            'foreignKey' => '',
            'conditions' => '',
            'fields' => '',
            'order' => '',
        )
    );

}