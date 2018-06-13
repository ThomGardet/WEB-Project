<?php

require('Login.php');

class LoginsManager
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


	public function get($idLogin)
	{
		$q = $this->_db->query('SELECT * FROM logins WHERE id ='.$idLogin);	

		$data = $q->fetch();
		$login = new Login($data);

		return $login;
	}

	public function add(Login $log)
	{
		$q = $this->_db->prepare('INSERT INTO logins(username, password, idUser) VALUES(:username, :password, :idUser)');

	    $q->bindValue(':username', $usr->username());
	    $q->bindValue(':password', $usr->password());
	    $q->bindValue(':idUser', $usr->idUser());

	    $q->execute();
	}

	public function delete(Login $log)
	{
		$this->_db->exec('DELETE FROM logins WHERE id = '.$log->id());
	}

	public function update(Login $log)
  	{
    	$q = $this->_db->prepare('UPDATE users SET username = :username, password = :password, idUser = :idUser WHERE id = :id');

    	$q->bindValue(':id', $log->id());
    	$q->bindValue(':username', $log->username());
    	$q->bindValue(':password', $log->password());
    	$q->bindValue(':idUser', $log->idUser());

    	$q->execute();
  	}

	public function getList()
	{
        $logins = [];
		$q = $this->_db->query('SELECT * FROM logins');	

		while ($data = $q->fetch()) {
			$logins[] = new Login($data);
		}
		return $logins;
	}

	public function isDefined($usrname)
	{
		$logins = $this->getList();
		foreach ($logins as $login) {
			if ($login->username() == $usrname) {
				return $login->id();
			}
		}
	}
}

/*$usrManager = new LoginsManager(new PDO('mysql:host=localhost;dbname=test;charset=utf8', 'root', ''));

$users = $usrManager->getList();
$u = $usrManager->get($usrManager->isDefined('batou'));
echo $u->username();

foreach ($users as $user) {
	?>

	<?= $user->idUser(); ?>

	<?php	
}*/