<?php
include_once "../models/user.php";
include_once "../models/room.php";
$users = getUser();
$allIdUser = array_column($users, 'iduser');

if (isset($_POST['user']) && isset($_POST['passwd']) && $_POST['user'] != null && $_POST['passwd'] != null) {

    $user = $_POST['user'];
    $passwd = $_POST['passwd'];
    // Save all user Data
    if (in_array($user, $allIdUser)) {
        if (getUserPassword($user) === $passwd) {
            $idRoom = getUserRoom($user);
            echo json_encode(array('success' => 1, 'idRoom' => $idRoom));
            session_start();
            $_SESSION['isLogin'] = true;
            $_SESSION["idUser"] = $user;
        } else {
            echo json_encode(array('success' => 0, 'message' => 'Wrong password. Try again or click Forgot password to reset it.'));
        }
    } else {
        echo json_encode(array('success' => 0, 'message' => 'Invalid user id'));
    }
} else {
    echo json_encode(array('success' => 0, 'message' => 'please fill both fields'));
}
