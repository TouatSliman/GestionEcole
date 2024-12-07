<?php
if (isset($_POST["name"]) && isset($_POST["code"])) {
    require_once "models/nationality/creat.php";
    new addNationality($_POST["name"], $_POST["code"]);
} else {
    include_once "views/partials/head.php";
    include_once "views/partials/nav.php";
    echo "<h2 style='text-align: center; margin-top: 20px'>Nationality</h2>";
    include_once "views/addNationality.php";
}
