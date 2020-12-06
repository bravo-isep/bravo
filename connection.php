<?php
function OpenConnection() {
    try{
         $bdd = new PDO('mysql:host=localhost:3307;dbname=mvc;charset=utf8', 'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
         return $bdd;
    }
    catch(Exception $e)
    {
        die('Erreur : '.$e->getMessage());
    }
}
