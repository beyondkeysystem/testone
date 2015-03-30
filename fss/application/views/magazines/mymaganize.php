<?php //pr($magazines)?>
<div class="container main-cnt">
    <?php $this->load->view('elements/magazine_page');?>
    <div class="row cmn-in">
  <div class="col-sm-12">
  <div class="wtr-right">
  <div class="my-mgn-tabs">
  <ul>
  <li class="active"><a href="#">Published</a> </li>            
  <li><a href="#">been dismissed</a></li>
  <li class="crt-m"><a href="/magazines/create"><i class="fa fa-plus"></i> Create a magazine</a></li>
  </ul>
  </div>
  
        <?php if(!empty($magazines)){?>
        <?php foreach($magazines as $magazine){
            //pr($magazine['images'][0]->image_name);
            ?>
      <div class="col-sm-4 prd-box">
          <div class="in-close"><a href="javascript:;" onclick="fndeletearticle('<?php echo $magazine['articles']->id;?>');">X</a></div>
          <div class="min-prdbox">
              
              <a href="/magazines/detail/<?php echo $magazine['articles']->id;?>">
              <div class="col-sm-7 prd-img">
                  <div class="img-cap"> <span class="txt-cap"><?php echo $magazine['articles']->title;?></span> 
                      <img alt="img" width="231" height="322" src="/uploads/images/<?php echo $magazine['images'][0]->image_name;?>"></div>
              </div>
              </a>
              <div class="col-sm-5">
                  <p class="thumb"><img alt="thumb" width="80" src="/qr/<?php echo $magazine['articles']->qr_code_img?>"></p>
                  <p class="athr-txt">Author: <span><br>
                          <?php echo $this->session->userdata('username');?></span> </p>
                  <p class="athr-txt">Created: <span><?php echo date('m-d-Y',strtotime($magazine['articles']->created))?></span> </p>
                  <p class="athr-txt">Pages: <span><?php echo count($magazine['images']);?></span> </p>
                  <p class="athr-txt">Read: <span><?php echo $magazine['articles']->read_count?></span> </p>
                  <p class="athr-txt">Favorites: <span><?php echo $magazine['articles']->favorites_count?></span> </p>
              </div>
              <div class="edit-list form-group">
                  <ul>
                      <li><a href="/magazines/edit/<?php echo $magazine['articles']->id;?>"><i class="fa fa-edit"></i> Editor</a></li>
                      <li><a href="javascript:;"><i class="fa fa-share-alt-square"></i> Share it</a></li>
                      <li><input type="checkbox" class="css-checkbox" id="checkboxG6" name="checkboxG4">
                          <label class="css-label" for="checkboxG6">Undisclosed</label> </li>
                      <li><a href="javascript:;"><i class="fa fa-signal"></i> Promotion</a></li>
                      <li><a href="javascript:;"><i class="fa fa-ban"></i> To Advertising</a></li>
                  </ul>
              </div>
          </div>
      </div>
      <?php }?>
        <?php }else{?>
      <div>No record found</div>
        <?php }?>
      <div class="clearfix"></div>
  </div>
  </div>
</div>
</div>

<script>
    function fndeletearticle(id){
        //alert(id);
        var r = confirm("Are you sure you want to delete.");
        if (r == true) {
            $.ajax({
                type: "POST",
                url: '/magazines/deletemagazine/'+id,
                data: { }
            })
            .done(function( msg ) {
                location.reload();
            });
        }
    }
</script>