<?php
class UsersModel
{
  public function selectAll()
  {
    $DbModel = model::getInstance();
    $users = $DbModel->selectAll('users', 'id asc');
    return $users;
  }

  public function selectById($id)
  {
    $DbModel = model::getInstance();
    $user = $DbModel->selectOne('users', array ('id' => $id));
    return $user;
  }

  public function selectByNick($nick)
  {
    $DbModel = model::getInstance();
    $user = $DbModel->selectOne('users', array ('nick' => $nick));
    return $user;
  }

  public function insert(array $values)
  {
    $DbModel = model::getInstance();
    return $DbModel->insert('users', $values);
  }

  public function update($id, array $values)
  {
    $DbModel = model::getInstance();
    return $DbModel->update('users', array ('id' => $id), $values);
  }

  public function delete($id)
  {
    $DbModel = model::getInstance();
    if ($id == 1)
    {
      RouterController::getInstance()->setError('Uživatel \'admin\' nemůže být smazán.');
    }
    else
    {
      return $DbModel->update('users', array ('id' => $id), array ('deleted' => 1));
    }
  }
}
?>
