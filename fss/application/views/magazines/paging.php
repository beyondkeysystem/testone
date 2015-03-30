<?php 
$tbl_name = "musics";  //your table name
// How many adjacent pages should be shown on each side?
$adjacents = 2;

/*
  First get total number of rows in data table.
  If you have a WHERE clause in your query, make sure you mirror it here.
 */
$query = "SELECT COUNT(*) as num FROM $tbl_name";
$total_pages = mysql_fetch_array(mysql_query($query));
//print_r($total_pages);exit;
$total_pages = $total_pages['num'];

/* Setup vars for query. */
$targetpage = "/magazines/fnpage";  //your file name  (the name of this file)
$limit = 5;         //how many items to show per page
if (isset($_GET['page']) and $_GET['page'] != '') {
    $page = $_GET['page'];
} else {
    $page = 0;
}

if ($page)
    $start = ($page - 1) * $limit;    //first item to display on this page
else
    $start = 0;        //if no page var is given, set start to 0

    /* Get data. */
$sql = "SELECT * FROM $tbl_name LIMIT $start, $limit";
$result = mysql_query($sql);
while($row = mysql_fetch_assoc($result)){
    $musics_file[] = $row;
}
//print_r($musics_file);exit;

/* Setup page vars for display. */
if ($page == 0)
    $page = 1;     //if no page var is given, default to 1.
$prev = $page - 1;       //previous page is page - 1
$next = $page + 1;       //next page is page + 1
$lastpage = ceil($total_pages / $limit);  //lastpage is = total pages / items per page, rounded up.
$lpm1 = $lastpage - 1;      //last page minus 1

/*
  Now we apply our rules and draw the pagination object.
  We're actually saving the code to a variable in case we want to draw it more than once.
 */
$pagination = "";
if ($lastpage > 1) {
    //$pagination .= "<div class=\"pagination\">";
    //previous button
    if ($page > 1)
        $pagination.= "<li> <a onclick = 'return fnpaging(this);' href=\"$targetpage?page=$prev\"> previous</a> </li>";
    else
        $pagination.= "<li><a href = '#'> <span class=\"disabled\"> previous</span></a> </li>";

    //pages	
    if ($lastpage < 7 + ($adjacents * 2)) { //not enough pages to bother breaking it up
        for ($counter = 1; $counter <= $lastpage; $counter++) {
            if ($counter == $page)
                $pagination.= "<li> <a class='active' href = '#'><span class=\"current\">$counter</span> </a></li>";
            else
                $pagination.= "<li> <a onclick = 'return fnpaging(this);' href=\"$targetpage?page=$counter\">$counter</a> </li>";
        }
    }
    elseif ($lastpage > 5 + ($adjacents * 2)) { //enough pages to hide some
        //close to beginning; only hide later pages
        if ($page < 1 + ($adjacents * 2)) {
            for ($counter = 1; $counter < 4 + ($adjacents * 2); $counter++) {
                if ($counter == $page)
                    $pagination.= "<li> <a class='active' href = '#'><span class=\"current\">$counter</span> </a></li>";
                else
                    $pagination.= "<li> <a onclick = 'return fnpaging(this);' href=\"$targetpage?page=$counter\">$counter</a> </li>";
            }
            $pagination.= " ... ";
            $pagination.= "<li> <a onclick = 'return fnpaging(this);' href=\"$targetpage?page=$lpm1\">$lpm1</a> </li>";
            $pagination.= "<li> <a onclick = 'return fnpaging(this);' href=\"$targetpage?page=$lastpage\">$lastpage</a> </li>";
        }
        //in middle; hide some front and some back
        elseif ($lastpage - ($adjacents * 2) > $page && $page > ($adjacents * 2)) {
            $pagination.= "<li> <a onclick = 'return fnpaging(this);' href=\"$targetpage?page=1\">1</a> </li>";
            $pagination.= "<li> <a onclick = 'return fnpaging(this);' href=\"$targetpage?page=2\">2</a> </li>";
            $pagination.= " ... ";
            for ($counter = $page - $adjacents; $counter <= $page + $adjacents; $counter++) {
                if ($counter == $page)
                    $pagination.= "<li><a class='active' href = '#'> <span class=\"current\">$counter</span></a> </li>";
                else
                    $pagination.= "<li> <a onclick = 'return fnpaging(this);' href=\"$targetpage?page=$counter\">$counter</a> </li>";
            }
            $pagination.= " ... ";
            $pagination.= " <li><a onclick = 'return fnpaging(this);' href=\"$targetpage?page=$lpm1\">$lpm1</a> </li>";
            $pagination.= "<li> <a onclick = 'return fnpaging(this);' href=\"$targetpage?page=$lastpage\">$lastpage</a> </li>";
        }
        //close to end; only hide early pages
        else {
            $pagination.= "<li> <a onclick = 'return fnpaging(this);' href=\"$targetpage?page=1\">1</a></li> ";
            $pagination.= "<li> <a onclick = 'return fnpaging(this);' href=\"$targetpage?page=2\">2</a> </li>";
            $pagination.= " ... ";
            for ($counter = $lastpage - (2 + ($adjacents * 2)); $counter <= $lastpage; $counter++) {
                if ($counter == $page)
                    $pagination.= "<li><a class='active' href = '#'> <span class=\"current\">$counter</span></a></li> ";
                else
                    $pagination.= "<li> <a onclick = 'return fnpaging(this);' href=\"$targetpage?page=$counter\">$counter</a> </li>";
            }
        }
    }

    //next button
    if ($page < $counter - 1)
        $pagination.= "<li> <a onclick = 'return fnpaging(this);' href=\"$targetpage?page=$next\">next </a> </li>";
    else
        $pagination.= " <li><a href = '#'><span class=\"disabled\">next </span> </a></li>";
   // $pagination.= "</div>\n";
}
?>

<ol class="song_list">
    <?php if(!empty($musics_file)){?>
    <?php foreach($musics_file as $music){
        ?>
    <li class="playing">
        <span class="check">
            <input type="radio" <?php if(isset($music_id) and $music_id ==$music['id']){?> checked<?php }?> name="songs" id="song_<?php echo $music['id']?>"  value="<?php echo $music['id']?>">
            <label for="song_<?php echo $music['id']?>"><span class="name"><?php echo $music['music_name']?></span></label>
        </span>
        <span class="type"><?php echo $music['music_type']?></span>
    </li>
    <?php }?>
    <?php }?>
</ol>
<div class="pagebox">
    <ul>
        <?= $pagination ?>
    </ul>
</div>