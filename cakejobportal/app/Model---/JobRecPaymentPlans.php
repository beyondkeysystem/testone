<?php

App::uses('AppModel', 'Model');

class JobRecPaymentPlans extends Model {

    public $name = 'JobRecPaymentPlans';
    public $useTable = 'job_rec_payment_plans';
    
    
    function getJobRecPaymentPlans()
    {
        return $this->query("select * from job_rec_payment_plans");
    }
    
    function getPlan($plan_name)
    {
        return $this->query("select * from job_rec_payment_plans where plan_name='".$plan_name."'");
    }

}


