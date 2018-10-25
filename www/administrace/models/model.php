<?php
  class model
  {
    private $db, $sever_name;
    
    function __construct()
    {
      $this->db = new cdb();
      if (!($this->db->connect())) 
      {
        RouterController::getInstance()->setError($this->db->getError());
      }
      
      $this->server_name = $_SERVER['SERVER_NAME'];
    }
    
    function __destruct()
    {
      $this->db->closedb();
    }
    
    function ifconnected()
    {
      return $this->db->ifconnected();
    }
    
    function server_name()
    {
      return $this->server_name;
    }
    
    function selectAll($table)
    {
      $query = "select * from $table where smazano='0';";
      if (!$this->db->query($query))
      {
        RouterController::getInstance()->setError($this->db->getError());
      }
      else
      {
        $i = 0;
        while ($item=$this->db->get_array())
        {
        if (!empty($item))
          { 
            $arr[$i] = $item;
            $i++;
          }
        }
      }
      return $arr;
    }
    
    function selectOne($table, array $keys)
    {
      $query = "select * from $table where";
      $i = 0;
      foreach($keys as $name => $value)
      {
        if ($i) 
        {
          $query .= " and $name=$value";
        }
        else
        {
          $query .= " $name=$value";
          $i = 1;
        }
      }
      $query .= ";";
      
      $this->db->query($query);
      return $this->db->get_row();
    }
    
    function selectArray(array $tables, array $collums, array $keys)
    {
      $query = "select ";
      $i = 0;
      foreach($collums as $collum)
      {
        if ($i)
        {
          $query .= ", $collum";
        }
        else
        {
          $query .= "$collum";
          $i = 1;
        }
      }
      $query .= " from ";
      $i = 0;
      foreach($tables as $table)
      {
        if ($i)
        {
          $query .= ", $table";
        }
        else
        {
          $query .= "$table";
          $i = 1;
        }
      }
      $query .= " where";
      $i = 0;
      foreach($keys as $name => $value)
      {
        if ($i) 
        {
          $query .= " and $name=$value";
        }
        else
        {
          $query .= " $name=$value";
          $i = 1;
        }
      }
      $query .= ";";
      
      $this->db->query($query);
      $i = 0;
      while ($item=$this->db->get_array())
      {
        if (!empty($item))
        {
          $arr[$i] = $item;
          $i++;
        }
      }

      return $arr;
    }
    
    function update($table, array $keys, array $values)
    {
      $query = "update $table set";
      $length = count($values);
      $i = 0;
      foreach($values as $name => $value)
      {
         if ($i)
        {
          $query .= ", $name='$value'";
        }
        else
        {
          $query .= " $name='$value'";
          ++$i;
        }
      }
      $query .= " where";
      $i = 0;
      foreach($keys as $name => $value)
      {
        if ($i) 
        {
          $query .= " and $name='$value'";
        }
        else
        {
          $query .= " $name='$value'";
          $i = 1;
        }
      }
      $query .= ";";
      
      return $this->db->query($query);
    }
    
    function insert($table, array $values)
    {
      $query = "insert into $table (";
      $i = 0;
      foreach($values as $name => $value)
      {
        if($i)
        {
          $query .= ", $name";
          $data .= ", '$value'";
        }
        else
        {
          $query .= "$name";
          $data .= "'$value'";
          ++$i;
        }
      }
      $query .= ") values ($data);";
      
      return $this->db->query($query);
    }
  }
?>
