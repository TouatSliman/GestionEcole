<?php
if (isset($_POST["ID"]) && isset($_POST["fName"]) && isset($_POST["lName"]) && isset($_POST["dateOfBirth"]) && isset($_POST["gender"]) && isset($_POST["address"]) && isset($_POST["city"]) && isset($_POST["postalCode"]) && isset($_POST["country"]) && isset($_POST["platform"]) && isset($_POST["applications"]) && isset($_POST["nationality"]) && isset($_POST["sport"]) && isset($_POST["field"])) {
    require_once "models/etudient/update.php";

    //on update the image if unchanged so we keep the old one
    $profile = $_FILES["newProfile"]["name"];
    if ($profile == "") {
        $profile = $_POST["profile"];
    }
    
    new updateStudent(
        $_POST["ID"],
        $_POST["fName"],
        $_POST["lName"],
        $_POST["dateOfBirth"],
        $_POST["gender"],
        $_POST["address"],
        $_POST["city"],
        $_POST["postalCode"],
        $_POST["country"],
        implode(",", $_POST["platform"]),
        implode(",", $_POST["applications"]),
        $profile,
        $_POST["nationality"],
        implode(",", $_POST["sport"]),
        $_POST["field"]
    );

    header("Location: ./student");
}
require_once "views/partials/head.php";
require_once "views/partials/nav.php";
require_once "views/updateStudent.php";
require_once "views/partials/footer.php";
