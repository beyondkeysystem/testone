<?php
App::uses('AppModel', 'Model');
class TransVideoCc extends Model {

    public $name = 'TransVideoCc';
    
    public $useTable = 'trans_video_cc';

    public function getTransVideoCc() // Try to avoid naming a function as get()
    {
    /** Choose either of 2 lines below **/

       
        return $this->query("SELECT * FROM TransVideoCc;"); // if table name is `Location` since your public name is `Location`
    }
}