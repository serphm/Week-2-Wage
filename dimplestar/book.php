<!DOCTYPE html>
<?php
    include 'php_includes/connection.php';
    include 'php_includes/book.php';
?>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Book Now - Dimple Star Transport</title>
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
    }
    
    /* Booking Content */
    .booking-content {
        padding: 40px 0 80px;
    }
    
    .booking-container {
        max-width: 800px;
        margin: 0 auto;
        background: var(--white);
        padding: 40px;
        border-radius: 8px;
        box-shadow: var(--shadow);
    }
    
    .booking-form {
        width: 100%;
    }
    
    .form-group {
        margin-bottom: 25px;
    }
    
    .form-group label {
        display: block;
        margin-bottom: 8px;
        font-weight: 600;
        color: var(--black);
    }
    
    .form-control {
        width: 100%;
        padding: 12px 15px;
        border: 1px solid #ddd;
        border-radius: 4px;
        font-size: 16px;
        transition: var(--transition);
        font-family: 'Open Sans', sans-serif;
    }
    
    .form-control:focus {
        border-color: var(--green);
        outline: none;
        box-shadow: 0 0 0 3px rgba(46, 139, 87, 0.2);
    }
    
    select.form-control {
        appearance: none;
        background-image: url("data:image/svg+xml;charset=UTF-8,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 24 24' fill='none' stroke='currentColor' stroke-width='2' stroke-linecap='round' stroke-linejoin='round'%3e%3cpolyline points='6 9 12 15 18 9'%3e%3c/polyline%3e%3c/svg%3e");
        background-repeat: no-repeat;
        background-position: right 10px center;
        background-size: 16px;
    }
    
    .radio-group {
        display: flex;
        gap: 20px;
        margin-bottom: 25px;
    }
    
    .radio-option {
        display: flex;
        align-items: center;
        gap: 8px;
        cursor: pointer;
    }
    
    .radio-option input[type="radio"] {
        accent-color: var(--green);
    }
    
    .radio-option span {
        font-weight: 500;
    }
    
    .form-row {
        display: flex;
        gap: 20px;
        margin-bottom: 25px;
    }
    
    .form-row .form-group {
        flex: 1;
    }
    
    .submit-btn {
        display: inline-block;
        background: var(--green);
        color: var(--white);
        padding: 15px 30px;
        border: none;
        border-radius: 4px;
        font-size: 16px;
        font-weight: 600;
        cursor: pointer;
        transition: var(--transition);
        text-align: center;
        width: 100%;
        margin-top: 20px;
    }
    
    .submit-btn:hover {
        background: var(--dark-green);
        transform: translateY(-2px);
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
        
        .booking-container {
            padding: 30px;
        }
    }
    
    @media (max-width: 768px) {
        .page-title {
            padding: 60px 0;
        }
        
        .page-title h1 {
            font-size: 2rem;
        }
        
        .form-row {
            flex-direction: column;
            gap: 0;
        }
        
        .booking-container {
            padding: 20px;
        }
    }
    
    @media (max-width: 576px) {
        .page-title h1 {
            font-size: 1.8rem;
        }
        
        .radio-group {
            flex-direction: column;
            gap: 10px;
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
                <li><a href="routeschedule.php">Routes / Schedules</a></li>
                <li><a href="contact.php">Contact</a></li>
                <li class="current"><a href="book.php">Book Now</a></li>
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
            <h1>Book Your Trip</h1>
            <p>Reserve your seats for a comfortable journey</p>
        </div>
    </section>
    
    <!-- Booking Content -->
    <section class="booking-content">
        <div class="container">
            <div class="booking-container">
                <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" class="booking-form">
                    <h2 style="text-align: center; margin-bottom: 30px; color: var(--green);">Reservation Details</h2>
                    
                    <!-- Trip Type -->
                    <div class="form-group">
                        <label>Trip Type:</label>
                        <div class="radio-group">
                            <div class="radio-option">
                                <input type="radio" name="way" value="2" id="two-way" onclick="document.getElementById('datepick2').disabled=false">
                                <span for="two-way">Round Trip</span>
                            </div>
                            <div class="radio-option">
                                <input type="radio" name="way" value="1" id="one-way" onclick="document.getElementById('datepick2').disabled=true" checked>
                                <span for="one-way">One Way</span>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Origin and Destination -->
                    <div class="form-row">
                        <div class="form-group">
                            <label for="Origin">Origin:</label>
                            <select id="Origin" class="form-control" name="Origin" required>
                                <option value="0">Select Origin</option>
                                <option value="San Lazaro">San Lazaro</option>
                                <option value="Espana">Espana</option>
                                <option value="Alabang">Alabang</option>
                                <option value="Cabuyao">Cabuyao</option>
                                <option value="Naujan">Naujan</option>
                                <option value="Victoria">Victoria</option>
                                <option value="Pinamalayan">Pinamalayan</option>
                                <option value="Gloria">Gloria</option>
                                <option value="Bongabong">Bongabong</option>
                                <option value="Roxas">Roxas</option>
                                <option value="Mansalay">Mansalay</option>
                                <option value="Bulalacao">Bulalacao</option>
                                <option value="Magsaysay">Magsaysay</option>
                                <option value="San Jose">San Jose</option>
                                <option value="Pola">Pola</option>
                                <option value="Soccoro">Soccoro</option>
                            </select>
                        </div>
                        
                        <div class="form-group">
                            <label for="Destination">Destination:</label>
                            <select id="Destination" class="form-control" name="Destination" required>
                                <option value="0">Select Destination</option>
                                <option value="San Lazaro">San Lazaro</option>
                                <option value="Espana">Espana</option>
                                <option value="Alabang">Alabang</option>
                                <option value="Cabuyao">Cabuyao</option>
                                <option value="Naujan">Naujan</option>
                                <option value="Victoria">Victoria</option>
                                <option value="Pinamalayan">Pinamalayan</option>
                                <option value="Gloria">Gloria</option>
                                <option value="Bongabong">Bongabong</option>
                                <option value="Roxas">Roxas</option>
                                <option value="Mansalay">Mansalay</option>
                                <option value="Bulalacao">Bulalacao</option>
                                <option value="Magsaysay">Magsaysay</option>
                                <option value="San Jose">San Jose</option>
                                <option value="Pola">Pola</option>
                                <option value="Soccoro">Soccoro</option>
                            </select>
                        </div>
                    </div>
                    
                    <!-- Passengers and Bus Type -->
                    <div class="form-row">
                        <div class="form-group">
                            <label for="no_of_pass">Number of Passengers:</label>
                            <input type="number" id="no_of_pass" class="form-control" name="no_of_pass" min="1" max="50" required>
                        </div>
                        
                        <div class="form-group">
                            <label for="bustype">Bus Type:</label>
                            <select id="bustype" class="form-control" name="bustype" required>
                                <option value="0">Select Bus Type</option>
                                <option value="Air Conditioned">Air Conditioned</option>
                                <option value="Ordinary">Ordinary</option>
                            </select>
                        </div>
                    </div>
                    
                    <!-- Dates -->
                    <div class="form-row">
                        <div class="form-group">
                            <label for="datepick1">Departure Date:</label>
                            <input type="text" id="datepick1" class="form-control" name="Departure" required>
                        </div>
                        
                        <div class="form-group">
                            <label for="datepick2">Return Date:</label>
                            <input type="text" id="datepick2" class="form-control" name="Return" disabled>
                        </div>
                    </div>
                    
                    <!-- Submit Button -->
                    <button type="submit" name="submit" class="submit-btn">
                        <i class="fas fa-ticket-alt"></i> Book Now
                    </button>
                </form>
                
                <!-- Date/Time Display -->
                <div style="text-align: center; margin-top: 40px;">
                    <h3><?php include_once("php_includes/date_time.php"); ?></h3>
                </div>
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
    
    <!-- Datepicker Script -->
    <script type="text/javascript" src="js/datepickr.js"></script>
    <script type="text/javascript">
        new datepickr('datepick1', {
            'dateFormat': '20y-m-d'
        });
        
        new datepickr('datepick2', {
            'dateFormat': '20y-m-d'
        });
    </script>
</body>
</html>