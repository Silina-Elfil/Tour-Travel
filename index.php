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

    <title>Tour&Travel</title>
</head>

<body>
    <nav class="navbar navbar-expand-lg fixed-top" style="background-color: rgba(0, 0, 0, 0.2);">
        <div class="container-fluid">
            <a class="navbar-brand" href="index.php">
                <h4><img src="images/logo.png" style="width: 30px; margin-right: 10px">Tour&Travel</h4>
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-end" id="navbarNavAltMarkup">
                <div class="navbar-nav">

                    <button type="button" class="btn btn-primary" style="border-radius: 20px;" data-bs-toggle="modal" data-bs-target="#signup">
                        <a href="signup.php" style="text-decoration: none; color: white;">Sign Up</a>
                    </button>

                    <span style="margin-right: 10px;"></span>

                    <button type="button" class="btn btn-primary" style="border-radius: 20px;" data-bs-toggle="modal" data-bs-target="#signin">
                    <a href="signin.php" style="text-decoration: none; color: white;">Sign In</a>
                    </button>

                </div>
            </div>
        </div>
    </nav>

    <div id="carouselExampleCaptions" class="carousel slide">
        <div class="carousel-indicators">
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
        </div>
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="images/istanbul.jpg" class="d-block w-100">
                <div class="carousel-caption top-0" 
                style="height:fit-content; padding-top:300px;">
                    <h5 style="font-size:150px; color: rgba(255, 255, 255, 0.7); font-weight: bold;">
                    ISTANBUL</h5>
                </div>
            </div>
            <div class="carousel-item">
                <img src="images/dubai.jpg" class="d-block w-100">
                <div class="carousel-caption top-0" 
                style="height:fit-content; padding-top:300px">
                    <h5 style="font-size:150px; color: rgba(255, 255, 255, 0.7); font-weight: bold;">
                    DUBAI</h5>
                </div>
            </div>
            <div class="carousel-item">
                <img src="images/italy.jpg" class="d-block w-100">
                <div class="carousel-caption top-0" 
                style="height:fit-content; padding-top:300px">
                    <h5 style="font-size:150px; color: rgba(255, 255, 255, 0.7); font-weight: bold;">
                    ITALY</h5>
                </div>
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>

</body>

</html>