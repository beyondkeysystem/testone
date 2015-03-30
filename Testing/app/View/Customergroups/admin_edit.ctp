<div id="content">
    <div class="page-header">
        <div class="container-fluid">
            <div class="pull-right">
                <button class="btn btn-primary" title="" data-toggle="tooltip" form="form-customer-group" type="submit" data-original-title="Save"><i class="fa fa-save"></i></button>
                <?php echo $this->Html->link('<i class="fa fa-reply"></i>','/admin/customergroups',array('class'=>"btn btn-default",'data-toggle'=>"tooltip",'data-original-title'=>"Cancel",'escape'=>false));?>
            </div>
            <h1>Customer Groups</h1>
        </div>
    </div>
    <div class="container-fluid">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title"><i class="fa fa-pencil"></i> Add Customer Group</h3>
            </div>
            <div class="panel-body">
                    <?php echo $this->Form->create('CustomerGroup',array('class'=>"form-horizontal",'id'=>"form-customer-group"));?>
                    <?php echo $this->Form->hidden('id');?>
                    <div class="form-group required">
                        <label for="input-sort-order" class="col-sm-2 control-label">Customer Group Name</label>
                        <div class="col-sm-10">
                            <?php echo $this->Form->text('name',array('required'=>false,'class'=>"form-control",'placeholder'=>"Customer Group Name"));?>
                                <?php echo $this->Form->error('name');?>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="input-sort-order" class="col-sm-2 control-label">Customer Group Name</label>
                        <div class="col-sm-10">
                            <?php echo $this->Form->textarea('description',array('class'=>"form-control",'placeholder'=>"Description",'rows'=>"5"));?>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label">
                            <span title="" data-toggle="tooltip" data-original-title="Customers must be approved by an administrator before they can login.">Approve New Customers</span></label>
                        <div class="col-sm-10">
                            <label class="radio-inline">
                                <input type="radio" <?php if(isset($this->request->data['CustomerGroup']['approval']) and $this->request->data['CustomerGroup']['approval']=='1'){?> checked="checked" <?php }?> value="1" name="data[CustomerGroup][approval]">
                                Yes                              
                            </label>
                            <label class="radio-inline">
                                <input type="radio" <?php if(isset($this->request->data['CustomerGroup']['approval']) and $this->request->data['CustomerGroup']['approval']=='0'){?> checked="checked" <?php }?> value="0" name="data[CustomerGroup][approval]">
                                No                              
                            </label>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="input-sort-order" class="col-sm-2 control-label">Sort Order</label>
                        <div class="col-sm-10">
                            <?php echo $this->Form->number('sort_order',array('class'=>"form-control",'placeholder'=>"Sort Order"));?>
                        </div>
                    </div>
                <?php echo $this->Form->end();?>
            </div>
        </div>
    </div>
</div>