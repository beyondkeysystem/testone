<?php
$is_active = array(
    '1'=>'Active',
    '0'=>'Inactive'
);

$music_categories = array(
    'pleasant'=>'pleasant',
    'soothing'=>'soothing',
    'fun'=>'fun',
    'sporty'=>'sporty',
    'romantic'=>'romantic'
);
?>
<div class="container top">
    <ul class="breadcrumb">
        <li>
            <a href="<?php echo site_url("admin"); ?>">
                <?php echo ucfirst($this->uri->segment(1)); ?>
            </a> 
            <span class="divider">/</span>
        </li>
        <li>
            <a href="<?php echo site_url("admin") . '/' . $this->uri->segment(2).'/manage'; ?>">
                <?php echo ucfirst($this->uri->segment(2)); ?>
            </a> 
            <span class="divider">/</span>
        </li>
        <li class="active">
            <a href="#">
                <?php $action = $this->uri->segment(3)?>
                <?php 
                    if(isset($action) and $action =='update'){
                        echo 'Update';
                    }else{
                        echo 'New';
                    }
                ?></a>
        </li>
    </ul>      
    <div class="page-header">
        <h2>
            
            <?php 
                    if(isset($action) and $action =='update'){
                        echo 'Update Music';
                    }else{
                        echo 'Add Music';
                    }
                ?>
        </h2>
    </div>
    <form accept-charset="utf-8" method="post" id="" class="form-horizontal" action="" enctype="multipart/form-data">
        <fieldset>
            
            <div class="control-group">
                <label for="inputError" class="control-label">Music Category</label>
                <div class="controls">
                    <select name="musics[music_category]">
                        <option value="">Select</option>
                        <?php foreach($music_categories as $music_category){?>
                        <option <?php if(isset($musics['music_category']) and $musics['music_category'] == $music_category) {?> selected <?php }?> value="<?php echo $music_category?>"><?php echo $music_category;?></option>
                        <?php }?>
                    </select>
                    <?php echo form_error('musics[music_category]', '<div class="form_error">', '</div>'); ?>
                </div>
            </div>
            <div class="control-group">
                <label for="inputError" class="control-label">Music Name</label>
                <div class="controls">
                    <input type="text" id="" name="musics[music_name]" value="<?php if (isset($musics['music_name'])) echo $musics['music_name']; ?>">
                    <?php echo form_error('musics[music_name]', '<div class="form_error">', '</div>'); ?>
                </div>
            </div>
            <div class="control-group">
                <label for="inputError" class="control-label">Music File</label>
                <div class="controls">
                    <input type="file" id="" name="musics[musics_file]" value="<?php if (isset($musics['musics_file'])) echo $musics['musics_file']; ?>">
                    <?php if(isset($error) and $error !=''){?> <div class="form_error"> <?php echo $error;?> </div> <?php } //echo form_error('musics[musics_file]', '<div class="form_error">', '</div>'); ?>
                </div>
            </div>
            <div class="form-actions">
                <button class="btn btn-primary" type="submit">Save changes</button>
                <button class="btn" type="reset">Cancel</button>
            </div>
        </fieldset>

    </form>

</div>
