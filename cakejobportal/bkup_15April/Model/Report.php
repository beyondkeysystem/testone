<?php

App::uses('AppModel', 'Model');

/**
 * DmeAssignPatient Model
 *
 */
class Report extends AppModel {

	/**
	* Virtual Fields
	*
	* @var array
	**/
	//public $virtualFields = array('complaince' => 'complaince');

    /**
     * Validation rules
     *
     * @var array
     */
    public $validate = array(
        'id' => array(
            'numeric' => array(
                'rule' => array('numeric'),
            ),
        ),
        'patient_id' => array(
            'notempty' => array(
                'rule' => array('notempty'),
            ),
            'numeric' => array(
                'rule' => array('numeric'),
            ),
        ),
        'icode' => array(
            'notempty' => array(
                'rule' => array('notempty'),
            ),
        ),
    );
    
    public $hasMany = array(
           
	    'Patient' => array(
                'className' => 'DmeAssignPatient',
                'foreignKey' => 'patient_id'
            )
	   
	    
	    
        );
    
    
    ////////////////////////////////////////////////////////////////////////////////
//function for checking login DME and its patient's report 
    public function ValidReport($report_id, $loggin_id) {
        $query_data = $this->query('SELECT `dme_assign_patients`.`patient_id` , `dme_assign_patients`.`dme_id`
          FROM `dme_assign_patients`
          LEFT JOIN `reports` ON `reports`.`patient_id` = `dme_assign_patients`.`patient_id`
          WHERE `reports`.`id` =' . $report_id);
        if (!empty($query_data)) {
            $login_dmeID = $query_data[0]['dme_assign_patients']['dme_id'];
            if ($login_dmeID == $loggin_id) {
                return 1;
            } else {
                return 0;
            }
        } else {
            return 0;
        }
    }

//////////////////////////////////////////////////////////////////////////////// 
    
//function for checking login Clinician and its patient's report 
    public function ValidReportC($report_id, $loggin_id) {
        $query_data = $this->query('SELECT `dme_assign_patients`.`patient_id` , `dme_assign_patients`.`clinician_id`
          FROM `dme_assign_patients`
          LEFT JOIN `reports` ON `reports`.`patient_id` = `dme_assign_patients`.`patient_id`
          WHERE `reports`.`id` ='.$report_id);
        if (!empty($query_data)) {
            $login_clinicianID = $query_data[0]['dme_assign_patients']['clinician_id'];
             if ($login_clinicianID == $loggin_id) {
                return 1;
            } else {
                return 0;
            }
        } else {
            return 0;
        }
    }

////////////////////////////////////////////////////////////////////////////////     

}
