<?php

function connect()
{
    $dsn = 'mysql:host=localhost:3306;dbname=bravo;charset=utf8';
    $user = 'root';
    $password = 'root';
    try {
        $db = new PDO($dsn, $user, $password, array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
        return $db;
    } catch (Exception $e) {
        die('error : '.$e->getMessage());
    }
}
