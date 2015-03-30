<!DOCTYPE html>
<html lang="en"><head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="description" content="">
<meta name="author" content="">
<link href='http://fonts.googleapis.com/css?family=Lato:400,300italic,400italic,700,900' rel='stylesheet' type='text/css'>
<link rel="shortcut icon" href="images/favicon.png">
<?php if(isset($title) and $title !=''){?>
    <title><?php echo $title;?></title>
  <?php }else{?>
    <title>Magazine</title>
  <?php }?>
<?php $this->load->view('elements/front_css_js');?>
</head>

<body class="animated fadeIn main-bg">
<?php $this->load->view('elements/login');?>
<!-- Static navbar -->
<div  class="form-main">
  <?php $this->load->view('elements/header');?>
  <?php $this->load->view($page, $data); ?>
</div>
  <?php echo $this->load->view('elements/footer');?>


<div id="preload">
  <div id="preload-content">
    <div class="preload-bounce"> <span class="bounce1"></span> <span class="bounce2"></span> <span class="bounce3"></span> <span class="bounce4"></span> </div>
    <div class="preload-text">Loading... </div>
  </div>
</div>
<!-- /container --> 
</body>
</html>
