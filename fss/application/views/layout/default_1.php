<!DOCTYPE html> 
<html lang="en-US">
  <?php if(isset($title) and $title !=''){?>
    <title><?php echo $title;?></title>
  <?php }else{?>
    <title>Magazine</title>
  <?php }?>
  <?php echo $this->load->view('elements/front_css_js');?>
  <body>
    <?php echo $this->load->view('elements/header');?>
    <?php $this->load->view($page, $data); ?>
    <?php echo $this->load->view('elements/footer');?>
  </body>
</html>