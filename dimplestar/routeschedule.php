<!DOCTYPE html>
<?php
    include 'php_includes/connection.php';
?>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Routes & Schedules - Dimple Star Transport</title>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
<link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;600;700&family=Open+Sans:wght@300;400;600&display=swap" rel="stylesheet">
<link rel="icon" href="images/icon.ico" type="image/x-icon">
<style>
    :root {
        --yellow: #FFD700;
        --green: #2E8B57;
        --white: #FFFFFF;
        --black: #222222;
        --light-gray: #F5F5F5;
        --dark-green: #1F6B4D;
        --shadow: 0 4px 12px rgba(0, 0, 0, 0.15);
        --transition: all 0.3s ease;
    }
    
    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }
    
    body {
        font-family: 'Open Sans', sans-serif;
        line-height: 1.6;
        color: var(--black);
        background-color: var(--white);
    }
    
    h1, h2, h3, h4, h5, h6 {
        font-family: 'Montserrat', sans-serif;
        font-weight: 700;
    }
    
    .container {
        width: 100%;
        max-width: 1200px;
        margin: 0 auto;
        padding: 0 20px;
    }
    
    /* Header Styles */
    header {
        background: var(--black);
        padding: 15px 0;
        box-shadow: var(--shadow);
    }
    
    .header-container {
        display: flex;
        justify-content: space-between;
        align-items: center;
    }
    
    .logo {
        height: 60px;
        transition: var(--transition);
    }
    
    .logo:hover {
        transform: scale(1.05);
    }
    
    /* Navigation */
    .main-nav {
        display: flex;
        list-style: none;
    }
    
    .main-nav li {
        margin: 0 5px;
    }
    
    .main-nav a {
        color: var(--white);
        text-decoration: none;
        padding: 10px 15px;
        border-radius: 4px;
        transition: var(--transition);
        font-weight: 500;
        font-size: 15px;
    }
    
    .main-nav a:hover, .main-nav a.current {
        background: var(--yellow);
        color: var(--black);
    }
    
    .menu-toggle {
        display: none;
        color: var(--white);
        font-size: 1.5rem;
        cursor: pointer;
    }
    
    /* Login Section */
    .login-section {
        background: var(--green);
        color: var(--white);
        padding: 10px 0;
        text-align: right;
    }
    
    .login-section a {
        color: var(--yellow);
        text-decoration: none;
        font-weight: 600;
        transition: var(--transition);
    }
    
    .login-section a:hover {
        text-decoration: underline;
    }
    
    /* Page Title */
    .page-title {
        background: linear-gradient(rgba(0, 0, 0, 0.7), rgba(0, 0, 0, 0.7)), url('slide/images/bus1.png');
        background-size: cover;
        background-position: center;
        padding: 80px 0;
        text-align: center;
        color: var(--white);
        margin-bottom: 40px;
    }
    
    .page-title h1 {
        font-size: 3rem;
        color: var(--yellow);
        margin-bottom: 15px;
    }
    
    .page-title p {
        font-size: 1.2rem;
        max-width: 800px;
        margin: 0 auto;
    }
    
    /* Routes Content */
    .routes-content {
        padding: 40px 0 80px;
    }
    
    .route-image {
        width: 100%;
        border-radius: 8px;
        box-shadow: var(--shadow);
        margin-bottom: 30px;
    }
    
    .note {
        text-align: center;
        margin: 20px 0 40px;
        font-style: italic;
        color: #555;
    }
    
    .schedule-table {
        width: 100%;
        border-collapse: collapse;
        margin: 30px 0;
        box-shadow: var(--shadow);
        border-radius: 8px;
        overflow: hidden;
    }
    
    .schedule-table th {
        background: var(--green);
        color: var(--white);
        padding: 15px;
        text-align: left;
    }
    
    .schedule-table tr:nth-child(even) {
        background: var(--light-gray);
    }
    
    .schedule-table tr:hover {
        background: rgba(46, 139, 87, 0.1);
    }
    
    .schedule-table td {
        padding: 15px;
        border-bottom: 1px solid #ddd;
    }
    
    .schedule-table td:first-child {
        font-weight: 600;
        color: var(--dark-green);
    }
    
    .schedule-table td:nth-child(2) {
        color: #555;
    }
    
    .schedule-info {
        background: rgba(255, 215, 0, 0.1);
        padding: 20px;
        border-radius: 8px;
        margin: 30px 0;
        border-left: 4px solid var(--yellow);
    }
    
    .schedule-info h3 {
        color: var(--dark-green);
        margin-bottom: 10px;
    }
    
    /* Footer */
    footer {
        background: var(--black);
        color: var(--white);
        padding: 40px 0 20px;
    }
    
    .footer-container {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
        gap: 30px;
        margin-bottom: 30px;
    }
    
    .footer-logo {
        height: 50px;
        margin-bottom: 15px;
    }
    
    .footer-links h3 {
        color: var(--yellow);
        margin-bottom: 20px;
    }
    
    .footer-links ul {
        list-style: none;
    }
    
    .footer-links li {
        margin-bottom: 10px;
    }
    
    .footer-links a {
        color: var(--white);
        text-decoration: none;
        transition: var(--transition);
    }
    
    .footer-links a:hover {
        color: var(--yellow);
        padding-left: 5px;
    }
    
    .copyright {
        text-align: center;
        padding-top: 20px;
        border-top: 1px solid rgba(255, 255, 255, 0.1);
    }
    
    /* Responsive Design */
    @media (max-width: 992px) {
        .main-nav {
            display: none;
            flex-direction: column;
            position: absolute;
            top: 100%;
            left: 0;
            right: 0;
            background: var(--black);
            padding: 20px;
            box-shadow: var(--shadow);
        }
        
        .main-nav.active {
            display: flex;
        }
        
        .main-nav li {
            margin: 5px 0;
        }
        
        .menu-toggle {
            display: block;
        }
        
        .page-title h1 {
            font-size: 2.5rem;
        }
    }
    
    @media (max-width: 768px) {
        .page-title {
            padding: 60px 0;
        }
        
        .page-title h1 {
            font-size: 2rem;
        }
        
        .schedule-table {
            display: block;
            overflow-x: auto;
        }
    }
    
    @media (max-width: 576px) {
        .page-title h1 {
            font-size: 1.8rem;
        }
        
        .schedule-table th,
        .schedule-table td {
            padding: 10px;
        }
        
        .schedule-info {
            padding: 15px;
        }
    }
</style>
</head>
<body>
    <!-- Header Section -->
    <header>
        <div class="container header-container">
            <a href="index.php"><img src="images/logo.png" class="logo" alt="Dimple Star Transport" /></a>
            
            <div class="menu-toggle">
                <i class="fas fa-bars"></i>
            </div>
            
            <ul class="main-nav">
                <li><a href="index.php">Home</a></li>
                <li><a href="about.php">About Us</a></li>
                <li><a href="terminal.php">Terminals</a></li>
                <li class="current"><a href="routeschedule.php">Routes / Schedules</a></li>
                <li><a href="contact.php">Contact</a></li>
                <li><a href="book.php">Book Now</a></li>
            </ul>
        </div>
    </header>
    
<!-- Login Section -->
<div class="login-section">
    <div class="container">
        <div id="right">
            <?php
                if(isset($_SESSION['email'])){
                    $email = $_SESSION['email'];
                    echo "Welcome, ". $email. "!";
                    echo " <a href='logout.php'>Logout</a>";
                    
                    // Show admin link if user is admin
                    if(isset($_SESSION['is_admin']) && $_SESSION['is_admin'] == 1) {
                        echo " <a href='admin_dashboard.php' class='admin-link'>Admin Panel</a>";
                    }
                }
                if(empty($email)){
                    echo "<a href='signlog.php'>Login</a>";
                }
            ?>
        </div>
    </div>
</div>
    
    <!-- Page Title -->
    <section class="page-title">
        <div class="container">
            <h1>Routes & Schedules</h1>
            <p>Plan your journey with our convenient schedules and routes</p>
        </div>
    </section>
    
    <!-- Routes Content -->
    <section class="routes-content">
        <div class="container">
            <img src="images/route.png" class="route-image" alt="Dimple Star Transport Routes">
            
            <div class="note">
                <h2>(All trips are vice versa)</h2>
            </div>
            
            <div class="schedule-info">
                <h3><i class="fas fa-info-circle"></i> Schedule Information</h3>
                <p>All schedules are subject to change without prior notice. Please arrive at the terminal at least 30 minutes before departure time.</p>
            </div>
            
            <table class="schedule-table">
                <tr>
                    <th>Origin</th>
                    <th>Regular Schedule</th>
                    <th>Destination</th>
                </tr>
                <tr>
                    <td>Ali Mall Cubao Terminal</td>
                    <td>9:00 am / 10:00 am / 1:00 pm / 4:00pm</td>
                    <td>San Jose</td>
                </tr>
                <tr>
                    <td>Alabang Terminal</td>
                    <td>6:00 am / 7:00 am / 2:00 pm / 6:00 pm / 10:00 pm</td>
                    <td>San Jose</td>
                </tr>
                <tr>
                    <td>Cabuyao Terminal</td>
                    <td>8:00 am / 9:00 am / 4:00 pm / 8:00 pm</td>
                    <td>San Jose</td>
                </tr>
                <tr>
                    <td>Espana Terminal</td>
                    <td>4:30 am / 5:30 am / 12:00 am / 4:00 pm / 8:00 pm</td>
                    <td>San Jose</td>
                </tr>
                <tr>
                    <td>San Lazaro Terminal</td>
                    <td>3:00 am / 4:30 am / 11:00 am / 3:00 pm / 7:00 pm</td>
                    <td>San Jose</td>
                </tr>
                <tr>
                    <td>Pasay Terminal</td>
                    <td>5:00 am / 6:00 am / 1:00 pm / 3:00pm</td>
                    <td>San Jose</td>
                </tr>
            </table>
            
            <!-- Date/Time Display -->
            <div style="text-align: center; margin-top: 40px;">
                <h3><?php include_once("php_includes/date_time.php"); ?></h3>
            </div>
        </div>
    </section>
    
    <!-- Footer -->
    <footer>
        <div class="container">
            <div class="footer-container">
                <div class="footer-about">
                    <a href="index.php"><img src="images/footer-logo.jpg" alt="Dimple Star Transport" class="footer-logo" /></a>
                    <p>Providing reliable and comfortable transportation services for over a decade.</p>
                </div>
                
                <div class="footer-links">
                    <h3>Quick Links</h3>
                    <ul>
                        <li><a href="index.php">Home</a></li>
                        <li><a href="about.php">About Us</a></li>
                        <li><a href="terminal.php">Terminals</a></li>
                        <li><a href="routeschedule.php">Routes / Schedules</a></li>
                    </ul>
                </div>
                
                <div class="footer-links">
                    <h3>Services</h3>
                    <ul>
                        <li><a href="book.php">Book a Trip</a></li>
                        <li><a href="routeschedule.php">View Schedules</a></li>
                        <li><a href="terminal.php">Terminal Locations</a></li>
                        <li><a href="contact.php">Contact Us</a></li>
                    </ul>
                </div>
            </div>
            
            <div class="copyright">
                <p>&copy; <?php echo date("Y"); ?> Dimple Star Transport. All rights reserved.</p>
            </div>
        </div>
    </footer>

    <script>
        // Mobile menu toggle
        document.addEventListener('DOMContentLoaded', function() {
            const menuToggle = document.querySelector('.menu-toggle');
            const mainNav = document.querySelector('.main-nav');
            
            menuToggle.addEventListener('click', function() {
                mainNav.classList.toggle('active');
            });
            
            // Close menu when clicking outside
            document.addEventListener('click', function(event) {
                if (!event.target.closest('.main-nav') && !event.target.closest('.menu-toggle')) {
                    mainNav.classList.remove('active');
                }
            });
        });
    </script>
</body>
</html>