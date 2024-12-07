<?php

require_once "db/conn.php";
if (isset($id)) {
    $sql = "SELECT * FROM students WHERE ID = '$id'";
} else {
    $sql = "SELECT * FROM students";
}
$result = $conn->query($sql);
if ($result->num_rows == 0) {
    $message = "ID not found";
    require_once "views/error.php";
    die();
}
