<?php
if (isset($_POST["ID"])) {
    require_once "models/etudient/delete.php";

    new deleteStudent(
        $_POST["ID"],
    );

    header("Location: ./student");
}
require_once "views/partials/head.php";
require_once "views/partials/nav.php";
require_once "views/deleteStudent.php";
echo "</body></html>";
