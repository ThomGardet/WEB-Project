<?php

require('controller/frontend/frontend.php');

try
{
	home();
}

catch (Exception $e)
{
	echo 'Erreur : ' . $e->getMessage();
}