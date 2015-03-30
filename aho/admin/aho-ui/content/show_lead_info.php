<style>
    .single_line{width:80%;background-color: inherit;}
    .property_info{width:80%;background-color: inherit;}
</style>
<?php
$db = mysql_connect("localhost", 'ahomain', ',O8bOcL6JUXK') or die(); // original

//$db = mysql_connect("127.0.0.1", 'root', '') or die();
//$db = mysql_connect("127.0.0.1", 'cakejobportal', 'yeTunMpvLPtdeGZ5') or die(); 
mysql_select_db('ahomain_las_rc',$db); // original
if(isset($_POST['show']) && $_POST['show']=='lead_details'){
    show_details($_POST['lead_id'],$_POST['consumer_id']);
    exit();
}
function show_details($lead_id,$consumer_id){
    $sql = "select * from AHO_Consumers where ID=".$consumer_id; 
    $q4 = mysql_query($sql) or die(mysql_error());
    $request = mysql_fetch_object($q4);
    $Property_Description = unserialize($request->Property_Description);
    $Email_ID = $request->Email_ID;
    $Full_Name = $request->Full_Name;
    $Receive_Option = $request->Receive_Option;
    $Registration_Date = $request->Registration_Date;
    $Phone_No = $request->Phone_No;
                    
    $find = array("(",")","+","-");
    $replace = '';
    $phone = str_replace($find,$replace,$Phone_No);
    if(strlen($phone)==13){
            $phone_no = substr($phone,0,3).'+('.substr($phone,3,3).')'.substr($phone,6,3).'-'.substr($phone,9,4);  
    }
    elseif(strlen($phone)==12){
            $phone_no = substr($phone,0,2).'+('.substr($phone,2,3).')'.substr($phone,5,3).'-'.substr($phone,8,4);  
    }
    elseif(strlen($phone)==11){
            $phone_no = substr($phone,0,1).'+('.substr($phone,1,3).')'.substr($phone,4,3).'-'.substr($phone,7,4);  
    }
    elseif(strlen($phone)==10){
            $phone_no = '('.substr($phone,0,3).')'.substr($phone,3,3).'-'.substr($phone,6,4);  
    }
    else{
        $phone_no='';
    }
    $Comment = $request->Comment;
    $Request_Type = $request->Request_Type;
   $request_type = 'Property Search for Buy';
    if($Request_Type==1){
        $request_type = 'Property Search for Buy';
    }
    elseif($Request_Type==2){
        $request_type = 'Property Search for Rent';
    }
    elseif($Request_Type==3){
        $request_type = 'Property for Sell';
    }    
    $Property_Location = $Property_Description['Property_Location'];
    $Property_Type = $Property_Description['Property_Type'];
    $Bedrooms = $Property_Description['Bedrooms'];
    $Bathrooms = $Property_Description['Bathrooms'];
    
    $Min_Price = $Property_Description['Min_Price'];
    $Max_Price = $Property_Description['Max_Price'];
    $Area = $Property_Description['Area'];
    
    $Lot_Size = $Property_Description['Lot_Size'];
    $Year_Built=$Property_Description['Year_Built'];
    
    $Pets = $Property_Description['Pets'];
    $Time_Frame = $Property_Description['Time_Frame'];
    echo'<table>
            <tr>
                <th colspan="2">Consumer Information</th>
            </tr>
            <tr>
                <th>Name:</th><td>'.$Full_Name.'</td>
            </tr>
	    <tr>
                <th>Phone:</th><td>'.$phone_no.'</td>
            </tr>
            <tr>
                <th>Email:</th><td>'.$Email_ID.'</td>
            </tr>
            <tr>
                <th colspan="2">Property Information</th>
            </tr>
            <tr>
                <th>Request For</th><td>'.$request_type.'</td>
            </tr>
            <tr>
                <th>Location:</th><td>'.$Property_Location.'</td>
            </tr>
            <tr>
                <th>Property Type:</th><td>'.$Property_Type.'</td>
	    </tr>';
        	if($Request_Type==1||$Request_Type==2){
    $message='
            <tr>
                <th>Price:</th><td>$'.$Min_Price.' To $'.$Max_Price.'</td>
            </tr>
            <tr>
                <th>Min. Square Feet:</th><td>'.$Area.'</td>
            </tr>';
		}
		$message.='
		<tr>
		    <th>Bedrooms:</th><td>'.$Bedrooms.'</td>
		</tr>
		<tr>
		    <th>Bathrooms:</th><td>'.$Bathrooms.'</td>
		</tr>';
                if($Request_Type==1){
    $message.= '<tr>
		    <th>Lot_Size:</th><td>'.$Lot_Size.' Sq. Feet</td>
		</tr>
                <tr>
		    <th>Year Built:</th><td>'.$Year_Built.'</td>
		</tr>';
		}
		if($Request_Type==2){
    $message.='	<tr>
		    <th>Pets:</th><td>'.$Pets.'</td>
		</tr>
		<tr>
		    <th>Timeframe:</th><td>'.$Time_Frame.'</td>
		</tr>';
		}   
    $message.='	<tr>
                    <th>Summarize:</th><td>'.$Comment.'</td>
		</tr>';
    echo $message;
    echo '</table>';
}
?>