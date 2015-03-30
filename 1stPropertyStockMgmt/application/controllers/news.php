<?php
/*
 * Fuse
 *
 * A simple open source ticket management system. 
 *
 * @package		Fuse
 * @author		Vivek. V
 * @link		http://getvivekv.bitbucket.org/Fuse
 * @link		http://www.vivekv.com
 */

class News extends CI_Controller
{

	var $template = 'default';
	var $data = array(
		'title',
		'Reset Password'
	);

	function __construct(){
		parent::__construct();
		$this->load->model("Emails");
                $this->load->model("news_model");
		   if(( $this->session->userdata('is_logged_in') && ($this->session->userdata('type') != 'admin')) ){
            redirect('admin/login');
           
        }
        
          if(( !$this->session->userdata('is_logged_in')) ){
            redirect('admin/login');
           
        }
         
	}

	function index(){
            //error_reporting(2);
            $data['main_content'] = 'admin/news/list';
            $condition = '';
            $count = $this->news_model->findCount('news');
            
           // echo 'sfgsdfgsfg';exit;
            $config['base_url'] = base_url().'admin/news/index';
            $config['total_rows'] = $count;
            $config['per_page'] = PAGE_LIMIT; 
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
            $this->pagination->initialize($config);
            $results = $this->news_model->findAll('news',$condition,$offset);
            
            
            $data['results'] = $results;
            $this->load->view('includes/template', $data);  
	}
        
        public function add(){
            //if save button was clicked, get the data sent via post
            if ($this->input->server('REQUEST_METHOD') === 'POST'){
                //form validation
                $this->form_validation->set_rules('title', 'Title', 'required');
                $this->form_validation->set_rules('body', 'body', 'required');
                //if the form has passed through the validation
                if ($this->form_validation->run() == FALSE){
                    $data['flash_message'] = FALSE; 
                }else{
                    $data = $this->input->post();
                    $data['auther_id'] = $this->session->userdata('user_id');
                    $data['created'] = date('Y-m-d H:i:s');
                    $id = $this->news_model->add('news',$data);
                    if($id !=''){
                        redirect('/admin/news');  
                    }
                }
            }
            $data['main_content'] = 'admin/news/add';
            $this->load->view('includes/template', $data);
      }
      
      public function edit($id){
            //if save button was clicked, get the data sent via post
          //echo $id;exit;
            if ($this->input->server('REQUEST_METHOD') === 'POST'){
                //form validation
                $this->form_validation->set_rules('title', 'Title', 'required');
                $this->form_validation->set_rules('body', 'body', 'required');
                //if the form has passed through the validation
                if ($this->form_validation->run() == FALSE){
                    $data['flash_message'] = FALSE; 
                }else{
                    $data = $this->input->post();
                    //$data['auther_id'] = $this->session->userdata('user_id');
                    $data['modified'] = date('Y-m-d H:i:s');
                    $id = $this->news_model->edit('news',$data,$id);
                    redirect('/admin/news');  
                }
            }
            $getdata = $this->news_model->findById('news',$id);
            //print_r($getdata);exit;
            $data['result'] = $getdata;
            $data['main_content'] = 'admin/news/edit';
            $this->load->view('includes/template', $data);
      }
      
      
      public function delete($id){
          $this->news_model->delete('news','id',$id);
          redirect('/admin/news');  
      }
      public function viewmessage($id){
          $data['data'] = $this->news_model->findbyjoin('news',$id);
          //$data['data'] = $this->news_model->findById('news',$id);
          $this->load->view('admin/news/viewmessage',$data);
      }

}
