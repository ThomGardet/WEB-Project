<?php
      class Monuments{
          
          
        private $_id;
        private $_name;
        private $_position;
        private $_creationDate;
        private $_descriptif;
          
        public function id(){
		      return $this->_id;
        }
          
        public function name(){
		      return $this->_name;
        }
          
        public function position(){
		      return $this->_position;
        }
          
          
        public function creationDate(){
		      return $this->_creationDate;
        }
          
        public function descriptif(){
		      return $this->_descriptif;
        }
        
        public function setname($name){
		      $this->_name = $name;
        }
          
        public function position($position){
		      $this->_position = $position;
        }
          
        public function creationDate($creationDate){
		      $this->_creationDate = $creationDate;
        }
          
        public function descriptif($descriptif){
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
      
      
      ?>