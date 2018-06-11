<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title> Monument Go - <?= $title ?> </title>
        <link rel="stylesheet" type="text/css" href="public/css/style.css" >
    </head>
        
    <body>
        <!-- Button to open the modal login form -->

        <!-- The Modal -->
        <div id="id01" class="modal">
        <span onclick="document.getElementById('id01').style.display='none'" class="close" title="Close Modal">&times;</span>

        <!-- Modal Content -->
        <form class="modal-content animate" action="/action_page.php">
            <div class="imgcontainer">
                <img src="public/pics/user.png" alt="Avatar" class="avatar" width=80px, height=80>
            </div>

            <div class="container">
                <label for="uname"><b>Username</b></label>
                <input type="text" placeholder="Enter Username" name="uname" required>

                <label for="psw"><b>Password</b></label>
                <input type="password" placeholder="Enter Password" name="psw" required>

                <button type="submit">Login</button>
                <label>
                    <input type="checkbox" checked="checked" name="remember"> Remember me
                </label>
            </div>

            <div class="container" style="background-color:#f1f1f1">
                <button type="button" onclick="document.getElementById('id01').style.display='none'" class="cancelbtn">Cancel</button>
                    <span class="psw">Forgot <a href="#">password?</a></span>
                    <span class="sign_in"> <a href="#"> Haven't an account yet? </a> </span>
            </div>
            </form>
        </div>
    	<div class="header">
            <a href="#default" class="logo">MonumentGo</a>
            <div class="header-right">
                <a class="active" href="index.php?action=home">Home</a>
                <a href="index.php?action=contact">Contact</a>
                <a href="index.php?action=about">About</a>
                <img src="public/pics/user.png" alt="user infos" class="user_infos" onclick="document.getElementById('id01').style.display='block'">    
            </div>
        </div> 	

		<div class="main">
        	<?= $content ?>
        </div>

        <script src="public/js/script.js"></script>
    </body>
</html>