<?php
App::uses('AppModel', 'Model');

class Notification extends Model {

    public $name = 'Notification';
    public $useTable = 'notifications';
    
    
    function getNotification()
    {
        return $this->query("select * from notifications");
    }
    
    function getNoticationsByUserId($id)
    {
        return $this->query("select * from notifications where status = 1 AND user_id='".$id."' order by noti_time DESC");
    }
    
    function getNoticationsCountByUserId($id)
    {
        return $this->query("select count(id) as count_all from notifications where status = 1 AND user_id='".$id."'");
    }
    
}