var currentId = '';
var nameId = '';
var phoneId = '';
var emailId = '';
var Comment = '';
(function( $ ){
   $.fn.superfish = function() {
   }; 
})( jQuery );
jQuery( document ).ready(function( $ ) {
	var url = "http://americanhomesonline.com/aho/aho.php";
	var APPid = jQuery('#AHO-JS').attr('src');
	APPid = APPid.split("=");
	
	var loc = encodeURIComponent(jQuery(location).attr('href'));
	
	jQuery('#AHO-Remote-Load').on('keyup', '.former',  function(event) {
        			var form_name = jQuery('#Name').val();
        			var form_phone = jQuery('#Phone').val();
        			var form_email = jQuery('#Email').val();
        			
        			
        			
        			
        			if(form_name != '' && form_email != '' && form_phone != ''){
        			
        			jQuery('#regs').css({'display':'block'});

        			
        			}
        			
    });
	
	
	jQuery( "#AHO-Remote-Load" ).load( url+"?APPid="+APPid[1]+'&AHO_AS='+loc);

	jQuery('#AHO-Remote-Load').on('click', '.AHO_Email',  function(event) {
		event.preventDefault();
		currentId = jQuery(this).attr('id');
		$(this).parent().parent().html('<img src="http://americanhomesonline.com/images/ajax_loader_blue_128.gif" />');
		jQuery( "#AHO-Remote-Load" ).load( url+"?AID="+currentId+"&APPid="+APPid[1]+'&AHO_AS='+loc, function() {
			$('#Name').val(nameId);
			$('#Phone').val(phoneId);
			$('#Email').val(emailId);
		} );
	});
	
	jQuery('#AHO-Remote-Load').on('click', '.AHO_Call',  function(event) {
		event.preventDefault();
		var currentId = jQuery(this).attr('id');
		$(this).parent().parent().html('<img src="http://americanhomesonline.com/images/ajax_loader_blue_128.gif" />');
		jQuery( "#AHO-Remote-Load" ).load( url+"?AID="+currentId+"&APPid="+APPid[1]+'&AHO_AS='+loc );
	});
	
	jQuery('#AHO-Remote-Load').on('click', '.AHO_Back',  function(event) {
		event.preventDefault();
		var currentId = jQuery(this).attr('id');
		$(this).parent().parent().html('<img src="http://americanhomesonline.com/images/ajax_loader_blue_128.gif" />');
		jQuery( "#AHO-Remote-Load" ).load( url+"?APPid="+APPid[1]+'&AHO_AS='+loc );
	});
	
	jQuery('#AHO-Remote-Load').on('click', '#Send',  function(event) {
		event.preventDefault();
		
		currentId = jQuery('#AID').val();
		nameId = jQuery('#Name').val(); 
		phoneId = jQuery('#Phone').val();
		emailId = jQuery('#Email').val();
		Comment = jQuery('#Comment').val();
		IPaddress = "temporary value";
		$(this).parent().parent().html('<img src="http://americanhomesonline.com/images/ajax_loader_blue_128.gif" />');
		var globalIP;

   		 jQuery.get("http://americanhomesonline.com/aho/ip.php", function (data) {
        globalIP = data;
        	
        	


		
		jQuery( "#AHO-Remote-Load" ).load( url+"?Form_Send=1&Comment="+encodeURIComponent(Comment)+"&Name="+encodeURIComponent(nameId)+"&Phone="+encodeURIComponent(phoneId)+"&Email="+encodeURIComponent(emailId)+"&AID="+currentId+"&IPaddress="+encodeURIComponent(globalIP)+"&APPid="+APPid[1]+'&AHO_AS='+loc );
		});
		
	});
	
});
