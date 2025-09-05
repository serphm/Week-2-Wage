<?php
// Start session at the very beginning
session_start();

// Database connection with error handling
$con = mysqli_connect("localhost", "root", "");
$errors = array();
$successful = "";

// Check if connection was successful
if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}

// Create database if it doesn't exist
$db_name = "users_db";
$create_db = "CREATE DATABASE IF NOT EXISTS $db_name";
if (mysqli_query($con, $create_db)) {
    mysqli_select_db($con, $db_name);
    
    // Create table if it doesn't exist
    $create_table = "CREATE TABLE IF NOT EXISTS members (
        id INT(11) AUTO_INCREMENT PRIMARY KEY,
        fname VARCHAR(50) NOT NULL,
        lname VARCHAR(50) NOT NULL,
        email VARCHAR(100) NOT NULL UNIQUE,
        salt VARCHAR(3) NOT NULL,
        password VARCHAR(64) NOT NULL,
        reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP
    )";
    
    if (!mysqli_query($con, $create_table)) {
        die("Error creating table: " . mysqli_error($con));
    }
} else {
    die("Error creating database: " . mysqli_error($con));
}

// Check if the form was submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Determine if it's a login or signup based on the submit button name
    if (isset($_POST['login_submit'])) {
        // LOGIN PROCESSING
        $login_email = mysqli_real_escape_string($con, $_POST['login_email']);
        $login_password = $_POST['login_password'];
        
        // Check if user exists
        $search_query = mysqli_query($con, "SELECT * FROM members WHERE email = '$login_email'");
        if ($search_query && mysqli_num_rows($search_query) == 1) {
            $user = mysqli_fetch_assoc($search_query);
            $hashed_password = hash('sha256', $user['salt'] . hash('sha256', $login_password));
            
            if ($hashed_password === $user['password']) {
                // Password is correct, set session
                $_SESSION['email'] = $user['email'];
                $_SESSION['fname'] = $user['fname'];
                header("Location: index.php");
                exit();
            } else {
                $errors['login'] = "Invalid email or password.";
            }
        } else {
            $errors['login'] = "Invalid email or password.";
        }
    } 
    else if (isset($_POST['signup_submit'])) {
        // SIGNUP PROCESSING
        if (preg_match("/\S+/", $_POST['fname']) === 0) {
            $errors['fname'] = "* First Name is required.";
        }
        if (preg_match("/\S+/", $_POST['lname']) === 0) {
            $errors['lname'] = "* Last Name is required.";
        }
        if (preg_match("/.+@.+\..+/", $_POST['email']) === 0) {
            $errors['email'] = "* Not a valid e-mail address.";
        }
        if (preg_match("/.{8,}/", $_POST['password']) === 0) {
            $errors['password'] = "* Password Must Contain at least 8 Characters.";
        }
        if (strcmp($_POST['password'], $_POST['confirm_password'])) {
            $errors['confirm_password'] = "* Password do not match.";
        }
        
        if (count($errors) === 0) {
            $fname = mysqli_real_escape_string($con, $_POST['fname']);
            $lname = mysqli_real_escape_string($con, $_POST['lname']);
            $email = mysqli_real_escape_string($con, $_POST['email']);
            
            $password = hash('sha256', $_POST['password']);
            function createSalt() {
                $string = md5(uniqid(rand(), true));
                return substr($string, 0, 3);
            }
            $salt = createSalt();
            $password = hash('sha256', $salt . $password);
            
            $search_query = mysqli_query($con, "SELECT * FROM members WHERE email = '$email'");
            if ($search_query) {
                $num_row = mysqli_num_rows($search_query);
                if ($num_row >= 1) {
                    $errors['email'] = "Email address is unavailable.";
                } else {
                    $sql = "INSERT INTO members(`fname`, `lname`, `email`, `salt`, `password`) VALUES ('$fname', '$lname', '$email', '$salt', '$password')";
                    $query = mysqli_query($con, $sql);
                    if ($query) {
                        $_POST['fname'] = '';
                        $_POST['lname'] = '';
                        $_POST['email'] = '';
                        
                        $successful = "You are successfully registered. You can now login.";
                    } else {
                        $errors['database'] = "Registration failed. Please try again. Error: " . mysqli_error($con);
                    }
                }
            } else {
                $errors['database'] = "Database query failed. Please try again.";
            }
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Sign Up / Login - Dimple Star Transport</title>
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
        background-image: linear-gradient(rgba(255, 255, 255, 0.9), rgba(255, 255, 255, 0.9)), url('slide/images/bus1.png');
        background-size: cover;
        background-position: center;
        background-attachment: fixed;
        min-height: 100vh;
        display: flex;
        flex-direction: column;
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
    
    /* Main Content */
    .main-content {
        flex: 1;
        display: flex;
        justify-content: center;
        align-items: center;
        padding: 40px 0;
    }
    
    .auth-container {
        display: flex;
        width: 100%;
        max-width: 1000px;
        background: var(--white);
        border-radius: 10px;
        overflow: hidden;
        box-shadow: var(--shadow);
    }
    
    .auth-left {
        flex: 1;
        background: var(--green);
        color: var(--white);
        padding: 40px;
        display: flex;
        flex-direction: column;
        justify-content: center;
    }
    
    .auth-left h2 {
        font-size: 2rem;
        margin-bottom: 20px;
        color: var(--yellow);
    }
    
    .auth-left p {
        margin-bottom: 20px;
    }
    
    .benefits-list {
        list-style: none;
        margin-top: 20px;
    }
    
    .benefits-list li {
        margin-bottom: 15px;
        display: flex;
        align-items: center;
    }
    
    .benefits-list i {
        color: var(--yellow);
        margin-right: 10px;
        font-size: 1.2rem;
    }
    
    .auth-right {
        flex: 1;
        padding: 40px;
    }
    
    .form-tabs {
        display: flex;
        margin-bottom: 30px;
        border-bottom: 2px solid var(--light-gray);
    }
    
    .form-tab {
        padding: 10px 20px;
        cursor: pointer;
        font-weight: 600;
        color: var(--black);
        transition: var(--transition);
    }
    
    .form-tab.active {
        color: var(--green);
        border-bottom: 3px solid var(--green);
    }
    
    .form-container {
        margin-top: 20px;
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
    
    .form-control {
        width: 100%;
        padding: 12px 15px;
        border: 1px solid #ddd;
        border-radius: 4px;
        font-size: 16px;
        transition: var(--transition);
    }
    
    .form-control:focus {
        border-color: var(--green);
        outline: none;
        box-shadow: 0 0 0 3px rgba(46, 139, 87, 0.2);
    }
    
    .form-row {
        display: flex;
        gap: 15px;
    }
    
    .form-row .form-group {
        flex: 1;
    }
    
    .btn {
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
    
    .btn:hover {
        background: var(--dark-green);
        transform: translateY(-2px);
    }
    
    .error-message {
        color: #e74c3c;
        font-size: 14px;
        margin-top: 5px;
    }
    
    .success-message {
        color: var(--green);
        background: rgba(46, 139, 87, 0.1);
        padding: 15px;
        border-radius: 4px;
        margin-bottom: 20px;
        text-align: center;
    }
    
    .login-form {
        display: none;
    }
    
    .login-form.active {
        display: block;
    }
    
    .signup-form {
        display: none;
    }
    
    .signup-form.active {
        display: block;
    }
    
    /* Footer */
    footer {
        background: var(--black);
        color: var(--white);
        padding: 30px 0 20px;
        text-align: center;
    }
    
    .footer-logo {
        height: 50px;
        margin-bottom: 15px;
    }
    
    .copyright {
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
        
        .auth-container {
            flex-direction: column;
            max-width: 600px;
        }
        
        .auth-left {
            order: 2;
        }
    }
    
    @media (max-width: 576px) {
        .form-row {
            flex-direction: column;
            gap: 0;
        }
        
        .auth-left, .auth-right {
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
                <li><a href="about.php">About Us</a></li>
                <li><a href="terminal.php">Terminals</a></li>
                <li><a href="routeschedule.php">Routes / Schedules</a></li>
                <li><a href="contact.php">Contact</a></li>
                <li><a href="book.php">Book Now</a></li>
            </ul>
        </div>
    </header>
    
    <!-- Main Content -->
    <div class="main-content">
        <div class="container">
            <div class="auth-container">
                <div class="auth-left">
                    <h2>Join Dimple Star Transport</h2>
                    <p>Create an account to enjoy these benefits:</p>
                    <ul class="benefits-list">
                        <li><i class="fas fa-check-circle"></i> Quick and easy booking</li>
                        <li><i class="fas fa-check-circle"></i> Access to exclusive deals</li>
                        <li><i class="fas fa-check-circle"></i> Manage your bookings online</li>
                        <li><i class="fas fa-check-circle"></i> Faster checkout process</li>
                        <li><i class="fas fa-check-circle"></i> Earn reward points</li>
                    </ul>
                </div>
                
                <div class="auth-right">
                    <div class="form-tabs">
                        <div class="form-tab active" data-tab="login">Login</div>
                        <div class="form-tab" data-tab="signup">Sign Up</div>
                    </div>
                    
                    <!-- Login Form -->
                    <div class="form-container login-form active">
                        <form method="post" action="">
                            <?php if(isset($errors['login'])): ?>
                                <div class="error-message">
                                    <?php echo $errors['login']; ?>
                                </div>
                            <?php endif; ?>
                            
                            <div class="form-group">
                                <label for="login_email">Email Address</label>
                                <input type="email" class="form-control" id="login_email" name="login_email" required>
                            </div>
                            
                            <div class="form-group">
                                <label for="login_password">Password</label>
                                <input type="password" class="form-control" id="login_password" name="login_password" required>
                            </div>
                            
                            <button type="submit" class="btn" name="login_submit" id="login">Login</button>
                        </form>
                    </div>
                    
                    <!-- Signup Form -->
                    <div class="form-container signup-form">
                        <form method="post" action="">
                            <?php if(isset($successful) && !empty($successful)): ?>
                                <div class="success-message">
                                    <?php echo $successful; ?>
                                </div>
                            <?php endif; ?>
                            
                            <?php if(isset($errors['database'])): ?>
                                <div class="error-message">
                                    <?php echo $errors['database']; ?>
                                </div>
                            <?php endif; ?>
                            
                            <div class="form-row">
                                <div class="form-group">
                                    <label for="fname">First Name</label>
                                    <input type="text" class="form-control" name="fname" id="fname" placeholder="First Name" value="<?php if(isset($_POST['fname'])){echo htmlspecialchars($_POST['fname']);} ?>" required>
                                    <?php if(isset($errors['fname'])): ?>
                                        <div class="error-message"><?php echo $errors['fname']; ?></div>
                                    <?php endif; ?>
                                </div>
                                
                                <div class="form-group">
                                    <label for="lname">Last Name</label>
                                    <input type="text" class="form-control" name="lname" id="lname" placeholder="Last Name" value="<?php if(isset($_POST['lname'])){echo htmlspecialchars($_POST['lname']);} ?>" required>
                                    <?php if(isset($errors['lname'])): ?>
                                        <div class="error-message"><?php echo $errors['lname']; ?></div>
                                    <?php endif; ?>
                                </div>
                            </div>
                            
                            <div class="form-group">
                                <label for="email">Email Address</label>
                                <input type="email" class="form-control" name="email" id="email" placeholder="E-mail Address" value="<?php if(isset($_POST['email'])){echo htmlspecialchars($_POST['email']);} ?>" required>
                                <?php if(isset($errors['email'])): ?>
                                    <div class="error-message"><?php echo $errors['email']; ?></div>
                                    <?php endif; ?>
                            </div>
                            
                            <div class="form-group">
                                <label for="pw">Password</label>
                                <input type="password" class="form-control" name="password" id="pw" placeholder="Password" required>
                                <?php if(isset($errors['password'])): ?>
                                    <div class="error-message"><?php echo $errors['password']; ?></div>
                                <?php endif; ?>
                            </div>
                            
                            <div class="form-group">
                                <label for="cpw">Confirm Password</label>
                                <input type="password" class="form-control" name="confirm_password" id="cpw" placeholder="Confirm Password" required>
                                <?php if(isset($errors['confirm_password'])): ?>
                                    <div class="error-message"><?php echo $errors['confirm_password']; ?></div>
                                <?php endif; ?>
                            </div>
                            
                            <button type="submit" class="btn" name="signup_submit" id="submit">Sign Up</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Footer -->
    <footer>
        <div class="container">
            <a href="index.php"><img src="images/footer-logo.jpg" alt="Dimple Star Transport" class="footer-logo" /></a>
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
            
            // Form tabs functionality
            const formTabs = document.querySelectorAll('.form-tab');
            const loginForm = document.querySelector('.login-form');
            const signupForm = document.querySelector('.signup-form');
            
            formTabs.forEach(tab => {
                tab.addEventListener('click', function() {
                    const tabName = this.getAttribute('data-tab');
                    
                    // Update active tab
                    formTabs.forEach(t => t.classList.remove('active'));
                    this.classList.add('active');
                    
                    // Show appropriate form
                    if (tabName === 'login') {
                        loginForm.classList.add('active');
                        signupForm.classList.remove('active');
                    } else {
                        loginForm.classList.remove('active');
                        signupForm.classList.add('active');
                    }
                });
            });
            
            // Close menu when clicking outside
            document.addEventListener('click', function(event) {
                if (!event.target.closest('.main-nav') && !event.target.closest('.menu-toggle')) {
                    mainNav.classList.remove('active');
                }
            });
            
            // If there are errors in signup, show signup form
            <?php if(count($errors) > 0 && isset($_POST['signup_submit'])): ?>
                formTabs.forEach(t => t.classList.remove('active'));
                document.querySelector('[data-tab="signup"]').classList.add('active');
                loginForm.classList.remove('active');
                signupForm.classList.add('active');
            <?php endif; ?>
        });
    </script>
</body>
</html>