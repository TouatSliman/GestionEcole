<?php
if (isset($_POST["fName"]) && isset($_POST["lName"]) && isset($_POST["dateOfBirth"]) && isset($_POST["gender"]) && isset($_POST["address"]) && isset($_POST["city"]) && isset($_POST["postalCode"]) && isset($_POST["platform"]) && isset($_POST["applications"]) && isset($_POST["nationality"]) && isset($_FILES["profile"]) && isset($_POST["country"])) {
    require_once "models/etudient/creat.php";
    new addStudent(
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
        $_FILES["profile"]["name"],
        $_POST["nationality"],
        implode(",", $_POST["sport"]),
        $_POST["field"]
    );
    header("Location: ./student");
} else {
    include_once "views/partials/head.php";
    include_once "views/partials/nav.php";
    $message = "missing parameters , please try again";
    include_once "views/error.php";
    include_once "views/partials/footer.php";
    die();
}
