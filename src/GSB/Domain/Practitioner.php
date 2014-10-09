<?php

namespace GSB\Domain;

class practitioner {

    private $author;

    /**
     * Practitioner id
     * 
     * @var integer
     */
    private $id;

    /**
     * practitioner name 
     * 
     * @var string
     */
    private $name;

    /**
     * practitioner  first name 
     * 
     * @var string
     */
    private $firstname;

    /**
     * practitioner adress 
     * 
     * @var string
     */
    private $adress;

    /**
     * practitioner name 
     * 
     * @var int
     */
    private $zipcode;

    /**
     * practitioner city 
     * 
     * @var string
     */
    private $city;

    /**
     * practitioner name 
     * 
     * @var int
     */
    private $coefficientnotoriety;

    /**
     * practitioner name 
     * 
     * @var string
     */
    private $type;

    public function getId() {
        return $this->id;
    }

    public function setId($id) {
        $this->id = ($id);
    }

    public function getName() {
        return $this->name;
    }

    public function setName($name) {
        $this->name = ($name);
    }

    public function getFirstname() {
        return $this->firstname;
    }

    public function setFirstname($firstname) {
        $this->firstname = ($firstname);
    }

    public function getAdress() {
        return $this->adress
        ;
    }

    public function setAdress($adress) {
        $this->adress = ($adress);
    }

    public function getZipcode() {
        return $this->zipcode;
    }

    public function setZipcode($zipcode) {
        $this->zipcode = ($zipcode);
    }

    public function getCity() {
        return $this->city;
    }

    public function setCity($city) {
        $this->city = ($city);
    }

    public function getCoefficientnotoriety() {
        return $this->coefficientnotoriety;
    }

    public function setCoefficientnotoriety($notoriety) {
        $this->coefficientnotoriety = ($notoriety);
    }

    public function getType() {
        return $this->type;
    }

    public function setType($type) {
        $this->type = ($type);
    }

    public function getAuthor() {
        return $this->author;
    }

    public function setAuthor($author) {
        $this->author = $author;
    }

}
