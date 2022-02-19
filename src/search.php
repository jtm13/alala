<!DOCTYPE html>

<html lang="en-US">
    <head>
        <title>Bank of Justin</title>
        <link rel="stylesheet" type="text/css" href="normalize.css">
        <link rel="stylesheet" type="text/css" href="global.css">
        <link rel="stylesheet" type="text/css" href="search.css">
        <link rel="icon" type="image/x-icon" href="img/alala.png">
    </head>
    <body>
        <?php
        if ((session_id() === false) && (!in_array("user", array_keys($_POST)) || !in_array("pass", array_keys($_POST)))) {
            header("Location: login.php");
            exit();
        }
        session_start();
        $_SESSION["User"] = $_POST["user"];
        $_SESSION["Pass"] = $_POST["pass"];
        ?>
        <header>
            <span id="name">Alala</span>
            <button>
                <a href="login.php">
                    <?php echo htmlspecialchars($_SESSION["User"]); ?>
                </a>
            </button>
        </header>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <form method="post" action="main.php" target="searched">
            <label for="user" id="search-text">Username:</label>
            <input type="text" id="search" name="search"><br>
        </form>
        <hr>
        <br>
        <iframe src="main.php" id="searched" name="searched"></iframe>
        <footer>
            <p id="copyright">Alala Copyright 2022</p>
        </footer>
    </body>
</html>