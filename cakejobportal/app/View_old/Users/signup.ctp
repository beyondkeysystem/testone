
<div class="signDiv">
    <?php echo $this->Form->create('User'); ?>
    <fieldset>
        <legend><?php echo __('User Registration'); ?></legend>
        <?php
        echo $this->Form->input('name');
        echo $this->Form->input('sex', array('type' => 'select', 'options' => array('male' => 'Male', 'female' => 'Female'), 'empty' => 'Please select'));
        echo $this->Form->input('email');
        echo $this->Form->input('password');
        echo $this->Form->input('mobile');
        echo $this->Form->input('type', array('type' => 'select', 'options' => array('employer' => 'employer', 'candidate' => 'candidate'), 'empty' => 'Please select'));
        echo $this->Form->input('address');
        echo $this->Form->input('created_date',array('type'=>'hidden','value'=>date("Y-m-d H:i:s")));
        echo $this->Form->end(__('Submit'));
        ?>
    </fieldset>
    
</div>
