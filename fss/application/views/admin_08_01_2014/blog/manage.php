<script src="/assets/fancybox/fancybox/jquery.fancybox-1.3.4.pack.js"></script>
<link rel="stylesheet" type="text/css" href="/assets/fancybox/fancybox/jquery.fancybox-1.3.4.css" media="screen" />


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
      <a  href="/index.php/admin/blog/create" class="btn btn-success">Add a new</a>
    </h2>
  </div>

  <div class="row">
    <div class="span12 columns">
      <div class="well">
          <form accept-charset="utf-8" method="get" id="myform" class="form-inline reset-margin" action="">
            Search <input type="text" id="UserFirstname" name="search" value="<?php echo $this->input->get('search');?>"> <br /><br />
            <div class="formRow searchcls">
                <span><input type="submit" value="search" class="btn btn-large btn-primary" /></span>            
                <span><input type="button" value="reset" class="btn btn-large btn-primary" onclick="window.location.href = '/index.php/admin/users/manage'" /></span>    
            </div>
         </form>

      </div>
                    
      <table class="table table-striped table-bordered table-condensed">
        <thead>
            <tr>
                <th class="header">Id</th>
                <th class="green header">Username</th>
                <th class="yellow header headerSortDown">Category Name</th>
                <th class="red header">Blog Name</th>
                <th class="red header">Average Rating</th>
                <th class="red header">Action</th>
            </tr>
        </thead>
        <tbody>
            <?php if(!empty($results)){?>
            <?php $i=0; foreach($results as $result){?>
            <tr class="<?php if($i%2==0) echo 'odd';else echo 'even';?>">
                <td><?php echo $result->id;?></td>
                <td><?php echo $result->u_username;?></td>
                <td><?php echo $result->c_category_name;?></td>
                <td><?php echo $result->blog_name;?></td>
                <td><?php echo $result->avg_rating;?></td>
                <td>
                    
                    <a class="various3" href="/index.php/admin/blog/permission/<?php echo $result->id?>" title="Permission"><img src="/assets/img/permission.png"></a>
                    <?php if(isset($result->is_active) and $result->is_active == '1'){?>
                    <a href="/index.php/admin/blog/is_archive/<?php echo $result->id?>/0" title="Archive"><img src="/assets/img/archive.png"></a>
                    <?php }else{?>
                        <a href="/index.php/admin/blog/is_archive/<?php echo $result->id?>/1" title="Un archive"><img src="/assets/img/unarchive.png"></a>
                    <?php }?>
                        <a href="/index.php/admin/blog/update/<?php echo $result->id?>" title="Update"><img src="/assets/img/gr-update.png"></a>
                        <a href="/index.php/admin/blog/delete/<?php echo $result->id?>" title="Delete"><img src="/assets/img/gr-delete.png"></a>
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