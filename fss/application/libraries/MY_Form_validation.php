<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class MY_Form_validation extends CI_Form_validation {

    function __construct() {
        parent::__construct();

        $CI = & get_instance();
    }

    public function edit_unique($str, $field) {
        $expl = explode('.',$field);
        $table = $expl[0];
        $field_name = $expl[1];
        $CI =& get_instance();
        
        $id = $this->CI->uri->segment(4);
        if(isset($id) and $id){
            
        }else{
                $id = $this->CI->session->userdata('id');
        }
        $results = $this->CI->common->findByAttr($table,'id',$id);
        
        $results2 = $this->CI->common->findByAttr($table,$field_name,$str);
        if(isset($results->$field_name) and $results->$field_name ==$str){
            return true;
        }else{
            if(empty($results2)){
                return true;
            }else{
                $CI->form_validation->set_message('edit_unique', 'The %s field must contain a unique value.');
                return false;
            }
        }
    }
    
    public function check_old_password($str, $field) {
        $CI =& get_instance();
        $id = $this->CI->session->userdata('id');
        $results = $this->CI->common->findByAttr('users','id',$id);
        if(isset($results->$field) and $results->$field ==md5($str)){
            
            return true;
        }else{
            $CI->form_validation->set_message('check_old_password', 'The %s does not match.');
            return false;
        }
    }
    
    /*public function edit_unique($str, $field) {
        $CI =& get_instance();
        list($table, $field, $primaryKey, $fieldId) = explode('-', $field);
        $query = $this->CI->common_model->find_with($table,array('Where'=>array($field=>$str, $primaryKey=>array('$ne'=>new mongoId($fieldId)))),'findOne');
        
        if(count($query)==0){
            return TRUE;
        }

        $CI->form_validation->set_message('edit_unique', lang('EDIT_UNIQUE'));
        return FALSE;
    }*/


    function checkName($str) {
        $CI = & get_instance();

        if (sizeof(explode(' ',$str))!=2) {
            $CI->form_validation->set_message('checkName', 'The last %s is required.');
            return FALSE;
        }

        return TRUE;
    }

   function alpha($str)
   {
        $CI = & get_instance();
        $CI->form_validation->set_message('alpha', ' %s can conatin only alphabets.');
        return ( ! preg_match("/^([a-z])+$/i", $str)) ? FALSE : TRUE;
   } 
	/**
   * Prep data for form
   *
   * This function allows HTML to be safely shown in a form.
   * Special characters are converted.
   *
   * @access  public
   * @param int/float
   * @return  int/float
   */
  function max_value($str, $max)
  {
  $CI = & get_instance();
  $CI->form_validation->set_message('max_value', 'Fields %s '.lang('MAX_MUST_CONTAIN_VALUE').$max );
  if($str > $max)
  {
    return false;
  }
  return true;
  } 
    
  /**
   * Prep data for form
   *
   * This function allows HTML to be safely shown in a form.
   * Special characters are converted.
   *
   * @access  public
   * @param int/float
   * @return  int/float
   */
  function min_value($value, $min)
  {
    $CI = & get_instance();
    $CI->form_validation->set_message('min_value', ' %s ' .lang('MIN_MUST_CONTAIN_VALUE').$min );
    if($value < $min)
    {
      return false;
    }
    return true;
  }  

  
  
    function check_categories($str) {
        $CI = & get_instance();

        if (sizeof($str==0)) {
            $CI->form_validation->set_message('check_categories', 'The %s is required.');
            return FALSE;
        }

        return TRUE;
    }
}

