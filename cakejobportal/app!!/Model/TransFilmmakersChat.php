<?php
App::uses('AppModel', 'Model');
class TransFilmmakersChat extends Model {

    public $name = 'TransFilmmakersChat';
    public $useTable = 'trans_filmmakers_chat';

    public function getTransFilmmakersChat() // Try to avoid naming a function as get()
    {
    /** Choose either of 2 lines below **/

       
        return $this->query("SELECT * FROM TransFilmmakersChat;"); // if table name is `Location` since your public name is `Location`
    }
    
    public function getChattingUserlist($video_id,$m_id)
    {
        return $this->query("select distinct(from_id) from trans_filmmakers_chat where to_id='".$m_id."' and from_id<>'".$m_id."' order by id desc");
    }
    
    public function getChatData($to_id,$from_id)
    {
        return $this->query("select * from trans_filmmakers_chat where to_id in(".$to_id.",".$from_id.") and from_id in(".$to_id.",".$from_id.") order by id desc limit 0,20");
    }
    
    public function getCurrentChat($to_id,$from_id,$video_id)
    {
	error_reporting(0);
        return $this->query("select * from trans_filmmakers_chat where to_id in(".$to_id.",".$from_id.") and from_id in(".$to_id.",".$from_id.") and message<>'".$b."' order by id desc limit 0,10");   
    }
    
    
}
