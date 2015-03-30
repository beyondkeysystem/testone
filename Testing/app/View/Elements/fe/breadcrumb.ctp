<div class="header-bottom">
    <div class="container">
        <ul class="pagination-top clearfix">
            <li><a class="current" href="/"> <?php echo __('Home'); ?> </a></li>
            <li> > </li>
            <?php if($this->params['controller'] != "home"){ ?>
            <li>
            	<a href="/<?=$this->params['controller']?>"> <?=Inflector::classify($this->params['controller'])?> </a>
            </li>
            <li> > </li>
            <?php }?>
            <li>
                <?php if($this->params['action'] == 'shipping_faq'){?>
                    <a href="javascript:void(0)">General FAQ</a>
                <?php }else{?>
                    <a href="javascript:void(0)"> <?=Inflector::classify($this->params['action'])?> </a>
                <?php }?>
            	
            </li>
        </ul>			
    </div>
</div>