<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.6.4.min.js" integrity="sha256-oP6HI9z1XaZNBrJURtCoUT5SUnxFr8s3BzRl+cbzUq8=" crossorigin="anonymous"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <title>Sign Up</title>
</head>

<body>

    <section class="Form">
        <div class="container">
            <div class="row g-0">
                <div class="col-lg-7 px-md-5 py-md-5">

                    <h1 class="font-weight-bold py-3 brand">
                        <img src="images/logo.png" style="width: 30px; margin-right: 10px">
                        Tour&Travel
                    </h1>
                    <h5>CREATE AN ACCOUNT</h5>

                    <form method="POST" action="signupaction.php" onsubmit="return isValid()">
                        <div class="mt-5"></div>
                        <div class="form-row">
                            <div class="col-lg-10">
                                <?php
                                session_start();
                                if (isset($_SESSION['loginFailed'])) {
                                    echo '<div class="alert alert-danger" role="alert">Passwords do not match</div>';
                                    unset($_SESSION['loginFailed']);
                                }
                                ?>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-lg-10">
                                <?php
                                if (isset($_SESSION['usernameAvailable']) && isset($_SESSION['emailAvailable'])) {
                                    echo '<div class="alert alert-danger" role="alert">Username or Email already exist</div>';
                                    unset($_SESSION['usernameAvailable']);
                                    unset($_SESSION['emailAvailable']);
                                }
                                ?>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-lg-10">
                                <input type="email" class="form-control p-3" placeholder="ENTER YOUR EMAIL" name="email" id="email" oninput="removeErrorClass('email')">
                                <div id="emailError" class="text-danger" style="float: right;"></div>
                                <div class="my-2"></div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-lg-10">
                                <input type="text" class="form-control p-3" placeholder="ENTER YOUR USERNAME" name="username" id="username" oninput="removeErrorClass('username')">
                                <div id="usernameError" class="text-danger" style="float: right;"></div>
                                <div class="my-2"></div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-lg-10">
                                <input type="password" class="form-control p-3" placeholder="ENTER YOUR PASSWORD" name="password" id="password" oninput="removeErrorClass('password')">
                                <div id="passwordError" class="text-danger" style="float: right;"></div>
                                <div class="my-2"></div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-lg-10">
                                <input type="password" class="form-control p-3" placeholder="VERIFY YOUR PASSWORD" name="v-password" id="v-password" oninput="removeErrorClass('v-password')">
                                <div id="v-passwordError" class="text-danger" style="float: right;"></div>
                                <div class="my-2"></div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-lg-10">
                                <input type="submit" class="btn1 mt-2 mb-4" value="CREATE ACCOUNT" name="signup" />
                            </div>
                        </div>
                    </form>
                    <p>Already a member? <a href="signin.php">Sign In to your account</a></p>
                </div>
                <div class="col-lg-5 d-flex align-items-center justify-content-center">
                    <img src="images/siginup.jpg" class="img-fluid" style="max-height: 100%; max-width: 100%;">
                </div>

            </div>
        </div>
    </section>


    <script>
        function isValid() {
            var email = document.getElementById('email').value;
            var username = document.getElementById('username').value;
            var password = document.getElementById('password').value;
            var vpassword = document.getElementById('v-password').value;
            var isValid = true;

            if (email.length === 0) {
                setErrorClass('email');
                setError('email', 'Email field is empty');
                isValid = false;
            } else {
                removeErrorClass('email');
                removeError('email');
            }

            if (username.length === 0) {
                setErrorClass('username');
                setError('username', 'Username field is empty');
                isValid = false;
            } else {
                removeErrorClass('username');
                removeError('username');
            }

            if (password.length === 0) {
                setErrorClass('password');
                setError('password', 'Password field is empty');
                isValid = false;
            } else {
                removeErrorClass('password');
                removeError('password');
            }

            if (vpassword.length === 0) {
                setErrorClass('v-password');
                setError('v-password', 'Password verification field is empty');
                isValid = false;
            } else {
                removeErrorClass('v-password');
                removeError('v-password');
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
        .btn1 {
            border: none;
            outline: none;
            background-color: #2b73ef;
            height: 50px;
            width: 100%;
            border-radius: 5px;
            color: white;
            font-weight: bold;
        }

        .btn1:hover {
            background-color: whitesmoke;
            color: #2b73ef;
            border: 1px solid;
        }

        .is-invalid {
            border-color: #dc3545;
        }

        .text-danger {
            color: #dc3545;
        }
    </style>
</body>

</html>