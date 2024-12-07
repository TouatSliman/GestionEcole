<?php

require_once "db/conn.php";
if (isset($id)) {
    $sql = "SELECT * FROM note WHERE id = '$id'";
} else {
    $sql = "SELECT * FROM note";
}
$result = $conn->query($sql);
if ($result->num_rows == 0) {
    $message = "ID not found";
    require_once "views/error.php";
    die();
}
