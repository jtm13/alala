<!DOCTYPE html>
<html lang="en-US">
    <head>
        <title>Login</title>
        <link rel="stylesheet" type="text/css" href="normalize.css">
        <link rel="stylesheet" type="text/css" href="global.css">
        <link rel="stylesheet" type="text/css" href="login.css">
        <link rel="icon" type="image/x-icon" href="img/alala.png">
    </head>
    <body>
        <header>
            <span id="name">Alala</span>
            <button>
                <a href="login.html">
                    Sign in
                </a>
            </button>
        </header>
        <img src="img/alala.png" alt="Logo"></img>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <form method="post" action="search.php">
            <label for="user">Username:</label>
            <input type="text" id="user" name="user"><br/>
            <label for="pass">Password: </label>
            <input type="password" id="pass" name="pass" autocomplete="yes"><br/>
            <input type="submit" id="submit-button" value="Submit">
        </form>
        <?php
        if(session_id() !== false) {
            echo "<p id=\"response\">Please enter your username and password</p>";
        } else {
            header("Location: search.php");
            exit();
        }
        ?>
        <footer>
            <p id="copyright">Alala Copyright 2022</p>
        </footer>
    </body>
</html>