<div class="container main-cnt">
    <?php $this->load->view('elements/slider');?>
    <div class="tab-bx">
      <div id="horizontalTab">
        <div class="search-box">
          <div class="src-in">
                <button><i class="fa fa-search"></i></button>
                <input name="search" type="text" onchange="return fnsubmit();" id="searchdata" placeholder="Hello . How can we Help?" />
          </div>
        </div>
        <ul class="resp-tabs-list-new">
            <li><a class="magazinetabcls" href="/magazines/" >Latest magazine</a></li>
            <li><a class="magazinetabcls" href="/magazines/editorchoices" >Editor's Choices</a></li>
            <li><a class="magazinetabcls" href="/magazines/popularmagazine" >Popular magazine</a></li>
        </ul>
        <div class="resp-tabs-container">
          <div>
            <div class="product-box">
              <div class="bs-docs-example">
<!--                <div id="hideparent" class="close-btn"><a href="javascript:;" onclick="fnhide_category();">X</a></div>
                <ul class="nav nav-tabs tab-n1" id="myTab">
                    <?php //pr($categories);?>
                    <?php if(!empty($categories)){?>
                        <li class="active"><a data-toggle="tab" onclick="fncategory_magazines('all');" href="#link1">All</a></li>
                        <?php foreach($categories as $category){?>
                        <li><a data-toggle="tab" onclick="fncategory_magazines('<?php echo $category->id?>');" href="#link<?php echo $category->id?>"><?php echo $category->category_name;?></a></li>
                        <?php }?>
                    <?php }?>
                </ul>-->
                <div class="tab-content" id="myTabContent">
                  <div id="category_magazines" class="tab-pane fade in active">
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
                                $str = $result['users']->firstname.' '.$result['users']->lastname;
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
                      <?php if($count>9){?>
                      <div class="more-box" id="addmore1"><a href="javascript:;" onclick="fnaddmoremag();" class="more-btn">Load More</a></div>
                      <?php }?>
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
    
    function fncategory_magazines(id){
        
        $.ajax({
            type: "POST",
            url: "<?php echo base_url()?>magazines/magazineviacat",
            data: { id: id}
        })
          .done(function( msg ) {
              $('#myTabContent').html(msg);
              var category_id = $('#category_id').val();
              var total_count = $('#total_count').val();
              //alert(val);
        });
    }
    
    function fnhide_category(){
        $('#myTab').hide();
        $('#hideparent').hide();
        
    }
    function othertab(flag){
        if(flag=='Editor'){
            
        }else if(flag=='Popular'){
        
        }
    }
    function fnsubmit(){
        //category_magazines
        
        var searchdata = $('#searchdata').val();
        
        if(searchdata ==''){
            return false;
        }
        window.location.href = '/magazines/index?search='+searchdata;
        return false;
    }
    var page = 1;
    function fnaddmoremag(){
        $('#more').hide();
        $('#no-more').hide();

        page++;

        var data = {
            page_num: page
        };

        var actual_count = "<?php echo $count; ?>";

        if((page-1)* 9 > actual_count){
            $('#no-more').css("top","400");
            $('#addmore1').hide();
            //alert('sdfsg');
        }else{
            $.ajax({
                type: "POST",
                url: "/welcome/addmoremag",
                data:data,
                success: function(res) {
                    $("#addmoremagazine").append(res);
                    console.log(res);
                }
            });
        }
    }
    

</script>