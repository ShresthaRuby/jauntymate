<?php
include_once './functions.php';
$keywords = $_GET['keyword'];
$group_id_array = search_results($keywords);
//                        print_r($group_id_array);
if ($group_id_array != NULL) {
    echo '<ul class="list-inline">';
    for ($i = 0; $i < sizeof($group_id_array); $i++) {
        echo '<li><a href="group.php?id=' . $group_id_array[$i] . '">' . get_group_name($group_id_array[$i]) . '</a></li>';
    }
    echo '</ul>';
} else {
    echo 'No results found';
}
?>