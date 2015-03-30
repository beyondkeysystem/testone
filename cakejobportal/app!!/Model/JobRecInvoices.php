<?php

App::uses('AppModel', 'Model');

class JobRecInvoices extends Model {

    public $name = 'JobRecInvoices';
    public $useTable = 'job_rec_invoices';
    
    
    function getJobRecInvoices()
    {
        return $this->query("select * from job_rec_invoices");
    }
    
    function getPlanName($rec_id)
    {
        return $this->query("select * from job_rec_invoices i where i.invoice_type=1 and i.invoice_status=1 and i.rec_id=" . $rec_id . " and ( select count(*) from job_rec_payments where invoice_id=i.invoice_id ) > 0 order by i.invoice_id desc");
    }

	function getFieldValue($table, $fieldName, $searchField, $searchValue)
	{
		
		/*global $objDb ;
		$returnValue = "";*/
		$sql = "select " . $fieldName . " from " . $table . " where " . $searchField . "='" . $searchValue . "'";
	
		$result = $this->query($sql);
		
			$returnValue = $result[0]['job_rec_invoices']['rate'];
		 
		return $returnValue;
	}


}


