<?php

App::uses('AppModel', 'Model');

class JobMsgbox extends Model {

    public $name = 'JobMsgbox';
    public $useTable = 'job_msgbox';
    
    
    function getJobMsgbox()
    {
        return $this->query("select * from job_msgbox");
    }
    
    function getJobMsgboxById($id)
    {
        return $this->query("select * from job_msgbox where id=".$id);
    }
    
    
    
//    $sql="SELECT * FROM `job_msgbox` WHERE 	receiver_id='j-$seekerID' and msg_status=0";
//		$unreadmsg = $objDb->ExecuteQuery($sql);
//	        $totalunreadmsg = mysql_num_rows($unreadmsg);
//		
//		$sql="SELECT * FROM `job_msgbox` WHERE 	receiver_id='j-$seekerID' and msg_status=1";
//		$readmsg = $objDb->ExecuteQuery($sql);
//	        $totalreadmsg = mysql_num_rows($readmsg);
    }