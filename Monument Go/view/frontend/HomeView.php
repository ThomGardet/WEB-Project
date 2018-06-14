<?php $title = 'Home'; ?>

<?php ob_start(); ?>

<link rel="stylesheet" type="text/css" href="public/css/homeStyle.css" >

<div class = "container-fluide">
	<div class = "row" id = "news">
		<button class="tablink" onclick="openPage('News', this, 'blue')" id="defaultOpen">News</button>
		<button class="tablink" onclick="openPage('NearMonuments', this, 'yellow')" >Near Monuments</button>

		<div id="News" class="tabcontent">
			<!-- <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
				<ol class="carousel-indicators">
					<li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
					<li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
					<li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
				</ol>
				<div class="carousel-inner">
					<div class="carousel-item active">
						<img class="d-block w-100" src="public/css/image/prehistoire.jpg" alt="First slide">
					</div>
					<div class="carousel-item">
						<img class="d-block w-100" src="public/css/image/chateau2.jpg" alt="Second slide">
					</div>
					<div class="carousel-item">
						<img class="d-block w-100" src="public/css/image/nimes.jpg" alt="Third slide">
					</div>
				</div>
				<a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
					<span class="carousel-control-prev-icon" aria-hidden="true"></span>
					<span class="sr-only">Previous</span>
				</a>
				<a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
					<span class="carousel-control-next-icon" aria-hidden="true"></span>
					<span class="sr-only">Next</span>
				</a>
			</div> -->

			<!-- Slideshow container -->
			<div class="slideshow-container">

				<!-- Full-width images with number and caption text -->
				<div class="mySlides fade">
					<div class="numbertext">1 / 3</div>
					<img src="public/pics/user.png" alt="First slide" style="width:100%">
					<div class="text">Caption Text</div>
				</div>

				<div class="mySlides fade">
					<div class="numbertext">2 / 3</div>
					<img src="public/pics/user.png" alt="First slide" style="width:100%">
					<div class="text">Caption Two</div>
				</div>

				<div class="mySlides fade">
					<div class="numbertext">3 / 3</div>
					<img src="public/pics/user.png" alt="First slide" style="width:100%">
					<div class="text">Caption Three</div>
				</div>

				<!-- Next and previous buttons -->
				<a class="prev" onclick="plusSlides(-1)">&#10094;</a>
				<a class="next" onclick="plusSlides(1)">&#10095;</a>
			</div>
			<br>

			<!-- The dots/circles -->
			<div style="text-align:center">
				<span class="dot" onclick="currentSlide(1)"></span> 
				<span class="dot" onclick="currentSlide(2)"></span> 
				<span class="dot" onclick="currentSlide(3)"></span> 
			</div>
		</div>

		<link rel="stylesheet" href="http://cdn.leafletjs.com/leaflet/v0.7.7/leaflet.css"/>
		<script src="http://cdn.leafletjs.com/leaflet/v0.7.7/leaflet.js"></script>

		<div id="NearMonuments" class="tabcontent">
			<form method="post" action="index.php?action=addMonument">
				<input id="posName" name="posName" type="text" placeholder="Nom...">
				<input id="posLatitude" name="posLatitude" type="text" placeholder="Latitude...">
				<input id="posLongitude" name="posLongitude" type="text" placeholder="longitude...">
				<textarea name="posDescriptiv" placeholder="Description..."></textarea> 
				<input type="submit" value="ajouter">
			</form>
			<div id="map"></div>
			<script>
				function maPosition(position) {
					var latitude = position.coords.latitude;
					var longitude = position.coords.longitude;
					document.getElementById('posLatitude').value = latitude;
					document.getElementById('posLongitude').value = longitude;
					map.setView([latitude, longitude], 11);

					/*var marker = L.marker([<?= $_POST['posLatitude'] ?>, <?= $_POST['posLongitude'] ?>]).addTo(map);

					var popup = L.popup(); 
					popup.setLatLng([latitude, longitude]);
					popup.setContent("vous êtes ici");
					popup.openOn(map);*/

				}

				if(navigator.geolocation)
					navigator.geolocation.getCurrentPosition(maPosition);

				var map = L.map('map');
				var osmUrl='http://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png';
				var osm = new L.TileLayer(osmUrl);
				map.setView([47.750839, 7.335888], 11); //centre de la carte : [latitude, longitude], zoom
				map.addLayer(osm);
			</script>
		</div>

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


<script src="public/js/homeScript.js"></script>



<?php $content = ob_get_clean(); ?>

<?php require(__DIR__ . '/../template.php'); ?>