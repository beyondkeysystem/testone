<?   session_start();
	 if(!isset($_SESSION["user_id"]))
	 {
		header("location: ../index.php"); exit();
	 }

	require_once("../../classes/db_class.php");
	$objDb = new db();
	$array=array();
	$array["c_id"] = $_POST["seeker_recruiter"];
	print_r($_POST); exit;
	if(isset($_POST["vt_name"]))
	{
		$array["vt_name"] =$_POST["vt_name"];
	}
	
	$array["vt_status"] = 1;
	
	$target_path ="";
	$target_path = "../../tutorials/";
	$base_name = "";
	 
		if($_FILES["videotutorial"]["name"] != "")
		{
				$base_name = basename($_FILES["videotutorial"]["name"]);
				//$base_name_arr = explode(".",$base_name);
				//$base_ext = end($base_name_arr);

			   // $base_name = $_POST['banner_image'] . "_" . $_POST['rec_phone'] . "." . $base_ext;

				$target_path = $target_path . $base_name;

				
		   
				if(move_uploaded_file($_FILES["videotutorial"]["tmp_name"], $target_path))
				{
						if($_FILES["videotutorial"]["name"] != "")
						{
								$array["vt_path"] = $base_name;
						}
						unlink("../../tutorials/".$_POST["old_tutorial"]."");
				}
		}
	//$array["status"] =1;
	
		$objDb->UpdateData("job_vtutorials",$array,"vt_id",$_GET["vtid"]);
	
	header("location:tutorial_list.php?msg=edit");

		
		
?>
	