<?php
function check_admin($Cookie) {

	$sql = "SELECT * FROM AHO_Sess WHERE session = '$Cookie' ";
	$sql_result = mysql_query($sql);
	$row = mysql_fetch_array($sql_result);

	$session_check = $row["session"];

	if ($session_check != '') {
		return 1;
	} else {
		return 0;
	}

}

/*starts here*/
function auth($Username, $Password,$Type) {

	if($Username != '' and $Password != '' and ereg('@',$Username)==1){

	$sql = "SELECT * FROM AHO_User WHERE Email_1 = '$Username' AND Password = '$Password' AND Type = '$Type' limit 1 ";
       
	$sql_result = mysql_query($sql);
        
	$row = mysql_fetch_array($sql_result);
        
	$user_id = $row["id"];

	$session_id = md5(date("Ymdhis") . ':' . $user_id);
        
         
	if ($user_id != '') {
		$session_id = md5(date("Ymdhis") . ':' . $user_id);
		//print "INSERT INTO rc_ui_sess (u_id,session) VALUES ('$user_id','$session_id')";
		mysql_query("INSERT INTO AHO_Sess (u_id,session) VALUES ('$user_id','$session_id')");
               
		setcookie("session_id", "$session_id", false, '/', false);
		if( isset($_REQUEST['AcceptLead']) && $_REQUEST['AcceptLead']==1){
			
			$iPod = stripos($_SERVER['HTTP_USER_AGENT'],"iPod");
			$iPhone = stripos($_SERVER['HTTP_USER_AGENT'],"iPhone");
			$iPad = stripos($_SERVER['HTTP_USER_AGENT'],"iPad");
			$Android= stripos($_SERVER['HTTP_USER_AGENT'],"Android");
			$webOS= stripos($_SERVER['HTTP_USER_AGENT'],"webOS");
			if( $iPod || $iPhone || $iPad || $Android ){
				header("location:index.php?Page=AgentLeadsMobile");
		       }
		       else{
			       header("location:index.php?Page=AgentLeads");
		       }
			
		}
		else{
			header("location:index.php?Page=Accounts");
		}
		
		return 1;
	} else {
		return 2;
	}

	}
}
/*ends here*/
/*starts here*/
//function register($Username, $Password, $Password2,$Type,$Broker='') {
//	
//	if (ereg("[.]", $Username) == 1 and ereg("[@]", $Username) == 1 and $Password != '' and $Password == $Password2) {
//               
//		$sql = "SELECT * FROM AHO_User WHERE Email_1 = '$Username' AND Type = '$Type' limit 1 ";
//		$sql_result = mysql_query($sql);
//		$row = mysql_fetch_array($sql_result);
//		
//		$user_id = $row["id"];
//		
//		$sql = "SELECT * FROM AHO_User WHERE B_Code > 0 ORDER BY B_Code DESC "; 
//		$sql_result = mysql_query($sql);
//		$row = mysql_fetch_array($sql_result);
//		$New_B_ID = $row["B_Code"]+1;
//		if ($user_id != '') {
//
//			return '3';
//
//		} else {
//                    /*if($Type == 3){ commented on 16may14
//                        if($Broker == ''){
//                            return 4;
//                        }
//                    }*/
//                    if($Type==2){ 
//                        // REGISTER AS BROKER //
//			mysql_query("INSERT INTO AHO_User (Email_1,Password,Type,B_Code) values ('$Username','$Password','$Type','$New_B_ID')"); 
//                    }
//                    else if($Type == 3){
//                        // REGISTER AS AGENT //
//			$brokerid = $Broker;
//			$brokerid = 0; // added on 16may14 
//			mysql_query("INSERT INTO AHO_User (Email_1,Password,Type,B_ID) values ('$Username','$Password','$Type','$brokerid')");
//                    }
//                    return auth($Username, $Password);
//		}
//
//	}
//
//}

	function register($Username, $Password, $Password2,$Type,$Broker='') {
		
		$Web=$_POST['Web'];
		if(isset($_POST['Availability']))
		{
			if(is_array($_POST['Availability']))
			{
				$Availability = implode(',',$_POST['Availability']);
			}
			else
			{
				$Availability = $_POST['Availability'];
			}
		}
		else
		{
			$Availability='';
		}
		if (ereg("[.]", $Username) == 1 and ereg("[@]", $Username) == 1 and $Password != '' and $Password == $Password2) {
		       
			$sql = "SELECT * FROM AHO_User WHERE Email_1 = '$Username' AND Type = '$Type' limit 1 ";
			$sql_result = mysql_query($sql);
			$row = mysql_fetch_array($sql_result);
			
			$user_id = $row["id"];
			
			$sql = "SELECT * FROM AHO_User WHERE B_Code > 0 ORDER BY B_Code DESC "; 
			$sql_result = mysql_query($sql);
			$row = mysql_fetch_array($sql_result);
			$New_B_ID = $row["B_Code"]+1;
			if ($user_id != '') {
	
				return '3';
	
			} else {
			    /*if($Type == 3){ commented on 16may14
				if($Broker == ''){
				    return 4;
				}
			    }*/
			    if($Type==2){ 
				// REGISTER AS BROKER //
				$q = mysql_query("INSERT INTO AHO_User (Email_1,Password,Type,B_Code,Web,Availability) values ('$Username','$Password','$Type','$New_B_ID','$Web','$Availability')"); 
			    }
			    else if($Type == 3){
				// REGISTER AS AGENT //
				$brokerid = $Broker;
				$brokerid = 0; // added on 16may14 
				//$q = mysql_query("INSERT INTO AHO_User (Email_1,Password,Type,B_ID,Web,Availability) values ('$Username','$Password','$Type','$brokerid','$Web','$Availability')");
				$q = mysql_query("INSERT INTO AHO_User (Email_1,Password,Type,B_ID,Web,Availability,credits) values ('$Username','$Password','$Type','$brokerid','$Web','$Availability','2')"); // two free leads added on 29sep14
			    }
			    return auth($Username, $Password);
			}
	
		}
	
	}
function adminauth($Username, $Password) {

	if($Username != '' and $Password != '' and ereg('@',$Username)==1){

	$sql = "SELECT * FROM AHO_User WHERE Email_1 = '$Username' AND Password = '$Password' AND Type = '1' limit 1 ";
       
	$sql_result = mysql_query($sql);
        
	$row = mysql_fetch_array($sql_result);
        
	$user_id = $row["id"];

	$session_id = md5(date("Ymdhis") . ':' . $user_id);
        
         
	if ($user_id != '') {
		$session_id = md5(date("Ymdhis") . ':' . $user_id);
		//print "INSERT INTO rc_ui_sess (u_id,session) VALUES ('$user_id','$session_id')";
		mysql_query("INSERT INTO AHO_Sess (u_id,session) VALUES ('$user_id','$session_id')");
               
		setcookie("session_id", "$session_id", false, '/', false);
		header("location:index.php?Page=Accounts");
		return 1;
	} else {
		return 2;
	}

	}
}
/*ends here*/
function logout($Cookie) {

	$sql = "DELETE FROM AHO_Sess WHERE session = '$Cookie' ";
	$sql_result = mysql_query($sql);
	$row = mysql_fetch_array($sql_result);

	setcookie("session_id", "z", time() - 3600);
	header("location:index.php");

}
function send_mail_document($ID)
{
	header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
	header("Cache-Control: post-check=0, pre-check=0", false);
	header("Pragma: no-cache");
	//$ID = $_REQUEST['ID'];
	// code to send mail start
	$to = 'burt@americanhomesonline.com';
	//$to = 'ankit.a@cisinlabs.com';
	//$to = 'sameer.chourasia@cisinlabs.com';
	//$to = 'ankitagarwal858@gmail.com';
	//$to = 'ankit.a@mailinator.com';
	require 'send_mail.php';
	send_mail($to); 
	
	// code to send mail ends
}
$Cookie = addslashes($_COOKIE["session_id"]);
$Check_Admin = check_admin($Cookie);

if ($Check_Admin == '1') {

    $sql = "SELECT * FROM AHO_Sess WHERE session = '$Cookie' ";
	$sql_result = mysql_query($sql);
	$row = mysql_fetch_array($sql_result);

	$User_ID = $row["u_id"];
	
	$sql = "SELECT * FROM AHO_User WHERE id = '$User_ID' ";
	$sql_result = mysql_query($sql);
	$row = mysql_fetch_array($sql_result);
	
	$full = $row["full_account"];
	$emailol = $row["Email_1"];
	
	$Branch = $row["B_Code"];
        
        /**starts here*/
        $type = $row["Type"];
        /*ends here*/
	if($Branch == 0){
	
	$B_ID = $row["B_ID"];
	
	}else{
	
	$B_ID = $row["id"];
	
	}	
}
/* starts here */
if ($Reg == 1) {
    
	$Check_Registration = register($Username, $Password, $Password2,$Type,$Broker);
}
if ($Login == 1) {
        //$Login_Error = auth($Username, $Password,$Type);
	$Login_Error = auth($Username, $Password,3);
}
if ($AdminLogin == 1) {
        $Login_Error = adminAuth($Username, $Password);
}
/*ends here*/
if ($Logout == 1) {
	logout($Cookie);
}

function remove_agent($id)
{
	$sql = "select * from AHO_User WHERE id = '$id'"; 
	$sql_result = mysql_query($sql)or die(mysql_error());
	if($sql_result && mysql_num_rows($sql_result)>0){
		$row = mysql_fetch_assoc($sql_result);
		
		$profile_image = $row['Image_File']; 
		if(strlen($profile_image)>0){
			$IMG = "http://www/americanhomesonline.com/admin/aho-ui/content/userfiles/".$profile_image;
			if(file_exists($IMG)){
				@unlink($IMG);
			}
		}
		$sql = "delete from AHO_User where id= $id";
	        mysql_query($sql) or die(mysql_error());
		return 1;
	}
	else{
		return 0;
	}
}
?>
