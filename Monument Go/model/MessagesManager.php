<?php
require('Messages.php');

class MessagesManager{
    
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

    	$q = $this->_db->query('SELECT * FROM messages WHERE id = '.$id);
    	$donnees = $q->fetch(PDO::FETCH_ASSOC);

    	return new Messages($donnees);
	}
    public function add(Messages $msg)
	{
		$q = $this->_db->prepare('INSERT INTO messages(idFrom,idTo,message) VALUES(:idFrom,:idTo,:message)');
        
        $q->bindValue(':idFrom', $msg->idFrom());
        $q->bindValue(':idTo', $msg->idTo());
        $q->bindValue(':message',$msg->message());
        
        $q->execute();
        
    }
    public function delete(Messsages $msg)
	{
		$this->_db->exec('DELETE FROM messages WHERE id = '.$msg->id());
	}

	public function update(Messages $msg)
  	{
    	$q = $this->_db->prepare('UPDATE users SET idFrom = :idFrom, idTo = :idTo, message = :message WHERE id = :id');
        
        $q->bindValue(':idFrom', $msg->idFrom());
        $q->bindValue(':idTo', $msg->idTo());
        $q->bindValue(':message', $msg->message());
        
        $q->execute();
        
        public function getList()
	{
        $messages = [];
		$q = $this->_db->query('SELECT * FROM users');	

		while ($donnees = $q->fetch()) {
			$messages[] = new Messages($donnees);
		}
		return $messages;
	}
        
        $PDO = new PDO('mysql:host=localhost;dbname=test;charset=utf8', 'root', '');

        $q = $PDO->query('SELECT * FROM messages');
        while ($data = $q->fetch()) {
	   echo $data['id'];
}
    
    

?>