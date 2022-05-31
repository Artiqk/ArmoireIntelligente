<?php

$postDataName = array('armoire_id', 'floor_id', 'area_id', 'sensor_type', 'component', 'threshold');
$postData = array();

$error = false;
$prefix = '?';
$getParams = "";

foreach($postDataName as $data) { // Iterate through input data to detect errors and forge GET parameters if needed
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

foreach ($postDataName as $data) { // Get all POST data in an array
    array_push($postData, htmlspecialchars($_POST[$data]));
}

$stock_id = '"' . $postData[0] . $postData[1] . $postData[2] . '"';

$values = $stock_id;

foreach ($postData as $data) { // Prepare values to put into the sql request
    if (is_numeric($data)) {
        $values .= ',' . $data;
    } else {
        $values .= ',' . '"' . $data . '"';
    }
    
}

// SQL request that add values to database if row doesn't exist else it updates it
$sql_request_armoire = "INSERT IGNORE INTO armoire (id) VALUES (" . $_POST['armoire_id'] . ");";

$sql_request_armoire_info = "INSERT INTO armoire_info (stock_id, armoire_id, floor, area, sensorType, component, threshold) VALUES (" . $values . ") ON DUPLICATE KEY UPDATE sensorType = VALUES(sensorType), component = VALUES(component), threshold = VALUES(threshold);";

// Create connection to MySQL database
$conn = new mysqli("127.0.0.1", "webAdmin", "password", "armoire_intelligente");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// echo $sql_request_armoire . '<br>';
// echo $sql_request_armoire_info;

$conn->query($sql_request_armoire);
$conn->query($sql_request_armoire_info);


if (true) {
    echo 'Record updated successfully';
} else {
    echo "Error updating record: " . $conn->error; 
}

$conn->close();
?>