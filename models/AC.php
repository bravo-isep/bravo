<?php

include("connect.php");
$db = connect();

function getACStatus($roomId)
{
    global $db;
    $sth = $db->prepare('SELECT * FROM ac_sys WHERE idroom = ?');
    $sth->execute(array($roomId));
    $ACStatus = $sth->fetchAll(PDO::FETCH_ASSOC);
    $sth = null;
    if ($ACStatus[0]['fanspeed'] == -1) {
        $onOff = 0;
        $fanSpeed = 0;
    } else {
        $onOff = 1;
        $fanSpeed = $ACStatus[0]['fanspeed'];
    }
    $AC = [$ACStatus[0]['tempereture'], $fanSpeed, $ACStatus[0]['mode'], $onOff];
    return $AC;
}

