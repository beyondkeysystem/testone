<?php  session_start();

	if(!isset($_SESSION["user_id"]))
	{
		header("location: ../index.php"); exit();
	}
	require_once("../../classes/db_class.php");
		
	require_once("../../includes/functions.php");	
	$objDb = new db();
	$rowCount=0;
	$cat="";
	$cat1="";
	$option="";
	
	$sqlplan = "select * from payments_table";
	$resultplan = $objDb->ExecuteQuery($sqlplan);
	$rsplan=mysql_fetch_object($resultplan);
        //print_r($rsplan);

     //die;
        //$rowCount = mysql_num_rows($resultplan);
	
	
	
	
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
 
 function deletePlan(pid)
 {
 	if(confirm("Are you sure you want to delete this plan?"))
	{
		document.form1.method="post";
		document.form1.action="plan_delete.php?pid="+pid;
		document.form1.submit();
	} 
	
 }
 
 function getCategory()
 {
 	document.form1.method="post";
	document.form1.action="option_add.php?cat_id="+document.form1.category_id1.value+"&action="+document.form1.actionval.value;
	document.form1.submit();
 }
 
 
 function submitOption()
 {
	if(validateOption())
	{
		document.form1.method="post";
		document.form1.action="option_add_action.php?cat_id="+document.form1.category_id1.value+"&action=add";
		document.form1.submit();
 	}
 }
 function editOption(oid)
 {
	if(validateOption())
	{
		document.form1.method="post";
		document.form1.action="option_add_action.php?cat_id="+document.form1.category_id1.value+"&action=edit&oid="+oid;
		document.form1.submit();
 	}
 }
 
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
     	<!-- Page Body Start-->		
				<table width="100%" border="0" cellspacing="0" cellpadding="0">
					<tr>
						<td width="700px" height="400" valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="4">
                        
						  <tr>
						  	<td>
						  	<table width="100%" border="0" cellspacing="0" cellpadding="4">
                          <tr>
                            <td width="772" valign="top"><table  align="left" cellpadding="0" cellspacing="0" border="0" width="98%" >
                              <tr>
                                <td width="73%" height="30" class="headingRegister" >&nbsp;<span class="heading_black"> Payment Plan List</span></td>
                                <td width="27%" align="right" class="normal_text" >&nbsp;</td>
                              </tr>
                                <tr>
                                  <td colspan="2" valign="top"><table width="100%" cellpadding="5" cellspacing="0">
                                      <tr>
                                        <td width="5"></td>
                                        <td width="98%">A list of payment done by members. </td>
                                      </tr>
                                  </table></td>
                                </tr>
                                <tr align="center" >
                                    <table width="80%" border=1 class="table_black_border" >
                                            <tr>
                                                <th class="table_head" >
                                                    Member Name
                                                </th>
                                                <th class="table_head">
                                                    Type
                                                </th>
                                                <th class="table_head" >
                                                    Amount
                                                </th>
                                                <th class="table_head" >
                                                     Duration
                                                </th>
                                                <th class="table_head_end" >
                                                    Payment Date
                                                </th>
                                            </tr>
                                            <?php
                                            
                                            while($rsplan = mysql_fetch_object($resultplan))
                                            {
                                               
                                             $sqlmember = "select * from users where id =".$rsplan->employer_id;
                                               $resultmember = $objDb->ExecuteQuery($sqlmember);
                                               $resultmember=mysql_fetch_object($resultmember);
                                               
                                            //echo '<pre>';
                                            //print_r($resultmember);
                                            if(count($resultmember) > 0 )
                                            {
                                               ?>
                                               <tr align="center">
                                                <td width="13%" >
                                                    <?php if(isset($resultmember->name)) echo ucfirst($resultmember->name); ?>
                                                </td>
                                                <td width="13%" >
                                                    <?php if(isset($resultmember->type)) echo $resultmember->type; ?>
                                                </td >
                                                <td width="13%" >
                                                    <?php echo $rsplan->pay_amount;  ?>
                                                </td>
                                                <td width="25%" >
                                                    <?php echo $rsplan->duration; ?>
                                                    <br>
                                                    <span style="font-size: 12px" >
                                                       ( <?php
                                                        echo date("F j, Y" ,strtotime($rsplan->start_date)). ' - ' .date("F j, Y" ,strtotime($rsplan->end_date));
                                                        ?>
                                                        )
                                                    </span>
                                                </td>
                                                <td width="13%" >
                                                    <?php echo date("F j, Y" ,strtotime($rsplan->pay_date)); ?>
                                                </td>
                                               </tr>
                                               <?php
                                            }
                                            }
                                            ?>
                                        </table>
                                </tr>
                            </table></td>
                          </tr>
                                                        </table>
                                                        
                                                        </td>
                                                  </tr>                                                  </table>
                                                </td>                                        </tr>
                                        
                                </table>
                          
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

