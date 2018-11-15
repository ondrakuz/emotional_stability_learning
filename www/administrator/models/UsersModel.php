<?php
class UsersModel
{
  public function selectAll()
  {
    $db = DbModel::getInstance();
    $users = $db->selectAll('users', 'id asc');
    return $users;
  }

  public function selectById($id)
  {
    $db = DbModel::getInstance();
    $user = $db->selectOne('users', array ('id' => $id));
    return $user;
  }

  public function selectByNick($nick)
  {
    $db = DbModel::getInstance();
    $user = $db->selectOne('users', array ('nick' => $nick));
    return $user;
  }

  public function insert(array $values)
  {
    $db = DbModel::getInstance();
    return $db->insert('users', $values);
  }

  public function update($id, array $values)
  {
    $db = DbModel::getInstance();
    return $db->update('users', array ('id' => $id), $values);
  }

  public function delete($id)
  {
    $db = DbModel::getInstance();
    if ($id == 1)
    {
      RouterController::getInstance()->setError('Uživatel \'admin\' nemůže být smazán.');
    }
    else
    {
      return $db->update('users', array ('id' => $id), array ('deleted' => 1));
    }
  }
}
?>
