<?php

App::uses('AppModel', 'Model');

class JobAppliedjobs extends Model {

    public $name = 'JobAppliedjobs';
    public $useTable = 'job_appliedjobs';
    
    public $displayField = 'ad_id';
    function getJobAppliedjobs()
    {
        return $this->query("select * from job_appliedjobs");
    }
    
    function getJobAppliedjobsById($id)
    {
        return $this->query("select distinct a.ad_id,a.applied_id,a.applied_date,j.vacansy,j.adTo,s.status from job_appliedjobs a join job_ad j on j.ad_id=a.ad_id left join job_shortlisted_jobseekers s on a.applied_id=s.applied_id  where a.seeker_id='".$id."' and j.vacansy!='Bursary application Position' order by applied_id desc");
    }
}