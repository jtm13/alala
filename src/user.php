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
        \n<p>Email: " . parent::getArray()["Email"] . "</p>
        \n<p>Crypto Address: " . parent::getArray()["CAdd"] . "</p>
        \n</div>";
    }

    static function max($prod): string {
        return "\n<li>" . $prod["Title"];
    }
}
?>