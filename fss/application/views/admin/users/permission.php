<?php echo $this->load->view('elements/admin_css_js');?>
<script src="/assets/js/chosen.jquery.js"></script>
<link rel="stylesheet" type="text/css" href="/assets/css/admin/chosen.css" media="screen" />

<div class="container">
    <h2 class="page-header">
            Add Permission
        </h2>
    <form accept-charset="utf-8" method="post" id="" class="form-horizontal" action="" enctype="multipart/form-data">
        <input type="hidden" name="testval" value="1" />
        <fieldset>
            <div class="control-group">
                <label for="inputError" class="control-label">Blog</label>
                <div class="controls">
                    <?php //pr($permission_data);?>
                    <select data-placeholder="Your Favorite Types of Bear" name="blog_id[]" style="width:350px;" multiple class="chosen-select" tabindex="8">
                    <option value=""></option>
                    <?php  foreach($users as $user_k=>$user_v){?>
                    <option <?php if(!empty($permission_data) and in_array($user_k,$permission_data)){?> selected <?php }?> value="<?php echo $user_k?>"><?php echo $user_v?></option>
                    <?php }?>
                  </select>
                    <script type="text/javascript">
                    var config = {
                      '.chosen-select'           : {},
                      '.chosen-select-deselect'  : {allow_single_deselect:true},
                      '.chosen-select-no-single' : {disable_search_threshold:10},
                      '.chosen-select-no-results': {no_results_text:'Oops, nothing found!'},
                      '.chosen-select-width'     : {width:"95%"}
                    }
                    for (var selector in config) {
                      $(selector).chosen(config[selector]);
                    }
                  </script>
                </div>
            </div>
            <div class="form-actions">
                <button class="btn btn-primary" type="submit">Save changes</button>
            </div>
        </fieldset>

    </form>

</div>
