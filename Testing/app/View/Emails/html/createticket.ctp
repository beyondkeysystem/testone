<?php
    $email = $createticket['email'];
    $ticket_link = $createticket['ticket_link'];
    $ticket_id = $createticket['ticket_id'];
    echo "Hello $email,<br><br>				
    Your ticket has been opened with us.<br><br> 
    
    Ticket #$ticket_id<br>
    Status : Open<br><br>
    
    Click on the below link to see the ticket details and post additional comments.<br><br>
    
    <a href=\"http://$ticket_link\">$ticket_link</a><br><br>
    
    Regards<br>
    HaRiMau&trade;"
?>
