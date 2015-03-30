<div align="center">
<header>
<b class="alt">Welcome please login.</b>
</header>
<?php
if($Login_Error==2){

print "Sorry the username or password is incorrect, <a href='index.php?Page=Login'>try again.</a> ";

}else{

?>
<form action="index.php?Page=AdminLogin&AdminLogin=1" method="post" data-ajax="false" style="max-width:400px;">
<input type="text" name="Username" id="basic" data-mini="true" Placeholder="Enter Email Address" />
<input type="password" name="Password" id="basic" data-mini="true" Placeholder="Enter Password" />


<input type="hidden" name="Login" id="basic" data-mini="true" data-theme="b" value='1' /><br>
<input type="Submit" name="Submit" value="Login" data-theme="b" class="button binactive">
<br><br>

</form>

<?php
}
?>

</div>
