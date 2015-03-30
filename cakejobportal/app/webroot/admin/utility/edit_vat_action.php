<? session_start();
    if(!isset($_SESSION["user_id"]))
	{
		header("location: ../index.php"); exit();
	}
	require_once("../../classes/db_class.php");

	$objDb = new db();
	$array = array();
	$array['vat'] = $_POST['vat'];
	$array['vat_status'] = $_POST['vat_status'];
	$objDb->UpdateData("job_vat",$array,"vat_id","1");
	
	echo("<script language='javascript'>location.href='change_vat_success.php';</script>");	
?>