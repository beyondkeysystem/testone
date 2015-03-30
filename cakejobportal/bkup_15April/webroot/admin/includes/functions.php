<?php

	require_once("../classes/db_class.php");


//Start Get list of country for user admin 

  function get_admin_user_country() {

	 $obj_Db = new db();
	 
	 $sql= "select * from job_main_country";
	 $result = $obj_Db->ExecuteQuery($sql);
 	 $numrows = mysql_num_rows($result);
	 
	 if($numrows > 0) {			
	 
	  $countrylist = "<option value = '0'>Country</option>";
	  
	  while($countryobj = mysql_fetch_object($result)) {
	  
	    $countrylist .= "<option value = '".$countryobj->country_id."'>".$countryobj->country_name."</option>";
	  
	  }
		
	 }
	 
	 return $countrylist;
	
  }	

//End Get list of country for user admin 

?>