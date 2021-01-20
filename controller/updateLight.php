<?php
include_once "../models/Light.php";
if (isset($_POST['key']) && isset($_POST['idRoom']) && $_POST['key'] === "123") {
    $idRoom = $_POST['idRoom'];
    $on = $_POST['light_is_on'];
    $bri = $_POST['light_intensity'];
    $pos = $_POST['curtain_position'];

    updateLight($idRoom, $on, $bri, $pos);

    echo json_encode(array('flag' => 1,));
}
