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

	public function get($id)
	{
		$id = (int) $id;

		$q = $this->_db->query('SELECT * FROM monuments WHERE id = '.$id);
		$donnees = $q->fetch(PDO::FETCH_ASSOC);

		return new Monuments($donnees);
	}

	public function add(Monuments $mnm)
	{
		$mnm->setDescriptif("null");

		$q = $this->_db->prepare('INSERT INTO monuments(name,creationDate,descriptif,latitude,longitude) VALUES(:name,NOW(),:descriptif,:latitude,:longitude)');

		$q->bindValue(':name', $mnm->name());
		$q->bindValue(':descriptif', $mnm->descriptif());
		$q->bindValue(':latitude', $mnm->latitude());
		$q->bindValue(':longitude', $mnm->longitude());

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
}