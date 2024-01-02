<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.4.min.js" integrity="sha256-oP6HI9z1XaZNBrJURtCoUT5SUnxFr8s3BzRl+cbzUq8=" crossorigin="anonymous"></script>
    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

    <title>booked trips</title>
</head>

<body>
    <nav class="navbar navbar-expand-lg fixed-top" style="background-color:cornflowerblue;">
        <div class="container-fluid">
            <a class="navbar-brand" href="home.php">
                <h4><img src="images/logo.png" style="width: 30px; margin-right: 10px">Tour&Travel</h4>
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-end" id="navbarNavAltMarkup">
                <div class="navbar-nav">

                <a href="bookedtrips.php" style="text-decoration: none; color: white; font-size: 18px; padding-top: 5px; margin-right: 40px">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-view-list" viewBox="0 0 16 16">
  <path d="M3 4.5h10a2 2 0 0 1 2 2v3a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2v-3a2 2 0 0 1 2-2m0 1a1 1 0 0 0-1 1v3a1 1 0 0 0 1 1h10a1 1 0 0 0 1-1v-3a1 1 0 0 0-1-1zM1 2a.5.5 0 0 1 .5-.5h13a.5.5 0 0 1 0 1h-13A.5.5 0 0 1 1 2m0 12a.5.5 0 0 1 .5-.5h13a.5.5 0 0 1 0 1h-13A.5.5 0 0 1 1 14"/>
</svg> Booked trips
                </a>

                        <a href="signout.php" class="btn btn-primary" style="text-decoration: none; color: white;border-radius: 20px;">Sign Out</a>

                </div>
            </div>
        </div>
    </nav>

    <div style="margin: 40px">.</div>

    <?php
    // Start session
    session_start();
    
    // Include your database connection
    require("connection.php");
    
    // Check if user is logged in
    if (!isset($_SESSION["userid"])) {
        // Redirect to login page or handle as needed
        header("Location: index.php");
        exit();
    }
    
    // Get the logged-in user's ID
    $userId = $_SESSION["userid"];
    
    // Fetch booked trips for the logged-in user
    $sql = "SELECT u.username, t.departureLocation, t.destinationLocation, t.departureDay, t.arrivalDay, t.departureTime, t.arrivalTime, t.price, t.description, b.date
            FROM bookedtrips b
            JOIN users u ON b.userId = u.userId
            JOIN trips t ON b.tripId = t.tripId
            WHERE b.userId = '$userId'";
    
    $result = mysqli_query($con, $sql);
    
    if (!$result) {
        // Handle the query error as needed
        die("Error: " . mysqli_error($con));
    }
    
    // Display results in a table
    echo "<table>";
    echo "<tr><th>Username</th><th>Departure Location</th><th>Destination Location</th><th>Departure Day</th><th>Arrival Day</th><th>Departure Time</th><th>Arrival Time</th><th>Price</th><th>Description</th><th>Date</th></tr>";
    
    while ($row = mysqli_fetch_assoc($result)) {
        echo "<tr>";
        echo "<td>" . $row['username'] . "</td>";
        echo "<td>" . $row['departureLocation'] . "</td>";
        echo "<td>" . $row['destinationLocation'] . "</td>";
        echo "<td>" . $row['departureDay'] . "</td>";
        echo "<td>" . $row['arrivalDay'] . "</td>";
        echo "<td>" . $row['departureTime'] . "</td>";
        echo "<td>" . $row['arrivalTime'] . "</td>";
        echo "<td>" . $row['price'] . "</td>";
        echo "<td>" . $row['description'] . "</td>";
        echo "<td>" . $row['date'] . "</td>";
        echo "</tr>";
    }
    
    echo "</table>";

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
    
    // Close connection
    mysqli_close($con);
    ?>
    

</body>
</html>