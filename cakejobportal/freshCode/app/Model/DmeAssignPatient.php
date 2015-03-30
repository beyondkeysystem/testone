<?php

App::uses('AppModel', 'Model');

/**
 * DmeAssignPatient Model
 *
 */
class DmeAssignPatient extends AppModel {

    /**
     * Validation rules
     *
     * @var array
     */
   public $belongsTo = array(
            'User' => array(
                'className' => 'User',
                'foreignKey' => 'id'
            )   
        );
    public $validate = array(
        'dme_id' => array(
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
        'clinician_id' => array(
            'notempty' => array(
                'rule' => array('notempty'),
            ),
            'numeric' => array(
                'rule' => array('numeric'),
            ),
        ),
    );

      public function UserValidate($dme_id,$get_id){
        $dme_data=$this->find('all',array('conditions'=>array('DmeAssignPatient.dme_id'=>$dme_id,'DmeAssignPatient.patient_id'=>$get_id)));
       if(!empty($dme_data)){
           return 1;
       }else{
           return 0;
       }
           
        
    } 
    
     public function ClinicianValidate($clinician_id,$get_id){
        $clinician_data=$this->find('all',array('conditions'=>array('DmeAssignPatient.clinician_id'=>$clinician_id,'DmeAssignPatient.patient_id'=>$get_id)));
       if(!empty($clinician_data)){
           return 1;
       }else{
           return 0;
       }
           
        
    } 
}
