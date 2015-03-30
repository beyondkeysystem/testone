<?php

App::uses('AppModel', 'Model');

class JobRecruiterfollowcv extends Model {

    public $name = 'JobRecruiterfollowcv';
    public $useTable = 'job_recruiterfollowcv';
    
    
    function getJobRecruiterfollowcv()
    {
        return $this->query("select * from job_recruiterfollowcv");
    }
    
    function getJobRecruiterfollowcvById($id)
    {
        return $this->query("select * from job_recruiterfollowcv where id=".$id);
    }
    
    
    function getJobRecruiterfollowcvBy30day($seekerID)
    {
        $date1 = date('Y-m-d', strtotime("-30 days"))."<br>";
	$sql="SELECT * FROM `job_recruiterfollowcv` WHERE seeker_id=".$seekerID." and follow_date >='$date1'";
        return $this->query($sql);
    }
    
    function getJobRecruiterfollowcvBy60day($seekerID)
    {
        $date2 = date('Y-m-d', strtotime("-60 days"))."<br>";
        $sql="SELECT * FROM `job_recruiterfollowcv` WHERE seeker_id=".$seekerID." and follow_date >='$date2'";
        return $this->query($sql);
    }
    
    
    function getJobRecruiterfollowcvBy90day($seekerID)
    {
        $date3 = date('Y-m-d', strtotime("-90 days"))."<br>";
        $sql="SELECT * FROM `job_recruiterfollowcv` WHERE seeker_id=".$seekerID." and follow_date >='$date3'";
        return $this->query($sql);
    }    
}