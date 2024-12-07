<?php
if (
    isset($_POST["number"]) &&
    isset($_POST["name"]) &&
    isset($_POST["civility"]) &&
    isset($_POST["address"]) &&
    isset($_POST["paye"]) &&
    isset($_POST["grade"]) &&
    isset($_POST["specialty"]) &&
    isset($_POST["univercity"]) &&
    isset($_POST["placeOfBirth"]) &&
    isset($_POST["dateOfBirth"])
) {
    require_once "models/teacher/creat.php";
    new addTeacher(
        $_POST["number"],
        $_POST["civility"],
        $_POST["name"],
        $_POST["address"],
        $_POST["paye"],
        $_POST["grade"],
        $_POST["specialty"],
        $_POST["dateOfBirth"],
        $_POST["placeOfBirth"],
        $_POST["univercity"]
    );
    header("Location: ./teacher");
} else {
    include_once "views/partials/head.php";
    include_once "views/partials/nav.php";
    $message = "missing parameters , please try again";
    include_once "views/error.php";
    include_once "views/partials/footer.php";
    die();
}
