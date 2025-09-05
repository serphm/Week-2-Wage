<?php
// php_includes/connection.php
$host = "localhost";
$username = "root";
$password = "";
$database = "users_db";

$con = mysqli_connect($host, $username, $password, $database);

// Check connection
if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}

// Create site_content table if it doesn't exist
$create_table = "
CREATE TABLE IF NOT EXISTS site_content (
    id INT(11) AUTO_INCREMENT PRIMARY KEY,
    content_key VARCHAR(100) NOT NULL UNIQUE,
    content_value TEXT NOT NULL,
    last_updated TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
)";

mysqli_query($con, $create_table);

// Check if admin user exists, if not create one
$check_admin = "SELECT * FROM members WHERE is_admin = 1 LIMIT 1";
$admin_result = mysqli_query($con, $check_admin);

if (mysqli_num_rows($admin_result) == 0) {
    // Create default admin user
    $admin_email = "admin@dimplestar.com";
    $admin_password = hash('sha256', 'admin123');
    $salt = substr(md5(uniqid(rand(), true)), 0, 3);
    $admin_password = hash('sha256', $salt . $admin_password);
    
    $create_admin = "INSERT INTO members (fname, lname, email, salt, password, is_admin) 
                     VALUES ('Super', 'Admin', '$admin_email', '$salt', '$admin_password', 1)";
    mysqli_query($con, $create_admin);
}

// Insert default content if table is empty
$check_content = "SELECT COUNT(*) as count FROM site_content";
$result = mysqli_query($con, $check_content);
$row = mysqli_fetch_assoc($result);

if ($row['count'] == 0) {
    $default_content = [
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
}
foreach ($default_content as $key => $value) {
    $value = mysqli_real_escape_string($con, $value);
    $insert = "INSERT INTO site_content (content_key, content_value) VALUES ('$key', '$value')";
    if (mysqli_query($con, $insert)) {
        $audit_query = "INSERT INTO audit_trail (admin_email, action, content_key, old_value, new_value) 
                       VALUES ('system', 'Initial content created', '$key', '', '$value')";
        mysqli_query($con, $audit_query);
    }
}
// Create audit_trail table if it doesn't exist
$create_audit_table = "
CREATE TABLE IF NOT EXISTS audit_trail (
    id INT(11) AUTO_INCREMENT PRIMARY KEY,
    admin_email VARCHAR(100) NOT NULL,
    action VARCHAR(255) NOT NULL,
    content_key VARCHAR(100) NOT NULL,
    old_value TEXT,
    new_value TEXT,
    changed_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
)";

mysqli_query($con, $create_audit_table);
?>