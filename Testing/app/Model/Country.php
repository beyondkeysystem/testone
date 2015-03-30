<?php
class Country extends AppModel{
    public $name = 'Country';
    
    public $virtualFields = array(
    'name_code' => 'CONCAT(name, " (+",calling_code,")")'
    );


}
?>