<?php

function createDate($name,$value="",$array="")
	{
		$arrDate = explode("-",$value);
		$date = "";
		$month = "";
		$year = "";
		
		if(sizeof($arrDate) == 3)
		{
			$date = $arrDate[2];
			$month = $arrDate[1];
			$year = $arrDate[0];
		}
		
		//date
		$str = "<select name='" . $name . "_date" . $array . "' id='" . $name . "_date'>
				<option value=''>Date</option>";

		for($i=1; $i<=31; $i++)
		{
			$selected = "";
			if($i == $date)	$selected = "selected";
			$str .= "	<option value='" . $i . "' " . $selected . ">" . $i. "</option>";
		}
				
		$str .= "</select>&nbsp;";
		
		//month
		$arrMonth = array(1=>"January",2=>"February",3=>"March",4=>"April",5=>"May",6=>"June",7=>"July",8=>"August",9=>"September",10=>"October",11=>"November",12=>"December");
		
		$str .= "<select name='" . $name . "_month" . $array . "' id='" . $name . "_month'>
				<option value=''>Month</option>";
		
		while(list($key,$val) = each($arrMonth))
		{
			$selected = "";
			if($month == $key)	$selected = "selected";
				$str .= "	<option value='" . $key . "' " . $selected . ">" . $val. "</option>";
		}
				
		$str .= "</select>&nbsp;";		
		
		//year		
		$str .= "<select name='" . $name . "_year" . $array . "' id='" . $name . "_year'>
				<option value=''>Year</option>";		
		
		for($i=1940; $i<=date("Y"); $i++)
		{
			$selected = "";
			if($i == $year)	$selected = "selected";
				$str .= "	<option value='" . $i . "' " . $selected . ">" . $i. "</option>";
		}
				
		$str .= "</select>";		
		return $str;
	}
        if(isset($_POST["seeker_language_home"]))
	{
		$seeker_language_home=$_POST["seeker_language_home"];
	}
	else
	{
		$seeker_language_home=$rsseeker->seeker_language_home;
	}
	if(isset($_POST["speak_home"]))
	{
		$speak_home=$_POST["speak_home"];
	}
	else
	{
		$speak_home=$rsseeker->seeker_language_home_speak;
	}
	if(isset($_POST["read_home"]))
	{
		$read_home=$_POST["read_home"];
	}
	else
	{
		$read_home=$rsseeker->seeker_language_home_read;
	}
	if(isset($_POST["write_home"]))
	{
		$write_home=$_POST["write_home"];
	}
	else
	{
		$write_home=$rsseeker->seeker_language_home_write;
	}
	
	if(isset($_POST["seeker_language_second"]))
	{
		$seeker_language_second=$_POST["seeker_language_second"];
	}
	else
	{
		$seeker_language_second=$rsseeker->seeker_language_second;
	}
	if(isset($_POST["speak_second"]))
	{
		$speak_second=$_POST["speak_second"];
	}
	else
	{
		$speak_second=$rsseeker->seeker_language_second_speak;
	}
	if(isset($_POST["read_second"]))
	{
		$read_second=$_POST["read_second"];
	}
	else
	{
		$read_second=$rsseeker->seeker_language_second_read;
	}
	if(isset($_POST["write_second"]))
	{
		$write_second=$_POST["write_second"];
	}
	else
	{
		$write_second=$rsseeker->seeker_language_second_write;
	}
        if(isset($_POST["seeker_language_third"]))
	{
		$seeker_language_third=$_POST["seeker_language_third"];
	}
	else
	{
		$seeker_language_third=$rsseeker->seeker_language_third;
	}
	if(isset($_POST["speak_third"]))
	{
		$speak_third=$_POST["speak_third"];
	}
	else
	{
		$speak_third=$rsseeker->seeker_language_third_speak;
	}
	if(isset($_POST["read_third"]))
	{
		$read_third=$_POST["read_third"];
	}
	else
	{
		$read_third=$rsseeker->seeker_language_third_read;
	}
	if(isset($_POST["write_third"]))
	{
		$write_third=$_POST["write_third"];
	}
	else
	{
		$write_third=$rsseeker->seeker_language_third_write;
	}
        
        	//for highest date 	
	$seeker_hdate=0;
	$seeker_hmonth=0;
	$seeker_hyear=0;
	$splith=explode("-",$rsseeker->seeker_tertiary_higherfromdate);
	if(isset($_POST["seeker_highest_from_date"]))
	{
		$seeker_hdate=$_POST["seeker_highest_from_date"];
	}
	else
	{
		$seeker_hdate=$splith[2];
	}
	
	
	if(isset($_POST["seeker_highest_from_month"]))
	{
		$seeker_hmonth=$_POST["seeker_highest_from_month"];
	}
	else
	{
		$seeker_hmonth=$splith[1];
	}
	
	if(isset($_POST["seeker_highest_from_year"]))
	{
		$seeker_hyear=$_POST["seeker_highest_from_year"];
	}
	else

	{
		$seeker_hyear=$splith[0];
	}
	
	$seeker_selhighfromdate=$seeker_hyear."-".$seeker_hmonth."-".$seeker_hdate;
	
	$seeker_tdate=0;
	$seeker_tmonth=0;
	$seeker_tyear=0;
	$splitht=explode("-",$rsseeker->seeker_tertiary_highertodate);
	
	if(isset($_POST["seeker_highest_to_date"]))
	{
		$seeker_tdate=$_POST["seeker_highest_to_date"];
	}
	else
	{
		$seeker_tdate=$splitht[2];
	}
	
	if(isset($_POST["seeker_highest_to_month"]))
	{
		$seeker_tmonth=$_POST["seeker_highest_to_month"];
	}
	else
	{
		$seeker_tmonth=$splitht[1];
	}
	if(isset($_POST["seeker_highest_to_year"]))
	{
		$seeker_tyear=$_POST["seeker_highest_to_year"];
	}
	else
	{
		$seeker_tyear=$splitht[0];
	}
	$seeker_selhightodate=$seeker_tyear."-".$seeker_tmonth."-".$seeker_tdate;
	
	
	
	//end of  highest date 	
	
	
	//for second date 	
	$seeker_sdate=0;
	$seeker_smonth=0;
	$seeker_syear=0;
	$splits=explode("-",$rsseeker->seeker_tertiary_secoundfromdate);
	
	
	if(isset($_POST["seeker_second_from_date"]))
	{
		$seeker_sdate=$_POST["seeker_second_from_date"];
	}
	else
	{
		$seeker_sdate=$splits[2];
	}
	if(isset($_POST["seeker_second_from_month"]))
	{
		$seeker_smonth=$_POST["seeker_second_from_month"];
	}
	else
	{
		$seeker_smonth=$splits[1];
	}
	if(isset($_POST["seeker_second_from_year"]))
	{
		$seeker_syear=$_POST["seeker_second_from_year"];
	}
	else
	{
		$seeker_syear=$splits[0];
	}
	$seeker_selsecfromdate=$seeker_syear."-".$seeker_smonth."-".$seeker_sdate;
	
	$seeker_stdate=0;
	$seeker_stmonth=0;
	$seeker_styear=0;
	$splitst=explode("-",$rsseeker->seeker_tertiary_secoundtodate);
	
	
	if(isset($_POST["seeker_second_from_date"]))
	{
		$seeker_stdate=$_POST["seeker_second_to_date"];
	}
	else
	{
		$seeker_stdate=$splitst[2];
	}
	if(isset($_POST["seeker_second_to_month"]))
	{
		$seeker_stmonth=$_POST["seeker_second_to_month"];
	}
	else
	{
		$seeker_stmonth=$splitst[1];
	}
	if(isset($_POST["seeker_second_to_year"]))
	{
		$seeker_styear=$_POST["seeker_second_to_year"];
	}
	else
	{
		$seeker_styear=$splitst[0];
	}
	
	$seeker_selsectodate=$seeker_styear."-".$seeker_stmonth."-".$seeker_stdate;
	
	
	
	//end of  second date 	
	
	//for third date 	
	$seeker_tdate=0;
	$seeker_tmonth=0;
	$seeker_tyear=0;
	$splittf=explode("-",$rsseeker->seeker_tertiary_thirdfromdate);
	
	
	if(isset($_POST["seeker_third_from_date"]))
	{
		$seeker_tdate=$_POST["seeker_third_from_date"];
	}
	else
	{
		$seeker_tdate=$splittf[2];
	}
	
	if(isset($_POST["seeker_third_from_month"]))
	{
		$seeker_tmonth=$_POST["seeker_third_from_month"];
	}
	else
	{
		$seeker_tmonth=$splittf[1];
	}
	
	if(isset($_POST["seeker_third_from_year"]))
	{
		$seeker_tyear=$_POST["seeker_third_from_year"];
	}
	else
	{
		$seeker_tyear=$splittf[0];
	}
	
	$seeker_selthirdfromdate=$seeker_tyear."-".$seeker_tmonth."-".$seeker_tdate;
	
	$seeker_ttdate=0;
	$seeker_ttmonth=0;
	$seeker_ttyear=0;
	$splitttd=explode("-",$rsseeker->seeker_tertiary_thirdtodate);
	
	
	if(isset($_POST["seeker_third_from_date"]))
	{
		$seeker_ttdate=$_POST["seeker_third_to_date"];
	}
	else
	{
		$seeker_ttdate=$splitttd[2];
	}
	
	if(isset($_POST["seeker_third_to_month"]))
	{
		$seeker_ttmonth=$_POST["seeker_third_to_month"];
	}
	else
	{
		$seeker_ttmonth=$splitttd[1];
	}
	
	if(isset($_POST["seeker_third_to_year"]))
	{
		$seeker_ttyear=$_POST["seeker_third_to_year"];
	}
	else
	{
		$seeker_ttyear=$splitttd[0];
	}
	$seeker_selthirdtodate=$seeker_ttyear."-".$seeker_ttmonth."-".$seeker_ttdate;
	
	
	
	//end of  third date
        
        	//start of secondary
	
	$seeker_sedate=0;
	$seeker_semonth=0;
	$seeker_seyear=0;
	
	$splitsf=explode("-",$rsseeker->seeker_secoundary_fromdate);
	
	if(isset($_POST["seeker_secondary_from_date"]))
	{
		$seeker_sedate=$_POST["seeker_secondary_from_date"];
	}
	else
	{
		$seeker_sedate=$splitsf[2];
	}
	
	if(isset($_POST["seeker_secondary_from_month"]))
	{
		$seeker_semonth=$_POST["seeker_secondary_from_month"];
	}
	else
	{
		$seeker_semonth=$splitsf[1];
	}
	
	if(isset($_POST["seeker_secondary_from_year"]))
	{
		$seeker_seyear=$_POST["seeker_secondary_from_year"];
	}
	else
	{
		$seeker_seyear=$splitsf[0];
	}
	
	
	$seeker_selsecondaryfromdate=$seeker_seyear."-".$seeker_semonth."-".$seeker_sedate;
	
	$seeker_setdate=0;
	$seeker_setmonth=0;
	$seeker_setyear=0;
	$splitstd=explode("-",$rsseeker->seeker_secoundary_todate);
	
	if(isset($_POST["seeker_secondary_from_date"]))
	{
		$seeker_setdate=$_POST["seeker_secondary_to_date"];
	}
	else
	{
		$seeker_setdate=$splitstd[2];
	}
	if(isset($_POST["seeker_secondary_to_month"]))
	{
		$seeker_setmonth=$_POST["seeker_secondary_to_month"];
	}
	else
	{
		$seeker_setmonth=$splitstd[1];
	}
	if(isset($_POST["seeker_secondary_to_year"]))
	{
		$seeker_setyear=$_POST["seeker_secondary_to_year"];
	}
	else
	{
		$seeker_setyear=$splitstd[0];
	}
	
	$seeker_selsecondarytodate=$seeker_setyear."-".$seeker_setmonth."-".$seeker_setdate;
	//end of secondary date
        
        //for employer
	$seeker_employer_type=array();
	$seeker_employer_industry=array();
	$seeker_employer_position=array();
	$seeker_employer_from_date=array();
	$seeker_employer_from_month=array();
	$seeker_employer_from_year=array();
	$seeker_employer_to_date=array();
	$seeker_employer_to_month=array();
	$seeker_employer_to_year=array();
	
	
	
	
	$j=1;
	for($i=0;$i<6;$i++)
	{

		
		$seeker_employer_type[$j] = "";
		$seeker_employer_industry[$j]="";
		$seeker_employer_position[$j]="";
		$seeker_employer_from_date[$j]="";
		$seeker_employer_from_month[$j] = "";
		$seeker_employer_from_year[$j]="";
		$seeker_employer_to_date[$j]="";
		$seeker_employer_to_month[$j] = "";
		$seeker_employer_to_year[$j]="";
		$seeker_emp_selfromdate[$j]="";
		$seeker_emp_seltodate[$j]="";
		$seeker_employer_duties[$j]="";
		$seeker_employer_leaving[$j]="";
		
		
		$seeker_emp_type="seeker_emp".$j."_employement";
		$seeker_emp_industry="seeker_emp".$j."_industry";
		$seeker_emp_pos="seeker_emp".$j."_position";
		$seeker_emp_fromdate="seeker_emp".$j."_fromdate";
		$seeker_emp_todate="seeker_emp".$j."_todate";
		$seeker_emp_duties="seeker_emp".$j."_duties";
		$seeker_emp_leaving="seeker_emp".$j."_leaving";
		
		//$emp="Employer".$j;
		$splitempf=explode("-",$rsseeker->$seeker_emp_fromdate);
		
		$splitempt=explode("-",$rsseeker->$seeker_emp_todate);
		
		
		
		
		if(isset($_POST["seeker_employer_type"][$i]))
		{
			$seeker_employer_type[$j]=$_POST["seeker_employer_type"][$i];
		}
		else
		{
			$seeker_employer_type[$j]=$rsseeker->$seeker_emp_type;
		}
		
		
		if(isset($_POST["seeker_employer_industry"][$i]))
		{
			$seeker_employer_industry[$j]=$_POST["seeker_employer_industry"][$i];
		}
		else
		{
			$seeker_employer_industry[$j]=$rsseeker->$seeker_emp_industry;
		}
		
		
		if(isset($_POST["seeker_employer_position"][$i]))
		{
			$seeker_employer_position[$j]=$_POST["seeker_employer_position"][$i];
		}
		else
		{
			$seeker_employer_position[$j]=$rsseeker->$seeker_emp_pos;
		}
		if(isset($_POST["seeker_emp_duties"][$i]))
		{
			$seeker_employer_duties[$j]=$_POST["seeker_emp_duties"][$i];
		}
		else
		{
			$seeker_employer_duties[$j]=$rsseeker->$seeker_emp_duties;
		}
		
		if(isset($_POST["seeker_emp_leaving"][$i]))
		{
			$seeker_employer_leaving[$j]=$_POST["seeker_emp_leaving"][$i];
		}
		else
		{
			$seeker_employer_leaving[$j]=$rsseeker->$seeker_emp_leaving;
		}
		
		
		if(isset($_POST["seeker_employer_from_date"][$i]))
		{
			$seeker_employer_from_date[$j]=$_POST["seeker_employer_from_date"][$i];
		}
		else
		{
			$seeker_employer_from_date[$j]=$splitempf[2];
		}
		
		if(isset($_POST["seeker_employer_from_month"][$i]))
		{
			$seeker_employer_from_month[$j]=$_POST["seeker_employer_from_month"][$i];
		}
		else
		{
			$seeker_employer_from_month[$j]=$splitempf[1];
		}
		
		if(isset($_POST["seeker_employer_from_year"][$i]))
		{
			$seeker_employer_from_year[$j]=$_POST["seeker_employer_from_year"][$i];
		}
		else
		{
			$seeker_employer_from_year[$j]=$splitempf[0];
		}
		
		
		if(isset($_POST["seeker_employer_to_date"][$i]))
		{
			$seeker_employer_to_date[$j]=$_POST["seeker_employer_to_date"][$i];
		}
		else
		{
			$seeker_employer_to_date[$j]=$splitempt[2];
		}
		
		
		if(isset($_POST["seeker_employer_to_month"][$i]))
		{
			$seeker_employer_to_month[$j]=$_POST["seeker_employer_to_month"][$i];
		}
		else
		{
			$seeker_employer_to_month[$j]=$splitempt[1];
		}
		
		if(isset($_POST["seeker_employer_to_year"][$i]))
		{
			$seeker_employer_to_year[$j]=$_POST["seeker_employer_to_year"][$i];
		}
		else
		{
			$seeker_employer_to_year[$j]=$splitempt[0];
		}
		
		$seeker_emp_selfromdate[$j]=$seeker_employer_from_year[$j]."-".$seeker_employer_from_month[$j]."-".$seeker_employer_from_date[$j];
		$seeker_emp_seltodate[$j]=$seeker_employer_to_year[$j]."-".$seeker_employer_to_month[$j]."-".$seeker_employer_to_date[$j];
		$j++;		
	}	
	
?>

<section class="profile_main">
        <div class="profile_content">
            <h2>Edit Skills</h2>
            <div class="orng_dvdr"></div>
            <div class="signup_sec">
                <p class="come-join" ><?php echo $this->Session->Flash();?> </p>
                <div id="pageWrap" class="pageWrap">
                    <div class="pageContent">
                        <p class="come-join" >CV Information</p>
                        <?php echo $this->Form->create('JobJobseeker', array('inputDefaults' => array('label' => false)
                                   , 'class' => 'form form-horizontal','enctype' => 'multipart/form-data')); ?>
                                   
                        <div class="greyline"></div>
                        <div class="inpt_area">
                                <label>Cv Summary</label>
                                <input type="text" name="seeker_summary" value="<? if (isset($_POST['seeker_summary'])) echo stripslashes($_POST['seeker_summary']); else echo($rsseeker->seeker_summary); ?>">
                        </div>
                        <div class="inpt_area">
                                <label>Category</label>
                                <?php echo $seeker_category_drop; ?>
			<input type="text" name="seeker_category" id="seeker_category_text" placeholder="other category" style="display:none; width: 300px;">
                        </div>
                         <div class="inpt_area">
                                <label>Company Name</label>
                                <input type="text" name="seeker_company_name" value="<? if (isset($_POST['seeker_company_name'])) echo stripslashes($_POST['seeker_company_name']); else echo($rsseeker->seeker_company_name); ?>">
                        </div>
                         <div class="inpt_area">
                                <label>Skills</label>
                               <textarea name="seeker_skills" cols="30" rows="6" placeholder="Excel, Word, Customer Service">
                               <? if (isset($_POST['seeker_skills'])) echo stripslashes($_POST['seeker_skills']); else echo($rsseeker->seeker_skills);?>
                                </textarea>
                        </div>
                        <div class="inpt_area">
                                <label>Education</label>
                                <textarea name="seeker_education" cols="30" rows="6"><? if (isset($_POST['seeker_education'])) echo stripslashes($_POST['seeker_education']); else echo($rsseeker->seeker_education);?>
                      </textarea>
                        </div>
                        <div class="inpt_area">
                                <label>Preferred employment</label>
                                <input type="checkbox" name="seeker_fulltime" value="1" <? if (isset($_POST['seeker_fulltime']) || ($rsseeker->seeker_fulltime==1 )) echo ("checked"); ?>>
                            Full Time
                              <input type="checkbox" name="seeker_parttime" value="1" <? if (isset($_POST['seeker_parttime'])  || ($rsseeker->seeker_parttime==1 )) echo ("checked"); ?>>
                              Part Time
                              <input type="checkbox" name="seeker_contract" value="1" <? if (isset($_POST['seeker_contract'])  || ($rsseeker->seeker_contract==1 )) echo ("checked"); ?>>
                              Contract
                              <input type="checkbox" name="seeker_temp" value="1" <? if(isset($_POST['seeker_temp'])  || ($rsseeker->seeker_temp==1 )) echo ("checked"); ?>>
                              Temp
                        </div>
                        <div class="inpt_area">
                                <label>Salary</label>
                                <input type="text" name="seeker_sallary" value="<? if (isset($_POST['seeker_sallary'])) echo stripslashes($_POST['seeker_sallary']); else echo($rsseeker->seeker_salary); ?>">
                                <select name="seeker_duration">
                                <option value="yearly"  <? if(isset($_POST['seeker_duration'])  || ($rsseeker->seeker_duration=="yearly" )) echo ("selected"); ?>>Yearly</option>
                                <option value="monthly" <? if(isset($_POST['seeker_duration'])  || ($rsseeker->seeker_duration=="monthly" )) echo ("selected"); ?>>Monthly</option>
                                </select>
                            &nbsp;<span class="comment"> What is your minimum salary requirement? </span>
                        </div>
                        
                        <div class="inpt_area">
                                <label>Benefits Desired</label>
                                <textarea name="seeker_benifits" cols="30" rows="6"><? if (isset($_POST['seeker_benifits'])) echo stripslashes($_POST['seeker_benifits']); else echo($rsseeker->seeker_benifits); ?>
                      </textarea>
                        </div>
                        <div class="inpt_area">
                                <label>Experience</label>
                                <input type="text" name="seeker_experience" value="<? if (isset($_POST['seeker_experience'])) echo stripslashes($_POST['seeker_experience']); else echo($rsseeker->seeker_experience); ?>">
                                <span class="comment">Number of years experience in your field.</span>
                        </div>
               
                        <p>Language</p>
                        <div class="inpt_area">
                        <label>Home Language</label>
                        <?php echo $seeker_language_home_drop; ?>
			
                        <span>Speak</span>
                                <select name="speak_second" id="speak_second">
                                        <option value="select">Select</option>
                                        <option value="4" <? if($speak_second=="4") echo("selected");?>>Excellent</option>
                                        <option value="3" <? if($speak_second=="3") echo("selected");?>>Good</option>
                                        <option value="2" <? if($speak_second=="2") echo("selected");?>>Poor</option>
                                        <option value="1" <? if($speak_second=="1") echo("selected");?>>Not</option>
                                </select>
                        <span>Write</span>
                                <select name="write_home" id="speak_home">
                                        <option value="select">Select</option>
                                        <option value="Excellent" <? if($write_home=="Excellent") echo("selected");?>>Excellent</option>
                                        <option value="Good" <? if($write_home=="Good") echo("selected");?>>Good</option>
                                        <option value="Poor" <? if($write_home=="Poor") echo("selected");?>>Poor</option>
                                        <option value="Not" <? if($write_home=="Not") echo("selected");?>>Not</option>
                                </select>
                        <span>Read</span>  	
                                <select name="read_home" id="read_home">
                                        <option value="select">Select</option>
                                        <option value="Excellent" <? if($read_home=="Excellent") echo("selected");?>>Excellent</option>
                                        <option value="Good" <? if($read_home=="Good") echo("selected");?>>Good</option>
                                        <option value="Poor" <? if($read_home=="Poor") echo("selected");?>>Poor</option>
                                        <option value="Not" <? if($read_home=="Not") echo("selected");?>>Not</option>
                                </select>
				<br><br>
                        <input type="text" name="seeker_language_home" id="seeker_language_home_text" placeholder="other category" style="display:none; width: 300px;">
			</div>
                        <div class="inpt_area">
                        <label>Second Language</label>
                        <?php echo $seeker_language_second_drop; ?>
			
                               <span>Speak</span>
                                <select name="speak_second" id="speak_second">
					    <option value="select">Select</option>
                        <option value="4" <? if($speak_second=="4") echo("selected");?>>Excellent</option>
                        <option value="3" <? if($speak_second=="3") echo("selected");?>>Good</option>
                        <option value="2" <? if($speak_second=="2") echo("selected");?>>Poor</option>
                        <option value="1" <? if($speak_second=="1") echo("selected");?>>Not</option>
                      </select>
                        <span>Write</span>
                                <select name="write_second" id="speak_thir">
					    <option value="select">Select</option>
                        <option value="Excellent" <? if($write_second=="Excellent") echo("selected");?>>Excellent</option>
                        <option value="Good" <? if($write_second=="Good") echo("selected");?>>Good</option>
                        <option value="Poor" <? if($write_second=="Poor") echo("selected");?>>Poor</option>
                        <option value="Not" <? if($write_second=="Not") echo("selected");?>>Not</option>
                      </select>
                        <span>Read</span>  	
                                <select name="read_second" id="read_second">
					    <option value="select">Select</option>
                        <option value="Excellent" <? if($read_second=="Excellent") echo("selected");?>>Excellent</option>
                        <option value="Good" <? if($read_second=="Good") echo("selected");?>>Good</option>
                        <option value="Poor" <? if($read_second=="Poor") echo("selected");?>>Poor</option>
                        <option value="Not" <? if($read_second=="Not") echo("selected");?>>Not</option>
                      </select>
				<br><br>
<input type="text" name="seeker_language_second" id="seeker_language_second_text" placeholder="other category" style="display:none; width: 300px;">
                        </div>
                        <div class="inpt_area">
                        <label>Third Language</label>
                        <?php echo $seeker_language_third_drop; ?>
                                <span>Speak</span>
                                <select name="speak_third" id="speak_third">
					    <option value="select">Select</option>
                        <option value="4" <? if($speak_third=="4") echo("selected");?>>Excellent</option>
                        <option value="3" <? if($speak_third=="3") echo("selected");?>>Good</option>
                        <option value="2" <? if($speak_third=="2") echo("selected");?>>Poor</option>
                        <option value="1" <? if($speak_third=="1") echo("selected");?>>Not</option>
                      </select>
                        <span>Write</span>
                                <select name="write_third" id="write_third">
					    <option value="select">Select</option>
                        <option value="Excellent" <? if($write_third=="Excellent") echo("selected");?>>Excellent</option>
                        <option value="Good" <? if($write_third=="Good") echo("selected");?>>Good</option>
                        <option value="Poor" <? if($write_third=="Poor") echo("selected");?>>Poor</option>
                        <option value="Not" <? if($write_third=="Not") echo("selected");?>>Not</option>
                      </select>
                        <span>Read</span>  	
                                <select name="read_third" id="read_third">
					    <option value="select">Select</option>
                        <option value="Excellent" <? if($read_third=="Excellent") echo("selected");?>>Excellent</option>
                        <option value="Good" <? if($read_third=="Good") echo("selected");?>>Good</option>
                        <option value="Poor" <? if($read_third=="Poor") echo("selected");?>>Poor</option>
                        <option value="Not" <? if($read_third=="Not") echo("selected");?>>Not</option>
                      </select>
				<br><br>
<input type="text" name="seeker_language_third" id="seeker_language_third_text" placeholder="other category" style="display:none; width: 300px;">
                        </div>
                        <p>Tertiary Qualifications</p>
                        <div class="inpt_area">
                                <label>Highest</label>
                                <?php echo $seeker_highestdegree_drop; ?>
				<input type="text" name="seeker_highestdegree" id="seeker_highestdegree_text" placeholder="other highest degree" style="display:none; width: 300px;">
                                <label>Field Of study</label>
                                <input type="text" name="seeker_higheststudy" value="<? if (isset($_POST['seeker_higheststudy'])) echo stripslashes($_POST['seeker_higheststudy']); else echo($rsseeker->seeker_tertiary_higherfield); ?>">
                                <label>Institution</label>
                                <input type="text" name="seeker_highestinstitution" value="<? if (isset($_POST['seeker_highestinstitution'])) echo stripslashes($_POST['seeker_highestinstitution']);   else echo($rsseeker->seeker_tertiary_higherinstitution);?>">
                                <label>Duration</label>
                               <label> From  <?=createDate("seeker_highest_from",$seeker_selhighfromdate); ?>  To  <?=createDate("seeker_highest_to",$seeker_selhightodate); ?></label>

                        </div>
                        <div class="inpt_area">
                                <label>Second highest</label>
                                <?php echo $seeker_seconddegree_drop; ?>
				<input type="text" name="seeker_seconddegree" id="seeker_seconddegree_text" placeholder="other second degree" style="display:none; width: 300px;">
                                <label>Field Of study</label>
                                <input type="text" name="seeker_secondstudy" value="<? if (isset($_POST['seeker_secondstudy'])) echo stripslashes($_POST['seeker_secondstudy']); else echo($rsseeker->seeker_tertiary_secoundfield); ?>">
                                <label>Institution</label>
                               <input type="text" name="seeker_secondinstitution" value="<? if (isset($_POST['seeker_secondinstitution'])) echo stripslashes($_POST['seeker_secondinstitution']); else echo($rsseeker->seeker_tertiary_secoundinstitution); ?>">
                                <label>Duration</label>
                               <label> From   <?=createDate("seeker_second_from",$seeker_selsecfromdate); ?>  To  <?=createDate("seeker_second_to",$seeker_selsectodate); ?></label>
                        </div>
                        <div class="inpt_area">
                                <label>Third highest</label>
                                <?php echo $seeker_thirddegree_drop; ?>
				<input type="text" name="seeker_thirddegree" id="seeker_thirddegree_text" placeholder="other third degree" style="display:none; width: 300px;">
                                <label>Field Of study</label>
                                <input type="text" name="seeker_thirdstudy" value="<? if (isset($_POST['seeker_thirdstudy'])) echo stripslashes($_POST['seeker_thirdstudy']);  else echo($rsseeker->seeker_tertiary_thirdfield); ?>">
                                <label>Institution</label>
                                <input type="text" name="seeker_thirdinstitution" value="<? if (isset($_POST['seeker_thirdinstitution'])) echo stripslashes($_POST['seeker_thirdinstitution']); else echo($rsseeker->seeker_tertiary_thirdinstitution);?>">
                                <label>Duration</label>
                               <label> From  <?=createDate("seeker_third_from",$seeker_selthirdfromdate); ?>  To  <?=createDate("seeker_third_to",$seeker_selthirdtodate); ?></label>
                        </div>
                        
                        <p>Secondary Qualifications</p>
                        <div class="inpt_area">
                                <label>highest</label>
                                <?php echo $seeker_secondarydegree_drop; ?>
				<input type="text" name="seeker_secondarydegree" id="seeker_secondarydegree_text" placeholder="other secondary degree" style="display:none; width: 300px;">
                                <label>Institution</label>
                                <input type="text" name="seeker_secoundaryinstitution" value="<? if (isset($_POST['seeker_secoundaryinstitution'])) echo stripslashes($_POST['seeker_secoundaryinstitution']); else echo($rsseeker->seeker_secoundary_institution); ?>">
                                <label>Duration</label>
                               <label> From  <?=createDate("seeker_secondary_from",$seeker_selsecondaryfromdate); ?>  To  <?=createDate("seeker_secondary_to",$seeker_selsecondarytodate); ?> </label>
                                <label>Leadership Role</label>
				<?php echo $seeker_secondaryleadership_drop; ?>
				<input type="text" name="seeker_secondaryleadership" id="seeker_secondaryleadership_text" placeholder="other secondary leadership" style="display:none; width: 300px;">
<div id="leadership_other"><input type="text" name="seeker_leadership" id="seeker_leadership" value="<? if (isset($_POST['seeker_leadership'])) echo stripslashes($_POST['seeker_leadership']); else echo($rsseeker->seeker_secoundary_leadership); ?>">
									<span class="error">(mention other leadership role here.)</span></div> 
                        </div>
                        <?php $seeker_emp1_employer= unserialize(stripcslashes($rsseeker->seeker_emp1_employer)); //pr($seeker_emp1_employer);?>
                        <p>Job Experience</p>
                        <?php foreach($seeker_emp1_employer as $key=>$employer_seeker) {
                                if($employer_seeker!='') { 
                                ?>
                        <div class="inpt_area" id="<?php if($key==0) { echo "employer"; } else { echo " "; } ?>" >
                        <label>Employer</label>
                        <input type="text" name="employer[]" id="employer[]" value="<? if(isset($_POST["employer1"])) { echo($_POST["employer1"]); }else{ echo $employer_seeker;}?>" onClick="hideContent('1')" onBlur="setContent('1')">
                        <label>Type of employment</label>
                        <?php  echo $seeker_employer_type_drop; ?>
                        <label>Industry</label>
                        <?php  echo $seeker_employer_industry_type_drop; ?>
                        <label>Position</label>
                        <?php  echo $seeker_employer_position_drop; ?>
                        <label>Duration</label>
                        From <?=createDate("seeker_employer_from",$seeker_emp_selfromdate[1],"[]"); ?> To <?=createDate("seeker_employer_to",$seeker_emp_seltodate[1],"[]"); ?>
                        
                        </div>
                        <?php } } ?>
                        <div class="inpt_area" id="expand">
                        </div>
                        <div id="LoadingImage" style="display: none;"><img src="<?php echo $this->webroot; ?>css/images/loading.gif"></div>
                        <?php if(!isset($rsseeker->seeker_emp1_employer)) { ?>
                        <a href="javascript:void(0)" id="create_more" class="create" onclick="add_more();" > ADD MORE</a>  
                           <? } ?>
                        <div class="inpt_area">
                                <input type="hidden" name="id" value="<?php if(isset($rsseeker->id)){ echo $rsseeker->id; } ?>" >
                                <input class="blue_btn pull-right" type="submit" name="submit" value="Submit" />
                        </div>
                        </form>
                    </div>
                    <div class="clearfix">
                </div>
            </div>
        </div>
</section>
<script type="text/javascript">
        function add_more() {
                $("#LoadingImage").show();
                newRow = $('#employer').html();
           
                $('#expand').html(newRow);
                $('#expand .sbHolder').remove();
                $('#expand').hide();
                $('#employer').append($('#expand').html());
                
                //appRow = $('#expand').html();
                /* var remData = $(newRow +'.sbHolder').remove();
                $('#expand').append(remData);*/
                $("#LoadingImage").hide();
                $(".select").selectbox();
        }
	
//	$("#seeker_category").selectbox({
//	onOpen: function (inst) {
//		console.log("open", inst);
//	},
//	onClose: function (inst) {
//		console.log("close", inst);
//	},
//	onChange: function (val, inst) {
//		console.log("close", val);
//	
//		var vdata = $( this ).val();
//		if (vdata == 'Other') {
//			$('#seeker_category_text').show();
//		}
//		else
//		{
//			$('#seeker_category_text').hide();
//		}
//	},
//
//
//});
	
	$( "#seeker_category" ).click(function() {
		// Check input( $( this ).val() ) for validity here
		var vdata = $( this ).val();
		if (vdata == 'Other') {
			$('#seeker_category_text').show();
		}
		else
		{
			$('#seeker_category_text').hide();
		}
	});
	$( "#seeker_highestdegree" ).change(function() {
		// Check input( $( this ).val() ) for validity here
		var vdata = $( this ).val();
		if (vdata == 'Other') {
			$('#seeker_highestdegree_text').show();
		}
		else
		{
			$('#seeker_highestdegree_text').hide();
		}
	});
	$( "#seeker_highestdegree" ).change(function() {
		// Check input( $( this ).val() ) for validity here
		var vdata = $( this ).val();
		if (vdata == 'Other') {
			$('#seeker_highestdegree_text').show();
		}
		else
		{
			$('#seeker_highestdegree_text').hide();
		}
	});
	$( "#seeker_seconddegree" ).change(function() {
		// Check input( $( this ).val() ) for validity here
		var vdata = $( this ).val();
		if (vdata == 'Other') {
			$('#seeker_seconddegree_text').show();
		}
		else
		{
			$('#seeker_seconddegree_text').hide();
		}
	});
	$( "#seeker_thirddegree" ).change(function() {
		// Check input( $( this ).val() ) for validity here
		var vdata = $( this ).val();
		if (vdata == 'Other') {
			$('#seeker_thirddegree_text').show();
		}
		else
		{
			$('#seeker_thirddegree_text').hide();
		}
	});
	$( "#seeker_secondarydegree" ).change(function() {
		// Check input( $( this ).val() ) for validity here
		var vdata = $( this ).val();
		if (vdata == 'Other') {
			$('#seeker_secondarydegree_text').show();
		}
		else
		{
			$('#seeker_secondarydegree_text').hide();
		}
	});
	$( "#seeker_secondaryleadership" ).change(function() {
		// Check input( $( this ).val() ) for validity here
		var vdata = $( this ).val();
		if (vdata == 'Other') {
			$('#seeker_secondaryleadership_text').show();
		}
		else
		{
			$('#seeker_secondaryleadership_text').hide();
		}
	});
	$( "#seeker_employer_type" ).change(function() {
		// Check input( $( this ).val() ) for validity here
		var vdata = $( this ).val();
		if (vdata == 'Other') {
			$('#seeker_employer_type_text').show();
		}
		else
		{
			$('#seeker_employer_type_text').hide();
		}
	});
	$( "#seeker_employer_industry" ).change(function() {
		// Check input( $( this ).val() ) for validity here
		var vdata = $( this ).val();
		if (vdata == 'Other') {
			$('#seeker_employer_industry_text').show();
		}
		else
		{
			$('#seeker_employer_industry_text').hide();
		}
	});
	$( "#seeker_employer_position" ).change(function() {
		// Check input( $( this ).val() ) for validity here
		var vdata = $( this ).val();
		if (vdata == 'Other') {
			$('#seeker_employer_position_text').show();
		}
		else
		{
			$('#seeker_employer_position_text').hide();
		}
	});
	$( "#seeker_employer_type" ).change(function() {
		// Check input( $( this ).val() ) for validity here
		var vdata = $( this ).val();
		if (vdata == 'Other') {
			$('#seeker_employer_type_text').show();
		}
		else
		{
			$('#seeker_employer_type_text').hide();
		}
	});
	$( "#seeker_language_home" ).change(function() {
		// Check input( $( this ).val() ) for validity here
		var vdata = $( this ).val();
		if (vdata == 'Other') {
			$('#seeker_language_home_text').show();
		}
		else
		{
			$('#seeker_language_home_text').hide();
		}
	});
	$( "#seeker_language_second" ).change(function() {
		// Check input( $( this ).val() ) for validity here
		var vdata = $( this ).val();
		if (vdata == 'Other') {
			$('#seeker_language_second_text').show();
		}
		else
		{
			$('#seeker_language_second_text').hide();
		}
	});
	$( "#seeker_language_third" ).change(function() {
		// Check input( $( this ).val() ) for validity here
		var vdata = $( this ).val();
		if (vdata == 'Other') {
			$('#seeker_language_third_text').show();
		}
		else
		{
			$('#seeker_language_third_text').hide();
		}
	});
	
	
	
</script>
