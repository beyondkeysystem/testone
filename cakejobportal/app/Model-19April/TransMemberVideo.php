<?php
App::uses('AppModel', 'Model');
class TransMemberVideo extends Model {

    public $name = 'TransMemberVideo';
    public $useTable = 'trans_member_video';
    

    public function getTransMemberVideo($movie_id) // Try to avoid naming a function as get()
    {
    /** Choose either of 2 lines below **/

       
        return $this->query("select tm.id, tm.unique_id,tmv.member_id from trans_member_video tmv
							inner join
							trans_member tm
							on
							tmv.member_id=tm.unique_id
							where
							tmv.id='".$movie_id."'"); // if table name is `Location` since your public name is `Location`
    }
    
    public function getVideos($maker_id)
    {
        return $this->query('SELECT id,title,video_thumbnail_file,like_count FROM trans_member_video where member_id="'.$maker_id.'"
                            order by like_count DESC limit 0, 6');
    }
    
    public function getMember($memberid)
    {
        return $this->query('SELECT id FROM trans_member_video where member_id="'.$memberid.'"');
    }
    
}