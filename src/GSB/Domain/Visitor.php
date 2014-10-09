<?php

namespace GSB\Domain;

use Symfony\Component\Security\Core\User\UserInterface;

class Visitor implements UserInterface
{
    private $id;
    
    private $lastName;
    
    private $firstName;
    
    private $address;
    
    private $zipCode;
    
    private $city;
    
   
    
    private $hiringDate;
    
    private $userName;
    
    private $password;
    
    private $salt;
    
    private $role;
    
    private $type;
    
    private $sector;
    
    private $laboratory;
    
    public function getId(){
        return $this->id;
    }
    public function setId($id){
        
        $this->id = $id;
    }
    
    public function getFirstName(){
        return $this->firstName;
    }
    public function setFirstname($firstName){
        $this->firstName = $firstName;
    }
    public function getLastName(){
        return $this->lastName;
    }
    public function setLastName($lastName){
        
        $this->lastName = $lastName;
    }
    public function getAddress(){
        return $this->address;
    }
    public function setAddress($address){
        $this->address = $address;
    }
    public function getZipCode(){
        return $this->zipCode;
    }
    public function setZipCode($zipCode){
        $this->zipCode = $zipCode;
    }
    public function getCity(){
        return $this->city;
    }
    public function setCity($city){
        $this->city = $city;
    }
    public function getHiringDate(){
        return $this->hiringDate;
    }
    public function setHiringDate($hiringDate){
        $this->hiringDate = $hiringDate;
    }
    public function getUserName(){
        return $this->userName;
    }
    public function setUserName($userName){
        $this->userName = $userName;
    }
    public function getPassword(){
        return $this->password;
    }
    public function setPasword($password){
        $this->password = $password;
    }
    public function getSalt() {
        return $this->salt;
    }
    public function setSalt($salt){
        $this->salt = $salt;
    }
    public function getRole(){
        return $this->role;
    }
    public function setRole($role){
        $this->role = $role;
    }
    public function getVisitorType(){
        
       return $this->type;
    }
    public function setVisitorType($type){
        $this->type =$type;
    }
    public function getLaboratory(){
        return $this->laboratory;
    }
    public function setLaboratory($laboratory){
        $this->laboratory = $laboratory;
    }
    public function getSector (){
        return $this->sector;
    }
    public function setSector($sector){
        $this->sector = $sector;
    }
     /**
     * @inheritDoc
     */
    public function getRoles()
    {
        return array($this->getRole());
    }

    /**
     * @inheritDoc
     */
    public function eraseCredentials() {
        // Nothing to do here
    }
}