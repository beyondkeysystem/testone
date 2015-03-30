<script src="/fe/js/fancywebsocket.js"></script>
	<script>
		var Server;

		function log( text ) {
			$log = $('#log');
			//Add text to log
			//$log.append(($log.val()?"\n":'')+text);
			$log.text(text);
			//Autoscroll
			//$log[0].scrollTop = $log[0].scrollHeight - $log[0].clientHeight;
		}

		function send( text ) {
			Server.send( 'message', text );
		}

		$(document).ready(function() {
			log('Connecting...');
			Server = new FancyWebSocket('<?=WSURL?>');

			/*$('#message').keypress(function(e) {
				if ( e.keyCode == 13 && this.value ) {
					log( this.value );
					send( this.value );

					$(this).val('');
				}
			});*/

			//Let the user know we're connected
			Server.bind('open', function() {
				log( "Connected." );
			});

			//OH NOES! Disconnection occurred.
			Server.bind('close', function( data ) {
				log( "Disconnected...." );
			});

			//Log any messages sent from server
			Server.bind('message', function( payload ) {
				log( payload );
			});

			Server.connect();
		});
		
	</script>


	<!--<div id='body'>
		<textarea id='no' name='log' readonly='readonly'></textarea><br/>
		<input type='text' id='message' name='message' />
	</div>-->
	
	
	