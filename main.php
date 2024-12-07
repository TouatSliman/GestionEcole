<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="src/css/main.css">
    <title>Paw</title>
</head>

<body>
    <?php
    session_start();
    if (isset($_SESSION['error'])) {
        echo  "<script class='error'>alert('" . $_SESSION['error'] . "')</script>";
        unset($_SESSION['error']);
    }
    ?>
    <form action="./login" method="post" id="login">
        <h2>Login</h2>
        <label for="l_username">Email : </label>
        <input type="text" name="username" id="l_username" placeholder="email" required>
        <label for="l_password">Password : </label>
        <input type="password" class="password" name="password" id="l_password" placeholder="password" required>
        <input type="checkbox" class="hide_password">
        <div class="button">
            <input type="submit" value="Login">
        </div>
        <p>Don't have an account ? <a onclick="register()">Register</a></p>
    </form>
    <form action="./register" method="post" id="register" class="hidden">
        <h2>Register</h2>
        <label for="r_name">Name : </label>
        <input type="text" name="name" id="r_name" placeholder="name" required>
        <label for="r_username">Email : </label>
        <input type="text" name="username" id="r_username" placeholder="email" required>
        <label for="r_password">Password : </label>
        <input type="password" class="password" name="password" id="r_password" placeholder="password" required>
        <input type="checkbox" class="hide_password">
        <label for="role">Role :</label>
        <select name="role" id="role">
            <option value="a">Admin</option>
            <option value="u">User</option>
        </select>
        <div class="button">
            <input type="submit" value="Register">
        </div>
        <p>Already have an account ? <a onclick="login()">Login</a></p>
    </form>
    <script src="src/js/main.js"></script>
</body>

</html>