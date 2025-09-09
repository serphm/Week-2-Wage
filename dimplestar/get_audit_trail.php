<?php
// get_audit_trail.php
session_start();
include 'php_includes/connection.php';

// Check if user is admin
if (!isset($_SESSION['is_admin']) || $_SESSION['is_admin'] != 1) {
    http_response_code(403);
    echo json_encode(['error' => 'Access denied']);
    exit();
}

// Get audit trail data
$query = "SELECT * FROM audit_trail ORDER BY changed_at DESC LIMIT 100";
$result = mysqli_query($con, $query);

$audit_data = [];
if ($result) {
    while ($row = mysqli_fetch_assoc($result)) {
        $audit_data[] = $row;
    }
} else {
    // If no audit trail exists yet, return empty array
    $audit_data = [];
}

header('Content-Type: application/json');
echo json_encode($audit_data);
?>