<?php
session_start();
require 'dbconnect.php';

$error_message = '';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST["email"];
    $password = $_POST["password"];

    $stmt = $connection->prepare("SELECT * FROM users WHERE email = ? AND password = ?");
    $stmt->bind_param("ss", $email, $password);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result === false) {
        die("Error executing the query: " . $stmt->error);
    }

    if ($result->num_rows > 0) {
        $user_data = $result->fetch_assoc();

        // Set user_id in session for authentication
        $_SESSION['user_id'] = $user_data['id'];

        // Redirect to the home page
        header("Location: home.php");
        exit();
    } else {
        $error_message = "Invalid email or password.";
    }
}
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>LOGIN</title>
    <link rel="icon" type="image/x-icon" href="10.png">
    <link rel="stylesheet" href="login.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>
<body>

<!-- Navbar -->

<!-- Login Form -->
<div class="container-fluid">
    <div class="row" style="padding-top: 10%;">
        <div class="col-md-4"></div>
        <div class="col-md-4" style="text-align: center; background-color: #ecffff; border-radius: 20px; padding: 10px;">
            <div class="row">
                <div class="col-md-12" style="padding-bottom: 15px;">
                    <img src="10.png" height="100px">
                </div>
                <div class="col-md-12">
                    <span style="font-weight: 100; font-size: 17px;">Login To Your Account</span>
                </div>
                <div class="col-md-12">
                    <form method="POST" action="login.php">
                        <div class="row">
                            <div class="col-md-12" style="text-align: left; font-size: 14px; font-weight: 200; padding: 20px 20px 10px 20px;">
                                <label>Email</label>
                                <input type="email" name="email" placeholder="Email" class="form-control" required>
                            </div>
                            <div class="col-md-12" style="text-align: left; font-size: 14px; font-weight: 200; padding: 10px 20px 10px 20px;">
                                <label>Password</label>
                                <input type="password" name="password" placeholder="Password" class="form-control" required>
                            </div>
                            <div class="col-md-12" style="text-align: center; font-size: 14px; font-weight: 200; padding: 0px 20px 10px 20px;">
                                <button type="submit" class="btn btn-warning">Sign in now</button>
                            </div>
                            <div class="col-md-12" style="text-align: center; font-size: 14px; font-weight: 200; padding: 10px 20px 10px 20px;">
                                <div class="row">
                                    <div class="col-md-6" style="text-align: left; font-size: 13px; font-weight: 100;">
                                        <a href="register.php" style="text-decoration: none; color: black;">Account? Register Now</a>
                                    </div>
                                    <div class="col-md-6" style="text-align: right; font-size: 13px; font-weight: 100;">
                                        <a href="forgot.html" style="text-decoration: none; color: black;">Forgot Password</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                    <?php
                    if (!empty($error_message)) {
                        echo '<p style="color: red; font-size: 14px; font-weight: 200; padding: 10px;">' . $error_message . '</p>';
                    }
                    ?>

                </div>
            </div>
        </div>
        <div class="col-md-4"></div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>
