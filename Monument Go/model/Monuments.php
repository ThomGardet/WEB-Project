<?php
class Monuments{

    private $_id;
    private $_name;
    private $_creationDate;
    private $_latitude;
    private $_longitude;
    private $_descriptif;

    public function __construct(array $data) 
    {
        $this->hydrate($data);
    }
    public function id(){
        return $this->_id;
    }
    public function name(){
        return $this->_name;
    }
    public function creationDate(){
        return $this->_creationDate;
    }
    public function latitude(){
        return $this->_latitude;
    }
    public function longitude(){
        return $this->_longitude;
    }
    public function descriptif(){
        return $this->_descriptif;
    }

    public function setname($name){
        $this->_name = $name;
    }
    public function setCreationDate($creationDate){
        $this->_creationDate = $creationDate;
    }
    public function setLatitude($latitude){
        $this->_latitude = $latitude;
    }
    public function setLongitude($longitude){
        $this->_longitude = $longitude;
    }
    public function setDescriptif($descriptif){
        $this->_descriptif = $descriptif;
    }

    public function hydrate(array $donnees){
        foreach ($donnees as $key => $value){
            $method = 'set'.ucfirst($key);

            if (method_exists($this, $method)){
                $this->$method($value);
            }
        }
    }
}