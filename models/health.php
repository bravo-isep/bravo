<?php

include("user.php");
$db = connect();

function getUserTemperature($userId)
{

    global $db;
    $sth = $db->prepare('SELECT temperature FROM body_temperature_detection WHERE iduser = ? ORDER BY time DESC ');
    $sth->execute(array($userId));
    $userTemperature = $sth->fetchAll(PDO::FETCH_ASSOC);
    $sth = null;
    return $userTemperature[0]['temperature'];
}

function getUserAllTemperature($userId)
{

    global $db;
    $sth = $db->prepare('SELECT * FROM body_temperature_detection WHERE iduser = ? ORDER BY time DESC ');
    $sth->execute(array($userId));
    $userAllTemperature = $sth->fetchAll(PDO::FETCH_ASSOC);
    $sth = null;
    return $userAllTemperature;
}