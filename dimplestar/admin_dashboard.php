<?php
session_start();
include 'php_includes/connection.php';

// Check if user is logged in and is admin
if (!isset($_SESSION['email']) || !isset($_SESSION['is_admin']) || $_SESSION['is_admin'] != 1) {
    header("Location: signlog.php");
    exit();
}

// Handle content updates
// Handle content updates
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    foreach ($_POST as $key => $value) {
        if (strpos($key, 'content_') === 0) {
            $content_key = str_replace('content_', '', $key);
            $content_value = mysqli_real_escape_string($con, $value);
            
            // Get the old value for audit trail
            $old_value_query = "SELECT content_value FROM site_content WHERE content_key = '$content_key'";
            $old_value_result = mysqli_query($con, $old_value_query);
            $old_value_row = mysqli_fetch_assoc($old_value_result);
            $old_value = $old_value_row['content_value'];
            
            // Update the content
            $query = "UPDATE site_content SET content_value = '$content_value' WHERE content_key = '$content_key'";
            if (mysqli_query($con, $query)) {
                // Record in audit trail if value changed
                if ($old_value != $content_value) {
                    $admin_email = $_SESSION['email'];
                    $action = "Updated " . str_replace('_', ' ', $content_key);
                    $audit_query = "INSERT INTO audit_trail (admin_email, action, content_key, old_value, new_value) 
                                   VALUES ('$admin_email', '$action', '$content_key', '$old_value', '$content_value')";
                    mysqli_query($con, $audit_query);
                }
            }
        }
    }
    $success = "Content updated successfully!";
}


// Fetch all content with fallback to default values
$content = [];
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

$result = mysqli_query($con, "SELECT * FROM site_content");
if ($result) {
    while ($row = mysqli_fetch_assoc($result)) {
        $content[$row['content_key']] = $row['content_value'];
    }
    
    // Merge with default values in case some are missing
    $content = array_merge($default_content, $content);
} else {
    $content = $default_content;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Super Admin Dashboard - Dimple Star Transport</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        body {
            font-family: 'Open Sans', sans-serif;
            background: #f5f5f5;
            margin: 0;
            padding: 20px;
        }
        .dashboard {
            max-width: 1000px;
            margin: 0 auto;
            background: white;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15);
        }
        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 30px;
            padding-bottom: 20px;
            border-bottom: 2px solid #2E8B57;
        }
        .success {
            color: #2E8B57;
            background: #d4edda;
            padding: 15px;
            border-radius: 4px;
            margin-bottom: 20px;
            border: 1px solid #c3e6cb;
        }
        .content-group {
            margin-bottom: 30px;
            padding: 20px;
            border: 1px solid #ddd;
            border-radius: 5px;
        }
        .content-group h2 {
            color: #2E8B57;
            margin-bottom: 20px;
            padding-bottom: 10px;
            border-bottom: 1px solid #eee;
        }
        .form-group {
            margin-bottom: 15px;
        }
        .form-group label {
            display: block;
            margin-bottom: 5px;
            font-weight: 600;
        }
        input[type="text"], textarea {
            width: 100%;
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 4px;
            font-family: 'Open Sans', sans-serif;
        }
        textarea {
            height: 100px;
            resize: vertical;
        }
        .btn {
            background: #2E8B57;
            color: white;
            padding: 12px 25px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
        }
        .btn:hover {
            background: #1F6B4D;
        }
        .nav-links {
            display: flex;
            gap: 15px;
        }
        .nav-links a {
            color: #2E8B57;
            text-decoration: none;
        }
        .nav-links a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <div class="dashboard">
        <div class="header">
            <h1><i class="fas fa-cog"></i> Super Admin Dashboard</h1>
            <div class="nav-links">
                <a href="about.php" target="_blank"><i class="fas fa-eye"></i> View Page</a>
                <a href="admin_logout.php"><i class="fas fa-sign-out-alt"></i> Logout</a>
            </div>
        </div>
        
        <?php if (isset($success)): ?>
            <div class="success"><?php echo $success; ?></div>
        <?php endif; ?>
        
        <form method="POST">
            <!-- Hero Section -->
            <div class="content-group">
                <h2>Hero Section</h2>
                <div class="form-group">
                    <label>Hero Title:</label>
                    <input type="text" name="content_about_hero_title" value="<?php echo htmlspecialchars($content['about_hero_title']); ?>">
                </div>
                <div class="form-group">
                    <label>Hero Subtitle:</label>
                    <input type="text" name="content_about_hero_subtitle" value="<?php echo htmlspecialchars($content['about_hero_subtitle']); ?>">
                </div>
            </div>
            
            <!-- History Section -->
            <div class="content-group">
                <h2>History Section</h2>
                <div class="form-group">
                    <label>History Title:</label>
                    <input type="text" name="content_history_title" value="<?php echo htmlspecialchars($content['history_title']); ?>">
                </div>
                <div class="form-group">
                    <label>History Content 1:</label>
                    <textarea name="content_history_content_1"><?php echo htmlspecialchars($content['history_content_1']); ?></textarea>
                </div>
                <div class="form-group">
                    <label>History Content 2:</label>
                    <textarea name="content_history_content_2"><?php echo htmlspecialchars($content['history_content_2']); ?></textarea>
                </div>
            </div>
            
            <!-- Mission & Vision -->
            <div class="content-group">
                <h2>Mission & Vision</h2>
                <div class="form-group">
                    <label>Mission Title:</label>
                    <input type="text" name="content_mission_title" value="<?php echo htmlspecialchars($content['mission_title']); ?>">
                </div>
                <div class="form-group">
                    <label>Mission Content:</label>
                    <textarea name="content_mission_content"><?php echo htmlspecialchars($content['mission_content']); ?></textarea>
                </div>
                <div class="form-group">
                    <label>Vision Title:</label>
                    <input type="text" name="content_vision_title" value="<?php echo htmlspecialchars($content['vision_title']); ?>">
                </div>
                <div class="form-group">
                    <label>Vision Content:</label>
                    <textarea name="content_vision_content"><?php echo htmlspecialchars($content['vision_content']); ?></textarea>
                </div>
            </div>
            
            <!-- Statistics -->
            <div class="content-group">
                <h2>Statistics</h2>
                <div class="form-group">
                    <label>Years Number:</label>
                    <input type="text" name="content_stats_years" value="<?php echo htmlspecialchars($content['stats_years']); ?>">
                </div>
                <div class="form-group">
                    <label>Years Text:</label>
                    <input type="text" name="content_stats_years_text" value="<?php echo htmlspecialchars($content['stats_years_text']); ?>">
                </div>
                <div class="form-group">
                    <label>Buses Number:</label>
                    <input type="text" name="content_stats_buses" value="<?php echo htmlspecialchars($content['stats_buses']); ?>">
                </div>
                <div class="form-group">
                    <label>Buses Text:</label>
                    <input type="text" name="content_stats_buses_text" value="<?php echo htmlspecialchars($content['stats_buses_text']); ?>">
                </div>
                <div class="form-group">
                    <label>Routes Number:</label>
                    <input type="text" name="content_stats_routes" value="<?php echo htmlspecialchars($content['stats_routes']); ?>">
                </div>
                <div class="form-group">
                    <label>Routes Text:</label>
                    <input type="text" name="content_stats_routes_text" value="<?php echo htmlspecialchars($content['stats_routes_text']); ?>">
                </div>
                <div class="form-group">
                    <label>Passengers Number:</label>
                    <input type="text" name="content_stats_passengers" value="<?php echo htmlspecialchars($content['stats_passengers']); ?>">
                </div>
                <div class="form-group">
                    <label>Passengers Text:</label>
                    <input type="text" name="content_stats_passengers_text" value="<?php echo htmlspecialchars($content['stats_passengers_text']); ?>">
                </div>
            </div>
            
            <!-- Footer -->
            <div class="content-group">
                <h2>Footer Text</h2>
                <div class="form-group">
                    <textarea name="content_footer_text"><?php echo htmlspecialchars($content['footer_text']); ?></textarea>
                </div>
            </div>
            
            <button type="submit" class="btn"><i class="fas fa-save"></i> Save All Changes</button>
        </form>
    </div>
</body>
</html>