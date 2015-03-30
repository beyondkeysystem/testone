<div class="brdcrmb">
	<div class="wrapper">
		<?php $url_title=$this->uri->segment(1);
		 $url_title1 = $url_title;
		 $url_title = str_replace('_', ' ', $url_title); ?>
    	 <?php 
    	 	// echo $url_title1
    	 ?>
    	<h2><?php  if($url_title=='index'){ echo 'Ticket'; }else{ echo $this->lang->line($url_title1);} ?></h2>
	<p>
	
        <a href="<?php echo base_url(); ?>home"><?php if($this->lang->line('home_title')){ echo ($this->lang->line('home_title'));}else { echo 'Home'; } ?></a> <span class="fwdarrow"><i class="fa fa-angle-double-right"></i></span> 
		<?php
			$cnt=count($this->uri->segment_array());
			$i=1;
			foreach($this->uri->segment_array() as $val){
				$uri = $this->uri->segment($i);
				$uri_next = $this->uri->segment($i+1);
				
				$urie=explode('_', $uri);
			
				$uri1=ucfirst($urie[0]);
				$uri2=ucfirst($urie[1]);
				
				if($uri2!=''){
					// echo $uri;
					echo '<span id="bc">'.$this->lang->line($uri).'</span>';
				
					// echo $uri1;
					// echo ' ';
					// echo $uri2;
					
					if($uri!='my_profile' && $uri_next != ''){
					// echo '<span class="fwdarrow"><i class="fa fa-angle-double-right"></i></span>';
					
					}
				}
				elseif($uri2==''){
					
					if($uri!='home'){
						$uri1 = str_replace(" ","_", strtolower($uri1));
						echo '<span id="bc">'.$this->lang->line($uri1).'</span>';
						if($uri_next!=''){
							echo '<span class="fwdarrow"><i class="fa fa-angle-double-right"></i></span>';
						}
					
			        }
					
				}
				
				if($uri=='my_profile'){
					break;
				}
				if($uri=='contact'){
					break;
				}
				if($uri=='openticket'){
					break;
				}
				if($uri=='dashboard'){
					break;
				}
				
				
				$i++;
			}
		?>			
		</p>
    </div>
</div>
