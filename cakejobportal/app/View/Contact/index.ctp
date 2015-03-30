<div class="main_ctnr_middle main_left">
        <section class="profile_main">
								
	 <?php
            if(isset($auth_data)){
                  if($auth_data['type'] == 'employer'){
                        $etype=$this->webroot."".$auth_data['type']."/profile";
                     //   $ctype=$this->webroot;
                  }
                  elseif($auth_data['type'] == 'candidate'){
                        $etype=$this->webroot."".$auth_data['type']."/candidate_profile";
                      //  $etype=$this->webroot;
                  }                  
            }
            else{
                  $etype=$this->webroot;
                  //$ctype=$this->webroot;
            }
            $home_type=$this->webroot;
            ?>							
								<div class="menu-contact">
													
		<ul class="contact-menu">
                    <li class="r-tabs-tab r-tabs-state-active"><a href="<?=$etype?>" class="r-tabs-anchor"><i class="fa fa-film"></i>Profile Page</a></li>
                    <li class="r-tabs-tab r-tabs-state-default"><a href="<?php echo $this->webroot; ?>forum/" class="r-tabs-anchor"><i class="fa fa-comments-o"></i>Forum</a></li>
                    <li class="r-tabs-state-default r-tabs-tab"><a href="<?php echo $this->webroot; ?>chat/room/" class="r-tabs-anchor"><i class="fa fa-group"></i>Chat Room</a></li>
                    <li class="r-tabs-state-default r-tabs-tab"><a href="#tab-4" class="r-tabs-anchor"><i class="fa fa-envelope"></i>Messages</a></li>
                    <li class="r-tabs-state-default r-tabs-tab"><a href="#tab-5" class="r-tabs-anchor"><i class="fa fa-file-text"></i>Articles</a></li>
                </ul>
								
			 
								
								</div>
								
								<div class="clearfix"></div>
								
								
          <div class="profile_content">
            <h2>Contact Us</h2>
            <div class="orng_dvdr"></div>
                <div class="contact-main">
		    <div class="map">
                  <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
<script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false"></script><script> 
           // window.theme_url = 'file:///home/cis/Desktop/';
            window.googlemaps_zoom = 16;
            window.googlemaps_type = 'SATTELITE';
			
			
			
			function loadHiddenMap(arg1, arg2) {
	/*arg1 = parseFloat(arg1);
	arg2 = parseFloat(arg2);*/
	
	if(window.google==undefined){
		return;
	}
	
	// change this coordinates latitude,longitude - use this tool to get coordinates http://itouchmap.com/latlong.html
	var point = new google.maps.LatLng(arg1, arg2);
	var maptype = google.maps.MapTypeId.ROADMAP;
	if(window.googlemaps_type=='SATTELITE'){
		maptype = google.maps.MapTypeId.SATTELITE;
	}
	if(window.googlemaps_type=='HYBRID'){
		maptype = google.maps.MapTypeId.HYBRID;
	}
	if(window.googlemaps_type=='TERRAIN'){
		maptype = google.maps.MapTypeId.TERRAIN;
	}
	var myMapOptions = {
		scrollwheel : false,
		zoom : window.googlemaps_zoom,
		center : point,
		mapTypeControl : false,
		mapTypeControlOptions : {
			style : google.maps.MapTypeControlStyle.DROPDOWN_MENU,
			position : google.maps.ControlPosition.RIGHT_CENTER
		},
		navigationControl : false,
		navigationControlOptions : {
			style : google.maps.NavigationControlStyle.SMALL,
			position : google.maps.ControlPosition.LEFT_CENTER
		},
		mapTypeId : maptype
	};

	var map = new google.maps.Map(document.getElementById('hidden_map'), myMapOptions);

	var image = new google.maps.MarkerImage('<?=$this->webroot?>images/pin.png');



	var marker = new google.maps.Marker({
		draggable : false,
		raiseOnDrag : false,
		icon : image,
		//shape : shape,
		map : map,
		position : point

	});
}
           
        </script>
		<script>
                // initialise plugins
               // window.THEME_URL = "file:///home/cis/Desktop/";
                window.apo = "'";
jQuery(document).ready(function($) {

var arg1 = 51.51906513047103;
var arg2 = -0.06952891809021366;

loadHiddenMap(arg1, arg2);

})
</script>

<div id="hidden_map" style="height:358px; width:100%;"></div>

					<div class="pin"></div>
				</div>

                  
                  <div class="contact-deatil">
		<h2>Contact Details:</h2> 
		<p>44 Peregnne Road</p>
		<p>Blackboard Layers</p>
		<p>Oxford Ox46EJ</p>
		<p>Phone: 32525 588454</p>

		<p>Email: <a href="mailto:info@recruityoung.com">info@recruityoung.com</a> </p>
		</div>
                    <?php echo $this->Session->Flash();?>   
                    <div class="contact-form">
			<?php
			echo $this->Session->flash();
			echo $this->Form->create('Contact',array("name"=>"myForm","onsubmit"=>"return process_form(this)"));
			?>
                            <ul class="contact-form-field">
                                    <li>
                                            <span class="field-txt">First Name</span>
                                            <input class="field-area" name="con_fname" required="required" type="text">
                                    </li>
                                    
                                    <li>
                                            <span class="field-txt">Email Address</span>
                                            <input class="field-area" name="data[Contact][email]" required="true"  type="text">
                                    </li>
                                    
                                    <li>
                                            <span class="field-txt">Messages</span>
                                            <textarea cols="" name="con_msg" class="field-message" required="required"></textarea>
                                    </li>
                                    <li><?php
echo $this->Html->image($this->Html->url(array('controller'=>'contact', 'action'=>'captcha'), true),array('id'=>'img-captcha','vspace'=>2));
echo '<p><a href="#" id="a-reload">Can\'t read? Reload</a></p>';
echo '<p>Enter security code shown above:</p>';
echo $this->Form->input('Contact.captcha',array('autocomplete'=>'off','label'=>false,'class'=>''));
?>
									</li>
                                    <li>
                                            <input class="field-submit" name="submit" value="Submit" type="submit">
                                    </li>
                            
                            </ul>
			<?php echo $this->Form->end(); ?>
                    </div>
            </div>
          </div>
        </section>      
</div>
	<script>
		function process_form(){
				var x=document.forms["myForm"]["email"].value;
				var atpos=x.indexOf("@");
				var dotpos=x.lastIndexOf(".");
				if (atpos<1 || dotpos<atpos+2 || dotpos+2>=x.length)
				  {
				  alert("Not a valid e-mail address");
				  
				  return false;
				  }
		}

$('#a-reload').click(function() {
	var $captcha = $("#img-captcha");
    $captcha.attr('src', $captcha.attr('src')+'?'+Math.random());
	return false;
});
</script>