<!DOCTYPE html>
<?php
	include 'php_includes/connection.php';
?>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Terminals - Dimple Star Transport</title>
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
    
    /* Terminals Section */
    .terminals {
        padding: 40px 0 80px;
    }
    
    .terminal-card {
        background: var(--white);
        border-radius: 8px;
        overflow: hidden;
        box-shadow: var(--shadow);
        margin-bottom: 40px;
        transition: var(--transition);
    }
    
    .terminal-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 10px 25px rgba(0, 0, 0, 0.15);
    }
    
    .terminal-header {
        background: var(--green);
        color: var(--white);
        padding: 20px;
    }
    
    .terminal-header h3 {
        color: var(--yellow);
        margin-bottom: 5px;
    }
    
    .terminal-content {
        padding: 25px;
    }
    
    .terminal-map {
        width: 100%;
        height: 300px;
        border: none;
        border-radius: 4px;
        margin-bottom: 20px;
    }
    
    .terminal-contact {
        display: flex;
        align-items: center;
        margin-top: 15px;
    }
    
    .terminal-contact i {
        color: var(--green);
        font-size: 1.2rem;
        margin-right: 10px;
        width: 20px;
    }
    
    .terminal-divider {
        height: 2px;
        background: var(--light-gray);
        margin: 30px 0;
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
        
        .terminal-content {
            padding: 20px;
        }
    }
    
    @media (max-width: 576px) {
        .page-title h1 {
            font-size: 1.8rem;
        }
        
        .terminal-header {
            padding: 15px;
        }
        
        .terminal-contact {
            flex-direction: column;
            align-items: flex-start;
        }
        
        .terminal-contact i {
            margin-bottom: 5px;
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
                <li class="current"><a href="terminal.php">Terminals</a></li>
                <li><a href="routeschedule.php">Routes / Schedules</a></li>
                <li><a href="contact.php">Contact</a></li>
                <li><a href="book.php">Book Now</a></li>
            </ul>
        </div>
    </header>
    
    <!-- Login Section -->
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
            <h1>Our Terminals</h1>
            <p>Convenient locations for your travel needs</p>
        </div>
    </section>
    
    <!-- Terminals Section -->
    <section class="terminals">
        <div class="container">
            <!-- España Terminal -->
            <div class="terminal-card">
                <div class="terminal-header">
                    <h3>España Terminal</h3>
                </div>
                <div class="terminal-content">
                    <iframe class="terminal-map" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://maps.google.com.ph/maps?f=q&amp;source=s_q&amp;hl=en&amp;geocode=&amp;q=Dimple+Star,+836BAntipoloStSampaloc,521,Manila,&amp;aq=0&amp;oq=Metro+Manila&amp;sll=14.6125312,120.9948033&amp;sspn=0.011772,0.021136&amp;t=h&amp;ie=UTF8&amp;hq=&amp;hnear=Dimple+Star&amp;ll=14.6125312,120.9948033&amp;spn=0.011772,0.021136&amp;z=14&amp;output=embed"></iframe>
                    
                    <div class="terminal-contact">
                        <i class="fas fa-phone"></i>
                        <span>+63.02.985.1451 / +63.908.926.9163</span>
                    </div>
                    
                    <div class="terminal-contact">
                        <i class="fas fa-map-marker-alt"></i>
                        <span>836B Antipolo St, Sampaloc, Manila</span>
                    </div>
                    
                    <div class="terminal-contact">
                        <i class="fas fa-external-link-alt"></i>
                        <span><a href="https://www.google.com/maps/place/Dimple+Star/@14.6125312,120.9948033,770m/data=!3m2!1e3!4b1!4m2!3m1!1s0x3397b60300001d5d:0xd30645794daddf84?hl=en;z=14" style="color:#2E8B57;text-align:left" target="_blank">View Larger Map</a></span>
                    </div>
                </div>
            </div>
            
            <!-- San Jose Terminal -->
            <div class="terminal-card">
                <div class="terminal-header">
                    <h3>San Jose Terminal</h3>
                </div>
                <div class="terminal-content">
                    <iframe class="terminal-map" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://maps.google.com.ph/maps?f=q&amp;source=s_q&amp;hl=en&amp;geocode=&amp;q=Dimple+Star+Transport,+BonifacioSt,SanJose,OccidentalMindoro,&amp;aq=0&amp;oq=&amp;sll=12.3540632,121.0618653&amp;sspn=0.011772,0.021136&amp;t=h&amp;ie=UTF8&amp;hq=&amp;hnear=Dimple+Star+Transport&amp;ll=12.3540632,121.0618653&amp;spn=0.011772,0.021136&amp;z=14&amp;output=embed"></iframe>
                    
                    <div class="terminal-contact">
                        <i class="fas fa-phone"></i>
                        <span>+63.02.6684151 / +63.921.568.6449</span>
                    </div>
                    
                    <div class="terminal-contact">
                        <i class="fas fa-map-marker-alt"></i>
                        <span>Bonifacio St, San Jose, Occidental Mindoro</span>
                    </div>
                    
                    <div class="terminal-contact">
                        <i class="fas fa-external-link-alt"></i>
                        <span><a href="https://www.google.com/maps/place/Dimple+Star+Transport/@14.6143711,120.9841972,458m/data=!3m2!1e3!4b1!4m2!3m1!1s0x3397b5fe6f7ebf6b:0xc34baa5ed38261eb?hl=en;z=14" style="color:#2E8B57;text-align:left" target="_blank">View Larger Map</a></span>
                    </div>
                </div>
            </div>
            
            <!-- Date/Time Display -->
            <div style="text-align: center; margin-top: 30px;">
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
                        <li><a href="terminal.php">Terminal Locations</a></li>
                        <li><a href="contact.php">Contact Us</a></li>
                        <li><a href="routeschedule.php">View Schedules</a></li>
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