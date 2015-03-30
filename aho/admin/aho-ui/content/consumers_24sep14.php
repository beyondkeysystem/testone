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
	<center> <h3><br>Consumers</h3></center>
</header>

<?php
/*if(isset($_POST['update_consumer']) &&  $_POST['ID']!= ''){
	
    $Full_Name = $_POST['Full_Name'];
    $Phone_No = $_POST['Phone_No'];
    $Email_ID = $_POST['Email_ID'];
    $Comment = $_POST['Comment'];
    if(strlen($Full_Name)<=0){
       echo "<h4><font color='red'>Enter the Full Name</font></h4>";
    }
    else if(strlen($Phone_No)<=0){
       echo "<h4><font color='red'>Enter the Phone No.</font></h4>";
    }
    else if(strlen($Email_ID)<=0){
       echo "<h4><font color='red'>Enter the Email ID</font></h4>";
    }
    else if(strlen($Comment)<=0){
       echo "<h4><font color='red'>Enter the Comment</font></h4>";
    }
    else{
	print "<h4><font color='green'>Consumer Info Updated</font></h4>";
       
	$sql = "UPDATE AHO_Consumers SET 
	    Full_Name ='".$Full_Name."',
	    Phone_No ='".$Phone_No."',
	    Email_ID ='".$Email_ID."',
	    Comment ='".$Comment."' 
	    
	WHERE ID = '".$_POST["ID"]."'";
	
	$query = mysql_query($sql) or die(mysql_error());
       
    }
	
	
}*/
if(isset($_REQUEST['Remove']) && !empty($_REQUEST["ID"])){
    
    $sql = "DELETE from AHO_Consumers WHERE ID = '".$_REQUEST["ID"]."'"; 
    $sql_result = mysql_query($sql) or die(mysql_error());
    $sql = "DELETE from AHO_Agent_Leads WHERE Consumer_ID = '".$_REQUEST["ID"]."'"; 
    $sql_result = mysql_query($sql) or die(mysql_error());
    header('location:index.php?Page=Consumers');
}
$sql = "SELECT * FROM AHO_Consumers where Verification_Status=1 order by Registration_Date desc ";
$sql_result = mysql_query($sql) or die(mysql_error());
if($sql_result && mysql_num_rows($sql_result))
{
    ?><br><br>
	    <table>
		<tr>
		    <th>S.No.</th><th>Consumer ID</th><th>Name</th><th>Phone No.</th><th>Email ID</th><th>Comment</th><th>Lead ID</th><th>Agent ID</th><th>Reg. Date</th><th>Action</th>
		</tr>
		<?php
		    $i=0;
		    while($row = mysql_fetch_object($sql_result))
		    {
			?>
			    <tr>
				<td><?php echo ++$i;?></td>
				<td><?php echo $row->ID;?></td>
				<td><?php echo $row->Full_Name;?></td>
				<td><?php echo $row->Phone_No;?></td>
				<td><?php echo $row->Email_ID;?></td>
				<td><?php echo substr($row->Comment,0,10).'...';?></td>
				<td><?php if($row->Lead_ID){echo $row->Lead_ID;}else{echo 'No Lead Assigned';}?></td>
				<td><?php if($row->Agent_ID){echo $row->Agent_ID;}else{echo 'No Agent Assigned';}?></td>
				<td><?php echo date('d-M-Y H:i:s',strtotime($row->Registration_Date));?></td>
				<td>
				    <!--<a href="index.php?Page=Consumers&Update=1&ID=<?php echo $row->ID;?>">Update</a> |-->
				    <a href="index.php?Page=Consumers&Remove=1&ID=<?php echo $row->ID;?>" onclick="return confirm('Do you really want to delete this record?');">Delete</a>
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
<?php/*
    if(isset($_REQUEST['Update']) && !empty($_REQUEST['ID'])){
	$ID = $_REQUEST['ID'];
	$sql = "select * from AHO_Consumers where ID=$ID";
	$query = mysql_query($sql) or die(mysql_error());
	if($query && mysql_num_rows($query) ){
	    $row = mysql_fetch_object($query);
	    $Full_Name = $row->Full_Name;
	    $Email_ID = $row->Email_ID;
	    $Phone_No = $row->Phone_No;
	    $Comment = $row->Comment;
	}
	?>
	<center>
	<form action="index.php?Page=Consumers" method="post" enctype="multipart/form-data">
	    <div >
		<label>Full Name</label>
		<input type="hidden" name="ID" value="<?php echo $ID;?>"/>
		<input type="text" name="Full_Name" id="Full_Name" value="<?php echo $Full_Name;?>" />
	    </div>
	    <br>
	    <div>
		<label>Phone No.</label>
		<input type="text" name="Phone_No" id="Phone_No" value="<?php echo $Phone_No;?>" />
	    </div>
	    <br>
	    <div>
		<label>Email ID</label>
		<input type="text" name="Email_ID" id="Email_ID" value="<?php echo $Email_ID;?>" />
	    </div>
	    <br>
	    <div>
		<label>Comment</label>
		<textarea name="Comment" id="Comment" ><?php echo $Comment;?></textarea>
	    </div>
	    <br>	
	    <center><input type="submit" id="update_consumer" class="button" name="update_consumer" Value="Update" onclick="return check_data();"/></center>
	     
	</form>
	</center>
	<?php
    }*/

?>
<script>
    /*function check_data(){
	
	var Full_Name = $('#Full_Name').val().trim();
	var Phone_No = $('#Phone_No').val().trim();
	var Email_ID = $('#Email_ID').val().trim();
	var Comment = $('#Comment').val().trim();
	if (Full_Name.length<=0) {
	    alert('Enter the Full Name');
	    $('#Full_Name').focus();
	    return false;
	}
	else if (Phone_No.length<=0) {
	    alert('Enter the Phone No.');
	    $('#Phone_No').focus();
	    return false;
	}
	else if (Email_ID.length<=0) {
	    alert('Enter the Email ID');
	    $('#Email_ID').focus();
	    return false;
	}
	else if (Comment.length<=0) {
	    alert('Enter the Comment.');
	    $('#Comment').focus();
	    return false;
	}
	else{
	    
	    if( checkEmail(Email_ID)){
		return true;
	    }
	    else{
		alert('Enter the Valid Email ID');
		$('#Email_ID').focus();
		return false;
	    }
	   
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
