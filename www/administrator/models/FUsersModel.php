<?php
class FUsersModel
{
    public function selectAll()
    {
        $db = DbModel::getInstance();
        $fusers = $db->selectAll('fusers', 'id asc');
        return $fusers;
    }
    
    public function selectById($id)
    {
        $db = DbModel::getInstance();
        $user = $db->selectOne('fusers', array ('id' => $id));
        return $user;
    }
    
    public function selectByNick($nick)
    {
        $db = DbModel::getInstance();
        $user = $db->selectOne('fusers', array ('nick' => $nick));
        return $user;
    }
    
    public function insert(array $values)
    {
        $db = DbModel::getInstance();
        return $db->insert('fusers', $values);
    }
    
    public function update($id, array $values)
    {
        $db = DbModel::getInstance();
        return $db->update('fusers', array ('id' => $id), $values);
    }
    
    public function delete($id)
    {
        $db = DbModel::getInstance();
        return $db->update('fusers', array ('id' => $id), array ('deleted' => 1));
    }
}
?>
