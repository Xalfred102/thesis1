<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home Page</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <!-- Font Awesome Icons -->
    <script src="https://kit.fontawesome.com/8f3e2a2af4.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" integrity="sha512-+3JBPDPlWq1WEF7YwCpiOsNBw8oF8bBO5UtAdXAlY8N03QCnW/cF0H3JJoJWiYIhwUegxI1EGmGWChJXQ0txZQg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- Custom CSS -->
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f8f9fa;
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

        #hero-section {
            position: relative;
            height: 100vh;
            overflow: hidden; /* Hide overflow from video */
            opacity: 1.0;
        }

        #hero-video {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            object-fit: cover;
            z-index: -1;
        }
        #hero-content {
            padding: 100px 0;
            text-align: center;
            z-index: 1;
            border-radius: 10px; /* Optional: Add border-radius for rounded corners */
        }

        #hero-content p {
            margin: 0; /* Remove default margin for better appearance */
            color: white;
        }

        #hero-content h1 {
            font-size: 3em;
            color: white;
        }

        #features-section {
            padding: 50px 0;
            background-color: #ffffff;
            position: relative;
            z-index: 1;
        }

        .feature {
            text-align: center;
            margin-bottom: 30px;
        }

        .feature i {
            font-size: 48px;
            margin-bottom: 20px;
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

        #contact-section {
            background-color: #f8f9fa;
            padding: 50px 0;
            text-align: center;
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
                <a class="nav-link active" aria-current="page" href="home.html">Home</a>
              </li>
              <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="about.html">About</a>
              </li>
              <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="feature.html">feature</a>
              </li>
              <div class="btn-group" role="group">
                <button type="button" class="btn btn-outline-secondary dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                  Account
                </button>
                <ul class="dropdown-menu">
                  <li><a class="dropdown-item" href="login.php">Login Now!</a></li>
                </ul>
            </div>
            </ul>
           
          </div>
        </div>
      </nav>

   <!-- Hero Section -->
    <div id="hero-section">
        <video id="hero-video" autoplay muted loop playsinline>
            <source src="video.mp4" type="video/mp4">
            Your browser does not support the video tag.
        </video>
        <div class="container">
            <div class="row justify-content-center" style="padding-top: 10%;">
                <div id="hero-content" class="col-md-8" style="color: black;">
                    <h1>Welcome to Your Boarding House</h1>
                    <p>Experience a comfortable and secure living environment with our modern boarding house system.</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Features Section -->
    <div id="features-section">
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <div class="feature">
                        <i class="fas fa-home"></i>
                        <h3>Comfortable Living Spaces</h3>
                        <p>Our boarding house offers spacious and well-furnished rooms for a comfortable stay.</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="feature">
                        <i class="fas fa-wifi"></i>
                        <h3>High-Speed Internet</h3>
                        <p>Stay connected with high-speed Wi-Fi available throughout the boarding house.</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="feature">
                        <i class="fas fa-lock"></i>
                        <h3>Secure Environment</h3>
                        <p>Your safety is our priority. Our boarding house is equipped with advanced security systems.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- About Section -->
    <!-- Contact Section -->
    <div id="contact-section" style="background-color: #f8f9fa; padding: 50px 0; text-align: center;">
        <div class="container">
            <h2>Contact Us</h2>
            <p>Have questions or concerns? Feel free to reach out to us.</p>
            <p>Email: alfredmagaso7@gmail.com</p>
            <p>Phone: 09675839148</p>
            <p>Facebook: Alfred Minion Mag-aso</p>
        </div>
    </div>

    <!-- Bootstrap JS (optional, for some components) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>
