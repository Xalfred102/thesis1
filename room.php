<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Your head content remains unchanged -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rooms</title>
    <link rel="icon" type="image/x-icon" href="10.png">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <!-- Font Awesome Icons -->
    <script src="https://kit.fontawesome.com/8f3e2a2af4.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" integrity="sha512-+3JBPDPlWq1WEF7YwCpiOsNBw8oF8bBO5UtAdXAlY8N03QCnW/cF0H3JJoJWiYIhwUegxI1EGmGWChJXQ0txZQg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- Your custom CSS styles remain unchanged -->
    <style>
        /* Your custom styles */
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #e9e6e6 !important;
        }

        nav {
            background-color: #ffffff !important;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.2);
        }

        .navbar-brand img {
            width: 60px; /* Adjust the width as needed */
            height: auto; /* Automatically adjust the height */
            margin-right: 10px; /* Add some space between the logo and the text */
        }

        .navbarf-brand {
            color: #ffffff !important;
            font-weight: bold;
        }

        .navbar-nav .nav-link {
            color: #000000 !important;
        }

        .navbar-nav .nav-link:hover {
            color: #0056b3 !important;
        }

        #content {
            padding: 20px;
            margin-top: 20px;
            background-color: #ffffff;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .card {
            transition: transform 0.3s ease;
            cursor: pointer;
        }

        .card:hover {
            transform: translateY(-5px);
        }

        .card-body {
            padding: 20px;
            text-align: center;
        }

        .card i {
            font-size: 36px;
            margin-bottom: 10px;
        }

        .availability {
            font-size: 18px;
            font-weight: bold;
            margin-top: 10px;
        }

        /* Room Status Colors */
        .available {
            background-color: #28a745;
            color: #ffffff;
        }

        .occupied {
            background-color: #dc3545;
            color: #ffffff;
        }

        .maintenance {
            background-color: #ffc107;
            color: #000000;
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
                <a class="nav-link" href="dashboard.html">Dashboard</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="home.php">Home</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="room.html">Rooms</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="tenant.html">Tenants</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="payment.html">Payments</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="logouthome.php">Logout</a>
            </li>
        </ul>
       
      </div>
    </div>
  </nav>
  
    <!-- Available Rooms Section -->
    <div class="container mt-4">
        <h2 class="mb-4">Available Rooms</h2>

        <div id="availableRooms" class="row">
            <!-- Available room cards will be dynamically added here using JavaScript -->
        </div>
    </div>

    <!-- Bootstrap JS (optional, for some components) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

    <!-- Your custom JavaScript to fetch and display available rooms -->
    <script>
        // Dummy data for available rooms (replace with actual data from your server)
    const availableRoomsData = [
        { roomNumber: 51, availability: 'Available' },
        { roomNumber: 1, availability: 'Sold Out' },
        { roomNumber: 10, availability: 'Available' },
        { roomNumber: 20, availability: 'Sold Out' },
        { roomNumber: 3, availability: 'Available' },
        { roomNumber: 12, availability: 'Available' },
        { roomNumber: 23, availability: 'Sold Out' },
        { roomNumber: 5, availability: 'Available' },
        { roomNumber: 6, availability: 'Sold Out' },
        
        // Add more room data as needed
    ];

    // Function to generate room cards
    function generateRoomCards() {
        const availableRoomsContainer = document.getElementById('availableRooms');

        availableRoomsData.forEach(room => {
            let cardHtml = `
                <div class="col-md-6 col-lg-4" style="padding: 10px;">
                    <div class="card ${room.availability === 'Sold Out' ? 'occupied' : 'available'}" onclick="${room.availability === 'Available' ? `location.href='available.html?roomNumber=${room.roomNumber}'` : ''}" style="${room.availability === 'Sold Out' ? 'pointer-events: none;' : ''}">
                        <div class="card-body">
                            <i class="fas fa-bed"></i>
                            <h5 class="card-title">Room ${room.roomNumber}</h5>
                            <div class="availability">${room.availability}</div>
                        </div>
                    </div>
                </div>
            `;
            availableRoomsContainer.innerHTML += cardHtml;
        });
    }

    // Call the function to generate room cards on page load
    generateRoomCards();
    </script>
</body>
</html>
