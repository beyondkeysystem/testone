<!DOCTYPE html> 
<html lang="en-US">
  <?php if(isset($title) and $title !=''){?>
    <title><?php echo $title;?></title>
  <?php }else{?>
    <title>Admin</title>
  <?php }?>
  <?php echo $this->load->view('elements/admin_css_js');?>
  <body>
    <?php $this->load->view($page, $data); ?>
  </body>
</html>