<div class="wrapper">

    <div class="body">
        <h4 class="pt10 h4cls">Manage Advertise Space</h4>
        <div align="right" class="oneTwo">
            <a class="wContentButton bluewB marginwithcls" href="/index.php/admin/file_segments/create">Add File Segments</a>    
        </div>
        <div>
            <form accept-charset="utf-8" method="get" id="" class="form" action="">
                <div class="formRow searchcls">
                    <span>Search</span>            
                    <div class="formRight">
                        <input type="text" id="" name="search" value="<?php echo $this->input->get('search');?>">
                    </div>
                </div>
                <div class="formRow searchcls">
                    <span><input type="submit" value="search" /></span>            
                    <span><input type="button" value="reset" onclick="window.location.href = '/index.php/admin/file_segments/manage'" /></span>    
                </div>
            </form>
        </div>
        <div class="widget" id="options-grid">
            <table class="sTable">
                <thead>
                    <tr>
                        <th align="left">Id</th>
                        <th align="left">File Name</th>
                        <th align="left">Comment</th>
                        <th align="left">File</th>
                        <th class="actions">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if(!empty($results)){?>
                    <?php $i=0; foreach($results as $result){?>
                    <tr class="<?php if($i%2==0) echo 'odd';else echo 'even';?>">
                        <td><?php echo $result->id;?></td>
                        <td><?php echo $result->file_name;?></td>
                        <td><?php echo $result->comment;?></td>
                        <td><a href="/item_image/<?php echo $result->file;?>" ><img src="/item_image/<?php echo $result->file;?>" /></a></td>
                        <td>
                            <?php if(isset($result->is_active) and $result->is_active == '1'){?>
                                <a href="/index.php/admin/file_segments/is_archive/<?php echo $result->id?>/0" title="Archive"><img src="/assets/img/archive.png"</a>
                            <?php }else{?>
                                <a href="/index.php/admin/file_segments/is_archive/<?php echo $result->id?>/1" title="Un archive"><img src="/assets/img/unarchive.png"</a>
                            <?php }?>
                            <a href="/index.php/admin/file_segments/update/<?php echo $result->id?>" title="Update"><img src="/assets/img/gr-update.png"</a>
                            <a href="/index.php/admin/file_segments/delete/<?php echo $result->id?>" title="Delete"><img src="/assets/img/gr-delete.png"</a>
                        </td>
                    </tr>
                    <?php $i++; }?>
                    <?php }else{?>                    
                    <tr>
                        <td colspan="6">No result found</td>
                    </tr>
                    <?php }?>
                </tbody>
            </table>
        </div>
        <div class="paging">
            <span class="prev disabled">&lt; previous</span><span class="next disabled">next &gt;</span></div>
        <div class="summary">Page 1 of 1, showing 5 records out of 5 total, starting on record 1, ending on 5</div></div>    
</div>