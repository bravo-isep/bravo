<?php

include_once("connect.php");
$db = connect();

function getSensor($idRoom, $type)
{
    global $db;
    $sth = $db->prepare('SELECT value FROM sensor WHERE idRoom = :idRoom AND type = :type');
    $sth->bindParam(':type', $type, PDO::PARAM_STR,20);
    $sth->bindParam(':idRoom', $idRoom, PDO::PARAM_INT);
    $sth->execute();
    $sensor = $sth->fetchAll(PDO::FETCH_ASSOC);
    $sth = null;
    return $sensor[0]['value'];
}

function getHumidity($idRoom)
{
    global $db;
    $sth = $db->prepare('SELECT humidity FROM sensor WHERE idRoom = ?');
    $sth->execute(array($idRoom));
    $res = $sth->fetchAll(PDO::FETCH_ASSOC);
    $sth = null;
    return $res[0]['humidity'];
}

function getBrightness($idRoom)
{
    global $db;
    $sth = $db->prepare('SELECT brightness FROM sensor WHERE idRoom = ?');
    $sth->execute(array($idRoom));
    $res = $sth->fetchAll(PDO::FETCH_ASSOC);
    $sth = null;
    return $res[0]['brightness'];
}

function getSmoke($idRoom)
{
    global $db;
    $sth = $db->prepare('SELECT smoke FROM sensor WHERE idRoom = ?');
    $sth->execute(array($idRoom));
    $res = $sth->fetchAll(PDO::FETCH_ASSOC);
    $sth = null;
    return $res[0]['smoke'];
}

function getSensorRoom($idSensor)
{
    global $db;
    $sth = $db->prepare('SELECT idroom FROM sensor WHERE idSensor = :idSensor');
    $sth->bindParam(':idSensor', $idSensor, PDO::PARAM_INT,20);
    $sth->execute();
    $sensor = $sth->fetchAll(PDO::FETCH_ASSOC);
    $sth = null;
    return $sensor[0]['idroom'];
}