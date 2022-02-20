<?php
include_once("container.php");
class Product extends Container {
    function __construct($it) {
        parent::__construct($it);
    }

    function info(): string {
        return "<a href=\"products.php?id=" . parent::getArray()["ID"] . "\" target=\"_parent\"><div class=\"merch-div\" \">
        \n<div class=\"merch-title\">
        \n<h3 class=\"merch-title\">" . parent::getArray()["Title"] . "</h3>
        \n<hr class=\"merch-line\">
        \n<p class=\"merch-description\">" . parent::getArray()["Description"] . "</p>
        \n</div>
        \n<img src=\"" . parent::checkPicture(parent::getArray()["Img"]) . "\" class=\"merch-image\"></img>        
        \n</div></a>";
    }

    function max(): string {
        return "<div class=\"merch-div\" \">
        \n<div class=\"merch-title\">
        \n<h3 class=\"merch-title\">" . parent::getArray()["Title"] . "|" . parent::getArray()["Seller"] . "</h3>
        \n<hr class=\"merch-line\">
        \n<div class=\"buttons\">
        \n<button id=\"button-first\">Buy</button>
        \n<button id=\"button-middle\">Wishlist</button>
        \n<button id=\"button-last\">Review</button>
        \n</div>
        \n<p class=\"merch-description\">" . parent::getArray()["Description"] . "</p>
        \n</div>
        \n<img src=\"" . parent::checkPicture(parent::getArray()["Img"]) . "\" class=\"merch-image\"></img>        
        \n</div>";
    }
}
?>