<div class="brdcrmb">
	<div class="wrapper">
		<?php $url_title=$this->uri->segment(1);
		 $url_title = str_replace('_', ' ', $url_title); ?>
    	<h2><?php echo $url_title; ?></h2>
        <p><a href="<?php echo base_url(); ?>home"><?php echo ($this->lang->line('home_title')); ?></a> <span class="fwdarrow"><i class="fa fa-angle-double-right"></i></span>
		<?php
			$cnt=count($this->uri->segment_array());
			$i=1;
			foreach($this->uri->segment_array() as $val){
				$uri = $this->uri->segment($i);
				$uri=str_replace('_', ' ', $uri);
				$uri=ucfirst($uri);
				echo $uri;
				if($i<$cnt){
					echo '<span class="fwdarrow"><i class="fa fa-angle-double-right"></i></span>';
				}
				$i++;
			}
		?>			
		</p>
    </div>
</div>