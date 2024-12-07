<?php
if (isset($_POST["note"]) && isset($_POST["etud"]) && isset($_POST["module"])) {
    require_once "models/bulletin/update.php";

    new updateBulletin(
        $_POST["etud"],
        $_POST["module"],
        $_POST["note"]
    );

    header("Location: ./bulletin");
}
require_once "views/partials/head.php";
require_once "views/partials/nav.php";
require_once "views/updateBulletin.php";
require_once "views/partials/footer.php";
