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

    <!-- Modal Sign Up -->
    <div class="modal fade" id="signup" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Create an Account</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form method="POST" action="signupaction.php" onsubmit="return isValid()">
                        <div class="form-row">
                            <div class="col-lg-10">
                            <div id="signupError" class="text-danger"></div>
                                <?php
                                // Display error message if unavailable
                                // session_start();
                                // if (isset($_SESSION["ERROR_Reg"])) {
                                //     echo '<div class="alert alert-danger" role="alert"> ' . $_SESSION["ERROR_Reg"] . ' </div>';
                                // }
                                ?>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-lg-10">
                                <input type="email" class="form-control p-3" placeholder="ENTER YOUR EMAIL" name="email" id="email" oninput="removeErrorClass('email')">
                                <div id="emailError" class="text-danger" style="float: right;"></div>
                                <div class="my-3"></div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-lg-10">
                                <input type="text" class="form-control p-3" placeholder="ENTER YOUR USERNAME" name="username" id="username" oninput="removeErrorClass('username')">
                                <div id="usernameError" class="text-danger" style="float: right;"></div>
                                <div class="my-3"></div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-lg-10">
                                <input type="password" class="form-control p-3" placeholder="ENTER YOUR PASSWORD" name="password" id="password" oninput="removeErrorClass('password')">
                                <div id="passwordError" class="text-danger" style="float: right;"></div>
                                <div class="my-3"></div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-lg-10">
                                <input type="password" class="form-control p-3" placeholder="VERIFY YOUR PASSWORD" name="v-password" id="v-password" oninput="removeErrorClass('v-password')">
                                <div id="v-passwordError" class="text-danger" style="float: right;"></div>
                                <div class="my-3"></div>
                            </div>
                        </div>
                        <div class="form-row mt-3">
                            <div class="col-lg-10">
                                <p>Already a member?
                                    <button type="button" class="btn" style="border-radius: 20px; border-color:none; border: 0px; color:royalblue" data-bs-toggle="modal" data-bs-target="#signin">
                                        Sign in to your account
                                    </button>
                                </p>
                                
                            </div>
                        </div>


                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <input type="submit" class="btn btn-primary" value="CREATE ACCOUNT" name="signup" />
                </div>
                </form>
            </div>
        </div>
        <script>
        // Check if there was a signup failure
        $(document).ready(function () {
            <?php
            if (isset($_SESSION["error_reg"])) {
                // Output JavaScript code to open the modal
                echo '$("#signup").modal("show");';
                // Display the error message
                echo '$("#signupError").html("'.$_SESSION["error_reg"].'");';
                // Clear the session variable
                unset($_SESSION["error_reg"]);
            }
            ?>
        });
    </script>
    </div>

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
        .is-invalid {
            border-color: #dc3545;
        }

        .text-danger {
            color: #dc3545;
        }
    </style>
</body>

</html>