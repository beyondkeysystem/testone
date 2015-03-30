<?  session_start();

	if(!isset($_SESSION["user_id"]))
	{
		header("location: ../index.php"); exit();
	}
	
	
	
	require_once("../../classes/db_class.php");
	require_once("includes/functions.php");
		
	$objDb = new db();
	
	
	$data = array();
	
	if(isset($_GET["id"]) && $_GET["id"]!="" && $_GET["id"] != 1)
	{
	    $sqlLanguage = "select * from job_language where id = ".$_GET["id"]."";
		$resultLang = $objDb->ExecuteQuery($sqlLanguage);	
	    $rowCount = mysql_num_rows($resultLang);
		
		if($rowCount == 1)
		{
		   $rsLang = mysql_fetch_object($resultLang);
		   
		   delete_directory("../../langues/".$rsLang->language_name."/");
		   
	       $sql= "ALTER TABLE `language` DROP `".$rsLang->language_shortname."`";
	       $result = $objDb->ExecuteQuery($sql);
	
	       $objDb->DeleteData("job_language","id",$_GET["id"]);
		   
		}
	}
	
	header("location:index.php");
	
?>