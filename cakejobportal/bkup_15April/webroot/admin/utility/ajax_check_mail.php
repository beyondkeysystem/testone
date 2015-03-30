<? session_start();
	require_once("../../classes/db_class.php");	
	$objDb = new db();
	
	$exist = "";
	if(isset($_POST["rec_id"]))
		$sql = "select * from job_recruiter where rec_id!=" . $_POST["rec_id"] . " and rec_email='" . $_POST["rec_email"] . "'";
	else
		$sql = "select * from job_recruiter where rec_email='" . $_POST["rec_email"] . "'";
		
	$result = $objDb->ExecuteQuery($sql);
	if($rs = mysql_fetch_object($result))
	{
		$exist = "This email address already exists.";
	}
	
	echo $exist;
?>

