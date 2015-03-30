<?php

App::uses('AppModel', 'Model');

class JobJobseeker extends Model {

    public $name = 'JobJobseeker';
    public $useTable = 'job_jobseeker';
    
    
    function getJobJobseeker()
    {
        return $this->query("select * from job_jobseeker");
    }
    
    function getJobJobseekerById($id)
    {
        return $this->query("select * from job_jobseeker where seeker_id ='".$id."'");
    }
    

    
    }