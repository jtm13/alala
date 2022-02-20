<!DOCTYPE html>
<html>
   <head>
       <title>New Product</title>
      <link rel="stylesheet" type="text/css" href="normalize.css">
      <link rel="stylesheet" type="text/css" href="global.css">
      <link rel="stylesheet" type="text/css" href="newProduct.css">
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
        <form action="upload.php" method="post">
            <input type="hidden" id="user" name="user" value=<?php echo '"' . $_SESSION["User"] . '"';?>>
            <input type="hidden" id="pass" name="pass" value=<?php echo '"' . $_SESSION["Pass"] . '"';?>>
            <label for="title" id="title-text">Product Title:</label>
            <input type="text" id="title" name="title"><br>
            <label for="description" id="decription-text">Product Description:</label>
            <input type="textarea" id="description" name="description"><br>
            <label for="picture" id="picture-text">Product Picture:</label>
            <input type="file" id="picture" name="picture"><br>
            <label for="other-picture" id="other-picture-text">Design Picture:</label>
            <input type="file" id="other-picture" name="other-picture"><br>
            <input type="submit" value="submit"><br>
        </form>
      <footer>
          <p id="copyright">Alala Copyright 2022</p>
      </footer>
   </body>
</html>