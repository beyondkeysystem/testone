<center>
    <?php //echo '<pre>';print_r($user_name);
        $user_id = $id;
    ?>
    <a href="<?=base_url()?>admin/user/update/<?=$user_id?>" class="btn btn-info btn-xs">Edit User</a> 
    <a href="<?=base_url()?>admin/user/deposit/<?=$user_id?>" class="btn btn-info btn-xs">Deposit</a>
    <a href="<?=base_url()?>admin/user/withdraw/<?=$user_id?>" class="btn btn-info btn-xs">Withdraw</a>
    <?php if(isset($is_active) and $is_active =='1'){?>
        <a href="<?=base_url()?>admin/user/freeze/<?=$user_id?>" class="btn btn-info btn-xs">Freeze</a> 
    <?php }else{?>
        <a href="<?=base_url()?>admin/user/freeze/<?=$user_id?>" class="btn btn-info btn-xs">Unfreeze</a> 
    <?php }?>
    
    <!--<a href="<?=base_url()?>admin/profit_and_loss_logs/listproperty?pid=<?=$user_id?>" class="btn btn-info btn-xs">Reset Password</a>-->
    <a href="<?=base_url()?>admin/user/transaction_log/<?=$user_id?>" class="btn btn-info btn-xs">Transaction Log</a>
     <a href="<?=base_url()?>admin/user/shares/<?=$user_id?>" class="btn btn-info btn-xs">Shares</a>
      <a href="<?=base_url()?>admin/user/view/<?=$user_id?>" class="btn btn-info btn-xs">View</a> 
    <?=$enable_disable?> 
    <!-- <a href="#">Update Status</a> |  -->
</center>