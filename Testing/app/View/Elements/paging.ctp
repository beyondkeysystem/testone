<?php
// debug($this->params);
$controller = $this->params['controller'];
$action =$this->params['action'];
?>
<div class="row">
    <div class="col-sm-6 text-left">
        <ul class="pagination">
            <?php
                  
                if($this->Paginator->counter('{:pages}') > 1) {
                    $pageCount = $this->Paginator->counter('{:pages}');
                    echo "<li><a href='/admin/".$controller."'>|&lt;</a></li>";
                    echo $this->Paginator->prev('<span>&lt;</span>', array('tag' => 'li', 'escape' => false), null, array('tag' => 'li', 'escape' => false));
                    echo $this->Paginator->numbers(array(
                        'separator' => '',
                        'currentClass' => 'active',
                        'tag' => 'li',
                        'currentTag'=>'span',                
                    ));
                    echo $this->Paginator->next('<span>&gt;</span>', array('tag' => 'li', 'escape' => false), null, array('tag' => 'li', 'escape' => false));
                    echo "<li><a href='/admin/".$controller."/index/page:".$pageCount."'>|&gt;</a></li>";
                }
            ?>
        </ul>
    </div>
</div>