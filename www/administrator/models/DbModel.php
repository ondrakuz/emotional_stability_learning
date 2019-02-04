<?php
  class DbModel extends cdb
  {
    //private $db;
    static private $instance = null;

    static function getInstance()
    {
      if (self::$instance == null) 
      {
        self::$instance = new DbModel();
      }
      return self::$instance;
    }
  
    
    function __construct()
    {
      parent::__construct();
      if (!($this->connect())) 
      {
        RouterController::getInstance()->setError("DbModel::__construct():".$this->get_error());
      }
    }
    
    function __destruct()
    {
      parent::__destruct();
    }
 
    function selectAll($table, $order = '')
    {
      $query = "select * from $table where deleted='0'";
      if ($order != '') {
        $query .= " order by $order;";
      }
      else
      {
        $query .= ';';
      }
//       echo('<br />'.$query.'<br />');
//       exit;
      
      if (!$this->query($query))
      {
        RouterController::getInstance()->setError('DbModel::selectAll():'.$this->get_error().'<br /><br />'.$query.'<br />');
      }
      else
      {
        $i = 0;
        while ($item=$this->get_array())
        {
        if (!empty($item))
          { 
            $arr[$i] = $item;
            $i++;
          }
        }
      }
//       print_r($arr);
//       exit;
      
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
      
      if (!$this->query($query))
      {
        RouterController::getInstance()->setError("DbModel::selectOne():".$this->get_error().'<br /><br />'.$query.'<br />');
      }
      $arr = $this->get_array();
      return $arr;
    }
    
    function selectArray(array $tables, array $collums, array $keys, $order = '')
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
      if (!empty($keys))
      {
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
      }
      if ($order != '') {
        $query .= " order by $order;";
      }
      else
      {
        $query .= ';';
      }
//       echo('<br />'.$query.'<br />');
//       exit;
      
      if (!$this->query($query))
      {
        RouterController::getInstance()->setError('DbModel::selectArray():'.$this->get_error().'<br /><br />'.$query.'<br />');
      }
      else
      {
        $i = 0;
        while ($item=$this->get_array())
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
    
    function update($table, array $keys, array $values)
    {
      $query = "update $table set";
      $length = count($values);
      $i = 0;
      foreach($values as $name => $value)
      {
         if ($i)
        {
          $query .= ", $name=$value";
        }
        else
        {
          $query .= " $name=$value";
          ++$i;
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
//       echo('<br />'.$query.'<br />');
//       exit;
      
      $result = $this->query($query);
      if (!$result)
      {
        RouterController::getInstance()->setError("DbModel::update():".$this->get_error().'<br /><br />'.$query.'<br />');
      }
      return $result;
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
          $data .= ", $value";
        }
        else
        {
          $query .= "$name";
          $data .= "$value";
          ++$i;
        }
      }
      $query .= ") values ($data);";
//       echo('<br />'.$query.'<br />');
//       exit;
      
      $result = $this->query($query);
      if (!$result)
      {
        RouterController::getInstance()->setError("DbModel::insert():".$this->get_error()."<br /><br />$query<br />");
      }
      return $result;
    }
    
    function delete($table, array $keys)
    {
      $query = "delete from $table where ";
      $i = 0;
      foreach($keys as $key => $value)
      {
        if ($i)
        {
          $query .= " and $key=$value";
        }
        else
        {
          $query .= " $key=$value";
          $i = 1;
        }
      }
      $query .= ";";
      
      $result = $this->query($query);
      if (!$result)
      {
        RouterController::getInstance()->setError("DbModel::delete():".$this->get_error()."<br /><br />$query<br />");
      }
      return $result;      
    }
  }
?>
