<div class="users view">
    <h2><?php echo __('User'); ?></h2>
    <dl>
        <dt><?php echo __('Id'); ?></dt>
        <dd>
            <?php echo h($user['User']['id']); ?>
            &nbsp;
        </dd>
        <dt><?php echo __('Name'); ?></dt>
        <dd>
            <?php echo h($user['User']['name']); ?>
            &nbsp;
        </dd>
        <dt><?php echo __('Username'); ?></dt>
        <dd>
            <?php echo h($user['User']['username']); ?>
            &nbsp;
        </dd>
        <dt><?php echo __('Sex'); ?></dt>
        <dd>
            <?php echo h($user['User']['sex']); ?>
            &nbsp;
        </dd>
        <dt><?php echo __('Email'); ?></dt>
        <dd>
            <?php echo h($user['User']['email']); ?>
            &nbsp;
        </dd>
        <dt><?php echo __('Password'); ?></dt>
        <dd>
            <?php echo h($user['User']['password']); ?>
            &nbsp;
        </dd>
        <dt><?php echo __('Mobile'); ?></dt>
        <dd>
            <?php echo h($user['User']['mobile']); ?>
            &nbsp;
        </dd>
        <dt><?php echo __('Status'); ?></dt>
        <dd>
            <?php echo h($user['User']['status']); ?>
            &nbsp;
        </dd>
        <dt><?php echo __('Type'); ?></dt>
        <dd>
            <?php echo h($user['User']['type']); ?>
            &nbsp;
        </dd>
        <dt><?php echo __('Address'); ?></dt>
        <dd>
            <?php echo h($user['User']['address']); ?>
            &nbsp;
        </dd>
    </dl>
</div>
<div class="actions">
    <h3><?php echo __('Actions'); ?></h3>
    <ul>
        <li><?php echo $this->Html->link(__('Edit User'), array('action' => 'edit', $user['User']['id'])); ?> </li>
        <li><?php echo $this->Form->postLink(__('Delete User'), array('action' => 'delete', $user['User']['id']), null, __('Are you sure you want to delete # %s?', $user['User']['id'])); ?> </li>
        <li><?php echo $this->Html->link(__('List Users'), array('action' => 'index')); ?> </li>
        <li><?php echo $this->Html->link(__('New User'), array('action' => 'add')); ?> </li>
    </ul>
</div>
