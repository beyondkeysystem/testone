<? session_start();
	require_once("../../classes/db_class.php");	
	$objDb = new db();
	$exist = "";
	$sql = "select * from  job_rec_payment_plans where plan_name like '".trim($_POST["plan_name"])."'" ;
	$result = $objDb->ExecuteQuery($sql);
	if($rs = mysql_fetch_object($result))
	{
		$exist = "This plan name is already exists.";
	}
	
	echo $exist;
?>