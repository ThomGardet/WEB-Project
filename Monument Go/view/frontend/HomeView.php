<?php $title = 'Contacts'; ?>

<?php ob_start(); ?>

<link rel="stylesheet" type="text/css" href="public/css/homeStyle.css" >

<div class = "container-fluide">
	<div class = "row" id = "news">
		<p>il veut un gros pâté, il l'aura il veut un gros pâté, il l'aura il veut un gros pâté, il l'aura il veut un gros pâté, il l'aura il veut un gros pâté, il l'aura il veut un gros pâté, il l'aura il veut un gros pâté, il l'aura il veut un gros pâté, il l'aura il veut un gros pâté, il l'aura il veut un gros pâté, il l'aura il veut un gros pâté, il l'aura il veut un gros pâté, il l'aura il veut un gros pâté, il l'aura il veut un gros pâté, il l'aura </p>
	</div>
	<div class = "row">
		<div class = "col-lg-6" id="prehistoire">
			<a href = "index.php?action=">
				<div class="prehistoire">
					<h2>Préhistoire</h2>
					<p>il veut un gros pâté, il l'aura il veut un gros pâté, il l'aura il veut un gros pâté, il l'aura il veut un gros pâté, il l'aura il veut un gros pâté, il l'aura il veut un gros pâté, il l'aura il veut un gros pâté, il l'aura il veut un gros pâté, il l'aura il veut un gros pâté, il l'aura il veut un gros pâté, il l'aura il veut un gros pâté, il l'aura il veut un gros pâté, il l'aura il veut un gros pâté, il l'aura il veut un gros pâté, il l'aura il veut un gros pâté, il l'aura il veut un gros pâté, il l'aura il veut un gros pâté, il l'aura il veut un gros pâté, il l'aura il veut un gros pâté, il l'aura il veut un gros pâté, il l'aura il veut un gros pâté, il l'aura il veut un gros pâté, il l'aura il veut un gros pâté, il l'aura il veut un gros pâté, il l'aura il veut un gros pâté, il l'aura il veut un gros pâté, il l'aura il veut un gros pâté, il l'aura il veut un gros pâté, il l'aura </p>
				</div>
			</a>
		</div>
		<div class = "col-lg-6" id ="antiquite">
			<a href = "index.php?action=">
				<div class="antiquite">
					<h2>Antiquité</h2>
					<p>bonjour</p>
				</div>
			</a>
		</div>
	</div>
	<div class = "row">
		<div class = "col-lg-6" id="moy_age">
			<a href = "index.php?action=">
				<div class="moy_age">
					<h2>Moyen-Âge</h2>
					<p>bonjour</p>
				</div>
			</a>
		</div>
		<div class = "col-lg-6" id="renaissance">
			<a href = "index.php?action=">
				<div class="renaissance">
					<h2>Rennaissance</h2>
					<p>bonjour</p>
				</div>
			</a>
		</div>
	</div>
	<div class = "row">
		<div class = "col-lg-6" id ="aire_indu">
			<a href = "index.php?action=">
				<div class="aire_indu">
					<h2>Aire Industrielle </h2>
					<p>bonjour</p>
				</div>
			</a>
		</div>
		<div class = "col-lg-6" id= "siecle">
			<a href = "index.php?action=">
				<div class="siecle">
					<h2>XXeme Siècle</h2>
					<p>bonjour</p>
				</div>
			</a>
		</div>
	</div>
</div>	



<?php $content = ob_get_clean(); ?>

<?php require(__DIR__ . '/../template.php'); ?>