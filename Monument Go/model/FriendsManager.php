<?php

require('Friend.php');

class FriendsManager
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


	public function get($id)
	{
        $id = (int) $id;

    	$q = $this->_db->query('SELECT * FROM friends WHERE id = '.$id);
    	$donnees = $q->fetch(PDO::FETCH_ASSOC);

    	return new Friend($donnees);
	}

	public function getFriends($idUser, $usersManager)
	{
		$friends = [];

		$id = (int) $idUser;

    	$q = $this->_db->query('SELECT * FROM friends WHERE idUser = '.$id);
    	while ($data = $q->fetch(PDO::FETCH_ASSOC)) {
    		$friends[] = $usersManager->get($data['idFriend']);
    	}

    	return $friends;
	}

	public function add(Friend $friend)
	{
		$q = $this->_db->prepare('INSERT INTO friends(idUser, idFriend, meetingDate) VALUES(:idUser, :idFriend, NOW())');

	    $q->bindValue(':idUser', $friend->idUser());
	    $q->bindValue(':idFriend', $friend->idFriend());

	    $q->execute();
	}

	public function delete(Friend $friend)
	{
		$this->_db->exec('DELETE FROM friends WHERE id = '.$friend->id());
	}

	public function getList()
	{
        $friends = [];
		$q = $this->_db->query('SELECT * FROM friends');	

		while ($data = $q->fetch()) {
			$friends[] = new Friend($data);
		}
		return $friends;
	}
}

/*require('UsersManager.php');
$friendsManager = new FriendsManager(new PDO('mysql:host=localhost;dbname=test;charset=utf8', 'root', ''));
$usersManager = new UsersManager(new PDO('mysql:host=localhost;dbname=test;charset=utf8', 'root', ''));

$friends = $friendsManager->getFriends(1, $usersManager);

foreach ($friends as $user) {
	?>

	<?= $user->lastName(); ?>

	<?php	
}*/

