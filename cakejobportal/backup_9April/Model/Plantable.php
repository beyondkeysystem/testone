<?php
App::uses('AppModel', 'Model');

class Plantable extends Model {

    public $name = 'Plantable';
    public $useTable = 'plantable';
    
    
    function getPlantable()
    {
        return $this->query("select * from plantable");
    }
    
    function getPlanWithcat()
    {
        return $this->query("SELECT * FROM plantable as plan where cat.id = plan.cat_id");
    }
    
    function getPlanWithcatByPrice($amount)
    {
        return $this->query("SELECT * FROM plantable as plan where plan.amount ='".$amount."'");
    }
    
    function getPlanByType($type,$amount)
    {
        
        return $this->query("SELECT * FROM plantable where user ='".$type."'  AND amount ='".$amount."'");
    }
    
    function getPlantableBytype($id)
    {
        return $this->query("select * from plantable where upgrade_category_id = '".$id."'");
    }
}