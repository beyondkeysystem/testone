<?php

App::uses('AppModel', 'Model');

class VideoGallery extends Model {

    public $name = 'VideoGallery';
    public $useTable = 'video_gallery';
    
    public $displayField = 'id';
    
    function getVideoGallery()
    {
        return $this->query("select * from video_gallery");
    }
    
    function getVideoGalleryById($id)
    {
        return $this->query("select * from video_gallery where user_id = '".$id."'");
    }
    
}