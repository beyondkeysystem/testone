<?php

App::uses('AppModel', 'Model');

class JobJobseeker extends Model {

    public $name = 'JobJobseeker';
    public $useTable = 'job_jobseeker';
    
    
    function getJobJobseeker()
    {
        return $this->query("select * from job_jobseeker");
    }
    
    function getJobJobseekerById($id)
    {
        return $this->query("select * from job_jobseeker where seeker_id ='".$id."'");
    }
    
    function getSearchResult()
    {
       // $reg_type = getFieldValue("job_recruiter","comp_type","rec_id",$_SESSION["ses_rec_id"]);
	$sqlSeeker='';
        $_POST['keywords']=($_POST['keywords'])?$_POST['keywords']:$_POST['keywords2'];
        $_POST['keywords2']='';
        
        $_POST['seeker_jobcity']=($_POST['seeker_jobcity'])?$_POST['seeker_jobcity']:$_POST['seeker_jobcity2'];
        $_POST['seeker_jobcity2']='';
            
	if(!isset($_SESSION["sql"])) {
		$sqlSeeker = "SELECT distinct(seeker.seeker_id), seeker.seeker_category, seeker.seeker_summary, user.*, seeker_skills,seeker.seeker_postal_city,seeker.seeker_name FROM job_jobseeker seeker , job_country ctry, users user WHERE seeker.seeker_status=0 AND seeker.seeker_id=user.id";
        		  
	//if($reg_type == 1)
	 // $sqlSeeker .= " AND  seeker.seeker_hideemployers=0 ";
	  
	if((isset($_POST['keywords']) && $_POST['keywords'] != "") || (isset($_POST['keywords2']) && $_POST['keywords2'] != "")) {
            $sqlSeeker .= " AND ( seeker.seeker_skills LIKE '%" . $_POST['keywords'] . "%' OR seeker.seeker_name LIKE '%" . $_POST['keywords'] . "%' OR user.name LIKE '%" . $_POST['keywords'] . "%')";		
	}
        if(isset($_POST['seeker_jobcity']) && $_POST['seeker_jobcity'] != "") {
		$sqlSeeker .= "   AND  seeker.seeker_postal_city='" . $_POST['seeker_jobcity'] . "' ";
	}	
        if(isset($_POST['language']) && $_POST['language'] != "") {
	    $sqlSeeker .= "   AND  seeker.seeker_language='" . $_POST['language'] . "' ";
	}
        if(isset($_POST['seeker_employer_position']) && $_POST['seeker_employer_position'] != "") {
		$j=1;
		$sqlSeeker .= " AND ( ";
                $sqlSeeker2=""; 
		for($i=0;$i<6;$i++)
		{	
			$employer_pos="seeker.seeker_emp".$j."_position";
			$sqlSeeker2 .=  $employer_pos." LIKE '%" . implode(",",$_POST['seeker_employer_position']) . "%' or ";
			$j++;
		}
		$sqlSeeker .= substr($sqlSeeker2,0,strlen($sqlSeeker2) - 3) . ")";
	}
        if(isset($_POST['seeker_education']) && $_POST['seeker_education'] != "") {
            $sqlSeeker .= " AND ( seeker.seeker_skills LIKE '%" . $_POST['seeker_education'] . "%' )";		
	}
        if(isset($_POST['skill']) && $_POST['skill'] != "") {
            $sqlSeeker .= " AND ( seeker.seeker_skills LIKE '%" . $_POST['skill'] . "%' )";		
	}
       /* if((isset($_POST["holdfield"])) && isset($_POST["hold"]) && $_POST["holdfield"]!='' && $_POST["hold"]!='')
        {
            $sqlSeeker .="  AND (".$_POST["holdfield"]." NOT LIKE '%".$_POST["hold"]."%')" ;
        }*/
       // echo $sqlSeeker;
  	//pr($_POST); exit;
        
	//echo $sqlSeeker;
	/*if(isset($_POST['business_country']) && $_POST['business_country'] != "") {
		$sqlSeeker .= " AND  seeker.seeker_business_country='" . $_POST['business_country'] . "' ";
	}
	if(isset($_POST['category']) && $_POST['category'] != "") {
		$sqlSeeker .= " AND  seeker.seeker_category='" . $_POST['category'] . "' ";
	}*/
	

/*	$isSal = 0;								
	if(isset($_POST['salary_from']) && $_POST['salary_from'] != "") {
		$isSal = 1;								
		$sqlSeeker .= " AND  seeker.seeker_salary>=" . $_POST['salary_from'];
	}			
	
	if(isset($_POST['salary_to']) && $_POST['salary_to'] != "") {
		$isSal = 1;
		$sqlSeeker .= " AND  seeker.seeker_salary<=" . $_POST['salary_to'];
	}	
	
	if(isset($_POST['duration']) && $_POST['duration'] != "" && $isSal==1) {
		$sqlSeeker .= "   AND  seeker.seeker_duration='" . $_POST['duration'] . "' ";
	}	
	
	if(isset($_POST['salary_type']) && $_POST['salary_type'] != "" && $isSal==1) {
		$sqlSeeker .= "   AND  seeker.salary_type='" . $_POST['salary_type'] . "' ";
	}			
	
	if(isset($_POST['seeker_experience']) && $_POST['seeker_experience'] != "") {
		$sqlSeeker .= "   AND  seeker.seeker_experience>=" . $_POST['seeker_experience'];
	}																
*/	
																																											
	/*if(isset($_POST['seeker_preferred_employment'] ) && $_POST['seeker_preferred_employment']!="")
			$sqlSeeker .= "   AND  seeker.seeker_preferred_employment='".$_POST['seeker_preferred_employment']."'";*/
			
	/*if(!isset($_POST['seeker_alltypes'])) {
		if(isset($_POST['seeker_fulltime']))
			$sqlSeeker .= "   AND  seeker.seeker_fulltime=1";
			
		if(isset($_POST['seeker_parttime']))
			$sqlSeeker .= "   AND  seeker.seeker_parttime=1";										
			
		if(isset($_POST['seeker_contract']))
			$sqlSeeker .= "   AND  seeker.seeker_contract=1";										
			
		if(isset($_POST['seeker_temp']))
			$sqlSeeker .= "   AND  seeker.seeker_temp=1";										
	}		*/
									
	/*if(isset($_POST['cv_posted']) && $_POST['cv_posted'] != "All") {
		$sqlSeeker .= " AND To_days('" . date("Y-m-d") . "') - To_days(seeker.seeker_reg_date) <=" . ($_POST['cv_posted'] * 30);
	}*/	
																	
	/*if(isset($_POST['drivers_license']) && $_POST['drivers_license'] != "") {
		$sqlSeeker .= " AND seeker.seeker_license_code='" . $_POST['drivers_license'] . "' ";
	}	*/		
																									
	/*if(isset($_POST['age']) && $_POST['age'] != "") {
		$age = explode(" - ",$_POST['age']);
		$fromAge = $age[0];
		$toAge = $age[1];
		$sqlSeeker .= " AND " . date("Y") . " - Year(seeker.seeker_dob)>=" .$fromAge . " and " . date("Y") . " - Year(seeker.seeker_dob)<=" . $toAge ;
	}*/			
																												
	/*if(isset($_POST['criminal_record'])) {
		$sqlSeeker .= " AND seeker.seeker_criminal='" . $_POST['criminal_record'] . "' ";
	}*/
	
	/*if(isset($_POST['gender']) && $_POST['gender'] != "Either") {
		$sqlSeeker .= "   AND  seeker.seeker_gender='" . $_POST['gender'] . "' ";
	}*/								
																													
	/*if(isset($_POST['equity']) && $_POST['equity'] != "") {
		$sqlSeeker .= "   AND  seeker.seeker_equity ='" . $_POST['equity'] . "' ";
	}	
																										
	if(isset($_POST['seeker_city']) && $_POST['seeker_city'] != "") {
		$sqlSeeker .= "   AND  seeker.seeker_postal_city='" . $_POST['seeker_city'] . "' ";
	}	*/
	//newly added
	/*if(isset($_POST['seeker_employer_industry']) && $_POST['seeker_employer_industry'] != "") {
		$j=1;
		$sqlSeeker .= " AND ( ";
		for($i=0;$i<6;$i++)
		{	
			$employer="seeker.seeker_emp".$j."_industry";
			$sqlSeeker1 .=  $employer."='" . $_POST['seeker_employer_industry'] . "' or ";
			$j++;
		}
		$sqlSeeker .= substr($sqlSeeker1,0,strlen($sqlSeeker1) - 3) . ")";
	}*/	
		
	
	/*if((isset($_POST['seeker_language']) && $_POST['seeker_language'] != "") && (isset($_POST['speak_home']) && $_POST['speak_home'] != "")) {
		$sqlSeeker .= " AND ( (seeker.seeker_language_home='" . $_POST['seeker_language'] . "' AND seeker.seeker_language_home_speak>='" . $_POST['speak_home'] . "') or (seeker.seeker_language_second='" . $_POST['seeker_language'] . "' AND seeker.seeker_language_second_speak>='" . $_POST['speak_home'] . "') or (seeker.seeker_language_third='" . $_POST['seeker_language'] . "' AND seeker.seeker_language_third_speak>='" . $_POST['speak_home'] . "')) ";
	}	
	if((isset($_POST['seeker_language_second']) && $_POST['seeker_language_second'] != "") && (isset($_POST['speak_second']) && $_POST['speak_second'] != "")) {
		$sqlSeeker .= " AND ( (seeker.seeker_language_home='" . $_POST['seeker_language_second'] . "' AND seeker.seeker_language_home_speak>='" . $_POST['speak_second'] . "') or (seeker.seeker_language_second='" . $_POST['seeker_language_second'] . "' AND seeker.seeker_language_second_speak>='" . $_POST['speak_second'] . "') or (seeker.seeker_language_third='" . $_POST['seeker_language_second'] . "' AND seeker.seeker_language_third_speak>='" . $_POST['speak_second'] . "')) ";
	}	
	if((isset($_POST['seeker_language_third']) && $_POST['seeker_language_third'] != "") && (isset($_POST['speak_third']) && $_POST['speak_third'] != "")) {
		$sqlSeeker .= " AND ( (seeker.seeker_language_home='" . $_POST['seeker_language_third'] . "' AND seeker.seeker_language_home_speak>='" . $_POST['speak_third'] . "') or (seeker.seeker_language_second='" . $_POST['seeker_language_third'] . "' AND seeker.seeker_language_second_speak>='" . $_POST['speak_third'] . "') or (seeker.seeker_language_third='" . $_POST['seeker_language_third'] . "' AND seeker.seeker_language_third_speak>='" . $_POST['speak_third'] . "')) ";
	}*/	
	
	
	/*if(isset($_POST['speak_home']) && $_POST['speak_home'] != "") {
		$sqlSeeker .= " AND seeker_language_home_speak='" . $_POST['speak_home'] . "' ";
	}	
	if(isset($_POST['seeker_language_second']) && $_POST['seeker_language_second'] != "") {
		$sqlSeeker .= " AND seeker_language_second='" . $_POST['seeker_language_second'] . "' ";
	}	
	if(isset($_POST['speak_second']) && $_POST['speak_second'] != "") {
		$sqlSeeker .= " AND   	seeker_language_second_speak='" . $_POST['speak_second'] . "' ";
	}
	if(isset($_POST['seeker_language_third']) && $_POST['seeker_language_third'] != "") {
		$sqlSeeker .= " AND seeker_language_third='" . $_POST['seeker_language_third'] . "' ";
	}	
	if(isset($_POST['speak_third']) && $_POST['speak_third'] != "") {
		$sqlSeeker .= " AND   	seeker_language_third_speak='" . $_POST['speak_third'] . "' ";
	}*/
	/*if((isset($_POST['seeker_bursary_type_full']) && $_POST['seeker_bursary_type_full'] != "") && (isset($_POST['seeker_bursary_type']) && $_POST['seeker_bursary_type'] != "")) {
		$sqlSeeker .= " AND   	(seeker.seeker_bursary_type='" . $_POST['seeker_bursary_type_full'] . "' or seeker.seeker_bursary_type='" . $_POST['seeker_bursary_type'] . "' ) ";
	}
	else if((isset($_POST['seeker_bursary_type_full']) && $_POST['seeker_bursary_type_full'] != "") && (!isset($_POST['seeker_bursary_type'])) ) {
		$sqlSeeker .= " AND   	seeker.seeker_bursary_type='" . $_POST['seeker_bursary_type_full'] . "' ";
	}
	else if((isset($_POST['seeker_bursary_type']) && $_POST['seeker_bursary_type'] != "") && (!isset($_POST['seeker_bursary_type_full'])) ) {
		$sqlSeeker .= " AND   	seeker.seeker_bursary_type='" . $_POST['seeker_bursary_type'] . "' ";
	}
	if(isset($_POST['seeker_bursary_course']) && $_POST['seeker_bursary_course'] != "") {
		$sqlSeeker .= " AND   	seeker.seeker_bursary_course='" . $_POST['seeker_bursary_course'] . "' ";
	}
	if(isset($_POST['employment']) && $_POST['employment'] == "1") {
		$sqlSeeker .= " AND   	( seeker.seeker_current_employment='temp' or seeker.seeker_current_employment='unemployed') ";
	}*/
	//if($reg_type == "1") {
	//	$sqlSeeker .= " AND   	seeker.seeker_current_employment !='fulltime' And seeker.seeker_all_employer=1  ";
	//}
	
	//end newly added	
	/*$seeker_temp_empFlag = 0;
	$seeker_per_empFlag = 0;
	if(isset($_POST["seeker_temp_emp"])) {	     
		$seeker_temp_empFlag = 1;
		$sqlSeeker .= " AND ( seeker.seeker_temp_emp='" . $_POST['seeker_temp_emp'] . "' ";			 
	}
	
	if(isset($_POST["seeker_per_emp"])) {
		$seeker_per_empFlag = 1;
		$seperator = ($seeker_temp_empFlag==1) ? ' OR ' : ' AND ( ';			    
		$sqlSeeker .= $seperator . " seeker.seeker_per_emp='" . $_POST['seeker_per_emp'] . "' ";				
	}				
	if($seeker_temp_empFlag==1 || $seeker_per_empFlag==1)//{
	    $sqlSeeker .= " ) ";								
		
		$sqlSeeker .= " order by ctry.order_id, ctry.country_id ";
	    $_SESSION["sql"] = $sqlSeeker;
	} else {
		$sqlSeeker = $_SESSION["sql"];
	}*/
        }
        //echo $sqlSeeker;
        //die;
        //$sqlSeeker3 = "SELECT distinct(seeker.seeker_id), seeker.seeker_summary, user.*, seeker_skills,seeker.seeker_postal_city,seeker.seeker_name FROM job_jobseeker seeker , job_country ctry, users user WHERE seeker.seeker_status=0";
	$result = $this->query($sqlSeeker);
        return $result;	   
    }
}