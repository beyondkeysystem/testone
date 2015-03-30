<?php
class Contact extends AppModel {
	
	var $useTable = false; //i dont have a table right now, just testing captcha!
	var $name='Contact';
	var $captcha = ''; //intializing captcha var

	var $validate = array(
			'captcha'=>array(
				'rule' => array('matchCaptcha'),
				'message'=>'Failed validating human check.'
			),
			'email' => array(
				'notempty' => array(
					'rule' => array('notempty'),
					'message'=>'Failed invalid email.'
				),
				'email' => array(
					'rule' => array('email'),
					'message'=>'Failed invalid email.'
				)
			),
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

}