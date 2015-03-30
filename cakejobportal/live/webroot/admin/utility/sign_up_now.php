<?  session_start(); 
	if(!isset($_SESSION["user_id"]))
	{
		header("location: ../index.php"); exit();
	}
	require_once("../../classes/db_class.php");
	require_once("../../includes/functions.php");	

	$objDb = new db();
	$arr = array();
	$dd="add_".$_GET['plan'];
	//echo $dd;
	//echo $_POST[$dd]; exit;
	//echo $_POST[$dd]; exit;
	
	$arr['invoice_status'] = 0;				
	$arr['invoice_type'] = 1; //1 for plan subscription and 2 for shortlisted jobseekers
	$arr['invoice_date'] = date("Y-m-d");	
	$arr['rec_id'] = $_GET['rec_id'];
	
	$sqlPlan = "select * from job_rec_payment_plans where plan_id=" . $_GET['plan'];
	$resultPlan = $objDb->ExecuteQuery($sqlPlan);
	$rsPlan = mysql_fetch_object($resultPlan);
	$sql_vat = "select * from job_vat where vat_status=1";
	$result_vat  = $objDb->ExecuteQuery($sql_vat);					
	if($rs_vat  = mysql_fetch_object($result_vat)) $vat=$rs_vat->vat; else $vat=0;

	$arr['plan_name'] = $rsPlan->plan_name;
	$arr['unlimited_job_ads'] = $rsPlan->unlimited_job_ads;	
	$arr['system_shortlisting'] = $rsPlan->system_shortlisting;	
	$arr['regret_function'] = $rsPlan->regret_function;	
	$arr['client_talent'] = $rsPlan->client_talent;	
	$arr['full_access_jobseekers'] = $rsPlan->full_access_jobseekers;	
	$arr['client_logo'] = $rsPlan->client_logo;	
	$arr['intercompany_ad'] = $rsPlan->intercompany_ad;								
	$arr['rate'] = ($rsPlan->rate+($_POST[$dd]*$rsPlan->rate_per_job))+(($rsPlan->rate+($_POST[$dd]*$rsPlan->rate_per_job))*($vat/100));
	$arr['positions'] = $rsPlan->positions+$_POST[$dd];
	$arr['additional_rate'] = $_POST[$dd]*$rsPlan->rate_per_position;
	$arr['additional_position'] = $_POST[$dd];
	$arr['vat']=(($rsPlan->rate+($_POST[$dd]*$rsPlan->rate_per_job))*($vat/100));
	$arr['rate_per_position'] = $rsPlan->rate_per_position;	
	$arr['number_job'] = $rsPlan->number_job;
	$arr['additional_job_rate'] = $_POST[$dd]*$rsPlan->rate_per_job;
	$arr['additional_job'] = $_POST[$dd];
	$arr['rate_per_job'] = $rsPlan->rate_per_job;
	
	$arr['rate_per_position'] = $rsPlan->rate_per_position;	
	
	//print_r($arr);exit;
	$objDb->InsertData("job_rec_invoices",$arr);
	
	header("location:plan_invoice.php?invoice_id=" . mysql_insert_id() . "&plan=" . $_GET['plan']);
?>