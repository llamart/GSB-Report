<?php

namespace GSB\Domain;

class Type
{
    private $id;
    
    private $name;
    
    private $place;
    
    public function getId(){
        return $this->id;
    }
    public function setId($id) {
        $this->id = $id;
    }
    public function getName(){
        return $this->name;
    }
    public function setName($name){
        $this->name = $name;
    }
    public function getPlace(){
        return $this->place;
    }
    public function setPlace($place){
        $this->place = $place;
    }
}