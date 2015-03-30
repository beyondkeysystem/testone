<style>
    .imgback{background-image: url("/assets/img/back.png"); background-repeat: no-repeat;min-height: 50px;}
    .imgback .radiobtn {width   : 28px;margin: 18px 36px;}
</style>

<?php
$pagename = array(
    'home'=>'Home',
    'review'=>'Review'
);

$places = array(
    'Top Center'=>'Top Center',
    'Left'=>'Left',
    'Right'=>'Right',
    'Bottom'=>'Bottom'
);
$is_active = array(
    'Active'=>'Active',
    'Inactive'=>'Inactive'
);
?>

<div class="wrapper">
    <h4 class="pt10 h4cls">File Segments</h4>
    <div class="widgets">
        <div class="oneTwo big_form">
            <div class="widget">
                <form method="post" id="" class="form" action="" enctype="multipart/form-data">
                    <fieldset>
                        <?php //pr($users['email']);exit;?>
                        <div class="formRow">
                            File Name            
                            <div class="formRight">
                                <input type="text" id="UserFirstname" name="file_segments[file_name]" value="<?php if(isset($file_segments['file_name'])) echo $file_segments['file_name'];?>">
                                <?php echo form_error('file_segments[file_name]', '<div class="form_error">', '</div>'); ?>
                            </div>
                            
                            <div class="clear"></div>
                        </div>
                        <div class="formRow">
                            File Size
                            <div class="formRight">
                                <input type="number" name="file_segments[file_size]" id="" />
                                <?php echo form_error('file_segments[file_size]', '<div class="form_error">', '</div>'); ?>
                            </div>
                            
                            <div class="clear"></div>
                        </div>
                        <div class="formRow">
                            File
                            <div class="formRight">
                                <input type="file" name="file_segments" id="" />
                                <?php echo form_error('file_segments', '<div class="form_error">', '</div>'); ?>
                            </div>
                            
                            <div class="clear"></div>
                        </div>
                        <div class="formRow">
                            Code            
                            <div class="formRight">
                                <textarea cols="50" rows="6" name="file_segments[comment]"><?php if(isset($file_segments['comment']) and $file_segments['comment'] == !''){echo $file_segments['comment'];}?></textarea>
                                <?php echo form_error('file_segments[comment]', '<div class="form_error">', '</div>'); ?>
                            </div>
                            
                            <div class="clear"></div>
                        </div>
                        <div class="formRow">
                            Is Active            
                            <div class="formRight"> 
                                <select id="UserGender" class="txt-field-full" name="file_segments[is_active]">
                                    <?php foreach($is_active as $active_k => $active_v){?>
                                        <option <?php if(isset($file_segments['is_active']) and $file_segments['is_active'] == $active_k){ ?> selected="selected" <?php }?> value="<?php echo $active_k;?>"><?php echo $active_v;?></option>
                                    <?php }?>
                                </select>
                                <?php //echo form_error('advertise[is_active]', '<div class="form_error">', '</div>'); ?>
                            </div>
                            <div class="clear"></div>
                        </div>                        
                        <div class="formRow">
                            <div class="submit"><input type="submit" value="Submit"></div>        
                        </div>
                    </fieldset>
                </form>        
            </div>
        </div>
    </div>
</div>