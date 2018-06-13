<?php 

class Friend
{
	private $_id;
	private $_idUser;
	private $_idFriend;
	private $_meetingDate;

	public function __construct($data) {
		$this->hydrate($data);
	}

	public function id()
	{
		return $this->_id;
	}
	public function idUser()
	{
		return $this->_idUser;
	}
	public function idFriend()
	{
		return $this->_idFriend;
	}
	public function meetingDate()
	{
		return $this->_meetingDate;
	}

	public function setId($id)
	{
		$this->_id = $id;
	}
	public function setIdUser($idUser)
	{
		$this->_idUser = $idUser;
	}
	public function setIdFriend($idFriend)
	{
		$this->_idFriend = $idFriend;
	}
	public function setMeetingDate($meetingDate)
	{
		$this->_meetingDate = $meetingDate;
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