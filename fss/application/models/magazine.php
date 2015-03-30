<?php
require_once dirname(__FILE__).'/model.php';
class Magazine extends Model {
     function __construct(){
        parent::__construct();
     }
     
     public function get_category_count($category_id){
         $this->db->select('count(*) as cnt');
         $this->db->from('article_categories');
         if($category_id == 'all'){
             
         }else{
             $this->db->where('article_categories.category_id', $category_id); 
         }
         //$this->db->where('article_categories.category_id', $category_id);
         
         $query=$this->db->get();
         $result = $query->result();
         //pr($result);exit;
         return $result[0]->cnt;
     }
     
     public function get_cat_magazines($category_id){
         $data = array();
         $this->db->select('article_categories.*');
         $this->db->from('article_categories');
         if($category_id == 'all'){
             
         }else{
             $this->db->where('article_categories.category_id', $category_id); 
         }
         //$this->db->where('article_categories.category_id', $category_id); 
         $this->db->limit(9);
         $query=$this->db->get();
         $results = $query->result();
         if(!empty($results)){
             //$data['article_categories'] = $query->result();
             $i=0;
             foreach($results as $result){
                $data[$i]['article_categories'] = $result;
                $this->db->select('*');
                $this->db->from('articles');
                $this->db->where('is_delete','0');
                $this->db->where('is_draft','0');
                $this->db->where('is_active','1');
                $this->db->where('is_published','1');
                $this->db->where('id',$result->article_id);
                $this->db->order_by('id','desc');
                $query =  $this->db->get();
                $results = $query->result();
                
                $article_id  = $result->article_id;
                foreach($results as $result){
                    $data[$i]['articles'] = $result;
                }
                $this->db->select('*');
                $this->db->from('images');
                $this->db->order_by('img_order','asc');
                $this->db->where('article_id',$article_id);
                $query =  $this->db->get();
                $results = $query->result();
                $j=0;
                foreach($results as $result){
                    $data[$i]['images'][$j] = $result;
                    $j++;
                }
                //$data['articles'][$i] = $result1[0];
                $i++;
             }
         }
         return $data;
         pr($data);
         exit;
     }
     
     public function get_musics(){
         $this->db->select('*');
         $this->db->from('musics');
         $this->db->where('is_active','1');
         $this->db->limit(5);
         $query =  $this->db->get();
         return $query->result();
     }
     
     public function get_musics_cnt($condition=''){
         $this->db->select('count(*) as cnt');
         $this->db->from('musics');
         $this->db->where('is_active','1');
         if(isset($condition) and $condition !=''){
             $this->db->where($condition);
         }
         $query =  $this->db->get();
         $result = $query->result();
         return $result[0]->cnt;
     }
     
     public function update($table,$id,$save_data){
         $this->db->where('id', $id);
         $this->db->update($table, $save_data); 
     }
     
     public function updatebyattr($table,$field,$id,$save_data){
         $this->db->where($field, $id);
         $this->db->update($table, $save_data); 
     }
     
     public function save($table,$save_data){
         $this->db->insert($table, $save_data);
         return $this->db->insert_id();
     }
     
     public function delete($table,$field,$value){
         $this->db->where($field, $value);
         $this->db->delete($table);
     }
     
     
     public function get_resultbyid($table,$id){
         $this->db->select('*');
         $this->db->from($table);
         $this->db->where('id',$id);
         $query =  $this->db->get();
         $result =  $query->result();
         if(!empty($result))
            return $result[0];
         else 
             return '';
     }
     
     public function get_resultbyattr($table,$field,$value){
         $this->db->select('*');
         $this->db->from($table);
         $this->db->where($field,$value);
         $query =  $this->db->get();
         $result =  $query->result();
         if(!empty($result))
            return $result[0];
         else 
             return '';
     }
     
     public function getallmagazine(){
         $data = array();
         $user_id = $this->session->userdata('id');
         $this->db->select('*');
         $this->db->from('articles');
         $this->db->where('user_id',$user_id);
         $this->db->where('is_delete','0');
         $this->db->where('is_draft','0');
         $this->db->order_by('id','desc');
         $query =  $this->db->get();
         $results =  $query->result();
         $data = array();
         $i=0;
         foreach($results as $result){
            $j=0;
            $data[$i]['articles'] = $result;
            $articles_id = $result->id;
            $this->db->select('*');
            $this->db->from('images');
            $this->db->order_by('img_order','asc');
            $this->db->where('article_id',$result->id);
            $query =  $this->db->get();
            $results =  $query->result();
            foreach($results as $result){
                $data[$i]['images'][$j] = $result;
                $j++;
            }
            $this->db->select('*');
            $this->db->from('article_categories');
            $this->db->where('article_id',$articles_id);
            $query =  $this->db->get();
            $results =  $query->result();
            $k =0;
            foreach($results as $result){
                $data[$i]['article_categories'][$k] = $result;
                $k++;
            }
            $i++;
         }
         return $data;
         pr($data);exit;
     }
     
     public function getalldraftmagazine(){
         $data = array();
         $user_id = $this->session->userdata('id');
         $this->db->select('*');
         $this->db->from('articles');
         $this->db->where('user_id',$user_id);
         $this->db->where('is_delete','0');
         $this->db->where('is_draft','1');
         $this->db->order_by('id','desc');
         $query =  $this->db->get();
         $results =  $query->result();
         $data = array();
         $i=0;
         foreach($results as $result){
            $j=0;
            $data[$i]['articles'] = $result;
            $articles_id = $result->id;
            $this->db->select('*');
            $this->db->from('images');
            $this->db->order_by('img_order','asc');
            $this->db->where('article_id',$result->id);
            $query =  $this->db->get();
            $results =  $query->result();
            foreach($results as $result){
                $data[$i]['images'][$j] = $result;
                $j++;
            }
            $this->db->select('*');
            $this->db->from('article_categories');
            $this->db->where('article_id',$articles_id);
            $query =  $this->db->get();
            $results =  $query->result();
            $k =0;
            foreach($results as $result){
                $data[$i]['article_categories'][$k] = $result;
                $k++;
            }
            $i++;
         }
         return $data;
         pr($data);exit;
     }
     
     public function get_single_magazine($id){
         $data = array();
         $user_id = $this->session->userdata('id');
         $this->db->select('*');
         $this->db->from('articles');
         $this->db->where('user_id',$user_id);
         $this->db->where('is_delete','0');
         $this->db->where('id',$id);
         $query =  $this->db->get();
         $results =  $query->result();
         $data = array();
         $i=0;
         foreach($results as $result){
            $j=0;
            $data[$i]['articles'] = $result;
            $articles_id = $result->id;
            $this->db->select('*');
            $this->db->from('images');
            $this->db->order_by('img_order','asc');
            $this->db->where('article_id',$result->id);
            $query =  $this->db->get();
            $results =  $query->result();
            foreach($results as $result){
                $data[$i]['images'][$j] = $result;
                $j++;
            }
            $this->db->select('*');
            $this->db->from('article_categories');
            $this->db->where('article_id',$articles_id);
            $query =  $this->db->get();
            $results =  $query->result();
            $k =0;
            foreach($results as $result){
                $data[$i]['article_categories'][$k] = $result;
                $k++;
            }
            $i++;
         }
         return $data[0];
     }
     
     public function get_category_arr($val){
         if(isset($val) and $val !=''){
             
         }else{
             $val = '"TEST_100"';
         }
            $this->db->select('id,category_name');
            $this->db->from('categories');
            $this->db->where("id in ($val)");
            $query =  $this->db->get();
            $results =  $query->result();
            foreach($results as $result){
                $data[$result->id] =$result->category_name; 
            }
            return $data;
     }
     
     public function delete_category_arr($val){
         $this->db->where("category_id in ($val)");
         $this->db->delete('article_categories');
     }
     
     
     public function get_deshbord_magazines(){
         $this->db->select('articles.*,users.username,users.email,users.firstname,users.lastname,users.mobile');
         $this->db->from('articles');
         $this->db->join('users', 'articles.user_id = users.id');
         //$this->db->where($condition);
         //$this->db->where('articles.is_active','1');
         $this->db->where('(is_published not in (0,1) or is_published is null)');
         $this->db->where('is_draft','0');
         $this->db->where('is_delete','0');
         $query =  $this->db->get();
         $results =  $query->result();
         return $results;
     }
     
     public function get_magazines(){
         $this->db->select('articles.*,users.username,users.email,users.firstname,users.lastname,users.mobile');
         $this->db->from('articles');
         $this->db->join('users', 'articles.user_id = users.id');
         //$this->db->where($condition);
         $this->db->where('is_draft','0');
         $this->db->where('is_delete','0');
         $query =  $this->db->get();
         $results =  $query->result();
         return $results;
     }
     public function approved($condition){
         $this->db->select('articles.*,users.username,users.email,users.firstname,users.lastname,users.mobile');
         $this->db->from('articles');
         $this->db->join('users', 'articles.user_id = users.id');
         $this->db->where($condition);
         $query =  $this->db->get();
         $results =  $query->result();
         return $results;
     }
     
     public function get_all_published_magazine(){
         $data = array();
         //$user_id = $this->session->userdata('id');
         $this->db->select('*');
         $this->db->from('articles');
         //$this->db->where('user_id',$user_id);
         $this->db->where('is_delete','0');
         $this->db->where('is_draft','0');
         $this->db->where('is_active','1');
         $this->db->where('is_published','1');
         $this->db->order_by('updated','desc');
         $this->db->order_by('id','desc');
         $this->db->limit(9);
         $query =  $this->db->get();
         $results =  $query->result();
         $data = array();
         $i=0;
         foreach($results as $result){
            $j=0;
            $data[$i]['articles'] = $result;
            
            $this->db->select('*');
            $this->db->from('users');
            //$this->db->order_by('img_order','asc');
            $this->db->where('id',$result->user_id);
            $query =  $this->db->get();
            $results =  $query->result();
            $data[$i]['users'] = $results[0];
            
            $articles_id = $result->id;
            $this->db->select('*');
            $this->db->from('images');
            $this->db->order_by('img_order','asc');
            $this->db->where('article_id',$result->id);
            $query =  $this->db->get();
            $results =  $query->result();
            foreach($results as $result){
                $data[$i]['images'][$j] = $result;
                $j++;
            }
            $this->db->select('*');
            $this->db->from('article_categories');
            $this->db->where('article_id',$articles_id);
            $query =  $this->db->get();
            $results =  $query->result();
            $k =0;
            foreach($results as $result){
                $data[$i]['article_categories'][$k] = $result;
                $k++;
            }
            $i++;
         }
         return $data;
         //pr($data);exit;
     }
     
     public function count_approved_magazines(){
         $this->db->select('count(*) as cnt');
         $this->db->from('articles');
         //$this->db->where('user_id',$user_id);
         $this->db->where('is_delete','0');
         $this->db->where('is_draft','0');
         $this->db->where('is_active','1');
         $this->db->where('is_published','1');
         $query =  $this->db->get();
         $results =  $query->result();
         return $results[0]->cnt;
         pr($results[0]->cnt);exit;
     }
     
     public function get_all_published_more_magazine($page){
         //echo $page;exit;
         $data = array();
         $this->db->select('*');
         $this->db->from('articles');
         //$this->db->where('user_id',$user_id);
         $this->db->where('is_delete','0');
         $this->db->where('is_draft','0');
         $this->db->where('is_active','1');
         $this->db->where('is_published','1');
         $this->db->order_by('id','desc');
         $offset = ($page-1)*9;
         $this->db->limit(9,$offset);
         $query =  $this->db->get();
         $results =  $query->result();
         $data = array();
         $i=0;
         foreach($results as $result){
            $j=0;
            $data[$i]['articles'] = $result;
            $articles_id = $result->id;
            $this->db->select('*');
            $this->db->from('images');
            $this->db->order_by('img_order','asc');
            $this->db->where('article_id',$result->id);
            $query =  $this->db->get();
            $results =  $query->result();
            foreach($results as $result){
                $data[$i]['images'][$j] = $result;
                $j++;
            }
            $this->db->select('*');
            $this->db->from('article_categories');
            $this->db->where('article_id',$articles_id);
            $query =  $this->db->get();
            $results =  $query->result();
            $k =0;
            foreach($results as $result){
                $data[$i]['article_categories'][$k] = $result;
                $k++;
            }
            $i++;
         }
         return $data;
         //pr($data);exit;
     }
     
     
     public function get_all_published_more_via_cat_magazine($page,$cat_id){
         $data = array();
         $this->db->select('article_categories.*');
         $this->db->from('article_categories');
         if($cat_id == 'all'){
             
         }else{
             $this->db->where('article_categories.category_id', $cat_id); 
         }
         //$this->db->where('article_categories.category_id', $cat_id); 
         $offset = ($page)*9;
         $this->db->limit(9,$offset);
         $query=$this->db->get();
         $results = $query->result();
         //pr($results);exit;
         if(!empty($results)){
             //$data['article_categories'] = $query->result();
             $i=0;
             foreach($results as $result){
                 //pr($result);
                $data[$i]['article_categories'] = $result;
                $this->db->select('*');
                $this->db->from('articles');
                $this->db->where('is_delete','0');
                $this->db->where('is_draft','0');
                $this->db->where('is_active','1');
                $this->db->where('is_published','1');
                $this->db->where('id',$result->article_id);
                $this->db->order_by('id','desc');
                $query =  $this->db->get();
                $results = $query->result();
                
                $article_id  = $result->article_id;
                foreach($results as $result){
                    $data[$i]['articles'] = $result;
                }
                $this->db->select('*');
                $this->db->from('images');
                $this->db->order_by('img_order','asc');
                $this->db->where('article_id',$article_id);
                $query =  $this->db->get();
                $results = $query->result();
                $j=0;
                foreach($results as $result){
                    $data[$i]['images'][$j] = $result;
                    $j++;
                }
                //$data['articles'][$i] = $result1[0];
                $i++;
             }
         }
         return $data;
         //pr($data);
         exit;
     }
     
     public function count_feature_magazines($table,$conditions){
         $this->db->select('count(*) as cnt');
         $this->db->from('articles');
         $this->db->where($conditions);
         $query =  $this->db->get();
         $results = $query->result();
         return $results[0]->cnt;
         //pr($results[0]->cnt);
     }
     
     public function get_all_feature_magazine($table,$conditions,$offset){
         $data = array();
         //$user_id = $this->session->userdata('id');
         $this->db->select('*');
         $this->db->from($table);
         //$this->db->where('user_id',$user_id);
         $this->db->where($conditions);
         $this->db->order_by('updated','desc');
         $this->db->order_by('id','desc');
         $this->db->limit(PAGE_LIMIT,$offset);
         $query =  $this->db->get();
         $results =  $query->result();
         $data = array();
         $i=0;
         foreach($results as $result){
            $j=0;
            $data[$i]['articles'] = $result;
            
            $this->db->select('*');
            $this->db->from('users');
            //$this->db->order_by('img_order','asc');
            $this->db->where('id',$result->user_id);
            $query =  $this->db->get();
            $results =  $query->result();
            $data[$i]['users'] = $results[0];
            
            $articles_id = $result->id;
            $this->db->select('*');
            $this->db->from('images');
            $this->db->order_by('img_order','asc');
            $this->db->where('article_id',$result->id);
            $query =  $this->db->get();
            $results =  $query->result();
            foreach($results as $result){
                $data[$i]['images'][$j] = $result;
                $j++;
            }
            $this->db->select('*');
            $this->db->from('article_categories');
            $this->db->where('article_id',$articles_id);
            $query =  $this->db->get();
            $results =  $query->result();
            $k =0;
            foreach($results as $result){
                $data[$i]['article_categories'][$k] = $result;
                $k++;
            }
            $i++;
         }
         return $data;
         pr($data);exit;
     }
     
     public function check_ip($user_id,$article_id){
        $ip = $_SERVER['REMOTE_ADDR'];
        /*$this->db->select('*');
        $this->db->from('reviews');
        $this->db->where('article_id',$article_id);
        $this->db->where('ip',$ip);
        $query =  $this->db->get();
        $results =  $query->result();*/
        //if(empty($results)){
            $data = array(
                'user_id'=>$user_id,
                'article_id'=>$article_id,
                'ip'=>$ip
            );
            $this->db->insert('reviews', $data);
            //Get article data for update review
            $this->db->select('*');
            $this->db->from('articles');
            $this->db->where('id',$article_id);
            $query =  $this->db->get();
            $results =  $query->result();
            $update_data  = array(
                'read_count'=>$results[0]->read_count+1
            );
            $this->db->where('id', $article_id);
            $this->db->update('articles', $update_data); 
        //}
        //Get count of reviews
        $this->db->select('count(*) as cnt');
        $this->db->from('reviews');
        $this->db->where('article_id',$article_id);
        $query =  $this->db->get();
        $results =  $query->result();
        $count = $results[0]->cnt;
        
        
        //pr($results);exit;
        return $count;
     }
     
     public function likeunlike($article_id,$user_id){
         $user_id = $this->session->userdata('id');
        // Get Article data
        $this->db->select('*');
        $this->db->from('articles');
        $this->db->where('id',$article_id);
        $query1 =  $this->db->get();
        $results1 =  $query1->result();
         
        //Get Like data
        $this->db->select('*');
        $this->db->from('likes');
        $this->db->where('article_id',$article_id);
        $this->db->where('user_id',$user_id);
        $query =  $this->db->get();
        $results =  $query->result();
        if(!empty($results)){
            if(isset($results[0]->is_like) and $results[0]->is_like == '1'){
                $like_data = array(
                    'is_like'=>0,
                    'article_id'=>$article_id,
                    'user_id'=>$user_id
                );
                $article_data = array(
                    'favorites_count'=>$results1[0]->favorites_count-1
                );
                $flag = 0;
            }else{
                $like_data = array(
                    'is_like'=>1,
                    'article_id'=>$article_id,
                    'user_id'=>$user_id
                );
                $article_data = array(
                    'favorites_count'=>$results1[0]->favorites_count+1
                );
                $flag = 1;
            }
            $this->db->where('id', $results[0]->id);
            $this->db->update('likes', $like_data); 

            
        }else{
            $like_data = array(
                    'is_like'=>1,
                    'article_id'=>$article_id,
                    'user_id'=>$user_id
            );
            $article_data = array(
                    'favorites_count'=>$results1[0]->favorites_count+1
            );
            $this->db->insert('likes', $like_data);
            $flag = 1;
        }
        $this->db->where('id', $article_id);
        $this->db->update('articles', $article_data); 
        return $flag;
     }
     
     public function likedata($article_id){
        $user_id = $this->session->userdata('id');
        $this->db->select('*');
        $this->db->from('likes');
        $this->db->where('article_id',$article_id);
        $this->db->where('user_id',$user_id);
        $query =  $this->db->get();
        $results =  $query->result();
        if(!empty($results)){
            return $results[0];
        }
        return '0';
     }
     
     public function rand_selfmagazine2($user_id,$a_id){
         $data = array();
         //$user_id = $this->session->userdata('id');
         $this->db->select('*');
         $this->db->from('articles');
         $this->db->where('is_delete','0');
         $this->db->where('is_draft','0');
         $this->db->where('is_active','1');
         $this->db->where('is_published','1');
         $this->db->where('user_id',$user_id);
         $this->db->where('id !='.$a_id);
         $this->db->order_by('id','RANDOM');
         $this->db->limit(6);
         $query =  $this->db->get();
         $results =  $query->result();
         $data = array();
         $i=0;
         foreach($results as $result){
            $j=0;
            $data[$i]['articles'] = $result;
            $articles_id = $result->id;
            $this->db->select('*');
            $this->db->from('images');
            $this->db->order_by('img_order','asc');
            $this->db->where('article_id',$result->id);
            $query =  $this->db->get();
            $results =  $query->result();
            foreach($results as $result){
                $data[$i]['images'][$j] = $result;
                $j++;
            }
            $i++;
         }
         //pr($data);exit;
         return $data;
      
     }
     public function rand_magazines(){
         $data = array();
         //$user_id = $this->session->userdata('id');
         $this->db->select('*');
         $this->db->from('articles');
         $this->db->where('is_delete','0');
         $this->db->where('is_draft','0');
         $this->db->where('is_active','1');
         $this->db->where('is_published','1');
         $this->db->order_by('id','RANDOM');
         $this->db->limit(8);
         $query =  $this->db->get();
         $results =  $query->result();
         $data = array();
         $i=0;
         foreach($results as $result){
            $j=0;
            $data[$i]['articles'] = $result;
            $articles_id = $result->id;
            $this->db->select('*');
            $this->db->from('images');
            $this->db->order_by('img_order','asc');
            $this->db->where('article_id',$result->id);
            $query =  $this->db->get();
            $results =  $query->result();
            foreach($results as $result){
                $data[$i]['images'][$j] = $result;
                $j++;
            }
            $i++;
         }
         //pr($data);exit;
         return $data;
      
     }
     public function rand_selfmagazine($user_id,$a_id){
         $data = array();
         //$user_id = $this->session->userdata('id');
         $this->db->select('*');
         $this->db->from('articles');
         $this->db->where('is_delete','0');
         $this->db->where('is_draft','0');
         $this->db->where('is_active','1');
         $this->db->where('is_published','1');
         $this->db->where('user_id',$user_id);
         $this->db->where('id !='.$a_id);
         $this->db->order_by('id','RANDOM');
         $this->db->limit(4);
         $query =  $this->db->get();
         $results =  $query->result();
         $data = array();
         $i=0;
         foreach($results as $result){
            $j=0;
            $data[$i]['articles'] = $result;
            $articles_id = $result->id;
            $this->db->select('*');
            $this->db->from('images');
            $this->db->order_by('img_order','asc');
            $this->db->where('article_id',$result->id);
            $query =  $this->db->get();
            $results =  $query->result();
            foreach($results as $result){
                $data[$i]['images'][$j] = $result;
                $j++;
            }
            $i++;
         }
         //pr($data);exit;
         return $data;
     }
     
     function get_comments($img_id,$art_id){
        $this->db->select('*');
        $this->db->from('comments');
        $this->db->where('article_id',$art_id);
        $this->db->where('image_id',$img_id);
        $this->db->order_by('id','desc');
        $query =  $this->db->get();
        $results =  $query->result();
        if(!empty($results)){
            return $results;
        }
        return '0';
     }
     
     function findlikedata($expl){
        $comment_id = $expl[0];
        $article_id = $expl[1];
        $image_id = $expl[2];
        $user_id = $expl[3];
        
        $this->db->select('*');
        $this->db->from('comments');
        $this->db->where('id',$comment_id);
        $query1 =  $this->db->get();
        $results1 =  $query1->result();
        
        $this->db->select('*');
        $this->db->from('image_comment_like');
        $this->db->where('user_id',$user_id);
        $this->db->where('article_id',$article_id);
        $this->db->where('image_id',$image_id);
        $this->db->where('comment_id',$comment_id);
        $this->db->order_by('id','desc');
        $query =  $this->db->get();
        $results =  $query->result();
        if(!empty($results)){
            if(isset($results[0]->is_like) and $results[0]->is_like == '1'){
                $like_data = array(
                    'is_like'=>0,
                    //'article_id'=>$article_id,
                    //'user_id'=>$user_id
                );
                $comment_data = array(
                    'like_count'=>$results1[0]->like_count-1
                );
                $flag = 0;
            }else{
                $like_data = array(
                    'is_like'=>1,
                    //'article_id'=>$article_id,
                    //'user_id'=>$user_id
                );
                $comment_data = array(
                    'like_count'=>$results1[0]->like_count+1
                );
                $flag = 1;
            }
            $this->db->where('id', $results[0]->id);
            $this->db->update('image_comment_like', $like_data); 

            
        }else{
            $like_data = array(
                    'is_like'=>1,
                    'article_id'=>$article_id,
                    'user_id'=>$user_id,
                    'image_id'=>$image_id,
                    'comment_id'=>$comment_id,
                
            );
            $comment_data = array(
                    'like_count'=>$results1[0]->like_count+1
            );
            $this->db->insert('image_comment_like', $like_data);
            $flag = 1;
        }
        $this->db->where('id', $comment_id);
        $this->db->update('comments', $comment_data); 
        return $flag;
        
     }
     
     public function find_image_like_data($image_id,$comment_id){
         $user_id = $this->session->userdata('id');
         if(isset($user_id) and $user_id !=''){
             $this->db->select('*');
            $this->db->from('image_comment_like');
            $this->db->where('user_id',$user_id);
            $this->db->where('image_id',$image_id);
            $this->db->where('comment_id',$comment_id);
            $query =  $this->db->get();
            $results =  $query->result();
            if(!empty($results)){
                return '1';
            }else{
                return '0';
            }
             
         }else{
            return '0';
         }
     } 
     
     
     
     
     
     
     public function count_feature_populer_magazines($table,$conditions){
         $this->db->select('count(*) as cnt');
         $this->db->from('articles');
         $this->db->where($conditions);
         $query =  $this->db->get();
         $results = $query->result();
         return $results[0]->cnt;
         //pr($results[0]->cnt);
     }
     
     public function get_all_feature_populer_magazine($table,$conditions,$offset){
         $data = array();
         //$user_id = $this->session->userdata('id');
         $this->db->select('*');
         $this->db->from($table);
         //$this->db->where('user_id',$user_id);
         $this->db->where($conditions);
         $this->db->order_by('read_count','desc');
         $this->db->order_by('updated','desc');
         $this->db->limit(PAGE_LIMIT,$offset);
         $query =  $this->db->get();
         $results =  $query->result();
         $data = array();
         $i=0;
         foreach($results as $result){
            $j=0;
            $data[$i]['articles'] = $result;
            
            $this->db->select('*');
            $this->db->from('users');
            //$this->db->order_by('img_order','asc');
            $this->db->where('id',$result->user_id);
            $query =  $this->db->get();
            $results =  $query->result();
            $data[$i]['users'] = $results[0];
            
            $articles_id = $result->id;
            $this->db->select('*');
            $this->db->from('images');
            $this->db->order_by('img_order','asc');
            $this->db->where('article_id',$result->id);
            $query =  $this->db->get();
            $results =  $query->result();
            foreach($results as $result){
                $data[$i]['images'][$j] = $result;
                $j++;
            }
            $this->db->select('*');
            $this->db->from('article_categories');
            $this->db->where('article_id',$articles_id);
            $query =  $this->db->get();
            $results =  $query->result();
            $k =0;
            foreach($results as $result){
                $data[$i]['article_categories'][$k] = $result;
                $k++;
            }
            $i++;
         }
         return $data;
         //pr($data);exit;
     }
     
     
     
     public function getfavoritesmagazine(){
         
         
         $data = array();
         $user_id = $this->session->userdata('id');
         $this->db->select('*');
         $this->db->from('likes');
         $this->db->where('user_id',$user_id);
         $this->db->where('is_like',1);
         $favquery =  $this->db->get();
         $favresults =  $favquery->result();
         $art_ids = array();
         if(!empty($favresults)){
             foreach($favresults as $favresult){
                 $art_ids[] = $favresult->article_id;
             }
         }
         //pr($art_ids);
         if(!empty($art_ids)){
             $impl = implode(',',$art_ids);
         }else{
             $impl = '"TEST_00"';
         }
         //echo $impl;
        // pr($favresults);exit;
         
         
         $this->db->select('*');
         $this->db->from('articles');
         //$this->db->where('user_id1',$user_id);
         $this->db->where("id in ($impl)");
         $this->db->where('is_delete','0');
         $this->db->order_by('updated','desc');
         $this->db->order_by('id','desc');
         $query =  $this->db->get();
         $results =  $query->result();
         $data = array();
         $i=0;
         foreach($results as $result){
            $j=0;
            $data[$i]['articles'] = $result;
            $articles_id = $result->id;
            
            $this->db->select('*');
            $this->db->from('users');
            //$this->db->order_by('img_order','asc');
            $this->db->where('id',$result->user_id);
            $query =  $this->db->get();
            $results =  $query->result();
            $data[$i]['users'] = $results[0];
            
            $this->db->select('*');
            $this->db->from('images');
            $this->db->order_by('img_order','asc');
            $this->db->where('article_id',$result->id);
            $query =  $this->db->get();
            $results =  $query->result();
            foreach($results as $result){
                $data[$i]['images'][$j] = $result;
                $j++;
            }
            $this->db->select('*');
            $this->db->from('article_categories');
            $this->db->where('article_id',$articles_id);
            $query =  $this->db->get();
            $results =  $query->result();
            $k =0;
            foreach($results as $result){
                $data[$i]['article_categories'][$k] = $result;
                $k++;
            }
            $i++;
         }
         return $data;
         pr($data);exit;
     }
     
     function get_ad_data($slot_no){
         //echo $slot_no;
            //$cond = "start_date <= '".date('Y-m-d')."' AND end_date >= '".date('Y-m-d')."' and add_slot_no='".$slot_no."'";
            $this->db->select('*');
            $this->db->from('advertise');
            $this->db->where('add_slot_no',$slot_no);
            $this->db->where('status','1');
            $this->db->order_by('slot_id asc');
            //$this->db->order_by('id','asc');
            $this->db->limit('4');
            $query =  $this->db->get();
            $results =  $query->result();
            return $results;
     }
     
     public function get_max_ads_slot(){
            $this->db->select('max(add_slot_no) as max_slot');
            $this->db->from('advertise');
            //$this->db->where($cond);
            
            $query =  $this->db->get();
            $results =  $query->result();
            //pr($results);exit;
            return $results[0]->max_slot;
     }
     
}