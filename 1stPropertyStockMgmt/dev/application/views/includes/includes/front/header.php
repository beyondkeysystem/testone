<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>MyVikoHome</title>

<?php if($this->uri->segment(1)=="tickets"){?>

<!-- Le styles -->
        <link href="<?php echo base_url(); ?>css/bootstrap.css" rel="stylesheet">
        <link href="<?php echo base_url(); ?>css/bootstrap-responsive.css" rel="stylesheet">
        <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
        <!--[if lt IE 9]>
        <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
        <![endif]-->
        <!--[if IE 7]>
        <link rel="stylesheet" href="css/font-awesome-ie7.min.css">
        <![endif]-->
        <link rel="stylesheet" href="<?php echo base_url(); ?>css/font-awesome.css">
        <link rel="stylesheet" href="<?php echo base_url(); ?>css/select2.css">
        <link href="<?php echo base_url(); ?>css/custom.css" rel="stylesheet">
        <script src="<?php echo base_url(); ?>js/jquery-1.8.3.min.js"></script>
        <script src="<?php echo base_url(); ?>js/bootstrap.js"></script>
        <script src="<?php echo base_url(); ?>js/select2.js"></script>
        
        <script src="<?php echo base_url(); ?>js/jquery-bootalert.js"></script>
        <script src="<?php echo base_url(); ?>js/custom.js"></script>
        
        <!-- Tablesorter: required for bootstrap -->
        <link rel="stylesheet" href="<?php echo base_url(); ?>css/theme.bootstrap.css">
        <script src="<?php echo base_url(); ?>js/jquery.tablesorter.js"></script>
        <script src="<?php echo base_url(); ?>js/jquery.tablesorter.widgets.js"></script>

    <!-- Tablesorter: optional -->
        <link rel="stylesheet" href="<?php echo base_url(); ?>css/jquery.tablesorter.pager.css">
        <script src="<?php echo base_url(); ?>js/jquery.tablesorter.pager.js"></script>
        <script src="<?php echo base_url(); ?>js/tablesorter.js"></script>
        <script src="<?php echo base_url(); ?>js/bootbox.js"></script>

<?php } else{ ?>
<script src="<?php echo base_url(); ?>js/jquery-1.8.3.min.js"></script>
<?php } ?>


<?php if($this->uri->segment(2)=="openticket"){?>

<!-- Le styles -->
        <link href="<?php echo base_url(); ?>css/bootstrap.css" rel="stylesheet">
        <link href="<?php echo base_url(); ?>css/bootstrap-responsive.css" rel="stylesheet">
        <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
        <!--[if lt IE 9]>
        <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
        <![endif]-->
        <!--[if IE 7]>
        <link rel="stylesheet" href="css/font-awesome-ie7.min.css">
        <![endif]-->
        <link rel="stylesheet" href="<?php echo base_url(); ?>css/font-awesome.css">
        <link rel="stylesheet" href="<?php echo base_url(); ?>css/select2.css">
        <link href="<?php echo base_url(); ?>css/custom.css" rel="stylesheet">
        <script src="<?php echo base_url(); ?>js/jquery-1.8.3.min.js"></script>
        <script src="<?php echo base_url(); ?>js/bootstrap.js"></script>
        <script src="<?php echo base_url(); ?>js/select2.js"></script>
        
        <script src="<?php echo base_url(); ?>js/jquery-bootalert.js"></script>
        <script src="<?php echo base_url(); ?>js/custom.js"></script>
        
        <!-- Tablesorter: required for bootstrap -->
        <link rel="stylesheet" href="<?php echo base_url(); ?>css/theme.bootstrap.css">
        <script src="<?php echo base_url(); ?>js/jquery.tablesorter.js"></script>
        <script src="<?php echo base_url(); ?>js/jquery.tablesorter.widgets.js"></script>

    <!-- Tablesorter: optional -->
        <link rel="stylesheet" href="<?php echo base_url(); ?>css/jquery.tablesorter.pager.css">
        <script src="<?php echo base_url(); ?>js/jquery.tablesorter.pager.js"></script>
        <script src="<?php echo base_url(); ?>js/tablesorter.js"></script>
        <script src="<?php echo base_url(); ?>js/bootbox.js"></script>

<?php }?>


<?php if($this->uri->segment(2)=="create"){?>

<!-- Le styles -->
        <link href="<?php echo base_url(); ?>css/bootstrap.css" rel="stylesheet">
        <link href="<?php echo base_url(); ?>css/bootstrap-responsive.css" rel="stylesheet">
        <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
        <!--[if lt IE 9]>
        <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
        <![endif]-->
        <!--[if IE 7]>
        <link rel="stylesheet" href="css/font-awesome-ie7.min.css">
        <![endif]-->
        <link rel="stylesheet" href="<?php echo base_url(); ?>css/font-awesome.css">
        <link rel="stylesheet" href="<?php echo base_url(); ?>css/select2.css">
        <link href="<?php echo base_url(); ?>css/custom.css" rel="stylesheet">
        <script src="<?php echo base_url(); ?>js/jquery-1.8.3.min.js"></script>
        <script src="<?php echo base_url(); ?>js/bootstrap.js"></script>
        <script src="<?php echo base_url(); ?>js/select2.js"></script>
        
        <script src="<?php echo base_url(); ?>js/jquery-bootalert.js"></script>
        <script src="<?php echo base_url(); ?>js/custom.js"></script>
        
        <!-- Tablesorter: required for bootstrap -->
        <link rel="stylesheet" href="<?php echo base_url(); ?>css/theme.bootstrap.css">
        <script src="<?php echo base_url(); ?>js/jquery.tablesorter.js"></script>
        <script src="<?php echo base_url(); ?>js/jquery.tablesorter.widgets.js"></script>

    <!-- Tablesorter: optional -->
        <link rel="stylesheet" href="<?php echo base_url(); ?>css/jquery.tablesorter.pager.css">
        <script src="<?php echo base_url(); ?>js/jquery.tablesorter.pager.js"></script>
        <script src="<?php echo base_url(); ?>js/tablesorter.js"></script>
        <script src="<?php echo base_url(); ?>js/bootbox.js"></script>

<?php }?>
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/front/css/jquery.nouislider.min.css">
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/front/css/font-awesome.min.css">
<link href="<?php echo base_url(); ?>assets/front/css/owl.carousel.css" rel="stylesheet">
<link href="<?php echo base_url(); ?>assets/front/css/owl.theme.css" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/front/css/style.css">
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/front/css/loader.css">
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/front/css/loader_txt.css">
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/front/css/responsive.css">
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/front/css/bootstrap-multiselect.css">




<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,600,700,400italic,600italic,700italic' rel='stylesheet' type='text/css'>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/front/js/jquery-ui.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/front/js/jquery.reveal.js"></script>
<script src="https://maps.googleapis.com/maps/api/js?v=3.exp&sensor=false&libraries=places"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/front/js/jquery.nouislider.all.min.js"></script>


<!-- by Mayank
** Date: 20.11.14
 -->
<!-- <script type="text/javascript" src="<?php echo base_url(); ?>assets/front/js/bootstrap-multiselect.js"></script> -->

    <link rel="stylesheet" href="<?php echo base_url(); ?>docs/css/bootstrap-3.2.0.min.css" type="text/css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>docs/css/bootstrap-example.css" type="text/css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>docs/css/prettify.css" type="text/css">

    <script type="text/javascript" src="<?php echo base_url(); ?>docs/js/bootstrap-3.2.0.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>docs/js/prettify.js"></script>

    <link rel="stylesheet" href="<?php echo base_url(); ?>dist/css/bootstrap-multiselect.css" type="text/css">
    <script type="text/javascript" src="<?php echo base_url(); ?>dist/js/bootstrap-multiselect.js"></script>
<!-- End -->
 <script>
$(function() {
$( "#admin_tabs" ).tabs();
});
</script>
<script>
$(document).ready(function(){
  $(".admin_head_right").click(function(){
     $(".admin_head_right ul").toggle();
	 $(this).toggleClass('adminactive');
  });
});
</script>

<script type="text/javascript">

$(document).ready(function(){
    $('.main-image #2').hide();
    $('.main-image #3').hide();
    $('.main-image #4').hide();
    $('.main-image #5').hide();

    $('.thumbnails .thumb').click(function() {
    var id = $(this).attr( "id" );
     $('.main-image .main').hide();
    $('.main-image #' + id).show();
    });
    
    });
</script>

<script src="<?php echo base_url(); ?>assets/front/js/easyResponsiveTabs.js" type="text/javascript"></script>
<!--[if lte IE 8]>
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/front/css/ie.css">
<![endif]-->
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
	$( "select" )
	  .change(function () {
	  var str = "";
	  var str2 = "";
	  $( "select option:selected" ).each(function() {
	  str += $( this ).text();
	  str2 += $( this ).val();
	  });
	  $( "#item" ).val( str );
	  $( "#amount" ).val( str2 );
	  })
	  .change();
	  
    });
</script>
<?php if($this->uri->segment(1)=="contact"){?>
<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyASm3CwaK9qtcZEWYa-iQwHaGi3gcosAJc&sensor=false"></script>

<script type="text/javascript">
            google.maps.event.addDomListener(window, 'load', init);
            function init() {
                var mapOptions = {
                    zoom: 11,
                    center: new google.maps.LatLng(3.130146,101.686253), 
                    styles: [{"featureType":"landscape","elementType":"labels","stylers":[{"visibility":"off"}]},{"featureType":"transit","elementType":"labels","stylers":[{"visibility":"off"}]},{"featureType":"poi","elementType":"labels","stylers":[{"visibility":"off"}]},{"featureType":"water","elementType":"labels","stylers":[{"visibility":"off"}]},{"featureType":"road","elementType":"labels.icon","stylers":[{"visibility":"off"}]},{"stylers":[{"hue":"#00aaff"},{"saturation":-100},{"gamma":2.15},{"lightness":12}]},{"featureType":"road","elementType":"labels.text.fill","stylers":[{"visibility":"on"},{"lightness":24}]},{"featureType":"road","elementType":"geometry","stylers":[{"lightness":57}]}]
                };
                var mapElement = document.getElementById('map');
                var map = new google.maps.Map(mapElement, mapOptions);
            }
        </script>
<?php } ?>
<script type="text/javascript">

$(document).ready(function(){
$('#tabs .clsdiv').hide();
$('#tabs .clsdiv:first').show();
$('#tabs ul li:first').addClass('active');
$('#tabs ul li a').click(function(){ 
$('#tabs ul li').removeClass('active');
$(this).parent().addClass('active'); 
var currentTab = $(this).attr('href'); 
$('#tabs .clsdiv').hide();
$(currentTab).show();
return false;
});
});
</script>
</head>

<body>
<!--Header Top-->
<div class="wrapper">
  <div class="top">
    <ul class="header_top Left">
      <li class="fb"><a href="#"><i class="fa fa-facebook"></i></a></li>
      <li class="twt"><a href="#"><i class="fa fa-twitter"></i></a></li>
      <li class="in"><a href="#"><i class="fa fa-linkedin"></i></a></li>
      <li class="pin"><a href="#"><i class="fa fa-pinterest"></i></a></li>
    </ul>
    <?php   if(!$this->session->userdata('is_logged_in')){
   ?>
    <ul class="header_top Right">
      <li><a href="#"><i class="fa fa-user"></i><?php if($this->lang->line('header_call')){echo ($this->lang->line('header_call')); } else{ echo 'Call: +011 9876 554 021';}?></a></li>
      <li><a href="javascript:void(0);" class="big-link" data-reveal-id="myModal" data-animation="fade"><i class="fa fa-user"></i><?php if($this->lang->line('header_login')){echo ($this->lang->line('header_login'));} else{ echo 'Login';} ?></a></li>
      <li><a href="<?php echo site_url('register'); ?>"><i class="fa fa-pencil"></i><?php if($this->lang->line('header_register')){echo ($this->lang->line('header_register'));} else{ echo 'Register';} ?></a></li>
      <li><a href="#"><?php if($this->lang->line('hello')){echo ($this->lang->line('hello'));} else{ echo 'Language';} ?> <i class="fa fa-caret-down"></i></a>
      	<ul class="top-menu">
        	<li><a href="<?php echo site_url('home/langswitch/en/'); ?>">English</a></li>
            <li><a href="<?php echo site_url('home/langswitch/ml/'); ?>">Malay</a></li>
            <li><a href="<?php echo site_url('home/langswitch/ch/'); ?>">Chinese</a></li>
        </ul>
	<?php } else{ ?>
	<ul class="header_top Right">
      <li><a href="#"><i class="fa fa-user"></i><?php if($this->lang->line('header_welcome')){echo ($this->lang->line('header_welcome')); } else{ echo 'Welcome';}?>&nbsp;<?php echo $this->session->userdata('user_name');?></a></li>
      <li><a href="#"><i class="fa fa-user"></i><?php if($this->lang->line('header_call')){echo ($this->lang->line('header_call')); } else{ echo 'Call: +011 9876 554 021';}?></a></li>
      <li><a href="#"><?php if($this->lang->line('hello')){echo ($this->lang->line('hello'));} else{ echo 'Language';} ?> <i class="fa fa-caret-down"></i></a>
      	<ul class="top-menu">
        	<li><a href="<?php echo site_url('home/langswitch/en/'); ?>">English</a></li>
            <li><a href="<?php echo site_url('home/langswitch/ml/'); ?>">Malay</a></li>
            <li><a href="<?php echo site_url('home/langswitch/ch/'); ?>">Chinese</a></li>
        </ul>
	<?php } ?>
      </li>
      <li class="search_box"><a href="#"><i class="fa fa-search"></i></a><input type="text"></li>
    
      <?php   if($this->session->userdata('is_logged_in')){
   ?>
    <div class="admin_head_right">
        <?php if($this->session->userdata('user_image')){$user_image=$this->session->userdata('user_image');}else{$user_image="admin.png";} ?>
    	<a href="#" class="admin_profile_name"><img src="<?php echo base_url(); ?>uploads/<?php echo $user_image; ?>" alt=""> <span><?php echo $this->session->userdata('user_name'); ?></span><span class="toggle_arrow"><i class="fa fa-chevron-down"></i></span></a>
        <ul class="profile">
                 <li><a href="<?php echo site_url('dashboard'); ?>"><i class="fa fa-user"></i> <?php if($this->lang->line('header_dashboard')){echo ($this->lang->line('header_dashboard'));} else{ echo 'Dashboard';} ?></a></li>
        	<li><a href="<?php echo site_url('my_profile'); ?>"><i class="fa fa-user"></i><?php if($this->lang->line('header_my_profile')){echo ($this->lang->line('header_my_profile'));} else{ echo 'My Profile';} ?></a></li>
            <!--<li><a href="#"><i class="fa fa-cog"></i><?php if($this->lang->line('header_my_account')){echo ($this->lang->line('header_my_account'));} else{ echo 'My Account';} ?></a></li>-->
            <li><a href="<?php echo site_url('logout'); ?>"><i class="fa fa-power-off"></i> <?php if($this->lang->line('header_logout')){echo ($this->lang->line('header_logout'));} else{ echo 'Logout';} ?></a></li>
         
        </ul>  
        
    </div>
    <?php } ?>
    </ul>
    <div class="clear"></div>
  </div>
</div>
<!--/.Header Top-->
<!--Popup-->
  <div class="reveal-modal popup" id="myModal">
    <h3>Signin with your account</h3>
    <div class="close"><a href="#" class="close-reveal-modal">close <i class="fa fa-close"></i></a></div>
    <div class="clear"></div>
   <?php echo form_open('user/validate_credentials_user'); ?>
    <div class="reg-form-row">
      <div class="row-col1">
        <label>Username</label>
        <input type="text" name="user_name">
      </div>
      <div class="row-col1">
        <label>Password</label>
        <input type="password" name="password">
      </div>
    </div>
    <div class="remem">
    	<!--<div class="check"><input type="checkbox"> Remember me on this computer</div>-->
        <a href="<?php echo site_url('forget'); ?>">Forgot Password</a>
    </div>
    <div class="search_btn"><input type="submit" value="Signin"></div>
    <div class="signup">Not A Member ?   <a href="<?php echo site_url('register'); ?>"> Sign up Now!</a></div>
    <?php echo form_close(); ?>
  </div>
<!--/.Popup-->
