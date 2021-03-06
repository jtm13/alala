<!DOCTYPE html>
<html>
   <head>
       <title>Products</title>
      <link rel="stylesheet" type="text/css" href="normalize.css">
      <link rel="stylesheet" type="text/css" href="global.css">
      <link rel="stylesheet" type="text/css" href="products.css">
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
      <?php
       include("product.php");
       include_once("private/defined.php");
       $conn = false;
       if (in_array("id", array_keys($_GET)) === false) {
         die("<p>Nothing is selected</p>");
      }
       try {
          $test = new PDO("mysql:host=" . SERVER_NAME . ";dbname=" . DATABASE_NAME, USERNAME, PASSWORD);
          // set the PDO error mode to exception
          $test->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
          $stmt = $test->prepare("CALL getProduct(:id);");
          $stmt->bindParam(":id", $id);
          if (filter_var($_GET["id"], FILTER_VALIDATE_INT) !== 0 && filter_var($_GET["id"], FILTER_VALIDATE_INT) === false) {
              die("<p>Don't mess with the id.</p>");
          }
          $id = $_GET["id"];
          $stmt->execute();

          // set the resulting array to associative
          $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
          foreach(new RecursiveArrayIterator($stmt->fetchAll()) as $it) {
              $conn = true;
              $ev = new Product($it);
              echo $ev->max();
          }
          $stmt->closeCursor();
       } catch(PDOException $e) {
           $conn = true;
         echo "<h1><b>Connection failed:</b></h1>\n<p>Sorry, we could not connect with the server.
          Try again in a few hours.</p>" /*. $e->getMessage()*/;
       }
       if (!$conn) {
          header("Location: login.php", true, 330);
          exit();
       }
      ?>
      <footer>
          <p id="copyright">Alala Copyright 2022</p>
      </footer>
   </body>
</html>