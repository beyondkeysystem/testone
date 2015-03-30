<?php

App::uses('Controller', 'Controller');

class GalleryController extends AppController {
    
    public $components = array('Paginator','RequestHandler', 'JobportalImage');
    var $uses = array('PhotoGallery','JobAppliedjobs','JobRecruiter','VideoGallery','User','TransMember','FavoriteCandidate','Follow','UpgradeCategory','TrackJobAdvert', 'JobAd','JobOptions','EmployerProfile', 'JobCountry', 'JobCity', 'JobRecInvoices', 'JobRecPaymentPlans','Notification' , 'JobAdTemp', 'PaymentsTable' , 'Plantable');
    public function beforeFilter() {
        parent::beforeFilter();
        //loadModel
//        $this->Auth->allow('index','jobSearchAction');
        
        $this->loadModel('Report');
        $this->loadModel('DmeAssignPatient');
        $this->loadModel('User');

        //set loggeg in user in @user variable
        if ($this->Auth->user()) {
            $this->set('user', $this->Auth->user());
        }
        //manage user authentication
        $auth_data = $this->Auth->user();
        if (isset($auth_data) && !empty($auth_data)) {
            if ($auth_data['type'] == 'admin') {
                $this->redirect(array('controller' => 'admin', 'action' => 'index'));
            }
        }
    }
    
        public function index()
        {
            $auth_data = $this->Auth->user();
            if($auth_data['id'] != '')
            {
               $login_userID = $auth_data['id'];
               $login_userTYPE = $auth_data['type'];
               $this->VideoGallery->getVideoGalleryById($login_userID);
            
            
            $check_data = $this->VideoGallery->getVideoGalleryById($login_userID);
            if(isset($check_data[0]))
            {
                $this->set('gallery_val', $check_data[0]);
            }
            
            if(isset($_POST['submit']))
            {
                /* videos youtube Urls */
                    $parent_video_url = $_POST['parent_video_url']; 
                    $child_video_url1 = $_POST['child_video_url1']; 
                    $child_video_url2 = $_POST['child_video_url2']; 
                    $child_video_url3 = $_POST['child_video_url3'];  
                    $child_video_url4 = $_POST['child_video_url4'];
		    $parent_title = $_POST['parent_title']; 
		    $child_title_one = $_POST['child_title_one']; 
                    $child_title_two = $_POST['child_title_two']; 
                    $child_title_three = $_POST['child_title_three'];  
                    $child_title_four = $_POST['child_title_four'];
                    
                    if(isset($_FILES['parent_video_image']['name']) AND $_FILES['parent_video_image']['name'] != '')
                    {
                        $filename1 = $prefix.basename($_FILES['parent_video_image']['name']);
                        $file_ext1 = strtolower(substr($filename1, strrpos($filename1, ".") + 1));
                        $parent_video_image = String::uuid().".".$file_ext1;
                        $height ='450';
                        $width = '705';
                        $this->JobportalImage->uploadImage($_FILES['parent_video_image'], $_SERVER['DOCUMENT_ROOT'].$this->webroot.'app/webroot/uploads/gallery/', $parent_video_image, $height , $width);
                    }
                    else
                    {
                        $parent_video_image = $check_data[0]['video_gallery']['parent_video_image'];
                    }
                    
                    if(isset($_FILES['child_video_image1']['name']) AND $_FILES['child_video_image1']['name'] != '')
                    {
                        $filename1 = $prefix.basename($_FILES['child_video_image1']['name']);
                        $file_ext1 = strtolower(substr($filename1, strrpos($filename1, ".") + 1));
                        $child_video_image1 = String::uuid().".".$file_ext1;
                        $height ='166';
                        $width = '174';
                        $this->JobportalImage->uploadImage($_FILES['child_video_image1'], $_SERVER['DOCUMENT_ROOT'].$this->webroot.'app/webroot/uploads/gallery/', $child_video_image1, $height , $width);
                    }
                    else
                    {
                        $child_video_image1 = $check_data[0]['video_gallery']['child_video_image1'];
                    }
                    
                    if(isset($_FILES['child_video_image2']['name']) AND $_FILES['child_video_image2']['name'] != '')
                    {
                        $filename1 = $prefix.basename($_FILES['child_video_image2']['name']);
                        $file_ext1 = strtolower(substr($filename1, strrpos($filename1, ".") + 1));
                        $child_video_image2 = String::uuid().".".$file_ext1;
                        $height ='166';
                        $width = '174';
                        $this->JobportalImage->uploadImage($_FILES['child_video_image2'], $_SERVER['DOCUMENT_ROOT'].$this->webroot.'app/webroot/uploads/gallery/', $child_video_image2, $height , $width);
                    }
                    else
                    {
                        $child_video_image2 = $check_data[0]['video_gallery']['child_video_image2'];
                    }
                    
                    if(isset($_FILES['child_video_image3']['name']) AND $_FILES['child_video_image3']['name'] != '')
                    {
                        $filename1 = $prefix.basename($_FILES['child_video_image3']['name']);
                        $file_ext1 = strtolower(substr($filename1, strrpos($filename1, ".") + 1));
                        $child_video_image3 = String::uuid().".".$file_ext1;
                        $height ='166';
                        $width = '174';
                        $this->JobportalImage->uploadImage($_FILES['child_video_image3'], $_SERVER['DOCUMENT_ROOT'].$this->webroot.'app/webroot/uploads/gallery/', $child_video_image3, $height , $width);
                    }
                    else
                    {
                        $child_video_image3 = $check_data[0]['video_gallery']['child_video_image3'];
                    }
                    
                    if(isset($_FILES['child_video_image4']['name']) AND $_FILES['child_video_image4']['name'] != '')
                    {
                        $filename1 = $prefix.basename($_FILES['child_video_image4']['name']);
                        $file_ext1 = strtolower(substr($filename1, strrpos($filename1, ".") + 1));
                        $child_video_image4 = String::uuid().".".$file_ext1;
                        $height ='166';
                        $width = '174';
                        $this->JobportalImage->uploadImage($_FILES['child_video_image4'], $_SERVER['DOCUMENT_ROOT'].$this->webroot.'app/webroot/uploads/gallery/', $child_video_image4, $height , $width);
                    }
                    else
                    {
                        $child_video_image4 = $check_data[0]['video_gallery']['child_video_image4'];
                    }
                    
                    $arr = array(
                        'child_video_image1' => $child_video_image1,
                        'child_video_image2' => $child_video_image2,
                        'child_video_image3' => $child_video_image3,
                        'child_video_image4' => $child_video_image4,
                        'parent_video_image' => $parent_video_image,
                        'parent_video_url'   => $parent_video_url, 
                        'child_video_url1'   => $child_video_url1,
                        'child_video_url2'   => $child_video_url2,
                        'child_video_url3'   => $child_video_url3,
                        'child_video_url4'   => $child_video_url4,
                        'parent_title'   => $parent_title, 
                        'child_title_one'   => $child_title_one,
                        'child_title_two'   => $child_title_two,
                        'child_title_three'   => $child_title_three,
                        'child_title_four'   => $child_title_four,
                        'video_type'=> 'youtube',
                        'user_id' => $login_userID,
                        'user_type' => $login_userTYPE
                    );
                    
                $data['VideoGallery'] = $arr;
                

                        if(count($check_data) == '')
                        {
                            $this->VideoGallery->create();
                            $query = $this->VideoGallery->save($data['VideoGallery']);
                        }
                        else
                        {
                            
                            $data['VideoGallery']['id'] = $_POST['id'];
                            $query = $this->VideoGallery->save($data['VideoGallery']);
                                $this->Session->setFlash(__('Profile data updated.'));
                        }
                        
                        if($login_userTYPE == 'candidate')
                        {
                            $this->redirect(array('controller' => 'candidate', 'action' => 'candidate_profile'));
                        }
                        elseif($login_userTYPE == 'employer')
                        {
                            $this->redirect(array('controller' => 'employer', 'action' => 'profile'));
                        }
                pr($_POST);
                pr($_FILES);
                die;
            }
            }
        }
        
        public function photo()
        {
            $auth_data = $this->Auth->user();
            if($auth_data['id'] != '')
            {
               $login_userID = $auth_data['id'];
               $login_userTYPE = $auth_data['type'];
               $this->PhotoGallery->getPhotoGalleryById($login_userID);
            
            
            $check_data = $this->PhotoGallery->getPhotoGalleryById($login_userID);
            if(isset($check_data[0]))
            {
                $this->set('gallery_val', $check_data[0]);
            }
            
            if(isset($_POST['submit']))
            {
                /* videos youtube Urls */
                    $parent_video_url = $_POST['parent_video_url']; 
                    $child_video_url1 = $_POST['child_video_url1']; 
                    $child_video_url2 = $_POST['child_video_url2']; 
                    $child_video_url3 = $_POST['child_video_url3'];  
                    $child_video_url4 = $_POST['child_video_url4'];
                    $parent_title = $_POST['parent_title']; 
		    $child_title_one = $_POST['child_title_one']; 
                    $child_title_two = $_POST['child_title_two']; 
                    $child_title_three = $_POST['child_title_three'];  
                    $child_title_four = $_POST['child_title_four'];
                    
                    if(isset($_FILES['parent_video_image']['name']) AND $_FILES['parent_video_image']['name'] != '')
                    {
                        $filename1 = $prefix.basename($_FILES['parent_video_image']['name']);
                        $file_ext1 = strtolower(substr($filename1, strrpos($filename1, ".") + 1));
                        $parent_video_image = String::uuid().".".$file_ext1;
                        $height ='450';
                        $width = '705';
                        $this->JobportalImage->uploadImage($_FILES['parent_video_image'], $_SERVER['DOCUMENT_ROOT'].$this->webroot.'app/webroot/uploads/gallery/', $parent_video_image, $height , $width);
                    }
                    else
                    {
                        $parent_video_image = $check_data[0]['photo_gallery']['parent_video_image'];
                    }
                    
                    if(isset($_FILES['child_video_image1']['name']) AND $_FILES['child_video_image1']['name'] != '')
                    {
                        $filename1 = $prefix.basename($_FILES['child_video_image1']['name']);
                        $file_ext1 = strtolower(substr($filename1, strrpos($filename1, ".") + 1));
                        $child_video_image1 = String::uuid().".".$file_ext1;
                        $height ='166';
                        $width = '174';
                        $this->JobportalImage->uploadImage($_FILES['child_video_image1'], $_SERVER['DOCUMENT_ROOT'].$this->webroot.'app/webroot/uploads/gallery/', $child_video_image1, $height , $width);
                    }
                    else
                    {
                        $child_video_image1 = $check_data[0]['photo_gallery']['child_video_image1'];
                    }
                    
                    if(isset($_FILES['child_video_image2']['name']) AND $_FILES['child_video_image2']['name'] != '')
                    {
                        $filename1 = $prefix.basename($_FILES['child_video_image2']['name']);
                        $file_ext1 = strtolower(substr($filename1, strrpos($filename1, ".") + 1));
                        $child_video_image2 = String::uuid().".".$file_ext1;
                        $height ='166';
                        $width = '174';
                        $this->JobportalImage->uploadImage($_FILES['child_video_image2'], $_SERVER['DOCUMENT_ROOT'].$this->webroot.'app/webroot/uploads/gallery/', $child_video_image2, $height , $width);
                    }
                    else
                    {
                        $child_video_image2 = $check_data[0]['photo_gallery']['child_video_image2'];
                    }
                    
                    if(isset($_FILES['child_video_image3']['name']) AND $_FILES['child_video_image3']['name'] != '')
                    {
                        $filename1 = $prefix.basename($_FILES['child_video_image3']['name']);
                        $file_ext1 = strtolower(substr($filename1, strrpos($filename1, ".") + 1));
                        $child_video_image3 = String::uuid().".".$file_ext1;
                        $height ='166';
                        $width = '174';
                        $this->JobportalImage->uploadImage($_FILES['child_video_image3'], $_SERVER['DOCUMENT_ROOT'].$this->webroot.'app/webroot/uploads/gallery/', $child_video_image3, $height , $width);
                    }
                    else
                    {
                        $child_video_image3 = $check_data[0]['photo_gallery']['child_video_image3'];
                    }
                    
                    if(isset($_FILES['child_video_image4']['name']) AND $_FILES['child_video_image4']['name'] != '')
                    {
                        $filename1 = $prefix.basename($_FILES['child_video_image4']['name']);
                        $file_ext1 = strtolower(substr($filename1, strrpos($filename1, ".") + 1));
                        $child_video_image4 = String::uuid().".".$file_ext1;
                        $height ='166';
                        $width = '174';
                        $this->JobportalImage->uploadImage($_FILES['child_video_image4'], $_SERVER['DOCUMENT_ROOT'].$this->webroot.'app/webroot/uploads/gallery/', $child_video_image4, $height , $width);
                    }
                    else
                    {
                        $child_video_image4 = $check_data[0]['photo_gallery']['child_video_image4'];
                    }
                    
                    $arr = array(
                        'child_video_image1' => $child_video_image1,
                        'child_video_image2' => $child_video_image2,
                        'child_video_image3' => $child_video_image3,
                        'child_video_image4' => $child_video_image4,
                        'parent_video_image' => $parent_video_image,
                        'parent_video_url'   => $parent_video_url, 
                        'child_video_url1'   => $child_video_url1,
                        'child_video_url2'   => $child_video_url2,
                        'child_video_url3'   => $child_video_url3,
                        'child_video_url4'   => $child_video_url4,
			'parent_title'   => $parent_title, 
                        'child_title_one'   => $child_title_one,
                        'child_title_two'   => $child_title_two,
                        'child_title_three'   => $child_title_three,
                        'child_title_four'   => $child_title_four,
                        'video_type'=> 'youtube',
                        'user_id' => $login_userID,
                        'user_type' => $login_userTYPE
                    );
                    
                $data['PhotoGallery'] = $arr;
                

                        if(count($check_data) == '')
                        {
                            $this->PhotoGallery->create();
                            $query = $this->PhotoGallery->save($data['VideoGallery']);
                        }
                        else
                        {
                            
                            $data['PhotoGallery']['id'] = $_POST['id'];
                            $query = $this->PhotoGallery->save($data['PhotoGallery']);
                                $this->Session->setFlash(__('Profile data updated.'));
                        }
                        
                        if($login_userTYPE == 'candidate')
                        {
                            $this->redirect(array('controller' => 'candidate', 'action' => 'candidate_profile'));
                        }
                        elseif($login_userTYPE == 'employer')
                        {
                            $this->redirect(array('controller' => 'employer', 'action' => 'profile'));
                        }
                pr($_POST);
                pr($_FILES);
                die;
            }
            }
        }
}
