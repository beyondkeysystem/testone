<?php
class Property_model extends CI_Model {
 
    /**
    * Responsable for auto load the database
    * @return void
    */
    public function __construct()
    {
        $this->load->database();
    }

    /**
    * Get product by his is
    * @param int $product_id 
    * @return array
    */
    public function get_product_by_id($id)
    {
		$this->db->select('*');
		$this->db->from('property');
		$this->db->where('id', $id);
		$query = $this->db->get();
		return $query->result_array(); 
    }

    public function get_products_by_id($id)
    {
		$this->db->select('property.*, sum(user_property.property_share_in_per+user_property.sell_property_share) AS share_available');
		$this->db->select('sum(user_property.property_share_in_per) AS property_share_owned');
		$this->db->select('sum(user_property.sell_property_share) AS property_share_owned_sell');
		$this->db->from('property');
		$this->db->join('user_property', 'property.id = user_property.property_id','LEFT');
		$this->db->where('property.id', $id);
		$query = $this->db->get();
		return $query->result_array(); 
    }
    
    public function get_property_by_id($id)
    {
		$this->db->select('*');
		$this->db->from('property');
		$this->db->where('id', $id);
		$this->db->where('property_enable_disable !=', 0);
		$query = $this->db->get();
		return $query->result_array(); 
    }
    
    public function get_property_status()
    {

		$this->db->select('property_status');
		$this->db->distinct();
		$this->db->from('property');
		$query = $this->db->get();
		return $query->result_array(); 
	
    }
    
    public function get_property_baths()
    {
		$this->db->select('property_bathrooms');
		$this->db->distinct();
		$this->db->from('property');
		$query = $this->db->get();
		return $query->result_array(); 	
    }
    
	public function get_property_name_by_id($id)
    {
		$this->db->select('property_name');
		$this->db->distinct();
		$this->db->where('property.id', $id);
		$this->db->from('property');
		$query = $this->db->get();
		return $query->row_array(); 	
    }
	
	public function get_all_property_name()
    {
		$this->db->select('id, property_name');
		$this->db->distinct();
		$this->db->from('property');
		$query = $this->db->get();
		return $query->result_array(); 	
    }
    
      public function get_property_information_of_users($id)
    {
		$this->db->select('user_property.property_share_in_per');
		$this->db->select('user_property.profit');
		$this->db->select('user_property.loss');
		$this->db->select('user_property.sold_property_share');
		$this->db->select('user_property.sell_property_share');
		$this->db->select('property.id');
		$this->db->select('property.property_name');
		$this->db->select('property.property_type');
		$this->db->select('property.property_image');
		$this->db->select('property.property_location');
		$this->db->select('property.property_initial_price');
		$this->db->select('property.property_status');
		$this->db->select('property.property_current_price');
		$this->db->select('property.property_price_last_update');
		$this->db->where('user_property.user_id', $id);
		$this->db->where('property_enable_disable', 1);
		
		$this->db->from('user_property');
                
                
		$this->db->join('property', 'user_property.property_id = property.id');
                $where="(user_property.property_share_in_per <> '0' or user_property.sell_property_share <> '0' or user_property.sold_property_share <> '0')";
		$this->db->where($where);
		
		$this->db->group_by('property.id');
              //  $this->db->having('user_property.user_id ',$id); 
		
		//$this->db->limit('4', '4');


		$query = $this->db->get();
		
		return $query->result_array(); 	 	
    }
    
    
    public function get_property_information_of_users_of_property($user_id, $id)
    {
		$this->db->select('user_property.property_share_in_per');
		$this->db->select('user_property.profit');
		$this->db->select('user_property.loss');
		$this->db->select('user_property.sold_property_share');
		$this->db->select('user_property.sell_property_share');
		$this->db->select('property.id');
		$this->db->select('property.property_name');
		$this->db->select('property.property_type');
		$this->db->select('property.property_image');
		$this->db->select('property.property_location');
		$this->db->select('property.property_initial_price');
		$this->db->select('property.property_status');
		$this->db->select('property.property_current_price');
		$this->db->select('property.property_description');
		$this->db->select('property.property_price_last_update');
		$this->db->from('user_property');
                
                $this->db->where('user_property.user_id', $user_id);
		$this->db->where('property.id', $id);
		$this->db->join('property', 'user_property.property_id = property.id');

		$this->db->group_by('property.id');
              //  $this->db->having('user_property.user_id ',$id); 
		
		//$this->db->limit('4', '4');


		$query = $this->db->get();
		
		return $query->result_array(); 	 	
    }
	
    public function get_property_beds()
    {
		$this->db->select('property_bedrooms');
		$this->db->distinct();
		$this->db->from('property');
		$query = $this->db->get();
		return $query->result_array(); 	
    }
    /**
    * Fetch property data from the database
    * possibility to mix search, filter and order
    * @param int $manufacuture_id 
    * @param string $search_string 
    * @param strong $order
    * @param string $order_type 
    * @param int $limit_start
    * @param int $limit_end
    * @return array
    */
    public function get_property($search_string=null, $order=null, $order_type=null, $limit_start=null, $limit_end=null)
    {
	    
		$this->db->select('*');
		$this->db->from('property');
		//$this->db->where('property_status !=', 'blocked'); 
		$this->db->limit($limit_start, $limit_end);
  	    $this->db->group_by('id');
		$this->db->order_by('id', 'Desc');
		if($search_string != null){
			$this->db->like('property_name', $search_string);
		}
		$query = $this->db->get();
		
		return $query->result_array(); 	
    }

    public function get_properties($search_property_name=null,$search_location=null,$search_type=null,$search_status=null, $limit_start=null, $limit_end=null)
    {

		$this->db->select('sum(user_property.property_share_in_per+user_property.sell_property_share) AS share_available');
		$this->db->select('sum(user_property.property_share_in_per) AS property_share_owned');
		$this->db->select('sum(user_property.sell_property_share) AS property_share_owned_sell');
		
		$this->db->join('user_property', 'property.id = user_property.property_id','left');

		$this->db->select('property.*');
		$this->db->from('property');

		//$this->db->where('property_status !=', 'blocked'); 
		$this->db->limit($limit_start, $limit_end);
  	    $this->db->group_by('id');
		$this->db->order_by('id', 'Desc');
		
		if($search_property_name){
			$this->db->like('property_name', $search_property_name);
		}
		if($search_location){
			$this->db->like('property_location', $search_location);
		}
		if($search_type){
			$this->db->like('property_type', $search_type);
		}
		if($search_status){
			$this->db->like('property_status', $search_status);
		}
		$query = $this->db->get();
		
		return $query->result_array(); 	
    }

	public function get_property_information( $minprice=null, $maxprice=null, $price=null, $property_bedrooms=null, $property_location=null, $property_ref=null, $property_type=null, $property_status=null, $property_bathrooms=null, $limit_start, $limit_end, $property_name=null)
    {
	    
		$this->db->select('property.*');
		$this->db->from('property');
		//$this->db->where('property_status !=', 'blocked'); 
		//$this->db->where('property_status !=', 'blocked'); 
		//$this->db->group_by('property.id');
		$this->db->order_by('modified', 'Desc');
		$this->db->where('property_enable_disable', 1);
		if($property_status != null){
			$this->db->where('property_status', $property_status);
		}
		if($minprice != null){
			$this->db->where('property_current_price >=', $minprice);
		}
		if($maxprice <= 90000){
			$this->db->where('property_current_price <=', $maxprice);
		}
		if($property_location != null){
			$this->db->like('property_location', $property_location);			
		}
		if($property_name != null){
			$this->db->like('property_name', $property_name);			
		}
		if($property_bedrooms != null){
			$this->db->like('property_bedrooms', $property_bedrooms);
		}
		if($property_bathrooms!= null){
			$this->db->like('property_bathrooms', $property_bathrooms);
		}
		if($property_type!= null){
			$this->db->like('property_type', $property_type);
		}
                if($property_ref!= null){
			$this->db->like('property_ref', $property_ref);
		}
		$this->db->limit($limit_start, $limit_end);
		//$this->db->limit('4', '4');
		
		$query = $this->db->get();
		$data['result_array']=$query->result_array();
		
		$this->db->select('property.id');
		$this->db->from('property');
		
		//$this->db->group_by('property.id');
		$this->db->order_by('modified', 'Desc');
		
		
		if($property_status != null){
			$this->db->where('property_status', $property_status);
		}
		if($minprice != null){
			$this->db->where('property_current_price >=', $minprice);
		}
		if($maxprice <= 90000){
			$this->db->where('property_current_price <=', $maxprice);
		}
		if($property_location != null){
			$this->db->like('property_location', $property_location);			
		}
		if($property_name != null){
			$this->db->like('property_name', $property_name);			
		}
		if($property_bedrooms != null){
			$this->db->like('property_bedrooms', $property_bedrooms);
		}
		if($property_bathrooms!= null){
			$this->db->like('property_bathrooms', $property_bathrooms);
		}
                if($property_ref!= null){
			$this->db->like('property_ref', $property_ref);
		}
		

		$query = $this->db->get();
		$data['num_rows']=$query->num_rows();
		
		return $data; 	
    }
	
	//Get all data
	public function get_all_property_information($limit_start, $limit_end)
    {
	    $this->db->select('property.*');
		$this->db->from('property');
		$this->db->where('property_status !=', 'blocked'); 
		$this->db->where('property_enable_disable NOT IN', '(0,3)' ,false); 
		//$this->db->group_by('property.id');
		$this->db->order_by('modified', 'Desc');
	    $this->db->limit($limit_start, $limit_end);
		//$this->db->limit('4', '4');
		
		$query = $this->db->get();
		$data['result_array']=$query->result_array();
		
		$this->db->select('property.id');
		$this->db->from('property');
		$this->db->where('property_enable_disable NOT IN', '(0,3)' ,false); 
		//$this->db->group_by('property.id');
		$this->db->order_by('modified', 'Desc');
		$query = $this->db->get();
		$data['num_rows']=$query->num_rows();	
		
		return $data; 	
    }
    
    
	function count_property($search_string=null, $order=null)
    {
		$this->db->select('*');
		$this->db->from('property');
		//$this->db->where('property_status !=', 'blocked'); 
		if($search_string){
			$this->db->like('property_name', $search_string);
		}
		if($order){
			
		    $this->db->order_by('id', 'Asc');
		}
		$query = $this->db->get();
		return $query->num_rows();        
    }


/* Mayank Pawar 
** 22/12/2014
*/
    function count_properties($search_property_name=null,$search_location=null,$search_type=null,$search_status=null)
    {
		$this->db->select('*');
		$this->db->from('property');
		//$this->db->where('property_status !=', 'blocked'); 
		if($search_property_name){
			$this->db->like('property_name', $search_property_name);
		}
		if($search_location){
			$this->db->like('property_location', $search_location);
		}
		if($search_type){
			$this->db->like('property_type', $search_type);
		}
		if($search_status){
			$this->db->like('property_status', $search_status);
		}
		$query = $this->db->get();
		return $query->num_rows();        
    }
    
     function count_property_share()
    {
	        $this->db->select('property_id');
		$this->db->select('SUM(property_share_in_per+sell_property_share) total_property_share_in_per');
		$this->db->from('user_property');
		$this->db->group_by('property_id');
		$query = $this->db->get();
		return $query->result_array();         
    }
    
      function count_available_share($property_id)
    {
	        
		$this->db->select('property_id, SUM(property_share_in_per+sell_property_share) total_property_share_in_per');
		$this->db->select('SUM(property_share_in_per) property_share');
		$this->db->select('SUM(sell_property_share) user_property_share_sell');
		
		$this->db->from('user_property');
		$this->db->where('property_id',$property_id);
		$this->db->group_by('property_id');
		$query = $this->db->get();
	    return $query->result_array();         
    }
    /**
    * Store the new item into the database
    * @param array $data - associative array with data to store
    * @return boolean 
    */
    function store_product($data)
    {
		$insert = $this->db->insert('property', $data);
	     return $this->db->insert_id();
	}

    /**
    * Update product
    * @param array $data - associative array with data to store
    * @return boolean
    */
    function update_product($id, $data)
    {
		$this->db->where('id', $id);
		$this->db->update('property', $data);
		$report = array();
		$report['error'] = $this->db->_error_number();
		$report['message'] = $this->db->_error_message();
		if($report !== 0){
			return true;
		}else{
			return false;
		}
	}

    /**
    * Delete product
    * @param int $id - product id
    * @return boolean
    */
	function delete_product($id){
		$this->db->where('id', $id);
		$this->db->delete('property'); 
	}
	
	//Code By Me Start
	
	 public function get_product_pending()
    {
		$this->db->select('*');
		$this->db->from('property');
		 $mydate = date('Y-m-d'); 
                 $this->db->where("DATEDIFF('$mydate', created) >=", 30);
		 // $this->db->where("property_status", 'pending'); 
		 $this->db->where("property_status", 'selling'); 
		$query = $this->db->get();
		return $query->result_array(); 
    }
    
    public function change_status_of_property($property_id)
    {
		$data = array(
               'property_status' => 'blocked',
            );

	    $this->db->where('id', $property_id);
	    $this->db->update('property', $data); 
    }
    
     function get_property_chart_date($property_id){
 		$this->db->select('date');
 		$this->db->from('chart_property_price_time');
 		$this->db->where('property_id',$property_id);
 		$query = $this->db->get();
 		return($query->result_array());
 	}
	
      function get_property_chart_price($property_id){
 		$this->db->select('price');
 		$this->db->from('chart_property_price_time');
 		$this->db->where('property_id',$property_id);
 		$query = $this->db->get();
 		return($query->result_array());
 	}
	
	 function get_property_max_and_min_date($property_id){
 		$this->db->select_max('date', 'max_date');
		$this->db->select_min('date', 'min_date');
 		$this->db->from('chart_property_price_time');
 		$this->db->where('property_id',$property_id);
 		$query = $this->db->get();
 		return($query->result_array());
 	}
	 function get_avg_price_month($month){
 		$this->db->select_avg('price');
 		$this->db->from('chart_property_price_time');
 		$this->db->like('date', $month);
		//$this->db->where('property_id',$property_id);
 		$query = $this->db->get();
 		return($query->result_array());
 	}
	 function get_avg_price_month_property($month, $property_id){
 		$this->db->select_avg('price');
 		$this->db->from('chart_property_price_time');
 		$this->db->like('date', $month);
		$this->db->where('property_id',$property_id);
 		$query = $this->db->get();
 		return($query->result_array());
 	}
	 public function get_property_for_chart()
        {
	    
		$this->db->select('*');
		$this->db->from('property');
		$this->db->where('property_status !=', 'blocked');
		$this->db->where('property_enable_disable !=', 0);
		$this->db->where('property_enable_disable !=', 3); 
  	    $this->db->group_by('id');
		$query = $this->db->get();
		
		return $query->result_array(); 	
        }
	
	 public function get_property_next_id($id)
        {
	    
		$this->db->select('*');
		$this->db->from('property');
		$this->db->where('id >', $id);
		$this->db->where('property_status !=', 'blocked');
		$this->db->limit(1,0);
		$query = $this->db->get();
		
		
		
		return $query->result_array(); 	
        }
	
	 public function get_property_previous_id($id)
        {
	    
		$this->db->select('*');
		$this->db->from('property');
		$this->db->where('id <', $id);
		$this->db->where('property_status !=', 'blocked');
		$this->db->limit(1,0);
		$this->db->order_by("id", "desc"); 
		$query = $this->db->get();
		
		
		
		return $query->result_array(); 	
        }
    
    
    //Code By Me End
    
    /**
	** By Mayank Pawar
	** Date 20.11.14
	**/
 	public function get_user_property_share($property_id){
 		$query = $this->db
 					->select('up.sell_property_share , m.user_name, up.user_id, up.id')
			 		->from('user_property AS up')
			 		->join('membership AS m', 'up.user_id = m.id AND up.property_id = '.$property_id.' AND sell_property_share <> 0', 'LEFT INNER')
			 		->get();
		return( $query->result_array()); 
 	}

 	public function get_user_credit_debit_detail_prop($user_id,$property_id){
 		$this->db->select('user_id, sum(credit) totalcredit, sum(debit) totaldebit');
 		$this->db->from('user_fund_log');
 		$this->db->where('user_id',$user_id);
 		$this->db->where('property_id',$property_id);
 		
 		$query = $this->db->get();
 		return($query->result_array());
 	}
	
	public function get_insert_id(){
 		
 		return($query->result_array());
 	}
	
	
	public function get_property_invester(){
 		
 		$this->db->select('*');
		$this->db->from('membership AS m');
		$this->db->join('user_credit AS uc', 'uc.user_id = m.id AND uc.credit > 0', 'LEFT INNER');
		$query = $this->db->get();
		return $query->num_rows();  
 	}
	
	public function count_owned_property(){
 		
 		$this->db->select('*');
		$this->db->from('property');
		//$this->db->where('property_status !=', 'blocked'); 
		$this->db->where('property_status','owned');
		$query = $this->db->get();
		return $query->num_rows();  
 	}
	
	public function get_total_earning($property_id){
 		
 		$this->db->select('SUM(debit)-SUM(credit) AS balance');
		$this->db->from('user_fund_log');
		//$this->db->where('property_status !=', 'blocked'); 
		$this->db->where('property_id',$property_id);
		$query = $this->db->get();
		return $query->result_array();  
 	}
	
	public function get_owned_property(){
 		
 		$this->db->select('*');
		$this->db->from('property');
		//$this->db->where('property_status !=', 'blocked'); 
		$this->db->where('property_status','owned');
		$query = $this->db->get();
		return $query->result_array();  
 	}
	
	public function get_user_property(){
 		
 		$this->db->select('COUNT(user_id) AS Counting, property_id');
		$this->db->from('user_property');
		//$this->db->where('property_status !=', 'blocked'); 
		$this->db->group_by('property_id');
		$this->db->order_by('Counting', 'DESC');
		$query = $this->db->get();
		return $query->result_array();  
 	}

 	/* Name: Mayank Pawar
	** Date: 22/12/2014 
 	*/

	public function get_total_share_available($property_id){
		$this->db->select('sum(property_share_in_per + sell_property_share) total_share_available, sum(property_share_in_per) property_share_in_per, sum(sell_property_share) sell_property_share');
		$this->db->from('user_property');
		$this->db->where('property_id',$property_id);
		$query = $this->db->get();
		return $query->result_array();
	}

	public function get_distinct_property_type(){
		$this->db->select('property_type');
		$this->db->distinct();
		$this->db->from('property');
		$query = $this->db->get();
		return $query->result_array();
	}

	public function get_distinct_property_status(){
		$this->db->select('property_status');
		$this->db->distinct();
		$this->db->from('property');
		$query = $this->db->get();
		return $query->result_array();
	}

	public function update_property_enable_disable($property_id,$property_enable_disable){
		$data = array('property_enable_disable'=>$property_enable_disable);
		$this->db->where('id', $property_id);
		$this->db->update('property', $data);
		$report = array();
		$report['error'] = $this->db->_error_number();
		$report['message'] = $this->db->_error_message();
		if($report !== 0){
			return true;
		}else{
			return false;
		}

	}

	public function update_property($property_id,$reference){
		$data = array('property_ref'=>$reference);
		$this->db->where('id',$property_id);
		$this->db->update('property',$data);
		$report = array();
		$report['error'] = $this->db->_error_number();
		$report['message'] = $this->db->_error_message();
		if($report !== 0){
			return true;
		}else{
			return false;
		}
	}
	
	public function get_user_property_image()
        {
	    
		$this->db->select('*');
		$this->db->from('property');
		$this->db->where('property_status !=', 'blocked');
		$this->db->where('property_enable_disable NOT IN','(0,3)',false);
		$this->db->where('property_status != ', 'pending');
		$this->db->where('banner', '1');
		$this->db->order_by("created", "desc");
		$query = $this->db->get();
		return $query->result_array(); 	
        }
	
	
	public function get_all_property( )
    {
	    
		$this->db->select('*');
		$this->db->from('property');
		//$this->db->where('property_status !=', 'blocked'); 
		//$this->db->where('property_status !=', 'blocked'); 
		//$this->db->group_by('property.id');
		
		$query = $this->db->get();
		
		
		return $query->result_array(); 	
    }
	
	public function get_property_topsales(){
		$this->db->select('*');
		$this->db->select('count(user_property.user_id) no_of_users');
		$this->db->from('property');
		$this->db->join('user_property','property.id = user_property.property_id', 'LEFT');
		$this->db->group_by('user_property.property_id');
		$this->db->order_by('property_status','Asc');
		$this->db->order_by('no_of_users','desc');
		$this->db->limit(11);
		$this->db->where('property_status !=','pending');
		$this->db->where('property_enable_disable NOT IN','(0,3)',false);
		$where = "(property_share_in_per != 0 OR  sell_property_share !=0 OR sold_property_share != 0)";
		$this->db->where($where);
		$query = $this->db->get();
		return $query->result_array(); 	
        
	}

	public function get_property_toplist(){
		$this->db->select('*');
		$this->db->select('(property_current_price - property_initial_price) top_sale');
		$this->db->from('property');
		$this->db->group_by('id');
		$this->db->order_by('top_sale','desc');
		$this->db->where('property_status !=','pending');
		$this->db->where('property_enable_disable NOT IN','(0,3)',false);
		$this->db->limit(11);
		$query = $this->db->get();
		return $query->result_array(); 	
	}

	public function get_product_owned_info($property_id,$user_id){
		$this->db->select('*');
		$this->db->select('sum(user_property.property_share_in_per) property_share_own, sum(user_property.sell_property_share) property_share_own_sell');
		$this->db->from('property');
		$this->db->join('user_property','property.id = user_property.property_id','left');
		$this->db->where('user_property.user_id','$user_id');
		$this->db->where('property.id',$property_id);
		$query = $this->db->get();
		return $query->result_array(); 	
	}

	public function get_product_owned_info_buy($property_id){
		$this->db->select('*');
		$this->db->select('sum(user_property.property_share_in_per) property_share_own, sum(user_property.sell_property_share) property_share_own_sell');
		$this->db->from('property');
		$this->db->join('user_property','property.id = user_property.property_id','left');
		$this->db->where('property.id',$property_id);
		$query = $this->db->get();
		return $query->result_array(); 		
	}

	public function get_properties_sell_phase_date(){
		$this->db->select('*');
		$this->db->from('property');
		$this->db->where('property.min_owned_limit_datetime != ', '0000-00-00 00:00:00');
		$this->db->where('DATEDIFF(CURRENT_DATE , min_owned_limit_datetime) >=', '30');
		$this->db->where('property_enable_disable NOT IN', '(2,3)',false);
		$this->db->where('property_status', 'owned');
		$query = $this->db->get();
		return $query->result_array(); 		
	}

	public function update_property_enable_disable_status($property_id){
		$this->db->set('property_enable_disable','2');
		$this->db->where('id', $property_id);
		$this->db->update('property', $data);
		$report = array();
		$report['error'] = $this->db->_error_number();
		$report['message'] = $this->db->_error_message();
		if($report !== 0){
			return true;
		}else{
			return false;
		}
	}

	public function update_property_enable_disable_date($property_id){
		$current_date = date('Y-m-d h:i:s');
		$this->db->set('min_owned_limit_datetime',$current_date);
		$this->db->set('property_enable_disable','1');
		$this->db->where('id',$property_id);
		$this->db->update('property');
		
	}

	public function get_max_property_price(){
		$this->db->select_max('property_current_price');
		$result = $this->db->get('property')->row();  
		return $result->property_current_price; 	
	}

	public function update_banner($property_id,$val){
		$this->db->set('banner',$val);
		$this->db->where('id',$property_id);
		$this->db->update('property');
	}

	public function update_sell_property_status($id,$data){
		$this->db->set($data);
		$this->db->where('id',$id);
		$this->db->update('property');
	}
}	
