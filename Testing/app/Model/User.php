<?php

// app/Model/User.php
App::uses('AuthComponent', 'Controller/Component');
App::uses('AppModel', 'Model');
class User extends AppModel {

    public $name = 'User';
    public $hasOne = array(
		'Customer' => array(
			'className' => 'Customer',
			'foreignKey' => 'user_id'
		)
	);
    public $validate = array(
        'oldpassword' => array(
            'required'=>array(
                'rule'=>'/.+/',
                'message'=>'Please enter old password.'
            ),
            'passlength'=>array(
                'rule'    => array('oldpassword'),
                'message' => 'Old password has been wrong.'
            ),
        ),
        
        
        'email_val' => array(
            'required'=>array(
                'rule'=>'/.+/',
                'message'=>'Please enter code.'
            ),
            'passlength'=>array(
                'rule'    => array('matchcode'),
                'message' => 'Verification code does not match.'
            ),
        ),
        //email_val
        'newpassword' => array(
            'required'=>array(
                'rule'=>'/.+/',
                'message'=>'Please enter new password.'
            ),
            'passlength'=>array(
                'rule'    => array('changepasslength'),
                'message' => 'Password must be minimum 8 characters.'
            ),
        ),
        'repassword' => array(
            'required'=>array(
                'rule'=>'/.+/',
                'message'=>'Please enter confirm password.'
            ),
            'match'=>array(
                'rule'=>array('matchchangepass','newpassword'),
                'message'=>'Password and confirmation password do not match.'
            ),
        ),
        
        'npassword' => array(
            'required'=>array(
                'rule'=>'/.+/',
                'message'=>'Please enter password.'
            ),
            'passlength'=>array(
                'rule'    => array('passlength'),
                'message' => 'Password must be minimum 8 characters.'
            ),
        ),
        
        'code' => array(
            'required' => array(
                'rule' => array('notEmpty'),
                'message' => 'Please enter verify code'
            )
        ),
        'username' => array(
            'required' => array(
                'rule' => array('notEmpty'),
                'message' => 'Email is required'
            ),
            'email'=>array(
                        'rule' => array('email'),
                        'message'=>'Please enter valid email address.'
			),
            'isUnique'=>array(
                        'rule' => array('isUnique'),
                        'message'=>'This email address has already been taken.'
			),
        ),
        'cpassword'=>array(
            'required'=>array(
                'rule'=>'/.+/',
                'message'=>'Please re-enter Password.'
            ),
            'match'=>array(
                'rule'=>array('matchpass','UserNpassword'),
                'message'=>'Password and confirmation password do not match.'
            ),
        ),
        'password' => array(
            'required' => array(
                'rule' => array('notEmpty'),
                'message' => 'Password is required'
            )
        ),
        'captcha'=>array(
            'required'=>array(
                'rule'=>'/.+/',
                'message'=>'Please enter security code displayed above.'
            ),
            'captcharule'=>array(
                        'rule' => array('matchCaptcha'),
                        'message'=>'Please enter correct security code.'
			),
            
        ),
        'phone'=>array(
            'required'=>array(
                'rule'=>'/.+/',
                'message'=>'Please enter mobile no.'
            ),
            'check'=>array(
                'rule'=>'/(\+)[0-9]{1,4}[0-9]{6,15}/',
                'message'=>'Phone number should be +914578521452 format'
            ),
            'isUnique'=>array(
                        'rule' => array('isUnique'),
                        'message'=>'This phone No has already been taken.'
			),
            
        ),
        'resetpass'=>array(
            'required'=>array(
                'rule'=>'/.+/',
                'message'=>'Please enter mobile no.'
            ),
            'getrecord'=>array(
                        'rule' => array('getrecord'),
                        'message'=>'This record does not exist.'
			),
            
        ),
        'secondstepcode'=>array(
            'required'=>array(
                'rule'=>'/.+/',
                'message'=>'Please enter code.'
            ),
            'getrecord'=>array(
                        'rule' => array('stepcode'),
                        'message'=>'Please enter valid code.'
			),
            
        ),
        'csrepassword'=>array(
            'required'=>array(
                'rule'=>'/.+/',
                'message'=>'Please re-enter Password.'
            ),
            'match'=>array(
                'rule'=>array('csmatchpass','cspassword'),
                'message'=>'Password and confirmation password do not match.'
            ),
        ),
        'cspassword' => array(
            'required' => array(
                'rule' => '/.+/',
                'message' => 'Please enter password'
            )
        ),
        /*'role' => array(
            'valid' => array(
                'rule' => array('inList', array('admin', 'customer')),
                'message' => 'Please enter a valid role',
                'allowEmpty' => false
            )
        )*/
    );
    
    var $captcha = ''; //intializing captcha var

	
	function matchCaptcha($inputValue)	{
		return $inputValue['captcha']==$this->getCaptcha(); //return true or false after comparing submitted value with set value of captcha
	}

	function setCaptcha($value)	{
		$this->captcha = $value; //setting captcha value
	}

	function getCaptcha()	{
		return $this->captcha; //getting captcha value
	}

    public function beforeSave($options=array()) {
        if (isset($this->data[$this->alias]['password'])) {
            $this->data[$this->alias]['password'] = AuthComponent::password($this->data[$this->alias]['password']);
        }
        return true;
    }
    
    
    public function passlength($data){
        //pr($this->request->data);
        //echo strlen($data['password']);
        $strlen = strlen($data['npassword']); 
       // echo $strlen;exit;
        if(isset($strlen) and $strlen >=8){
            return true;
        }
        return false;
    }
    
    public function matchpass(){
        if($this->data['User']['npassword'] == $this->data['User']['cpassword']){
            return true;
        }
        return false;
    }
    
    public function csmatchpass(){
        if($this->data['User']['cspassword'] == $this->data['User']['csrepassword']){
            return true;
        }
        return false;
    }
    
    public function changepasslength($data){
        //pr($this->request->data);
        //echo strlen($data['password']);
        $strlen = strlen($data['newpassword']); 
       // echo $strlen;exit;
        if(isset($strlen) and $strlen >=8){
            return true;
        }
        return false;
    }
    public function matchchangepass(){
        if($this->data['User']['newpassword'] == $this->data['User']['repassword']){
            return true;
        }
        return false;
    }
    
    public function getrecord(){
        //pr($this->data);exit;
        $userdata = $this->find('first',array('conditions'=>array('role != "admin" and (harimau = "'.addslashes(trim($this->data['User']['resetpass'])).'" or phone = "'.addslashes(trim($this->data['User']['resetpass'])).'" or username = "'.addslashes(trim($this->data['User']['resetpass'])).'")')));
        if(!empty($userdata)){
            return true;
        }else{
            return false;
        }
    }
    
    public function oldpassword(){
        $user_id = $this->data['User']['id'];
        $userdata = $this->find('first',array('conditions'=>array('User.id'=>$user_id,'password'=>$this->data['User']['oldpassword'])));
        //pr($userdata);exit;
        if(!empty($userdata)){
            return true;
        }
        return false;
    }
    
    public function stepcode(){
        if($this->data['User']['secondstepcode'] ==$this->data['User']['second_login']){
            return true;
        }
        return false;
        //pr($this->data);
    }

}