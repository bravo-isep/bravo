<?php
include_once "../models/AC.php";
include_once "../models/Light.php";
if (isset($_POST['key']) && isset($_POST['idRoom']) && $_POST['key'] === "123") {
    $idRoom = $_POST['idRoom'];
    $AC = getACStatus($idRoom);
    $AC_OnOff = $AC[0];
    $AC_temp = $AC[1];
    $AC_fan = $AC[2];
    $AC_mode = $AC[3];

    $Light = getLightStatus($idRoom);
    $Light_OnOff = $Light[0];
    $Light_bri = $Light[1];
    $Curtain_position = $Light[2];

    echo json_encode(array(
        'AC_OnOff' => $AC_OnOff,
        'AC_temp' => $AC_temp,
        'AC_fan' => $AC_fan,
        'AC_mode' => $AC_mode,
        'Light_OnOff' => $Light_OnOff,
        'Light_bri' => $Light_bri,
        'Curtain_position' => $Curtain_position
    ));
}
