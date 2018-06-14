<?php

//start the session
session_start();

//include autoload file from vendor folder
require './vendor/autoload.php';


$fb = new Facebook\Facebook([
    'app_id' => '2080085645536328', // replace your app_id
    'app_secret' => '91c61e5b487153bee663bf28f7a13fb4',   // replace your app_scsret
    'default_graph_version' => 'v3.0'
        ]);


$helper = $fb->getRedirectLoginHelper();
$login_url = $helper->getLoginUrl("http://localhost/fb-login/");

try {

    $accessToken = $helper->getAccessToken();
    if (isset($accessToken)) {
        $_SESSION['access_token'] = (string) $accessToken;  //conver to string
        //if session is set we can redirect to the user to any page 
        header("Location:index.php");
    }
} catch (Exception $exc) {
    echo $exc->getTraceAsString();
}


//now we will get users first name , email , last name
if (isset($_SESSION['access_token'])) {

    try {

        $fb->setDefaultAccessToken($_SESSION['access_token']);
        $res = $fb->get('/me?locale=en_US&fields=name,email');
        $user = $res->getGraphUser();
        print_r($user);
        
    } catch (Exception $exc) {
        echo $exc->getTraceAsString();
    }
}







