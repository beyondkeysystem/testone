  <div class="page-header">
    <div class="container-fluid">
        <div class="pull-right">
            <button class="btn btn-primary" title="" data-toggle="tooltip" form="form-customer" type="submit" data-original-title="Save"><i class="fa fa-save"></i></button>
            <a class="btn btn-default" title="" data-toggle="tooltip" href="" data-original-title="Cancel"><i class="fa fa-reply"></i></a>
        </div>
        <h1>Shipping</h1>
      <ul class="breadcrumb">
                <li><a href="/admin/users">Home</a></li>
                <li><a href="/admin/shippings">Shipping</a></li>
              </ul>
    </div>
</div>
      <div class="container-fluid">
        <div class="panel panel-default">
          <div class="panel-heading">
              <h3 class="panel-title"><i class="fa fa-pencil"></i> Edit Shipping</h3>
          </div>
          <div class="panel-body">
            <?php echo $this->Form->create('ShippingPrice',array('class'=>"form-horizontal", 'id'=>"form-customer"));?>
            <ul class="nav nav-tabs">
                <li class="active"><a data-toggle="tab" href="#tab-general">Settings</a></li>
            </ul>
            <div class="tab-content">
                <div id="tab-general" class="tab-pane active">
                    <div class="row">
                        <div class="col-sm-10">
                            <div class="tab-content">
                                    <div id="tab-customer" class="tab-pane active">
                                        <div class="form-group">
                                            <label for="input-fax" class="col-sm-2 control-label">Shipping Price</label>
                                            <div class="col-sm-10">
                                                <?php echo $this->Form->number('price',array('class'=>"form-control",'placeholder'=>"Shipping Price",'required'=>falsec ));?>
                                                <?php echo $this->Form->error('price');?>
                                                <?php echo $this->Form->hidden('id');?>
                                            </div>
                                        </div>
                                        
                                    </div>
                   
                          </div>
                        </div> <!-- col-sm-10 line 47 -->
            </div> </div>
          </div>
        </div>
      </div>  
    </div>
  <?php echo $this->Form->end();?>