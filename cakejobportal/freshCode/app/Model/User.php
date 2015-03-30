<?php

App::uses('AppModel', 'Model');

/**
 * User Model
 *
 */
class User extends AppModel {

    /**
     * Display field
     *
     * @var string
     */
    public $displayField = 'name';
//    public $hasMany = array(
//            'Dme' => array(
//                'className' => 'DmeAssignPatient',
//                'foreignKey' => 'dme_id'
//            ),
//	    'Patient' => array(
//                'className' => 'DmeAssignPatient',
//                'foreignKey' => 'patient_id'
//            ),
//	    'Clinician' => array(
//                'className' => 'DmeAssignPatient',
//                'foreignKey' => 'clinician_id'
//            )
//	    
//	    
//        );


    public $name = 'User';
    public $useTable = 'users';

    /**
     * Validation rules
     *
     * @var array
     */
    public $validate = array(
        'name' => array(
            'notempty' => array(
                'rule' => array('notempty'),
            ),
        ),
        'username' => array(
            'notempty' => array(
                'rule' => array('notempty'),
            ),
        ),
     'sex' => array(
        'rule' => array('notEmpty'),
        'message' => 'Choose male/female is required.'
    ),
        'email' => array(
            'notempty' => array(
                'rule' => array('notempty'),
            ),
            'email' => array(
                'rule' => array('email'),
            ),
            'isUnique' => array(
                'rule' => 'isUnique',
                'message' => 'This username already exists'
            )
        ),
        'password' => array(
            'notempty' => array(
                'rule' => array('notempty'),
            ),
        ),
	'emp_name'=> array(
		'rule' => array('notEmpty'),
	        'message' => 'Clinician is required.'
	),
        'type' => array(
            'notempty' => array(
                'rule' => array('notempty'),
            ),
        ),
    );

////////////////////////////////////////////////////////////////////////////////
   
    public function beforeSave($options = array()) {
        if (isset($this->data[$this->alias]['password'])) {
            $this->data[$this->alias]['password'] = AuthComponent::password($this->data[$this->alias]['password']);
        }
	if (isset($this->data[$this->alias]['emp_password'])) {
            $this->data[$this->alias]['emp_password'] = AuthComponent::password($this->data[$this->alias]['emp_password']);
        }
	if (isset($this->data[$this->alias]['can_password'])) {
            $this->data[$this->alias]['can_password'] = AuthComponent::password($this->data[$this->alias]['can_password']);
        }
        return true;
    }
    
////////////////////////////////////////////////////////////////////////////////
//validate user(Clinician) for edit his detail    
public function ValidClinician($get_id,$email){
          $Valid_data=$this->find('all',array('conditions'=>array('User.id'=>$get_id,'User.email'=>$email)));
          if(!empty($Valid_data)){
             return 1; 
          }else{
              return 0;
          }
        }
        
////////////////////////////////////////////////////////////////////////////////
//validate user(Patient) for edit his detail    
public function ValidPatient($get_id,$email){
          $Valid_data=$this->find('all',array('conditions'=>array('User.id'=>$get_id,'User.email'=>$email)));
          if(!empty($Valid_data)){
             return 1; 
          }else{
              return 0;
          }
        }
////////////////////////////////////////////////////////////////////////////////
//validate user(Dme) for edit his detail         
     public function ValidDme($get_id,$email){
          $Valid_data=$this->find('all',array('conditions'=>array('User.id'=>$get_id,'User.email'=>$email)));
          if(!empty($Valid_data)){
             return 1; 
          }else{
              return 0;
          }
        }  
        
//////////////////////////////////////////////////////////////////////////////// 
    
    public function getUsername($un)
    {
	 return $this->query("select * from users where name ='".$un."'");
    }
    
    public function getUseremail($email)
    {
	 return $this->query("select * from users where email ='".$email."'");
    }
    
    public function getFriendlist($id)
    {
	echo "select * from users where id IN (select * from invite_friends where sender_id = '".$id."' OR receiver id = '".$id."')";
	return $this->query("select * from users where id IN (select * from invite_friends where sender_id = '".$id."' OR receiver id = '".$id."')");
    }
    
    public function getNonFriendlist($id)
    {
	
	return $this->query("select * from users where id NOT IN (select receiver_id from invite_friends where sender_id = '".$id."' OR receiver_id = '".$id."') AND id NOT IN (select receiver_id from invite_friends where sender_id = '".$id."' OR receiver_id = '".$id."')");
    }
    
    public function getUser()
    {
	return $this->query("select * from users");
    }
    
    public function getFriendRequestSent($id)
    {
	return $this->query("select * from users where id IN (select sender_id from invite_friends where sender_id = '".$id."' OR receiver_id = '".$id."'");
    }
    public function getFriendRequestReceived($id)
    {
	return $this->query("select * from users where id IN (select receiver_id from invite_friends where sender_id = '".$id."' OR receiver_id = '".$id."'");
    }

}
