<div class="users form">
    <?php echo $this->Form->create('User'); ?>
    <fieldset>
        <legend><?php echo __('Add User'); ?></legend>
        <?php
        echo $this->Form->input('name');
        echo $this->Form->input('surname');
        echo $this->Form->input('sex');
        echo $this->Form->input('email');
        echo $this->Form->input('password');
        echo $this->Form->input('mobile');
        echo $this->Form->input('status');
        echo $this->Form->input('type');
        echo $this->Form->input('address');
        ?>
    </fieldset>
    <?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
    <h3><?php echo __('Actions'); ?></h3>
    <ul>

        <li><?php echo $this->Html->link(__('List Users'), array('action' => 'index')); ?></li>
    </ul>
</div>
