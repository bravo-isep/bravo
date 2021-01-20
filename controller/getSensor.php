<?php
include_once "../models/sensor.php";
if (isset($_POST['key']) && isset($_POST['idRoom']) && $_POST['key'] === "123") {
    $idRoom = $_POST['idRoom'];
    $temperature = getSensor($idRoom, 'temperature');
    $humidity = getSensor($idRoom, 'humidity');
    $brightness = getSensor($idRoom,'brightness');
    echo json_encode(array('temperature' => $temperature,'humidity' => $humidity,'brightness' => $brightness));
}
