<?php
function findexts ($filename) 

	{ 
	
		$filename = strtolower($filename) ; 
		
		$exts = split("[/\\.]", $filename) ; 
		
		$n = count($exts)-1; 
		
		$exts = $exts[$n]; 
		
		return $exts; 
	
	}
        
        ?>