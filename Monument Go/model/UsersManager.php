<?php

require_once('User.php');

class UsersManager
{

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
        $id = (int) $idUser;

    	$q = $this->_db->query('SELECT * FROM users WHERE id = '.$id);
    	$donnees = $q->fetch(PDO::FETCH_ASSOC);

    	return new User($donnees);
	}

	public function isMailExists($mail)
	{
		$users = $this->getList();
		foreach ($users as $user) {
			if ($user->mail() == $mail) {
				return $user->id();
			}
		}
		return 0;
	}
	public function add(User $usr)
	{
		$q = $this->_db->prepare('INSERT INTO users(lastName, firstName, mail, phone, postalCode, street, streetNumber, town, country) VALUES(:lastName, :firstName, :mail, :phone, :postalCode, :street, :streetNumber, :town, :country)');

	    $q->bindValue(':lastName', $usr->lastName());
	    $q->bindValue(':firstName', $usr->firstName());
	    $q->bindValue(':mail', $usr->mail());
	    $q->bindValue(':phone', $usr->phone());
	    $q->bindValue(':postalCode', $usr->postalCode());
	    $q->bindValue(':street', $usr->street());
	    $q->bindValue(':streetNumber', $usr->streetNumber());
	    $q->bindValue(':town', $usr->town());
	    $q->bindValue(':country', $usr->country());

	    $q->execute();
	}

	public function delete(User $usr)
	{
		$this->_db->exec('DELETE FROM users WHERE id = '.$usr->id());
	}

	public function update(User $usr)
  	{
    	$q = $this->_db->prepare('UPDATE users SET lastName = :lastName, firstName = :firstName, mail = :mail, phone = :phone, postalCode = :postalCode, street = :street, streetNumber = :streetNumber, town = :town, country = :country WHERE id = :id');

    	$q->bindValue(':id', $usr->id());
    	$q->bindValue(':lastName', $usr->lastName());
    	$q->bindValue(':firstName', $usr->firstName());
    	$q->bindValue(':mail', $usr->mail());
    	$q->bindValue(':phone', $usr->phone());
    	$q->bindValue(':postalCode', $usr->postalCode());
    	$q->bindValue(':street', $usr->street());
    	$q->bindValue(':streetNumber', $usr->streetNumber());
    	$q->bindValue(':town', $usr->town());
    	$q->bindValue(':country', $usr->country());

    	$q->execute();
  	}

	public function getList()
	{
        $users = [];
		$q = $this->_db->query('SELECT * FROM users');	

		while ($data = $q->fetch()) {
			$users[] = new User($data);
		}
		return $users;
	}
}

/*$usrManager = new UsersManager(new PDO('mysql:host=localhost;dbname=test;charset=utf8', 'root', ''));

$users = $usrManager->getList();

foreach ($users as $user) {
	?>

	<?= $user->id(); ?>

	<?php	
}*/

