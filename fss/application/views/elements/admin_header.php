<div class="navbar navbar-fixed-top">
    <div class="navbar-inner">
      <div class="container">
        <a class="brand">Project Name</a>
        <ul class="nav">
            <?php //echo base_url(); ?>
          <li><a href="<?php echo base_url(); ?>admin/users/dashboard">Dashboard</a></li>
          <li><a href="<?php echo base_url(); ?>admin/users/manage">Manage Users</a></li>
          <li><a href="<?php echo base_url(); ?>admin/advertise/manage">Manage Advertise</a></li>
          <li><a href="<?php echo base_url(); ?>admin/categories/manage">Categories</a></li>
<!--          <li><a href="<?php echo base_url(); ?>admin/blog/manage">Blog</a></li>-->
<!--          <li><a href="<?php echo base_url(); ?>admin/file_segments/manage">File Segments</a></li>-->
          <li><a href="<?php echo base_url(); ?>admin/musics/manage">Musics</a></li>
          <li><a href="<?php echo base_url(); ?>admin/magazines">Magazines</a></li>
<!--          <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">Magazine <b class="caret"></b></a>
            <ul class="dropdown-menu">
                <li><a href="<?php echo base_url(); ?>admin/magazines/approved">Approved</a></li>
                <li><a href="<?php echo base_url(); ?>admin/magazines/unapprove">Unapprove</a></li>
            </ul>
          </li>-->
          
          <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">System <b class="caret"></b></a>
            <ul class="dropdown-menu">
                <li><a href="<?php echo base_url(); ?>admin/users/logout">Logout</a></li>
                <li><a href="<?php echo base_url(); ?>admin/users/changepassword">Change Password</a></li>
                <li><a href="<?php echo base_url(); ?>admin/users/editprofile">Edit Profile</a></li>
            </ul>
          </li>
        </ul>
      </div>
    </div>
</div>	