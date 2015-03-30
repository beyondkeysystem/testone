<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" 
"http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<?		
		require_once("../../classes/db_class.php");
		$objDb = new db();
		$sqlactive = "select * from job_jobseeker where seeker_status=1";
		$resultactive = $objDb->ExecuteQuery($sqlactive);
		$noactive=mysql_num_rows($resultactive);
		$sqlinactive = "select * from job_jobseeker where seeker_status=0";
		$resultinactive = $objDb->ExecuteQuery($sqlinactive);
		$inactive=mysql_num_rows($resultinactive);
		$sqlall = "select * from job_jobseeker ";
		$resultall = $objDb->ExecuteQuery($sqlall);
		$noall=mysql_num_rows($resultall);

?>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<title>Recruit Young</title>
<link rel="stylesheet" type="text/css" href="../styles/job_admin.css">
<script src="../javascript/menubar.js" language="javascript"></script>
</head>
<body onLoad="MM_preloadImages('images/home1.gif','images/job_seekers1.gif','images/employers_admin1.gif','images/utility1.gif','images/signout1.gif')">
<table width="990" border="0" align="center" cellpadding="0" cellspacing="0">
     <tr>
          <td><? include("top.php"); ?></td>
     </tr>
     <tr>
          <td background="images/lnk_left.gif"></td>
     </tr>
     <tr>
         <td class="whitebgcolor">
		 	<!-- Page Body Start-->		
				<table width="100%" border="0" cellspacing="0" cellpadding="0">
					<tr>
						<td width="200px" valign="top"><? include("left.php"); ?></td>
						<td width="1px" bgcolor="#0066cc"></td>
						<td width="769px" height="350" align="center" valign="top">
							<br>
							<br>
							<br>
							<table cellpadding="4" cellspacing="0" width="90%">
								<tr>
									<td width="44%" >
										Total number of Active Seekers</td>
									<td width="56%">
										<? echo($noactive);?>									
									</td>
								</tr>
								<tr>
									<td>
										Total number of Inactive Seekers
									</td>
									<td>
										<? echo($inactive);?>	
									</td>
								</tr>
								<tr>
									<td>
										Total number  of Seekers
									</td>
									<td>
										<? echo($noall);?>	
									</td>
								</tr>
						  </table>
						
						</td>						
					</tr>
				</table>  
			<!-- Page Body End-->		
         </td>
     </tr>
     <tr>
	 	<td><? include("bottom.php"); ?></td>          
     </tr>
</table>
</body>
</html>

