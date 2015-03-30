var FancyWebSocket = function(url)
{
	var callbacks = {};
	var ws_url = url;
	var conn;

	this.bind = function(event_name, callback){
		callbacks[event_name] = callbacks[event_name] || [];
		callbacks[event_name].push(callback);
		return this;// chainable
	};

	this.send = function(event_name, event_data){
		console.log("Olaola");console.log(event_data);
		this.conn.send( event_data );
		return this;
	};

	this.connect = function() {
		if ( typeof(MozWebSocket) == 'function' ){
			this.conn = new MozWebSocket(url);
			console.log("Tesssst");
		}
		else{
			this.conn = new WebSocket(url);
			
			console.log("Test2");
		}
		

		// dispatch to the right handlers
		this.conn.onmessage = function(evt){
			console.log("Hello");console.log(evt.data);
			console.log(evt);
			console.log("HaRellosssssss");
			//console.log(evt.length);
			dispatch('message', evt.data);
			//$("#sound").attr("src","/fe/1136.mp3");
			if (evt.data.length > 0 && evt.data != 1) {
				//code
			console.log("Helloss");
				var audioElement = document.createElement('audio');
				audioElement.setAttribute('src', '/fe/beep.wav');
				audioElement.setAttribute('autoplay', 'autoplay');
				audioElement.load();
			
				$.get();
			
				audioElement.addEventListener("load", function() {
				    audioElement.play();
				}, true);
				console.log("Ok" + evt.data);
			}
			else{
				console.log("Oks");
			}
		};


		this.conn.onclose = function(){dispatch('close',null)}
		this.conn.onopen = function(){dispatch('open',null)}
	};

	this.disconnect = function() {
		this.conn.close();
	};

	var dispatch = function(event_name, message){
		var chain = callbacks[event_name];
		if(typeof chain == 'undefined') return; // no callbacks for this event
		for(var i = 0; i < chain.length; i++){
			chain[i]( message )
		}
	}
};
