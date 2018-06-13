<?php 

class Login
{
	private $_id;
	private $_username;
	private $_password;
	private $_idUser;

	public function __construct(array $data) {
		$this->hydrate($data);
	}

	public function id() {
		return $this->_id;
	}

	public function username() {
		return $this->_username;
	}

	public function password() {
		return $this->_password;
	}

	public function idUser() {
		return $this->_idUser;
	}

	public function setId($id) {
		$this->_id = $id;
	}

	public function setUsername($username) {
		$this->_username =  $username;
	}

	public function setPassword($password) {
		$this->_password = $password;
	}

	public function setIdUser($idUser) {
		$this->_idUser = $idUser;
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