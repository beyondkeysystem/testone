<?   session_start();
	 if(!isset($_SESSION["user_id"]))
	 {
		header("location: ../index.php"); exit();
	 }

	require_once("../../classes/db_class.php");
	$objDb = new db();
	$array = array();
	
	if( isset($_GET["status"]) && $_GET["status"] == 'active' ) {
		$array["vt_status"] = 0;
	} else if(isset($_GET["status"]) && $_GET["status"] == 'inactive' ) {
		$array["vt_status"] = 1;
	}
	
		$objDb->UpdateData("job_vtutorials",$array,"vt_id",$_GET["vtid"]);
	
	header("location:tutorial_list.php?msg=status");

		
		
?>
	