<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

include dirname(__FILE__).'/controller.php';
class Welcome extends Controller {
        public function __construct(){
            parent::__construct();
            
        }
	public function index(){
            $data['data'] = '';
            $condition = "is_active = '1'";
            $categories = $this->common->findList('categories',$condition);
            $data['categories'] = $categories;
            $data['page'] = 'home';
            $data['title']= 'Home';
            $results = $this->magazine->get_all_published_magazine();
            $count = $this->magazine->count_approved_magazines();
            $data['results']= $results;
            $data['count']= $count;
            $this->load->view('layout/home',$data);
	}
        
        public function addmoremag(){
            $count = $this->input->post('page_num');
            $results = $this->magazine->get_all_published_more_magazine($count);
            $data['results']= $results;
            $this->load->view('addmore1',$data);
        }
        
        public function aboutus(){
            $data['data'] = '';
           
            $data['page'] = 'aboutus';
            $data['title']= 'Ablut us';
            
            $this->load->view('layout/home',$data);
        }
        
        public function contactus(){
            $data['data'] = '';
           
            $data['page'] = 'contactus';
            $data['title']= 'Contact us';
            
            $this->load->view('layout/home',$data);
        }
        
        public function joinus(){
            $data['data'] = '';
           
            $data['page'] = 'joinus';
            $data['title']= 'Join us';
            
            $this->load->view('layout/home',$data);
        }
        
        public function faq(){
            $data['data'] = '';
           
            $data['page'] = 'faq';
            $data['title']= 'FAQ';
            
            $this->load->view('layout/home',$data);
        }
        
        public function sitemap(){
            $data['data'] = '';
           
            $data['page'] = 'sitemap';
            $data['title']= 'Site Map';
            
            $this->load->view('layout/home',$data);
        }
        
}