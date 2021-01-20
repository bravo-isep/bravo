<?php

include_once("user.php");
$db = connect();



function getRooms(){
    global $db;
    $office = '6%';
    $meetingRoom = '3%';
    $sth = $db->prepare('SELECT * FROM room WHERE idroom LIKE ? OR idroom LIKE ? ORDER BY idroom DESC');
    $sth->execute(array($office, $meetingRoom));
    $rooms = $sth->fetchAll(PDO::FETCH_ASSOC);
    $sth = null;
    return $rooms;
}

function getUserRoom($idUser)
{
    global $db;
    // $userId = getUserId();
    $sth = $db->prepare('SELECT idroom FROM user WHERE iduser = ?');
    $sth->execute(array($idUser));
    $userRoom = $sth->fetchAll(PDO::FETCH_ASSOC);
    $sth = null;
    return $userRoom[0]['idroom'];
}

function getUserRoomAll()
{
    global $db;
    $userId = getUserId();
    $sth = $db->prepare('SELECT * FROM room WHERE idroom = (SELECT idroom FROM user WHERE iduser = ?)');
    $sth->execute(array($userId));
    $userRoom = $sth->fetchAll(PDO::FETCH_ASSOC);
    $sth = null;
    return $userRoom;
}
