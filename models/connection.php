<?php
function OpenConnection() {
    try{
         $bdd = new PDO('mysql:host=localhost:3306;dbname=bravo;charset=utf8', 'bravo', '%K9dyF%RTj?%K=peUWeDpZj.', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
         return $bdd;
    }
    catch(Exception $e)
    {
        die('Erreur : '.$e->getMessage());
    }
}
