<?  session_start();
	if(!isset($_SESSION["user_id"]))
	{
		header("location: ../index.php"); exit();
	}
	
	require_once("../../classes/pagination.php");	
	require_once("../../includes/functions.php");
	require_once("includes/functions.php");
	
	
	$objDb = new db();
	$sqlLanguage = "select * from job_language";
	$resultLang = $objDb->ExecuteQuery($sqlLanguage);	
	$rowCount = mysql_num_rows($resultLang);
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

<script language="javascript">

   function remove_single_language(id)
   {	
 	 
	 if(id == 1) 
	 {
	   alert("You can not delete this language!!");
	   return false;
	 }
	 
	 if(confirm("Are you sure you want to delete this language from list?"))
	 {
		
		vv = "id="+id;
		document.form1.method = "post";
		document.form1.action ="remove_language.php?"+vv;
		document.form1.submit();
	}
  }
  
  
  
</script>

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
		 <form name="form1" method="post" action="seeker_list.php">
		 	<!-- Page Body Start-->		
				<table width="100%" border="0" cellspacing="0" cellpadding="0">
					<tr>
						<td width="700px" height="400" valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="4">
                          <tr>
                            <td width="772" valign="top" style="background-color:lightSteelBlue;">
                            <table  align="left" cellpadding="0" cellspacing="0" border="0" width="98%" >
                                <tr>
                                  <td height="30" class="heading_black" align="center" >&nbsp;<br><span style="font-size:18px;"><b>Language Listing</b></span> <br><br></td>
                                </tr>
                                <tr>
                                  <td valign="top"><table width="80%" cellpadding="5" cellspacing="0" align="center">
                                      <tr align="center">
                                        <td width="18%"><a style="color:#0066CC;" href="addlanguage.php"><b>Add New Language</b></a></td>
                                        <td width="18%"><a style="color:#0066CC;" href="editlanguage.php"><b>Edit Language</b></a></td>
                                        <td width="18%"><a style="color:#0066CC;" href="addlangvariable.php"><b>Add Language Variable</b></a></td>
                                        <td width="18%"><a href="addlanguagepage.php"><b>Add New Language Page</b></a></td>
                                      </tr>
                                  </table></td>
                                </tr>
                            </table></td>
                          </tr>
                          <tr align="center">
                            <td><img src="../../images/line.gif" width="772"></td>
                          </tr>
                          
                          <tr>
                            <td height="10"></td>
                          </tr>
                          
                         <tr>
                            <td align="center"><table width="95%" cellpadding="6" cellspacing="0" class="table_black_border">
                                <tr align="left">
                                  <td align="center" class="table_head">Sr. No</td>
                                  <td class="table_head">Language Name</td>
                                  <td class="table_head">Country Name </td>
                                  <td class="table_head" align="center">S Name</td>
                                  <td class="table_head" align="center">Language Icon</td>
                                  <td class="table_head" align="center">Currency</td>
                                  <td class="table_head" align="center">Status</td>
                                  <td class="table_head" align="center">Edit </td>
								  <td class="table_head_end" align="center">Delete</td>
                                </tr>
                                <?
								$i = 1;
								while($rsLang = mysql_fetch_object($resultLang))
								{
									if($i%2 == 1)
										$td_class = "table_row";
									else
										$td_class = "table_alternate_row";
							  ?>
                                <tr align="left">
                                  <td width="8%" align="center" class="<?=$td_class?>"><?=$i?></td>
                                  <td width="15%" class="<?=$td_class?>"><?=$rsLang->language_name?></td>
                                  <?php
								       $sqlCountry = "select * from job_country WHERE country_id = ".$rsLang->country_id." LIMIT 1";
									   $resultCountry = $objDb->ExecuteQuery($sqlCountry);
									   $countryRowCount = mysql_num_rows($resultCountry);
									   if($countryRowCount > 0)
									   {
									     $countryRsLang = mysql_fetch_object($resultCountry);
									   }
								  ?>
                                  <td width="20%" class="<?=$td_class?>"><?=$countryRsLang->country_name?></td>
                                  <td width="8%" align="center" class="<?=$td_class?>"><?=$rsLang->language_shortname?></td>
                                  
                                  <td width="11%" align="center" class="<?=$td_class?>"><img src="../../langues/<?=$rsLang->language_name?>/images/<?=$rsLang->language_icon?>"></td>
                                  <td width="7%" align="center" class="<?=$td_class?>"><?=$rsLang->currency?></td>
                                  <td width="11%" align="center" class="<?=$td_class?>"><?=showStatus('Language','id',$rsLang->id,'status',$rsLang->status,'job_language'); ?></td>
                                  <td width="8%" align="center"  class="<?=$td_class?>">
								  <a class="paging_text" href="#">Edit </a>
								  </td>
								  <td width="11%" align="center" class="<?=$td_class?>_end">
								  <a class="paging_text"  onClick = "remove_single_language('<?=$rsLang->id?>');" href="javascript:void(0)" title="Delete language?">Delete </a>
								  </td>
                                </tr>
                                <?
									$i++;
								}
							  ?>
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
			<? include("bottom.php"); ?>
		</td>          
     </tr>
</table>
</body>
</html>
