<?php
if (isset($_POST["note"])) {
    require_once "models/bulletin/creat.php";
    new addBulletin($_POST["etud"], $_POST["module"], $_POST["note"]);
} else {
    include_once "views/partials/head.php";
    include_once "views/partials/nav.php";
    $message = "missing parameters , please try again";
    include_once "views/error.php";
    include_once "views/partials/footer.php";
    die();
}