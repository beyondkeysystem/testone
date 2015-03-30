<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

include dirname(__FILE__).'/controller.php';
class file_segments extends Controller {
	public function __construct(){
            parent::__construct();
       }
       
       public function manage(){
           $data['data'] = '';
            $data['page'] = 'admin/file_segments/manage';
            $search = $this->input->get('search');
            $condition = '';
            if(isset($search) and $search !=''){
                $condition = 'file_name like "%'.addslashes(trim($search)).'%" or file like "%'.addslashes(trim($search)).'%" or comment like "%'.addslashes(trim($search)).'%"';
            }
            
            $results = $this->common->findAll('file_segments',$condition);
            $data['results'] = $results;
            $this->load->view('layout/default',$data);
       }       
       
       public function create(){
           
            $data['data'] = '';
            $data['title'] = 'Admin create Advertise';
            $data['page'] = 'admin/file_segments/create';
            $data['data'] = $this->input->post();
            $this->form_validation->set_rules('file_segments[file_name]', 'file name', 'required');
            //$this->form_validation->set_rules('file_segments[file]', 'file', 'required');
            //$this->form_validation->set_rules('file_segments[comment]', 'comment', 'required');
            if ($this->form_validation->run() == FALSE){
            }else{
                $data = $this->input->post();
                $config['upload_path'] = './item_image/';
                $config['allowed_types'] = '*';
                $config['min_width']      = '*';
                $config['min_heigth']      = '*';
                /* Load the upload library */
                $unique_id = md5(time());
                $this->load->library('upload', $config);
                $this->load->library('image_lib');
                
                if ($this->upload->do_upload('file_segments')) {
                    $uploadedFiles = $this->upload->data();
                    
                   // $uploadedFiles = $data;
                    $oldDir_file = $uploadedFiles['full_path'];
                    $newDir = $uploadedFiles['file_path'];
                    $filename = $unique_id.'_'.urlencode($uploadedFiles['file_name']);
                    rename($oldDir_file, $newDir.$filename);
                    $data['file_segments']['file'] = $filename;
                    $id = $this->common->save($data);

                }else{
                    pr($this->upload->display_errors());die;
                }
                if($id !=''){
                    redirect('/admin/file_segments/manage/');  
                }
            }
            $this->load->view('layout/default',$data);
       }
       
       public function update($id){
            $data['data'] = '';
            $data['title'] = 'Admin Edit Ads';
            $data['page'] = 'admin/file_segments/create';
            $data['data'] = $this->input->post();
            $this->form_validation->set_rules('advertise[page_name]', 'page name', 'required');
            $this->form_validation->set_rules('advertise[page_place_name]', 'page place name', 'required');
            $this->form_validation->set_rules('advertise[amb_code]', 'amb code', 'required');
            if ($this->form_validation->run() == FALSE){
            }else{
                $id = $this->common->update($this->input->post(),$id);
                redirect('/admin/file_segments/manage/'); 
            }
            $data['advertise'] = (array)$this->common->findByAttr('advertise','id',$id);
            $this->load->view('layout/default',$data);
       }
       
       public function delete($id){
           $id = $this->common->delete('file_segments','id',$id);
            redirect('/admin/file_segments/manage/');
       }
       
        public function is_archive($id,$flag){
            $data['file_segments']['is_active'] = $flag;
           // pr($data);exit;
            $id = $this->common->update($data,$id);
            redirect('/admin/file_segments/manage/');
        }
}