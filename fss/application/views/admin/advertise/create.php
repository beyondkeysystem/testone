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
            <a href="<?php echo site_url("admin") . '/' . $this->uri->segment(2); ?>">
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
    <form accept-charset="utf-8" method="post" id="" class="form-horizontal" action="">
        <fieldset>
            <div class="control-group">
                <label for="inputError" class="control-label">Advertise Name</label>
                <div class="controls">
                    <input type="text" id="UserEmail" name="advertise[advertise_name]" value="<?php if (isset($advertise['advertise_name'])) echo $advertise['advertise_name']; ?>">
                    <?php echo form_error('advertise[advertise_name]', '<div class="form_error">', '</div>'); ?>
                </div>
            </div>
            <div class="control-group">
                <label for="inputError" class="control-label">Advertise Code</label>
                <div class="controls">
                    <textarea cols="50" rows="6" name="advertise[amb_code]"><?php if(isset($advertise['amb_code']) and $advertise['amb_code'] == !''){echo $advertise['amb_code'];}?></textarea>
                    <?php echo form_error('advertise[amb_code]', '<div class="form_error">', '</div>'); ?>
                </div>
            </div>
            <div class="control-group">
                <label for="inputError" class="control-label">Is Active</label>
                <div class="controls">
                    <select id="UserGender" class="span2" name="advertise[is_active]">
                        <?php foreach($is_active as $active_k => $active_v){?>
                            <option <?php if(isset($advertise['is_active']) and $advertise['is_active'] == $active_k){ ?> selected="selected" <?php }?> value="<?php echo $active_k;?>"><?php echo $active_v;?></option>
                        <?php }?>
                    </select>
                </div>
            </div>
            <div class="form-actions">
                <button class="btn btn-primary" type="submit">Save changes</button>
                <button class="btn" type="reset">Cancel</button>
            </div>
        </fieldset>

    </form>

</div>
