<?php
if (isset($_POST["name"])) {
    require_once "models/univercity/creat.php";
    new addUnivercity($_POST["name"]);
} else {
    include_once "views/partials/head.php";
    include_once "views/partials/nav.php";
    echo "<h2 style='text-align: center; margin-top: 20px'>Univercity</h2>";
    include_once "views/addUnivercity.php";
}
