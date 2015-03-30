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
        <form class="clearfix" action="#" method="post">
          <h1>Member Login</h1>
          <label class="grey" for="log">Username:</label>
          <input class="field" type="text" name="log" id="log" value="" size="23" />
          <label class="grey" for="pwd">Password:</label>
          <input class="field" type="password" name="pwd" id="pwd" size="23" />
          <label>
            <input name="rememberme" id="rememberme" type="checkbox" checked="checked" value="forever" />
            &nbsp;Remember me</label>
          <div class="clear"></div>
          <input type="submit" name="submit" value="Login" class="bt_login" />
          <a class="lost-pwd" href="#">Lost your password?</a>
        </form>
      </div>
      <div class="left right"> 
        <!-- Register Form -->
        <form action="#" method="post">
          <h1>Not a member yet? Sign Up!</h1>
          <label class="grey" for="signup">Username:</label>
          <input class="field" type="text" name="signup" id="signup" value="" size="23" />
          <label class="grey" for="email">Email:</label>
          <input class="field" type="text" name="email" id="email" size="23" />
          <label>A password will be e-mailed to you.</label>
          <input type="submit" name="submit" value="Register" class="bt_register" />
        </form>
      </div>
    </div>
  </div>
  <!-- /login --> 
  
  <!-- The tab on top -->
  <div class="wrapper">
    <div class="tab">
      <ul class="adminpanel">
        <li class="left">&nbsp;</li>
        <li>Welcome , <span class="usertxt"><?=$_SESSION['rec_name']?></span></li>
        <li><img src="images/user.gif" width="16" height="14" /></li>
		<?
			$sqlMsgBox = "select * from job_msgbox where receiver_id = 'R-".$_SESSION['ses_rec_id']."'" ;
			$resultMsgBox = $objDb->ExecuteQuery($sqlMsgBox);
			$cntMsgBox = mysql_num_rows($resultMsgBox);
		?>
        <li><a href="#">Messages (<?=$cntMsgBox?>)</a></li>
        <li><img src="images/setting.gif" width="16" height="15" /></li>        
        <li><a href="#">Settings</a></li>
        <li><img src="images/logout-icon.png" width="13" height="14"/></li>
       <li><a href="/recruiter/rec_logout.php">Logout</a></li>
        

        <li class="right">&nbsp;</li>
      </ul>
    </div>

  </div>
  <!-- / top --> 
  
</div>