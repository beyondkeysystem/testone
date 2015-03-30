<?php
class Fcode extends AppModel{

	public $belongsTo = array(
		'User' =>array(
		    'className'=>'User'
		)		
	);
	
	public $hasMany = array(
		'FcodeProduct' =>array(
		    'className'=>'FcodeProduct'
		)		
	);
        
        
        function matchCaptcha($inputValue)	{
		return $inputValue['captcha']==$this->getCaptcha(); //return true or false after comparing submitted value with set value of captcha
	}

	function setCaptcha($value)	{
		$this->captcha = $value; //setting captcha value
	}

	function getCaptcha()	{
		return $this->captcha; //getting captcha value
	}
        
        public $validate = array(
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
           'promotionalcode'=>array(
                'required'=>array(
                        'rule'=>'/.+/',
                        'message'=>'Please enter Fcode.'
                ),
                /*'checkcode'=>array(
                    'rule' => array('checkcode'),
                    'message'=>'Fcode is not valid.'
                ), */
           ),
    );
        
   function checkcode(){
       //pr($this->data);
       if(!empty($this->data)){
           $result = $this->find('first',array('conditions'=>array('code'=>$this->data['Fcode']['promotionalcode'],'user_id'=>$this->data['Fcode']['user_id'])));
           if(!empty($result)){
               return true;
           }
           return false;
       }
       return false;
   }

}