<?php
if(isset($_POST['send_mail'])){
      require 'mail/PHPMailerAutoload.php';
       $email_arr = $_POST['email_id'];
       $recipients = explode(',' , $email_arr);
       $recipients  = array_filter($recipients);
	
        try { $mail = new PHPMailer(true);
	// Set PHPMailer to use the sendmail transport
	$mail->isSendmail();
	//Set who the message is to be sent from
	$mail->setFrom('support@americanhomesonline.com', 'American Homes Online');
	//Set an alternative reply-to address
	$mail->addReplyTo('sameer.chourasia@cisinlabs.com', 'Sameer Chaurasia');
	//Set who the message is to be sent to
	foreach($recipients as $email)
	{
        	$mail->AddBCC($email);
	}
	//Set the subject line
	$mail->Subject = $_REQUEST['subject'];
	//Read an HTML message body from an external file, convert referenced images to embedded,
	//convert HTML into a basic plain-text alternative body
	   //$mail->msgHTML(file_get_contents('contents.html'), dirname(__FILE__));
	$mail->msgHTML("<html><head><title>American Homes Online</title></head>
			  <body>
			       ".addslashes($_REQUEST['message'])."<br>
			  </body>
			  </html>");
	//Click <a href='".$_REQUEST['AHO_AS']."&AID=".$AID."&Request=".$request_id."' style='font-weight:bold;color:#ff0000'>here</a> to see Agents Profile.
	//Replace the plain text body with one created manually
	$mail->AltBody = 'This is a plain-text message body';
	//Attach an image file
	  //$mail->addAttachment('images/phpmailer_mini.png');
	//send the message, check for errors
	$send = $mail->send();
        
	  $msg_status = "Mail Send Successfully.";
    } catch (phpmailerException $e) {
      $msg_status = $e->errorMessage(); //Pretty error messages from PHPMailer
    } catch (Exception $e) {
      $msg_status = $e->getMessage(); //Boring error messages from anything else!
    }
	
	
         
}
?>
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
.right-align{text-align: right;}

drop_width{ width:40px}
</style>



<header>
	<center> <h3><br>Consumers</h3></center>
	<?php if($msg_status != ''){ ?>
	<br>
	    <center><?=$msg_status?></center>
	<?php } ?>
</header>

<?php
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
    ?>
		Select Request Type to Send Mail <select name="mail_group" id="drop">
		    <option >Select</option>
		    <option >Buy</option>
		    <option >Rent</option>
		    <option >Sell</option>
		</select>
	<form action="" method="post" id="send_mail_form">
	    <table id="mytable">
		<tr>
		    <th>S.No.</th><th>Consumer ID</th><th>Name</th><th>Request Type</th><th>Email ID</th><th>Comment</th><th>Lead ID</th><!--<th>Agent ID</th>--><th>Reg. Date</th><th>Action</th><th>Actions</th>
		</tr>
		<?php
		    $i=0;
		    while($row = mysql_fetch_object($sql_result))
		    {
		    
					if($row->Request_Type==1){
					    $type = 'Buy';
					}
					elseif($row->Request_Type==2){
					    $type = 'Rent';
					}
					elseif($row->Request_Type==3){
					    $type = 'Sell';
					}
					    
				    
			?>
			    <tr class="<?=$type?>" >
				<td><?php echo ++$i;?></td>
				<td id="customerid"><?php echo $row->ID;?></td>
				<td><?php echo $row->Full_Name;?></td>
				<td>
				    <?php
					if($row->Request_Type==1){
					    echo 'Buy';
					}
					elseif($row->Request_Type==2){
					    echo 'Rent';
					}
					elseif($row->Request_Type==3){
					    echo 'Sell';
					}
					    
				    ?>
				</td>
				<td><a target="_parent" style="color:#53abe0;" href="mailto:<?php echo $row->Email_ID;?>?Subject=Admin%20Feedback%20from%20American%20Homes%20Online"><?php echo $row->Email_ID;?></a></td>
				<td title="<?php echo $row->Comment;?>" style="cursor: pointer;"><?php echo substr($row->Comment,0,10).'...';?></td>
				<td><?php if($row->Lead_ID){echo $row->Lead_ID;}else{echo 'No Lead Assigned';}?></td>
				<!--<td><?php if($row->Agent_ID){echo $row->Agent_ID;}else{echo 'No Agent Assigned';}?></td>-->
				<td><?php echo date('d-M-Y H:i:s',strtotime($row->Registration_Date));?></td>
				<td>
				    <a href="index.php?Page=Consumers&Remove=1&ID=<?php echo $row->ID;?>" onclick="return confirm('Do you really want to delete this record?');">Delete</a>
				</td>
				<td> <input type="checkbox"  name="selectsendmail" value="<?=$row->Email_ID;?>" class="sendmail_checkbox"/> </td>
			    </tr>
			<?php
		    }
		?>
	    </table>
	    <div class="right-align">
		<a class="button new-login"  name="delete_select" id="delete_select" class="target drop_width" >Delete</a>
		<a class="button new-login"  name="send" id="send_mail" class="target drop_width" >Send Mail</a>
	    </div>
	    
		

	</form>
	
<script>
    $( "#drop" ).change(function() {
	var sel_val = $("#drop option:selected").val();
	if (sel_val == 'Rent') {
	    $('#mytable tr').each(function() {
		$("tr.Rent").find("td input:checkbox").prop('checked',true);
		$("tr.Buy").find("td input:checkbox").prop('checked',false);
		$("tr.Sell").find("td input:checkbox").prop('checked',false);
		
	  });
	}else if (sel_val == 'Buy') {
	    $('#mytable tr').each(function() {
		$("tr.Buy").find("td input:checkbox").prop('checked',true);
		$("tr.Rent").find("td input:checkbox").prop('checked',false);
		$("tr.Sell").find("td input:checkbox").prop('checked',false);
	  });
	}else if (sel_val == 'Sell') {
	    $('#mytable tr').each(function() {
		$("tr.Sell").find("td input:checkbox").prop('checked',true);
		$("tr.Buy").find("td input:checkbox").prop('checked',false);
		$("tr.Rent").find("td input:checkbox").prop('checked',false);
	  });
	}

    });
</script>	
	
    <?php
}
else
{
    echo "<h4><font color='red'>No Record Found</font></h4>";
}
?>

<div style="clear:both"></div>
<script>
	
		$("#delete_select").click(function(){
				var id = [];        
	            $('.sendmail_checkbox:checked').each(function(i){
	                $(this).filter(function(){
	                	id[i] =$(this).parent('td').parent('tr').children('td#customerid').text();
	                });
	            });
	            $.post(
	            	"?Page=DeleteSelectedConsumer",
	            	{'consumerid':id},
	    	    	function(data){
	    	    		window.location="http://americanhomesonline.com/admin/index.php?Page=Consumers";
	            	}
	            );
		 });
</script>

<?php

include("send_mail_popup.php");
?>