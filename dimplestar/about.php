<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>About Us - Dimple Star Transport</title>
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
    
    /* About Hero Section */
    .about-hero {
        background: linear-gradient(rgba(0, 0, 0, 0.7), rgba(0, 0, 0, 0.7)), url('images/oldbus.jpg');
        background-size: cover;
        background-position: center;
        padding: 80px 0;
        text-align: center;
        color: var(--white);
    }
    
    .about-hero h1 {
        font-size: 3rem;
        margin-bottom: 20px;
        color: var(--yellow);
    }
    
    /* About Content */
    .about-content {
        padding: 80px 0;
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
    
    .history-content {
        display: flex;
        flex-wrap: wrap;
        align-items: center;
        gap: 40px;
        margin-bottom: 60px;
    }
    
    .history-image {
        flex: 1;
        min-width: 300px;
        border-radius: 8px;
        overflow: hidden;
        box-shadow: var(--shadow);
    }
    
    .history-image img {
        width: 100%;
        height: auto;
        display: block;
    }
    
    .history-text {
        flex: 1;
        min-width: 300px;
    }
    
    .history-text p {
        margin-bottom: 20px;
        font-size: 1.1rem;
    }
    
    /* Mission Vision Section */
    .mission-vision {
        background: var(--light-gray);
        padding: 80px 0;
    }
    
    .mv-container {
        display: flex;
        flex-wrap: wrap;
        gap: 40px;
    }
    
    .mv-card {
        flex: 1;
        min-width: 300px;
        background: var(--white);
        padding: 40px;
        border-radius: 8px;
        box-shadow: var(--shadow);
        text-align: center;
        transition: var(--transition);
    }
    
    .mv-card:hover {
        transform: translateY(-10px);
    }
    
    .mv-icon {
        font-size: 3rem;
        color: var(--green);
        margin-bottom: 20px;
    }
    
    .mv-card h3 {
        margin-bottom: 20px;
        color: var(--black);
    }
    
    .mv-card p {
        color: #555;
    }
    
    /* Stats Section */
    .stats {
        padding: 80px 0;
        background: var(--green);
        color: var(--white);
    }
    
    .stats-container {
        display: flex;
        flex-wrap: wrap;
        justify-content: space-around;
        gap: 30px;
    }
    
    .stat-item {
        text-align: center;
        padding: 20px;
    }
    
    .stat-number {
        font-size: 3rem;
        font-weight: 700;
        color: var(--yellow);
        margin-bottom: 10px;
    }
    
    .stat-text {
        font-size: 1.2rem;
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
        
        .about-hero h1 {
            font-size: 2.5rem;
        }
    }
    
    @media (max-width: 768px) {
        .about-hero {
            padding: 60px 0;
        }
        
        .about-hero h1 {
            font-size: 2rem;
        }
        
        .history-content, .mv-container {
            flex-direction: column;
        }
        
        .stats-container {
            flex-direction: column;
            gap: 20px;
        }
    }
    
    @media (max-width: 576px) {
        .about-hero h1 {
            font-size: 1.8rem;
        }
        
        .section-title {
            font-size: 1.8rem;
        }
        
        .mv-card {
            padding: 25px;
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
                <li class="current"><a href="about.php">About Us</a></li>
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
                    }
                    if(empty($email)){
                        echo "<a href='signlog.php'>Signup / Login</a>";
                    }
                ?>
            </div>
        </div>
    </div>
    
    <!-- About Hero Section -->
    <section class="about-hero">
        <div class="container">
            <h1>About Dimple Star Transport</h1>
            <p>Your trusted transportation partner for decades</p>
        </div>
    </section>
    
    <!-- About Content -->
    <section class="about-content">
        <div class="container">
            <h2 class="section-title">Our History</h2>
            
            <div class="history-content">
                <div class="history-image">
                    <img src="images/oldbus.jpg" alt="Napat Transit Bus in 1993">
                </div>
                
                <div class="history-text">
                    <p>Photo taken on October 16, 1993. Napat Transit (now Dimple Star Transport) NVR-963 (fleet No 800) going to Alabang and jeepneys under the Light Rail Line in Taft Ave near United Nations Avenue, Ermita, Manila, Philippines.</p>
                    
                    <p>Year 2004 of May changes has been made, Napat Transit became Dimple Star Transport.</p>
                    
                    <div id="fb">
                        <?php include_once("php_includes/fblike.php"); ?>
                    </div>
                    
                    <div class="date-time">
                        <h3><?php include_once("php_includes/date_time.php"); ?></h3>
                    </div>
                </div>
            </div>
        </div>
    </section>
    
    <!-- Mission Vision Section -->
    <section class="mission-vision">
        <div class="container">
            <div class="mv-container">
                <div class="mv-card">
                    <div class="mv-icon">
                        <i class="fas fa-bullseye"></i>
                    </div>
                    <h3>Our Mission</h3>
                    <p>To provide superior transport service to Metro Manila and Mindoro Province commuters.</p>
                </div>
                
                <div class="mv-card">
                    <div class="mv-icon">
                        <i class="fas fa-eye"></i>
                    </div>
                    <h3>Our Vision</h3>
                    <p>To lead the bus transport industry through its innovation service to the riding public.</p>
                </div>
            </div>
        </div>
    </section>
    
    <!-- Stats Section -->
    <section class="stats">
        <div class="container">
            <div class="stats-container">
                <div class="stat-item">
                    <div class="stat-number">30+</div>
                    <div class="stat-text">Years of Service</div>
                </div>
                
                <div class="stat-item">
                    <div class="stat-number">50+</div>
                    <div class="stat-text">Buses in Fleet</div>
                </div>
                
                <div class="stat-item">
                    <div class="stat-number">20+</div>
                    <div class="stat-text">Routes Served</div>
                </div>
                
                <div class="stat-item">
                    <div class="stat-number">1000+</div>
                    <div class="stat-text">Daily Passengers</div>
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
</body>
</html>