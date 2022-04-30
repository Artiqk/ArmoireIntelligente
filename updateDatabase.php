<?php

$postData = array('armoire_id', 'floor_id', 'area_id', 'sensor_type', 'component', 'restock_quantity');

$error = false;
$prefix = '?';
$getParams = "";

foreach($postData as $data) {
    if (empty($_POST[$data])) {
        $error = true;
        $getParams .= $prefix . $data . "=error";
    } else {
        $getParams .= $prefix . $data . "=" . $_POST[$data];
    }

    $prefix = '&';
}

if ($error) {
    header("Location: index.php$getParams");
}

?>