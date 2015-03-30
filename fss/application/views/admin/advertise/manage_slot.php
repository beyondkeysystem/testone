<div class="container top">
  <ul class="breadcrumb">
    <li>
      <a href="<?php echo site_url("admin"); ?>">
        <?php echo ucfirst($this->uri->segment(1));?>
      </a> 
      <span class="divider">/</span>
    </li>
    <li class="active">
      <?php echo ucfirst($this->uri->segment(2));?>
    </li>
  </ul>

  <div class="page-header users-header">
    <h2>
      <?php echo ucfirst($this->uri->segment(2));?> 
      <a  href="/index.php/admin/advertise/add_slot" class="btn btn-success">Add a new</a>
    </h2>
  </div>

  <div class="row">
    <div class="span12 columns">   
      <table class="table table-striped table-bordered table-condensed">
        <thead>
            <tr>
                <th class="header">Slot No.</th>
                <th class="green header">Slot Name</th>
                <th class="red header">Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php if(!empty($results)){?>
            <?php $i=0; foreach($results as $result){?>
            <tr class="<?php if($i%2==0) echo 'odd';else echo 'even';?>">
                <td><?php echo $result->slot_no;?></td>
                <td><?php echo $result->name;?></td>
                <td>
                    <a href="/index.php/admin/advertise/update_slot/<?php echo $result->id?>" title="Update"><img src="/assets/img/gr-update.png"></a>
                </td>
            </tr>
            <?php $i++; }?>
            <?php //echo $this->pagination->create_links();?>
            <?php }else{?>                    
            <tr>
                <td colspan="6">No result found</td>
            </tr>
            <?php }?>
        </tbody>
        
      </table>
        <div style="clear: both;"></div>
      <?php echo '<div class="pagination">'.$this->pagination->create_links().'</div>'; ?>

  </div>
 </div>
</div>