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

        if(!$this->session->userdata('is_logged_in')){
            redirect('admin/login');
           
        }
         
    }
 
    /**
    * Load the main view with all the current model model's data.
    * @return void
    */
    public function index()
    {
       $filter_session_data = array();
        //all the posts sent by the view  
        $search_string = $this->input->post('search_string');        
        $order = $this->input->post('order'); 
        $order_type = $this->input->post('order_type'); 

        //pagination settings
        $config['per_page'] = 5;
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
        if($order_type){
            $filter_session_data['order_type'] = $order_type;
        }
        else{
            //we have something stored in the session? 
            if($this->session->userdata('order_type')){
                $order_type = $this->session->userdata('order_type');    
            }else{
                //if we have nothing inside session, so it's the default "Asc"
                $order_type = 'Asc';    
            }
        }
        //make the data type var avaible to our view
        $data['order_type_selected'] = $order_type;        


        //we must avoid a page reload with the previous session data
        //if any filter post was sent, then it's the first time we load the content
        //in this case we clean the session filter data
        //if any filter post was sent but we are in some page, we must load the session data

        //filtered && || paginated
        if($search_string !== false or $order !== false or $this->uri->segment(3) == true){ 
           
            /*
            The comments here are the same for line 79 until 99

            if post is not null, we store it in session data array
            if is null, we use the session data already stored
            we save order into the the var to load the view with the param already selected       
            */
             
        
         
                $filter_session_data['search_string_selected'] = $search_string;
          
            $data['search_string_selected'] = $search_string;

         
                $filter_session_data['order'] = $order;
           
            $data['order'] = $order;

            //save session data into the session
            $this->session->set_userdata($filter_session_data);


            $data['count_property']= $this->property_model->count_property($search_string, $order);
            $config['total_rows'] = $data['count_property'];

            //fetch sql data into arrays
            if($search_string){
                if($order){
                    $data['property'] = $this->property_model->get_property($search_string, $order, $order_type, $config['per_page'], $limit_end);        
                }else{
                    $data['property'] = $this->property_model->get_property($search_string, '', $order_type, $config['per_page'], $limit_end);           
                }
            }else{
                if($order){
                    $data['property'] = $this->property_model->get_property('', $order, $order_type, $config['per_page'], $limit_end);        
                }else{
                    $data['property'] = $this->property_model->get_property('', '', $order_type, $config['per_page'], $limit_end);        
                }
            }

        }else{
            
             if(isset($page)){
    $buisness_type_id = $this->session->userdata('buisness_type_selected');
$order = $this->session->userdata('order');
$search_string = $this->session->userdata('search_string_selected');
$order_type = $this->session->userdata('order_type'); 
}

            //if order type was changed
        if($order_type){
            $filter_session_data['order_type'] = $order_type;
        }
        else{
            //we have something stored in the session? 
            if($this->session->userdata('order_type')){
                $order_type = $this->session->userdata('order_type');    
            }else{
                //if we have nothing inside session, so it's the default "Asc"
                $order_type = 'Asc';    
            }
        }
        //make the data type var avaible to our view
        $data['order_type_selected'] = $order_type;
        
        
                $filter_session_data['search_string_selected'] = $search_string;
          
            $data['search_string_selected'] = $search_string;

         
                $filter_session_data['order'] = $order;
           
            $data['order'] = $order;

            //save session data into the session
            $this->session->set_userdata($filter_session_data);
            
            //fetch sql data into arrays
            $data['count_property']= $this->property_model->count_property();
            $data['property'] = $this->property_model->get_property('', '', $order_type, $config['per_page'], $limit_end);        
            $config['total_rows'] = $this->property_model->count_property($search_string, $order);

        }//!isset($manufacture_id) && !isset($search_string) && !isset($order)

        //initializate the panination helper 
        $this->pagination->initialize($config);   

        //load the view
        $data['main_content'] = 'admin/property/list';
        $this->load->view('includes/template', $data);  

    }//index

    public function add()
    {
        //if save button was clicked, get the data sent via post
        if ($this->input->server('REQUEST_METHOD') === 'POST')
        {
            //form validation
            $this->form_validation->set_rules('property_name', 'Property name', 'required');
            $this->form_validation->set_rules('property_location', 'Property location', 'required');
            $this->form_validation->set_rules('property_initial_price', 'Property initial price', 'required');
            $this->form_validation->set_rules('property_status', 'property_status', 'required');
            $this->form_validation->set_rules('property_current_price', 'Property current price', 'required');
            $this->form_validation->set_rules('property_type', 'Property type', 'required');
            $this->form_validation->set_rules('property_bedrooms', 'Property bedrooms', 'required|numeric');
            $this->form_validation->set_rules('property_bathrooms', 'Property bathrooms', 'required|numeric');
            $this->form_validation->set_error_delimiters('<div class="alert alert-error"><a class="close" data-dismiss="alert">×</a><strong>', '</strong></div>');
            //if the form has passed through the validation
            if ($this->form_validation->run())
            {
                $property_name_str = str_replace('"', '', $this->input->post('property_name'));
                $property_location_str = str_replace('"', '', $this->input->post('property_location'));
                $property_initial_price_str = str_replace('$', '', $this->input->post('property_initial_price'));
                $property_status_str = str_replace('"', '', $this->input->post('property_status'));
                $property_type = str_replace('"', '', $this->input->post('property_type'));
                $property_bedrooms = str_replace('"', '', $this->input->post('property_bedrooms'));
                $property_bathrooms = str_replace('"', '', $this->input->post('property_bathrooms'));
                $property_current_price_str =  str_replace('$', '', $this->input->post('property_current_price'));
                $data_to_store = array(
                    'property_name' => $property_name_str,
                    'property_location' => $property_location_str,
                    'property_initial_price' => $property_initial_price_str,
                    'property_status' => $property_status_str,          
                    'property_current_price' => $property_current_price_str,
                    'property_price_last_update' => $property_current_price_str,
                    'property_type' => $property_type,
                    'property_bedrooms' => $property_bedrooms,
                    'property_bathrooms' => $property_bathrooms
                    
                );
                //if the insert has returned true then we show the flash message
                if($this->property_model->store_product($data_to_store)){
                    $data['flash_message'] = TRUE; 
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
           $this->form_validation->set_rules('property_name', 'Property name', 'required');
            $this->form_validation->set_rules('property_location', 'Property location', 'required');
            $this->form_validation->set_rules('property_initial_price', 'Property initial price', 'required');
            $this->form_validation->set_rules('property_status', 'Property status', 'required');
            $this->form_validation->set_rules('property_current_price', 'Property current price', 'required');
             $this->form_validation->set_rules('property_type', 'Property type', 'required');
             $this->form_validation->set_rules('property_bedrooms', 'Property bedrooms', 'required|numeric');
            $this->form_validation->set_rules('property_bathrooms', 'Property bathrooms', 'required|numeric');
             
            $this->form_validation->set_error_delimiters('<div class="alert alert-error"><a class="close" data-dismiss="alert">×</a><strong>', '</strong></div>');
            //if the form has passed through the validation
            if ($this->form_validation->run())
            {
    
                $property_name_str = str_replace('"', '', $this->input->post('property_name'));
                $property_location_str = str_replace('"', '', $this->input->post('property_location'));
                $property_initial_price_str = str_replace('$', '', $this->input->post('property_initial_price'));
                $property_status_str = str_replace('"', '', $this->input->post('property_status'));
                $property_type = str_replace('"', '', $this->input->post('property_type'));
                $property_bedrooms = str_replace('"', '', $this->input->post('property_bedrooms')); 
                $property_bathrooms = str_replace('"', '', $this->input->post('property_bathrooms'));
                $property_current_price_str =  str_replace('$', '', $this->input->post('property_current_price'));
                $data_to_store = array(
                    'property_name' => $property_name_str,
                    'property_location' => $property_location_str,
                    'property_initial_price' => $property_initial_price_str,
                    'property_status' => $property_status_str,          
                    'property_current_price' => $property_current_price_str,
                    'property_price_last_update' => $property_current_price_str,
                    'property_type' => $property_type,
                    'property_bedrooms' => $property_bedrooms,
                    'property_bathrooms' => $property_bathrooms
                    
                );
                //if the insert has returned true then we show the flash message
                if($this->property_model->update_product($id, $data_to_store) == TRUE){
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
        $data['property'] = $this->property_model->get_product_by_id($id);
         $data['property_type'] = $this->property_type_model->get_property_type();
        //load the view
        $data['main_content'] = 'admin/property/edit';
        $this->load->view('includes/template', $data);            

    }//update

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

}
