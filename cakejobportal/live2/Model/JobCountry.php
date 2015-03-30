<?php

App::uses('AppModel', 'Model');

class JobCountry extends Model {

    public $name = 'JobCountry';
    public $useTable = 'job_country';
    
    
    function getcountrys()
    {
        return $this->query("select * from job_country");
    }
    
    function fill_dropdown_country($name, $table, $textField, $valueField, $selectedValue = "", $firstValue = "Select", $where="", $attributes="",$orderOption="",$id="")
	{

        global $x;
        if($id!="")
		{
			$str = "<select onchange='selectCity(this.options[this.selectedIndex].value)'  name='" . $name . "' id='" . $id . "'"  ."   ". $attributes . ">";
		}else{
			if($where=="where category_id=15")
                        $str = "<select class='select' onchange='showOption(this.value,this.id)' name='" . $name . "'" ."   ". $attributes . ">";
			else
			$str = "<select onchange='selectCity(this.options[this.selectedIndex].value)'  name='" . $name . "'" ."   ". $attributes . ">";
		}
        if($firstValue != "no_value")
		{
		   //	$str .= "<option value=''>" . $firstValue . "</option>";
		}
        if($table=="job_option"){
          $propertycount = count($x->data->ROW[0]->CATEGORY);
          $where = split("=",$where);

          for($i=0;$i<$propertycount;$i++){
              $obj = $x->data->ROW[0]->CATEGORY[$i];

              if(trim($obj->CATEGORY_ID[0]->_text)==$where[1]){
                 $selected = "";
        			if(trim($obj->OPTION_ID[0]->_text) == $selectedValue)
        				$selected = "selected";
     			    //$str .="<option value='Other'>Othe</option>";
			    $str .= "<option value='" . trim($obj->OPTION_ID[0]->_text) . "' " . $selected . ">" .trim($obj->OPTION_NAME[0]->_text) . "</option>";
              }
          }
        }
        else{
            global $objDb ;
    		if($orderOption == "") {
    			$orderOption = $textField ;
    		}


    		if($where!="")
    		{
    			$sql = $this->query("select * from " . $table . " " . $where . " order by " . $orderOption);
    		}
    		else
    		{
    			$sql = $this->query("select * from " . $table . " order by " . $orderOption);
    		}
    		$result =  $sql;


    		if($firstValue != "no_value")
    		{
    			$str .= "<option value=''>" . $firstValue . "</option>";
    		}
$selected = "";
    		 if("Other" == $selectedValue)
    			$selected = "selected";
		 $str .="<option  value='Other' " . $selected . ">Other</option>";
		foreach($result as $rs)
    		{
         //pr($rs);
    			
    			if($rs['job_country'][$valueField] == $selectedValue)
    				$selected = "selected";
                        $str .= "<option value='" . $rs['job_country'][$valueField] . "' " . $selected . ">" . $rs['job_country'][$textField] . "</option>";
    		}
    
        }

		$str .= "</select>";

		return $str;
	}
    
    

}
