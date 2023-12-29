<?php
require_once("adminconnection.php");

$id = isset($_GET["e"]) ? $_GET["e"] : '';

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $deplocation = isset($_POST["deplocation"]) ? $_POST["deplocation"] : '';
    $destlocation = isset($_POST["destlocation"]) ? $_POST["destlocation"] : '';
    $depday = isset($_POST["depday"]) ? $_POST["depday"] : '';
    $arvlday = isset($_POST["arvlday"]) ? $_POST["arvlday"] : '';
    $deptime = isset($_POST["deptime"]) ? $_POST["deptime"] : '';
    $arvltime = isset($_POST["arvltime"]) ? $_POST["arvltime"] : '';
    $description = isset($_POST["description"]) ? $_POST["description"] : '';
    $price = isset($_POST["price"]) ? $_POST["price"] : '';
    $availability = isset($_POST["availability"]) ? $_POST["availability"] : '';

    $query = "UPDATE trips set
                departureLocation = '$deplocation',
                destinationLocation = '$destlocation',
                departureDay = '$depday',
                arrivalDay = '$arvlday',
                departureTime = '$deptime',
                arrivalTime = '$arvltime',
                description = '$description',
                price = '$price',
                availability = '$availability'
              WHERE tripId = $id";

    $result = mysqli_query($con, $query);

    if (!$result) {
        die("Error updating record: " . mysqli_error($con));
    }
    
    // Redirect to index.php after successful update
    header("Location: index.php");
    exit();
}

?>
