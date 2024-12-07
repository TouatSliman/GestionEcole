<?php
if (isset($_POST["name"])) {
    require_once "models/sport/creat.php";
    new addSport($_POST["name"]);
} else {
    echo "<h2 style='text-align: center; margin-top: 20px'>Sport</h2>";
    include_once "views/addSport.php";
}
