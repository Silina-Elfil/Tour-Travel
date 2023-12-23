<?php
define("SERVER_NAME", "localhost");
define("USERNAME", "root");
define("PASSWORD","");
define("DATABASE","tour&travel");

$con = mysqli_connect(SERVER_NAME, USERNAME, PASSWORD, DATABASE);

if(!$con){
    die("Error: " . mysqli_connect_error());
    // header("Location: error.php");
}

?>