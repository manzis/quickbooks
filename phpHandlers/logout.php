<?php
session_start();

// Check if the user is logged in
if (isset($_SESSION['user'])) {
    // Unset all session variables
    $_SESSION = array();

    // Destroy the session
    session_destroy();

    // Ensure that the session cookie is deleted
    setcookie(session_name(), '', time() - 3600, '/');

    $response = array('status' => 'success', 'message' => 'Logout successful');
} else {
    $response = array('status' => 'error', 'message' => 'User is not logged in');
}

// Send JSON response
header('Content-Type: application/json');
echo json_encode($response);
?>