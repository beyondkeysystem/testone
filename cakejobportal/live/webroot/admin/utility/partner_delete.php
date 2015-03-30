<?
	 session_start();
	 if(!isset($_SESSION["user_id"]))
	 {
		header("location: ../index.php"); exit();
	 }
	require_once("../../classes/db_class.php");
	$objDb = new db();
	$objDb->DeleteData("job_partner","partner_id",$_GET["pid"]);
	header("location:partner_list.php");
?>