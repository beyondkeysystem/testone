<?php

App::uses('AppModel', 'Model');

class PhotoGallery extends Model {

    public $name = 'PhotoGallery';
    public $useTable = 'photo_gallery';
    
    public $displayField = 'id';
    
    function getPhotoGallery()
    {
        return $this->query("select * from photo_gallery");
    }
    
    function getPhotoGalleryById($id)
    {
        return $this->query("select * from photo_gallery where user_id = '".$id."'");
    }
    
}