<style type="text/css">
.sTable th {
   
    border-left: 1px solid #CBCBCB;
    color: #878787;
    font-size: 11px;
    font-weight: normal;
    padding: 3px 8px 2px;
}


.sTable  td {
    border-left: 1px solid #CBCBCB;
    padding: 8px 12px;
    vertical-align: middle;
}
table, th, td
{
border: 1px solid #CBCBCB;
}
.hide{
    display:none;
}
.show{
    display: block;
}
</style>
<header>
	<center> <h3><br>Credit Settings</h3></center>
</header>
<hr>
<?php if($ID == "" & $Add != 1){?>
<ul>
    <li>
        <a href='index.php?Page=Subscription&Add=1' data-role='button'  data-mini='true' class='button binactive' style='font-size:12px;float:right' data-ajax='false'>ADD</a>
    </li>
</ul>
<br>
<?php } ?>
<?php
if($Save != ''){
	
	print "<h4><font color='green'>Info added Successfuly</font></h4>";
        $Type = $_POST["type"];
	mysql_query("INSERT INTO subscription_periods (type,deduct_amount,time_period,time_duration,saving_amount,no_of_credits,no_of_leads) VALUES
            ('$Type','$deduct_amount','$time_period','$time_duration','$saving_amount','$no_of_credits','$no_of_leads')");
     

}
if($Update != ''){
	
	print "<h4><font color='green'>Info Updated</font></h4>";
        $Type = $_POST["type"];

	mysql_query("UPDATE subscription_periods SET 
	
	type = '$Type',
	deduct_amount ='$deduct_amount',
	
	time_period = '$time_period',
	time_duration = '$time_duration',

	saving_amount = '$saving_amount',
	no_of_credits = '$no_of_credits',
	no_of_leads = '$no_of_leads'
	
	WHERE id = '$Update_Hidden' ");
		
     

}

if($ID == "" & $Add != 1){
$sql = "SELECT * FROM subscription_periods ";


$sql_result = mysql_query($sql);
 
   print  "<table class = 'sTable'>";
            echo "<tr>
            <th text-align = 'center' style='font-weight: bolder; font-size: 22px; color: black;'>Type</th>
            <th style='font-weight: bolder; font-size: 22px; color: black;'>Amount (in Dollars)</th>
            <th style='font-weight: bolder; font-size: 22px; color: black;'>Time Period</th>
            <th style='font-weight: bolder; font-size: 22px; color: black;'>Time Duration</th>
            <th style='font-weight: bolder; font-size: 22px; color: black;'>Saving Amount</th>
            <th style='font-weight: bolder; font-size: 22px; color: black;'>No of Credits</th>
            <th style='font-weight: bolder; font-size: 22px; color: black;'>No of Leads</th>
            <th style='font-weight: bolder; font-size: 22px; color: black;width:14%'>Actions</td></th>";
while ($row = mysql_fetch_array($sql_result)) {
    echo "<tr>";
            echo "<td style=' font-size: 22px; color: black;'>".$row['type']."</td>
            <td style='font-size: color: black;'>".$row['deduct_amount']."</td>
            <td style='font-size: 22px; color: black;'>".$row['time_period']."</td>
            <td style='font-size: 22px; color: black;'>".$row['time_duration']."</td>
            <td style='font-size: 22px; color: black;'>".$row['saving_amount']."</td>
            <td style='font-size: 22px; color: black;'>".$row['no_of_credits']."</td>
            <td style='font-size: 22px; color: black;'>".$row['no_of_leads']."</td>
            <td>
                <ul>
                    <li>
                        <a href='index.php?Page=Subscription&ID={$row['id']}' data-role='button'  data-mini='true' class='button binactive' style='font-size:12px;' data-ajax='false'>Edit</a>
                         <a href='aho-ui/content/pops/remove_subscription.php?ID={$row['id']}' class='various fancybox.iframe button bactive bsmall' style='font-size:12px;'>Remove</a>
                    </li>
                </ul>
            </td>";
            echo "</tr>";
}

print "</table>";
}else{?>
    <b>Account Info</b>
  <?php 
  $sql = "SELECT * FROM subscription_periods WHERE id = '".$ID."'";
  $sql_result = mysql_query($sql);
  $row = mysql_fetch_array($sql_result);
  if($row['id'] != ''){
  ?>
<hr>
<form action="index.php?Page=Subscription" method="post" data-ajax="false" data-mini="true" enctype="multipart/form-data" class="adminforms">
	<div data-role="fieldcontain" class="ui-hide-label">
		<!--<label for="type">Type:</label>
                <select name="type" id="type" >
                    <option value="">Select Type</option>
                    <option value="credit" <?php echo ($row['type'] == "credit")?"selected='selected'":""?>>Credits</option>
                    <option value="lead" <?php echo ($row['type'] == "lead")?"selected='selected'":""?>>Leads</option>
                    <option value="30 day <?php echo ($row['type'] == "30 day")?"selected='selected'":""?>">30 Day Code</option>
                    <option value="31 day <?php echo ($row['type'] == "31 day")?"selected='selected'":""?>">31 Day Code</option>
                </select>-->
		
	</div><br>
	
        <div data-role="fieldcontain" class="ui-hide-label <?php echo ($row['type'] == "credit")?"":"hide"?>">
		<label for="adeduct_amount">Amount (in Dollars):</label>
		<input type="text" name="deduct_amount" id="deduct_amount" data-mini="true" placeholder="Amount (in Dollars):" value="<?php print $row["deduct_amount"] ?>"/>
	</div>
	<div data-role="fieldcontain" class="ui-hide-label <?php echo ($row['type'] == "30 day" || $row['type'] == "31 day")?"":"hide"?>">
		<label for="atime_period">Time Period:</label>
		<input type="text" name="time_period" id="time_period" data-mini="true" placeholder="Email:" value="<?php print $row["time_period"] ?>"/>
	</div>
	<div data-role="fieldcontain" class="ui-hide-label hide">
		<label for="atime_duration">Time Duration:</label>
		<input type="text" name="time_duration" id="time_duration" data-mini="true" placeholder="Time Duration:" value="<?php print $row["time_duration"] ?>"/>
	</div>
	<div data-role="fieldcontain" class="ui-hide-label hide">
		<label for="asaving_amount">Saving Amount:</label>
		<input type="text" name="saving_amount" id="saving_amount" data-mini="true" placeholder="Saving Amount:" value="<?php print $row["saving_amount"] ?>"/>
	</div>
	<div data-role="fieldcontain" class="ui-hide-label <?php echo ($row['type'] == "lead")?"":"hide"?>">
		<label for="ano_of_leads">No Of Leads:</label>
		<input type="text" name="no_of_leads" id="no_of_leads" data-mini="true" placeholder="No Of Leads:" value="<?php print $row["no_of_leads"] ?>"/>
	</div>
	<div data-role="fieldcontain" class="ui-hide-label ">
		<label for="ano_of_credits">No Of Credits: </label>
		<input type="text" name="no_of_credits" id="no_of_credits" data-mini="true" placeholder="No Of Credits" value="<?php print $row["no_of_credits"] ?>"/>
	</div>
        <br>
	<input type="hidden" name="Update_Hidden" id="basic" data-mini="true" value='<?php print $row['id'] ?>'/>
	<input type="Submit" name="Update" value="Update" data-mini='true' data-theme="b" class="button binactive" />
</form><br>
  <?php }}
  if($Add ==1){
?>
<form action="index.php?Page=Subscription" method="post" data-ajax="false" data-mini="true" enctype="multipart/form-data" class="adminforms">
	<div data-role="fieldcontain" class="ui-hide-label">
		<label for="type">Type:</label>
                <select name="type" id="type" >
                    <option value="">Select Type</option>
                    <option value="credit">Credits</option>
                    <option value="lead">Leads</option>
                    <option value="30 day">30 Day Code</option>
                    <option value="31 day">31 Day Code</option>
                </select>
		
	</div><br>
	
	<div data-role="fieldcontain" class="ui-hide-label credits hide">
		<label for="adeduct_amount">Amount (in Dollars):</label>
		<input type="text" name="deduct_amount" id="deduct_amount" data-mini="true" placeholder="Amount (in Dollars):" value="<?php print $row["deduct_amount"] ?>"/>
	</div>
        
	<div data-role="fieldcontain" class="ui-hide-label day_30 hide">
		<label for="atime_period">Time Period:</label>
		<input type="text" name="time_period" id="time_period" data-mini="true" placeholder="Time Period:" value="<?php print $row["time_period"] ?>"/>
	</div>
	<div   data-role="fieldcontain" class="ui-hide-label hide">
		<label for="atime_duration">Time Duration:</label>
		<input type="text" name="time_duration" id="time_duration" data-mini="true" placeholder="Time Duration:" value="<?php print $row["time_duration"] ?>"/>
	</div>
	<div   data-role="fieldcontain" class="ui-hide-label hide">
		<label for="asaving_amount">Saving Amount:</label>
		<input type="text" name="saving_amount" id="saving_amount" data-mini="true" placeholder="Saving Amount:" value="<?php print $row["saving_amount"] ?>"/>
	</div>
	<div  data-role="fieldcontain" class="ui-hide-label leads hide">
		<label for="ano_of_leads">No Of Leads:</label>
		<input type="text" name="no_of_leads" id="no_of_leads" data-mini="true" placeholder="No Of Leads:" value="<?php print $row["no_of_leads"] ?>"/>
	</div>
	<div  data-role="fieldcontain" class="ui-hide-label hide credits leads day_30">
		<label for="ano_of_credits">No Of Credits: </label>
		<input type="text" name="no_of_credits" id="no_of_credits" data-mini="true" placeholder="No Of Credits" value="<?php print $row["no_of_credits"] ?>"/>
	</div>
        <br>
	<input type="hidden" name="Add_Hidden" id="basic" data-mini="true" value=''/>
	<input type="Submit" name="Save" value="Save" data-mini='true' data-theme="b" class="button binactive" />
</form><br>
  <?php } ?>

<div style="clear:both"></div>


<script>
    $('#type').change(function(){
        if($('#type').val() == 'credit'){
            if($('#type').val() == 'credit'){
                 $('.leads').addClass('hide');
                 $('.day_30').addClass('hide');
                 $('.credits').removeClass('hide');

            }else{
                $('.credits').addClass('hide');
            }
        }
        if(($('#type').val() == 'lead')){
            if($('#type').val() == 'lead'){
                $('.credits').addClass('hide');
                $('.day_30').addClass('hide');
                $('.leads').removeClass('hide');
            }else{
                $('.leads').addClass('hide');
            }
        }
        if($('#type').val() == '30 day' || $('#type').val() == '31 day'){
            if($('#type').val() == '30 day' || $('#type').val() == '31 day'){
                 $('.leads').addClass('hide');
                 $('.credits').addClass('hide');
                 $('.day_30').removeClass('hide');
            }else{
                $('.day_30').addClass('hide');
            }
        }    
    });
</script>
