<?php 
  	global $objDb ;
	$sqlSites = "select * from job_top_sites where status=1 limit 0,4";
	$resultSites = $objDb->ExecuteQuery($sqlSites);
	
	$sqlbanner = "select * from job_banner where banner_status=1";
	$resultbanner = $objDb->ExecuteQuery($sqlbanner);
	
	$title_class = array("top_brown","top_blue","top_violet","top_green");
	$img = array("brown.gif","blue.gif","violet.gif","green.gif");
        $sql_prod = "SELECT * FROM job_banner WHERE banner_status=1 ORDER BY banner_id ASC";
        $res_prod = $objDb->ExecuteQuery($sql_prod);
        $numrs = mysql_num_rows($res_prod);
	if(isset($_SESSION["ses_seeker_id"])){
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
		    $seeker_edit_path="seeker_skilled_edit.php";
	    }
	}
	$hrfe_Add = "http://".$_SERVER['HTTP_HOST']."/";
	
?>
<div id="header">
    <div class="fleft" id="logo"> <a href="#Logo"><img alt="" src="<?php echo $hrfe_Add.("images/logonew.png");?>"></a></div>

    
<div class="clear"></div>

    <div id="main-navigation">
      <ul id="main-nav">
        <li class="main-nav-item"><a class="main-nav-tab" href="<?php echo $hrfe_Add."index.php";?>"><?=HEADER_MENU_HOME?></a></li>
        <li class="main-nav-item"> <a class="main-nav-tab" href="<?php echo $hrfe_Add."jobseeker/seeker_main_page.php";?>"><?=HEADER_MENU_REGISTER?></a>
           <!--  <div class="main-nav-dd" style="left: 288px;">
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
        <li class="main-nav-item"> <a class="main-nav-tab" href="<?php echo $hrfe_Add."jobseeker/faq.php";?>"><?=HEADER_MENU_FAQS?></a>
         <!--        <div class="main-nav-dd" style="left: 288px;">
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
        <li class="main-nav-item"> <a class="main-nav-tab" href="<?php echo $hrfe_Add."jobseeker/seeker_login.php";?>"><?=HEADER_MENU_LOGIN?></a>
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
          </div>-->
        </li>
        <li class="main-nav-item"><a class="main-nav-tab" href="<?php echo $hrfe_Add."jobseeker/job_search.php";?>"><?=HEADER_MENU_JOB_SEARCH?></a>
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
          </div>-->
        </li>
        <li class="main-nav-item"><a href="<?php echo $hrfe_Add."jobseeker/seeker_emp.php";?>" class="main-nav-tab"><?=HEADER_MENU_EMPLOYERS?></a>
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
          </div>-->
        </li>
        <li class="main-nav-item"><a href="<?php echo $hrfe_Add."jobseeker/features.php";?>" class="main-nav-tab"><?=HEADER_MENU_FEATURES?></a>
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
        <li class="main-nav-item"><a href="<?php echo $hrfe_Add."partners.php";?>" class="main-nav-tab"><?=HEADER_MENU_PARTNERS?></a>
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
        <li class="main-nav-item"><a href="<?php echo $hrfe_Add."tutorials.php";?>" class="main-nav-tab"><?=HEADER_MENU_TUTORIALS?></a>
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
		<li style="padding-left:780px; padding-top:7px;"><?php include("get_lang_icons.php");?></li>
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