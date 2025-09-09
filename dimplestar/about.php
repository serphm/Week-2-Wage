<!DOCTYPE html>
<?php
    include 'php_includes/connection.php';
    
    // Initialize content array with default values
    $content = [
    'about_hero_title' => 'About Dimple Star Transport',
    'about_hero_subtitle' => 'Your trusted transportation partner for decades',
    'history_title' => 'Our History',
    'history_content_1' => 'Photo taken on October 16, 1993. Napat Transit (now Dimple Star Transport) NVR-963 (fleet No 800) going to Alabang and jeepneys under the Light Rail Line in Taft Ave near United Nations Avenue, Ermita, Manila, Philippines.',
    'history_content_2' => 'Year 2004 of May changes has been made, Napat Transit became Dimple Star Transport.',
    'mission_title' => 'Our Mission',
    'mission_content' => 'To provide superior transport service to Metro Manila and Mindoro Province commuters.',
    'vision_title' => 'Our Vision',
    'vision_content' => 'To lead the bus transport industry through its innovation service to the riding public.',
    'stats_years' => '30+',
    'stats_years_text' => 'Years of Service',
    'stats_buses' => '50+',
    'stats_buses_text' => 'Buses in Fleet',
    'stats_routes' => '20+',
    'stats_routes_text' => 'Routes Served',
    'stats_passengers' => '1000+',
    'stats_passengers_text' => 'Daily Passengers',
    'footer_text' => 'Providing reliable and comfortable transportation services for over a decade.'
];

// Try to fetch content from database
$result = mysqli_query($con, "SELECT * FROM site_content");
if ($result) {
    while ($row = mysqli_fetch_assoc($result)) {
        $content[$row['content_key']] = $row['content_value'];
    }
} else {
    // Use default values if query fails
    error_log("Failed to fetch site content: " . mysqli_error($con));
}

session_start();
?>
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
    
    /* Admin Link */
    .admin-link {
        background: var(--yellow);
        color: var(--black);
        padding: 5px 10px;
        border-radius: 4px;
        font-weight: 600;
        margin-left: 10px;
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
    /* Audit Trail Button */
.audit-btn {
    background: var(--yellow);
    color: var(--black);
    border: none;
    padding: 8px 16px;
    border-radius: 4px;
    cursor: pointer;
    font-weight: 600;
    margin-left: 10px;
    transition: var(--transition);
    font-family: 'Montserrat', sans-serif;
}

.audit-btn:hover {
    background: #e6c100;
    transform: translateY(-2px);
}

/* Responsive adjustments for modal */
@media (max-width: 768px) {
    .modal-content {
        width: 95%;
        margin: 10% auto;
    }
    
    .audit-filters {
        flex-direction: column;
    }
    
    .audit-filters input,
    .audit-filters select {
        width: 100%;
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
                    
                    // Show admin link if user is admin
                    if(isset($_SESSION['is_admin']) && $_SESSION['is_admin'] == 1) {
                        echo " <a href='admin_dashboard.php' class='admin-link'>Admin Panel</a>";
                        echo " <button id='auditTrailBtn' class='audit-btn'>View Changes</button>";
                    }
                }
                if(empty($email)){
                    echo "<a href='signlog.php'>Login</a>";
                }
            ?>
        </div>
    </div>
</div>

<style>
    .audit-btn {
        background: var(--yellow);
        color: var(--black);
        border: none;
        padding: 5px 15px;
        border-radius: 4px;
        cursor: pointer;
        font-weight: 600;
        margin-left: 10px;
        transition: var(--transition);
    }
    
    .audit-btn:hover {
        background: #e6c100;
        transform: translateY(-2px);
    }
</style>
    
    <!-- About Hero Section -->
    <section class="about-hero">
        <div class="container">
            <h1><?php echo htmlspecialchars($content['about_hero_title']); ?></h1>
            <p><?php echo htmlspecialchars($content['about_hero_subtitle']); ?></p>
        </div>
    </section>
    
    <!-- About Content -->
    <section class="about-content">
        <div class="container">
            <h2 class="section-title"><?php echo htmlspecialchars($content['history_title']); ?></h2>
            
            <div class="history-content">
                <div class="history-image">
                    <img src="images/oldbus.jpg" alt="Napat Transit Bus in 1993">
                </div>
                
                <div class="history-text">
                    <p><?php echo htmlspecialchars($content['history_content_1']); ?></p>
                    
                    <p><?php echo htmlspecialchars($content['history_content_2']); ?></p>
                    
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
                    <h3><?php echo htmlspecialchars($content['mission_title']); ?></h3>
                    <p><?php echo htmlspecialchars($content['mission_content']); ?></p>
                </div>
                
                <div class="mv-card">
                    <div class="mv-icon">
                        <i class="fas fa-eye"></i>
                    </div>
                    <h3><?php echo htmlspecialchars($content['vision_title']); ?></h3>
                    <p><?php echo htmlspecialchars($content['vision_content']); ?></p>
                </div>
            </div>
        </div>
    </section>
    
    <!-- Stats Section -->
    <section class="stats">
        <div class="container">
            <div class="stats-container">
                <div class="stat-item">
                    <div class="stat-number"><?php echo htmlspecialchars($content['stats_years']); ?></div>
                    <div class="stat-text"><?php echo htmlspecialchars($content['stats_years_text']); ?></div>
                </div>
                
                <div class="stat-item">
                    <div class="stat-number"><?php echo htmlspecialchars($content['stats_buses']); ?></div>
                    <div class="stat-text"><?php echo htmlspecialchars($content['stats_buses_text']); ?></div>
                </div>
                
                <div class="stat-item">
                    <div class="stat-number"><?php echo htmlspecialchars($content['stats_routes']); ?></div>
                    <div class="stat-text"><?php echo htmlspecialchars($content['stats_routes_text']); ?></div>
                </div>
                
                <div class="stat-item">
                    <div class="stat-number"><?php echo htmlspecialchars($content['stats_passengers']); ?></div>
                    <div class="stat-text"><?php echo htmlspecialchars($content['stats_passengers_text']); ?></div>
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
                    <p><?php echo htmlspecialchars($content['footer_text']); ?></p>
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

    <!-- Audit Trail Modal -->
<div id="auditTrailModal" class="modal">
    <div class="modal-content">
        <div class="modal-header">
            <h2>Content Change History</h2>
            <span class="close">&times;</span>
        </div>
        <div class="modal-body">
            <div class="audit-filters">
                <input type="text" id="auditSearch" placeholder="Search changes..." onkeyup="filterAuditTrail()">
                <select id="contentFilter" onchange="filterAuditTrail()">
                    <option value="">All Content</option>
                    <option value="about_hero_title">Hero Title</option>
                    <option value="about_hero_subtitle">Hero Subtitle</option>
                    <option value="history_title">History Title</option>
                    <option value="history_content">History Content</option>
                    <option value="mission">Mission</option>
                    <option value="vision">Vision</option>
                    <option value="stats">Statistics</option>
                    <option value="footer_text">Footer Text</option>
                </select>
            </div>
            <div class="audit-list" id="auditList">
                <p>Loading audit trail...</p>
            </div>
        </div>
    </div>
</div>

<style>
    /* Modal Styles */
    .modal {
        display: none;
        position: fixed;
        z-index: 1000;
        left: 0;
        top: 0;
        width: 100%;
        height: 100%;
        overflow: auto;
        background-color: rgba(0,0,0,0.5);
    }
    
    .modal-content {
        background-color: var(--white);
        margin: 5% auto;
        padding: 0;
        border-radius: 8px;
        width: 80%;
        max-width: 900px;
        box-shadow: var(--shadow);
        max-height: 80vh;
        display: flex;
        flex-direction: column;
    }
    
    .modal-header {
        background: var(--green);
        color: var(--white);
        padding: 20px;
        border-top-left-radius: 8px;
        border-top-right-radius: 8px;
        display: flex;
        justify-content: space-between;
        align-items: center;
    }
    
    .modal-header h2 {
        margin: 0;
        color: var(--yellow);
    }
    
    .close {
        color: var(--white);
        float: right;
        font-size: 28px;
        font-weight: bold;
        cursor: pointer;
    }
    
    .close:hover {
        color: var(--yellow);
    }
    
    .modal-body {
        padding: 20px;
        overflow-y: auto;
        flex: 1;
    }
    
    /* Audit Trail Styles */
    .audit-filters {
        display: flex;
        gap: 15px;
        margin-bottom: 20px;
        flex-wrap: wrap;
    }
    
    .audit-filters input,
    .audit-filters select {
        padding: 10px;
        border: 1px solid #ddd;
        border-radius: 4px;
        font-family: 'Open Sans', sans-serif;
    }
    
    .audit-filters input {
        flex: 2;
        min-width: 200px;
    }
    
    .audit-filters select {
        flex: 1;
        min-width: 150px;
    }
    
    .audit-item {
        border-left: 4px solid var(--green);
        padding: 15px;
        margin-bottom: 15px;
        background: var(--light-gray);
        border-radius: 4px;
    }
    
    .audit-item-header {
        display: flex;
        justify-content: space-between;
        margin-bottom: 10px;
        flex-wrap: wrap;
    }
    
    .audit-action {
        font-weight: 600;
        color: var(--green);
    }
    
    .audit-date {
        color: #666;
        font-size: 0.9em;
    }
    
    .audit-admin {
        color: var(--black);
        font-weight: 500;
    }
    
    .audit-changes {
        margin-top: 10px;
        padding: 10px;
        background: var(--white);
        border-radius: 4px;
        border: 1px solid #ddd;
    }
    
    .change-old {
        color: #e74c3c;
        text-decoration: line-through;
        margin-right: 10px;
    }
    
    .change-new {
        color: var(--green);
        font-weight: 500;
    }
    
    .no-changes {
        text-align: center;
        color: #666;
        padding: 40px;
    }
    
    .loading {
        text-align: center;
        padding: 40px;
        color: #666;
    }
</style>

<script>
    // Audit Trail Modal functionality
    document.addEventListener('DOMContentLoaded', function() {
        const modal = document.getElementById('auditTrailModal');
        const btn = document.getElementById('auditTrailBtn');
        const span = document.getElementsByClassName('close')[0];
        
        if (btn) {
            btn.onclick = function() {
                modal.style.display = 'block';
                loadAuditTrail();
            }
        }
        
        span.onclick = function() {
            modal.style.display = 'none';
        }
        
        window.onclick = function(event) {
            if (event.target == modal) {
                modal.style.display = 'none';
            }
        }
    });
    
    // Load audit trail data
    function loadAuditTrail() {
    const auditList = document.getElementById('auditList');
    auditList.innerHTML = '<div class="loading"><i class="fas fa-spinner fa-spin"></i> Loading changes...</div>';
    
    fetch('get_audit_trail.php')
        .then(response => {
            if (!response.ok) {
                throw new Error('Network response was not ok');
            }
            return response.json();
        })
        .then(data => {
            if (data && data.length > 0) {
                displayAuditTrail(data);
            } else {
                auditList.innerHTML = '<div class="no-changes">No changes recorded yet.</div>';
            }
        })
        .catch(error => {
            console.error('Error loading audit trail:', error);
            auditList.innerHTML = '<div class="no-changes">Error loading audit trail. Please try again later.</div>';
        });
}
    
    // Display audit trail data
    function displayAuditTrail(data) {
        const auditList = document.getElementById('auditList');
        let html = '';
        
        data.forEach(item => {
            const changeDate = new Date(item.changed_at).toLocaleString();
            const contentName = formatContentKey(item.content_key);
            
            html += `
                <div class="audit-item" data-content="${item.content_key}">
                    <div class="audit-item-header">
                        <span class="audit-action">${contentName}</span>
                        <span class="audit-date">${changeDate}</span>
                    </div>
                    <div class="audit-admin">By: ${item.admin_email}</div>
                    <div class="audit-changes">
                        <span class="change-old">${escapeHtml(item.old_value || 'Empty')}</span>
                        → 
                        <span class="change-new">${escapeHtml(item.new_value || 'Empty')}</span>
                    </div>
                </div>
            `;
        });
        
        auditList.innerHTML = html;
    }
    
    // Filter audit trail
    function filterAuditTrail() {
        const searchText = document.getElementById('auditSearch').value.toLowerCase();
        const contentFilter = document.getElementById('contentFilter').value;
        const items = document.querySelectorAll('.audit-item');
        
        items.forEach(item => {
            const contentKey = item.getAttribute('data-content');
            const text = item.textContent.toLowerCase();
            
            const matchesSearch = text.includes(searchText);
            const matchesFilter = !contentFilter || contentKey === contentFilter;
            
            item.style.display = (matchesSearch && matchesFilter) ? 'block' : 'none';
        });
    }
    
    // Helper functions
    function formatContentKey(key) {
        return key.split('_')
            .map(word => word.charAt(0).toUpperCase() + word.slice(1))
            .join(' ')
            .replace('Content ', '');
    }
    
    function escapeHtml(text) {
        const div = document.createElement('div');
        div.textContent = text;
        return div.innerHTML;
    }
</script>

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