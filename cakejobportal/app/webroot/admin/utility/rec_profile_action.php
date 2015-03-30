<?
	require_once("../../classes/db_class.php");	
	include("../../includes/thumbnail_generator.php");		
	$objDb = new db();
	
	$array = array();		
	
	if(isset($_POST["rec_name"]))
    {
   		$array["rec_name"] =$_POST["rec_name"];
    }
	if(isset($_POST["comp_name"]))
    {
   		$array["comp_name"] =$_POST["comp_name"];
    }	
	if(isset($_POST["comp_type"]))
    {
   		$array["comp_type"] = $_POST["comp_type"];  //1 - employer and 2 - recruiter
    } 
	
	if(isset($_POST["company_desc"])) // Newly added
    {
   		$array["company_desc"] = trim($_POST["company_desc"]);
    }    
	if(isset($_POST["rec_address"]))
    {
   		$array["rec_address"] =$_POST["rec_address"];
    }
	if(isset($_POST["rec_postalcode"]))
    {
   		$array["rec_postalcode"] =$_POST["rec_postalcode"];
    }
	if(isset($_POST["rec_city"]))
    {
		if($_POST['rec_city'] == "--- Other ---")
			$array["rec_city"] = $_POST["other_rec_city"];
		else
	   		$array["rec_city"] = $_POST["rec_city"];
    }
	
	//....Fields newly added............................
	if(isset($_POST["business_street"])) // New added
    {
   		$array["business_street"] =$_POST["business_street"];
    }
	
	if(isset($_POST["business_street_num"])) // New added
    {
   		$array["business_street_num"] =$_POST["business_street_num"];
    }
	if(isset($_POST["business_suburb"])) // New added
    {
   		$array["business_suburb"] =$_POST["business_suburb"];
    }
	if(isset($_POST["business_city"])) // New added
    {
   		$array["business_city"] =$_POST["business_city"];
    }
	if(isset($_POST["business_country"])) // New added
    {
   		$array["business_country"] =$_POST["business_country"];
    }
	
	
	if(isset($_POST["postal_po_box"])) // New added
    {
   		$array["postal_po_box"] =$_POST["postal_po_box"];
    }
	if(isset($_POST["postal_private_bag"])) // New added
    {
   		$array["postal_private_bag"] =$_POST["postal_private_bag"];
    }
	if(isset($_POST["postal_post_code"])) // New added
    {
   		$array["postal_post_code"] =$_POST["postal_post_code"];
    }
	if(isset($_POST["postal_city"])) // New added
    {
   		$array["postal_city"] =$_POST["postal_city"];
    }
	if(isset($_POST["postal_country"])) // New added
    {
   		$array["postal_country"] =$_POST["postal_country"];
    }
	if(isset($_POST["postal_region"])) // New added
    {
		if($_POST["postal_region"]!=16){
   		$array["postal_region"] =$_POST["postal_region"];
		}		
    }
	if(isset($_POST["other_region"])) // New added
    {
   		//$array["other_region"] =$_POST["other_region"];
		if($_POST["other_region"] !=""){
		$array["postal_region"] =$_POST["other_region"];
		}
    }
	
//............................................till here...........

	if(isset($_POST["provinceval"]) && $_POST["provinceval"] != "")
    {
   		$array["rec_state"] =$_POST["provinceval"];
    }		
	if(isset($_POST["rec_state"]))
    {
   		$array["rec_state"] =$_POST["rec_state"];
    }
	if(isset($_POST["rec_country"]))
    {
   		$array["rec_country"] =$_POST["rec_country"];
    }
	if(isset($_POST["rec_phone"]))
    {
   		$array["rec_phone"] =$_POST["rec_phone"];
    }
	if(isset($_POST["rec_mobile"]))
    {
   		$array["rec_mobile"] =$_POST["rec_mobile"];
    }
	if(isset($_POST["rec_email"]))
    {
   		$array["rec_email"] =$_POST["rec_email"];
    }
	if(isset($_POST["rec_web"]))
    {
   		$array["rec_web"] =$_POST["rec_web"];
    }
	
	//uploading company logo
	  $target_path ="";
	  $target_path = "../../recruiter/logos/";
	  $base_name = "";
			
		if($_FILES["comp_logo"]["name"] != "")
		{
			$base_name = basename($_FILES["comp_logo"]["name"]);
			$base_name_arr = explode(".",$base_name);
			$base_ext = end($base_name_arr);
			
			$base_name = $_POST['comp_name'] . "_" . $_POST['rec_phone'] . "." . $base_ext;
			
			$target_path = $target_path . $base_name; 
			if(move_uploaded_file($_FILES["comp_logo"]["tmp_name"], $target_path))
			{
				$imgInfo = getimagesize($target_path);
				if($imgInfo[0] > 180 || $imgInfo[1] > 80)
				{
					createthumb($target_path,$target_path,180,80);
				}
							
				if($_FILES["comp_logo"]["name"] != "")
				{		
					$array["comp_logo"] = $base_name;	
				}		
			}
		}	
		else if(isset($_POST["hid_comp_logo"]) && $_POST["hid_comp_logo"] != "")
		{		
			if(isset($_POST['chkLogo']))
			{
				unlink("logos/" . $_POST["hid_comp_logo"]);
				$array["comp_logo"] = "";
			}
			else
			{				
				$comp_logo = $_POST["hid_comp_logo"];	
				$array["comp_logo"] = $comp_logo;				
			}
		} 		
	
	if(isset($_POST["rec_hidename"]))
    {
   		$array["rec_hidename"] =$_POST["rec_hidename"];
    }
	if(isset($_POST["rec_hideaddress"]))
    {
   		$array["rec_hideaddress"] =$_POST["rec_hideaddress"];
    }
	if(isset($_POST["rec_hideemail"]))
    {
   		$array["rec_hideemail"] =$_POST["rec_hideemail"];
    }
	if(isset($_POST["rec_hidecity"]))
    {
   		$array["rec_hidecity"] =$_POST["rec_hidecity"];
    }
	if(isset($_POST["rec_hidetelno"]))
    {
   		$array["rec_hidetelno"] =$_POST["rec_hidetelno"];
    }
    if(isset($_POST["rec_password"]) && $_POST["rec_password"] != "")
    {
   		$array["rec_password"] =$_POST["rec_password"];
    }
	
   	$array["rec_IP"] = $_SERVER['REMOTE_ADDR'];
	
    $objDb->UpdateData("job_recruiter",$array,"rec_id",$_POST['rec_id']);
   
	header("location:rec_profile.php?msg=updated&rec_id=" . $_POST["rec_id"]);		
?>

