<?php
//session_start();
$_SESSION[] = array(); // empty all sessions
unset($_SESSION["signin_admin"]);
unset($_SESSION["username_admin"]);
unset($_SESSION["userid_admin"]);
session_destroy();

header("Location: ..\index.php");
?>