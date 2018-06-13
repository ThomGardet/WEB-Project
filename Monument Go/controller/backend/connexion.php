<?php

function canConnect($username, $password) {
	require_once(__DIR__ . '/../../model/LoginsManager.php');
	$loginsManager = new loginsManager(new PDO('mysql:host=localhost;dbname=test;charset=utf8', 'root', ''));
	if (!is_null($loginsManager->isDefined($username))) {
		$login = $loginsManager->get($loginsManager->isDefined($username));
		if (password_verify($password, $login->passWord())) {
			return true;
		}
	}
	return false;
}
function connect($username, $password) {
	require_once(__DIR__ . '/../../model/LoginsManager.php');
	$loginsManager = new loginsManager(new PDO('mysql:host=localhost;dbname=test;charset=utf8', 'root', ''));
	if (!is_null($loginsManager->isDefined($username))) {
		$login = $loginsManager->get($loginsManager->isDefined($username));
		
		/*$options = [
          'cost' => 11
        ];
    	$hash = password_hash($password, PASSWORD_BCRYPT, $options);
    	echo $hash;*/

		if (password_verify($password, $login->passWord())) {
			// Start the session
			//session_start();
			// Set session variables
			$_SESSION["connected"] = "true";
			$_SESSION["idUser"] = $login->idUser();
			return $login->idUser();
		}
		else {
			echo 'wrong pass';
		}
	}
	else {
		echo 'wrong email';
	}
}

function disconnect() {
	// remove all session variables
	session_unset(); 

	// destroy the session 
	session_destroy(); 
}