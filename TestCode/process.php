<?php
// Database connection parameters
$host = "localhost";
$username = "root";
$password = "";
$database = "testCode";

// Create a connection
$conn = new mysqli($host, $username, $password, $database);

// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Function to sanitize input data
function sanitizeInput($input) {
    return htmlspecialchars(stripslashes(trim($input)));
}

// Function to hash the password
function hashPassword($password) {
    return password_hash($password, PASSWORD_BCRYPT);
}

// Validate and insert data only if the action is 'signup'
if ($_POST['action'] === 'signup') {
    $username = sanitizeInput($_POST['username']);
    $password = hashPassword($_POST['password']);

    // Server-side validation
    if (empty($username) || empty($_POST['password'])) {
        echo "Please fill in all fields";
    } else {
        // Simple SQL query (replace with your actual table and column names)
        $sql = "INSERT INTO users (username, password) VALUES ('$username', '$password')";

        // Execute the query
        if ($conn->query($sql) === TRUE) {
            echo "Sign up successful";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }
}

// Close the connection
$conn->close();
?>
