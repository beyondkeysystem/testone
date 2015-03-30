<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

include dirname(__FILE__).'/controller.php';
class Musics extends Controller {
	public function __construct(){
            parent::__construct();
       }
       
       public function manage(){
           $data['data'] = '';
            $data['page'] = 'admin/musics/manage';
            $search = $this->input->get('search');
            $condition = '';
            /*if(isset($search) and $search !=''){
                $condition = 'category_name like "%'.addslashes(trim($search)).'%"';
            }
            $count = $this->common->findCount('musics',$condition);
            
            $config['base_url'] = PAGE_URL.'/admin/musics/manage/';
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
            $this->pagination->initialize($config);*/
            $results = $this->common->findAll('musics',$condition);
            $data['results'] = $results;
            $this->load->view('layout/admin_default',$data);
       }       
       
       public function create(){
           //pr($_POST);exit;
            $data['data'] = '';
            
            $data['data'] = $this->input->post();
            $this->form_validation->set_rules('musics[music_name]', 'music name', 'required|xss_clean');
            $this->form_validation->set_rules('musics[music_category]', 'music category', 'required|xss_clean');
            
            if(isset($_FILES['musics']['name']['musics_file']) and $_FILES['musics']['name']['musics_file'] !=''){
                
            }else{
                if(!empty($_POST))
                    $data['error'] = 'Please select file';
            }
            if ($this->form_validation->run() == FALSE){
            }else{
               $data = $this->input->post();
               $expl = explode('.',$_FILES['musics']['name']['musics_file']);
               $ext = $expl[count($expl)-1];
               if(isset($ext) and ($ext =='mp3' or $ext =='MP3')){
                    $data['musics']['musics_file'] = $_FILES['musics']['name']['musics_file'];
                    $data['musics']['created'] = date('Y-m-d H:i:s');
                    $id = $this->common->save($data);
                    $target_file = dirname(dirname(dirname(dirname((__FILE__))))).'/uploads/musics/'.$_FILES['musics']['name']['musics_file'];
                     if (move_uploaded_file($_FILES['musics']["tmp_name"]['musics_file'], $target_file)) {

                     }
                     if($id !=''){
                         redirect('/admin/musics/manage/');  
                     }
               }else{
                   $data['error'] = 'This is not mp3 file format';
                   $data['data'] = '';
               }
            }
            $data['title'] = 'Music';
            $data['page'] = 'admin/musics/create';
            $this->load->view('layout/admin_default',$data);
       }
       
       public function update($id){
            $data['data'] = '';            
            $data['musics'] = (array)$this->common->findByAttr('musics','id',$id);
            $this->form_validation->set_rules('musics[music_name]', 'music name', 'required|xss_clean');
            $this->form_validation->set_rules('musics[music_category]', 'music category', 'required|xss_clean');
            if(isset($_FILES['musics']['name']['musics_file']) and $_FILES['musics']['name']['musics_file'] !=''){
                
            }else{
                if(!empty($_POST))
                    $data['error'] = 'Please select file';
            }
            if ($this->form_validation->run() == FALSE){
            }else{
               $data = $this->input->post();
               $expl = explode('.',$_FILES['musics']['name']['musics_file']);
               $ext = $expl[count($expl)-1];
               if(isset($ext) and ($ext =='mp3' or $ext =='MP3')){
                    $save_data = $this->input->post();
                    $save_data['musics']['musics_file'] = $_FILES['musics']['name']['musics_file'];
                    $save_data['musics']['created'] = date('Y-m-d H:i:s');
                    $id = $this->common->update($save_data,$id);
                    $target_file = dirname(dirname(dirname(dirname((__FILE__))))).'/uploads/musics/'.$_FILES['musics']['name']['musics_file'];
                     if (move_uploaded_file($_FILES['musics']["tmp_name"]['musics_file'], $target_file)) {

                     }
                     $this->session->set_flashdata('msg', '<div class="successmsg">Music has been updated successfully</div>');
                     redirect('/admin/musics/manage/');
               }else{
                   $data['error'] = 'This is not mp3 file format';
                   $data['data'] = '';
               }
            }
            $data['title'] = 'Admin Edit Ads';
            $data['page'] = 'admin/musics/create';
            $data['data'] = $this->input->post();
            
            $this->load->view('layout/admin_default',$data);
       }
       
       public function delete($id){
           $id = $this->common->delete('musics','id',$id);
            redirect('/admin/musics/manage/');
       }
       
        public function is_archive($id,$flag){
            $data['categories']['is_active'] = $flag;
           // pr($data);exit;
            $id = $this->common->update($data,$id);
            redirect('/admin/musics/manage/');
        }
}