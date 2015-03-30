<?
	require_once("../../classes/class_db.php");
	global $objDb ;
	$objDb->Connection() ;
//////////////////
	$vid = $_REQUEST['vid'];
	//s$vid = 'Main.flv';	
	$str_xml = '<?xml version="1.0" encoding="UTF-8"?>
				<video>
				<config
					videoWidth = "560"
					videoHeight = "370"
					videoBufferTime = "2"
					autoStartVideoPlay = "yes"
					autoNextVideo = "yes"
					videoStartVolume = "75"
					playerSkinNumber="4"
					showLogo = "no"
					videoBarColorName = "blue"
					volumeBarColorName = "blue"
					showCoverImage = "yes"
					coverImagePath = "../../images/cover_anim.swf"
					hideControlPanelAndMouse="no"
					hideTime="5"
					TimeToShowInfoOnVideoStart="2"
					removeOldFilmEffect="yes"			
				/>
				<video_item> 
					<video_path>../../upvideo/'.$vid.'</video_path>
					<video_title>Seeker Personal Videos</video_title>
					<video_description>Seeker Persoanal Video</video_description>
					<thumb_image_path>thumb_images/1.jpg</thumb_image_path>
				</video_item>
				
			</video>'; 
	
		//echo $str_xml; exit;		
	$file=fopen("video.xml","w");										
	fwrite($file,$str_xml);	
	
	///////////////////////////////////////////////
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Untitled Document</title>
<script src="Scripts/AC_RunActiveContent.js" type="text/javascript"></script>
<style type="text/css">
<!--
body {
	background-color: #000000;
}
-->
</style></head>

<body>
<div align="center">
  <object classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=7,0,19,0" width="560" height="370">
    <param name="movie" value="video_player_flashvars_xml.swf" />
    <param name="quality" value="high" />
    <param name="allowFullScreen" value="true" />
    <param name="flashvars" value="xml_path=video.xml" />
    <embed src="video_player_flashvars_xml.swf" width="560" height="370" quality="high" pluginspage="http://www.macromedia.com/go/getflashplayer" type="application/x-shockwave-flash" allowfullscreen="true" flashvars="xml_path=video.xml"></embed>
  </object>

</div>
</body>
</html>
