<?php
class AnswerModel
{
  public function selectAll()
  {
    $db = DbModel::getInstance();
    $answers = $db->selectAll('answers', 'id asc');
    return $answers;
  }

  public function selectById($id)
  {
    $db = DbModel::getInstance();
    $answer = $db->selectOne('answers', array ('id' => $id));
    return $answer;
  }

  public function selectByIdP($idp)
  {
      $db = DbModel::getInstance();
      $answers = $db->selectArray(array('answers'), array ('*'), array ('id_problem' => $idp, 'deleted' => 0), 'id asc');
      return $answers;
  }
  
  public function selectByIds($idp, $idcs)
  {
      $db = DbModel::getInstance();
      $answers = $db->selectArray(array('answers'), array ('*'), array ('id_problem' => $idp, 'id_cog_schema' => $idcs, 'deleted' => 0), 'id asc');
      return $answers;
  }
  
  public function insert(array $values)
  {
    $db = DbModel::getInstance();
    return $db->insert('answers', $values);
  }

  public function update($id, array $values)
  {
    $db = DbModel::getInstance();
    return $db->update('answers', array ('id' => $id), $values);
  }

  public function delete($id)
  {
    $db = DbModel::getInstance();
    return $db->update('answers', array ('id' => $id), array ('deleted' => 1));
  }

}
?>
