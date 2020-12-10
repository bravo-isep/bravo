<?php

class UtilityFunctions
{
  private $dbConnection;
    public function __construct($pdoConnection)
    {
        $this->dbConnection =$pdoConnection;
    }
    
    public function getAlarms()
    {
        $query = $this->dbConnection->prepare("SELECT * FROM alarm");
        $query->execute();
        $result = $query->fetch(PDO::FETCH_ASSOC);
        return $result;
    }
    
    public function getSensors()
    {
        $query = $this->dbConnection->prepare("SELECT * FROM sensor");
        $query->execute();
        $result = $query->fetch(PDO::FETCH_ASSOC);
        return $result;
    }
    
    public function getRooms()
    {
        $query = $this->dbConnection->prepare("SELECT * FROM room");
        $query->execute();
        $result = $query->fetch(PDO::FETCH_ASSOC);
        return $result;
    }
}

