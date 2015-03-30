<?php
class Profit_loss_fund_log_model extends CI_Model {
 
    /**
    * Responsable for auto load the database
    * @return void
    */
    public function __construct()
    {
        $this->load->database();
    }

    public function set_profit_loss($data){
        $insert = $this->db->insert('profit_loss_fund_log',$data);
        return $insert;
    }

    public function get_profit_loss_log_limit($limit_start = null, $limit_end = null){
        $this->db->select('pl.*, m.user_name, p.property_name');
        $this->db->from('profit_loss_fund_log AS pl');
        $this->db->join('membership AS m','pl.user_id = m.id','LEFT INNER');
        $this->db->join('user_fund_log AS ul','pl.user_fund_log_id = ul.id','LEFT INNER');
        $this->db->join('property AS p','ul.property_id = p.id','LEFT INNER');
        if($limit_start != null or $limit_end != null){
            $this->db->limit($limit_start, $limit_end);
        }
        $query = $this->db->get();
        return $query->result_array();
    }

    public function count_get_profit_loss_log_limit(){
        $this->db->select('pl.*, m.user_name, p.property_name');
        $this->db->from('profit_loss_fund_log AS pl');
        $this->db->join('membership AS m','pl.user_id = m.id','LEFT INNER');
        $this->db->join('user_fund_log AS ul','pl.user_fund_log_id = ul.id','LEFT INNER');
        $this->db->join('property AS p','ul.property_id = p.id','LEFT INNER');
        
        $query = $this->db->get();
        return $query->num_rows();
    }

    public function get_profit_loss_log(){
        $this->db->select('pl.*, m.user_name, p.property_name');
        $this->db->from('profit_loss_fund_log AS pl');
        $this->db->join('membership AS m','pl.user_id = m.id','LEFT INNER');
        $this->db->join('user_fund_log AS ul','pl.user_fund_log_id = ul.id','LEFT INNER');
        $this->db->join('property AS p','ul.property_id = p.id','LEFT INNER');
        $query = $this->db->get();
        return $query->result_array();
    }

    public function get_profit_loss_by_id($id){
        $this->db->select('*');
        $this->db->from('profit_loss_fund_log');
        $this->db->where('id',$id);
        $query = $this->db->get();
        return $query->result_array();
    }

    public function update_profit_loss_by_id($id,$status){
        $this->db->set('detail',$status);
        $this->db->where('id',$id);
        $this->db->update('profit_loss_fund_log',$data);
    }

}
?>