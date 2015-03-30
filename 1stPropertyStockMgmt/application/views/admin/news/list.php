 
      <script>
    
    function ConfirmDialog() {
  var x=confirm("Are you sure to delete record?")
  if (x) {
    return true;
  } else {
    return false;
  }
}
  </script>
   <script src="/assets/fancybox/fancybox/jquery.fancybox-1.3.4.pack.js"></script>
<link rel="stylesheet" type="text/css" href="/assets/fancybox/fancybox/jquery.fancybox-1.3.4.css" media="screen" />    
<div class="container top">
      <?php
      $pendings_ids=array();
      foreach($pending_property as $pending_property){
           $pendings_ids[]= $pending_property['id'];
                }
      ?>

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
          <a  href="<?php echo site_url("admin").'/'.$this->uri->segment(2); ?>/add" class="btn btn-success">Add a new</a>
        </h2>
      </div>
      
      <div class="row">
        <div class="span12 columns">
         
           
            
         

          <table class="table table-striped table-bordered table-condensed">
            <thead>
              <tr class="header">
                <th class="green">Sr No</th>
                <th class="green">Title</th>
               <th class="red">Actions</th>
              </tr>
            </thead>
            <tbody>
                <?php if(!empty($results)){
                  $i=1;
                  ?>
                <?php foreach($results as $result){
                  ?>
                <tr>
                   <td width="5%"><?php echo $i;?></td>
                  <td width="80%">
                      <div><a class="various3" href="<?php echo base_url(); ?>news/viewmessage/<?php echo $result->id?>"><b><?php echo $result->title;?></b></a></div>
                  </td>
                  
                  <td class="">
                  <a class="btn btn-info" href="<?php echo base_url(); ?>news/edit/<?php echo $result->id?>">Edit</a>
                   <a class="btn btn-danger" href="<?php echo base_url(); ?>news/delete/<?php echo $result->id?>" onclick="return ConfirmDialog();" >Delete</a>
                </td>
                <?php $i++;}?>
                <?php }?>
               </tr>
            </tbody>
          </table>
            <div style="clear: both;"></div>
      <?php echo '<div class="pagination">'.$this->pagination->create_links().'</div>'; ?>

      </div>
    </div>
    <?php /* for top scroll property page */ ?>
   <script>
        $(function(){
    $(".wrapper1").scroll(function(){
        $(".wrapper2")
            .scrollLeft($(".wrapper1").scrollLeft());
    });
    $(".wrapper2").scroll(function(){
        $(".wrapper1")
            .scrollLeft($(".wrapper2").scrollLeft());
    });
    });
      </script>
      <script type="text/javascript">
    $(document).ready(function() {

            $(".various3").fancybox({
                    'width'			: '42%',
                    'height'                    : '75%',
                    'autoScale'                 : false,
                    'transitionIn'		: 'none',
                    'transitionOut'		: 'none',
                    'type'			: 'iframe'
            });
    });
</script>