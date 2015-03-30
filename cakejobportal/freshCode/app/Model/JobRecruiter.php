<?php
App::uses('AppModel', 'Model');

class JobRecruiter extends Model {

    public $name = 'JobRecruiter';
    public $useTable = 'job_recruiter';
    
    
    function getJobRecruiter($rec_id)
    {
        return $this->query("select comp_name from job_recruiter where rec_id='".$rec_id."'");
    }
    
    

}