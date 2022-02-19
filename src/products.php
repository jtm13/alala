<!DOCTYPE html>
<html>
   <head>
      <link rel="stylesheet" type="text/css" href="normalize.css">
      <link rel="stylesheet" type="text/css" href="global.css">
      <link rel="stylesheet" type="text/css" href="products.css">
   </head>
   <body>
      <?php
       include("product.php");
       include_once("private/defined.php");
       $conn = false;
       if (in_array("search", array_keys($_POST)) === false) {
         die("<p>Enter something for products to show up</p>");
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
              echo $ev->info();
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
   </body>
</html>