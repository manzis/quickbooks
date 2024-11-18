<?php
session_start();

// Check if the user is not logged in
if (!isset($_SESSION['user'])) {
    // Return a JSON response indicating not authenticated
    echo json_encode(array('status' => 'error', 'message' => 'Not authenticated'));
    exit();
}

// Return a JSON response indicating authenticated
echo json_encode(array('status' => 'success', 'message' => 'Authenticated'));
?>

