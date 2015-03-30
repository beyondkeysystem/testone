<?php
require_once("../../classes/db_class.php");

$result = 'NO';
		
if(isset($_REQUEST['newlangvar_name']) && !empty($_REQUEST['newlangvar_name']) && $_REQUEST['newlangvar_name'] != ' ' && $_REQUEST['selectedpageid'] != '')
{
  
  $obj_Db = new db();
  
  $varname = $_REQUEST['newlangvar_name'];
  
  $string = strtoupper(trim($varname));
  
  $string = preg_replace("/\s+/","_",$string);
  if(!strpos("+",$string))
  {
    $pattern = array("/^[\s+]/","/[\s+]$/","/\s/");
    $replace = array("",""," ");
    $string = preg_replace($pattern,$replace,$string);
  }
  
  if($_REQUEST['selectedpageid'] ==  1)
  {
    $sql = "select * from language WHERE name = '".$string."'";
  }else
  {
    $sql = "select * from language WHERE name = '".$string."' and  page_id IN(1,".$_REQUEST['selectedpageid'].")";
  }
 	 
  $result = $obj_Db->ExecuteQuery($sql);
  $numrows = mysql_num_rows($result);
	 
  if($numrows == 0){
    $result = "YES";
  }else
  {
    $result = "NO";
  }
   
  
}

echo json_encode(array('result'=>$result));
?>		