<?php

App::uses('AppModel', 'Model');

class JobAdTemp extends Model {

    public $name = 'JobAdTemp';
    public $useTable = 'job_ad_temp';
    
    function getJobAdTemp()
    {
        return $this->query("select * from job_ad_temp");
    }
}



