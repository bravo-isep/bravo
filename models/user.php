<?php

include_once("connect.php");
$db = connect();

function getUserId()
{
    return $_COOKIE['idUser'];
}

function getUser()
{
    global $db;
    $sth = $db->prepare('SELECT * FROM user');
    $sth->execute();
    $user = $sth->fetchAll(PDO::FETCH_ASSOC);
    $sth = null;
    return $user;
}

function getUserName($userId)
{

    global $db;
    $sth = $db->prepare('SELECT username FROM user WHERE iduser = ?');
    $sth->execute(array($userId));
    $userName = $sth->fetchAll(PDO::FETCH_ASSOC);
    $sth = null;
    return $userName[0]['username'];
}

function getUserLevel($userId)
{

    global $db;
    $sth = $db->prepare('SELECT userlevel FROM user WHERE iduser = ?');
    $sth->execute(array($userId));
    $userLevel = $sth->fetchAll(PDO::FETCH_ASSOC);
    $sth = null;
    return $userLevel[0]['userlevel'];
}

function getUserIdRoom($userId)
{
    global $db;
    $sth = $db->prepare('SELECT idroom FROM user WHERE iduser = ?');
    $sth->execute(array($userId));
    $userIdRoom = $sth->fetchAll(PDO::FETCH_ASSOC);
    $sth = null;
    return $userIdRoom[0]['idroom'];
}

function getUserPassword($userId)
{
    global $db;
    $sth = $db->prepare('SELECT password FROM user WHERE iduser = ?');
    $sth->bindParam(1, $userId, PDO::PARAM_INT,8);
    $sth->execute();
    $UserPassword = $sth->fetchAll(PDO::FETCH_ASSOC);
    $sth = null;
    return $UserPassword[0]['password'];
}
