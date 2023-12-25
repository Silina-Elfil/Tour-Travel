<?php
session_start();

require("../connection.php");

//check if there is a signed in user and if role is 1
if (!isset($_SESSION["signin_admin"]) || $_SESSION["signin_admin"] != 1)
    header("Location: ../index.php");

?>