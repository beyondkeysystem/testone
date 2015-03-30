<?php //echo $count;exit;?>
<div id="category_magazines" class="tab-pane fade in active">
    <div class="in-prdt">
        <?php if(!empty($results)){?>
          <?php foreach($results as $result){?>
        <div class="col-sm-4 prd-box">
          <div class="min-prdbox">
            <div class="col-sm-7 prd-img">
                <div class="img-cap"> <span class="txt-cap"><a href="#"><?php echo $result['articles']->title;?></a></span> <img width="232" height="322" src="/uploads/images/<?php echo $result['images'][0]->image_name;?>" alt="img"/></div>
            </div>
            <div class="col-sm-5">
                <p class="thumb"><img src="/qr/<?php echo $result['articles']->qr_code_img;?>" alt="thumb"></p>
              <p class="athr-txt">Author: <span><br>
                <?php 
                  $str = $result['articles']->title;
                  if(strlen($str)>15){
                      echo substr($str,0,15).'...';
                  }else{
                      echo $str;
                  }
                ?></span> </p>
              <p class="athr-txt">Created: <span><?php echo date('d-m-Y',strtotime($result['articles']->created));?></span> </p>
              <p class="athr-txt">Pages: <span><?php echo count($result['images']);?></span> </p>
              <p class="athr-txt">Read: <span>12</span> </p>
              <p class="athr-txt">Favorites: <span>3</span> </p>
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
        <div class="more-box" id="addmore1"><a href="javascript:;" onclick="fnaddmoremag2('<?php echo $count;?>','<?php echo $category_id;?>');" class="more-btn">Load More</a></div>
    <?php }?>
</div>
<input type="hidden" id="total_count" value="<?php echo $count;?>" />
<input type="hidden" id="category_id" value="<?php echo $category_id;?>" />


<script>
    var page2 = 1;
        function fnaddmoremag2(actual_count,cat_id){
        var cat_id = $('#category_id').val();
        var actual_count  = $('#total_count').val();
        $('#more').hide();
        $('#no-more').hide();

        

        var data = {
            page_num: page2,
            actual_count:actual_count,
            cat_id:cat_id
        };

        //var actual_count = "<?php //echo $count; ?>";

        if((page2-1)* 9 > actual_count){
            $('#no-more').css("top","400");
            $('#addmore1').hide();
            //alert(page2);
            
        }else{
            $.ajax({
                type: "POST",
                url: "/magazines/addmoremag2",
                data:data,
                success: function(res) {
                    $("#addmoremagazine").append(res);
                    console.log(res);
                }
            });
        }
        page2++;
    }
</script>