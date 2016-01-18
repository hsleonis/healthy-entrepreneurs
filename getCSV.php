<?php
    $date = date('d-m-Y-h-i-s');
    header("Content-type: application/octet-stream");
    header("Content-Disposition: attachment; filename=\"Query-Builder-$date.csv\"");
    $data=stripcslashes($_REQUEST['csv_text']);
    echo $data; 
?>