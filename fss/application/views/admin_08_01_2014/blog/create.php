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
    '1'=>'Active',
    '0'=>'Inactive'
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
            <a href="<?php echo site_url("admin") . '/' . $this->uri->segment(2); ?>/manage">
                <?php echo ucfirst($this->uri->segment(2)); ?>
            </a> 
            <span class="divider">/</span>
        </li>
        <li class="active">
            <a href="#">New</a>
        </li>
    </ul>      
    <div class="page-header">
        <h2>
            Adding <?php echo ucfirst($this->uri->segment(2)); ?>
        </h2>
    </div>
    <form accept-charset="utf-8" method="post" id="" class="form-horizontal" action="" enctype="multipart/form-data">
        <fieldset>
            <div class="control-group">
                <label for="inputError" class="control-label">Username</label>
                <div class="controls">
                    <select id="" class="span2" name="blogs[user_id]">
                        <option value="">Please select</option>
                        <?php foreach($users as $user_k => $users_v){?>
                            <option <?php if(isset($blog['user_id']) and $blog['user_id'] == $user_k){ ?> selected="selected" <?php }?> value="<?php echo $user_k;?>"><?php echo $users_v;?></option>
                        <?php }?>
                    </select>
                    <?php echo form_error('blogs[user_id]', '<div class="form_error">', '</div>'); ?>
                </div>
            </div>
            <div class="control-group">
                <label for="inputError" class="control-label">Category</label>
                <div class="controls">
                    <select id="" class="span2" name="blogs[category_id]">
                        <option value="">Please select</option>
                        <?php foreach($categories as $category_k => $category_v){?>
                            <option <?php if(isset($blog['category_id']) and $blog['category_id'] == $category_k){ ?> selected="selected" <?php }?> value="<?php echo $category_k;?>"><?php echo $category_v;?></option>
                        <?php }?>
                    </select>
                    <?php echo form_error('blogs[category_id]', '<div class="form_error">', '</div>'); ?>
                </div>
            </div>
            <div class="control-group">
                <label for="inputError" class="control-label">Blog Name</label>
                <div class="controls">
                    <input type="text" id="" name="blogs[blog_name]" value="<?php if (isset($blog['blog_name'])) echo $blog['blog_name']; ?>">
                    <?php echo form_error('blogs[blog_name]', '<div class="form_error">', '</div>'); ?>
                </div>
            </div>
            <div class="control-group">
                <label for="inputError" class="control-label">Music</label>
                <div class="controls">
                    <input type="file" id="" name="music" value="<?php if (isset($blog['music'])) echo $blog['music']; ?>">
                    <?php echo form_error('music', '<div class="form_error">', '</div>'); ?>
                </div>
            </div>
            <div class="control-group">
                <label for="inputError" class="control-label">Image</label>
                <div class="controls">
                    <input type="file" id="" name="image" value="<?php if (isset($blog['image'])) echo $blog['image']; ?>">
                    <?php echo form_error('image', '<div class="form_error">', '</div>'); ?>
                </div>
            </div>
            <div class="control-group">
                <label for="inputError" class="control-label">Video</label>
                <div class="controls">
                    <input type="file" id="" name="video" value="<?php if (isset($blog['video'])) echo $blog['video']; ?>">
                    <?php echo form_error('video', '<div class="form_error">', '</div>'); ?>
                </div>
            </div>
            <div class="control-group">
                <label for="inputError" class="control-label">Blog Name</label>
                <div class="controls">
                    <textarea name="blogs[comment]"><?php if (isset($blog['comment'])) echo $blog['comment']; ?></textarea>
                    <?php echo form_error('blogs[comment]', '<div class="form_error">', '</div>'); ?>
                </div>
            </div>
            <div class="form-actions">
                <button class="btn btn-primary" type="submit">Save changes</button>
                <button class="btn" type="reset">Cancel</button>
            </div>
        </fieldset>

    </form>

</div>
