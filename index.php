<?php
require "router/router.php";

$router = new Router();

$router->addRoute("GET", "/student/", function () {
    include "main.php";
});

$router->addRoute("GET", "/student/welcome", function () {
    include "controllers/welcome.php";
});

$router->addRoute("GET", "/student/connected", function () {
    include "connected.php";
});

$router->addRoute("POST", "/student/login", function () {
    include "controllers/login.php";
});

$router->addRoute("POST", "/student/register", function () {
    include "controllers/register.php";
});



//----------- STUDENT ROUTES -----------
$router->addRoute("GET", "/student/student", function () {
    $obj = "Student";
    include "controllers/registerStudent.php";
});

$router->addRoute("GET", "/student/listStudent", function () {
    $obj = "Student";
    include "controllers/listStudent.php";
});

$router->addRoute("POST", "/student/printStudent", function () {
    include "controllers/printStudent.php";
});

$router->addRoute("POST", "/student/creatStudent", function () {
    include "controllers/creatStudent.php";
});

$router->addRoute("GET", "/student/updateStudent", function () {
    $obj = "Student";
    include "controllers/updateStudent.php";
});

$router->addRoute("POST", "/student/updateStudent", function () {
    $obj = "Student";
    include "controllers/updateStudent.php";
});

$router->addRoute("GET", "/student/deleteStudent", function () {
    $obj = "Student";
    include "controllers/deleteStudent.php";
});

$router->addRoute("POST", "/student/deleteStudent", function () {
    $obj = "Student";
    include "controllers/deleteStudent.php";
});

//----------- TEACHER ROUTES -----------
$router->addRoute("GET", "/student/teacher", function () {
    $obj = "Teacher";
    include "controllers/registerTeacher.php";
});

$router->addRoute("GET", "/student/listTeacher", function () {
    $obj = "Teacher";
    include "controllers/listTeacher.php";
});

$router->addRoute("POST", "/student/creatTeacher", function () {
    include "controllers/creatTeacher.php";
});

//----------- MODULE ROUTES -----------
$router->addRoute("GET", "/student/module", function () {
    $obj = "Module";
    include "controllers/registerModule.php";
});

$router->addRoute("GET", "/student/listModule", function () {
    $obj = "Module";
    include "controllers/listModule.php";
});

$router->addRoute("POST", "/student/creatModule", function () {
    include "controllers/creatModule.php";
});

//----------- BULLETIN ROUTES -----------
$router->addRoute("GET", "/student/bulletin", function () {
    $obj = "Bulletin";
    include "controllers/registerBulletin.php";
});

$router->addRoute("GET", "/student/listBulletin", function () {
    $obj = "Bulletin";
    include "controllers/listBulletin.php";
});

$router->addRoute("POST", "/student/creatBulletin", function () {
    include "controllers/creatBulletin.php";
});

$router->addRoute("GET", "/student/updateBulletin", function () {
    $obj = "Bulletin";
    include "controllers/updateBulletin.php";
});

$router->addRoute("POST", "/student/updateBulletin", function () {
    include "controllers/updateBulletin.php";
});

$router->addRoute("GET", "/student/deleteBulletin", function () {
    $obj = "Bulletin";
    include "controllers/deleteBulletin.php";
});

$router->addRoute("POST", "/student/deleteBulletin", function () {
    include "controllers/deleteBulletin.php";
});

$router->addRoute("GET", "/student/tableBulletin", function () {
    $obj = "Bulletin";
    include "views/partials/head.php";
    include "views/partials/nav.php";
    include "controllers/tableBulletin.php";
});

$router->addRoute("GET", "/student/tableBulletinEtud", function () {
    include "controllers/tableBulletinEtud.php";
});

//----------- TABLE ROUTES -----------

$router->addRoute("GET", "/student/tables", function () {
    include "views/partials/head.php";
    include "views/partials/nav.php";
    if (!isset($_GET['url'])) {
        echo "<form style='text-align: center; margin-top: 20px' method='GET' action='./tables'><div class='container'><h1>Tables</h1><div class='buttons'><input type='submit' name='url' value='Nationality'><input type='submit' name='url' value='Sport'><input type='submit' name='url' value='Field'><input type='submit' name='url' value='Univercity'></div></div></form>";
    } else if ($_GET['url'] == "Nationality") {
        include "controllers/creatNationality.php";
    } else if ($_GET['url'] == "Sport") {
        include "controllers/creatSport.php";
    } else if ($_GET['url'] == "Field") {
        include "controllers/creatField.php";
    } else if ($_GET['url'] == "Univercity") {
        include "controllers/creatUnivercity.php";
    }

    include "views/partials/footer.php";
});

$router->addRoute("POST", "/student/nationalities", function () {
    include "controllers/creatNationality.php";
});

$router->addRoute("GET", "/student/natlist", function () {
    include "controllers/listNat.php";
});

$router->addRoute("POST", "/student/sport", function () {
    include "controllers/creatSport.php";
});

$router->addRoute("GET", "/student/sportlist", function () {
    include "controllers/listSport.php";
});

$router->addRoute("POST", "/student/field", function () {
    include "controllers/creatField.php";
});

$router->addRoute("GET", "/student/fieldlist", function () {
    include "controllers/listField.php";
});

$router->addRoute("POST", "/student/univercity", function () {
    include "controllers/creatUnivercity.php";
});

$router->addRoute("GET", "/student/univercitylist", function () {
    include "controllers/listUnivercity.php";
});

//----------- PV ROUTES -----------
$router->addRoute("GET", "/student/pv", function () {
    include "views/partials/head.php";
    include "views/partials/nav.php";
    include "controllers/creatPV.php";
    include "views/partials/footer.php";
});


//----------- STATISTIQUE ROUTES -----------
$router->addRoute("GET", "/student/statistique", function () {
    include "views/partials/head.php";
    include "views/partials/nav.php";
    include "controllers/creatStat.php";
    // include "controllers/creatUserStat.php";
    include "views/partials/footer.php";
});
//----------- Mail ROUTES -----------
$router->addRoute("GET", "/student/sendBulletin", function () {
    include "controllers/sendBulletin.php";
});

echo $router->matchRequest();
