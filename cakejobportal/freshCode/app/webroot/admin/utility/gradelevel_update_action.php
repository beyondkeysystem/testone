<?   session_start();
	 if(!isset($_SESSION["user_id"]))
	 {
		header("location: ../index.php"); exit();
	 }

	require_once("../../classes/db_class.php");
	require_once("../../includes/functions.php");
	$objDb = new db();
	//$array = array();
	//$array1 = array();
	$array2 = array();   // This array gives the table column head
	$array3 = array();
	$array4 = array();
	
	if(isset($_POST["grade"])) // use parameters 0,$i++
	{
		foreach($_POST["grade"] as $key=>$value){
		$array2[$key] = $value;
		}
	}
	
	if(isset($_POST["elemen"])) // gives all inner cell values
	{
		foreach($_POST["elemen"] as $key=>$value){
		$array3[$key] = $value;
		}
	}
	
	if(isset($_POST["level"])) // gives levels ie. table row head use $array4[$i++][6] for 6 values 
	{
		foreach($_POST["level"] as $key=>$value){
		$array4[$key] = $value;
		}
	}	
	//print_r($array3); exit;
	 
	//echo($array4[1][0]); exit;
	//echo($array2[0][2]); exit;
	//echo($array3[2][1]); exit;
	//$array["status"] =1;	
	//echo(sizeof($array4));exit;
	
	 $col_head = sizeof($array2[0]);
	 $row_size = sizeof($array3);
	 $col_size = sizeof($array4);
	
	for($i=1;$i<=$col_head;$i++){	
	$res1 = $objDb->ExecuteQuery("UPDATE job_grade_level SET field_value = '".$array2[0][$i]."' WHERE field_row = 0 AND field_column = ".$i);
	}
	for($i=1;$i<=$row_size;$i++){	
	for($j=1;$j<=$col_head;$j++){
	//echo ("UPDATE job_grade_level SET field_value = '".$array3[$i][$j]."' WHERE field_row = ". $i ." AND field_column = ".$j);
	$res1 = $objDb->ExecuteQuery("UPDATE job_grade_level SET field_value = '".$array3[$i][$j]."' WHERE field_row = ". $i ." AND field_column = ".$j);
	}
	}
	for($i=1; $i<=$col_size;$i++)
	{	
		$res1 = $objDb->ExecuteQuery("UPDATE job_grade_level SET field_value = '".$array4[$i][0]."' WHERE field_row = ". $i ." AND field_column = 0");
	$j++;
	}
	
	if(isset($_GET['addrowcol'])){
	header("location:gradelevel_add.php");
	}
	else
	{
	header("location:gradelevel_add.php?msg=edit");
	}
		
?>
	