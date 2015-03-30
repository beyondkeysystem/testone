<div class="users index">
    <?php if ($user_type == 'patient') { ?>
        <?php echo $this->Form->create('dmes', array('action' => 'search')); ?>
        <div align="right">	
            <?php echo $this->Form->input('search_query', array('type' => 'text', 'id' => 'search_input', 'class' => 'searchBox', 'placeholder' => 'search by patient name or serial no.', 'div' => false, 'label' => false)); ?>
            <?php echo $this->Form->button('Search', array('type' => 'submit', 'id' => 'search_button', 'class' => 'searchButton')); ?>        
        </div>
        <?php echo $this->Form->end(); ?>
    <?php } ?>
    <?php if (!empty($complete_data)) { ?>
        <table class="gridtable" align="left" cellpadding="0" cellspacing="0">
            <tr>
                <th class="headercolor"><?php echo __('No'); ?></th>
                <th><?php echo $this->Paginator->sort('User.name', 'Name', array('class' => 'headercolor')); ?></th>
                <th><?php echo $this->Paginator->sort('User.email', 'Email', array('class' => 'headercolor')); ?></th>
                <th><?php echo $this->Paginator->sort('User.mobile', 'Mobile', array('class' => 'headercolor')); ?></th>
                <?php if ($user_type == 'patient') { ?>
                <th><?php echo $this->Paginator->sort('User.clinician', 'Clinician name', array('class' => 'headercolor')); ?></th>
                <?php } ?>
                <th><?php echo $this->Paginator->sort('User.address', 'Address', array('class' => 'headercolor')); ?></th>
                <?php
                if (!empty($Compliance)) {?>
                <th><?php echo $this->Paginator->sort('User.per', 'Compliance', array('class' => 'headercolor')); ?></th>
                <?php }?>
                <?php if ($user_type == 'patient') { ?>
                <th class="headercolor"><?php echo __('Actions'); ?></th>
                <?php } ?> 
            </tr>
            <?php
            $l = 0;
            $i = 1;
            $j = 0;
            foreach ($complete_data as $user):?>
            <tr>    
               <td><?php echo h($i); ?>&nbsp;</td>
               <td>
               <?php if ($user_type == 'patient') {
                echo $this->Html->link(__($user['User']['name']), array('action' => 'report', $user['User']['id']));
                } else {
                 echo $user['u2']['name'];
                }?>&nbsp;
               </td>
               <td><?php if ($user_type == 'patient') {
                    echo $user['User']['email'];
                } else {
                    echo $user['u2']['email'];
                }?>&nbsp;
               </td>
                <td><?php if ($user_type == 'patient') {
                    echo $user['User']['mobile'];
                } else {
                    echo $user['u2']['mobile'];
                }?>&nbsp;
                </td>
                <?php if ($user_type == 'patient') { ?>
                <td><?php echo h($user['u2']['clinician']); ?>&nbsp;
                </td> <?php } ?>
                <td><?php if ($user_type == 'patient') {
                echo $user['User']['address'];
                 } else {
                echo $user['u2']['clinician'];
                 } ?>&nbsp;
                </td>
                <?php if ($user_type == 'patient' && !empty($Compliance)) {?>
                <td><?php echo $user[0]['per'] . "%"; ?>&nbsp;</td>
                <?php }?>
                <?php if ($user_type == 'patient') { ?>
                <td class="actions">
                <?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $user['User']['id'])); ?>
                <?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $user['User']['id']), null, __('Are you sure you want to delete # %s?', $user['User']['id'])); ?>
                 </td>
                <?php } ?>
                </tr>
                <?php
                $i++;
                $j++;
            endforeach;
            ?>
        </table>

        <?php $pagecount = $this->params['paging']['DmeAssignPatient']['pageCount'];
        if (!empty($pagecount)) { ?>
            <?php if ($pagecount > 1) { ?>
                <div class="paging">
                    <?php
                    echo $this->Paginator->prev('< ' . __('previous'), array(), null, array('class' => 'prev disabled'));
                    echo $this->Paginator->numbers(array('separator' => ''));
                    echo $this->Paginator->next(__('next') . ' >', array(), null, array('class' => 'next disabled'));
                    ?>
                </div> 
            <?php }
        } ?>

        <?php
    } else {
        if ($user_type == 'patient') {
            echo"Patient record not found";
        }
        if ($user_type == 'clinician') {
            echo"Clinician record not found";
        }
    }
    ?>
</div>
<script>
    $(document).ready(function(){
           
       
        $("#search_button").click(function(){ 
            if($("#search_input").val()==0){alert("Search query is required");return false;
            }
        
        });
     
      

    });

</script>
