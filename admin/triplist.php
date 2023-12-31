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
    <title>trips list</title>
</head>

<body>

    <?php
    require_once("adminconnection.php");

    $query = "SELECT * FROM trips";
    $result = mysqli_query($con, $query);

    echo '<div class="row row-cols-1 row-cols-lg-3 row-cols-md-2 mx-3">';

    while ($row = mysqli_fetch_array($result)) {
        echo '<div class = "col my-3">';
        echo '<div class = "card">';

        $img = $row['img'];
        echo "<img src='..\\images\\$img' class='card-img-top' alt='img' style='height:200px'>";

        echo '<div class="card-body">';

        echo '<h5 class="card-title"> 
        &nbsp;&nbsp;
        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-airplane-fill" viewBox="0 0 16 16">
        <path d="M6.428 1.151C6.708.591 7.213 0 8 0s1.292.592 1.572 1.151C9.861 1.73 10 2.431 10 3v3.691l5.17 2.585a1.5 1.5 0 0 1 .83 1.342V12a.5.5 0 0 1-.582.493l-5.507-.918-.375 2.253 1.318 1.318A.5.5 0 0 1 10.5 16h-5a.5.5 0 0 1-.354-.854l1.319-1.318-.376-2.253-5.507.918A.5.5 0 0 1 0 12v-1.382a1.5 1.5 0 0 1 .83-1.342L6 6.691V3c0-.568.14-1.271.428-1.849"/>
        </svg>
        &nbsp;&nbsp;&nbsp;'
            . $row['departureLocation'] .
            '&nbsp;&nbsp;&nbsp;
        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-left-right" viewBox="0 0 16 16">
        <path fill-rule="evenodd" d="M1 11.5a.5.5 0 0 0 .5.5h11.793l-3.147 3.146a.5.5 0 0 0 .708.708l4-4a.5.5 0 0 0 0-.708l-4-4a.5.5 0 0 0-.708.708L13.293 11H1.5a.5.5 0 0 0-.5.5m14-7a.5.5 0 0 1-.5.5H2.707l3.147 3.146a.5.5 0 1 1-.708.708l-4-4a.5.5 0 0 1 0-.708l4-4a.5.5 0 1 1 .708.708L2.707 4H14.5a.5.5 0 0 1 .5.5"/>
        </svg>&nbsp;&nbsp;&nbsp;'
            . $row['destinationLocation'] .
            '&nbsp;&nbsp;&nbsp;</h5>';

        echo '<ul class="list-group list-group-flush">';

        echo '<li class="list-group-item">
        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-calendar" viewBox="0 0 16 16">
        <path d="M3.5 0a.5.5 0 0 1 .5.5V1h8V.5a.5.5 0 0 1 1 0V1h1a2 2 0 0 1 2 2v11a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V3a2 2 0 0 1 2-2h1V.5a.5.5 0 0 1 .5-.5M1 4v10a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V4z"/>
        </svg> 
        &nbsp;&nbsp;&nbsp;'
            . $row['departureDay'] .
            '&nbsp;&nbsp;&nbsp;
        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-right" viewBox="0 0 16 16">
        <path fill-rule="evenodd" d="M1 8a.5.5 0 0 1 .5-.5h11.793l-3.147-3.146a.5.5 0 0 1 .708-.708l4 4a.5.5 0 0 1 0 .708l-4 4a.5.5 0 0 1-.708-.708L13.293 8.5H1.5A.5.5 0 0 1 1 8"/>
        </svg>
        &nbsp;&nbsp;&nbsp;'
            . $row['arrivalDay'] .
            '&nbsp;&nbsp;&nbsp;</li>';

        echo '<li class="list-group-item">
        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-clock" viewBox="0 0 16 16">
        <path d="M8 3.5a.5.5 0 0 0-1 0V9a.5.5 0 0 0 .252.434l3.5 2a.5.5 0 0 0 .496-.868L8 8.71z"/>
        <path d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16m7-8A7 7 0 1 1 1 8a7 7 0 0 1 14 0"/>
        </svg>
        &nbsp;&nbsp;&nbsp;'
            . $row['departureTime'] .
            '&nbsp;&nbsp;&nbsp;
        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-right" viewBox="0 0 16 16">
        <path fill-rule="evenodd" d="M1 8a.5.5 0 0 1 .5-.5h11.793l-3.147-3.146a.5.5 0 0 1 .708-.708l4 4a.5.5 0 0 1 0 .708l-4 4a.5.5 0 0 1-.708-.708L13.293 8.5H1.5A.5.5 0 0 1 1 8"/>
        </svg>
        &nbsp;&nbsp;&nbsp;'
            . $row['arrivalTime'] .
            '</li>';

        echo '<li class="list-group-item">' . $row['description'] . '</li>';

        echo '<li class="list-group-item">$ ' . $row['price'] . '</li>';

        echo '<li class="list-group-item">' . $row['availability'] . ' left</li>';

        echo '</ul>';

        echo '<div class="text-end">';

        $id = $row['tripId'];

        echo "
        <button type='button' class='btn btn-secondary' data-bs-toggle='modal' data-bs-target='#editModal$id'>
        Edit</button> ";

        echo "
        <button type='button' class='btn btn-danger' data-bs-toggle='modal' data-bs-target='#deleteModal$id'>
        Delete</button>

        ";

         echo "
        <div class='modal fade' id='editModal$id' tabindex='-1' aria-labelledby='editModalLabel$id' aria-hidden='true'>
        <div class='modal-dialog modal-dialog-scrollable modal-lg'>
            <div class='modal-content'>
                <div class='modal-header'>
                    <h5 class='modal-title' id='editModalLabel$id'>Edit the trip</h5>
                    <button type='button' class='btn-close' data-bs-dismiss='modal' aria-label='Close'></button>
                </div>
                <div class='modal-body'>
                <form method='post' action='edittrip.php?e=$id' enctype='multipart/form-data' onsubmit='return isValid()'>
                            <div class='form-row'>
                                <div class='form-row'>
                                    <div class='col-lg-10'>
                                        <input type='text' class='form-control p-3' value='$row[departureLocation]' name='deplocation' id='edeplocation' oninput='removeErrorClass('deplocation')'>
                                        <div id='deplocationError' class='text-danger' style='float: right;'></div>
                                        <div class='my-2'></div>
                                    </div>
                                </div>
                                <div class='form-row'>
                                    <div class=' col-lg-10'>
                                        <input type='text' class='form-control p-3' value='$row[destinationLocation]' name='destlocation' id='edestlocation' oninput='removeErrorClass('destlocation')'>
                                        <div id='destlocationError' class='text-danger' style='float: right;'></div>
                                        <div class='my-2'></div>
                                    </div>
                                </div>
                                <div class='form-row'>
                                    <div class='col-lg-10'>
                                        <input type='date' class='form-control p-3' value='$row[departureDay]' name='depday' id='edepday' oninput='removeErrorClass('depday')'>
                                        <div id='depdayError' class='text-danger' style='float: right;'></div>
                                        <div class='my-2'></div>
                                    </div>
                                </div>
                                <div class='form-row'>
                                    <div class='col-lg-10'>
                                        <input type='date' class='form-control p-3' value='$row[arrivalDay]' name='arvlday' id='earvlday' oninput='removeErrorClass('arvlday')'>
                                        <div id='arvldayError' class='text-danger' style='float: right;'></div>
                                        <div class='my-2'></div>
                                    </div>
                                </div>
                                <div class='form-row'>
                                    <div class='col-lg-10'>
                                        <input type='time' class='form-control p-3' value='$row[departureTime]' name='deptime' id='edeptime' oninput='removeErrorClass('deptime')'>
                                        <div id='deptimeError' class='text-danger' style='float: right;'></div>
                                        <div class='my-2'></div>
                                    </div>
                                </div>
                                <div class='form-row'>
                                    <div class='col-lg-10'>
                                        <input type='time' class='form-control p-3' value='$row[arrivalTime]' name='arvltime' id='earvltime' oninput='removeErrorClass('arvltime')'>
                                        <div id='arvltimeError' class='text-danger' style='float: right;'></div>
                                        <div class='my-2'></div>
                                    </div>
                                </div>
                                <div class='form-row'>
                                    <div class='col-lg-10'>
                                        <input type='text' class='form-control p-3' value='$row[description]' name='description' id='edescription' oninput='removeErrorClass('description')'>
                                        <div id='descriptionError' class='text-danger' style='float: right;'></div>
                                        <div class='my-2'></div>
                                    </div>
                                </div>
                                <div class='form-row'>
                                    <div class='col-lg-10'>
                                        <div class='input-group'>
                                            <input type='number' step='0.01' class='form-control p-3' value='$row[price]' name='price' id='eprice' oninput='removeErrorClass('price')'>
                                            <div class='input-group-append'>
                                                <span class='input-group-text p-3'>$</span>
                                            </div>
                                        </div>
                                        <div id='priceError' class='text-danger' style='float: right;'></div>
                                        <div class='my-2'></div>
                                    </div>
                                </div>

                                <div class='form-row'>
                                    <div class='col-lg-10'>
                                        <input type='number' class='form-control p-3' value='$row[availability]' name='availability' id='eavailability' oninput='removeErrorClass('availability')'>
                                        <div id='availabilityError' class='text-danger' style='float: right;'></div>
                                        <div class='my-2'></div>
                                    </div>
                                </div>
                            </div>
                   </div>
                   <div class='modal-footer'>
                   <button type='button' class='btn btn-secondary' data-bs-dismiss='modal'>Cancel</button>
                   <button type='submit' class='btn btn-success'>Save Changes</button>
               </div>
                    </form>
                </div>
            </div>
        </div>
    
        ";


        echo "
            <div class='modal fade' id='deleteModal$id' tabindex='-1' aria-labelledby='deleteModalLabel$id' aria-hidden='true'>
                <div class='modal-dialog modal-dialog-centered'>
                    <div class='modal-content'>
                        <div class='modal-header'>
                            <h5 class='modal-title' id='deleteModalLabel$id'>Confirm Deletion</h5>
                            <button type='button' class='btn-close' data-bs-dismiss='modal' aria-label='Close'></button>
                        </div>
                        <div class='modal-body'>
                            <div class='float-start'>
                                Are you sure you want to delete this trip?
                            </div>
                        </div>
                        <div class='modal-footer'>
                            <button type='button' class='btn btn-secondary' data-bs-dismiss='modal'>Cancel</button>
                            <a class='btn btn-danger' href='deletetrip.php?d=$id'>Delete</a>
                        </div>
                    </div>
                </div>
            </div>
            ";

        echo '</div> </div>';
        echo '</div> </div>';
    }
    echo '</div>';

    ?>
</body>

</html>