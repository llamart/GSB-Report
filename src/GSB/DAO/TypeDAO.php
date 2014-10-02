<?php

namespace GSB\DAO;

use GSB\Domain\Type;

class TypeDao extends DAO 
{
   public function findAll() {
        $sql = "select * from practitioner_type order by practitioner_type_name";
        $result = $this->getDb()->fetchAll($sql);
        
        // Converts query result to an array of domain objects
        $types = array();
        foreach ($result as $row) {
            $typeId = $row['practititoner_type-id'];
            $types[$typeId] = $this->buildDomainObject($row);
        }
        return $types;
    }  
        public function find($id) {
        $sql = "select * from practitioner_type where practitioner_type_id=?";
        $row = $this->getDb()->fetchAssoc($sql, array($id));

        if ($row)
            return $this->buildDomainObject($row);
        else
            throw new \Exception("No family found for id " . $id);
    }
    protected function buildDomainObject($row) {
        $type = new Type();
        $type->setId($row['practitioner_type_id']);
        $type->setName($row['practitioner_type_name']);
        $type->setPlace($row['practitioner_type_place']);
        return $type;
    }
}

