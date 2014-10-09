<?php

namespace GSB\DAO;

use GSB\Domain\Practitioner;

class PractitionerDAO extends DAO 
{

    private $typeDAO;

    public function setType($typeDAO) {
        $this->typeDAO = $typeDAO;
    }

    public function findAll() {
        $sql = "select *  from practitioner order by practitioner_name";
        $result = $this->getDb()->fetchAll($sql);

        $practitioners = array();
        foreach ($result as $row) {
            $practitionerId = $row['practitioner_id'];
            $practitioners[$practitionerId] = $this->buildDomainObject($row);
        }
        return $practitioners;
    }
     public function findAllByType($practitionerType) {
        $sql = "select * from practitioner where practitioner_type_id=? order by practitioner_name";
        $result = $this->getDb()->fetchAll($sql, array($practitionerType));
        
        // Convert query result to an array of domain objects
        $practitioners = array();
        foreach ($result as $row) {
            $practitionerId = $row['practitioner_id'];
            $practitioners[$practitionerId]= $this->buildDomainObject($row);
        }
        return $practitioners;
    }
     public function find($id) {
        $sql = "select * from practitioner where practitioner_id=?";
        $row = $this->getDb()->fetchAssoc($sql, array($id));

        if ($row)
            return $this->buildDomainObject($row);
        else
            throw new \Exception("No practitioner found for id " . $id);
    }
    
     protected function buildDomainObject($row) {
        $typeId = $row['practitioner_type_id'];
        $type = $this->typeDAO->find($typeId);

        $practitioner = new Practitioner();
        $practitioner->setId($row['practitioner_id']);
        $practitioner->setName($row['practitioner_name']);
        $practitioner->setFirstname($row['practitioner_first_name']);
        $practitioner->setAdress($row['practitioner_address']);
        $practitioner->setZipcode($row['practitioner_zip_code']);
        $practitioner->setCity($row['practitioner_city']);
        $practitioner->setCoefficientnotoriety($row['notoriety_coefficient']);
        $practitioner->setType($type);
       
        return $practitioner;
    }
}
    


