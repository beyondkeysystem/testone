<?php

App::uses('AppModel', 'Model');

class TrackJobAdvert extends Model {

    public $name = 'TrackJobAdvert';
    public $useTable = 'track_job_advert';
    
    
    function getTrackJobAdvert()
    {
        return $this->query("select * from track_job_advert");
    }
    
    function getTrackjobByUser($id)
    {
        $dd=date("Y-m-d");
        return $this->query("select * from track_job_advert where user_id ='".$id."' AND start_date <='".$dd."' and  end_date >='".$dd."'");
    }
}