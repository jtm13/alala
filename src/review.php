<?php
include_once("container.php");
class Review extends Container {
    function __construct($it) {
        parent::__construct($it);
    }

    function info(): string {
        return "<div class=\"review-div\" \">
        \n<div class=\"review-title\">
        \n<h3 class=\"review-title\">" . parent::getArray()["User"] . "</h3>
        \n<hr class=\"review-line\">
        \n<p class=\"review-description\">" . parent::getArray()["Description"] . "</p>
        \n</div>
        \n<h3 class=\"review-rating\">" . parent::checkPicture(parent::getArray()["Rating"]) . "</h3>        
        \n</div>";
    }
}
?>