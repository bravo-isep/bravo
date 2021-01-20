<?php

include_once("connect.php");
$db = connect();

function getACStatus($roomId)
{
    global $db;
    $sth = $db->prepare('SELECT * FROM ac_sys WHERE idroom = ?');
    $sth->execute(array($roomId));
    $ACStatus = $sth->fetchAll(PDO::FETCH_ASSOC);
    $sth = null;
    $AC = [$ACStatus[0]['ac_onoff'], $ACStatus[0]['tempereture'], $ACStatus[0]['fanspeed'], $ACStatus[0]['mode']];
    return $AC;
}

function updateAC($idRoom, $on, $temp, $mode, $wind)
{
    global $db;
    $sth = $db->prepare('UPDATE `bravo`.`ac_sys` SET `ac_onoff` = :onoff, `tempereture` = :temp, `fanspeed` = :wind, `mode` = :mode WHERE (`idRoom` = :room)');
    $sth->bindParam(':onoff', $on, PDO::PARAM_INT);
    $sth->bindParam(':temp', $temp, PDO::PARAM_INT);
    $sth->bindParam(':mode', $mode, PDO::PARAM_INT);
    $sth->bindParam(':wind', $wind, PDO::PARAM_INT);
    $sth->bindParam(':room', $idRoom, PDO::PARAM_INT);
    $sth->execute();
    $sth = null;
}
