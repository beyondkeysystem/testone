<?php
require_once("includes/googleTranslate.class.php");
require_once("includes/functions.php");
$page = "";
$msg = "";
$returnarg = "";

if((isset($_POST)) && (!empty($_POST)) && ($_POST['controller']=="Variable") && ($_POST['action']=="Add") && ($_POST['nameavailable']=="Yes") && ($_POST['EN'] != "") && isset($_POST['EN'])) {

	if(isset($_POST['pageno']) && $_POST['pageno'] != "")
	  $page = "cPage=".$_POST['pageno'];
	
	if($_POST['translateall'] != 'Yes'){ 
	 
		 if(add_language_variable($_POST)) {
			add_language_variable_in_lang_file($_POST['add_lang_page_id'],$_POST['variable_name'],$_POST);
			$msg = "success";
		 }
		 else {
			$msg = "error";
		 }
		
		if($page !== "")
		    $returnarg = "?".$page."&msg=".$msg;
		else
		    $returnarg = "?msg=".$msg;
		
		//header("Location: addlangvariable.php".$returnarg."");
		header("Location: addlangvariable.php".$returnarg."&page_id=".$_POST['add_lang_page_id']);
		
	}else
	{  
	 
	   $sourcelang = $_POST['EN'];
	   
	   $langshortname = get_created_language_shortname();
	    
	   $data = array();
	 
	   foreach($langshortname as $values) {
			$filename = "../../langues/".$values->language_name."/lang_".$values->language_shortname.".php";
			 if($values->language_shortname != "EN") {
			  
			    $gt[$values->language_shortname] = new GoogleTranslateWrapper();  
			    $translatedstring = $gt[$values->language_shortname]->translate($_POST['EN'] , strtolower($values->language_shortname), strtolower("EN"));
			     
			    $finaltranslate = ""; 
			    if(!$gt[$values->language_shortname]->isSuccess())
				   $finaltranslate = $_POST[$values->language_shortname];
				else
				   $finaltranslate = $translatedstring;
			   
			    $data[$values->language_shortname] = $finaltranslate;
			}else
			{
			    $data['EN'] = $_POST['EN'];
		    }
	   }
	  
	   add_language_variable_in_lang_file($_POST['add_lang_page_id'],$_POST['variable_name'],$data);
	   
	   $data['variable_name'] = $_POST['variable_name'];
	   $data['add_lang_page_id'] = $_POST['add_lang_page_id'];
	    
	   if(add_language_variable($data))
			$msg = "success";
	   else
			$msg = "error";
		
	   if($page !== "")
		    $returnarg = "?".$page."&msg=".$msg;
	   else
		    $returnarg = "?msg=".$msg;
		
	   //header("Location: addlangvariable.php".$returnarg."");
	    header("Location: addlangvariable.php".$returnarg."&page_id=".$_POST['add_lang_page_id']);
	
   }
   
//header("Location: addlangvariable.php");
header("Location: addlangvariable.php?page_id=".$_POST['add_lang_page_id']);
}
?>
