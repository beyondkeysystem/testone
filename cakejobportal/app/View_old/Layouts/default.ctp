<!DOCTYPE html>
<html>
    <head>
        <?php echo $this->Html->charset(); ?>
        <title>
            <?php echo $title_for_layout; ?>
        </title>
        <?php
        echo $this->Html->meta('icon');
        //echo $this->Html->script('/js/jquery-1.8.3.min.js');
        //js for colorbox
        echo $this->Html->script('/js/jquery.min.js');
        echo $this->Html->script('/js/jquery.colorbox.js');
   
        

        echo $this->Html->script('/js/reportdata.js');
        echo $this->Html->script('/js/acl_permissions.js');
        
        //js for animated collapse js for isntant messenger
        
        echo $this->Html->script('/js/im/animatedcollapse.js');
        echo $this->Html->script('/js/ckeditor/ckeditor.js');
        //echo $this->Html->script('/js/post/recruiter.js');
        //echo $this->Html->script('/js/post/recruiter.js');
        echo $this->Html->script('/js/post/menubar.js');
        echo $this->Html->script('/js/post/main.js');
        echo $this->Html->script('/js/post/recruiter.js');




        

        echo $this->Html->script('/js/post/jquery.ui.datepicker.js');
        echo $this->Html->script('/js/dp/js/datepicker.js');
        echo $this->Html->script('/js/dp/js/eye.js');
        echo $this->Html->script('/js/dp/js/utils.js');
        echo $this->Html->script('/js/dp/js/layout.js?ver=1.0.2');
        echo $this->Html->script('/js/init.js');
        echo $this->Html->script('/js/job.js');



        //css for colorbox



        
        //echo $this->Html->css('styles/style');
        //echo $this->Html->css('styles/demos');
        //echo $this->Html->css('styles/jquery.ui.all');
        //echo $this->Html->css('styles/job.css');
        //echo $this->Html->css('style');
        
        
        //echo $this->Html->css('cake.generic');
        //echo $this->Html->css('colorbox');
        //echo $this->Html->css('my');
        //echo $this->Html->css('permission');
        


        //echo $this->fetch('meta');
        //echo $this->fetch('css');
        //echo $this->fetch('script');
        
        echo $this->Html->css('/css/dp/css/datepicker');
        echo $this->Html->css('/css/jquery.ui.datepicker');
        echo $this->Html->css('/css/job');
        echo $this->Html->css('/css/dp/css/layout');
        
        echo $this->Html->css('/css/design/bootstrap');
        echo $this->Html->css('/css/design/font-awesome');
        echo $this->Html->script('/js/design/html5.js');
        echo $this->Html->css('/css/design/style');
        echo $this->Html->css('/css/design/responsive');
        ?>
    </head>
    <body>
            <?php
            
            echo $this->element('default_header');
             ?>
                 <section class="container">
    <div class="row">
    <div class="MainContent">
           <?php
           
            echo $this->element('left_sidebar');
                          
           // pr($userType);
            /*if (!empty($userType)) {
                if ($userType == "admin") {
                     echo $this->element('default_dme');  }
               
                if($userType == "employer"){
                    echo $this->element('default_clinician');
                }
                if($userType == "candidate"){
                    echo $this->element('default_patient');
                }
                if($userType=="reset"){
                    echo $this->element('default_reset');
                }
                if($userType=="signup"){
                    echo $this->element('default_signup');
                }
            }*/ ?>
<div class="col-sm-8">
<?php

echo $this->fetch('content');
?>
</div>
<?php
echo $this->element('right_sidebar');

?>
             <div class="clearfix"></div>
    </div>
    </div>
    </section>
    <?php

    
                 echo $this->element('footer_top');
    
                 echo $this->element('default_footer');
    
        echo $this->Html->script('/js/design/jquery.min.js');
        echo $this->Html->script('/js/design/bootstrap.js');
        echo $this->Html->script('/js/design/respond.min.js');
        echo $this->Html->script('/js/design/respond.src.js');
    ?>    
    </body>
</html>
