<?  session_start();
	if(!isset($_SESSION["user_id"]))
	{
		header("location: ../index.php"); exit();
	}
?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" 
"http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<title>Recruit Young</title>
<link rel="stylesheet" type="text/css" href="../styles/job_admin.css">
<script src="../javascript/menubar.js" language="javascript"></script>
</head>
<body onLoad="MM_preloadImages('images/home1.gif','images/job_seekers1.gif','images/employers_admin1.gif','images/utility1.gif','images/signout1.gif')">
<? include("includes/functions.php"); ?>

<?php

 if((isset($_POST['submit'])) && ($_POST['action'] == 'langpageaction'))
 {    
	$error = '';
	$pagenamepost = "";
	
  if((isset($_POST['pagename'])) && ($_POST['pagename'] != "")) {
    
	$pagenamepost = $_POST['pagename']; 	
	$string = strtoupper(trim($_POST['pagename']));
    $string = preg_replace("/\s+/","_",$string);
    if(!strpos("+",$string))
    {
	  $pattern = array("/^[\s+]/","/[\s+]$/","/\s/");
	  $replace = array("",""," ");
	  $string = preg_replace($pattern,$replace,$string);
    }
	
	$pagename = $string;
	
	$data = array( 'name' => $pagename );
	
		    
    $validate = validate_language_page_name($data);
	
    if($validate == TRUE)
	{
	   if(add_language_page_name($data))
	   {
	     $msg = "<span style='color:blue'>Page name added successfully!</span><br><br>";
	     $pagenamepost = "";
	   }else
	   {
	     $error = "There is some problem in adding new page!!<br>";
	   }
	   
	}else
	{
	   $error = "This page name already added!!<br>";
	}
	
  }else
  {
     $error = "Please enter page name!";
  }	
	if($error != '')
	{
	    $error = "<span style='color:red'>".$error."</span><br>";
	}
    
 }


?>
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
						<td width="700px" height="400" valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="4">
                          <tr>
                            <td width="772" valign="top" style="background-color:lightSteelBlue;">
                            <table  align="left" cellpadding="0" cellspacing="0" border="0" width="98%" >
                                <tr>
                                  <td height="30" class="heading_black" align="center" >&nbsp;<br><span style="font-size:18px;"><b>Language Add</b></span> <br><br></td>
                                </tr>
                                <tr>
                                  <td valign="top"><table width="80%" cellpadding="5" cellspacing="0" align="center">
                                      <tr align="center">
                                        <td width="18%"><a href="index.php"><b>Display Language</b></a></td>
                                        <td width="18%"><a href="addlanguage.php"><b>Add New Language</b></a></td>
                                        <td width="18%"><a href="editlanguage.php"><b>Edit Language</b></a></td>
                                        <td width="18%"><a href="addlangvariable.php"><b>Add Language Variable</b></a></td>
                                      </tr>
                                  </table></td>
                                </tr>
                            </table></td>
                          </tr>
                          <tr align="center">
                            <td><img src="../../images/line.gif" width="772"></td>
                          </tr>
                          <tr align="center">
                            <td height="10">
                              <table>
                                <tr>
                                   <td>
                                    <br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b>Add New Language Page</b><br><br>
                                    <div style="margin-left:47px;">
                                     <?php 
							           if(isset($error))
							              echo $error;
								  
							           if(isset($msg))
							              echo $msg;
						            ?>	  
                                  </div>
                                 </td>
                                </tr>
                               </table>                            
                            </td>
                          </tr>
						  
                          <tr align="center">
                          
                            <td>
                     		 <form name="addnewpage" method="post" action="">
                               <table width="58%">
                                 <tr>
                                    <td>
                                       Enter page name: 
                                    </td>
                                    <td>
                                       <input type="hidden" name="action" value="langpageaction">
                                       <input size="42" type="text" name="pagename" value="<?=$pagenamepost?>" style="border: 1px solid black; padding: 3px;">
                                    </td>
                                    <td>
                                       <input type="submit" name="submit" value="Add"  style="font-size: 15px; padding: 1px 10px;">
                                    </td>
                                 </tr>
                                 
                                 <tr><td><br></td></tr>
                                 
                                 <tr><td><br></td></tr>
                                 
                               </table>
                            
                            </td>
                          
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
