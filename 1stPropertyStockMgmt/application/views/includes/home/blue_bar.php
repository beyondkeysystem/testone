<!--Blue Bar-->
<div class="blue">
  <div class="wrapper">
    <div class="blue1">
      <h3><i class="fa fa-phone"></i></h3>
      <p><?php if($this->lang->line('call_us_now')){echo ($this->lang->line('call_us_now'));} else{ echo 'Call us now & get a free quote';} ?></p>
      <h2><?php if($this->lang->line('call_number')){echo ($this->lang->line('call_number'));} else{ echo '+00 9999 1245 256';} ?></h2>
    </div>
    <div class="blue2"><?php if($this->lang->line('blue_bar_text')){echo ($this->lang->line('blue_bar_text'));} else{ echo 'Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt.';} ?></div>
    <div class="blue3"><img src="<?php echo base_url(); ?>assets/front/images/girl.png"></div>
    <div class="clear"></div>
  </div>
</div>
<!--/.Blue Bar--> 