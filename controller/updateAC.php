<?php
include_once "../models/AC.php";
if (isset($_POST['key']) && isset($_POST['idRoom']) && $_POST['key'] === "123") {
    $idRoom = $_POST['idRoom'];
    $on = $_POST['ac_is_on'];
    $tem = $_POST['ac_temperature'];
    $mode = $_POST['ac_mode'];
    $wind = $_POST['ac_wind'];

    updateAC($idRoom, $on, $tem, $mode, $wind);

    echo json_encode(array('flag' => 1,));
}
