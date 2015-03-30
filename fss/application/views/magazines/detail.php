<?php //pr($rand_selfmagazine);exit;?>
<?php //pr($get_ad_data);//exit;?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="">
        <meta name="author" content="">
        <link href='http://fonts.googleapis.com/css?family=Lato:400,300italic,400italic,700,900' rel='stylesheet' type='text/css'>
        <link rel="shortcut icon" href="images/favicon.png">
        <title><?php echo $category_data->title;?></title>

        <!-- Bootstrap core CSS -->
        <link href="/assets/front/css/animated.css" rel="stylesheet">
        <link href="/assets/front/css/font-awesome.min.css" rel="stylesheet">
        <link href="/assets/front/css/bootstrap.css" rel="stylesheet">

        <!-- Custom styles for this template -->
        <link href="/assets/front/css/mystyle.css" rel="stylesheet">
        <link href="/assets/front/css/iecss.css" rel="stylesheet">
        <link href="/assets/front/css/custome.css" rel="stylesheet">
        
        <!-- Just for debugging purposes. Don't actually copy this line! -->
        <!--[if lt IE 9]><script src="../../docs-assets/js/ie8-responsive-file-warning.js"></script><![endif]-->

        <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!--[if lt IE 9]>
              <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
              <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
            <![endif]-->
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
        <script src="/assets/front/js/easyResponsiveTabs.js" type="text/javascript"></script>
        <script src="/assets/front/js/jquery.raccordion.js" type="text/javascript"></script>
        <script src="/assets/front/js/jquery.animation.easing.js" type="text/javascript"></script>
        <script type="text/javascript" src="/fb/jquery.urlshortener.min.js"></script>

        <script>
            function fncomment(){
        var img_id = $(".ui-carousel-item-active").attr('id');
        var article_id = '<?php echo $category_data->id;?>';
        var user_id = '<?php echo $this->session->userdata('id');?>';
        var message = $('#message').val();
        $('#message').val('');
        if(message!=''){
            $.ajax({
                type: "POST",
                url: "/magazines/add_comment",
                data:{img_id:img_id,article_id:article_id,user_id:user_id,message:message},
                success: function(res) {
                    $('#commentpapend').prepend(res);
                    //$("#filllikes").html(res);
                    //console.log(res);
                }
            });
    }
}


function fnlikeunlike(article_id,user_id){
    //alert(airticle_id+ ' '+$user_id)
     $.ajax({
            type: "POST",
            url: "/magazines/likeunlike",
            data:{article_id:article_id,user_id:user_id},
            success: function(res) {
                $("#filllikes").html(res);
                //console.log(res);
            }
        });
}

function fncommentlike(obj){
    //alert(obj.id);
    $.ajax({
            type: "POST",
            url: "/magazines/commentlikeunlike",
            data:{mixed_id:obj.id},
            success: function(res) {
                $("#"+obj.id).html(res);
                //console.log(res);
            }
        });
}
function updateCountdown() {
    // 140 is the max message length
    var remaining = 500 - $('#message').val().length;
    $('.countdown123').text(remaining + ' characters remaining.');
}

$(document).ready(function($) {
    updateCountdown();
    $('#message').change(updateCountdown);
    $('#message').keyup(updateCountdown);
    $('#image_id').val($(".ui-carousel-item-active").attr('id'));
    var img_id = $(".ui-carousel-item-active").attr('id');
    var article_id = '<?php echo $category_data->id;?>';
    var user_id = '<?php echo $this->session->userdata('id');?>';
    $.ajax({
        type: "POST",
        url: "/magazines/get_comments",
        data:{img_id:img_id,article_id:article_id,user_id:user_id},
        success: function(res) {
            $("#commentpapend").html(res);
            //console.log(res);
        }
    });
    
    if($( window ).width()<=770){
        window.location.href = '/magazines/details/<?php echo $category_data->id?>';
    }
    
    $.ajax({
        type: "POST",
        url: "/magazines/get_ads",
        data:{},
        success: function(res) {
            $("#advertise_id").html(res);
        }
    });
});


        </script>
        <script>
            $(function() {

              jQuery.urlShortener.settings.apiKey = 'febf5540240a4ccea5175e62e481e4fe';

            });
            function openFbPopUp(name, link, picture, caption, description) {
                FB.ui(
                  {
                    method: 'feed',
                    name: name,
                    link: link,
                    picture: picture,
                    caption: caption,
                    description: description
                  },
                  function(response) {
                    if (response && response.post_id) {
                      //alert('Post was published.');
                    } else {
                      //alert('Post was not published.');
                    }
                  }
                );
                setTimeout(function(){ /*location.reload();*/ }, 3000);
                //location.reload();
            }
        </script>
        <script>
            window.fbAsyncInit = function() {
              FB.init({
                appId      : '758943344159397',
                status     : false,
                xfbml      : false
              });

              FB.Canvas.setSize({height:100});
              setTimeout("FB.Canvas.setAutoGrow()",500);
            };

            (function(d, s, id){
               var js, fjs = d.getElementsByTagName(s)[0];
               if (d.getElementById(id)) {return;}
               js = d.createElement(s); js.id = id;
               js.src = "//connect.facebook.net/en_US/all.js";
               fjs.parentNode.insertBefore(js, fjs);
             }(document, 'script', 'facebook-jssdk'));
          </script>
    </head>
    <?php
$actionarr = array('register','signin');
$action = $this->uri->segment(2);

if(!in_array($action,$actionarr)){
    include dirname(dirname(dirname(dirname(__FILE__)))).'/fb/src/facebook.php';
    $facebook = new Facebook(array(
        'appId'  => appId,
        'secret' => secret,
      ));
    $fb_users = $facebook->getUser();
    if(isset($fb_users) and $fb_users !=''){
        $user_id = $this->session->userdata('id');
        if(isset($user_id) and $user_id !=''){
            
        }else{
            if(isset($fb_users) and $fb_users !='')
                redirect('/users/signin');
        }
    }else{
        
    }
    $loginUrl   = $facebook->getLoginUrl(
        array(
            'scope' => 'publish_actions'
        )
        );
      
}?>
    <body class="animated fadeIn detail-body">
        
        <div class="modal fade" id="basicModal" tabindex="-1" role="dialog" aria-labelledby="basicModal" aria-hidden="true">
  <div class="modal-dialog">
      <button type="button" class="btn btn-default" data-dismiss="modal">X</button>
    <div class="modal-content">
      <div class="login-head"><i class="fa fa-lock"></i> login</div>
      <form class="col-md-12" id="loginform" action="<?php echo base_url()?>users/login" method="post">
          <?php include dirname(dirname(dirname(dirname(__FILE__)))).'/captcha/simple-php-captcha.php';
                //ob_start();
                
                //session_start();
                //$_SESSION = array();
                $_SESSION['captcha'] = simple_php_captcha();
                $captcha = array('captcha'=>simple_php_captcha());
                $this->session->set_userdata($captcha);
                $captcha_d = $this->session->userdata('captcha');
                //pr($captcha_d);
          ?>
        
        <div class="login-left">
          <div class="form-group">
              <div class="form-control"> 
                <span class="error-msg error_message" style="display: none" id="error_username">Please enter your username</span> 
                <span class="error-msg error_message" style="display: none" id="error_login_fail"></span> 
                <span><i class="fa fa-user"></i></span>
                <input type="text" id="username" name="username" class="input-lg" placeholder="Username">
            </div>
          </div>
          <div class="form-group">
            <div class="form-control">
                <span class="error-msg error_message" style="display: none" id="error_password">Please enter your password</span> 
                <span><i class="fa fa-key"></i></span>
                <input type="password" name="password" id="password" class="input-lg" placeholder="Password">
                
            </div>
          </div>
          <div class="form-group">
            <input type="checkbox" name="checkboxG4" id="checkboxG4" class="css-checkbox" />
            <label for="checkboxG4" class="css-label">Remember me</label>
            <a href="/users/forgotpassword" class="forgot-link">Forgot Password?</a> </div>
          <div class="form-group captcha_test">
              <span class="error-msg error_message" style="display: none;" id="error_captcha">Please enter captcha</span> 
              <input name="captcha" id="captcha" type="text" class="captch-inp">
            <a href="#" class="captcha-box">
<!--                <img src="/assets/front/images/captcha-img.jpg" alt="img">-->
                <?php echo '<img height = "49px;" src="' . $captcha_d['image_src'] . '" alt="CAPTCHA code">';?>
            </a> 
              <input type="hidden" value="<?php echo $captcha_d['code']?>" id="captcha_code" />
          </div>
          <div class="form-group">
              <button type="button" onclick="fnlogin();" class="btn_n4">Login</button>
          </div>
        </div>
          <div class="sig-up-right">
            <div class="no-margin-right-md"> 
                <a class="pure-button pr-btn-1" style="font-size: 15px;" href="<?php echo $loginUrl;?>"><i style="background: #4e70aa;" class="fa fa-facebook"></i> Login with facebook</a> 
            </div>
         </div>
<!--        <ul class="loginlst">
          <li><a href="#"><img src="/assets/front/images/login-icon1.png" alt="icon"> weibo.com</a></li>
          <li><a href="#"><img src="/assets/front/images/login-icon2.png" alt="icon"> tencent QQ</a></li>
          <li><a href="#"><img src="/assets/front/images/login-icon3.png" alt="icon"> we chat</a></li>
        </ul>-->
      </form>
    </div>
  </div>
</div>
        
        <!-- Static navbar -->
        <header>
            <div class="top-row">
                <div class="container">
                    <div class="col-xs-1"><a href="/" class="top-home"><i class="fa fa-home"></i></a></div>
                    <div class="col-xs-10 top-link">
                        <ul>
                            <li class="active"><a href="/">Home </a></li>
                            <li><a href="/magazines">Featured Magazines</a></li>
                            <li><a href="/magazines/create">Create new Magazine </a></li>
                            <?php
                            $user_id = $this->session->userdata('id');
                            if(isset($user_id) and $user_id !=''){ ?>
                                <li><a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i>Welcome: <?php echo $this->session->userdata('username')?></a></li>
                                <li><a href="/users/logout"><i class="fa fa-lock"></i>Logout </a></li>
                            <?php }else{ ?>
                                <li><a href="/users/register"><i class="fa fa-user"></i>Register</a></li> 
                                <li><a href="javascript:;" data-toggle="modal" data-target="#basicModal"><i class="fa fa-lock"></i>Login </a></li>
                            <?php }?>
                        </ul>
                    </div>
                </div>
            </div>
        </header>
        <?php //pr($get_ad_data);//exit;?>
        <div class="detail-mian-box">
            <div class="detail-left">
                <div class="dtl-sld-main">
                    <div id="carousel-demo">
                        <div class="dtl-inm">
                        <?php 
                           // pr($category_data);exit;
                        if((isset($category_data->music_file) and $category_data->music_file !='') or (isset($category_data->music_id) and $category_data->music_id !='0')){?>
                            <span class="volume-icon">
                                <section class='u-audio f-hide' <?php if(isset($category_data->music_file) and $category_data->music_file !=''){?> data-src='/uploads/uploaded_musics/<?php echo $category_data->music_file?>' <?php }else if(isset($category_data->music_id) and $category_data->music_id !=''){?>data-src='/uploads/musics/<?php echo $music_data->musics_file;?>'<?php }else{?>data-src='/assets/mobile/audio/music.mp3'<?php }?>>
                                <p id='coffee_flow' class="btn_audio"><strong class='txt_audio z-hide'>Volume</strong><span class='css_sprite01 audio_open'></span></p>
                                </section>
                            </span>
                        <?php }?>
                        <?php //pr($get_ad_data);?>
                        <ul>
                            
                            <?php if(!empty($images_data)){?>
                            <?php foreach($images_data as $image){?>
                            <li id="<?php echo $image->id;?>">
                                <span> 
<!--                                    <span class="volume-icon">
                                        <a href="#"><img src="/assets/front/images/volume-icon.png" alt="icon"></a>
                                    </span> -->
                                    <img src="/uploads/images/<?php echo $image->image_name;?>">
                                </span>
                                <div class="s-icons"> 
                                    <a href="#" onclick="openFbPopUp('<?php echo $users_data->firstname;?> <?php echo $users_data->lastname;?>', '<?php echo PAGE_URL.'/magazines/detail/'.$category_data->id?>', '<?php echo PAGE_URL.'/uploads/images/'.$image->image_name?>', '<?php echo $category_data->share_title;?>', '<?php echo $category_data->share_text;?>');return false;"><img src="/assets/front/images/fb.png" alt="facebook"></a>
                                    <!--<a href="#"><img src="/assets/front/images/twitter.png" alt="twitter"></a> <a href="#"><img src="images/in.png" alt="in"></a>--> <!--<a href="#"><img src="images/g+.png" alt="g+"></a>--> <!--<a href="#"><img src="images/fliker.png" alt="fliker"></a>-->
                                  </div>
                            </li>
                            <?php }?>
                            <?php }?>
                            <li id="advertise_id">
                                <span class="last-ad">
                                    <span class="last-ad-in"> <span class="volume-icon"></span> 
                                        <span class="heading-ad-1">Recommended promotions</span>
                                        <?php   foreach($get_ad_data as $get_ad){?>
                                        <span class="add-img"><a href=""><img src="/assets/front/images/add-n1.jpg"></a>
                                            <span class="slot-item">1-<?php echo $get_ad->id;?></span>
                                        </span>
                                        <?php }?>
<!--                                        <span class="add-img"><a href=""><img src="/assets/front/images/add-n2.jpg"></a><span class="slot-item">2-1</span></span>
                                        <span class="add-img"><a href=""><img src="/assets/front/images/add-n3.jpg"></a><span class="slot-item">3-1</span></span>
                                        <span class="add-img"><a href=""><img src="/assets/front/images/add-n4.jpg"></a><span class="slot-item">4-1</span></span>-->
                                        
                                        <span class="heading-ad-2">advertisements <strong>by students</strong></span>
                                    </span>
                                </span>
                            </li>
<!--                            <li>
                                <span class="last-ad">
                                    <span class="last-ad-in"> <span class="volume-icon"><a href="#"><img src="/assets/front/images/volume-icon.png" alt="icon"></a></span> 
                                        <span class="heading-ad-1">Recommended promotions</span>
                                        <span class="add-img"><a href=""><img src="/assets/front/images/add-1.jpg"></a></span>
                                        <span class="add-img"><a href=""><img src="/assets/front/images/add-1.jpg"></a></span>
                                        <span class="add-img"><a href=""><img src="/assets/front/images/add-1.jpg"></a></span>
                                        <span class="add-img"><a href=""><img src="/assets/front/images/add-1.jpg"></a></span>
                                        <span class="heading-ad-2">advertisements by students</span>
                                    </span>
                                </span>
                            </li>-->
                            
                        </ul>
                    </div>
                    </div>
                </div>
                <div class="social-detail">
<!--                  <div class="s-icons"> 
                    <a href="#" onclick="openFbPopUp('<?php echo $users_data->firstname;?> <?php echo $users_data->lastname;?>', '', '<?php echo PAGE_URL.'/uploads/images/'.$category_data->share_img?>', '<?php echo $category_data->share_title;?>', '<?php echo $category_data->share_text;?>');return false;"><img src="/assets/front/images/fb.png" alt="facebook"></a>
                    <a href="#"><img src="/assets/front/images/twitter.png" alt="twitter"></a> <a href="#"><img src="images/in.png" alt="in"></a> <a href="#"><img src="images/g+.png" alt="g+"></a> <a href="#"><img src="images/fliker.png" alt="fliker"></a>
                  </div>-->
                    <div class="screen-icon"><a href="#"><i class="fa fa-expand"></i></a> <a href="#"><i class="fa fa-compress"></i></a> </div>
                </div>
            </div>
            <div class="detail_right">
                <h3 class="heading-3"><?php echo $category_data->title;?></h3>
                <div class="author-row">
                    <div class="author-left">
                        <p> Author: <span><?php echo $users_data->firstname;?> <?php echo $users_data->lastname;?></span></p>
                        <p>Creation Date: <span><?php if(isset($category_data->update) and $category_data->update !=''){ echo date('Y-m-d',strtotime($category_data->update));}else{ echo date('Y-m-d',strtotime($category_data->created)); }?></span></p>
                        <?php if((isset($category_data->music_file) and $category_data->music_file !='') or (isset($category_data->music_id) and $category_data->music_id !='0')){?>
                        <p>Background music: <span><?php if(isset($category_data->music_file) and $category_data->music_file !=''){ ?> <img src="/assets/front/images/music-icon.png" /> <?php }else{ echo $music_data->music_name; }?></span></p>
                        <?php }?>
                        <div class="likes-r">
                            <ul>
                                <li><a href=""><i class="fa fa-eye"></i> <?php echo $review;?></a></li>
                                <li>
                                    <?php $user_id = $this->session->userdata('id');
                                        if(isset($user_id) and $user_id !=''){?>
                                    <a href="javascript:;" onclick="fnlikeunlike('<?php echo $category_data->id;?>','<?php echo $users_data->id;?>');" id="filllikes"><i class="fa fa-heart <?php if(isset($like_data->is_like) and $like_data->is_like == '1'){?> active<?php }?>"></i> <?php echo $category_data->favorites_count?></a>
                                        <?php }else{?>
                                            <a data-target="#basicModal" data-toggle="modal" href="javascript:;"><i class="fa fa-heart"></i> <?php echo $category_data->favorites_count?></a>
                                        <?php }?>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="author-right"><span><img src="/qr/<?php echo $category_data->qr_code_img;?>" alt="img"></span></div>
                    <div class="clearfix"></div>
                </div>
                <div class="right-scrl-box">
                    <div class="othr-box">
                        <p class="othr-txt"><a href="javascript:;">Other magazines You may also like</a></p>
                        <ul class="magine-list">
                            <?php if(!empty($rand_magazines)){?>
                            <?php foreach($rand_magazines as $rand_magazine){?>
                            <li><a href="/magazines/detail/<?php echo $rand_magazine['articles']->id;?>" title="<?php echo $rand_magazine['articles']->title;?>" ><img width="81" height="74" src="/uploads/images/<?php echo $rand_magazine['articles']->share_img;?>" alt="img"></a></li>
                            <?php }?>
                            <?php }?>
                        </ul>
                    </div>
                    <div class="othr-box">
                        <?php $user_id = $this->session->userdata('id');
                            if(isset($user_id) and $user_id !=''){?>
                                <p class="othr-txt"><a href="/magazines/usermagazine">The author's other magazines</a></p>
                            <?php }?>
                        <ul class="magine-list">
                            <?php if(!empty($rand_selfmagazine)){?>
                            <?php foreach($rand_selfmagazine as $rand_selfmagazin){?>
                            <li><a href="/magazines/detail/<?php echo $rand_selfmagazin['articles']->id;?>" title="<?php echo $rand_selfmagazin['articles']->title;?>"><img width="81" height="74" src="/uploads/images/<?php echo $rand_selfmagazin['articles']->share_img;?>" alt="img"></a></li>
                            <?php }?>
                            <?php }?>
                        </ul>
                    </div>
                    <div class="othr-box">
                        <p class="othr-txt">Comment on this page</p>
                        <div class="cont-txt">
                            <textarea name="" cols="" rows="" maxlength="500" id="message" class="rightxt-area"></textarea>
                            <input type="hidden" id="image_id" />
                        </div>
                        <div class="publis-row"> 
                            <span class="you-can">You can also enter <span class="countdown123"></span> words </span> <span class="btn-pub">
                                <?php $user_id = $this->session->userdata('id');
                                        if(isset($user_id) and $user_id !=''){?>
                                        <button class="btn_ncmn" onclick="fncomment();">Published</button>
                                        <?php }else{?>
                                            <button data-target="#basicModal" data-toggle="modal" class="btn_ncmn">Published</button>
                                        <?php }?>
                                
                            </span> 
                        </div>
                    </div>
                    <div class="cmt-list">
                        <ul id="commentpapend">
                                <?php if(!empty($comment_data)){?>
                                <?php foreach($comment_data as $comment){?>
                                    <li>
                                        <div class="cmt-left"><img src="/assets/front/images/mag-img1.jpg" alt="img"></div>
                                        <div class="cmt-right">
                                            <p class="words-txt"> <?php echo $comment->comment?><span class="fr btn_show arrow arrow_b"></span> </p>
                                            <div class="operate clearfix">
                                                <p class="op_time fl">5Month</p>
                                                <div class="op_reply fr"> <span class="praise"><a href="#" onclick = "fncommentlike(this);" id="<?php echo $comment->id.'_'.$comment->article_id.'_'.$comment->image_id.'_'.$this->session->userdata('id') ?>"><i class="fa fa-thumbs-up"></i> <?php echo $comment->like_count;?></a></span> </div>
                                            </div>
                                        </div>
                                        <div class="clearfix"></div>
                                    </li>
                                <?php }?>
                                <?php }?>
                        </ul>
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
        <script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.11.1/jquery-ui.min.js"></script> 
        <script src="/assets/front/js/ui.carousel.js" data-cover></script>
        
        <script>
            $j=$.noConflict();
        </script>
        <script src="/assets/mobile/js/init.mix.js" type="text/javascript" charset="utf-8"></script> 
        <script src="/assets/mobile/js/coffee.js" type="text/javascript" charset="utf-8"></script> 
        <script src="/assets/mobile/js/99_maind3eb.js" type="text/javascript" charset="utf-8" defer='defer'></script>
        
        <script>
            
            (function($j) {
                $j('#carousel-demo').carousel({callback: function(data) {
                        //console.log("clicked next / prev");
                        //alert($(".ui-carousel-item-active").attr('id'));
                        $('#image_id').val($j(".ui-carousel-item-active").attr('id'));
                        var img_id = $j(".ui-carousel-item-active").attr('id');
                        var article_id = '<?php echo $category_data->id;?>';
                        var user_id = '<?php echo $this->session->userdata('id');?>';
                        if(img_id!='advertise_id'){
                            
                            $j.ajax({
                                type: "POST",
                                url: "/magazines/get_comments",
                                data:{img_id:img_id,article_id:article_id,user_id:user_id},
                                success: function(res) {
                                    $j("#commentpapend").html(res);
                                    //console.log(res);
                                }
                            });
                        }else{
                            //alert('sfsdfsdg');
                        }
                    }});

            }(jQuery));
        </script> 
        <script>
            img = $j("#carousel-demo ul  li > span > img")
            window.onresize = function() {
                show_fig();
            };



            function show_fig() {

                img.height(parseInt($(".detail-mian-box").height() * 0.89));

            }
            ;
            show_fig()
        </script> 
        <script>
            $j('.screen-icon a').click(function() {

                $j('.detail-left').toggleClass('full-width')
            })



$j('#error-msg').show();
    function fnlogin(){
        $j('.error_message').hide();
        var username = $j('#username').val();
        var password = $j('#password').val();
        var captcha = $j('#captcha').val();
        var captcha_code = $j('#captcha_code').val();
        var flag = 1;
        if(username ==''){
            flag = 0;
            $j('#error_username').show();
        }else{
            flag = 1;
            $j('#error_username').hide();
        }
        if(password ==''){
            flag = 0;
            $j('#error_password').show();
        }else{
            flag = 1;
            $j('#error_password').hide();
        }
        if(captcha ==''){
            flag = 0;
            $j('#error_captcha').show();
        }else{
            flag = 1;
            $j('#error_captcha').hide();
        }
        if(flag == '1'){
            $j.ajax({
            type: "POST",
            url: "/users/login",
            data: { username: username, password: password,captcha:captcha,captcha_code:captcha_code }
            })
            .done(function( msg ) {
                $j('.error_message').hide();
                if(msg=='1'){
                    window.location.href = '/';
                }else if(msg == '2'){
                    window.location.href = '/admin';
                }else if(msg == '0'){
                    $j('#error_login_fail').show();
                    $j('#error_login_fail').html('Incorrect username or password');
                }else if(msg == '3'){
                    $j('#error_login_fail').show();
                    $j('#error_login_fail').html('Your account has been deactived');
                }else if(msg == '4'){
                    $j('#error_login_fail').show();
                    $j('#error_login_fail').html('Invalid captcha');
                }
            });
        }
    }
//alert($( window ).height());
//alert($( window ).width());
</script>
    </body>
</html>
<link href="/assets/front/css/responsive.css" rel="stylesheet">