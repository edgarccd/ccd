<?php

use config_db as GlobalConfig_db;

class config_db
{
  private $servername = "WIN-QQJ79T3G1AB";
  private $username = 'edgardo';
  private $password = '12345678';
  private $database = "hgeneral";
  private $conn = null;

  public function conexion()
  {
    try {
      $this->conn = new PDO("sqlsrv:Server=$this->servername,1433;Database=$this->database", $this->username, $this->password);
      $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      //echo "Connected successfully";
    } catch (PDOException $e) {
      echo "Connection failed: " . $e->getMessage();
    }
  }
  
  public function get_conn(){
    return $this->conn;
  }

  public function desconexion()
  {
    $this->conn = null;
  }
}


