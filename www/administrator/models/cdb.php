<?php
class cdb { // trida cdb bude slouzit k praci s databazi
  private $data, $querystring, $error, $conn;
  public $server, $user, $password, $db_name;
  
  function __construct()
  {
    require("./administrator/cfg/sql.php");
    $this->conn = null;
    $this->error = '';
  }
  
  function __destruct()
  {
    $this->closedb();
  }

  function connect() {
    $options=array(
      PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
      PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"
      );
    
    try {
            $this->conn = @new PDO("mysql:host=".$this->server.";dbname=".$this->db_name, $this->user, $this->password, $options);
    } catch (PDOException $e) {
        $error = 'DB connection failed: ' . $e->getMessage();
    }
    
    if (!($this->conn)) 
    {
      $this->error = $error;
      return(0);
    }
    
    return(1);
  }

  function query($dotaz) {
    $this->querystring=$dotaz;
    $error = '';
    
    try {
      $this->data=$this->conn->prepare($dotaz);
    } catch (PDOException $e) {
      $error = 'Preparation of query failed: ' . $e->getMessage();
      $this->data=null;
    }
    
    $result2 = 0;
    if ($error == '')
    {
      try {
          $result2 = $this->data->execute();
      } catch (PDOException $e) {
          $error = 'Execution of query failed: ' . $e->getMessage();
          $this->data=null;
      }
      if (!$result2) {
        $this->error=$error;
      }
  //     print_r($this->data);
  //     exit;
    }
    else
    {
      $this->error = $error;
      $result2 = false;
    }
    if ($result2) { return 1; }
    else  {return 0;}
  }

  function get_resource() {
    return ($this->data);
  }

  function set_resource($resource) {
    return ($this->data=$resource);
  }

  function get_row() {
    $arr = array();
    if ($this->data) $arr = $this->data->fetch(PDO::FETCH_NUM);
    if (!empty($arr)) { return $arr; }
    else { return 0; }
  }

  function get_array() {
    $arr = array();
    if ($this->data) $arr = $this->data->fetch(PDO::FETCH_ASSOC);
    if (!empty($arr)) {return ($arr); }
    else { return 0; }
  }

  function get_error() {
    return ($this->error);
  }

  function closedb() {
    $this->conn = null;
  }

  function ifconnected() {
    $connected=0;
    if ($this->conn) {$connected=1;};
    return ($connected);
  }

};
?>
