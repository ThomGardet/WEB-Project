<?php $title = 'Home'; ?>

<?php ob_start(); ?>

<link rel="stylesheet" type="text/css" href="public/css/homeStyle.css" >

<button class="tablink" onclick="openPage('News', this, 'red')" id="defaultOpen">News</button>
<button class="tablink" onclick="openPage('NearMonuments', this, 'green')" >Near Monuments</button>

<div id="News" class="tabcontent">
  <h3>Home</h3>
  <p>Home is where the heart is..</p>
</div>

<div id="NearMonuments" class="tabcontent">
  <h3>News</h3>
  <p>Some news this fine day!</p> 
</div>



<?php
	/*if (isset($friends)) {
		foreach ($friends as $friend) {
			$posts = $postsManager->getUser($friend->id());
			foreach ($posts as $post) {
				?>
					<div id="Post<?=$post->id()?>">
						<?= $post->idUser() ?>
						<?= $post->publicationDate() ?>
						<?= $post->descriptiv() ?>
					</div>
				<?php
			}
		}
	}*/
?>

<script src="public/js/homeScript.js"></script>

<?php $content = ob_get_clean(); ?>

<?php require(__DIR__ . '/../template.php'); ?>