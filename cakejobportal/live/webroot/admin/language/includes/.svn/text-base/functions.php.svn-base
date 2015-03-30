<?php
    require_once("googleTranslate.class.php");
	require_once("../../classes/db_class.php");
    

  //Start Get list of country for user admin 

  function get_country_list($default_country='') {

	 $obj_Db = new db();
	 
	 $sql= "select * from job_country WHERE country_id NOT IN(select country_id from job_language)";
	 
	 $result = $obj_Db->ExecuteQuery($sql);
 	 $numrows = mysql_num_rows($result);
	 
	 if($numrows > 0) {			
	 
	  $countrylist = "<option value = ''> --- Select Country --- </option>";
	  
	  while($countryobj = mysql_fetch_object($result))
	  {
	  
	    if($default_country == $countryobj->country_id)
		{
	      $countrylist .= "<option value = '".$countryobj->country_id."' selected='selected'>".$countryobj->country_name."</option>";
	    }else
		{
		  $countrylist .= "<option value = '".$countryobj->country_id."'>".$countryobj->country_name."</option>";
		}
		
	  }
		
	 }
	 
	 return $countrylist;
	
  }
  
  //End Get list of country for user admin 
  
  function get_language_list($default_language='') {

	 $obj_Db = new db();
	 
	 $sql= "select * from job_language_list WHERE id NOT IN(select language_id from job_language)";
	 
	 $result = $obj_Db->ExecuteQuery($sql);
 	 $numrows = mysql_num_rows($result);
	 
	 if($numrows > 0) {			
	 
	  $languagelist = "<option value = ''> --- Select Language --- </option>";
	  
	  while($languageobj = mysql_fetch_object($result)) {
	  
	    if($default_language == $languageobj->id)
		{
	      $languagelist .= "<option value = '".$languageobj->id."' selected='selected'>".$languageobj->name."</option>";
	    }else
		{
		  $languagelist .= "<option value = '".$languageobj->id."'>".$languageobj->name."</option>";
		}
	  }
		
	 }
	 
	 return $languagelist;
	
  }
  
  
  function getExtension($str)
  {
     $i = strrpos($str,".");
	 
     if (!$i)
	 { 
	   return ""; 
	 }
     
	 $l = strlen($str) - $i;
     $ext = substr($str,$i+1,$l);
	 
     return $ext;
  }
  
  
  
  function validate_language_form($data)
  {
     define ("ICON_MAX_SIZE","100"); 
     $error = '';
	
	 if($data['country'] == ''  || empty($data['country']))
	 {
	   $error .= "Country field required!!<br>";
	 }
	
	 if($data['language'] == ''  || empty($data['language']))
	 {
	   $error .= "Language field required!!<br>";
	 }
	
	 if($data['currency'] == ''  || empty($data['currency']))
	 {
	   $error .= "Currency field required!!<br>";
	 }
	
	 $filename = stripslashes($data['icon']['name']);
	 
	 if($filename) 
 	 {
	 	    
		$extension = getExtension($filename);
		$extension = strtolower($extension);
		
		if (($extension != "jpg") && ($extension != "jpeg") && ($extension != "png") && ($extension != "gif"))
		{
		
 			$error .= "Upload language icon unknown extension!!<br>";
			
		}else
		{
		
		    $size = $data['icon']['size'];
			
			
		    if ($size > ICON_MAX_SIZE * 1024)
            {
	          
	          $error .= "Upload language icon exceeded the size limit!!<br>";
			  
            }
			
			list($width, $height) = getimagesize($data['icon']['tmp_name']); 
			if($width > 50 || $height > 50)
			$error .= "Upload language icon size must 50 * 50!!<br>";
		}
	 
	 }else
	 {
	    $error .= "Upload language icon field required!!<br>";
	 }
	
	return $error;
	 
  }
  
  
  function check_default_created_language($data)
  {
      $obj_Db = new db();
	 
	  $sql= "select * from job_language WHERE language_id = ".$data['language']."";
	 
	  $result = $obj_Db->ExecuteQuery($sql);
	  
 	  $numrows = mysql_num_rows($result);
	 
	  if($numrows > 0)
	    return FALSE;
	  else
	    return TRUE;
  }
  
  
  
  
//  function add_new_language_data_filed($field, $condition, $langname)
//  {  
//  
//    $obj_Db = new db();
//	$sql= "ALTER TABLE `language` ADD `".$field."` MEDIUMTEXT CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL";
//	$result = $obj_Db->ExecuteQuery($sql);
//	
//   if($condition == "Yes") {	
//	 $sql1 = "select id,name,EN from language";
//	 
//	 $result1 = $obj_Db->ExecuteQuery($sql1);
//	
// 	 $numrows1 = mysql_num_rows($result1);
//	
//	 if($numrows1 > 0)
//	 {
//	    
//	    while($languagevar = mysql_fetch_object($result1))
//	    {  
//		   $obj_Db->ExecuteQuery("SET NAMES utf8");
//		   $translatedstring = NULL;
//		   
//		   $gt[$languagevar->id] = new GoogleTranslateWrapper();
//		   
//		   $translatedstring = $gt[$languagevar->id]->translate($languagevar->EN , strtolower($field), strtolower("EN"));
//	       
//		   if($translatedstring == "")
//		      $translatedstring = $languagevar->EN;
//			  
//		   $sql3 = "update language set ".$field." = '".$translatedstring."' WHERE id = ".$languagevar->id."";
//		   $obj_Db->ExecuteQuery($sql3);
//		   
//		   $filename = "../../langues/".$langname."/lang_".$field.".php";
//		   update_language_variable_in_lang_file($filename,$languagevar->name,$translatedstring);
//		   
//		   
//		         
//	    }
//	  
//	
//	 }
//	
//   }
//   	
// }
  
  
  function add_new_language_data_filed($field, $condition, $langname)
  {  
  
    $obj_Db = new db();
	$sql= "ALTER TABLE `language` ADD `".$field."` MEDIUMTEXT CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL";
	$result = $obj_Db->ExecuteQuery($sql);
	
   if($condition == "Yes") {
	$lang_page_sql = "select * from job_language_page";
	$lang_page_result = mysql_query($lang_page_sql);
	if(mysql_num_rows($lang_page_result)>0){
	    while($lang_page_rows=mysql_fetch_object($lang_page_result)) {	    
		$sql1 = "select id,name,EN from language where page_id=".$lang_page_rows->id;		
		$result1 = $obj_Db->ExecuteQuery($sql1);	       
		$numrows1 = mysql_num_rows($result1);	       
		if($numrows1 > 0) {		   
		   while($languagevar = mysql_fetch_object($result1))  {  
			  $obj_Db->ExecuteQuery("SET NAMES utf8");
			  $translatedstring = NULL;			  
			  $gt[$languagevar->id] = new GoogleTranslateWrapper();			  
			  $translatedstring = $gt[$languagevar->id]->translate($languagevar->EN , strtolower($field), strtolower("EN"));		      
			  if($translatedstring == "")
			     $translatedstring = $languagevar->EN;				 
			  $sql3 = "update language set ".$field." = '".mysql_real_escape_string(addslashes($translatedstring))."' WHERE id = ".$languagevar->id."";
			  $obj_Db->ExecuteQuery($sql3);
			  $filename="";
			  if($lang_page_rows->name=="COMMON"){
			    $filename = "../../langues/".$langname."/lang_".$field.".php";
			   
			  }
			  else {
			     $filename = "../../langues/".$langname."/PAGE_".$lang_page_rows->name."_".$field.".php";
			  }			  			  
			  update_language_variable_in_lang_file($filename,$languagevar->name,$translatedstring);			
		   }
		 
	       
		}
	    }
	}
	
   }
   	
 }
  
  
  
//  function addlanguageprocess($data = '', $file = '')
//  { 
//     $target_path ="";
//	 $langdirname = "";
//	 
//	 $obj_Db = new db();
//	 $sql= "select * from job_language_list WHERE id = ".$data['language']."";
//	 $result = $obj_Db->ExecuteQuery($sql);
//	 $numrows = mysql_num_rows($result);
//	 
//	 if($numrows > 0)
//	 {
//	    $languagedetails = mysql_fetch_object($result);
//		$langdirname = $languagedetails->name;
//	 }
//	 
//	 $target_path = "../../langues";
//	 $base_name = "";
//	 
//     if(@mkdir($target_path ."/".$langdirname , 0777))
//     {
//       if(@mkdir($target_path."/".$langdirname."/images" , 0777))
//	   {
//	     $extension = substr($file['icon']['type'], 6);
//	     $image_name = time().'.'.$extension;
//		 $newname = $target_path."/".$langdirname."/images/".$image_name;
//		 
//		 $copied = copy($file['icon']['tmp_name'], $newname);
//		 
//         if($copied) 
//         {
//		 
//		   $handle = @fopen("../../langues/".$langdirname."/lang_".$languagedetails->short_name.".php", 'w+');
//           @fwrite($handle, "<?php \n");
//		   fclose($handle);
//		 
//		   $data = array(
//		                'language_id' => $data['language'],
//						'country_id' =>  $data['country'],
//						'language_name' => $languagedetails->name,
//						'language_shortname' => $languagedetails->short_name,
//						'language_icon' => $image_name,
//						'currency' => $data['currency'],
//						'status' => 1
//						);
//						
//	       if($obj_Db->InsertData('job_language', $data))
//		   {
//		     add_new_language_data_filed($languagedetails->short_name, $_POST['translateall'],$langdirname);
//		     return TRUE;   
//		   }else
//		   {
//		     return FALSE;
//		   }
//		   
//         }else
//		 {
//		   return FALSE;
//		 }
//		 
//		 
//	   }else
//	   {
//	      return FALSE;
//	   }
//	   
//     }else
//	 {
//	   return FALSE;
//	 } 
//	 
//  }


  
  function addlanguageprocess($data = '', $file = '')
  { 
     $target_path ="";
	 $langdirname = "";
	 
	 $obj_Db = new db();
	 $sql= "select * from job_language_list WHERE id = ".$data['language']."";
	 $result = $obj_Db->ExecuteQuery($sql);
	 $numrows = mysql_num_rows($result);
	 
	 if($numrows > 0)
	 {
	    $languagedetails = mysql_fetch_object($result);
		$langdirname = $languagedetails->name;
	 }
	 
	 $target_path = "../../langues";
	 $base_name = "";
	 
     if(@mkdir($target_path ."/".$langdirname , 0777))
     {
       if(@mkdir($target_path."/".$langdirname."/images" , 0777))
	   {
	     $extension = substr($file['icon']['type'], 6);
	     $image_name = time().'.'.$extension;
		 $newname = $target_path."/".$langdirname."/images/".$image_name;
		 
		 $copied = copy($file['icon']['tmp_name'], $newname);
		 
         if($copied) 
         {
	    $lang_page_sql = "select name from job_language_page";
	    $lang_page_result = mysql_query($lang_page_sql);
	    while($lang_page_data= mysql_fetch_object($lang_page_result)){
		//$filename = "../../langues/".$languagevar->language_name."/PAGE_".$lang_page_data->name."_".$languagevar->language_shortname.".php";
		$handle = "";
		if($lang_page_data->name=="COMMON"){		    
		    $handle = @fopen("../../langues/".$langdirname."/lang_".$languagedetails->short_name.".php", 'w+');
		}
		else{
		    $handle = @fopen("../../langues/".$langdirname."/PAGE_".$lang_page_data->name."_".$languagedetails->short_name.".php", 'w+');
		}		
		@fwrite($handle, "<?php \n");
		fclose($handle);
	    }
		 
		   $data = array(
		                'language_id' => $data['language'],
						'country_id' =>  $data['country'],
						'language_name' => $languagedetails->name,
						'language_shortname' => $languagedetails->short_name,
						'language_icon' => $image_name,
						'currency' => $data['currency'],
						'status' => 1
						);
						
	       if($obj_Db->InsertData('job_language', $data))
		   {
		     add_new_language_data_filed($languagedetails->short_name, $_POST['translateall'],$langdirname);
		     return TRUE;   
		   }else
		   {
		     return FALSE;
		   }
		   
         }else
		 {
		   return FALSE;
		 }
		 
		 
	   }else
	   {
	      return FALSE;
	   }
	   
     }else
	 {
	   return FALSE;
	 } 
	 
  }
  
  
  
  
  
  
  
  
  function delete_directory($dir)
  {
    if ($handle = opendir($dir))
    {
       $array = array();

       while (false !== ($file = readdir($handle))) {
         if ($file != "." && $file != "..") {

			if(is_dir($dir.$file))
			{
				if(!@rmdir($dir.$file)) // Empty directory? Remove it
				{
                delete_directory($dir.$file.'/'); // Not empty? Delete the files inside it
				}
			}
			else
			{
               @unlink($dir.$file);
			}
        }
     }
      closedir($handle);

	  @rmdir($dir);
    }

  }
  
/*
 ************************************
  Language variable functions START.
 ************************************ 
*/



       function get_language_variable($variable = "")
	   {
	      $obj_Db = new db();
	      if(isset($variable) && $variable != "")
		  {
		     $sql= "select * from language WHERE name LIKE ".$variable."";
		  }else
		  {
		     $sql= "select * from language";
		  }
		  
		  $result = $obj_Db->ExecuteQuery($sql);
		  $numrows = mysql_num_rows($result);
		   $resultdata = array();     
	      if($numrows > 0)
		  {			
	         
	          while($languagevar = mysql_fetch_object($result))
	          {
	             $resultdata[] = $languagevar;
	          }
			  
			
	      }  
		  
		  return $resultdata;
	   }




       function get_created_language_shortname()
	   {
	      $obj_Db = new db();
	      $sql = "select * from job_language";
		  $result = $obj_Db->ExecuteQuery($sql);
		  $numrows = mysql_num_rows($result);
		  $resultdata = array();
		       
	      if($numrows > 0)
		  {			
	          while($languagevar = mysql_fetch_object($result))
	          {
	             $resultdata[] = $languagevar;
	          }
	      }  
		  
		  return $resultdata;
	   }

       
	   
	   
       function add_language_variable($post_data) {
	    
		   $obj_Db = new db();
		   
		   $string = strtoupper(trim($post_data['variable_name']));
   		   $string = preg_replace("/\s+/","_",$string);
		   if(!strpos("+",$string))
		   {
     			$pattern = array("/^[\s+]/","/[\s+]$/","/\s/");
				$replace = array("",""," ");
				$string = preg_replace($pattern,$replace,$string);
		   }
		   
		   
		   $data = array(
		                 'name' => $string,
						 'page_id' => $post_data['add_lang_page_id']
		                );
		   
		   $lang_sql = "select language_shortname from job_language";
		   $lang_result = $obj_Db->ExecuteQuery($lang_sql);
		   $lang_numrows = mysql_num_rows($lang_result);
		   
		   if($lang_numrows > 0){
			  while($languagevar = mysql_fetch_object($lang_result)){
		          $data[$languagevar->language_shortname] = $post_data[$languagevar->language_shortname];
			  }
		   }
		   
		   $obj_Db->ExecuteQuery("SET NAMES utf8");
		   
		   if($obj_Db->InsertData('language', $data)){
		      return TRUE;    
		   }else {
		      return FALSE;
		   }
		  
       }
	   

//     function update_language_variable($post_data)
//	  {   
//	       if(!isset($post_data['variableid']))
//		        return false;
//		    
//	       $obj_Db = new db();
//	       $lang_sql = "select language_shortname , language_name from job_language";
//	       $lang_result = $obj_Db->ExecuteQuery($lang_sql);
//	       $lang_numrows = mysql_num_rows($lang_result);
//	       
//	       $lang_var_sql = "select name from language where id =".$post_data['variableid'];
//	       $lang_var_result = $obj_Db->ExecuteQuery($lang_var_sql);
//	       $lang_var_numrows = mysql_num_rows($lang_var_result);
//	       $variablename = "";
//	       if($lang_var_numrows >0){
//		     $languagevarrow = mysql_fetch_object($lang_var_result);
//		     $variablename = $languagevarrow->name;
//	       }
//		   
//		   if($lang_numrows > 0){
//			  while($languagevar = mysql_fetch_object($lang_result)){ 
//			    $data[$languagevar->language_shortname] = $post_data[$languagevar->language_shortname];
//			    $filename = "../../langues/".$languagevar->language_name."/lang_".$languagevar->language_shortname.".php";
//			    update_language_variable_in_lang_file($filename,$variablename,$post_data[$languagevar->language_shortname]);
//			    
//			  }
//		   }
//		   
//		   $obj_Db->ExecuteQuery("SET NAMES utf8");
//		   
//		   if($obj_Db->UpdateData('language', $data,'id',$post_data['variableid'])){
//		      return TRUE;    
//		   }else {
//		      return FALSE;
//		   }
//
//	  }

 function update_language_variable($post_data)
	  {  
	       if(!isset($post_data['variableid']))
		        return false;
		    
	       $obj_Db = new db();
	       $lang_sql = "select language_shortname , language_name from job_language";
	       $lang_result = $obj_Db->ExecuteQuery($lang_sql);
	       $lang_numrows = mysql_num_rows($lang_result);
	       
	       $lang_var_sql = "select name from language where id =".$post_data['variableid'];
	       $lang_var_result = $obj_Db->ExecuteQuery($lang_var_sql);
	       $lang_var_numrows = mysql_num_rows($lang_var_result);
	       $variablename = "";
	       if($lang_var_numrows >0){
		     $languagevarrow = mysql_fetch_object($lang_var_result);
		     $variablename = $languagevarrow->name;
	       }
		   
		   if($lang_numrows > 0){
			  while($languagevar = mysql_fetch_object($lang_result)){
			    $lang_page_sql = "select name from job_language_page where id=".$post_data['langpageid'];
			    $lang_page_result = mysql_query($lang_page_sql);
			    $lang_page_data= mysql_fetch_object($lang_page_result);
			    $data[$languagevar->language_shortname] = $post_data[$languagevar->language_shortname];
			    $filename = "../../langues/".$languagevar->language_name."/PAGE_".$lang_page_data->name."_".$languagevar->language_shortname.".php";
			    update_language_variable_in_lang_file($filename,$variablename,$post_data[$languagevar->language_shortname]);
			    
			  }
		   }
		   
		   $obj_Db->ExecuteQuery("SET NAMES utf8");
		   $data['page_id'] = $post_data['langpageid'];
		   if($obj_Db->UpdateData('language', $data,'id',$post_data['variableid'])){
		      return TRUE;    
		   }else {
		      return FALSE;
		   }

	  }








//Add variable in language files

  /*
       * Add function
       * Three params finename,variable name , value.
       * @return null.
  */
  
function add_language_variable_in_lang_file($selectedpageid , $variablename="",$valuearray){
       
	 if($selectedpageid)
	 { 
	   $filemidname = "";
	   if($selectedpageid == 1)
	   { 
	     $filemidname = "lang";
	   }else
	   {
	     $obj_Db = new db();
	     $page_sql = "select name from job_language_page where id = ".$selectedpageid." limit 1";
	     $page_result = $obj_Db->ExecuteQuery($page_sql);
		 
		 if(mysql_num_rows($page_result) > 0)
		 {
		    $pageresultrow = mysql_fetch_object($page_result);
			$filemidname = "PAGE_".$pageresultrow->name;
		 }
		 
	   }
	   
	   
	   $obj_Db = new db();
	   $lang_sql = "select language_shortname , language_name from job_language";
	   $lang_result = $obj_Db->ExecuteQuery($lang_sql);
	   
	   while($resultrows = mysql_fetch_object($lang_result))
	   {
	      $filename = "../../langues/".$resultrows->language_name."/".$filemidname."_".$resultrows->language_shortname.".php";
          $fp = fopen($filename, 'a+');
          $string = strtoupper(trim($variablename));
   		  $string = preg_replace("/\s+/","_",$string);
		  if(!strpos("+",$string))
		  {
     			$pattern = array("/^[\s+]/","/[\s+]$/","/\s/");
				$replace = array("",""," ");
				$string = preg_replace($pattern,$replace,$string);
		  }
         $stringData = "define('".$string."','".$valuearray[$resultrows->language_shortname]."');\n";
         fwrite($fp, $stringData);
         fclose($fp);	       
	   } 
	 }
}

  /*
       * Update function
       * Three params finename,variable name , value.
       * @return null.
  */
  
function update_language_variable_in_lang_file($filename,$variablename,$valuename){
       
       $string = strtoupper(trim($variablename));
       $string = preg_replace("/\s+/","_",$string);
       if(!strpos("+",$string))
       {
	    $pattern = array("/^[\s+]/","/[\s+]$/","/\s/");
		    $replace = array("",""," ");
		    $string = preg_replace($pattern,$replace,$string);
       }
       
      
       $replacement = "define('".$string."','".$valuename."');";
       $var_patterns = "define('".$string."','";
       $data =file_get_contents($filename);
       $start = strpos($data,$var_patterns);
       if($start) {
	       $i=(strpos($data,"');",($start+strlen($var_patterns)))+strlen("');"))-$start;
	      $file = fopen($filename, "w") or exit("Unable to open file!");      
	      fwrite($file,substr_replace($data,$replacement,$start,$i));
	      fclose($file);	      
       }else
	   {  
	      $file = fopen($filename, "a+") or exit("Unable to open file!");      
	      fwrite($file,$replacement);
	      fclose($file);	      
	   }

}
      



function delete_language_variable_in_lang_file($filename,$variablename,$valuename){
       
       $string = $variablename;
       
       $replacement = "";
       $var_patterns = "define('".$string."','";
       $data =file_get_contents($filename);
       $start = strpos($data,$var_patterns);
       if($start) {
	       $i=(strpos($data,"');",($start+strlen($var_patterns)))+strlen("');"))-$start;
	      $file = fopen($filename, "w") or exit("Unable to open file!");      
	      fwrite($file,substr_replace($data,$replacement,$start,$i));
	      fclose($file);	      
       }
}





        
/*
 ************************************
  Language variable functions END.
 ************************************ 
*/



/*
 ************************************
  Language page functions START.
 ************************************ 
*/

  function validate_language_page_name($data)
  {
      $obj_Db = new db();
	  $page_sql = "select * from job_language_page where name = '".$data['name']."'";
	  $page_result = $obj_Db->ExecuteQuery($page_sql);
	  $lang_numrows = mysql_num_rows($page_result);
	  
	  if($lang_numrows > 0)
	    return FALSE;
	  else
	    return TRUE;
  }

  
  function add_language_page_name($data)
  {
     $obj_Db = new db();
	 $lang_sql = "select * from job_language";
	 $lang_result = $obj_Db->ExecuteQuery($lang_sql);
	 $lang_numrows = mysql_num_rows($lang_result);
	 
	 if($lang_numrows > 0)
	 {
	    while($rowsobj = mysql_fetch_object($lang_result))
		{
		   $handle = @fopen("../../langues/".$rowsobj->language_name."/PAGE_".$data['name']."_".$rowsobj->language_shortname.".php", 'w+');
           @fwrite($handle, "<?php \n");
		   fclose($handle);
		}
		

		$obj_Db = new db();
		
	    if($obj_Db->InsertData('job_language_page', $data))
		  return TRUE;
		else
		  return FALSE;
	 }
	     
	  
  }
  

/*
 ************************************
  Language page functions END.
 ************************************ 
*/
  
?>