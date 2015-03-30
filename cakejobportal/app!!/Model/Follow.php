<?php

App::uses('AppModel', 'Model');

class Follow extends Model {

    public $name = 'Follow';
    public $useTable = 'follow';
    
    
    function getFollow()
    {
        return $this->query("select * from follow");
    }
    
    function getFollowById($can_id , $emp_id)
    {
        return $this->query("select * from follow where (follower = '".$can_id."' AND following = '".$emp_id."') OR (follower = '".$emp_id."' AND following = '".$can_id."')");
    }
    
    function getFollowByCanId($can_id)
    {
        return $this->query("SELECT DISTINCT b.id, b.company_logo, b.emp_id
FROM follow a LEFT JOIN employer_profile b ON b.emp_id = a.follower OR b.emp_id = a.following WHERE follower = '".$can_id."' or Following = '".$can_id."'");
    }
    
    function getFollowingByCanId($can_id)
    {
        return $this->query("SELECT * FROM follow a LEFT JOIN employer_profile b ON b.emp_id = a.follower WHERE following = '".$can_id."'");
    }
    
}