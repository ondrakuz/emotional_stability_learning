<?php
class AnswerModel
{
  public function selectAll()
  {
    $model = model::getInstance();
    $answers = $model->selectAll('answer', 'id asc');
    return $answers;
  }

  public function selectById($id)
  {
    $model = model::getInstance();
    $answer = $model->selectOne('answer', array ('id' => $id));
    return $answer;
  }

  public function selectByIdP($idp)
  {
    $model = model::getInstance();
    $answers = $model->selectArray('answer', array ('*'), array ('id_problem' => $idp), 'id asc');
    return $answers;
  }

  public function insert(array $values)
  {
    $model = model::getInstance();
    return $model->insert('answer', $values);
  }

  public function update($id, array $values)
  {
    $model = model::getInstance();
    return $model->update('answer', array ('id' => $id), $values);
  }

  public function delete($id)
  {
    $model = model::getInstance();
    return $model->update('answer', array ('id' => $id), array ('deleted' => 1));
  }

}
?>
