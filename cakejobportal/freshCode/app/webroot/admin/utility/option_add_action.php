<?   session_start();
	 if(!isset($_SESSION["user_id"]))
	 {
		header("location: ../index.php"); exit();
	 }
      set_time_limit(0);
      $timeout = 1000;
      $response_timeout = 1000;
	require_once("../../classes/db_class.php");


	$objDb = new db();
	$rowCount=0;
	if(isset($_GET["action"]) && ($_GET["action"]=="add" || $_GET["action"]=="edit"))
	{
		$sqlcat = "select * from  job_options where category_id=" . $_POST["category_id"]. "  and option_name like '".trim($_POST["option_name"])."'" ;
		$resultcat = $objDb->ExecuteQuery($sqlcat);
		$rowCount = mysql_num_rows($resultcat);
	}
	$array = array();
	
	
	if($rowCount>0)
	{
		if(isset($_GET["cat_id"]) && $_GET["cat_id"]!="")
		{
			if(isset($_GET["oid"]) && $_GET["oid"]!="")
			{
				header("location:option_add.php?cat_id=".$_GET["cat_id"]."&msg=fail&action=".$_GET["action"]."&cid=".$_POST["category_id"]."&option=".$_POST["option_name"]."&oid=".$_GET["oid"]);
			}
			else
			{
				header("location:option_add.php?cat_id=".$_GET["cat_id"]."&msg=fail&action=".$_GET["action"]."&cid=".$_POST["category_id"]."&option=".$_POST["option_name"]);
			}
		}
		else
		{
			if(isset($_GET["oid"]) && $_GET["oid"]!="")
			{
				header("location:option_add.php?msg=fail&action=".$_GET["action"]."&cid=".$_POST["category_id"]."&option=".$_POST["option_name"]."&oid=".$_GET["oid"]);
			}
			else
			{
				header("location:option_add.php?msg=fail&action=".$_GET["action"]."&cid=".$_POST["category_id"]."&option=".$_POST["option_name"]);
			}

		}
	
	}
	else
	{
		if(isset($_GET["action"]) && $_GET["action"]=="add")
		{
			if(isset($_POST["category_id"]))
			{
				$array["category_id"] =$_POST["category_id"];
			}
			if(isset($_POST["option_name"]))
			{
				$array["option_name"] =$_POST["option_name"];
			}
			$objDb->InsertData("job_options",$array);
             GenerateXML();
			if(isset($_GET["cat_id"]) && $_GET["cat_id"]!="")
			{
				header("location:option_add.php?cat_id=".$_GET["cat_id"]."&msg=add&action=".$_GET["action"]);
			}
			else
			{
				header("location:option_add.php?msg=add&action=".$_GET["action"]);
			}
		}
		else if(isset($_GET["action"]) && $_GET["action"]=="edit")
		{
			if(isset($_POST["category_id"]))
			{
				$array["category_id"] =$_POST["category_id"];
			}
			if(isset($_POST["option_name"]))
			{
				$array["option_name"] =$_POST["option_name"];
			}
			$objDb->UpdateData("job_options",$array,"option_id",$_GET["oid"]);
            GenerateXML();
			if(isset($_GET["cat_id"]) && $_GET["cat_id"]!="")
			{
			   header("location:option_add.php?cat_id=".$_GET["cat_id"]."&msg=edit&action=add");
			}
			else
			{
				header("location:option_add.php?msg=edit&action=add");
			}
		}
		else if(isset($_GET["action"]) && $_GET["action"]=="delete")
		{
			
			$objDb->DeleteData("job_options","option_id",$_GET["oid"]);
            GenerateXML();
			if(isset($_GET["cat_id"]) && $_GET["cat_id"]!="")
			{
				header("location:option_add.php?cat_id=".$_GET["cat_id"]."&msg=delete&action=add");
			}
			else
			{
				header("location:option_add.php?msg=delete&action=add");
			}
		}
	}

    function GenerateXML(){
      echo $xmlfile_path= "../../xml/options.xml";
      $query_xmlw = "SELECT * FROM job_options ORDER BY category_id";
      $result_xmlw = mysql_query($query_xmlw);

      $xmlstore="<?xml version=\"1.0\" encoding=\"utf-8\" ?>\n";
      $xmlstore .="<row>\n";

      while($row_xmlw = mysql_fetch_array($result_xmlw)) {
        $xmlstore .= "<category>\n";
        $xmlstore .="<option_id>".$row_xmlw['option_id']."</option_id>\n";
        $xmlstore .="<category_id>".$row_xmlw['category_id']."</category_id>\n";
        $option_name =  str_replace("&","&amp;",$row_xmlw['option_name']) ;
        $option_name =  str_replace(".","",$option_name) ;
        //$option_name =  str_replace("-","minus;",$option_name) ;
        $xmlstore .="<option_name>".$option_name."</option_name>\n";
        $xmlstore .="</category>\n";
      }

      $xmlstore .="</row>\n";

      $handle = fopen($xmlfile_path, "w");

      fwrite($handle, $xmlstore);
      }
		
?>
	