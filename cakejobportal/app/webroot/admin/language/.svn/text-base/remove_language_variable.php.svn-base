<?  session_start();

	if(!isset($_SESSION["user_id"]))
	{
		header("location: ../index.php"); exit();
	}
	

	
	require_once("../../classes/db_class.php");
	require_once("includes/functions.php");
		
	$objDb = new db();
	
	
	
	
    if((isset($_REQUEST['variableid'])) && (!empty($_REQUEST['variableid'])) && ($_REQUEST['variableid'] != "") && ($_REQUEST['page_id'] != "")){
	
	      if($_REQUEST['page_id'] == 1)
		  {
		    $filemidname = "lang";
		  }else
		  {
		    $sqlgetpagename = "select * from job_language_page where id = ".$_REQUEST['page_id']."";
		    $resultpagename = $objDb->ExecuteQuery($sqlgetpagename);
		    $pagenameresultrow = mysql_fetch_object($resultpagename);
			$filemidname = "PAGE_".$pagenameresultrow->name;
		  }
		  
		  
		  
	      $sqlgetvar = "select * from language where id = ".$_REQUEST['variableid']." limit 1";
		  $result = $objDb->ExecuteQuery($sqlgetvar);
		  $numrows = mysql_num_rows($result);
		  		       
	      if($numrows > 0)
		  {			
	          $languagevar = mysql_fetch_object($result);
	          
	          $sqlgetlan = "select * from job_language";
		      $result1 = $objDb->ExecuteQuery($sqlgetlan);
		      $numrows1 = mysql_num_rows($result1);
			  
			  if($numrows1 > 0)
			  {
			     while($langarr = mysql_fetch_object($result1))
				 {
				    $filename = "../../langues/".$langarr->language_name."/".$filemidname."_".$langarr->language_shortname.".php";
					$variablename = $languagevar->name;
					$sname = $langarr->language_shortname;
					$valuename = $languagevar->$sname;
					delete_language_variable_in_lang_file($filename, $variablename, $valuename);
				 }
			  }   
	       
		     $objDb->DeleteData("language","id",$_REQUEST['variableid']);   
	      }  
		  
	}
	
	if((isset($_REQUEST['cPage'])) && (!empty($_REQUEST['cPage'])))
	{
	  //header("location:addlangvariable.php?cPage=".$_REQUEST['cPage']."");
	  header("location:addlangvariable.php?cPage=".$_REQUEST['cPage']."&page_id=".$_REQUEST['page_id']);   
	}else
	{
	  //header("location:addlangvariable.php");
	   header("location:addlangvariable.php?page_id=".$_REQUEST['page_id']);
	}
?>