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
	if(isset($_POST["url"]))
	{
		$array["url"] =$_POST["url"];
	}
	
	if(isset($_POST["desc1"]))
	{
		$array["desc1"] =$_POST["desc1"];
	}
	
	$objDb->UpdateData("job_top_sites",$array,"site_id",$_GET["aid"]);
	header("location:advert_list.php?msg=edit");

?>
	