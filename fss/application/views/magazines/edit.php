<script src="/assets/front/js/jquery.min.js"></script> 
<script src="/assets/front/js/jquery.wallform.js"></script> 
<script src="/assets/js/jquery.sortable.js"></script>
<script>
    //$.post("test.php", $("#testform").serialize());
 $(document).ready(function() {
     $('.reorder-photos-list').sortable().bind('sortupdate', function() {
                //Triggered when the user stopped sorting and the DOM position has changed.
                $('.count_imgs').each(function(key,value){
                          var seq=key+1;
                          $(this).text(seq);
                          
                       });
        });
     $("#quxiao-btn").click(function(){
        $(".btn-default").trigger('click')
      });
      $("#baocun-btn").click(function(){
        $(".btn-default").trigger('click')
      });
      $("#confirm_btn").click(function(){
          var mainTitle = $('#mainTitle').val();
          if(mainTitle)
            $('#addtitle').html('Has been added');
          
        $(".btn-default").trigger('click')
      });
      
    $('#photoimg').die('click').live('change', function(){
            $("#imageform").ajaxForm({
                target: '#preview123', 
                beforeSubmit:function(){ 
                   console.log('ttest');
                   $("#imageloadstatus").show();
                    $("#imageloadbutton").hide();
                    }, 
                   success:function(){ 
                       $('.count_imgs').each(function(key,value){
                          var seq=key+1;
                          $(this).text(seq);
                          
                       });
                    $("#imageloadstatus").hide();
                    $("#imageloadbutton").show();
                   }, 
                   complete:function(){
                     $( ".reorder-photos-list" ).sortable( "destroy" );  
                     $( ".reorder-photos-list" ).sortable(  );  
                   },
                   error:function(){ 
                   console.log('xtest');
                    $("#imageloadstatus").hide();
                   $("#imageloadbutton").show();
                   } 
               }).submit();
    });
    
    $('#addWeixin_btn').die('click').live('change', function(){ 
            $("#shareform").ajaxForm({
                target: '#preview', 
                beforeSubmit:function(){
                        $('#preview').html('');
                    }, 
                   success:function(){
                       
                   }, 
                   error:function(){ 
                   //console.log('xtest');
                   // $("#imageloadstatus").hide();
                   //$("#imageloadbutton").show();
                   } 
               }).submit();
    });
    $('#uping-btn').die('click').live('change', function(){ 
            $("#audiofile").ajaxForm({
                target: '#audioshow', 
                beforeSubmit:function(){
                        $('#audioshow').html('');
                    }, 
                   success:function(){
                       
                   }, 
                   error:function(){ 
                   //console.log('xtest');
                   // $("#imageloadstatus").hide();
                   //$("#imageloadbutton").show();
                   } 
               }).submit();
    });
}); 
        
</script>

<?php 
$tbl_name = "musics";  //your table name
// How many adjacent pages should be shown on each side?
$adjacents = 2;

/*
  First get total number of rows in data table.
  If you have a WHERE clause in your query, make sure you mirror it here.
 */
$query = "SELECT COUNT(*) as num FROM $tbl_name";
$total_pages = mysql_fetch_array(mysql_query($query));
//print_r($total_pages);exit;
$total_pages = $total_pages['num'];

/* Setup vars for query. */
$targetpage = "/magazines/fnpage";  //your file name  (the name of this file)
$limit = 5;         //how many items to show per page
if (isset($_GET['page']) and $_GET['page'] != '') {
    $page = $_GET['page'];
} else {
    $page = 0;
}

if ($page)
    $start = ($page - 1) * $limit;    //first item to display on this page
else
    $start = 0;        //if no page var is given, set start to 0

    /* Get data. */
$sql = "SELECT * FROM $tbl_name LIMIT $start, $limit";
$result = mysql_query($sql);
while($row = mysql_fetch_assoc($result)){
    $musics_file[] = $row;
}
//print_r($musics_file);exit;

/* Setup page vars for display. */
if ($page == 0)
    $page = 1;     //if no page var is given, default to 1.
$prev = $page - 1;       //previous page is page - 1
$next = $page + 1;       //next page is page + 1
$lastpage = ceil($total_pages / $limit);  //lastpage is = total pages / items per page, rounded up.
$lpm1 = $lastpage - 1;      //last page minus 1

/*
  Now we apply our rules and draw the pagination object.
  We're actually saving the code to a variable in case we want to draw it more than once.
 */
$pagination = "";
if ($lastpage > 1) {
    //$pagination .= "<div class=\"pagination\">";
    //previous button
    if ($page > 1)
        $pagination.= "<li> <a onclick = 'return fnpaging(this);' href=\"$targetpage?page=$prev\"> previous</a> </li>";
    else
        $pagination.= "<li><a href = '#'> <span class=\"disabled\"> previous</span></a> </li>";

    //pages	
    if ($lastpage < 7 + ($adjacents * 2)) { //not enough pages to bother breaking it up
        for ($counter = 1; $counter <= $lastpage; $counter++) {
            if ($counter == $page)
                $pagination.= "<li> <a class='active'  href = '#'><span class=\"current\">$counter</span> </a></li>";
            else
                $pagination.= "<li> <a onclick = 'return fnpaging(this);' href=\"$targetpage?page=$counter\">$counter</a> </li>";
        }
    }
    elseif ($lastpage > 5 + ($adjacents * 2)) { //enough pages to hide some
        //close to beginning; only hide later pages
        if ($page < 1 + ($adjacents * 2)) {
            for ($counter = 1; $counter < 4 + ($adjacents * 2); $counter++) {
                if ($counter == $page)
                    $pagination.= "<li> <a class='active' href = '#'><span class=\"current\">$counter</span> </a></li>";
                else
                    $pagination.= "<li> <a onclick = 'return fnpaging(this);' href=\"$targetpage?page=$counter\">$counter</a> </li>";
            }
            $pagination.= " ... ";
            $pagination.= "<li> <a href=\"$targetpage?page=$lpm1\">$lpm1</a> </li>";
            $pagination.= "<li> <a href=\"$targetpage?page=$lastpage\">$lastpage</a> </li>";
        }
        //in middle; hide some front and some back
        elseif ($lastpage - ($adjacents * 2) > $page && $page > ($adjacents * 2)) {
            $pagination.= "<li> <a onclick = 'return fnpaging(this);' href=\"$targetpage?page=1\">1</a> </li>";
            $pagination.= "<li> <a onclick = 'return fnpaging(this);' href=\"$targetpage?page=2\">2</a> </li>";
            $pagination.= " ... ";
            for ($counter = $page - $adjacents; $counter <= $page + $adjacents; $counter++) {
                if ($counter == $page)
                    $pagination.= "<li><a class='active' href = '#'> <span class=\"current\">$counter</span></a> </li>";
                else
                    $pagination.= "<li> <a onclick = 'return fnpaging(this);' href=\"$targetpage?page=$counter\">$counter</a> </li>";
            }
            $pagination.= " ... ";
            $pagination.= " <li><a onclick = 'return fnpaging(this);' href=\"$targetpage?page=$lpm1\">$lpm1</a> </li>";
            $pagination.= "<li> <a onclick = 'return fnpaging(this);' href=\"$targetpage?page=$lastpage\">$lastpage</a> </li>";
        }
        //close to end; only hide early pages
        else {
            $pagination.= "<li> <a onclick = 'return fnpaging(this);' href=\"$targetpage?page=1\">1</a></li> ";
            $pagination.= "<li> <a onclick = 'return fnpaging(this);' href=\"$targetpage?page=2\">2</a> </li>";
            $pagination.= " ... ";
            for ($counter = $lastpage - (2 + ($adjacents * 2)); $counter <= $lastpage; $counter++) {
                if ($counter == $page)
                    $pagination.= "<li><a class='active' href = '#'> <span class=\"current\">$counter</span></a></li> ";
                else
                    $pagination.= "<li> <a onclick = 'return fnpaging(this);' href=\"$targetpage?page=$counter\">$counter</a> </li>";
            }
        }
    }

    //next button
    if ($page < $counter - 1)
        $pagination.= "<li> <a onclick = 'return fnpaging(this);' href=\"$targetpage?page=$next\">next </a> </li>";
    else
        $pagination.= " <li><a href = '#'><span class=\"disabled\">next </span> </a></li>";
   // $pagination.= "</div>\n";
}
?>


<div id="myModal" class="modal fade">
    <div class="modal-dialog mdl-cmn">
        <button data-dismiss="modal" class="btn btn-default" type="button">X</button>
        <div class="modal-content">
            <div class="login-head"><i class="fa fa-check-square"></i> Add music</div>
            <div class="in-popup">
                <h4>Recommended system</h4>
                <div class="bs-docs-example">
                    
                    <ul class="nav nav-tabs" id="myTab">
                        
                        <li class="active"><a onclick="return fncategory(this);" title="All" data-toggle="tab" href="#tb-1">All</a></li>
                        <li><a onclick="return fncategory(this);" title="Pleasant" data-toggle="tab" href="#tb-2">Pleasant</a></li>
                        <li><a onclick="return fncategory(this);" title="Soothing" data-toggle="tab" href="#tb-3">Soothing</a></li>
                        <li><a onclick="return fncategory(this);" title='Fun' data-toggle="tab" href="#tb-4">Fun</a></li>
                        <li><a onclick="return fncategory(this);" title='Sporty' data-toggle="tab" href="#tb-5">Sporty</a></li>
                        <li><a onclick="return fncategory(this);" title='Romantic' data-toggle="tab" href="#tb-6">Romantic</a></li>
                    </ul>
                    <div class="tab-content" id="myTabContent">
                        <div id="tb-1" class="tab-pane fade active in">
                            <?php //pr($musics);?>
                            <div id="soundcategory">
                                <ol class="song_list">
                                    <?php if(!empty($musics_file)){?>
                                    <?php foreach($musics_file as $music){
                                        ?>
                                    <li class="playing">
                                        <span class="check">
                                            <input type="radio" name="songs" <?php if(isset($magazines['articles']->music_id) and $magazines['articles']->music_id ==$music['id']){?> checked<?php }?> id="song_<?php echo $music['id']?>"  value="<?php echo $music['id']?>">
                                            <label for="song_<?php echo $music['id']?>"><span class="name"><?php echo $music['music_name']?></span></label>
                                        </span>
                                        <span class="type"><?php echo $music['music_type']?></span>
                                    </li>
                                    <?php }?>
                                    <?php }?>
                                </ol>
                                <div class="pagebox">
                                    <ul>
                                        <?= $pagination ?>
                                        <!---<li><a href="#"> previous</a></li>
                                        <li><a href="#">1</a></li>
                                        <li><a class="active" href="#">2</a></li>
                                        <li><a href="#">...</a></li>
                                        <li><a href="#">17</a></li>
                                        <li><a href="#">next </a></li> -->
                                    </ul>
                                </div>
                            </div>
                            <div class="song_btns">
                                <form id="audiofile" method="post" enctype="multipart/form-data" action='/magazines/audioupload' style="clear:both">
                                    <div class="l fl">
                                        <span class="songbtn_bg">Upload</span>
                                        <input type="file" name="sound" id="uping-btn" value="">
                                        <div id="audioshow">
                                            <?php if(isset($magazines['articles']->music_file) and $magazines['articles']->music_file != ''){?>
                                                <img src="/assets/front/images/music-icon.png"><input type="hidden" value="348" id="audiofiled" name="audiofiled">
                                            <?php }?>
                                        </div>
                                    </div>
                                </form>
                                
                                <div class="pls-bx">Please select &lt;5M music, otherwise the magazine can not be generated</div>
                                <div class="r fr">
                                    <input id="baocun-btn" type="button" value="Save" class="btn-4">
                                    <input type="button" id="quxiao-btn" value="Cancel" class="btn-5">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div id="myModal2" class="modal fade">
    <div class="modal-dialog mdl-cmn">
        <button data-dismiss="modal" class="btn btn-default" type="button">X</button>
        <div class="modal-content">
            <div class="login-head"><i class="fa fa-check-square"></i> Heading...</div>
            <div id="shareWeebox">
                <div> Share pictures: <span class="tixing"><span>(Moderator reminder: Please do not use the two-dimensional code, upload beauties can increase the amount of reading)</span></span><br>
                    <form id="shareform" method="post" enctype="multipart/form-data" action='/magazines/uploadshare' style="clear:both">
                        <div class="weixinInfor">
                            <div class="weixinStyle"><i class="fa fa-cloud-upload"></i>
                                <input type="file" id="addWeixin_btn" name="photos[]" value="" onchange="previewImage(this)">
                            </div>
                            <div id="preview">
                                <?php if(isset($magazines['articles']->share_img) and $magazines['articles']->share_img !=''){?>
                                <img src="/uploads/images/<?php echo $magazines['articles']->share_img;?>" width="156" height="168" id="fileshowpic">
                                <?php }else{?>
                                <img src="/assets/front/images/water-img1.jpg" width="156" height="168" id="fileshowpic">
                                <?php }?>
                            </div>
                            <div class="clear"></div>
                        </div>
                    </form>
                    <p class="pop-row"><span class="title">Share Title:</span> <span class="inp-popup">
                            <input type="text" value="<?php echo $magazines['articles']->share_title;?>" name="share_title" id="mainTitle" maxlength="45" class="form-control">
                            <strong class="zifu">(Please enter less than 45 characters)</strong> </span> </p>
                    <div class="clear"></div>
                    <span class="mainError onError"></span>
                    <p class="pop-row"><span class="title">Share subtitle:</span> <span class="inp-popup">
                            <input name="fenxianginfo" value="<?php echo $magazines['articles']->share_text;?>"  maxlength="50" id="fenxianginfo" class="form-control" type="text">
                            <strong class="zifu">(Please enter less than 50 characters)</strong> <span class="subError onError"></span> </span> </p>
                    <div class="clear"></div>
                    <input type="button" id="confirm_btn" value="Submit" class="btn-1">
                </div>
            </div>
        </div>
    </div>
</div>

<div id="myModal3" class="modal fade">
    <div class="modal-dialog mdl-cmn">
        <button data-dismiss="modal" class="btn btn-default" type="button">X</button>
        <div class="modal-content">
            <div class="login-head"><i class="fa fa-check-square"></i> Heading...</div>
            <div id="shareWeebox">
                <div id="connectpopupbox"> 
                    <input type="checkbox" id="checkboxG611" />
                </div>
            </div>
        </div>
    </div>
</div>
<div class="container main-cnt">
    <div class="form-title">
        <h3 class="cmn-heading"><span>Create a magazine</span> <a href="/magazines/mymaganize" class="rtn-btn">RETURNS TO MY MAGAZINE</a> </h3>
        <div class="row mgn-top">
            <div class="col-sm-6">
                <div class="create-left-in">
                    <div class="crt-row">
                        <p>Magazine title <span>(Enter up to 20 characters)</span></p>
                        <div class="input-group">
                            <input type="text" maxlength="20" name="magazinename"  id="magazinename" class="form-control" placeholder="Magazine names" value="<?php echo $magazines['articles']->title;?>">
                            <span id="error_magazinename" class="error-msg-sign meg-validation"></span>
                        </div>
                    </div>
                    <div class="crt-row">
                        <p>Phone</p>
                        <div class="input-group">
                            <input type="text" class="form-control" maxlength="10" id="magazinephone" name="magazinephone" placeholder="Phone" value="<?php echo $magazines['articles']->tel_no;?>">
                            <span id="error_magazinephone" class="error-msg-sign meg-validation"></span>
                        </div>
                    </div>
                    <div class="form-group gender-txt crt-row"><span class="gender-1">
                            <input type="checkbox" name="checkboxG4" <?php if(isset($magazines['articles']->is_watermark) and $magazines['articles']->is_watermark == '1'){?> checked <?php }?> id="checkboxG6" name="watermark" class="css-checkbox">
                            <label for="checkboxG6" class="css-label">Add a watermark:</label>
                        </span> 
                        <span id="error_common" class="error-msg-sign meg-validation"></span>
                    </div>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="create-right-in">
                    <div class="msc-box">
                        <form id="imageform" method="post" enctype="multipart/form-data" action='/magazines/uploadtemppic' style="clear:both">
                            <input type="file" name="photos[]" id="photoimg" multiple="true" value="upload img" class="inp-file">
                            <p class="msc-cion"><i class="fa fa-cloud-upload"></i></p>
                            <h4>Upload</h4>
                            <div class="msc-txt">
                                <p>Dimensions: 640 × 960</p>
                                <p>Format: JPG</p>
                                <p>Size: &le;2M</p>
                            </div>
                        </form>
                    </div>
                    <div class="msc-box"> <a href="#myModal" role="button" data-toggle="modal" class="main-bx">
                            <p class="msc-cion msc-cion-2"><i class="fa fa-music"></i></p>
                            <h4>Music</h4>
                            <div class="msc-txt">
                                <p>Only Supports MP3</p>
                                <p>Audio Files</p>
                                <p>Size: &le;5M</p>
                            </div>
                        </a> </div>
                    <div class="msc-box"> <a href="#myModal2" role="button" data-toggle="modal" class="main-bx">
                            <p class="msc-cion msc-cion-3"><i class="fa fa-reply"></i></p>
                            <h4>Share</h4>
                            <div class="msc-txt">
                                <p id="addtitle"><?php if(isset($magazines['articles']->share_title) and $magazines['articles']->share_title !=''){?> Has been added <?php }else{?>Not Added<?php }?></p>
                            </div>
                        </a> </div>
                </div>
            </div>
        </div>
        <div class="slt-cat">
            <div class="select-list">
                <ul class="selectedCat">
                    <?php if(!empty($cat_val)){ foreach($cat_val as $k=>$v){?>
                        <li id="removechecked_<?php echo $k;?>">
                            <?php echo $v;?>
                            <span>
                                <a href="javascript:;"><i class="fa fa-close" onclick="removecheckboxcheck('<?php echo $k;?>')"></i></a>
                            </span>
                        </li>
                    <?php } }?>
<!--                    <li>Physical
                        <span><a href="#"><i class="fa fa-close"></i></a></span>
                    </li>
                    <li>Scenery
                        <span><a href="#"><i class="fa fa-close"></i></a></span>
                    </li>
                    <li>Health
                        <span><a href="#"><i class="fa fa-close"></i></a></span>
                    </li>
                    <li>Travel
                        <span><a href="#"><i class="fa fa-close"></i></a></span>
                    </li>-->
                </ul>
            </div>
            <?php //pr($categories);?>
            <h5>Click Select Category:</h5>
            <ul class="nav nav-tabs tab-n1">
                <?php foreach($categories as $category){?>
                <li>
                    <input <?php if(isset($cat_val) and in_array($category->category_name,$cat_val)){?> checked="checked" <?php }?> onclick="apendcategory(this,'<?php echo $category->id?>');" value="<?php echo $category->category_name?>" type="checkbox" class="css-checkbox categoryChkBox" id="checkboxG261<?php echo $category->id?>" name="checkboxG4[]">
                    <label class="css-label" for="checkboxG261<?php echo $category->id?>"><?php echo $category->category_name?></label>
                </li>
                <?php }?>
            </ul>
            <p>Select up to three categories</p>
        </div>
        <div id='imageloadbutton'>
            <div class="btn-row"> 
                
                <a href="javascript:;" class="btn-2" onclick="return fnsubmitform(0);">Update</a> 
                <a href="javascript:;" class="btn-3" onclick="return fndraftform(1);">Draft</a> 
            </div>
        </div>
        <div class="create-btm-box">
            <p> <div id='imageloadstatus' style='display:none'><img src="/assets/front/images/loader.gif" alt="Uploading...."/></div></p>
            
            <div class="ct-btm-list"> 
                <div id="preview123" class="reorder-photos-list">
                    <?php if(!empty($magazines['images'])){?>
                    <?php $i=1; foreach($magazines['images'] as $images){?>
                        <div id="imageid_<?php echo $images->temp_img_id?>" class="ct-btm-box-1 countimagecls">
                            <div class="title-ct count_imgs" id="countid_<?php echo $images->temp_img_id?>"><?php echo $i;?></div>
                            <div class="thumb-ct">
                                <a href="#">
                                    <span id="thmbimg_<?php echo $images->temp_img_id?>">
                                        <?php if(isset($images->is_thumb) and $images->is_thumb =='1'){?>
                                            <img src="/assets/front/images/hand.png">
                                        <?php }else if(isset($images->message) and $images->message !=''){?>
                                            <img src="/assets/front/images/link.png">
                                        <?php }?>
                                    </span>
                                </a>
                            </div>
                            <div class="link-ct">
                                <a onclick="return fnshowimgpopup('<?php echo $images->temp_img_id?>')" href="#myModal3" role="button" data-toggle="modal">
                                    <i class="fa fa-link"></i>
                                </a> 
                                <a href="javascript:;">
                                    <i class="fa fa-trash" onclick="return fndeleteimg('<?php echo $images->temp_img_id?>')"></i>
                                </a>
                            </div>
                            <div class="ct-pic"><img alt="img" src="/uploads/images/<?php echo $images->image_name;?>"></div>
                            <input type="hidden" value="<?php echo $images->temp_img_id?>" name="tefdg[]" id="imageval_<?php echo $images->temp_img_id?>">
                        </div>
                        
                    <?php $i++;}?>
                    <?php }?>
                </div>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
    function fndraftform(is_draft){
            var flag = 1;
            var img = '';
            var songflg = 0;
            
            var magazinename = $('#magazinename').val();
            var magazinephone = $('#magazinephone').val();
            var watermaek;
            if(document.getElementById('checkboxG6').checked == true){
                watermaek = 1;
            }else{
                watermaek = 0;
            }
            var cat = document.getElementsByName('checkboxG4[]');
            var catval = '';
            for(var i=0;cat.length>i;i++){
                if(cat[i].checked == true){
                    catval += cat[i].value+',';
                }
            }
            var imageval = document.getElementsByName('tefdg[]');
            for(var i=0; imageval.length>i;i++){
              img += imageval[i].value+',';
            }
            var songs = document.getElementsByName('songs');
            for(var i=0; songs.length>i;i++){
                if(songs[i].checked == true){
                    var songval = songs[i].value;
                    songflg = 1;
                }
            }
            var audiofiled = $('#audiofiled').val();
            var shareimg = $('#sharetxt').val();
            var sharetitle = $('#mainTitle').val();
            var sharesubtitle = $('#fenxianginfo').val();
            var connectionadd = $('#mainTitle2').val();
            var connectioncheck = '';
            //ert(shareimg == );
            
            /*if(document.getElementById('checkboxG611').checked == true){
                connectioncheck = 1;
            }else{
                connectioncheck = 0;
            }*/
            if($('#checkboxG611').checked == true){
                connectioncheck = 1;
            }else{
                connectioncheck = 0;
            }
            var imagecnt = $('.count_imgs').length;
            
            $("#imageloadbutton").hide();
            $("#imageloadstatus").show();
                $.ajax({
                    type: "POST",
                    url: '/magazines/updatamagazine/<?php echo $magazines['articles']->id?>',
                    data: {is_draft:is_draft,magazinename:magazinename,magazinephone:magazinephone,watermaek:watermaek,img:img,catval:catval,
                        songval:songval,audiofiled:audiofiled,shareimg:shareimg,sharetitle:sharetitle,sharesubtitle:sharesubtitle
                        }
                })
                .done(function( msg ) {
                    if(msg =='1'){
                        window.location.href='/magazines/mymaganize';
                    }else if(msg =='2'){
                        window.location.href='/magazines/mydraft';
                    }else{
                        $('#error_common').html(msg);
                        $("#imageloadbutton").show();
                        $("#imageloadstatus").hide();
                    }
                    //alert( "Data Saved: " + msg );
                    //$('#soundcategory').html(msg);
                });
                return false;
        }
    function fnsubmitconnect(id){
        var id = $('#thmb_img_id').val();
        var flag = 0;
        if(document.getElementById('checkboxG611').checked == true){
             $('#thmbimg_'+id).html('<img src="/assets/front/images/hand.png"/>');
              flag = 1;
        }else if(document.getElementById('mainTitle2').value !=''){
            $('#thmbimg_'+id).html('<img src="/assets/front/images/link.png"/>');
            var maintitle = document.getElementById('mainTitle2').value;
        }else{
            $('#thmbimg_'+id).html('');
            flag = 0;
        }
        
        $.ajax({
                type: "POST",
                url: '/magazines/savethmb_text',
                data: { message: maintitle,is_thumb:flag,id:id}
            })
            .done(function( msg ) {
                //alert( "Data Saved: " + msg );
                //$('#soundcategory').html(msg);
                
                $(".btn-default").trigger('click');
            });
        
    }
    function enable_detxt(){
        if(document.getElementById('checkboxG611').checked == true){
            //alert('sfsfsfg');
            document.getElementById("mainTitle2").value = '';
            document.getElementById("mainTitle2").disabled = true;
        }else{
            document.getElementById("mainTitle2").disabled = false;
        }
    }
	$(document).ready(function(){
		$("#myModal").modal('hide');
		
		$("#myModal2").modal('hide');
		
		$("#myModal2").modal('hide');
	});
	function fnpaging(obj){
            $.ajax({
                type: "POST",
                url: obj.href,
                data: { name: "",music_id:"<?php echo $magazines['articles']->music_id?>"}
            })
            .done(function( msg ) {
                //alert( "Data Saved: " + msg );
                $('#soundcategory').html(msg);
            });
            return false;
        }
        
        
        function fncategory(obj){
            $.ajax({
                type: "POST",
                url: '/magazines/morecat',
                data: { cat: obj.title,music_id:"<?php echo $magazines['articles']->music_id?>" }
            })
            .done(function( msg ) {
                //alert( "Data Saved: " + msg );
                $('#soundcategory').html(msg);
            });
            //alert(obj.title);
            return false;
        }
        
        function fndeleteimg(id){
            //alert(id);
            $( "#imageid_"+id ).remove();
            $( "#imageval_"+id ).remove();
            $('.count_imgs').each(function(key,value){
                var seq=key+1;
                $(this).text(seq);

             });
             $.ajax({
                type: "POST",
                url: '/magazines/removeimg',
                data: { id: id }
            })
            .done(function( msg ) {
                $('#connectpopupbox').html(msg);
                //document.getElementById('thmb_img_id').value = id;
            });
        }
        
        function fnshowimgpopup(id){
            $.ajax({
                type: "POST",
                url: '/magazines/connectpopup',
                data: { id: id }
            })
            .done(function( msg ) {
                $('#connectpopupbox').html(msg);
                //document.getElementById('thmb_img_id').value = id;
            });
            //alert(obj.title);
            return false;
        }
        
        function fnsubmitform(is_draft){
            //alert(is_draft);return false;
            var flag = 1;
            var img = '';
            var songflg = 0;
            
            var magazinename = $('#magazinename').val();
            var magazinephone = $('#magazinephone').val();
            var watermaek;
            if(document.getElementById('checkboxG6').checked == true){
                watermaek = 1;
            }else{
                watermaek = 0;
            }
            var cat = document.getElementsByName('checkboxG4[]');
            var catval = '';
            for(var i=0;cat.length>i;i++){
                if(cat[i].checked == true){
                    catval += cat[i].value+',';
                }
            }
            var imageval = document.getElementsByName('tefdg[]');
            for(var i=0; imageval.length>i;i++){
              img += imageval[i].value+',';
            }
            var songs = document.getElementsByName('songs');
            for(var i=0; songs.length>i;i++){
                if(songs[i].checked == true){
                    var songval = songs[i].value;
                    songflg = 1;
                }
            }
            var audiofiled = $('#audiofiled').val();
            var shareimg = $('#sharetxt').val();
            var sharetitle = $('#mainTitle').val();
            var sharesubtitle = $('#fenxianginfo').val();
            var connectionadd = $('#mainTitle2').val();
            var connectioncheck = '';
            /*if(document.getElementById('checkboxG611').checked == true){
                connectioncheck = 1;
            }else{
                connectioncheck = 0;
            }*/
            if($('#checkboxG611').checked == true){
                connectioncheck = 1;
            }else{
                connectioncheck = 0;
            }
            
            
                
            
            
            
            var imagecnt = $('.count_imgs').length;
            if(magazinename==''){
                flag = 0;
                $('#error_magazinename').html('Please enter magazine name');
                alert('Please enter magazine name');
                $('#error_magazinename').focus();
                return false;
            }else{
                $('#error_magazinename').html('');
                //flag = 0;
            }
            if(magazinephone ==''){
                flag = 0;
                $('#error_magazinephone').html('Please enter phone no');
                alert('Please enter phone no');
                $('#error_magazinephone').focus();
            }else if(isNaN(document.getElementById('magazinephone').value)){
                $('#error_magazinephone').html('Please enter valid phone no.');
                alert('Please enter valid phone no.');
                $('#error_magazinephone').focus();
                flag = 0;
            }else{
                $('#error_magazinephone').html('');
                //flag = 0;
            }
            if(catval ==''){
                flag = 0;
                $('#error_common').html('Please select up to three category');
                alert('Please select up to three category');
                $('#error_common').focus();
                return false;
            }else if(imagecnt<5){
                flag = 0;
                $('#error_common').html('Content of less than 5 can not publish pictures');
                alert('Content of less than 5 can not publish pictures');
                $('#error_common').focus();
                return false;
            }else{
                //flag = 0;
                $('#error_common').html('');
            }
            
            //alert(flag);
            if(flag==0){
                return false;
            }
            $("#imageloadbutton").hide();
            $("#imageloadstatus").show();
                $.ajax({
                    type: "POST",
                    url: '/magazines/updatamagazine/<?php echo $magazines['articles']->id?>',
                    data: {is_draft:is_draft,magazinename:magazinename,magazinephone:magazinephone,watermaek:watermaek,img:img,catval:catval,
                        songval:songval,audiofiled:audiofiled,shareimg:shareimg,sharetitle:sharetitle,sharesubtitle:sharesubtitle
                        }
                })
                .done(function( msg ) {
                    if(msg =='1'){
                        window.location.href='/magazines/mymaganize';
                    }else if(msg =='2'){
                        window.location.href='/magazines/mydraft';
                    }else{
                        $('#error_common').html(msg);
                        $("#imageloadbutton").show();
                        $("#imageloadstatus").hide();
                    }
                    //alert( "Data Saved: " + msg );
                    //$('#soundcategory').html(msg);
                });
                return false;
        }
        
        function apendcategory(obj,ids){
            
            if(obj.checked ==false){
                $("#"+obj.id).attr('checked',"checked");
                return false;
            }
            if($('[name="checkboxG4[]"]:checked').length > 3){
                $("#"+obj.id).removeAttr('checked');
                return false;
            }
            if(obj.checked ==true){
                $("#"+obj.id).attr('checked',"checked");
                //return false;
            }
            var currVal=$("#"+obj.id).val();
            
            var htmlContent='<li id = "removechecked_'+ids+'">'+currVal+'<span><a href="javascript:;"><i onclick = "removecheckboxcheck('+ids+')" class="fa fa-close"></i></a></span></li>';
            $(".selectedCat").append(htmlContent);
        }
        
        function removecheckboxcheck(id){
            $( "#removechecked_"+id ).remove();
            //document.getElementById('checkboxG261'+id).checked = false;
            $("#checkboxG261"+id).attr("checked", false);
        }
</script>