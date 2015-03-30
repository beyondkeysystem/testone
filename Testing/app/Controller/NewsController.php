<?php

/**
* Dynamic content controller.
*
* This file will render views from views/customers/
*
* CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
* Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
*
* Licensed under The MIT License
* For full copyright and license information, please see the LICENSE.txt
* Redistributions of files must retain the above copyright notice.
*
* @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
* @link          http://cakephp.org CakePHP(tm) Project
* @package       app.Controller
* @since         CakePHP(tm) v 0.2.9
* @license       http://www.opensource.org/licenses/mit-license.php MIT License
*/

App::uses('AppController', 'Controller');
App::uses('Sanitize', 'Utility');
App::uses('Folder', 'Utility');
/**
* Daynamic content controller
*
* Override this controller by placing a copy in controllers directory of an application
*
* @package app.Controller
* @link http://book.cakephp.org/2.0/en/controllers/pages-controller.html
*/
class NewsController extends AppController {

    public $name =  'News';
    public $components = array('Paginator');

    /**
     * This controller does not use a model
     *
     * @var array
     */

    public $uses = array('Notification','Commentor','New','User','Product','TaxClass','StockStatus','LengthClass','WeightClass', 'Category','CustomerGroup','Customer','Address','Country','Zone');

    function beforeFilter() {
        parent::beforeFilter();
         
        $this->Paginator->settings = array(
            //'conditions' => array('Recipe.title LIKE' => 'a%'),
            'limit' => 9
        );
        
       $this->Auth->allow("index","details");
    }
    
    //News Listing page
    public function index() {
        //exit("Success");
        $condition['New.status'] = 'Enable';
        $news = $this->Paginator->paginate('New',array('status' => 'Enable'));
        //pr($news); exit;
        $this->set('news',$news);      
        
    }
    
    //News details page
    public function details($news_id = NULL) {
        
        if($this->Auth->User('role')!='')
            $this->set('role',$this->Auth->User('role'));
        else
            $this->set('role',"");
            
        $news_id = base64_decode($news_id);
        if($this->request->is('post') && isset($this->request->data['submit'])){
            $this->request->data['Commentor'] = Sanitize::clean($this->request->data['Commentor'], array("remove_html" => TRUE));
            if(!empty($this->request->data['Commentor'])){
                $this->request->data['Commentor']['news_id'] = $news_id;
                if($this->Commentor->save($this->request->data['Commentor'])){
                    $arr['Notification']['type'] = 'News';
                    $arr['Notification']['status'] = 'Approve';
                    $arr['Notification']['count'] = $news_id;
                    $arr['Notification']['markas'] = 'Unread';
                    $noti = $this->Notification->save($arr);
                    $this->Session->setFlash('<div class="alert alert-success"><i class="fa fa-check-circle"></i> Discussion Added Successfully...<button data-dismiss="alert" class="close" type="button">×</button> </div>');
                }
                else{
                    $this->Session->setFlash('<div class="alert alert-danger"><i class="fa fa-exclamation-circle"></i> Discussion not Saved. Please try again...<button data-dismiss="alert" class="close" type="button">×</button> </div>');
                }
                
               
                
            }
        }
        
        $comment_data = $this->Commentor->find("all",array('conditions'=>array('news_id'=>$news_id),'order'=>array('Commentor.created Desc')));
        if(!empty($comment_data)){
            $this->set('comment_data',$comment_data);
        }
        
        if(is_numeric($news_id)){
            $news_data = $this->New->findById($news_id);
            if($news_data['New']['status'] == "Enable"){
                $this->set('news_data',$news_data);
                
                $news_data_type = $this->New->find('all',array('conditions'=>array('type'=>$news_data['New']['type'],'status'=>'Enable'),'fields'=>array("id","title","created")));
                $this->set('news_data_type',$news_data_type);
            }
            else{
                $this->redirect(array('action' => 'index'));
            }
        }
        else{
            $this->redirect(array('action' => 'index'));
        }
        //pr($news_data_type); exit;
    }
    
    
    public function admin_index() {		
        // $products = $this->Product->find('all');
        
        //For filter section
        if($this->request->is('post') && isset($this->request->data['filter'])){
                
                $str = '';
                
                if(!empty($this->data)){
                        foreach($this->data['New'] as $k=>$v){
                                if(isset($v) and $v !=''){
                                        if($k == 'title' or $k == 'subtitle' or $k == 'type' or $k == 'status'){
                                                $str .= ' New.'.$k.' = "'.addslashes(trim($v)).'" and ';
                                        }else{
                                                $str .= ' New.'.$k.' LIKE "%'.addslashes(trim($v)).'%" and ';
                                        }
                                }
                        }
                }
                $condition = substr($str,0,-4);
                
                $this->Paginator->settings = array(
                    'conditions' => array($condition),
            );

        }
        
        $news = $this->Paginator->paginate('New');
        $this->set('news',$news);
    }


    public function admin_add(){
    
        if($this->request->is('post')){
        
            $unique = time();
                        
            $this->request->data['New'] = Sanitize::clean($this->request->data['New'], array("remove_html" => TRUE));
            
            $ext = substr(strtolower(strrchr($this->request->data['New']['listing_image']['name'], '.')), 1); //get the extension
            
            $arr_ext = array('jpg', 'jpeg', 'gif', 'png'); //set allowed extensions
            
            $fileattr = $this->request->data['New']['listing_image'];
            
            if(in_array($ext, $arr_ext))
            {
                if(isset($this->request->data['New']['listing_image']['name']) and $this->request->data['New']['listing_image']['name'] != '' and $this->request->data['New']['listing_image']['error'] == 0)
                {
                    $fileattr = $this->request->data['New']['listing_image'];
                    $image_name = 'news/'.$unique.'_'.$this->request->data['New']['listing_image']['name'];
                    
                    if (isset($fileattr['name']) and $fileattr['name'] != '' and $fileattr['error'] == 0)
                    {
                        $destination = WWW_ROOT . 'uploads/';
                     
                        if (!file_exists($destination.'/news/')) {		
                            $dir = new Folder($destination.'/news/', true, 0755);
                            }
                        if (!file_exists($destination.'thumbs/news/')) {		
                            $thumb_dir = new Folder($destination.'thumbs/news/', true, 0755);
                            }
                    
                        $this->uploadfile($fileattr,$destination,$image_name,$is_orib='1');
                    
                        $this->request->data['New']['listing_image'] = "thumbs/news/".$unique.'_'.$this->request->data['New']['listing_image']['name'];
                        $this->request->data['New']['detail_image'] = $image_name;
                    }else{
                        $this->request->data['New']['listing_image'] = null;
                        $this->request->data['New']['detail_image'] = null;
                    }
                }else{
                    $this->request->data['New']['listing_image'] = null;
                    $this->request->data['New']['detail_image'] = null;
                }
                
                $this->New->set($this->request->data);
                
                $this->New->save($this->request->data);        
        
                $this->Session->setFlash('<div class="alert alert-success"><i class="fa fa-check-circle"></i> News Details Added Successfully...<button data-dismiss="alert" class="close" type="button">×</button> </div>');
    
                return $this->redirect(array('action' => 'index'));	
            }else{
                $this->Session->setFlash('<div class="alert alert-danger"><i class="fa fa-exclamation-circle"></i> News Details not Saved. Please try again...<button data-dismiss="alert" class="close" type="button">×</button> </div>');
            }            
        }
    }
    
    public function admin_edit($id = null){
		
            $new = $this->New->findById($id);
            
            if ($this->request->is(array('post', 'put'))) {
            
                $this->request->data['New'] = Sanitize::clean($this->request->data['New'], array("remove_html" => TRUE));
                
                $unique = time();

                if(isset($this->request->data['New']['listing_image']['name'])){                    
                    $ext = substr(strtolower(strrchr($this->request->data['New']['listing_image']['name'], '.')), 1); //get the extension
    
                    $arr_ext = array('jpg', 'jpeg', 'gif', 'png'); //set allowed extensions
                    
                    $fileattr = $this->request->data['New']['listing_image'];

                    if(in_array($ext, $arr_ext)){

                        $image_name = 'news/'.$unique.'_'.$this->request->data['New']['listing_image']['name'];
                        
                        if (isset($fileattr['name']) and $fileattr['name'] != '' and $fileattr['error'] == 0) {
                        
                            $destination = WWW_ROOT . 'uploads/';
                         
                            if (!file_exists($destination.'/news/')) {		
                                $dir = new Folder($destination.'/news/', true, 0755);
                            }
                        
                            if (!file_exists($destination.'thumbs/news/')) {		
                                $thumb_dir = new Folder($destination.'thumbs/news/', true, 0755);
                            }
                        
                            $this->uploadfile($fileattr,$destination,$image_name,$is_orib='1');
                        
                        } 
                        $this->request->data['New']['listing_image'] = "thumbs/".$image_name;
                        $this->request->data['New']['detail_image'] = $image_name;

                    }else{    
                            $this->request->data['New']['listing_image'] = '';
                            $this->request->data['New']['detail_image'] = '';
                    }
                }
                $this->request->data['New']['id'] = $id;
                if($this->New->save($this->request->data)){
                    $this->Session->setFlash('<div class="alert alert-success"><i class="fa fa-check-circle"></i> Your News has been Updated<button data-dismiss="alert" class="close" type="button">×</button> </div>');
                    return $this->redirect(array('action'=>'index'));
                }
                else{
                    $this->Session->setFlash('<div class="alert alert-danger"><i class="fa fa-exclamation-circle"></i> Unable to Update your News.<button data-dismiss="alert" class="close" type="button">×</button> </div>');        
                }
            }            
            
            if (!$this->request->data) {
                $this->request->data = $new;
            }
	}
    


	public function admin_delete_image(){
            $this->New->id = $this->request->data('new_id');
            
            $new = $this->New->findById($this->request->data('new_id'));
            
            $new_save = $this->New->SaveField('listing_image',NULL);
            $new_save_detail = $this->New->SaveField('detail_image',NULL);
            
            $count = $this->New->find('count',array('conditions'=>array('listing_image'=>$new['New']['listing_image'])));
            
            if($count == 0){
                
                $image = new File(WWW_ROOT . 'uploads/news/'.$new['New']['listing_image'], false, 0777);
                
                $image_thumb = new File(WWW_ROOT . 'uploads/thumbs/'.$new['New']['listing_image'], false, 0777);
                
                
                if($image->delete() && $image_thumb->delete()) {
                   echo 'Image deleted.....';
                }
            }
            echo $count;
            exit;
	}
        
    public function delete_row(){
        $this->layout = false;
        if($this->Auth->User('role')=='admin'){
            $id = $this->request->data('id');
            $this->Commentor->delete($id);
            echo true;
        }else{
            echo false;
        }
        exit;
    }
}
?>