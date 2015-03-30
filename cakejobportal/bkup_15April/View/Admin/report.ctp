<div class="users index">
    <?php if (!empty($report_data)) { ?>
        <table class="gridtable"align="left" cellpadding="0" cellspacing="0">
            <tr>
                <th><?php echo $this->Paginator->sort('Report.icode', 'iCode', array('class' => 'headercolor')); ?></th>
                <th><?php echo $this->Paginator->sort('Report.serial_no', 'Serial no.', array('class' => 'headercolor')); ?></th>
                <th><?php echo $this->Paginator->sort('Report.icode_period', 'iCode Period', array('class' => 'headercolor')); ?></th>
                <th><?php echo $this->Paginator->sort('Report.days', 'Days', array('class' => 'headercolor')); ?></th>
                <th><?php echo $this->Paginator->sort('Report.minutes', 'Minutes', array('class' => 'headercolor')); ?></th>
                <th><?php echo $this->Paginator->sort('Report.avg_pressure', 'Avg Pressure', array('class' => 'headercolor')); ?></th>
                <th><?php echo $this->Paginator->sort('Report.p95', 'P95', array('class' => 'headercolor')); ?></th>
                <th><?php echo $this->Paginator->sort('Report.best30', 'Best30', array('class' => 'headercolor')); ?></th>
                <th><?php echo $this->Paginator->sort('Report.ahi', 'AHI', array('class' => 'headercolor')); ?></th>
                <th><?php echo $this->Paginator->sort('Report.sni', 'SNI', array('class' => 'headercolor')); ?></th>
                <th><?php echo $this->Paginator->sort('Report.percentage','Complician', array('class' => 'headercolor'));?></th>
                <th><?php echo $this->Paginator->sort('Report.created_date', 'Created Date', array('class' => 'headercolor')); ?></th>
                <th class="headercolor"><?php echo __('Actions') ?></th>
            </tr>
            <?php if (!empty($report_data)) { ?>    
                <?php $i = 0; ?>    
                <?php foreach ($report_data as $report_datas) { ?>

                    <?php
                    if ($i % 2) {
                        $style = "background-color:#FFFFFF";
                    } else {
                        $style = "background-color:#F0F0F0";
                    }
                    ?>    
                    <tr class="tdfontsize" style='<?php echo $style ?>'>  
                        <td><?php
            if (!empty($report_datas['Report']['icode'])) {
                echo $report_datas['Report']['icode'];
            } else {
                echo "0";
            }
                    ?></td>
                        <td><?php
                if (!empty($report_datas['Report']['serial_no'])) {
                    echo $report_datas['Report']['serial_no'];
                } else {
                    echo "0";
                }
                    ?></td>
                        <td><?php
                if (!empty($report_datas['Report']['icode_period'])) {
                    echo $report_datas['Report']['icode_period'];
                } else {
                    echo "0";
                }
                    ?></td>
                        <td><?php
                if (!empty($report_datas['Report']['days'])) {
                    echo $report_datas['Report']['days'];
                } else {
                    echo "0";
                }
                    ?></td>

                        <td><?php
                if (!empty($report_datas['Report']['minutes'])) {
                    echo $report_datas['Report']['minutes'];
                } else {
                    echo "0";
                }
                    ?></td>
                        <td><?php
                if (!empty($report_datas['Report']['avg_pressure'])) {
                    echo $report_datas['Report']['avg_pressure'];
                } else {
                    echo"00";
                }
                    ?></td>
                        <td><?php
                if (!empty($report_datas['Report']['p95'])) {
                    echo $report_datas['Report']['p95'];
                } else {
                    echo "0";
                }
                    ?></td>
                        <td><?php
                if (!empty($report_datas['Report']['best30'])) {
                    echo $report_datas['Report']['best30'];
                } else {
                    echo "0";
                }
                    ?></td>
                        <td><?php
                if (!empty($report_datas['Report']['ahi'])) {
                    echo $report_datas['Report']['ahi'];
                } else {
                    echo "0";
                }
                    ?></td>
                        <td><?php
                if (!empty($report_datas['Report']['sni'])) {
                    echo $report_datas['Report']['sni'];
                } else {
                    echo "0";
                }
                    ?></td>
                         <td><?php
                if (!empty($report_datas['Report']['percentage'])) {
                    echo $report_datas['Report']['percentage']."%";
                } else {
                    echo "00%";
                }
                    ?></td>
                        <td><?php
                if (!empty($report_datas['Report']['created_date'])) {
                    echo $report_datas['Report']['created_date'];
                } else {
                    echo "0";
                }
                    ?></td>
                        <td class="actions"><?php echo $this->Html->link(__('View Chart'), array('action' => 'chart', $report_datas['Report']['id'])); ?></td></tr>

                    <?php $i++; ?>
                <?php } ?>
            <?php } ?>  
        </table>

        <?php $pagecount = $this->params['paging']['Report']['pageCount'];
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

       
   <?php } else {
        echo "Report not generated...";
    }
    ?>

</div>


