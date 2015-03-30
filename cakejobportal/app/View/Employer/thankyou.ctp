<h2 class="page-title"  >
Upgrade Services 
</h2>

<h4> <?php echo $this->Session->Flash(); ?>  </h4>

<table class="getplan_table">
    <tr>
        <th>Plan Name</th>
        <th>Plan Description</th>
        <th>Time Duration</th>
        <th>Paid Amount</th>
        <th>Start Date</th>
        <th>End Date</th>
    </tr>
    <?php
    if(isset($plan_data))
    {
    foreach($plan_data as $val) {
            
            ?>
    <tr>
        
        <td><?php echo ucfirst($val['cat']['name']); ?></td>
        <td><?php echo '<h4>You have chosen '.ucfirst($val['cat']['name']).' Plan.
        The duration of the plan is one '.$val['plan']['time_duration'].'. You have paid &pound; '.$val['plan']['amount'].'</h4>'; ?></td>
        <td>For a <?php echo $val['plan']['time_duration']; ?></td>
        <td><?php echo '&pound; '.$val['plan']['amount']; ?></td>
        <td><?php $start_date = strtotime($start_date); echo date('d M Y', $start_date); ?></td>
        <td><?php $end_date = strtotime($end_date); echo date('d M Y', $end_date); ?></td>
    </tr>
    <?php } } ?>
</table>