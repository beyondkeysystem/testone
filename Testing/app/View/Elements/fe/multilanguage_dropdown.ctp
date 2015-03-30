<div class="country-select">
				
				<?php
				/*Language Section Drop Down*/
				$eng = '';
				$may = '';
				$chi = '';
				if($this->params->language == 'eng'){
					$eng = "selected";
				}else if($this->params->language == 'may'){
					$may = "selected";
				}else if($this->params->language == 'chi'){
					$chi = "selected";
				}else{
					$eng = "selected";
				}

				?>
				<select name="language_selector" id="language_selector" class="selectpicker" onclick="set_selected_language();">
					<option value="eng" <?=$eng?>><?=__('English')?></option>
				    <option value="may" <?=$may?>><?=__('Malyasian')?></option>
				    <option value="chi" <?=$chi?>><?=__('Chinese')?></option>
		      	</select>
		      <?php 
		      	echo $this->Html->link('English', array('language'=>'eng'),array('id'=>'english_link','style'=>'display:none')); 
		       	echo $this->Html->link('Chinese', array('language'=>'chi'),array('id'=>'china_link','style'=>'display:none')); 
		       	echo $this->Html->link('Malaysian', array('language'=>'may'),array('id'=>'malaysia_link','style'=>'display:none')); 

			/*Language Section Drop Down*/       	
		    ?>
</div> 