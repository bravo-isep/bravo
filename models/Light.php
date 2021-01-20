<?php

include_once("connect.php");
$db = connect();

function getLightStatus($roomId)
{
    global $db;
    $sth = $db->prepare('SELECT * FROM lighting_sys WHERE idroom = ?');
    $sth->execute(array($roomId));
    $LightStatus = $sth->fetchAll(PDO::FETCH_ASSOC);
    $sth = null;
    $lightOnOff = $LightStatus[0]['light_onoff'];
    $light = $LightStatus[0]['light_brightness'];
    $curtain = $LightStatus[0]['curtain_position'];
    $lightAll = [$lightOnOff, $light, $curtain];
    return $lightAll;
}

function updateLight($idRoom, $on, $bri, $pos)
{
    global $db;
    $sth = $db->prepare('UPDATE `bravo`.`lighting_sys` SET `light_onoff` = :onoff, `light_brightness` = :bri, `curtain_position` = :pos WHERE (`idRoom` = :room)');
    $sth->bindParam(':onoff', $on, PDO::PARAM_INT);
    $sth->bindParam(':bri', $bri, PDO::PARAM_INT);
    $sth->bindParam(':pos', $pos, PDO::PARAM_INT);
    $sth->bindParam(':room', $idRoom, PDO::PARAM_INT);
    $sth->execute();
    $sth = null;
}
