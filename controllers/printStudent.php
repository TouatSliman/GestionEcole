<?php
include_once "views/partials/head.php";
include_once "views/partials/nav.php";
if (isset($_POST["fName"]) && isset($_POST["lName"]) && isset($_POST["dateOfBirth"]) && isset($_POST["gender"]) && isset($_POST["address"]) && isset($_POST["city"]) && isset($_POST["postalCode"]) && isset($_POST["platform"]) && isset($_POST["applications"]) && isset($_POST["nationality"]) && isset($_FILES["profile"]) && isset($_POST["country"])) {
    require_once "views/printStudent.php";
} else {
    $message = "missing parameters , please try again";
    include_once "views/error.php";
    die();
}
include_once "views/partials/footer.php";
