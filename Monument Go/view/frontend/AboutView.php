<?php $title = 'About'; ?>

<?php ob_start(); ?>

<?php $content = ob_get_clean(); ?>

<?php require(__DIR__ . '/../template.php'); ?>

<link rel="stylesheet" type="text/css" href="public/css/Aboutstyle.css" >

<div class="container">
  <div class="row">
    <div class="col-lg-6">
       <h2>Qui sommes-nous ? </h2>
				<p>Nous</tab> sommes des étudiants de première année à l'ENSISA en filière informatique qui avons créé ce site qui met en avant le met le patrimoine local, dans le but d'un projet de fin d'année.</p>
		<h2>Objectifs du site </h2>
				<p>Ce site à pour objectif de collecter un maximum d'information à propos de monuments plus ou moins importants qui ne sont pas forcément répertorier par les offices du tourrimse. Ainsi ce site permet aux internautes d'ajouter des monuments ainsi que leur histoire à la manière de wikipédia. Nous souhaitons que ce site soit simple d'utilisation et destiné à des personnes de tout âges. </p>
    </div>
    <div class="col-lg-6">
      <p id = "image"><img src = "public/pics/ensisa1.png" width = "550" height = "335" alt = "image de l'ensisa"/> </p>
    </div>
  </div>
  <h2>Crédits</h2>
		<ul class="list-unstyled">
			<li>Ouahmad Kévin</li>
			<li>Dağlı Büşra</li>
			<li>Leclerc Baptiste</li>
			<li>Perret Louis </li>
			<li>Benomar Yassine </li>
			<li>Messaoudi Muhammad Anis</li>
			<li>Gardet Thomas </li>
		</ul>
</div>