<!--<div class="page-nxt clearfix">
    <ul class="page-main">
        <li> <a href="javascript:void(0)">  <i class="fa fa-angle-left"></i> </a> </li>
        <li> <a href="javascript:void(0)">  1 </a> </li>
        <li> <a href="javascript:void(0)">  2 </a> </li>
        <li> <a href="javascript:void(0)">  3 </a> </li>
        <li> <a href="javascript:void(0)" class="current">  4 </a> </li>
        <li> <a href="javascript:void(0)">  5 </a> </li>
        <li> ... </li>
        <li> <a href="javascript:void(0)">  10 </a> </li>
        <li> <a href="javascript:void(0)">  <i class="fa fa-angle-right"></i> </a> </li>
    </ul>
    
</div>-->
<div class="page-nxt clearfix">
    <ul class="page-main">
        <?php
        if($this->Paginator->counter('{:pages}') > 1) {
            echo $this->Paginator->prev('<', array('tag' => 'li', 'escape' => false), null, array('tag' => 'li', 'escape' => false,'disabledTag'=>'a'));
            echo $this->Paginator->numbers(array(
                //'before' => '<div class="col-sm-6 text-left"><ul class="pagination">',
                'separator' => '',
                'currentClass' => 'current',
                'tag' => 'li',
                'currentTag'=>'a',
                //'after' => '</ul></div>'
            ));
            echo $this->Paginator->next('>', array('tag' => 'li', 'escape' => false), null, array('tag' => 'li', 'escape' => false,'disabledTag'=>'a'));
        }
        ?>
    </ul>
    
</div>