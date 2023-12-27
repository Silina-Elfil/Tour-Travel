<?php

require_once("adminconnection.php");

$id = $_GET["d"];
$query = "DELETE FROM trips WHERE tripId = $id";

$result = mysqli_query($con, $query);

if (!$result){
    echo '
    <div class="toast" role="alert" aria-live="assertive" aria-atomic="true">
        <div class="toast-header">
            <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
        </div>
        <div class="toast-body">
            Unable to delete the trip!
        </div>
    </div>
    ';
} else {
    header("Location: index.php");
    echo '
    <div class="toast" role="alert" aria-live="assertive" aria-atomic="true">
        <div class="toast-header">
            <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
        </div>
        <div class="toast-body">
            Trip successfully deleted!
        </div>
    </div>
    ';
}

?>
