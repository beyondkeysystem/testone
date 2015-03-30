<?php

App::uses('AppModel', 'Model');

class JobBookmarkJobseeker extends Model {

    public $name = 'JobBookmarkJobseeker';
    public $useTable = 'job_bookmark_jobseeker';
    
    
    function getJobBookmarkJobseeker($ad_id,$ses_seeker_id)
    {
        return $this->query("select * from  job_bookmark_jobseeker where ad_id='".$ad_id."' and seeker_id='".$ses_seeker_id."'");
    }

}