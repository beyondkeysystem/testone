<?php foreach ($results as $result) { //pr($result);?>
    <div class="col-sm-4 prd-box">
        <div class="min-prdbox">
            <div class="col-sm-7 prd-img">
                <a href="/magazines/detail/<?php echo $result['articles']->id?>"><div class="img-cap"> <span class="txt-cap"><?php echo $result['articles']->title; ?></span> <img width="232" height="322" src="/uploads/images/<?php echo $result['images'][0]->image_name; ?>" alt="img"/></div></a>
            </div>
            <div class="col-sm-5">
                <p class="thumb"><img src="/qr/<?php echo $result['articles']->qr_code_img; ?>" alt="thumb"></p>
                <p class="athr-txt">Author: <span><br>
                        <?php
                        $str = $result['users']->firstname.' '.$result['users']->lastname;
                        if (strlen($str) > 15) {
                            echo substr($str, 0, 15) . '...';
                        } else {
                            echo $str;
                        }
                        ?></span> </p>
                <p class="athr-txt">Created: <span><?php echo date('d-m-Y', strtotime($result['articles']->created)); ?></span> </p>
                <p class="athr-txt">Pages: <span><?php echo count($result['images']); ?></span> </p>
                <p class="athr-txt">Read: <span>12</span> </p>
                <p class="athr-txt">Favorites: <span>3</span> </p>
            </div>
        </div>
    </div>
<?php
}?>

<script>
    var page1 = 1;
        function fnaddmoremag2(){
        //var actual_count = $('#category_id').val();
        //var cat_id = $('#total_count').val();
        $('#more').hide();
        $('#no-more').hide();

        page1++;

        var data = {
            page_num: page1,
            /*actual_count:actual_count,
            cat_id:cat_id*/
        };

        //var actual_count = "<?php //echo $count; ?>";

        if((page1-1)* 9 > actual_count){
            $('#no-more').css("top","400");
            $('#addmore1').hide();
            //alert('sdfsg');
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
    }
</script>