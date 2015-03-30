<!DOCTYPE HTML>
<?php
include("aho-ui/connect.php");
include("aho-ui/functions.php");
include("aho-ui/scripts.php");
// include("aho-ui/header.php");
// include("aho-ui/content.php");
// include("aho-ui/footer.php");
?>

<html>
	<head>
		<title>AHO - Agent Management</title>
		<meta http-equiv="content-type" content="text/html; charset=utf-8" />
		<meta name="description" content="" />
		<meta name="keywords" content="" />
		<!--[if lte IE 8]><script src="../css/ie/html5shiv.js"></script><![endif]-->
		<script src="../js/jquery.min.js"></script>
		<script src="../js/jquery.poptrox.min.js"></script>
		<script src="../js/skel.min.js"></script>
		<script src="../js/init.js"></script>
		<noscript>
			<link rel="stylesheet" href="../css/skel-noscript.css" />
			<link rel="stylesheet" href="../css/style.css" />
		</noscript>
		<!--[if lte IE 8]><link rel="stylesheet" href="../css/ie/v8.css" /><![endif]-->
		<link href="http://fonts.googleapis.com/css?family=Source+Sans+Pro:200,300,400,600" rel="stylesheet" type="text/css" />
		
		<!-- Add fancyBox -->
		<link rel="stylesheet" href="extra/js/jquery.fancybox.css?v=2.1.5" type="text/css" media="screen" />
		<script type="text/javascript" src="extra/js/jquery.fancybox.pack.js?v=2.1.5"></script>
		<script type="text/javascript" src="extra/js/jquery.fancybox-media.js?v=1.0.6"></script>

<script type="text/javascript">
$(document).ready(function() {
	$(".various").fancybox({
		maxWidth	: 800,
		maxHeight	: 600,
		fitToView	: false,
		width		: '70%',
		height		: '70%',
		autoSize	: false,
		closeClick	: false,
		openEffect	: 'none',
		closeEffect	: 'none'
	});
});

$(document).ready(function() {
	$(".fancybox").fancybox({
		openEffect	: 'none',
		closeEffect	: 'none'
	});
});
</script>
	</head>
	<body>
<?php 

	$sql = "SELECT * FROM AHO_User WHERE id = '$User_ID' ";
	$sql_result = mysql_query($sql);
	$row = mysql_fetch_array($sql_result);

	$User_Name = $row["Name"];
?>
		<!-- Header -->
<?php include('aho-ui/header.php'); ?>

		<!-- Intro -->
			<section  >
				<div class="content container small" style="color:#444;">
					<?php // include("aho-ui/content.php"); ?>
				</div>
			</section>

	<?php include('footer.php'); ?>	
	</body>
</html>