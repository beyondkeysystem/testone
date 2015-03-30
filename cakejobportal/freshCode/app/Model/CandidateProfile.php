<?php

App::uses('AppModel', 'Model');

class CandidateProfile extends Model {

    public $name = 'CandidateProfile';
    public $useTable = 'candidate_profile';
    
    
    function getCandidateProfile()
    {
        return $this->query("select * from candidate_profile");
    }
    
    function getCandidateProfileById($id)
    {
        return $this->query("select * from candidate_profile where can_id=".$id);
    }
    
}