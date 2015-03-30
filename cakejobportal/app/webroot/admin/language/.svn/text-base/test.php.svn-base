<?php
        
	   $string = "DFSDF";
	   $valuename = "sdfsdf";
	   $filename = "../../langues/English/lang_En.php";	
		
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

?>