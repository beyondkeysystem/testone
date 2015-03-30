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
      <a  href="/admin/advertise/create_slot_row" onclick="return fnconfirm();" class="btn btn-success">Add Rotations</a>
    </h2>
  </div>

  <div class="row">
    <div class="span12 columns">
      <?php //pr($slots2);?>
        <?php $i=1; foreach($slots2 as $slot){?>
        <?php if(!empty($slot['advertise'])){?>
        <table width="48%" style="float: left; margin-right: 2%;margin-top: 2%;" border="1">
            <tr>
                <td>Ads No</td>
                <td>Cust Name</td>
                <td>Start Date</td>
                <td>End Date</td>
                <td>Action</td>
            </tr>
            <?php $j=1; //pr($slot['advertise']);
                foreach($slot['advertise'] as $advertise){
            ?>
            <tr>
                <td><?php echo $i?>-<?php echo $j?></td>
                <td><?php echo $advertise->cust_name;?></td>
                <td><?php echo $advertise->start_date;?></td>
                <td><?php echo $advertise->end_date;?></td>
                <td>
                    <a class="various4" href="/admin/advertise/edit_config_ads/<?php echo $advertise->slot_id?>_<?php echo $advertise->id; ?>" >Edit</a> | 
                    <a class="various3" href="/admin/advertise/create_schedule/<?php echo $advertise->slot_id?>/<?php echo $advertise->add_slot_no; ?>/<?php echo $advertise->id; ?>" >Schedule</a>
                </td>
                
            </tr>
            <?php $j++; }?>
        </table>
        <?php }else{?>
        
        <?php }?>
        <?php $i++; }?>
    <div style="clear: both;"></div>
  </div>
 </div>
</div>
<script type="text/javascript">
    $(document).ready(function() {

            $(".various3").fancybox({
                    'width'			: '60%',
                    'height'                    : '90%',
                    'autoScale'                 : false,
                    'transitionIn'		: 'none',
                    'transitionOut'		: 'none',
                    'type'			: 'iframe'
            });
            $(".various4").fancybox({
                    'width'			: '75%',
                    'height'                    : '90%',
                    'autoScale'                 : false,
                    'transitionIn'		: 'none',
                    'transitionOut'		: 'none',
                    'type'			: 'iframe'
            });
    });
    
    function fnconfirm(){
        
        var r = confirm("Are you sure it will add 1 rows in every table");
        if (r == true) {
            
        } else {
            return false;
        }
    }
</script>
