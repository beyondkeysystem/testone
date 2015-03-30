<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

include dirname(__FILE__).'/controller.php';
class Magazines extends Controller {
        public function __construct(){
            parent::__construct();
            
        }
            
	public function index() {
            $search = $this->input->get('search');
            $cat_name = $this->input->get('name');
            $per_page = $this->input->get('per_page');
            $count = '0';
            $results = array();
            $data['data'] = '';
            $condition = "is_active = '1'";
            $categories = $this->common->findList('categories',$condition);
            foreach($categories as $category){
                $catarr[$category->id] = $category->category_name;
            }
            $data['categories'] = $categories;
            $data['page'] = 'magazines/index';
            $data['title']= 'Home';
            //$cat_session = $this->session->userdata('cat');
            if(isset($cat_name) and $cat_name =='all'){
                $cat_name = '';
                //$this->session->set_userdata('cat','');
            }
            if(isset($cat_name) and $cat_name !=''){
                //echo 'sfsdf';exit;
                $con = '';
                $con = " and categories like '%".trim(addslashes($cat_name))."%'";
                $mag_condition = 'is_delete = "0" and is_draft ="0" and is_published = "1" and is_active = "1"'.$con;
                $count = $this->magazine->count_feature_magazines('articles',$mag_condition);
                $config['base_url'] = '/magazines/index?name='.$cat_name;
                
                $config['total_rows'] = $count;
                $config['per_page'] = PAGE_LIMIT; 
                $config['page_query_string'] = TRUE;
                $config['uri_segment']=3;
                $config['full_tag_open'] = '<ul>';
                $config['full_tag_close'] = '</ul>';
                $config['num_tag_open'] = '<li>';
                $config['num_tag_close'] = '</li>';
                $config['cur_tag_open'] = '<li><a class="active">';
                $config['cur_tag_close'] = '</a></li>';
                    if($per_page==''){
                        $offset =0;
                    }else{
                        $offset = $per_page;
                    }
                $this->pagination->initialize($config);
                $results = $this->magazine->get_all_feature_magazine('articles',$mag_condition,$offset);
                
            }else{
               // $this->session->set_userdata('cat','');
                $con = '';
                if(isset($search) and $search !=''){
                     $con = " and title like '%".trim(addslashes($search))."%'";
                }
                $mag_condition = 'is_delete = "0" and is_draft ="0" and is_published = "1" and is_active = "1"'.$con;
                $count = $this->magazine->count_feature_magazines('articles',$mag_condition);
                $config['base_url'] = '/magazines/index?search='.$search;
                $config['total_rows'] = $count;
                $config['per_page'] = PAGE_LIMIT; 
                $config['page_query_string'] = TRUE;
                $config['next_link'] = 'Next';
                $config['prev_link'] = 'Previous';
                $config['uri_segment']=3;
                $config['full_tag_open'] = '<ul>';
                $config['full_tag_close'] = '</ul>';
                $config['num_tag_open'] = '<li>';
                $config['num_tag_close'] = '</li>';
                $config['cur_tag_open'] = '<li><a class="active">';
                $config['cur_tag_close'] = '</a></li>';
                    if($per_page==''){
                        $offset =0;
                    }else{
                        $offset = $per_page;
                    }
                $this->pagination->initialize($config);
                $results = $this->magazine->get_all_feature_magazine('articles',$mag_condition,$offset);
            }
            
            
            
            
            $data['results']= $results;
            $data['count']= $count;
            $this->load->view('layout/home',$data);
	}
        
        public function editorchoices() {
            $search = $this->input->get('search');
            $cat_name = $this->input->get('name');
            $per_page = $this->input->get('per_page');
            $count = '0';
            $results = array();
            $data['data'] = '';
            $condition = "is_active = '1'";
            $categories = $this->common->findList('categories',$condition);
            foreach($categories as $category){
                $catarr[$category->id] = $category->category_name;
            }
            $data['categories'] = $categories;
            $data['page'] = 'magazines/editorchoices';
            $data['title']= 'Home';
            //$cat_session = $this->session->userdata('cat');
            if(isset($cat_name) and $cat_name =='all'){
                $cat_name = '';
                //$this->session->set_userdata('cat','');
            }
            if(isset($cat_name) and $cat_name !=''){
                //echo 'sfsdf';exit;
                $con = '';
                $con = " and categories like '%".trim(addslashes($cat_name))."%'";
                $mag_condition = 'is_delete = "0" and is_draft ="0" and is_published = "1" and is_active = "1" and is_editor = "1"'.$con;
                $count = $this->magazine->count_feature_magazines('articles',$mag_condition);
                $config['base_url'] = '/magazines/editorchoices?name='.$cat_name;
                $config['total_rows'] = $count;
                $config['per_page'] = PAGE_LIMIT; 
                $config['page_query_string'] = TRUE;
                $config['uri_segment']=3;
                $config['full_tag_open'] = '<ul>';
                $config['full_tag_close'] = '</ul>';
                $config['num_tag_open'] = '<li>';
                $config['num_tag_close'] = '</li>';
                $config['cur_tag_open'] = '<li><a class="active">';
                $config['cur_tag_close'] = '</a></li>';
                    if($per_page==''){
                        $offset =0;
                    }else{
                        $offset = $per_page;
                    }
                $this->pagination->initialize($config);
                $results = $this->magazine->get_all_feature_magazine('articles',$mag_condition,$offset);
                
            }else{
               // $this->session->set_userdata('cat','');
                $con = '';
                if(isset($search) and $search !=''){
                     $con = " and title like '%".trim(addslashes($search))."%'";
                }
                $mag_condition = 'is_delete = "0" and is_draft ="0" and is_published = "1" and is_active = "1" and is_editor = "1"'.$con;
                $count = $this->magazine->count_feature_magazines('articles',$mag_condition);
                $config['base_url'] = '/magazines/editorchoices?search='.$search;
                $config['total_rows'] = $count;
                $config['per_page'] = PAGE_LIMIT; 
                $config['page_query_string'] = TRUE;
                $config['uri_segment']=3;
                $config['full_tag_open'] = '<ul>';
                $config['full_tag_close'] = '</ul>';
                $config['num_tag_open'] = '<li>';
                $config['num_tag_close'] = '</li>';
                $config['cur_tag_open'] = '<li><a class="active">';
                $config['cur_tag_close'] = '</a></li>';
                    if($per_page==''){
                        $offset =0;
                    }else{
                        $offset = $per_page;
                    }
                $this->pagination->initialize($config);
                $results = $this->magazine->get_all_feature_magazine('articles',$mag_condition,$offset);
            }
            
            
            
            
            $data['results']= $results;
            $data['count']= $count;
            $this->load->view('layout/home',$data);
	}
        
        public function popularmagazine() {
            $search = $this->input->get('search');
            $cat_name = $this->input->get('name');
            $per_page = $this->input->get('per_page');
            $count = '0';
            $results = array();
            $data['data'] = '';
            $condition = "is_active = '1'";
            $categories = $this->common->findList('categories',$condition);
            foreach($categories as $category){
                $catarr[$category->id] = $category->category_name;
            }
            $data['categories'] = $categories;
            $data['page'] = 'magazines/popularmagazine';
            $data['title']= 'Home';
            //$cat_session = $this->session->userdata('cat');
            if(isset($cat_name) and $cat_name =='all'){
                $cat_name = '';
                //$this->session->set_userdata('cat','');
            }
            if(isset($cat_name) and $cat_name !=''){
                //echo 'sfsdf';exit;
                $con = '';
                $con = " and categories like '%".trim(addslashes($cat_name))."%'";
                $mag_condition = 'is_delete = "0" and is_draft ="0" and is_published = "1" and is_active = "1" and read_count >0'.$con;
                $count = $this->magazine->count_feature_populer_magazines('articles',$mag_condition);
                $config['base_url'] = '/magazines/popularmagazine?name='.$cat_name;
                $config['total_rows'] = $count;
                $config['per_page'] = PAGE_LIMIT; 
                $config['page_query_string'] = TRUE;
                $config['uri_segment']=3;
                $config['full_tag_open'] = '<ul>';
                $config['full_tag_close'] = '</ul>';
                $config['num_tag_open'] = '<li>';
                $config['num_tag_close'] = '</li>';
                $config['cur_tag_open'] = '<li><a class="active">';
                $config['cur_tag_close'] = '</a></li>';
                    if($per_page==''){
                        $offset =0;
                    }else{
                        $offset = $per_page;
                    }
                $this->pagination->initialize($config);
                $results = $this->magazine->get_all_feature_populer_magazine('articles',$mag_condition,$offset);
                
            }else{
               // $this->session->set_userdata('cat','');
                $con = '';
                if(isset($search) and $search !=''){
                     $con = " and title like '%".trim(addslashes($search))."%'";
                }
                $mag_condition = 'is_delete = "0" and is_draft ="0" and is_published = "1" and is_active = "1" and read_count >0'.$con;
                $count = $this->magazine->count_feature_populer_magazines('articles',$mag_condition);
                $config['base_url'] = '/magazines/popularmagazine?search='.$search;
                $config['total_rows'] = $count;
                $config['per_page'] = PAGE_LIMIT; 
                $config['page_query_string'] = TRUE;
                $config['uri_segment']=3;
                $config['full_tag_open'] = '<ul>';
                $config['full_tag_close'] = '</ul>';
                $config['num_tag_open'] = '<li>';
                $config['num_tag_close'] = '</li>';
                $config['cur_tag_open'] = '<li><a class="active">';
                $config['cur_tag_close'] = '</a></li>';
                    if($per_page==''){
                        $offset =0;
                    }else{
                        $offset = $per_page;
                    }
                $this->pagination->initialize($config);
                $results = $this->magazine->get_all_feature_populer_magazine('articles',$mag_condition,$offset);
            }
            
            
            
            
            $data['results']= $results;
            $data['count']= $count;
            $this->load->view('layout/home',$data);
	}
        
        public function create(){
            $data['data'] = '';
            $data['page'] = 'magazines/create';
            $data['title']= 'create magazine';
            $condition = "is_active = '1'";
            $categories = $this->common->findList('categories',$condition);
            $data['categories'] = $categories;
            $data['musics'] = $this->magazine->get_musics();
            $data['musics_count'] = $this->magazine->get_musics_cnt();
            $this->load->view('layout/default',$data);
        }
        
        public function watermark($ext,$imgname){
            $destination_path = dirname(dirname(dirname(__FILE__))).'/uploads/images/'.$imgname;
            $source_path = dirname(dirname(dirname(__FILE__))).'/temp/'.$imgname;
            $stamp = imagecreatetruecolor(150, 20);
            
            switch($ext){
                case "png":
                    $im = imagecreatefrompng($source_path);
                    break;
                case "jpg":
                    $im = imagecreatefromjpeg($source_path);
                    break;
                case "jpeg":
                   $im = imagecreatefromjpeg($source_path);
                    break;
                case "gif":
                    break;
            }
            imagestring($stamp, 5, 0, 0, 'Micro blog', 0xFFFFFF);
            $marge_right = 10;
            $marge_bottom = 10;
            $sx = imagesx($stamp);
            $sy = imagesy($stamp);
            // Merge the stamp onto our photo with an opacity of 50%
            imagecopymerge($im, $stamp, imagesx($im) - $sx - $marge_right, imagesy($im) - $sy - $marge_bottom, 0, 0, imagesx($stamp), imagesy($stamp), 50);
            switch($ext){
                case "png":
                    imagepng($im, $destination_path);
                    break;
                case "jpg":
                    imagejpeg($im, $destination_path);
                    break;
                case "jpeg":
                    imagejpeg($im, $destination_path);
                    break;
                case "gif":
                    break;
            }
            
            imagedestroy($im);
        }
        
        public function savemagazine(){
            
            /*$image_id = $this->input->post('img');
            $image_ids = explode(',',substr($image_id,0,-1));
            //pr($image_ids);exit;
            
            //$sourcepath = dirname(dirname(dirname(__FILE__))).'/temp/';
            foreach($image_ids as $imageval){
                $image_data = $this->magazine->get_resultbyid('temp_imgs',$imageval);
                $ext = explode('.',$image_data->image_name);
                $ext[count($ext)-1];
                $this->watermark($ext[count($ext)-1],$image_data->image_name);
                //echo '<br >';
            }
            
            
            exit;*/
            $this->form_validation->set_rules('magazinename', 'Magazine title', 'required|xss_clean');
            $this->form_validation->set_rules('magazinephone', 'Phone', 'required|numeric|xss_clean');
            $this->form_validation->set_rules('sharetitle', 'share title', 'required|xss_clean');
            $this->form_validation->set_rules('sharesubtitle', 'share subtitle', 'required|xss_clean');
            if ($this->form_validation->run() == FALSE){
                echo validation_errors();
                return false;
            }
            $title = $this->input->post('magazinename');
            //if(isset($title) and $title !=''){
                //$this->form_validation->set_rules('magazinename', 'amb code', 'required');
            //}
            $share_img_data = $this->magazine->get_resultbyid('temp_imgs',$this->input->post('shareimg'));
            $music_file_data = $this->magazine->get_resultbyid('temp_imgs',$this->input->post('audiofiled'));
            if(isset($music_file_data->image_name) and $music_file_data->image_name !=''){
                $musicdata = $music_file_data->image_name;
                $sourcepath = dirname(dirname(dirname(__FILE__))).'/temp/'.$music_file_data->image_name;
                $destinationpath = dirname(dirname(dirname(__FILE__))).'/uploads/uploaded_musics/'.$music_file_data->image_name;
                if(is_file($sourcepath)){
                    copy($sourcepath,$destinationpath);
                }
                //unlink($sourcepath);
            }else{
                $musicdata = '';
            }
            if(isset($share_img_data->image_name) and $share_img_data->image_name !=''){
                $shareimgdata = $share_img_data->image_name;
                $sourcepath = dirname(dirname(dirname(__FILE__))).'/temp/'.$share_img_data->image_name;
                $destinationpath = dirname(dirname(dirname(__FILE__))).'/uploads/images/'.$share_img_data->image_name;
                if(is_file($sourcepath)){
                    copy($sourcepath,$destinationpath);
                }
                //unlink($sourcepath);
            }else{
                $shareimgdata = '';
            }
            $watermaek = $this->input->post('watermaek');
            $is_draft = $this->input->post('is_draft');
            $image_id = $this->input->post('img');
            $image_ids = explode(',',substr($image_id,0,-1));
            $cover_img = $this->magazine->get_resultbyid('temp_imgs',$image_ids[0]);
            $save_data = array(
                'user_id'=>$this->session->userdata('id'),
                'title'=>$this->input->post('magazinename'),
                'tel_no'=>$this->input->post('magazinephone'),
                'music_file'=>$musicdata,
                'music_id'=>$this->input->post('songval'),
                'share_img'=>$shareimgdata,
                'share_title'=>$this->input->post('sharetitle'),
                'share_text'=>$this->input->post('sharesubtitle'),
                'created'=>date('Y-m-d H:i:s'),
                'is_watermark'=>$watermaek,
                'is_draft'=>$is_draft,
                'is_published'=>'3',
                'categories'=>$this->input->post('catval')
                //'cover_page'=>$cover_img->image_name
            );
            $article_id = $this->magazine->save('articles',$save_data);
            $qrcode = $this->qr($article_id);
            $qrdata = array(
                'qr_code_img'=>$qrcode
            );
            $this->magazine->update('articles',$article_id,$qrdata);
            
            //pr($image_ids);exit;
            $i=1;
            foreach($image_ids as $imageval){
                $image_data = $this->magazine->get_resultbyid('temp_imgs',$imageval);
                $save_image_data = array(
                    'article_id'=>$article_id,
                    'temp_img_id'=>$image_data->id,
                    'message'=>$image_data->message,
                    'is_thumb'=>$image_data->is_thumb,
                    'image_name'=>$image_data->image_name,
                    'img_order'=>$i
                );
                $i++;
                $sourcepath = dirname(dirname(dirname(__FILE__))).'/temp/'.$image_data->image_name;
                $destinationpath = dirname(dirname(dirname(__FILE__))).'/uploads/images/'.$image_data->image_name;
                if(is_file($sourcepath)){
                    if($watermaek == '1'){
                        $ext = explode('.',$image_data->image_name);
                        $ext[count($ext)-1];
                        $this->watermark($ext[count($ext)-1],$image_data->image_name);
                    }else{
                        copy($sourcepath,$destinationpath);
                    }
                    
                    //copy($sourcepath,$destinationpath);
                }
                //unlink($sourcepath);
                ///copy(file,to_file) 
                $this->magazine->save('images',$save_image_data);
            }
            $cats = explode(',',substr($this->input->post('catval'),0,-1));
            foreach($cats as $cat){
                $cat_data = $this->magazine->get_resultbyattr('categories','category_name',$cat);
                if(!empty($cat_data)){
                    $save_cat_data = array(
                        'article_id'=>$article_id,
                        'category_id'=>$cat_data->id
                    );
                    $this->magazine->save('article_categories',$save_cat_data);
                }
            }
            if($is_draft == '1'){
                echo '2';
            }else if(isset($article_id) and $article_id !=''){
                echo '1';
            }else{
                echo '0';
            }
            exit;
            
            
        }
        public function edit($id){
            $categoriesval = array();
            if($id =='')
                redirect('/');
            $data['data'] = '';
            $condition = "is_active = '1'";
            $categories = $this->common->findList('categories',$condition);
            $data['categories'] = $categories;
            $data['musics'] = $this->magazine->get_musics();
            $data['musics_count'] = $this->magazine->get_musics_cnt();
            $data['page'] = 'magazines/edit';
            $data['title']= 'edit mymaganize';
            $magazines = $this->magazine->get_single_magazine($id);
            if(!empty($magazines['article_categories'])){
                foreach($magazines['article_categories'] as $article_categories){
                    $acategories[$article_categories->category_id] = $article_categories->category_id;
                }
            }
            if(!empty($acategories))
                $categoriesval = $this->magazine->get_category_arr(implode(',',$acategories));
            if(empty($magazines))
                redirect('/');
            $data['magazines'] = $magazines;
            $data['cat_val'] = $categoriesval;
            $this->load->view('layout/default',$data);
        }
        public function updatamagazine($id){
            //pr($_POST);exit;
            $this->form_validation->set_rules('magazinename', 'Magazine title', 'required|xss_clean');
            $this->form_validation->set_rules('magazinephone', 'Phone', 'required|numeric|xss_clean');
            $this->form_validation->set_rules('sharetitle', 'share title', 'required|xss_clean');
            $this->form_validation->set_rules('sharesubtitle', 'share subtitle', 'required|xss_clean');
            if ($this->form_validation->run() == FALSE){
                echo validation_errors();
                return false;
                
            }
            $magazines = $this->magazine->get_single_magazine($id);
            //pr($magazines['articles']->share_img);exit;
            /****************************************************************************/
            $share_img_data = $this->magazine->get_resultbyid('temp_imgs',$this->input->post('shareimg'));
            $music_file_data = $this->magazine->get_resultbyid('temp_imgs',$this->input->post('audiofiled'));
            if(isset($music_file_data->image_name) and $music_file_data->image_name !=''){
                $musicdata = $music_file_data->image_name;
                $sourcepath = dirname(dirname(dirname(__FILE__))).'/temp/'.$music_file_data->image_name;
                $destinationpath = dirname(dirname(dirname(__FILE__))).'/uploads/uploaded_musics/'.$music_file_data->image_name;
                if(is_file($sourcepath)){
                    copy($sourcepath,$destinationpath);
                }
                //unlink($sourcepath);
            }else{
                $musicdata = '';
            }
            if(isset($share_img_data->image_name) and $share_img_data->image_name !=''){
                $shareimgdata = $share_img_data->image_name;
                $sourcepath = dirname(dirname(dirname(__FILE__))).'/temp/'.$share_img_data->image_name;
                $destinationpath = dirname(dirname(dirname(__FILE__))).'/uploads/images/'.$share_img_data->image_name;
                if(is_file($sourcepath)){
                    copy($sourcepath,$destinationpath);
                }
                //unlink($sourcepath);
            }else{
                $shareimgdata = $magazines['articles']->share_img;
            }
            $songval = $this->input->post('songval');
            if(isset($songval)){
                $songval = $this->input->post('songval');
            }else{
                $songval = '';
            }
            $watermaek = $this->input->post('watermaek');
            $is_draft = $this->input->post('is_draft');
            $image_id = $this->input->post('img');
            $image_ids = explode(',',substr($image_id,0,-1));
            $cover_img = $this->magazine->get_resultbyid('temp_imgs',$image_ids[0]);
            $save_data = array(
                //'user_id'=>$this->session->userdata('id'),
                'title'=>$this->input->post('magazinename'),
                'tel_no'=>$this->input->post('magazinephone'),
                'music_file'=>$musicdata,
                'music_id'=>$songval,
                'share_img'=>$shareimgdata,
                'share_title'=>$this->input->post('sharetitle'),
                'share_text'=>$this->input->post('sharesubtitle'),
                'created'=>date('Y-m-d H:i:s'),
                'is_watermark'=>$watermaek,
                'is_draft'=>$is_draft,
                'is_published'=>'3',
                'categories'=>$this->input->post('catval')
               // 'cover_page'=>$cover_img->image_name
            );
            $this->magazine->update('articles',$id,$save_data);
            $article_id = $id;
            /*$qrcode = $this->qr($article_id);
            $qrdata = array(
                'qr_code_img'=>$qrcode
            );
            $this->magazine->update('articles',$article_id,$qrdata);*/
            $i=1;
            foreach($image_ids as $imageval){
                $imgdata = $this->magazine->get_resultbyattr('images','temp_img_id',$imageval);
                if(empty($imgdata) and $imgdata==''){
                    $image_data = $this->magazine->get_resultbyid('temp_imgs',$imageval);
                    $save_image_data = array(
                        'article_id'=>$article_id,
                        'temp_img_id'=>$image_data->id,
                        'message'=>$image_data->message,
                        'is_thumb'=>$image_data->is_thumb,
                        'image_name'=>$image_data->image_name,
                        'img_order'=>$i
                    );
                    $sourcepath = dirname(dirname(dirname(__FILE__))).'/temp/'.$image_data->image_name;
                    $destinationpath = dirname(dirname(dirname(__FILE__))).'/uploads/images/'.$image_data->image_name;
                    if(is_file($sourcepath)){
                        if($watermaek == '1'){
                            $ext = explode('.',$image_data->image_name);
                            $ext[count($ext)-1];
                            $this->watermark($ext[count($ext)-1],$image_data->image_name);
                        }else{
                            copy($sourcepath,$destinationpath);
                        }

                        //copy($sourcepath,$destinationpath);
                    }
                    //unlink($sourcepath);
                    ///copy(file,to_file) 
                    $this->magazine->save('images',$save_image_data);
                }else{
                    $imgdata = $this->magazine->get_resultbyattr('temp_imgs','id',$imageval);
                    //pr($imgdata);
                    $save_image_data = array(
                        'message'=>$imgdata->message,
                        'is_thumb'=>$imgdata->is_thumb,
                        'img_order'=>$i
                    );
                    $this->magazine->updatebyattr('images','temp_img_id',$imgdata->id,$save_image_data);
                }
                $i++;
            }
            //delete category
            if(!empty($magazines['article_categories'])){
                foreach($magazines['article_categories'] as $article_categories){
                    $acategories[$article_categories->category_id] = $article_categories->category_id;
                }
                $categoriesval = $this->magazine->delete_category_arr(implode(',',$acategories));
                // end
                $cats = explode(',',substr($this->input->post('catval'),0,-1));
                foreach($cats as $cat){
                    $cat_data = $this->magazine->get_resultbyattr('categories','category_name',$cat);
                    $save_cat_data = array(
                        'article_id'=>$article_id,
                        'category_id'=>$cat_data->id
                    );
                    $this->magazine->save('article_categories',$save_cat_data);
                }
            }
            if($is_draft == '1'){
                echo '2';
            }else if(isset($id) and $id !=''){
                echo '1';
            }else{
                echo '0';
            }
            exit;
        }
        
        public function fnpage(){
            //$this->load->view('magazines/paging');
            $music_id = $this->input->post('music_id');
            $this->load->view('magazines/paging',array('music_id'=>$music_id));
        }
        
        
        
        
        public function othermaganize(){
            $data['data'] = '';
            if($this->input->server('REQUEST_METHOD') === 'POST') {
                $category_id = $this->input->post('id');
                $data['category_id'] = $category_id;
                $total_count = $this->magazine->get_category_count($category_id);
                $magazines = $this->magazine->get_magazines($category_id);
                
            }
            $this->load->view('magazines/othermaganize',$data);
        }
        
        public function changeimgdyn(){
            $img_id = $this->input->post('id');
            $data = $this->common->findByAttr('temp_imgs','id',$img_id);
            echo "<img src = '/temp/".$data->image_name."' width='156' height='168'>";
            //pr($data);
        }
        
        public function changetxtdyn(){
            $img_id = $this->input->post('id');
            $data = $this->common->findByAttr('temp_imgs','id',$img_id);
            echo '<input type="text" value = "'.$data->message.'" name="fenxiangtitle" id="mainTitle2" maxlength="45" class="form-control">';
            //pr($data);
        }
        
        public function connectpopup(){
            $img_id = $this->input->post('id');
            $data['imagedata'] = $this->common->findByAttr('temp_imgs','id',$img_id);
            $this->load->view('magazines/connectpopup',$data);
        }
        
        public function uploadtemppic() {
            define ("MAX_SIZE","9000");
        $valid_formats = array("jpg","jpeg",'png');
        if (isset($_POST) and $_SERVER['REQUEST_METHOD'] == "POST") {
            $uploaddir = dirname(dirname(dirname(__FILE__)))."/temp/"; //a directory inside
            $i=0;
            foreach ($_FILES['photos']['name'] as $name => $value) {
                $i++;
                $filename = stripslashes($_FILES['photos']['name'][$name]);
                $_FILES['photos']['tmp_name'][$name];
                $size = filesize($_FILES['photos']['tmp_name'][$name]);
                //get the extension of the file in a lower case format
                $ext = $this->getExtension($filename);
                $ext = strtolower($ext);
                if (in_array($ext, $valid_formats)) {
                    if ($size < (MAX_SIZE * 1024)) {
                        $image_name = time().$i . '.'.$ext;
                       
                        
                        //echo $str = "<img src='" . $uploaddir . $image_name . "' class='imgList'>";
                        $newname = $uploaddir . $image_name;
                        if (move_uploaded_file($_FILES['photos']['tmp_name'][$name], $newname)) {
                            $time = time();
                            $save_data = array(
                                'image_name'=>$image_name
                            );
                            $id = $this->common->add('temp_imgs',$save_data);
                            //mysql_query("INSERT INTO user_uploads(image_name,user_id_fk,created) VALUES('$image_name','$session_id','$time')");
                            echo $str = '<div class="ct-btm-box-1 countimagecls" id ="imageid_'.$id.'">
                            <div id ="countid_'.$id.'" class="title-ct count_imgs">1</div>
                            <div class="thumb-ct"><a href="#"><span id="thmbimg_'.$id.'"></span></a></div>
                            <div class="link-ct"><a data-toggle="modal" role="button" href="#myModal3" onclick = "return fnshowimgpopup('.$id.')"><i class="fa fa-link"></i></a> <a href="javascript:;"><i onclick = "return fndeleteimg('.$id.')" class="fa fa-trash"></i></a></div>
                            <div class="ct-pic"><img src="/temp/' . $image_name .'" alt="img"></div>
                                <input id = "imageval_'.$id.'" name="tefdg[]" type="hidden" value="'.$id.'" >
                            </div>';
                            /*echo " 
                                
                                <script>
                                $(document).ready(function() {
                                    $('.reorder-photos-list').sortable().bind('sortupdate', function() {
                                            //Triggered when the user stopped sorting and the DOM position has changed.
                                            $('.count_imgs').each(function(key,value){
                                                      var seq=key+1;
                                                      $(this).text(seq);

                                                   });
                                    });
                                });
                                </script>
                                ";*/
                            //echo $str = "<input id ='imageval_".$id."' name='tefdg[]' type='hidden' value = '" .$id. "' />";
                        } else {
                            echo '<span class="imgList">You have exceeded the size limit! so moving unsuccessful! </span>';
                        }
                    } else {
                        echo '<span class="imgList">You have exceeded the size limit!</span>';
                    }
                } else {
                    echo '<span class="imgList">Unknown extension!</span>';
                }
            }
        }
    }
    
    public function savethmb_text(){
        $is_thumb = $this->input->post('is_thumb');
        $message = $this->input->post('message');
        $id = $this->input->post('id');
        $data = array(
            'is_thumb'=>$is_thumb,
            'message'=>$message
        );
        $this->magazine->update('temp_imgs',$id,$data);
    }
    
    public function uploadshare() {
        define ("MAX_SIZE","9000");
        $valid_formats = array("jpg", "jpeg",'png');
        if (isset($_POST) and $_SERVER['REQUEST_METHOD'] == "POST") {
            $uploaddir = dirname(dirname(dirname(__FILE__)))."/temp/"; //a directory inside
            foreach ($_FILES['photos']['name'] as $name => $value) {
                $filename = stripslashes($_FILES['photos']['name'][$name]);
                $_FILES['photos']['tmp_name'][$name];
                $size = filesize($_FILES['photos']['tmp_name'][$name]);
                //get the extension of the file in a lower case format
                $ext = $this->getExtension($filename);
                $ext = strtolower($ext);
                if (in_array($ext, $valid_formats)) {
                    if ($size < (MAX_SIZE * 1024)) {
                        $image_name = time() . $filename;
                       /*echo $str = '<div class="ct-btm-box-1">
                            <div class="title-ct">1</div>
                            <div class="thumb-ct"><a href="#"><i class="fa fa-thumbs-up"></i></a></div>
                            <div class="link-ct"><a data-toggle="modal" role="button" href="#myModal3"><i class="fa fa-link"></i></a> <a href="#"><i class="fa fa-trash"></i></a></div>
                            <div class="ct-pic"><img src="/temp/' . $image_name .'" alt="img"></div>
                        </div>';*/
                        
                        echo $str = '<img src="/temp/' . $image_name .'" alt="img" width="156" height="168" id="fileshowpic">';
                        $newname = $uploaddir . $image_name;
                        if (move_uploaded_file($_FILES['photos']['tmp_name'][$name], $newname)) {
                            $time = time();
                            $save_data = array(
                                'image_name'=>$image_name
                            );
                            $id = $this->common->add('temp_imgs',$save_data);
                            //mysql_query("INSERT INTO user_uploads(image_name,user_id_fk,created) VALUES('$image_name','$session_id','$time')");
                            echo $str = "<input id = 'sharetxt' name='sharetxt' type='hidden' value = '" .$id. "' />";
                        } else {
                            echo '<span class="imgList">You have exceeded the size limit! so moving unsuccessful! </span>';
                        }
                    } else {
                        echo '<span class="imgList">You have exceeded the size limit!</span>';
                    }
                } else {
                    echo '<span class="imgList">Unknown extension!</span>';
                }
            }
        }
    }
    
    public function audioupload(){
        define ("MAX_SIZE","90000");
        $valid_formats = array("mp3", "ogg");
        if (isset($_POST) and $_SERVER['REQUEST_METHOD'] == "POST") {
            $uploaddir = dirname(dirname(dirname(__FILE__)))."/temp/"; //a directory inside
            //pr($_FILES);exit;
           // $_FILES[0]['sound']['name'] = $_FILES['sound']['name'];
            //foreach ($_FILES['sound']['name'] as $name => $value) {
                $filename = stripslashes($_FILES['sound']['name']);
                $_FILES['sound']['tmp_name'];
                $size = filesize($_FILES['sound']['tmp_name']);
                //get the extension of the file in a lower case format
                $ext = $this->getExtension($filename);
                $ext = strtolower($ext);
                if (in_array($ext, $valid_formats)) {
                    if ($size < (MAX_SIZE * 1024)) {
                        $image_name = time() . $filename;
                        $newname = $uploaddir . $image_name;
                        echo $str = '<img src="/assets/front/images/music-icon.png">';
                        if (move_uploaded_file($_FILES['sound']['tmp_name'], $newname)) {
                            $time = time();
                            $save_data = array(
                                'image_name'=>$image_name
                            );
                            $id = $this->common->add('temp_imgs',$save_data);
                            //mysql_query("INSERT INTO user_uploads(image_name,user_id_fk,created) VALUES('$image_name','$session_id','$time')");
                            echo $str = "<input name='audiofiled' id='audiofiled' type='hidden' value = '" .$id. "' />";
                        } else {
                            echo '<span class="imgList">You have exceeded the size limit! so moving unsuccessful! </span>';
                        }
                    } else {
                        echo '<span class="imgList">You have exceeded the size limit!</span>';
                    }
                } else {
                    echo '<span class="imgList">Unknown extension!</span>';
                }
            //}
        }
    }

    function getExtension($str){
            $i = strrpos($str,".");
            if (!$i) { return ""; }
            $l = strlen($str) - $i;
            $ext = substr($str,$i+1,$l);
            return $ext;
    }
    
    public function mymaganize(){
        $data['data'] = '';
        $data['page'] = 'magazines/mymaganize';
        $data['title']= 'create mymaganize';
        $data['magazines'] = $this->magazine->getallmagazine();
        //pr($data);exit;
        $this->load->view('layout/default',$data);
    }
    public function mydraft(){
        $data['data'] = '';
        $data['page'] = 'magazines/mymaganize';
        $data['title']= 'maganize draft';
        $data['magazines'] = $this->magazine->getalldraftmagazine();
        $this->load->view('layout/default',$data);
    }
    
    
    
    
    
    
    public function removeimg(){
        $id = $this->input->post('id');
        $imgdata = $this->magazine->get_resultbyattr('images','temp_img_id',$id);
        if(!empty($imgdata)){
            $source = dirname(dirname(dirname(__FILE__))).'/uploads/images/'.$imgdata->image_name;
            $this->magazine->delete('images','temp_img_id',$id);
            unlink($source);
        }
        $imgtempdata = $this->magazine->get_resultbyattr('temp_imgs','id',$id);
        if(!empty($imgtempdata)){
            $source = dirname(dirname(dirname(__FILE__))).'/temp/'.$imgtempdata->image_name;
            $this->magazine->delete('temp_imgs','id',$id);
            unlink($source);
        }
    }
    
    
    public function draftsmaganize(){
        
    }
    
    public function favoritesmaganize(){
         
    }
    
    public function qr($id){
        include dirname(dirname(dirname(__FILE__))).'/phpqrcode/qrlib.php';
        $PNG_TEMP_DIR = dirname(dirname(dirname(__FILE__))).DIRECTORY_SEPARATOR.'qr'.DIRECTORY_SEPARATOR;
        $PNG_WEB_DIR = '/qr/';
        if (!file_exists($PNG_TEMP_DIR))
            mkdir($PNG_TEMP_DIR);
        $filename = $PNG_TEMP_DIR.'qr.png';
        $errorCorrectionLevel = 'L';
        $matrixPointSize = 4;
        $_REQUEST['data'] = WEBURL.'/magazines/details/'.$id;
        $filename = $PNG_TEMP_DIR.'qr'.md5($_REQUEST['data'].'|'.$errorCorrectionLevel.'|'.$matrixPointSize).'.png';
        QRcode::png($_REQUEST['data'], $filename, $errorCorrectionLevel, $matrixPointSize, 2);
        return  'qr'.md5($_REQUEST['data'].'|'.$errorCorrectionLevel.'|'.$matrixPointSize).'.png';
    }
    
    public function deletemagazine($id){
        $data = array(
            'is_delete'=>'1'
        );
        $this->magazine->update('articles',$id,$data);
    }
    
    public function addmoremag2(){
        $count = $this->input->post('page_num');//exit;
        $cat_id = $this->input->post('cat_id');
        if($cat_id == 'all'){
            $results = $this->magazine->get_all_published_more_magazine($count+1);
        }else{
            $results = $this->magazine->get_all_published_more_via_cat_magazine($count,$cat_id);
        }
        
        $data['count'] = $count;
        $data['category_id'] = $cat_id;
        $data['results']= $results;
        $this->load->view('addmore2',$data);
    }
    
    
    public function morecat(){
            $data = $this->input->post('cat');
            $music_id = $this->input->post('music_id');
            $this->load->view('magazines/morecat',array('data'=>$data,'music_id'=>$music_id));
        }
        
        public function magazineviacat(){
            $data['data'] = '';
            if($this->input->server('REQUEST_METHOD') === 'POST') {
                $category_id = $this->input->post('id');
                $data['category_id'] = $category_id;
                if($category_id == 'all'){
                    //echo ';lkjlk';exit;
                    $results = $this->magazine->get_all_published_magazine();
                    $total_count = $this->magazine->count_approved_magazines();
                }else{
                    $total_count = $this->magazine->get_category_count($category_id);
                    $results = $this->magazine->get_cat_magazines($category_id);
                }
                
                $data['count'] = $total_count;
                $data['results'] = $results;
            }
            $this->load->view('magazines/magazineviacat',$data);
	}
        
        public function get_ads(){
            $get_ads_max = $this->common->get_ads_max('get_ads');
            $ads_show_id = $get_ads_max->ad_slot;
            $get_ad_data = $this->magazine->get_ad_data($ads_show_id);
            if(empty($get_ad_data)){
                $ads_show_id = '1';
                $data = array('ad_slot'=>2);
                $this->common->update_ads_max('get_ads',$data);
            }else{
                $ad_slot = $ads_show_id+1;
                $data = array('ad_slot'=>$ad_slot);
                $this->common->update_ads_max('get_ads',$data);
                //$ads_show_id = 
            }
            
            $get_ad_data = $this->magazine->get_ad_data($ads_show_id);
           // pr($get_ad_data);exit;
            $data['get_ad_data'] = $get_ad_data;
            $this->load->view('magazines/get_ads',$data);
        }
        /*public function get_ads(){
            $get_session_ads_show_id = $this->session->userdata('ads_show_id');
            $ads_show_id = $get_session_ads_show_id+1;
            $session_data = array(
                'ads_show_id'=>$ads_show_id
            );
            $this->session->set_userdata($session_data);
            $get_ad_data = $this->magazine->get_ad_data($ads_show_id);
            if(empty($get_ad_data)){
                $session_data = array(
                    'ads_show_id'=>'1'
                );
                $this->session->set_userdata($session_data);
                $ads_show_id = '1';
                $get_ad_data = $this->magazine->get_ad_data($ads_show_id);
            }
            $data['get_ad_data'] = $get_ad_data;
            $this->load->view('magazines/get_ads',$data);
        }*/
        
        public function detail($id){
            
            $data['data'] = '';
            $category_data = $this->common->findByAttr('articles','id',$id);
            $user_type_id = $this->session->userdata('user_type_id');
            $user_id = $this->session->userdata('id');
            if(isset($user_type_id) and $user_type_id =='1'){
                
            }else if(isset($user_id) and $user_id == $category_data->user_id){
                
            }else if($category_data->is_published=='' or $category_data->is_published !='1'){
                redirect('/');
            }
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
            $data['rand_selfmagazine'] = $this->magazine->rand_selfmagazine($category_data->user_id,$id);
            $data['review'] = $review;
            $img_id = $images_data[0]->id;
            
            $comment_data = $this->magazine->get_comments($img_id,$category_data->id);
            $data['comment_data'] = $comment_data;
            $this->load->view('magazines/detail',$data);
        }
        
        public function likeunlike(){
            $article_id = $this->input->post('article_id');
            $user_id = $this->input->post('user_id');
            $flag = $this->magazine->likeunlike($article_id,$user_id);
            $category_data = $this->common->findByAttr('articles','id',$article_id);
            $active = '';
            if(isset($flag) and $flag =='1'){
                $active = 'active';
            }
            echo '<i class="fa fa-heart '.$active.'"></i>'.$category_data->favorites_count;
            //pr($category_data);
            
        }
        
        function add_comment(){
            //pr($_POST);
            $image_id = $this->input->post('img_id');
            $article_id = $this->input->post('article_id');
            $user_id = $this->input->post('user_id');
            $message = $this->input->post('message');
            $data = array(
                'image_id'=>$image_id,
                'article_id'=>$article_id,
                'user_id'=>$user_id,
                'comment'=>$message,
                'created'=>date('Y-m-d H:i:s')
            );
            $id = $this->magazine->save('comments',$data);
            $comment_data = $this->magazine->get_resultbyid('comments',$id);
            //pr($comment_data);
                $image_name = $this->common->findByAttr('users','id',$comment_data->user_id);
                if(isset($image_name->profile_pic) and $image_name->profile_pic !=''){
                    $imagename = '/uploads/profile/'.$image_name->profile_pic;
                }else{
                    $imagename = '/assets/front/images/water-img1.jpg';
                }
                $title = $image_name->firstname.' '.$image_name->lastname;
            $str = '<li>
                        <div class="cmt-left"><img title = "'.$title.'" src="'.$imagename.'" width="81" height="50" alt="img"></div>
                        <div class="cmt-right">
                            <p class="words-txt"> '.$comment_data->comment.'<span class="fr btn_show arrow arrow_b"></span> </p>
                            <div class="operate clearfix">
                                <p class="op_time fl">'.$timeago=$this->get_timeago(strtotime($comment_data->created)).'</p>
                                <div class="op_reply fr"> <span class="praise"><a onclick = "fncommentlike(this);" href="#" id="'.$comment_data->id.'_'.$comment_data->article_id.'_'.$comment_data->image_id.'_'.$this->session->userdata('id').'"><i class="fa fa-thumbs-up"></i> '.$comment_data->like_count.'</a></span> </div>
                            </div>
                        </div>
                        <div class="clearfix"></div>
                    </li>';
            echo $str;
            //pr($comment_data);
        }
        
        public function get_comments(){
            $captcha = $this->session->userdata('captcha');
               // pr($captcha);exit;
            $image_id = $this->input->post('img_id');
            $article_id = $this->input->post('article_id');
            $comment_data = $this->magazine->get_comments($image_id,$article_id);
            $str =  '';
            if(!empty($comment_data)){
                foreach($comment_data as $comment){
                    $image_name = $this->common->findByAttr('users','id',$comment->user_id);
                    if(isset($image_name->profile_pic) and $image_name->profile_pic !=''){
                        $imagename = '/uploads/profile/'.$image_name->profile_pic;
                    }else{
                        $imagename = '/assets/front/images/water-img1.jpg';
                    }
                    $title = $image_name->firstname.' '.$image_name->lastname;
                    $selected_hand = $this->magazine->find_image_like_data($image_id,$comment->id);
                    if(isset($selected_hand) and $selected_hand =='1'){
                        $active = 'active';
                    }else{
                        $active = '';   
                    }
                    $user_id = $this->session->userdata('id');
                    if(isset($user_id) and $user_id !=''){
                        $str .= '<li>
                            <div class="cmt-left"><img title = "'.$title.'" src="'.$imagename.'" width="81" height="50" alt="img"></div>
                            <div class="cmt-right">
                                <p class="words-txt"> '.$comment->comment.'<span class="fr btn_show arrow arrow_b"></span> </p>
                                <div class="operate clearfix">
                                    <p class="op_time fl">'.$timeago=$this->get_timeago(strtotime($comment->created)).'</p>
                                    <div class="op_reply fr"> <span class="praise"><a onclick = "fncommentlike(this);" href="#" id="'.$comment->id.'_'.$comment->article_id.'_'.$comment->image_id.'_'.$this->session->userdata('id').'"><i class="fa fa-thumbs-up '.$active.'"></i> '.$comment->like_count.'</a></span> </div>
                                </div>
                            </div>
                            <div class="clearfix"></div>
                        </li>';
                    }else{
                        $str .= '<li>
                            <div class="cmt-left"><img title = "'.$title.'" src="'.$imagename.'" width="81" height="50" alt="img"></div>
                            <div class="cmt-right">
                                <p class="words-txt"> '.$comment->comment.'<span class="fr btn_show arrow arrow_b"></span> </p>
                                <div class="operate clearfix">
                                    <p class="op_time fl">'.$timeago=$this->get_timeago(strtotime($comment->created)).'</p>
                                    <div class="op_reply fr"> <span class="praise"><a data-target="#basicModal" data-toggle="modal" href="javascript:;" id="'.$comment->id.'_'.$comment->article_id.'_'.$comment->image_id.'_'.$this->session->userdata('id').'"><i class="fa fa-thumbs-up '.$active.'"></i> '.$comment->like_count.'</a></span> </div>
                                </div>
                            </div>
                            <div class="clearfix"></div>
                        </li>';
                    }
                    
                }
            }
            echo $str;exit;
            //$data['comment_data'] = $comment_data;
            //pr($_POST);
        }
        
        function commentlikeunlike(){
            $mixed_id = $this->input->post('mixed_id');
            $expl = explode('_',$mixed_id);
            $comment_id = $expl[0];
            $article_id = $expl[1];
            $image_id = $expl[2];
            $user_id = $expl[3];
            $flag = $this->magazine->findlikedata($expl);
            $comments_data = $this->common->findByAttr('comments','id',$comment_id);
            $active = '';
            if(isset($flag) and $flag =='1'){
                $active = 'active';
            }
            echo '<i class="fa fa-thumbs-up '.$active.'"></i>'.$comments_data->like_count;
            
        }
        
        function usermagazine($user_id){
            $search = $this->input->get('search');
            $cat_name = $this->input->get('name');
            $per_page = $this->input->get('per_page');
            $count = '0';
            $results = array();
            $data['data'] = '';
            $condition = "is_active = '1'";
            $categories = $this->common->findList('categories',$condition);
            foreach($categories as $category){
                $catarr[$category->id] = $category->category_name;
            }
            $data['categories'] = $categories;
            $data['page'] = 'magazines/index';
            $data['title']= 'Home';
            //$cat_session = $this->session->userdata('cat');
            if(isset($cat_name) and $cat_name =='all'){
                $cat_name = '';
                //$this->session->set_userdata('cat','');
            }
            if(isset($cat_name) and $cat_name !=''){
                //echo 'sfsdf';exit;
                $con = '';
                $con = " and categories like '%".trim(addslashes($cat_name))."%'";
                $mag_condition = 'is_delete = "0" and is_draft ="0" and is_published = "1" and is_active = "1" and user_id = "'.$user_id.'" '.$con;
                $count = $this->magazine->count_feature_magazines('articles',$mag_condition);
                $config['base_url'] = '/magazines/index?name='.$cat_name;
                
                $config['total_rows'] = $count;
                $config['per_page'] = PAGE_LIMIT; 
                $config['page_query_string'] = TRUE;
                $config['uri_segment']=3;
                $config['full_tag_open'] = '<ul>';
                $config['full_tag_close'] = '</ul>';
                $config['num_tag_open'] = '<li>';
                $config['num_tag_close'] = '</li>';
                $config['cur_tag_open'] = '<li><a class="active">';
                $config['cur_tag_close'] = '</a></li>';
                    if($per_page==''){
                        $offset =0;
                    }else{
                        $offset = $per_page;
                    }
                $this->pagination->initialize($config);
                $results = $this->magazine->get_all_feature_magazine('articles',$mag_condition,$offset);
                
            }else{
               // $this->session->set_userdata('cat','');
                $con = '';
                if(isset($search) and $search !=''){
                     $con = " and title like '%".trim(addslashes($search))."%'";
                }
                $mag_condition = 'is_delete = "0" and is_draft ="0" and is_published = "1" and is_active = "1" and user_id = "'.$user_id.'"'.$con;
                $count = $this->magazine->count_feature_magazines('articles',$mag_condition);
                $config['base_url'] = '/magazines/index?search='.$search;
                $config['total_rows'] = $count;
                $config['per_page'] = PAGE_LIMIT; 
                $config['page_query_string'] = TRUE;
                $config['next_link'] = 'Next';
                $config['prev_link'] = 'Previous';
                $config['uri_segment']=3;
                $config['full_tag_open'] = '<ul>';
                $config['full_tag_close'] = '</ul>';
                $config['num_tag_open'] = '<li>';
                $config['num_tag_close'] = '</li>';
                $config['cur_tag_open'] = '<li><a class="active">';
                $config['cur_tag_close'] = '</a></li>';
                    if($per_page==''){
                        $offset =0;
                    }else{
                        $offset = $per_page;
                    }
                $this->pagination->initialize($config);
                $results = $this->magazine->get_all_feature_magazine('articles',$mag_condition,$offset);
            }
            $data['results']= $results;
            $data['count']= $count;
            $this->load->view('layout/home',$data);
        }
        
        public function favorites(){
            $data['data'] = '';
            $data['page'] = 'magazines/favorites';
            $data['title']= 'Favorites Maganize';
            //$data['magazines'] = $this->magazine->getallmagazine();
            $data['magazines'] = $this->magazine->getfavoritesmagazine();
            //pr($data);exit;
            $this->load->view('layout/default',$data);
        }
        
        
        
        
        
        
        
        
    function get_timeago($ptime) {
        $estimate_time = time() - $ptime;

        if ($estimate_time < 1) {
            return 'less than 1 second ago';
        }

        $condition = array(
            12 * 30 * 24 * 60 * 60 => 'year',
            30 * 24 * 60 * 60 => 'month',
            24 * 60 * 60 => 'day',
            60 * 60 => 'hour',
            60 => 'minute',
            1 => 'second'
        );

        foreach ($condition as $secs => $str) {
            $d = $estimate_time / $secs;

            if ($d >= 1) {
                $r = round($d);
                return 'about ' . $r . ' ' . $str . ( $r > 1 ? 's' : '' ) . ' ago';
            }
        }
    }
    
    
    public function details($id){
            $data['data'] = '';
            $category_data = $this->common->findByAttr('articles','id',$id);
            
            if(empty($category_data)){
                redirect('/');
            }
            $data['images_data'] = $this->common->findByAttrAll('images','article_id',$category_data->id);
            $data['music_data'] = $this->common->findByAttr('musics','id',$category_data->music_id);
            $data['magazine_data'] = $category_data;
            $review = $this->magazine->check_ip($category_data->user_id,$category_data->id);
            $data['user_data'] = $this->common->findByAttr('users','id',$category_data->user_id);
            
            $get_ads_max = $this->common->get_ads_max('get_ads');
            $ads_show_id = $get_ads_max->ad_slot;
            $get_ad_data = $this->magazine->get_ad_data($ads_show_id);
            if(empty($get_ad_data)){
                $ads_show_id = '1';
                $data2 = array('ad_slot'=>2);
                $this->common->update_ads_max('get_ads',$data2);
            }else{
                $ad_slot = $ads_show_id+1;
                $data2 = array('ad_slot'=>$ad_slot);
                $this->common->update_ads_max('get_ads',$data2);
                //$ads_show_id = 
            }
            
            $get_ad_data = $this->magazine->get_ad_data($ads_show_id);
            
            $rand_magazines =  $this->magazine->rand_magazines();
            $data['rand_magazines'] = $rand_magazines;
            $rand_selfmagazine = $this->magazine->rand_selfmagazine2($category_data->user_id,$id);
            $data['rand_selfmagazine'] = $rand_selfmagazine;
            
            
            $data['get_ad_data'] = $get_ad_data;
            $this->load->view('magazines/details',$data);
        }

}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */