<?php
require('Comments.php');

class CommentsManager {
    
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

    	$q = $this->_db->query('SELECT * FROM comments WHERE id = '.$id);
    	$donnees = $q->fetch(PDO::FETCH_ASSOC);

    	return new Comments($donnees);
}
    public function add(Comments $com){
        $q = $this->_db->prepare('INSERT INTO Comments(idPost,idUser,comment) VALUES(:idPost, :idUser, :comment)');
        
        $q->bindValue(':idPost', $com->idpost());
        $q->bindValue(':idUser', $com->idUser());
        $q->bindValue(':comment',$com->comment());
        
        $q->execute();
    }
    
public function delete(Comments $com)
	{
		$this->_db->exec('DELETE FROM Comments WHERE id = '.$com->id());
	}

	public function update(Comments $com)
  	{
        $q = $this -> _db->prepare('UPDATE Comments SET idPost=:idPost, idUser = :idUser, comment = :comment WHERE id = id');
        
        $q->bindValue(':idPost',$com->idPost());
        $q->bindValue(':iduser',$com->idUser());
        $q->bindValue(':comment',$com->comment());
        
        $q->execute();
    }
    
    public function getList()
	{
        $comm = [];
		$q = $this->_db->query('SELECT * FROM Comments');	

		while ($donnees = $q->fetch()) {
			$comm[] = new Comments($donnees);
		}
		return $comm;
	}



$PDO = new PDO('mysql:host=localhost;dbname=test;charset=utf8', 'root', '');

$q = $PDO->query('SELECT * FROM Comments');
while ($data = $q->fetch()) {
	echo $data['id'];
?>