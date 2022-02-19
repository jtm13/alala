<?php
include_once("container.php");
class User extends Container {
    function __construct($it) {
        parent::__construct($it);
    }

    function info(): string {
        return "<div class=\"user-info\" \">
        \n<div class=\"info-div\">
        \n<h3 class=\"Username\">Hello " . htmlspecialchars($_SESSION["User"]) . ",</h3>
        \n</div>
        \n<p>" . parent::getArray()["Email"] . "</p>
        \n<div class=\"info\">
        \n<ul>
        \n<li>" . parent::getArray()["Money"] . "</li>
        \n<li>" . parent::getArray()["Debt"] . "</li>
        \n<li>" . parent::getArray()["Net"] . "</li>
        \n</ul>
        \n</div>
        \n</div>";
    }
}
?>