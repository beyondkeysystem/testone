<?php

App::uses('AppModel', 'Model');

class JobShortlistedJobseeker extends Model {

    public $name = 'JobShortlistedJobseeker';
    public $useTable = 'job_shortlisted_jobseekers';
    
    
    function getJobShortlistedJobseekers()
    {
        return $this->query("select * from job_shortlisted_jobseekers");
    }
    
    function getJobShortlistedJobseekersById($id)
    {
        return $this->query("select * from job_shortlisted_jobseekers where seeker_id = '".$id."'");
    }
    
    function getJobByIdFeedback($id , $feedback)
    {
        return $this->query("select * from job_shortlisted_jobseekers where seeker_id = '".$id."' AND feedback = '".$feedback."'");
    }
    
    }