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
        echo $this->Html->script('/js/post/recruiter.js');
        echo $this->Html->script('/js/post/menubar.js');
        echo $this->Html->script('/js/post/main.js');
        echo $this->Html->script('/js/post/recruiter.js');




        

        echo $this->Html->script('/js/post/jquery.ui.datepicker.js');
        echo $this->Html->script('/js/dp/js/datepicker.js');
        echo $this->Html->script('/js/dp/js/eye.js');
        echo $this->Html->script('/js/dp/js/utils.js');
        echo $this->Html->script('/js/dp/js/layout.js?ver=1.0.2');
        //echo $this->Html->script('/js/init.js');
        echo $this->Html->script('/js/job.js');
        echo $this->Html->script('/js/design/script.js');


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
        echo $this->Html->css('/css/design/popup');
        
        

        //echo $this->Html->script('/js/design/notymanager/jquery_002.js');
        echo $this->Html->css('/css/design/notymanager/noty');
        echo $this->Html->css('/css/design/notymanager/demo');
        
        echo $this->Html->css('/css/design/bootstrap');
        echo $this->Html->css('/css/design/font-awesome');
        echo $this->Html->script('/js/design/html5.js');
        echo $this->Html->css('/css/design/style');

        echo $this->Html->css('/css/design/lightbox');
        echo $this->Html->css('/css/design/responsive-tabs');
        echo $this->Html->css('/css/design/responsive');

        ?>
    </head>
    <body>
            <?php
                echo $this->element('default_header');
            ?>
                 <section class="container container_1">
    <div class="row">
    <div class="MainContent">
            <?php
            if(isset($page) AND $page == 'profile')
            {
                //echo $this->element('left_employer_profile_sidebar');
                echo $this->fetch('content');
            }
            elseif(isset($page) AND $page == 'candidate_profile')
            {
                //echo $this->element('left_profile_sidebar');
                echo $this->fetch('content');
            }
            elseif(isset($page) AND ($page == 'jobadd' OR $page=='signup') ) /* Signup page and job add page */
            {
            ?>
<div class="main_ctnr_middle <?php if(isset($page) AND ($page == 'jobadd' OR $page=='signup') ) { echo 'main_left'; }   ?> " >
<?php

echo $this->fetch('content');
?>
</div>
            <?php
            echo $this->element('right_sidebar');
            }
            else
            {
                echo $this->element('left_sidebar');
                ?>
                <div class="main_ctnr_middle <?php if(isset($page) AND ($page == 'jobadd' OR $page=='signup') ) { echo 'main_left'; }   ?> " >
<?php

echo $this->fetch('content');
?>
</div>
                <?php
                echo $this->element('right_sidebar');
            }
            ?>

<?php
        //if(isset($page) AND $page == 'profile')
        //    {
        //        echo $this->element('right_employer_profile_sidebar'); 
        //        
        //    }
        //    elseif(isset($page) AND $page == 'candidate_profile')
        //    {
        //        echo $this->element('right_profile_sidebar');
        //    }
        //    else
        //    {
        //        echo $this->element('right_sidebar');
        //    }

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

        echo $this->Html->script('/js/design/jquery.selectbox-0.2.js');
        echo $this->Html->script('/js/design/colorbox.js');
        echo $this->Html->script('/js/design/jquery.responsiveTabs.js');
        
        echo $this->Html->script('/js/design/respond.min.js');
        echo $this->Html->script('/js/design/respond.src.js');
        
         if(isset($page) AND $page == 'signup') {  ?>
    

       <script type="text/javascript">
       
         $(document).ready(function () {
        $('#horizontalTab').responsiveTabs({
        startCollapsed: 'accordion',
        collapsible: true,
        rotate: false,
        setHash: true
        });
            $(".select").selectbox();
        });
        </script>

   <?php  echo $this->Html->script('/js/design/jquery.accordion.source.js'); ?>

<script type="text/javascript">
		$(document).ready(function () {
			$('ul').accordion();
		});
                
              
                //$(document).ready(function () {
                //$('#create_more').click(function () {
                //alert('ets');
                //});
                //});

	</script>
    
    <?php  echo $this->Html->script('/js/design/jquery.screwdefaultbuttonsV2.js'); ?>
<!--<script src="js/jquery.screwdefaultbuttonsV2.js"></script>-->
	
	
	<script type="text/javascript">
		$(function(){
		
			$('input:checkbox').screwDefaultButtons({
				image: 'url("<?php echo $this->webroot; ?>css/images/checkbox.png")',
				width: 18,
				height: 18
			});

			
		
		});
	</script> 
    <?php } else { ?>
    
     
    
<script type="text/javascript">
 $(document).ready(function($){
	 //$(".select").selectbox();
 });
</script>
<script type="text/javascript">
		$(".youtube").colorbox({iframe:true, innerWidth:600, innerHeight:400});
	</script>
    
<script type="text/javascript">
    $(document).ready(function () {
        $('#horizontalTab').responsiveTabs({
            startCollapsed: 'accordion',
            collapsible: true,
            rotate: false,
            setHash: true
        });
		$(".select").selectbox();
    });
</script>
<?php } ?>
    </body>
</html>
