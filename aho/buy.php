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
		var min_price = $('#min_price').val();
		var max_price = $('#max_price').val();
		var bedrooms =  $('#bedrooms').val().trim();
		//var bathrooms = $('#bathrooms').val().trim();
		if (property_location.length<=0) {
				//$('#property_location').addClass('error');
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
		else if (min_price.length<=0) {
				//$('#min_price').addClass('error');
				alert('Enter the Minimum Price.');
				$('html, body').animate({
						scrollTop: $("#property_type").offset().top
				}, 100);
				$('#min_price').focus();
				return false;
				
		}
		else if (max_price.length<=0) {
				//$('#max_price').addClass('error');
				alert('Enter the Maximum Price.');
				$('html, body').animate({
						scrollTop: $("#property_type").offset().top
				}, 100);
				$('#max_price').focus();
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
				/*min_price = $('#min_price').val().split('$');
				min_price = min_price.join('');
				min_price = min_price.split(',');
				min_price = min_price.join('');
				min_price = parseFloat(min_price);
				$('#min_price').val(min_price);
				
				max_price=$('#max_price').val().split('$');
				max_price = max_price.join('');
				max_price=max_price.split(',');
				max_price = max_price.join('');
				parseFloat(max_price);
				$('#max_price').val(max_price);
				
				if (isNaN(min_price) || min_price<=0) {
						alert('Minimum Price must be greater than 0.');
						$('html, body').animate({
								scrollTop: $("#property_type").offset().top
						}, 100);
						$('#min_price').focus();
						return false;
				}
				else if (isNaN(max_price) || max_price<=0) {
						alert('Maximum Price must be greater than 0.');
						$('html, body').animate({
								scrollTop: $("#property_type").offset().top
						}, 100);
						$('#max_price').focus();
						return false;
				}
				else if (parseFloat(max_price)<parseFloat(min_price)) {
					alert('Maximum Price must be greater than Minimum Price.');
					$('html, body').animate({
							scrollTop: $("#property_type").offset().top
					}, 100);
					set_format($('#min_price'));
					set_format($('#max_price'));
					$('#max_price').focus();
					return false;
				}
				else{
					return true;	
				}*/
				return true;
				
		}
    }
    /*function set_format(obj) {
		var myvalue = $(obj).val();
		myvalue = myvalue.split('$');
		myvalue= myvalue.join('');
		myvalue=digits(myvalue);
		myvalue = '$'+myvalue;
		$(obj).val(myvalue);
		
    }
    function digits(num){ 
		
		    return num.replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1,") ; 
		
    }	  */    
    
    
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
        <!--</noscript>-->
		<!--[if lte IE 8]><link rel="stylesheet" href="css/ie/v8.css" /><![endif]-->

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
</head><body  onload="initialize()">
<!-- Header -->
<?php include('header.php'); ?>
<style>
	.goog-te-menu-value{margin-top:-50px !important;padding-left:5px;float:right;}
	#nav ul li#hire a {bottom: 8px;}
	.language{display:none !important;}
</style>
<div class="container">
    <!-- Header -->

  <div class="inner-wrap">
	
    <div class="form-title">
    <table>
    	<tr>
        	<td><img src="images/border-style.png" /></td>
            <td><h1>Buy your dream home</h1></td>
            <td><img src="images/border-style.png" /></td>
        </tr>
    </table>
     <!-- <h1>Buy your dream home</h1>
      <span> </span>-->
      <div class="title-txt"> Fill out the form and receive 100% accurate, available properties from your closest <p><b>"Personal Intelligent Agent"</b> </p><!--are available at a moment's notice & provide accurate listings.
Our Goal is to Provide, <i>"Customer Support & Professional Real Estate Guidance"</i>.--></div>
    </div>
    <!---->
    <!--<form method="post" name="buy_form" id="buy_form">-->
    <div class="buy-form">
		<form method="post" name="buy_form" id="buy_form" action="personal_details.php">
      <div class="form-row full">
        <label><span>*</span>Location</label>
        <input type="text" placeholder="Enter Neighbohood, City, Town or Zip code" class="full" id="property_location" name="property_location"/>
      </div>
	  
	  
      <div class="form-row half">
        <div class="sec"><label><span>*</span>Property Type</label>
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
        </select></div>
		
		<div class=" small">
          <div class="sec new-sec">
            <label><span>*</span>Price</label>
            <select class="custom-select small r" id="min_price" name="min_price">
          <option value="">Min Price...</option>
          <option value="10,000">$ 10,000</option>
          <option value="20,000">$ 20,000</option>
          <option value="30,000">$ 30,000</option>
          <option value="40,000">$ 40,000</option>
          <option value="50,000">$ 50,000</option>
          <option value="60,000">$ 60,000</option>
          <option value="70,000">$ 70,000</option>
          <option value="80,000">$ 80,000</option>
          <option value="90,000">$ 90,000</option>
          <option value="100,000">$ 100,000</option>
          <option value="150,000">$ 150,000</option>
		  <option value="200,000">$ 200,000</option>
		  <option value="250,000">$ 250,000</option>
		  <option value="300,000">$ 300,000</option>
		  <option value="350,000">$ 350,000</option>
		  <option value="400,000">$ 400,000</option>
		  <option value="450,000">$ 450,000</option>
          <option value="500,000">$ 500,000</option>
		  <option value="600,000">$ 600,000</option>
          <option value="700,000">$ 700,000</option>
		  <option value="800,000">$ 800,000</option>
          <option value="900,000">$ 900,000</option>
          <option value="1,000,000">$ 1,000,000</option>
		  <option value="1,250,000">$ 1,250,000</option>
		  <option value="1,500,000">$ 1,500,000</option>
          <option value="2,000,000">$ 2,000,000</option>
          <option value="2,500,000">$ 2,500,000</option>
          <option value="3,000,000">$ 3,000,000</option>
          <option value="3,500,000">$ 3,500,000</option>
          <option value="4,000,000">$ 4,000,000</option>
          <option value="5,000,000">$ 5,000,000</option>
		  <option value="10,000,000">$ 10,000,000</option>
		  <option value="15,000,000">$ 15,000,000</option>
        </select>
            <span class="to new-to">to</span>
           <select class="custom-select small lr" id="max_price" name="max_price">
		   <option value="">Max Price...</option>
          <option value="10,000">$ 10,000</option>
          <option value="20,000">$ 20,000</option>
          <option value="30,000">$ 30,000</option>
          <option value="40,000">$ 40,000</option>
          <option value="50,000">$ 50,000</option>
          <option value="60,000">$ 60,000</option>
          <option value="70,000">$ 70,000</option>
          <option value="80,000">$ 80,000</option>
          <option value="90,000">$ 90,000</option>
          <option value="100,000">$ 100,000</option>
          <option value="150,000">$ 150,000</option>
		  <option value="200,000">$ 200,000</option>
		  <option value="250,000">$ 250,000</option>
		  <option value="300,000">$ 300,000</option>
		  <option value="350,000">$ 350,000</option>
		  <option value="400,000">$ 400,000</option>
		  <option value="450,000">$ 450,000</option>
          <option value="500,000">$ 500,000</option>
		  <option value="600,000">$ 600,000</option>
          <option value="700,000">$ 700,000</option>
		  <option value="800,000">$ 800,000</option>
          <option value="900,000">$ 900,000</option>
          <option value="1,000,000">$ 1,000,000</option>
		  <option value="1,250,000">$ 1,250,000</option>
		  <option value="1,500,000">$ 1,500,000</option>
          <option value="2,000,000">$ 2,000,000</option>
          <option value="2,500,000">$ 2,500,000</option>
          <option value="3,000,000">$ 3,000,000</option>
          <option value="3,500,000">$ 3,500,000</option>
          <option value="4,000,000">$ 4,000,000</option>
          <option value="5,000,000">$ 5,000,000</option>
		  <option value="10,000,000">$ 10,000,000</option>
		  <option value="15,000,000">$ 15,000,000</option>
        </select>
          </div>
         
        <div class="clear"></div>
      </div>
		
        <div class="clear"></div>
      </div>
     
      <div class="form-row half">

          <div class="sec">
            <label><span>*</span>Bedrooms</label>
            <select class="custom-select" id="bedrooms" name="bedrooms">
              <option value="">How many rooms do you need?</option>
              <option value="1">+1</option>
              <option value="2">+2</option>
              <option value="3">+3</option>
              <option value="4">+4</option>
	      <option value="5">+5</option>
            </select>
          </div>

     <div class="sec">
            <label>Bathrooms</label>
            <select class="custom-select" id="bathrooms" name="bathrooms">
              <option value="">How many bathrooms do you need?</option>
              <option value="1">+1</option>
              <option value="2">+2</option>
              <option value="3">+3</option>
              <option value="4">+4</option>
	      <option value="5">+5</option>
            </select>
          </div>
        <div class="clear"></div>
      </div>
      <div class="form-row half">

          <div class="sec">
            <label>Lot Size <span class="acer-sq">(1 acre = 43,560 sq ft)</span></label>
            <select class="custom-select" id="lot_size" name="lot_size">
              <option value="">Select Lot size</option>
              <option value="Any">Any</option>
              <option value="1/2 or More Acres">1/2 or More Acres</option>
              <option value="1 or More Acres">1 or More Acres</option>
              <option value="2 or More Acres">2 or More Acres</option>
              <option value="5 or More Acres">5 or More Acres</option>
              <option value="10 or More Acres">10 or More Acres</option>
              <option value="20 or More Acres">20 or More Acres</option>
              <option value="100 or More Acres">100 or More Acres</option>
            </select>
          </div>

 <div class="sec half">
            <label>Min. Square Ft</label>
            <input type="text" placeholder="Min. Square Ft" class="sm" id="min_sqft" name="min_sqft"/>
          </div>

         

        <div class="clear"></div>
      </div>
      <div class="form-row">
        <label>Summarize</label>
        <textarea placeholder="Example:- We prefer 1story, 2 story, pool, hi-rise, elevator, pet friendly, water view, docking rights etc." id="comment" name="comment"></textarea>
      </div>
      <div class="form-row">
        <div class="submit-btn">
	  <input type="hidden" value="1" name="request_type" id="request_type"/> <!-- type 1 for buy -->
		 
          <input type="submit" value="Submit" onclick="return check_form()" id="property_request" name="property_request" />
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