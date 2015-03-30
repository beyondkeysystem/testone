<?php
class Admin_property extends CI_Controller {
 
    /**
    * Responsable for auto load the model
    * @return void
    */
    public function __construct()
    {
        parent::__construct();
        $this->load->model('property_model');
        $this->load->model('property_type_model');
        $this->load->model('user_property_model');
        $this->load->model('user_fund_log_model');
        $this->load->model('withdraw_model');
        $this->load->model('credit_price_model');
        $this->load->model('user_credit_model');
        $this->load->model('user_autotracking_log_model');

         $this->load->library('upload');
        if(( $this->session->userdata('is_logged_in') && ($this->session->userdata('type') != 'admin')) ){
            redirect('admin/login');
           
        }
        
          if(( !$this->session->userdata('is_logged_in')) ){
            redirect('admin/login');
           
        }
         
    }
 
    /**
    * Load the main view with all the current model model's data.
    * @return void
    */
    public function index()
    {
     
        /* to Check the property is exceeds 30 days of Sell pending phase status */
        $sell_phase_properties = $this->property_model->get_properties_sell_phase_date();
        foreach($sell_phase_properties as $sell_phase_property){
            $n_property_id = $sell_phase_property['id'];
            $this->property_model->update_property_enable_disable_status($n_property_id);
        }
        /* Sell Pending phase Ends */

       $filter_session_data = array();
        //all the posts sent by the view  
        // $search_string = $this->input->post('search_string');        
        
        /* Search values */
        $search_property_name = $this->input->post('property_name') ? $this->input->post('property_name') : null;
        $search_location = $this->input->post('location');
        $search_type = $this->input->post('type');
        $search_status = $this->input->post('status');
        /* Search values Ends */
        
        // $order = $this->input->post('order'); 
        // $order_type = $this->input->post('order_type'); 

        //pagination settings
        $config['per_page'] = 20;
        $config['base_url'] = base_url().'admin/property';
        $config['use_page_numbers'] = TRUE;
        $config['num_links'] = 20;
        $config['full_tag_open'] = '<ul>';
        $config['full_tag_close'] = '</ul>';
        $config['num_tag_open'] = '<li>';
        $config['num_tag_close'] = '</li>';
        $config['cur_tag_open'] = '<li class="active"><a>';
        $config['cur_tag_close'] = '</a></li>';

        //limit end

        $page = $this->uri->segment(3);


        //math to get the initial record to be select in the database
        $limit_end = ($page * $config['per_page']) - $config['per_page'];
        if ($limit_end < 0){
            $limit_end = 0;
        } 

        //if order type was changed
        // if($order_type){
        //     $filter_session_data['order_type'] = $order_type;
        // }
        // else{
        //     //we have something stored in the session? 
        //     if($this->session->userdata('order_type')){
        //         $order_type = $this->session->userdata('order_type');    
        //     }else{
        //         //if we have nothing inside session, so it's the default "Asc"
        //         $order_type = 'Asc';    
        //     }
        // }
        //make the data type var avaible to our view
        // $data['order_type_selected'] = $order_type;        


        //we must avoid a page reload with the previous session data
        //if any filter post was sent, then it's the first time we load the content
        //in this case we clean the session filter data
        //if any filter post was sent but we are in some page, we must load the session data

        //filtered && || paginated
        if($search_property_name != false or $search_location != false or $search_type != '0' or $search_status != '0' or $this->uri->segment(3) == true){ 
           
            /*
            The comments here are the same for line 79 until 99

            if post is not null, we store it in session data array
            if is null, we use the session data already stored
            we save order into the the var to load the view with the param already selected       
            */

            if($search_property_name){
                $filter_session_data['search_property_name'] = $search_property_name;
                $data['search_property_name'] = $search_property_name;
            }
            if($search_location){
                $filter_session_data['search_location'] = $search_location;
                $data['search_location'] = $search_location;
            }

            if($search_type){
                $filter_session_data['search_type'] = $search_type;
                $data['search_type'] = $search_type;
            }

            if($search_status){
                $filter_session_data['search_status'] = $search_status;
                $data['search_status'] = $search_status;
            }            


            // $filter_session_data['order'] = $order;
           
            // $data['order'] = $order;

            //save session data into the session
            $this->session->set_userdata($filter_session_data);

            // echo "<br/><br/><br/><br/><br/>lask ";print_r($this->session->userdata);

            if(isset($page) && ($this->session->userdata("search_property_name") || $this->session->userdata("search_location") || $this->session->userdata("search_type") || $this->session->userdata("search_status"))){
                $var = $this->session->userdata;
                $search_property_name = $var['search_property_name'];
                $search_location = $var['search_location'];
                $search_type = $var['search_type'];
                $search_status = $var['search_status'];
            }

            $data['count_property']= $this->property_model->count_properties($search_property_name,$search_location,$search_type,$search_status);
            $config['total_rows'] = $data['count_property'];
        
            //fetch sql data into arrays
            if($search_property_name || $search_location || $search_type || $search_status){
                if($order){
                    $data['property'] = $this->property_model->get_properties($search_property_name, $search_location, $search_type, $search_status, $config['per_page'], $limit_end);        
                }else{
                    $data['property'] = $this->property_model->get_properties($search_property_name, $search_location, $search_type, $search_status, $config['per_page'], $limit_end);           
                }
            }else{
                    $data['property'] = $this->property_model->get_properties('','','','', $config['per_page'], $limit_end);        
            }

        }else{
            
             if(isset($page)){
                $buisness_type_id = $this->session->userdata('buisness_type_selected');
                
                $search_property_name = $filter_session_data['search_property_name'];
                $search_location = $filter_session_data['search_location'];
                $search_type = $filter_session_data['search_type'];
                $search_status = $filter_session_data['search_status'];
   
                // $search_string = array($search_property_name,$search_location,$search_type,$search_status);

            }

        //make the data type var avaible to our view
        
                  $filter_session_data['search_property_name'] = $search_property_name;
                  $filter_session_data['search_location'] = $search_location;
                  $filter_session_data['search_type'] = $search_type;
                  $filter_session_data['search_status'] = $search_status;
                  //save session data into the session
                  $this->session->set_userdata($filter_session_data);
                  
                    // $filter_session_data['search_string_selected'] = $search_string;
                    // $data['search_string_selected'] = $search_string;
                  
                  $data['search_property_name'] = $search_property_name;
                  $data['search_location'] = $search_location;
                  $data['search_type'] = $search_type;
                  $data['search_status'] = $search_status;

            
            
            //fetch sql data into arrays
            $data['count_property']= $this->property_model->count_property();
            $data['property'] = $this->property_model->get_properties('','','','', $config['per_page'], $limit_end);        
            $config['total_rows'] = $this->property_model->count_properties($search_property_name,$search_location,$search_type,$search_status);

        }//!isset($manufacture_id) && !isset($search_string) && !isset($order)

        //initializate the panination helper 
        $this->pagination->initialize($config);   

        //load the view
        if(isset($page)){
            $page_number=$page;
        }else{
            $page_number=1;
        }
        //echo $page_number; die;
        //Code By Me Start
        $data['page_number']= $page_number;
        $data['pending_property'] = $this->property_model->get_product_pending();
        $data['count_property_share']=$this->property_model->count_property_share();
        // echo '<pre>';print_r($data['count_property_share']); die;
        //Code By Me End

        /* Mayank Pawar
        ** Date: 22/12/2014
        */ 
        $data['dropdown_property_type'] = $this->property_model->get_distinct_property_type();
        $data['dropdown_property_status'] = $this->property_model->get_distinct_property_status();
        // echo "<pre>";print_r($data['dropdown_property_status']);die;

        $data['main_content'] = 'admin/property/list';
        $this->load->view('includes/template', $data);  

    }//index

    /* Code By Me Start */
    
    public function add()
    {
        //if save button was clicked, get the data sent via post
        if ($this->input->server('REQUEST_METHOD') === 'POST')
        {
            //form validation
            // $this->form_validation->set_rules('property_reference', 'Property Reference', 'required');
            $this->form_validation->set_rules('property_name', 'Property name', 'required');
            $this->form_validation->set_rules('property_location', 'Property location', 'required');
            $this->form_validation->set_rules('property_initial_price', 'Property initial price', 'required|numeric');
            $this->form_validation->set_rules('property_status', 'property_status', 'required');
            // $this->form_validation->set_rules('property_current_price', 'Property current price', 'required|numeric');
            $this->form_validation->set_rules('min_property_share_limit', 'Current min. Limit', 'required|numeric');
            $this->form_validation->set_rules('min_owned_limit', 'Min. Owned Limit', 'required|numeric');
            $this->form_validation->set_rules('property_type', 'Property type', 'required');
            $this->form_validation->set_rules('property_bedrooms', 'Property bedrooms', 'required|numeric');
            $this->form_validation->set_rules('property_bathrooms', 'Property bathrooms', 'required|numeric');
            $this->form_validation->set_error_delimiters('<div class="alert alert-error"><a class="close" data-dismiss="alert">×</a><strong>', '</strong></div>');
            //if the form has passed through the validation
            if ($this->form_validation->run())
            {
             
             // echo '</pre>'; print_r($_FILES);     die;     
            if($_FILES['sliderfile']['name']) {
                
                $upload_conf = array(
                    'upload_path'   => realpath('uploads/'),
                    'allowed_types' => 'gif|jpg|png',
                    'max_width'  => '1600',
                    'max_height'  => '551'
                );
            
                $this->upload->initialize( $upload_conf );
                
                if (!$this->upload->do_upload('sliderfile')) {
			        $error =  $this->upload->display_errors();
                    
                    $this->session->set_flashdata('flash_message', $error);
               
                    redirect('admin/property/add');
                 
		        } else { 
                    //else, set the success message
			        $data = array('msg' => "Upload success!");
      
                    $data['upload_data'] = $this->upload->data();
      
                    //echo "<pre>"; 
                    //print_r($data['upload_data']); die;
                    if(($data['upload_data']['image_width'] < 1600) and ($data['upload_data']['height'] < 550)){
                         $this->session->set_flashdata('flash_message', 'please select any image of  width = 1600px; max height = 551px;');
                        redirect('admin/property/add?p=1');
                    }

		        }
                unset($_FILES['sliderfile']);
                
            }
    
            $upload_conf = array(
                'upload_path'   => realpath('uploads/'),
                'allowed_types' => 'gif|jpg|png',
                'max_width'  => '484',
	            'max_height'  => '414'
            );
    
            $this->upload->initialize( $upload_conf );
            // Change $_FILES to new vars and loop them
            foreach($_FILES['userfile'] as $key=>$val)
            {
                $i = 0;
                foreach($val as $v)
                {
                    $field_name = "file_".$i;
                    $_FILES[$field_name][$key] = $v;
                    $i++;   
                }
            }
            // Unset the useless one ;)
            unset($_FILES['userfile']);
        
            // Put each errors and upload data to an array
            $error = array();
            $success = array();
            $files_url_main = array();
            // main action to upload each file
            $j=1;
            foreach($_FILES as $field_name => $file)
            {
                
                if ( ! $this->upload->do_upload($field_name))
                {
                    // if upload fail, grab error 
                    $error = array('error' => $this->upload->display_errors());
                        
              
                    $this->session->set_flashdata('flash_message', $error);
               
                    //redirect('admin/property/add');
               
                }  else
               {
             
                    $upload_data = $this->upload->data();
         
                    $files_url = explode("uploads", $upload_data['full_path']); 


                   	$files_url = explode("/", $files_url[1]);
                
                        
                    array_push($files_url_main,$files_url[1]);
              }
                
            }
            
                $slider_url = explode("uploads", $data['upload_data']['full_path']);
                
                $slider_url = explode("/", $slider_url[1]);
               
                // $property_reference = str_replace('"', '', $this->input->post('property_reference'));
                $property_name_str = str_replace('"', '', $this->input->post('property_name'));
                $property_location_str = str_replace('"', '', $this->input->post('property_location'));
                $property_initial_price_str = str_replace('"', '', $this->input->post('property_initial_price'));
                $property_status_str = str_replace('"', '', $this->input->post('property_status'));
                $property_type = str_replace('"', '', $this->input->post('property_type'));
                $property_bedrooms = str_replace('"', '', $this->input->post('property_bedrooms'));
                $property_bathrooms = str_replace('"', '', $this->input->post('property_bathrooms'));
                $property_current_price_str =  str_replace('"', '', $this->input->post('property_initial_price'));
                $min_property_share_limit =  str_replace('"', '', $this->input->post('min_property_share_limit'));
                $min_owned_limit =  str_replace('"', '', $this->input->post('min_owned_limit'));
                $property_description =  $this->input->post('property_description');
    

                 $data_to_store = array(
                    'property_name' => $property_name_str,
                    'property_location' => $property_location_str,
                    'property_initial_price' => $property_initial_price_str,
                    'property_status' => $property_status_str,          
                    'property_current_price' => $property_current_price_str,
                    'property_price_last_update' => $property_current_price_str,
                    'property_type' => $property_type,
                    'property_bedrooms' => $property_bedrooms,
                    'property_bathrooms' => $property_bathrooms,
                    'property_slider_image' => $slider_url[1],
                    'property_image' => $files_url_main[0],
                    'property_image2' => $files_url_main[1],
                    'property_image3' => $files_url_main[2],
                    'property_image4' => $files_url_main[3],
                    'property_image5' => $files_url_main[4],
                    'created' => date('Y-m-d H:i:s'),
                    // 'property_ref' => $property_reference,
                    'min_property_share_limit' => $min_property_share_limit,
                    'min_owned_limit' => $min_owned_limit,
                    'property_description' => $property_description
                    
                );
                //if the insert has returned true then we show the flash message
                if($property_id=$this->property_model->store_product($data_to_store)){
                        /* Property Reference Generator */
                            $reference_gen = str_pad($property_id, 5, '0', STR_PAD_LEFT);
                            $reference_gen = "VH".$reference_gen;
                            $this->property_model->update_property($property_id,$reference_gen);
                        /* End */
                        $price=0;
                        if($property_current_price_str){
                            $price=$property_current_price_str;
                        }else{
                            $price = $property_initial_price_str;
                        }
                    $data_to_store_for_chart = array(
                    'price' => $price,
                    'property_id' => $property_id
                );
                    $this->user_fund_log_model->store_user_chart($data_to_store_for_chart);
                    $data['flash_message'] = TRUE;
                    redirect('admin/property');
                }else{
                    $data['flash_message'] = FALSE; 
                }
            }
        }
        //load the view
        $data['property_type'] = $this->property_type_model->get_property_type();
        $data['main_content'] = 'admin/property/add';
        $this->load->view('includes/template', $data);  
    }       


    /**
    * Update item by his id
    * @return void
    */
    public function update()
    {
        //product id 
        $id = $this->uri->segment(4);
  
        //if save button was clicked, get the data sent via post
        if ($this->input->server('REQUEST_METHOD') === 'POST')
        {
            //form validation
             // $this->form_validation->set_rules('property_reference', 'Property Reference', 'required');
           $this->form_validation->set_rules('property_name', 'Property name', 'required');
            $this->form_validation->set_rules('property_location', 'Property location', 'required');
            $this->form_validation->set_rules('property_initial_price', 'Property initial price', 'required');
            $this->form_validation->set_rules('property_status', 'Property status', 'required');
            $this->form_validation->set_rules('property_current_price', 'Property current price', 'required');
             $this->form_validation->set_rules('property_type', 'Property type', 'required');
             $this->form_validation->set_rules('property_bedrooms', 'Property bedrooms', 'required|numeric');
            $this->form_validation->set_rules('property_bathrooms', 'Property bathrooms', 'required|numeric');
            $this->form_validation->set_rules('min_property_share_limit', 'Current Minimum Share Limit', 'required');
            $this->form_validation->set_rules('min_owned_limit', 'Minimum Owned Limit', 'required');
             
            $this->form_validation->set_error_delimiters('<div class="alert alert-error"><a class="close" data-dismiss="alert">×</a><strong>', '</strong></div>');
            //if the form has passed through the validation
            if ($this->form_validation->run())
            {
                 // $property_reference = str_replace('"', '', $this->input->post('property_reference'));
                $property_name_str = str_replace('"', '', $this->input->post('property_name'));
                $property_location_str = str_replace('"', '', $this->input->post('property_location'));
                $property_initial_price_str = str_replace('"', '', $this->input->post('property_initial_price'));
                $property_status_str = str_replace('"', '', $this->input->post('property_status'));
                $property_type = str_replace('"', '', $this->input->post('property_type'));
                $property_bedrooms = str_replace('"', '', $this->input->post('property_bedrooms')); 
                $property_bathrooms = str_replace('"', '', $this->input->post('property_bathrooms'));
                $property_current_price_str =  str_replace('"', '', $this->input->post('property_current_price'));
                $min_property_share_limit = str_replace('"', '', $this->input->post('min_property_share_limit'));
                $min_owned_limit = str_replace('"', '', $this->input->post('min_owned_limit'));
                $old_slider_url[1] = $this->input->post('old_slider_image');
                $old_image[0] = $this->input->post('old_image1');
                $old_image[1] = $this->input->post('old_image2');
                $old_image[2]= $this->input->post('old_image3');
                $old_image[3]= $this->input->post('old_image4');
                $old_image[4]= $this->input->post('old_image5');
                $property_description =  $this->input->post('property_description');
                
               if($_FILES['sliderfile']['name']) {
                
                 $upload_conf = array(
                    'upload_path'   => realpath('uploads/'),
                    'allowed_types' => 'gif|jpg|png',
                    'max_width'  => '1600',
	                'max_height'  => '551'
                );
            
                $this->upload->initialize( $upload_conf );
                
                if (!$this->upload->do_upload('sliderfile')) {
			        $error =  $this->upload->display_errors();
                    
                    $this->session->set_flashdata('flash_message', $error);
               
                    redirect('admin/property/update/'.$id.'');
                 
		          } else { //else, set the success message
			        $data = array('msg' => "Upload success!");
      
                    $data['upload_data'] = $this->upload->data();
       if(($data['upload_data']['image_width'] < 1600) and ($data['upload_data']['height'] < 550)){
         $this->session->set_flashdata('flash_message', 'please select any image of  width = 1600px; max height = 551px;');
            redirect('admin/property/update/'.$id.'');
        }

		}
        unset($_FILES['sliderfile']);
                
               }
                           
            
                // Change $_FILES to new vars and loop them
                //echo "<pre>"; print_r($_FILES);   
                $upload_conf = array(
                    'upload_path'   => realpath('uploads/'),
                    'allowed_types' => 'gif|jpg|png',
                    'max_width'  => '484',
                    'max_height'  => '414'
                );
    
            $this->upload->initialize( $upload_conf);
                $j=0;
                foreach($_FILES['userfile'] as $key=>$val)
                {
                    $i = 0;
                    // echo $_FILES['userfile']['name'][$j];
                   // print_r($val);
                    //if($_FILES['userfile'][$key][$j] != '') {
                        foreach($val as $v)
                        {
                           /* echo $v." test";
                            echo "<br>";
                            echo $key; die(); */
                            $field_name = "file_".$i;
                            $_FILES[$field_name][$key] = $v;
                     
                          /*  if($v!='' && $key == "name"){
                               
                                    $fileData[$i] = $v;
                                                          
                            }
                            else{
                                $fileData[$i] = $old_image[$i];
                            }*/
                            $i++;  $r++; 
                        }
                    //}
                   /* else{
                        $fileData[$j] = $old_image[$j];
                    }   */
                   if($_FILES['userfile']['name'][$j] == '') {$fileData[$j] = $old_image[$j];}else{$fileData[$j] = "";}
                   $j++;                
                }
                // Unset the useless one ;)
                unset($_FILES['userfile']);
                
                // Put each errors and upload data to an array
                $error = array();
                $success = array();
               $files_url_main = array();
                // main action to upload each file
                $j=1;
            
                foreach($_FILES as $field_name => $file)
                {
                  
                    if($file['tmp_name'] != ''){
                    if ($this->upload->do_upload($field_name))
                    {
                    
                       
                      $upload_data = $this->upload->data();
             
                       $files_url = explode("uploads", $upload_data['full_path']); 
    
    
                             $files_url = explode("/", $files_url[1]);
                    
                            
                             array_push($files_url_main,$files_url[1]);
                        }                        
                    }
                    
                }
             //print_r($files_url_main); die;
                $files_url_count=count($files_url_main);
                $fileDatacount= count($fileData); 
                for($l=0; $l<$files_url_count; $l++){
                 for($k=0; $k<$fileDatacount; $k++){                    
                        if($fileData[$k] == ""){
                            $fileData[$k] = $files_url_main[$l];
                            break;
                        }
                    }
                }
               // echo "<pre>"; print_r($files_url_main);  print_r($fileData); exit;
               // echo "<pre>"; print_r($files_url_main);  print_r($fileData); exit;
                 $slider_url = explode("uploads", $data['upload_data']['full_path']);
                 $slider_url = explode("/", $slider_url[1]);
                 
                 if(empty($files_url_main[0])){
                   $files_url_main[0] = $old_image[0];
                    }
                      if(empty($files_url_main[1])){
                   $files_url_main[1] = $old_image[1];
                    }
                      if(empty($files_url_main[2])){
                   $files_url_main[2] = $old_image[2];
                    }
                      if(empty($files_url_main[3])){
                   $files_url_main[3] = $old_image[3];
                    }
                      if(empty($files_url_main[4])){
                   $files_url_main[4] = $old_image[4];
                    }
                    
                     if(empty($slider_url[1])){
                  $slider_url[1] = $old_slider_url[1];
                    }
                $data_to_store = array(
                    'property_name' => $property_name_str,
                    'property_location' => $property_location_str,
                    'property_initial_price' => $property_initial_price_str,
                    'property_status' => $property_status_str,          
                    'property_current_price' => $property_current_price_str,
                    'property_price_last_update' => $property_current_price_str,
                    'property_type' => $property_type,
                    'property_bedrooms' => $property_bedrooms,
                    'property_bathrooms' => $property_bathrooms,
                    'property_slider_image' => $slider_url[1],
                    'property_image' => $fileData[0],
                    'property_image2' => $fileData[1],
                    'property_image3' => $fileData[2],
                    'property_image4' => $fileData[3],
                    'property_image5' => $fileData[4],
                    // 'property_ref' => $property_reference,
                    'min_property_share_limit' => $min_property_share_limit,
                    'min_owned_limit' => $min_owned_limit,
                    'property_description' =>  $property_description
                );
                
                
                //if the insert has returned true then we show the flash message
                if($this->property_model->update_product($id, $data_to_store) == TRUE){
                     $price=0;
                        if($property_current_price_str){ $price=$property_current_price_str;
                        }else{ $price = $property_initial_price_str;
                        }
                    $data_to_store_for_chart = array(
                    'price' => $price,
                    'property_id' => $id
                );
                    $this->user_fund_log_model->store_user_chart($data_to_store_for_chart);
                    $this->session->set_flashdata('flash_message', 'updated');
                }else{
                    $this->session->set_flashdata('flash_message', 'not_updated');
                }
                redirect('admin/property/update/'.$id.'');

            }//validation run

        }

        //if we are updating, and the data did not pass trough the validation
        //the code below wel reload the current data

        //product data 
        $data['property'] = $this->property_model->get_products_by_id($id);
         $data['property_type'] = $this->property_type_model->get_property_type();
        //load the view
        $data['main_content'] = 'admin/property/edit';
        $this->load->view('includes/template', $data);            

    }//update
     
     
         /* Code By Me  End */
    /**
    * Delete product by his id
    * @return void
    */
    public function delete()
    {
        //product id 
        $id = $this->uri->segment(4);
        $this->property_model->delete_product($id);
        redirect('admin/property');
    }//edit
    
    //Code By Me Start
    
    public function withdraw(){
         //product id 
        $id = $this->uri->segment(4);
        $this->property_model->change_status_of_property($id);
        $property= $this->property_model->get_product_by_id($id);
       // print_r($property); die;
        foreach($property as $property){
        if(!empty($property['property_current_price'])){
            $share_price=number_format($property['property_current_price']/100, 2);
        }else{
            $share_price=number_format($property['property_initial_price']/100, 2);
        }
        $user_property=$this->user_property_model->get_user_property_by_property_id($property['id']);
        foreach($user_property as $user_property){
            $withdraw_price= number_format($user_property['property_share_in_per']*$share_price, 2);
            $credit_price =  $this->credit_price_model->get_credit_price();
			
	    $number_of_token= number_format($withdraw_price/$credit_price[0]['price']);
            $data_to_store=array(
              'fund_type'=>'WithdrawByAdmin',
              'user_id'=> $user_property['user_id'],
              'detail'=>'pending',
              'debit'=>0.00,
              'credit'=>0.00,
              'property_id'=>$user_property['property_id']
                                 
                 );
            $this->user_fund_log_model->store_user_credit($data_to_store);
         $data_to_store = array(
				'user_id' => $user_property['user_id'],
				'fund_amt' => $withdraw_price,
				'number_of_token' => $number_of_token,
				'status' => 'Withdrawadmin',
                                'property_id'=>$user_property['property_id']
	    );
	   $this->withdraw_model->store_withdraw($data_to_store);
            
        }
        }
       redirect('admin/withdrawadmin');
    }
   //Code By Me End

    /* Mayank Pawar
    ** Date: 23/12/2014
    */
    public function view(){
        $property_id = $this->uri->segment(4);

        if($this->input->get('prop_status')){
            $property_enable_disable = $this->input->get('prop_status');
            if($property_enable_disable == "disable"){
              $prop_status = 0;  
            }else{
              $prop_status = 1;  
            }
            $this->property_model->update_property_enable_disable($property_id,$prop_status);
            
        }

        //load the view
        $data['property_type'] = $this->property_type_model->get_property_type();
        $data['main_content'] = 'admin/property/view';
        $data['property']=$this->property_model->get_products_by_id($property_id);
        $this->load->view('includes/template', $data);  

    }

    public function share_list(){
        
        $property_id = $this->uri->segment(4);

        /* For Search by Name */
        if($this->input->post('mysubmit')){
            $search_name_string = $this->input->post('name');
            $data['shares'] = $this->user_property_model->search_by_username($property_id,$search_name_string);
            $data['name'] = $search_name_string;
        }/*-- Search by Name End --*/
        else{
            $data['shares'] = $this->user_property_model->get_property_id_shares($property_id); 
        }
        //load the view
        $data['main_content'] = 'admin/property/share_list';
        $this->load->view('includes/template', $data);          
    }

    public function revert(){
        //product id 
        $id = $this->uri->segment(4);
        $this->property_model->update_property_enable_disable_date($id);
        redirect('admin/property');
    }

    public function finalize($id){
        $data['id'] = $id;
        if($this->input->post('approved')){
            $user_share = $this->input->post('user_share');
            $share_val = $this->input->post('share_val');
            $user_profit_loss = $this->input->post('user_profit_loss');
            $user_amount = $this->input->post('user_amount');
            $user_property_name = $this->input->post('user_property_name');
            $user_property_id = $this->input->post('user_property_id');
            foreach($user_share as $uid => $row){

                /* Deposit Fund Release Section */
                $data_pass = array('user_id'=>$uid, 
                                    'fund_type'=>'Final',
                                    'detail' => 'Deposit by Admin for Property '.$user_property_name[$uid].', Total Share '.$user_share[$uid].' of amt '.$share_val[$uid].' MYR and Profit/Loss of '.$user_profit_loss[$uid].' MYR', 
                                    'debit' => $user_amount[$uid],
                                    'property_id' => $user_property_id[$uid]);
                
                $this->user_fund_log_model->store_user_credit($data_pass);
                
                $credit_det = $this->credit_price_model->get_credit_price();
                $get_credit_price = $credit_det[0]['price'];
                
                $user_credit_det = $this->user_credit_model->get_user_credit_by_user_id($uid);
                $user_credit = $user_credit_det[0]['credit'];

                /* Add Credit section */
                $credit_amt = ($user_credit + ($user_amount[$uid] / $get_credit_price));
                $data_pass2 = array('credit'=> $credit_amt);
                
                $this->user_credit_model->update_user_credit_by_user_id($uid,$data_pass2);

                
                /* Remove Share from User Property */
                $data_pass3 = array('property_share_in_per'=> 0,
                                    'sell_property_share'=> 0,
                                    'share_fund_release' => $user_share[$uid]);
                
                $this->user_property_model->update_user_property($uid, $id, $data_pass3);

            }
            
            $data_pass1 = array('property_enable_disable'=>'3');
            $return = $this->property_model->update_product($id,$data_pass1);
            
            if($return){
                echo '<script>
                        parent.$.fancybox.close();
                    </script>';    
            }
            
            // redirect('admin/property');
        }

        $data['property_details']  = $this->property_model->get_product_by_id($id);
        $data['user_profit_details'] = $this->user_property_model->get_final_property_price($id);
        $data['profit_and_loss'] = $this->user_fund_log_model->get_profit_loss($id);
        // echo "<pre>";print_r($data['user_profit_details']);die;
        $this->load->view('admin/property/finalize',$data);
    }

    public function withdraw_property($id){
        $data['id'] = $id;
        if($this->input->post('approved')){
            $user_share = $this->input->post('user_share');
            $share_val = $this->input->post('share_val');
            $user_transaction = $this->input->post('user_transaction');
            $user_amount = $this->input->post('user_amount');
            $user_property_name = $this->input->post('user_property_name');
            $user_property_id = $this->input->post('user_property_id');
            
            foreach($user_share as $uid => $row){
                /* Deposit Fund Release Section */
                $data_pass = array('user_id'=>$uid, 
                                    'fund_type'=>'Final',
                                    'detail' => 'Refund by Admin for Property '.$user_property_name[$uid].', Total Share '.$user_share[$uid].' of amt '.$share_val[$uid].' MYR and Transaction Charge of '.$user_transaction[$uid].' MYR', 
                                    'debit' => $user_amount[$uid],
                                    'property_id' => $user_property_id[$uid]);
                
                $this->user_fund_log_model->store_user_credit($data_pass);

                $data_pass1 = array('user_id'=>$uid, 
                                    'fund_type'=>'Refund',
                                    'detail' => 'Refund by Admin for Property '.$user_property_name[$uid].', Total Share '.$user_share[$uid].' of amt '.$user_transaction[$uid].' MYR', 
                                    'credit' => $user_transaction[$uid],
                                    'share' => $user_share[$uid],
                                    'property_id' => $user_property_id[$uid]);
                
                $this->user_autotracking_log_model->set_autotracking_log($data_pass1);
                
                $credit_det = $this->credit_price_model->get_credit_price();
                $get_credit_price = $credit_det[0]['price'];
                
                $user_credit_det = $this->user_credit_model->get_user_credit_by_user_id($uid);
                $user_credit = $user_credit_det[0]['credit'];

                /* Add Credit section */
                $credit_amt = ($user_credit + ($user_amount[$uid] / $get_credit_price));
                $data_pass2 = array('credit'=> $credit_amt);
                
                $this->user_credit_model->update_user_credit_by_user_id($uid,$data_pass2);

                
                /* Remove Share from User Property */
                $data_pass3 = array('property_share_in_per'=> 0,
                                    'sell_property_share'=> 0,
                                    'share_fund_release' => $user_share[$uid]);
                
                $this->user_property_model->update_user_property($uid, $id, $data_pass3);

            }
            
            $data_pass1 = array('property_enable_disable'=>'3');
            $return = $this->property_model->update_product($id,$data_pass1);
            
            if($return){
                echo '<script>
                        parent.$.fancybox.close();
                    </script>';    
                    redirect('admin/property');
            }
            
            
        }

        $data['property_details']  = $this->property_model->get_product_by_id($id);
        $data['user_trans_details'] = $this->user_property_model->get_final_property_price_tran($id);
        $data['profit_and_loss'] = $this->user_fund_log_model->get_profit_loss($id);
        // echo "<pre>";print_r($data['user_profit_details']);die;
        $this->load->view('admin/property/withdraw_property',$data);
    }

    public function update_banner(){
        $val = $this->input->post('banner');
        $property_id = $this->input->post('property_id');
        $this->property_model->update_banner($property_id,$val);
    }   
}
