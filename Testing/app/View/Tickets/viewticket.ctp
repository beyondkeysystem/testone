<?php if($count != 0){ ?>
<script src="/fe/js/fancywebsocket.js"></script>
<?php
}
?>
	<script>
		var Server;
var cnt = "<?=$count?>";
		function log( text ) {
			//$log = $('#log');
			
                        //Add text to log
			//$log.append(($log.val()?"\n":'')+text);
			
                        //$log.text(text);
			
                        //Autoscroll
			//$log[0].scrollTop = $log[0].scrollHeight - $log[0].clientHeight;
		}

		function send( text ) {
                        console.log("Here I am on openticket");
                        console.log(text);
			Server.send( 'message', text );
		}
if (cnt != "0") {
		$(document).ready(function() {
                        console.log("Test");
			log('Connecting...');
			Server = new FancyWebSocket('<?=WSURL?>');

			/*$(document).ready(function(e) {
                                    log( '102' );
				    send( '102' );
				if ( e.keyCode == 13 && this.value ) {
					log( '12' );
					send( '12' );
				
					//$(this).val('');
				}
                                console.log("hell");
			});*/

			//Let the user know we're connected
			Server.bind('open', function() {
                                    log( '<?=$count?>' );
				    send( '<?=$count?>' );
				//log( "Connected." );
                                console.log('<?=$count?> Ticket Sys');
			});

			//OH NOES! Disconnection occurred.
			Server.bind('close', function( data ) {
				//log( "Disconnected...." );
			});

			//Log any messages sent from server
			Server.bind('message', function( payload ) {
				log( payload );
			});

			Server.connect();
		});
}
	</script>

<div class="section">
    <div class="container">
        <div class="ticket-system">
            <?php echo __('view ticket  ticket-system Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem. Nulla consequat massa quis enim. Donec pede justo, fringilla vel, aliquet nec, vulputate eget, arcu. In enim justo, rhoncus ut, imperdiet a, venenatis vitae, justo. Nullam dictum felis eu pede mollis pretium. Integer tincidunt. Cras dapibus. Vivamus'); ?>
        </div>
        <div class="heading clearfix">
            <?php echo __('Ticket Info');?>
        </div>
        <div class="small-table">
            <table width="" border="0">
                <tr>
                    <td><?php echo __('Ticket ID');?></td>
                    <td>#<?php echo $ticketid;?></td>
                </tr>
                <tr>
                    <td><?php echo __('Status');?></td>
                    <td><?php echo ucfirst($ticket['TicketStatus']['status']);?></td>
                </tr>
                <tr>
                    <td><?php echo __('Department');?></td>
                    <td><?php echo __('Administrations');?></td>
                </tr>
            </table>
        </div>
        <div class="ticket-system-two">
            <ul class="ticket-system-two-link clearfix">
                <li class="grey-bg"><?php echo __('You');?>-<?php $created = $ticket['Ticket']['created']; echo $ticket['Ticket']['email'];?></li>
                <li class="light-grey-bg"><?php echo __('Date');?>: <?php echo date("Y-m-d",strtotime($created));?>, &nbsp; &nbsp;  &nbsp;  &nbsp;     <?php echo __('Time');?>: <?php echo date("h:i:s",strtotime($created));?></li>
            </ul>

            <p><?php echo __($ticket['Ticket']['body']);?></p>
        </div>
        
        <!-- Replies -->

        <?php
        foreach($ticket['TicketReply'] as $reply) : 
            //if($reply['replier'] == 'client')
            //{
                echo '<div class="ticket-system-two">' ;
            //}
            //else
            //{
                echo '<ul class="ticket-system-two-link clearfix">' ;
            //}
        ?>
            <?php if($reply['replier'] == 'client') : ?>
                <li class="grey-bg"><?php echo __('You');?>-<?php $created = $ticket['Ticket']['created']; echo $ticket['Ticket']['email'];?></li>
            <?php else: ?>
                <li class="grey-bg"><?php echo "Administrator";//echo $ticket['TicketStaff']['firstname']. " " .$ticket['TicketStaff']['lastname'];?></li>
            <?php endif ; ?>            
                <li class="light-grey-bg"><?php $createdreply = $reply['created']; echo date("Y-m-d",strtotime($createdreply));?>, &nbsp; &nbsp;  &nbsp;  &nbsp;     <?php echo __('Time');?>: <?php echo date("h:i:s",strtotime($createdreply));?></li>
            </ul>
            <p><?php echo nl2br($reply['body']); ?></p>
            </div>
        <?php
        endforeach;
        ?>
        
        <div class="post-replay">
            <form action="" method="post">
                <input type="hidden" name="ticketid" value="<?php echo $ticket['Ticket']['id']; ?>" >
                <input type="hidden" name="clienthash" value="<?php echo $ticket['TicketClient']['hash']; ?>" >
                <input type="hidden" name="clientId" value="<?php echo $ticket['TicketClient']['id']; ?>" >
                <h2><?php echo __('Post Reply');?></h2>
                <textarea class="txt-area" name="reply"></textarea>
                <input type="submit" value="<?php echo __('Submit');?>" class="submit-btn">
            </form>
        </div>
    </div>
</div>