<div class="page-header">
    <div class="container-fluid">
        <div class="pull-right">
            <?php echo $this->Html->link('Add New <i class="fa fa-plus"></i>','/admin/customergroups/add',array('class'=>'btn btn-primary','escape'=>false,'data-toggle'=>'tooltip','data-original-title'=>"Add New"));?>
            <button onclick="confirm('Delete/Uninstall cannot be undone! Are you sure you want to do this?') ? $('#form-customer').submit() : false;" class="btn btn-danger" title="" data-toggle="tooltip" type="button" data-original-title="Delete"><i class="fa fa-trash-o"></i></button>
        </div>
        <h1>Customer Groups</h1>
    </div>
</div>
<div class="container-fluid">
    <div class="panel panel-default">
        <div class="panel-body">
            
            <form id="form-customer" enctype="multipart/form-data" method="post" action="">
                <div class="table-responsive">
                    <table class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <td class="text-center" style="width: 1px;">
                                    <input type="checkbox" onclick="$('input[name*=\'selected\']').prop('checked', this.checked);">
                                </td>
                                <td class="text-left">
                                    <?php echo $this->Paginator->sort('name',__('Customer Group Name')); ?>
                                    
                                </td>
                                <td class="text-left"><?php echo $this->Paginator->sort('sort_order',__('Sort Order')); ?></td>
                                <td class="text-right">Action</td>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if(!empty($results)){?>
                            <?php foreach($results as $result){?>
                            <tr>
                                <td class="text-center">                    
                                    <input type="checkbox" value="<?php echo $result['CustomerGroup']['id'];?>" name="selected[]">
                                </td>
                                <td class="text-left"><?php echo $result['CustomerGroup']['name'];?></td>
                                <td class="text-left"><?php echo $result['CustomerGroup']['sort_order'];?></td>
                                <td class="text-right">  
                                    <?php echo $this->Html->link('<i class="fa fa-pencil"></i>','/admin/customergroups/edit/'.$result['CustomerGroup']['id'],array('class'=>"btn btn-primary", "title"=>"", "data-toggle"=>"tooltip", "data-original-title"=>"Edit",'escape'=>false));?>
                                    
                                </td>
                            </tr>
                            <?php }?>
                            <?php }else{?>
                            <tr>
                                <td colspan="4">No Record found</td>
                            </tr>
                            <?php }?>
                            
                        </tbody>
                    </table>
                </div>
            </form>
            <div class="row">
            <?php
                echo $this->Paginator->numbers(array(
                    'before' => '<div class="col-sm-6 text-left"><ul class="pagination">',
                    'separator' => '',
                    'currentClass' => 'active',
                    'tag' => 'li',
                    'currentTag'=>'span',
                    'after' => '</ul></div>'
                ));
                ?>
            </div>
        </div>
    </div>
</div>
</div>