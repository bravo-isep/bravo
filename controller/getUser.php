<?php
include_once "../models/user.php";
if (isset($_POST['key']) && isset($_COOKIE['idUser']) && $_POST['key'] === "123") {
    $idUser = $_COOKIE['idUser'];
    $userName = getUserName($idUser);
    $userLevel = getUserLevel($idUser);
    $userIdRoom = getUserIdRoom($idUser);
    echo json_encode(array('flag' => 1, 'idUser' => $idUser, 'userName' => $userName, 'userLevel' => $userLevel, 'userIdRoom' => $userIdRoom));
} else {
    echo json_encode(array('flag' => 0));
}
