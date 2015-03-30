<?
	 session_start();
	 if(!isset($_SESSION["user_id"]))
	 {
		header("location: ../index.php"); exit();
	 }
	require_once("../../classes/db_class.php");
	$objDb = new db();
	$objDb->DeleteData("job_top_sites","site_id",$_GET["aid"]);
	header("location:advert_list.php"); 
?>