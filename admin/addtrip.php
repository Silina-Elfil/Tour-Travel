<!DOCTYPE html>
<html lang="en">

<?php require("adminconnection.php"); ?>

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  <!-- jQuery -->
  <script src="https://code.jquery.com/jquery-3.6.4.min.js" integrity="sha256-oP6HI9z1XaZNBrJURtCoUT5SUnxFr8s3BzRl+cbzUq8=" crossorigin="anonymous"></script>
  <!-- Bootstrap JS -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

  <title>admin dashboard</title>
</head>

<body>
  <?php

  if (isset($_POST["add"])) {
    $deplocation = $_POST["deplocation"];
    $destlocation = $_POST["destlocation"];
    $depday = $_POST["depday"];
    $arvlday = $_POST["arvlday"];
    $deptime = $_POST["deptime"];
    $arvltime = $_POST["arvltime"];
    $description = $_POST["description"];
    $price = $_POST["price"];
    $availability = $_POST["availability"];
    $image = $_FILES["image"]["name"];

    // Insert into SQL
    $img_new_name = $image;

    move_uploaded_file(
      $_FILES["image"]["tmp_name"],
      "../images/" . $img_new_name
    );

    $query  = "INSERT INTO trips (departureLocation, destinationLocation, departureDay, arrivalDay, departureTime, arrivalTime, description, price, img, availability) 
                          VALUES ('$deplocation', '$destlocation', '$depday','$arvlday', '$deptime', '$arvltime', '$description', '$price', '$img_new_name', '$availability')";
    $result = mysqli_query($con, $query);

    if ($result) {
      header("Location: index.php");
    } else {
      echo "Error: " . mysqli_error($con);
    }
  }
  ?>
  <div class="modal fade modal-lg" id="addtrip" tabindex="-1" aria-labelledby="addtrip" aria-hidden="true" data-bs-backdrop="static" data-bs-keyboard="false">
    <div class="modal-dialog modal-dialog-scrollable">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="addtrip">Add a Trip</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" enctype="multipart/form-data" onsubmit="return isValid()">
            <div class="form-row">
              <div class="form-row">
                <div class="col-lg-10">
                  <input type="text" class="form-control p-3" placeholder="ENTER DEPARTURE LOCATION" name="deplocation" id="deplocation" oninput="removeErrorClass('deplocation')">
                  <div id="deplocationError" class="text-danger" style="float: right;"></div>
                  <div class="my-2"></div>
                </div>
              </div>
              <div class="form-row">
                <div class="col-lg-10">
                  <input type="text" class="form-control p-3" placeholder="ENTER DESTINATION LOCATION" name="destlocation" id="destlocation" oninput="removeErrorClass('destlocation')">
                  <div id="destlocationError" class="text-danger" style="float: right;"></div>
                  <div class="my-2"></div>
                </div>
              </div>
              <div class="form-row">
                <div class="col-lg-10">
                  <input type="date" class="form-control p-3" placeholder="ENTER DEPARTURE DAY" name="depday" id="depday" oninput="removeErrorClass('depday')">
                  <div id="depdayError" class="text-danger" style="float: right;"></div>
                  <div class="my-2"></div>
                </div>
              </div>
              <div class="form-row">
                <div class="col-lg-10">
                  <input type="date" class="form-control p-3" placeholder="ENTER ARRIVAL DAY" name="arvlday" id="arvlday" oninput="removeErrorClass('arvlday')">
                  <div id="arvldayError" class="text-danger" style="float: right;"></div>
                  <div class="my-2"></div>
                </div>
              </div>
              <div class="form-row">
                <div class="col-lg-10">
                  <input type="time" class="form-control p-3" placeholder="ENTER DEPARTURE TIME" name="deptime" id="deptime" oninput="removeErrorClass('deptime')">
                  <div id="deptimeError" class="text-danger" style="float: right;"></div>
                  <div class="my-2"></div>
                </div>
              </div>
              <div class="form-row">
                <div class="col-lg-10">
                  <input type="time" class="form-control p-3" placeholder="ENTER ARRIVAL TIME" name="arvltime" id="arvltime" oninput="removeErrorClass('arvltime')">
                  <div id="arvltimeError" class="text-danger" style="float: right;"></div>
                  <div class="my-2"></div>
                </div>
              </div>
              <div class="form-row">
                <div class="col-lg-10">
                  <input type="text" class="form-control p-3" placeholder="ENTER TRIP DESCRIPTION" name="description" id="description" oninput="removeErrorClass('description')">
                  <div id="descriptionError" class="text-danger" style="float: right;"></div>
                  <div class="my-2"></div>
                </div>
              </div>
              <div class="form-row">
                <div class="col-lg-10">
                  <div class="input-group">
                    <input type="number" step="0.01" class="form-control p-3" placeholder="ENTER TRIP PRICE" name="price" id="price" oninput="removeErrorClass('price')">
                    <div class="input-group-append">
                      <span class="input-group-text p-3">$</span>
                    </div>
                  </div>
                  <div id="priceError" class="text-danger" style="float: right;"></div>
                  <div class="my-2"></div>
                </div>
              </div>

              <div class="form-row">
                <div class="col-lg-10">
                  <input type="number" class="form-control p-3" placeholder="ENTER NUMBER OF AVAILABILITY" name="availability" id="availability" oninput="removeErrorClass('availability')">
                  <div id="availabilityError" class="text-danger" style="float: right;"></div>
                  <div class="my-2"></div>
                </div>
              </div>
              <div class="form-row">
                <div class="col-lg-10">
                  <input type="file" class="form-control p-3" placeholder="ENTER AN IMAGE" name="image" id="image" oninput="removeErrorClass('image')">
                  <div id="imageError" class="text-danger" style="float: right;"></div>
                  <div class="my-2"></div>
                </div>
              </div>
            </div>
        </div>
        <div class="modal-footer">

          <input type="Reset" value="Clear" class="btn btn-secondary" />
          <input type="Submit" name="add" value="Add" class="btn btn-primary" />
        </div>
        </form>
      </div>
    </div>
  </div>

  <script>
    function isValid() {
      var deplocation = document.getElementById('deplocation').value;
      var destlocation = document.getElementById('destlocation').value;
      var depday = document.getElementById('depday').value;
      var arvlday = document.getElementById('arvlday').value;
      var deptime = document.getElementById('deptime').value;
      var arvltime = document.getElementById('arvltime').value;
      var description = document.getElementById('description').value;
      var price = document.getElementById('price').value;
      var availability = document.getElementById('availability').value;
      var image = document.getElementById('image').value;

      if (deplocation.length === 0) {
        setErrorClass('deplocation');
        setError('deplocation', 'Departure location field is empty');
        isValid = false;
      } else {
        removeErrorClass('deplocation');
        removeError('deplocation');
      }

      if (destlocation.length === 0) {
        setErrorClass('destlocation');
        setError('destlocation', 'Destination location field is empty');
        isValid = false;
      } else {
        removeErrorClass('destlocation');
        removeError('destlocation');
      }

      if (depday.length === 0) {
        setErrorClass('depday');
        setError('depday', 'Departure day field is empty');
        isValid = false;
      } else {
        removeErrorClass('depday');
        removeError('depday');
      }

      if (depday.length === 0) {
        setErrorClass('arvlday');
        setError('arvlday', 'Arrival day field is empty');
        isValid = false;
      } else {
        removeErrorClass('arvlday');
        removeError('arvlday');
      }

      if (deptime.length === 0) {
        setErrorClass('deptime');
        setError('deptime', 'Departure time field is empty');
        isValid = false;
      } else {
        removeErrorClass('deptime');
        removeError('deptime');
      }

      if (depday.length === 0) {
        setErrorClass('arvltime');
        setError('arvtime', 'Arrival time field is empty');
        isValid = false;
      } else {
        removeErrorClass('arvltime');
        removeError('arvltime');
      }

      if (description.length === 0) {
        setErrorClass('description');
        setError('description', 'description field is empty');
        isValid = false;
      } else {
        removeErrorClass('description');
        removeError('description');
      }

      if (price.length === 0) {
        setErrorClass('price');
        setError('price', 'price field is empty');
        isValid = false;
      } else {
        removeErrorClass('price');
        removeError('price');
      }

      if (availability.length === 0) {
        setErrorClass('availability');
        setError('availability', 'availability field is empty');
        isValid = false;
      } else {
        removeErrorClass('availability');
        removeError('availability');
      }

      if (image.length === 0) {
        setErrorClass('image');
        setError('image', 'image field is empty');
        isValid = false;
      } else {
        removeErrorClass('image');
        removeError('image');
      }

      return isValid;
    }



    function setError(fieldId, errorMessage) {
      document.getElementById(fieldId + 'Error').innerHTML = errorMessage;
    }

    function removeError(fieldId) {
      document.getElementById(fieldId + 'Error').innerHTML = '';
    }

    function setErrorClass(fieldId) {
      document.getElementById(fieldId).classList.add('is-invalid');
    }

    function removeErrorClass(fieldId) {
      document.getElementById(fieldId).classList.remove('is-invalid');
    }
  </script>

  <style>
    .is-invalid {
      border-color: #dc3545;
    }

    .text-danger {
      color: #dc3545;
    }
  </style>

</body>

</html>