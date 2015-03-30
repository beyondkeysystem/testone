<script language="javascript" type="text/javascript">
function redirection(arg)
{
	window.location.href = arg;
}
</script>
<?php
global $objDb ;
$objDb->Connection() ;
$sql = "select * from job_language where status=1";
$result = $objDb->ExecuteQuery($sql);

function getCurrentURL($val = "en")
{ 
				$currentURL = basename($_SERVER["PHP_SELF"]); 
				$i = 0;
				$flag = FALSE; 
				foreach($_GET as $key => $value) { 
					$i++; 
					if($i == 1)
					{
					  $currentURL .= "?"; 
					}else
					{ 
					   $currentURL .= "&amp;";
				    }
						if($key == "lang")
						{ 
						  $flag = TRUE;
						  $currentURL .= $key."=".$val;
						}else
						{
						  $currentURL .= $key."=".$value;
						} 
				}
				if($flag  == TRUE) 
				  return $currentURL;
				else
				  return $currentURL."&lang=".$val; 
}

$half = mysql_num_rows($result)/2;
$i= 1;	
echo "<select style='float:left;'>";
$total = mysql_num_rows($result);	
if(mysql_num_rows($result) > 0)
 { 
   while($langs = mysql_fetch_object($result))
   {
   		if($langs->language_name == 'English'){
			$langs->language_name = 'International (English)';
		}
       if($i <= $half) {
	
        if(isset($_SERVER['QUERY_STRING']) && !empty($_SERVER['QUERY_STRING']) )
		{
			$urldata = getCurrentURL(strtolower($langs->language_shortname));
         ?>
		 <option onclick="redirection('<?=$urldata?>')"><?=$langs->language_name?></option>
		 <?php
	 	}
	 	else
		{
	  		$urldataelse1 = '?lang='.strtolower($langs->language_shortname);
	 ?>
			<option onclick="redirection('<?=$urldataelse1?>')"><?=$langs->language_name?></option>
	 <?php
	 }
	}
	else
	{
	    if(isset($_SERVER['QUERY_STRING']) && !empty($_SERVER['QUERY_STRING']) )
		{
			$urldata = getCurrentURL(strtolower($langs->language_shortname));
?>
		<option onclick="redirection('<?=$urldata?>')"><?=$langs->language_name?></option>
<?php	
	 	}
	 	else
		{
	 		$urldataelse = '?lang='.strtolower($langs->language_shortname);
	 ?>
	   <option onclick="redirection('<?=$urldataelse?>')"><?=$langs->language_name?></option>
	 <?php
	 }
	}      
	$i++;
   }
   
 }
 echo "</select>";
?>
