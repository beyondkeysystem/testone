<?php
class Admin_property_type extends CI_Controller {

    /**
    * name of the folder responsible for the views 
    * which are manipulated by this controller
    * @constant string
    */
    const VIEW_FOLDER = 'admin/property_type';
 
    /**
    * Responsable for auto load the model
    * @return void
    */
    public function __construct()
    {
        parent::__construct();
        $this->load->model('property_type_model');

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

        //all the posts sent by the view
        $search_string = $this->input->post('search_string');        
        $order = $this->input->post('order'); 
        ////$order_type = $this->input->post('order_type');
        
        

        //pagination settings
        $config['per_page'] = 20;

        $config['base_url'] = base_url().'admin/property_type';
        $config['use_page_numbers'] = TRUE;
        $config['num_links'] = 5;
        $config['full_tag_open'] = '<ul>';
        $config['full_tag_close'] = '</ul>';
        $config['num_tag_open'] = '<li>';
        $config['num_tag_close'] = '</li>';
        $config['cur_tag_open'] = '<li class="active"><a>';
        $config['cur_tag_close'] = '</a></li>';

        $data['per_page'] = $config['per_page'];
        
        //limit end
        $page = $this->uri->segment(3);

        //math to get the initial record to be select in the database
        $limit_end = ($page * $config['per_page']) - $config['per_page'];
        if ($limit_end < 0){
            $limit_end = 0;
        } 

        //if order type was changed
    
        //we must avoid a page reload with the previous session data
        //if any filter post was sent, then it's the first time we load the content
        //in this case we clean the session filter data
        //if any filter post was sent but we are in some page, we must load the session data

        //filtered && || paginated
           if ($this->input->server('REQUEST_METHOD') === 'POST')
        {
            
      
            
         if($search_string!= '' && $order != '' )
         { 
           
           
            /*
            The comments here are the same for line 79 until 99

            if post is not null, we store it in session data array
            if is null, we use the session data already stored
            we save order into the the var to load the view with the param already selected       
            */
           
            
            
      
        
                    if($property_type_id !== 0){
                $filter_session_data['property_type_selected'] = $property_type_id;
            }else{
                $property_type_id = $this->session->userdata('property_type_selected');
                $filter_session_data['property_type_selected'] = '';
            }
            $data['property_type_selected'] = $property_type_id;
            
            

            if($search_string){
                $filter_session_data['search_string_selected'] = $search_string;
            }else{
                $search_string = $this->session->userdata('search_string_selected');
                
              $filter_session_data['search_string_selected'] = '';
            }
            $data['search_string_selected'] = $search_string;
            

            if($order){
                $filter_session_data['order'] = $order;
            }
            else{
                $order = $this->session->userdata('order');
                      $filter_session_data['order'] = '';
            }
            $data['order'] = $order;
            
          

            //save session data into the session
            //save session data into the session
            if(isset($filter_session_data)){
              $this->session->set_userdata($filter_session_data);    
            }
            }}else{

            //clean filter data inside section
             //
            
        
                    if($property_type_id !== 0){
                $filter_session_data['property_type_selected'] = $property_type_id;
            }else{
                $property_type_id = $this->session->userdata('property_type_selected');
                $filter_session_data['property_type_selected'] = '';
            }
            $data['property_type_selected'] = $property_type_id;
            
            

            if($search_string){
                $filter_session_data['search_string_selected'] = $search_string;
            }else{
                $search_string = $this->session->userdata('search_string_selected');
                
              $filter_session_data['search_string_selected'] = '';
            }
            $data['search_string_selected'] = $search_string;
            

            if($order){
                $filter_session_data['order'] = $order;
            }
            else{
                $order = $this->session->userdata('order');
                      $filter_session_data['order'] = '';
            }
            $data['order'] = $order;
            
          

            //save session data into the session
            //save session data into the session
            if(isset($filter_session_data)){
              $this->session->set_userdata($filter_session_data);    
            }
            }
   
            //       echo $search_string;
            //echo $order_type;
            //echo $order;
            //
            //die;
   
            //fetch sql data into arrays
            $data['count_products']= $this->property_type_model->count_property_type($search_string, $order);
            $config['total_rows'] = $data['count_products'];

            //fetch sql data into arrays
            if($search_string){
                if($order){
                    $data['property_type'] = $this->property_type_model->get_property_type($search_string, $order, $order_type, $config['per_page'],$limit_end);        
                }else{
                    $data['property_type'] = $this->property_type_model->get_property_type($search_string, '', $order_type, $config['per_page'],$limit_end);           
                }
            }else{
                if($order){
                    $data['property_type'] = $this->property_type_model->get_property_type('', $order, $order_type, $config['per_page'],$limit_end);        
                }else{
                    $data['property_type'] = $this->property_type_model->get_property_type('', '', $order_type, $config['per_page'],$limit_end);        
                }
            }

       

        

       
         
        //initializate the panination helper 
        $this->pagination->initialize($config);   

        //load the view
        $data['main_content'] = 'admin/property_type/list';
        $this->load->view('includes/template', $data);  

    }//index

    public function add()
    {
        //if save button was clicked, get the data sent via post
        if ($this->input->server('REQUEST_METHOD') === 'POST')
        {

            //form validation
            $this->form_validation->set_rules('type', 'type', 'required|unique');
            $this->form_validation->set_error_delimiters('<div class="alert alert-error"><a class="close" data-dismiss="alert">×</a><strong>', '</strong></div>');
            

            //if the form has passed through the validation
            if ($this->form_validation->run())
            {
                $type_str = str_replace('"', '', $this->input->post('type'));
                if($this->property_type_model->check_type($type_str) == false)
				{
					$data['message'] = 'Type is already exist';
                                       $data['main_content'] = 'admin/property_type/add';
                                      $this->load->view('includes/template', $data);  
					redirect('admin/property_type/add?m=1');
					
				}
        
                $data_to_store = array(
                    'type' => $type_str,
                );
                //if the insert has returned true then we show the flash message
                if($this->property_type_model->store_property_type($data_to_store)){
                    $data['flash_message'] = TRUE;
                     redirect('admin/property_type');
                }else{
                    $data['flash_message'] = FALSE; 
                }

            }

        }
        //load the view
        $data['main_content'] = 'admin/property_type/add';
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
            $this->form_validation->set_rules('type', 'type', 'required');
            $this->form_validation->set_error_delimiters('<div class="alert alert-error"><a class="close" data-dismiss="alert">×</a><strong>', '</strong></div>');
            //if the form has passed through the validation
            if ($this->form_validation->run())
            {
                 $type_str = str_replace('"', '', $this->input->post('type'));
                $data_to_store = array(
                    'type' => $type_str,
                );
                //if the insert has returned true then we show the flash message
                if($this->property_type_model->update_property_type($id, $data_to_store) == TRUE){
                    $this->session->set_flashdata('flash_message', 'updated');
                }else{
                    $this->session->set_flashdata('flash_message', 'not_updated');
                }
                redirect('admin/property_type/update/'.$id.'');

            }//validation run

        }

        //if we are updating, and the data did not pass trough the validation
        //the code below wel reload the current data

        //product data 
        $data['property_type'] = $this->property_type_model->get_property_type_by_id($id);
        //load the view
        $data['main_content'] = 'admin/property_type/edit';
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
        $this->property_type_model->delete_property_type($id);
        redirect('admin/property_type');
    }//edit

}