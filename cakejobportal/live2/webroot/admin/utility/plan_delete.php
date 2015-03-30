<?
	 session_start();
	 if(!isset($_SESSION["user_id"]))
	 {
		header("location: ../index.php"); exit();
	 }
	require_once("../../classes/db_class.php");
	$objDb = new db();
	$objDb->DeleteData("job_rec_payment_plans","plan_id",$_GET["pid"]);
	header("location:plan_list.php"); 
?>