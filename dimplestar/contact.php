<!DOCTYPE html>
<?php
	include 'php_includes/connection.php';
?>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Contact Us - Dimple Star Transport</title>
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
    
    /* Contact Content */
    .contact-content {
        padding: 40px 0 80px;
    }
    
    .contact-container {
        display: flex;
        flex-wrap: wrap;
        gap: 40px;
        margin-bottom: 50px;
    }
    
    .contact-info {
        flex: 1;
        min-width: 300px;
        background: var(--light-gray);
        padding: 30px;
        border-radius: 8px;
        box-shadow: var(--shadow);
    }
    
    .contact-info h2 {
        color: var(--green);
        margin-bottom: 25px;
        text-align: center;
    }
    
    .contact-details {
        margin-top: 20px;
    }
    
    .contact-item {
        display: flex;
        align-items: flex-start;
        margin-bottom: 20px;
    }
    
    .contact-icon {
        font-size: 1.5rem;
        color: var(--green);
        margin-right: 15px;
        min-width: 30px;
        text-align: center;
    }
    
    .contact-text {
        flex: 1;
    }
    
    .contact-text h4 {
        color: var(--black);
        margin-bottom: 5px;
    }
    
    /* Contact Form */
    .contact-form {
        flex: 1;
        min-width: 300px;
        background: var(--white);
        padding: 30px;
        border-radius: 8px;
        box-shadow: var(--shadow);
        border: 1px solid #eee;
    }
    
    .contact-form h2 {
        color: var(--green);
        margin-bottom: 25px;
        text-align: center;
    }
    
    .form-group {
        margin-bottom: 20px;
    }
    
    .form-group label {
        display: block;
        margin-bottom: 8px;
        font-weight: 600;
        color: var(--black);
    }
    
    .form-group label.required:after {
        content: " *";
        color: #e74c3c;
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
    
    textarea.form-control {
        min-height: 120px;
        resize: vertical;
    }
    
    .submit-btn {
        display: inline-block;
        background: var(--green);
        color: var(--white);
        padding: 12px 30px;
        border: none;
        border-radius: 4px;
        font-size: 16px;
        font-weight: 600;
        cursor: pointer;
        transition: var(--transition);
        text-align: center;
        width: 100%;
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
        
        .contact-container {
            flex-direction: column;
        }
    }
    
    @media (max-width: 768px) {
        .page-title {
            padding: 60px 0;
        }
        
        .page-title h1 {
            font-size: 2rem;
        }
        
        .contact-info, .contact-form {
            padding: 20px;
        }
    }
    
    @media (max-width: 576px) {
        .page-title h1 {
            font-size: 1.8rem;
        }
        
        .contact-item {
            flex-direction: column;
            text-align: center;
        }
        
        .contact-icon {
            margin-right: 0;
            margin-bottom: 10px;
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
                <li class="current"><a href="contact.php">Contact</a></li>
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
            <h1>Contact Us</h1>
            <p>Get in touch with Dimple Star Transport</p>
        </div>
    </section>
    
    <!-- Contact Content -->
    <section class="contact-content">
        <div class="container">
            <div class="contact-container">
                <!-- Contact Information -->
                <div class="contact-info">
                    <h2>Our Information</h2>
                    <div class="contact-details">
                        <div class="contact-item">
                            <div class="contact-icon">
                                <i class="fas fa-map-marker-alt"></i>
                            </div>
                            <div class="contact-text">
                                <h4>Address</h4>
                                <p>Block 1 lot 10, Southpoint Subd.<br>Brgy Banay-Banay, Cabuyao, Laguna</p>
                            </div>
                        </div>
                        
                        <div class="contact-item">
                            <div class="contact-icon">
                                <i class="fas fa-phone"></i>
                            </div>
                            <div class="contact-text">
                                <h4>Phone</h4>
                                <p>0929 209 0712</p>
                            </div>
                        </div>
                        
                        <div class="contact-item">
                            <div class="contact-icon">
                                <i class="fas fa-clock"></i>
                            </div>
                            <div class="contact-text">
                                <h4>Business Hours</h4>
                                <p>Monday - Sunday: 5:00 AM - 10:00 PM</p>
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- Contact Form -->
                <div class="contact-form">
                    <h2>Send Us a Message</h2>
                    <form class="validate" action="messageexec.php" method="POST">
                        <div class="form-group">
                            <label for="name" class="required">Name:</label>
                            <input id="name" class="form-control" type="text" name="name" required>
                        </div>
                        
                        <div class="form-group">
                            <label for="email" class="required">Email:</label>
                            <input id="email" class="form-control" placeholder="Example: yourname@email.com" type="email" name="email" required>
                        </div>
                        
                        <div class="form-group">
                            <label for="subject" class="required">Subject:</label>
                            <input id="subject" class="form-control" type="text" name="subject" required>
                        </div>
                        
                        <div class="form-group">
                            <label for="message" class="required">Message:</label>
                            <textarea id="message" class="form-control" name="message" required></textarea>
                        </div>
                        
                        <button type="submit" class="submit-btn" name="Submit">
                            <i class="fas fa-paper-plane"></i> Send Message
                        </button>
                    </form>
                </div>
            </div>
            
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