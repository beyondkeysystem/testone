<?  session_start();

	if(!isset($_SESSION["user_id"]))
	{
		header("location: ../index.php");
		exit();
	}
	require_once("../../classes/class_db.php");
	global $objDb ;
	$objDb->Connection() ;
	require_once("../../includes/functions1.php");
	
	$array = array();		

	$array1 = array();		
	
	$array1["filter_gender"] = "";
	$array1["filter_equity_status"] = "";
	$array1["filter_citizenship"] = "";
	$array1["filter_town"] = "";
	$array1["filter_drivers_license"] = "";
	$array1["filter_pa"] = "";
	$array1["filter_endorsement"] = "";
	$array1["filter_x_vehicle"] = "";
	$array1["filter_x_driver"] = "";
	$array1["filter_criminal_record"] = "";
	$array1["filter_ter_qualification"] = "";
	$array1["filter_sec_qualification"] = "";
	
	//new Add ons
	
					
    if(isset($_POST["ad_country"]))
	{
		$array["ad_country"]=$_POST["ad_country"];
	}             
	if(isset($_POST["specialcomputerknowledge2"]))
	{
		$array["specialcomputerknowledge2"]=$_POST["specialcomputerknowledge2"];
	}
	if(isset($_POST["specialcomputerknowledge1"]))
	{
		$array["specialcomputerknowledge1"]=$_POST["specialcomputerknowledge1"];
	}
	if(isset($_POST["computer5"]))
	{
		$array["computer5"]=$_POST["computer5"];
	}
	if(isset($_POST["industry"]))
	{
		$array["industry"]=$_POST["industry"];
	}
	if(isset($_POST["supervisoryexp"]))
	{
		$array["supervisoryexp"]=$_POST["supervisoryexp"];
	}
	if(isset($_POST["managmentexp"]))
	{
		$array["managmentexp"]=$_POST["managmentexp"];
	}
	if(isset($_POST["language1"]))
	{
		$array["language1"]=$_POST["language1"];
	}
	if(isset($_POST["language2"]))
	{
		$array["language2"]=$_POST["language2"];
	}
	if(isset($_POST["language3"]))
	{
		$array["language3"]=$_POST["language3"];
	}
	if(isset($_POST["computer1"]))
	{
		$array["computer1"]=$_POST["computer1"];
	}
	if(isset($_POST["computer2"]))
	{
		$array["computer2"]=$_POST["computer2"];
	}
	if(isset($_POST["computer3"]))
	{
		$array["computer3"]=$_POST["computer3"];
	}
	if(isset($_POST["computer4"]))
	{
		$array["computer4"]=$_POST["computer4"];
	}
	if(isset($_POST["functional1"]))
	{
		$array["functional1"]=$_POST["functional1"];
	}
	if(isset($_POST["functional2"]))
	{
		$array["functional2"]=$_POST["functional2"];
	}
	if(isset($_POST["functional3"]))
	{
		$array["functional3"]=$_POST["functional3"];
	}
	if(isset($_POST["behavioural1"]))
	{
		$array["behavioural1"]=$_POST["behavioural1"];
	}
	if(isset($_POST["behavioural2"]))
	{
		$array["behavioural2"]=$_POST["behavioural2"];
	}
	if(isset($_POST["behavioural3"]))
	{
		$array["behavioural3"]=$_POST["behavioural3"];
	}
	if(isset($_POST["otherrequirements"]))
	{
		$array["otherrequirements"]=$_POST["otherrequirements"];
	}
	if(isset($_POST["filter_language"]))
	{
		$array["filter_language"]=$_POST["filter_language"];
	}
	if(isset($_POST["option"]))
	{
		$array["option_radio"]=$_POST["option"];
	}
	$array["date_of_takingTo"] = $_POST["date_of_takingTo_year"] . "-" . $_POST["date_of_takingTo_month"] . "-" . $_POST["date_of_takingTo_date"];
	$target_path1 ="";
	$target_path1 = "../../pdf/";
	$base_name1 = "";
	if($_FILES['fileField']['name']!="")
	{
		$base_name1 =basename($_FILES['fileField']['name']);
		$target_path1 = $target_path1 . basename( $_FILES['fileField']['name']); 
		if(move_uploaded_file($_FILES['fileField']['tmp_name'], $target_path1))
		{
			$array['fileField']=$base_name1;
		}				
	}
	
	function findexts ($filename) 

	{ 
	
		$filename = strtolower($filename) ; 
		
		$exts = split("[/\\.]", $filename) ; 
		
		$n = count($exts)-1; 
		
		$exts = $exts[$n]; 
		
		return $exts; 
	
	} 
	
	$target_path2 ="";
	$target_path2 = "../../pdf/ad_files/";
	$base_name2 = "";
	if($_FILES['ad_print']['name']!="")
	{
		$random = (rand(9999,999999));
		$base_name2 = $random."-".$_SESSION["user_id"].".".findexts(basename( $_FILES['ad_print']['name']));
		$target_path2 .= $base_name2; 
		if(move_uploaded_file($_FILES['ad_print']['tmp_name'], $target_path2))
		{
			$array['ad_link'] = $base_name2;
		}				
	}
	for($i=1;$i<=7;$i++)
	{
		$val="duty".$i;
		if(isset($_POST[$val]))
		{
			$array[$val]=$_POST[$val];
		}
	}
	for($i=1;$i<=26;$i++)
	{
		$val="hide".$i;
		
		if(isset($_POST[$val]))
		{
			$array[$val]=$_POST[$val];
		}
		else
		{
			$array[$val]=0;
		}
	}
	
	//end of new add ons

	$objDb->UpdateData("job_ad",$array1,"ad_id",$_POST["ad_id"]);

	
	if(isset($_POST["position_name"]))
    {
		$array["rec_id"] = $_POST["rec_id"];
		$array["ad_date"] = date("Y-m-d");
		
		$array["company_name"] = $_POST["company_name"];
		$array["company_desc"] = $_POST["company_desc"];
		$array["type_of_position"] = $_POST["vacancy"];
		
		if(isset($_GET["job_type"]) && $_GET["job_type"]=="1")
		{
			$array["vacansy"] = $_POST["vacancy"];
		}
		else if(isset($_GET["job_type"]) && $_GET["job_type"]=="3")
		{
			$array["vacansy"] = "Job attachment Position";
		}
		else if(isset($_GET["job_type"]) && $_GET["job_type"]=="4")
		{
			$array["vacansy"] = "Part-time Job Ad";
		}
		$array["department"] = $_POST["department"];
		$array["grade"] = $_POST["grade"];
		$array["application_form"] = $_POST["application_form"] ;
		$array["date_of_taking"] = $_POST["date_of_taking_year"] . "-" . $_POST["date_of_taking_month"] . "-" . $_POST["date_of_taking_date"];		
		
		$array["offered_package"] = $_POST["offered_package"];
		$array["off_package1"] = $_POST["off_package1"];
		$array["off_package2"] = $_POST["off_package2"];
		$array["off_package3"] = $_POST["off_package3"];
		$array["off_package4"] = $_POST["off_package4"];
		$array["off_package5"] = $_POST["off_package5"];
		$array["off_package6"] = $_POST["off_package6"];
		if(isset($_POST["off_package_benefits"])){
			foreach($_POST["off_package_benefits"] as $key => $value) {
				 $off_package_benefits1[$offerInc] = $key ."-".$value ;
				 $offerInc++;
			}
			$array["off_package_benefits"] =  implode($off_package_benefits1,",");
		}
		$array["off_package_b1"] = $_POST["off_package_b1"];			
		
		$array["qks_1"] = $_POST["qks_1_1"] ."-/!-". $_POST["qks_1_2"]. "-/!-".$_POST["qks_1_3"]. "-/!-".
							$_POST["qks_1_4"]. "-/!-". $_POST["qks_1_5"]. "-/!-". $_POST["qks_1_6"] ;  

		$array["qks_2"] = $_POST["qks_2_1"] ."-/!-". $_POST["qks_2_2"]. "-/!-".$_POST["qks_2_3"]. "-/!-".
							$_POST["qks_2_4"] ;  

		$array["qks_3"] = $_POST["qks_3_1"] ."-/!-". $_POST["qks_3_2"]. "-/!-".$_POST["qks_3_3"] ;  

		$array["qks_4"] = $_POST["qks_4_1"] ."-/!-". $_POST["qks_4_2"]. "-/!-".$_POST["qks_4_3"]. "-/!-".
							$_POST["qks_4_4"] . "-/!-". $_POST["qks_4_5"] ;  
	
		$array["qks_5"] = $_POST["qks_5_1"] ."-/!-". $_POST["qks_5_2"]. "-/!-".$_POST["qks_5_3"]. "-/!-".
						$_POST["qks_5_4"]  ;  

		$array["qks_6"] = $_POST["qks_6_1"] ."-/!-". $_POST["qks_6_2"]. "-/!-".$_POST["qks_6_3"]. "-/!-".
						$_POST["qks_6_4"]  ;  

		$array["qks_7"] = $_POST["qks_7_1"] ."-/!-". $_POST["qks_7_2"] ;  
		$array["qks_8"] = $_POST["qks_8_1"] ."-/!-". $_POST["qks_8_2"] ;  
		$array["qks_9"] = $_POST["qks_9_1"] ."-/!-". $_POST["qks_9_2"] ;  
		$array["qks_10"] = $_POST["qks_10_1"] ."-/!-". $_POST["qks_10_2"] ."-/!-". $_POST["qks_10_3"] ;  
		$array["qks_11"] = $_POST["qks_11_1"] ."-/!-". $_POST["qks_11_2"] ;  
		
		$array["preference_emp_1"] = $_POST["preference_emp_1_1"] . "-/!-". $_POST["preference_emp_1_3"] ;
		$array["preference_emp_2"] = $_POST["preference_emp_2"];
		$array["preference_emp_3"] = $_POST["preference_emp_3"];
		
   		$array["position_name"] = $_POST["position_name"];
   		$array["job_desc"] = $_POST["job_desc"];
   		$array["job_benefits"] = $_POST["job_benefits"];
   		$array["job_skills"] = $_POST["job_skills"];
   		$array["experience"] = $_POST["experience"];		
   		$array["salary_type"] = $_POST["salary_type"];								
		if($_POST["adFrom_year"]!=""){
   		$array["adFrom"] = $_POST["adFrom_year"] . "-" . $_POST["adFrom_month"] . "-" . $_POST["adFrom_date"];	}
		if($_POST["adTo_year"]!=""){
   		$array["adTo"] = $_POST["adTo_year"] . "-" . $_POST["adTo_month"] . "-" . $_POST["adTo_date"];	}	
   		$array["level"] = $_POST["level"];	
   		$array["position_name"] = $_POST["position_name"];			
   		$array["salary_from"] = $_POST["salary_from"];		
   		$array["salary_to"] = $_POST["salary_to"];					
   		$array["town"] = $_POST["based_in_town"];				
					
   		if(isset($_POST["type"]))
		{							
			$array["type"] = $_POST["type"];			 
		}
		
		if(isset($_POST["responsiblities"]))
		{
			for($i=0; $i<count($_POST["responsiblities"]); $i++)
			{
				$array["responsiblities" . intval($i+1)] = $_POST["responsiblities"][$i];		
			}
		}
					
		$array["min_sec_qualification"] = $_POST["min_sec_qualification"];			
		$array["min_ter_qualification"] = $_POST["min_ter_qualification"];		
		$array["exp_required"] = $_POST["exp_required"];		
		$array["preference"] = $_POST["preference"];		
		$array["min_comp_literacy"] = $_POST["min_comp_literacy"];		
		$array["special_comp_skill"] = $_POST["special_comp_skill"];
		$array["drivers_license"] = $_POST["drivers_license"];	
		$array["behaviour"] = $_POST["behaviour"];	
		$array["registered_associations"] = $_POST["registered_associations"];	
		
		if(isset($_POST["chkDisplay"]))
		{
			$chkDisplay = "";		
			for($i=0; $i<count($_POST["chkDisplay"]); $i++) 
				$chkDisplay .= $_POST["chkDisplay"][$i];		
			$array["display_info"] = $chkDisplay;	
		}
		
		if(isset($_POST["ques"]))
		{		
			for($i=0; $i<count($_POST["ques"]); $i++)
				$array["ques" . intval($i+1)] = $_POST["ques"][$i];				
		}
		
		if(isset($_POST["chkFilter"]))
		{			
			for($i=0; $i<count($_POST["chkFilter"]); $i++)		
			{
				$field = $_POST["chkFilter"][$i];
				$array["filter_" . $field] = $_POST[$field];	
			}														
		}
		
		$array["seeker_work_type"] = $_POST["seeker_work_type"];
		$array["seeker_vacation_type"] = $_POST["seeker_vacation_type"];
		$array["job_attach"] = $_POST["job_attach"];
		//$array["seeker_work_cat"] = $_POST["seeker_work_cat"];
		//$array["seeker_work_subcat"] = $_POST["seeker_work_subcat"];
		$array["seeker_work_subcat"] = $_POST["industry"];
	    $array["seeker_work_cat"] = $_POST["position_name"];
	
		$array["available_month_to"] = $_POST["available_month_to_year"] . "-" . $_POST["available_month_to_month"] . "-" . $_POST["available_month_to_date"];		
		$array["available_month_from"] = $_POST["available_month_from_year"] . "-" . $_POST["available_month_from_month"] . "-" . $_POST["available_month_from_date"];		
		$array["type_of_part_time_work"] = $_POST["type_of_part_time_work"];
		
		if(isset($_POST["available_days"])){
			$offerInc=0;
			foreach($_POST["available_days"] as $key => $value) {
				$k = $key+1 ;
				$av1 = "av_" .$k."_1"; 		
				$av2 = "av_".$k."_2"; 		
				$available_days1[$offerInc] =  $key."/-/".$_POST[$av1] ."/#/".$_POST[$av2] ;
				$offerInc++;
			}
			 $array["available_days"] = implode($available_days1,"-/!-");
		}

		$array["available_assume_duties"] = $_POST["available_assume_duties_year"] . "-" . $_POST["available_assume_duties_month"] . "-" . $_POST["available_assume_duties_date"];		
    }
	$array["send_mail_another"] = $_POST["send_mail_another"];
	if(isset ($_POST["send_mail_another"]) && $_POST["send_mail_another"]==1){
		$array["another_email"] = $_POST["another_email_id"];
	}
        $array["mail_sent_comp"]=0;
	$array["mail_sent"]=0;
	
    $objDb->UpdateData("job_ad",$array,"ad_id",$_POST["ad_id"]);
	if($_POST["option"]=="2" || $_POST["option"]=="3")
	{
		sendMail($_POST["ad_id"]);
	}
	//send alert mail to jobseekers who match the job skills
	if($_POST["option"]=="1" || $_POST["option"]=="3")
	{
		sendJobAlert($_POST["ad_id"]);
	}
	
	header("location:".$_REQUEST['hurl']."?".$_REQUEST['url']);		
?>
<? $objDb->Closecon(); ?>	
