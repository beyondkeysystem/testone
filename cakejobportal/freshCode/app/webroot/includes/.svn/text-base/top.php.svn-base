<?
	//header("Pragma: no-cache");
	
	global $objDb ;
	$sqlSites = "select * from job_top_sites where status=1 limit 0,4";
	$resultSites = $objDb->ExecuteQuery($sqlSites);
	
	$sqlbanner = "select * from job_banner where banner_status=1";
	$resultbanner = $objDb->ExecuteQuery($sqlbanner);
	
	$title_class = array("top_brown","top_blue","top_violet","top_green");
	$img = array("brown.gif","blue.gif","violet.gif","green.gif");
        $sql_prod = "SELECT * FROM job_banner WHERE banner_status=1 ORDER BY banner_id ASC";
        $res_prod = $objDb->ExecuteQuery($sql_prod);
        $numrs = mysql_num_rows($res_prod);

?>
<script language="javascript" type="text/javascript">
var howOften = 1; //number often in seconds to rotate
var current = 0; //start the counter at 0
var ns6 = document.getElementById&&!document.all; //detect netscape 6
var items = new Array(); //place your images, text, etc in the array elements here
<?
$jj = 0;
$sr = "";
while($rs = mysql_fetch_object($res_prod)) {
	$sr = 'items['.$jj.']="<a href=\''. $rs->banner_url .'\' target=\'_blank\'><img src=\'upload_banner/'. $rs->banner_image .'\' alt=\''. $rs->banner_title .'\' title=\''. $rs->banner_title .'\' border=\'0\'  ></a>";';
	echo $sr ;
	$jj++;
}
?>
function rotater() { 
    if(document.layers) {
        document.placeholderlayer.document.write(items[current]);
        document.placeholderlayer.document.close();
    }
	

    if(ns6)document.getElementById("placeholderdiv").innerHTML=items[current]
        if(document.all)
            placeholderdiv.innerHTML=items[current];

    current = (current==items.length-1) ? 0 : current + 1; //increment or reset
    setTimeout("rotater()",howOften*5000);
}
//window.onload=rotater(); 
</script>


<script language="JavaScript" type="text/JavaScript">
<!--
	function checkLogin(event)
	{
		if (event.keyCode == 13) {
			document.frmLogin.submit();
		}
		return;
	}
	
	function clearUserName()
	{
		if(document.frmLogin.txtUser.value == " ")
		{
			document.frmLogin.txtUser.value = "";
		}
	}
//-->
</script>
<script type="text/JavaScript">
<!--
function MM_swapImgRestore() { //v3.0
  var i,x,a=document.MM_sr; for(i=0;a&&i<a.length&&(x=a[i])&&x.oSrc;i++) x.src=x.oSrc;
}

function MM_preloadImages() { //v3.0
  var d=document; if(d.images){ if(!d.MM_p) d.MM_p=new Array();
    var i,j=d.MM_p.length,a=MM_preloadImages.arguments; for(i=0; i<a.length; i++)
    if (a[i].indexOf("#")!=0){ d.MM_p[j]=new Image; d.MM_p[j++].src=a[i];}}
}

function MM_findObj(n, d) { //v4.01
  var p,i,x;  if(!d) d=document; if((p=n.indexOf("?"))>0&&parent.frames.length) {
    d=parent.frames[n.substring(p+1)].document; n=n.substring(0,p);}
  if(!(x=d[n])&&d.all) x=d.all[n]; for (i=0;!x&&i<d.forms.length;i++) x=d.forms[i][n];
  for(i=0;!x&&d.layers&&i<d.layers.length;i++) x=MM_findObj(n,d.layers[i].document);
  if(!x && d.getElementById) x=d.getElementById(n); return x;
}

function MM_swapImage() { //v3.0
  var i,j=0,x,a=MM_swapImage.arguments; document.MM_sr=new Array; for(i=0;i<(a.length-2);i+=3)
   if ((x=MM_findObj(a[i]))!=null){document.MM_sr[j++]=x; if(!x.oSrc) x.oSrc=x.src; x.src=a[i+2];}
}
//-->
</script>

<script src="http://cdn.wibiya.com/Toolbars/dir_0727/Toolbar_727818/Loader_727818.js" type="text/javascript"></script><noscript><a href="http://www.wibiya.com/">Web Toolbar by Wibiya</a></noscript>

<body onLoad="MM_preloadImages('../images/tutorials1.jpg'); rotater();">

<form name="frmLogin" method="post" action="jobseeker/seeker_login_action.php">
     <tr>
          <td><table width="100%" border="0" cellspacing="0" cellpadding="0">
               <tr>
                    <td width="240" rowspan="2" class="whitebgcolor"><a href="index.php"><img src="images/logo.gif" alt="logo" width="215" height="121" border="0" /></a></td>
                    <td height="15" bgcolor="#FFFFFF"></td>
                    <td width="20" rowspan="2" valign="top" bgcolor="#FFFFFF">&nbsp;</td>
                    <td width="1" rowspan="2" valign="top" background="images/line2.gif"></td>
                    <td width="10" rowspan="2" valign="top" bgcolor="#FFFFFF">&nbsp;</td>
                    <td width="210" rowspan="2" valign="top" bgcolor="#FFFFFF">

					<table width="100%">
                      <tr>
                        <td colspan="2" height="5"></td>
                      </tr>
                      <tr>
                        <td colspan="2"><a href="contact.php" class="text_light_gray_bold">Contact</a> &nbsp; <img src="images/sepration.gif"> &nbsp; <a href="tutorials.php" class="text_light_gray_bold">Help</a> &nbsp; <img src="images/sepration.gif"> &nbsp; <a href="about.php" class="text_light_gray_bold">About</a></td>
                      </tr>
                      <tr>
                        <td colspan="2" class="text_gray_light" height="1" background="images/line2.gif"></td>
                      </tr>
                      <tr>
                        <td colspan="2" class="text_gray_light" height="5"></td>
                      </tr>
                      <tr>
                        <td width="61" class="text_gray_light">Username</td>
                        <td class="text_gray_light"><input name="txtUser" type="text" size="20" style="border-style:solid" value=" " onClick="clearUserName();"></td>
                      </tr>
                      <tr>
                        <td class="text_gray_light">Password</td>
                        <td class="text_gray_light"><input name="txtPassword" type="password" id="txtPassword" style="border-style:solid" size="20" onKeyPress="checkLogin(event);"></td>
                      </tr>
                      <tr>
                        <td  colspan="2"><a href="jobseeker/seeker_login.php" class="link_gray_small">Forgot your details?</a>&nbsp;&nbsp;<a href="#" onClick="document.frmLogin.submit();"><img src="images/jobseeker_login.gif" border="0" align="absmiddle"></a></td>
                      </tr>
                    </table>

			     </td>
                  <td width="11" rowspan="2"><img src="images/top_right.gif" alt="top_right" width="11" height="121" /></td>
               </tr>
               <tr>
                 <td valign="top" bgcolor="#FFFFFF">
				 	<table width="100%" cellpadding="0" cellspacing="0">
						<tr>
							<td  class="whitebgcolor" valign="top" align="center">
								<div id="placeholderdiv"></div>
							</td>	
						</tr>
					</table>
				 </td>
               </tr>
          </table></td>
     </tr>
</form>
     <tr>
          <td>
		  	<table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
                    <tr>
                      <td background="images/lnk_right_bg.gif"><img src="images/link_left.gif" alt="left" width="8" height="42" border="0" /><a href="index.php" onMouseOut="MM_swapImgRestore()" onMouseOver="MM_swapImage('Image10','','images/home1.gif',1)"><img src="images/home.gif" alt="Home" name="Image10" width="70" height="42" border="0"></a><a href="jobseeker/seeker_main_page.php" onMouseOut="MM_swapImgRestore()" onMouseOver="MM_swapImage('Image4','','images/register1.gif',1)"><img src="images/register.gif" alt="Register" name="Image4" width="86" height="42" border="0" id="Image4" /></a><a href="jobseeker/faq.php" onMouseOut="MM_swapImgRestore()" onMouseOver="MM_swapImage('Image5','','images/faq1.gif',0)"><img src="images/faq.gif" alt="FAQs" name="Image5" width="68" height="42" border="0" id="Image5" /></a><a href="jobseeker/seeker_login.php" onMouseOut="MM_swapImgRestore()" onMouseOver="MM_swapImage('Image6','','images/login1.gif',1)"><img src="images/login.gif" alt="Login" name="Image6" width="66" height="42" border="0" id="Image6" /></a><a href="jobseeker/job_search.php" onMouseOut="MM_swapImgRestore()" onMouseOver="MM_swapImage('Image7','','images/job_search1.gif',1)"><img src="images/job_search.gif" alt="Job Search" name="Image7" width="104" height="42" border="0" id="Image7" /></a><a href="jobseeker/seeker_emp.php" onMouseOut="MM_swapImgRestore()" onMouseOver="MM_swapImage('Image9','','images/employers1.gif',1)"><img src="images/employers.gif" alt="Employers" name="Image9" width="100" height="42" border="0" id="Image9" /></a><a href="jobseeker/features.php" onMouseOut="MM_swapImgRestore()" onMouseOver="MM_swapImage('Image12','','images/features1.gif',1)"><img src="images/features.gif" alt="Features" name="Image12" width="91" height="42" border="0"></a><a href="partners.php" onMouseOut="MM_swapImgRestore()" onMouseOver="MM_swapImage('Image13','','images/partners1.gif',1)"><img src="images/partners.gif" alt="Partners" name="Image13" width="81" height="42" border="0"></a><a href="tutorials.php" onMouseOut="MM_swapImgRestore()" onMouseOver="MM_swapImage('Image16','','images/tutorials1.jpg',1)"><img src="images/tutorials.jpg" alt="Tutorials" name="Image16" width="81" height="42" border="0" id="Image16" /></a></td>
                      <td  background="images/lnk_right_bg.gif"><div align="right"></div></td>
                      <td width="19" background="images/lnk_right_bg.gif"><img src="images/lnk_right1.gif" width="19" height="42"></td>
                    </tr>
            </table>
		</td>
	</tr>