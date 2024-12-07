<?php
require_once 'db/conn.php';

$name = $_POST['username'];
$password = $_POST['password'];
if (empty($name) || empty($password)) {
    session_destroy();
    session_start();
    $_SESSION['error'] = "Please enter username and password";
    header("Location: ./");
    $conn->close();
}
$sql = "SELECT * FROM users WHERE username = '$name' AND password = '$password'";

$result = $conn->query($sql);
if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    session_start();
    $_SESSION['name'] = $row['name'];
    $_SESSION['username'] = $row['username'];
    $_SESSION['password'] = $row['password'];
    $_SESSION['role'] = $row['role'];
    if ($row['role'] == 'a') {
        header("Location: ./welcome");
    }else{
        header("Location: connected.php");
    }
    $conn->close();
} else {
    session_destroy();
    session_start();
    $_SESSION['error'] = "User not found";
    header("Location: ./");
    $conn->close();
}
