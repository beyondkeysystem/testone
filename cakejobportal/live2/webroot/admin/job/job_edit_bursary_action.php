<?  session_start();
	
	if(! isset($_SESSION["user_id"]))
	{
		header("location: ../index.php"); exit();
		exit();
	}
		
	require_once("../../classes/class_db.php");
	global $objDb ;
	$objDb->Connection() ;
	require_once("../../includes/functions1.php");
	$sqlRec = "select * from job_recruiter where rec_id=" . $_SESSION["ses_rec_id"];
	$resultRec = $objDb->ExecuteQuery($sqlRec);
	$rsRec = mysql_fetch_object($resultRec);
	
	$array = array();		
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
	if($_POST["adFrom_year"]!=""){
   		$array["adFrom"] = $_POST["adFrom_year"] . "-" . $_POST["adFrom_month"] . "-" . $_POST["adFrom_date"];	}
		if($_POST["adTo_year"]!=""){
   		$array["adTo"] = $_POST["adTo_year"] . "-" . $_POST["adTo_month"] . "-" . $_POST["adTo_date"];	}	
	$rrr="";
	//print_r($_POST['br_5_2']);
	$benefits= $_POST['br_5_2'];
	$benifits_val="";
	if(is_array($benefits))
	{
		foreach($benefits as $bf)
		{
			$benifits_val.=$bf.",";
		}
		$rrr=substr($benifits_val,0,strlen($benifits_val)-1);
	}
	else
	{
		$rrr=$benefits;
	}
	
	
	
	if(isset($_POST["bursary_institution"]))
    {
		$array["rec_id"] = $_POST["rec_id"];
		$array["ad_date"] = date("Y-m-d");
		
		$array["company_name"] = $_POST["company_name"];
		$array["company_desc"] = $_POST["company_desc"];
		//$array["vacansy"] = $_POST["vacancy"];		
	
		$array["bursary_name"] = $_POST["bursary_name"] ;
		$array["bursary_year"] = $_POST["bursary_year"]; 
		$array["bursary_details_offer"] = $_POST["bursary_details_offer"]; 
		$array["bursary_industry"] =  $_POST["bursary_industry"]; 
		$array["bursary_institution"] =  $_POST["bursary_institution"]; 
		$array["bursary_req_study"] =  $_POST["bursary_req_study"]; 
		$array["bursary_qualification"] =  $_POST["bursary_qualification"]; 
		$array["bursary_level"] =  $_POST["bursary_level"]; 
		$array["bursary_study"] =  $_POST["bursary_study_1"] ."-/!-". $_POST["bursary_study_2"] ; 
		$array["bursary_offer"] =  $_POST["bursary_offer"]; 
		$array["bursary_inclusive"] =  $_POST["bursary_inclusive"]; 
			if(isset ($_POST["send_mail_another"]) && $_POST["send_mail_another"]==1){
		$array["another_email"] = $_POST["another_email_id"];
	}
		
		if(isset($_POST["bursary_inclusive"])){
			$offerInc=0;
			$arr_incl = $_POST["bursary_inclusive"] ;
			foreach($arr_incl as $key => $value) {
				if($key == 6) {
					$value = $value . "/#/" .  $_POST["bursary_inclusive_other"]; 
				}
				$bursary_inclusive1[$offerInc] = $key ."/-/".$value ;
				$offerInc++;
			}
			$array["bursary_inclusive"] =  implode($bursary_inclusive1,"-/!-");
		}

		
		$array["bursary_estimated_annual_value"] =  $_POST["bursary_estimated_annual_value"]; 
		
		if(isset($_POST["bursary_entry_req"])){
			$arr_inc2 = $_POST["bursary_entry_req"] ;
			$offerInc=0;
			foreach($arr_inc2 as $key => $value) {
				if($key == 0 && $value == "br_1") {
					$value = "A minimum of" ."/#/". $_POST["br_1_1"] ."/#/". "symbols for " ."/#/". $_POST["br_1_2"] ."/#/". "of HIGCSE"  ;	
				}else 
				if($key == 1 && $value == "br_2") {
					$value = "A minimum of" ."/#/". $_POST["br_2_1"] ."/#/". "symbols for " ."/#/". $_POST["br_2_2"] ."/#/". "of HIGCSE"  ;	
				}else 
				if($key == 2 && $value == "br_3") {
					$value = "A minimum of" ."/#/". $_POST["br_3_1"] ."/#/". "symbols for " ."/#/". $_POST["br_3_2"] ."/#/". "of HIGCSE"  ;	
				}else 
				if($key == 3 && $value == "br_4") {
					$value = "A minimum of" ."/#/". $_POST["br_4_1"] ."/#/". "symbols for " ."/#/". $_POST["br_4_2"] ."/#/". "of HIGCSE"  ;	
				}else 
				if($key == 6 && $value == "br_5") {
					$value = "Pass mark in" ."/#/". $_POST["br_5_1"] ."/#/". "subjects on HIGCSE level including the following subject(s)" ."/#/". $rrr  ;	
				} else 
				if($key == 7 && $value == "br_6") {
					$value = "Preference will be given to" ."/#/". $_POST["br_6_1"] ."/#/". $_POST["br_6_2"] ."/#/". $_POST["br_6_3"]  ;	
				} else 
				if($key == 8 && $value == "br_7") {
					$value = "Preference will be given to" ."/#/". $_POST["br_7_1"]   ;	
				} else 
				if($key == 9 && $value == "br_8") {
					$value = "Preference will be given to" ."/#/". $_POST["br_8_1"]   ;	
				}

				$bursary_entry_req1[$offerInc] = $key ."/-/". $value ;
				$offerInc++;
			}
			$array["bursary_entry_req"] =  implode($bursary_entry_req1,"-/!-");
		}
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
		
		$array["offered_package"] = $_POST["offered_package"];
		$array["off_package1"] = $_POST["off_package1"];
		$array["off_package2"] = $_POST["off_package2"];
		$array["off_package3"] = $_POST["off_package3"];
		$array["off_package4"] = $_POST["off_package4"];
		$array["off_package5"] = $_POST["off_package5"];
		$array["off_package6"] = $_POST["off_package6"];
		$offerInc = 0 ;
		if(isset($_POST["off_package_benefits"])){
			foreach($_POST["off_package_benefits"] as $key => $value) {
				 $off_package_benefits1[$offerInc] = $key ."-".$value ;
				 $offerInc++;
			}
			$array["off_package_benefits"] =  implode($off_package_benefits1,",");
		}
		$array["off_package_b1"] = $_POST["off_package_b1"];			

		
		if(isset($_POST["chkFilter"]))
		{			
			for($i=0; $i<count($_POST["chkFilter"]); $i++)		
			{
				$field = $_POST["chkFilter"][$i];
				$array["filter_" . $field] = $_POST[$field];	
			}														
		}
		
		$array["bursary_estimated_annual_value"] =  $_POST["bursary_estimated_annual_value"]; 
		
		if(isset($_POST["bursary_con_granting"])){
			$arr_inc2 = $_POST["bursary_con_granting"] ;
			$offerInc=0;
			foreach($arr_inc2 as $key => $value) {
				if($key == 7 && $value == "bcg_1") {
					$value = "the immediate termination of the bursary as the failing of" ."/#/". $_POST["bcg_1_1"] ."/#/". "subject(s) per" ."/#/". $_POST["bcg_1_2"] ."/#/". "will nullify the bursary agreement."  ;	
				}else if($key == 8 && $value == "bcg_2") {
					$value = "work at the company during the" ."/#/". $_POST["bcg_2_1"] ."/#/". ", subject to the company having suitable employment for the bursar at that time."  ;	
				}
				
				$bursary_con_granting1[$offerInc] = $key ."/-/".$value ;
				$offerInc++;
			}
			$array["bursary_con_granting"] =implode($bursary_con_granting1,"-/!-");
		}
    }
	
	
	if(isset($_POST["ques"]))
	{		
		for($i=0; $i<count($_POST["ques"]); $i++)
			$array["ques" . intval($i+1)] = $_POST["ques"][$i];				
	}
        $array["send_mail_another"] = $_POST["send_mail_another"];
	$array["mail_sent_comp"]=0;
	$array["mail_sent"]=0;
	
    $objDb->UpdateData("job_ad",$array,"ad_id",$_POST["ad_id"]);

	header("location:".$_REQUEST['hurl']."?".$_REQUEST['url']);		
?>
<? $objDb->Closecon(); ?>	
