<?   session_start();
	 if(!isset($_SESSION["user_id"]))
	 {
		header("location: ../index.php"); exit();
	 }

	require_once("../../classes/db_class.php");
	$objDb = new db();
	$array = array();
	$array["c_id"] = $_POST["seeker_recruiter"];
	if(isset($_POST["vt_name"]))
	{
		$array["vt_name"] =$_POST["vt_name"];
	}
	function findexts ($filename) 

	{ 
	
		$filename = strtolower($filename) ; 
		
		$exts = split("[/\\.]", $filename) ; 
		
		$n = count($exts)-1; 
		
		$exts = $exts[$n]; 
		
		return $exts; 
	
	} 
	$array["vt_status"] = 1;
	
	$target_path ="";
	$target_path = "../../tutorials/";
	$base_name = "";
	 
		if($_FILES["videotutorial"]["name"] != "")
		{
				$base_name = basename($_FILES["videotutorial"]["name"]);
				$random = (rand(9999,999999));
				$base_name = $random."-".$base_name;
				$target_path .= $base_name; 

				if(move_uploaded_file($_FILES["videotutorial"]["tmp_name"], $target_path))
				{
					define('PATH_SITE', substr(__file__, 0, -8));;

					$src = $target_path;
					//echo findexts($src);$target_path6 = "../upvideo/";
					$dest =  str_replace(findexts($target_path),"flv",$target_path); 
					
					echo "src: $src
					dest: $dest
					";
					$command = escapeshellcmd("f:/wamp/www/jobportal/ffmpeg.exe -i $src $dest");
					
					$output = shell_exec($command);
					unlink($src);
					$array["vt_path"] = str_replace(findexts($base_name),"flv",$base_name);
				}
		}
	//$array["status"] =1;
	
		$objDb->InsertData("job_vtutorials",$array);
	
	header("location:tutorial_list.php?msg=add");

		
		
?>
	