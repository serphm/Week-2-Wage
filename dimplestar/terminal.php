<!DOCTYPE html>
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
            --primary: #222222;
            --secondary: #2E8B57;
            --light: #F5F5F5;
            --dark: #222222;
            --white: #FFFFFF;
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
            color: var(--dark);
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
            background: var(--primary);
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
            background: var(--accent);
            color: var(--dark);
        }
        
        .menu-toggle {
            display: none;
            color: var(--white);
            font-size: 1.5rem;
            cursor: pointer;
        }
        
        /* Login Section */
        .login-section {
            background: var(--secondary);
            color: var(--white);
            padding: 10px 0;
            text-align: right;
        }
        
        .login-section a {
            color: var(--accent);
            text-decoration: none;
            font-weight: 600;
            transition: var(--transition);
        }
        
        .login-section a:hover {
            text-decoration: underline;
        }
        
        /* Page Title */
        .page-title {
            text-align: center;
            margin: 40px 0 30px;
            color: var(--primary);
            position: relative;
            padding-bottom: 15px;
        }
        
        .page-title:after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 50%;
            transform: translateX(-50%);
            width: 80px;
            height: 4px;
            background: var(--accent);
            border-radius: 2px;
        }
        
        /* Terminal Cards */
        .terminals-container {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(500px, 1fr));
            gap: 30px;
            margin-bottom: 50px;
        }
        
        .terminal-card {
            background: var(--white);
            border-radius: 10px;
            overflow: hidden;
            box-shadow: var(--shadow);
            transition: var(--transition);
        }
        
        .terminal-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.15);
        }
        
        .terminal-header {
            background: linear-gradient(90deg, var(--primary) 0%, var(--secondary) 100%);
            color: var(--white);
            padding: 15px 20px;
        }
        
        .terminal-header h3 {
            display: flex;
            align-items: center;
            gap: 10px;
        }
        
        .terminal-header h3 i {
            font-size: 1.2rem;
        }
        
        .terminal-map {
            height: 250px;
            border: none;
            width: 100%;
            display: block;
        }
        
        .terminal-info {
            padding: 20px;
        }
        
        .terminal-contact {
            display: flex;
            align-items: center;
            gap: 10px;
            margin-top: 15px;
            padding-top: 15px;
            border-top: 1px solid #eee;
        }
        
        .terminal-contact i {
            color: var(--primary);
            font-size: 1.2rem;
        }
        
        .view-map {
            display: inline-block;
            margin-top: 15px;
            color: var(--secondary);
            font-weight: 500;
        }
        
        /* Footer */
        footer {
            background: var(--primary);
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
            color: var(--accent);
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
            color: var(--accent);
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
                background: var(--primary);
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
        }
        
        @media (max-width: 768px) {
            .terminals-container {
                grid-template-columns: 1fr;
            }
        }
        
        @media (max-width: 576px) {
            .header-container {
                flex-direction: column;
                gap: 15px;
            }
            
            .terminal-header h3 {
                font-size: 1.1rem;
            }
        }
        
        /* Date Time Styling */
        .datetime {
            text-align: center;
            margin: 20px 0;
            color: #666;
            font-size: 1.1rem;
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
    <div class="login-section">
        <div class="container">
            <div class="user-info">
                <?php
                    if(isset($_SESSION['email'])){
                        $email = $_SESSION['email'];
                        echo "<i class='fas fa-user-circle'></i> Welcome, ". $email. "!";
                        echo " <a href='logout.php'>Logout</a>";
                    }
                    if(empty($email)){
                        echo "<a href='signlog.php'><i class='fas fa-sign-in-alt'></i> SignUp / Login</a>";
                    }
                ?>
            </div>
        </div>
    </div>
    
    <!-- Main Content -->
    <main class="container">
        <h1 class="page-title">OUR TERMINALS</h1>
        
        <div class="datetime">
            <?php include_once("php_includes/date_time.php"); ?>
        </div>
        
        <div class="terminals-container">
            <div class="terminal-card">
                <div class="terminal-header">
                    <h3><i class="fas fa-map-marker-alt"></i> Espana Terminal</h3>
                </div>
                <iframe class="terminal-map" src="https://maps.google.com.ph/maps?f=q&amp;source=s_q&amp;hl=en&amp;geocode=&amp;q=Dimple+Star,+836BAntipoloStSampaloc,521,Manila,&amp;aq=0&amp;oq=Metro+Manila&amp;sll=14.6125312,120.9948033&amp;sspn=0.011772,0.021136&amp;t=h&amp;ie=UTF8&amp;hq=&amp;hnear=Dimple+Star&amp;ll=14.6125312,120.9948033&amp;spn=0.011772,0.021136&amp;z=14&amp;output=embed"></iframe>
                <div class="terminal-info">
                    <p>Located in the heart of Manila, our Espana terminal offers convenient access to various destinations with comfortable waiting areas and amenities.</p>
                    <a href="https://www.google.com/maps/place/Dimple+Star/@14.6125312,120.9948033,770m/data=!3m2!1e3!4b1!4m2!3m1!1s0x3397b60300001d5d:0xd30645794daddf84?hl=en;z=14" class="view-map" target="_blank">
                        <i class="fas fa-external-link-alt"></i> View Larger Map
                    </a>
                    <div class="terminal-contact">
                        <i class="fas fa-phone"></i>
                        <div>+63.02.985.1451 / +63.908.926.9163</div>
                    </div>
                </div>
            </div>
            
            <div class="terminal-card">
                <div class="terminal-header">
                    <h3><i class="fas fa-map-marker-alt"></i> San Jose Terminal</h3>
                </div>
                <iframe class="terminal-map" src="https://maps.google.com.ph/maps?f=q&amp;source=s_q&amp;hl=en&amp;geocode=&amp;q=Dimple+Star+Transport,+BonifacioSt,SanJose,OccidentalMindoro,&amp;aq=0&amp;oq=&amp;sll=12.3540632,121.0618653&amp;sspn=0.011772,0.021136&amp;t=h&amp;ie=UTF8&amp;hq=&amp;hnear=Dimple+Star+Transport&amp;ll=12.3540632,121.0618653&amp;spn=0.011772,0.021136&amp;z=14&amp;output=embed"></iframe>
                <div class="terminal-info">
                    <p>Our San Jose terminal serves as a gateway to Occidental Mindoro, providing modern facilities and efficient service for travelers to and from the region.</p>
                    <a href="https://www.google.com/maps/place/Dimple+Star+Transport/@14.6143711,120.9841972,458m/data=!3m2!1e3!4b1!4m2!3m1!1s0x3397b5fe6f7ebf6b:0xc34baa5ed38261eb?hl=en;z=14" class="view-map" target="_blank">
                        <i class="fas fa-external-link-alt"></i> View Larger Map
                    </a>
                    <div class="terminal-contact">
                        <i class="fas fa-phone"></i>
                        <div>+63.02.6684151 / +63.921.568.6449</div>
                    </div>
                </div>
            </div>
        </div>
    </main>
    
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
                        <li><a href="contact.php">Contact</a></li>
                        <li><a href="book.php">Book Now</a></li>
                    </ul>
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