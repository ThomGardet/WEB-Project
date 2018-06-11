<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title><?= $title ?></title>
        <link rel="stylesheet" type="text/css" href="public/css/style.css" >
    </head>
        
    <body>
    	<div class="navbar">
    		<span id="Home"> Bureau Des Irreductibles Gaulois </span>

    		<div class="dropdown">
  				<div class="container dropbtn" id="sandwichButton" onclick="myFunction(this)">
					<div class="bar1"></div>
					<div class="bar2"></div>
					<div class="bar3"></div>
				</div>
  				<div id="myDropdown" class="dropdown-content">
    				<a href="index.php">Nouvelle vente</a>
    				<a href="index.php?action=voirVentes">Voir les ventes</a>
                    <a href="index.php?action=modifyProducts">Modifier la table des produits</a>
  				</div>
			</div>
		</div>    	

		<div class="main">
        	<?= $content ?>
        </div>

        <script src="public/js/script.js"></script>
    </body>
</html>