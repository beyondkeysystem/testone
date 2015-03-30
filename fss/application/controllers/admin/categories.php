<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

include dirname(__FILE__).'/controller.php';
class Categories extends Controller {
	public function __construct(){
            parent::__construct();
            
       }
       
       public function manage(){
           $data['data'] = '';
            $data['page'] = 'admin/categories/manage';
            $search = $this->input->get('search');
            $condition = '';
            if(isset($search) and $search !=''){
                $condition = 'category_name like "%'.addslashes(trim($search)).'%"';
            }
            $count = $this->common->findCount('categories',$condition);
            
            /*$config['base_url'] = PAGE_URL.'/admin/categories/manage/';
            $config['total_rows'] = $count;
            $config['per_page'] = PAGE_LIMIT; 
            //$config['page_query_string'] = TRUE;
            $config['uri_segment']=4;
            $config['full_tag_open'] = '<ul>';
            $config['full_tag_close'] = '</ul>';
            $config['num_tag_open'] = '<li>';
            $config['num_tag_close'] = '</li>';
            $config['cur_tag_open'] = '<li class="active"><a>';
            $config['cur_tag_close'] = '</a></li>';
            	if($this->uri->segment(4)==''){
                    $offset =0;
                }else{
                    $offset = $this->uri->segment(4);
                }
            $this->pagination->initialize($config);*/
            $results = $this->common->findAll('categories',$condition);
            $data['results'] = $results;
            $this->load->view('layout/admin_default',$data);
       }       
       
       public function create(){
           //pr($_POST);exit;
            $data['data'] = '';
            $data['title'] = 'Admin create Advertise';
            $data['page'] = 'admin/categories/create';
            
            $condition = 'is_active = "1"';
            $results = $this->common->findList('advertise',$condition);
            $advertise = array();
            foreach($results as $result){
                $advertise[$result->id] = $result->advertise_name;
            }
            if(!empty($advertise)){
                $data['advertises'] = $advertise;
            }
            //pr($results);
            $data['data'] = $this->input->post();
            $this->form_validation->set_rules('categories[category_name]', 'category name', 'required|xss_clean|is_unique[categories.category_name]');
            $this->form_validation->set_rules('categories[adverties_id]', 'adverties name', 'required|xss_clean');
            if ($this->form_validation->run() == FALSE){
            }else{
               $data = $this->input->post();
                $id = $this->common->save($data);
                if($id !=''){
                    redirect('/admin/categories/manage/');  
                }
            }
            $this->load->view('layout/admin_default',$data);
       }
       
       public function update($id){
            $data['data'] = '';
            $data['title'] = 'Admin Edit Ads';
            $data['page'] = 'admin/categories/create';
            $data['data'] = $this->input->post();
            $condition = 'is_active = "1" and id ="'.$id.'"';
            $results = $this->common->findList('categories',$condition);
            $advertise = array();
            foreach($results as $result){
                $advertise[$result->id] = $result->advertise_name;
            }
            if(!empty($advertise)){
                $data['advertises'] = $advertise;
            }
            $this->form_validation->set_rules('categories[category_name]', 'category name', 'required|xss_clean|edit_unique[categories.category_name]');
            //$this->form_validation->set_rules('categories[adverties_id]', 'adverties name', 'required|xss_clean');
            if ($this->form_validation->run() == FALSE){
            }else{
                $data = $this->input->post();
                //pr($data);exit;
                $id = $this->common->update($this->input->post(),$id);
                //if($id !=''){
                $this->session->set_flashdata('msg', '<div class="successmsg">Category has been updated successfully</div>');
                    redirect('/admin/categories/manage/');  
                //}
                //pr($data);exit;
            }
            $data['categories'] = (array)$this->common->findByAttr('categories','id',$id);
            $this->load->view('layout/admin_default',$data);
       }
       
       public function delete($id){
           $id = $this->common->delete('categories','id',$id);
            redirect('/admin/categories/manage/');
       }
       
        public function is_archive($id,$flag){
            $data['categories']['is_active'] = $flag;
           // pr($data);exit;
            $id = $this->common->update($data,$id);
            redirect('/admin/categories/manage/');
        }
}