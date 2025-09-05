<!DOCTYPE html>
<?php
	include 'php_includes/connection.php';
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dimple Star Transport</title>
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
            position: sticky;
            top: 0;
            z-index: 1000;
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
        
        /* Hero Section */
        .hero {
            background: linear-gradient(rgba(0, 0, 0, 0.7), rgba(0, 0, 0, 0.7)), url('slide/images/bus1.png');
            background-size: cover;
            background-position: center;
            padding: 100px 0;
            text-align: center;
            color: var(--white);
        }
        
        .hero-content {
            max-width: 800px;
            margin: 0 auto;
        }
        
        .hero h1 {
            font-size: 3rem;
            margin-bottom: 20px;
            color: var(--yellow);
        }
        
        .hero p {
            font-size: 1.2rem;
            margin-bottom: 30px;
        }
        
        .btn {
            display: inline-block;
            background: var(--yellow);
            color: var(--black);
            padding: 12px 30px;
            border-radius: 30px;
            text-decoration: none;
            font-weight: 600;
            transition: var(--transition);
            border: 2px solid var(--yellow);
            text-transform: uppercase;
            letter-spacing: 1px;
            font-size: 14px;
        }
        
        .btn:hover {
            background: transparent;
            color: var(--yellow);
            transform: translateY(-3px);
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.2);
        }
        
        .btn-outline {
            background: transparent;
            color: var(--yellow);
            border: 2px solid var(--yellow);
            margin-left: 15px;
        }
        
        .btn-outline:hover {
            background: var(--yellow);
            color: var(--black);
        }
        
        /* Features Section */
        .features {
            padding: 80px 0;
            background: var(--light-gray);
        }
        
        .section-title {
            text-align: center;
            margin-bottom: 50px;
            color: var(--black);
            position: relative;
        }
        
        .section-title:after {
            content: '';
            display: block;
            width: 80px;
            height: 4px;
            background: var(--yellow);
            margin: 15px auto;
        }
        
        .features-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 30px;
        }
        
        .feature-card {
            background: var(--white);
            padding: 30px;
            border-radius: 8px;
            text-align: center;
            box-shadow: var(--shadow);
            transition: var(--transition);
        }
        
        .feature-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 15px 30px rgba(0, 0, 0, 0.1);
        }
        
        .feature-icon {
            font-size: 3rem;
            color: var(--green);
            margin-bottom: 20px;
        }
        
        .feature-card h3 {
            margin-bottom: 15px;
            color: var(--black);
        }
        
        /* Routes Preview */
        .routes {
            padding: 80px 0;
            background: var(--white);
        }
        
        .route-cards {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 25px;
        }
        
        .route-card {
            background: var(--light-gray);
            border-radius: 8px;
            overflow: hidden;
            box-shadow: var(--shadow);
        }
        
        .route-img {
            height: 200px;
            background-size: cover;
            background-position: center;
        }
        
        .route-content {
            padding: 20px;
        }
        
        .route-content h3 {
            color: var(--green);
            margin-bottom: 10px;
        }
        
        /* Contact Section */
        .contact {
            padding: 80px 0;
            background: var(--green);
            color: var(--white);
        }
        
        .contact-container {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 40px;
        }
        
        .contact-info h2 {
            color: var(--yellow);
            margin-bottom: 20px;
        }
        
        .contact-details {
            margin-top: 20px;
        }
        
        .contact-item {
            display: flex;
            align-items: center;
            margin-bottom: 15px;
        }
        
        .contact-icon {
            font-size: 1.5rem;
            color: var(--yellow);
            margin-right: 15px;
            width: 30px;
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
            
            .hero h1 {
                font-size: 2.5rem;
            }
        }
        
        @media (max-width: 768px) {
            .hero {
                padding: 60px 0;
            }
            
            .hero h1 {
                font-size: 2rem;
            }
            
            .btn-container {
                display: flex;
                flex-direction: column;
                gap: 15px;
            }
            
            .btn-outline {
                margin-left: 0;
            }
            
            .features-grid, .route-cards {
                grid-template-columns: 1fr;
            }
        }
        
        @media (max-width: 576px) {
            .hero h1 {
                font-size: 1.8rem;
            }
            
            .hero p {
                font-size: 1rem;
            }
            
            .section-title {
                font-size: 1.8rem;
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
                <li class="current"><a href="index.php">Home</a></li>
                <li><a href="about.php">About Us</a></li>
                <li><a href="terminal.php">Terminals</a></li>
                <li><a href="routeschedule.php">Routes / Schedules</a></li>
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
    
    <!-- Hero Section -->
    <section class="hero">
        <div class="container hero-content">
            <h1>Travel With Comfort & Safety</h1>
            <p>Dimple Star Transport offers premium bus services with punctual schedules, comfortable rides, and extensive routes across the region.</p>
            <div class="btn-container">
                <a href="book.php" class="btn">Book Your Ticket</a>
                <a href="routeschedule.php" class="btn btn-outline">View Schedules</a>
            </div>
        </div>
    </section>
    
    <!-- Features Section -->
    <section class="features">
        <div class="container">
            <h2 class="section-title">Why Choose Us</h2>
            <div class="features-grid">
                <div class="feature-card">
                    <div class="feature-icon">
                        <i class="fas fa-shield-alt"></i>
                    </div>
                    <h3>Safe Journey</h3>
                    <p>Your safety is our priority with well-maintained buses and professional drivers.</p>
                </div>
                
                <div class="feature-card">
                    <div class="feature-icon">
                        <i class="fas fa-clock"></i>
                    </div>
                    <h3>Punctual Service</h3>
                    <p>We value your time with our on-time departure and arrival schedules.</p>
                </div>
                
                <div class="feature-card">
                    <div class="feature-icon">
                        <i class="fas fa-couch"></i>
                    </div>
                    <h3>Comfortable Ride</h3>
                    <p>Travel in comfort with our spacious seats and climate-controlled buses.</p>
                </div>
                
                <div class="feature-card">
                    <div class="feature-icon">
                        <i class="fas fa-route"></i>
                    </div>
                    <h3>Extensive Routes</h3>
                    <p>We serve multiple destinations with convenient schedules.</p>
                </div>
            </div>
        </div>
    </section>
    
    <!-- Routes Preview -->
    <section class="routes">
        <div class="container">
            <h2 class="section-title">Popular Routes</h2>
            <div class="route-cards">
                <div class="route-card">
                    <div class="route-img" style="background-image: url('slide/images/bus2.png');"></div>
                    <div class="route-content">
                        <h3>Manila to Laguna</h3>
                        <p>Multiple daily trips with express and regular services available.</p>
                        <a href="routeschedule.php" class="btn">View Schedule</a>
                    </div>
                </div>
                
                <div class="route-card">
                    <div class="route-img" style="background-image: url('slide/images/bus3.png');"></div>
                    <div class="route-content">
                        <h3>Manila to Batangas</h3>
                        <p>Comfortable rides to Batangas with scenic views along the way.</p>
                        <a href="routeschedule.php" class="btn">View Schedule</a>
                    </div>
                </div>
                
                <div class="route-card">
                    <div class="route-img" style="background-image: url('slide/images/bus4.png');"></div>
                    <div class="route-content">
                        <h3>Manila to Quezon</h3>
                        <p>Affordable and comfortable transportation to Quezon province.</p>
                        <a href="routeschedule.php" class="btn">View Schedule</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    
    <!-- Contact Section -->
    <section class="contact">
        <div class="container contact-container">
            <div class="contact-info">
                <h2>Contact Us</h2>
                <p>We're here to assist you with your travel needs. Reach out to us through any of the following channels:</p>
                
                <div class="contact-details">
                    <div class="contact-item">
                        <div class="contact-icon">
                            <i class="fas fa-phone"></i>
                        </div>
                        <div>0929 209 0712</div>
                    </div>
                    
                    <div class="contact-item">
                        <div class="contact-icon">
                            <i class="fas fa-map-marker-alt"></i>
                        </div>
                        <div>Block 1 lot 10, southpoint Subd.<br>Brgy Banay-Banay, Cabuyao, Laguna</div>
                    </div>
                    
                    <div class="contact-item">
                        <div class="contact-icon">
                            <i class="fas fa-clock"></i>
                        </div>
                        <div>
                            <?php include_once("php_includes/date_time.php"); ?>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="quick-links">
                <h2>Quick Links</h2>
                <ul class="footer-links">
                    <li><a href="index.php">Home</a></li>
                    <li><a href="about.php">About Us</a></li>
                    <li><a href="terminal.php">Terminals</a></li>
                    <li><a href="routeschedule.php">Routes / Schedules</a></li>
                    <li><a href="contact.php">Contact</a></li>
                    <li><a href="book.php">Book Now</a></li>
                </ul>
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
                    <h3>Services</h3>
                    <ul>
                        <li><a href="routeschedule.php">Regular Routes</a></li>
                        <li><a href="routeschedule.php">Express Services</a></li>
                        <li><a href="routeschedule.php">Special Trips</a></li>
                        <li><a href="routeschedule.php">Corporate Bookings</a></li>
                    </ul>
                </div>
                
                <div class="footer-links">
                    <h3>Support</h3>
                    <ul>
                        <li><a href="contact.php">Contact Us</a></li>
                        <li><a href="faq.php">FAQs</a></li>
                        <li><a href="terms.php">Terms & Conditions</a></li>
                        <li><a href="privacy.php">Privacy Policy</a></li>
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