<?php
	//print_r($_POST);
?>
<!DOCTYPE HTML>
<html>
		<head>
		<title>American Homes Online</title>
		<meta http-equiv="content-type" content="text/html; charset=utf-8" />
		<meta name="description" content="" />
		<meta name="keywords" content="" />
		<!--[if lte IE 8]><script src="css/ie/html5shiv.js"></script><![endif]-->
		<script src="js/jquery.min.js"></script>
		<script type="text/javascript">
    $(document).ready(function(){
        $(".custom-select").each(function(){
            $(this).wrap("<span class='select-wrapper'></span>");
            $(this).after("<span class='holder'></span>");
        });
        $(".custom-select").change(function(){
            var selectedOption = $(this).find(":selected").text();
            $(this).next(".holder").text(selectedOption);
        }).trigger('change');
	
	

    });   
    
    function check_form()  
    {
		var property_location = $('#property_location').val().trim();
		var property_type = $('#property_type').val().trim();
		
		var bedrooms =  $('#bedrooms').val().trim();
		//var bathrooms = $('#bathrooms').val().trim();
		if (property_location.length<=0) {
				
				alert('Enter the Property Location.');
				$('html, body').animate({
						scrollTop: $("#property_location").offset().top
				}, 100);
				$('#property_location').focus();
				return false;
				
		}
		else if (property_type.length<=0) {
				//$('#property_type').addClass('error');
				alert('Select the Property Type.');
				$('html, body').animate({
						scrollTop: $("#property_location").offset().top
				}, 100);
				$('#property_type').focus();
				return false;
				
		}
		else if (bedrooms.length<=0 ||parseInt(bedrooms)<=0) {
				//$('#bedrooms').addClass('error');
				alert('Select No. of Bedrooms.');
				$('html, body').animate({
						scrollTop: $("#property_type").offset().top
				}, 100);
				$('#bedrooms').focus();
				return false;
				
		}
		/*else if (bathrooms.length<=0 ||parseInt(bathrooms)<=0) {
				//$('#bathrooms').addClass('error');
				alert('Select No. of Bathrooms.');
				$('html, body').animate({
						scrollTop: $("#property_type").offset().top
				}, 100);
				$('#bathrooms').focus();
				return false;
				
		}*/
		else{
				return true;
		}
    }
    
</script>
		<script src="js/jquery.poptrox.min.js"></script>
		<script src="js/skel.min.js"></script>
		<script src="js/init.js"></script>
		<!--<noscript>-->
        <!--<link rel="stylesheet" href="css/skel-noscript.css" />-->
        <link rel="stylesheet" href="css/style.css" />
	<link rel="stylesheet" type="text/css" href="css/buy_style.css" />
	<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,600,600italic,700' rel='stylesheet' type='text/css'>
	<script type="text/javascript" src="http://code.jquery.com/jquery-1.9.1.js"></script>
        <!--</noscript>-->
		<!--[if lte IE 8]><link rel="stylesheet" href="css/ie/v8.css" /><![endif]-->
<script src="http://maps.googleapis.com/maps/api/js?v=3.exp&sensor=false&libraries=places"></script>
		<script>
// This example displays an address form, using the autocomplete feature
// of the Google Places API to help users fill in the information.

var placeSearch, autocomplete;
var componentForm = {
  street_number: 'short_name',
  route: 'long_name',
  locality: 'long_name',
  administrative_area_level_1: 'short_name',
  country: 'long_name',
  postal_code: 'short_name'
};

function initialize() {
  // Create the autocomplete object, restricting the search
  // to geographical location types.
  autocomplete = new google.maps.places.Autocomplete(
      /** @type {HTMLInputElement} */(document.getElementById('property_location')),
      { types: ['geocode'] });
  // When the user selects an address from the dropdown,
  // populate the address fields in the form.
  google.maps.event.addListener(autocomplete, 'place_changed', function() {
    fillInAddress();
  });
}

// [START region_fillform]
function fillInAddress() {
  // Get the place details from the autocomplete object.
  var place = autocomplete.getPlace();

  for (var component in componentForm) {
    document.getElementById(component).value = '';
    document.getElementById(component).disabled = false;
  }

  // Get each component of the address from the place details
  // and fill the corresponding field on the form.
  for (var i = 0; i < place.address_components.length; i++) {
    var addressType = place.address_components[i].types[0];
    if (componentForm[addressType]) {
      var val = place.address_components[i][componentForm[addressType]];
      document.getElementById(addressType).value = val;
    }
  }
}
// [END region_fillform]

// [START region_geolocation]
// Bias the autocomplete object to the user's geographical location,
// as supplied by the browser's 'navigator.geolocation' object.
function geolocate() {
  if (navigator.geolocation) {
    navigator.geolocation.getCurrentPosition(function(position) {
      var geolocation = new google.maps.LatLng(
          position.coords.latitude, position.coords.longitude);
      autocomplete.setBounds(new google.maps.LatLngBounds(geolocation,
          geolocation));
    });
  }
}
// [END region_geolocation]

    </script>
		<style>
<?php  error_reporting(0);
 $images = array("house1.jpg", "house2.jpg", "house3.jpg", "house4.jpg", "house5.jpg");
 $rand = array_rand($images);
 ?>  #intro {
 background:url('images/<?php print $images[$rand] ?>');
 background-size:100%;
 background-attachment:fixed;
 background-position:bottom center;
 background-repeat:no-repeat;
}
#AHO-Remote-Load a { color: #000; }

</style>
</head><body onload="initialize()" >
<!-- Header -->
<?php include('header.php'); ?>
<style>
	.language{display: none !important;}
</style>
<div class="container">
    <!-- Header -->

  <div class="inner-wrap">
	
    <div class="form-title">
    <table>
    	<tr>
        	<td><img src="images/border-style.png" /></td>
            <td><h1>Selling Your Home</h1></td>
            <td><img src="images/border-style.png" /></td>
        </tr>
    </table>
     <!-- <h1>Buy your dream home</h1>
      <span> </span>-->
      <div class="title-txt">Fill out the form and receive 100% accurate, sold properties from your closest
<p><b>"Personal Intelligent Agent".  </b></p>
      </div>
    </div>
    <!---->
    <!--<form method="post" name="buy_form" id="buy_form">-->
    <div class="buy-form"><form method="post" name="sell_form" id="sell_form" action="personal_details.php">
      <div class="form-row full">
        <label><span>*</span>Location</label>
        <input type="text" placeholder="Enter Neighbohood, City, Town or Zip code" class="full" id="property_location" name="property_location"/>
      </div>
      <div class="form-row full">
        <label><span>*</span>Property Type</label>
        <select class="custom-select" id="property_type" name="property_type" >
          <option value="">Select property type...</option>
          <option value="All">All</option>
          <option value="Single Family Home">Single Family Home</option>
          <option value="Condo">Condo</option>
          <option value="Townhome">Townhome</option>
          <option value="Coop">Coop</option>
          <option value="Apartment">Apartment</option>
          <option value="Mobile/Manufactured">Mobile/Manufactured</option>
          <option value="Farm/Ranch">Farm/Ranch</option>
          <option value="Lot/Land">Lot/Land</option>
          <option value="Multi-Family Home">Multi-Family Home</option>
          <option value="Income/Investment">Income/Investment</option>
        </select>
        <div class="clear"></div>
      </div>
      
      <div class="form-row half">

          <div class="sec">
            <label><span>*</span>Bedrooms</label>
            <select class="custom-select" id="bedrooms" name="bedrooms">
              <option value="">How many rooms do you have?</option>
              <option value="1">+1</option>
              <option value="2">+2</option>
              <option value="3">+3</option>
              <option value="4">+4</option>
	      <option value="5">+5</option>
            </select>
          </div>


          <div class="sec">
            <label><!--<span>*</span>-->Bathrooms</label>
            <select class="custom-select" id="bathrooms" name="bathrooms">
              <option value="">How many bathrooms do you have?</option>
              <option value="1">+1</option>
              <option value="2">+2</option>
              <option value="3">+3</option>
              <option value="4">+4</option>
	      <option value="5">+5</option>
            </select>
          </div>
        <div class="clear"></div>
      </div>
      
      <div class="form-row">
        <label>Summarize</label>
        <textarea placeholder="Example:- We have 1story, 2 story, pool, hi-rise, elevator, pet friendly, water view, docking rights etc." id="comment" name="comment"></textarea>
      </div>
      <div class="form-row">
        <div class="submit-btn">
	 <input type="hidden" value="3" name="request_type" id="request_type"/> <!-- type 3 for sell -->
          <input type="submit" value="Submit" onclick="return check_form()" />
        </div>
        <div class="required"><a href="#">* Required Fields.</a></div>
        <div class="clear"></div>
      </div> </form>
    </div>
    <!---->
  
  </div>
</div>
<?php include('footer.php'); ?>
</body>
</html>