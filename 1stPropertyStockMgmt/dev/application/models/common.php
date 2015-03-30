<?php

class Common extends CI_Model {

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
     
     function find($select,$join,$conditions){
         $sql="select ".$select. " from ".$join. $conditions;
        
        $query=$this->db->query($sql);
        return $query->result();
     }
     
     function findlog($select,$join,$conditions,$offset){
         $sql="select ".$select. " from ".$join. $conditions;
        $sql.=" limit ".$offset.", ".PAGE_LIMIT;
        $query=$this->db->query($sql);
        return $query->result();
     }
     
     public function find_deposit($select,$join,$conditions,$offset){
         $sql="select ".$select. " from ".$join. $conditions;
        $sql.=" limit ".$offset.", ".PAGE_LIMIT;
        $query=$this->db->query($sql);
        return $query->result();
     }
     function logCount($conditions){
         $select = "count(*) as cnt";
         $join = "user_fund_log left join membership on user_fund_log.user_id = membership.id";
         $sql="select ".$select. " from ".$join. $conditions;
        
        $query=$this->db->query($sql);
        $result =  $query->result();
        return $result[0]->cnt;
     }
     
     function get_deposit_cnt($condition){
         $select = "count(*) as cnt";
        $join = "o_payments left join membership on o_payments.user_id = membership.id";
        //$conditions = " where transaction_status = 'completed' $condition";
        $sql="select ".$select. " from ".$join. $condition;
        $query=$this->db->query($sql);
        $result =  $query->result();
        //print_r($result);exit;
        return $result[0]->cnt;
     }
     
     function get_withdraw($cond='',$search_data='',$offset){
            $this->db->select('user_withdraw_fund.id');
            $this->db->select('fund_amt');
            $this->db->select('number_of_token');
            $this->db->select('date');
            $this->db->select('status');
            $this->db->select('membership.user_name');
            $this->db->select('withdraw_date');
            $this->db->from('user_withdraw_fund');
            $this->db->join('membership', 'membership.id = user_withdraw_fund.user_id');
            $this->db->where('user_withdraw_fund.status !=', 'Withdrawadmin');
            if(isset($cond) and $cond =='pending'){
                $this->db->where('user_withdraw_fund.status =', 'pending');
            }else{
                $this->db->where('user_withdraw_fund.status !=', 'pending');
            }
            if(!empty($search_data)){
                $datetime = $search_data['datetime'];
                $username = $search_data['username'];
                if(isset($datetime) and $datetime !=''){
                    $this->db->like('date', $datetime);
                }
                if(isset($username) and $username !=''){
                    $this->db->like('membership.user_name', $username);
                }
            }
            $this->db->limit(PAGE_LIMIT, $offset);
            $query = $this->db->get();

            return $query->result_array(); 	
	}
        function get_withdraw_cnt($cond='',$search_data=''){
            $this->db->select('count(*) as cnt');
            $this->db->from('user_withdraw_fund');
            $this->db->join('membership', 'membership.id = user_withdraw_fund.user_id');
            $this->db->where('user_withdraw_fund.status !=', 'Withdrawadmin');
            if(isset($cond) and $cond =='pending'){
                $this->db->where('user_withdraw_fund.status =', 'pending');
            }else{
                $this->db->where('user_withdraw_fund.status !=', 'pending');
            }
            if(!empty($search_data)){
                $datetime = $search_data['datetime'];
                $username = $search_data['username'];
                if(isset($datetime) and $datetime !=''){
                    $this->db->like('date', $datetime);
                }
                if(isset($username) and $username !=''){
                    $this->db->like('membership.user_name', $username);
                }
            }
            //echo 'ggggg';exit;
            $query = $this->db->get();

            $result =  $query->result_array(); 	
            //echo '<pre>';print_r($result);exit;
            return $result[0]['cnt'];
	}
        
        
        
        
        
        
        
        function get_withdraw_by_id($cond='',$search_data='', $offset, $user_id, $condition){
            $this->db->select('user_withdraw_fund.id');
            $this->db->select('fund_amt');
            $this->db->select('number_of_token');
            $this->db->select('date');
            $this->db->select('status');
            $this->db->select('membership.user_name');
            $this->db->select('withdraw_date');
            $this->db->from('user_withdraw_fund');
            $this->db->join('membership', 'membership.id = user_withdraw_fund.user_id');
             $this->db->where('membership.id =', $user_id);
            $this->db->where('user_withdraw_fund.status !=', 'Withdrawadmin');
             $this->db->where('user_withdraw_fund.status !=', 'pending');
            /*if(isset($cond) and $cond =='pending'){
                $this->db->where('user_withdraw_fund.status =', 'pending');
            }else{
                $this->db->where('user_withdraw_fund.status !=', 'pending');
            }*/
            if(!empty($search_data)){
                $datetime = $search_data['datetime'];
                $username = $search_data['username'];
                $transaction_status = $search_data['transaction_status'];
                if(isset($datetime) and $datetime !=''){
                    $this->db->like('user_withdraw_fund.withdraw_date', $datetime);
                }
                if(isset($username) and $username !=''){
                    $this->db->where('membership.user_name =', $username);
                }
                if(isset($transaction_status) and $transaction_status !=''){
                    $this->db->like('user_withdraw_fund.status ', $transaction_status);
                }
            }
            $this->db->limit(PAGE_LIMIT, $offset);
            $query = $this->db->get();

            return $query->result_array(); 	
	}
        function get_withdraw_cnt_by_id($cond='',$search_data='', $user_id, $condition){
            $this->db->select('count(*) as cnt');
            $this->db->from('user_withdraw_fund');
            $this->db->join('membership', 'membership.id = user_withdraw_fund.user_id');
             $this->db->where('membership.id =', $user_id);
            $this->db->where('user_withdraw_fund.status !=', 'Withdrawadmin');
            $this->db->where('user_withdraw_fund.status !=', 'pending');
           /* if(isset($cond) and $cond =='pending'){
                $this->db->where('user_withdraw_fund.status =', 'pending');
            }else{
                $this->db->where('user_withdraw_fund.status !=', 'pending');
            }*/
            //echo '<pre>';print_r($search_data);exit;
            if(!empty($search_data)){
                $datetime = $search_data['datetime'];
                $username = $search_data['username'];
                $transaction_status = $search_data['transaction_status'];
                if(isset($datetime) and $datetime !=''){
                    $this->db->like('user_withdraw_fund.withdraw_date', $datetime);
                }
                if(isset($username) and $username !=''){
                    $this->db->where('membership.user_name ', $username);
                }
                if(isset($transaction_status) and $transaction_status !=''){
                    $this->db->like('user_withdraw_fund.status ', $transaction_status);
                }
            }
            //echo 'ggggg';exit;
            $query = $this->db->get();

            $result =  $query->result_array(); 	
            //echo '<pre>';print_r($result);exit;
            return $result[0]['cnt'];
	}
        
        
        //function get_ref_no()
        function get_ref_no($id){
             $sql="select * from ref_no where ref_no = ".$id;
            
            $query=$this->db->query($sql);
            $result =  $query->result();
            return $result[0];
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
     
     function get_remaining_fund($user_id){
         $sql="select sum(credit) as credit_val,sum(debit) as debit_val from user_fund_log where user_id = ".$user_id;
            
            $query=$this->db->query($sql);
            $result =  $query->result();
            //echo '<pre>';print_r($result);
            return $result[0]->debit_val-$result[0]->credit_val;
            //exit;
            //return $result[0];
     }
     
     function get_owned_val($user_id){
         $q = "
             SELECT 
                user_property.id AS user_property_id,
                user_property.property_id AS user_property_property_id,
                user_property.property_share_in_per,
                user_property.sell_property_share,
                user_property.sold_property_share,
                user_property.profit,
                user_property.loss,
                property.* FROM user_property
                INNER JOIN property 
                ON user_property.property_id = property.id
                WHERE property.property_status = 'owned'
                 and user_id = ".$user_id;
         $query=$this->db->query($q);
            $result =  $query->result();
            //echo '<pre>';print_r($result);
            $totalsum = 0;
            foreach($result as $val){
                $total = $val->property_share_in_per+$val->sell_property_share;
                $per = ($total*$val->property_current_price)/100;
                //$per1[] = ($total*$val->property_current_price)/100;
                $totalsum = $totalsum+$per;
            }
            //print_r($per1);
            
            return $totalsum;
            //exit;
     }
     
     
     
     
     
     
     function get_withdraw_cnt_s($cond='',$search_data=''){
            $this->db->select('count(*) as cnt');
            $this->db->from('user_withdraw_fund');
            $this->db->join('membership', 'membership.id = user_withdraw_fund.user_id');
            
            $this->db->where($search_data);
            $query = $this->db->get();

            $result =  $query->result_array(); 	
            //echo '<pre>';print_r($result);exit;
            return $result[0]['cnt'];
	}
     
     
     function get_withdraw_s($cond='',$search_data='',$offset){
            $this->db->select('user_withdraw_fund.id');
            $this->db->select('fund_amt');
            $this->db->select('number_of_token');
            $this->db->select('date');
            $this->db->select('status');
            $this->db->select('membership.user_name');
            $this->db->select('withdraw_date');
            $this->db->from('user_withdraw_fund');
            $this->db->join('membership', 'membership.id = user_withdraw_fund.user_id');
            
            //$search_data
            $this->db->where($search_data);
            $this->db->limit(PAGE_LIMIT, $offset);
            $query = $this->db->get();

            return $query->result_array(); 	
	}
     
     
     
	
}