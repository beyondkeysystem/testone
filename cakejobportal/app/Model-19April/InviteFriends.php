<?php

App::uses('AppModel', 'Model');

class InviteFriends extends Model {

    public $name = 'InviteFriends';
    public $useTable = 'invite_friends';
    
    
    function getInviteFriends()
    {
        return $this->query("select * from invite_friends");
    }
    
    function getFriendslist($id)
    {
        return $this->query("select * from invite_friends IN ");
    }
    
    function getNonFriends($id)
    {
        return $this->query("select * from invite_friends");
    }
    
}
    