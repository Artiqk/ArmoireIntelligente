<?php

$getData = array('armoire_id', 'floor_id', 'area_id', 'sensor_type', 'component', 'restock_quantity');

foreach($getData as $data) {
    if (isset($_GET[$data]) && $_GET[$data] == 'error') {
        echo "#$data {border: 2px solid red}";
    }
}

?>