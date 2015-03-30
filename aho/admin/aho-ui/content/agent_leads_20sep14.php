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
td{text-align: center; vertical-align:middle;}
label{padding:5px;font-weight: bold;}
table a{text-decoration: none;}
th{font-weight:bold;font-size:16px;}
.container{width:95% !important;}
form{width:70% !important;}
form label{text-align: left;}
</style>
<header>
	<center> <h3><br>Leads</h3></center>
</header>

<?php
/*if(isset($_POST['update_consumer']) &&  $_POST['ID']!= ''){
	
    $Property_ID = $_POST['Property_ID'];
    $Agent_ID = $_POST['Agent_ID'];
   
    if($Property_ID<=0){
       echo "<h4><font color='red'>Enter the Valid Property ID</font></h4>";
    }
    else if($Agent_ID<=0){
       echo "<h4><font color='red'>Enter the Valid Agent ID</font></h4>";
    }
    else{
	print "<h4><font color='green'>Lead Info Updated</font></h4>";
       
	$sql = "UPDATE AHO_Consumers SET 
	    Property_ID ='".$Property_ID."',
	    Agent_ID ='".$Agent_ID."'
	    WHERE ID = '".$_POST["ID"]."'";
	
	$query = mysql_query($sql) or die(mysql_error());
       
    }
	
	
}*/
function get_lead_status($Consumer_ID,$uid)
{
    $sql = "select * from AHO_Agent_Leads where Is_Accepted=1 and Consumer_ID='".$Consumer_ID."'";
    $query = mysql_query($sql) or die(mysql_error());
    if($query && mysql_num_rows($query)>0){
	$row = mysql_fetch_object($query);
	   
	    if($row->Agent_ID==$uid){
		return 1;
	    }
	    else{
		return 2;
	    }
    }
    else{
	return 3;
    }
}
if(isset($_REQUEST['Accept']) &&  $_REQUEST['ID']!= '' && $_REQUEST['Consumer_ID']!= ''){
    
    $sql = "select credits from AHO_User where id=$User_ID";
    $query = mysql_query($sql) or die(mysql_error()); 
    if($query && mysql_num_rows($query)>0){ 
	$row = mysql_fetch_object($query);
	
	$credits_available = $row->credits;
	$new_credits = $credits_available-5;
	if($credits_available>=5){
	    $sql = "UPDATE AHO_Agent_Leads SET 
	    Is_Accepted =1
	    WHERE ID = '".$_REQUEST["ID"]."' and Agent_ID = $User_ID";
	    $query = mysql_query($sql) or die(mysql_error());
    
	    $sql = "UPDATE AHO_Consumers SET 
	    Lead_ID ='".$_REQUEST['ID']."',
	    Agent_ID =$User_ID 
	    WHERE ID = '".$_REQUEST["Consumer_ID"]."'";
	    $query = mysql_query($sql) or die(mysql_error());
	    
	    $sql = "UPDATE AHO_User SET 
	    credits = $new_credits
	    WHERE id = $User_ID";
	    $query = mysql_query($sql) or die(mysql_error());
	    
	}
	else{
	    echo "<h4><font color='red'>You must have atleast 3 Credits in your account to accept lead.</font></h4>";
	}
    }
    else{ 
	header('location:http://www.americanhomesonline.com/admin');
    }
   
    
    
}
if(isset($_REQUEST['Remove']) && !empty($_REQUEST["ID"])){
    $sql = "DELETE from AHO_AHO_Leads WHERE ID = '".$_REQUEST["ID"]."'"; 
    $sql_result = mysql_query($sql); 
    header('location:index.php?Page=AgentLeads');
}
//$sql = "SELECT * FROM AHO_Consumers where Property_ID>0 AND Agent_ID>0";
$sql = "SELECT AL.ID AS Lead_ID, AL.Property_ID,AL.Consumer_ID,C.Email_ID as Consumer_Email,AL.Received_Date,AL.Is_Accepted FROM AHO_Consumers C,AHO_Agent_Leads AL where AL.Agent_ID='".$User_ID."'and C.ID = AL.Consumer_ID order by AL.Received_Date desc";
$sql_result = mysql_query($sql) or die(mysql_error());
if($sql_result && mysql_num_rows($sql_result))
{
    ?><br><br>
	    <table>
		<tr>
		    <th>S.No.</th>
		    <th>Lead ID</th>
		    <th>Consumer ID</th>
		    <th>Consumer Email ID</th>
		    <th>Property ID</th>
		    <th>Lead Status</th>
		    <th>Reg. Date</th>
		    <th>Action</th>
		</tr>
		<?php
		    $i=0;
		    while($row = mysql_fetch_object($sql_result))
		    {
			?>
			    <tr>
				<td><?php echo ++$i;?></td>
				<td><?php echo $row->Lead_ID;?></td>
				<td><?php echo $row->Consumer_ID;?></td>
				<td><?php echo $row->Consumer_Email;?></td>
				<td><?php if($row->Property_ID){echo $row->Property_ID;}else{echo "Not Available";}?></td>
				<td>
				<?php
				    $status = get_lead_status($row->Consumer_ID,$User_ID);
				    if($status==1){
					echo 'Accepted';
				    }
				    else if($status==2){
					echo 'Accepted by Other Agent';
				    }
				    else if($status==3){
					?>
					<a href="index.php?Page=AgentLeads&Accept=1&ID=<?php echo $row->Lead_ID;?>&Consumer_ID=<?php echo $row->Consumer_ID;?>">Accept</a>
					<?php
				    }
				?>
				</td>
				<td><?php echo date('d-M-Y H:i:s',strtotime($row->Received_Date));?></td>
				<td>
				    <!--<a href="index.php?Page=AgentLeads&Update=1&ID=<?php echo $row->Lead_ID;?>">Update</a> |-->
				    <a href="index.php?Page=AgentLeads&Remove=1&ID=<?php echo $row->Lead_ID;?>" onclick="return confirm('Do you really want to delete this record?');">Delete</a>
				</td>
			    </tr>
			<?php
		    }
		?>
	    </table>
    <?php
}
else
{
    echo "<h4><font color='red'>No Record Found</font></h4>";
}
?>

<div style="clear:both"></div>
<br>
<?php
  /*  if(isset($_REQUEST['Update']) && !empty($_REQUEST['ID'])){
	$ID = $_REQUEST['ID'];
	$sql = "select * from AHO_Consumers where ID=$ID";
	$query = mysql_query($sql) or die(mysql_error());
	if($query && mysql_num_rows($query) ){
	    $row = mysql_fetch_object($query);
	    $Property_ID = $row->Property_ID;
	    $Agent_ID = $row->Agent_ID;
	}
	?>
	<center>
	<form action="index.php?Page=Leads" method="post" enctype="multipart/form-data">
	    <div >
		<label>Property ID</label>
		<input type="hidden" name="ID" value="<?php echo $ID;?>"/>
		<input type="text" name="Property_ID" id="Property_ID" value="<?php echo $Property_ID;?>" />
	    </div>
	    <br>
	    <div>
		<label>Agent ID.</label>
		<input type="text" name="Agent_ID" id="Agent_ID" value="<?php echo $Agent_ID;?>" />
	    </div>
	    <br>
	    <center><input type="submit" id="update_consumer" class="button" name="update_consumer" Value="Update" onclick="return check_data();"/></center>
	     
	</form>
	</center>
	<?php
    }*/

?>
<script>
   /* function check_data(){
	
	var Property_ID = $('#Property_ID').val().trim();
	var Agent_ID = $('#Agent_ID').val().trim();
	if (parseInt(Property_ID)<=0) {
	    alert('Enter the Valid Property ID');
	    $('#Property_ID').focus();
	    return false;
	}
	else if (parseInt(Agent_ID)<=0) {
	    alert('Enter the Valid Agent ID.');
	    $('#Agent_ID').focus();
	    return false;
	}
	else{
	    return true;
	}
    }
    function checkEmail(emailAddress) {
	var sQtext = '[^\\x0d\\x22\\x5c\\x80-\\xff]';
	var sDtext = '[^\\x0d\\x5b-\\x5d\\x80-\\xff]';
	var sAtom = '[^\\x00-\\x20\\x22\\x28\\x29\\x2c\\x2e\\x3a-\\x3c\\x3e\\x40\\x5b-\\x5d\\x7f-\\xff]+';
	var sQuotedPair = '\\x5c[\\x00-\\x7f]';
	var sDomainLiteral = '\\x5b(' + sDtext + '|' + sQuotedPair + ')*\\x5d';
	var sQuotedString = '\\x22(' + sQtext + '|' + sQuotedPair + ')*\\x22';
	var sDomain_ref = sAtom;
	var sSubDomain = '(' + sDomain_ref + '|' + sDomainLiteral + ')';
	var sWord = '(' + sAtom + '|' + sQuotedString + ')';
	var sDomain = sSubDomain + '(\\x2e' + sSubDomain + ')*';
	var sLocalPart = sWord + '(\\x2e' + sWord + ')*';
	var sAddrSpec = sLocalPart + '\\x40' + sDomain; // complete RFC822 email address spec
	var sValidEmail = '^' + sAddrSpec + '$'; // as whole string
      
	var reValidEmail = new RegExp(sValidEmail);
      
	if (reValidEmail.test(emailAddress)) {
	  return true;
	}
      
	return false;
    }*/
 </script>
