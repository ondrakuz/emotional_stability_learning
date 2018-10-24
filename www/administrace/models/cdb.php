<?php
class cdb { // trida cdb bude slouzit k praci s databazi
  private $data, $querystring, $error, $conn;
  public $server, $user, $password, $db_name;
  
  function __construct()
  {
    require("./cfg/sql.php");
    $this->conn = null;
  }

  function connect() {
    $options=array(
      PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
      PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"
      );
    
    try {
            $this->conn = @new PDO("mysql:host=".$this->server.";dbname=".$this->db_name, $this->user, $this->password, $options);
    } catch (PDOException $e) {
        echo 'Connection failed: ' . $e->getMessage();
    }
    
    if (!($this->conn)) return(0);
    
    return(1);
  }

  function query($dotaz) {
    $this->querystring=$dotaz;
    $this->error=0;
    $this->data=$this->conn->prepare($dotaz);
    $parameters = array();
    try {
            $this->data->execute($parameters);
    } catch (PDOException $e) {
        echo 'Execution of query failed: ' . $e->getMessage();
        $this->data=null;
    }
    if (!($this->data)) {
      $this->error=1;
    };
    if ($this->data) { return 1; }
    else  {return 0;}
  }

  function get_resource() {
    return ($this->data);
  }

  function set_resource($resource) {
    return ($this->data=$resource);
  }

  function get_row() {
    $arr = $this->data->fetch(PDO::FETCH_NUM);
    if ($this->data) { return $arr; }
    else { return 0; }
  }

  function get_array() {
    $arr = $this->data->fetch(PDO::FETCH_ASSOC);
    if ($this->data) {return ($arr); }
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
