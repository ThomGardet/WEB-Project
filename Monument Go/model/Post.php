<? php 
    
    class Post{
    

    
    private $_id;
    private $_text;
    private $_image;
    

    public function id(){
        return $this->_id;
        
    }

 public function text(){
        return $this->_text;
        
    }

 public function image(){
        return $this->_image;
        
    }

public function setText($text){
    $this->_text = $text;
}

public function setImage($image){
    $this->_image = $image;
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
