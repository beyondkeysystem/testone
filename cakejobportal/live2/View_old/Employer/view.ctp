<div class="users index">
     <h2><?php echo __('Patient Detail'); ?></h2> 
    <table class="gridtable" style='width: 50%' cellpadding="0" cellspacing="0">
        <tr>
            <th class="headercolor"><?= __('Patient name'); ?></th> 
            <th class="headercolor"><?= __('Sex'); ?></th> 
            <th class="headercolor"><?= __('Email'); ?></th>
            <th class="headercolor"><?= __('Mobile'); ?></th>
            <th class="headercolor"><?= __('Address'); ?></th>
        </tr>
        <tr>  
            <td><?php
        if (!empty($patient_data['User']['name'])) {
            echo $patient_data['User']['name'];
        }
        ?></td>
            <td><?php
        if (!empty($patient_data['User']['sex'])) {
            echo $patient_data['User']['sex'];
        }
        ?></td>
            <td><?php
                if (!empty($patient_data['User']['email'])) {
                    echo $patient_data['User']['email'];
                }
        ?></td>
            <td><?php
                if (!empty($patient_data['User']['mobile'])) {
                    echo $patient_data['User']['mobile'];
                }
        ?></td>
            <td><?php
                if (!empty($patient_data['User']['address'])) {
                    echo $patient_data['User']['address'];
                }
        ?></td>
        </tr>

    </table><br /><br />

    <h2><?php echo __('Patient Report'); ?></h2> 
        <?php if (!empty($report_data)) { ?>
        <table class="gridtable"align="left" cellpadding="0" cellspacing="0">
            <tr>
                <th><?php echo $this->Paginator->sort('Report.icode','iCode', array('class' => 'headercolor')); ?></th>
                <th><?php echo $this->Paginator->sort('Report.serial_no','Serial no.', array('class' => 'headercolor')); ?></th>
                <th><?php echo $this->Paginator->sort('Report.icode_period','iCode Period', array('class' => 'headercolor')); ?></th>
                <th><?php echo $this->Paginator->sort('Report.days','Days', array('class' => 'headercolor')); ?></th>
                <th><?php echo $this->Paginator->sort('Report.minutes','Minutes', array('class' => 'headercolor')); ?></th>
                <th><?php echo $this->Paginator->sort('Report.avg_pressure','Avg Pressure', array('class' => 'headercolor')); ?></th>
                <th><?php echo $this->Paginator->sort('Report.p95','P95', array('class' => 'headercolor')); ?></th>
                <th><?php echo $this->Paginator->sort('Report.best30','Best30', array('class' => 'headercolor')); ?></th>
                <th><?php echo $this->Paginator->sort('Report.ahi','AHI', array('class' => 'headercolor')); ?></th>
                <th><?php echo $this->Paginator->sort('Report.sni','SNI', array('class' => 'headercolor')); ?></th>
                 <th><?php echo $this->Paginator->sort('Report.percentage','Complician', array('class' => 'headercolor')); ?></th>
                <th><?php echo $this->Paginator->sort('Report.created_date','Created Date', array('class' => 'headercolor')); ?></th>
                <th class="headercolor"><?php echo __('Actions') ?></th>
            </tr>
                    <?php if (!empty($report_data)) { ?>    
                        <?php $i = 0; ?>    
                        <?php foreach ($report_data as $report_data) { ?>
                            <?php
                            if ($i == 0) {
                                $style = "background-color:pink";
                            } else {
                                $style = "background-color:#F0F0F0";
                            }
                            ?>    
                    <tr class="tdfontsize" style='<?php echo $style ?>'>  
                        <td><?php
                if (!empty($report_data['Report']['icode'])) {
                    echo $report_data['Report']['icode'];
                } else {
                    echo"00";
                }
                            ?></td>
                        <td><?php
                if (!empty($report_data['Report']['serial_no'])) {
                    echo $report_data['Report']['serial_no'];
                } else {
                    echo"00";
                }
                ?></td>
                        <td><?php
                if (!empty($report_data['Report']['icode_period'])) {
                    echo $report_data['Report']['icode_period'];
                } else {
                    echo"00";
                }
                            ?></td>
                        <td><?php
            if (!empty($report_data['Report']['days'])) {
                echo $report_data['Report']['days'];
            } else {
                echo"00";
            }
                            ?></td>
                        <td><?php
            if (!empty($report_data['Report']['minutes'])) {
                echo $report_data['Report']['minutes'];
            } else {
                echo"00";
            }
            ?></td>
            <td><?php
            if (!empty($report_data['Report']['avg_pressure'])) {
                echo $report_data['Report']['avg_pressure'];
            } else {
                echo"00";
            }
            ?></td>
                        <td><?php
            if (!empty($report_data['Report']['p95'])) {
                echo $report_data['Report']['p95'];
            } else {
                echo"00";
            }
            ?></td>
                        <td><?php
            if (!empty($report_data['Report']['best30'])) {
                echo $report_data['Report']['best30'];
            } else {
                echo"00";
            }
            ?></td>
                        <td><?php
            if (!empty($report_data['Report']['ahi'])) {
                echo $report_data['Report']['ahi'];
            } else {
                echo"00.00";
            }
            ?></td>
                        <td><?php
            if (!empty($report_data['Report']['sni'])) {
                echo $report_data['Report']['sni'];
            } else {
                echo"00.00";
            }
            ?></td>
               <td><?php
            if (!empty($report_data['Report']['percentage'])) {
                echo $report_data['Report']['percentage']."%";
            } else {
                echo"00%";
            }
            ?></td>          
                        <td><?php
            if (!empty($report_data['Report']['created_date'])) {
                echo $report_data['Report']['created_date'];
            } else {
                echo"00-00-0000";
            }
            ?></td>
            <td class="actions"><?php echo $this->Html->link(__('View Chart'), array('action' => 'chart',$report_data['Report']['id'])); ?></td>            
                    </tr>
            <?php $i++; ?>
        <?php } ?>
    <?php } ?>  
        </table>
<?php
} else {
    echo"Report not generated...";
}
?>
  <p>
        <?php 
         $counts= $limit;
         $value= $this->Paginator->counter(array('format'=>'{:count}'));
        ?>	
      </p>
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
</div>

