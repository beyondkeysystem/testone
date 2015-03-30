<?php
    $action = $this->params->action;
    $address_manager = '';
    $order = '';
    $refund = '';
    $account = '';
    $promotionalcode = '';
    $viewcloseorder = '';
    switch($action){
        case "address_manager":
            $address_manager = 'current';
            break;
        case "order":
            $order = 'current';
            break;
        case "viewcloseorder":
            $viewcloseorder = 'current';
            break;
        case "refund":
            $refund = 'current';
            break;
        case "account":
            $account = 'current';
            break;
        case "promotionalcode":
            $promotionalcode = 'current';
            break;
    }
?>
<div class="col-md-3">
    <h2>My Order</h2>
    <ul class="side-link">
        <li>
            <?php echo $this->Html->link('Open Order','/users/order',array('class'=>$order));?>
        </li>
        <li>
            <?php echo $this->Html->link('Closed orders','/users/viewcloseorder',array('class'=>$viewcloseorder));?>
        </li>
        <li>
            <?php echo $this->Html->link('Returns','/users/refund',array('class'=>$refund));?>
        </li>
    </ul>
    <h2>Personal Info</h2>
    <ul class="side-link">
        <li>
            <?php echo $this->Html->link('My account','/users/account',array('target'=>'_blank','class'=>$account));?>
        </li>
        <li><?php echo $this->Html->link('My address manager','/users/address_manager',array('class'=>$address_manager));?></li>
        <li><?php echo $this->Html->link('My Promotional codes','/fcodes/promotionalcode',array('class'=>$promotionalcode));?></li>
    </ul>
</div>