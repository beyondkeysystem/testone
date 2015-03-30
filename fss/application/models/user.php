<?php
require_once dirname(__FILE__).'/model.php';
class User extends Model {
     function __construct(){
        parent::__construct();
     }
     
     public function login($username,$password){
         $this->db->select('*');
         $this->db->from('users');
         $this->db->where('username',$username);
         $query = $this->db->get();
         $results = $query->result();
         $result = $results[0];
         if(md5($password) == $result->password){
             $this->session->set_userdata((array)$result);
             return (array)$result;
         }else{
             return 0;
         }
     }
     
     public function userlogin($username,$password){
         
         $this->db->select('*');
         $this->db->from('users');
         $this->db->where('username',$username);
         $query = $this->db->get();
         $results = $query->result();
         if(!empty($results)){
            $result = $results[0];
            if(md5($password) == $result->password){
                $this->session->set_userdata((array)$result);
                return (array)$result;
            }else{
                return 0;
            }
         }else{
                return 0;
         }
         
     }
}