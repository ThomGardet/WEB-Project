<?php

require('controller/frontend/frontend.php');

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
	}
	

	else {
		home();
	}
	
}

catch (Exception $e)
{
	echo 'Erreur : ' . $e->getMessage();
}