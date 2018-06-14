<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title> Monument Go - <?= $title ?> </title>
        <link rel="stylesheet" type="text/css" href="public/css/templateStyle.css" >
        <link rel = "stylesheet" href = "public/bootstrap/css/bootstrap.min.css">
    </head>
        
    <body>


        <?php 
        if (isset($_SESSION['connected'])) {
            require_once(__DIR__ . '/../model/UsersManager.php');
            require_once(__DIR__ . '/../model/friendsManager.php');

            $usersManager = new UsersManager(new PDO('mysql:host=localhost;dbname=test;charset=utf8', 'root', ''));
            $friendsManager = new FriendsManager(new PDO('mysql:host=localhost;dbname=test;charset=utf8', 'root', ''));

            $user = $usersManager->get($_SESSION['idUser']);
            $usersFriends = $friendsManager->getFriends($user->id(), $usersManager);
        }

        if (!(isset($_SESSION['connected']) && $_SESSION['connected'] == 'true')) {

        ?>

        <!-- The Modal -->
        <div id="id01" class="modal">
            <span onclick="document.getElementById('id01').style.display='none'" class="close" title="Close Modal">&times;</span>

        <!-- Modal Content -->
            <div class="container">
                <form action="index.php?action=signin" method="POST">
                    <div class="row">
                        <h2 style="text-align:center">Login with Social Media or Manually</h2>
                        <div class="vl">
                            <span class="vl-innertext">or</span>
                        </div>

                        <div class="col">
                            <a href="#" class="fb btn">
                                <i class="fa fa-facebook fa-fw"></i> Login with Facebook
                            </a>
                            <a href="#" class="twitter btn">
                                <i class="fa fa-twitter fa-fw"></i> Login with Twitter
                            </a>
                            <a href="#" class="google btn">
                                <i class="fa fa-google fa-fw"></i> Login with Google+
                            </a>
                        </div>

                        <div class="col">
                            <div class="hide-md-lg">
                                <p>Or sign in manually:</p>
                            </div>

                            <input type="text" name="username" placeholder="Username" required>
                            <input type="password" name="password" placeholder="Password" required>
                            <input type="submit" value="Login">
                        </div>

                    </div>
                </form>
            </div>

            <div class="bottom-container">
              <div class="row">
                <div class="col">
                  <a href="index.php?action=signup" style="color:white" class="btn">Sign up</a>
                </div>
                <div class="col">
                  <a href="#" style="color:white" class="btn">Forgot password?</a>
                </div>
              </div>
            </div>
        </div>

        <?php 
        } ?>

    	<div class="header">
            <a href="#index.php?action=home" class="logo"><img src="public/pics/logo.png"> </a>
            <div class="header-right">
                <a <?php if ((isset($_GET['action']) && $_GET['action'] == 'home') || !isset($_GET['action'])) echo 'class="active"' ?> href="index.php?action=home">Home</a>
                <a <?php if (isset($_GET['action']) && $_GET['action'] == 'contact') echo 'class="active"' ?> href="index.php?action=contact">Contact</a>
                <a <?php if (isset($_GET['action']) && $_GET['action'] == 'about') echo 'class="active"' ?> href="index.php?action=about">About</a>

                <?php 
                if (!(isset($_SESSION['connected']) && $_SESSION['connected'] == 'true')) {
                ?>

                <!-- Button to open the modal login form -->
                <a href="#" class="user_infos" onclick="document.getElementById('id01').style.display='block'" width=50px, height=50px> Connect </a>

                <?php
                } else {

                    ?>

                    <span> <a href="index.php?action=disconnect"> Bonjour <?= $user->firstName() ?> </a> </span>

                    <?php
                } 

                ?>

            </div>
        </div> 	

        <?php 
            if (isset($_SESSION['connected']) && $_SESSION['connected'] == 'true') {
             ?>
                <aside>
                    <h2 style="padding-left: 5px"> Liste d'Amis </h2>
                    <ul>
                <?php 
                    foreach ($usersFriends as $friend) {
                        echo "<li> <a href=#> " . $friend->firstName() . " " . $friend->lastName() . " </a> </li>";
                    }
                ?>

            <?php
        }

        ?>
            </ul>
            <form method="POST" action="index.php?action=addFriend">
                <input type="text" name="email" placeholder="email...">
                <input type="submit" value="ajouter un ami">
            </form>

        </aside>

		<div class="main">
        	<?= $content ?>
        </div>

        <?php if (isset($_SESSION['connected']) && $_SESSION['connected'] == 'true') {
            ?>
            <style>
                .main {width: 80%;}
            </style>

            <?php
        } ?>

        <script src="public/js/templateScript.js"></script>
    </body>
</html>