<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

include dirname(__FILE__).'/controller.php';
class Magazines extends Controller {
	public function __construct(){
            parent::__construct();
       }
       
       public function index(){
            $data['data'] = '';
            $data['page'] = 'admin/magazines/index';
            $search = $this->input->get('search');
            $results = $this->magazine->get_magazines();
            $data['results'] = $results;
            $this->load->view('layout/admin_default',$data);
       }   
       
       public function approved(){
            $data['data'] = '';
            $data['page'] = 'admin/magazines/approved';
            $search = $this->input->get('search');
            $condition = 'is_published = "1" and articles.is_active="1" and is_delete = "0"';
            $results = $this->magazine->approved($condition);
            //pr($results);exit;
            $data['results'] = $results;
            $this->load->view('layout/admin_default',$data);
       }   
       
       public function unapprove(){
            $data['data'] = '';
            $data['page'] = 'admin/magazines/approved';
            $search = $this->input->get('search');
            $condition = 'is_published = "0" and articles.is_active="0" and is_delete = "0"';
            $results = $this->magazine->approved($condition);
            //pr($results);exit;
            $data['results'] = $results;
            $this->load->view('layout/admin_default',$data);
       } 
       
       public function delete($id,$flag){
           $result = $this->common->findByAttr('articles','id',$id);
           if(!empty($result)){
               $data = array(
                    'is_delete'=>'1'
                    ); 
               $this->common->updatebyattr('articles','id',$id,$data);
               $this->session->set_flashdata('msg', '<div class="successmsg">Magazine has been deleted successfully</div>');
               if($flag == 'a'){
                   redirect('/admin/magazines');
               }else if($flag=='u'){
                   redirect('/admin/magazines');
               }else{
                   redirect('/');
               }
               
           }
       }
       
        public function is_approve($id,$flag){
           $result = $this->common->findByAttr('articles','id',$id);
           if(!empty($result)){
               if($flag == 'a'){
                   $this->session->set_flashdata('msg', '<div class="successmsg">Magazine has been published</div>');
                   $data = array(
                    'is_active'=>'1',
                    'is_published'=>'1',
                    'created'=>date('Y-m-d H:i:s')
                    ); 
               }else if($flag=='u'){
                   $this->session->set_flashdata('msg', '<div class="successmsg">Magazine has been decline</div>');
                   $data = array(
                    'is_active'=>'0',
                    'is_published'=>'0',
                    'created'=>date('Y-m-d H:i:s')
                    ); 
               }else{
                   
               }
               $this->common->updatebyattr('articles','id',$id,$data);
               if($flag == 'a'){
                   redirect('/admin/magazines');
               }else if($flag=='u'){
                   redirect('/admin/magazines');
               }else{
                   redirect('/');
               }
               
           }
           //pr($result);
        }
        
        public function is_editor($id,$uneditor){
            $result = $this->common->findByAttr('articles','id',$id);
           if(!empty($result)){
               if(isset($uneditor) and $uneditor == 'un'){
                   $this->session->set_flashdata('msg', '<div class="successmsg">Magazine make as uneditor</div>');
                   $data = array(
                    'is_editor'=>'0'
                    );
               }else{
                   $this->session->set_flashdata('msg', '<div class="successmsg">Magazine make as editor</div>');
                   $data = array(
                    'is_editor'=>'1'
                    );
               }
                
               $this->common->updatebyattr('articles','id',$id,$data);
               redirect('/admin/magazines');
           }
        }
        
        public function preview($id){
            $data['data'] = '';
            
            $category_data = $this->common->findByAttr('articles','id',$id);
            if(empty($category_data)){
                redirect('/');
            }
            $review = $this->magazine->check_ip($category_data->user_id,$category_data->id);
            $data['category_data'] = $category_data;
            $data['music_data'] = $this->common->findByAttr('musics','id',$category_data->music_id);
            $data['users_data'] = $this->common->findByAttr('users','id',$category_data->user_id);
            $images_data = $this->common->findByAttrAll('images','article_id',$category_data->id);
            $data['images_data'] = $images_data;
            $user_id = $this->session->userdata('id');
            if(isset($user_id) and $user_id !=''){
                $data['like_data'] = $this->magazine->likedata($category_data->id);
            }
            $data['rand_magazines'] = $this->magazine->rand_magazines();
            $data['rand_selfmagazine'] = $this->magazine->rand_selfmagazine($user_id,$id);
            $data['review'] = $review;
            $img_id = $images_data[0]->id;
            
            $comment_data = $this->magazine->get_comments($img_id,$category_data->id);
            $data['comment_data'] = $comment_data;
            $this->load->view('admin/magazines/preview',$data);
        }
}