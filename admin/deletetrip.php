<?php

require_once("adminconnection.php");

$id = $_GET["d"];
$query = "DELETE FROM trips WHERE tripId = $id";

$result = mysqli_query($con, $query);
if (!$result) {
    echo "Unable to delete Category!";
} else{
    header("Location: index.php");
    
}
