<?php
    //print_r($_SESSION); exit;
    if(!isset($_SESSION['ses_seeker_id']) || empty($_SESSION['ses_seeker_id'])){
?>
<script>
function ajaxLoginAction() {  
    var urlVal = $("#requestURI").val();
    var newURLData = "";
    var commonResponse = "";
    $.post("/common_login_action.php", $("#jobseekerPannelLoginForm").serialize(),
        function(responseData) {  
            if((responseData.search(new RegExp("recruiter", "i"))>=0) || (responseData.search(new RegExp("jobseeker", "i"))>=0)) { 
                $("#insertErrorMessage").html("");
                
                    if(responseData=="jobseeker"){
                        newURLData= "/"+responseData+"/seeker_login_action.php";
                    }
                    if(responseData=="recruiter"){
                        newURLData= "/"+responseData+"/rec_login_action.php";
                    }                  
                
                    $.post(newURLData, $("#jobseekerPannelLoginForm").serialize(),    
                    function(data) {
                    if(data.search(new RegExp(".php", "i"))>=0) { 
                      $("#insertErrorMessage").html("");
                      window.location.href = "/"+responseData+"/"+data;
                    }
                    else { 
                      $("#insertErrorMessage").html("<?php echo "Invalid User ID or Password."; ?>");
                    }   
                });
            }
            else { 
                $("#insertErrorMessage").html("<?php echo "Invalid User ID or Password."; ?>");
                
            }   
       });
   
    
}
$(function() {  
  $(".bt_register").click(function() {  
    // validate and process form here
    if($("#registration_type").val()==0){
      
       $("#signupErrorMessage").html("Please select registration type");
    }
    else {
        window.location.href =  $("#registration_type").val();
    }
   
  });  
});  

</script>

<div id="toppanel">
  <div id="panel">
    <div class="content clearfix">
      <div class="left">
        <h1>Welcome to Web-Kreation</h1>
        <h2>Sliding login panel Demo with jQuery</h2>
        <p class="grey">You can put anything you want in this sliding panel: videos, audio, images, forms... The only limit is your imagination!</p>
        <h2>Download</h2>
        <p class="grey">To download this script go back to <a href="http://web-kreation.com/index.php/tutorials/nice-clean-sliding-login-panel-built-with-jquery" title="Download">article &raquo;</a></p>
      </div>
      <div class="left"> 
        <!-- Login Form -->
        <form class="clearfix" method="post" id="jobseekerPannelLoginForm">
            <input type="hidden" name="requestURI" id="requestURI" value="<?=$_SERVER['REQUEST_URI']?>"/>
          <h1>Member Login</h1>
          <p id="insertErrorMessage" style='color:#FE171F;font_weight:bold;'></p>
          <label class="grey" for="log">Username:</label>
          <input class="field" type="text" name="txtUser" id="log" value="" size="23" />
          <label class="grey" for="pwd">Password:</label>
          <input class="field" type="password" name="txtPassword" id="pwd" size="23" />
          <label>
            <input name="rememberme" id="rememberme" type="checkbox" checked="checked" value="forever" />
            &nbsp;Remember me</label>
          <div class="clear"></div>
          <input type="button" name="submit" value="Login" class="bt_login" onclick="ajaxLoginAction();" />
          <a class="lost-pwd" href="http://<?=$_SERVER['HTTP_HOST']?>/jobseeker/seeker_login.php">Lost your password?</a>
        </form>
      </div>
      <div class="left right"> 
        <!-- Register Form -->
        <form action="#" method="post" id="signupPageFormId">
           
          <h1>Not a member yet? Sign Up!</h1>
           <p id="signupErrorMessage" style='color:#FE171F;font_weight:bold;'></p>
           <label class="grey" for="signup">Registration Type:</label>
        <select name="registration_type" id="registration_type" class="grey" style=" background: none repeat scroll 0 0 #414141;border: 1px solid #1A1A1A;color: white; height: 25px; margin-right: 5px; margin-top: 4px;width: 200px;">
		<option  value="0">Select Options</option>
		<option  value="/jobseeker/seeker_registration_step1.php">Jobseeker</option>
		<option  value="/recruiter/new_recruiter_step1.php">Employee/Recruiter</option>
	</select>

        <!--<label class="grey" for="signup">&nbsp;</label>-->
            <div class="clear"></div>
          <input type="hidden" name="test" value="dff"/>
          <input type="button"  name="submit" value="Register" class="bt_register" />
        </form>
      </div>
    </div>
  </div>
  <!-- /login --> 
  
  <!-- The tab on top -->
  <div class="wrapper">
    <div class="tab">
      <ul class="login">
        <li class="left">&nbsp;</li>
        <li>Hello Guest |</li>
        <!--<li class="sep">|</li>-->
	<li id="toggle"> <a id="open" class="open" href="#">Login / Register</a> <a id="close" style="display: none;" class="close" href="#">Close Panel</a> </li>
        <li class="right">&nbsp;</li>
      </ul>
    </div>
  </div>
  <!-- / top --> 
  
</div>
<?php }else{ ?>
  <!-- The tab on top -->
  <div class="wrapper">
    <div class="tab">
      <ul class="login">
        <li class="left">&nbsp;</li>
        <li>Hello <?=$_SESSION['seeker_name']?> |</li>
        <!--<li class="sep">|</li>-->
        <li class="right">&nbsp;</li>
      </ul>
    </div>
  </div>
<?php }?>