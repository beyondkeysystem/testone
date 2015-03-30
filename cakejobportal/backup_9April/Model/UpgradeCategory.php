<?php
App::uses('AppModel', 'Model');

class UpgradeCategory extends Model {

    public $name = 'UpgradeCategory';
    public $useTable = 'upgrade_category';
    
    
    function getUpgradeCategory()
    {
        return $this->query("select * from upgrade_category");
    }
    
    //function getUpgradeCategoryByPrice($price)
    //{
    //    return $this->query("select * from upgrade_category where price = '".$price."'");
    //}
}
