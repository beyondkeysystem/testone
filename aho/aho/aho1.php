﻿<?php   // NV FILE //
// header('Access-Control-Allow-Origin: *');

error_reporting(0);
//ini_set('display_errors', '1');

// SET TO FALSE FOR A SPECIFIC BROKER
$exclude = true;
// SEPARATE ID of BROKERS WITH 'ID', INSIDE PARENTHESIS IF EXCLUDE = TRUE
$excludes = "('4')";

//$db = mysql_connect("localhost", 'las_rc_user', 'V69h3119TgHe25z') or die();
$db = mysql_connect("localhost", '', '') or die();
mysql_select_db('las_rc',$db);

if($Color1 == ''){
	$Color1 = '#F0F0F0';
}

$sql = "SELECT * FROM AHO_User WHERE B_Code = '{$_REQUEST['APPid']}'";
$sql_result = mysql_query($sql,$db);
$row = mysql_fetch_array($sql_result);

$APPid = $row["id"];
if($APPid == ''){
	$APPid = '%';

}

$AHO_AS =  $_REQUEST['AHO_AS'];
include("code_.php");
if($LP != 1){
include("code_{$_REQUEST['APPid']}.php");

} 
if($Buying == 1){

	$Middle = ' AND Buy = 1 ';

}

if($Renting == 1){

	$Middle = ' AND Rent = 1 ';

}

if($Selling == 1){

	$Middle = ' AND Sell = 1 ';

}


if($_REQUEST['AID']==''){   //die('test');
	
	$sql = "
		SELECT
				id
		FROM AHO_User
		WHERE B_ID = 0
			AND credits >= 5
	";
	//echo $sql ;
	$result = mysql_query($sql,$db);
	$broker_array = array();
	while ($row = mysql_fetch_array($result))
	{
		$broker_array[] = $row['id'];
	}
	
	$sql = "SELECT *,
	 	        SQRT(POW((69.1 * (GEO_Lat - $Lat)) , 2 ) +
		        POW((53 * (GEO_Long - $Long)), 2)) AS distance
				FROM AHO_User WHERE B_ID LIKE '$APPid'
				" . (($exclude) ? "AND B_ID NOT IN $excludes" : "") . "

				$Middle
				
				" . ((count($broker_array)) ? "AND B_ID IN (" . implode(',', $broker_array) . ")" : '') . "
				
				ORDER BY distance ASC";
				
				//echo $sql ;
	$sql_result = mysql_query($sql,$db);
	
	/* start here */
	 $num_rows = mysql_num_rows($sql_result);
	 print "<span class='agenth2'>".$num_rows ." Closest Agents</span><div class='agentbox'></div>";
	/* end here */
	
	
	while($row = mysql_fetch_array($sql_result)){ //echo $row['Name']."=>".$row['id'];
        
		$Name = $row['Name'];
		$ID = $row['id'];
		$IMG = $row['Image'];
		$IMGF = $row['Image_File'];

		if($IMGF != '' and $IMG == ''){

			$IMG = "admin/aho-ui/content/userfiles/$IMGF";

		}

		

		$MilesR = $row['distance'];
		$Miles = number_format($row['distance'],2);

		$Web = $row["Web"];

		if($Web != ''){

			$Website_Name = 'Website';

		}else{

			$Website_Name = '</a>No Website';

		}
               /* start here */
	       
		/*if($MilesR > 100){
			$Name = '';
			break;

		}*/
		
              /* end here */
	      
		if($IMG == ''){

			$IMG = 'aho/1367934593.svg';

		}
 
		$day30 = date("YmdHis", mktime(0, 0, 0, date("m"), date("d")-30,  date("Y")));
		
		

		$sqla = "SELECT * FROM AHO_Request WHERE Date_Time > $day30 AND IP_Clean = '{$_SERVER['REMOTE_ADDR']}' AND Agent_ID = '$ID' LIMIT 1 ";
		
		//echo $sqla;
		$sql_resulta = mysql_query($sqla,$db);
		$rowa = mysql_fetch_array($sql_resulta);

		$Check_ID = $rowa["Agent_ID"];


		$LB = $row['B_ID'];

		$sqlb = "SELECT * FROM AHO_User WHERE id = $LB  ";
		$sql_resultb = mysql_query($sqlb,$db);
		$rowb = mysql_fetch_array($sql_resultb);

		$Broker_Name = $rowb["Name"];

		print "<div class='agentbox1'>";

		print "
		<div style='width:100px;height:125px;float:left;'>
		<div style='width:100px;height:150px;background-image:url($IMG);background-size: 150px;background-position:center top; '>
		</div>
		</div>
		<div style='
		width:170px;
		float:left;
		padding:15px;
		padding-top:8px;
		text-align:left
		'>

		<span style='color:#1982d1;font-weight:bolder;font-size:15px;'>
		<h1>$Name</h1>

		</span>
		$Broker_Name<br>
		<span class='red'><b>$Miles miles away</b></span><br>
		";

	       if($Check_ID == $ID){ //die($ID);

			print "
		<br>
		<div style='margin-bottom:3px;'><img src='aho/32-iphone-icon.png' style='vertical-align:middle;'> <span style='font-weight:bolder;color:#1982d1;font-size:15px;'>{$row[Phone_1]}</span></a></div>
		<a href='aho.ph' class='AHO_Email' id='$ID'><img src='aho/18-envelope-icon.png' style='vertical-align:middle;'> <span style=''>Email</span></a> &nbsp;&nbsp;  <img src='aho/iconmonstr-home-icon-16.png' style='vertical-align:middle;'> <a href='$Web' target='_blank' id='$ID'><span style='f'>$Website_Name</span></a>
		";

		}else{


			print "
		<br>
		<div style='margin-bottom:3px;'><a href='aho.ph' class='AHO_Call'  id='$ID'><img src='aho/32-iphone-icon.png' style='vertical-align:middle;'> Call</a>&nbsp;&nbsp;&nbsp;<a href='aho.ph' class='AHO_Email' id='$ID'><img src='aho/18-envelope-icon.png' style='vertical-align:middle;'> <span style=''>Email</span></a></div> <img src='aho/iconmonstr-home-icon-16.png' style='vertical-align:middle;'> <a href='aho.ph' class='AHO_Email' id='$ID'>  $Website_Name</a>
		";

		}

		print "




		</div>

		<div style='clear:both'></div><br><br>
		</div>


		";
		
		//echo $Name ."-----------------";

	}

	if($Name == ''){  //echo $Name ."<====";
		print "
		<div style='width:300px;-moz-border-radius: 5px;-webkit-border-radius: 5px;border-radius: 5px;-khtml-border-radius: 5px;border-color:#1982d1;border-width:5px;border-style:solid;overflow: hidden;background-color:$Color1;margin-bottom:5px;font-family:Arial, Helvetica, sans-serif;font-size:12px;margin-right:auto;margin-left:auto;height:160px;line-height:18px;'>
		<h1>
		It looks like we don't have an agent in your area quite yet.
		</h1>
		</div>";
	}


}

if($_REQUEST['AID']!='' and $_REQUEST['Form_Send']!='1'){ 
	$sql = "SELECT *,
	 	        SQRT(POW((69.1 * (GEO_Lat - $Lat)) , 2 ) +
		        POW((53 * (GEO_Long - $Long)), 2)) AS distance
				FROM AHO_User WHERE id={$_REQUEST['AID']}
				ORDER BY distance ASC";
	$sql_result = mysql_query($sql,$db);
	$row = mysql_fetch_array($sql_result);

	$Name = $row['Name'];
	$ID = $row['id'];
	$IMG = $row['Image'];
	$Miles = number_format($row['distance'],2);

	$IMGF = $row['Image_File'];

	if($IMGF != '' and $IMG == ''){

		$IMG = "admin/aho-ui/content/userfiles/$IMGF";

	}


	if($IMG == ''){

		$IMG = 'http://openclipart.org/people/thekua/1367934593.svg';

	}

	print "
		<div style='width:300px;-moz-border-radius: 5px;-webkit-border-radius: 5px;border-radius: 5px;-khtml-border-radius: 5px;border-color:#1982d1;border-width:5px;border-style:solid;overflow: hidden;background-color:$Color1;margin-bottom:5px;font-family:Arial, Helvetica, sans-serif;font-size:12px;margin-right:auto;margin-left:auto;line-height:18px;'>
		<div style='width:100px;float:left;'>
		<div style='width:100px;height:150px;background-image:url($IMG);background-size: 150px;background-position:center top; '>
		</div>
		</div>
		<div style='
		width:170px;
		float:left;
		padding:15px;
		padding-top:8px;
		text-align:left;
		'>
		<a href='aho.ph' class='AHO_Back'  id='$ID'><< back</a> <br><br>
		<span style='color:#1982d1;font-weight:bolder;font-size:15px;'>
		<h1>$Name</h1>
		</span>
		<b>$Miles miles away</b><br>
		<br>
		";

	print "

		<span style='color:red'>
		Please fill out the form in order to view agents info & search local properties.
		</span></div><div style='clear:both'> </div>

		<div style='padding:10px;'>
		Name:<span style='color:red'>*</span> <br><input 	Name='Name' 	class='former' id='Name' 	type='text' style='width:95%' value='" . $_SESSION['form_name'] . "'><br>
		Phone:<span style='color:red'>*</span> <br><input 	Name='Phone' 	class='former' id='Phone' 	type='text' style='width:95%' value='" . $_SESSION['form_phone'] . "'><br>
		Email:<span style='color:red'>*</span> <br><input 	Name='Email' 	class='former' id='Email' 	type='text' style='width:95%' value='" . $_SESSION['form_email'] . "'><br><br>
		Comment: <br><textarea style='width:95%;height:60px;' id='Comment' name='Comment'>";
	// DEFAULT COMMENT TEXT //	
	// Hello, I am interested in the property $Address_String.
print "  </textarea>



		<input 	type='hidden' 	name='AID' 			id='AID' 		value='{$_REQUEST['AID']}'>
		<input 	type='hidden' 	name='AHO_AS' 		id='AHO_AS' 		value='{$_REQUEST['AHO_AS']}'>
		<div style='display:block' id='regs'>
		<input 	type='submit' 	value='Send' 		id='Send' style='width:100%;padding:10px;background-color:#1982d1;color:#fff;'>
		</div>
		<b>Fill out the form completely.</b>
		</form>

		</div>";

}

if($_REQUEST['Form_Send']=='1'){ 

	$_SESSION['form_name'] = $_REQUEST['Name'];
	$_SESSION['form_phone'] = $_REQUEST['Phone'];
	$_SESSION['form_email'] = $_REQUEST['Email'];
	$Date = date('YmdHis');

	//print_r($_REQUEST);
	//print "INSERT INTO AHO_Request (Name,Phone,Email,Agent_ID,Date_Time,Property,Comment) VALUES ('".addslashes($_REQUEST['Name'])."','".addslashes($_REQUEST['Phone'])."','".addslashes($_REQUEST['Email'])."','".addslashes($_REQUEST['AID'])."','$Date','".addslashes($_REQUEST['AHO_AS'])."','".addslashes($_REQUEST['Comment'])."')";

	$IP_Clean = explode("||",$_REQUEST['IPaddress']);

	$IP_Clean = $IP_Clean[0];

	/* start here */
       if($_REQUEST['Name']!='' && $_REQUEST['Phone']!='' && $_REQUEST['Email']!='')
       {
		$sql_result_date = "SELECT Date_Time FROM AHO_Request WHERE Email='{$_REQUEST['Email']}' AND Agent_ID='{$_REQUEST['AID']}'";
		$sql_result_date = mysql_query($sql_result_date,$db);
		$row_date = mysql_fetch_array($sql_result_date);
		if($row_date){ //echo  substr($Date, 0,8) ."<br/>";
			foreach($row_date as $rowdate){
			   if(substr($rowdate,0,8) == substr($Date, 0,8)){
				
			   }	
			}
		}
		else{ //die(' here in else ');
		   mysql_query("INSERT INTO AHO_Request (Name,Phone,Email,Agent_ID,Date_Time,Property,Comment,IP_Address,IP_Clean) VALUES ('".addslashes($_REQUEST['Name'])."','".addslashes($_REQUEST['Phone'])."','".addslashes($_REQUEST['Email'])."','".addslashes($_REQUEST['AID'])."','$Date','".addslashes($_REQUEST['AHO_AS'])."','".addslashes($_REQUEST['Comment'])."','".addslashes($_REQUEST['IPaddress'])."','$IP_Clean')");
		    ?><script>window.location.reload()</script>
		<?php }
        }
	/* end here */
	
	/* start here */
	
	  //mysql_query("INSERT INTO AHO_Request (Name,Phone,Email,Agent_ID,Date_Time,Property,Comment,IP_Address,IP_Clean) VALUES ('".addslashes($_REQUEST['Name'])."','".addslashes($_REQUEST['Phone'])."','".addslashes($_REQUEST['Email'])."','".addslashes($_REQUEST['AID'])."','$Date','".addslashes($_REQUEST['AHO_AS'])."','".addslashes($_REQUEST['Comment'])."','".addslashes($_REQUEST['IPaddress'])."','$IP_Clean')");
       
        /* end here */
	
	$sql = "SELECT * FROM AHO_User WHERE id = '{$_REQUEST['AID']}' ";
	$sql_result = mysql_query($sql,$db);
	$row = mysql_fetch_array($sql_result);

	$AEmail = $row["Email_1"];
	$AName = $row["Name"];
	$APhone = $row["Phone_1"];
	$B_ID = $row['B_ID'];

	mail("$AEmail","AHO Contact Form to $AEmail",

		"Name: ".addslashes($_REQUEST['Name'])."
Phone: ".addslashes($_REQUEST['Phone'])."
Email: ".addslashes($_REQUEST['Email'])."
Property; ".addslashes($_REQUEST['AHO_AS'])."
Comment: ".addslashes($_REQUEST['Comment'])

		,'From:support@americanhomesonline.com'

	);

// TAKE CREDIT FROM AGENT //
	$AIDdelete = $_REQUEST['AID'];
	$day30 = date("YmdHis", mktime(0, 0, 0, date("m"), date("d")-30,  date("Y")));
	$sqla = "SELECT COUNT(*) AS contacts FROM AHO_Request WHERE Date_Time > $day30 AND IP_Clean = '{$_SERVER['REMOTE_ADDR']}' AND Agent_ID = {$row['id']}";
	
	//echo $sqla."<==>"; die($row['B_ID']);
	
	$sql_resulta = mysql_query($sqla,$db);
	$rowa = mysql_fetch_array($sql_resulta);
	if ($rowa['contacts'] == 1)
	{
		$query = "UPDATE AHO_User SET credits = credits - 5 WHERE id = {$row['B_ID']}"; 
    	mysql_query($query); 
	}
// END TAKE CREDIT //
	/*
mail("burt@americanhomesonline.com","Copy AHO Contact Form to $AEmail",


"Name: ".addslashes($_REQUEST['Name'])."
Phone: ".addslashes($_REQUEST['Phone'])."
Email: ".addslashes($_REQUEST['Email'])."
Property; ".addslashes($_REQUEST['AHO_AS'])."
Comment: ".addslashes($_REQUEST['Comment'])

,'From:support@americanhomesonline.com'

);
*/
	/*
mail("burt@americanhomesonline.com","AHO Contact Form to $AEmail",


"Name: ".addslashes($_REQUEST['Name'])."
Phone: ".addslashes($_REQUEST['Phone'])."
Email: ".addslashes($_REQUEST['Email'])."
Property; ".addslashes($_REQUEST['AHO_AS'])."
Comment: ".addslashes($_REQUEST['Comment'])

,'From:support@americanhomesonline.com'

);

mail(addslashes($_REQUEST['Email']),"AHO Contact Form to $AEmail",


"
Your agents info is below:

Agent Name: $AName
Phone: $APhone
Email: $AEmail"

,'From:support@americanhomesonline.com'

);
*/

	require('/home/ahomain/nv/aho/tw/Services/Twilio.php');

	$account_sid = 'AC7728951e7d8b3b31c7275adb4e4002e5';
	$auth_token = '8e592234882788ddfac3a4336cfba000';
	$client = new Services_Twilio($account_sid, $auth_token);

	$client->account->messages->create(array(
			'To' => "$APhone",
			'From' => "+17024255249",
			'Body' => "
Client would like a call
Name: ".addslashes($_REQUEST['Name'])."
Phone: ".addslashes($_REQUEST['Phone'])."
Email: ".addslashes($_REQUEST['Email']),

		));

	$client = new Services_Twilio($account_sid, $auth_token);

	/*
$client->account->messages->create(array(
	'To' => "7024063356",
	'From' => "+17024255249",
	'Body' => "
Copy - Client would like a call
Name: ".addslashes($_REQUEST['Name'])."
Phone: ".addslashes($_REQUEST['Phone'])."
Email: ".addslashes($_REQUEST['Email']),

));
*/

	//$phone_clean = ereg_replace(" |(|)|[.]|-","",addslashes($_REQUEST['Phone']));
	$phone_clean = addslashes($_REQUEST['Phone']);
	$client = new Services_Twilio($account_sid, $auth_token);

	$client->account->messages->create(array(
			'To' => "$phone_clean",
			'From' => "+17024255249",
			'Body' => "
Your agent's info
Agent Name: $AName
Phone: $APhone
Email: $AEmail",

		));



	print "<span class='agenth2'>3 Closest Agents</span><div class='agentbox'></div>";
	$sql = "
		SELECT
				id
		FROM AHO_User
		WHERE B_ID = 0
			AND credits >= 5
	";
	$result = mysql_query($sql,$db);
	$broker_array = array();
	while ($row = mysql_fetch_array($result))
	{
		$broker_array[] = $row['id'];
	}
	$sql = "SELECT *,
	 	        SQRT(POW((69.1 * (GEO_Lat - $Lat)) , 2 ) +
		        POW((53 * (GEO_Long - $Long)), 2)) AS distance
				FROM AHO_User WHERE B_ID LIKE '$APPid'
				" . (($exclude) ? "AND B_ID NOT IN $excludes" : "") . "

				$Middle
				
				" . ((count($broker_array)) ? "AND B_ID IN (" . implode(',', $broker_array) . ")" : '') . "
				
				ORDER BY distance ASC
				LIMIT 3";
	$sql_result = mysql_query($sql,$db);
	while($row = mysql_fetch_array($sql_result)){

		$Name = $row['Name'];
		$ID = $row['id'];
		$IMG = $row['Image'];
		$MilesR = $row['distance'];
		$Miles = number_format($row['distance'],2);

		$IMGF = $row['Image_File'];

		if($IMGF != '' and $IMG == ''){

			$IMG = "admin/aho-ui/content/userfiles/$IMGF";

		}

		if($MilesR > 100){
			$Name= '';
			break;

		}

		$Web = $row["Web"];

		if($Web != ''){

			$Website_Name = 'Website';

		}else{

			$Website_Name = '</a>No Website';

		}

		if($IMG == ''){

			$IMG = 'http://openclipart.org/people/thekua/1367934593.svg';

		}

		$day30 = date("YmdHis", mktime(0, 0, 0, date("m"), date("d")-30,  date("Y")));

		$sqla = "SELECT * FROM AHO_Request WHERE Date_Time > $day30 AND IP_Clean = '{$_SERVER['REMOTE_ADDR']}' AND Agent_ID = '$ID' LIMIT 1 ";
		$sql_resulta = mysql_query($sqla,$db);
		$rowa = mysql_fetch_array($sql_resulta);

		$Check_ID = $rowa["Agent_ID"];

		$LB = $row['B_ID'];

		$sqlb = "SELECT * FROM AHO_User WHERE id = $LB  ";
		$sql_resultb = mysql_query($sqlb,$db);
		$rowb = mysql_fetch_array($sql_resultb);

		$Broker_Name = $rowb["Name"];

		print "<div class='agentbox1'>";

		print "

		<div style='width:100px;height:125px;float:left;'>
		<div style='width:100px;height:150px;background-image:url($IMG);background-size: 150px;background-position:center top; '>



		</div>

		</div>

		<div style='
		width:170px;
		float:left;
		padding:15px;
		padding-top:8px;
		text-align:left
		'>

		<span style='color:#1982d1;font-weight:bolder;font-size:15px;'>
		<h1>$Name</h1>
		</span>
		$Broker_Name<br>
		<b>$Miles miles away</b><br>
		";


		if($Check_ID == $ID){

			print "
		<br>
		<img src='aho/32-iphone-icon.png' style='vertical-align:middle;'> <span style='font-weight:bolder;color:#1982d1;font-size:15px;'>{$row[Phone_1]}</span></a><br>
		<a href='aho.ph' class='AHO_Email' id='$ID'><img src='aho/18-envelope-icon.png' style='vertical-align:middle;'> <span style=' '>Email</span></a>   &nbsp;&nbsp;&nbsp; <img src='aho/iconmonstr-home-icon-16.png' style='vertical-align:middle;'> <a href='$Web' target='_blank' id='$ID'><span style='f'>$Website_Name</span></a>

		";

		}else{


			print "
		<br>
		<a href='aho.ph' class='AHO_Call'  id='$ID'><img src='aho/32-iphone-icon.png' style='vertical-align:middle;'> Call</a><br>
		<a href='aho.ph' class='AHO_Email' id='$ID'><img src='aho/18-envelope-icon.png' style='vertical-align:middle;'> Email</a>  &nbsp;&nbsp;&nbsp; <img src='aho/iconmonstr-home-icon-16.png' style='vertical-align:middle;'> <a href='aho.ph' class='AHO_Email' id='$ID'> $Website_Name</a>
		";

		}

		print "
		</div>

		<div style='clear:both'></div>
		</div>


		";

	}

	if($Name == ''){

		print "
		<div style='width:300px;-moz-border-radius: 5px;-webkit-border-radius: 5px;border-radius: 5px;-khtml-border-radius: 5px;border-color:#1982d1;border-width:5px;border-style:solid;overflow: hidden;background-color:$Color1;margin-bottom:5px;font-family:Arial, Helvetica, sans-serif;font-size:12px;margin-right:auto;margin-left:auto;height:160px;line-height:18px;'>
		<h1>
		It looks like we don't have an agent in your area quite yet.
		</h1>
		</div>";



	}


}