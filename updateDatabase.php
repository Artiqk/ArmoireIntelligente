<?php

$postDataName = array('armoire_id', 'floor_id', 'area_id', 'sensor_type', 'component', 'restock_quantity');
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

$ifa = $postData[0] . $postData[1] . $postData[2];

$values = $ifa;

foreach ($postData as $data) { // Prepare values to put into the sql request
    if (is_numeric($data)) {
        $values .= ',' . $data;
    } else {
        $values .= ',' . '"' . $data . '"';
    }
    
}

// SQL request that add values to database if row doesn't exist else it updates it
$sql_request = "INSERT INTO armoire (ifa_id, id, floor_id, area_id, sensorType, component, restock_quantity) VALUES (" . $values . ") ON DUPLICATE KEY UPDATE sensorType = VALUES(sensorType), component = VALUES(component), restock_quantity = VALUES(restock_quantity);";

// Create connection to MySQL database
$conn = new mysqli("localhost", "webAdmin", "password", "armoire_intelligente");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($conn->query($sql_request) === TRUE) {
    echo "Record updated successfully";
} else {
    echo "Error updating record: " . $conn->error; 
}

$conn->close();
?>