<?php
session_start();
require("connection.php");
$email = mysqli_real_escape_string($con, $_POST["email"]);
$username = mysqli_real_escape_string($con, $_POST["username"]);
$password = mysqli_real_escape_string($con, $_POST["password"]);
$vpassword = mysqli_real_escape_string($con, $_POST["v-password"]);


$query = "SELECT * FROM users where username = '$username'";
$result = mysqli_query($con, $query);  //fetch
$count_name = mysqli_num_rows($result); // count the num of row having the same name

$query = "SELECT * FROM users where email = '$email'";
$result = mysqli_query($con, $query);
$count_email = mysqli_num_rows($result);


if ($count_email > 0 || $count_name > 0) {
    // username or email already exist
    $_SESSION["error_reg"] = "Username or Email already exists.";
} else {
    // password doesn't match
    if ($password != $vpassword) {
        $_SESSION["error_reg"] = "Passwords do not match.";
    } else {
        // add user
        // hashing pass
        $hash = password_hash($password, PASSWORD_DEFAULT);
        // insert query
        $query = "INSERT INTO users (roleId, username, email, password) VALUES(2, '$username', '$email', '$hash')";
        $result = mysqli_query($con, $query);

        // Check if the insertion was successful
        if (!$result) {
            $_SESSION["error_reg"] = "Signup failed. Please try again.";
        } else {
            // successful signup
            header("Location: home.php");
            exit(); // Make sure to exit after redirecting
        }
    }
}

// Redirect back to the index page with the error message
header("Location: index.php");
exit(); // Make sure to exit after redirecting
