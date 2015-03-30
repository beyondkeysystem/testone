<style>
    .right-align{text-align: right;}
    .scroll-y{max-height:1000px; overflow-y: scroll}
    .btnsize{ width:50px;height:20px;padding-top:0px;padding-bottom:25px;width:20% !important;}
    .tdwidth{ width: 30%;}
    .counterwidth{ width: 100px;}
    .leftspan{
	display: block;
	float:left;
	
      }
      
      .rightspan{
	display: block;
	float:right;
	
      }
    @media screen and (max-width:1024px){
	.btnsize {
	    font-size: 10px !important;
	    height: 20px;
	    padding-bottom: 25px;
	    padding-top: 0;
	    text-align: center;
	    width: 18% !important;
	}
    }
    @media screen and (max-width:768px){
	.btnsize {
	    font-size: 10px !important;
	    height: 20px;
	    padding-bottom: 25px;
	    padding-top: 0;
	    text-align: center;
	    width: 19% !important;
	}
	.tdwidth{ width: 40%;}
    }
</style>
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
	    //$mail->addAddress($email);
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
if(isset($_REQUEST['remove_agent']) && !empty($_REQUEST['remove_agent'])){
    
    $status = remove_agent($_REQUEST['remove_agent']);
    ?>
    <script >
	window.location = 'http://www.americanhomesonline.com/admin/index.php?Page=FindAllAgents&find=<?php echo $_REQUEST['find'];?>';
    </script>
    <?php
}
?>

<header><center>
    <h3><br>FIND AN AGENT</h3></center>
    <?php if($msg_status != ''){ ?>
        <br>
        <center><?=$msg_status?></center>
    <?php } ?>
</header>
<hr>

 <script type="text/javascript" src="https://www.google.com/jsapi"></script>
  <script type="text/javascript">
      google.load("visualization", "1", {packages:["corechart"]});
      
   </script>  
<?php

if(isset($_REQUEST['find'])){
    $Find_ID = $_REQUEST['find'];
}
else{
    $Find_ID = $_POST['agent'];
}


$sql = "SELECT * FROM AHO_User WHERE Email_1 LIKE '%$Find_ID%'  OR Name LIKE '%$Find_ID%' AND type = 3 ORDER BY id DESC";

// echo $sql; 
 $sql_result = mysql_query($sql);
 $count = mysql_num_rows($sql_result);
?>
<div>
    <span class="leftspan">Count: <input type="text" disabled class="counterwidth" value="<?=$count?>"/></span>
    <span class="rightspan"><input type="checkbox" class="selectall" id="selectall" name="selectall" value="selectall"/> Select all</span>
</div>
<div style="clear:both"></div><br/>

 <div class="outer-table scroll-y">
    <table class="table-field">
	<tr class="tr-heading">
	    <th>S.No.</th>
	    <th>Select</th>
	    <th>Name</th> 
	    <th>Email ID</th>
	    <th>Reg. Date</th>
	    <th>Action</th>
	</tr>
<?php
    $sno = 1;
    while ($row = mysql_fetch_array($sql_result)) {
	$AID = $row["id"];
	$metadata = $row["resources"];
        $Email_1 = substr($row['Email_1'], 0 , 20);
        $exp_reg_date = explode(' ',$row['Regdate']);
	$reg_date = $exp_reg_date[0];
        
	echo '<tr>';
	    echo '<td><center>'.$sno.'</center></td>';
	    echo "<td class='tdwidth'><a href='index.php?Page=AllAgents&ID={$row['id']}' data-role='button'  data-mini='true' class='button binactive btnsize' style='font-size:12px;' data-ajax='false'>Edit</a>
		<a href='index.php?Page=credits&ID={$row['id']}' data-role='button'  data-mini='true' class='button binactive bsmall btnsize' style='font-size:12px;' data-ajax='false'>Credits</a> 
		<a href='http://www.americanhomesonline.com/admin/index.php?Page=AllAgents&remove_agent=".$row['id']."' data-role='button'  data-mini='true' class='button binactive bsmall btnsize' style='font-size:12px;' data-ajax='false' onclick='return confirm(\"Do you really want to delete this agent?\")'>Remove</a>
    	<a href='?Page=Leads&LID=".$row['id']."' data-role='button'  data-mini='true' class='button binactive bsmall btnsize' style='font-size:12px;' data-ajax='false'>Lead</a> ";
	    echo "</td>";
	    echo '<td>'.$row['Name'].'</td>';
	    echo '<td title="'.$row['Email_1'].'">'.$Email_1.'</td>';
	    echo '<td>'.$reg_date.'</td>';
	    echo '<td><center><input class="sendmail_checkbox checkbox1" type="checkbox" value="'.$row['Email_1'].'" name="selectsendmail"></center></td>';
	echo '</tr>';
	$sno++;
    }
?>
    </table>
</div>
<div style="clear:both"></div><br/>
<div class="right-align">
	<a class="button new-login"  name="delete_select" id="delete_select" class="target drop_width" >Delete</a>
    <a class="button new-login"  name="send" id="send_mail" class="target drop_width" >Send Mail</a>
</div>
<?php
if($AID==''){ print "Add an agent or yourself to get started."; }
?>

<div style="clear:both"></div>
<?php
    include("send_mail_popup.php");
?>

<script>
    	$(document).ready(function() {
	    $('#selectall').click(function(event) {  //on click
		if(this.checked) { // check select status
		    $('.checkbox1').each(function() { //loop through each checkbox
			this.checked = true;  //select all checkboxes with class "checkbox1"              
		    });
		}else{
		    $('.checkbox1').each(function() { //loop through each checkbox
			this.checked = false; //deselect all checkboxes with class "checkbox1"                      
		    });        
		}
	    });

	    $("#delete_select").click(function(){
	    	var arr = [];
            var val_arr = [];        
            $('.sendmail_checkbox:checked').each(function(i){
                arr[i]= $(this).val();
            });
            $.each(unique(arr), function(i, value){
                val_arr[i] = value;
            });
            $.post(
            	"?Page=DeleteSelected",
            	{'mail_id':val_arr},
    	    	function(data){
    	    		window.location="http://americanhomesonline.com/admin/index.php?Page=AllAgents";
            	}
            );
	    });
	   
	});    
</script>