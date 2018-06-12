<?php

require('Monuments.php');


class MonumentsManager{
    
    private $_db;

	public function __construct($db)
	{
		$this->setDb($db);
	}

	public function setDb(PDO $db)
  	{
    	$this->_db = $db;
  	}


	public function get($idUser)
	{
        $id = (int) $id;

    	$q = $this->_db->query('SELECT * FROM monuments WHERE id = '.$id);
    	$donnees = $q->fetch(PDO::FETCH_ASSOC);

    	return new Monuments($donnees);
	}
    
    public function add(Monuments $mnm)
	{
		$q = $this->_db->prepare('INSERT INTO monuments(name,position,creationDate,descriptif) VALUES(:name,:position,:creationDate,:descriptif)');

	    $q->bindValue(':name', $mnm->name());
	    $q->bindValue(':position', $mnm->position());
	    $q->bindValue(':creationDate', $mnm->creationDate());
        $q->bindValue(':descriptif', $mnm->descriptif());
        
        $q->execute();
}
    
    public function getList()
	{
        $monu = [];
		$q = $this->_db->query('SELECT * FROM monuments');	

		while ($donnees = $q->fetch()) {
			$monu[] = new Monuments($donnees);
		}
		return $monu;
	}
    
    $PDO = new PDO('mysql:host=localhost;dbname=test;charset=utf8', 'root', '');

$q = $PDO->query('SELECT * FROM monuments');
while ($data = $q->fetch()) {
	echo $data['id'];
}

?>