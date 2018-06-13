<?php 
    
class Post{
 
    private $_id;
    private $_descriptiv;
    private $_image;
    private $_idUser;
    private $_publicationDate;
    
    public function __construct(array $data) {
        $this->hydrate($data);
    }
    public function id() {
        return $this->_id;
    }
    public function descriptiv() {
        return $this->_descriptiv;   
    }
    public function image() {
        return $this->_image;
    }
    public function idUser() {
        return $this->_idUser;
    }
    public function publicationDate() {
        return $this->_publicationDate;
    }

    public function setId($id) {
        $this->_id = $id;
    }
    public function setDescriptiv($descriptiv) {
        $this->_descriptiv = $descriptiv;
    }
    public function setImage($image) {
        $this->_image = $image;
    }
    public function setIdUser($idUser) {
        $this->_idUser = $idUser;
    }
    public function setPublicationDate($publicationDate) {
        $this->_publicationDate = $publicationDate;
    }

    public function hydrate(array $donnees)
	{
	  	foreach ($donnees as $key => $value)
	  	{
	    	$method = 'set'.ucfirst($key);
	        
	    	if (method_exists($this, $method))
	    	{
	      		$this->$method($value);
	    	}
	  	}
	}
    
}
