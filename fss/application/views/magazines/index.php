<?php $cat = $this->input->get('name');?>
<div class="container main-cnt">
      <div class="tab-bx">
        <div id="horizontalTab">
          <div class="search-box">
            <div class="src-in">
                <button><i class="fa fa-search"></i></button>
                <input name="search" type="text" value="<?php echo $this->input->get('search')?>" onchange="return fnsubmit();" id="searchdata" placeholder="Hello . How can we Help?" />
          </div>
          </div>
          <ul class="resp-tabs-list-new">
            <li><a class="magazinetabcls active" href="/magazines/" >Latest magazine</a></li>
            <li><a class="magazinetabcls" href="/magazines/editorchoices" >Editor's Choices</a></li>
            <li><a class="magazinetabcls" href="/magazines/popularmagazine" >Popular magazine</a></li>
          </ul>
          <div class="resp-tabs-container">
            <div>
              <div class="product-box">
                <div class="bs-docs-example">
                  <div class="close-btn"><a href="javascript:;" onclick="fnhide_category();">X</a></div>
                  <ul class="nav nav-tabs tab-n1" id="myTab">
                    <?php //pr($categories);?>
                    <?php if(!empty($categories)){?>
                        <li <?php if($cat =='all' or $cat ==''){?> class="active" <?php }?>><a data-toggle="tab" onclick="fncategory_magazines('all');" href="#link1">All</a></li>
                        <?php foreach($categories as $category){?>
                        <li <?php if(isset($cat) and $cat ==$category->category_name){?> class="active" <?php }?>><a data-toggle="tab" onclick="fncategory_magazines('<?php echo urlencode($category->category_name)?>');" href="#link<?php echo $category->id?>"><?php echo $category->category_name;?></a></li>
                        <?php }?>
                    <?php }?>
                </ul>
                  <div class="tab-content" id="myTabContent">
                    <div id="link1" class="tab-pane fade in active">
                      <div class="in-prdt">
                        <?php if(!empty($results)){?>
                        <?php foreach($results as $result){?>
                        <div class="col-sm-4 prd-box">
                            <div class="min-prdbox">
                              <a href="/magazines/detail/<?php echo $result['articles']->id;?>">
                                <div class="col-sm-7 prd-img">
                                    <div class="img-cap"> <span class="txt-cap"><?php echo $result['articles']->title;?></span>
                                        <img width="232" height="322" src="/uploads/images/<?php echo $result['images'][0]->image_name;?>" alt="img"/>
                                    </div>
                                </div>
                             </a>
                              <div class="col-sm-5">
                                  <p class="thumb"><img src="/qr/<?php echo $result['articles']->qr_code_img;?>" alt="thumb"></p>
                                <p class="athr-txt">Author: <span><br>
                                  <?php 
                                    $str = $result['users']->username;
                                    if(strlen($str)>15){
                                        echo substr($str,0,15).'...';
                                    }else{
                                        echo $str;
                                    }
                                  ?></span> </p>
                                <p class="athr-txt">Created: <span><?php echo date('d-m-Y',strtotime($result['articles']->created));?></span> </p>
                                <p class="athr-txt">Pages: <span><?php echo count($result['images']);?></span> </p>
                                <p class="athr-txt">Read: <span><?php echo $result['articles']->read_count;?></span> </p>
                                <p class="athr-txt">Favorites: <span><?php echo $result['articles']->favorites_count?></span> </p>
                              </div>
                            </div>
                          </div>
                          <?php }?>
                        <?php if($count>9){?>
                        <div id="addmoremagazine">
                            
                        </div>
                        <?php }?>
                      <?php }else{?>
                        <div>No record found</div>
                      <?php }?>
                        <div class="clearfix"></div>
                      </div>
                        <div class="pagebox">
                            <?php echo $this->pagination->create_links(); ?>
<!--                            <ul>
                                <li><a href="#"> <i class="fa fa-angle-double-left"></i> previous</a></li>
                                <li><a href="#">1</a></li>
                                <li><a href="#" class="active">2</a></li>
                                <li><a href="#">...</a></li>
                                <li><a href="#">17</a></li>
                                <li><a href="#">next <i class="fa fa-angle-double-right"></i></a></li>
                            </ul>-->
                       </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="clearfix"></div>
        
      </div>
    </div>
<script>
    function fnhide_category(){
        $('#myTab').hide();
        $('#hideparent').hide();
        
    }
    
    function fncategory_magazines(id){
        //alert(id);
        window.location.href = '/magazines/index?name='+id;
        /*$.ajax({
            type: "POST",
            url: "<?php echo base_url()?>magazines/magazineviacat",
            data: { id: id}
        })
          .done(function( msg ) {
              $('#myTabContent').html(msg);
              var category_id = $('#category_id').val();
              var total_count = $('#total_count').val();
              //alert(val);
        });*/
    }
    
    function fnsubmit(){
        //category_magazines
        
        var searchdata = $('#searchdata').val();
        
        if(searchdata ==''){
            //return false;
        }
        window.location.href = '/magazines/index?search='+searchdata;
        return false;
    }
</script>