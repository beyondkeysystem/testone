<?	
		echo randKeyGenerate ();
	
	function randKeyGenerate () 
	{	
		# created by:  Subodh D. Choure
		# created On: 22-3-2010
		$length = 10 ;  # specifies the lenght of code to be generated  
		$minlength = 9 ; # code will produce numbers betweent $minlength TO $maxlength
		$maxlength = 99 ;
		$useupper = true ; # if set to true will include upper case characters
		$usespecial = false ; # if set to true will include special characters
		$usenumbers = true ;  # if set to true will include usenumbers
		 
		$charset = "abcdefghijklmnopqrstuvwxyz";
		if ($useupper) $charset .= "ABCDEFGHIJKLMNOPQRSTUVWXYZ";
		if ($usenumbers) $charset .= "0123456789";
		if ($usespecial) $charset .= "~@#$%^*()_+-={}|]["; // Note: using all special characters this reads: "~!@#$%^&*()_+`-={}|\\]?[\":;'><,./";		
		for ($i=0; $i<$length; $i++) $key .= $charset[(rand(0,(strlen($charset)-1)))];
		return $key;
	}
		
?>