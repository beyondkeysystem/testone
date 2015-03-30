<?php
class TicketReply extends AppModel{
    public $name = 'TicketReply';

    public $belongsTo = array(
        'Ticket' =>array(
            'className'=>'Ticket'
        )
    );

}