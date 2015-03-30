
   <?php echo $this->Form->create('User'); ?>
        <?php
        echo $this->Form->input('id');
        echo $this->Form->input('name');
        echo $this->Form->input('sex', array('type' => 'select', 'options' => array('male' => 'male', 'female' => 'female'), 'empty' => 'Please select'));
        echo $this->Form->input('mobile');
        echo $this->Form->input('type', array('type' => 'select', 'options' => array('clinician' => 'clinician'), 'empty' => 'Please select'));
        echo $this->Form->input('address');
        echo $this->Form->end(__('Submit')); 
        ?>



