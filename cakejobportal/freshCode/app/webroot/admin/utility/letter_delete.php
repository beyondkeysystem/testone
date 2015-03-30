<?
	 session_start();
	 if(!isset($_SESSION["user_id"]))
	 {
		header("location: ../index.php"); exit();
	 }
	require_once("../../classes/db_class.php");
	$objDb = new db();
	$objDb->DeleteData("job_cover_letters","letter_id",$_GET["letter_id"]);
	header("location:letter_list.php?msg=delete"); 
?>