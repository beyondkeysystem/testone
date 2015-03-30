<? session_start();
    if(!isset($_SESSION["user_id"]))
	{
		header("location: ../index.php"); exit();
	}
	require_once("../../classes/db_class.php");

	$objDb = new db();
	$array = array();
	$array['user_password'] = $_POST['newp'];

	$objDb->UpdateData("job_user",$array,"user_id","1");
	
	echo("<script language='javascript'>location.href='change_success.php';</script>");	
?>