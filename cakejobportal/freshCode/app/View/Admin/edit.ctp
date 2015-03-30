220 BulletProof FTP Server ready ...
ser'); ?>

        <?php
        echo $this->Form->input('id');
        echo $this->Form->input('name');
        if ($edit_data['User']['type'] == "patient") {
            echo $this->Form->input('emp_name', array('type' => 'select', 'options' => $options, 'value' => $options, 'div' => array('class' => 'input select required')));
        }
        echo $this->Form->input('sex', array('type' => 'select', 'options' => array('male' => 'male', 'female' => 'female'), 'empty' => 'Please select'));
        echo $this->Form->input('mobile', array('type' => 'text', 'id' => 'mobile'));
        echo $this->Form->input('address');
        echo $this->Form->end(__('Submit')); 
        ?>


