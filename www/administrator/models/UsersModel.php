<?php
class UsersModel
{
  public function selectAll()
  {
    $model = model::getInstance();
    $users = $model->selectAll(users, 'id asc');
    return $users;
  }

  public function selectById($id)
  {
    $model = model::getInstance();
    $user = $model->selectOne(users, array ('id' => $id));
    return $user;
  }

  public function insert(array $values)
  {
    $model = model::getInstance();
    return $model->insert(users, $values);
  }

  public function update($id, array $values)
  {
    $model = model::getInstance();
    return $model->update(users, array ('id' => $id), $values);
  }

  public function delete($id)
  {
    $model = model::getInstance();
    return $model->update(users, array ('id' => $id), array ('deleted' => 1));
  }
}
?>
