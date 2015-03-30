<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="description" content="">
<meta name="author" content="">
<link href='http://fonts.googleapis.com/css?family=Lato:400,300italic,400italic,700,900' rel='stylesheet' type='text/css'>
<link rel="shortcut icon" href="/assets/front/images/favicon.png">
<title>Detail</title>

<!-- Bootstrap core CSS -->
<link href="/assets/front/css/animated.css" rel="stylesheet">
<link href="/assets/front/css/font-awesome.min.css" rel="stylesheet">
<link href="/assets/front/css/bootstrap.css" rel="stylesheet">

<!-- Custom styles for this template -->
<link href="/assets/front/css/mystyle.css" rel="stylesheet">
<link href="/assets/front/css/iecss.css" rel="stylesheet">
<link href="/assets/front/css/responsive.css" rel="stylesheet">
<!-- Just for debugging purposes. Don't actually copy this line! -->
<!--[if lt IE 9]><script src="../../docs-assets/js/ie8-responsive-file-warning.js"></script><![endif]-->

<!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
<!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->
<script src="/assets/js/jquery.min.js"></script>
<script src="/assets/front/js/easyResponsiveTabs.js" type="text/javascript"></script>
<script src="/assets/front/js/jquery.raccordion.js" type="text/javascript"></script>
<script src="/assets/front/js/jquery.animation.easing.js" type="text/javascript"></script>
</head>

<body class="animated fadeIn detail-body">
<div class="modal fade" id="basicModal" tabindex="-1" role="dialog" aria-labelledby="basicModal" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="login-head"><i class="fa fa-lock"></i> login</div>
      <form class="col-md-12">
        <button type="button" class="btn btn-default" data-dismiss="modal">X</button>
        <div class="login-left">
          <div class="form-group">
            <div class="form-control"> <span class="error-msg">Please enter your username</span> <span><i class="fa fa-user"></i></span>
              <input type="text" class="input-lg" placeholder="Username:">
            </div>
          </div>
          <div class="form-group">
            <div class="form-control"> <span><i class="fa fa-key"></i></span>
              <input type="password" class="input-lg" placeholder="Password:">
            </div>
          </div>
          <div class="form-group">
            <input type="checkbox" name="checkboxG4" id="checkboxG4" class="css-checkbox" />
            <label for="checkboxG4" class="css-label">Remember me</label>
            <a href="#" class="forgot-link">Forgot Password?</a> </div>
          <div class="form-group">
            <input name="" type="text" class="captch-inp">
            <a href="#" class="captcha-box"><img src="images/captcha-img.jpg" alt="img"></a> </div>
          <div class="form-group">
            <button class="btn_n4">Login</button>
          </div>
        </div>
        <ul class="loginlst">
          <li><a href="#"><img src="images/login-icon1.png" alt="icon"> weibo.com</a></li>
          <li><a href="#"><img src="images/login-icon2.png" alt="icon"> tencent QQ</a></li>
          <li><a href="#"><img src="images/login-icon3.png" alt="icon"> we chat</a></li>
        </ul>
      </form>
    </div>
  </div>
</div>
<!-- Static navbar -->
<header>
  <div class="top-row">
    <div class="container">
      <div class="col-xs-1"><a href="#" class="top-home"><i class="fa fa-home"></i></a></div>
      <div class="col-xs-10 top-link">
        <ul>
          <li><a href="#"><i class="fa fa-user"></i>About us</a></li>
          <li><a href="#" data-toggle="modal" data-target="#basicModal"><i class="fa fa-lock"></i>Login </a></li>
        </ul>
      </div>
    </div>
  </div>
  <div class="container">
    <div class="col-sm-4 logo-box"> <a href="#"><img src="/assets/front/images/logo.png" alt="logo"></a> </div>
    <div class="col-sm-8 top-clr">
      <div class="navbar navbar-default navbar-static-top" role="navigation">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse"> <span class="sr-only">Toggle navigation</span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
        </div>
        <div class="navbar-collapse collapse">
          <ul class="nav navbar-nav">
            <li class="active"><a href="#">Home </a></li>
            <li><a href="#">Featured Magazines</a></li>
            <li><a href="#">Create new Magazine </a></li>
          </ul>
        </div>
        <!--/.nav-collapse --> 
      </div>
    </div>
  </div>
</header>
<div class="detail-mian-box">
  <div class="detail-left">
    <div class="dtl-sld-main">
      <div id="carousel-demo">
        <ul>
          <li><span> <span class="volume-icon"><a href="#"><img src="/assets/front/images/volume-icon.png" alt="icon"></a></span> <img src="/assets/front/images/2.jpg"></span></li>
          <li><span> <span class="volume-icon"><a href="#"><img src="/assets/front/images/volume-icon.png" alt="icon"></a></span> <img src="/assets/front/images/1.jpg"></span></li>
          <li><span> <span class="volume-icon"><a href="#"><img src="/assets/front/images/volume-icon.png" alt="icon"></a></span> <img src="/assets/front/images/3.jpg"></span></li>
          <li><span> <span class="volume-icon"><a href="#"><img src="/assets/front/images/volume-icon.png" alt="icon"></a></span> <img src="/assets/front/images/4.jpg"></span></li>
          
        </ul>
      </div>
    </div>
    <div class="social-detail">
      <div class="s-icons"> <a href="#"><img src="/assets/front/images/fb.png" alt="facebook"></a> <a href="#"><img src="/assets/front/images/twitter.png" alt="twitter"></a> <!--<a href="#"><img src="images/in.png" alt="in"></a>--> <!--<a href="#"><img src="images/g+.png" alt="g+"></a>--> <!--<a href="#"><img src="images/fliker.png" alt="fliker"></a>--></div>
      <div class="screen-icon"><a href="#"><i class="fa fa-expand"></i></a>
      <a href="#"><i class="fa fa-compress"></i></a>
      </div>
    </div>
  </div>
  <div class="detail_right">
    <h3 class="heading-3">Li Wen</h3>
    <div class="author-row">
      <div class="author-left">
        <p> Author: <span>de spoiled baby</span></p>
        <p>Creation Date: <span>2015-01-02</span></p>
        <p>Background music: <span>Because I Love You</span></p>
        <div class="likes-r">
          <ul>
            <li><a href=""><i class="fa fa-eye"></i> 23</a></li>
            <li><a href=""><i class="fa fa-heart"></i> 05</a></li>
          </ul>
        </div>
      </div>
      <div class="author-right"><span><img src="/assets/front/images/thumb2.jpg" alt="img"></span></div>
      <div class="clearfix"></div>
    </div>
    <div class="right-scrl-box">
      <div class="othr-box">
        <p class="othr-txt"><a href="">Other magazines You may also like</a></p>
        <ul class="magine-list">
            <li><a href="#"><img src="/assets/front/images/mag-img1.jpg" alt="img"></a></li>
          <li><a href="#"><img src="/assets/front/images/mag-img1.jpg" alt="img"></a></li>
          <li><a href="#"><img src="/assets/front/images/mag-img1.jpg" alt="img"></a></li>
          <li><a href="#"><img src="/assets/front/images/mag-img1.jpg" alt="img"></a></li>
          <li><a href="#"><img src="/assets/front/images/mag-img1.jpg" alt="img"></a></li>
          <li><a href="#"><img src="/assets/front/images/mag-img1.jpg" alt="img"></a></li>
          <li><a href="#"><img src="/assets/front/images/mag-img1.jpg" alt="img"></a></li>
          <li><a href="#"><img src="/assets/front/images/mag-img1.jpg" alt="img"></a></li>
      
        </ul>
      </div>
      <div class="othr-box">
        <p class="othr-txt"><a href="#">The author's other magazines</a></p>
        <ul class="magine-list">
          <li><a href="#"><img src="/assets/front/images/mag-img1.jpg" alt="img"></a></li>
        </ul>
      </div>
      <div class="othr-box">
        <p class="othr-txt">Comment on this page</p>
        <div class="cont-txt">
          <textarea name="" cols="" rows="" class="rightxt-area"></textarea>
        </div>
        <div class="publis-row"> <span class="you-can">You can also enter 500 words </span> <span class="btn-pub">
          <button class="btn_ncmn">Published</button>
          </span> </div>
      </div>
    </div>
  </div>
</div>
<div id="preload">
  <div id="preload-content">
    <div class="preload-bounce"> <span class="bounce1"></span> <span class="bounce2"></span> <span class="bounce3"></span> <span class="bounce4"></span> </div>
    <div class="preload-text">Loading... </div>
  </div>
</div>
<!-- /container --> 

<!-- Bootstrap core JavaScript
    ================================================== --> 
<!-- Placed at the end of the document so the pages load faster --> 

<script type="text/javascript" src="/assets/front/js/init.js"></script> 
<script src="/assets/front/js/bootstrap.min.js"></script> 
<script src="/assets/front/js/jquery_003.js"></script> 
<script src="/assets/front/js/jquery_002.js"></script> 
<script src="/assets/front/js/enquire.js"></script> 
<script src="/assets/front/js/examples.js"></script>  
<script src="/assets/js/jquery-ui.js"></script>
<script src="/assets/front/js/ui.carousel.js" data-cover></script> 
<script>
    (function($){
      $('#carousel-demo').carousel();
    }(jQuery));
  </script> 
<script>
img = $("#carousel-demo ul  li > span > img")
window.onresize = function(){
  show_fig();
 };



 function show_fig(){
  
   img.height(parseInt($(".detail-mian-box").height()*0.8));
   
 };
show_fig()
</script> 
<script>
$('.screen-icon a').click(function(){

  $('.detail-left').toggleClass('full-width')
})

</script>
</body>
</html>