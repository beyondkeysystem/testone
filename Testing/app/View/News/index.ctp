<div class="section">
    <div class="container">
        <div class="heading clearfix">
            <?php echo __('News'); ?>
        </div>

        <ul class="news-row clearfix">
            <?php foreach($news as $val){ $desc = substr($val['New']['desc'], 0, 301)."...";?>
            <li>
                <?php if(!empty($val['New']['listing_image'])){ ?>
                    <div class="news-row-left"><img src="/uploads/thumbs/news/<?=$val['New']['listing_image']?>" alt=""> </div>
                <?php }else{ ?>
                <div class="news-row-left"><img src="/uploads/thumbs/news/NoImage.png" alt=""> </div>
                <?php }?>
                <div class="news-row-right">
                    <h2><?=$val['New']['title']?></h2>
                    <div class="news-txt"> <?=date('F d, Y',strtotime($val['New']['created']))?> - <span class="new-media"> <?=$val['New']['subtitle']?> </span> </div>
                    <p><?=$desc?></p>
                    <a href="/news/details/<?=base64_encode($val['New']['id'])?>" class="read-more"><?php echo __('Read more'); ?></a>
                </div>
            </li>
            <?php }?>
        </ul>

        <?php
            echo $this->element('fe/paging');
        ?>
        <!--<div class="page-nxt clearfix">
            <ul class="page-main">
                <li> <a href="javascript:void(0)">  <i class="fa fa-angle-left"></i> </a> </li>
                <li> <a href="javascript:void(0)">  1 </a> </li>
                <li> <a href="javascript:void(0)">  2 </a> </li>
                <li> <a href="javascript:void(0)">  3 </a> </li>
                <li> <a class="current" href="javascript:void(0)">  4 </a> </li>
                <li> <a href="javascript:void(0)">  5 </a> </li>
                <li> ... </li>
                <li> <a href="javascript:void(0)">  10 </a> </li>
                <li> <a href="javascript:void(0)">  <i class="fa fa-angle-right"></i> </a> </li>
            </ul>
        </div>-->
    </div>
</div> 