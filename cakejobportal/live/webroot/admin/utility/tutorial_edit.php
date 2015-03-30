<?  session_start();

	if(!isset($_SESSION["user_id"]))
	{
		header("location: ../index.php"); exit();
	}
	require_once("../../classes/db_class.php");
	$objDb = new db();
	$sqladvert = "select * from  job_vtutorials where vt_id='".$_GET["vtid"]."'";
	$resultadvert = $objDb->ExecuteQuery($sqladvert);
	$rsadvert=mysql_fetch_object($resultadvert);
	$rowCount = mysql_num_rows($resultadvert);
	
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" 
"http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<title>Recruit Young</title>
<link rel="stylesheet" type="text/css" href="../../styles/job.css">
<link rel="stylesheet" type="text/css" href="../styles/job_admin.css">
<script src="../javascript/menubar.js" language="javascript"></script>
<script src="../javascript/admin.js" language="javascript"></script>
<script src="../../javascript/job.js" language="javascript"></script>


<script language="javascript">
 
 
 function MM_CheckFlashVersion(reqVerStr,msg){
  with(navigator){
    var isIE  = (appVersion.indexOf("MSIE") != -1 && userAgent.indexOf("Opera") == -1);
    var isWin = (appVersion.toLowerCase().indexOf("win") != -1);
    if (!isIE || !isWin){  
      var flashVer = -1;
      if (plugins && plugins.length > 0){
        var desc = plugins["Shockwave Flash"] ? plugins["Shockwave Flash"].description : "";
        desc = plugins["Shockwave Flash 2.0"] ? plugins["Shockwave Flash 2.0"].description : desc;
        if (desc == "") flashVer = -1;
        else{
          var descArr = desc.split(" ");
          var tempArrMajor = descArr[2].split(".");
          var verMajor = tempArrMajor[0];
          var tempArrMinor = (descArr[3] != "") ? descArr[3].split("r") : descArr[4].split("r");
          var verMinor = (tempArrMinor[1] > 0) ? tempArrMinor[1] : 0;
          flashVer =  parseFloat(verMajor + "." + verMinor);
        }
      }
      // WebTV has Flash Player 4 or lower -- too low for video
      else if (userAgent.toLowerCase().indexOf("webtv") != -1) flashVer = 4.0;

      var verArr = reqVerStr.split(",");
      var reqVer = parseFloat(verArr[0] + "." + verArr[2]);
  
      if (flashVer < reqVer){
        if (confirm(msg))
          window.location = "http://www.macromedia.com/shockwave/download/download.cgi?P1_Prod_Version=ShockwaveFlash";
      }
    }
  } 
}

 
  function editTutorial(vtid)
 {
 	
	if(validateTutorials())
	{
		document.form1.method="post";
		document.form1.action="tutorial_edit_action.php?vtid="+vtid;
		document.form1.submit();
	}
 }
 
 
 
</script>
<script type="text/javascript" src="includes/swfobject.js"></script>
<script type="text/javascript">
		var attributes = {};

		var params = {};
	 	// for fullscreen
		params.allowfullscreen = "true";

		var flashvars = {};
		// the video file or the playlist file
		//flashvars.file = "golfers.flv";
		//alert(flashvars.file)
		// the PHP script NONE FOR LOCAL ACCESS
		//flashvars.streamscript = "includes/flvprovider.php";
		//flashvars.bufferlength = "1.5";

		// width and height of the player (h is height of the video + 20 for controlbar)
		// required for IE7
		flashvars.width = "320";
		flashvars.height = "260";
		// width  and height of the video
		flashvars.displaywidth = "320";
		flashvars.displayheight = "240";
		flashvars.autostart = "true";
		flashvars.showdigits = "true";

	 	// for fullscreen
		flashvars.MM_ComponentVersion = 1;
		flashvars.skinName = "Clear_Skin_3";
		flashvars.streamName = "../../tutorials/<?=$rsadvert->vt_path?>"
		flashvars.showfsbutton = "true";
		alert(flashvars.streamName)
		// 9 for Flash Player 9 (for ON2 Codec and FullScreen)
		swfobject.embedSWF("FLVPlayer_Progressive.swf", "flashcontent", "320", "260", "9.0.0", "FLVPlayer_Progressive.swf", flashvars, params, attributes);

</script>

</head>
<body onLoad="MM_preloadImages('images/home1.gif','images/job_seekers1.gif','images/employers_admin1.gif','images/utility1.gif','images/signout1.gif');MM_CheckFlashVersion('8,0,0,0','Content on this page requires a newer version of Macromedia Flash Player. Do you want to download it now?');">
<table width="990" border="0" align="center" cellpadding="0" cellspacing="0">
     <tr>
          <td><? include("includes/top.php"); ?></td>
     </tr>
     <tr>
          <td background="images/lnk_left.gif"></td>
     </tr>
     <tr>
         <td class="whitebgcolor">
		 <form name="form1" method="post"  enctype="multipart/form-data" >
		 	<!-- Page Body Start-->		
				<table width="100%" border="0" cellspacing="0" cellpadding="0">
					<tr>
						<td width="700px" height="400" valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="4">
                          <tr>
                            <td width="772" valign="top"><table  align="left" cellpadding="0" cellspacing="0" border="0" width="98%" >
                                <tr>
                                  <td height="30" class="heading_black" >&nbsp;Edit Video Tutorial </td>
                                </tr>
								<tr>
                                  <td valign="top"><table width="100%" cellpadding="5" cellspacing="0">
                                      <tr>
                                        <td width="5"></td>
                                        <td width="98%">You can edit the video tutorialhere. </td>
                                      </tr>
                                  </table></td>
                                </tr>
                                <tr>
                                  <td valign="top"></td>
                                </tr>
                            </table></td>
                          </tr>
                          <tr>
                            <td><img src="../../images/line.gif" width="772"></td>
                          </tr>

                          <tr>
                            <td align="left" valign="top"><table width="700" border="0" align="left" cellpadding="6" cellspacing="0" >
									    <tr >
									    <td colspan="4" height="10"  ></td>
									  </tr>
									  <tr>
										<td   >&nbsp;</td>
										<td   >Upload tutorial for  Jobseeker / Recruiter </td>
										<td colspan="2"   ><select name="seeker_recruiter" id="seeker_recruiter">
										  <option value="1" <? if( $rsadvert->c_id == 1 ) { ?> selected <? } ?>>Jobseeker</option>
										  <option value="2" <? if( $rsadvert->c_id == 2 ) { ?> selected <? } ?>>Recruiter</option>
										</select>
										</td>
									  </tr>
									  <tr>
									    <td   >&nbsp;</td>
                                        <td   >Tutorial  name </td>
                                        <td width="73%" colspan="2"   >
										<input name="vt_name" type="text" id="vt_name"  value="<? if(isset($_POST['vt_name']) && $_POST['vt_name']!="" ) echo $_POST['vt_name']; else  echo $rsadvert->vt_name;?>">
                                          <img src="../../images/star.gif"> </td>
                                      </tr>
									  
										<tr>
										  <td valign="top"   >&nbsp;</td>
										  <td valign="top"   >Upload tutorial </td>
										  <td height="30" colspan="2" align="left" valign="top"    >
										  <input name="videotutorial" type="file" id="videotutorial">
										  <input type="hidden"  name="old_tutorial" value="<?=$rsadvert->vt_path ?>">
										  </td>
							  </tr>
										<tr>
										  <td valign="top"   >&nbsp;</td>
										  <td valign="top"   >&nbsp;</td>
										  <td height="30" colspan="2" align="left" valign="top"    >
										  <div id="flashcontent">
											  <p>To view this video you need JavaScript enabled and the latest Adobe Flash Player installed.  <br />
												<a href="http://www.adobe.com/go/getflashplayer/">Download the free Flash Player now</a>.</p>
											  <p><a href="http://www.adobe.com/go/getflashplayer/"><img src="http://www.adobe.com/images/shared/download_buttons/get_flash_player.gif" alt="Download Flash Player" style="border: none;" /></a></p>
											</div>
											</td>
							  </tr>
										<tr>
										  <td width="2%" valign="top"   >&nbsp;</td>
											<td width="25%" valign="top"   >&nbsp;</td>
											<td height="30" colspan="2" align="left" valign="top"    ><img src="../../images/update_admin.gif" width="50" height="18" border="0" style="cursor:pointer" onClick="return editTutorial('<?=$rsadvert->vt_id?>')">&nbsp;&nbsp;&nbsp;<a href="tutorial_list.php"><img src="../../images/cancel.gif" border="0"></a>										  </td>
										</tr>
									</table></td>
                          </tr>
						 
						  
                          <tr align="center">
                            <td valign="middle" height="10"></td>
                          </tr>
						 
                        </table>
						</td>						
					</tr>
					
					
		   </table>  
			<!-- Page Body End-->		
		   </form>
         </td>
     </tr>    
     <tr>
	 	<td>
			<? include("includes/bottom.php"); ?>
		</td>          
     </tr>
</table>
</body>
</html>

