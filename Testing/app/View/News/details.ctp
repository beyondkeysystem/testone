<?php //pr($this->Session->read("Auth.User")); pr($comment_data); exit;?>
<div class="section">
    <div class="container">
        <div class="news-detail">
            <div class="news-detail-heading">
                <div class="row clearfix">
                    <div class="col-md-6 news-detail-heading-left">
                        <h2><?=$news_data['New']['title']?></h2>
                        <ul class="date-sep clearfix">
                            <li><a href="javascript:void(0)"> <?=date("F d, Y",strtotime($news_data['New']['created']))?> </a></li>
                            <li><a href="javascript:void(0)"> <?php if(!empty($comment_data)) echo count($comment_data); else echo "0";?> Comments </a></li>
                            <li><a href="javascript:void(0)" class="current"> <?=$news_data['New']['subtitle']?>  </a></li>
                        </ul>
                    </div>
                    <div class="col-md-6 news-detail-heading-right">
                        <h2><?php echo __('Share Article');?></h2>
<script type="text/javascript">var switchTo5x=true;</script>
                        <script type="text/javascript" src="http://w.sharethis.com/button/buttons.js"></script>
                        <script type="text/javascript">stLight.options({publisher: "ef10443c-ac89-467f-8139-88068a4b1b69", doNotHash: false, doNotCopy: false, hashAddressBar: false});</script>
                        <ul class="news-social">
                            <!--li><a href="javascript:void(0)"> <i class="fa fa-twitter"></i> Twitter </a></li>
                            <li><a href="javascript:void(0)"> <i class="fa fa-facebook-f"></i> Facebook </a></li>
                            <li><a href="javascript:void(0)"> <i class="fa fa-google-plus"></i> Google + </a></li>
                            <li><a href="javascript:void(0)"> <i class="fa fa-envelope"></i> Email this article </a></li-->
                            <li><span class='st_facebook_large' displayText='Facebook'></span></li>
<li><span class='st_twitter_large' displayText='Tweet'></span></li>
<li><span class='st_linkedin_large' displayText='LinkedIn'></span></li>
<li><span class='st_pinterest_large' displayText='Pinterest'></span></li>
<li><span class='st_email_large' displayText='Email'></span></li>
                        </ul>                        
                    </div>
                </div>
            </div>

            <div class="news-detail-main">
                 <?php if(!empty($val['New']['detail_image'])){ ?>
                <div class="news-detail-main-pic"> <img src="/uploads/news/<?=$news_data['New']['detail_image']?>" alt=""> </div>
                <?php }else{ ?>
                <div class="news-detail-main-pic"> <img height="200" width="1170" src="/uploads/news/NoImage.png" alt=""> </div>
                <?php }?>
                <div class="news-detail-txt">
                    <p style="text-align: justify;"><?=$news_data['New']['desc']?></p>
                    
                <?php if(count($news_data_type) > 0){ ?>
                    <div class="heading-middle"><?php echo __('Related Articles'); ?></div>
                    <ul class="news-date">
                        <?php foreach($news_data_type as $val){ //debug($val); ?>
                        <?php if($news_data['New']['id'] != $val['New']['id']){ ?>
                            <li>
                                <div class="news-date-left"> <i class="fa fa-calendar"></i> <?php echo date("F d, Y",strtotime($val['New']['created'])); ?></div>  <i class="fa fa-angle-double-right"></i> <a href="/news/details/<?=$val['New']['id']?>"><?php echo $val['New']['title']; ?></a>
                            </li>                            
                        <?php } }?>
                    </ul>
                <?php } ?>
                

                    <div class="heading-middle"><?php echo __('Join the discussion'); ?> </div>
                    <?php if(!empty($comment_data)) { ?>
                        <?php foreach($comment_data as $val){ //debug($val); ?>
                            <div class="ticket-system-two" id="<?=$val['Commentor']['id']?>">
                                <ul class="ticket-system-two-link clearfix">
                                    <li class="grey-bg"><?=$val['Commentor']['name']?></li>
                                    <li class="light-grey-bg"><?php echo __('Date'); ?>: <?=date('F d, Y',strtotime($val['Commentor']['created']))?>, &nbsp; &nbsp;  &nbsp;  &nbsp;     <?php echo __('Time'); ?>: <?=date('h:i:s',strtotime($val['Commentor']['created']))?></li>
                                    <?php if($role=='admin'){ ?>
                                    <li class="grey-bg"><a style="color: gray;" href="javascript:void(0);" onclick="deletecomment('<?=$val['Commentor']['id']?>')"><?=__('Delete')?></a></li>
                                    <?php }?>                            
                                </ul>                   
                                <p><?=$val['Commentor']['message']?></p>               
                            </div>
                        <?php }?>
                    <?php }?>

                    <div class="news-detail-form clearfix">
                        <h2><?php echo __('Your email address will not be published. Required fields are marked'); ?> <span class="mendetory">*</span>      </h2>

                        <div class="news-main-form">
                            <form method="post" action="">
                                <div class="row clearfix">
                                    <div class="col-md-6">
                                        <label><?php echo __('Name'); ?> <span class="mendetory">*</span>      </label>
                                        <input type="text" name="data[Commentor][name]" required="required" class="txt-field">
                                    </div>
    
                                    <div class="col-md-6">
                                        <label><?php echo __('Email'); ?> <span class="mendetory">*</span>      </label>
                                        <input type="email" name="data[Commentor][email]" required="required" class="txt-field">
                                    </div>
                                </div>
    
                                <div class="row clearfix">
                                    <div class="col-md-6">
                                        <label><?php echo __('Phone Number'); ?> <span class="mendetory">*</span>      </label>
                                        <input type="text" name="data[Commentor][phone]" required="required" class="txt-field">
                                    </div>
    
                                    <div class="col-md-6">
                                        <label><?php echo __('Website'); ?>  <span class="mendetory">*</span>      </label>
                                        <input type="url" name="data[Commentor][website]" required="required" class="txt-field">
                                    </div>
                                </div>
    
                                <div class="row clearfix">
                                    <div class="col-md-12">
                                        <label><?php echo __('Message'); ?> <span class="mendetory">*</span>      </label>
                                        <textarea name="data[Commentor][message]" required="required" class="txt-area"></textarea>
                                    </div>
                                </div>
    
                                <div class="row clearfix">
                                    <div class="col-md-12">
                                        <input type="submit" name="submit" value="Submit" class="submit-btn">
                                    </div>
                                </div>
                            </form>
                        </div>			
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    function deletecomment(comment_id){
          $.post(
            "<?php echo Router::fullbaseUrl();?>/news/delete_row",
            { id: comment_id},
            function(data){
                if (data == 1) {
                    $("#"+comment_id).hide();    
                }
                console.log(data);
            }
          ); 
    }
</script>
