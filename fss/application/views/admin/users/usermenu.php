<center>
    <?php //echo '<pre>';print_r($user_name);
        $user_id = $this->uri->segment(4);
    ?>
    <a href="<?=base_url()?>admin/users/approved/<?=$user_id?>" class="btn btn-info btn-xs">Approved Magazines</a> 
    <a href="<?=base_url()?>admin/users/unapprove/<?=$user_id?>" class="btn btn-info btn-xs">Unapproved Magazines</a>
     <?php if(isset($is_active) and $is_active =='1'){?>
        <a href="<?=base_url()?>admin/users/freeze/<?=$user_id?>" class="btn btn-info btn-xs">Freeze</a> 
    <?php }else{?>
        <a href="<?=base_url()?>admin/users/freeze/<?=$user_id?>" class="btn btn-info btn-xs">Unfreeze</a> 
    <?php }?>
     <a href="<?=base_url()?>admin/users/info/<?=$user_id?>" class="btn btn-info btn-xs">View</a>
    <!-- <a href="#">Update Status</a> |  -->
</center>
<div>
    <?php echo $this->session->flashdata('msg');?>
</div>