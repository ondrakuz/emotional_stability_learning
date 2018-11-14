<?php
class AnswerModel
{
  public function selectAll()
  {
    $model = model::getInstance();
    $answers = $model->selectAll('answers', 'id asc');
    return $answers;
  }

  public function selectById($id)
  {
    $model = model::getInstance();
    $answer = $model->selectOne('answers', array ('id' => $id));
    return $answer;
  }

  public function selectByIdP($idp)
  {
    $model = model::getInstance();
    $answers = $model->selectArray(array('answers'), array ('*'), array ('id_problem' => $idp), 'id asc');
    return $answers;
  }

  public function insert(array $values)
  {
    $model = model::getInstance();
    return $model->insert('answers', $values);
  }

  public function update($id, array $values)
  {
    $model = model::getInstance();
    return $model->update('answers', array ('id' => $id), $values);
  }

  public function delete($id)
  {
    $model = model::getInstance();
    return $model->update('answers', array ('id' => $id), array ('deleted' => 1));
  }

}
?>
