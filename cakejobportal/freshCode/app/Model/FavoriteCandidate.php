<?php

App::uses('AppModel', 'Model');

class FavoriteCandidate extends Model {

    public $name = 'FavoriteCandidate';
    public $useTable = 'favorite_candidate';
    
    
    function getFavoriteCandidate()
    {
        return $this->query("select * from favorite_candidate");
    }
    
    function getFavoriteCandidateByID($emp_id, $can_id)
    {
        return $this->query("select * from favorite_candidate where employer_id ='".$emp_id."' AND candidate_id ='".$can_id."'");
    }
    
    function getFavoriteCandidateByEmpID($emp_id)
    {

        return $this->query("SELECT DISTINCT b.id , b.seeker_id, b.seeker_photo, b.seeker_name FROM favorite_candidate a LEFT JOIN job_jobseeker
                            b ON b.seeker_id = a.candidate_id OR b.seeker_id = a.employer_id  WHERE employer_id = '".$emp_id."' OR candidate_id = '".$emp_id."'");
    }
}