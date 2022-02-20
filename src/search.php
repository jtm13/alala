<!DOCTYPE html>

<html lang="en-US">
    <head>
        <title>Search</title>
        <link rel="stylesheet" type="text/css" href="normalize.css">
        <link rel="stylesheet" type="text/css" href="global.css">
        <link rel="stylesheet" type="text/css" href="search.css">
        <link rel="icon" type="image/x-icon" href="img/alala.png">
    </head>
    <body>
        <?php
        include_once("private/defined.php");
        if ((session_id() === false) && (!in_array("user", array_keys($_POST)) || !in_array("pass", array_keys($_POST)))) {
            header("Location: login.php");
            exit();
        }
        $conn = false;
       try {
          $test = new PDO("mysql:host=" . SERVER_NAME . ";dbname=" . DATABASE_NAME, USERNAME, PASSWORD);
          // set the PDO error mode to exception
          $test->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
          $stmt = $test->prepare("CALL getUser(:user,:pass);");
          $stmt->bindParam(":user", $user);
          $stmt->bindParam(":pass", $pass);
          $user = htmlspecialchars($_POST["user"]);
          $pass = htmlspecialchars($_POST["pass"]);
          $stmt->execute();

          // set the resulting array to associative
          $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
          foreach(new RecursiveArrayIterator($stmt->fetchAll()) as $it) {
              $conn = true;
              break;
          }
          $stmt->closeCursor();
        } catch(PDOException $e) {
            $conn = true;
          echo "<h1><b>Connection failed:</b></h1>\n<p>Sorry, we could not connect with the server.
           Try again in a few hours.</p>" /*. $e->getMessage()*/;
        }
        if (!$conn) {
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
                <a href="users.php">
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
            <label for="search" id="search-text">Username:</label>
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