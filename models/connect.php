<?php

function connect()
{
    $dsn = 'mysql:host=13.75.55.140:3306;dbname=bravo;charset=utf8';
    $user = 'bravo';
    $password = '%K9dyF%RTj?%K=peUWeDpZj.';
    try {
        $db = new PDO($dsn, $user, $password, array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
        return $db;
    } catch (Exception $e) {
        die('error : '.$e->getMessage());
    }
}
