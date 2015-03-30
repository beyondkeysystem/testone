<?   session_start();
	 if(!isset($_SESSION["user_id"]))
	 {
		header("location: ../index.php"); exit();
	 }

	require_once("../../classes/db_class.php");
	$objDb = new db();
	$array=array();
	if(isset($_POST["title"]))
	{
		$array["title"] =$_POST["title"];
	}
	if(isset($_POST["msg"]))
	{
		$array["msg"] =addslashes($_POST["msg"]);
	}

	$objDb->UpdateData("job_cover_letters",$array,"letter_id",$_GET["letter_id"]);
	header("location:letter_list.php?msg=edit");
?>
	