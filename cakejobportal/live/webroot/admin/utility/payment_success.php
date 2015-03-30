<?  session_start();

	if(!isset($_SESSION["user_id"]))
	{
		header("location: ../index.php"); exit();
	}
	require_once("../../classes/db_class.php");
	require_once("../../includes/functions.php");
		
	
	
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

</script>
</head>
<body onLoad="MM_preloadImages('images/home1.gif','images/job_seekers1.gif','images/employers_admin1.gif','images/utility1.gif','images/signout1.gif')">
<table width="990" border="0" align="center" cellpadding="0" cellspacing="0">
     <tr>
          <td><? include("includes/top.php"); ?></td>
     </tr>
     <tr>
          <td background="images/lnk_left.gif"></td>
     </tr>
     <tr>
         <td class="whitebgcolor">
		 <form name="form1" method="post" >
		 	<!-- Page Body Start-->		
				<table width="100%" border="0" cellspacing="0" cellpadding="0">
					<tr>
						<td width="700px" height="400" valign="top"><table  align="left" cellpadding="0" cellspacing="0" border="0" width="98%" >
								
								<tr>
									<td height="50" class="recheading" ><span class="heading_black">&nbsp;&nbsp;&nbsp;Payment Successful! </span></td>
								</tr>
								<tr>
									<td><img src="../images/line.gif" width="772"></td>
								</tr>	
								<tr>
									<td valign="top">
										<table width="100%" cellpadding="3" cellspacing="0">
											<tr>
											  <td width="16">&nbsp;</td>
											  <td width="754"><? $id=$_GET["invoice_id"];?>
												    The payment of invoice id -<?=sprintf("%05d",$id)?>  has been done successfully.<br>
												    <br> 
										      </td>
											</tr>
									  </table>
								  </td>						
								</tr>
								<tr>
                                  <td height="150">&nbsp;</td>
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

