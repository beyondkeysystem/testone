<?php

App::uses('AppModel', 'Model');

class JobAd extends Model {

    public $name = 'JobAd';
    public $useTable = 'job_ad';
    
    public $primaryKey = 'ad_id';
    public $displayField = 'id';
    
    function getJobs()
    {
        return $this->query("select * from job_ad");
    }
    
    function getSearchResult()
    {
	$dd=date("Y-m-d");
	$sqlSeeker = "select DISTINCT(ad_id), job_ad.position_name, job_ad.job_desc, job_ad.rec_id from job_ad left join track_job_advert on track_job_advert.user_id=job_ad.rec_id where track_job_advert.start_date <= CURDATE() and track_job_advert.end_date >= CURDATE() AND job_ad.job_status=1";
	
	if(isset($_GET['city']) && $_GET['city'] != 'more places')
	{
		$sqlSeeker .= " and town='" . $_GET['city'] . "'";
	}	
	
	if(isset($_POST['seeker_keywords']) && $_POST['seeker_keywords'] != "")
	{
		//for skills
		$skills = str_replace(","," ",$_POST['seeker_keywords']); 
		$arr_skills = explode(" ",$skills);
		if(count($arr_skills) > 1)
		{
			$skills	= "";
			$sqlSeeker .=" and ((";
			foreach($arr_skills as $skill)
			{
				if(trim($skill) != "")
				{
					$sqlSeeker .= " job_desc like '%" . $skill . "%' or ";
				}
			}							
			
			if(strlen($sqlSeeker) > 3)		
			{
				$sqlSeeker = substr($sqlSeeker,0,strlen($sqlSeeker) - 3) . ")";
			}
		} else {
			$sqlSeeker .= " AND (( job_desc LIKE '%" . $_POST['seeker_keywords'] . "%' )";
		}
			
		//for position
		$sqlSeeker .=" or (position_name like '%" . $_POST["seeker_keywords"] ."%' )";
		
		//for city
		$sqlSeeker .=" or (town like '%" . $_POST["seeker_keywords"] ."%' ) )";		
		
		
		/*$pos1= str_replace(","," ",$_POST['seeker_keywords']);
		$arr_pos = explode(" ",$pos1);
		$pos	= "";
		$sqlSeeker .=" or(";
		foreach($arr_pos as $position)
		{
			if(trim($position) != "")
			{
				$sqlSeeker .= " position_name like '%" . $position . "%' or ";
			}
		}							
		
		if(strlen($sqlSeeker) > 3)		
		{
			$sqlSeeker = substr($sqlSeeker,0,strlen($sqlSeeker) - 3) . ")";
		}*/		
	}
	
	
	
	
	
	if((isset($_POST["seeker_jobcity"])) && $_POST["seeker_jobcity"]!="")
	{
		$sqlSeeker .=" and town Like '%".$_POST["seeker_jobcity"]."%'"; 
	}
	
	/*if((isset($_POST["seeker_keywords"])) && $_POST["seeker_keywords"]!="")
	{
		$sqlSeeker .=" and position_name Like '%".$_POST["seeker_keywords"]."%'"; 
	}*/
	if((isset($_POST["seeker_category"])) && $_POST["seeker_category"]!="")
	{
		$sqlSeeker .="  and  level = '".trim($_POST["seeker_category"])."'"; 
	}
	//echo $_POST['salary_range']."<br>";
	
	if(isset($_POST['salary_range']) && $_POST['salary_range']!=''){
	    $rangeArr=explode("-",$_POST['salary_range']);
	    $_POST["seeker_salary_from"]=$rangeArr[0];
	    $_POST["seeker_salary_to"]=$rangeArr[1];
	}
	//echo $_POST["seeker_salary_from"]." - ".$_POST["seeker_salary_to"];
	//exit;
	
	if((isset($_POST["seeker_salary_from"])) && $_POST["seeker_salary_from"]!="")
	{
		$sqlSeeker .="  and ";
		if((isset($_POST["seeker_salary_to"])) && $_POST["seeker_salary_to"]!="")
		{
			$sqlSeeker .=" ( ";
		}
		$sqlSeeker .=" (salary_from <= '".$_POST["seeker_salary_from"]."' or salary_to >= '".$_POST["seeker_salary_from"]."')"; 
	}
	
	
	if((isset($_POST["seeker_salary_to"])) && $_POST["seeker_salary_to"]!="")
	{
		if((isset($_POST["seeker_salary_from"])) && $_POST["seeker_salary_from"]!="")
		{
			$sqlSeeker .="  and (salary_from <= '".$_POST["seeker_salary_to"]."' or salary_to >= '".$_POST["seeker_salary_to"]."'))"; 
		}
		else
		{
			$sqlSeeker .="  and (salary_from <= '".$_POST["seeker_salary_to"]."' and salary_to >= '".$_POST["seeker_salary_to"]."')";
		}
	}
	
	if((isset($_POST["seeker_salary_from"])) && $_POST["seeker_salary_from"]!="")
	{
		$sqlSeeker .="  and ";
		if((isset($_POST["seeker_salary_to"])) && $_POST["seeker_salary_to"]!="")
		{
			$sqlSeeker .=" ( ";
		}
		$sqlSeeker .=" (salary_from <= '".$_POST["seeker_salary_from"]."' and salary_to >= '".$_POST["seeker_salary_from"]."')"; 
	}
	
	
	if((isset($_POST["seeker_salary_to"])) && $_POST["seeker_salary_to"]!="")
	{
		if((isset($_POST["seeker_salary_from"])) && $_POST["seeker_salary_from"]!="")
		{
			$sqlSeeker .=" or (salary_from <= '".$_POST["seeker_salary_to"]."' and salary_to >= '".$_POST["seeker_salary_to"]."'))"; 
		}
		else
		{
			$sqlSeeker .="  and (salary_from <= '".$_POST["seeker_salary_to"]."' and salary_to >= '".$_POST["seeker_salary_to"]."')";
		}
	}
	if((isset($_POST["seeker_type"]) ) && $_POST["seeker_type"]!="")
	{
		//$sqlSeeker .="  and  type Like '%".$_POST["seeker_type"]."%'"; 
	}
	if((isset($_POST["seeker_salary"])) && $_POST["seeker_salary"]!="")
	{
		$sqlSeeker .="  and salary_offered Like '%".$_POST["seeker_salary"]."%'"; 
	}
	if((isset($_POST["seeker_equity"])) && $_POST["seeker_equity"]!="")
	{
		$sqlSeeker .="  and filter_equity_status Like '%".$_POST["seeker_equity"]."%'"; 
	}
	
	if((isset($_GET["country"])) && $_GET["country"]!="")
	{
		$sqlSeeker .="  and   ad_country='".$_GET["country"]."'"; 
	}
	//-------newly added-------------
		if((isset($_POST["company_name"])) && $_POST["company_name"]!="")
		{
			$sqlSeeker .="  and company_name Like '%".$_POST["company_name"]."%'"; 
		}
		if((isset($_POST["vacancy"])) && $_POST["vacancy"]!="")
		{
			$sqlSeeker .="  and vacansy Like '%".$_POST["vacancy"]."%'"; 
		}
	//--end newly 

	//-------newly added for advance search-------------
	if((isset($_POST["advance"])) && $_POST["advance"]=="1")
	{
	    if((isset($_POST["vacancy"])) && $_POST["vacancy"]!="")
	    {
		$sqlSeeker .="  and (vacansy Like '%".$_POST["vacancy"]."%')";
	    }
	    if((isset($_POST["holdfield"])) && isset($_POST["hold"]) && $_POST["holdfield"]!='' && $_POST["hold"]!='')
	    {
		$sqlSeeker .="  and (".$_POST["holdfield"]." NOT LIKE '%".$_POST["hold"]."%')" ;
	    }
	    if((isset($_POST["off_package4"])) && $_POST["off_package4"]!="")
	    {
		$sqlSeeker .="  or off_package4 Like '%".$_POST["off_package4"]."%'" ;
	    }
    
	    if((isset($_POST["preference"])) && $_POST["preference"]!="")
	    {
		$sqlSeeker .="  and  preference = '".trim($_POST["preference"])."'"; 
	    }	
	    if((isset($_POST["department"])))
	    {
		$sqlSeeker .="  and  department LIKE '%".implode("%",$_POST["department"])."%'";	    
	    }
	}	
	$sqlSeeker .=" order by ad_id desc";
        //echo $sqlSeeker;
        //die;
	
        $result = $this->query($sqlSeeker);
        return $result;
    }
    
    
    function getJobsByUserId($id)
    {
        //echo "select * from job_ad where rec_id='".$id."' order by ad_date DESC";
        //die;
        return $this->query("select * from job_ad where rec_id='".$id."' order by ad_date DESC");
    }
   
    //public $hasMany = array('JobAppliedjobs');
    public $hasMany = array('JobAppliedjobs' => array(
			'className' => 'JobAppliedjobs',
			'foreignKey' => 'ad_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		));
}
