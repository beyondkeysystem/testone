<?   session_start();
	 if(!isset($_SESSION["user_id"]))
	 {
		header("location: ../index.php"); exit();
	 }

	require_once("../../classes/db_class.php");
	$objDb = new db();
	$array=array();
	if(isset($_POST["company_name"]))
	{
		$array["company_name"] =$_POST["company_name"];
	}
	if(isset($_POST["company_desc"]))
	{
		$array["company_desc"] =$_POST["company_desc"];
	}
	if(isset($_POST["web_address"]))
	{
		$array["web_address"] =$_POST["web_address"];
	}
	if(isset($_POST["contact_name"]))
	{
		$array["contact_name"] =$_POST["contact_name"];
	}
	if(isset($_POST["email_address"]))
	{
		$array["email_address"] =$_POST["email_address"];
	}
	if(isset($_POST["telephone"]))
	{
		$array["telephone"] =$_POST["telephone"];
	}
	if(isset($_POST["street_address"]))
	{
		$array["street_address"] =$_POST["street_address"];
	}
	if(isset($_POST["location"]))
	{
		$array["location"] =$_POST["location"];
	}
	if(isset($_POST["desc_partnership"]))
	{
		$array["desc_partnership"] =$_POST["desc_partnership"];
	}
	$target_path ="";
  $target_path = "../../upload_logo/";
  $base_name = "";
	 
		if($_FILES["logo"]["name"] != "")
		{
				$base_name = basename($_FILES["logo"]["name"]);
				//$base_name_arr = explode(".",$base_name);
				//$base_ext = end($base_name_arr);

			   // $base_name = $_POST['banner_image'] . "_" . $_POST['rec_phone'] . "." . $base_ext;

				$target_path = $target_path . $base_name;

				
		   
				if(move_uploaded_file($_FILES["logo"]["tmp_name"], $target_path))
				{
						if($_FILES["logo"]["name"] != "")
						{
								$array["logo"] = $base_name;
						}
				}
		}
	//$array["status"] =1;
	
		$objDb->UpdateData("job_partner",$array,"partner_id",$_GET["pid"]);
	
	header("location:partner_list.php?msg=edit");

		
		
?>
	