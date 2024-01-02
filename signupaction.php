<?php
    session_start(); // Start the session

    include("connection.php");

    if (isset($_POST['signup'])) {
        $username = mysqli_real_escape_string($con, $_POST['username']);
        $email = mysqli_real_escape_string($con, $_POST['email']);
        $password = mysqli_real_escape_string($con, $_POST['password']);
        $vpassword = mysqli_real_escape_string($con, $_POST['v-password']);        

        $loginFailed = false;
        $usernameAvailable = false;
        $emailAvailable = false;

        //check if the db have the name and email
        $query1 = "SELECT * FROM users where username = '$username'";
        $result1 = mysqli_query($con, $query1);  //fetch
        $count_name = mysqli_num_rows($result1); // count the num of row having the same name
    
        $query2 = "SELECT * FROM users where email = '$email'";
        $result2 = mysqli_query($con, $query2);
        $count_email = mysqli_num_rows($result2);

        if ($count_name === 0 && $count_email === 0) {
            if ($password == $vpassword) {
                $loginFailed = false;
                $hash = password_hash($password, PASSWORD_DEFAULT);
                $query3 = "INSERT INTO users(roleId, username, email, password) 
                VALUES(2, '$username', '$email', '$hash')";
                $result3 = mysqli_query($con, $query3);

                if ($result3) {
                    header("Location: signin.php");
                    exit();
                }
            } else{
                $loginFailed = true;
            }
            
        } else {
            if ($count_name > 0) {
                $usernameAvailable = true;
            }
            if ($count_email > 0) {
                $emailAvailable = true;
            }
        }
         // If execution reaches here, it means the login failed, username email already in db
         if ($loginFailed) {
         $_SESSION['loginFailed'] = true;
         } 
         if ($emailAvailable or $emailAvailable) {
         $_SESSION['usernameAvailable'] = true;
         $_SESSION['emailAvailable'] = true;
         }
         header("Location: signup.php");
         exit();
    }
    // Check if the session variable is set
    $loginFailed = isset($_SESSION['loginFailed']) && $_SESSION['loginFailed'];
    $usernameAvailable = isset($_SESSION['usernameAvailable']) && $_SESSION['usernameAvailable'];
    $emailAvailable = isset($_SESSION['emailAvailable']) && $_SESSION['emailAvailable'];

    // Unset the session variable to remove the message after displaying it
    unset($_SESSION['loginFailed']);
    unset($_SESSION['usernameAvailable']);
    unset($_SESSION['emailAvailable']);

    ?>