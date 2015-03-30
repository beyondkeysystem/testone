<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

include dirname(__FILE__).'/controller.php';
class Blog extends Controller {
	public function __construct(){
            parent::__construct();
       }
       
       public function manage(){
            $data['data'] = '';
            $data['page'] = 'admin/blog/manage';
            $search = $this->input->get('search');
            $condition = '';
            //$condition = "is_active1 = '1'";
            $select = "blogs.*,users.firstname as u_firstname,users.lastname as u_lastname,users.username as u_username,categories.category_name as c_category_name";
            $join = " left join users on users.id = blogs.user_id left join categories on categories.id = blogs.category_id";
            if(isset($search) and $search !=''){
                $condition = 'page_name like "%'.addslashes(trim($search)).'%" or page_place_name like "%'.addslashes(trim($search)).'%" or amb_code like "%'.addslashes(trim($search)).'%"';
            }
            
            /*************** This is for paging *****************/
            $count = $this->common->findJoinCount('blogs',$condition,$join);
            $url = PAGE_URL.'/admin/blog/manage/';
            $config = $this->common->page_config($count, $url);
            /***************************************************/
            
            if($this->uri->segment(4)==''){
                $offset =0;
            }else{
                $offset = $this->uri->segment(4);
            }
            $this->pagination->initialize($config);
            
            $results = $this->common->findByJoin('blogs',$condition,$join,$select,$offset);
            $data['results'] = $results;
            $this->load->view('layout/admin_default',$data);
       }  
       
       public function permission($id){
           $data['data'] = '';
           $search = $this->input->get('search');
           $condition = "user_type_id !='1'";
            $user = $this->common->findList('users',$condition);
            foreach($user as $val){
                $users[$val->id] = $val->username.' - '.$val->firstname.' '.$val->lastname;
            }
            $data = $this->input->post();
            if(!empty($data)){
                $this->common->delete('permissions','blog_id',$id);
                foreach($data['user_id'] as $k=>$v){
                    $save_data['permissions']['blog_id'] = $id;
                    $save_data['permissions']['user_id'] = $v;
                    $this->common->save($save_data);
                }
                echo '<script>parent.jQuery.fancybox.close();</script>';
            }
           $permissionar = '';
           $conditions = 'blog_id = "'.$id.'"';
           $permission_data = $this->common->findList('permissions',$conditions);
           if(!empty($permission_data)){
               foreach($permission_data as $permission_d)
               $permissionar[] = $permission_d->user_id;
           }
           //pr($permission_data);
           $data['users'] = $users;
           $data['permission_data'] = $permissionar;
           $this->load->view('admin/blog/permission',$data);
       }
       
       
       
       function remanefile($uploadedFiles){
            $unique_id = md5(time());
            $oldDir_file = $uploadedFiles['full_path'];
            $newDir = $uploadedFiles['file_path'];
            $filename = $unique_id.'_'.urlencode($uploadedFiles['file_name']);
           return  rename($oldDir_file, $newDir.$filename);
       }
       
       public function create(){
            $data['data'] = '';
            $data['title'] = 'Admin create Advertise';
            $data['page'] = 'admin/blog/create';
            $data['data'] = $this->input->post();
            $this->form_validation->set_rules('blogs[user_id]', 'username', 'required');
            $this->form_validation->set_rules('blogs[category_id]', 'category name', 'required');
            $this->form_validation->set_rules('blogs[blog_name]', 'blog name', 'required');
            if ($this->form_validation->run() == FALSE){
            }else{
                   $data = $this->input->post();
                   foreach($_FILES as $key=>$val){
                       $config = array();
                       $config['allowed_types'] = '*';
                       if($key == 'music'){
                            $config['upload_path'] = './uploads/music/';
                            $this->load->library('upload', $config);
                            $this->upload->initialize($config);
                            $this->load->library('image_lib');
                            $this->upload->do_upload('music');
                            $uploadedFiles = array();
                            $uploadedFiles = $this->upload->data();
                            $filename = $this->remanefile($uploadedFiles);
                            $data['blogs']['images'] = $filename;
                       }
                       if($key == 'image'){
                            $config['upload_path'] = './uploads/images/';
                            $config['min_width']      = '*';
                            $config['min_heigth']      = '*';
                            /* Load the upload library */
                            $this->load->library('upload', $config);
                            $this->upload->initialize($config);
                            $this->load->library('image_lib');
                            $this->upload->do_upload('image');
                            $uploadedFiles = array();
                            $uploadedFiles = $this->upload->data();                    
                            $filename = $this->remanefile($uploadedFiles);
                            $data['blogs']['images'] = $filename;
                       }
                       if($key == 'video'){
                            $config['upload_path'] = './uploads/videos/';
                            $config['min_width']      = '*';
                            $config['min_heigth']      = '*';
                            /* Load the upload library */
                            $this->load->library('upload', $config);
                            $this->upload->initialize($config);
                            $this->load->library('image_lib');
                            $this->upload->do_upload('video');
                            $uploadedFiles = array();
                            $uploadedFiles = $this->upload->data();                    
                            $filename = $this->remanefile($uploadedFiles);
                            $data['blogs']['video'] = $filename;
                       }
                   }
                
                $id = $this->common->save($data);
                if($id !=''){
                    redirect('/admin/blog/manage/');  
                }
            }
            $condition = "user_type_id !='1'";
            $user = $this->common->findList('users',$condition);
            foreach($user as $val){
                $users[$val->id] = $val->username.' - '.$val->firstname.' '.$val->lastname;
            }
            $category = $this->common->findList('categories');
            foreach($category as $val){
                $categories[$val->id] = $val->category_name;
            }
            $data['users'] = $users;
            $data['categories'] = $categories;
            $this->load->view('layout/admin_default',$data);
       }
       
       public function update($id){
            $data['data'] = '';
            $data['title'] = 'Admin Edit Ads';
            $data['page'] = 'admin/blog/create';
            $data['data'] = $this->input->post();
            $this->form_validation->set_rules('blogs[user_id]', 'username', 'required');
            $this->form_validation->set_rules('blogs[category_id]', 'category name', 'required');
            $this->form_validation->set_rules('blogs[blog_name]', 'blog name', 'required');
            if ($this->form_validation->run() == FALSE){
            }else{
                  $data = $this->input->post();
                   foreach($_FILES as $key=>$val){
                       $config = array();
                       $config['allowed_types'] = '*';
                       if($key == 'music' and $val['name'] !=''){
                            $config['upload_path'] = './uploads/music/';
                            $this->load->library('upload', $config);
                            $this->upload->initialize($config);
                            $this->load->library('image_lib');
                            $this->upload->do_upload('music');
                            $uploadedFiles = array();
                            $uploadedFiles = $this->upload->data();
                            $filename = $this->remanefile($uploadedFiles);
                            $data['blogs']['images'] = $filename;
                       }
                       if($key == 'image' and $val['name'] !=''){
                            $config['upload_path'] = './uploads/images/';
                            $config['min_width']      = '*';
                            $config['min_heigth']      = '*';
                            /* Load the upload library */
                            $this->load->library('upload', $config);
                            $this->upload->initialize($config);
                            $this->load->library('image_lib');
                            $this->upload->do_upload('image');
                            $uploadedFiles = array();
                            $uploadedFiles = $this->upload->data();                    
                            $filename = $this->remanefile($uploadedFiles);
                            $data['blogs']['images'] = $filename;
                       }
                       if($key == 'video' and $val['name'] !=''){
                            $config['upload_path'] = './uploads/videos/';
                            $config['min_width']      = '*';
                            $config['min_heigth']      = '*';
                            /* Load the upload library */
                            $this->load->library('upload', $config);
                            $this->upload->initialize($config);
                            $this->load->library('image_lib');
                            $this->upload->do_upload('video');
                            $uploadedFiles = array();
                            $uploadedFiles = $this->upload->data();                    
                            $filename = $this->remanefile($uploadedFiles);
                            $data['blogs']['video'] = $filename;
                       }
                   }
                $id = $this->common->update($data,$id);
                redirect('/admin/blog/manage/');
            }
            $data['blog'] = (array)$this->common->findByAttr('blogs','id',$id);
            $condition = "user_type_id !='1'";
            $user = $this->common->findList('users',$condition);
            foreach($user as $val){
                $users[$val->id] = $val->username.' - '.$val->firstname.' '.$val->lastname;
            }
            $category = $this->common->findList('categories');
            foreach($category as $val){
                $categories[$val->id] = $val->category_name;
            }
            $data['users'] = $users;
            $data['categories'] = $categories;
            $this->load->view('layout/admin_default',$data);
       }
       
       public function delete($id){
           $id = $this->common->delete('blogs','id',$id);
            redirect('/admin/blog/manage/');
       }
       
        public function is_archive($id,$flag){
            $data['blogs']['is_active'] = $flag;
            $id = $this->common->update($data,$id);
            redirect('/admin/blog/manage/');
        }
}