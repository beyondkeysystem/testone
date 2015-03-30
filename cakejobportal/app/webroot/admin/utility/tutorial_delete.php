<?
	 session_start();
	 if(!isset($_SESSION["user_id"]))
	 {
		header("location: ../index.php"); exit();
	 }
	require_once("../../classes/db_class.php");
	$objDb = new db();
	$objDb->DeleteData("job_vtutorials","vt_id",$_GET["vtid"]);
	header("location:tutorial_list.php");
?>