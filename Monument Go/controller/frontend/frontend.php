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

