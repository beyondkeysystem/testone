<?   session_start();
	 if(!isset($_SESSION["user_id"]))
	 {
		header("location: ../index.php"); exit();
	 }

	require_once("../../classes/db_class.php");
	include("../../includes/thumbnail_generator.php");
	$objDb = new db();
	$array=array();
	if(isset($_POST["title"]))
	{
		$array["banner_title"] =$_POST["title"];
	}
	if(isset($_POST["url"]))
	{
		$array["banner_url"] =$_POST["url"];
	}

      $target_path ="";
      $target_path = "../../upload_banner/";
      $base_name = "";

        if($_FILES["banner_image"]["name"] != "")
        {
                $base_name = basename($_FILES["banner_image"]["name"]);
                //$base_name_arr = explode(".",$base_name);
                //$base_ext = end($base_name_arr);

               // $base_name = $_POST['banner_image'] . "_" . $_POST['rec_phone'] . "." . $base_ext;

                $target_path = $target_path . $base_name;
                $imgInfo = getimagesize($target_path);
                        //echo $imgInfo[0]." ".$imgInfo[1];exit;
                if($imgInfo[0] > 520 || $imgInfo[1] > 80)
                {  $title = $_POST['title'];
                               $url = $_POST['url'];
                              $aid=$_GET["aid"];
                               echo '<body onload="document.frm1.submit()">
                                    <form name="frm1" action="banner_edit.php?msg=err&aid='.$aid.'" method="post">
                                        <input type="hidden" name="banner_title" value="' . $title . '" >
                                        <input type="hidden" name="banner_url" value="' . $url . '" >
                                    </form>
                                </body>';
                               exit;
                }

                if(move_uploaded_file($_FILES["banner_image"]["tmp_name"], $target_path))
                {
                       

                        if($_FILES["banner_image"]["name"] != "")
                        {
                                $array["banner_image"] = $base_name;
                        }
                }
        }

	
	//print_r($array);exit;
	$objDb->UpdateData("job_banner",$array,"banner_id",$_GET["aid"]);
	header("location:banner_list.php?msg=edit");

?>
	