<?php
//session_start();
$_SESSION[] = array(); // empty all sessions
unset($_SESSION["signin"]);
unset($_SESSION["username"]);
unset($_SESSION["userid"]);
session_destroy();

header("Location: index.php");
?>