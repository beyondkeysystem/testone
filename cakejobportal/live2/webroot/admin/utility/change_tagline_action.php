<?   session_start();
	 if(!isset($_SESSION["user_id"]))
	 {
		header("location: ../index.php"); exit();
	 }

	require_once("../../classes/db_class.php");
      //  include("../../includes/thumbnail_generator.php");
	$objDb = new db();
	$array=array();
	
         
            if(isset($_POST["tagline"]) and $_POST["tagline"] != "")
            {
				$array["tagline"] = str_replace("'","&rsquo;",$_POST["tagline"]);
            } else {
				 $array["tagline"] = $_POST["tagline1"];
			}
	
	
	$objDb->UpdateData("job_tagline",$array,"tagline_id",1);
	
	header("location:change_tagline.php?msg=add");

		
		
?>
	