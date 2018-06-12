<? php 
    
    class Comments {
    
    private $_id;
    private $_idPost;
    private $_idUser;
    public $_comment;
}
    public function id()
	{
		return $this->_id;
	}

    public function idPost()
	{
		return $this->_idPost;
	}

    public function idUser()
	{
		return $this->_idUser;
	}

    public function comment()
	{
		return $this->_comment;
	}

    public function setComment($comment){
        $this->_comment = $comment;
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
    ?>