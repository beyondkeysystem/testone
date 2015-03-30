<?   session_start();
	 if(!isset($_SESSION["user_id"]))
	 {
		header("location: ../index.php"); exit();
	 }

	require_once("../../classes/db_class.php");
	$objDb = new db();
	
	if(isset($_POST["user_name"]))
	{
		$array["user_name"] =$_POST["user_name"];
	}
	if(isset($_POST["user_first_name"]))
	{
		$array["user_first_name"] =$_POST["user_first_name"];
	}
	
	
	if(isset($_POST["user_last_name"]))
	{
		$array["user_last_name"] =$_POST["user_last_name"];
	}
	
	if(isset($_POST["user_email"]))
	{
		$array["user_email"] =$_POST["user_email"];
	}
	
	
	if(isset($_POST["user_phone"]))
	{
		$array["user_phone"] =$_POST["user_phone"];
	}

	if(isset($_POST["user_copyright"]))
	{
		$array["user_copyright"] =$_POST["user_copyright"];
	}
	
	$objDb->UpdateData("job_user",$array,"user_id",$_GET["uid"]);
	header("location:home.php");

?>
	