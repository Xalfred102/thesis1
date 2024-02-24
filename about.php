<?php
session_start();
require 'dbconnect.php'; // Include your database connection file

$error_message = '';

if (isset($_SESSION['user_id'])) {
    // User is logged in, fetch username from the database
    $user_id = $_SESSION['user_id'];

    // Prepare and execute a query to fetch the username
    $stmt = $connection->prepare("SELECT username FROM users WHERE id = ?");
    $stmt->bind_param("i", $user_id);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $user_data = $result->fetch_assoc();
        $username = $user_data['username'];
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About | Page</title>
    <link rel="icon" type="image/x-icon" href="10.png">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <!-- Font Awesome Icons -->
    <script src="https://kit.fontawesome.com/8f3e2a2af4.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" integrity="sha512-+3JBPDPlWq1WEF7YwCpiOsNBw8oF8bBO5UtAdXAlY8N03QCnW/cF0H3JJoJWiYIhwUegxI1EGmGWChJXQ0txZQg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- Custom CSS -->
    <style>
         body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #ffffff !important;
            margin-bottom: 50px; /* Added margin to make space for the fixed footer */
        }

        nav {
            background-color: #dfdfdf !important;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.2);
        }

        .navbar-brand img {
            width: 60px;
            height: auto;
            margin-right: 10px;
        }

        .navbar-brand {
            color: #000000 !important;
            font-weight: bold;
        }

        .navbar-nav .nav-link {
            color: #000000 !important;
        }

        .navbar-nav .nav-link:hover {
            color: #0056b3 !important;
        }

        #about-section {
            padding: 50px 0;
            background-color: #ffffff;
        }

        #about-section h2 {
            font-size: 2.5em;
            margin-bottom: 20px;
        }

        #about-section p {
            margin-bottom: 20px;
        }

        #about-section ul {
            list-style-type: none;
            padding: 0;
        }

        #about-section ul li::before {
            content: '\2022';
            color: #007bff;
            font-weight: bold;
            display: inline-block;
            width: 1em;
            margin-left: -1em;
        }

        #about-section .card {
            border: 4px solid #ced4da; /* Gray border color */
            border-radius: 15px; /* Rounded corners */
            overflow: hidden; /* Hide any content that overflows the border */
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1); /* Subtle box shadow */
            padding-left: 2%;
            padding-right: 2%;
            padding-bottom: 2%;
        }

        #about-section img {
            width: 100%;
            height: auto;
            border-radius: 10px;
            margin-top: 20px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); /* Box shadow for the image */
        }

        #about-section .card-body {
            padding: 20px;
            margin-bottom: 20px; /* Additional margin between cards */
        }

        /* Footer Styles */
     /* Footer Styles */
        footer {
            background-color: #ffffff;
            color: #000000;
            padding: 20px 0;
            text-align: center;
            position: absolute;
            bottom: 0;
            width: 100%;
        }

    </style>
</head>
<body>

    <!-- Navbar-->
<nav class="navbar navbar-expand-lg bg-body-tertiary">
    <div class="container-fluid">
      <a class="navbar-brand" href="#"><img src="logo.png" alt="Bootstrap" width="60" height="54"></a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="home.php">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="dashboard.php">Dashboard</a>
          </li>
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="about.php">About</a>
          </li>
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="feature.php">feature</a>
          </li>
          <div class="btn-group" role="group">
          <?php
                if (isset($_SESSION['user_id'])) {
                    // User is logged in, show username and logout option
                    echo '<a href="logout.php" id="logout-button" class="btn btn-outline-secondary">' . $username . ' | Logout</a>';
                } else {
                    // User is not logged in, show login option
                    echo '<a href="login.php" id="logout-button" class="btn btn-outline-secondary">Login</a>';
                }
                ?>
        </div>
        </ul>
       
      </div>
    </div>
  </nav>

    <!-- About Section -->
    <div id="about-section">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <div class="card">
                        <img src="background.jpeg" alt="Boarding House Image">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-body">
                            <h2>About Our Boarding House System</h2>
                            <p>Experience the convenience and safety that our boarding house system provides. Whether you're a student, professional, or traveler, our system is tailored to meet your needs.</p>
                            <ul>
                                <li>Comfortable and well-furnished living spaces</li>
                                <li>High-speed internet for seamless connectivity</li>
                                <li>Secure environment with advanced security systems</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Footer Section -->
    <footer>
        <p>&copy; 2024 Your Boarding House. All rights reserved.</p>
    </footer>

    <!-- Bootstrap JS (optional, for some components) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>
