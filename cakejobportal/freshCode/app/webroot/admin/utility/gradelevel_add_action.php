<?   session_start();
	 if(!isset($_SESSION["user_id"]))
	 {
		header("location: ../index.php"); exit();
	 }

	require_once("../../classes/db_class.php");
	$objDb = new db();
	$array=array();
	if(isset($_GET['add']) and $_GET['add']=="new"){
	if(isset($_POST["field_value"]))
	{
		$array["field_value"] = $_POST["field_value"];
	}
	if(isset($_POST["rows"]))
	{
		$array["field_row"] = $_POST["rows"];
		$array["field_column"] = 0;
	}
	
	if(isset($_POST["column"]))
	{
		$array["field_column"] = $_POST["column"];
	}
	
	$array["status"] =1;
	
	//print_r($array); exit;
	$objDb->InsertData("job_grade_level",$array);
	
	}
	if(isset($_GET['add']) and $_GET['add']=="row"){
	//echo ($_GET['rows']); exit;
	$objDb = new db();
	$array = array();
	$array1 = array();
	$array["field_value"] = "new level";
	$array["field_row"] = ((int)$_GET["rows"]) + 1;
	$array["field_column"] = 0;
	$array1["field_value"] = "null";
	$array1["field_row"] = ((int)$_GET["rows"]) + 1;
	//print_r($array);exit;
	$objDb->InsertData("job_grade_level",$array);
	for($i=1;$i<=$_GET['columns'];$i++){
		$array1["field_column"] = $i;
		$objDb->InsertData("job_grade_level",$array1);
	}
	header("location:gradelevel_add.php?addact=row");
	exit;
	}
	if(isset($_GET['add']) and $_GET['add']=="col"){
	$objDb = new db();
	$array = array();
	$array1 = array();	
	$array["field_value"] = "new grade";
	$array["field_row"] = 0;
	$array["field_column"] = ((int)$_GET['columns'])+1;
	$array1["field_value"] = "null";
	//$array1["field_row"] = (int)$_GET["rows"];
	$array1["field_column"] = ((int)$_GET['columns'])+1;
	$objDb->InsertData("job_grade_level",$array);
	for($i=1;$i<=$_GET['rows'];$i++){
		$array1["field_row"] = $i;
		$objDb->InsertData("job_grade_level",$array1);
	}
	header("location:gradelevel_add.php?addact=col");
	exit;
	}
	header("location:gradelevel_add.php");
		
?>
	