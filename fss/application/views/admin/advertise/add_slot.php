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
        </li>
        <li>
            Slot
        </li>
        <li class="active">
            <a href="#">New</a>
        </li>
    </ul>      
    <div class="page-header">
        <h2>
            Add Slot
        </h2>
    </div>
    <form accept-charset="utf-8" method="post" id="" class="form-horizontal" action="">
        <fieldset>
            <div class="control-group">
                <label for="inputError" class="control-label">Slot Name</label>
                <div class="controls">
                    <input type="text" id="UserEmail" name="slots[name]" value="<?php if (isset($slot['name'])) echo $slot['name']; ?>">
                    <?php echo form_error('slots[name]', '<div class="form_error">', '</div>'); ?>
                </div>
            </div>
            <div class="form-actions">
                <button class="btn btn-primary" type="submit">Save changes</button>
                <button class="btn" type="reset">Cancel</button>
            </div>
        </fieldset>

    </form>

</div>
