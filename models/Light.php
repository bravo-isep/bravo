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
    if ($LightStatus[0]['light_brightness'] == -1) {
        $lightOnOff = 0;
        $light = 0;
    } else {
        $lightOnOff = 1;
        $light = $LightStatus[0]['light_brightness'];
    }
        $curtain = $LightStatus[0]['curtain_position'];
    $lightAll = [$lightOnOff,$light,$curtain];
    return $lightAll;
}

