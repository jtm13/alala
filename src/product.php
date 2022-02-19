<?php
include_once("container.php");
class Product extends Container {
    function __construct($it) {
        parent::__construct($it);
    }

    function info(): string {
        return "<a href=\"products.php?id=" . parent::getArray()["ID"] . "\"><div class=\"merch-div\" \">
        \n<div class=\"merch-title\">
        \n<h3 class=\"merch-title\">" . parent::getArray()["Title"] . "</h3>" .
        //\n<h6 class=\"merch-seller\">" . parent::getArray()["Seller"] . "</h6>
        "\n<hr class=\"merch-line\">
        \n<p class=\"merch-description\">" . parent::getArray()["Description"] . "</p>
        \n</div>
        \n<img src=\"" . parent::checkPicture(parent::getArray()["Img"]) . "\" class=\"merch-image\"></img>        
        \n</div></a>";
    }
}
?>