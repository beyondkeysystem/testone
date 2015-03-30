<?php
App::uses('AppModel', 'Model');

class PaymentsTable extends Model {

    public $name = 'PaymentsTable';
    public $useTable = 'payments_table';
    
    
    function getPaymentsTable()
    {
        return $this->query("select * from payments_table");
    }
    
    function getPaymentsTableByuser($id)
    {
        return $this->query("select * from payments_table where employer_id = '".$id."'");
    }
    
    function getTrackPaymentsByUser($id)
    {
        $dd=date("Y-m-d");
        return $this->query("select * from payments_table where employer_id ='".$id."' order by pay_id desc limit 0,1");
    }
}