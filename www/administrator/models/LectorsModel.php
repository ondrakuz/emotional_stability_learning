<?php
class LectorsModel
{
    
    public function selectByKeys($ids, $idl)
    {
        $db = DbModel::getInstance();
        $lectors = $db->selectArray(array ('lectors'), array ('*'), array ('student' => $ids, 'lector' => $idl));
        return $lectors;
    }
    
    public function selectByIdS($id)
    {
        $db = DbModel::getInstance();
        $lectors = $db->selectArray(array ('lectors'), array ('*'), array ('student' => $id));
        return $lectors;
    }
    
    public function selectByIdL($id)
    {
        $db = DbModel::getInstance();
        $lectors = $db->selectArray(array ('lectors'), array ('*'), array ('lector' => $id));
        return $lectors;
    }
    
    public function insert(array $values)
    {
        $db = DbModel::getInstance();
        return $db->insert('lectors', $values);
    }
    
    public function delete($ids, $idl)
    {
        $db = DbModel::getInstance();
        return $db->delete('lectors', array ('student' => $ids, 'lector' => $idl));
    }
}
?>
