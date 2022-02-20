<!DOCTYPE html>
<html>
   <head>
       <title>Users</title>
      <link rel="stylesheet" type="text/css" href="normalize.css">
      <link rel="stylesheet" type="text/css" href="global.css">
      <link rel="stylesheet" type="text/css" href="users.css">
   </head>
   <body>
       <?php
        if ((session_id() === false) && (!in_array("user", array_keys($_POST)) || !in_array("pass", array_keys($_POST)))) {
            header("Location: login.php");
            exit();
        }
        session_start();
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
      <?php
       include("user.php");
       include_once("private/defined.php");
       $conn = false;
       try {
          $test = new PDO("mysql:host=" . SERVER_NAME . ";dbname=" . DATABASE_NAME, USERNAME, PASSWORD);
          // set the PDO error mode to exception
          $test->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
          $stmt = $test->prepare("CALL getUser(:user,:pass);");
          $stmt->bindParam(":user", $user);
          $stmt->bindParam(":pass", $pass);
          $user = htmlspecialchars($_SESSION["User"]);
          $pass = htmlspecialchars($_SESSION["Pass"]);
          $stmt->execute();

          // set the resulting array to associative
          $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
          foreach(new RecursiveArrayIterator($stmt->fetchAll()) as $it) {
              $conn = true;
              $ev = new User($it);
              echo $ev->info();
          }
          $stmt->closeCursor();
       } catch(PDOException $e) {
           $conn = true;
         echo "<h1><b>Connection failed:</b></h1>\n<p>Sorry, we could not connect with the server.
          Try again in a few hours.</p>" /*. $e->getMessage()*/;
       }
      ?>
      <footer>
          <p id="copyright">Alala Copyright 2022</p>
      </footer>
   </body>
</html>