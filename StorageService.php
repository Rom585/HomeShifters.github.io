<?php

session_start();
include('config.php');

// Check if the user is logged in
if (!isset($_SESSION['customer_id'])) {
    // Redirect to login page if not logged in
    header("Location: login.php");
    exit;
}

// Get the logged-in user's ID from the session
$user_id = $_SESSION['customer_id'];

// Fetch user data from the database
$sql = "SELECT fullname, email FROM customers WHERE id = $user_id";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $fullname = $row['fullname'];
    $email = $row['email'];
} else {
    // Handle case where no user data is found
    $fullname = "";
    $email = "";
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Storage Services</title>
    <link rel="stylesheet" type="text/css" href="StorageService.css">
    <link rel="stylesheet" href="https://unpkg.com/boxicons@latest/css/boxicons.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/remixicon@4.2.0/fonts/remixicon.css"/>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300..800;1,300..800&display=swap" rel="stylesheet">
</head>
<body>
    <!-- Header -->
    <header>
        <a class="logo">Home<span>Shifters</span></a>
        <ul class="navbar">
            <li><a href="Homepage.php">Home</a></li>
            <li><a href="BrochurePage.php">Brochure</a></li>
            <li><a href="About.php">About</a></li>
            <li class="dropdown">
                <a href="#" class="dropbtn">Services</a>
                <div class="dropdown-content">
                    <a href="Services.php">Moving Services</a>
                    <a href="StorageService.php">Storage Services</a>
                </div>
            </li>
            <li><a href="Contact.php">Contact</a></li>
            <li><a href="#" data-toggle="modal" data-target="#profileModal">Profile</a></li>
        </ul>
    </header>

    <section class="home"></section>

    <!--Storage section design-->
    <div class="household">
        <h2>Storage Service</h2>
    </div>
    <div class="household">
        <p>Our world-class storage facility, offers the ultimate in access, security and value to corporate, business and individual clients. Which has been involved in Logistics, Warehousing, and Distribution of goods. Our team is composed of industry leaders and skilled staff to ensure the best customer experience.</p>
    </div>
    <section class="holiday">
        <div class="holiday-img">
            <img src="ssmall.png">
        </div>

        <div class="holiday-text">
            <h2>Short-Term Storage</h2></a>
            <p> ✔ Ideal for customers in transition or temporary housing situations. <br>
                ✔ 1 - 3 months of storage. <br>
                ✔ Area: 2.38 – 3.92 sqm <br>
                ✔ Height: 2.4 meters
                <br> ✔ Price Range: ₱3,000
            </p>
            
        </div>

        <div class="holiday-text">
            <h2>Medium-Term Storage</h2></a>
            <p> ✔ Suited for customers undergoing home renovations or awaiting permanent relocation. <br>
                ✔ 1 - 6 months of storage. <br>
                ✔ Area: 6.29 – 7.29 sqm <br>
                ✔ Height: 2.4 meters
                <br> ✔ Price Range: ₱6,000
            </p>
            
        </div>

        <div class="holiday-img">
            <img src="smedium.jpg">
        </div>

        <div class="holiday-img">
            <img src="slarge.jpg">
        </div>

        <div class="holiday-text">
            <h2>Long-Term Storage</h2></a>
            <p> ✔ Designed for customers requiring extended storage solutions. <br>
                ✔ 1 - 6+ months of storage. <br>
                ✔ Area: 15.17 – 18.24 sqm <br>
                ✔ Height: 2.4 meters
                <br> ✔ Price Range: ₱10,000
            </p>
            
        </div>
    </section>

    <!-- Lower Section -->
    <section class="lower">
        <div class="lower-content">
            <div class="lower-text">
                <h2>Get Your Quote Now!</h2>
                <p>HomeShifters is the leading moving company in the Philippines. We offer a wide range of moving services to help you sail smoothly through your next move.</p>
                <h3>Or Call:</h3>
                <h2>+63 997 360 3101</h2>
                <a href="StorageQuote.php" class="btn" >Quote</a>
            </div>

        </div>
    </section>

    <!-- Profile Modal -->
    <div class="modal fade" id="profileModal" tabindex="-1" aria-labelledby="profileModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="profileModalLabel">Profile</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <ul>
                        <li>Name :  <?php echo htmlspecialchars($fullname); ?></li>
                        <li>Email :  <?php echo htmlspecialchars($email); ?></li>
                    </ul>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" id="logoutButton" ><a href="Logout.php">Log Out</a></button>
                </div>
            </div>
        </div>
    </div>

    <!-- Footer -->
    <section class="footer">
        <div class="footer-box">
            <h3>About</h3>
            <a href="#">Our story</a>
            <a href="#">Benefits</a>
            <a href="#">Team</a>
            <a href="#">Careers</a>
        </div>

        <div class="footer-box">
            <h3>Help</h3>
            <a href="#">FAQs</a>
            <a href="#">Contact Us</a>
        </div>

        <div class="footer-box">
            <h3>Social Media</h3>
            <div class="social">
                <a href="#"><i class="ri-instagram-line"></i></a>
                <a href="#"><i class="ri-twitter-x-line"></i></a>
                <a href="#"><i class="ri-facebook-fill"></i></a>
            </div>
        </div>
    </section>

    <!-- Scripts -->
    <script src="script.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>
</html>