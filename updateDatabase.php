<?php

$armoireID = htmlspecialchars($_POST['armoire_id']);
$floorID = htmlspecialchars($_POST['floor_id']);

$areaID = htmlspecialchars($_POST['area_id']);
$sensorType = htmlspecialchars($_POST['sensor_type']);

$component = htmlspecialchars($_POST['component']);
$restockQuantity = htmlspecialchars($_POST['restock_quantity']);


echo 'N°Armoire : ' . $armoireID . '<br>';
echo 'N°Etage : ' . $floorID . '<br>';
echo 'N°Zone : ' . $areaID . '<br>';
echo 'Type de capteur : ' . $sensorType . '<br>';
echo 'Composant : ' . $component . '<br>';
echo 'Quantité de restock : ' . $restockQuantity . '<br>';


?>