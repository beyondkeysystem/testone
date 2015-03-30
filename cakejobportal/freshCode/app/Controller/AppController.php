<?php

App::uses('Controller', 'Controller');
App::uses('AuthComponent', 'Controller/Component');

class AppController extends Controller {

    public $components = array('Session', 'Auth' => array('logoutRedirect' => array('controller' => 'home', 'action' => 'index')) ,'Acl','RequestHandler');
    
    var $uses = array('Notification','TrackJobAdvert','User');
    
    public $helpers = array( 'Html');
    
   public function beforeRender() {
    $this->response->disableCache();

  }

    public function beforeFilter() {
        error_reporting(0);
        $this->Auth->allow('comingsoon','signup', 'reset', 'resetpassword','validateUsername','validateUseremail');
        $this->usersession = $this->Auth->user();

        $this->set('usersession',$this->usersession);

         if (isset($this->usersession) && !empty($this->usersession)) {
                    $this->checkAccess();
         }
         
         
       
    }

     function checkAccess()
    {        
                 //remove slashes from paths
                 $cleanHere = strtoupper($this->params['controller'].$this->params['action']); 
                  
                 //Pages allowed without being loged in
                 $loginPath = 'USERSLOGIN'; 
                 $signonPath = strtoupper(ereg_replace('/','',$this->base).'usersssignon');
                 $logoutPath = 'USERSLOGOUT';
                 $noaccessPath = 'PAGESDISPLAY'; //'PAGESACCESSDENIED';
                    
                 //If user is not loged in and requested page is not the login page
                $UserHaveAccess = true;
                 if (($cleanHere <> $noaccessPath) and ($cleanHere <> $loginPath) and ($cleanHere <> $logoutPath)) {
                         $aco = $this->params['controller'].'/'.$this->params['action']; 
                        // echo $this->usersession['role_id'];die;
                        if($this->usersession['role_id'] != 1){
                               // $UserHaveAccess = $this->Acl->check( array('Role'=>array('id'=>$this->usersession['role_id'])),$aco , 'read');
                                   
                               // if (!$UserHaveAccess) {
                                       // $this->redirect('/pages/accessdenied');
                                        //  exit;
                               // }
                        }
                 }
                $auth_data = $this->Auth->user();
                $auth_data = $this->Auth->user();
		$arr['User']['id']=$auth_data['id'];
		$arr['User']['status']="active";		    
		$query = $this->User->save($arr['User']);
                
            $note = $this->Notification->getNoticationsCountByUserId($auth_data['id']);
            $this->set('note_count', $note[0][0]['count_all']);
            $note_data = $this->Notification->getNoticationsByUserId($auth_data['id']);
            $track = $this->TrackJobAdvert->getTrackjobByUser($auth_data['id']);
            //pr($track);
            //die;
      
            if(count($track) == 0)
            {
                //die('tets');
                $note_data['alert'] = "Your plan have been expired please upgrade you plan";
                    //$arr['Notification'] = array('user_id' =>$employer_id, 'notication_id' => $lid , 'status' =>1 , 'type' => 'payment' , 'table_name' => 'payments_table', 'message' => $message, 'url' => $url );
                    //$this->Notification->create();
                    //$query = $this->Notification->save($arr['Notification']);
            }
            $this->set('note_data', $note_data);
            if($auth_data)
                $this->set('auth_data', $auth_data);           
            
    }
        

}