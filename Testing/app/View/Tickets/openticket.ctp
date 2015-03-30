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
        <?php if(!$error){ ?>
            <div class="ticket-system">
                <?php echo __('Welcome to our Support Desk. Our Support Desk will help you to contact us for all your questions and get instant answers to it.');?>
            </div>
            <div class="heading clearfix">
                <?php echo __('Ticket Details');?>
            </div>
            <form action="" method="post">
                <ul class="ticket-system2">
                    <li>
                        <label><?php echo __('Email Address');?></label>
                        <input name="email" type="email" class="txt-field">
                        <input type="hidden" value="<?=$departmentid?>" name="department_id" class="txt-field">
                    </li>
        
                    <li>
                        <label><?php echo __('Subject');?> </label>
                        <input name="subject" type="text" class="txt-field">
                    </li>
        
                    <li>
                        <label><?php echo __('Your Query');?> </label>
                        <textarea name="body" class="txt-area"></textarea>
                    </li>
        
                    <li>
                        <label><?php echo __('Priority');?> </label>
                        <select class="selectpicker" name="priority">
                            <option value="Low"><?php echo __('Low');?> </option>
                            <option value="Medium"><?php echo __('Medium');?></option>
                            <option value="High"><?php echo __('High');?></option>
                        </select>
                    </li>
                    <li>
                        <input type="submit" value="<?php echo __('Create Ticket');?>" class="submit-btn">
                    </li>
                </ul>
            </form>
            <?php }else{ ?>
            <div class="ticket-system">
                <?php echo $error;?>
            </div>
        <?php }?>
    </div>
</div> 