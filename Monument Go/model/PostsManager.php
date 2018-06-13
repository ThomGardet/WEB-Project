<?php
require_once('Post.php');

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

    public function get($id) {
        $id = (int) $id;

        $q = $this->_db->query('SELECT * FROM posts WHERE id = '.$id);
        $donnees = $q->fetch(PDO::FETCH_ASSOC);

        return new Post($donnees);
    }

	public function getUser($idUser)
	{
        $id = (int) $idUser;

        $posts = [];

    	$q = $this->_db->query('SELECT * FROM posts WHERE idUser = '.$id);
    	
        while ($donnees = $q->fetch(PDO::FETCH_ASSOC)) {
            $posts[] = new Post($donnees);
        }

    	return $posts;
	}
    
    public function add(Post $post){
        $q = $this->_db->prepare('INSERT INTO posts(descriptiv, image, idUser, publicationDate) VALUES(:descriptiv, :image, :idUser, NOW())');
        
        $q->bindValue(':descriptiv', $post->descriptiv());
        $q->bindValue(':image', $post->image());
        $q->bindValue(':idUser', $post->idUser());
        
        $q->execute();
    }

    public function delete(Post $post){
        $this->_db->exec('DELETE FROM posts WHERE id = '.$post->id());
        
    }
    
    public function update(Post $post)
  	{
    	$q = $this->_db->prepare('UPDATE posts SET descriptiv = :descriptiv, image = :image WHERE id = :id');

    	$q->bindValue(':descriptiv', $post->text());
    	$q->bindValue(':image', $post->image());


    	$q->execute();
  	}
    
    public function getList()
	{
        $posts = [];
		$q = $this->_db->query('SELECT * FROM posts');	

		while ($donnees = $q->fetch()) {
            $post = new Post($donnees);
            echo $post->id();
			$posts[] = $post;
		}
		return $posts;
	}
}

/*$usrManager = new PostsManager(new PDO('mysql:host=localhost;dbname=test;charset=utf8', 'root', ''));

$users = $usrManager->getList();

foreach ($users as $user) {
    ?>

    <?= $user->descriptiv(); ?>

    <?php   
}*/