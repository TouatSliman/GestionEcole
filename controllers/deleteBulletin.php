<?php
if (isset($_POST["ID"])) {
    require_once "models/bulletin/delete.php";

    new deleteBulletin(
        $_POST["ID"],
    );

    header("Location: ./listBulletin");
}
require_once "views/partials/head.php";
require_once "views/partials/nav.php";
require_once "views/deleteBulletin.php";
echo "</body></html>";
