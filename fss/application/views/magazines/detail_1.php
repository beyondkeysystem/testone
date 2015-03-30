<?php //pr($category_data);
    //pr($like_data);
?>
<div class="detail-mian-box">
  <div class="detail-left">
    <div class="dtl-sld-main">
      <div id="carousel-demo">
        <ul>
<!--          <li>
              <span> 
                  <span class="volume-icon">
                      <a href="#"><img src="/assets/front/images/volume-icon.png" alt="icon"></a>
                  </span> 
                  <img src="/uploads/images/<?php echo $category_data->share_img;?>">
              </span>
          </li>-->
          <?php if(!empty($images_data)){?>
          <?php foreach($images_data as $image){?>
          <li>
              <span> 
                  <span class="volume-icon">
                      <a href="#"><img src="/assets/front/images/volume-icon.png" alt="icon"></a>
                  </span> 
                  <img src="/uploads/images/<?php echo $image->image_name;?>">
              </span>
          </li>
          <?php }?>
          <?php }?>
        </ul>
      </div>
    </div>
    <div class="social-detail">
      <div class="s-icons"> 
          <a href="#"><img src="/assets/front/images/fb.png" alt="facebook"></a> 
          <a href="#"><img src="/assets/front/images/twitter.png" alt="twitter"></a> <!--<a href="#"><img src="images/in.png" alt="in"></a>--> <!--<a href="#"><img src="images/g+.png" alt="g+"></a>--> <!--<a href="#"><img src="images/fliker.png" alt="fliker"></a>--></div>
      <div class="screen-icon"><a href="#"><i class="fa fa-expand"></i></a>
      <a href="#"><i class="fa fa-compress"></i></a>
      </div>
    </div>
  </div>
  <div class="detail_right">
    <h3 class="heading-3">Li Wen</h3>
    <div class="author-row">
      <div class="author-left">
        <p> Author: <span><?php echo $users_data->username;?></span></p>
        <p>Creation Date: <span> <?php if(isset($category_data->update) and $category_data->update !=''){ echo date('Y-m-d',strtotime($category_data->update));}else{ echo date('Y-m-d',strtotime($category_data->created)); }?></span></p>
        <p>Background music: <span> <?php echo $music_data->music_name;?></span></p>
        <div class="likes-r">
          <ul>
            <li><a href="javascript:;"><i class="fa fa-eye"></i> <?php echo $review;?></a></li>
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
            <textarea name="" cols="" maxlength="500" rows="" id="message" class="rightxt-area message"></textarea>
        </div>
        <div class="publis-row"> 
            <span class="you-can">You can also enter <span class="countdown"></span> words </span> 
            <span class="btn-pub">
                <button class="btn_ncmn">Published</button>
            </span> 
        </div>
      </div>
    </div>
  </div>
</div>
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
function updateCountdown() {
    // 140 is the max message length
    var remaining = 500 - $('.message').val().length;
    $('.countdown').text(remaining + ' characters remaining.');
}

$(document).ready(function($) {
    updateCountdown();
    $('.message').change(updateCountdown);
    $('.message').keyup(updateCountdown);
});
</script>