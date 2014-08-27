<?php

$link = mysql_connect('localhost', 'root', 'career');
if (!$link) {
    die('Could not connect: ' . mysql_error());
}
if (!mysql_select_db("db_jmate")) {
    echo "Unable to select mydbname: " . mysql_error();
    exit;
}
//SELECT motive from tbl_trip where destination='Kathmandu,Nepal'
//Get destination:-SELECT destination from tbl_trip where motive='Trekking'
$result = mysql_query("SELECT motive,destination from tbl_trip ");
while ($row = mysql_fetch_assoc($result)) {
    $colors[] = $row['motive'];
    $colors[] = $row['destination'];
}
mysql_free_result($result);
mysql_close($link);

// check the parameter
if (isset($_GET['part']) and $_GET['part'] != '') {
    // initialize the results array
    $results = array();

    // search colors
    foreach ($colors as $color) {
        // if it starts with 'part' add to results
        if (strpos($color, $_GET['part']) === 0) {
            $results[] = $color;
        }
    }

    // return the array as json with PHP 5.2
    echo json_encode($results);
}