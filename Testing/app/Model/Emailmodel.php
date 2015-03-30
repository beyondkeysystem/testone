<?php
;
class Emailmodel extends AppModel {

    public $name = 'Emailmodel';
    public $useTable = false;
    public $validate = array(
        
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
    
    public function matchcode(){
       // pr($this->data);
    }

}