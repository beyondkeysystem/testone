<?php

App::uses('AppModel', 'Model');

class EmployerDetail extends Model {

    public $name = 'EmployerDetail';
    public $useTable = 'employer_details';
    
    
    function getEmployerDetail()
    {
        return $this->query("select * from employer_details");
    }
}