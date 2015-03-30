<script src="/assets/fancybox/fancybox/jquery.fancybox-1.3.4.pack.js"></script>
<link rel="stylesheet" type="text/css" href="/assets/fancybox/fancybox/jquery.fancybox-1.3.4.css" media="screen" />
<div class="container top">
  <ul class="breadcrumb">
    <li>
      <a href="<?php echo site_url("admin"); ?>">
        <?php echo ucfirst($this->uri->segment(1));?>
      </a> 
      
    </li>
    <li class="active">
      <?php echo ucfirst($this->uri->segment(2));?>
    </li>
  </ul>

  <div class="page-header users-header">
    <h2>
      <?php echo ucfirst($this->uri->segment(2));?> 
      <a  href="/admin/users/create" class="btn btn-success">Add a new</a>
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
                <span><input type="button" value="reset" class="btn btn-large btn-primary" onclick="window.location.href = '/admin/users/manage'" /></span>    
            </div>
         </form>

      </div>-->
                    
      <table class="table table-striped table-bordered table-condensed tablesorter">
        <thead>
            <tr>
<!--                <th class="header">Id</th>-->
                <th class="yellow header headerSortDown">First Name</th>
                <th class="green header">Last Name</th>
                <th class="red header">Username</th>
                <th class="red header">Email</th>
                <th class="red header">Gender</th>
                <th class="red header">Actions</th>
            </tr>
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
        </thead>
        <tbody>
            <?php if(!empty($results)){?>
            <?php $i=0; foreach($results as $result){?>
            <tr class="<?php if($i%2==0) echo 'odd';else echo 'even';?>">
<!--                <td><?php echo $result->id;?></td>-->
                <td><?php echo $result->firstname;?></td>
                <td><?php echo $result->lastname;?></td>
                <td><?php echo $result->username;?></td>
                <td><?php echo $result->email;?></td>
                <td><?php echo $result->gender;?></td>
                <td>
<!--                    <a class="various3" href="/admin/users/permission/<?php echo $result->id?>" title="Permission"><img src="/assets/img/permission.png"></a>-->
                    <a href="/admin/users/resetpass/<?php echo $result->id?>" title="Reset password"><img src="/assets/img/resetpass.png" /></a>
                    <?php if(isset($result->is_active) and $result->is_active == '1'){?>
                    <a href="/admin/users/is_archive/<?php echo $result->id?>/0" title="Archive"><img src="/assets/img/archive.png" /></a>
                    <?php }else{?>
                        <a href="/admin/users/is_archive/<?php echo $result->id?>/1" title="Un archive"><img src="/assets/img/unarchive.png" /></a>
                    <?php }?>
                        <a href="/admin/users/update/<?php echo $result->id?>" title="Update"><img src="/assets/img/gr-update.png" /></a>
                    <a href="/admin/users/delete/<?php echo $result->id?>" onclick ="return fnconfirm()" title="Delete"><img src="/assets/img/gr-delete.png" /></a>
		     <a href="/admin/users/info/<?php echo $result->id?>" title="View"><img src="/assets/img/info.png" /></a>
                    
<!--                    <a href="/index.php/admin/users/delete/<?php echo $result->id?>" title="Delete" class="btn btn-info">view & edit</a>-->
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
<script type="text/javascript">
    $(document).ready(function() {

            $(".various3").fancybox({
                    'width'			: '75%',
                    'height'                    : '75%',
                    'autoScale'                 : false,
                    'transitionIn'		: 'none',
                    'transitionOut'		: 'none',
                    'type'			: 'iframe'
            });
    });
</script>
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