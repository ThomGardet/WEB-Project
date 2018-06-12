<?php


class Messages
{
    private $_id;
    private $_idFrom;
    private $_idTo;
    private $_message;
    
    public function id(){
        return $this->_id;
    }
    public function idFrom(){
        return $this->_idFrom;
    }
    public function idTo(){
        return $this->_idTo;
    }
    public function message(){
        return $this->_message;
    }
    
    public function setIdFrom($idFrom)
	{
		$this->_idFrom = $idFrom;
	}
     public function setIdTo($idTo)
	{
		$this->_idTo = $idTo;
	}
     public function setMessage($message)
	{
		$this->_message = $message;
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

?>