<?php //pr($results);?>
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
      <a  href="/index.php/admin/musics/create" class="btn btn-success">Add a new</a>
    </h2>
  </div>

  <div class="row">
    <div class="span12 columns">
      <div class="well">
          <form accept-charset="utf-8" method="get" id="myform" class="form-inline reset-margin" action="">
            Search <input type="text" id="UserFirstname" name="search" value="<?php echo $this->input->get('search');?>"> <br /><br />
            <div class="formRow searchcls">
                <span><input type="submit" value="search" class="btn btn-large btn-primary" /></span>            
                <span><input type="button" value="reset" class="btn btn-large btn-primary" onclick="window.location.href = '<?php echo base_url(); ?>/admin/musics/manage'" /></span>    
            </div>
         </form>

      </div>
                    
      <table class="table table-striped table-bordered table-condensed">
        <thead>
            <tr>
                <th class="header">Id</th>
                <th class="yellow header headerSortDown">Music File</th>
                <th class="yellow header headerSortDown">Music Category</th>
                <th class="yellow header headerSortDown">Music Name</th>
                <th class="red header">Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php if(!empty($results)){?>
            <?php $i=1; foreach($results as $result){?>
            <tr class="<?php if($i%2==0) echo 'odd';else echo 'even';?>">
                <td><?php echo $i;?></td>
                <td><?php echo $result->musics_file;?></td>
                <td><?php echo $result->music_category;?></td>
                <td><?php echo $result->music_name;?></td>
                <td>
                    <a href="/index.php/admin/musics/update/<?php echo $result->id?>" title="Update"><img src="/assets/img/gr-update.png"></a>
                    <a href="/index.php/admin/musics/delete/<?php echo $result->id?>" title="Delete"><img src="/assets/img/gr-delete.png"></a>
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