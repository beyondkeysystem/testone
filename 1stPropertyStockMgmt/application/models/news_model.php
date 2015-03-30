<?php

class News_model extends CI_Model {

    public function add($table,$data){
        $this->db->insert($table, $data); 
        return $this->db->insert_id();
    }
    
    
    public function edit($table,$save_data,$id){
        $this->db->where('id', $id);
        $this->db->update($table, $save_data); 
    }
    
    public function delete($table,$field,$value){
         $this->db->where($field, $value);
         $this->db->delete($table);
     }
    
    public function findAll($table,$condition='',$offset){
        $sql="select * from $table";
        if(isset($condition) and $condition !=''){
          $sql .= ' where '.$condition;
        }
        $sql.=" limit ".$offset.",".PAGE_LIMIT;
        $query=$this->db->query($sql);
        return $query->result();
     }

     public function findAll1($table,$condition='',$offset, $end_limit){
        $sql="select * from $table";
        if(isset($condition) and $condition !=''){
          $sql .= ' where '.$condition;
        }
        $sql.=" limit ".$offset.",".$end_limit;
        $query=$this->db->query($sql);
        return $query->result();
     }
     
     public function findCount($table,$condition=''){
         $this->db->select('count(*) as cnt');
         $this->db->from($table);
         if(isset($condition) and $condition !=''){
             $this->db->where($condition);
         }
         $query =  $this->db->get();
         $result = $query->result();
         return $result[0]->cnt;
     }
     
     public function findById($table,$id){
         $sql="select * from $table";
        if(isset($id) and $id !=''){
          $sql .= ' where id = '.$id;
        }
        
        $query=$this->db->query($sql);
        $result =  $query->result();
        return $result[0];
     }
     
     function find($table){
         $sql="select news.*,membership.user_name as username from news inner join membership on news.auther_id = membership.id";
        
        $query=$this->db->query($sql);
        return $query->result();
     }
     
     function findbyjoin($table,$id){
         $sql="select news.*,membership.user_name as username from news inner join membership on news.auther_id = membership.id where news.id =".$id;
        
        $query=$this->db->query($sql);
        $data= $query->result();
        //print_r($data);
        return $data[0];
     }
	
}