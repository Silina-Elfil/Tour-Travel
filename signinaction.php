<?php

session_start();
include("connection.php");

// if (isset($_POST['signin'])) {
$username = mysqli_real_escape_string($con, $_POST['username']);
$password = mysqli_real_escape_string($con, $_POST['password']);

// Select the hashed password from the database based on the provided username
$query = "SELECT * FROM users WHERE username = '$username'";
$result = mysqli_query($con, $query);

if (!$result) {
    die("Query failed: " . mysqli_error($con));
}

// Check if a user with the given username exists
if (mysqli_num_rows($result) == 0) {
    $_SESSION["error"] = "Invalid username";
    header("Location: signin.php");
} else {
    $row = mysqli_fetch_array($result);

    //unhash password
    $pass = password_verify($password, $row['password']);

    if ($pass) {
        if ($row['roleId'] == 1) {
            $_SESSION["signin_admin"] = 1;  
            $_SESSION["username_admin"] = $username;
            $_SESSION["userid_admin"] = $row["userId"];
            header("Location: admin\index.php");
        } else {
            $_SESSION["signin"] = 1;
            $_SESSION["username"] = $username;
            $_SESSION["userid"] = $row["userId"];
            header("Location: home.php");
        }
    } else {
        $_SESSION["error"] = "Invalid Password";
        header("Location: signin.php");
    }
}
