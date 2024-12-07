<?php
require_once 'db/conn.php';

$name = $_POST['name'];
$username = $_POST['username'];
$password = $_POST['password'];
$role = $_POST['role'];

$sql = "INSERT INTO `users` (`name`, `username`, `password`, `role`) VALUES ('$name', '$username', '$password' , '$role')";
if ($conn->query($sql) === TRUE) {
    session_start();
    $_SESSION['error'] = "New record created successfully";
    header("Location: ./");
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
