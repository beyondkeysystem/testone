<div align="center">
<header>
<b class="alt">Welcome please login.</b>
</header>
<?php
if($Login_Error==2){

print "Sorry the username or password is incorrect, <a href='index.php?Page=Login'>try again.</a> ";

}else{

?>
<form action="index.php?Page=Login&Login=1" method="post" data-ajax="false" style="max-width:400px;">
<input type="text" name="Username" id="basic" data-mini="true" Placeholder="Enter Email Address" />
<input type="password" name="Password" id="basic" data-mini="true" Placeholder="Enter Password" />

<!--starts here-->
<select  name="Type" id="basic" data-mini="true" >
    <option value="">Select Type</option>
    <option value="2">Broker</option>
    <option value="3">Agent</option>
</select>
<!--ends here-->
<input type="hidden" name="Login" id="basic" data-mini="true" data-theme="b" value='1' /><br>
<input type="Submit" name="Submit" value="Login" data-theme="b" class="button binactive">
<br><br>
<a href="index.php?Page=Registration" class='button binactive' style="display:block; width:250px; padding-top:7px;height:35px;">CLICK TO REGISTER</a><br>
<a href="index.php?Page=Forgot" class='button bactive' style="display:block; width:250px; padding-top:7px;height:35px;">Forgot Password</a>

</form>

<?php
}
?>

</div>
