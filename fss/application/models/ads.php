<?php
require_once dirname(__FILE__).'/model.php';
class Ads extends Model {
     function __construct(){
        parent::__construct();
     }
     
     public function get_schedule($slot_id,$add_slot_no,$id){
         //echo $slot_id.' '.$add_slot_no;exit;
         //$cond = "start_date <= '".date('Y-m-d')."' AND end_date >= '".date('Y-m-d')."' and add_slot_no='".$slot_no."'";
            $this->db->select('*');
            $this->db->from('advertise_schedule');
            $this->db->where('slot_id',$slot_id);
            $this->db->where('add_slot_no',$add_slot_no);
            $this->db->where('status',1);
            //$this->db->where('id != '.$id);
            $this->db->order_by('start_date,id asc');
           
            $query =  $this->db->get();
            $results =  $query->result();
            return $results;
     }
     
     public function get_max_schedule_no($slot_id,$add_slot_no,$id){
            $this->db->select('max(schedule_no) as max_schedule_no');
            $this->db->from('advertise');
            $this->db->where('slot_id',$slot_id);
            $this->db->where('add_slot_no',$add_slot_no);
            //$this->db->where('id != '.$id);
            $this->db->order_by('start_date,id asc');
           
            $query =  $this->db->get();
            $results =  $query->result();
            return $results[0]->max_schedule_no;
     }
     
}