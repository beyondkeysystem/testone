<?
	 session_start();
	 if(!isset($_SESSION["user_id"]))
	 {
		header("location: ../index.php"); exit();
	 }
	require_once("../../classes/db_class.php");
	$position = $_GET['position'];
	$val = $_GET['val'];	
	$objDb = new db();
	//echo $sql = "DELETE FROM job_grade_level WHERE ".$position." = ".$val; exit;
	$objDb->DeleteData("job_grade_level",$position,$val);
	
	$sql = "UPDATE job_grade_level SET ".$position." = (".$position." - 1) WHERE ".$position." <> 0";
	$res1 = $objDb->ExecuteQuery($sql);
	
	header("location:gradelevel_add.php"); 
?>