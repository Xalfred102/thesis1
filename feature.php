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
    <link rel="icon" type="image/x-icon" href="10.png">
    <title>Best Selling Boarding Houses</title>
    <!-- Include Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <!-- Custom CSS -->
    <style>
        /* Add your custom styles here */
        .card {
            margin-bottom: 20px;
            padding-top: 20px; /* Add padding top to the cards */
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
    </style>
</head>
<body>

    <!-- Navbar -->
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
    <!-- Display Best Selling Boarding Houses -->
    <div class="container mt-5">
        <h2>Best Selling Boarding Houses</h2>
        <div class="row" id="bestSellingBoardingHouses"></div>
    </div>

       <!-- Include Bootstrap JS (optional) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <!-- Custom JavaScript for dynamic update (optional) -->
    <script>
        // Sample data (replace with actual data from your backend)
        const bestSellingData = [
            { name: 'Boarding House 1', description: 'free wifi, have own cr', image: 'background.jpeg' },
            { name: 'Boarding House 2', description: 'free wifi, have own cr', image: 'background.jpeg' },
            { name: 'Boarding House 3', description: 'free wifi, have own cr', image: 'background.jpeg' }
        ];

        // Function to display Best Selling Boarding Houses
        function displayBestSelling() {
            const bestSellingContainer = document.getElementById('bestSellingBoardingHouses');

            // Loop through the data and create Bootstrap Cards
            bestSellingData.forEach(boardingHouse => {
                const card = document.createElement('div');
                card.className = 'col-md-4';

                const cardContent = `
                    <div class="card">
                        <img src="${boardingHouse.image}" class="card-img-top" alt="${boardingHouse.name}">
                        <div class="card-body">
                            <h5 class="card-title">${boardingHouse.name}</h5>
                            <p class="card-text">${boardingHouse.description}</p>
                        </div>
                    </div>
                `;

                card.innerHTML = cardContent;
                bestSellingContainer.appendChild(card);
            });
        }

        // Call the function to display Best Selling Boarding Houses
        displayBestSelling();
    </script>
</body>
</html>
