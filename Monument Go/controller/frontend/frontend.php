<?php

session_start();

function home()
{
	if (isset($_SESSION['connected']) && $_SESSION['connected'] == 'true') 
	{
		require_once(__DIR__ . '/../../model/UsersManager.php');
		require_once(__DIR__ . '/../../model/FriendsManager.php');
		require_once(__DIR__ . '/../../model/PostsManager.php');
		$usersManager = new UsersManager(new PDO('mysql:host=localhost;dbname=test;charset=utf8', 'root', ''));
		$friendsManager = new FriendsManager(new PDO('mysql:host=localhost;dbname=test;charset=utf8', 'root', ''));
		$postsManager = new PostsManager(new PDO('mysql:host=localhost;dbname=test;charset=utf8', 'root', ''));

		$friends = $friendsManager->getFriends($_SESSION['idUser'], $usersManager);
	}
	require_once(__DIR__ . '/../../view/frontend/HomeView.php');
}

function contact()
{
	if (isset($_SESSION['connected']) && $_SESSION['connected'] == 'true') 
	{
		require_once(__DIR__ . '/../../model/UsersManager.php');
		$usersManager = new UsersManager(new PDO('mysql:host=localhost;dbname=test;charset=utf8', 'root', ''));
		$user = $usersManager->get($_SESSION['idUser']);
	}
	require_once(__DIR__ . '/../../view/frontend/ContactView.php');
}

function about()
{
	require_once(__DIR__ . '/../../view/frontend/AboutView.php');
}

function signup()
{
	require_once(__DIR__ . '/../../view/frontend/signupView.php');
}

function addFriend($mail) 
{
	if (isset($_SESSION['connected']) && $_SESSION['connected'] == 'true') 
	{
		require_once(__DIR__ . '/../../model/UsersManager.php');
		require_once(__DIR__ . '/../../model/FriendsManager.php');
		$usersManager = new UsersManager(new PDO('mysql:host=localhost;dbname=test;charset=utf8', 'root', ''));
		$friendsManager = new FriendsManager(new PDO('mysql:host=localhost;dbname=test;charset=utf8', 'root', ''));

		$friends = $friendsManager->getFriends($_SESSION['idUser'], $usersManager);

		$idUser = $usersManager->isMailExists($mail);
		if ($idUser > 0) {
			$user = $usersManager->get($idUser);
			$friendsManager->add(new Friend(['idUser' => $_SESSION['idUser'], 'idFriend' => $idUser]));
			echo '<script> alert("' . $user->firstName() . ' ' . $user->lastName() . ' has been added") </script>';
		}
		else {
			echo '<script> alert("wrong mail") </script>';
		}
	}
	require_once(__DIR__ . '/../../view/frontend/HomeView.php');
}

function addMonument($name, $latitude, $longitude, $descriptiv) {
	//print_r($descriptiv);
	require_once(__DIR__ . '/../../model/MonumentsManager.php');
	$monumentsManager = new MonumentsManager(new PDO('mysql:host=localhost;dbname=test;charset=utf8', 'root', ''));

	$monument = new Monuments(['name' => $name, 'latitude' => $latitude, 'longitude' => $longitude, 'descriptif' => $descriptiv]);
	$monumentsManager->add($monument);
	home();
}