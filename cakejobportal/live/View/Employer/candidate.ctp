

    <table class="gridtable"  cellpadding="0" cellspacing="0">
            <th><?php echo $this->Paginator->sort('User.patient','Patient name', array('class' => 'headercolor')); ?></th>
            <th><?php echo $this->Paginator->sort('User.dme','Dme name', array('class' => 'headercolor')); ?></th>  
        <?php foreach ($complete_data as $complete_data) { ?>
            <tr class="tdfontsize">  
                <td><?php
                if (!empty($complete_data['u1']['patient'])) {
                    echo $this->Html->link(__($complete_data['u1']['patient']), array('action' => 'view', $complete_data['u1']['id']));
                }
                ?></td>
                <td><?php
                if (!empty($complete_data['u']['dme'])) {
                    echo $complete_data['u']['dme'];
                }
                ?></td>
            </tr>
<?php } ?>
    </table>
        <?php 
         $counts= $limit;
         $value= $this->Paginator->counter(array('format'=>'{:count}'));
        ?>	
    <div class="paging">
        <?php
        if($counts<$value)
        {
         echo $this->Paginator->prev('< ' . __('previous'), array(), null, array('class' => 'prev disabled'));
         echo $this->Paginator->numbers(array('separator' => ''));
         echo $this->Paginator->next(__('next') . ' >', array(), null, array('class' => 'next disabled'));
        }
        ?>
    </div>

