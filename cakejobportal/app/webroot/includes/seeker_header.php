<?php	global $objDb ;

error_reporting(0);
	$sqlSites = "select * from job_top_sites where status=1 limit 0,4";
	$resultSites = $objDb->ExecuteQuery($sqlSites);
	
	$title_class = array("top_brown","top_blue","top_violet","top_green");
	$img = array("brown.gif","blue.gif","violet.gif","green.gif");
	 $sql_prod = "SELECT * FROM job_banner WHERE banner_status=1 ORDER BY banner_id ASC";
        $res_prod = $objDb->ExecuteQuery($sql_prod);
        $numrs = mysql_num_rows($res_prod);
	
	
	$sqltype = "select seeker_register_type,seeker_id from job_jobseeker where seeker_id='".$_SESSION["ses_seeker_id"]."'";
	$resulttype = $objDb->ExecuteQuery($sqltype);
	$rstype=mysql_fetch_object($resulttype);
	$seekertype=$rstype->seeker_register_type;
	
	if($seekertype==1)
	{
		$seeker_edit_path="seeker_bursary_edit.php";
	}
	else if($seekertype==2)
	{
		$seeker_edit_path="seeker_scholar_edit.php";
	}
	else if($seekertype==3)
	{
		$seeker_edit_path="seeker_unskilled_edit.php";
	}
	else if($seekertype==4)
	{
		//$seeker_edit_path="seeker_skilled_edit.php";
	         $seeker_edit_path="seeker_profile.php";
	}
	$hrfe_Add = "http://".$_SERVER['HTTP_HOST']."/";
?>
<div id="header">
    <div class="fleft" id="logo"> <a href="#Logo"><img alt="" src="images/logonew.png"></a> </div>
    <div class="clear"></div>
    <div id="main-navigation">
      <ul id="main-nav">
        <li class="main-nav-item"><a class="main-nav-tab" href="<?php echo $hrfe_Add."jobseeker/seeker_dashboard.php";?>">Dashboard</a></li>
	<li class="main-nav-item"><a class="main-nav-tab" href="<?php echo $seeker_edit_path;?>">My Profile</a></li>
        <li class="main-nav-item"> <a class="main-nav-tab" href="<?php echo $hrfe_Add."jobseeker/job_search.php";?>">Job Search</a>
          <!--<div class="main-nav-dd" style="left: 288px;">
            <div class="main-nav-dd-column">
              <h3> Partners </h3>
              <ul>
                <li><a href="#">Link 1</a></li>
                <li><a href="#">Link 2</a></li>
                <li><a href="#">Link 3</a></li>
              </ul>
              <hr>
              <h3> Partners 2 </h3>
              <ul>
                <li><a href="#">Link 1</a></li>
                <li><a href="#">Link 2</a></li>
                <li><a href="#">Link 3</a></li>
              </ul>
            </div>
            <div class="main-nav-dd-column">
              <h3> Partners 3 </h3>
              <ul>
                <li><a href="#">Link 1</a></li>
                <li><a href="#">Link 2</a></li>
                <li><a href="#">Link 3</a></li>
                <li><a href="#">Link 4</a></li>
                <li><a href="#">Link 5</a></li>
                <li><a href="#">Link 6</a></li>
              </ul>
            </div>
            <div class="main-nav-dd-column">
              <h3> Partners 4 </h3>
              <ul>
                <li><a href="#">Link 1</a></li>
                <li><a href="#">Link 2</a></li>
              </ul>
            </div>
          </div>-->
        </li>
        <li class="main-nav-item"> <a class="main-nav-tab" href="<?php echo $hrfe_Add."jobseeker/seeker_emp.php";?>">Employers</a>
          <!--<div class="main-nav-dd" style="left: 288px;">
            <div class="main-nav-dd-column">
              <h3> FAQs </h3>
              <ul>
                <li><a href="#">Link 1</a></li>
                <li><a href="#">Link 2</a></li>
                <li><a href="#">Link 3</a></li>
              </ul>
              <hr>
              <h3> FAQs 2 </h3>
              <ul>
                <li><a href="#">Link 1</a></li>
                <li><a href="#">Link 2</a></li>
                <li><a href="#">Link 3</a></li>
              </ul>
            </div>
            <div class="main-nav-dd-column">
              <h3> FAQs 3 </h3>
              <ul>
                <li><a href="#">Link 1</a></li>
                <li><a href="#">Link 2</a></li>
                <li><a href="#">Link 3</a></li>
                <li><a href="#">Link 4</a></li>
                <li><a href="#">Link 5</a></li>
                <li><a href="#">Link 6</a></li>
              </ul>
            </div>
            <div class="main-nav-dd-column">
              <h3> FAQs 4 </h3>
              <ul>
                <li><a href="#">Link 1</a></li>
                <li><a href="#">Link 2</a></li>
              </ul>
            </div>
          </div>-->
        </li>
        <li class="main-nav-item"> <a class="main-nav-tab" href="<?php echo $hrfe_Add."jobseeker/view_my_account.php";?>">View my Account</a>
          <!--<div class="main-nav-dd">
            <div class="main-nav-dd-column">
              <h3> Contact Us </h3>
              <ul>
                <li><a href="#">Link 1</a></li>
                <li><a href="#">Link 2</a></li>
                <li><a href="#">Link 3</a></li>
              </ul>
              <hr>
              <h3> Contact Us 2 </h3>
              <ul>
                <li><a href="#">Link 1</a></li>
                <li><a href="#">Link 2</a></li>
                <li><a href="#">Link 3</a></li>
              </ul>
            </div>
            <div class="main-nav-dd-column">
              <h3> Contact Us 3 </h3>
              <ul>
                <li><a href="#">Link 1</a></li>
                <li><a href="#">Link 2</a></li>
                <li><a href="#">Link 3</a></li>
                <li><a href="#">Link 4</a></li>
                <li><a href="#">Link 5</a></li>
                <li><a href="#">Link 6</a></li>
              </ul>
            </div>
            <div class="main-nav-dd-column">
              <h3> Contact Us 4 </h3>
              <ul>
                <li><a href="#">Link 1</a></li>
                <li><a href="#">Link 2</a></li>
              </ul>
            </div>
          </div>-->
        </li>
        <li class="main-nav-item"><a class="main-nav-tab" href="<?php echo $hrfe_Add."jobseeker/seeker_faq.php";?>">FAQs</a>
          <!--<div class="main-nav-dd">
            <div class="main-nav-dd-column">
              <h3> Contact Us </h3>
              <ul>
                <li><a href="#">Link 1</a></li>
                <li><a href="#">Link 2</a></li>
                <li><a href="#">Link 3</a></li>
              </ul>
              <hr>
              <h3> Contact Us 2 </h3>
              <ul>
                <li><a href="#">Link 1</a></li>
                <li><a href="#">Link 2</a></li>
                <li><a href="#">Link 3</a></li>
              </ul>
            </div>
            <div class="main-nav-dd-column">
              <h3> Contact Us 3 </h3>
              <ul>
                <li><a href="#">Link 1</a></li>
                <li><a href="#">Link 2</a></li>
                <li><a href="#">Link 3</a></li>
                <li><a href="#">Link 4</a></li>
                <li><a href="#">Link 5</a></li>
                <li><a href="#">Link 6</a></li>
              </ul>
            </div>
            <div class="main-nav-dd-column">
              <h3> Contact Us 4 </h3>
              <ul>
                <li><a href="#">Link 1</a></li>
                <li><a href="#">Link 2</a></li>
              </ul>
            </div>
          </div>-->
        </li>
        <li class="main-nav-item"><a href="<?php echo $hrfe_Add."jobseeker/seeker_logout.php";?>" class="main-nav-tab">Logout</a>
         <!-- <div class="main-nav-dd">
            <div class="main-nav-dd-column">
              <h3> Contact Us </h3>
              <ul>
                <li><a href="#">Link 1</a></li>
                <li><a href="#">Link 2</a></li>
                <li><a href="#">Link 3</a></li>
              </ul>
              <hr>
              <h3> Contact Us 2 </h3>
              <ul>
                <li><a href="#">Link 1</a></li>
                <li><a href="#">Link 2</a></li>
                <li><a href="#">Link 3</a></li>
              </ul>
            </div>
            <div class="main-nav-dd-column">
              <h3> Contact Us 3 </h3>
              <ul>
                <li><a href="#">Link 1</a></li>
                <li><a href="#">Link 2</a></li>
                <li><a href="#">Link 3</a></li>
                <li><a href="#">Link 4</a></li>
                <li><a href="#">Link 5</a></li>
                <li><a href="#">Link 6</a></li>
              </ul>
            </div>
            <div class="main-nav-dd-column">
              <h3> Contact Us 4 </h3>
              <ul>
                <li><a href="#">Link 1</a></li>
                <li><a href="#">Link 2</a></li>
              </ul>
            </div>
          </div>
        </li>
        <li class="main-nav-item"><a href="#" class="main-nav-tab">Features</a>
          <div class="main-nav-dd">
            <div class="main-nav-dd-column">
              <h3> Contact Us </h3>
              <ul>
                <li><a href="#">Link 1</a></li>
                <li><a href="#">Link 2</a></li>
                <li><a href="#">Link 3</a></li>
              </ul>
              <hr>
              <h3> Contact Us 2 </h3>
              <ul>
                <li><a href="#">Link 1</a></li>
                <li><a href="#">Link 2</a></li>
                <li><a href="#">Link 3</a></li>
              </ul>
            </div>
            <div class="main-nav-dd-column">
              <h3> Contact Us 3 </h3>
              <ul>
                <li><a href="#">Link 1</a></li>
                <li><a href="#">Link 2</a></li>
                <li><a href="#">Link 3</a></li>
                <li><a href="#">Link 4</a></li>
                <li><a href="#">Link 5</a></li>
                <li><a href="#">Link 6</a></li>
              </ul>
            </div>
            <div class="main-nav-dd-column">
              <h3> Contact Us 4 </h3>
              <ul>
                <li><a href="#">Link 1</a></li>
                <li><a href="#">Link 2</a></li>
              </ul>
            </div>
          </div>
        </li>
        <li class="main-nav-item"><a href="#" class="main-nav-tab">Partners</a>
          <div class="main-nav-dd">
            <div class="main-nav-dd-column">
              <h3> Contact Us </h3>
              <ul>
                <li><a href="#">Link 1</a></li>
                <li><a href="#">Link 2</a></li>
                <li><a href="#">Link 3</a></li>
              </ul>
              <hr>
              <h3> Contact Us 2 </h3>
              <ul>
                <li><a href="#">Link 1</a></li>
                <li><a href="#">Link 2</a></li>
                <li><a href="#">Link 3</a></li>
              </ul>
            </div>
            <div class="main-nav-dd-column">
              <h3> Contact Us 3 </h3>
              <ul>
                <li><a href="#">Link 1</a></li>
                <li><a href="#">Link 2</a></li>
                <li><a href="#">Link 3</a></li>
                <li><a href="#">Link 4</a></li>
                <li><a href="#">Link 5</a></li>
                <li><a href="#">Link 6</a></li>
              </ul>
            </div>
            <div class="main-nav-dd-column">
              <h3> Contact Us 4 </h3>
              <ul>
                <li><a href="#">Link 1</a></li>
                <li><a href="#">Link 2</a></li>
              </ul>
            </div>
          </div>
        </li>
        <li class="main-nav-item"><a href="#" class="main-nav-tab">Tutorials</a>
          <div class="main-nav-dd">
            <div class="main-nav-dd-column">
              <h3> Contact Us </h3>
              <ul>
                <li><a href="#">Link 1</a></li>
                <li><a href="#">Link 2</a></li>
                <li><a href="#">Link 3</a></li>
              </ul>
              <hr>
              <h3> Contact Us 2 </h3>
              <ul>
                <li><a href="#">Link 1</a></li>
                <li><a href="#">Link 2</a></li>
                <li><a href="#">Link 3</a></li>
              </ul>
            </div>
            <div class="main-nav-dd-column">
              <h3> Contact Us 3 </h3>
              <ul>
                <li><a href="#">Link 1</a></li>
                <li><a href="#">Link 2</a></li>
                <li><a href="#">Link 3</a></li>
                <li><a href="#">Link 4</a></li>
                <li><a href="#">Link 5</a></li>
                <li><a href="#">Link 6</a></li>
              </ul>
            </div>
            <div class="main-nav-dd-column">
              <h3> Contact Us 4 </h3>
              <ul>
                <li><a href="#">Link 1</a></li>
                <li><a href="#">Link 2</a></li>
              </ul>
            </div>
          </div>-->
        </li>
      </ul>
      <!--<ul>
            	<li><a href="#">Home</a></li>
                <li><a href="#">Register</a></li>
                <li><a href="#">FAQS</a></li>
                <li><a href="#">Login</a></li>
                <li><a href="#">Job Search</a></li>
                <li><a href="#">Employers</a></li>
                <li><a href="#">Features</a></li>
                <li><a href="#">Partners</a></li>
                <li><a href="#">Tutorials</a></li>
                <div class="clear"></div>
            </ul>-->
      <div class="clear"></div>
    </div>
    <div class="clear"></div>
  </div>