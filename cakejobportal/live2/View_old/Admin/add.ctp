<style>
 div.view{border-left:none !important;margin-top:-18% !important;}
</style>
<div style="padding:0%;float:none !important;margin-left:3%;"class=" view users index">
    <?php echo $this->Form->create('User'); ?>
    <fieldset>
        <?php
        echo $this->Form->input('name');
        if ($url_type == "candidate") {
            echo $this->Form->input('emp_name', array('type' => 'select', 'options' => $options, 'value' => $options, 'empty' => 'Select clinician', 'div' => array('class' => 'input select required')));
        }
        echo $this->Form->input('sex', array('type' => 'select', 'options' => array('male' => 'Male', 'female' => 'Female'), 'empty' => 'Please select'));
        echo $this->Form->input('email');
        echo $this->Form->input('password');
        echo $this->Form->input('mobile', array('type' => 'text', 'id' => 'mobile_id'));
        if ($url_type == "clinician") {
            echo $this->Form->input('type', array('type' => 'hidden', 'value' => 'clinician'));
        }
        if ($url_type == "patient") {
            echo $this->Form->input('type', array('type' => 'hidden', 'value' => 'patient'));
        }

        echo $this->Form->input('address');
        echo $this->Form->input('percentage', array('type' => 'hidden', 'value' => '00'));
        echo $this->Form->input('status', array('type' => 'hidden', 'value' => 'D'));
        echo $this->Form->end(__('Submit'));
        ?>
     </fieldset>
   
</div>

