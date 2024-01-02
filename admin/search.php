<?php

$username = $_GET["name"];

require("adminconnection.php");

echo "<table>";
echo "<tr>
        <th>Username</th>
        <th>Departure Location</th>
        <th>Destination Location</th>
        <th>Departure Date</th>
        <th>Arrival Date</th>
        <th>Departure Time</th>
        <th>Arrival Time</th>
        <th>Price</th>
        <th>Description</th>
        <th>Date Booked</th>
      </tr>";

$sqlUser = "SELECT userId FROM users WHERE username LIKE '%$username%'";
$resultUser = mysqli_query($con, $sqlUser);

if ($resultUser && mysqli_num_rows($resultUser) > 0) {
    $rowUser = mysqli_fetch_assoc($resultUser);
    $userId = $rowUser["userId"];

    $sqlBookedTrips = "SELECT users.username, trips.departureLocation, trips.destinationLocation, trips.departureDay, 
                        trips.arrivalDay, trips.departureTime, trips.arrivalTime, trips.price, trips.description, 
                        bookedtrips.date
                    FROM bookedtrips
                    JOIN users ON bookedtrips.userId = users.userId
                    JOIN trips ON bookedtrips.tripId = trips.tripId
                    WHERE bookedtrips.userId = '$userId'";
    
    $resultBookedTrips = mysqli_query($con, $sqlBookedTrips);

    while ($rowBookedTrips = mysqli_fetch_assoc($resultBookedTrips)) {
        echo "<tr>";
        echo "<td>" . $rowBookedTrips['username'] . "</td>";
        echo "<td>" . $rowBookedTrips['departureLocation'] . "</td>";
        echo "<td>" . $rowBookedTrips['destinationLocation'] . "</td>";
        echo "<td>" . $rowBookedTrips['departureDay'] . "</td>";
        echo "<td>" . $rowBookedTrips['arrivalDay'] . "</td>";
        echo "<td>" . $rowBookedTrips['departureTime'] . "</td>";
        echo "<td>" . $rowBookedTrips['arrivalTime'] . "</td>";
        echo "<td>" . $rowBookedTrips['price'] . "</td>";
        echo "<td>" . $rowBookedTrips['description'] . "</td>";
        echo "<td>" . $rowBookedTrips['date'] . "</td>";
        echo "</tr>";
    }

    echo "</table>";
} else {
    echo "User not found.";
}

echo '<style>
    table {
        width: 98%;
        margin: 20px auto;
        border-collapse: collapse;
    }

    th, td {
        border: 1px solid #dddddd;
        padding: 8px;
        text-align: left;
    }

    tr:nth-child(even) {
        background-color: #f2f2f2;
    }
</style>';
mysqli_close($con);
?>
