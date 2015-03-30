<header>
	<center> <h3><br>Agents</h3></center>
</header>

<?php

if($Update != ''){
	
	print "<h4><font color='green'>Agent Updated</font></h4>";
	
	mysql_query("UPDATE AHO_User SET 
	
	Name = '$Name',
	Business ='$Business',
	
	Phone_1 = '$Phone',
	Email_1 = '$Email',

	Address = '$Address',
	City = '$City',
	State = '$State',
	Zip = '$Zip',
	Image = '$Image',
	Password = '$Password',
	GEO_Lat = '$GEO_Lat',
	GEO_Long = '$GEO_Long',
	Buy = '$Buy',
	Sell = '$Sell',
	Rent = '$Rent',
	Web='$Web',
        Type = '3'
		
	WHERE id = '$Update_Hidden' ");
		
     $uploadfile = basename($_FILES['file']['name']);

	if(eregi("jpg|png|gif|jpeg",$_FILES['file']['name'])==1){
	
		$uploadfile = '/home/ahomain/www/admin/aho-ui/content/userfiles/'.ereg_replace(" ","",$_FILES['file']['name']);
		
		
		$FCon = file_get_contents($_FILES['file']['tmp_name']);
		
		file_put_contents($uploadfile,$FCon);
		

    			mysql_query("UPDATE AHO_User SET 
	
				Image_File = '".ereg_replace(" ","",$_FILES['file']['name'])."'
		
				WHERE id = '$Update_Hidden' AND b_id = '$BR_ID' ");

	}

}

if($UpdateD != ''){
	
	print "<h4><font color='green'>Name Updated</font></h4>";
	
	mysql_query("UPDATE AHO_User SET 
	
	Name = '$Display_Name'

	WHERE  id = '$BR_ID' ");

}


if($Add_Agent != ''){

    $sql = "SELECT * FROM AHO_User WHERE Email_1 = '$Add_Agent' AND Type = '3' limit 1 ";
    $sql_result = mysql_query($sql);
    $row = mysql_fetch_array($sql_result);

    $user_id = $row["id"];

    if($user_id != ""){
        print "<h4><font color='red'>Username already taken with same role</font></h4>";
    }else{
        print "<h4><font color='green'>Agent Successfully added</font></h4>";
	$TP = md5(date('YMDHis'));
	
	$Temp_Password = substr($TP,0,5);
	
	mysql_query("INSERT INTO AHO_User (Email_1,B_ID,Type,Password) VALUES ('$Add_Agent','$BR_ID','3','$Temp_Password') ");	

	mail("$Add_Agent","Your AHO Account has been Created",
        "
        Please login to 

        http://americanhomesonline.com/admin/

        with username & password

        Username: $Add_Agent

        Password: $Temp_Password
        "

        ,'From:support@americanhomesonline.com'

        );
    }

}

file_get_contents("http://americanhomesonline.com/aho/geo.php");



if($ID == ''){

?>


 

<b>Add New Agent</b>
<hr>
<div style="float:left; width:450px;">
<form action="index.php?Page=Agents&BR_ID=<?php echo $BR_ID?>" method="post" data-ajax="false" data-mini='true'>
	<div data-role="fieldcontain" class="ui-hide-label" data-mini='true' >
		<label for="aAdd_MLS" style='padding:4px;'>Add Agent Email:</label>
		<input type="text"name="Add_Agent" id="Add_Agent" data-mini="true" placeholder="Add Agent Email:"/>
		
	<input type="hidden" name="Add_Hidden" id="basic" data-mini="true" value='1'/>
	<input type="Submit" name="Add" value="Add Agent" data-mini='true' data-theme="b" class="button binactive"/>
</div>
</div>
</form>
<div style="float:left; width:350px; margin-left:5px;">
<form action="index.php?Page=FindBrokerAgents&BR_ID=<?php echo $BR_ID?>" method="post" data-ajax="false" data-mini='true'>
<div data-role="fieldcontain" class="ui-hide-label" data-mini='true' >
<label for="aAdd_MLS" style='padding:4px;'>Find an Agent</label>
<input type="text" name="agent" id="agent" placeholder="Find Agent">
<input type="Submit" name="Find" value="Find Agent" data-mini='true' data-theme="b" class="button binactive"/>
</form>
</div>
</div>
<?php

$sql = "SELECT * FROM AHO_User WHERE id = '$BR_ID' ";
$sql_result = mysql_query($sql);
while ($row = mysql_fetch_array($sql_result)) { 
$total = $row['credits']; 
}
?>
<div style='clear:both'>&nbsp;<br></div>
	<div style="float:left; margin-right:10px;" >
		<span style='font-size:24px; font-weight:bold; color:<?php echo ($total < 15) ? '#f00' : '#036'; ?>'>Credits Remaining: <br><?php echo $total; ?></span><br><br>
	</div>
	<div style="float:left; margin-right:10px; width:300px;">
	  <b>Purchase Additional Credits</b>
          <?php $sql = "SELECT * FROM subscription_periods WHERE type = 'credit'";
                $sql_result = mysql_query($sql);
                echo "<br>";
                while ($row = mysql_fetch_array($sql_result)) { 
                echo $row['no_of_credits']." Credit = $".$row['deduct_amount']."<br>";
            } ?>
          <?php $sql = "SELECT * FROM subscription_periods WHERE type = 'lead'";
                $sql_result = mysql_query($sql);
                while ($row = mysql_fetch_array($sql_result)) { 
                echo $row['no_of_credits']." Credits Needed For ".$row['no_of_leads']." lead<br>";
            } ?>
          
	</div>
	<div style="float:left;" >
<div style="float:left;">
	<form action="https://www.paypal.com/cgi-bin/webscr" method="post">
<input name="amount" id="amount" placeholder="Enter Quantity" type="text" />          
            <input type="hidden" name="cmd" value="_ext-enter" />
            <input type="hidden" name="redirect_cmd" value="_xclick" />
            <input type="hidden" name="business" value="burt@americanhomesonline.com" />
            <input type="hidden" name="item_name" value="AHO Credits - Broker: <?php echo $BR_ID; ?> " />
            <input type="hidden" name="currency_code" value="USD" />
            <input type="hidden" name="no_note" value="1" />
            <input type="hidden" name="no_shipping" value="1" />
            <input type="hidden" name="custom" value="<?php echo $BR_ID; ?>" />
            <input type="hidden" name="return" value="http://americanhomesonline.com/admin/index.php?Page=Agents&BR_ID=<?php echo $BR_ID; ?>" />
            <input type="hidden" name="cancel_return" value="http://americanhomesonline.com/admin/index.php?Page=cancel" />
            <input type="hidden" name="email" value="<?php echo $Email_1; ?>" />
            </label></div>
<div style="float:left;">&nbsp;<input name="submit" type="submit" class='button binactive bsmall'  id="submit" value="BUY" style=" cursor:pointer;" /></div>
          </form>
</div>

<div style='clear:both'></div>
<!--start here  -->
<div style="clear:both"></div>
<b>Request to Agents </b>
<hr>
<table>
 <?php 
  $query_time= "SELECT U.Name,U.id,COUNT(*) AS TotalRequest
		FROM AHO_Request AS R
		INNER JOIN AHO_User AS U ON U.id = R.Agent_ID
		WHERE U.B_ID = '{$BR_ID}'
		GROUP BY U.Name";
     $sql_result_time = mysql_query($query_time);
    
     echo "<tr><td style='font-weight: bolder; font-size: 22px; color: black;'>Agent Name</td><td style='font-weight: bolder; font-size: 22px; color: black;'>Total Request</td>";
     while($row_time = mysql_fetch_array($sql_result_time)){
	echo "<tr><td>".$row_time['Name']."</td>";
        
	echo "<td>"."<a href = \"index.php?Page=AgentContacts&ID=".$row_time['id']."\">".$row_time['TotalRequest']."</a></td></tr>";
     }
     
     $query_total_time= "SELECT U.Name,COUNT(*) AS TotalRequest
		FROM AHO_Request AS R
		INNER JOIN AHO_User AS U ON U.id = R.Agent_ID
		WHERE U.B_ID = '{$BR_ID}'";
     $sql_result_total_time = mysql_query($query_total_time); $row_total_time = mysql_fetch_array($sql_result_total_time) ;
     echo "<tr><td style='font-weight: bolder; font-size: 22px; color: black;'>Total No Request</td>
               <td style='font-weight: bolder; font-size: 22px; color: black;'>".$row_total_time['TotalRequest'] ."</td></tr>";
?>	
	
</table>

<!--end here -->
<b>Your Agents</b>

<hr>

<?php 


$sql = "SELECT * FROM AHO_User WHERE b_id = '$BR_ID'";


$sql_result = mysql_query($sql);
while ($row = mysql_fetch_array($sql_result)) {
		
	$AID = $row["id"];
        $metadata = $row["resources"];
        print "<div style='float:left;width:auto;border-style:solid;border-color:#cdcdcd;border-width:1px;padding:10px;margin:10px;'>";

	$Email_1 = substr($row['Email_1'], 0 , 35);
        print "
	<ul>
	
	<li><span style='font-size:16px; color:#036;'>$Email_1</span></li>
	<li><a href='index.php?Page=Agents&ID={$row['id']}' data-role='button'  data-mini='true' class='button binactive' style='font-size:12px;' data-ajax='false'>Edit</a>
	<a href='index.php?Page=AgentContacts&ID={$row['id']}&BR_ID={$row['B_ID']}' data-role='button'  data-mini='true' class='button binactive bsmall' style='font-size:12px;' data-ajax='false'>Contacts</a>
        <a href='index.php?Page=credits&ID={$row['id']}' data-role='button'  data-mini='true' class='button binactive bsmall' style='font-size:12px;' data-ajax='false'>Credits	</a>
	<a href='aho-ui/content/pops/remove_agent.php?ID={$row['id']}&BR_ID={$row['B_ID']}' class='various fancybox.iframe button bactive bsmall' style='font-size:12px;'>Remove</a></li></ul>
	</div>";

}

if($AID==''){

    print "Add an agent or yourself to get started.";

}


?>
<div style="clear:both"></div>


<b>Display Name</b>
<form action="index.php?Page=Agents&BR_ID=<?php echo $BR_ID?>" method="post" data-ajax="false" data-mini="true" class="adminforms">
	<div data-role="fieldcontain" class="ui-hide-label" data-mini='true'>
	<input type="text" name="Display_Name" id="Display_Name" data-mini="true" placeholder="Update Display Name:"/>
	</div>
	<input type="hidden" name="UDD_Hidden" id="basic" data-mini="true" value='1'/>
	<input type="Submit" name="UpdateD" value="Update" data-mini='true' data-theme="b" class="button binactive"/>

</form>
<br><b>Site Code</b><hr>
<?php
$sql = "SELECT * FROM AHO_User WHERE id = '$BR_ID'";
$sql_result = mysql_query($sql);
$result = mysql_fetch_array($sql_result)
?>
<textarea style='width:100%;height:200px'>

<script src='http://code.jquery.com/jquery-1.10.2.js'></script>
<script id='AHO-JS' src='../aho/aho.js?APP_ID=<?php print $result['B_Code'] ?>'></script>
<div id='AHO-Remote-Load' style='float:right;position:fixed;right:10px;z-index:1000'></div>
<div style='clear:both'></div>

</textarea>

<?php

}else{

$sql        = "SELECT * FROM AHO_User WHERE Type = '3' AND id = '$ID' ";
$sql_result = mysql_query($sql);
$row        = mysql_fetch_array($sql_result);

if($row["id"] != ''){
?>

<b>Account Info</b>
<hr>
<form action="index.php?Page=Agents&BR_ID=<?php echo $row['B_ID']?>" method="post" data-ajax="false" data-mini="true" enctype="multipart/form-data" class="adminforms">
	<div data-role="fieldcontain" class="ui-hide-label">
		<label for="aName">Agent Name:</label>
		<input type="text" name="Name" id="Name" data-mini="true" placeholder="Name:" value="<?php print $row["Name"] ?>"/>
	</div><br>
	<b>Agent Info</b>
	<hr>

	<div data-role="fieldcontain" class="ui-hide-label">
		<label for="aUsername">Phone: [add area code (i.e. 111-222-3333)]</label>
		<input type="text" name="Phone" id="Phone" data-mini="true" placeholder="Phone:" value="<?php print $row["Phone_1"] ?>"/>
	</div>
	<div data-role="fieldcontain" class="ui-hide-label">
		<label for="aPassword">Email:</label>
		<input type="text" name="Email" id="Email" data-mini="true" placeholder="Email:" value="<?php print $row["Email_1"] ?>"/>
	</div>
	<div data-role="fieldcontain" class="ui-hide-label">
		<label for="aPassword">Website:</label>
		<input type="text" name="Web" id="Web" data-mini="true" placeholder="Website:" value="<?php print $row["Web"] ?>"/>
	</div>
	<div data-role="fieldcontain" class="ui-hide-label">
		<label for="aUser_Agent">Address:  </label>
		<input type="text" name="Address" id="Address" data-mini="true" placeholder="Address:" value="<?php print $row["Address"] ?>"/>
	</div>
	<div data-role="fieldcontain" class="ui-hide-label">
		<label for="aUser_Agent_Password">City:</label>
		<input type="text" name="City" id="City" data-mini="true" placeholder="City:" value="<?php print $row["City"] ?>"/>
	</div>
	<div data-role="fieldcontain" class="ui-hide-label">
		<label for="aVersion">State: </label>
		<input type="text" name="State" id="State" data-mini="true" placeholder="State" value="<?php print $row["State"] ?>"/>
	</div>
	<div data-role="fieldcontain" class="ui-hide-label">
		<label for="aVersion">Zip: </label>
		<input type="text" name="Zip" id="Zip" data-mini="true" placeholder="Zip" value="<?php print $row["Zip"] ?>"/>
	</div>	

	<div data-role="fieldcontain" class="ui-hide-label">
		<label for="aVersion">Password: </label>
		<input type="text" name="Password" id="Password" data-mini="true" placeholder="Password" value="<?php print $row["Password"] ?>"/>
	</div>	
	<div data-role="fieldcontain" class="ui-hide-label">
		<label for="aVersion">Latitude: (optional)</label>
		<input type="text" name="GEO_Lat" id="GEO_Lat" data-mini="true" placeholder="" value="<?php print $row['GEO_Lat'] ?>" onclick="changetext(this.value);" />
	</div>		
	<div data-role="fieldcontain" class="ui-hide-label">
		<label for="aVersion">Longitude: (optional) </label>
		<input type="text" name="GEO_Long" id="GEO_Long" data-mini="true" placeholder="" value="<?php print $row['GEO_Long'] ?>" onclick="changetext(this.value);" />
	</div>		
	<br>
	<b>Images</b>
	<hr>
	<?php
	if($f==1){
	?>
	<div data-role="fieldcontain" class="ui-hide-label">
		<label for="aVersion">Image URL: </label>
		<input type="text" name="Image" id="Image" data-mini="true" placeholder="Image URL" value="<?php print $row["Image"] ?>"/>
	</div>	
	OR
	
	<?php
	}
	?>
	<div data-role="fieldcontain" class="ui-hide-label">
		<label for="aVersion">Image Upload: (max size is 1mb) <br><br>current file: <b> [<?php print $row["Image_File"] ?> ]<br><br></label>
		</b>
		<input type="file" name="file" id="file" style="width:300px"/>
        </div>	
	<br>

	<b>Leads</b>
	<hr>
	<div data-role="fieldcontain" class="ui-hide-label">
		
		<?php
		
		$Buy_Check = $row["Buy"];
		
		if($Buy_Check == 1){
			$Buy_Check = 'checked';
		}
		$Rent_Check = $row["Rent"];
		
		if($Rent_Check == 1){
			$Rent_Check = 'checked';
		}
		$Sell_Check = $row["Sell"];
		
		if($Sell_Check == 1){
			$Sell_Check = 'checked';
		}
		
		?>
		
		<input type="checkbox" name="Buy" value="1" <?php print $Buy_Check ?>>Buying<br>
		<input type="checkbox" name="Rent" value="1" <?php print $Rent_Check ?>>Renting<br> 
		<input type="checkbox" name="Sell" value="1" <?php print $Sell_Check ?>>Selling<br> 

	</div>
	
	<br>
	<input type="hidden" name="Update_Hidden" id="basic" data-mini="true" value='<?php print $row['id'] ?>'/>
	<input type="Submit" name="Update" value="Update" data-mini='true' data-theme="b" class="button binactive" />
</form><br>
<a href='index.php?Page=Agents&BR_ID=<?php $row['B_ID']?>' data-role='button' data-mini='true' data-ajax='false'  style='color:#036;'>Back</a>

<div style='clear:both'></div>

<?php
}else{
print "Sorry this MLS doesn't exsist.";
}

}
?>

<script>
  function changetext(longi)
  { if(longi){
      jQuery('.ui-hide-label #GEO_Lat').attr("disabled","disabled") ;
      jQuery('.ui-hide-label #GEO_Long').attr("disabled","disabled") ;
     }
  }
</script>
