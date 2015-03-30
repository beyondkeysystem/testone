<?php 
$path = "";
if(isset($_GET['lang']))
{
$lang = $_GET['lang'];
$_SESSION['lang'] = $lang;
}
else if(isset($_SESSION['lang']))
{
$lang = $_SESSION['lang'];
}
else if(isset($_COOKIE['lang']))
{
$lang = $_COOKIE['lang'];
}
else
{
$lang = 'EN';
}

global $objDb ;
error_reporting(0);
$objDb->Connection() ;

   $sql = "select * from job_language where status=1 and language_shortname = '".strtoupper($lang)."'";
   $result = $objDb->ExecuteQuery($sql);
   
   if(mysql_num_rows($result) > 0)
   {
      $langr = mysql_fetch_object($result);
	  $path = $_SERVER['DOCUMENT_ROOT']."/langues/".$langr->language_name."/lang_".$langr->language_shortname.".php";
   }else
   {
      $path = "langues/English/lang_EN.php";
   }
   
include($path);

function get_internal_lang_path($filename)
{
   $path = "";
	if(isset($_GET['lang']))
	{
	$lang = $_GET['lang'];
	
	// register the session and set the cookie
	$_SESSION['lang'] = $lang;
	
	//setcookie("lang", $lang, time() + (3600 * 24 * 30));
	}
	else if(isset($_SESSION['lang']))
	{
	$lang = $_SESSION['lang'];
	}
	else if(isset($_COOKIE['lang']))
	{
	$lang = $_COOKIE['lang'];
	}
	else
	{
	$lang = 'EN';
	}
   global $objDb ;
   $objDb->Connection() ;
   $sql = "select * from job_language where status=1 and language_shortname = '".strtoupper($lang)."'";
   $result = $objDb->ExecuteQuery($sql);
   
   if(mysql_num_rows($result) > 0)
   {
      $langr = mysql_fetch_object($result);
	  $path = $_SERVER['DOCUMENT_ROOT']."/langues/".$langr->language_name."/PAGE_".$filename."_".$langr->language_shortname.".php";
   }else
   {
      $path = "langues/English/PAGE_".$filename."_EN.php";
   }
   
   return $path;
}
  
?>