<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

include dirname(__FILE__).'/controller.php';
class Advertise extends Controller {
	public function __construct(){
            parent::__construct();
       }
       
       public function manage(){
            $data['data'] = '';
            $data['page'] = 'admin/advertise/manage';
            //$slots = $this->common->findList('slots');
            $this->common->get_slot_ads_data();
            $slots2 = $this->common->get_slot_ads_data();
            //pr($slots2);
            //$data['slots'] = $slots;
            $data['slots2'] = $slots2;
            //pr($slots);exit;
            $this->load->view('layout/admin_default',$data);
       }       
       
       public function create(){
            $data['data'] = '';
            $data['title'] = 'Admin create Advertise';
            $data['page'] = 'admin/advertise/create';
            $data['data'] = $this->input->post();
            $this->form_validation->set_rules('advertise[amb_code]', 'amb code', 'required|xss_clean');
            $this->form_validation->set_rules('advertise[advertise_name]', 'category name', 'required|xss_clean|is_unique[advertise.advertise_name]');
            if ($this->form_validation->run() == FALSE){
            }else{
               $data = $this->input->post();
                $id = $this->common->save($data);
                if($id !=''){
                    redirect('/admin/advertise/manage/');  
                }
            }
            $this->load->view('layout/admin_default',$data);
       }
       
       public function update($id){
            $data['data'] = '';
            $data['title'] = 'Admin Edit Ads';
            $data['page'] = 'admin/advertise/create';
            $data['data'] = $this->input->post();
            $this->form_validation->set_rules('advertise[amb_code]', 'amb code', 'required|xss_clean');
            $this->form_validation->set_rules('advertise[advertise_name]', 'category name', 'required|xss_clean|edit_unique[advertise.advertise_name]');
            if ($this->form_validation->run() == FALSE){
            }else{
                $id = $this->common->update($this->input->post(),$id);
                redirect('/admin/advertise/manage/');
            }
            $data['advertise'] = (array)$this->common->findByAttr('advertise','id',$id);
            $this->load->view('layout/admin_default',$data);
       }
       
       public function delete($id){
           $id = $this->common->delete('advertise','id',$id);
            redirect('/admin/advertise/manage/');
       }
       
        public function is_archive($id,$flag){
            $data['advertise']['is_active'] = $flag;
            $id = $this->common->update($data,$id);
            redirect('/admin/advertise/manage/');
        }
        
        public function slot(){
            $data['data'] = '';
            $data['title'] = 'Admin Manage slot';
            $data['page'] = 'admin/advertise/manage_slot';
            $results = $this->common->findList('slots');
            $data['data']['results'] = $results;
            //pr($slots);exit;
            $this->load->view('layout/admin_default',$data);
        }
        
        public function add_slot(){
            $data['data'] = '';
            $data['title'] = 'Admin add slot';
            $data['page'] = 'admin/advertise/add_slot';
            $data['data'] = $this->input->post();
            $this->load->view('layout/admin_default',$data);
            $this->form_validation->set_rules('slots[name]', 'slot name', 'required|xss_clean|is_unique[slots.name]');
            if ($this->form_validation->run() == FALSE){
            }else{
                $max_no = $this->common->findmaxno('slots');
                $data = $this->input->post();
                $data['slots']['slot_no'] = $max_no;
                $id = $this->common->save($data);
                if($id !=''){
                    redirect('/admin/advertise/slot');  
                }
            }
        }
        
        public function update_slot($id){
            $data['data'] = '';
            $data['title'] = 'Admin Edit slot';
            $data['page'] = 'admin/advertise/edit_slot';
            $data['data'] = $this->input->post();
            $this->form_validation->set_rules('slots[name]', 'slot name', 'required|xss_clean|edit_unique[slots.name]');
            if ($this->form_validation->run() == FALSE){
            }else{
                $id = $this->common->update($this->input->post(),$id);
                redirect('/admin/advertise/slot'); 
            }
            $data['slot'] = (array)$this->common->findByAttr('slots','id',$id);
            
            $this->load->view('layout/admin_default',$data);
        }
        
        public function config_ads($slotval){
            $expl = explode('_',$slotval);
            $slot_id = $expl[0];
            if(isset($expl[1]))
                $ads_id = $expl[1];
            $data['data'] = '';
            $data2 = $this->input->post();
            $data['slotval'] = $slotval;
            $schedules = $this->common->get_slot_ads_schedule_data($slot_id);
            $data['schedules'] = $schedules;
            if(!empty($data2)){
                $advrtise_file = time().'_'.$_FILES['baner_name']['name'];
                $save_data = array(
                    'slot_id'=>$slot_id,
                    'start_date'=>$this->input->post('start_date'),
                    'end_date'=>$this->input->post('end_date'),
                    'cust_name'=>$this->input->post('customer_name'),
                    'created'=>date('Y-m-d H:i:s'),
                    'target_url'=>$this->input->post('target_url'),
                    'advrtise_file'=>$advrtise_file
                );
                //pr($save_data);
                $id = $this->common->add('advertise',$save_data);
                $target_file = dirname(dirname(dirname(dirname((__FILE__))))).'/uploads/ads_files/'.$advrtise_file;
                 if (move_uploaded_file($_FILES['baner_name']["tmp_name"], $target_file)) {
                     
                 }
                 if($id !=''){
                     echo '<script> 
                         top.frames.location.reload(false);
                        parent.jQuery.fancybox.close();
                     </script>';exit;
                 }
            }
            $this->load->view('admin/advertise/config_ads',$data);
        }
        
        
        public function edit_config_ads($slotval){
            $expl = explode('_',$slotval);
            //pr($expl);exit;
            $slot_id = $expl[0];
            if(isset($expl[1]))
                $ads_id = $expl[1];
            $data['data'] = '';
            $data2 = $this->input->post();
            $data['ads_data'] = $ads_data = $this->common->findByAttr('advertise','id',$ads_id);
            $data['slotval'] = $slotval;
            //pr($ads_data);exit;
            if(!empty($data2)){
                if(isset($_FILES['baner_name']['name']) and $_FILES['baner_name']['name'] !=''){
                    $advrtise_file = time().'_'.$_FILES['baner_name']['name'];
                }else{
                    $advrtise_file = $ads_data->advrtise_file;
                }
                
                $save_data = array(
                    'slot_id'=>$slot_id,
                    'start_date'=>$this->input->post('start_date'),
                    'end_date'=>$this->input->post('end_date'),
                    'cust_name'=>$this->input->post('customer_name'),
                    'created'=>date('Y-m-d H:i:s'),
                    'target_url'=>$this->input->post('target_url'),
                    'advrtise_file'=>$advrtise_file
                );
                $id = $this->common->updatebyattr('advertise','id',$ads_id,$save_data);
                $target_file = dirname(dirname(dirname(dirname((__FILE__))))).'/uploads/ads_files/'.$advrtise_file;
                if(isset($_FILES['baner_name']['name']) and $_FILES['baner_name']['name'] !=''){
                    if (move_uploaded_file($_FILES['baner_name']["tmp_name"], $target_file)) {

                    }
                }
                 //if($id !=''){
                     //redirect('/admin/musics/manage/');  
                     echo '<script> 
                         top.frames.location.reload(false);
                        parent.jQuery.fancybox.close();
                     </script>';exit;
                 //}
            }
            $this->load->view('admin/advertise/edit_config_ads',$data);
        }
        
        public function check_ad_place(){
            $start_date = $this->input->post('start_date');
            $end_date = $this->input->post('end_date');
            $slotval = $this->input->post('slotval');
            $expl = explode('_',$slotval);
            $slot_id = $expl[0];
            if(isset($expl[1]))
                $ads_id = $expl[1];
            if(isset($ads_id) and $ads_id !='')
                $ads_data = $this->common->findByAttr('advertise','id',$ads_id);
            //pr($ads_data);exit;
            if(isset($ads_id) and $ads_data->start_date == $start_date and $ads_data->end_date == $end_date){
                echo '0';
            }else{
                $flag = $this->common->check_slot_ads($slot_id,$start_date,$end_date);
                if($flag >=4){
                    echo '1';
                }else{
                    echo '0';
                }
            }
            exit;
            //SELECT count(*) FROM (`advertise`) WHERE `slot_id` = '1' AND start_date between "2015-01-29" AND "2015-02-01" AND end_date between "2015-01-30" AND "2015-02-01" ORDER BY `id` asc
        }
        
        public function schedule_del($id){
            $this->common->delete('advertise_schedule','id',$id);
            echo '<script> 
                    top.frames.location.reload(false);
                   parent.jQuery.fancybox.close();
                </script>';exit;
        }
        
        function create_slot_row(){
            $max_slot = $this->common->get_max_slot();
            for($i=1;$i<=4;$i++){
                $save_data = array(
                    'slot_id'=>$i,
                    'add_slot_no'=>$max_slot
                );
                $this->common->add('advertise',$save_data);
            }
            redirect('/admin/advertise/manage');
        }
        
        function create_schedule($slot_id,$add_slot_no,$id){
            if(isset($_FILES['baner_name']['name']) and $_FILES['baner_name']['name'] !=''){
                    $advrtise_file = time().'_'.$_FILES['baner_name']['name'];
            }
            $schedule_no = $this->ads->get_max_schedule_no($slot_id,$add_slot_no,$id);
            //pr($schedule_no);exit;
            if(!empty($_POST)){
                
                $save_data = array(
                    'slot_id'=>$slot_id,
                    'start_date'=>$this->input->post('start_date'),
                    'end_date'=>$this->input->post('end_date'),
                    'cust_name'=>$this->input->post('customer_name'),
                    'created'=>date('Y-m-d H:i:s'),
                    'target_url'=>$this->input->post('target_url'),
                    'advrtise_file'=>$advrtise_file,
                    //'schedule_no'=>($schedule_no+1),
                    'add_slot_no'=>$add_slot_no,
                    'status'=>'1'
                );
                $id = $this->common->add('advertise_schedule',$save_data);
                $target_file = dirname(dirname(dirname(dirname((__FILE__))))).'/uploads/ads_files/'.$advrtise_file;
                if(isset($_FILES['baner_name']['name']) and $_FILES['baner_name']['name'] !=''){
                    if (move_uploaded_file($_FILES['baner_name']["tmp_name"], $target_file)) {

                    }
                }
            }
            
            $results = $this->ads->get_schedule($slot_id,$add_slot_no,$id);
            $data['data'] = '';
            $data['results'] = $results;
            $this->load->view('admin/advertise/create_schedule',$data);
        }
        
        function empty_slot($slotval){
            $expl = explode('_',$slotval);
            $slot_id = $expl[0];
            if(isset($expl[1]))
                $ads_id = $expl[1];
            $save_data = array(
                    //'slot_id'=>$slot_id,
                    'start_date'=>'',
                    'end_date'=>'',
                    'cust_name'=>'',
                    //'created'=>date('Y-m-d H:i:s'),
                    'target_url'=>'',
                    'advrtise_file'=>''
                );
                $id = $this->common->updatebyattr('advertise','id',$ads_id,$save_data);
                redirect('/admin/advertise/edit_config_ads/'.$slotval);
        }
}