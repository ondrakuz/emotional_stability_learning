<?php
class cdb { // trida cdb bude slouzit k praci s databazi
  private $data, $querystring, $error, $conn;
  public $server, $user, $password, $db_name;
  
  function cdb()
  {
    require("./cfg/sql.php");
  }

  function connect() {
    if (!($this->conn=mysqli_connect($this->server,$this->user,$this->password,$this->db_name))) return(0);
    
    return(1);
  }

  function query($dotaz) {
    $this->querystring=$dotaz;
    $this->error=0;
    if (!($this->data=mysqli_query($this->conn,$dotaz))) {
      $this->error=1;
      $this->data=0;
    };
    if ($this->data) { return 1; }
    else  {return 0;};
  }

  function get_resource() {
    return ($this->data);
  }

  function set_resource($resource) {
    return ($this->data=$resource);
  }

  function get_row() {
    return (mysqli_fetch_row($this->data));
  }

  function get_array() {
    return (mysqli_fetch_array($this->data));
  }

  function get_error() {
    return ($this->error);
  }

  function closedb() {
    mysqli_close($this->conn);
  }

  function ifconnected() {
    $connected=0;
    if ($this->conn) {$connected=1;};
    return ($connected);
  }

};
?>
