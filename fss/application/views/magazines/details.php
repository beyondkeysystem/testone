<!doctype html>
<html>
    <head>
        <title><?php echo $magazine_data->title;?></title>
        <meta charset="utf-8" />
        <meta name="apple-touch-fullscreen" content="YES" />
        <meta name="format-detection" content="telephone=no" />
        <meta name="apple-mobile-web-app-capable" content="yes" />
        <meta name="apple-mobile-web-app-status-bar-style" content="black" />
        <meta http-equiv="Expires" content="-1" />
        <meta http-equiv="pragram" content="no-cache" />
        <link rel="stylesheet" type="text/css" href="/assets/mobile/css/style-mobile.css" />
        <script type="text/javascript" src="/assets/mobile/js/offline.js" ></script>
        <script type="text/javascript">
            var mengvalue = -1;
            //if(mengvalue<0){mengvalue=0;}
            var phoneWidth = parseInt(window.screen.width);
            var phoneScale = phoneWidth / 640;

            var ua = navigator.userAgent;
            if (/Android (\d+\.\d+)/.test(ua)) {
                var version = parseFloat(RegExp.$1);

                if (version > 2.3) {
                    document.write('<meta name="viewport" content="width=640, minimum-scale = ' + phoneScale + ', maximum-scale = ' + phoneScale + ', target-densitydpi=device-dpi">');

                } else {
                    document.write('<meta name="viewport" content="width=640, target-densitydpi=device-dpi">');
                }

            } else {
                document.write('<meta name="viewport" content="width=640, user-scalable=no, target-densitydpi=device-dpi">');
            }
        </script>
    </head>
    <?php //pr($magazine_data);?>
    <?php //pr($music_data->musics_file);?>
    <body class='s-bg-ddd'>
        <section class="u-alert"><img alt="Loding"  src="/assets/mobile/images/loading_large.gif" class="loading-img"/> </section>
        <section class='u-audio f-hide' <?php if(isset($magazine_data->music_file) and $magazine_data->music_file !=''){?> data-src='/uploads/uploaded_musics/<?php echo $magazine_data->music_file?>' <?php }else if(isset($magazine_data->music_id) and $magazine_data->music_id !=''){?>data-src='/uploads/musics/<?php echo $music_data->musics_file;?>'<?php }else{?>data-src='/assets/mobile/audio/music.mp3'<?php }?>>
            <p id='coffee_flow' class="btn_audio"><strong class='txt_audio z-hide'>Volume</strong><span class='css_sprite01 audio_open'></span></p>
        </section>
        <section class='u-arrow f-hide'>
            <p class="css_sprite01"></p>
        </section>
        <section class='p-ct'>
            <div class='translate-back f-hide'>
                
                <?php $i=0; foreach($images_data as $images){?>
                <?php if($i==0){?>
                    <div class='m-page m-fengye f-hide' data-page-type='info_pic3' data-statics='info_pic3'>
                        <div class="page-con j-txtWrap lazy-img" data-src="/uploads/images/<?php echo $images->image_name;?>"></div>
                    </div>
                <?php }else{?>
                <div class='m-page m-bigTxt f-hide' data-page-type='bigTxt' data-statics='info_list'>
                    <div class="page-con j-txtWrap lazy-img" data-src="/uploads/images/<?php echo $images->image_name;?>"></div>
                </div>
                
                <?php }?>
                <?php $i++; }?>
                <?php if(!empty($rand_selfmagazine)){?>
                <div class='m-page m-bigTxt f-hide' data-page-type='bigTxt' data-statics='info_list'>
                    <div class="last-add-2">
                        <div class="user_box">
                            <div class="user_pic">
                                
                                <?php if(isset($user_data->profile_pic) and $user_data->profile_pic !=''){?>
                                    <a href="javascript:;">
                                        <img src="/uploads/profile/<?php echo $user_data->profile_pic?>" alt="img">
                                    </a>
                                <?php }else{?>
                                    <a href="#">
                                        <img src="/assets/mobile/images/icon.jpg">
                                    </a>
                                <?php }?>
                                
                            </div>
                            <div class="user_name"><span><em>AL</em>Collections</span></div>
                        </div>
                        <ul id="list" class="list_mag">
                            <?php foreach ($rand_selfmagazine as $selfmagazine){?>
                            <li>
                            <a href="/magazines/details/<?php echo $selfmagazine['articles']->id;?>">
                                <div class="img_box"><img width="200" height="200" src="/uploads/images/<?php echo $selfmagazine['articles']->share_img; ?>"></div>
                                    <p class="tit"><?php echo $selfmagazine['articles']->title;?></p>
                                    <p class="read">Browse:<i><?php echo $selfmagazine['articles']->read_count;?></i></p>
                                </a>
                            </li>
                            <?php }?>
                        </ul>
                        <span class="tg"><img src="/assets/mobile/images/last_ad_r1_c1.png"></span>
                    </div>
                </div>
                <?php }?>
                <?php if(!empty($rand_magazines)){?>
                <div class='m-page m-bigTxt f-hide' data-page-type='bigTxt' data-statics='info_list'>
                    <div class="last-add-2">
                        <div class="magazine_list">
                            <ul>
                                <?php //pr($rand_magazines);exit; 
                                foreach($rand_magazines as $rand_magazine){?>
                                <li>
                                    <a href="/magazines/details/<?php echo $rand_magazine['articles']->id;?>">
                                        <div class="left-in"><img width="117" height="117" src="/uploads/images/<?php echo $rand_magazine['articles']->share_img; ?>"></div>
                                        <div class="right-in">
                                            <h2><span><?php echo $rand_magazine['articles']->title;?></span></h2>
                                            <p class="liulan">Browse：<i><?php echo $rand_magazine['articles']->read_count;?></i></p>
                                        </div>
                                    </a>
                                </li>
                                <?php }?>
                            </ul>
                            <span class="tg"><img src="/assets/mobile/images/last_ad_r1_c1.png"></span>
                        </div>
                    </div>
                </div>
                <?php }?>
                <div class='m-page m-bigTxt f-hide' data-page-type='bigTxt' data-statics='info_list'>
                    <div class="last-add">
                    <span class="heading-ad-1">Recommended promotions</span>
                    <ul>
                        <?php foreach($get_ad_data as $get_ad){?>
                            <?php if(isset($get_ad->advrtise_file) and $get_ad->advrtise_file !=''){?>
                                <a href="<?php echo $get_ad->target_url?>" target="_blank"><img src="/uploads/ads_files/<?php echo $get_ad->advrtise_file;?>"></a>
                            <?php }else{?>
                                <a href="" target="_blank"><img src="/assets/front/images/contactwithus.jpeg"></a>
                            <?php }?>
                        <?php }?>
                    </ul><span class="heading-ad-2">advertisements <strong>by students</strong></span>
                    </div>
                 </div>
                
            </div>
        </section>
        <section class="u-pageLoading"><img src="/assets/mobile/images/load.gif" alt="loading" /></section>
        <script src="/assets/mobile/js/init.mix.js" type="text/javascript" charset="utf-8"></script> 
        <script src="/assets/mobile/js/coffee.js" type="text/javascript" charset="utf-8"></script> 
        <script src="/assets/mobile/js/99_maind3eb.js" type="text/javascript" charset="utf-8" defer='defer'></script>
    </body>
</html>
