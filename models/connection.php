<?php
function OpenConnection() {
    try{
         $bdd = new PDO('mysql:host=13.75.55.140:3306;dbname=bravo;charset=utf8', 'bravo', '%K9dyF%RTj?%K=peUWeDpZj.', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
         return $bdd;
    }
    catch(Exception $e)
    {
        die('Erreur : '.$e->getMessage());
    }
}
