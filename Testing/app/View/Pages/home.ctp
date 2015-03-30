<div class="page-header">
        <div class="container-fluid">
          <div class="pull-right"><a data-original-title="Add New" href="http://demo.opencart.com/admin/index.php?route=catalog/category/add&amp;token=4aee6945576334af87965d94978c0cd7" data-toggle="tooltip" title="" class="btn btn-primary"><i class="fa fa-plus"></i></a> <a data-original-title="Rebuild" href="http://demo.opencart.com/admin/index.php?route=catalog/category/repair&amp;token=4aee6945576334af87965d94978c0cd7" data-toggle="tooltip" title="" class="btn btn-default"><i class="fa fa-refresh"></i></a>
            <button data-original-title="Delete" type="button" data-toggle="tooltip" title="" class="btn btn-danger" onclick="confirm('Delete/Uninstall cannot be undone! Are you sure you want to do this?') ? $('#form-category').submit() : false;"><i class="fa fa-trash-o"></i></button>
          </div>
          <h1>Categories</h1>
          <ul class="breadcrumb">
                    <li><a href="http://demo.opencart.com/admin/index.php?route=common/dashboard&amp;token=4aee6945576334af87965d94978c0cd7">Home</a></li>
                    <li><a href="http://demo.opencart.com/admin/index.php?route=catalog/category&amp;token=4aee6945576334af87965d94978c0cd7">Categories</a></li>
                  </ul>
        </div>
    </div>

      <div class="container-fluid">
        <div class="panel panel-default">
          <div class="panel-heading">
            <h3 class="panel-title"><i class="fa fa-list"></i> Category List</h3>
          </div>
          <div class="panel-body">
            <form action="http://demo.opencart.com/admin/index.php?route=catalog/category/delete&amp;token=4aee6945576334af87965d94978c0cd7" method="post" enctype="multipart/form-data" id="form-category">
              <div class="table-responsive">
                <table class="table table-bordered table-hover">
                  <thead>
                    <tr>
                      <td style="width: 1px;" class="text-center"><input onclick="$('input[name*=\'selected\']').prop('checked', this.checked);" type="checkbox"></td>
                      <td class="text-left">                    <a href="http://demo.opencart.com/admin/index.php?route=catalog/category&amp;token=4aee6945576334af87965d94978c0cd7&amp;sort=name&amp;order=DESC" class="asc">Category Name</a>
                        </td>
                      <td class="text-right">                    <a href="http://demo.opencart.com/admin/index.php?route=catalog/category&amp;token=4aee6945576334af87965d94978c0cd7&amp;sort=sort_order&amp;order=DESC">Sort Order</a>
                        </td>
                      <td class="text-right">Action</td>
                    </tr>
                  </thead>
                  <tbody>
                                                    <tr>
                      <td class="text-center">                    <input name="selected[]" value="33" type="checkbox">
                        </td>
                      <td class="text-left">Cameras</td>
                      <td class="text-right">6</td>
                      <td class="text-right"><a data-original-title="Edit" href="http://demo.opencart.com/admin/index.php?route=catalog/category/edit&amp;token=4aee6945576334af87965d94978c0cd7&amp;category_id=33" data-toggle="tooltip" title="" class="btn btn-primary"><i class="fa fa-pencil"></i></a></td>
                    </tr>
                                    <tr>
                      <td class="text-center">                    <input name="selected[]" value="25" type="checkbox">
                        </td>
                      <td class="text-left">Components</td>
                      <td class="text-right">3</td>
                      <td class="text-right"><a data-original-title="Edit" href="http://demo.opencart.com/admin/index.php?route=catalog/category/edit&amp;token=4aee6945576334af87965d94978c0cd7&amp;category_id=25" data-toggle="tooltip" title="" class="btn btn-primary"><i class="fa fa-pencil"></i></a></td>
                    </tr>
                                    <tr>
                      <td class="text-center">                    <input name="selected[]" value="29" type="checkbox">
                        </td>
                      <td class="text-left">Components&nbsp;&nbsp;&gt;&nbsp;&nbsp;Mice and Trackballs</td>
                      <td class="text-right">1</td>
                      <td class="text-right"><a data-original-title="Edit" href="http://demo.opencart.com/admin/index.php?route=catalog/category/edit&amp;token=4aee6945576334af87965d94978c0cd7&amp;category_id=29" data-toggle="tooltip" title="" class="btn btn-primary"><i class="fa fa-pencil"></i></a></td>
                    </tr>
                                    <tr>
                      <td class="text-center">                    <input name="selected[]" value="28" type="checkbox">
                        </td>
                      <td class="text-left">Components&nbsp;&nbsp;&gt;&nbsp;&nbsp;Monitors</td>
                      <td class="text-right">1</td>
                      <td class="text-right"><a data-original-title="Edit" href="http://demo.opencart.com/admin/index.php?route=catalog/category/edit&amp;token=4aee6945576334af87965d94978c0cd7&amp;category_id=28" data-toggle="tooltip" title="" class="btn btn-primary"><i class="fa fa-pencil"></i></a></td>
                    </tr>
                                    <tr>
                      <td class="text-center">                    <input name="selected[]" value="35" type="checkbox">
                        </td>
                      <td class="text-left">Components&nbsp;&nbsp;&gt;&nbsp;&nbsp;Monitors&nbsp;&nbsp;&gt;&nbsp;&nbsp;test 1</td>
                      <td class="text-right">0</td>
                      <td class="text-right"><a data-original-title="Edit" href="http://demo.opencart.com/admin/index.php?route=catalog/category/edit&amp;token=4aee6945576334af87965d94978c0cd7&amp;category_id=35" data-toggle="tooltip" title="" class="btn btn-primary"><i class="fa fa-pencil"></i></a></td>
                    </tr>
                                    <tr>
                      <td class="text-center">                    <input name="selected[]" value="36" type="checkbox">
                        </td>
                      <td class="text-left">Components&nbsp;&nbsp;&gt;&nbsp;&nbsp;Monitors&nbsp;&nbsp;&gt;&nbsp;&nbsp;test 2</td>
                      <td class="text-right">0</td>
                      <td class="text-right"><a data-original-title="Edit" href="http://demo.opencart.com/admin/index.php?route=catalog/category/edit&amp;token=4aee6945576334af87965d94978c0cd7&amp;category_id=36" data-toggle="tooltip" title="" class="btn btn-primary"><i class="fa fa-pencil"></i></a></td>
                    </tr>
                                    <tr>
                      <td class="text-center">                    <input name="selected[]" value="30" type="checkbox">
                        </td>
                      <td class="text-left">Components&nbsp;&nbsp;&gt;&nbsp;&nbsp;Printers</td>
                      <td class="text-right">1</td>
                      <td class="text-right"><a data-original-title="Edit" href="http://demo.opencart.com/admin/index.php?route=catalog/category/edit&amp;token=4aee6945576334af87965d94978c0cd7&amp;category_id=30" data-toggle="tooltip" title="" class="btn btn-primary"><i class="fa fa-pencil"></i></a></td>
                    </tr>
                                    <tr>
                      <td class="text-center">                    <input name="selected[]" value="31" type="checkbox">
                        </td>
                      <td class="text-left">Components&nbsp;&nbsp;&gt;&nbsp;&nbsp;Scanners</td>
                      <td class="text-right">1</td>
                      <td class="text-right"><a data-original-title="Edit" href="http://demo.opencart.com/admin/index.php?route=catalog/category/edit&amp;token=4aee6945576334af87965d94978c0cd7&amp;category_id=31" data-toggle="tooltip" title="" class="btn btn-primary"><i class="fa fa-pencil"></i></a></td>
                    </tr>
                                    <tr>
                      <td class="text-center">                    <input name="selected[]" value="32" type="checkbox">
                        </td>
                      <td class="text-left">Components&nbsp;&nbsp;&gt;&nbsp;&nbsp;Web Cameras</td>
                      <td class="text-right">1</td>
                      <td class="text-right"><a data-original-title="Edit" href="http://demo.opencart.com/admin/index.php?route=catalog/category/edit&amp;token=4aee6945576334af87965d94978c0cd7&amp;category_id=32" data-toggle="tooltip" title="" class="btn btn-primary"><i class="fa fa-pencil"></i></a></td>
                    </tr>
                                    <tr>
                      <td class="text-center">                    <input name="selected[]" value="20" type="checkbox">
                        </td>
                      <td class="text-left">Desktops</td>
                      <td class="text-right">1</td>
                      <td class="text-right"><a data-original-title="Edit" href="http://demo.opencart.com/admin/index.php?route=catalog/category/edit&amp;token=4aee6945576334af87965d94978c0cd7&amp;category_id=20" data-toggle="tooltip" title="" class="btn btn-primary"><i class="fa fa-pencil"></i></a></td>
                    </tr>
                                    <tr>
                      <td class="text-center">                    <input name="selected[]" value="27" type="checkbox">
                        </td>
                      <td class="text-left">Desktops&nbsp;&nbsp;&gt;&nbsp;&nbsp;Mac</td>
                      <td class="text-right">2</td>
                      <td class="text-right"><a data-original-title="Edit" href="http://demo.opencart.com/admin/index.php?route=catalog/category/edit&amp;token=4aee6945576334af87965d94978c0cd7&amp;category_id=27" data-toggle="tooltip" title="" class="btn btn-primary"><i class="fa fa-pencil"></i></a></td>
                    </tr>
                                    <tr>
                      <td class="text-center">                    <input name="selected[]" value="26" type="checkbox">
                        </td>
                      <td class="text-left">Desktops&nbsp;&nbsp;&gt;&nbsp;&nbsp;PC</td>
                      <td class="text-right">1</td>
                      <td class="text-right"><a data-original-title="Edit" href="http://demo.opencart.com/admin/index.php?route=catalog/category/edit&amp;token=4aee6945576334af87965d94978c0cd7&amp;category_id=26" data-toggle="tooltip" title="" class="btn btn-primary"><i class="fa fa-pencil"></i></a></td>
                    </tr>
                                    <tr>
                      <td class="text-center">                    <input name="selected[]" value="18" type="checkbox">
                        </td>
                      <td class="text-left">Laptops &amp; Notebooks</td>
                      <td class="text-right">2</td>
                      <td class="text-right"><a data-original-title="Edit" href="http://demo.opencart.com/admin/index.php?route=catalog/category/edit&amp;token=4aee6945576334af87965d94978c0cd7&amp;category_id=18" data-toggle="tooltip" title="" class="btn btn-primary"><i class="fa fa-pencil"></i></a></td>
                    </tr>
                                    <tr>
                      <td class="text-center">                    <input name="selected[]" value="46" type="checkbox">
                        </td>
                      <td class="text-left">Laptops &amp; Notebooks&nbsp;&nbsp;&gt;&nbsp;&nbsp;Macs</td>
                      <td class="text-right">0</td>
                      <td class="text-right"><a data-original-title="Edit" href="http://demo.opencart.com/admin/index.php?route=catalog/category/edit&amp;token=4aee6945576334af87965d94978c0cd7&amp;category_id=46" data-toggle="tooltip" title="" class="btn btn-primary"><i class="fa fa-pencil"></i></a></td>
                    </tr>
                                    <tr>
                      <td class="text-center">                    <input name="selected[]" value="45" type="checkbox">
                        </td>
                      <td class="text-left">Laptops &amp; Notebooks&nbsp;&nbsp;&gt;&nbsp;&nbsp;Windows</td>
                      <td class="text-right">0</td>
                      <td class="text-right"><a data-original-title="Edit" href="http://demo.opencart.com/admin/index.php?route=catalog/category/edit&amp;token=4aee6945576334af87965d94978c0cd7&amp;category_id=45" data-toggle="tooltip" title="" class="btn btn-primary"><i class="fa fa-pencil"></i></a></td>
                    </tr>
                                    <tr>
                      <td class="text-center">                    <input name="selected[]" value="34" type="checkbox">
                        </td>
                      <td class="text-left">MP3 Players</td>
                      <td class="text-right">7</td>
                      <td class="text-right"><a data-original-title="Edit" href="http://demo.opencart.com/admin/index.php?route=catalog/category/edit&amp;token=4aee6945576334af87965d94978c0cd7&amp;category_id=34" data-toggle="tooltip" title="" class="btn btn-primary"><i class="fa fa-pencil"></i></a></td>
                    </tr>
                                    <tr>
                      <td class="text-center">                    <input name="selected[]" value="43" type="checkbox">
                        </td>
                      <td class="text-left">MP3 Players&nbsp;&nbsp;&gt;&nbsp;&nbsp;test 11</td>
                      <td class="text-right">0</td>
                      <td class="text-right"><a data-original-title="Edit" href="http://demo.opencart.com/admin/index.php?route=catalog/category/edit&amp;token=4aee6945576334af87965d94978c0cd7&amp;category_id=43" data-toggle="tooltip" title="" class="btn btn-primary"><i class="fa fa-pencil"></i></a></td>
                    </tr>
                                    <tr>
                      <td class="text-center">                    <input name="selected[]" value="44" type="checkbox">
                        </td>
                      <td class="text-left">MP3 Players&nbsp;&nbsp;&gt;&nbsp;&nbsp;test 12</td>
                      <td class="text-right">0</td>
                      <td class="text-right"><a data-original-title="Edit" href="http://demo.opencart.com/admin/index.php?route=catalog/category/edit&amp;token=4aee6945576334af87965d94978c0cd7&amp;category_id=44" data-toggle="tooltip" title="" class="btn btn-primary"><i class="fa fa-pencil"></i></a></td>
                    </tr>
                                    <tr>
                      <td class="text-center">                    <input name="selected[]" value="47" type="checkbox">
                        </td>
                      <td class="text-left">MP3 Players&nbsp;&nbsp;&gt;&nbsp;&nbsp;test 15</td>
                      <td class="text-right">0</td>
                      <td class="text-right"><a data-original-title="Edit" href="http://demo.opencart.com/admin/index.php?route=catalog/category/edit&amp;token=4aee6945576334af87965d94978c0cd7&amp;category_id=47" data-toggle="tooltip" title="" class="btn btn-primary"><i class="fa fa-pencil"></i></a></td>
                    </tr>
                                    <tr>
                      <td class="text-center">                    <input name="selected[]" value="48" type="checkbox">
                        </td>
                      <td class="text-left">MP3 Players&nbsp;&nbsp;&gt;&nbsp;&nbsp;test 16</td>
                      <td class="text-right">0</td>
                      <td class="text-right"><a data-original-title="Edit" href="http://demo.opencart.com/admin/index.php?route=catalog/category/edit&amp;token=4aee6945576334af87965d94978c0cd7&amp;category_id=48" data-toggle="tooltip" title="" class="btn btn-primary"><i class="fa fa-pencil"></i></a></td>
                    </tr>
                                                  </tbody>
                </table>
              </div>
            </form>
            <div class="row">
              <div class="col-sm-6 text-left"><ul class="pagination"><li class="active"><span>1</span></li><li><a href="http://demo.opencart.com/admin/index.php?route=catalog/category&amp;token=4aee6945576334af87965d94978c0cd7&amp;page=2">2</a></li><li><a href="http://demo.opencart.com/admin/index.php?route=catalog/category&amp;token=4aee6945576334af87965d94978c0cd7&amp;page=2">&gt;</a></li><li><a href="http://demo.opencart.com/admin/index.php?route=catalog/category&amp;token=4aee6945576334af87965d94978c0cd7&amp;page=2">&gt;|</a></li></ul></div>
              <div class="col-sm-6 text-right">Showing 1 to 20 of 38 (2 Pages)</div>
            </div>
          </div>
        </div>
      </div>