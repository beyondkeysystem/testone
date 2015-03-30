<div class="users form">
    <h3 align="right"><?php echo ucfirst($user['name']) . "(" . ucfirst($user['type']) . ")"; ?></h3>
    <div align="right">
        <?php echo!empty($user) ? $this->Html->link('Logout', array('controller' => 'users', 'action' => 'logout')) : ''; ?>
    </div>
    <?php echo $this->Form->create('User'); ?>
    <fieldset>
        <legend><?php echo __('Edit User'); ?></legend>
        <?php
        echo $this->Form->input('id');
        echo $this->Form->input('name');
        echo $this->Form->input('surname');
        echo $this->Form->input('sex', array('type' => 'select', 'options' => array('male' => 'male', 'female' => 'female'), 'empty' => 'Please select'));
        echo $this->Form->input('email');
        echo $this->Form->input('password');
        echo $this->Form->input('mobile');
        echo $this->Form->input('type', array('type' => 'select', 'options' => array('patient' => 'patient', 'clinician' => 'clinician'), 'empty' => 'Please select'));
        echo $this->Form->input('address');
        ?>
    </fieldset>
    <?php echo $this->Form->end(__('Submit')); ?>
</div>

