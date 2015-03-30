<?php foreach ($results as $result) { ?>
    <div class="col-sm-4 prd-box">
        <div class="min-prdbox">
            <div class="col-sm-7 prd-img">
                <div class="img-cap"> <span class="txt-cap"><a href="#"><?php echo $result['articles']->title; ?></a></span> <img width="232" height="322" src="/uploads/images/<?php echo $result['images'][0]->image_name; ?>" alt="img"/></div>
            </div>
            <div class="col-sm-5">
                <p class="thumb"><img src="/qr/<?php echo $result['articles']->qr_code_img; ?>" alt="thumb"></p>
                <p class="athr-txt">Author: <span><br>
                        <?php
                        $str = $result['articles']->title;
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