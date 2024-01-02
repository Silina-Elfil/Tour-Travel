<?php

include("connection.php");
include("signinaction.php");

if (isset($_GET['x'])) {
    $tripId = $_GET['x'];

    // Get the user ID from the session
    $userId = $_SESSION["userid"];

    // Get the current date and time
    $date = date("Y-m-d H:i:s");

    $query1 = "INSERT INTO bookedtrips (tripId, userId, date) VALUES ('$tripId', '$userId', '$date')";
    $result1 = mysqli_query($con, $query1);

    $query2 = "UPDATE trips SET availability = availability - 1 WHERE tripId = $tripId";
    $result2 = mysqli_query($con, $query2);

    if($result1 && $result2){
        header("Location: home.php?success=true");
        exit();
    } else {
        header("Location: home.php?success=false");
        exit();
    }
}
?>
