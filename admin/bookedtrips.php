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
    <!-- Toastr CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
    <!-- Toastr JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    <title>Booked trips</title>
</head>

<body>
    <nav class="navbar navbar-expand-lg fixed-top" style="background-color:cornflowerblue;">
        <div class="container-fluid">
            <a class="navbar-brand" href="index.php">
                <h4><img src="../images/logo.png" style="width: 30px; margin-right: 10px">Tour&Travel</h4>
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-end" id="navbarNavAltMarkup">
                <div class="navbar-nav">

                    <button type="button" class="btn btn-primary" style="border-radius: 20px;">
                        <a href="signout.php" style="text-decoration: none; color: white;">Sign Out</a>
                    </button>

                </div>
            </div>
        </div>
    </nav>

    <div style="margin: 30px">.</div>



    <div class="mx-5" style="margin-top: 30px;">
        Search by user name <input type="text" id="txtSearch" /> <br />
    </div>
    
    <div id="result">

        <script type="text/javascript">
            // bind on keyup event to the textbox search
            $(document).ready(function() { // on page load
                $('#txtSearch').keyup(function() {
                    $.ajax({
                        type: "GET",
                        url: "search.php",
                        data: {
                            'name': this.value
                        },
                        success: function(response) {
                            // returned result
                            $('#result').html(response);
                        }
                    });
                });
            });
        </script>

        <style>
            body {
                font-family: Arial, sans-serif;
            }

            .search-container {
                margin: 30px 5%;
            }

            #txtSearch {
                padding: 8px;
                width: 200px;
                border: 1px solid #ccc;
                border-radius: 20px;
            }
        </style>
</body>

</html>