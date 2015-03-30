<?   session_start();
	 if(!isset($_SESSION["user_id"]))
	 {
		header("location: ../index.php"); exit();
	 }

	require_once("../../classes/db_class.php");
	$objDb = new db();
	
	if(isset($_POST["plan_name"]))
	{
		$array["plan_name"] =$_POST["plan_name"];
	}
	if(isset($_POST["unlimited_job_ads"]) && $_POST["unlimited_job_ads"]!="")
	{
		$array["unlimited_job_ads"] =$_POST["unlimited_job_ads"];
	}
	if(isset($_POST["number_job"]) && $_POST["number_job"]!="")
	{
		$array["number_job"] =$_POST["number_job"];
	}
	
	
	if(isset($_POST["system_shortlisting"]))
	{
		$array["system_shortlisting"] =$_POST["system_shortlisting"];
	}
	if(isset($_POST["regret_function"]))
	{
		$array["regret_function"] =$_POST["regret_function"];
	}
	
	if(isset($_POST["client_talent"]))
	{
		$array["client_talent"] =$_POST["client_talent"];
	}
	if(isset($_POST["full_access_jobseekers"]))
	{
		$array["full_access_jobseekers"] =$_POST["full_access_jobseekers"];
	}
	if(isset($_POST["client_logo"]))
	{
		$array["client_logo"] =$_POST["client_logo"];
	}
	
	if(isset($_POST["intercompany_ad"]))
	{
		$array["intercompany_ad"] =$_POST["intercompany_ad"];
	}
	if(isset($_POST["subscription"]))
	{
		if($_POST["subscription"]=="paid")
		{
			if(isset($_POST["rate"]))
			{
				$array["rate"] =$_POST["rate"];
			}
			if(isset($_POST["positions"]))
			{
				$array["positions"] =$_POST["positions"];
			}
		
		}
		else
		{
			$array["positions"]=0;
			$array["rate"]=0;
		}
	}
	
	if(isset($_POST["rate_per_position"]))
	{
		$array["rate_per_job"] =$_POST["rate_per_position"];
	}
	$array["plan_status"] =1;
	$array["type"] ="emp";  	
	
	$objDb->InsertData("job_rec_payment_plans",$array);
	
	header("location:plan_list.php?msg=add");
?>
	