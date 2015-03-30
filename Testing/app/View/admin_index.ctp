  <?php //pr($results); exit; //$results['FcodeProduct']; ?>
  <div class="page-header">
    <div class="container-fluid">
      <div class="pull-right">
      <?php 
        echo $this->Html->link(
          '<i class="fa fa-plus"></i>',
          array('controller' => 'fcodes', 
                  'action' => 'add'),
          array('class' => 'btn btn-primary',
            'data-original-title' => 'Add New',
            'escape' => false)
        )."&nbsp;";
      ?>
      <button data-original-title="Disable" type="submit" form="form-fcodes-e" formaction="/admin/fcodes/delete" data-toggle="tooltip" title="" class="btn btn-danger" onclick="$('#form-fcodes-e').hide(); confirm('Disable! Are you sure you want to do this?') ? $('#form-codes-e').submit() : false;"><i class="fa fa-thumbs-o-down"></i></button>
      <button data-original-title="Enable" type="submit" form="form-fcodes-e" formaction="/admin/fcodes/enable" data-toggle="tooltip" title="" class="btn btn-danger" onclick="$('#form-fcodes').hide();confirm('Enable! Are you sure you want to do this?') ? $('#form-codes-e').submit() : false;"><i class="fa fa-thumbs-o-up"></i></button>

      
      </div>
      <h1>F-Codes</h1>
      <ul class="breadcrumb">
                <li><a href="/admin/">Home</a></li>
                <li><a href="/admin/fcodes">Fcodes</a></li>
              </ul>
    </div>
  </div>
  <div class="container-fluid">
    <div class="panel panel-default">
      <div class="panel-heading">
        <h3 class="panel-title"><i class="fa fa-list"></i> F-Code List</h3>
      </div>
        <!--<form id="form-customer" enctype="multipart/form-data" method="post" action="">-->
      <?php echo $this->Form->create("Fcode",array('class'=>'form-horizontal','name' => 'form-fcodes-e', 'id' => 'form-fcodes-e'));?>
          <div class="table-responsive">
            <table class="table table-bordered table-hover">
              <thead>
                <tr>
                  <td class="text-center" style="width: 1px;"><input type="checkbox" onclick="$('input[name*=\'selected\']').prop('checked', this.checked);"></td>
                  <td class="text-left">
                    <?php echo $this->Paginator->sort('code',__('Code')); ?>
                  </td>
                  <td class="text-left">                    
                    <?php echo $this->Paginator->sort('details',__('Details')); ?>
                  </td>
                  <td class="text-left">
                    <?php echo $this->Paginator->sort('date_start',__('Start Date')); ?>
                  </td>                  
                  <td class="text-left">
                    <?php echo $this->Paginator->sort('date_end',__('End Date')); ?>
                  </td>
                  <td class="text-left">
                  <?php echo __('Customer'); ?>
                  </td>
                  <td class="text-left">
                  <?php echo __('Status'); ?>
                  </td>
                  <td class="text-left">
                  <?php echo __('Products'); ?>
                  </td>  
                  <td class="text-left">
                 <?php echo $this->Paginator->sort('total',__('Total')); ?>
                  </td>
                  <td class="text-left">
                  <?php echo $this->Paginator->sort('created',__('Date Added')); ?>
                  </td>
                 <!-- <td class="text-right">Action</td>-->
                </tr>
              </thead>
              <tbody>
                  <?php
                    $i=0;
                    foreach($results as $fcode){
                       $str = '';
                      if(!empty($fcode['FcodeProduct'])){
                        $str = '';
                      foreach($fcode['FcodeProduct'] as $valK){
                        if(!empty($valK['product_name'])){
                          $str .= $valK['product_name'];
                          $str .= ", ";
                        }
                      }                      
                      $str=substr($str,0,-2);
                      }
                      
                      $i++;
                  ?>
                    <tr> 
                      <td class="text-center">
                        <input name="selected[]" value="<?=$fcode['Fcode']['id']?>" type="checkbox">
                      </td>
                      <td class="text-left"><?=$fcode['Fcode']['code']?></td>
                      <td class="text-left"><?=$fcode['Fcode']['details']?></td>
                      <td class="text-left"><?=$fcode['Fcode']['date_start']?></td>
                      <td class="text-left"><?=$fcode['Fcode']['date_end']?></td>
                      <td class="text-left"><?=$fcode['User']['username']?> <?=$fcode['User']['phone']?></td>
                      <td class="text-left"><?php if($fcode['Fcode']['status']=='5') echo "Disabled"; else echo "Enabled";?></td>
                      <td class="text-left"><?=($str)?$str:'-'?></td>
                      <td class="text-left"><?=$fcode['Fcode']['total']?></td>
                      <td class="text-left"><?=$fcode['Fcode']['created']?></td>
                      <!--<td class="text-right">
                        <?php
                          echo $this->Html->link(
                              '<i class="fa fa-pencil"></i>',
                              array('controller' => 'fcodes', 
                                      'action' => 'edit/'.$fcode['Fcode']['id']),
                              array('class' => 'btn btn-primary',
                                'data-original-title' => 'Edit',
                                'escape' => false)
                          );
                        ?>
                      </td>-->
                    </tr>                    
                  <?php
                    }
                  ?>
                  </tbody>
            </table>
          </div>
        <?php echo $this->Form->end(); ?>
        
        <div class="row">
          <div class="col-sm-6 text-left"><ul class="pagination">
          <?php
          
          if($this->Paginator->counter('{:pages}') > 1) {
            $pageCount = $this->Paginator->counter('{:pages}');
            echo "<li><a href='/admin/fcodes'>|&lt;</a></li>";
            echo $this->Paginator->prev('<span>&lt;</span>', array('tag' => 'li', 'escape' => false), null, array('tag' => 'li', 'escape' => false));
            echo $this->Paginator->numbers(array(
                'separator' => '',
                'currentClass' => 'active',
                'tag' => 'li',
                'currentTag'=>'span',                
            ));
            echo $this->Paginator->next('<span>&gt;</span>', array('tag' => 'li', 'escape' => false), null, array('tag' => 'li', 'escape' => false));
            echo "<li><a href='/admin/fcodes/index/page:".$pageCount."'>|&gt;</a></li>";
}
          ?>
          </ul>
          </div>
        </div>
        
        <!--<div class="row">          
          <div class="col-sm-6 text-left"><ul class="pagination"><li><a href="">|&lt;</a></li><li><a href="">&lt;</a></li><li><a href="">5</a></li><li><a href="">6</a></li><li><a href="">7</a></li><li><a href="">8</a></li><li class="active"><span>9</span></li><li><a href="">10</a></li><li><a href="">11</a></li><li><a href="">12</a></li><li><a href="">13</a></li><li><a href="">&gt;</a></li><li><a href="">&gt;|</a></li></ul></div>
          <div class="col-sm-6 text-right">Showing 161 to 180 of 1485 (75 Pages)</div>
        </div>-->
      </div>
    </div>
  </div>
  </div>
  <script>
    function enabled(){
      var datastring = $("#form-fcode-disable").serialize();
        $.ajax({
            type: "POST",
            url: "/admin/fcodes/enable",
            data: datastring,
            success: function(data) {
                 alert('Data send');
            }
        });
     console.log(datastring);
    }
  </script>