<?php
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
                ?>
            </a>
        </li>
    </ul>      
    <div class="page-header">
        <h2>
            <?php 
                    if(isset($action) and $action =='update'){
                        echo 'Update Category';
                    }else{
                        echo 'Add New Category';
                    }
                ?>
        </h2>
    </div>
    <form accept-charset="utf-8" method="post" id="" class="form-horizontal" action="">
        <fieldset>
            <div class="control-group">
                <label for="inputError" class="control-label">Category Name</label>
                <div class="controls">
                    <input type="text" id="" name="categories[category_name]" value="<?php if (isset($categories['category_name'])) echo $categories['category_name']; ?>">
                    <?php echo form_error('categories[category_name]', '<div class="form_error">', '</div>'); ?>
                </div>
            </div>
<!--            <div class="control-group">
                <label for="inputError" class="control-label">Advertise Name</label>
                <div class="controls">
                    <select id="" class="span2" name="categories[adverties_id]">
                        <?php foreach($advertises as $active_k => $active_v){?>
                            <option <?php if(isset($categories['adverties_id']) and $categories['adverties_id'] == $active_k){ ?> selected="selected" <?php }?> value="<?php echo $active_k;?>"><?php echo $active_v;?></option>
                        <?php }?>
                    </select>
                    <?php echo form_error('categories[adverties_id]', '<div class="form_error">', '</div>'); ?>
                </div>
            </div>-->
            <div class="control-group">
                <label for="inputError" class="control-label">Is Active</label>
                <div class="controls">
                    <select id="" class="span2" name="categories[is_active]">
                        <?php foreach($is_active as $active_k => $active_v){?>
                            <option <?php if(isset($categories['is_active']) and $categories['is_active'] == $active_k){ ?> selected="selected" <?php }?> value="<?php echo $active_k;?>"><?php echo $active_v;?></option>
                        <?php }?>
                    </select>
                </div>
            </div>
            <div class="form-actions">
                <button class="btn btn-primary" type="submit">Save changes</button>
                <button class="btn" onclick="window.location.href = '/admin/categories/manage'" type="reset">Cancel</button>
            </div>
        </fieldset>

    </form>

</div>
