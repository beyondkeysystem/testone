<?php //pr($data); ?>
<div class="modal fade" id="basicModal-img" tabindex="-1" role="dialog" aria-labelledby="basicModal" aria-hidden="true">
  <div class="modal-dialog"><button type="button" class="btn btn-default" data-dismiss="modal">X</button>
    <div class="modal-content">
      <div class="login-head"><i class="fa fa-user"></i> Edit Image</div>
      <form enctype="multipart/form-data" method="post" action="/users/edit_image" class="col-md-12">
        
          <div class="img-edit" id="edit_image">
              <?php if(isset($data->profile_pic) and $data->profile_pic !=''){?>
                    <img width="156" height="168" src="/uploads/profile/<?php echo $data->profile_pic?>" alt="img" class="bdr">
                    <?php }else{?>
                        <img width="156" height="168" src="/assets/front/images/water-img1.jpg" alt="img" class="bdr">
                    <?php }?>
        </div>
        <div class="l fl img-upload"><span class="songbtn_bg">Upload File... </span>
            <input type="file" onchange="readImageURL(this)" value="" id="uping-btn" name="image">
        </div>
        <div class="btn-row">
        <button class="btn-4">Save</button>
        </div>
        
      </form>
    </div>
  </div>
</div>
<div class="container main-cnt">
    <div class="form-title">
        <h3 class="cmn-heading"><span>Update Your Profile</span></h3>
        <p>Please fill up the form below in order to get notificaiton as soon as our beta version is online.</p>
        <div style="color: red">
            <?php if(isset($_GET['e']) and $_GET['e']=='f'){?><p>Invalid file format you have uploaded image</p><?php }?>
            <?php if(isset($_GET['e']) and $_GET['e']=='s'){?><p>Please upload lass size image</p><?php }?>
        </div>
    </div>
    <div class="row edit_image">
        
        <div class="img-wtr edit-img-form" id="preview">
            <p>
                <a href="javascript:;" data-toggle="modal" data-target="#basicModal-img">
                    <?php if(isset($data->profile_pic) and $data->profile_pic !=''){?>
                    <img width="156" height="168" src="/uploads/profile/<?php echo $data->profile_pic?>" alt="img" class="bdr">
                    <?php }else{?>
                        <img width="156" height="168" src="/assets/front/images/water-img1.jpg" alt="img" class="bdr">
                    <?php }?>
                </a>
            </p>
            </div>
        
    </div>
    <div class="sign-form">
        <form action="" method="post" />
        <div class="sig-up-left profile-left ">
            <div class="form-group">
                <span class="error-msg-sign"><?php echo form_error('firstname'); ?></span>
                <div class="input-group">
                    <p>First name</p>
                    <input type="text" name="firstname" value="<?php echo $data->firstname ?>" class="form-control" placeholder="First name" autocomplete="off">
                </div>
            </div>
            <div class="form-group">
                <span class="error-msg-sign"><?php echo form_error('lastname'); ?></span>
                <div class="input-group">
                    <p>Last Name</p>
                    <input type="text" name="lastname" value="<?php echo $data->lastname;?>" class="form-control" placeholder=" Last Name" autocomplete="off">
                </div>
            </div>
            <div class="form-group">
                <span class="error-msg-sign"><?php echo form_error('username'); ?></span>
                <div class="input-group">
                    <p>User Name</p>
                    <input type="text" name="username" value="<?php echo $data->username;?>" class="form-control" placeholder="Username" autocomplete="off">
                </div>
            </div>
            <div class="form-group">
                <span class="error-msg-sign"><?php echo form_error('email'); ?></span>
                <div class="input-group">
                    <p>E-mail</p>
                    <input type="text" name="email" value="<?php echo $data->email;?>" class="form-control" placeholder="E-mail" autocomplete="off">
                </div>
            </div>


            <div class="form-group">
                <span class="error-msg-sign"><?php echo form_error('dob'); ?></span>
                <div class="input-group dob-txt">
                    <p>Date Of Birth</p>
                    <span class="cal-1"><a href="#"><i class="fa fa-calendar"></i></a></span>
                    <input type="text" name="dob" value="<?php if(isset($data->dob) and $data->dob !=''){ echo $data->dob;}else{?>1900-01-01<?php }?>" class="form-control datepicker" placeholder="Date Of birth" autocomplete="off" />
                </div>
            </div>
            <div class="form-group">
                <span class="error-msg-sign"><?php echo form_error('mobile'); ?></span>
                <div class="input-group">
                    <p>Mobile</p>
                    <input type="text" name="mobile" value="<?php echo $data->mobile;?>" class="form-control" placeholder="Mobile" autocomplete="off">
                </div>
            </div>
            <div class="form-group gender-txt">
                <span class="error-msg-sign"><?php echo form_error('gender'); ?></span>
                Gender 
                <span class="gender-1">
                    <input type="radio" <?php if(isset($data->gender) and $data->gender == 'Male'){?> checked <?php }?> class="css-checkbox" value="Male" id="radio11" name="gender">
                    <label class="css-label radGroup1" for="radio11">Male</label>
                </span> 
                <span class="gender-1">
                    <input type="radio" <?php if(isset($data->gender) and $data->gender == 'Female'){?> checked <?php }?> class="css-checkbox" value="Female" id="radio12" name="gender">
                    <label class="css-label radGroup1" for="radio12">Fe-male</label>
                </span> 
            </div>
            <div class="clearfix"></div>
            <div class="form-group btnbox">
                <button type="submit" class="btn btn-primary btn-login">Update Now </button>
            </div>
        </div>
    </form>
        <div class="clearfix"></div>
    </div>
</div>
<script>
    $(function() {
        $('.datepicker').datepicker({
            dateFormat: "yy-mm-dd",
            changeYear: true,
            changeMonth: true,
            yearRange: "1900:<?php echo date('Y') ?>"});

    })
    var _URL = window.URL || window.webkitURL;
    function readImageURL(input) {
        if (input.files && input.files[0]) {
            var img = new Image();
            img.onload = function () {
             if(this.width != "467" && this.height != "128"){
                  //alert('Your image dimensions are incorrect: 467x128');
                  $('#edit_image').html('');
                 var img = $('<img width="156" height="168" id="dynamic">'); //Equivalent: $(document.createElement('img'))
                    img.attr('src', this.src);
                    img.appendTo('#edit_image');                
             }else{
                  
                $('#edit_image').html('');
                 var img = $('<img width="156" height="168" id="dynamic">'); //Equivalent: $(document.createElement('img'))
                    img.attr('src', this.src);
                    img.appendTo('#edit_image');
             }
              
            };   
            img.src = _URL.createObjectURL(input.files[0]);
        }
    }
</script>