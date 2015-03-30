<script src="js/jquery.min.js"></script>
		<script type="text/javascript">
    $(document).ready(function(){
        $(".custom-select").each(function(){
            $(this).wrap("<span class='select-wrapper'></span>");
            $(this).after("<span class='holder'></span>");
        });
        $(".custom-select").change(function(){
            var selectedOption = $(this).find(":selected").text();
            $(this).next(".holder").text(selectedOption);
        }).trigger('change');
	
	

    });
	</script>
<div align="center" class="ad-login">
<header>
<h3 class="alt">Welcome please login.</h3>
</header>

<?php
if($Login_Error==2){

print "Sorry the username or password is incorrect, <a href='index.php?Page=Login'>try again.</a> ";

}else{

if(isset($_REQUEST['AcceptLead']) &&$_REQUEST['AcceptLead']==1){
    ?>
	<form action="index.php?Page=Login&Login=1&AcceptLead=1" method="post" data-ajax="false" style="max-width:400px;">
    <?php
}
else{
    ?>
    
    <form action="index.php?Page=Login&Login=1" method="post" data-ajax="false" style="max-width:400px;">	
    <?php
}
?>

<input type="text" name="Username" id="basic" data-mini="true" Placeholder="Enter Email Address" />
<input type="password" name="Password" id="basic" data-mini="true" Placeholder="Enter Password" />

<!--starts here-->
<!--<select class="custom-select" name="Type" id="basic" data-mini="true" >
    <option value="">Select Type</option>
    <option value="2">Broker</option>
    <option value="3">Agent</option>
        </select>-->
<!--<select  name="Type" id="basic" data-mini="true" >
    <option value="">Select Type</option>
    <option value="2">Broker</option>
    <option value="3">Agent</option>
</select>-->
<!--ends here-->
<input type="hidden" name="Login" id="basic" data-mini="true" data-theme="b" value='1' /><br>
<div class="min-height1">
<input type="Submit" name="Submit" value="Login" data-theme="b" class="button binactive">
</div>
<div class="min-height1">
<a href="index.php?Page=Registration" class='button binactive'>CLICK TO REGISTER</a>
</div>
<div class="min-height1">
<a href="index.php?Page=Forgot" class='button binactive'>Forgot Password</a>
</div>
</form>

<?php
}
?>

</div>
