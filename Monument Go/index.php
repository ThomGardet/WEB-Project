<?php

require('controller/frontend/frontend.php');
require('controller/backend/connexion.php');

try
{
	if (isset($_GET['action'])) {
		if ($_GET['action'] == 'contact') {
			contact();
		}

		else if ($_GET['action'] == 'home') {
			home();
		}

		else if ($_GET['action'] == 'about') {
			about();
		}

		else if ($_GET['action'] == 'signin') {
			
			if (canConnect($_POST['username'], $_POST['password'])) {
				$idUser = connect($_POST['username'], $_POST['password']);
				home();
			}
			else {
				home();
			}
		}

		else if ($_GET['action'] == 'disconnect') {
			disconnect();
			home();
		}

		else if ($_GET['action'] == 'signup') {
			signup();
		}

		else if ($_GET['action'] == 'addFriend') {
			addFriend($_POST['email']);
		}

		else if ($_GET['action'] == 'addMonument') {
			addMonument($_POST['posName'], $_POST['posLatitude'], $_POST['posLongitude'], $_POST['posDescriptiv']);
			//home();
		}
	}
	

	else {
		home();
	}
	
}

catch (Exception $e)
{
	echo 'Erreur : ' . $e->getMessage();
}