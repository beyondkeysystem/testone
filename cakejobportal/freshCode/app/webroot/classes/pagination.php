<?php

/**
 * Class build by Gabi Solomon ( solomongaby@yahoo.com )
 * 4 april 2008
 */

class gsdPagination{
	var $query; // query
	var $mysqlOBJ; // holds the mysql Object 	
	var $rQuery; // holds the mysql Object 	
	
	var $cPage; // curent Page
	var $maxpage; // maximum records per page
	var $totalRows; // total records in the query
	var $totalPages; // total pages in the query
	
	var $baseURL; // base url for links		
	var $bLinks='5'; // number of pages from the curent pages for wich to show a link backwords
	var $fLinks='5'; //  number of pages from the curent pages for wich to show a link forward
	var $firstLink=true; //  show a link for first page or not
	var $lastLink=true; //  show a link for last page or not	
	
	var $error=false; // holds the error message
	
	function gsdPagination($query,$cPage,$maxpage,$baseURL){		
		$this->query = $query;		
		$this->cPage 	= ( isset($cPage) && is_numeric($cPage) ) 		? $cPage 	: '1';
		$this->maxpage 	= ( isset($maxpage) && is_numeric($maxpage) ) 	? $maxpage 	: '10';
				
		$this->baseURL=$baseURL;
		//$this->mysqlOBJ=$GLOBALS['mysql'];
		
		$this->buildQuery();
	}
	
	function buildQuery(){
		// check if query is set
		if ( empty($this->query) ) {
			$this->error=' NO QUERY SET ';
			$this->rQuery=false;
		}
		
		// check the mysql object
		if ( !is_a($this->mysqlOBJ, 'mysql') ) {
			$this->error=' NO MYSQL OBJECT SET ';
			$this->rQuery=false;
		}
		
 		// check the numbers of pages
		$objDb = new db();
		//echo $this->query ;
		//echo "<br>";
		
		$this->result = $objDb->ExecuteQuery($this->query);
		$this->totalRows = mysql_num_rows($this->result);
		
		if ( $this->result!==false ) {
			//$this->totalRows=$this->mysqlOBJ->num_rows;		
			$this->totalPages = ceil( $this->totalRows / $this->maxpage );
		} else {
			$this->error=' ERROR EXECUTING QUERY ';     
			$this->rQuery= false;
		}
		
		//echo "<br>";
		//echo $this->totalPages ;
		
		if ($this->totalRows<=$this->maxpage) {
			$this->rQuery= $this->query;
		} else {
			$this->cPage = ( $this->cPage <= $this->totalPages ) ? $this->cPage	: '1';
			$limit = " LIMIT ".(($this->cPage-1)*$this->maxpage).",".$this->maxpage;
			$this->rQuery= $this->query.$limit;
		}				
	}
	
	function buildNavigation($navClass='',$cClass='') {	
		$return_html='';	
			
		if ( $this->rQuery === false ) return false;
		//'. $this->baseURL .'?cPage=1"
        if ( $this->cPage>$this->bLinks && $this->firstLink===true ) {
        	$return_html.= '<a class="'. $navClass .'" href="#"  onclick ="paging(1);"> << </a>';
        }
		for($i=$this->bLinks;$i>=1;$i--){
			$back=$this->cPage-$i;
			if ($back>0){
			//'. $this->baseURL .'?cPage='. $back .'
				$return_html.= '<a class="'. $navClass .'" href="#"  onclick ="paging('.$back.');"> '.$back.'</a>';
			}
		}
		
		$return_html.= '
		      <span class="'. $cClass .'" style="padding-right:10px;padding-left:10px;">
		         Page '. $this->cPage .' of '. $this->totalPages .'
		      </span>';
		
		for($i=1;$i<=$this->bLinks;$i++){
			$forward=$this->cPage+$i;
			if ($forward<=$this->totalPages){
				$return_html.= '<a class="'. $navClass .'" href="#" onclick ="paging('.$forward.');" > '.$forward.'</a>';
			} else break;
		}
        if ( $forward<($this->totalPages-1) && $this->lastLink===true ) {
        	$return_html.= '<a class="'. $navClass .'" href="#" onclick ="paging('.$this->totalPages.');"> >> </a>';
        }	
        
        return $return_html;    	
	}	
}


?>