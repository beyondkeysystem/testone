<?php
require_once dirname(__FILE__).'/model.php';
class Common extends Model {
     function __construct(){
        parent::__construct();
     }
     
     public function add($table,$save_data){
         $this->db->insert($table, $save_data);
         return $this->db->insert_id();
     }
     
     public function save($data){
         $table = key($data);
         $save_data = $data[$table];
         $this->db->insert($table, $save_data);
         return $this->db->insert_id();
     }
     
     public function update($data,$id){
         $table = key($data);
         $save_data = $data[$table];
         $this->db->where('id', $id);
         $this->db->update($table, $save_data); 
     }
     
     public function delete($table,$field,$value){
         $this->db->where($field, $value);
         $this->db->delete($table);
     }
     
     public function updatebyattr($table,$field,$val,$data){
         $this->db->where($field, $val);
         $this->db->update($table, $data);
     }
     
     public function findByAttr($table,$field,$value){
         $this->db->select('*');
         $this->db->from($table);
         $this->db->where($field, $value);
         $query =  $this->db->get();
         $results = $query->result();
         if(!empty($results)){
             return $results[0];
         }
         
     }
     
     public function findByAttrAll($table,$field,$value){
         $this->db->select('*');
         $this->db->from($table);
         $this->db->where($field, $value);
         $query =  $this->db->get();
         $results = $query->result();
         if(!empty($results)){
             return $results;
         }
         
     }
     
     public function findAll($table,$condition=''){
            $sql="select * from $table";
            if(isset($condition) and $condition !=''){
              $sql .= ' where '.$condition;
            }
            //$sql.=" limit ".$offset.",".PAGE_LIMIT;
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
     
     public function findByJoin($table,$condition='',$join='',$select='',$offset){
         $sql="select $select from $table";
            if(isset($join) and $join !=''){
                $sql .= $join;
            }
            if(isset($condition) and $condition !=''){
              $sql .= ' where '.$condition;
            }
            $sql.=" limit ".$offset.",".PAGE_LIMIT;
            $query=$this->db->query($sql);
            return $query->result();
     }
     
     public function findJoinCount($table,$condition='',$join=''){
         $sql="select count(*) as cnt from $table";
            if(isset($join) and $join !=''){
                $sql .= $join;
            }
            if(isset($condition) and $condition !=''){
              $sql .= ' where '.$condition;
            }
            $query=$this->db->query($sql);
            $result = $query->result();
            return $result[0]->cnt;
     }
     
     public function findList($table,$condition='',$params=array()){            
         $this->db->select('*');
         $this->db->from($table);
         if(isset($condition) and $condition !=''){
             $this->db->where($condition);
         }
         if(!empty($params) and isset($params['orderby'])){
             $this->db->order_by($params['orderby']); 
         }
         $query =  $this->db->get();
         return $query->result();
     }
     
     
     
     public function page_config($count,$url){
        $config['base_url'] = $url;
        $config['total_rows'] = $count;
        $config['per_page'] = PAGE_LIMIT; 
        $config['uri_segment']=4;
        $config['full_tag_open'] = '<ul>';
        $config['full_tag_close'] = '</ul>';
        $config['num_tag_open'] = '<li>';
        $config['num_tag_close'] = '</li>';
        $config['cur_tag_open'] = '<li class="active"><a>';
        $config['cur_tag_close'] = '</a></li>';
        return $config;
   }
   
   public function findmaxno($table){
       $this->db->select('max(slot_no) as slot_no');
       $this->db->from($table);
       $query =  $this->db->get();
       $result = $query->result();
       if(isset($result[0]->slot_no) and $result[0]->slot_no !=''){
           $slot_no = $result[0]->slot_no+1;
       }else{
           $slot_no = '1';
       }
       //pr($query->result());exit;
       return $slot_no;
   }
   
   public function get_slot_ads_data(){
         $data = array();
         
         $results = $this->findList('slots');
         if(!empty($results)){
             //$data['article_categories'] = $query->result();
             $i=0;
             
             foreach($results as $result){
                //$condition = 'slot_id = "'.$result->id.'" and status =0 and start_date <= "'.date('Y-m-d').'" and end_date >= "'.date('Y-m-d').'"';
                $condition = 'slot_id = "'.$result->id.'" and status =1';
                $data[$i]['slots'] = $result;
                //$this->db->select('*,(select * from advertise where start_date <= "'.date('Y-m-d').'" and end_date >= "'.date('Y-m-d').'") as sfsf limit 1');
                $this->db->select('*');
                $this->db->from('advertise'); 
                $this->db->where($condition); 
                $this->db->order_by('add_slot_no','asc');
                $query =  $this->db->get();
                $results = $query->result();
                $j=0;
                foreach($results as $result){
                    $data[$i]['advertise'][$j] = $result;
                    $j++;
                }
                $i++;
             }
         }
        foreach($data as $val){
            if(!empty($val['advertise'])){
            foreach($val['advertise'] as $v){
                if(isset($v->start_date) and $v->start_date != '' and isset($v->end_date) and $v->end_date !=''){
                  if(isset($v->start_date) and $v->start_date <= date('Y-m-d') and isset($v->end_date) and $v->end_date >= date('Y-m-d')){
                      
                  }else{
                     $condition = 'slot_id = "'.$v->slot_id.'" and add_slot_no = "'.$v->add_slot_no.'" and status =1 and start_date <= "'.date('Y-m-d').'" and end_date >= "'.date('Y-m-d').'"';
                     $this->db->select('*');
                     $this->db->from('advertise_schedule');
                     $this->db->where($condition); 
                     $this->db->order_by('start_date','asc');
                     $this->db->limit(1);
                     $query =  $this->db->get();
                     $results = $query->result();
                     if(!empty($results)){
                         $this->updatebyattr('advertise','id',$v->id,array('status'=>'0'));
                         $this->updatebyattr('advertise_schedule','id',$results[0]->id,array('status'=>'0'));
                         $save_data = array(
                            'slot_id'=>$results[0]->slot_id,
                            'start_date'=>$results[0]->start_date,
                            'end_date'=>$results[0]->end_date,
                            'cust_name'=>$results[0]->cust_name,
                            'created'=>$results[0]->created,
                            'target_url'=>$results[0]->target_url,
                            'advrtise_file'=>$results[0]->advrtise_file,
                            'add_slot_no'=>$results[0]->add_slot_no,
                            'status'=>'1'
                         );
                         $this->add('advertise',$save_data);
                     }else{
                         $this->updatebyattr('advertise','id',$v->id,array('status'=>'0'));
                         $save_data = array(
                            'slot_id'=>$v->slot_id,
                            'add_slot_no'=>$v->add_slot_no,
                            'status'=>'1'
                         );
                         $this->add('advertise',$save_data);
                     }
                  }
                }else{
                    $condition = 'slot_id = "'.$v->slot_id.'" and add_slot_no = "'.$v->add_slot_no.'" and status =1 and start_date <= "'.date('Y-m-d').'" and end_date >= "'.date('Y-m-d').'"';
                     $this->db->select('*');
                     $this->db->from('advertise_schedule');
                     $this->db->where($condition); 
                     $this->db->order_by('start_date','asc');
                     $this->db->limit(1);
                     $query =  $this->db->get();
                     $results = $query->result();
                     if(!empty($results)){
                         $this->updatebyattr('advertise','id',$v->id,array('status'=>'0'));
                         $this->updatebyattr('advertise_schedule','id',$results[0]->id,array('status'=>'0'));
                         $save_data = array(
                            'slot_id'=>$results[0]->slot_id,
                            'start_date'=>$results[0]->start_date,
                            'end_date'=>$results[0]->end_date,
                            'cust_name'=>$results[0]->cust_name,
                            'created'=>$results[0]->created,
                            'target_url'=>$results[0]->target_url,
                            'advrtise_file'=>$results[0]->advrtise_file,
                            'add_slot_no'=>$results[0]->add_slot_no,
                            'status'=>'1'
                         );
                         $this->add('advertise',$save_data);
                     }
                }
            }
            }
        }
        return $data;
   }
   
     
   public function get_slot_ads_data_back(){
         $data = array();
         
         $results = $this->findList('slots');
         if(!empty($results)){
             //$data['article_categories'] = $query->result();
             $i=0;
             $condition = 'end_date >= "'.date('Y-m-d').'" and start_date <="'.date('Y-m-d').'"';
             foreach($results as $result){
                $data[$i]['slots'] = $result;
                $this->db->select('*');
                $this->db->from('advertise');
                $this->db->where('slot_id',$result->id);
                $this->db->where($condition); 
                $this->db->order_by('id','asc');
                $this->db->limit('4');
                $query =  $this->db->get();
                $results = $query->result();
                $j=0;
                foreach($results as $result){
                    $data[$i]['advertise'][$j] = $result;
                    $j++;
                }
                $i++;
             }
         }
         return $data;
         pr($data);
         exit;
   }
   
   public function check_slot_ads($slot_id,$start_date,$end_date){
        $condition = 'slot_id = "'.$slot_id.'" and ((start_date between "'.$start_date.'" and "'.$end_date.'") or( end_date between "'.$start_date.'" and "'.$end_date.'"))';
        $this->db->select('count(*) as cnt');
        $this->db->from('advertise');
        $this->db->where($condition); 
        $this->db->order_by('id','asc');
        $query =  $this->db->get();
        $results = $query->result();
        if(!empty($results))
            return $results[0]->cnt;
        pr($results);
   }
   
    public function get_slot_ads_schedule_data ($slot_id){
         $data = array();
                $condition = 'end_date >= "'.date('Y-m-d').'" and start_date <="'.date('Y-m-d').'"';
                //$data[$i]['slots'] = $result;
                $this->db->select('*');
                $this->db->from('advertise');
                $this->db->where('slot_id',$slot_id);
                $this->db->where($condition); 
                $this->db->order_by('id','asc');
                $this->db->limit(4);
                $query =  $this->db->get();
                $results = $query->result();
                $temp = '';
                
                foreach($results as $result){
                    $temp[] = $result->id;
                }
                if(!empty($temp)){
                    $impl = implode(',',$temp);
                    $cond = 'id not in ('.$impl.') and end_date >="'.date('Y-m-d').'"';
                    $this->db->select('*');
                    $this->db->from('advertise');
                    $this->db->where('slot_id',$slot_id);
                    $this->db->where($cond); 
                    $this->db->order_by('id','asc');
                    $query1 =  $this->db->get();
                    $results1 = $query1->result();
                }
                if(!empty($results1))
                    return $results1;
                else 
                    return false;
            pr($results1);
            exit;
   }
   
   public function get_max_slot(){
       $this->db->select('max(add_slot_no) as add_slot_no');
       $this->db->from('advertise');
       $query =  $this->db->get();
       $result = $query->result();
       if(isset($result[0]->add_slot_no) and $result[0]->add_slot_no !=''){
           $slot_no = $result[0]->add_slot_no+1;
       }else{
           $slot_no = '1';
       }
       //pr($query->result());exit;
       return $slot_no;
   }
   
   public function get_ads_max($table){
         $this->db->select('*');
         $this->db->from($table);
        // $this->db->where($field, $value);
         $query =  $this->db->get();
         $results = $query->result();
         if(!empty($results)){
             return $results[0];
         }
     }
     
     public function update_ads_max($table,$data){
         //$this->db->where($field, $val);
         $this->db->update($table, $data);
     }
}