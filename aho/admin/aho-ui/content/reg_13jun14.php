<div data-role="content">
	<h3>Register</h3>
	
		<br><br>
<?php
if($Reg == '1'){
        if($Check_Registration == '3'){
		print "<br>Username is already in use or passwords do not match please <a href='index.php?Page=Registration' data-ajax='false'>try again.</a>";
        }else if($Check_Registration == 4){
            print "<br>Select a broker for the agent. <a href='index.php?Page=Registration' data-ajax='false'>try again.</a>";
        }else{
		print "<br>Thank you for registering. <a href='index.php?Page=Accounts'  data-ajax='false'>Get started now.</a>";
	}
}else{
?>


<form action="index.php?Page=Registration&Reg=1" method="post" data-ajax="false">

<label for="basic">Email:</label>
<input type="text" name="Username" id="basic" data-mini="true" /><br>

<label for="basic">Password:</label>
<input type="password" name="Password" id="basic" data-mini="true" /><br>

<label for="basic">Type Password again:</label>
<input type="password" name="Password2" id="basic" data-mini="true" /><br>

<label for="basic">Type:</label>
<select  name="Type" id="basic" data-mini="true" class="user_type">
    <option value="">Select Type</option>
    <option value="2">Broker</option>
    <option value="3">Agent</option>
</select>
<br>
<!-- commented on 16 may14
<div id ="brker_list" style="display:none">
<label for="basic">Broker:</label>

<select  name="Broker" id="basic" data-mini="true" >
    <option value="">Select Broker</option>
<?php $sql = "SELECT * FROM AHO_User WHERE b_id = '0' AND Type = '2'";
      $sql_result = mysql_query($sql);
      while ($row = mysql_fetch_array($sql_result)) {?>
          <option value="<?php echo  $row['id']?>"><?php echo $row['Email_1']?></option>
<?php } ?>
</select>
<br>
</div>
-->
<input type="hidden" name="Reg" id="basic" data-mini="true" value='1' />

<input type="Submit" name="Submit" data-theme="b" value="Register">

</form>


<?php
}
?>

</div>
<script>
    /* commented on 16 may14
     $(".user_type").change(function(){
        if($(".user_type").val() == 3){
            $("#brker_list").css('display','');
        }else{
             $("#brker_list").css('display','none');
        }
        
    });
     $(".user_type").keypress(function(){
        if($(".user_type").val() == 3){
            $("#brker_list").css('display','');
        }else{
             $("#brker_list").css('display','none');
        }
        
    });
    */
</script>