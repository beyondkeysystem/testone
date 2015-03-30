<?php

App::uses('AppModel', 'Model');

class TransMember extends Model {

    public $name = 'TransMember';
     public $useTable = 'trans_member';

    public function getMember($movie_id) // Try to avoid naming a function as get()
    {
    /** Choose either of 2 lines below **/

        return $this->query("SELECT mv.id, tm.unique_id, tm.user_id, mv.title, mv.video_output_file_size,mv.status,mv.video_status,mv.video_property, mv.description, mv.video_output_file, mv.video_output_file_2, mv.video_output_file_3, mv.video_thumbnail_file, mv.video_length,mv.like_count, mv.rating_caution,
			      mv.member_id,mv.video_status,mv.like_count, tm.first_name,tm.last_name,tm.about_me,tm.profile_image_file,tm.id,tm.paypalId,
				vcr.rate, vcr.image
				FROM trans_member_video as mv
				INNER JOIN
				trans_member as tm
				ON
				mv.member_id=tm.unique_id
				INNER JOIN
				video_caution_rating as vcr
				ON
				mv.rating_caution = vcr.id
				WHERE mv.id='".$movie_id."'"); // if table name is `locations`
    }
    
    public function getMemberByMarker($maker_id)
    {
	return $this->query("select * from trans_member where unique_id='".$maker_id."'");
    }
    
    
    function get_user_info($id)
	{
		return $this->query("select * from trans_member where id='".$id."'");
		
	}
    function getUserInfoById($id)
	{
		return $this->query("select * from trans_member where user_id='".$id."'");
		
	}
    
        public function arraytoobject($array) {
            $obj = new stdClass;
            foreach($array as $k => $v) {
            if(strlen($k)) {
            if(is_array($v)) {
            $obj->{$k} = $this->arraytoobject($v); //RECURSION
            } else {
            $obj->{$k} = $v;
            }
            }
            }
            return $obj;
            }
}