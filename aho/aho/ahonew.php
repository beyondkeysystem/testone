<?php
header('Access-Control-Allow-Origin: *');
 
//error_reporting(E_ALL);
//ini_set('display_errors', '1');

$db = mysql_connect("localhost", 'las_rc_user', 'V69h3119TgHe25z') or die();
mysql_select_db('las_rc',$db);

if($Color1 == ''){

	$Color1 = '#F0F0F0';


}

$sql = "SELECT * FROM AHO_User WHERE B_Code = '{$_REQUEST['APPid']}' AND B_Code != ''";
$sql_result = mysql_query($sql,$db);
$row = mysql_fetch_array($sql_result);

$APPid = $row["id"];

if($APPid == ''){

	$APPid = '%';

}

$AHO_AS =  $_REQUEST[AHO_AS];

include("code_{$_REQUEST['APPid']}.php");


if($Buying == 1){

	$Middle = ' AND Buy = 1 ';

}

if($Renting == 1){

	$Middle = ' AND Rent = 1 ';

}

if($Selling == 1){

	$Middle = ' AND Sell = 1 ';

}

if($_REQUEST['AID']==''){

	print "<div style='width:300px;text-align:center;margin-right:auto;margin-left:auto;color:#000;font-weight:bolder;padding-bottom:7px;font-size:20px;'>3 Closest Agents</div>";
	$sql = "SELECT *,
	 	        SQRT(POW((69.1 * (GEO_Lat - $Lat)) , 2 ) +
		        POW((53 * (GEO_Long - $Long)), 2)) AS distance
				FROM AHO_User WHERE B_ID LIKE '$APPid'

				$Middle

				ORDER BY distance ASC
				LIMIT 3";
	$sql_result = mysql_query($sql,$db);
	while($row = mysql_fetch_array($sql_result)){

		$Name = $row['Name'];
		$ID = $row['id'];
		$IMG = $row['Image'];
		$IMGF = $row['Image_File'];

		if($IMGF != '' and $IMG == ''){

			$IMG = "http://nv.americanhomesonline.com/aho/admin/aho-ui/content/userfiles/$IMGF";

		}

		$MilesR = $row['distance'];
		$Miles = number_format($row['distance'],2);

		$Web = $row["Web"];

		if($Web != ''){

			$Website_Name = 'Website';

		}else{

			$Website_Name = '</a>No Website';

		}

		if($MilesR > 100){
			$Name = '';
			break;

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

		$sqlb = "SELECT * FROM AHO_User WHERE id = $LB ";
		$sql_resultb = mysql_query($sqlb,$db);
		$rowb = mysql_fetch_array($sql_resultb);

		$Broker_Name = $rowb["Name"];

		print "
		<div style='width:300px;-moz-border-radius: 5px;-webkit-border-radius: 5px;border-radius: 5px;-khtml-border-radius: 5px;border-color:#1982d1;border-width:5px;border-style:solid;overflow: hidden;background-color:$Color1;margin-bottom:5px;font-family:Arial, Helvetica, sans-serif;font-size:12px;margin-right:auto;margin-left:auto;height:160px;line-height:18px;'>";



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
		<img src='http://nv.americanhomesonline.com/aho/32-iphone-icon.png' style='vertical-align:middle;'> <span style='font-weight:bolder;color:#1982d1;font-size:15px;'>{$row[Phone_1]}</span></a><br>
		<a href='aho.ph' class='AHO_Email' id='$ID'><img src='http://nv.americanhomesonline.com/aho/18-envelope-icon.png' style='vertical-align:middle;'> <span style=''>Email</span></a> &nbsp;&nbsp;&nbsp; <img src='http://nv.americanhomesonline.com/aho/iconmonstr-home-icon-16.png' style='vertical-align:middle;'> <a href='$Web' target='_blank' id='$ID'> <span style='f'>$Website_Name</span></a>
		";

		}else{


			print "
		<br>
		<a href='aho.ph' class='AHO_Call'  id='$ID'><img src='http://nv.americanhomesonline.com/aho/32-iphone-icon.png' style='vertical-align:middle;'> Call</a><br>
		<a href='aho.ph' class='AHO_Email' id='$ID'><img src='http://nv.americanhomesonline.com/aho/18-envelope-icon.png' style='vertical-align:middle;'> Email</a> &nbsp;&nbsp;&nbsp; <img src='http://nv.americanhomesonline.com/aho/iconmonstr-home-icon-16.png' style='vertical-align:middle;'> <a href='aho.ph' class='AHO_Email' id='$ID'> $Website_Name</a>
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

if($_REQUEST['AID']!='' and $_REQUEST['Form_Send']!='1'){

	$sql = "SELECT *,
	 	        SQRT(POW((69.1 * (GEO_Lat - $Lat)) , 2 ) +
		        POW((53 * (GEO_Long - $Long)), 2)) AS distance
				FROM AHO_User WHERE id={$_REQUEST['AID']}
				ORDER BY distance ASC
				LIMIT 3";
	$sql_result = mysql_query($sql,$db);
	$row = mysql_fetch_array($sql_result);

	$Name = $row['Name'];
	$ID = $row['id'];
	$IMG = $row['Image'];
	$Miles = number_format($row['distance'],2);

	$IMGF = $row['Image_File'];

	if($IMGF != '' and $IMG == ''){

		$IMG = "http://nv.americanhomesonline.com/aho/admin/aho-ui/content/userfiles/$IMGF";

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
		Please fill out the form in order to recieve the agents contact info.
		</span></div><div style='clear:both'> </div>

		<div style='padding:10px;'>



		Name:<span style='color:red'>*</span> <br><input 	Name='Name' 	class='former' id='Name' 	type='text' style='width:95%'><br>
		Phone:<span style='color:red'>*</span> <br><input 	Name='Phone' 	class='former' id='Phone' 	type='text' style='width:95%'><br>
		Email:<span style='color:red'>*</span> <br><input 	Name='Email' 	class='former' id='Email' 	type='text' style='width:95%'><br><br>

		Comment: <br><textarea style='width:95%;height:60px;' id='Comment' name='Comment'>Hello,
I am interested in the property $Address_String.</textarea>



		<input 	type='hidden' 	name='AID' 			id='AID' 		value='{$_REQUEST['AID']}'>
		<input 	type='hidden' 	name='AHO_AS' 		id='AHO_AS' 		value='{$_REQUEST['AHO_AS']}'>
		<div style='display:none' id='regs'>
		<input 	type='submit' 	value='Send' 		id='Send' style='width:100%;padding:10px;background-color:#1982d1;color:#fff;'>
		</div>
		<b>Fill out the form completely.</b>
		</form>

		</div>";

}

if($_REQUEST['Form_Send']=='1'){

	$Date = date('YmdHis');

	//print_r($_REQUEST);
	//print "INSERT INTO AHO_Request (Name,Phone,Email,Agent_ID,Date_Time,Property,Comment) VALUES ('".addslashes($_REQUEST['Name'])."','".addslashes($_REQUEST['Phone'])."','".addslashes($_REQUEST['Email'])."','".addslashes($_REQUEST['AID'])."','$Date','".addslashes($_REQUEST['AHO_AS'])."','".addslashes($_REQUEST['Comment'])."')";

	$IP_Clean = explode("||",$_REQUEST['IPaddress']);

	$IP_Clean = $IP_Clean[0];



	mysql_query("INSERT INTO AHO_Request (Name,Phone,Email,Agent_ID,Date_Time,Property,Comment,IP_Address,IP_Clean) VALUES ('".addslashes($_REQUEST['Name'])."','".addslashes($_REQUEST['Phone'])."','".addslashes($_REQUEST['Email'])."','".addslashes($_REQUEST['AID'])."','$Date','".addslashes($_REQUEST['AHO_AS'])."','".addslashes($_REQUEST['Comment'])."','".addslashes($_REQUEST['IPaddress'])."','$IP_Clean')");

	$sql = "SELECT * FROM AHO_User WHERE id = '{$_REQUEST['AID']}' ";
	$sql_result = mysql_query($sql,$db);
	$row = mysql_fetch_array($sql_result);

	$AEmail = $row["Email_1"];
	$AName = $row["Name"];
	$APhone = $row["Phone_1"];



	mail("$AEmail","AHO Contact Form to $AEmail",


		"Name: ".addslashes($_REQUEST['Name'])."
Phone: ".addslashes($_REQUEST['Phone'])."
Email: ".addslashes($_REQUEST['Email'])."
Property; ".addslashes($_REQUEST['AHO_AS'])."
Comment: ".addslashes($_REQUEST['Comment'])

		,'From:support@americanhomesonline.com'

	);

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
Your agents info:
Agent Name: $AName
Phone: $APhone
Email: $AEmail",

		));



	print "<div style='width:300px;text-align:center;margin-right:auto;margin-left:auto;color:#fff;font-weight:bolder;padding-bottom:7px;font-size:20px;'>3 Closest Agents</div>";

	$sql = "SELECT *,
	 	        SQRT(POW((69.1 * (GEO_Lat - $Lat)) , 2 ) +
		        POW((53 * (GEO_Long - $Long)), 2)) AS distance
				FROM AHO_User WHERE B_ID LIKE '$APPid'

				$Middle

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

			$IMG = "http://nv.americanhomesonline.com/aho/admin/aho-ui/content/userfiles/$IMGF";

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

		$sqlb = "SELECT * FROM AHO_User WHERE id = $LB ";
		$sql_resultb = mysql_query($sqlb,$db);
		$rowb = mysql_fetch_array($sql_resultb);

		$Broker_Name = $rowb["Name"];

		print "
		<div style='width:300px;-moz-border-radius: 5px;-webkit-border-radius: 5px;border-radius: 5px;-khtml-border-radius: 5px;border-color:#1982d1;border-width:5px;border-style:solid;overflow: hidden;background-color:$Color1;margin-bottom:5px;font-family:Arial, Helvetica, sans-serif;font-size:12px;margin-right:auto;margin-left:auto;height:160px;line-height:18px;'>";



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
		<img src='http://nv.americanhomesonline.com/aho/32-iphone-icon.png' style='vertical-align:middle;'> <span style='font-weight:bolder;color:#1982d1;font-size:15px;'>{$row[Phone_1]}</span></a><br>
		<a href='aho.ph' class='AHO_Email' id='$ID'><img src='http://nv.americanhomesonline.com/aho/18-envelope-icon.png' style='vertical-align:middle;'> <span style=''>Email</span></a>   &nbsp;&nbsp;&nbsp; <img src='http://nv.americanhomesonline.com/aho/iconmonstr-home-icon-16.png' style='vertical-align:middle;'> <a href='$Web' target='_blank' id='$ID'> <span style='f'>$Website_Name</span></a>

		";

		}else{


			print "
		<br>
		<a href='aho.ph' class='AHO_Call'  id='$ID'><img src='http://nv.americanhomesonline.com/aho/32-iphone-icon.png' style='vertical-align:middle;'> Call</a><br>
		<a href='aho.ph' class='AHO_Email' id='$ID'><img src='http://nv.americanhomesonline.com/aho/18-envelope-icon.png' style='vertical-align:middle;'> Email</a>  &nbsp;&nbsp;&nbsp; <img src='http://nv.americanhomesonline.com/aho/iconmonstr-home-icon-16.png' style='vertical-align:middle;'> <a href='aho.ph' class='AHO_Email' id='$ID'> $Website_Name</a>
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

?>