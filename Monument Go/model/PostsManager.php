<?php
require('Posts.php');

class PostsManager{
    

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

    	$q = $this->_db->query('SELECT * FROM users WHERE id = '.$id);
    	$donnees = $q->fetch(PDO::FETCH_ASSOC);

    	return new Post($donnees);
	}
    
    public function add(Post $post){
        $q = this->_db->prepare('INSERT INTO posts(text,image) VALUES(:text, :image)');
        
        $q->bindValue(':text', $post->text());
        $q->bindValue(':image', $post->image());
        
        $q->execute();
    }

    public function delete(Post $post){
        $this->_db->exec('DELETE FROM posts WHERE post = '.$post->id());
        
    }
    
    	public function update(Post $post)
  	{
    	$q = $this->_db->prepare('UPDATE users SET text = :text, image = :image WHERE id = :id');

    	$q->bindValue(':text', $post->text());
    	$q->bindValue(':image', $post->image());


    	$q->execute();
  	}
    
    public function getList()
	{
        $posts = [];
		$q = $this->_db->query('SELECT * FROM posts');	

		while ($donnees = $q->fetch()) {
			$posts[] = new Post ($donnees);
		}
		return $posts;
	}
}

$PDO = new PDO('mysql:host=localhost;dbname=test;charset=utf8', 'root', '');

$q = $PDO->query('SELECT * FROM posts');
while ($data = $q->fetch()) {
	echo $data['id'];
}
?>