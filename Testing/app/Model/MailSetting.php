<?php
class MailSetting extends AppModel{
    public $name = 'MailSetting';

    public $validate = array(
            'company_name' => array(
                'require' => array(
                    'rule' => array('notEmpty'),
                    'message' => 'Company name must be required!'
                )
            ),

            'email' => array(
                'require' => array(
                    'rule' => array('notEmpty'),
                    'message' => 'System Mails From must be required!'
                )
            )
    );

}