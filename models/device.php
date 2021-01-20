<?php

include_once("connect.php");
$db = connect();;

function getAC()
{
    global $db;
    $sth = $db->prepare('SELECT idac_sys,idroom FROM ac_sys');
    $sth->execute();
    $ac = $sth->fetchAll(PDO::FETCH_ASSOC);
    $sth = null;
    return $ac;
}

function getAcRoom($idAc)
{
    global $db;
    $sth = $db->prepare('SELECT idroom FROM ac_sys WHERE idac_sys = ?');
    $sth->execute(array($idAc));
    $acRoom = $sth->fetchAll(PDO::FETCH_ASSOC);
    $sth = null;
    return $acRoom[0]['idroom'];
}

function getLight()
{
    global $db;
    $sth = $db->prepare('SELECT idlighting_sys,idroom FROM lighting_sys');
    $sth->execute();
    $light = $sth->fetchAll(PDO::FETCH_ASSOC);
    $sth = null;
    return $light;
}

function getLightRoom($idLight)
{
    global $db;
    $sth = $db->prepare('SELECT idroom FROM lighting_sys WHERE idlighting_sys = ?');
    $sth->execute(array($idLight));
    $lightRoom = $sth->fetchAll(PDO::FETCH_ASSOC);
    $sth = null;
    return $lightRoom[0]['idroom'];
}

