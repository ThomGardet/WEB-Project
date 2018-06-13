<?php 

class User
{
	private $_id;
	private $_profilPic;
	private $_lastName;
	private $_firstName;
	private $_mail;
	private $_phone;
	private $_postalCode;
	private $_street;
	private $_streetNumber;
	private $_town;
	private $_country;

	public function __construct($data) {
		$this->hydrate($data);
	}

	public function id()
	{
		return $this->_id;
	}
	public function profilPic()
	{
		return $this->_profilPic;
	}
	public function lastName()
	{
		return $this->_lastName;
	}
	public function firstName()
	{
		return $this->_firstName;
	}
	public function mail()
	{
		return $this->_mail;
	}
	public function phone()
	{
		return $this->_phone;
	}
	public function postalCode()
	{
		return $this->_postalCode;
	}
	public function street()
	{
		return $this->_street;
	}
	public function streetNumber()
	{
		return $this->_streetNumber;
	}
	public function town()
	{
		return $this->_town;
	}
	public function country()
	{
		return $this->_country;
	}

	public function setId($id)
	{
		$this->_id = $id;
	}
	public function setProfilPic($profilPic)
	{
		$this->_profilPic = $profilPic;
	}
	public function setLastName($lastName)
	{
		$this->_lastName = $lastName;
	}
	public function setFirstName($firstName)
	{
		$this->_firstName = $firstName;
	}
	public function setMail($mail)
	{
		$this->_mail = $mail;
	}
	public function setPhone($phone)
	{
		$this->_phone = $phone;
	}
	public function setPostalCode($postalCode)
	{
		$this->_postalCode = $postalCode;
	}
	public function setStreet($street)
	{
		$this->_street = $street;
	}
	public function setStreetNumber($streetNumber)
	{
		$this->_streetNumber = $streetNumber;
	}
	public function setTown($town)
	{
		$this->_town = $town;
	}
	public function setCountry($country)
	{
		$this->_country = $country;
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