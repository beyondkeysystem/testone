<div class="all-store-heading clearfix">
    <div class="all-store-heading-left"><?php echo __('All Store');?></div>
    <div class="all-store-heading-right"><?php echo count($products)?> <?php echo __('Results');?></div>
</div>
<?php $rev = $this->request->query('rev');?>
<div class="category clearfix">
    <h2><?php echo __('Relevance');?>:</h2>
    <ul class="category-link">
        <li><a class="<?php if($rev==''){?> current <?php }?>" onclick="fnsorting('rev','')"  href="javascript:void(0)"><?php echo __('All');?></a></li>
        <li><a class="<?php if($rev=='harimau1'){?> current <?php }?>" onclick="fnsorting('rev','harimau1')" href="javascript:void(0)"><?php echo __('Harimau1');?></a></li>
        <?php /*<li><a class="<?php if($rev=='Note'){?> current <?php }?>" onclick="fnsorting('rev','Note')"href="javascript:void(0)">Note</a></li>
        <li><a class="<?php if($rev=='HaRiM2'){?> current <?php }?>" onclick="fnsorting('rev','HaRiM2')" href="javascript:void(0)">HaRiM2</a></li> */?>
    </ul>
</div>

<?php
    $category_id = $this->request->query('category');
    $sort_id = $this->request->query('sort');
?>
<div class="category no-bg clearfix">
    <h2><?php echo __('Category'); ?>:</h2>
    <ul class="category-link">
        <li><a class="<?php if($category_id==''){?> current <?php }?>" onclick="fnsorting('category','')" href="javascript:void(0)"><?php echo __('All'); ?></a></li>		
        <?php
        foreach ($categories as $key => $category) { ?>
            <li><a class="<?php if($category_id==$category['Category']['id']){?> current <?php }?>" onclick="fnsorting('category','<?php echo $category['Category']['id']?>')" href="javascript:void(0)"><?= $category['Category']['name']; ?></a></li>
       <?php } ?>
    </ul>
</div>

<div class="category clearfix">
    <h2>Sort by:</h2>
    <ul class="category-link">
<!--        <li><a class="current" onclick="fnsorting('sort','1')" href="javascript:void(0)">All</a></li>-->
        <li><a class="<?php if($sort_id=='2' or $sort_id==''){?> current <?php }?>" onclick="fnsorting('sort','2')" href="javascript:void(0)"><?php echo __('Default') ;?></a></li>
        <li><a class="<?php if($sort_id=='3'){?> current <?php }?>" onclick="fnsorting('sort','3')" href="javascript:void(0)"><?php echo __('Release date') ;?></a></li>
        <li><a class="<?php if($sort_id=='4'){?> current <?php }?>" onclick="fnsorting('sort','4')" href="javascript:void(0)">  <i class="fa fa-caret-up"></i> <?php echo __('Price: low to high');?>  </a></li>
        <li><a class="<?php if($sort_id=='5'){?> current <?php }?>" onclick="fnsorting('sort','5')" href="javascript:void(0)"> <i class="fa fa-caret-down"></i> <?php echo __('Price: high to low'); ?> </a></li>
    </ul>
    <?php $in_stock = $this->request->query('stock')?>
    <label class="in-stock"><input <?php if(isset($in_stock) and $in_stock =='3'){?> checked <?php }?> id="in_stock" onclick="fnsorting('stock','3')" type="checkbox"> In stock</label>
</div>
<?php //pr($this->params);?>
<script>
    function fnsorting(val,f){
        var str = '';
        if(val == 'category'){
            str += val+'='+f+'&';
        }else if('<?php echo $this->request->query('category')?>' !=''){
            str += 'category=<?php echo $this->request->query('category')?>&';
        }
        if(val == 'sort'){
            str += val+'='+f+'&';
        }else if('<?php echo $this->request->query('sort')?>' !=''){
            str += 'sort=<?php echo $this->request->query('sort')?>&';
        }
        if(val == 'rev'){
            str += val+'='+f+'&';
        }else if('<?php echo $this->request->query('rev')?>' !=''){
            str += 'rev=<?php echo $this->request->query('rev')?>&';
        } 
        
         if(document.getElementById('in_stock').checked == true){
            if(val == 'stock'){
                str += val+'='+f;
            }else if('<?php echo $this->request->query('stock')?>' !=''){
                str += 'stock=<?php echo $this->request->query('stock')?>';
            } 
        }else{
            str += 'stock=';
        }
        window.location.href = '/<?php echo $this->params->url?>?'+str;
    }
</script>