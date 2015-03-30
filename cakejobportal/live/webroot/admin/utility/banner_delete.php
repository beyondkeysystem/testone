<?
	 session_start();
	 if(!isset($_SESSION["user_id"]))
	 {
		header("location: ../index.php"); exit();
	 }
	require_once("../../classes/db_class.php");
	$objDb = new db();
	# This code is added to delete the voucher code
	if(isset($_GET['delCode']) && $_GET['delCode'] =="delete" ) { 
		$objDb->DeleteData("job_voucher_code","code_id",$_GET["vid"]);
		header("location:code_list.php");
	} #till here 
	else{
		$objDb->DeleteData("job_banner","banner_id",$_GET["aid"]);
		header("location:banner_list.php");
	}
?>