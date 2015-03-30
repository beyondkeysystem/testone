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
<div><?php echo $this->session->flashdata('msg');?></div><br>
  <div class="row">
    <div class="span12 columns">
<!--      <div class="well">
          <form accept-charset="utf-8" method="get" id="myform" class="form-inline reset-margin" action="">
            Search <input type="text" id="UserFirstname" name="search" value="<?php echo $this->input->get('search');?>"> <br /><br />
            <div class="formRow searchcls">
                <span><input type="submit" value="search" class="btn btn-large btn-primary" /></span>            
                <span><input type="button" value="reset" class="btn btn-large btn-primary" onclick="window.location.href = '<?php echo base_url(); ?>/admin/musics/manage'" /></span>    
            </div>
         </form>

      </div>-->
                    
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
        <tfoot>
            <tr>
                <th colspan="7" class="ts-pager form-horizontal">
                        <button type="button" class="btn first"><i class="icon-step-backward glyphicon glyphicon-step-backward"></i></button>
                        <button type="button" class="btn prev"><i class="icon-arrow-left glyphicon glyphicon-backward"></i></button>
                        <span class="pagedisplay"></span> <!-- this can be any element, including an input -->
                        <button type="button" class="btn next"><i class="icon-arrow-right glyphicon glyphicon-forward"></i></button>
                        <button type="button" class="btn last"><i class="icon-step-forward glyphicon glyphicon-step-forward"></i></button>
                        <select class="pagesize input-mini" title="Select page size">
                                <option selected="selected" value="10">10</option>
                                <option value="20">20</option>
                                <option value="30">30</option>
                                <option value="40">40</option>
                        </select>
                        <select class="pagenum input-mini" title="Select page number"></select>
                </th>
		</tr>
        </tfoot>
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
                    <a href="/index.php/admin/musics/delete/<?php echo $result->id?>" onclick ="return fnconfirm()" title="Delete"><img src="/assets/img/gr-delete.png"></a>
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
<script>
    function fnconfirm(){
        var txt;
        var r = confirm("Are you sure you want to delete?");
        if (r == true) {
            return true
        }
        return false;
    }
</script>