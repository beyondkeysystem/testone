<div class="users index">
    <?php echo $this->Form->create('dmes', array('action' => 'search')); ?>
    <div align="right">	
        <?php echo $this->Form->input('search_query', array('type' => 'text', 'id' => 'search_input', 'class'=>'searchBox', 'placeholder' => 'Search by patient name or serial no.', 'div' => false, 'label' => false)); ?>
        <?php echo $this->Form->button('Search', array('type' => 'submit', 'id' => 'search_button', 'style' => 'height:30px')); ?>        
    </div>
    <?php echo $this->Form->end(); ?>
    <?php if (!empty($complete_data)) { ?>
        <table class="gridtable" cellpadding="0" cellspacing="0">
            <tr>
                <th class="headercolor"><?php echo __('No'); ?></th>
                <th><?php echo $this->Paginator->sort('User.name', 'Name', array('class' => 'headercolor')); ?></th>
                <th><?php echo $this->Paginator->sort('User.email', 'Email', array('class' => 'headercolor')); ?></th>
                <th><?php echo $this->Paginator->sort('User.mobile', 'Mobile', array('class' => 'headercolor')); ?></th>
                <th><?php echo $this->Paginator->sort('User.clinician', 'Clinician name', array('class' => 'headercolor')); ?></th>
                <th><?php echo $this->Paginator->sort('User.address', 'Address', array('class' => 'headercolor')); ?></th>
                <th><?php echo $this->Paginator->sort('Report.percentage', 'Compliance', array('class' => 'headercolor')); ?></th>
                <th class="headercolor"><?php echo 'Actions'; ?></th>
            </tr>
            <?php
            $l = 0;
            $i = 1;
            $j = 0;
            foreach ($complete_data as $user):
                ?>
                <tr>    
                    <td><?php echo h($i); ?>&nbsp;</td>
                    <td><?php
        if (!empty($user['User']['name'])) {
            echo $this->Html->link(__($user['User']['name']), array('action' => 'report', $user['User']['id']));
        }
                ?>&nbsp;</td>
                    <td><?php
                if (!empty($user['User']['email'])) {
                    echo $user['User']['email'];
                }
                ?>&nbsp;</td>
                    <td><?php
                if (!empty($user['User']['mobile'])) {
                    echo $user['User']['mobile'];
                }
                ?>&nbsp;</td>

                    <td><?php
                if (!empty($user['u2']['clinician'])) {
                    echo h($user['u2']['clinician']);
                }
                ?>&nbsp;</td>
                    <td><?php
                if (!empty($user['User']['address'])) {
                    echo $user['User']['address'];
                }
                ?>&nbsp;</td>
                    <td><?php
                if (!empty($user['Report']['percentage'])) {
                    echo $user['Report']['percentage'];
                } else {
                    echo"00";
                }
                ?></td>


                    <td class="actions">
                <?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $user['User']['id'])); ?>
                <?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $user['User']['id']), null, __('Are you sure you want to delete # %s?', $user['User']['id'])); ?>
                    </td>

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
            <?php }} ?>
  <?php } else { echo"Please search by 'Patient name' or 'Serial number'"; }?>
</div>
<script>
    $(document).ready(function(){
           
       
        $("#search_button").click(function(){ 
            if($("#search_input").val()==0){alert("Search query is required");return false;
            }
        
        });
     
      

    });

</script>
