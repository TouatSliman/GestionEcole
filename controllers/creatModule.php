<?php
if (isset($_POST["code"]) && isset($_POST["designation"]) && isset($_POST["coff"]) && isset($_POST["vol"]) && isset($_POST["field"])) {
    echo "reached";
    require_once "models/module/creat.php";
    new addModule($_POST["code"], $_POST["designation"], $_POST["coff"], $_POST["vol"], $_POST["field"]);
} else {
    include_once "views/partials/head.php";
    include_once "views/partials/nav.php";
    $message = "missing parameters , please try again";
    include_once "views/error.php";
    include_once "views/partials/footer.php";
    die();
}